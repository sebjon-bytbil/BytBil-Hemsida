<?php

/* Register Anläggningar as PostType */
add_action('init', 'cptui_register_my_cpt_facility');
function cptui_register_my_cpt_facility() {
    register_post_type('facility', array(
        'label' => 'Anläggningar',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'facility', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title','revisions'),
        'labels' => array (
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
            'search_items' => 'Sök anläggningar',
            'not_found' => 'Inga anläggningar hittade',
            'not_found_in_trash' => 'Inga anläggningar i papperskorgen',
            'parent' => 'Anläggningens förälder',
        )
    ) ); }

/* Register Fields for Anläggningar */
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_anlaggning',
        'title' => 'Anläggning',
        'fields' => array (
            array (
                'key' => 'field_552ba8c5bf4d3',
                'label' => 'Kontaktinformation',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_552ba67f5da5f',
                'label' => 'Besöksadress',
                'name' => 'facility-adress',
                'type' => 'google_map',
                'center_lat' => '59.335224',
                'center_lng' => '18.033478',
                'zoom' => 12,
                'height' => 300,
            ),
            array (
                'key' => 'field_552ba6ebf8693',
                'label' => 'Postaddress',
                'name' => 'facility-postal-address',
                'type' => 'textarea',
                'instructions' => 'Fyll i om du vill visa en annan postadress.',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 3,
                'formatting' => 'none',
            ),
            array (
                'key' => 'field_552ba72bf8694',
                'label' => 'Telefonnummer',
                'name' => 'facility-phonenumber',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_552ba73bf8695',
                'label' => 'E-post',
                'name' => 'facility-email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array (
                'key' => 'field_552ba8d4bf4d4',
                'label' => 'Mer inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_552ba760f8696',
                'label' => 'Om anläggningen',
                'name' => 'facility-about',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'no',
            ),
            array (
                'key' => 'field_552ba77bf8697',
                'label' => 'Fordonsurval',
                'name' => 'facility-vehicles',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_552ba786f8698',
                'label' => 'Puffar',
                'name' => 'facility-plugs',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'facility',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
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

/* Add selectionfield for Anläggning at Kontakt-template */
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_valj-anlaggningar',
        'title' => 'Välj anläggningar',
        'fields' => array (
            array (
                'key' => 'field_552ba988e9eef',
                'label' => 'Anläggningar',
                'name' => 'content-facilities',
                'type' => 'relationship',
                'instructions' => 'Välj de anläggningar du vill visa kontaktinformation från.',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'facility',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-kontakt.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
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
