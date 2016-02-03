<?php
/*
Plugin Name: BytBil Bildspel
Description: Skapa och visa slideshow med olika effekter och innehållstyper på din hemsida.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 3.0.1
Author URI: http://www.bytbil.com
*/
add_action('init', 'cptui_register_my_cpt_slideshow');
function cptui_register_my_cpt_slideshow()
{
    register_post_type('slideshow', array(
        'label' => 'Bildspel',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'slideshow', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Bildspel',
            'singular_name' => 'Bildspel',
            'menu_name' => 'Bildspel',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till bildspel',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera bildspel',
            'new_item' => 'Nytt bildspel',
            'view' => 'Visa bildspel',
            'view_item' => 'Visa bildspel',
            'search_items' => 'Sök bildspel',
            'not_found' => 'Inga bildspel hittade',
            'not_found_in_trash' => 'Inga bildspel i papperskorgen',
            'parent' => 'Bildspelets förälder',
        )
    ));
}
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_bildspel',
        'title' => 'Bildspel',
        'fields' => array(
            array(
                'key' => 'field_5523f7196aa25',
                'label' => 'Bilder',
                'name' => 'slideshow-slides',
                'type' => 'flexible_content',
                'layouts' => array(
                    array(
                        'label' => 'Bild och text',
                        'name' => 'slideshow-image-text',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5523f80b6aa27',
                                'label' => 'Välj bild',
                                'name' => 'slideshow-image-object',
                                'type' => 'image',
                                'instructions' => 'Ladda upp eller välj en bild du vill visa i bildspelet.',
                                'required' => 1,
                                'column_width' => '',
                                'save_format' => 'object',
                                'preview_size' => 'thumbnail',
                                'library' => 'all',
                            ),
                            array(
                                'key' => 'field_5523f93e6aa2a',
                                'label' => 'Textrutans innehåll',
                                'name' => 'slideshow-caption-content',
                                'type' => 'wysiwyg',
                                'instructions' => 'Skriv i innehållet du vill visa i textrutan på bildspelet',
                                'column_width' => '',
                                'default_value' => '',
                                'toolbar' => 'full',
                                'media_upload' => 'no',
                            ),
                            array(
                                'key' => 'field_5523fa566aa2d',
                                'label' => 'Textrutans bakgrundsfärg',
                                'name' => 'slideshow-caption-color',
                                'type' => 'color_picker',
                                'instructions' => 'Välj vilken färg textrutan skall ha',
                                'column_width' => '',
                                'default_value' => 'transparent',
                            ),
                            array(
                                'key' => 'field_5523fbec6aa30',
                                'label' => 'Textrutans styrka',
                                'name' => 'slideshow-caption-opacity',
                                'type' => 'number',
                                'instructions' => 'Fyll i en styrka för genomskinligheten på textrutans bakgrund.',
                                'column_width' => '',
                                'default_value' => 0,
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '%',
                                'min' => 0,
                                'max' => 100,
                                'step' => '',
                            ),
                            /*array(
                                'key' => 'field_55265fcf85b35',
                                'label' => 'Animera textrutan',
                                'name' => 'slideshow-caption-animation',
                                'type' => 'select',
                                'instructions' => 'Välj om du vill visa textrutan med en animeringseffekt.',
                                'column_width' => '',
                                'choices' => array(
                                    'none' => 'Ingen',
                                    'fade' => 'Tona in',
                                    'left' => 'Glid in från vänster',
                                    'right' => 'Glid in från höger',
                                ),
                                'default_value' => 'none',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),*/
                            /*array(
                                'key' => 'field_5523fc276aa31',
                                'label' => 'Visa kantram',
                                'name' => 'slideshow-caption-border',
                                'type' => 'radio',
                                'instructions' => 'Välj om textrutan skall ha en kantram.',
                                'column_width' => '',
                                'choices' => array(
                                    'false' => 'Nej',
                                    'true' => 'Ja',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 'false',
                                'layout' => 'horizontal',
                            ),*/
                            array(
                                'key' => 'field_5523fa7d6aa2e',
                                'label' => 'Textrutans position',
                                'name' => 'slideshow-caption-position',
                                'type' => 'radio',
                                'instructions' => 'Bestäm vart i bilden textrutan skall placeras.',
                                'column_width' => '',
                                'choices' => array(
                                    'center' => 'Centrerad',
                                    'left' => 'Vänster',
                                    'right' => 'Höger',
                                    'top-center' => 'Centrerad i överkant',
                                    'top-left' => 'Vänster i överkant',
                                    'top-right' => 'Höger i överkant',
                                    'bottom-center' => 'Centrerad i underkant',
                                    'bottom-left' => 'Vänster i underkant',
                                    'bottom-right' => 'Höger i överkant',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 'center',
                                'layout' => 'horizontal',
                            ),
                            array(
                                'key' => 'field_5523fcb86aa33',
                                'label' => 'Länka slide till',
                                'name' => 'slideshow-link-type',
                                'type' => 'radio',
                                'instructions' => 'Välj om du vill länka hela bilden till ett innehåll.',
                                'column_width' => '',
                                'choices' => array(
                                    'none' => 'Ingenting',
                                    'internal' => 'Intern sida',
                                    'external' => 'Extern URL',
                                    'file' => 'Fil eller media',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 'none',
                                'layout' => 'horizontal',
                            ),
                            array(
                                'key' => 'field_5523fd0e6aa34',
                                'label' => 'Sida',
                                'name' => 'slideshow-link-internal',
                                'type' => 'post_object',
                                'instructions' => 'Välj en sida som bilden skall länka till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_5523fcb86aa33',
                                            'operator' => '==',
                                            'value' => 'internal',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'post_type' => array(
                                    0 => 'page',
                                    1 => 'offer',
                                    2 => 'vehicle',
                                    3 => 'news',
                                ),
                                'taxonomy' => array(
                                    0 => 'all',
                                ),
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'field_5523fd376aa35',
                                'label' => 'URL',
                                'name' => 'slideshow-link-external',
                                'type' => 'text',
                                'instructions' => 'Fyll i en adress bilden skall länka till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_5523fcb86aa33',
                                            'operator' => '==',
                                            'value' => 'external',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => 'www.bytbil.com',
                                'prepend' => 'http://',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_5523fd876aa36',
                                'label' => 'Fil',
                                'name' => 'slideshow-link-file',
                                'type' => 'file',
                                'instructions' => 'Välj eller ladda upp en fil bilden skall länka till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_5523fcb86aa33',
                                            'operator' => '==',
                                            'value' => 'file',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'save_format' => 'object',
                                'library' => 'all',
                            ),
                            array(
                                'key' => 'field_5524e3243b328',
                                'label' => 'Visa från',
                                'name' => 'slideshow-date-start',
                                'type' => 'date_picker',
                                'instructions' => 'Fyll i det datum bilden skall visas från.',
                                'column_width' => '',
                                'date_format' => 'yymmdd',
                                'display_format' => 'dd/mm/yy',
                                'first_day' => 1,
                            ),
                            array(
                                'key' => 'field_5524e33d3b329',
                                'label' => 'Visa till',
                                'name' => 'slideshow-date-stop',
                                'type' => 'date_picker',
                                'instructions' => 'Fyll i det datum bilden skall visas till.',
                                'column_width' => '',
                                'date_format' => 'yymmdd',
                                'display_format' => 'dd/mm/yy',
                                'first_day' => 1,
                            ),
                        ),
                    ),
                ),
                'button_label' => 'Lägg till bild',
                'min' => '',
                'max' => '',
            ),
            /*array(
                'key' => 'field_5524d5783ff4f',
                'label' => 'Utseende',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5526604f366aa',
                'label' => 'Bilddimension',
                'name' => 'slideshow-dimension',
                'type' => 'radio',
                'instructions' => 'Välj vilken dimension du vill att bildspelet ska ha.',
                'choices' => array(
                    'standard' => 'Standard',
                    'rectangular' => 'Rektangulär',
                    'square' => 'Kvadratisk',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_552660cb366ab',
                'label' => 'Kantram',
                'name' => 'slideshow-border',
                'type' => 'checkbox',
                'instructions' => 'Bocka i om du vill visa en kantram på bildspelet',
                'choices' => array(
                    'true' => 'Ja',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),*/
            array(
                'key' => 'field_55266131366ac',
                'label' => 'Ramfärg',
                'name' => 'slideshow-border-color',
                'type' => 'color_picker',
                'instructions' => 'Välj en färg du vill rama in bildspelet med.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_552660cb366ab',
                            'operator' => '==',
                            'value' => 'true',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            /*array(
                'key' => 'field_552661a6366ad',
                'label' => 'Effekter',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_552661b4366ae',
                'label' => 'Animationseffekt',
                'name' => 'slideshow-animation',
                'type' => 'select',
                'instructions' => 'Välj den animationseffekt bilderna skall växla med.',
                'choices' => array(
                    'fade' => 'Tona in / ut',
                    'slide' => 'Glid in / ut',
                ),
                'default_value' => 'fade',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_5526630b366b1',
                'label' => 'Glid in från',
                'name' => 'slideshow-animation-slide',
                'type' => 'select',
                'instructions' => 'Välj åt vilket håll bilderna skall glida in.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_552661b4366ae',
                            'operator' => '==',
                            'value' => 'slide',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'horizontal' => 'Vågrätt',
                    'vertical' => 'Lodrätt',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_552661e6366af',
                'label' => 'Animationshastighet',
                'name' => 'slideshow-animation-speed',
                'type' => 'select',
                'instructions' => 'Välj vilken animationshastighet bilderna skall växla med.',
                'choices' => array(
                    600 => 'Standard',
                    250 => 'Snabb',
                    950 => 'Långsam',
                ),
                'default_value' => 600,
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_55266245366b0',
                'label' => 'Tid per bild',
                'name' => 'slideshow-speed',
                'type' => 'number',
                'instructions' => 'Fyll i det antal sekunder varje bild skall visas i.',
                'default_value' => 7,
                'placeholder' => '',
                'prepend' => '',
                'append' => 'sekunder',
                'min' => '',
                'max' => '',
                'step' => '',
            ),*/
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'slideshow',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
                6 => 'slug',
                7 => 'author',
                8 => 'format',
                9 => 'featured_image',
                10 => 'categories',
                11 => 'tags',
                12 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}
function bytbil_show_slideshow($slideshow = false)
{

    if (!$slideshow) {
        $slideshow = get_field('retailer-slideshow', 'options');
    }

    if ($slideshow) {
        $id = $slideshow->ID;
        if (have_rows('slideshow-slides', $id)) {
            while (have_rows('slideshow-slides', $id)) {
                the_row();

                $show_slide = false;

                // Check date
                if (get_sub_field('slideshow-date-start')) {
                    $start_date = get_sub_field('slideshow-date-start');
                } else {
                    $start_date = date('Ymd');
                }

                if (get_sub_field('slideshow-date-stop')) {
                    $stop_date = get_sub_field('slideshow-date-stop');
                } else {
                    $stop_date = date('Ymd');
                }

                if (date('Ymd') >= $start_date && date('Ymd') <= $stop_date) {
                    $show_slide = true;
                }

                if ($show_slide) {
                    $image_object = get_sub_field('slideshow-image-object'); // Välj bild
                    $image = wp_get_attachment_image_src($image_object['id'], 'slideshow-full');

                    $image_ratio = round($image[1]/$image[2], 2);

                    if ($image_ratio != 3.33 && $image[1] >= 960 && $image[2] >= 288) {
                        $image = wp_get_attachment_image_src($image_object['id'], 'slideshow-960');
                    }
                    elseif ($image_ratio != 3.33 && $image[1] >= 640 && $image[2] >= 192) {
                        $image = wp_get_attachment_image_src($image_object['id'], 'slideshow-640');
                    }
                    elseif ($image_ratio != 3.33 && $image[1] >= 320 && $image[2] >= 96) {
                        $image = wp_get_attachment_image_src($image_object['id'], 'slideshow-320');
                    }

                    $image_url = $image[0];

                    $slideshow_link = get_sub_field('slideshow-link-type'); // Länka slide till
                    // Check slide-link
                    if ($slideshow_link == 'internal') {
                        $internal = get_sub_field('slideshow-link-internal'); // Sida
                        $url = get_permalink($internal->ID);
                        $target = "_self";
                    } elseif ($slideshow_link == 'external') {
                        $url = get_sub_field('slideshow-link-external'); // URL
                        $target = "_blank";
                    } elseif ($slideshow_link == 'file') {
                        $file = get_sub_field('slideshow-link-file'); // Fil
                        $url = $file['url'];
                        $target = "_blank";
                    }?>
                    <li class="<?php echo $slideshow_type ?>">

                        <?php if ($slideshow_link != 'none') { ?>
                        <a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
                        <?php } ?>

                            <img src="<?php echo $image_url; ?>"
                                 alt="<?php echo $image_alt; ?>"
                                 title="<?php echo $image_title; ?>"
                                />


                            <?php
                            if (get_sub_field('slideshow-caption-content')) {
                                //Register caption-fields
                                $caption_background_color = 'background: transparent;';
                                $caption_contents = get_sub_field('slideshow-caption-content'); // Textrutans innehåll
                                $caption_background = get_sub_field('slideshow-caption-color'); // Textrutans bakgrundsfärg
                                $caption_opacity = get_sub_field('slideshow-caption-opacity'); // Textrutans styrka
                                //$caption_border = get_sub_field('slideshow-caption-border');
                                $caption_position = get_sub_field('slideshow-caption-position'); // Textrutans position
                                // Set caption-color
                                if ($caption_opacity != 100) {
                                    $opacity = $caption_opacity * 0.01;
                                    $caption_background_color = 'background: ' . hex2rgba($caption_background, $opacity) . ';';
                                } else {
                                    $caption_background_color = 'background: ' . $caption_background . ';';
                                }
                                if (!$caption_background) {
                                    $caption_background_color = 'background: transparent;';
                                }
                                // Set caption-order
                                //if ($caption_border == 'true') {
                                    //$caption_border_color = 'border: 10px solid ' . hex2rgba($caption_background, 0.75) . ';';
                                //} else {
                                    //$caption_border_color = 'none';
                                //}
                                //Set caption-style
                                if ($caption_background_color) {
                                    $caption_style = $caption_background_color;
                                }
                                ?>
                                <div class="caption-wrapper">
                                    <div class="caption">
                                        <div class="vertical-align-wrapper">
                                            <div class="vertical-align <?php echo $caption_position; ?>">
                                                <div class="horizontal-align">
                                                    <div class="caption-contents"
                                                         style="<?php echo $caption_style; ?>">
                                                        <?php echo $caption_contents; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        if ($slideshow_link != 'none') : ?>
                            </a>
                        <?php endif;
                }
            }
        }
    }
}

/* HEX Till RGBA Function */
function hex2rgba($color, $opacity = false)
{

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if (empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb = array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    }
    elseif ($opacity == '0') {
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    }else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}

if (function_exists('add_image_size')) {
    // 3.33
    add_image_size('slideshow-full', 1920, 576, true);
    add_image_size('slideshow-standard', 1170, 351, true);
    add_image_size('slideshow-960', 960, 288, true);
    add_image_size('slideshow-640', 640, 192, true);
    add_image_size('slideshow-320', 320, 96, true);
}

?>

