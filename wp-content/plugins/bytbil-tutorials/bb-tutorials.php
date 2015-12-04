<?php
/**
 * Plugin Name: Bytbil-Tutorials
 * Plugin URI: http://www.bytbil.com
 * Description: Hjälp för kunder
 * Version: 1.0
 * Author: Leo Starcevic
 * Author URI:
 */
add_action('init', 'cptui_register_my_cpt_help_type');
function cptui_register_my_cpt_help_type()
{
    register_post_type('help-type', array(
        'label' => 'Hjälp sida',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'help-type', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels' => array(
            'name' => 'Hjälpavsnitt',
            'singular_name' => '',
            'menu_name' => 'help-type',
            'add_new' => 'Lägg till hjälpavsnitt',
            'add_new_item' => 'Lägg till nytt hjälpavsnitt',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera hjälpavsnitt',
            'new_item' => 'Nytt hjälpavsnitt',
            'view' => 'Visa hjälpavsnitt',
            'view_item' => 'Visa hjälpavsnitt',
            'search_items' => 'Sök hjälpavsnitt',
            'not_found' => 'Hittade inga hjälpavsnitt',
            'not_found_in_trash' => 'Inga hjälpavsnitt hittades i papperskorgen',
            'parent' => 'Parent help-type',
        )
    ));
}


if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_help-pages',
        'title' => 'help-pages',
        'name' => 'help-pages',
        'fields' => array(
            array(
                'key' => 'field_541bd286bdbe4',
                'label' => 'Hjälpsida',
                'name' => 'help-page_repeater',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_541bd28bbdbe5',
                        'label' => 'Rubrik',
                        'name' => 'help-page_title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_541bd2a9bdbe6',
                        'label' => 'Beskrivning',
                        'name' => 'help-page_content',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'formatting' => 'br',
                    ),
                    array(
                        'key' => 'field_541beaaa5e1eb',
                        'label' => 'Instruktionsvideo',
                        'name' => 'help-page_video',
                        'type' => 'file',
                        'save_format' => 'id',
                        'library' => 'all',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till hjälpsida',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'help-type',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
                6 => 'revisions',
                7 => 'slug',
                8 => 'author',
                9 => 'format',
                10 => 'featured_image',
                11 => 'categories',
                12 => 'tags',
                13 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}


//Creates Menu
add_action("admin_menu", "createHelpMenu");
function createHelpMenu()
{
    add_menu_page("Help Menu", "Hjälp", 0, "help-pages", "help_pages_function");
    //Check if current user is admin
    if (current_user_can('manage_options')) {
        add_submenu_page("help-pages", "Administration", "Administration", 0, "edit.php?post_type=help-type");
    }
}

//JS & CSS
add_action('admin_enqueue_scripts', 'bb_tutorials_scripts', 0);
function bb_tutorials_scripts()
{
    wp_enqueue_script('bb_tutorials_scripts', plugin_dir_url() . 'bytbil-tutorials/bb-tutorials.js', array(), '1.0.0', true);
    wp_register_style('custom_wp_admin_css', plugin_dir_url() . 'bytbil-tutorials/bb-tutorials.css', false, '1.0.0');
    wp_enqueue_style('custom_wp_admin_css');
}


function help_pages_function()
{
    $args = array('post_type' => 'help-type', 'posts_per_page' => 10);
    $loop = new WP_Query($args); ?>

    <div class="wrap help_pages">
        <h2>Välkommen till hjälpsidan för CMS</h2>
        <hr/>
        <p>
            Här kan du bland annat få hjälp, instruktioner och få support-information för denna CMS-tjänst.
        <h4>Vad vill du ha hjälp med?</h4>
        </p>

        <!-- Search -->
        <!--<?php get_search_form(); ?>-->
        <form role="search" method="get" class="search-form" action="<?php echo home_url('/wp-admin'); ?>">
            <label>
                <span class="screen-reader-text"><?php echo _x('Search for:', 'label') ?></span>
                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Sök', 'placeholder') ?>"
                       value="<?php echo get_search_query() ?>" name="s"
                       title="<?php echo esc_attr_x('Search for:', 'label') ?>"/>
            </label>
            <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Sök', 'submit button') ?>"/>
        </form>

        <p>
            VIDEOKLIPP
        <hr/>
        Kom igång eller fördjupa dig med vårt bibliotek av videoklipp.
        </p>
        <div class="help-videos">
            <?php

            while ($loop->have_posts()) : $loop->the_post(); ?>

                <?php if (have_rows('help-page_repeater')):
                    while (have_rows('help-page_repeater')) : the_row();

                        if (get_sub_field('help-page_video')) { ?>

                            <?php $meta_array = array(wp_get_attachment_metadata(get_sub_field('help-page_video')));
                            $video_length = $meta_array[0]['length_formatted']; ?>

                            <span class="video-container">
					        		<video id="video-player" width="230px" controls>
                                        <source
                                            src="<?php echo wp_get_attachment_url(get_sub_field('help-page_video'));?>"
                                            type="video/mp4">
                                        Din webbläsare stödjer inte HTML5 video.
                                    </video>
									<span class="video-description">
										<span class="title"><?php echo $loop->post->post_title; ?></span><br/>
                                        <?php the_sub_field('help-page_title'); ?>
									</span>
									<div class="playbutton">
                                        <button class="controls play">
                                            <i class="fa fa-play"></i> Se klipp
                                        </button>
                                        <span class="time"><?php echo $video_length; ?> min</span>
                                    </div>
								</span>

                        <?php } ?>
                    <?php endwhile;
                else :
                endif; ?>
            <?php endwhile; ?>
        </div>
        <p>
            SUPPORT
        <hr/>
        Kom igång eller fördjupa dig genom att läsa beskrivningar hur de olika funktionerna fungerar.
        </p>

        <div id="accordion">

            <?php
            while ($loop->have_posts()) : $loop->the_post(); ?>

                <div class="accordion-toggle"><i class="fa fa-play"></i> <?php the_title(); ?></div>
                <div class="accordion-sub">

                    <?php if (have_rows('help-page_repeater')):
                        while (have_rows('help-page_repeater')) : the_row(); ?>
                            <div class="accordion-toggle">
                                <i class="fa fa-play"></i> <?php the_sub_field('help-page_title'); ?>
                            </div>
                            <div class="accordion-content">
                                <?php the_sub_field('help-page_content');

                                if (get_sub_field('help-page_video')) {
                                    ?>
                                    <?php $meta_array = array(wp_get_attachment_metadata(get_sub_field('help-page_video')));
                                    $video_length = $meta_array[0]['length_formatted']; ?>

                                    <span class="video-container">
					        		<video id="video-player" width="230px" controls>
                                        <source
                                            src="<?php echo wp_get_attachment_url(get_sub_field('help-page_video'));?>"
                                            type="video/mp4">
                                        Din webbläsare stödjer inte HTML5 video.
                                    </video>
									<span class="video-description">
										<span class="title"><?php echo $loop->post->post_title; ?></span><br/>
                                        <?php the_sub_field('help-page_title'); ?>

										
									</span>
									<div class="playbutton">
                                        <button class="controls play">
                                            <i class="fa fa-play"></i> Se klipp
                                        </button>
                                        <span class="time"><?php echo $video_length; ?> min</span>
                                    </div>

								</span>
                                <?php } ?>
                            </div>
                        <?php endwhile;

                    else :

                    endif; ?>

                </div>

            <?php endwhile; ?>
        </div>
    </div>

<?php
}

?>