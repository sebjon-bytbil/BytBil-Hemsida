<?php

class Multisite_Content_Push_Page_Push extends Multisite_Content_Push_Push
{

    protected $post_ids;
    protected $push_images;

    public function __construct($orig_blog_id, $args)
    {
        parent::__construct($orig_blog_id);

        $settings = wp_parse_args($args, $this->get_defaults_args());

        extract($settings);

        $this->push_menu = (isset($settings['push_menu']) && $settings['push_menu'] == "true");

        $this->post_ids = is_array($post_ids) ? $post_ids : array($post_ids);
        $this->push_images = $push_images;
        $this->push_parents = $push_parents;
        $this->update_date = $update_date;
        $this->push_comments = $push_comments;

    }

    protected function get_defaults_args()
    {
        return array(
            'push_images' => false,
            'post_ids' => array(),
            'keep_user' => true,
            'update_date' => false,
            'push_parents' => false,
            'push_comments' => false
        );
    }

    public function execute()
    {
        foreach ($this->post_ids as $post_id) {
            $this->push($post_id);
            update_post_meta($post_id, 'mcp_pushed', true);
        }
    }

    public function push($post_id)
    {

        $source_post_id = $post_id;
        $source_blog_id = $this->orig_blog_id;
        do_action('mcp_before_push_post', $source_blog_id, $source_post_id);

        $new_post_id = $this->push_post($post_id);

        if (!$new_post_id)
            return false;

        $new_parent_post_id = false;

        if ($this->push_parents) {
            $parent_post_id = $this->get_orig_post_parent($post_id);

            if ($parent_post_id) {
                $new_parent_post_id = $this->push_post($parent_post_id);
                $this->update_dest_post_parent($new_post_id, $new_parent_post_id);
            }
        }

        if ($this->push_images) {
            $this->push_media($post_id, $new_post_id);

            if (absint($new_parent_post_id)) {
                $this->push_media($parent_post_id, $new_parent_post_id);
            }
        }

        if ($this->update_date) {
            $this->update_post_date($new_post_id, current_time('mysql'));

            if (absint($new_parent_post_id)) {
                $this->update_post_date($new_parent_post_id, current_time('mysql'));
            }
        }

        if ($this->push_comments) {
            $this->push_comments($post_id, $new_post_id);

            if (absint($new_parent_post_id)) {
                $this->push_comments($parent_post_id, $new_parent_post_id);
            }
        }

        return array(
            'new_post_id' => $new_post_id,
            'new_parent_post_id' => $new_parent_post_id
        );
    }

    public function push_post($post_id)
    {


        $blog_id = get_current_blog_id();
        $table_name = "wp_" . $blog_id . "_posts";
        global $wpdb;
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            return null;
        }


        if ($this->push_menu) { // Activate auto add to menu

            $blog_id = get_current_blog_id();

            if ($blog_id == 1) {
                $terms_table = "wp_terms";
                $term_rs_table = "wp_term_relationships";
                $post_table = "wp_posts";
                $postmeta_table = "wp_postmeta";
            } else {
                $terms_table = "wp_" . $blog_id . "_terms";
                $term_rs_table = "wp_" . $blog_id . "_term_relationships";
                $post_table = "wp_" . $blog_id . "_posts";
                $postmeta_table = "wp_" . $blog_id . "_postmeta";
            }

            // Store 'auto-add' pages.
            $auto_add = true;
            $nav_menu_option = (array)get_option('nav_menu_options');

            /*if(isset($nav_menu_option['auto_add']))
                $auto_add_false = true;
            else
                $auto_add_false = true;*/
            global $wpdb;
            $menus = $wpdb->get_results("SELECT term_id, name FROM $terms_table WHERE name = 'Huvudmeny'");
            foreach ($menus as $menu) {
                $nav_menu_selected_id = $menu->term_id;
            }


            if (!isset($nav_menu_option['auto_add']))
                $nav_menu_option['auto_add'] = array();
            if ($auto_add) {
                if (!in_array($nav_menu_selected_id, $nav_menu_option['auto_add']))
                    $nav_menu_option['auto_add'][] = $nav_menu_selected_id;
            } else {
                if (false !== ($key = array_search($nav_menu_selected_id, $nav_menu_option['auto_add'])))
                    unset($nav_menu_option['auto_add'][$key]);
            }
            // Remove nonexistent/deleted menus
            $nav_menu_option['auto_add'] = array_intersect($nav_menu_option['auto_add'], wp_get_nav_menus(array('fields' => 'ids')));
            update_option('nav_menu_options', $nav_menu_option);

        }

        // Getting original post data
        $orig_post = $this->get_orig_blog_post($post_id);

        if (empty($orig_post))
            return false;

        $orig_post_meta = $this->get_orig_blog_post_meta($post_id);

        // Insert post in the new blog ( we should be currently on it)
        $postarr = $this->get_postarr($orig_post);

        $postarr["post_parent"] = maybe_push_parent($postarr["post_parent"], $this);

        $args = array(
            'meta_key' => 'pushed_original_id',
            'meta_value' => $post_id,
            'post_type' => $orig_post->post_type,
            'posts_per_page' => -1
        );
        $posts = get_posts($args);

        foreach ($posts as $post2) {
            $post = $post2;
            break;
        }

        if (isset($post)) { // Update
            $new_post_id = $post->ID;
            $post = $this->set_postarr($post, $postarr);
            wp_update_post($post);
        } else { // Create
            $new_post_id = wp_insert_post($postarr);
            update_post_meta($new_post_id, 'pushed_original_id', $post_id); // Set pushed meta
        }

        if ($new_post_id) {
            // Insert post meta
            $fields = array();
            foreach ($orig_post_meta as $post_meta) {
                $unserialized_meta_value = maybe_unserialize($post_meta->meta_value);

                if (substr($unserialized_meta_value, 0, 6) == "field_") {
                    $obj = get_field_object($unserialized_meta_value);

                    $fields[] = $obj;
                    update_post_meta($new_post_id, $post_meta->meta_key, $unserialized_meta_value);
                } else {
                    update_post_meta($new_post_id, $post_meta->meta_key, $unserialized_meta_value);
                }
            }

            foreach ($fields as $obj) {
                if ($obj && ($obj["type"] == "post_object" || $obj["type"] == "page_link")) {
                    foreach ($orig_post_meta as $meta2) {
                        if ($meta2->meta_key == $obj["name"]) {
                            $field_key = $meta2->meta_key;
                            $field_value = $meta2->meta_value;
                        }
                    }
                    $lpid = maybe_get_local_id($field_value);
                    update_post_meta($new_post_id, $field_key, $lpid);
                    update_post_meta($new_post_id, "_" . $obj["name"], $obj["key"]);
                }
            }

            if (!update_post_meta($new_post_id, 'orig_id', $post_id)) add_post_meta($new_post_id, 'orig_id', $post_id);
            if (!update_post_meta($new_post_id, 'orig_blog_id', $this->orig_blog_id)) add_post_meta($new_post_id, 'orig_blog_id', $this->orig_blog_id);
            if (!update_post_meta($new_post_id, 'is_pushed', true)) add_post_meta($new_post_id, 'is_pushed', true);
        }

        // Add to menu if not exists
        if ($this->push_menu) {


            // Push to submenu
            $post = get_post($new_post_id);
            if ($post->post_parent) {


                // Get menus with auto_add enabled
                $auto_add = get_option('nav_menu_options');
                if (empty($auto_add) || !is_array($auto_add) || !isset($auto_add['auto_add'])) {
                    return;
                }
                $auto_add = $auto_add['auto_add'];
                if (empty($auto_add) || !is_array($auto_add)) {
                    return;
                }

                // Loop through the menus to find page parent
                foreach ($auto_add as $menu_id) {
                    $menu_parent = NULL;
                    $menu_items = wp_get_nav_menu_items($menu_id, array('post_status' => 'publish,draft'));
                    if (!is_array($menu_items)) {
                        continue;
                    }
                    foreach ($menu_items as $menu_item) {
                        // Item already in menu?
                        if ($menu_item->object_id == $post->ID) {
                            continue 2;
                        }
                        if ($menu_item->object_id == $post->post_parent) {
                            $menu_parent = $menu_item;
                        }
                    }
                    // Add new item
                    if ($menu_parent) {
                        wp_update_nav_menu_item($menu_id, 0, array(
                            'menu-item-object-id' => $post->ID,
                            'menu-item-object' => $post->post_type,
                            'menu-item-parent-id' => $menu_parent->ID,
                            'menu-item-type' => 'post_type',
                            'menu-item-status' => 'publish'
                        ));
                    }

                }

            }

        }
        return $new_post_id;
    }
}

function maybe_get_local_id($pid)
{
    if ($pid == 0) {
        return false;
    }
    global $wp_post_types;
    $available_posttypes = array();

    foreach ($wp_post_types as $posttype) {
        if ($posttype->name != "revision" && $posttype->name != "nav_menu_item" && $posttype->name != "acf") {
            $available_posttypes[] = $posttype->name;
        }
    }

    $existing = get_posts(array(
        "post_type" => $available_posttypes,
        "posts_per_page" => -1,
        "meta_query" => array(
            array(
                "key" => "pushed_original_id",
                "compare" => "==",
                "value" => $pid
            )
        )
    ));

    if (count($existing) == 1) {
        return $existing[0]->ID;
    } else {
        return 0;
    }
}

function maybe_push_parent($parent_id, $class)
{
    if ($parent_id == 0 || !$parent_id) {
        return 0;
    }

    $lpid = maybe_get_local_id($parent_id);

    if ($lpid == 0) {
        $new = $class->push($parent_id);

        update_post_meta(intval($new["new_post_id"]), 'mcp_pushed', true);
        update_post_meta(intval($new["new_post_id"]), 'pushed_original_id', $parent_id);

        return $new["new_post_id"];
    }
    return $lpid;
}
