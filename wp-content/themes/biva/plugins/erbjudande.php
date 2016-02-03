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
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Erbjudanden',
            'singular_name' => 'Erbjudande',
            'menu_name' => 'Erbjudanden',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till erbjudande',
            'edit' => 'Redigera ',
            'edit_item' => 'Redigera erbjudande',
            'new_item' => 'Nytt erbjudande',
            'view' => 'Visa erbjudande',
            'view_item' => 'Visa erbjudande',
            'search_items' => 'Sök erbjudande',
            'not_found' => 'Inget erbjudande hittat',
            'not_found_in_trash' => 'No Erbjudanden Found in Trash',
            'parent' => 'Parent Erbjudande',
        )
    ));
}

?>
