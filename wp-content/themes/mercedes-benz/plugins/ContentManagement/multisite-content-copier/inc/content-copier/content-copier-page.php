<?php

class Multisite_Content_Copier_Page_Copier extends Multisite_Content_Copier_Copier
{

    protected $post_ids;
    protected $copy_images;

    public function __construct($orig_blog_id, $args)
    {
        parent::__construct($orig_blog_id);

        $settings = wp_parse_args($args, $this->get_defaults_args());

        extract($settings);

        $this->post_ids = is_array($post_ids) ? $post_ids : array($post_ids);
        $this->copy_images = $copy_images;
        $this->copy_parents = $copy_parents;
        $this->update_date = $update_date;
        $this->copy_comments = $copy_comments;

    }

    protected function get_defaults_args()
    {
        return array(
            'copy_images' => false,
            'post_ids' => array(),
            'keep_user' => true,
            'update_date' => false,
            'copy_parents' => false,
            'copy_comments' => false
        );
    }

    public function execute()
    {
        foreach ($this->post_ids as $post_id) {
            $new = $this->copy($post_id);
            $new_post_id = intval($new["new_post_id"]);
            update_post_meta($new_post_id, 'mcc_copied', true);
            update_post_meta($new_post_id, 'mcc_orig_id', $post_id);

            $post = get_post($new_post_id);
            $stat = wp_update_post($post, true);
        }
    }

    public function copy($post_id)
    {
        $source_post_id = $post_id;
        $source_blog_id = $this->orig_blog_id;
        do_action('mcc_before_copy_post', $source_blog_id, $source_post_id);

        $new_post_id = $this->copy_post($post_id);

        if (!$new_post_id)
            return false;

        $new_parent_post_id = false;

        if ($this->copy_parents) {
            $parent_post_id = $this->get_orig_post_parent($post_id);

            if ($parent_post_id) {
                $new_parent_post_id = $this->copy_post($parent_post_id);
                $this->update_dest_post_parent($new_post_id, $new_parent_post_id);
            }
        }

        if ($this->copy_images) {
            $this->copy_media($post_id, $new_post_id);

            if (absint($new_parent_post_id)) {
                $this->copy_media($parent_post_id, $new_parent_post_id);
            }
        }

        if ($this->update_date) {
            $this->update_post_date($new_post_id, current_time('mysql'));

            if (absint($new_parent_post_id)) {
                $this->update_post_date($new_parent_post_id, current_time('mysql'));
            }
        }

        if ($this->copy_comments) {
            $this->copy_comments($post_id, $new_post_id);

            if (absint($new_parent_post_id)) {
                $this->copy_comments($parent_post_id, $new_parent_post_id);
            }
        }

        return array(
            'new_post_id' => $new_post_id,
            'new_parent_post_id' => $new_parent_post_id
        );
    }

    public function copy_post($post_id)
    {

        // Getting original post data
        $orig_post = $this->get_orig_blog_post($post_id);

        if (empty($orig_post))
            return false;

        $orig_post_meta = $this->get_orig_blog_post_meta($post_id);


        // Insert post in the new blog ( we should be currently on it)
        $postarr = $this->get_postarr($orig_post);

        $postarr["post_parent"] = maybe_push_parent($postarr["post_parent"], $this);

        // Add copied meta to original post
        switch_to_blog($this->orig_blog_id);
        update_post_meta($orig_post->ID, "mcc_copied", true);
        restore_blog();

        // If post is already pushed, remove the pushed copy before adding again.
        $existing = get_posts(array(
            "post_type" => $orig_post->post_type,
            "posts_per_page" => -1,
            "meta_query" => array(
                array(
                    "key" => "mcc_orig_id",
                    "compare" => "==",
                    "value" => $orig_post->ID
                )
            ),
        ));

        // If existing post is found, remove.
        if (count($existing) == 1) {
            foreach ($existing as $ext) {
                $new_post_id = $ext->ID;
                $post = $this->set_postarr($ext, $postarr);
                wp_update_post($post);
            }
        } else {
            $new_post_id = wp_insert_post($postarr);
        }

        if ($new_post_id) {
            // Insert post meta
            $fields = array();
            foreach ($orig_post_meta as $k => $post_meta) {
                $unserialized_meta_value = maybe_unserialize($post_meta->meta_value);

                // Is it acf?
                if (substr($unserialized_meta_value, 0, 6) == "field_") {
                    $obj = get_field_object($unserialized_meta_value, $new_post_id);

                    $fields[] = $obj;
                } else {
                    update_post_meta($new_post_id, $post_meta->meta_key, $unserialized_meta_value);
                }

            }

            foreach ($fields as $obj) {
                if ($obj && $obj["type"] == "image") {
                    maybe_handle_image($obj, $new_post_id, $orig_post_meta);
                } else if ($obj && $obj["type"] == "relationship") {
                    maybe_handle_relationship($obj, $new_post_id);
                } else if ($obj && ($obj["type"] == "post_object" || $obj["type"] == "page_link")) {
                    maybe_handle_page_ref($obj, $orig_post_meta, $new_post_id);
                } else if ($obj && $obj["type"] == "repeater") {
                    $obj = get_field_object($obj["key"], $new_post_id, true);
                    maybe_link_repeater($obj, $orig_post_meta, array(
                        "new_post_id" => $new_post_id,
                        "orig_post" => $orig_post
                    ));
                } else {
                    update_post_meta($new_post_id, $post_meta->meta_key, $unserialized_meta_value);
                    update_post_meta($new_post_id, "_" . $obj["name"], $obj["key"]);
                }
            }
        }

        return $new_post_id;
    }
}

function maybe_link_repeater($obj, $orig_post_meta, $params)
{
    $new_post_id = $params["new_post_id"];
    $orig_post = $params["orig_post"];
    $repeater_rows = intval(get_post_meta($new_post_id, $obj["name"], true));
    update_post_meta($new_post_id, "_" . $obj["name"], $obj["key"]);

    for ($i = 0; $i < $repeater_rows; $i++) {
        foreach ($obj["sub_fields"] as $field) {
            $new_meta_key = $obj["name"] . "_" . $i . "_" . $field["name"];
            $field["name"] = $new_meta_key;
            if ($field["type"] == "image") {
                maybe_handle_image($field, $new_post_id, $orig_post_meta);
            } else if ($field["type"] == "repeater") {
                maybe_link_repeater($field, $orig_post_meta, $params);
            } else if ($field["type"] == "page_link" || $field["type"] == "post_object") {
                maybe_handle_page_ref($field, $orig_post_meta, $new_post_id);
            } else if ($field["type"] == "relationship") {
                maybe_handle_relationship($field, $new_post_id);
            } else {
                update_post_meta($new_post_id, "_" . $new_meta_key, $field["key"]);
            }
        }
    }
}

function maybe_handle_relationship($obj, $new_post_id)
{
    $data = get_post_meta($new_post_id, $obj["name"], true);

    if (is_array($data)) {
        $newData = array();
        foreach ($data as $pid) {
            $lpid = maybe_get_local_id($pid);

            if ($lpid == 0) {
                $lpid = maybe_resolve_missing($pid);
            }

            $newData[] = "" . $lpid;
        }
        update_post_meta($new_post_id, $obj["name"], $newData);
        update_post_meta($new_post_id, "_" . $obj["name"], $obj["key"]);
        return $newData;
    }
}

function maybe_handle_page_ref($obj, $orig_post_meta, $new_post_id)
{
    foreach ($orig_post_meta as $meta) {
        if ($meta->meta_key == $obj["name"]) {
            $lpid = maybe_get_local_id($meta->meta_value);

            if ($lpid == 0) {
                $lpid = maybe_resolve_missing($meta->meta_value);
            }

            update_post_meta($new_post_id, $obj["name"], $lpid);
            update_post_meta($new_post_id, "_" . $obj["name"], $obj["key"]);
            return $lpid;
        }
    }
}

function maybe_handle_image($obj, $new_post_id, $orig_post_meta)
{
    require_once(ABSPATH . 'wp-admin/includes/media.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    foreach ($orig_post_meta as $meta) {
        if ($meta->meta_key == $obj["name"]) {
            $iid = $meta->meta_value;
        }
    }

    if (!!$iid) {
        switch_to_master();
        $url = wp_get_attachment_image_src(intval($iid), "full");
        restore_blog();
        $url = $url[0];

        $tmp = download_url($url);
        $file = array(
            "name" => basename($url),
            "tmp_name" => $tmp
        );

        if (is_wp_error($tmp)) {
            return false;
        }

        $id = media_handle_sideload($file, 0);

        // Check for handle sideload errors.
        if (is_wp_error($id)) {
            return false;
        }

        update_post_meta($new_post_id, $obj["name"], intval($id));
        update_post_meta($new_post_id, "_" . $obj["name"], $obj["key"]);
        return $id;
    }
}

function maybe_push_parent($parent_id, $class)
{
    if ($parent_id == 0 || !$parent_id) {
        return 0;
    }

    $lpid = maybe_get_local_id($parent_id);

    if ($lpid == 0) {
        $new = $class->copy($parent_id);

        update_post_meta(intval($new["new_post_id"]), 'mcc_copied', true);
        update_post_meta(intval($new["new_post_id"]), 'mcc_orig_id', $parent_id);

        return $new["new_post_id"];
    }
    return $lpid;
}

function maybe_resolve_missing($post_id)
{
    $lpid = 0;

    if (!$post_id) {
        return 0;
    }

    switch_to_master();
    $orig_post = get_post($post_id);
    restore_blog();

    if ($orig_post->post_type == "page") {
        $copier = new Multisite_Content_Copier_Page_Copier(get_master_site_id(), array());
    } else if ($orig_post->post_type == "post") {
        $copier = new Multisite_Content_Copier_Post_Copier(get_master_site_id(), array());
    } else {
        $copier = new Multisite_Content_Copier_CPT_Copier(get_master_site_id(), array());
    }

    $new_post = $copier->copy($post_id);

    if (is_array($new_post)) {
        $lpid = $new_post["new_post_id"];

        update_post_meta(intval($lpid), 'mcc_copied', true);
        update_post_meta(intval($lpid), 'mcc_orig_id', $post_id);
    }

    return $lpid;
}
