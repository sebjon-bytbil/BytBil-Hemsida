<?php
/**
 * Plugin Name: BytBil Fordonsurval Basic
 * Description: Fordonsurval för bytbil
 * Version: 0.1
 * Author: BytBil AB
 * Author URI: http://www.bytbil.com
 */

// Lägger till Fordonsurval som innehållstyp

add_action('init', 'cptui_register_my_cpt_assortment');
function cptui_register_my_cpt_assortment()
{
    register_post_type('assortment', array(
        'label' => 'Fordonsurval',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'assortment', 'with_front' => true),
        'query_var' => true,
        'exclude_from_search' => true,
        'menu_icon' => '/wp-content/themes/basic-modern/images/admin-icons/fordonsurval.png',
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Fordonsurval',
            'singular_name' => 'Fordonsurval',
            'menu_name' => 'Fordonsurval',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till fordonsurval',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera fordonsurval',
            'new_item' => 'Nytt fordonsurval',
            'view' => 'Visa fordonsurval',
            'view_item' => 'Visa fordonsurval',
            'search_items' => 'Sök fordonsurval',
            'not_found' => 'Inget fordonsurval hittat',
            'not_found_in_trash' => 'Inget fordonsurval i papperskorgen',
            'parent' => 'Fordonsurval förälder',
        )
    ));
}


// Lägger till fält för Fordonsurval

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_fordonsurval',
        'title' => 'Fordonsurval',
        'fields' => array(
            array(
                'key' => 'field_535f8b40f359d',
                'label' => 'Fordonsurval',
                'name' => 'assortment',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'assortment',
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
                    'value' => 'page_fordonsurval.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => $frontpageID,
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}

// Lägger till fält för Urvalsinställningar

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_urvalsinstallningar',
        'title' => 'Urvalsinställningar',
        'fields' => array(
            array(
                'key' => 'field_535f882bba18d',
                'label' => 'Söksträng',
                'name' => 'assortment_string',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_535f8931ba18e',
                'label' => 'Sidtyp',
                'name' => 'assortment_page',
                'type' => 'select',
                'choices' => array(
                    'SokLista' => 'Med sökfunktion',
                    'Lista' => 'Utan sökfunktion',
                    'Favoriter' => 'Favoriter',
                    'Senaste' => 'Senaste',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_53e4630cdfe5f',
                'label' => 'Sökväg',
                'name' => 'assortment_path',
                'type' => 'text',
                'instructions' => 'Ange sökväg till accesspaketet ex. "vara-bilar"',
                'required' => 1,
                'default_value' => 'vara-bilar',
                'placeholder' => '',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_535f8931ba18e',
                            'operator' => '==',
                            'value' => 'Senaste',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53d206b49c178',
                'label' => 'Urvalsinformation',
                'name' => 'assortment_stringinfo',
                'type' => 'message',
                'message' => 'Urvalsinformation<br/><br/>',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'assortment',
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