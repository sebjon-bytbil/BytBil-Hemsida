<?php
/*
Plugin Name: bb9 ads
Description:
Author: BytBil Nordic AB
Version: 1.0
Author URI: http://www.bytbil.com
*/


add_action('init', 'setup_cpt');
function setup_cpt()
{
    $labels = array(
        'name'                => _x( 'Annons', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Annons', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Annonser', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'Alla Annonser', 'text_domain' ),
        'view_item'           => __( 'Visa Annons', 'text_domain' ),
        'add_new_item'        => __( 'Lägg till Annons', 'text_domain' ),
        'add_new'             => __( 'Lägg till Annons', 'text_domain' ),
        'edit_item'           => __( 'Redigera Annons', 'text_domain' ),
        'update_item'         => __( 'Uppdatera Annons', 'text_domain' ),
        'search_items'        => __( 'Sök Annons', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Inga Annonser hittades i papperskorgen', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'Annons', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor'),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 15,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'bb9ad', $args );
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_Annons',
        'title' => 'Annons',
        'fields' => array(
            array(
                'key' => 'field_bb9-ad-image',
                'label' => 'Bild',
                'name' => 'bb9-ad-image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),


            array(
                'key' => 'field_bb9-ad-link',
                'label' => 'Url',
                'name' => 'bb9-ad-link',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'bb9ad',
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



//Limit this post type to 1 post max..
add_action('load-post-new.php', 'limit_bb9_ads' );

function limit_bb9_ads()
{
    global $typenow;

    # Not our post type, bail out
    if( 'bb9ad' !== $typenow )
        return;

    # Grab all our CPT, adjust the status as needed
    $total = get_posts( array(
        'post_type' => 'bb9ad',
        'numberposts' => -1,
        'post_status' => 'publish,future,draft'
    ));

    # Condition match, block new post
    if( $total && count( $total ) >= 1 )
        wp_die(
            'Sorry, maximum number of posts reached',
            'Maximum reached',
            array(
                'response' => 500,
                'back_link' => true
            )
        );
}