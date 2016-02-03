<?php

add_action('init', 'cptui_register_my_cpt_erbjudande');
function cptui_register_my_cpt_erbjudande()
{
    register_post_type('erbjudande', array(
        'label' => 'Erbjudanden',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'erbjudande', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'revisions'),
        'labels' => array(
            'name' => 'Erbjudanden',
            'singular_name' => 'Erbjudande',
            'menu_name' => 'Erbjudanden',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till nytt Erbjudande',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera Erbjudande',
            'new_item' => 'Nytt Erbjudande',
            'view' => 'Visa Erbjudande',
            'view_item' => 'Visa Erbjudande',
            'search_items' => 'Sök Erbjudanden',
            'not_found' => 'Inga Erbjudanden hittade',
            'not_found_in_trash' => 'Inga Erbjudanden i papperskorgen',
            'parent' => 'Erbjudandets förälder',
        )
    ));
}

?>