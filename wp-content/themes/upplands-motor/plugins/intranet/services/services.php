<?php
// Register Custom Post Type
function add_servicepage_cpt() {

    $labels = array(
        'name'                => _x( 'Tjänster', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Tjänst', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Tjänster', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'Alla Tjänster', 'text_domain' ),
        'view_item'           => __( 'Visa Tjänst', 'text_domain' ),
        'add_new_item'        => __( 'Lägg till Tjänst', 'text_domain' ),
        'add_new'             => __( 'Lägg till', 'text_domain' ),
        'edit_item'           => __( 'Redigera Tjänst', 'text_domain' ),
        'update_item'         => __( 'Update Item', 'text_domain' ),
        'search_items'        => __( 'Sök Tjänst', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Inga Tjänster hittades i papperskorgen', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'services', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => false,
        'menu_position'       => 25,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'services', $args );

}
// Hook into the 'init' action
add_action( 'init', 'add_servicepage_cpt', 0 );


if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'services',
        'title' => 'Innehåll',
        'fields' => array(
            array(
                'key' => 'field_456865793476354672',
                'label' => 'Text',
                'name' => 'service_description',
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
                    'value' => 'services',
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