<?php
/*
Plugin Name: Biva Lightbox
Description: Skapa och visa lightbox-rutor.
Author: Tobias Franzén : BytBil Nordic AB
Version: 2.0.1
Author URI: http://www.bytbil.com
*/

add_action('init', 'cptui_register_my_cpt_lightbox');
function cptui_register_my_cpt_lightbox()
{
    register_post_type('lightbox', array(
            'label' => 'Lightbox',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'lightbox', 'with_front' => true),
            'query_var' => true,
            'supports' => array('title', 'revisions'),
            'labels' => array(
                'name' => 'Lightbox',
                'singular_name' => 'Lightbox',
                'menu_name' => 'Lightbox',
                'add_new' => 'Lägg till Lightbox',
                'add_new_item' => 'Lägg till Lightbox',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera Lightbox',
                'new_item' => 'Ny Lightbox',
                'view' => 'Visa Lightbox',
                'view_item' => 'Visa Lightbox',
                'search_items' => 'Sök Lightbox',
                'not_found' => 'Ingen Lightbox hittades',
                'not_found_in_trash' => 'Ingen Lightbox i papperskorgen',
                'parent' => 'Lightboxens förälder',
            )
        )
    );
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_lightbox_settings',
        'title' => 'Lightbox-inställningar',
        'fields' => array(
            array(
                'key' => 'field_164c9db645be94',
                'label' => 'Bild',
                'name' => 'lightbox-image',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => 'Ladda upp en bild i format 980x600',
            ),



            array(
                'key' => 'field_284639643c438a',
                'label' => 'Länktyp',
                'name' => 'lightbox-link-type',
                'type' => 'radio',
                'column_width' => '',
                'choices' => array(
                    'external' => 'Extern URL',
                    'internal' => 'Lokal sida',
                    'file' => 'Fil eller media',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_38d23af83bef1',
                'label' => 'Extern URL',
                'name' => 'lightbox-link-external',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_284639643c438a',
                            'operator' => '==',
                            'value' => 'external',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'column_width' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_128d5b103bef2',
                'label' => 'Lokal sida',
                'name' => 'lightbox-link-internal',
                'type' => 'page_link',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_284639643c438a',
                            'operator' => '==',
                            'value' => 'internal',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'column_width' => '',
                'post_type' => array(
                    0 => 'page',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_2845a2162b3bef3',
                'label' => 'Fil eller media',
                'name' => 'lightbox-link-file',
                'type' => 'file',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_284639643c438a',
                            'operator' => '==',
                            'value' => 'file',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'column_width' => '',
                'save_format' => 'object',
                'library' => 'all',
            ),
            array(
                'key' => 'field_7254d5688c438b',
                'label' => 'Länkbeteende',
                'name' => 'lightbox-link-target',
                'type' => 'radio',
                'column_width' => '',
                'choices' => array(
                    '_blank' => 'Öppna i nytt fönster',
                    '_self' => 'Öppna i samma fönster',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),



            /*array(
                'key' => 'field_274c9db165be628',
                'label' => 'Länk',
                'name' => 'lightbox-url',
                'type' => 'page_link',
                'post_type' => array(
                    0 => 'page',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),*/
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'lightbox',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
                5 => 'revisions',
                6 => 'slug',
                7 => 'author',
                8 => 'format',
                9 => 'featured_image',
                10 => 'categories',
                11 => 'tags',
                12 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}