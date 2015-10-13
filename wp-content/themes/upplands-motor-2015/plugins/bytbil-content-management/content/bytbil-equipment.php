<?php
/*
Plugin Name: BytBil Utrustning
Description: Skapa och visa utrustning på din hemsida på din hemsida.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 3.0.1
Author URI: http://www.bytbil.com
*/
add_action('init', 'cptui_register_my_cpt_equipment');
function cptui_register_my_cpt_equipment()
{
    register_post_type('equipment', array(
        'label' => 'Utrustning',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'equipment', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions'),
        'taxonomies' => array('utrustning'),
        'labels' => array(
            'name' => 'Utrustning',
            'singular_name' => 'Utrustning',
            'menu_name' => 'Utrustning',
            'add_new' => 'Add Utrustning',
            'add_new_item' => 'Add New Utrustning',
            'edit' => 'Edit',
            'edit_item' => 'Edit Utrustning',
            'new_item' => 'New Utrustning',
            'view' => 'View Utrustning',
            'view_item' => 'View Utrustning',
            'search_items' => 'Search Utrustning',
            'not_found' => 'No Utrustning Found',
            'not_found_in_trash' => 'No Utrustning Found in Trash',
            'parent' => 'Parent Utrustning',
        )
    ));
}

add_action('init', 'cptui_register_my_cpt_equipment_package');
function cptui_register_my_cpt_equipment_package()
{
    register_post_type('equipment_package', array(
        'label' => 'Utrustningspaket',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=equipment',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'equipment_package', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Utrustningspaket',
            'singular_name' => 'Utrustningspaket',
            'menu_name' => 'Utrustningspaket',
            'add_new' => 'Add Utrustningspaket',
            'add_new_item' => 'Add New Utrustningspaket',
            'edit' => 'Edit',
            'edit_item' => 'Edit Utrustningspaket',
            'new_item' => 'New Utrustningspaket',
            'view' => 'View Utrustningspaket',
            'view_item' => 'View Utrustningspaket',
            'search_items' => 'Search Utrustningspaket',
            'not_found' => 'No Utrustningspaket Found',
            'not_found_in_trash' => 'No Utrustningspaket Found in Trash',
            'parent' => 'Parent Utrustningspaket',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_modellutrustning',
        'title' => 'Modellutrustning',
        'fields' => array(
            array(
                'key' => 'field_55118fe0b6481',
                'label' => 'Säkerhet',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5511931887ea8',
                'label' => 'Välj säkerhetsutrustning',
                'name' => 'vehicle-equipment-saftey',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'equipment',
                ),
                'taxonomy' => array(
                    0 => 'utrustning:24',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
            array(
                'key' => 'field_551193de87eaf',
                'label' => 'Teknik',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5511934b87ea9',
                'label' => 'Välj teknikutrustning',
                'name' => 'vehicle-equipment-tech',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'equipment',
                ),
                'taxonomy' => array(
                    0 => 'utrustning:25',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
            array(
                'key' => 'field_551193e687eb0',
                'label' => 'Komfort',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5511937387eaa',
                'label' => 'Välj komfortutrustning',
                'name' => 'vehicle-equipment-comfort',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'equipment',
                ),
                'taxonomy' => array(
                    0 => 'utrustning:26',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
            array(
                'key' => 'field_551193eb87eb1',
                'label' => 'Styling',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5511938a87eab',
                'label' => 'Välj stylingutrustning',
                'name' => 'vehicle-equipment-styling',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'equipment',
                ),
                'taxonomy' => array(
                    0 => 'utrustning:27',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
            array(
                'key' => 'field_551193ef87eb2',
                'label' => 'Övrig',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_551193b187ead',
                'label' => 'Välj övrig utrustning',
                'name' => 'vehicle-equipment-misc',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'equipment',
                ),
                'taxonomy' => array(
                    0 => 'utrustning:28',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
            array(
                'key' => 'field_551193fd87eb3',
                'label' => 'Tillägg',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_551193c487eae',
                'label' => 'Välj tilläggsutrustning',
                'name' => 'vehicle-equipment-extra',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'equipment',
                ),
                'taxonomy' => array(
                    0 => 'utrustning:29',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'equipment_package',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
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
        'menu_order' => 2,
    ));
    register_field_group(array(
        'id' => 'acf_utrustningsinformation',
        'title' => 'Utrustningsinformation',
        'fields' => array(
            array(
                'key' => 'field_55118bc2eac8f',
                'label' => 'Bild',
                'name' => 'equipment-image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_551191a673ca2',
                'label' => 'Beskrivning',
                'name' => 'equipment-description',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'no',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'equipment',
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
        'menu_order' => 2,
    ));
}
?>