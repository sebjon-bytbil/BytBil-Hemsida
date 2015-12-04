<?php
/*
Plugin Name: BytBil Social Media
Description: Lägg till Sociala Medie-widgets.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 2.0.1
Author URI: http://www.bytbil.com
*/
add_action('init', 'cptui_register_my_cpt_socialmedia');
function cptui_register_my_cpt_socialmedia()
{
    register_post_type('socialmedia', array(
        'label' => 'Sociala medier',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'socialmedia', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions', 'permalink'),
        'labels' => array(
            'name' => 'Sociala medier',
            'singular_name' => 'Social media',
            'menu_name' => 'Sociala medier',
            'add_new' => 'Lägg till Social media',
            'add_new_item' => 'Lägg till ny Social media',
            'edit' => 'Edit',
            'edit_item' => 'Redigera Social media',
            'new_item' => 'Ny Social media',
            'view' => 'Visa Social media',
            'view_item' => 'Visa Social media',
            'search_items' => 'Sök Sociala medier',
            'not_found' => 'No Sociala medier Found',
            'not_found_in_trash' => 'No Sociala medier Found in Trash',
            'parent' => 'Parent Social media',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_sociala-medier',
        'title' => 'Sociala Medie-Widgets',
        'fields' => array(
            array(
                'key' => 'field_53db59fd34b4b',
                'label' => 'Välj social media',
                'name' => 'social_media-type',
                'type' => 'select',
                'required' => 1,
                'choices' => array(
                    'fb' => 'Facebook',
                    'tw' => 'Twitter',
                    'yt' => 'Youtube',
                    'ig' => 'Instagram',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_53db3b46a2656',
                'label' => 'Användarnamn',
                'name' => 'user',
                'type' => 'text',
                'required' => 0,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '!=',
                            'value' => 'ig',
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
                'key' => 'field_53db6290ee0d6',
                'label' => 'Hashtag',
                'name' => 'hashtag',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'ig',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53db7c282c984',
                'label' => 'Välj bildkvalité',
                'name' => 'quality',
                'type' => 'select',
                'required' => 0,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'ig',
                        ),
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'yt',
                        ),
                    ),
                    'allorany' => 'any',
                ),
                'choices' => array(
                    'low_resolution' => 'Låg upplösning',
                    'standard_resolution' => 'Hög upplösning',
                    'thumbnail' => 'Tumnaglar'
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_53db7fdc21168',
                'label' => 'Antal bilder i listan',
                'name' => 'pic_count',
                'type' => 'number',
                'required' => 0,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'ig',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '20',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '33',
                'step' => '',
            ),
            array(
                'key' => 'field_53e48e0ae70b4',
                'label' => 'Antal videoklipp i listan',
                'name' => 'vids_count',
                'type' => 'number',
                'required' => 0,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'yt',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '20',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '50',
                'step' => '',
            ),
            array(
                'key' => 'field_53db7f86da847',
                'label' => '',
                'name' => 'show_title',
                'type' => 'checkbox',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'ig',
                        ),

                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'true' => 'Visa bildrubrik/taggar',
                ),
                'default_value' => 'true',
                'layout' => 'vertical',
            ),

            array(
                'key' => 'field_53e4ae13e187b',
                'label' => 'Färgtema',
                'name' => 'theme',
                'type' => 'select',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'fb',
                        ),
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'tw',
                        ),

                    ),
                    'allorany' => 'any',
                ),
                'choices' => array(
                    'light' => 'Ljus',
                    'dark' => 'Mörk',
                ),
                'default_value' => 'light',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_53db552abcc6a',
                'label' => 'Bredd',
                'name' => 'width',
                'type' => 'text',
                'default_value' => '100%',
                'placeholder' => 'Bredd',
                'instructions' => 'Ange bredd i pixlar eller procent',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_53db55a218350',
                'label' => 'Höjd',
                'name' => 'height',
                'type' => 'text',
                'default_value' => '500',
                'placeholder' => 'Höjd',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_53db55d616fd8',
                'label' => '',
                'name' => 'show_posts',
                'type' => 'checkbox',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'fb',
                        ),

                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'true' => 'Visa inlägg',
                ),
                'default_value' => 'true',
                'layout' => 'vertical',
            ),
            array(
                'key' => 'field_53db58ca108f2',
                'label' => '',
                'name' => 'show_faces',
                'type' => 'checkbox',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53db59fd34b4b',
                            'operator' => '==',
                            'value' => 'fb',
                        ),

                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'true' => 'Dölj ansikten',
                ),
                'default_value' => 'true',
                'layout' => 'vertical',
            ),


        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'socialmedia',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
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

function bytbil_show_social_media_widget($sm)
{

}

?>