<?php


// Register Custom Post Type
function add_companypage_cpt() {
    $labels = array(
        'name'                => _x( 'Företagssidor', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Företagssida', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Företagssidor', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'Alla företagssidor', 'text_domain' ),
        'view_item'           => __( 'Visa företagssida', 'text_domain' ),
        'add_new_item'        => __( 'Lägg till företagssida', 'text_domain' ),
        'add_new'             => __( 'Lägg till företagssida', 'text_domain' ),
        'rewrite'             => array('slug' => 'foretagssidor', 'with_front' => true),
        'edit_item'           => __( 'Redigera företagssida', 'text_domain' ),
        'update_item'         => __( 'Update Item', 'text_domain' ),
        'search_items'        => __( 'Sök företagssida', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Inga företagssidor hittades i papperskorgen', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'company_page', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 25,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'company_page', $args );

}
// Hook into the 'init' action
add_action( 'init', 'add_companypage_cpt', 0 );


if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_start',
        'title' => 'Start',
        'fields' => array(
            array(
                'key' => 'field_535944894619e9438',
                'label' => 'Bakgrundsbild',
                'name' => 'company_start_background',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => '',
            ),
            array(
                'key' => 'field_230333b7232390e076',
                'label' => 'Rubrik',
                'name' => 'company_start_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_45686579354672',
                'label' => 'Beskrivning',
                'name' => 'company_start_description',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'rows' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
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

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_services',
        'title' => 'Tjänster',
        'fields' => array(
            array(
                'key' => 'field_456865793543845672',
                'label' => 'Välj tjänster',
                'name' => 'company_services',
                'type' => 'relationship',
                'post_type' => array(
                    0 => 'services',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'rows' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
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
        'menu_order' => 1,
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_models',
        'title' => 'Säljarbil',
        'fields' => array(
            array(
                'key' => 'field_456865734693545672',
                'label' => 'Välj modeller',
                'name' => 'company_models',
                'type' => 'relationship',
                'post_type' => array(
                    0 => 'vehicle',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'rows' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
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
        'menu_order' => 2,
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_seller_models',
        'title' => 'Personalbil',
        'fields' => array(
            array(
                'key' => 'field_45686579354345672',
                'label' => 'Välj modeller',
                'name' => 'company_seller_models',
                'type' => 'relationship',
                'post_type' => array(
                    0 => 'vehicle',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'rows' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
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
        'menu_order' => 2,
    ));
}
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_employees',
        'title' => 'Personal',
        'fields' => array(
            array(
                'key' => 'field_45686579aa225672',
                'label' => 'Välj kontaktpersoner',
                'name' => 'company_employees',
                'type' => 'relationship',
                'post_type' => array(
                    0 => 'employee',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'rows' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
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
        'menu_order' => 3,
    ));
}

