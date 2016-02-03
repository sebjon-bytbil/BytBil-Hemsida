<?php

add_action('init', 'cptui_register_my_cpt_mb_slideshow');
function cptui_register_my_cpt_mb_slideshow()
{
    register_post_type('mb_slideshow', array(
        'label' => 'Mercedes-Benz Bildspel',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'mb_slideshow', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels' => array(
            'name' => 'Mercedes-Benz Bildspel',
            'singular_name' => 'Bildspel',
            'menu_name' => 'MB Bildspel',
            'add_new' => 'Lägg till bild',
            'add_new_item' => 'Lägg till bild',
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
        'id' => 'acf_mercedes-benz-bildspel',
        'title' => 'Mercedes-Benz Bildspel',
        'fields' => array(
            array(
                'key' => 'field_5446495a461fa',
                'label' => 'Innehåll',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_54464988461fb',
                'label' => 'Innehåll',
                'name' => 'mb-slideshow_type',
                'type' => 'select',
                'column_width' => '',
                'choices' => array(
                    'image' => 'Enbart bild',
                    'image-info' => 'Bild med text',
                    'two-objects' => 'Två objekt',
                    'offer' => 'Erbjudande',
                ),
                'default_value' => 'image',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_540fe4d49245783a',
                'label' => 'Objekt 1',
                'name' => 'mb-slideshow-object-first',
                'type' => 'post_object',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'two-objects',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'column_width' => '',
                'post_type' => array(
                    0 => 'model',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_540fe4d434569245783a',
                'label' => 'Objekt 2',
                'name' => 'mb-slideshow-object-second',
                'type' => 'post_object',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'two-objects',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'column_width' => '',
                'post_type' => array(
                    0 => 'model',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_e5fc9ca3-9043-4592-b74a-0e711b0b6f8d',
                'name' => 'mb-slideshow-two-animate',
                'label' => 'Animera objekt',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'two-objects',
                        )
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'true_false'
            ),
            array(
                'key' => 'field_0ad39c6e-2182-49dc-8b29-8563f6d71602',
                'name' => 'mb-slideshow-two-effect',
                'label' => 'Effekt',
                'type' => 'radio',
                'choices' => array(
                    'fade' => 'Tona in',
                    'slide' => 'Glid in'
                ),
                'layout' => 'horizontal',
                'default_value' => 'fade',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'two-objects',
                        ),
                        array(
                            'field' => 'field_e5fc9ca3-9043-4592-b74a-0e711b0b6f8d',
                            'operator' => '==',
                            'value' => 1
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_9c3467c8-fc81-434b-8beb-3eada1989ec4',
                'name' => 'mb-slideshow-two-pos',
                'label' => 'Position',
                'type' => 'select',
                'choices' => array(
                    'left' => 'Från vänster',
                    'right' => 'Från höger',
                    'out-in' => 'Utifrån in'
                ),
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'two-objects',
                        ),
                        array(
                            'field' => 'field_0ad39c6e-2182-49dc-8b29-8563f6d71602',
                            'operator' => "==",
                            'value' => 'slide'
                        ),
                        array(
                            'field' => 'field_e5fc9ca3-9043-4592-b74a-0e711b0b6f8d',
                            'operator' => '==',
                            'value' => 1
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_540fe4d49283a',
                'label' => 'Erbjudande',
                'name' => 'mb-slideshow-offer',
                'type' => 'post_object',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54464988461fb',
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
                'key' => 'field_544649ab461fc',
                'label' => 'Bild',
                'name' => 'mb-slideshow_image',
                'type' => 'image',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'image',
                        ),
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'image-info',
                        ),
                    ),
                    'allorany' => 'any',
                ),
                'column_width' => '',
                'save_format' => 'object',
                'preview_size' => 'full',
                'library' => 'all',
            ),
            /*array (
                'key' => 'field_544649ab461fc',
                'label' => 'Bild',
                'name' => 'mb-slideshow_image',
                'type' => 'image_crop',
                'crop_type' => 'min',
                'target_size' => 'custom',
                'width' => 1170,
                'height' => 500,
                'preview_size' => 'full',
                'force_crop' => 'yes',
                'save_in_media_library' => 'yes',
                'retina_mode' => 'no',
                'save_format' => 'object',
                "required" => true,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'image',
                        ),
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'image-info',
                        ),
                    ),
                    'allorany' => 'any',
                ),
            ),*/
            array(
                'key' => 'field_54464ab3b6412',
                'label' => 'Text',
                'name' => 'mb-slideshow_image-text',
                'type' => 'repeater',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'image-info',
                        ),
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'offer',
                        ),
                    ),
                    'allorany' => 'any',
                ),
                'column_width' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_54464b10b6413',
                        'label' => 'Innehåll',
                        'name' => 'mb-slideshow_caption-text',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_54464b68b6414',
                        'label' => 'Stil',
                        'name' => 'mb-slideshow_caption-style',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'h2' => 'Rubrik',
                            'p' => 'Bildtext',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54464e7db641a',
                        'label' => 'Placering',
                        'name' => 'mb-slideshow_caption-placement',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'left' => 'Vänster',
                            'right' => 'Höger',
                            'center' => 'Mitten',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54464bdeb6416',
                        'label' => 'Redigera utseende',
                        'name' => 'mb-slideshow_custom-animation',
                        'type' => 'checkbox',
                        'column_width' => '',
                        'choices' => array(
                            'color' => 'Textfärg',
                            'type' => 'Animationseffekt',
                            'speed' => 'Animationshastighet',
                        ),
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_54464baab6415',
                        'label' => 'Färg',
                        'name' => 'mb-slideshow_caption-color',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54464bdeb6416',

                                    'operator' => '==',
                                    'value' => 'color',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'white' => 'Vit',
                            'black' => 'Svart',
                            'blue' => 'Blå',
                        ),
                        'default_value' => '#fff',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54464bf0b6417',
                        'label' => 'Effekt',
                        'name' => 'mb-slideshow_custom-type',
                        'type' => 'checkbox',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54464bdeb6416',
                                    'operator' => '==',
                                    'value' => 'type',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'slide' => 'Glid in',
                            'fade' => 'Tona in',
                        ),
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_54464d82b6419',
                        'label' => 'Position',
                        'name' => 'mb-slideshow_custom-position',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54464bf0b6417',
                                    'operator' => '==',
                                    'value' => 'slide',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'right' => 'Från höger',
                            'left' => 'Från vänster',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54464cd6b6418',
                        'label' => 'Hastighet',
                        'name' => 'mb-slideshow_custom-speed',
                        'type' => 'number',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54464bdeb6416',
                                    'operator' => '==',
                                    'value' => 'speed',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => 300,
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => 'millisekunder',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till text',
            ),
            array(
                'key' => 'field_54464fbd506a2',
                'label' => 'Länkknappar',
                'name' => 'mb-slideshow_buttons',
                'type' => 'repeater',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'image',
                        ),
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'image-info',
                        ),
                        array(
                            'field' => 'field_54464988461fb',
                            'operator' => '==',
                            'value' => 'offer',
                        ),
                    ),
                    'allorany' => 'any',
                ),
                'column_width' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_54465012dc2fd',
                        'label' => 'Länktext',
                        'name' => 'mb-slideshow_button-text',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_54465033dc2fe',
                        'label' => 'Länka till',
                        'name' => 'mb-slideshow_button-link',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'internal' => 'Lokal sida',
                            'external' => 'Extern URL',
                            'file' => 'Fil / dokument',
                        ),
                        'default_value' => 'internal',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_540fdb2f509ad',
                        'label' => 'Fil eller media',
                        'name' => 'mb-slideshow_button-file',
                        'type' => 'file',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54465033dc2fe',
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
                        'key' => 'field_5446505cdc2ff',
                        'label' => 'Sida',
                        'name' => 'mb-slideshow_button-link-page',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54465033dc2fe',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'page',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54465075dc300',
                        'label' => 'Adress',
                        'name' => 'mb-slideshow_button-link-url',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54465033dc2fe',
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
                        'key' => 'field_54465086dc301',
                        'label' => 'Länkbeteende',
                        'name' => 'mb-slideshow_button-link-target',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            '_self' => 'Öppna i samma fönster',
                            '_blank' => 'Öppna i nytt fönster',
                            "lightbox" => "Lightbox"
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54465115dc304',
                        'label' => 'Placering',
                        'name' => 'mb-slideshow_button-placement',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'left' => 'Vänster',
                            'right' => 'Höger',
                            'center' => 'Mitten',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_544650e4dc303',
                        'label' => 'Redigera utseende',
                        'name' => 'mb-slideshow_button-custom',
                        'type' => 'checkbox',
                        'column_width' => '',
                        'choices' => array(
                            'color' => 'Knappfärg',
                            'type' => 'Animationseffekt',
                            'speed' => 'Animationshastighet',
                        ),
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_544650a2dc302',
                        'label' => 'Färg',
                        'name' => 'mb-slideshow_button-color',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544650e4dc303',
                                    'operator' => '==',
                                    'value' => 'color',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'white' => 'Vit',
                            'black' => 'Svart',
                            'gray' => 'Grå',
                            'blue' => 'Blå',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54465162dc306',
                        'label' => 'Effekt',
                        'name' => 'mb-slideshow_button-anim-type',
                        'type' => 'checkbox',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544650e4dc303',
                                    'operator' => '==',
                                    'value' => 'type',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'slide' => 'Glid in',
                            'fade' => 'Tona in',
                        ),
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_54465139dc305',
                        'label' => 'Position',
                        'name' => 'mb-slideshow_button-anim-position',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54465162dc306',
                                    'operator' => '==',
                                    'value' => 'slide',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'right' => 'Från höger',
                            'left' => 'Från vänster',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54465192dc307',
                        'label' => 'Hastighet',
                        'name' => 'mb-slideshow_button-anim-speed',
                        'type' => 'number',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544650e4dc303',
                                    'operator' => '==',
                                    'value' => 'speed',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => 'millisekunder',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till knapp',
            ),
            array(
                'key' => 'field_544651d839f1f',
                'label' => 'Inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_544659461df79',
                'label' => 'Använd datumstyrning',
                'name' => 'mb-slideshow_datecontrol',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_544659721df7a',
                'label' => 'Startdatum',
                'name' => 'mb-slideshow_date-start',
                'type' => 'date_picker',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_544659461df79',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'date_format' => 'yymmdd',
                'display_format' => 'dd/mm/yy',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_544659851df7b',
                'label' => 'Slutdatum',
                'name' => 'mb-slideshow_date-stop',
                'type' => 'date_picker',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_544659461df79',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'date_format' => 'yymmdd',
                'display_format' => 'dd/mm/yy',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_5446599e1df7c',
                'label' => 'Visa för återförsäljare',
                'name' => 'mb-slideshow_show-for',
                'type' => 'checkbox',
                'choices' => array(
                    'pb' => 'Personbilar',
                    'tb' => 'Transportbilar',
                    'lb' => 'Lastbilar',
                    'hb' => 'Hyrbilar',
                ),
                'default_value' => 'pb',
                'layout' => 'horizontal',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'mb_slideshow',
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

function get_af_slideshow($id)
{
    $animation = get_field("af-slideshow-settings-animation", $id);
    $animation_speed = get_field("af-slideshow-settings-animation-speed", $id);
    $animation_duration = get_field("af-slideshow-settings-duration", $id);
    $animation_duration = $animation_duration * 1000;

    while (have_rows('af-slideshow_images', $id)) : the_row();
        $image = get_sub_field('af-slideshow_image');
        $target = get_sub_field("af-slideshow_button-target");

        $date_control = get_sub_field("af-slideshow_date-control");
        $slideStart = strtotime(get_sub_field("af-slideshow_date-start"));
        $slideEnd = strtotime(get_sub_field("af-slideshow_date-stop"));

        if ($date_control) {
            if (!$slideStart || $slideStart > time()) {
                continue;
            }
            if (!$slideEnd || $slideEnd < time()) {
                continue;
            }
        }

        ?>
        <li class="af-image-info">
            <div class="caption <?php echo get_sub_field('af-slideshow_color'); ?>">
                <div class="info">
                    <h2><?php echo get_sub_field('af-slideshow_header'); ?></h2>

                    <p><?php echo get_sub_field('af-slideshow_text'); ?></p>
                    <?php while (have_rows('af-slideshow_link-buttons', $id)) : the_row(); ?>
                        <?php
                            $urlType = get_sub_field("af-slideshow_button-link");
                            $url = "#";

                            switch ($urlType) {
                                case "internal":
                                    $url = get_sub_field("af-slideshow_button-link-page");
                                    $url = get_permalink($url->ID);
                                    break;
                                case "external":
                                    $url = get_sub_field("af-slideshow_button-link-url");
                                    break;
                                case "file":
                                    $url = get_sub_field("af-slideshow-button-link-file");
                                    $url = $url["url"];
                                    break;
                            }
                        ?>
                        <a href="<?php echo $url; ?>" <?php if ($target == "lightbox") : ?> data-lightbox <?php elseif ($target != false) : ?> target="<?php echo $target; ?>" <?php endif; ?> class="button <?php echo get_sub_field('af-slideshow_button-color'); ?>">
                            <?php echo get_sub_field('af-slideshow_button-text'); ?> <i class="fa fa-angle-right"></i>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <img src="<?php echo $image['url'] ?>">
        </li>
    <?php
    endwhile;
    ?>
    <script>
        function animateAF(args) {
            $(args.container).find('li .caption').animate({
                bottom: '0%',
                opacity: 1
            }, 500);

            $('#af-slideshow .flex-direction-nav a').click(function () {
                $('#af-slideshow').find('li').each(function (index) {
                    if ($(this).hasClass('flex-active-slide')) {
                        $(this).find('.caption').css({
                            'bottom': '-25%',
                            'opacity': 0
                        });
                    }
                    else {
                        $(this).find('.caption').animate({
                            bottom: '-25%',
                            opacity: 0
                        }, 200);
                    }
                })
            });
        }

        $('#af-slideshow').flexslider({
            animation: "<?php echo $animation; ?>",				//String: Select your animation type, "fade" or "slide"
            slideDirection: "horizontal",	//String: Select the sliding direction, "horizontal" or "vertical"
            slideshow: true,				//Boolean: Animate slider automatically
            slideshowSpeed: <?php echo $animation_speed; ?>,			//Integer: Set the speed of the slideshow cycling, in milliseconds
            animationDuration: <?php echo $animation_duration?>,			//Integer: Set the speed of animations, in milliseconds
            directionNav: true,				//Boolean: Create navigation for previous/next navigation? (true/false)
            smoothHeight: false,
            animationLoop: false,			//Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
            pauseOnAction: true,			//Boolean: Pause the slideshow when interacting with control elements, highly recommended.
            pauseOnHover: true,			//Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
            useCSS: true,
            touch: true,
            start: animateAF,
            after: animateAF
        });
    </script>
<?php
}

function init_mb_slider()
{
    $animation = get_master_field("mb-slideshow-settings-animation", "option");
    $animation_duration = get_master_field("mb-slideshow-settings-animation-speed", "option");
    $animation_speed = get_master_field("mb-slideshow-settings-duration", "option");
    $animation_speed = $animation_speed ? $animation_speed * 1000 : 7000; ?>

    <script>
        function animateMB(args) {

            var slideCaptions = $(args.container).find('li .caption');
            slideCaptions.height(slideCaptions.parent().height()).width(slideCaptions.parent().width());
            var currentSlide = $('#mb-slideshow .slides > li.flex-active-slide');

            // Image + Info
            var imageInfoCaption = $(args.container).find('li.image-info .caption');

            imageInfoCaption.find(".slide").each(function (index) {

                var objectText = $(this).find('.text');
                var objectButtons = $(this).find('.buttons');

                objectText.css({
                    'opacity': objectText.data('startOpacity'),
                    'top': objectText.data('v-start'),
                    'left': objectText.data('h-start')
                });
                objectButtons.css({
                    'opacity': objectButtons.data('startOpacity'),
                    'top': objectButtons.data('v-start'),
                    'left': objectButtons.data('h-start')
                });

                if (currentSlide.hasClass('image-info')) {

                    objectText.delay(objectText.data('animDelay')).animate({
                        top: objectText.data('vEnd'),
                        bottom: '',
                        right: '',
                        left: '0%',
                        opacity: objectText.data('endOpacity')
                    }, objectText.data('animSpeed')).css({
                        'text-align': objectText.data('align')
                    });


                    objectButtons.delay(objectButtons.data('animDelay')).animate({
                        top: objectButtons.data('vEnd'),
                        bottom: '',
                        right: '',
                        left: '0%',
                        opacity: objectButtons.data('endOpacity')
                    }, objectButtons.data('animSpeed')).css({
                        'text-align': objectButtons.data('align')
                    });

                }

            });

            // Two objects
            var twoObjectsCaption = $(args.container).find('li.two-objects .caption');
            twoObjectsCaption.find(".object").each(function (index) {
                var objectInfo = $(this).find('.info');
                var objectButton = $(this).find('.buttons');
                var objectCar = $(this).find('.car');

                objectInfo.css({
                    'opacity': objectInfo.data('startOpacity'),
                    'top': objectInfo.data('v-start'),
                    'left': objectInfo.data('h-start')
                });

                objectButton.css({
                    'opacity': objectButton.data('startOpacity'),
                    'top': objectButton.data('v-start'),
                    'left': objectButton.data('h-start')
                });

                objectCar.css({
                    'opacity': objectCar.data('startOpacity'),
                    'top': objectCar.data('v-start'),
                    'left': objectCar.data('h-start')
                });

                if (currentSlide.hasClass('two-objects')) {

                    objectInfo.delay(objectInfo.data('animDelay')).animate({
                        top: objectInfo.data('vEnd'),
                        bottom: '',
                        right: '',
                        left: '0%',
                        opacity: objectInfo.data('endOpacity')
                    }, objectInfo.data('animSpeed')).css({
                        'text-align': objectInfo.data('align')
                    });

                    objectButton.delay(objectButton.data('animDelay')).animate({
                        top: objectButton.data('vEnd'),
                        bottom: '',
                        right: '',
                        left: '0%',
                        opacity: objectButton.data('endOpacity')
                    }, objectButton.data('animSpeed')).css({
                        'text-align': objectButton.data('align')
                    });

                    objectCar.delay(objectCar.data('animDelay')).animate({
                        top: objectCar.data('vEnd'),
                        bottom: '',
                        right: '',
                        left: '0%',
                        opacity: objectCar.data('endOpacity')
                    }, objectCar.data('animSpeed')).css({
                        'text-align': objectCar.data('align')
                    });
                }

            });

            $('#mb-slideshow .flex-direction-nav a').click(function () {
                $('#mb-slideshow').find('li').each(function (index) {
                    objectText = $(this).find('.caption .text');
                    objectButtons = $(this).find('.caption .buttons');

                    objectText.css({
                        'opacity': objectText.data('startOpacity'),
                        'top': objectText.data('v-start'),
                        'left': objectText.data('h-start')
                    });
                    objectButtons.css({
                        'opacity': objectButtons.data('startOpacity'),
                        'top': objectButtons.data('v-start'),
                        'left': objectButtons.data('h-start')
                    });
                })
            });

        }

        $('#mb-slideshow').flexslider({
            animation: "<?php echo $animation; ?>",				//String: Select your animation type, "fade" or "slide"
            slideDirection: "horizontal",	//String: Select the sliding direction, "horizontal" or "vertical"
            slideshow: true,				//Boolean: Animate slider automatically
            slideshowSpeed: <?php echo intval($animation_speed); ?>,			//Integer: Set the speed of the slideshow cycling, in milliseconds
            animationDuration: <?php echo $animation_duration; ?>,			//Integer: Set the speed of animations, in milliseconds
            directionNav: true,				//Boolean: Create navigation for previous/next navigation? (true/false)
            smoothHeight: false,
            animationLoop: true,			//Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
            pauseOnAction: true,			//Boolean: Pause the slideshow when interacting with control elements, highly recommended.
            pauseOnHover: true,			//Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
            useCSS: true,
            touch: true,
            start: animateMB,
            after: animateMB
        });
    </script>
<?php
}

function get_mb_slide($id)
{
    $slide_type = get_field('mb-slideshow_type', $id); ?>

    <li class="image-info <?php echo $slide_type ?>">

            <div class="caption">
                <div class="slide">
                    <?php
                    // Setting up Defaults for Texts
                    $text_color = 'white';
                    $text_speed = 700;
                    $text_position = 'data-h-start="0%"';
                    $text_opacity = 'data-start-opacity="1" data-end-opacity="1"';
                    $text_placement = "left";
                    $text_style = "h2";
                    ?>

                    <?php if (get_field('mb-slideshow_image-text', $id)){ ?>

                        <?php while (have_rows('mb-slideshow_image-text', $id)) : the_row();

                            $text_content = get_sub_field('mb-slideshow_caption-text');
                            $text_style = get_sub_field('mb-slideshow_caption-style');
                            $text_placement = get_sub_field('mb-slideshow_caption-placement');

                            $text_color = get_sub_field('mb-slideshow_caption-color');
                            $text_speed = get_sub_field('mb-slideshow_custom-speed');

                            $text_effect = get_sub_field('mb-slideshow_custom-type');

                            if ($text_effect) {
                                if (in_array('slide', $text_effect)) {
                                    // Set start position
                                    $text_position = get_sub_field('mb-slideshow_custom-position');
                                    if ($text_position == 'right') {
                                        $text_position = 'data-h-start="100%"';
                                    } else {
                                        $text_position = 'data-h-start="-100%"';
                                    }
                                }
                                if (in_array('fade', $text_effect)) {
                                    //Set Fade
                                    $text_opacity = 'data-start-opacity="0" data-end-opacity="1"';
                                }
                            }

                            ?>
                            <div class="text" <?php echo $text_position; ?>
                                 data-align="<?php echo $text_placement; ?>" <?php echo $text_opacity; ?>
                                 data-anim-speed="<?php echo $text_speed; ?>">
                                <?php
                                if ($text_style == 'h2') {
                                    ?>
                                    <h2 class="<?php echo $text_color; ?>"><?php echo $text_content; ?></h2>
                                <?php
                                } elseif ($text_style == 'p') {
                                    ?>
                                    <p class="<?php echo $text_color; ?>"><?php echo $text_content; ?></p>
                                <?php } ?>
                            </div>

                        <?php endwhile; ?>

                    <?php } else if($slide_type == "offer"){
                        $offer = get_field('mb-slideshow-offer', $id);
                        $offer = get_post($offer->ID);
                        $title = $offer->post_title; ?>

                        <div class="text" <?php echo $text_position; ?>
                             data-align="<?php echo $text_placement; ?>" <?php echo $text_opacity; ?>
                             data-anim-speed="<?php echo $text_speed; ?>">
                            <?php
                            if ($text_style == 'h2') {
                                ?>
                                <h2 class="<?php echo $text_color; ?>"><?php echo $title; ?></h2>
                            <?php
                            } elseif ($text_style == 'p') {
                                ?>
                                <p class="<?php echo $text_color; ?>"><?php echo $title; ?></p>
                            <?php } ?>
                        </div>
                    <?php }

                    //Setting up Defaults for Buttons
                    $button_color = 'gray';
                    $button_speed = 300;
                    $button_position = 'data-h-start="0%"';
                    $button_opacity = 'data-start-opacity="1" data-end-opacity="1"';
                    $button_placement = 'left';
                    $button_content = 'Läs mer';

                    ?>
                    <?php if (get_field('mb-slideshow_buttons', $id)){ ?>

                        <?php while (have_rows('mb-slideshow_buttons', $id)) : the_row();

                            $button_content = get_sub_field('mb-slideshow_button-text');
                            $button_link = get_sub_field('mb-slideshow_button-link');
                            $button_placement = get_sub_field('mb-slideshow_button-placement');

                            $button_custom = get_sub_field('mb-slideshow_button-custom');
                            $button_target = get_sub_field("mb-slideshow_button-link-target");

                            if ($button_custom) {
                                if (in_array('color', $button_custom)) {
                                    $button_color = get_sub_field('mb-slideshow_button-color');
                                }
                                if (in_array('type', $button_custom)) {
                                    // Set start position
                                    $button_anim_type = get_sub_field('mb-slideshow_button-anim-type');
                                    if (in_array('slide', $button_anim_type)) {
                                        $button_position = get_sub_field('mb-slideshow_button-anim-position');
                                        if ($button_position == 'right') {
                                            $button_position = 'data-h-start="100%"';
                                        } else {
                                            $button_position = 'data-h-start="-100%"';
                                        }
                                    }
                                    if (in_array('fade', $button_anim_type)) {
                                        $button_opacity = 'data-start-opacity="0" data-end-opacity="1"';
                                    }
                                }
                                if (in_array('speed', $button_custom)) {
                                }
                            }

                            if ($button_link == 'internal') {
                                $internal_page = get_sub_field('mb-slideshow_button-link-page');

                                $button_url = get_permalink($internal_page->ID);
                            } else if($button_link == 'external') {
                                $button_url = get_sub_field('mb-slideshow_button-link-url');
                            } else if($button_link == 'file'){
                                $file = get_sub_field('mb-slideshow_button-file');
                                $button_url = $file['url'];
                            }

                            ?>
                            <div class="buttons" data-v-start="0%" data-v-end="0%" <?php echo $button_position; ?>
                                 data-align="<?php echo $button_placement; ?>"  <?php echo $button_opacity; ?>
                                 data-anim-speed="<?php echo $button_speed; ?>">
                                <a href="<?php echo $button_url; ?>"
                                   <?php if ($button_target == "lightbox") : ?> data-lightbox <?php elseif ($button_target != false) : ?> target="<?php echo $button_target ?>" <?php endif; ?>
                                   class="button <?php echo $button_color; ?>">
                                    <?php echo $button_content; ?> <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        <?php endwhile; ?>

                    <?php }else if($slide_type == "two-objects"){

                        $object_1 = get_field("mb-slideshow-object-first", $id);
                        $object_1_meta = get_post_meta($object_1->ID);

                        $title_1 = $object_1->post_title;
                        $description_1 = $object_1_meta["model_description"][0];

                        $object_2 = get_field("mb-slideshow-object-second", $id);
                        $object_2_meta = get_post_meta($object_2->ID);

                        $title_2 = $object_2->post_title;
                        $description_2 = $object_2_meta["model_description"][0];

                        $attachment_id_1 = intval($object_1_meta["model_image"][0]);
                        $image_1 = wp_get_attachment_image_src($attachment_id_1, "full");

                        $attachment_id_2 = intval($object_1_meta["model_image"][0]);
                        $image_2 = wp_get_attachment_image_src($attachment_id_2, "full");

                        $start_left = "0%";
                        $start_right = "0";
                        $start_op = "1";
                        $left_delay = "0";
                        $right_delay = "100";

                        $animate = get_field("mb-slideshow-two-animate", $id);

                        if ($animate) {
                            if (get_field("mb-slideshow-two-effect", $id) == "slide") {
                                $pos = get_field("mb-slideshow-two-pos", $id);
                                if ($pos == "left") {
                                    $start_left = "-100%";
                                    $start_right = "-100%";
                                } else if ($pos == "right") {
                                    $start_left = "100%";
                                    $start_right = "100%";
                                } else if ($pos == "out-in") {
                                    $start_left = "-100%";
                                    $start_right = "100%";
                                    $left_delay = "100";
                                }
                            }

                            if (get_field("mb-slideshow-two-effect") == "fade") {
                                $start_op = "0";
                            }
                        }

                        ?>

                        <div class="caption">
                            <div class="object">
                                <div class="info" data-v-start="0%" data-v-end="0%" data-h-start="<?php echo $start_left; ?>" data-align="left"  data-start-opacity="<?php echo $start_op; ?>" data-end-opacity="1" data-anim-speed="200" data-anim-delay="">
                                    <h2><?php echo $title_1; ?></h2>
                                    <p><?php echo $description_1; ?></p>
                                </div>
                                <div class="buttons" data-v-start="0%" data-v-end="0%" data-h-start="<?php echo $start_left; ?>" data-align="left"  data-start-opacity="<?php echo $start_op; ?>" data-end-opacity="1" data-anim-speed="200" data-anim-delay="">
                                    <a href="#" class="button blue">
                                        Läs mer <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                                <div class="car" data-v-start="0%" data-v-end="0%" data-h-start="<?php echo $start_left; ?>" data-align="left"  data-start-opacity="<?php echo $start_op; ?>" data-end-opacity="1" data-anim-speed="500" data-anim-delay="<?php echo $left_delay; ?>" style="background: transparent url('<?php echo $image_1[0];?>');">
                                </div>
                            </div>
                            <div class="object">
                                <div class="info" data-v-start="0%" data-v-end="0%" data-h-start="<?php echo $start_right; ?>" data-align="left"  data-start-opacity="<?php echo $start_op; ?>" data-end-opacity="1" data-anim-speed="200" data-anim-delay="">
                                    <h2><?php echo $title_2; ?></h2>
                                    <p><?php echo $description_2; ?></p>
                                </div>
                                <div class="buttons" data-v-start="0%" data-v-end="0%" data-h-start="<?php echo $start_right; ?>" data-align="left"  data-start-opacity="<?php echo $start_op; ?>" data-end-opacity="1" data-anim-speed="200" data-anim-delay="">
                                    <a href="#" class="button blue">
                                        Läs mer <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                                <div class="car" data-v-start="0%" data-v-end="0%" data-h-start="<?php echo $start_right; ?>" data-align="left"  data-start-opacity="<?php echo $start_op; ?>" data-end-opacity="1" data-anim-speed="500" data-anim-delay="<?php echo $right_delay; ?>" style="background: transparent url('<?php echo $image_2[0];?>');">
                                </div>
                            </div>
                        </div>

                    <?php }else if($slide_type == 'offer'){
                        $offer = get_field('mb-slideshow-offer', $id);
                        $offer_id = get_post($offer->ID);
                        $link_url = get_permalink($offer_id);
                        $link_url = $link_url;
                        ?>
                        <div class="buttons" data-v-start="0%" data-v-end="0%" <?php echo $button_position; ?>
                             data-align="<?php echo $button_placement; ?>"  <?php echo $button_opacity; ?>
                             data-anim-speed="<?php echo $button_speed; ?>">
                            <a href="<?php echo $link_url;?>" class="button <?php echo $button_color; ?>">
                                <?php echo $button_content; ?> <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        <?php
        // Skapa variabler för Bild och Bild+Info
        if ($slide_type == 'image' || $slide_type == 'image-info') {
            $slide_image = get_field('mb-slideshow_image', $id); ?>
            <img src="<?php echo $slide_image['url']; ?>" alt="<?php echo $slide_image['alt']; ?>"
                 title="<?php echo $slide_image['title']; ?>"/>
        <?php
        }else if($slide_type == 'offer'){
            $offer = get_field('mb-slideshow-offer', $id);
            $offer = get_post($offer->ID);
            $title = $offer->post_title;
            $post_name = $offer->post_name;

            $offer_meta = get_post_meta($offer->ID);
            $attachment_id = intval($offer_meta["offer_image"][0]);
            $image = wp_get_attachment_image_src($attachment_id); ?>
            <img src="<?php echo $image[0];?>" alt="<?php echo $title;?>" title="<?php echo $title;?>" />

        <?php
        }else if($slide_type == 'two-objects'){ ?>
            <img src="/wp-content/themes/mercedes-benz/images/concrete-bg.jpg" />
        <?php }
        ?>
    </li>

<?php
}


?>