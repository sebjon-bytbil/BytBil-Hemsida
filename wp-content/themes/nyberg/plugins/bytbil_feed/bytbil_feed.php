<?php
/**
 * Plugin Name: BytBil Blogg och nyhetsflöde
 * Plugin URI:
 * Description: Logik för att infoga blogg och nyhetslöp
 * Version: 0.1
 * Author: Provide IT
 * Author URI: http://www.provideit.se
 * License:
 */


// Create news CPT
add_action('init', 'cptui_register_my_cpt_nyheter');
function cptui_register_my_cpt_nyheter()
{
    register_post_type('nyheter', array(
        'label' => 'Nyheter',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'menu_icon' => '/wp-includes/images/nyheter.png',
        'rewrite' => array('slug' => 'nyheter', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'taxonomies', 'trackbacks', 'comments', 'revisions', 'thumbnail', 'page-attributes', 'post-formats'),
        'exclude_from_search' => true,
        'labels' => array(
            'name' => 'Nyheter',
            'singular_name' => 'Nyhet',
            'menu_name' => 'Nyheter',
            'add_new' => 'Skapa Nyhet',
            'add_new_item' => 'Skapa Nyhet',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera Nyhet',
            'new_item' => 'Skapa Nyhet',
            'view' => 'Visa Nyhet',
            'view_item' => 'Visa Nyhet',
            'search_items' => 'Sök bland nyheter',
            'not_found' => 'Inga nyheter hittades',
            'not_found_in_trash' => 'Inga nyheter hittades bland skräp',
            'parent' => 'Parent nyhet',
        )
    ));
}

add_action('init', 'create_nyheter_tax');
//setups blogg category
function create_nyheter_tax()
{
    register_taxonomy(
        'kategori_nyheter',
        'nyheter',
        array(
            'label' => __('Kategori'),
            'rewrite' => array('slug' => 'kategori_nyheter'),
            'hierarchical' => true,
            'hasArchive' => true,
        )
    );
}

// Create blogg CPT
add_action('init', 'cptui_register_my_cpt_blogg');
function cptui_register_my_cpt_blogg()
{
    register_post_type('blogg', array(
        'label' => 'Blogg',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => true,
        'menu_icon' => '/wp-includes/images/nyheter.png',
        'rewrite' => array('slug' => 'blogg', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'excerpt', 'taxonomies', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'exclude_from_search' => true,
        'labels' => array(
            'name' => 'Blogg',
            'singular_name' => 'Blogg',
            'menu_name' => 'Blogg',
            'add_new' => 'Skapa blogginlägg',
            'add_new_item' => 'Skapa blogginlägg',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera blogginlägg',
            'new_item' => 'Nytt blogginlägg',
            'view' => 'Visa blogginlägg',
            'view_item' => 'Visa blogginlägg',
            'search_items' => 'Sök i blogg',
            'not_found' => 'Inga blogginlägg hittades',
            'not_found_in_trash' => 'Inga blogginlägg hittades bland skräp',
            'parent' => 'Parent blogg',
        )
    ));
}

add_action('init', 'create_blogg_tax');
//setups blogg category
function create_blogg_tax()
{
    register_taxonomy(
        'kategori_blogg',
        'blogg',
        array(
            'label' => __('Kategori'),
            'rewrite' => array('slug' => 'kategori_blogg'),
            'hierarchical' => true,
            'hasArchive' => true,
        )
    );
}

?>