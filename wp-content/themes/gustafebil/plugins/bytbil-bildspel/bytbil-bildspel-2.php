<?php
/*
Plugin Name: BytBil Bildspel
Description: Skapa och visa bildspel med olika effekter och innehållstyper på din hemsida.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 2.3.0
Author URI: http://www.bytbil.com
*/

add_action('init', 'cptui_register_my_cpt_bildspel');
function cptui_register_my_cpt_bildspel()
{
    register_post_type('bildspel', array(
            'label' => 'Bildspel',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'bildspel', 'with_front' => true),
            'query_var' => true,
            'supports' => array('title', 'revisions'),
            'labels' => array(
                'name' => 'Bildspel',
                'singular_name' => 'Bildspel',
                'menu_name' => 'Bildspel',
                'add_new' => 'Lägg till Bildspel',
                'add_new_item' => 'Lägg till nytt Bildspel',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera Bildspel',
                'new_item' => 'Ny Bildspel',
                'view' => 'Visa Bildspel',
                'view_item' => 'Visa Bildspel',
                'search_items' => 'Sök Bildspel',
                'not_found' => 'Inga Bildspel hittade',
                'not_found_in_trash' => 'Inga Bildspel i papperskorgen',
                'parent' => 'Bildspelets förälder',
            )
        )
    );
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_bytbil-bildspel',
        'title' => 'BytBil Bildspel',
        'fields' => array(
            array(
                'key' => 'field_1426667753838',
                'label' => 'Bilder',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_1426667962231',
                'label' => 'Lägg till innehåll',
                'name' => 'bb-slideshow-slides',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_1426668100408',
                        'label' => 'Innehåll',
                        'name' => 'bb-slideshow-type',
                        'type' => 'radio',
                        'column_width' => '',
                        'choices' => array(
                            'image' => 'Bild och text',
                            'offer' => 'Erbjudande',
                            'video' => 'Videoklipp',
                            'search' => 'Bilsök',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'image',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_5509703cb938c',
                        'label' => 'Sökmotor',
                        'name' => 'bb-slideshow-assortment',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'search',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'assortment',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_540ce12c5721ac',
                        'label' => 'Sökmotorns rubrik',
                        'name' => 'bb-slideshow-assortment-header',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'search',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => 'Sök och hitta bilar i lager',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_55097071b938d',
                        'label' => 'Rubrikfärg',
                        'name' => 'bb-slideshow-assortment-header-color',
                        'type' => 'radio',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'search',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'black' => 'Svart',
                            'white' => 'Vit',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'black',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_550970c4b938e',
                        'label' => 'Erbjudande',
                        'name' => 'bb-slideshow-offer',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'offer',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'offer',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_55097103b938f',
                        'label' => 'Använd annat innehåll',
                        'name' => 'bb-slideshow-offer-text',
                        'type' => 'radio',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'offer',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'no' => 'Nej',
                            'yes' => 'Ja',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'no',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_5509716fb9390',
                        'label' => 'Videoklipp',
                        'name' => 'bb-slideshow-video',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'video',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'youtube' => 'YouTube-klipp',
                            'file' => 'Eget videoklipp',
                        ),
                        'default_value' => 'youtube',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_550971c9b9391',
                        'label' => 'YouTube-ID',
                        'name' => 'bb-slideshow-video-youtubeid',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'video',
                                ),
                                array(
                                    'field' => 'field_5509716fb9390',
                                    'operator' => '==',
                                    'value' => 'youtube',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_550971f3b9393',
                        'label' => 'Eget klipp',
                        'name' => 'bb-slideshow-video-file',
                        'type' => 'file',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'video',
                                ),
                                array(
                                    'field' => 'field_5509716fb9390',
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
                        'key' => 'field_1426668191759',
                        'label' => 'Bild',
                        'name' => 'bb-slideshow-image',
                        'type' => 'image',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'image',
                                ),
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'video',
                                ),
                                array(
                                    'field' => 'field_55097103b938f',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ),
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'search',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_5509834ccba1c',
                        'label' => 'Använd bildtext',
                        'name' => 'bb-slideshow-use-caption',
                        'type' => 'true_false',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'image',
                                ),
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'offer',
                                ),
                                array(
                                    'field' => 'field_55097103b938f',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_55097216b9395',
                        'label' => 'Bildtext : Innehåll',
                        'name' => 'bb-slideshow-caption-content',
                        'type' => 'repeater',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5509834ccba1c',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                                array(
                                    'field' => 'field_55097103b938f',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_55097291b9397',
                                'label' => 'Textstil',
                                'name' => 'bb-slideshow-text-style',
                                'type' => 'select',
                                'column_width' => '',
                                'choices' => array(
                                    'header' => 'Rubrik',
                                    'paragraph' => 'Brödtext',
                                    'button' => 'Knapp',
                                ),
                                'default_value' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'field_55097320b9398',
                                'label' => 'Innehåll',
                                'name' => 'bb-slideshow-text-contents',
                                'type' => 'text',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_55097291b9397',
                                            'operator' => '==',
                                            'value' => 'header',
                                        ),
                                        array(
                                            'field' => 'field_55097291b9397',
                                            'operator' => '==',
                                            'value' => 'paragraph',
                                        ),
                                    ),
                                    'allorany' => 'any',
                                ),
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_55097359b939a',
                                'label' => 'Textfärg',
                                'name' => 'bb-slideshow-text-color',
                                'type' => 'radio',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_55097291b9397',
                                            'operator' => '==',
                                            'value' => 'header',
                                        ),
                                        array(
                                            'field' => 'field_55097291b9397',
                                            'operator' => '==',
                                            'value' => 'paragraph',
                                        ),
                                    ),
                                    'allorany' => 'any',
                                ),
                                'column_width' => '',
                                'choices' => array(
                                    'black' => 'Svart',
                                    'white' => 'Vit',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 'black',
                                'layout' => 'horizontal',
                            ),
                            array(
                                'key' => 'field_5509744ab939c',
                                'label' => 'Knapptext',
                                'name' => 'bb-slideshow-button-text',
                                'type' => 'text',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_55097291b9397',
                                            'operator' => '==',
                                            'value' => 'button',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_5509746ab939d',
                                'label' => 'Knappfärg',
                                'name' => 'bb-slideshow-button-color',
                                'type' => 'radio',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_55097291b9397',
                                            'operator' => '==',
                                            'value' => 'button',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'choices' => array(
                                    'white' => 'Vit',
                                    'black' => 'Svart',
                                    'gray' => 'Grå',
                                    'green' => 'Turkos',
                                    'blue' => 'Mörkblå',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 'white',
                                'layout' => 'horizontal',
                            ),
                            array(
                                'key' => 'field_5509856fcba22',
                                'label' => 'Justering',
                                'name' => 'bb-slideshow-text-adjustment',
                                'type' => 'select',
                                'column_width' => '',
                                'choices' => array(
                                    'left' => 'Vänster',
                                    'center' => 'Centrerad',
                                    'right' => 'Höger',
                                ),
                                'default_value' => 'left',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => 3,
                        'layout' => 'row',
                        'button_label' => 'Lägg till innehåll',
                    ),
                    array(
                        'key' => 'field_5509838bcba1e',
                        'label' => 'Bildtext : Bakgrundsfärg',
                        'name' => 'bb-slideshow-caption-background',
                        'type' => 'radio',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5509834ccba1c',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            '#ffffff' => 'Vit',
                            '#000000' => 'Svart',
                            '#68a9ad' => 'Turkos',
                            '#2d3343' => 'Mörkblå',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '#ffffff',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_55098531cba21',
                        'label' => 'Bildtext : Genomskinlighet',
                        'name' => 'bb-slideshow-caption-opacity',
                        'type' => 'number',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5509834ccba1c',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => 100,
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '%',
                        'min' => 0,
                        'max' => 100,
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_550983e5cba20',
                        'label' => 'Bildtext : Position',
                        'name' => 'bb-slideshow-caption-position',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5509834ccba1c',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'left' => 'Vänster',
                            'middle' => 'Centrerad',
                            'right' => 'Höger',
                            'top' => 'Centrerad i överkant',
                            'topleft' => 'Vänster i överkant',
                            'topright' => 'Höger i överkant',
                            'bottom' => 'Centrerad i underkant',
                            'bottomleft' => 'Vänster i underkant',
                            'bottomright' => 'Höger i underkant',
                        ),
                        'default_value' => 'left',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_550974b3a57b4',
                        'label' => 'Länka slide',
                        'name' => 'bb-slideshow-link',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '==',
                                    'value' => 'image',
                                ),
                                array(
                                    'field' => 'field_55097103b938f',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'no' => 'Nej',
                            'internal' => 'Ja, en lokal sida',
                            'external' => 'Ja, en extern sida',
                            'file' => 'Ja, till en fil',
                        ),
                        'default_value' => 'no',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_5509751aa57b5',
                        'label' => 'Sida',
                        'name' => 'bb-slideshow-link-page',
                        'type' => 'page_link',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_550974b3a57b4',
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
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_5509754ba57b6',
                        'label' => 'URL',
                        'name' => 'bb-slideshow-link-url',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_550974b3a57b4',
                                    'operator' => '==',
                                    'value' => 'external',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5509757da57b7',
                        'label' => 'Fil',
                        'name' => 'bb-slideshow-link-file',
                        'type' => 'file',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_550974b3a57b4',
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
                        'key' => 'field_5509759aa57b8',
                        'label' => 'Öppna länk i',
                        'name' => 'bb-slideshow-link-target',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_550974b3a57b4',
                                    'operator' => '!=',
                                    'value' => 'no',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            '_self' => 'Samma fönster',
                            '_blank' => 'Ny flik',
                            'lightbox' => 'Lightbox',
                        ),
                        'default_value' => '_self',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_55097623a57b9',
                        'label' => 'Använd datumstyrning',
                        'name' => 'bb-slideshow-date',
                        'type' => 'radio',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_1426668100408',
                                    'operator' => '!=',
                                    'value' => 'offer',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'false' => 'Nej',
                            'true' => 'Ja',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'false',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_55097662a57ba',
                        'label' => 'Startdatum',
                        'name' => 'bb-slideshow-date-start',
                        'type' => 'date_picker',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_55097623a57b9',
                                    'operator' => '==',
                                    'value' => 'true',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'date_format' => 'yymmdd',
                        'display_format' => 'dd/mm/yy',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_55097684a57bb',
                        'label' => 'Slutdatum',
                        'name' => 'bb-slideshow-date-stop',
                        'type' => 'date_picker',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_55097623a57b9',
                                    'operator' => '==',
                                    'value' => 'true',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'date_format' => 'yymmdd',
                        'display_format' => 'dd/mm/yy',
                        'first_day' => 1,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till innehåll',
            ),
            array(
                'key' => 'field_550976d15b0fe',
                'label' => 'Inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_550976e25b0ff',
                'label' => 'Visningstid',
                'name' => 'bb-slideshow-settings-duration',
                'type' => 'number',
                'default_value' => 6,
                'placeholder' => '',
                'prepend' => '',
                'append' => 'sekunder',
                'min' => 1,
                'max' => 15,
                'step' => '',
            ),
            array(
                'key' => 'field_550977435b100',
                'label' => 'Animation',
                'name' => 'bb-slideshow-settings-animation',
                'type' => 'select',
                'choices' => array(
                    'fade' => 'Tona in/ut',
                    'slide' => 'Glid in/ut',
                ),
                'default_value' => 'fade',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_550977aa5b101',
                'label' => 'Animationshastighet',
                'name' => 'bb-slideshow-settings-speed',
                'type' => 'number',
                'default_value' => 600,
                'placeholder' => '',
                'prepend' => '',
                'append' => 'millisekunder',
                'min' => 0,
                'max' => 2000,
                'step' => '',
            ),
            array(
                'key' => 'field_550978035b102',
                'label' => 'Åt vilket håll',
                'name' => 'bb-slideshow-settings-direction',
                'type' => 'select',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_550977435b100',
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
                'default_value' => 'horizontal',
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

if (function_exists('add_image_size')) {
    add_image_size('bildspel-1170x400', 1170, 400, true);
}

function bb_show_slideshow($id)
{ ?>

    <div class="flexslider">
        <ul class="slides">
            <?php
            while (have_rows('bb-slideshow-slides', $id)) {
                the_row();

                $show_slide = false;

                $slideshow_date = get_sub_field('bb-slideshow-date');

                if ($slideshow_date == 'true') {
                    $start_date = get_sub_field('bb-slideshow-date-start');
                    $stop_date = get_sub_field('bb-slideshow-date-stop');
                    if (date('Ymd') >= $start_date && date('Ymd') <= $stop_date) {
                        $show_slide = true;
                    }
                } else {
                    $show_slide = true;
                }

                if ($show_slide == true) { // Start showing slides
                    $slideshow_type = get_sub_field('bb-slideshow-type');
                    $slideshow_use_caption = get_sub_field('bb-slideshow-use-caption');
                    $slideshow_link = get_sub_field('bb-slideshow-link');

                    if ($slideshow_link != 'no') {
                        $target = get_sub_field('bb-slideshow-link-target');

                        if ($slideshow_link == 'internal') {
                            $url = get_sub_field('bb-slideshow-link-page');
                        } elseif ($slideshow_link == 'external') {
                            $url = get_sub_field('bb-slideshow-link-url');
                        } elseif ($slideshow_link == 'file') {
                            $file = get_sub_field('bb-slideshow-link-file');
                            $url = $file['url'];
                        }
                    }

                    if ($slideshow_type == 'image' || $slideshow_type == 'search') {
                        $image_object = get_sub_field('bb-slideshow-image');
                        $size = 'bildspel-1170x400';
                        $image_url = $image_object['sizes'][$size];
                        $image_alt = $slideshow_image_object['alt'];
                        $image_title = $slideshow_image_object['title'];
                    }

                    if ($slideshow_type == 'image') { // Bild med text-slide
                        ?>
                        <li class="<?php echo $slideshow_type; ?>">
                            <?php if ($slideshow_link != 'no') { ?>
                            <a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
                                <?php } ?>
                                <img src="<?php echo $image_url; ?>"
                                     alt="<?php echo $image_alt; ?>"
                                     title="<?php echo $image_alt; ?>"/>

                                <?php

                                if ($slideshow_use_caption == true) { // Check if it has Caption

                                    $caption_contents = get_sub_field('bb-slideshow-caption-content');
                                    $caption_background = get_sub_field('bb-slideshow-caption-background');
                                    $caption_opacity = get_sub_field('bb-slideshow-caption-opacity');
                                    $caption_position = get_sub_field('bb-slideshow-caption-position');

                                    // Set text-color for caption
                                    if ($caption_background == '#ffffff') {
                                        $caption_color = 'black-text';
                                    } else {
                                        $caption_color = 'white-text';
                                    }

                                    // Set background-color for caption
                                    if ($caption_opacity != 100) {
                                        $opacity = $caption_opacity * 0.01;
                                        $caption_background_color = hex2rgba($caption_background, $opacity);
                                    } else {
                                        $caption_background_color = $caption_background;
                                    }

                                    ?>

                                    <div class="caption">
                                        <div class="vertical-align-wrapper">
                                            <div class="vertical-align <?php echo $caption_position; ?>">
                                                <div class="horizontal-align">
                                                    <div class="caption-contents <?php echo $caption_color; ?>"
                                                         style="background: <?php echo $caption_background_color; ?>;">
                                                        <?php

                                                        while (have_rows('bb-slideshow-caption-content', $id)) {
                                                            the_row();

                                                            $caption_text_style = get_sub_field('bb-slideshow-text-style');
                                                            $caption_text_color = get_sub_field('bb-slideshow-text-color');
                                                            $caption_text_adjustment = get_sub_field('bb-slideshow-text-adjustment');
                                                            $caption_text_contents = get_sub_field('bb-slideshow-text-contents');

                                                            // Header
                                                            if ($caption_text_style == 'header') { ?>
                                                                <h2 class="caption-title <?php echo $caption_text_color . ' ' . $caption_text_adjustment; ?>">
                                                                    <?php echo $caption_text_contents; ?>
                                                                </h2>
                                                            <?php } // Paragraph
                                                            elseif ($caption_text_style == 'paragraph') { ?>
                                                                <p class="caption-paragraph <?php echo $caption_text_color . ' ' . $caption_text_adjustment; ?>">
                                                                    <?php echo $caption_text_contents; ?>
                                                                </p>
                                                            <?php } // Button
                                                            elseif ($caption_text_style == 'button') {
                                                                $caption_button_text = get_sub_field('bb-slideshow-button-text');
                                                                $caption_button_color = get_sub_field('bb-slideshow-button-color');
                                                                ?>
                                                                <span
                                                                    class="caption-button <?php echo $caption_button_color . ' ' . $caption_text_adjustment; ?>">
                                                                    <?php echo $caption_button_text; ?>
                                                                </span>
                                                                <div class="clearfix"></div>
                                                            <?php
                                                            }

                                                        } // end caption-contents loop
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                                <?php if ($slideshow_link != 'no') { ?>
                            </a>
                        <?php } ?>

                        </li>
                    <?php } elseif ($slideshow_type == 'search') { // Sökmotor-slide
                        $slideshow_assortment = get_sub_field('bb-slideshow-assortment');
                        $slideshow_assortment_header = get_sub_field('bb-slideshow-assortment-header');
                        $slideshow_header_color = get_sub_field('bb-slideshow-assortment-header-color');
                        ?>

                        <li class="<?php echo $slideshow_type; ?>">

                            <img src="<?php echo $image_url; ?>"
                                 alt="<?php echo $image_alt; ?>"
                                 title="<?php echo $image_alt; ?>"/>

                            <div class="caption search-caption">
                                <div class="vertical-align-wrapper">
                                    <div class="vertical-align middle">
                                        <div class="horizontal-align full-width">
                                            <div class="caption-contents <?php echo $slideshow_header_color; ?>">
                                                <h2 class="search-title"><?php echo $slideshow_assortment_header; ?></h2>
                                                <?php bytbil_show_assortment_search($slideshow_assortment->ID); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                    <?php } elseif ($slideshow_type == 'offer') { // Offer-slide
                        $slideshow_offer = get_sub_field('bb-slideshow-offer');
                        $show_offer = false;

                        $start_date = get_field('offer-date-start',$slideshow_offer->ID);
                        $stop_date = get_field('offer-date-stop',$slideshow_offer->ID);

                        $show_offer = bytbil_check_offer_date($start_date, $stop_date);

                        if($show_offer==true):


                        $offer_image = get_field('offer-image', $slideshow_offer->ID);
                        $offer_link = get_permalink($slideshow_offer->ID);
                        $offer_header = $slideshow_offer->post_title;
                        $target = '_self';
                        $size = 'bildspel-1170x400';
                        $image_url = $offer_image['sizes'][$size];
                        $image_alt = $offer_image['alt'];
                        $image_title = $offer_image['title'];
                        ?>

                        <li class="<?php echo $slideshow_type; ?>">

                            <?php if ($slideshow_link != 'no') { ?>
                            <a href="<?php echo $offer_link; ?>" target="<?php echo $target; ?>">
                                <?php } else { ?>
                                <a href="<?php echo $offer_link; ?>" target="<?php echo $target; ?>">
                                    <?php } ?>

                                    <?php

                                    // Use other content

                                    $caption_contents = get_sub_field('bb-slideshow-caption-content');
                                    $caption_background = get_sub_field('bb-slideshow-caption-background');
                                    $caption_opacity = get_sub_field('bb-slideshow-caption-opacity');
                                    $caption_position = get_sub_field('bb-slideshow-caption-position');

                                    // Set text-color for caption
                                    if ($caption_background == '#ffffff') {
                                        $caption_color = 'black-text';
                                    } else {
                                        $caption_color = 'white-text';
                                    }

                                    // Set background-color for caption
                                    if ($caption_opacity != 100) {
                                        $opacity = $caption_opacity * 0.01;
                                        $caption_background_color = hex2rgba($caption_background, $opacity);
                                    } else {
                                        $caption_background_color = $caption_background;
                                    }

                                    if (get_sub_field('bb-slideshow-offer-text') == 'yes') {

                                        $image = get_sub_field('bb-slideshow-image');
                                        $size = 'bildspel-1170x400';
                                        $image_url = $image['sizes'][$size];
                                        $image_alt = $image['alt'];
                                        $image_title = $image['title'];

                                        ?>

                                        <img src="<?php echo $image_url; ?>"
                                             alt="<?php echo $image_alt; ?>"
                                             title="<?php echo $image_alt; ?>"/>

                                        <div class="caption">
                                            <div class="vertical-align-wrapper">
                                                <div class="vertical-align <?php echo $caption_position; ?>">
                                                    <div class="horizontal-align">
                                                        <div class="caption-contents <?php echo $caption_color; ?>"
                                                             style="background: <?php echo $caption_background_color; ?>;">
                                                            <?php

                                                            while (have_rows('bb-slideshow-caption-content', $id)) {
                                                                the_row();

                                                                $caption_text_style = get_sub_field('bb-slideshow-text-style');
                                                                $caption_text_color = get_sub_field('bb-slideshow-text-color');
                                                                $caption_text_adjustment = get_sub_field('bb-slideshow-text-adjustment');
                                                                $caption_text_contents = get_sub_field('bb-slideshow-text-contents');

                                                                // Header
                                                                if ($caption_text_style == 'header') { ?>
                                                                    <h2 class="caption-title <?php echo $caption_text_color . ' ' . $caption_text_adjustment; ?>">
                                                                        <?php echo $caption_text_contents; ?>
                                                                    </h2>
                                                                <?php } // Paragraph
                                                                elseif ($caption_text_style == 'paragraph') { ?>
                                                                    <p class="caption-paragraph <?php echo $caption_text_color . ' ' . $caption_text_adjustment; ?>">
                                                                        <?php echo $caption_text_contents; ?>
                                                                    </p>
                                                                <?php } // Button
                                                                elseif ($caption_text_style == 'button') {
                                                                    $caption_button_text = get_sub_field('bb-slideshow-button-text');
                                                                    $caption_button_color = get_sub_field('bb-slideshow-button-color');
                                                                    ?>
                                                                    <span
                                                                        class="caption-button <?php echo $caption_button_color . ' ' . $caption_text_adjustment; ?>">
                                                        <?php echo $caption_button_text; ?>
                                                    </span>
                                                                    <div class="clearfix"></div>
                                                                <?php
                                                                }

                                                            } // end caption-contents loop
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    } else {?>
                                        <img src="<?php echo $image_url; ?>"
                                             alt="<?php echo $image_alt; ?>"
                                             title="<?php echo $image_alt; ?>"/>

                                        <div class="caption">
                                            <div class="vertical-align-wrapper">
                                                <div class="vertical-align <?php echo $caption_position; ?>">
                                                    <div class="horizontal-align">
                                                        <div class="caption-contents white"
                                                             style="background: <?php echo $caption_background_color; ?>;">
                                                            <h2><?php echo $offer_header; ?></h2>
                                                    <span class="caption-button green">
                                                        Se hela erbjudandet
                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }

                                    ?>
                                </a>
                        </li>
                        <?php endif; ?>

                    <?php } elseif ($slideshow_type == 'video') { // Video-slide
                        ?>

                        <li class="<?php echo $slideshow_type; ?>">
                            <div class="video-container">
                                <?php
                                $slideshow_video_type = get_sub_field('bb-slideshow-video');

                                $placeholder_image = get_sub_field('bb-slideshow-image');

                                if($placeholder_image){
                                    $size = 'bildspel-1170x400';
                                    $image_url = $placeholder_image['sizes'][$size];
                                    ?>

                                    <img src="<?php echo $image_url; ?>" class="placeholder-image"/>
                                    <?php if ($slideshow_video_type == 'youtube') {
                                        $slideshow_video_youtubeid = get_sub_field('bb-slideshow-video-youtubeid');
                                        ?>
                                        <script>
                                            var youtube_video = '<iframe width="100%" height="100%" src="//www.youtube.com/embed/<?php echo $slideshow_video_youtubeid; ?>?autoplay=1" frameborder="0" allowfullscreen>';
                                            jQuery('.placeholder-image').click(function(e){
                                                e.preventDefault();
                                                $(this).replaceWith(youtube_video);
                                                $('.flexslider').flexslider('pause');
                                            });
                                        </script>
                                    <?php } elseif($slideshow_video_type == 'file') {
                                        $slideshow_video_file = get_sub_field('bb-slideshow-video-file');
                                        ?>
                                        <script>
                                            var file_video = '<video controls autoplay><source src="<?php echo $slideshow_video_file['url']; ?>" type="video/mp4">Tyvärr stödjer inte din webbläsare videoklipp.</video>';
                                            jQuery('.placeholder-image').click(function(e){
                                                e.preventDefault();
                                                $(this).replaceWith(file_video);
                                                $('.flexslider').flexslider('pause');
                                            });
                                        </script>
                                    <?php } ?>

                                <?php
                                } else {


                                if ($slideshow_video_type == 'youtube') {
                                    $slideshow_video_youtubeid = get_sub_field('bb-slideshow-video-youtubeid');
                                    ?>

                                    <iframe
                                        width="100%"
                                        height="100%"
                                        src="//www.youtube.com/embed/<?php echo $slideshow_video_youtubeid; ?>"
                                        frameborder="0" allowfullscreen>
                                    </iframe>

                                <?php }

                                elseif ($slideshow_video_type == 'file') {

                                    $slideshow_video_file = get_sub_field('bb-slideshow-video-file');
                                    ?>

                                    <video controls>
                                        <source src="<?php echo $slideshow_video_file['url']; ?>" type="video/mp4">
                                        Tyvärr stödjer inte din webbläsare videoklipp.
                                    </video>

                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </li>

                    <?php }
                }
            }

            ?>
        </ul>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function () {

            var smoothHeightVal = true;

            if( $(window).width() < 500 ) {
                smoothHeightVal = false;
            }

            jQuery('.flexslider').flexslider({

                <?php
                    if (get_field('bb-slideshow-settings-animation',$id)=='slide'){
                        $settings_direction = get_field('bb-slideshow-settings-direction',$id);
                    } else {
                        $settings_direction = 'horizontal';
                    }
                ?>
                animation: '<?php echo get_field('bb-slideshow-settings-animation',$id); ?>',
                direction: '<?php echo $settings_direction; ?>',
                slideshowSpeed: <?php echo get_field('bb-slideshow-settings-duration',$id)*1000; ?>,
                animationSpeed: <?php echo get_field('bb-slideshow-settings-speed',$id); ?>,
                pauseOnHover: true,
                animationLoop: false,
                useCSS: true,
                touch: true,
                controlNav: true,
                directionNav: true,
                smoothHeight: smoothHeightVal,
                after: function (slider) {
                    if (!slider.playing) {
                        slider.pause();
                        slider.play();
                        slider.off("mouseenter mouseleave");
                        slider.off("mouseover mouseout");
                        slider.mouseover(function () {
                            if (!slider.manualPlay && !slider.manualPause) {
                                slider.pause();
                            }
                        }).mouseout(function () {
                            if (!slider.manualPause && !slider.manualPlay && !slider.stopped) {
                                slider.play();
                            }
                        });
                    }
               },
            });

        });
    </script>


<?php } // end - bb_show_slideshow()

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
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}

?>
