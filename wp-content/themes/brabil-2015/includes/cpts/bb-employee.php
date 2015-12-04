<?php

add_action('init', 'cptui_register_my_cpt_employee');
function cptui_register_my_cpt_employee()
{
    register_post_type('employee', array(
        'label' => 'Personal',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=facility',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'employee', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions', 'thumbnail'),
        'taxonomies' => array('brand', 'cities'),
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
            'not_found' => 'Ingen personal hittades',
            'not_found_in_trash' => 'Ingen personal hittades i papperskorgen',
            'parent' => 'Personalens förälder',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_personal',
        'title' => 'Personal',
        'fields' => array(
            array(
                'key' => 'field_5546d85a96237',
                'label' => 'Personalbild',
                'name' => 'employee-image',
                'instructions' => 'Välj eller ladda upp en bild på personalen.',
                'type' => 'image',
                'preview_size' => 'thumbnail',
                'save_format' => 'object',
            ),
            array(
                'key' => 'field_5549be2e14079',
                'label' => 'Titel',
                'name' => 'employee-work-title',
                'type' => 'text',
                'instructions' => 'Fyll i om du vill visa personalens Arbetstitel.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5546d89696239',
                'label' => 'E-post',
                'name' => 'employee-email',
                'type' => 'email',
                'instructions' => 'Fyll i om du vill visa personalens E-postaddress.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_5549be0bac909',
                'label' => 'Telefon',
                'name' => 'employee-phone',
                'type' => 'text',
                'instructions' => 'Fyll i om du vill visa personalens Telefonnummer.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5546dca03727f',
                'label' => 'Avdelning',
                'name' => 'employee-department',
                'type' => 'checkbox',
                'choices' => array(
                    'carsales' => 'Bilförsäljning',
                    'store' => 'Butik och bildelar',
                    'damage' => 'Skadecenter',
                    'workshop' => 'Verkstad',
                    'other' => 'Lägg till annan',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_5546dd3deb206',
                'label' => 'Annan avdelning',
                'name' => 'employee-other-department',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5546dca03727f',
                            'operator' => '==',
                            'value' => 'other',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_554645dca0ac27f',
                'label' => 'Fordonstyp',
                'name' => 'employee-vehicle_type',
                'type' => 'checkbox',
                'choices' => array(
                    'car' => 'Personbil',
                    'transport' => 'Transportbil',
                ),
                'default_value' => 'car
                transport',
                'layout' => 'horizontal',
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
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'excerpt',
                1 => 'custom_fields',
                2 => 'discussion',
                3 => 'comments',
                4 => 'slug',
                5 => 'author',
                6 => 'format',
                7 => 'featured_image',
                8 => 'categories',
                9 => 'tags',
                10 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_personallista',
        'title' => 'Personallista',
        'fields' => array(
            array(
                'key' => 'field_5549c18b09e5c',
                'label' => 'Rubrik',
                'name' => 'employee-list-title',
                'type' => 'text',
                'instructions' => 'Fyll i om du vill skriva ut en unik rubrik för denna personallista.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5549c26b3ac58',
                'label' => 'Personal',
                'name' => 'employee-list-employee',
                'type' => 'relationship',
                'return_format' => 'id',
                'post_type' => array(
                    0 => 'employee',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'employee_list',
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
                3 => 'discussion',
                4 => 'comments',
                5 => 'slug',
                6 => 'author',
                7 => 'format',
                8 => 'categories',
                9 => 'tags',
                10 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}
