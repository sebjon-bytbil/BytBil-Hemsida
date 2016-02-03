<?php
/*
Plugin Name: BytBil Sektioner
Description: Skapa och visa färdiga sektioner på din hemsida.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 3.0.1
Author URI: http://www.bytbil.com
*/

add_action('init', 'cptui_register_my_cpt_section');
function cptui_register_my_cpt_section()
{
    register_post_type('section', array(
        'label' => 'Sektioner',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'section', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions'),
        'taxonomies' => array('cities', 'brand'),
        'labels' => array(
            'name' => 'Sektioner',
            'singular_name' => 'Sektion',
            'menu_name' => 'Sektioner',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till sektion',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera sektion',
            'new_item' => 'Ny sektion',
            'view' => 'Visa sektion',
            'view_item' => 'Visa sektion',
            'search_items' => 'Sök sektion',
            'not_found' => 'Inga sektioner hittade',
            'not_found_in_trash' => 'Inga sektioner i papperskorgen',
            'parent' => 'Sektionens förälder',
        )
    ));
}


function get_section($section)
{
}

?>
