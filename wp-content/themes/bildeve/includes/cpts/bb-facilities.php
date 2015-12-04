<?php
add_action('init', 'cptui_register_my_cpt_facility');
function cptui_register_my_cpt_facility()
{
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
        'supports' => array('title', 'revisions'),
        'taxonomies' => array('brand', 'cities'),
        'labels' => array(
            'name' => 'Anläggningar',
            'singular_name' => 'Anläggning',
            'menu_name' => 'Anläggningar',
            'add_new' => 'Lägg till anläggning',
            'add_new_item' => 'Lägg till ny anläggning',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera anläggning',
            'new_item' => 'Ny anläggning',
            'view' => 'Visa anläggningar',
            'view_item' => 'Visa anläggning',
            'search_items' => 'Sök efter anläggningar',
            'not_found' => 'Inga anläggningar hittades',
            'not_found_in_trash' => 'Inga anläggningar hittades i papperskorgen',
            'parent' => 'Parent anläggning',
        )
    ));
}

if(function_exists("register_field_group"))
{
    register_field_group(array(
        'id' => 'acf_anlaggningsinformation',
        'title' => 'Anläggningsinformation',
        'fields' => array(
            array(
                'key' => 'field_5511781bd226c',
                'label' => 'Kontaktuppgifter',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_562e39f7cde95',
                'label' => 'Besöksadress',
                'name' => 'facility-visiting-address',
                'type' => 'google_map',
                'instructions' => 'Välj eller sök reda på positionen på kartan där anläggningen ligger.',
                'center_lat' => '59.421137',
                'center_lng' => '17.924942',
                'zoom' => 14,
                'height' => 250,
            ),
            array(
                'key' => 'field_562e177a3d2269',
                'label' => 'Använd annan postadress',
                'name' => 'facility-use-postal-address',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_562e77c9d226a',
                'label' => 'Postaddress',
                'name' => 'facility-postal-address',
                'type' => 'textarea',
                'instructions' => 'Fyll i anläggningens postadress.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_562e177a3d2269',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_562e782ad226d',
                'label' => 'Textruta Kontakta Oss',
                'name' => 'facility-contact-us-text',
                'type' => 'wysiwyg',
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
            array(
                'key' => 'field_5511782add126d',
                'label' => 'Lokaltrafik',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5511782add126d123as',
                'label' => 'Knapptext',
                'name' => 'localtrafic-text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5511782add126d123a2',
                'label' => 'URL för sökning',
                'name' => 'localtrafic-url',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
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
        'menu_order' => 1,
    ));
}

?>
