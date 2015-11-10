<?php

class Multisite_Content_Push_Post_Push extends Multisite_Content_Push_Page_Push
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
        error_log("\n" . serialize(var_dump($post_id)));

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

        $args = array(
            'meta_key' => 'pushed_original_id',
            'meta_value' => $post_id,
            'post_type' => 'post',
            'posts_per_page' => 999999
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
            foreach ($orig_post_meta as $post_meta) {
                $unserialized_meta_value = maybe_unserialize($post_meta->meta_value);
                update_post_meta($new_post_id, $post_meta->meta_key, $unserialized_meta_value);
            }
            if (!update_post_meta($new_post_id, 'orig_id', $post_id)) add_post_meta($new_post_id, 'orig_id', $post_id);
            if (!update_post_meta($new_post_id, 'orig_blog_id', $this->orig_blog_id)) add_post_meta($new_post_id, 'orig_blog_id', $this->orig_blog_id);
            if (!update_post_meta($new_post_id, 'is_pushed', true)) add_post_meta($new_post_id, 'is_pushed', true);
        }

        // Add to menu if not exists
        if ($this->push_menu) {

            /*
            $menus = get_registered_nav_menus();
            $menus2 = array();
            foreach($menus as $menu) {
                if($menu == "Huvudmeny")
                    $menus2[] = "'".$menu."'";
            }

            $blog_id = get_current_blog_id();

            if($blog_id == 1) {
                $terms_table = "wp_terms";
                $term_rs_table = "wp_term_relationships";
                $post_table = "wp_posts";
                $postmeta_table = "wp_postmeta";
            }
            else {
                $terms_table = "wp_".$blog_id."_terms";
                $term_rs_table = "wp_".$blog_id."_term_relationships";
                $post_table = "wp_".$blog_id."_posts";
                $postmeta_table = "wp_".$blog_id."_postmeta";
            }

            global $wpdb;
            $menus3 = $wpdb->get_results( "SELECT term_id, name FROM $terms_table WHERE name in (".implode(',',$menus2).")" );
            foreach($menus3 as $menu) {

                $query= "SELECT p.ID, pl.meta_value, p.post_title, p.post_name, p.menu_order, n.post_name AS n_name, n.post_title AS n_title, m.meta_value, pp.meta_value AS menu_parent ".
                        " FROM wp_term_relationships AS txr".
                        " INNER JOIN wp_posts AS p ON txr.object_id = p.ID".
                        " LEFT JOIN wp_postmeta AS m ON p.ID = m.post_id".
                        " LEFT JOIN wp_postmeta AS pl ON p.ID = pl.post_id".
                        " AND pl.meta_key =  '_menu_item_object_id'".
                        " LEFT JOIN wp_postmeta AS pp ON p.ID = pp.post_id".
                        " AND pp.meta_key =  '_menu_item_menu_item_parent'".
                        " LEFT JOIN wp_posts AS n ON pl.meta_value = n.ID".
                        " WHERE txr.term_taxonomy_id =".$menu->term_id.
                        " AND p.post_status =  'publish'".
                        " AND p.post_type =  'nav_menu_item'".
                        " AND m.meta_key =  '_menu_item_url'".
                        " ORDER BY p.menu_order" ;
                $menu_items = $wpdb->get_results($query);

                $found = false;

                foreach($menu_items as $menu_item) {
                    if((int)$menu_item->ID == $new_post_id)
                        $found = true;
                }

                if(!$found) {
                    var_dump("Menu push time!");

                    $nav_menu_item_data = array(
                        "post_title" => "",
                        "post_type" => "nav_menu_item",
                        "post_status" => "publish",
                    );

                    $nav_menu_item_id = wp_insert_post($nav_menu_item_data);
                    var_dump($nav_menu_item_id);


                    $wpdb->insert(
                        $postmeta_table,
                        array(
                            'post_id' => $nav_menu_item_id,
                            'meta_key' => '_menu_item_url',
                            'meta_value' => ''
                        ),
                        array(
                            '%d','%s','%d'
                        )
                    );
                    $wpdb->insert(
                        $postmeta_table,
                        array(
                            'post_id' => $nav_menu_item_id,
                            'meta_key' => '_menu_item_xfn',
                            'meta_value' => ''
                        ),
                        array(
                            '%d','%s','%d'
                        )
                    );
                    $wpdb->insert(
                        $postmeta_table,
                        array(
                            'post_id' => $nav_menu_item_id,
                            'meta_key' => '_menu_item_classes',
                            'meta_value' => 'a:1:{i:0;s:0:"";}'
                        ),
                        array(
                            '%d','%s','%d'
                        )
                    );
                    $wpdb->insert(
                        $postmeta_table,
                        array(
                            'post_id' => $nav_menu_item_id,
                            'meta_key' => '_menu_item_target',
                            'meta_value' => ''
                        ),
                        array(
                            '%d','%s','%d'
                        )
                    );
                    $wpdb->insert(
                        $postmeta_table,
                        array(
                            'post_id' => $nav_menu_item_id,
                            'meta_key' => '_menu_item_object',
                            'meta_value' => 'page'
                        ),
                        array(
                            '%d','%s','%d'
                        )
                    );
                    $wpdb->insert(
                        $postmeta_table,
                        array(
                            'post_id' => $nav_menu_item_id,
                            'meta_key' => '_menu_item_object_id',
                            'meta_value' => $new_post_id
                        ),
                        array(
                            '%d','%s','%d'
                        )
                    );
                    $wpdb->insert(
                        $postmeta_table,
                        array(
                            'post_id' => $nav_menu_item_id,
                            'meta_key' => '_menu_item_menu_item_parent',
                            'meta_value' => 0
                        ),
                        array(
                            '%d','%s','%d'
                        )
                    );
                    $wpdb->insert(
                        $postmeta_table,
                        array(
                            'post_id' => $nav_menu_item_id,
                            'meta_key' => '_menu_item_type',
                            'meta_value' => 'post_type'
                        ),
                        array(
                            '%d','%s','%d'
                        )
                    );

                    $wpdb->insert(
                        $term_rs_table,
                        array(
                            'object_id' => $nav_menu_item_id,
                            'term_taxonomy_id' => $menu->term_id,
                            'term_order' => 0
                        ),
                        array(
                            '%d',
                            '%d',
                            '%d'
                        )
                    );
                }
                else {
                    var_dump("Found!");
                }
            }
            */

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
                    //var_dump("MENU PARENT:");
                    //var_dump($menu_parent);

                }

            }

        }

        //var_dump("NEW POST ID:");
        //var_dump($new_post_id);

        return $new_post_id;
    }
}