<?php

add_action('init', 'cptui_register_my_cpt_employee');
function cptui_register_my_cpt_employee()
{
    register_post_type('employee', array(
        'label' => 'Personal',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'employee', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Personal',
            'singular_name' => 'Personal',
            'menu_name' => 'Personal',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till personal',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera personal',
            'new_item' => 'Ny personal',
            'view' => 'Visa personal',
            'view_item' => 'Visa personal',
            'search_items' => 'Sök personal',
            'not_found' => 'Ingen personal hittad',
            'not_found_in_trash' => 'Ingen personal i papperskorgen',
            'parent' => 'Personalens förälder',
        )
    ));
}

add_action('init', 'cptui_register_my_taxes_department');
function cptui_register_my_taxes_department()
{
    register_taxonomy('department', array(
            0 => 'employee',
        ),
        array('hierarchical' => false,
            'label' => 'Avdelningar',
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => false,
            'labels' => array(
                'search_items' => 'Avdelning',
                'popular_items' => 'Populära avdelningar',
                'all_items' => 'Alla avdelningar',
                'parent_item' => 'Avdelningens förälder',
                'parent_item_colon' => 'Avdelningens förälder:',
                'edit_item' => 'Redigera avdelning',
                'update_item' => 'Uppdatera avdelning',
                'add_new_item' => 'Lägg till avdelning',
                'new_item_name' => 'Ny avdelning',
                'separate_items_with_commas' => 'Separera avdelningar med kommatecken',
                'add_or_remove_items' => 'Lägg till eller ta bort avdelningar',
                'choose_from_most_used' => 'Välj bland de mest använda avdelningarna',
            )
        ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_personal',
        'title' => 'Personal',
        'fields' => array(
            array(
                'key' => 'field_5449fc1aa305f',
                'label' => 'Bild',
                'name' => 'employee_image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_5449fc4ea3060',
                'label' => 'Titel',
                'name' => 'employee_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5449fc5ea3061',
                'label' => 'Telefonnummer',
                'name' => 'employee_phonenumber',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5449fcbea3064',
                'label' => 'Mobilnummer',
                'name' => 'employee_mobilenumber',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5449fccca3065',
                'label' => 'E-post',
                'name' => 'employee_email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'employee',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
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

?>
