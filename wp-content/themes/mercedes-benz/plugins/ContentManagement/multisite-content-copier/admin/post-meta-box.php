<?php

class MCC_Post_Meta_Box
{

    public function __construct()
    {
        add_action('add_meta_boxes', array(&$this, 'add_meta_box'), 10, 2);
        add_action('admin_enqueue_scripts', array(&$this, 'enqueue_scripts'));
    }

    public function enqueue_scripts($hook)
    {
        if ($hook == 'post.php' && is_super_admin()) {
            wp_enqueue_script('mcc-meta-box', MULTISTE_CC_ASSETS_URL . 'js/meta-box.js', array('jquery'));

            $object = array(
                'select_an_option' => "Du måste välja minst en site att pusha till.",
                'select_a_group' => "Du måste välja en sitegrupp."
            );
            wp_localize_script('mcc-meta-box', 'mcc_meta_texts', $object);
        }
    }

    public function add_meta_box($post_type, $post)
    {

        if (!is_super_admin())
            return;

        if (get_current_blog_id() !== get_master_site_id()) {
            return;
        }

        $post_types = array();
        $_post_types = mcc_get_registered_cpts();
        foreach ($_post_types as $post_type)
            $post_types[] = $post_type->name;

        $post_types = array_merge($post_types, array('post', 'page'));

        foreach ($post_types as $post_type) {
            add_meta_box(
                'copier-meta-box',
                "Content Push",
                array(&$this, 'render_copier_meta_box'),
                $post_type,
                'normal',
                'default'
            );
        }
    }

    public function render_copier_meta_box($post)
    {

        if (!in_array($post->post_status, array('publish', 'draft', 'pending'))) {
            echo '<p>Var god spara sidan eller inlägget innan du pushar.</p>';
        } else {
            $settings = array(
                'post_ids' => array($post->ID),
                'class' => 'Multisite_Content_Copier_Post_Copier'
            );
            ?>
            <h4>Välj destination</h4>
            <?php if (get_post_meta($post->ID, 'mcc_copied')): ?>
                <?php if ($post->post_type == "page") : ?>
                    <p>Du har redan pushat denna sida.</p>
                <?php else : ?>
                    <p>Du har redan pushat detta inlägg.</p>
                <?php endif; ?>
            <?php endif; ?>
            <div style="/*margin-left:20px;*/">
                <input name="mcc_dest_blog_type" type="hidden" value="specific"/>
                <table style="margin-bottom: 40px;" class="wp-list-table widefat fixed sites">
                    <thead>
                        <tr>
                            <th scope="col" class="manage-column column-cb check-column">
                                <label class="screen-reader-text" for="cb-select-all-2">Välj alla</label>
                                <input type="checkbox" id="cb-select-all-2"/>
                            </th>
                            <th colspan="1" class="manage-column" scope="col">
                                ID
                            </th>
                            <th colspan="10" scope="col" class="manage-column">
                                <a href="#"><span>Site</span></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sites = wp_get_sites();
                        ?>

                        <?php foreach ($sites as $site) : ?>
                            <?php
                                $blog_details = get_blog_details($site["blog_id"]);
                            ?>
                            <tr class="alternate">
                                <th scope="row" class="check-column">
                                    <label class="screen-reader-text" for="blog_<?php echo $site["blog_id"] ?>">
                                        Välj <?php echo $blog_details->blogname ?>
                                    </label>
                                    <input type="checkbox" name="mcp_dest_blogs[]"
                                           id="blog_<?php echo $site["blog_id"]; ?>" value="<?php echo $site["blog_id"]; ?>"/>
                                </th>
                                <td colspan="1">
                                    <?php echo $site["blog_id"]; ?>
                                </td>
                                <td colspan="10">
                                    <?php echo $blog_details->blogname; ?> <br/>
                                    <a href="//<?php echo $site["domain"]; ?>"><?php echo $site["domain"] ?></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col" class="manage-column column-cb check-column">
                                <label class="screen-reader-text" for="cb-select-all-2">Välj alla</label>
                                <input type="checkbox" id="cb-select-all-2"/>
                            </th>
                            <th colspan="1" class="manage-column" scope="col">
                                ID
                            </th>
                            <th colspan="10" scope="col" class="manage-column">
                                <a href="#"><span>Site</span></a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
                <p style="display: none;">
                    <label>
<!--                        <input type="radio" name="mcc_dest_blog_type" value="all">-->
                        Alla siter
                    </label>
                </p>

                <p style="display: none;">
                    <label>
<!--                        <input type="radio" name="mcc_dest_blog_type" value="group">-->
                        Sitegrupp
                    </label>
                    <select name="mcc_group" id="mcc_group">
                        <?php mcc_get_groups_dropdown(); ?>
                    </select>
                </p>
                <?php $settings = mcc_get_settings(); ?>
                <?php if ($settings['blog_templates_integration']): ?>
                    <p>
                        <label>
<!--                            <input type="radio" name="mcc_dest_blog_type" value="nbt_group">-->
                            Blogtemplates-grupp
                        </label>
                        <select name="mcc_nbt_group" id="mcc_nbt_group">
                            <?php mcc_get_nbt_groups_dropdown(); ?>
                        </select>
                    </p>
                <?php endif; ?>
            </div>
            <!--<h4><?php /*_e( 'Additional Options', MULTISTE_CC_LANG_DOMAIN ); */ ?></h4>-->
            <?php
            switch ($post->post_type) {
                case 'post':
                    $options = mcc_get_post_additional_settings();
                    break;
                case 'page':
                    $options = mcc_get_page_additional_settings();
                    break;
                default:
                    $options = mcc_get_cpt_additional_settings();
                    break;
            }
            ?>
            <!--<ul style="margin-left:20px;">
					<?php /*foreach ( $options as $option_slug => $label ): */ ?>
						<li><label><input type="checkbox" class="mcc_options" name="<?php /*echo $option_slug; */ ?>" value="<?php /*echo $option_slug; */ ?>"></input> <?php /*echo $label; */ ?></label></li>
					<?php /*endforeach; */ ?>
				</ul>-->
            <input type="hidden" class="mcc_options" name="copy_images" value="copy_images">
            <?php
            $link = add_query_arg(
                array(
                    'content_blog' => get_current_blog_id(),
                    'post_id' => $post->ID,
                    'mcc_action' => 'mcc_submit_metabox'
                ),
                Multisite_Content_Copier::$network_main_menu_page->get_permalink()
            );
            $link = wp_nonce_url($link, 'mcc_submit_meta_box');
            ?>
            <a id="mcc_copy_link" class="button-primary"
               href="<?php echo esc_url($link); ?>"><?php _e('Push', MULTISTE_CC_LANG_DOMAIN); ?></a>
        <?php
        }
    }


}