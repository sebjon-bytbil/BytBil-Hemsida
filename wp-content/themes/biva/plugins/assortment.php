<?php
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
        'supports' => array('title'),
        'labels' => array(
            'name' => 'Fordonsurval',
            'singular_name' => 'Fordonsurval',
            'menu_name' => 'Fordonsurval',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till urval',
            'edit' => 'Redigera ',
            'edit_item' => 'Redigera urval',
            'new_item' => 'Nytt urval',
            'view' => 'Visa urval',
            'view_item' => 'Visa urval',
            'search_items' => 'Sök urval',
            'not_found' => 'Hittade inget urval',
            'not_found_in_trash' => 'No Fordonsurval Found in Trash',
            'parent' => 'Parent Fordonsurval',
        )
    ));
}

?>
