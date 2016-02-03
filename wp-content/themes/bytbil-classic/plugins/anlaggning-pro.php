<?php
/**
 * Plugin Name: BytBil Anläggning Basic
 * Description: Anläggning för bytbil
 * Version: 0.1
 * Author: BytBil AB
 * Author URI: http://www.bytbil.com
 */

// Lägger till Anläggning som innehållstyp

add_action('init', 'cptui_register_my_cpt_anlaggning');
function cptui_register_my_cpt_anlaggning()
{
    register_post_type('anlaggning', array(
        'label' => 'Anläggningar',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'anlaggning', 'with_front' => true),
        'query_var' => true,
        'exclude_from_search' => true,
        'menu_icon' => '/wp-content/themes/basic-modern/images/admin-icons/anlaggningar.png',
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Anläggningar',
            'singular_name' => 'Anläggning',
            'menu_name' => 'Anläggningar',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till anläggning',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera anläggning',
            'new_item' => 'Ny anläggning',
            'view' => 'Visa anläggning',
            'view_item' => 'Visa anläggning',
            'search_items' => 'Sök anläggning',
            'not_found' => 'Ingen anläggning hittad',
            'not_found_in_trash' => 'Ingen anläggning i papperskorgen',
            'parent' => 'Anläggning förälder',
        )
    ));
}

// Lägger till fält för Anläggning

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_anlaggning',
        'title' => 'Anläggning',
        'fields' => array(
            array(
                'key' => 'field_535e08ff1e047',
                'label' => 'Anläggningsinformation',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_535e08281e03f',
                'label' => 'Besöksadress',
                'name' => 'anlaggning_adress',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
                'instructions' => 'Ange anläggningens besöksadress',
            ),
            array(
                'key' => 'field_535e083a1e040',
                'label' => 'Postnummer',
                'name' => 'anlaggning_postalnr',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
                'instructions' => 'Ange anläggningens postnummer.',
            ),
            array(
                'key' => 'field_535e085b1e041',
                'label' => 'Ort',
                'name' => 'anlaggning_city',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
                'instructions' => 'Ange vilken ort anläggningen ligger i.',
            ),
            array(
                'key' => 'field_535e08761e042',
                'label' => 'Telefonnummer',
                'name' => 'anlaggning_phonenrs',
                'type' => 'repeater',
                'instructions' => 'Ange de telefonnummer som går till anläggningen.',
                'sub_fields' => array(
                    array(
                        'key' => 'field_535e088a1e043',
                        'label' => 'Titel',
                        'name' => 'phonenrs_title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '(Exempel: Växel)',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                        'instructions' => 'Ange vart telefonnumret går.',
                    ),
                    array(
                        'key' => 'field_535e089c1e044',
                        'label' => 'Nummer',
                        'name' => 'phonenrs_number',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '(Exempel: 012-345 78 90',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                        'instructions' => 'Ange telefonnumret.',
                    ),
                    array(
                        'key' => 'field_535e455536034',
                        'label' => 'Visa i...',
                        'name' => 'phonenrs_show-on',
                        'type' => 'checkbox',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_535e0c0b2c45f',
                                    'operator' => '==',
                                    'value' => 'footer',
                                ),
                                array(
                                    'field' => 'field_535e0c0b2c45f',
                                    'operator' => '==',
                                    'value' => 'header',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'footer' => 'Sidfot',
                            'header' => 'Sidhuvud',
                        ),
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till nummer',
            ),
            /*array (
                'key' => 'field_535e08c91e045',
                'label' => 'E-post',
                'name' => 'anlaggning_email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),*/
            array(
                'key' => 'field_635e08761e042',
                'label' => 'E-post',
                'name' => 'anlaggning_emails',
                'type' => 'repeater',
                'instructions' => 'Ange de e-postadresser som går till anläggningen.',
                'sub_fields' => array(
                    array(
                        'key' => 'field_635e088a1e043',
                        'label' => 'Titel',
                        'name' => 'email_title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '(Exempel: Kundservice)',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                        'instructions' => 'Ange vart mailen går.',
                    ),
                    array(
                        'key' => 'field_635e089c1e044',
                        'label' => 'E-postadress',
                        'name' => 'email-adress',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '(Exempel: kundservice@bytbil.com',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                        'instructions' => 'Ange mottagarens E-postadress.',
                    ),
                    array(
                        'key' => 'field_635e455536034',
                        'label' => 'Visa i...',
                        'name' => 'email_show-on',
                        'type' => 'checkbox',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_635e0c0b2c45f',
                                    'operator' => '==',
                                    'value' => 'footer',
                                ),
                                array(
                                    'field' => 'field_635e0c0b2c45f',
                                    'operator' => '==',
                                    'value' => 'header',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'footer' => 'Sidfot',
                            'header' => 'Sidhuvud',
                        ),
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till E-post',
            ),
            array(
                'key' => 'field_53feba82ee469',
                'label' => 'Anläggningens kartplats',
                'name' => 'anlaggning_map-position',
                'type' => 'google_map',
                'instructions' => 'Sök efter er adress och välj vart på kartan er anläggning skall visas.',
                'center_lat' => '',
                'center_lng' => '',
                'zoom' => '',
                'height' => '',
            ),
            array(
                'key' => 'field_535e07741e03e',
                'label' => 'Beskrivning',
                'name' => 'anlaggning_description',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'instructions' => 'Fyll i en beskrivning av anläggningen.',
            ),
            array(
                'key' => 'field_535e0c0b2c45f',
                'label' => 'Visa anläggningsinformation på:',
                'name' => 'anlaggning_show-on',
                'type' => 'checkbox',
                'choices' => array(
                    'homepage' => 'Startsida',
                    'footer' => 'Sidfot',
                    'header' => 'Sidhuvud',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
                'instructions' => 'Aktivera de områden du vill kunna visa denna anläggningsinformation på.',
            ),
            array(
                'key' => 'field_53e9b2bcbd299',
                'label' => 'Visa personal',
                'name' => 'anlaggning_personal',
                'type' => 'radio',
                'choices' => array(
                    'some' => 'Visa anläggningspersonal',
                    'all' => 'Visa all personal',
                    'no' => 'Visa ingen personal',
                    'other' => 'Visa egen personallista'
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'some',
                'layout' => 'horizontal',
                'instructions' => 'Välj den typ av personal du vill visa på anläggningens sida.'
            ),
            array(
                'key' => 'field_53e9adb6d94a3',
                'label' => 'Personallistor',
                'name' => 'anlaggning_personal-other',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53e9b2bcbd299',
                            'operator' => '==',
                            'value' => 'other',
                        ),
                    ),
                    'allorany' => 'any',
                ),
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_53e9adec34fd6',
                        'label' => 'Personallista',
                        'name' => 'anlaggning_personal-list',
                        'type' => 'post_object',
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'personallista',
                        ),

                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till personallista',
            ),
            /*array (
                'key' => 'field_535e08df1e046',
                'label' => 'Koordinater',
                'name' => 'anlaggning_coordinates',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),*/

            array(
                'key' => 'field_535e090e1e048',
                'label' => 'Avdelningar och öppettider',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_535e091c1e049',
                'label' => 'Öppettider',
                'name' => 'anlaggning_openhours',
                'type' => 'repeater',
                'instructions' => 'Lägg till anläggningens avdelningar med respektive öppettider här.',
                'sub_fields' => array(
                    array(
                        'key' => 'field_535e093c1e04a',
                        'label' => 'Avdelning',
                        'name' => 'anlaggning_oh_division',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => 'Exempel: Verkstad',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                        'instructions' => 'Fyll i avdelningens namn.',
                    ),
                    array(
                        'key' => 'field_535e09791e04b',
                        'label' => 'Öppettider',
                        'name' => 'anlaggning_oh',
                        'type' => 'repeater',
                        'column_width' => '',
                        'instructions' => 'Fyll i avdelningens öppettider.',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_535e098b1e04c',
                                'label' => 'Dagar',
                                'name' => 'anlaggning_oh_days',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => 'Exempel: Vardagar',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                                'instructions' => 'Fyll i vilken period tiden skall gälla.',
                            ),
                            array(
                                'key' => 'field_535e09a11e04d',
                                'label' => 'Tider',
                                'name' => 'anlaggning_oh_hours',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => 'Exempel: 09:00-18:00 eller Stängt',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                                'instructions' => 'Fyll i periodens öppettid.',
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'table',
                        'button_label' => 'Lägg till öppettid',
                    ),
                    array(
                        'key' => 'field_535e1bb5cd43f',
                        'label' => 'Visa på startsida',
                        'name' => 'anlaggning_oh_show-on',
                        'type' => 'true_false',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_535e0c0b2c45f',
                                    'operator' => '==',
                                    'value' => 'homepage',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till avdelning',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'anlaggning',
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

// Lägg till Anläggningsval 

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_anlaggningssida',
        'title' => 'Anläggningssida',
        'fields' => array(
            array(
                'key' => 'field_5360ceed7afa5',
                'label' => 'Val av anläggning',
                'name' => 'val_av_anlaggning',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'anlaggning',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'excerpt',
                1 => 'custom_fields',
                2 => 'discussion',
                3 => 'comments',
                4 => 'revisions',
                5 => 'slug',
                6 => 'author',
                7 => 'format',
                8 => 'featured_image',
                9 => 'categories',
                10 => 'tags',
                11 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}



?>