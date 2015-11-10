<?php

class MCP_Post_Meta_Box
{

    public function __construct()
    {
        add_action('add_meta_boxes', array(&$this, 'add_meta_box'), 10, 2);
        add_action('admin_enqueue_scripts', array(&$this, 'enqueue_scripts'));
    }

    public function enqueue_scripts($hook)
    {
        if ($hook == 'post.php' && is_super_admin()) {
            wp_enqueue_script('mcp-meta-box', MULTISTE_CP_ASSETS_URL . 'js/meta-box.js', array('jquery'));

            $object = array(
                'select_an_option' => __('You must select a destination', MULTISTE_CP_LANG_DOMAIN),
                'select_a_group' => __('You must select a group', MULTISTE_CP_LANG_DOMAIN)
            );
            wp_localize_script('mcp-meta-box', 'mcp_meta_texts', $object);
        }
    }

    public function add_meta_box($post_type, $post)
    {

        if (!is_super_admin())
            return;

        // Check if master site
        $isMaster = get_option('multisite_master');
        if (!$isMaster)
            return;

        $post_types = array();
        $_post_types = mcp_get_registered_cpts();
        foreach ($_post_types as $post_type)
            $post_types[] = $post_type->name;

        $post_types = array_merge($post_types, array('post', 'page'));

        foreach ($post_types as $post_type) {
            add_meta_box(
                'push-meta-box',
                __('Multisite Content Push', MULTISTE_CP_LANG_DOMAIN),
                array(&$this, 'render_push_meta_box'),
                $post_type,
                'normal',
                'default'
            );
        }
    }

    public function render_push_meta_box($post)
    {

        if (!in_array($post->post_status, array('publish', 'draft', 'pending'))) {
            echo '<p>' . __('Please save this post if you would like to push it.', MULTISTE_CP_LANG_DOMAIN) . '</p>';
        } else {
            $settings = array(
                'post_ids' => array($post->ID),
                'class' => 'Multisite_Content_Push_Post_Push'
            );
            ?>
            <h4><?php _e('Select destinations', MULTISTE_CP_LANG_DOMAIN); ?></h4>
            <?php if (get_post_meta($post->ID, 'mcp_pushed')): ?>
                <p><?php _e('Du har redan pushat denna post. Om du pushar igen så kan lokala ändringar skrivas över.', MULTISTE_CP_LANG_DOMAIN); ?></p>
            <?php endif; ?>
            <div style="margin-left:0px;">

                <table class="wp-list-table widefat fixed sites" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col" class="manage-column column-cb check-column" style="">
                            <label class="screen-reader-text" for="cb-select-all-2">Välja alla</label>
                            <input id="cb-select-all-2" type="checkbox">
                        </th>
                        <th scope="col" class="manage-column">
                            <a href="#"><span>Site</span></a>
                        </th>
                        <th scope="col" class="manage-column">
                            <a href="#"><span>Tidigare version</span></a>
                        </th>
                        <th scope="col" class="manage-column">
                            Ändringar
                        </th>
                        <th scope="col" class="manage-column" style=" width: 50px; ">pid</th>
                        <th scope="col" class="manage-column" style=" width: 120px; ">Publicerad av</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th scope="col" class="manage-column column-cb check-column" style="">
                            <label class="screen-reader-text" for="cb-select-all-2">Välja alla</label>
                            <input id="cb-select-all-2" type="checkbox">
                        </th>
                        <th scope="col" class="manage-column">
                            <a href="#"><span>Site</span></a>
                        </th>
                        <th scope="col" class="manage-column">
                            <a href="#"><span>Tidigare version</span></a>
                        </th>
                        <th scope="col" class="manage-column">Ändringar</th>
                        <th scope="col" class="manage-column">pid</th>
                        <th scope="col" class="manage-column">Publicerad av</th>
                    </tr>
                    </tfoot>

                    <tbody id="the-list">
                    <?php
                    $blogs = get_blog_list(0, 'all');
                    $current_site = get_current_site();
                    $site_id = $current_site->id;
                    $blog_id = get_current_blog_id();
                    //var_dump($post);
                    $slug = get_post($post)->post_name;
                    $title = get_post($post)->post_title;
                    global $wpdb;

                    foreach ($blogs as $blog):
                        if ($blog_id == $blog['blog_id']) // Skip if current blog
                            continue;

                        switch_to_blog($blog['blog_id']);
                        $description = get_bloginfo('description');
                        $blog_details = get_blog_details($blog['blog_id']);
                        if ($blog_details->site_id != $site_id || $blog_id == $blog_details->blog_id) // Not in this network or current page
                            continue;
                        $blog_id = $blog['blog_id'];
                        if ($blog_id == 1)
                            $post_table = "wp_postmeta";
                        else
                            $post_table = "wp_" . $blog_id . "_postmeta";

                        $blog_post_id = $wpdb->get_var("SELECT post_id FROM $post_table WHERE meta_key = 'pushed_original_id' AND meta_value = " . $post->ID);

                        if (!empty($blog_post_id)) {
                            $blog_post = get_post($blog_post_id);

                            $author_id = $blog_post->post_author;
                            $author_info = get_userdata($author_id);
                            $permalink = get_blog_permalink($blog_id, $blog_post_id);

                        }
                        //var_dump($blog_post);

                        ?>
                        <tr class="alternate">
                            <th scope="row" class="check-column">
                                <label class="screen-reader-text"
                                       for="blog_<?php echo $blog['blog_id']?>">Välj <?php echo $blog_details->blogname ?></label>
                                <input type="checkbox" id="blog_<?php echo $blog['blog_id']?>" name="mcp_dest_blogs[]"
                                       value="<?php echo $blog['blog_id']?>">
                            </th>
                            <td><?php echo $blog_details->blogname . " <br/><small><i> " . $description . "</i><br/><a href='http://" . $blog["domain"] . $blog["path"] . "' target='_blank'>" . $blog["domain"] . $blog["path"] . "</a></small>"?></td>
                            <td valign="top"><?php echo (isset($blog_post->post_modified) && isset($blog_post_id)) ? ("<a href='" . $permalink . "' target='_blank'>" . $blog_post->post_modified . "</a>") : "Ingen tidigare version" ?></td>
                            <td valign="top"><?php echo (isset($blog_post->post_content) && isset($blog_post_id)) ? (($blog_post->post_content != $post->post_content) ? "Ja" : "Nej") : "-" ?></td>
                            <td valign="top"><?php echo (isset($blog_post_id)) ? $blog_post_id : "-" ?></td>
                            <td valign="top"><?php echo (isset($blog_post_id)) ? $author_info->user_login : "-" ?></td>
                        </tr>
                        <?php
                        restore_current_blog();
                    endforeach;
                    ?>
                    </tbody>
                </table>

                <p style="display: none;">
                    <label>
                        <input type="radio" name="mcp_dest_blog_type" value="all" checked>
                        <?php _e('All sites', MULTISTE_CP_LANG_DOMAIN); ?>
                    </label>
                </p>

                <p style="display: none;">
                    <label>
                        <input type="radio" name="mcp_dest_blog_type" value="group">
                        <?php _e('Site group', MULTISTE_CP_LANG_DOMAIN); ?>
                    </label>
                    <select name="mcp_group" id="mcp_group">
                        <?php mcp_get_groups_dropdown(); ?>
                    </select>
                </p>
                <?php $settings = mcp_get_settings(); ?>
                <?php if ($settings['blog_templates_integration']): ?>
                    <p style="display: none;">
                        <label>
                            <input type="radio" name="mcp_dest_blog_type" value="nbt_group">
                            <?php _e('Select by Blog Templates groups', MULTISTE_CP_LANG_DOMAIN); ?>
                        </label>
                        <select name="mcp_nbt_group" id="mcp_nbt_group">
                            <?php mcp_get_nbt_groups_dropdown(); ?>
                        </select>
                    </p>
                <?php endif; ?>
            </div>
            <h4><?php _e('Meny', MULTISTE_CP_LANG_DOMAIN); ?></h4>
            <ul style="margin-left:20px;">
                <li><label><input type="checkbox" class="mcp_options" name="push_menu" value="ok"></input>Pusha till
                        meny (om sidan ej redan finns i menyn)</label></li>
            </ul>
            <h4 style="display: none;"><?php _e('Fler inställningar', MULTISTE_CP_LANG_DOMAIN); ?></h4>
            <?php
            switch ($post->post_type) {
                case 'post':
                    $options = mcp_get_post_additional_settings();
                    break;
                case 'page':
                    $options = mcp_get_page_additional_settings();
                    break;
                default:
                    $options = mcp_get_cpt_additional_settings();
                    break;
            }
            ?>
            <ul style="margin-left:20px;">
                <?php foreach ($options as $option_slug => $label):
                    if ($option_slug != 'push_parents') {
                        $hidden = ' style="display: none;" ';
                    } else {
                        $hidden = '';
                    }

                    $hidden = ' style="display: none;" ';

                    ?>
                    <li<?php echo $hidden; ?>><label><input type="checkbox" class="mcp_options"
                                                            name="<?php echo $option_slug; ?>"
                                                            value="<?php echo $option_slug; ?>"></input> <?php echo $label; ?>
                        </label></li>
                <?php endforeach; ?>
            </ul>
            <?php
            $link = add_query_arg(
                array(
                    'content_blog' => get_current_blog_id(),
                    'post_id' => $post->ID,
                    'mcp_action' => 'mcp_submit_metabox'
                ),
                Multisite_Content_Push::$network_main_menu_page->get_permalink()
            );
            $link = wp_nonce_url($link, 'mcp_submit_meta_box');
            ?>

            <?php // Menu push test stuff
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

                $new_post_id = 150; // Test value
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
                            'meta_key' => '_menu_item_object_id',
                            'meta_value' => $new_post_id
                        ),
                        array(
                            '%d',
                            '%s',
                            '%d'
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
            }*/

            ?>
            <br/>
            <a id="mcp_push_link" class="button-primary"
               href="<?php echo esc_url($link); ?>"><?php _e('Push', MULTISTE_CP_LANG_DOMAIN); ?></a>
        <?php
        }
    }


}