<?php
/**
 * Plugin Name: BytBil Slider
 * Plugin URI:
 * Description: Bildspel för bytbil
 * Version: 0.1
 * Author: Provide IT
 * Author URI: http://www.provideit.se
 * License:
 */

//Sets up the Bildspel custom post type
add_action('init', 'cptui_register_my_cpt_bildspel');
function cptui_register_my_cpt_bildspel()
{
    register_post_type('bildspel', array(
        'label' => 'Bildspel',
        'description' => 'Bildspel',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'rewrite' => array('slug' => 'bildspel', 'with_front' => true),
        'query_var' => true,
        'publicly_queryable' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels' => array(
            'name' => 'Bildspel',
            'singular_name' => 'Bildspel',
            'menu_name' => 'Bildspel',
            'add_new' => 'Skapa bildspel',
            'add_new_item' => 'Skapa nytt bildspel',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera bildspel',
            'new_item' => 'Nytt bildspel',
            'view' => 'Visa bildspel',
            'view_item' => 'Visa bildspel',
            'search_items' => 'Sök bildspel',
            'not_found' => 'Inga bildspel hittades',
            'not_found_in_trash' => 'Inga bildspel hittades i skräp',
            'parent' => 'Parent Bildspel',
        )
    ));
}

//Slider custom fields
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_bildspel',
        'title' => 'Bildspel',
        'fields' => array(
            array(
                'key' => 'field_52e2989f9dbe7',
                'label' => 'Bildspel',
                'name' => 'start_slider',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_52e298ab9dbe8',
                        'label' => 'Bild',
                        'name' => 'imgurl',
                        'type' => 'image',
                        'column_width' => 100,
                        'save_format' => 'url',
                        'preview_size' => 'large',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_52e298ef9dbea',
                        'label' => 'Rubrik',
                        'name' => 'caption',
                        'type' => 'text',
                        'column_width' => 33,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_52e29aa99aa8c',
                        'label' => 'Rubrikfärg',
                        'name' => 'titlecolor',
                        'type' => 'color_picker',
                        'column_width' => 50,
                        'default_value' => '',
                    ),
                    array(
                        'key' => 'field_52e299009dbeb',
                        'label' => 'Underrubrik',
                        'name' => 'caption2',
                        'type' => 'text',
                        'column_width' => 33,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_52e29acf9aa8d',
                        'label' => 'Underrubrik färg',
                        'name' => 'subtitlecolor',
                        'type' => 'color_picker',
                        'column_width' => 50,
                        'default_value' => '#51d8e2',
                    ),

                    array(
                        'key' => 'field_52e299f29dbed',
                        'label' => 'Länktext',
                        'name' => 'linktext',
                        'type' => 'text',
                        'column_width' => 50,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_52e298c29dbe9',
                        'label' => 'Alt-attribut',
                        'name' => 'alt',
                        'type' => 'text',
                        'column_width' => 33,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_52e299c69dbec',
                        'label' => 'Länk',
                        'name' => 'link',
                        'type' => 'text',
                        'column_width' => 50,
                        'default_value' => '',
                        'placeholder' => 'http://www.test.se',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_52e29a4b9aa8a',
                        'label' => 'Title-attribut',
                        'name' => 'titleattr',
                        'type' => 'text',
                        'column_width' => 33,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_52e29a6a9aa8b',
                        'label' => 'Länkbeteende',
                        'name' => 'target',
                        'type' => 'select',
                        'column_width' => 33,
                        'choices' => array(
                            '_blank' => 'Nytt fönster',
                            '' => 'Samma fönster',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_52e29a2a9aa89',
                        'label' => 'Rel-attribut',
                        'name' => 'rel',
                        'type' => 'text',
                        'column_width' => 33,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),

                    array(
                        'key' => 'field_52e29b2c9aa8e',
                        'label' => 'Temporär visning',
                        'name' => 'temp',
                        'type' => 'select',
                        'column_width' => 100,
                        'choices' => array(
                            0 => 'Nej',
                            1 => 'Ja',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_52e29b7d9aa8f',
                        'label' => 'Startdatum',
                        'name' => 'start',
                        'type' => 'date_picker',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_52e29b2c9aa8e',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => 50,
                        'date_format' => 'yymmdd',
                        'display_format' => 'dd/mm/yy',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_52e29ba6363f0',
                        'label' => 'Slutdatum',
                        'name' => 'stop',
                        'type' => 'date_picker',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_52e29b2c9aa8e',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => 50,
                        'date_format' => 'yymmdd',
                        'display_format' => 'dd/mm/yy',
                        'first_day' => 1,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till slide',
            ),
            array(
                'key' => 'field_52d6d56c0a444',
                'label' => 'Tid per bild',
                'name' => 'slideduration',
                'type' => 'number',
                'instructions' => 'Tid som varje bild visas',
                'default_value' => 3,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => 0,
                'max' => '',
                'step' => 1,
            ),
            array(
                'key' => 'field_52e2a27950236',
                'label' => 'ControlNav',
                'name' => 'controlnav',
                'type' => 'select',
                'choices' => array(
                    'false' => 'Nej',
                    'true' => 'Ja',
                ),
                'default_value' => 'false',
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'bildspel',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
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


//Slider shortcode [slider name=]
function slider_func($atts)
{
    extract(shortcode_atts(array('name' => '', 'dirnav' => 'true'), $atts));
    ob_start();
    $args = array('post_type' => 'bildspel', 'name' => $name);
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post(); ?>
        <?php if (get_field('start_slider')) : ?>
            <div id="<?php echo $name; ?>-slider" class="slider flexslider">
                <ul class="slides">
                    <?php
                    while (has_sub_fields('start_slider')) : ?>
                        <?php $showslide = false;
                        if (get_sub_field('temp') == 1) {
                            $start = get_sub_field('start');
                            if (date('Ymd') >= $start) {
                                $stop = get_sub_field('stop');
                                if (date('Ymd') <= $stop) {
                                    //visa slide
                                    $showslide = true;
                                }
                            }
                        } else {
                            //visa slide
                            $showslide = true;
                        }
                        if ($showslide) { ?>
                            <li>
                                <a href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
                                    <img title="<?php the_sub_field('titleattr'); ?>"
                                         alt="<?php the_sub_field('alt'); ?>" src="<?php the_sub_field('imgurl'); ?>">

                                    <div t><?php if (get_sub_field('caption')) : ?>
                                            <div class="largetext"
                                                 style="color:<?php the_sub_field('titlecolor'); ?>"><?php the_sub_field('caption'); ?></div><?php endif; ?>
                                        <?php if (get_sub_field('caption2')) : ?>
                                            <div class="smalltext"
                                                 style="color:<?php the_sub_field('subtitlecolor'); ?>; bottom:<?php if (strlen(get_sub_field('caption2')) > 120) {
                                                     echo "50px";
                                                 } ?>"><span class="caption2"><?php the_sub_field('caption2'); ?></span>
                                            </div><?php endif; ?>
                                    </div>
                                </a>
                            </li>
                        <?php }
                    endwhile;
                    ?>
                </ul>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    var hash = window.location.hash;
                    hash = parseInt(hash.split('#')[1]);
                    var dirnav = <?php echo $dirnav ?>;

                    var nextText = "";
                    var prevText = "";
                    if (dirnav) {
                        dirnav = true;
                    } else {
                        dirnav = false;
                    }

                    $('.slider').each(function () {
                        if (hash) {
                            $(this).flexslider({
                                animation: 'slide',
                                startAt: hash,
                                animationLoop: false,
                                controlNav: true,
                                directionNav: dirnav,
                                nextText: nextText,
                                prevText: prevText
                            });
                        } else {
                            /* slidar karuselen på objektsidan */
                            $(this).flexslider({
                                animation: 'slide', /*slideshowSpeed: <?php echo get_field('slideduration')*1000; ?>,*/
                                controlNav:<?php if(get_field('controlnav')){the_field('controlnav');}else{echo "false";} ?>,
                                directionNav: dirnav,
                                nextText: nextText,
                                prevText: prevText
                            });
                        }
                    });
                });
            </script>
        <?php endif; ?>
    <?php endwhile; ?>
    <?php wp_reset_query();

    return ob_get_clean();
}

add_shortcode('slider', 'slider_func');

?>