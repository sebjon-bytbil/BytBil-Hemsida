<?php
/*
Plugin Name: BytBil Vehicles
Description: Skapa och visa nybilsinformation på din hemsida.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 3.0.1
Author URI: http://www.bytbil.com
*/

add_action('init', 'cptui_register_my_cpt_vehicle');
function cptui_register_my_cpt_vehicle()
{
    register_post_type('vehicle', array(
        'label' => 'Modeller',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'vehicle', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions', 'thumbnail'),
        'taxonomies' => array('brand'),
        'labels' => array(
            'name' => 'Modeller',
            'singular_name' => 'Modell',
            'menu_name' => 'Bilmodeller',
            'add_new' => 'Add Modell',
            'add_new_item' => 'Add New Modell',
            'edit' => 'Edit',
            'edit_item' => 'Edit Modell',
            'new_item' => 'New Modell',
            'view' => 'View Modell',
            'view_item' => 'View Modell',
            'search_items' => 'Search Modeller',
            'not_found' => 'No Modeller Found',
            'not_found_in_trash' => 'No Modeller Found in Trash',
            'parent' => 'Parent Modell',
        )
    ));
}

add_action('init', 'cptui_register_my_cpt_engine');
function cptui_register_my_cpt_engine()
{
    register_post_type('engine', array(
        'label' => 'Motorvarianter',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=vehicle',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'engine', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'excerpt', 'revisions'),
        'taxonomies' => array('brand'),
        'labels' => array(
            'name' => 'Motorvarianter',
            'singular_name' => 'Motorvariant',
            'menu_name' => 'Motorvarianter',
            'add_new' => 'Add Motorvariant',
            'add_new_item' => 'Add New Motorvariant',
            'edit' => 'Edit',
            'edit_item' => 'Edit Motorvariant',
            'new_item' => 'New Motorvariant',
            'view' => 'View Motorvariant',
            'view_item' => 'View Motorvariant',
            'search_items' => 'Search Motorvarianter',
            'not_found' => 'No Motorvarianter Found',
            'not_found_in_trash' => 'No Motorvarianter Found in Trash',
            'parent' => 'Parent Motorvariant',
        )
    ));
}

add_action('init', 'cptui_register_my_cpt_modelgroup');
function cptui_register_my_cpt_modelgroup()
{
    register_post_type('modelgroup', array(
        'label' => 'Modellgrupper',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=vehicle',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'modelgroup', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions', 'thumbnail'),
        'taxonomies' => array('brand'),
        'labels' => array(
            'name' => 'Modellgrupper',
            'singular_name' => 'Modellgrupp',
            'menu_name' => 'Modellgrupper',
            'add_new' => 'Add Modellgrupp',
            'add_new_item' => 'Add New Modellgrupp',
            'edit' => 'Edit',
            'edit_item' => 'Edit Modellgrupp',
            'new_item' => 'New Modellgrupp',
            'view' => 'View Modellgrupp',
            'view_item' => 'View Modellgrupp',
            'search_items' => 'Search Modellgrupper',
            'not_found' => 'No Modellgrupper Found',
            'not_found_in_trash' => 'No Modellgrupper Found in Trash',
            'parent' => 'Parent Modellgrupp',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_modellgrupp',
        'title' => 'Modellgrupp',
        'fields' => array(
            array(
                'key' => 'field_554216a4abf71',
                'label' => 'Inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_55421643abf6f',
                'label' => 'Modellbild',
                'name' => 'modelgroup-image',
                'type' => 'image_crop',
                'crop_type' => 'hard',
                'target_size' => 'rectangle-default',
                'width' => '',
                'height' => '',
                'preview_size' => 'rectangle-md',
                'force_crop' => 'yes',
                'save_in_media_library' => 'no',
                'retina_mode' => 'no',
                'save_format' => 'object',
            ),
            array(
                'key' => 'field_554a1fd72d84c',
                'label' => 'Förkortat modellnamn',
                'name' => 'modelgroup-title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5542162aabf6e',
                'label' => 'Beskrivning',
                'name' => 'modelgroup-description',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 2,
                'formatting' => 'none',
            ),
            array(
                'key' => 'field_554a1f04cc52d',
                'label' => 'Modellsida',
                'name' => 'modelgroup-page',
                'type' => 'page_link',
                'post_type' => array(
                    0 => 'page',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_554216b2abf72',
                'label' => 'Modeller och motorer',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_554216beabf73',
                'label' => 'Välj bilmodeller',
                'name' => 'modelgroup-models',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'vehicle',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
            array(
                'key' => 'field_5542166dabf70',
                'label' => 'Motorvarianter',
                'name' => 'modelgroup-engines',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'engine',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
            array(
                'key' => 'field_55421995abf74',
                'label' => 'Galleri',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_554219a3abf75',
                'label' => 'Bildgalleri',
                'name' => 'modelgroup-gallery',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_554219cbabf76',
                        'label' => 'Bild',
                        'name' => 'modelgroup-gallery-image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_554219e1abf77',
                        'label' => 'Beskrivning',
                        'name' => 'modelgroup-gallery-caption',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till bild',
            ),
            array(
                'key' => 'field_554219948eff74',
                'label' => 'Anläggningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_554a5cca1a2df9',
                'label' => 'Välj anläggning',
                'name' => 'modelgroup-facility',
                'type' => 'relationship',
                'column_width' => '',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'facility',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'modelgroup',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
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
    register_field_group(array(
        'id' => 'acf_motorvariant',
        'title' => 'Motorvariant',
        'fields' => array(
            array(
                'key' => 'field_55421d742e04b',
                'label' => 'Kortare rubrik',
                'name' => 'engine-subtitle',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55421db72e04c',
                'label' => 'Drivmedel',
                'name' => 'engine-fuel',
                'type' => 'radio',
                'choices' => array(
                    'gas' => 'Bensin',
                    'diesel' => 'Diesel',
                    'hybrid' => 'Hybrid',
                    'others' => 'Annat',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'gas',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_55421d152e0af',
                'label' => 'Annat drivmedel',
                'name' => 'engine-fuel-other',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_55421db72e04c',
                            'operator' => '==',
                            'value' => 'others',
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
                'key' => 'field_5548c23a2e04c',
                'label' => 'Växellåda',
                'name' => 'engine-gearbox',
                'type' => 'radio',
                'choices' => array(
                    'manual' => 'Manuell',
                    'auto' => 'Automat',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'manual',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_55421e022e04d',
                'label' => 'Effekt',
                'name' => 'engine-horsepower',
                'type' => 'number',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => 'hK',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_55421e392e04e',
                'label' => 'Bränsleförbrukning',
                'name' => 'engine-consumption',
                'type' => 'number',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => 'liter / 100 km',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_55421e7d2e04f',
                'label' => 'Koldioxidutsläpp',
                'name' => 'engine-carbondioxide',
                'type' => 'number',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => 'gram / km',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'engine',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
                5 => 'slug',
                6 => 'author',
                7 => 'format',
                8 => 'featured_image',
                9 => 'categories',
                10 => 'tags',
                11 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_bilmodell',
        'title' => 'Bilmodell',
        'fields' => array(
            array(
                'key' => 'field_55118f933cb07',
                'label' => 'Modellinformation',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_55422660773de',
                'label' => 'Modellbild',
                'name' => 'vehicle-image',
                'instructions' => 'Ladda upp eller välj en bild du vill visa för modellen.',
                'type' => 'image_crop',
                'crop_type' => 'hard',
                'target_size' => 'rectangle-default',
                'width' => '',
                'height' => '',
                'preview_size' => 'rectangle-md',
                'force_crop' => 'yes',
                'save_in_media_library' => 'no',
                'retina_mode' => 'no',
                'save_format' => 'object',
            ),
            array(
                'key' => 'field_55118eb9d32b9',
                'label' => 'Version',
                'name' => 'vehicle-version',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_554223c173c9a',
                'label' => 'Rubrik',
                'name' => 'vehicle-header',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55118eccd32ba',
                'label' => 'Beskrivning',
                'name' => 'vehicle-description',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
            array(
                'key' => 'field_554223fb73c9c',
                'label' => 'Motorvarianter',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_554223e273c9b',
                'label' => 'Välj motorer',
                'name' => 'vehicle-engines',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'engine',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
            array(
                'key' => 'field_5542246273c9d',
                'label' => 'Utrustning',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5542249773c9f',
                'label' => 'Utrustningspaket',
                'name' => 'vehicle-equipment-package',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'equipment_package',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => 1,
            ),
            array(
                'key' => 'field_55118fa03cb08',
                'label' => 'Bildspelsinfo',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5511a3bf3b9b2',
                'label' => 'Bildspelsbild',
                'name' => 'vehicle-header-image',
                'type' => 'image_crop',
                'crop_type' => 'hard',
                'target_size' => 'slideshow-default',
                'width' => '',
                'height' => '',
                'preview_size' => 'slideshow-sd',
                'force_crop' => 'yes',
                'save_in_media_library' => 'no',
                'retina_mode' => 'no',
                'save_format' => 'object',
            ),
            array(
                'key' => 'field_vs5511a3bf3b9b2',
                'label' => 'Visa textruta',
                'name' => 'vehicle-header-show-caption',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
                'instructions' => 'Välj om du vill visa en textruta.',
            ),
            array(
                'key' => 'field_5511231ccd32ca',
                'label' => 'Textruta',
                'name' => 'vehicle-header-caption',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
            array(
                'key' => 'field_vs5523fa566aa2d',
                'label' => 'Textrutans bakgrundsfärg',
                'name' => 'slideshow-caption-color',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg textrutan skall ha',
                'column_width' => '',
                'default_value' => 'transparent',
            ),
            array(
                'key' => 'field_vs5523fbec6aa30',
                'label' => 'Textrutans styrka',
                'name' => 'slideshow-caption-opacity',
                'type' => 'number',
                'instructions' => 'Fyll i en styrka för genomskinligheten på textrutans bakgrund.',
                'column_width' => '',
                'default_value' => 0,
                'placeholder' => '',
                'prepend' => '',
                'append' => '%',
                'min' => 0,
                'max' => 100,
                'step' => '',
            ),
            array(
                'key' => 'field_vs55265fcf85b35',
                'label' => 'Animera textrutan',
                'name' => 'slideshow-caption-animation',
                'type' => 'select',
                'instructions' => 'Välj om du vill visa textrutan med en animeringseffekt.',
                'column_width' => '',
                'choices' => array(
                    'none' => 'Ingen',
                    'fade' => 'Tona in',
                    'left' => 'Glid in från vänster',
                    'right' => 'Glid in från höger',
                ),
                'default_value' => 'none',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_5a231a7d6c22e',
                'label' => 'Textrutans position',
                'name' => 'vehicle-header-caption-position',
                'type' => 'radio',
                'instructions' => 'Bestäm vart i bilden textrutan skall placeras.',
                'column_width' => '',
                'choices' => array(
                    'center' => 'Centrerad',
                    'left' => 'Vänster',
                    'right' => 'Höger',
                    'top-center' => 'Centrerad i överkant',
                    'top-left' => 'Vänster i överkant',
                    'top-right' => 'Höger i överkant',
                    'bottom-center' => 'Centrerad i underkant',
                    'bottom-left' => 'Vänster i underkant',
                    'bottom-right' => 'Höger i överkant',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'center',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_55132aca03cb08',
                'label' => 'Galleri',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5511a3263b9ae',
                'label' => 'Galleri',
                'name' => 'vehicle-gallery',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5511a3463b9af',
                        'label' => 'Bild',
                        'name' => 'vehicle-gallery-image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_5511a35e3b9b0',
                        'label' => 'Bildtext',
                        'name' => 'vehicle-gallery-caption',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till bild',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'vehicle',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
                5 => 'slug',
                6 => 'author',
                7 => 'format',
                8 => 'featured_image',
                9 => 'categories',
                10 => 'tags',
                11 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 1,
    ));

}

add_action('init', 'cptui_register_my_cpt_warranties');
function cptui_register_my_cpt_warranties()
{
    register_post_type('warranties', array(
        'label' => 'Garantier',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=vehicle',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'warranty', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions', 'thumbnail'),
        'taxonomies' => array('brand'),
        'labels' => array(
            'name' => 'Garantier',
            'singular_name' => 'Garanti',
            'menu_name' => 'Garantier',
            'add_new' => 'Lägg till Garanti',
            'add_new_item' => 'Lägg till ny Garanti',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera Garanti',
            'new_item' => 'Ny Garanti',
            'view' => 'Visa Garanti',
            'view_item' => 'Visa Garanti',
            'search_items' => 'Sök Garanti',
            'not_found' => 'No Garanti Found',
            'not_found_in_trash' => 'No Garanti Found in Trash',
            'parent' => 'Parent Garanti',
        )
    ));
}
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_warranties',
        'title' => 'Garantier',
        'fields' => array(
            array(
                'key' => 'field_5a54a2162aa3f6e',
                'label' => '',
                'name' => 'warranty-description',
                'type' => 'wysiwyg',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 4,
                'toolbar' => 'full',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'warranties',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
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

function get_employee_vehicle_list_item($vehicle)
{
?>

<div class="col-xs-12 col-sm-4">
        <?php 
        $models = $vehicle['Bilmodell'];
        foreach($models as $model){
            $id = $model->ID;
            $title = $model->post_title;
            $pt = $model->post_type;
            
            if($pt=='vehicle'){
                $image = get_field('vehicle-image', $id);
                $image_url = $image['url'];
                $image_sd_url = maybe_add_preview_to_url($image_url);
            }
            if($pt=='modelgroup'){
                $image = get_field('modelgroup-image', $id);
                $image_url = $image['url'];
                $image_sd_url = maybe_add_preview_to_url($image_url);
            }
        }
    
        ?>
    <?php

        $vehicle_link = exists($vehicle['ev-link-type']) ? $vehicle['ev-link-type'] : '';

        // Check slide-link
        if ($vehicle_link === 'internal') {
            // Maybe have to use get_field here
            $internal = $vehicle['ev-link-internal'];
            $url = get_permalink($internal->ID);
            $target = '_self';
        } elseif ($vehicle_link === 'external') {
            $url = $vehicle['ev-link-external'];
            $target = '_blank';
        } elseif ($vehicle_link === 'file') {
            // Maybe have to use get_field here
            $file = $vehicle['ev-link-file'];
            $url = $file['url'];
            $target = '_blank';
        }    

        ?>
        <div class="vehicle-list-item block white-bg">
            <div class="vehicle-list-image" style="padding-top: 0; padding-bottom: 0;">
                <img src="<?php echo $image_sd_url; ?>" />
            </div>
            <div class="vehicle-list-information">
                <h4><?php echo $title; ?></h4>
                <?php if($vehicle['vehicle-description-ev']){
                    echo '<p>' . $vehicle['vehicle-description-ev'] . '</p>';
                }?>
                <?php
                $price_value = $vehicle['vehicle-price-value-ev'];
                $price_type = $vehicle['vehicle-price-type-ev'];
                $price_id = $price_type->ID;
                $price_label = get_the_title($price_id);
                ?>
                
                <?php if($price_type){ ?>
                
                <hr>
                <span class="offer-price-label style-<?php echo get_price_style($vehicle['vehicle-price-type-ev']->ID); ?>" >
                    <?php echo get_price_label($vehicle['vehicle-price-type-ev']->ID); ?>
                </span>
                <span class="offer-price-value style-<?php echo get_price_style($vehicle['vehicle-price-type-ev']->ID); ?>" style="font-size: 1.4em;">
                    <?php echo $price_value; ?><?php
                    if(get_price_suffix($vehicle['vehicle-price-type-ev']->ID)){ ?><span class="price-suffix"><?php echo get_price_suffix($vehicle['vehicle-price-type-ev']->ID); ?></span><?php
                    } ?>
                </span>
        
                
                <?php } ?>
                
                
                        

                
                
            </div>
            <?php if ($vehicle_link !== 'none') : ?>
            <div class="vehicle-list-buttons">
                <br>
                <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" class="button red">Läs mer</a>
            </div>
            <?php endif; ?>
    </div>
</div>

<?php
    
}

function get_vehicle_list_item($id, $type)
{
    $image = get_field('modelgroup-image', $id);
    $image_url = $image['url'];
    $image_sd_url = maybe_add_preview_to_url($image_url);
    $page = get_field('modelgroup-page', $id);
    $description = get_field('modelgroup-description', $id);
    $short = get_field('modelgroup-title', $id);
    $excerpt = strip_shortcodes($description);
    $excerpt = strip_tags($description);
    $trimmed = substr($description, 0, 85) . '...';
    //$trimmed = wp_trim_words($description, 10, null);
    $model_brand = wp_get_post_terms($id, 'brand');
    $brand = $model_brand[0]->name;
    $brand_slug = $model_brand[0]->slug;


    ?>
    <div class="col-xs-12 col-sm-4">
        <div class="vehicle-list-item block white-bg">
            <div class="vehicle-list-image">
                <img src="<?php echo $image_sd_url; ?>" />
            </div>
            <div class="vehicle-list-information">
                <h4><?php echo get_the_title($id); ?></h4>

                <p><?php echo $trimmed; ?></p>
            </div>
            <div class="vehicle-list-buttons">
                <a href="<?php echo $page; ?>" class="button <?php echo $brand_slug; ?>">Läs mer om <?php echo $brand . ' ' . $short; ?></a>
                <!--<a href="<?php echo $page; ?>" class="button white">Se <?php echo $short; ?> i lager</a>-->
            </div>
        </div>
    </div>
<?php
}


function get_model_slideshow($id, $slideshow_models)
{ ?>

    <div class="flexslider" id="slideshow-<?php echo $id; ?>" data-slideshow="otherslider">
        <ul class="slides">
            <?php
            foreach ($slideshow_models as $model) {
                $post_type = get_post_type($model->ID);

                if ($post_type == 'modelgroup') {
                    $modelgroup_models = get_field('modelgroup-models', $model->ID);
                    foreach ($modelgroup_models as $group_model) {
                        get_vehicle_header($group_model->ID);
                    }
                } else {
                    get_vehicle_header($model->ID);
                }
            }
            ?>
        </ul>
    </div>

    <?php
}

function get_vehicle_header($id)
{

    $post_type = get_post_type($id);

    if ($post_type == 'modelgroup') {

        $modelgroup_models = get_field('modelgroup-models', $id);

        foreach ($modelgroup_models as $group_model) {

            $id = $group_model->ID;
            $image_object = get_field('vehicle-header-image', $id);
            $image_url = $image_object['url'];
            $image_sd_url = maybe_add_preview_to_url($image_url);
            $image_alt = get_the_title($id);
            $image_title = get_the_title($id) . ' : ' . get_field('vehicle-description');

            $model_brand = wp_get_post_terms($id, 'brand');
            $brand = $model_brand[0]->name;
            $brand_slug = $model_brand[0]->slug;
            $model_title = get_the_title($id);
            $model_name = get_field('vehicle-model', $id);
            $model_version = get_field('vehicle-verison', $id);
            $model_description = get_field('vehicle-description', $id);
            $show_caption = get_field('vehicle-header-show-caption', $id);
            $model_caption = get_field('vehicle-header-caption', $id);
            $caption_position = get_field('vehicle-header-caption-position', $id);
            ?>

            <li>
                <img src="<?php echo $image_sd_url; ?>"
                     srcset="<?php echo $image_sd_url; ?> 500w, <?php echo $image_url; ?> 1000w"
                     alt="<?php echo $image_alt; ?>"
                     title="<?php echo $image_title; ?>"/>
                <?php if($show_caption==1){ ?>
                    <div class="caption-wrapper brand-<?php echo $brand_slug; ?>">
                        <div class="caption" data-animation="fade">
                            <div class="vertical-align-wrapper">
                                <div class="vertical-align <?php echo $caption_position; ?>">
                                    <div class="horizontal-align">
                                        <div class="caption-contents" style="<?php echo $caption_background_style; ?>">
                                            <h2><?php echo $model_title; ?></h2>
                                            <?php if($model_caption){ echo $model_caption; } else { echo $model_description; } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </li>

        <?php

        }


    } elseif ($post_type == 'vehicle') {

        $image_object = get_field('vehicle-header-image', $id);
        $image_url = $image_object['url'];
        $image_sd_url = maybe_add_preview_to_url($image_url);
        $image_alt = get_the_title($id);
        $image_title = get_the_title($id) . ' : ' . get_field('vehicle-description');

        $model_brand = wp_get_post_terms($id, 'brand');
        $brand = $model_brand[0]->name;
        $brand_slug = $model_brand[0]->slug;
        $model_title = get_the_title($id);
        $model_name = get_field('vehicle-model', $id);
        $model_version = get_field('vehicle-verison', $id);
        $model_description = get_field('vehicle-description', $id);
        $show_caption = get_field('vehicle-header-show-caption', $id);
        $model_caption = get_field('vehicle-header-caption', $id);
        $caption_position = get_field('vehicle-header-caption-position', $id);
        ?>

        <li>
            <img src="<?php echo $image_sd_url; ?>"
                 srcset="<?php echo $image_sd_url; ?> 500w, <?php echo $image_url; ?> 1000w"
                 alt="<?php echo $image_alt; ?>"
                 title="<?php echo $image_title; ?>"/>
            <?php if($show_caption==1){ ?>
                <div class="caption-wrapper brand-<?php echo $brand_slug; ?>">
                    <div class="caption" data-animation="fade">
                        <div class="vertical-align-wrapper">
                            <div class="vertical-align <?php echo $caption_position; ?>">
                                <div class="horizontal-align">
                                    <div class="caption-contents" style="<?php echo $caption_background_style; ?>">
                                        <h2><?php echo $model_title; ?></h2>
                                        <?php if($model_caption){ echo $model_caption; } else { echo $model_description; } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </li>

        <?php
    }

}

function get_vehicle_equipment_package($page_id, $models)
{
?>

<div class="vehicle-equipment-panel">
    <ul id="vehicle-equipment-tabs-<?php echo $page_id; ?>" class="nav nav-tabs responsive" data-tabs="tabs">
    <?php
    $model_counter = 1;
    foreach ($models as $model) {
        $id = $model->ID;
        $post_type = get_post_type($id);
        $model_brand = wp_get_post_terms($id, 'brand');
        $brand = $model_brand[0]->name;
        $brand_slug = $model_brand[0]->slug;
        $model_title = get_the_title($id);
        $model_version = get_field('vehicle-version', $id);
        $model_slug = 'equipment-' . get_slug($model_title);
        $model_class = '';

        if ($model_counter == 1) {
            $model_class = 'active';
        }
        ?>
        <li class="<?php echo $model_class; ?> <?php echo $brand_slug; ?>">
            <a href="#<?php echo $model_slug; ?>" data-toggle="tab"><?php echo $model_version; ?></a>
        </li>
        <?php
        $model_counter++;
    }
    ?>
    </ul>

    <div id="vehicle-equipment-content-<?php echo $page_id; ?>" class="tab-content responsive">
    <?php
    $model_counter = 1;

    foreach ($models as $model) {
        $id = $model->ID;
        $post_type = get_post_type($id);
        $model_brand = wp_get_post_terms($id, 'brand');
        $brand = $model_brand[0]->name;
        $brand_slug = $model_brand[0]->slug;
        $model_title = get_the_title($id);

        $model_version = get_field('vehicle-version', $id);
        $model_header = get_field('vehicle-header', $id);
        $model_description = get_field('vehicle-description', $id);

        $model_slug = 'equipment-' . get_slug($model_title);
        $model_class = '';

        if ($model_counter == 1) {
            $model_class = 'active';
        }

        $model_equipment_package = get_field('vehicle-equipment-package', $id);

        ?>

        <div class="tab-pane <?php echo $model_class; ?> <?php echo $brand_slug ?>" id="<?php echo $model_slug; ?>">
            <div class="row">
                <div class="col-xs-12">
                    <h3><?php echo $model_header; ?></h3>
                    <p><?php echo $model_description; ?></p>
                </div>
            </div>
            <div class="row">

                <?php

                foreach ($model_equipment_package as $package) {
                    $package_id = $package->ID;
                    $saftey = get_field('vehicle-equipment-saftey', $package_id);
                    $tech = get_field('vehicle-equipment-tech', $package_id);
                    $comfort = get_field('vehicle-equipment-comfort', $package_id);
                    $styling = get_field('vehicle-equipment-styling', $package_id);
                    $misc = get_field('vehicle-equipment-misc', $package_id);
                    $extra = get_field('vehicle-equipment-extra', $package_id);
                    ?>

                    <?php if ($saftey) { ?>

                        <div class="col-xs-12 col-sm-4">
                            <h4>Säkerhet</h4>

                            <div class="panel-group equipment-saftey accordion model-<?php echo $package_id; ?>"
                                 id="accordion-<?php echo $package_id; ?>" role="tablist" aria-multiselectable="true">

                                <?php
                                if(count($saftey) <= 5){
                                    $count = count($saftey);
                                }else{
                                    $count = 5;
                                }
                                for($x = 0; $x<$count; $x++){
                                    get_equipment_accordion($package_id, $saftey[$x]->ID);
                                }
                                if(count($saftey) > 5){ ?>
                                    <div class="accordion" id="accordion-saftey-<?php echo $model_slug; ?>">
                                        <div id="collapse-saftey-<?php echo $model_slug; ?>" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                            <?php
                                                for($x = 5; $x<count($saftey); $x++){
                                                    get_equipment_accordion($package_id, $saftey[$x]->ID);
                                                }?>
                                            </div>
                                        </div>
                                        <div class="accordion-heading">
                                           <div class="panel-heading" role="tab">
                                                <h5 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-saftey-<?php echo $model_slug;?>" href="#collapse-saftey-<?php echo $model_slug; ?>">
                                                        Visa fler
                                                    </a>
                                                </h5>
                                           </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($tech) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <h4>Teknik</h4>

                            <div class="panel-group equipment-tech accordion model-<?php echo $package_id; ?>"
                                 id="accordion-<?php echo $package_id; ?>" role="tablist" aria-multiselectable="true">

                                <?php
                                if(count($tech) <= 5){
                                    $count = count($tech);
                                }else{
                                    $count = 5;
                                }
                                for($x = 0; $x<$count; $x++){
                                    get_equipment_accordion($package_id, $tech[$x]->ID);
                                }
                                if(count($tech) > 5){ ?>
                                    <div class="accordion" id="accordion-tech-<?php echo $model_slug; ?>">
                                        <div id="collapse-tech-<?php echo $model_slug; ?>" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                            <?php
                                                for($x = 5; $x<count($tech); $x++){
                                                    get_equipment_accordion($package_id, $tech[$x]->ID);
                                                }?>
                                            </div>
                                        </div>
                                        <div class="accordion-heading">
                                           <div class="panel-heading" role="tab">

                                                <h5 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-tech-<?php echo $model_slug; ?>" href="#collapse-tech-<?php echo $model_slug; ?>">
                                                        Visa fler
                                                    </a>
                                                </h5>
                                           </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($comfort) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <h4>Komfort</h4></h¤>
                            <div class="panel-group equipment-tech accordion model-<?php echo $package_id; ?>"
                                 id="accordion-comfort" role="tablist" aria-multiselectable="true">

                                <?php
                                if(count($comfort) <= 5){
                                    $count = count($comfort);
                                }else{
                                    $count = 5;
                                }
                                for($x = 0; $x<$count; $x++){
                                    get_equipment_accordion($package_id, $comfort[$x]->ID);
                                }
                                if(count($comfort) > 5){ ?>
                                    <div class="accordion" id="accordion-comfort-<?php echo $model_slug; ?>">
                                        <div id="collapse-comfort-<?php echo $model_slug; ?>" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                            <?php
                                                for($x = 5; $x<count($comfort); $x++){
                                                    get_equipment_accordion($package_id, $comfort[$x]->ID);
                                                }?>
                                            </div>
                                        </div>
                                        <div class="accordion-heading">
                                           <div class="panel-heading" role="tab">
                                                <h5 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-comfort-<?php echo $model_slug; ?>" href="#collapse-comfort-<?php echo $model_slug; ?>">
                                                        Visa fler
                                                    </a>
                                                </h5>
                                           </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($styling) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <h4>Styling</h4></h¤>
                            <div class="panel-group equipment-tech accordion model-<?php echo $package_id; ?>"
                                 id="accordion-<?php echo $package_id; ?>" role="tablist" aria-multiselectable="true">

                                <?php
                                if(count($styling) <= 5){
                                    $count = count($styling);
                                }else{
                                    $count = 5;
                                }
                                for($x = 0; $x<$count; $x++){
                                    get_equipment_accordion($package_id, $styling[$x]->ID);
                                }
                                if(count($styling) > 5){ ?>
                                    <div class="accordion" id="accordion-styling-<?php echo $model_slug; ?>">
                                        <div id="collapse-styling-<?php echo $model_slug; ?>" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                            <?php
                                                for($x = 5; $x<count($styling); $x++){
                                                    get_equipment_accordion($package_id, $styling[$x]->ID);
                                                }?>
                                            </div>
                                        </div>
                                        <div class="accordion-heading">
                                           <div class="panel-heading" role="tab">
                                                <h5 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-styling-<?php echo $model_slug; ?>" href="#collapse-styling-<?php echo $model_slug; ?>">
                                                        Visa fler
                                                    </a>
                                                </h5>
                                           </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($misc) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <h4>Övrigt</h4>
                            <div class="panel-group equipment-tech accordion model-<?php echo $package_id; ?>"
                                 id="accordion-misc" role="tablist" aria-multiselectable="true">

                                <?php
                                if(count($misc) <= 5){
                                    $count = count($misc);
                                }else{
                                    $count = 5;
                                }

                                for($x = 0; $x<$count; $x++){
                                    get_equipment_accordion($package_id, $misc[$x]->ID);
                                }
                                if(count($misc) > 5){ ?>
                                    <div class="accordion" id="accordion-misc-<?php echo $model_slug; ?>">
                                        <div id="collapse-misc-<?php echo $model_slug; ?>" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                            <?php
                                                for($x = 5; $x<count($misc); $x++){
                                                    get_equipment_accordion($package_id, $misc[$x]->ID);
                                                }?>
                                            </div>
                                        </div>
                                        <div class="accordion-heading">
                                           <div class="panel-heading" role="tab">
                                                <h5 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-misc-<?php echo $model_slug; ?>" href="#collapse-misc-<?php echo $model_slug; ?>">
                                                        Visa fler
                                                    </a>
                                                </h5>
                                           </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($extra) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <h4>Tillägg</h4></h¤>
                            <div class="panel-group equipment-tech accordion model-<?php echo $package_id; ?>"
                                 id="accordion-extra" role="tablist" aria-multiselectable="true">

                                <?php
                                for($x = 0; $x<5; $x++){
                                    get_equipment_accordion($package_id, $extra[$x]->ID);
                                }
                                if(count($extra) > 5){ ?>
                                    <div class="accordion" id="accordion-extra-<?php echo $model_slug; ?>">
                                        <div id="collapse-extra-<?php echo $model_slug; ?>" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                            <?php
                                                for($x = 5; $x<count($extra); $x++){
                                                    get_equipment_accordion($package_id, $extra[$x]->ID);
                                                }?>
                                            </div>
                                        </div>
                                        <div class="accordion-heading">
                                           <div class="panel-heading" role="tab">
                                                <h5 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-extra-<?php echo $model_slug; ?>" href="#collapse-extra-<?php echo $model_slug; ?>">
                                                        Visa fler
                                                    </a>
                                                </h5>
                                           </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php


                }
                ?>

            </div>
        </div>



        <?php
        $model_counter++;
    }

    ?>
</div>
    </div>

</div>

<?php
}

function get_engine_list($id)
{
    ?>
    <tr>
        <td class="engine-title"><?php echo get_field('engine-subtitle', $id); ?></td>
        <td class="engine-effect"><span class="engine-value"><?php echo get_field('engine-horsepower', $id); ?></span><span class="engine-suffix hidden-xs"> hk</span></td>
        <td class="engine-consumption"><span class="engine-value"><?php echo get_field('engine-consumption', $id); ?></span><span class="engine-suffix hidden-xs"> l/100 km</span></td>
        <td class="engine-carbon"><span class="engine-value"><?php echo get_field('engine-carbondioxide', $id); ?></span><span class="engine-suffix hidden-xs"> g/km</span></td>
    </tr>

<?php
}

function get_model_information_table($page_id, $models)
{
    ?>

<div class="vehicle-information-panel">
    <ul id="vehicle-information-tabs-<?php echo $page_id; ?>" class="nav nav-tabs responsive" data-tabs="tabs">
        <?php
    $model_counter = 1;
    foreach ($models as $model) {
        $id = $model->ID;
        $post_type = get_post_type($id);
        $model_brand = wp_get_post_terms($id, 'brand');
        $brand = $model_brand[0]->name;
        $brand_slug = $model_brand[0]->slug;

        if ($post_type == 'modelgroup') {
            $modelgroup_description = get_field('modelgroup-description', $id);
            $modelgroup_models = get_field('modelgroup-models', $id);
            $modelgroup_engines = get_field('modelgroup-engines', $id);

            foreach ($modelgroup_models as $group_model) {
                $group_model_id = $group_model->ID;
                $model_title = get_the_title($group_model_id);
                $model_version = get_field('vehicle-version', $group_model_id);
                $model_slug = 'information-' . get_slug($model_title);
                $model_class = '';

                if ($model_counter == 1) {
                    $model_class = 'active';
                }

                ?>

                <li class="<?php echo $model_class; ?> <?php echo $brand_slug; ?>">
                    <a href="#<?php echo $model_slug; ?>" data-toggle="tab"><?php echo $model_version; ?></a>
                </li>

                <?php
                $model_counter++;
            }

        } else {
            $model_title = get_the_title($id);
            $model_version = get_field('vehicle-version', $id);
            $model_slug = 'information-' . get_slug($model_title);
            $model_class = '';

            if ($model_counter == 1) {
                $model_class = 'active';
            }
            ?>

            <li class="<?php echo $model_class; ?> <?php echo $brand_slug; ?>">
                <a href="#<?php echo $model_slug; ?>" data-toggle="tab"><?php echo $model_version; ?></a>
            </li>

            <?php
            $model_counter++;
        }
    }
    ?>
    </ul>
    <div id="vehicle-information-content-<?php echo $page_id; ?>" class="tab-content responsive">
        <?php
    $model_counter = 1;
    foreach ($models as $model) {
        $id = $model->ID;
        $post_type = get_post_type($id);
        $model_brand = wp_get_post_terms($id, 'brand');
        $brand = $model_brand[0]->name;
        $brand_slug = $model_brand[0]->slug;

        if ($post_type == 'modelgroup') {

            $modelgroup_description = get_field('modelgroup-description', $id);
            $modelgroup_models = get_field('modelgroup-models', $id);
            $modelgroup_engines = get_field('modelgroup-engines', $id);



            foreach ($modelgroup_models as $group_model) {
                $group_model_id = $group_model->ID;
                $model_title = get_the_title($group_model_id);
                $model_version = get_field('vehicle-version', $group_model_id);
                $model_header = get_field('vehicle-header', $group_model_id);
                $model_description = get_field('vehicle-description', $group_model_id);
                $model_slug = 'information-' . get_slug($model_title);
                $model_class = '';
                $model_image_object = get_field('vehicle-image', $group_model_id);
                $model_image_url = $model_image_object['url'];
                $model_image_sd_url = maybe_add_preview_to_url($model_image_url);

                if ($model_counter == 1) {
                    $model_class = 'active';
                }

                $model_engines = get_field('vehicle-engines', $group_model_id);
                $model_equipment_package = get_field('vehicle-equipment-package', $group_model_id);

                ?>

                <div class="tab-pane <?php echo $model_class; ?> <?php echo $brand_slug ?>"
                     id="<?php echo $model_slug; ?>">
                    <div class="row">

                        <div class="col-xs-12 col-sm-6 col-md-5 pull-right">
                            <img src="<?php echo $model_image_sd_url; ?>" />
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-7">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="engines-title">Motorvarianter</h4>
                                    <?php
                                    if ($model_engines) {
                                        ?>
                                        <div class="row engines-accordions">
                                            <div class="col-xs-12">
                                                <div class="panel-group accordion" id="engines-accordion-<?php echo $group_model_id; ?>" role="tablist" aria-multiselectable="true">
                                            <?php

                                            $engine_ids = array();

                                            foreach ($model_engines as $engine) {
                                                $engine_ids[] = $engine->ID;
                                                if(get_field('engine-fuel',$engine->ID)=='others'){
                                                    $others_text = get_field('engine-fuel-other', $engine->ID);
                                                }
                                            }



                                            $gas_args = array(
                                                'posts_per_page'   => -1,
                                                'offset'           => 0,
                                                'include'          => $engine_ids,
                                                'meta_key'         => 'engine-fuel',
                                                'meta_value'       => 'gas',
                                                'post_type'        => 'engine',
                                                'post_status'      => 'publish',
                                                'suppress_filters' => true,
                                                'order' => 'ASC',
                                            );
                                            $diesel_args = array(
                                                'posts_per_page'   => -1,
                                                'offset'           => 0,
                                                'include'          => $engine_ids,
                                                'meta_key'         => 'engine-fuel',
                                                'meta_value'       => 'diesel',
                                                'post_type'        => 'engine',
                                                'post_status'      => 'publish',
                                                'suppress_filters' => true,
                                                'order' => 'ASC',
                                            );
                                            $hybrid_args = array(
                                                'posts_per_page'   => -1,
                                                'offset'           => 0,
                                                'include'          => $engine_ids,
                                                'meta_key'         => 'engine-fuel',
                                                'meta_value'       => 'hybrid',
                                                'post_type'        => 'engine',
                                                'post_status'      => 'publish',
                                                'suppress_filters' => true,
                                                'order' => 'ASC',
                                            );
                                            $other_args = array(
                                                'posts_per_page'   => -1,
                                                'offset'           => 0,
                                                'include'          => $engine_ids,
                                                'meta_key'         => 'engine-fuel',
                                                'meta_value'       => 'others',
                                                'post_type'        => 'engine',
                                                'post_status'      => 'publish',
                                                'suppress_filters' => true,
                                                'order' => 'ASC',
                                            );
                                            $gas_array = get_posts( $gas_args );
                                            $diesel_array = get_posts( $diesel_args );
                                            $hybrid_array = get_posts( $hybrid_args );
                                            $other_array = get_posts( $other_args );

                                            if($gas_array){
                                                ?>

                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="heading-gas-<?php echo $group_model_id; ?>">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#engines-accordion-<?php echo $group_model_id; ?>" href="#collapse-gas-<?php echo $group_model_id; ?>" aria-expanded="true" aria-controls="collapse-gas-<?php echo $group_model_id; ?>">Bensin</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse-gas-<?php echo $group_model_id; ?>" class="panel-collapse collapse <?php if($hybrid_array && $other_array) { echo ''; } else { echo 'in'; } ?>" role="tabpanel" aria-labelledby="heading-gas-<?php echo $group_model_id; ?>">
                                                                <table class="table table-hover engine-specs">
                                                                <?php
                                                                $engine_table_counter = 1;
                                                                foreach($gas_array as $engine){
                                                                    $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                    if($engine_table_counter==1 && $engine_gearbox=='manual'){
                                                                        ?>
                                                                        <tr class="engine-type-title">
                                                                            <td class="engine-title">Manuell</td>
                                                                            <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                            <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                            <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                        </tr>
                                                                        <?php
                                                                        }
                                                                    if($engine_gearbox == 'manual'){
                                                                        get_engine_list($engine->ID);
                                                                        $engine_table_counter++;
                                                                    }
                                                                }
                                                                $engine_table_counter = 1;
                                                                foreach($gas_array as $engine){
                                                                    $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                    if($engine_table_counter==1 && $engine_gearbox=='auto'){
                                                                        ?>
                                                                        <tr class="engine-type-title">
                                                                            <td class="engine-title">Automat</td>
                                                                            <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                                <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                                <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                        </tr>
                                                                        <?php
                                                                    }

                                                                    if($engine_gearbox == 'auto'){
                                                                        get_engine_list($engine->ID);
                                                                        $engine_table_counter++;
                                                                    }
                                                                }
                                                                ?>
                                                                </table>
                                                            </div>
                                                        </div>

                                                <?php
                                            }
                                            if($diesel_array){
                                                ?>

                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="heading-diesel-<?php echo $group_model_id; ?>">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#engines-accordion-<?php echo $group_model_id; ?>" href="#collapse-diesel-<?php echo $group_model_id; ?>" aria-expanded="false" aria-controls="collapse-diesel-<?php echo $group_model_id; ?>">Diesel</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse-diesel-<?php echo $group_model_id; ?>" class="panel-collapse collapse <?php if(!$gas_array) { echo 'in'; } ?>" role="tabpanel" aria-labelledby="heading-diesel-<?php echo $group_model_id; ?>">
                                                                <table class="table table-hover engine-specs">
                                                                <?php
                                                                $engine_table_counter = 1;
                                                                foreach($diesel_array as $engine){
                                                                    $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                    if($engine_table_counter==1 && $engine_gearbox=='manual'){
                                                                        ?>
                                                                        <tr class="engine-type-title">
                                                                            <td class="engine-title">Manuell</td>
                                                                            <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                            <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                            <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    if($engine_gearbox == 'manual'){
                                                                        get_engine_list($engine->ID);
                                                                        $engine_table_counter++;
                                                                    }
                                                                }
                                                                $engine_table_counter = 1;
                                                                foreach($diesel_array as $engine){
                                                                    $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                    if($engine_table_counter==1 && $engine_gearbox=='auto'){
                                                                        ?>
                                                                        <tr class="engine-type-title">
                                                                            <td class="engine-title">Automat</td>
                                                                            <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                                <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                                <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    if($engine_gearbox == 'auto'){
                                                                        get_engine_list($engine->ID);
                                                                        $engine_table_counter++;
                                                                    }
                                                                }
                                                                ?>
                                                                </table>
                                                            </div>
                                                        </div>

                                                <?php
                                            }
                                            if($hybrid_array){
                                                ?>

                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="heading-hybrid-<?php echo $group_model_id; ?>">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#engines-accordion-<?php echo $group_model_id; ?>" href="#collapse-hybrid-<?php echo $group_model_id; ?>" aria-expanded="false" aria-controls="collapse-hybrid-<?php echo $group_model_id; ?>">Hybrid</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse-hybrid-<?php echo $group_model_id; ?>" class="panel-collapse collapse <?php if(!$diesel_array && !$gas_array) { echo 'in'; } ?>" role="tabpanel" aria-labelledby="heading-hybrid-<?php echo $group_model_id; ?>">
                                                                <table class="table table-hover engine-specs">
                                                                <?php
                                                                $engine_table_counter = 1;
                                                                foreach($hybrid_array as $engine){
                                                                    $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                    if($engine_table_counter==1 && $engine_gearbox=='manual'){
                                                                        ?>
                                                                        <tr class="engine-type-title">
                                                                            <td class="engine-title">Manuell</td>
                                                                            <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                            <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                            <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    if($engine_gearbox == 'manual'){
                                                                        get_engine_list($engine->ID);
                                                                        $engine_table_counter++;
                                                                    }
                                                                }
                                                                $engine_table_counter = 1;
                                                                foreach($hybrid_array as $engine){
                                                                    $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                    if($engine_table_counter==1 && $engine_gearbox=='auto'){
                                                                        ?>
                                                                        <tr class="engine-type-title">
                                                                            <td class="engine-title">Automat</td>
                                                                            <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                                <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                                <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    if($engine_gearbox == 'auto'){
                                                                        get_engine_list($engine->ID);
                                                                        $engine_table_counter++;
                                                                    }
                                                                }
                                                                ?>
                                                                </table>
                                                            </div>
                                                        </div>

                                                <?php
                                            }
                                            if($other_array){
                                                    ?>

                                                            <div class="panel panel-default">
                                                                <div class="panel-heading" role="tab" id="heading-other-<?php echo $group_model_id; ?>">
                                                                    <h4 class="panel-title">
                                                                        <a data-toggle="collapse" data-parent="#engines-accordion-<?php echo $group_model_id; ?>" href="#collapse-other-<?php echo $group_model_id; ?>" aria-expanded="false" aria-controls="collapse-other-<?php echo $group_model_id; ?>"><?php echo $others_text; ?></a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapse-other-<?php echo $group_model_id; ?>" class="panel-collapse collapse <?php if(!$diesel_array && !$gas_array && !$hybrid_array) { echo 'in'; } ?>" role="tabpanel" aria-labelledby="heading-other-<?php echo $group_model_id; ?>">
                                                                    <table class="table table-hover engine-specs">
                                                                    <?php
                                                                    $engine_table_counter = 1;
                                                                    foreach($other_array as $engine){
                                                                        $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                        if($engine_table_counter==1 && $engine_gearbox=='manual'){
                                                                            ?>
                                                                            <tr class="engine-type-title">
                                                                                <td class="engine-title">Manuell</td>
                                                                                <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                                <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                                <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        if($engine_gearbox == 'manual'){
                                                                            get_engine_list($engine->ID);
                                                                            $engine_table_counter++;
                                                                        }
                                                                    }
                                                                    $engine_table_counter = 1;
                                                                    foreach($other_array as $engine){
                                                                        $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                        if($engine_table_counter==1 && $engine_gearbox=='auto'){
                                                                            ?>
                                                                            <tr class="engine-type-title">
                                                                                <td class="engine-title">Automat</td>
                                                                                <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                                    <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                                    <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        if($engine_gearbox == 'auto'){
                                                                            get_engine_list($engine->ID);
                                                                            $engine_table_counter++;
                                                                        }
                                                                    }
                                                                    ?>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                    <?php
                                                }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                        ?>
                                        <div class="row">
                                            <?php
                                            foreach ($modelgroup_engines as $engine) {
                                                echo '<div class="col-xs-12 col-sm-12">';
                                                get_engine_list($engine->ID);
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php

                $model_counter++;
            }
        } elseif ($post_type == 'vehicle') {

            $model_title = get_the_title($id);
            $model_version = get_field('vehicle-version', $id);
            $model_header = get_field('vehicle-header', $id);
            $model_description = get_field('vehicle-description', $id);
            $model_slug = 'information-' . get_slug($model_title);
            $model_class = '';
            $model_image_object = get_field('vehicle-image', $id);
            $model_image_url = $model_image_object['url'];
            $model_image_sd_url = maybe_add_preview_to_url($model_image_url);

            if ($model_counter == 1) {
                $model_class = 'active';
            }

            $model_engines = get_field('vehicle-engines', $id);
            $model_equipment_package = get_field('vehicle-equipment-package', $id);

            ?>

            <div class="tab-pane <?php echo $model_class; ?> <?php echo $brand_slug ?>"
                 id="<?php echo $model_slug; ?>">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <h3><?php echo $model_header; ?></h3>

                        <p><?php echo $model_description; ?></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5 pull-right">
                        <img src="<?php echo $model_image_sd_url; ?>" />
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-7">
                        <div class="row">
                            <div class="col-xs-12">
                                <h4 class="engines-title">Motorvarianter</h4>
                                <?php
                                if ($model_engines) {
                                    ?>
                                    <div class="row engines-accordions">
                                        <div class="col-xs-12">
                                            <div class="panel-group accordion" id="engines-accordion-<?php echo $id; ?>" role="tablist" aria-multiselectable="true">
                                        <?php

                                        $engine_ids = array();

                                        foreach ($model_engines as $engine) {
                                            $engine_ids[] = $engine->ID;
                                            if(get_field('engine-fuel',$engine->ID)=='others'){
                                                $others_text = get_field('engine-fuel-other', $engine->ID);
                                            }
                                        }



                                        $gas_args = array(
                                            'posts_per_page'   => -1,
                                            'offset'           => 0,
                                            'include'          => $engine_ids,
                                            'meta_key'         => 'engine-fuel',
                                            'meta_value'       => 'gas',
                                            'post_type'        => 'engine',
                                            'post_status'      => 'publish',
                                            'suppress_filters' => true
                                        );
                                        $diesel_args = array(
                                            'posts_per_page'   => -1,
                                            'offset'           => 0,
                                            'include'          => $engine_ids,
                                            'meta_key'         => 'engine-fuel',
                                            'meta_value'       => 'diesel',
                                            'post_type'        => 'engine',
                                            'post_status'      => 'publish',
                                            'suppress_filters' => true
                                        );
                                        $hybrid_args = array(
                                            'posts_per_page'   => -1,
                                            'offset'           => 0,
                                            'include'          => $engine_ids,
                                            'meta_key'         => 'engine-fuel',
                                            'meta_value'       => 'hybrid',
                                            'post_type'        => 'engine',
                                            'post_status'      => 'publish',
                                            'suppress_filters' => true
                                        );
                                        $other_args = array(
                                            'posts_per_page'   => -1,
                                            'offset'           => 0,
                                            'include'          => $engine_ids,
                                            'meta_key'         => 'engine-fuel',
                                            'meta_value'       => 'others',
                                            'post_type'        => 'engine',
                                            'post_status'      => 'publish',
                                            'suppress_filters' => true
                                        );
                                        $gas_array = get_posts( $gas_args );
                                        $diesel_array = get_posts( $diesel_args );
                                        $hybrid_array = get_posts( $hybrid_args );
                                        $other_array = get_posts( $other_args );

                                        if($gas_array){
                                            ?>

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-gas-<?php echo $id; ?>">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#engines-accordion-<?php echo $id; ?>" href="#collapse-gas-<?php echo $id; ?>" aria-expanded="true" aria-controls="collapse-gas-<?php echo $id; ?>">Bensin</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-gas-<?php echo $id; ?>" class="panel-collapse collapse <?php if($hybrid_array && $other_array) { echo ''; } else { echo 'in'; } ?>" role="tabpanel" aria-labelledby="heading-gas-<?php echo $id; ?>">
                                                            <table class="table table-hover engine-specs">
                                                            <?php
                                                            $engine_table_counter = 1;
                                                            foreach($gas_array as $engine){
                                                                $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                if($engine_table_counter==1 && $engine_gearbox=='manual'){
                                                                    ?>
                                                                    <tr class="engine-type-title">
                                                                        <td class="engine-title">Manuell</td>
                                                                        <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                        <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                        <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                    </tr>
                                                                    <?php
                                                                    }
                                                                if($engine_gearbox == 'manual'){
                                                                    get_engine_list($engine->ID);
                                                                    $engine_table_counter++;
                                                                }
                                                            }
                                                            $engine_table_counter = 1;
                                                            foreach($gas_array as $engine){
                                                                $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                if($engine_table_counter==1 && $engine_gearbox=='auto'){
                                                                    ?>
                                                                    <tr class="engine-type-title">
                                                                        <td class="engine-title">Automat</td>
                                                                        <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                            <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                            <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                    </tr>
                                                                    <?php
                                                                }

                                                                if($engine_gearbox == 'auto'){
                                                                    get_engine_list($engine->ID);
                                                                    $engine_table_counter++;
                                                                }
                                                            }
                                                            ?>
                                                            </table>
                                                        </div>
                                                    </div>

                                            <?php
                                        }
                                        if($diesel_array){
                                            ?>

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-diesel-<?php echo $id; ?>">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#engines-accordion-<?php echo $id; ?>" href="#collapse-diesel-<?php echo $id; ?>" aria-expanded="false" aria-controls="collapse-diesel-<?php echo $id; ?>">Diesel</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-diesel-<?php echo $id; ?>" class="panel-collapse collapse <?php if(!$gas_array) { echo 'in'; } ?>" role="tabpanel" aria-labelledby="heading-diesel-<?php echo $id; ?>">
                                                            <table class="table table-hover engine-specs">
                                                            <?php
                                                            $engine_table_counter = 1;
                                                            foreach($diesel_array as $engine){
                                                                $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                if($engine_table_counter==1 && $engine_gearbox=='manual'){
                                                                    ?>
                                                                    <tr class="engine-type-title">
                                                                        <td class="engine-title">Manuell</td>
                                                                        <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                        <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                        <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                if($engine_gearbox == 'manual'){
                                                                    get_engine_list($engine->ID);
                                                                    $engine_table_counter++;
                                                                }
                                                            }
                                                            $engine_table_counter = 1;
                                                            foreach($diesel_array as $engine){
                                                                $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                if($engine_table_counter==1 && $engine_gearbox=='auto'){
                                                                    ?>
                                                                    <tr class="engine-type-title">
                                                                        <td class="engine-title">Automat</td>
                                                                        <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                            <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                            <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                if($engine_gearbox == 'auto'){
                                                                    get_engine_list($engine->ID);
                                                                    $engine_table_counter++;
                                                                }
                                                            }
                                                            ?>
                                                            </table>
                                                        </div>
                                                    </div>

                                            <?php
                                        }
                                        if($hybrid_array){
                                            ?>

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-hybrid-<?php echo $id; ?>">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#engines-accordion-<?php echo $id; ?>" href="#collapse-hybrid-<?php echo $id; ?>" aria-expanded="false" aria-controls="collapse-hybrid-<?php echo $id; ?>">Hybrid</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-hybrid-<?php echo $id; ?>" class="panel-collapse collapse <?php if(!$diesel_array && !$gas_array) { echo 'in'; } ?>" role="tabpanel" aria-labelledby="heading-hybrid-<?php echo $id; ?>">
                                                            <table class="table table-hover engine-specs">
                                                            <?php
                                                            $engine_table_counter = 1;
                                                            foreach($hybrid_array as $engine){
                                                                $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                if($engine_table_counter==1 && $engine_gearbox=='manual'){
                                                                    ?>
                                                                    <tr class="engine-type-title">
                                                                        <td class="engine-title">Manuell</td>
                                                                        <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                        <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                        <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                if($engine_gearbox == 'manual'){
                                                                    get_engine_list($engine->ID);
                                                                    $engine_table_counter++;
                                                                }
                                                            }
                                                            $engine_table_counter = 1;
                                                            foreach($hybrid_array as $engine){
                                                                $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                if($engine_table_counter==1 && $engine_gearbox=='auto'){
                                                                    ?>
                                                                    <tr class="engine-type-title">
                                                                        <td class="engine-title">Automat</td>
                                                                        <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                            <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                            <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                if($engine_gearbox == 'auto'){
                                                                    get_engine_list($engine->ID);
                                                                    $engine_table_counter++;
                                                                }
                                                            }
                                                            ?>
                                                            </table>
                                                        </div>
                                                    </div>

                                            <?php
                                        }
                                        if($other_array){
                                                ?>

                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="heading-other-<?php echo $id; ?>">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#engines-accordion-<?php echo $id; ?>" href="#collapse-other-<?php echo $id; ?>" aria-expanded="false" aria-controls="collapse-other-<?php echo $id; ?>"><?php echo $others_text; ?></a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse-other-<?php echo $id; ?>" class="panel-collapse collapse <?php if(!$diesel_array && !$gas_array && !$hybrid_array) { echo 'in'; } ?>" role="tabpanel" aria-labelledby="heading-other-<?php echo $id; ?>">
                                                                <table class="table table-hover engine-specs">
                                                                <?php
                                                                $engine_table_counter = 1;
                                                                foreach($other_array as $engine){
                                                                    $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                    if($engine_table_counter==1 && $engine_gearbox=='manual'){
                                                                        ?>
                                                                        <tr class="engine-type-title">
                                                                            <td class="engine-title">Manuell</td>
                                                                            <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                            <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                            <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    if($engine_gearbox == 'manual'){
                                                                        get_engine_list($engine->ID);
                                                                        $engine_table_counter++;
                                                                    }
                                                                }
                                                                $engine_table_counter = 1;
                                                                foreach($other_array as $engine){
                                                                    $engine_gearbox = get_field('engine-gearbox',$engine->ID);
                                                                    if($engine_table_counter==1 && $engine_gearbox=='auto'){
                                                                        ?>
                                                                        <tr class="engine-type-title">
                                                                            <td class="engine-title">Automat</td>
                                                                            <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                                <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                                <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    if($engine_gearbox == 'auto'){
                                                                        get_engine_list($engine->ID);
                                                                        $engine_table_counter++;
                                                                    }
                                                                }
                                                                ?>
                                                                </table>
                                                            </div>
                                                        </div>

                                                <?php
                                            }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                    ?>
                                    <div class="row">
                                        <?php
                                        foreach ($modelgroup_engines as $engine) {
                                            echo '<div class="col-xs-12 col-sm-12">';
                                            get_engine_list($engine->ID);
                                            echo '</div>';
                                        }
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php

            $model_counter++;
        }
    }
    ?>
    </div>
</div>
</div>

<?php
// END GET MODEL INFORMATION TABLE
}

function get_equipment_accordion($package_id, $equipment_id, $active = true, $equipment_counter)
{

    $equipment_title = get_the_title($equipment_id);
    $equipment_description = get_field('equipment-description', $equipment_id);

    if ($active == true && $equipment_counter == 1) {
        $aria_expanded = 'true';
        $equipment_class = 'in';
    } else {
        $aria_expanded = 'false';
        $equipment_class = '';
    }

    ?>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading-eq-list-<?php echo $package_id . '-' . $equipment_id; ?>">
            <h5 class="panel-title">
                <?php if($equipment_description){ ?>
                <a data-toggle="collapse"
                   data-parent="#accordion-<?php echo $package_id; ?>"
                   href="#collapse-eq-list-<?php echo $package_id . '-' . $equipment_id; ?>"
                   aria-controls="collapse-eq-list-<?php echo $package_id . '-' . $equipment_id; ?>"
                   aria-expanded="<?php echo $aria_expanded; ?>">
                    <?php echo $equipment_title; ?>
                </a>
                <?php } else { ?>
                    <a class="no-content"><?php echo $equipment_title; ?></a>
                <?php } ?>
            </h5>
        </div>
        <div id="collapse-eq-list-<?php echo $package_id . '-' . $equipment_id; ?>"
             class="panel-collapse collapse <?php echo $equipment_class; ?>"
             role="tabpanel"
             aria-labelledby="heading-eq-list-<?php echo $package_id . '-' . $equipment_id; ?>"
             aria-expanded="<?php echo $aria_expanded; ?>">
            <?php if($equipment_description){ ?>
            <div class="panel-body">
                <?php
                if (get_field('equipment-image', $equipment_id)) {
                    $image_object = get_field('equipment-image', $equipment_id);
                    $image_url = $image_object['sizes']['rectangle-default'];
                    ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8">
                            <?php echo $equipment_description; ?>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <img src="<?php echo $image_url; ?>"
                                 class="equipment-image"
                                 alt="<?php echo $equipment_title; ?>"
                                 title="<?php echo $equipment_title; ?>"/>
                        </div>

                    </div>
                <?php
                } else {
                    echo get_field('equipment-description', $equipment_id);
                }
                ?>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php


    ?>


<?php
}

function get_vehicle_gallery($page_id, $models)
{
    ?>
    <link rel="stylesheet" href="/wp-content/themes/upplands-motor/css/extra/lightcase.css">
    <script src="/wp-content/themes/upplands-motor/js/extra/lightcase.min.js"></script>

    <div class="vehicle-gallery-panel">
        <ul id="vehicle-gallery-tabs-<?php echo $page_id; ?>" class="nav nav-tabs responsive" data-tabs="tabs">
            <?php
            $model_counter = 1;
            foreach ($models as $model) {
                $id = $model->ID;

                if ($model->post_type === 'modelgroup') {
                    $modelgroup_models = get_field('modelgroup-models', $id);

                    foreach ($modelgroup_models as $group_model) {
                        $group_model_id = $group_model->ID;
                        $model_title = get_the_title($group_model_id);
                        $model_version = get_field('vehicle-version', $group_model_id);
                        $model_header = get_field('vehicle-header', $group_model_id);
                        $model_description = get_field('vehicle-description', $group_model_id);
                        $model_slug = 'gallery-' . get_slug($model_title);
                        $model_class = '';
                        $model_image_object = get_field('vehicle-image', $group_model_id);
                        $model_image = $model_image_object['url'];

                        if ($model_counter == 1) {
                            $model_class = 'active';
                        }
                        ?>

                            <li class="<?php echo $model_class; ?> <?php echo $brand_slug; ?>">
                                <a href="#<?php echo $model_slug . '-' . $model_counter; ?>" data-toggle="tab"><?php echo $model_version; ?></a>
                            </li>

                        <?php
                        $model_counter++;
                    }

                } else {
                    $model_title = get_the_title($id);
                    $model_brand = get_field('vehicle-brand', $id);
                    $model_brand = get_term_by('id', $model_brand, 'brand');
                    $brand_slug = get_slug($model_brand->name);
                    $model_name = get_field('vehicle-model', $id);
                    $model_version = get_field('vehicle-version', $id);
                    $model_slug = 'gallery-' . get_slug($model_title);
                    $model_class = '';

                    if ($model_counter == 1) {
                        $model_class = 'active';
                    }
                    ?>

                    <li class="<?php echo $model_class; ?> <?php echo $brand_slug; ?>">
                        <a href="#<?php echo $model_slug . '-' . $model_counter; ?>" data-toggle="tab"><?php echo $model_version; ?></a>
                    </li>

                    <?php
                    $model_counter++;
                }

            }
            ?>
        </ul>

        <div id="vehicle-gallery-content-<?php echo $page_id; ?>" class="tab-content responsive">
            <?php
            $model_counter = 1;

            foreach ($models as $model) {
                $id = $model->ID;

                if ($model->post_type === 'modelgroup') {

                    foreach ($modelgroup_models as $group_model) {
                        $group_model_id = $group_model->ID;
                        $model_title = get_the_title($group_model_id);
                        $model_brand = get_field('vehicle-brand', $group_model_id);
                        $model_brand = get_term_by('id', $model_brand, 'brand');
                        $brand_slug = get_slug($model_brand->name);
                        $model_name = get_field('vehicle-model', $id);
                        $model_version = get_field('vehicle-version', $id);
                        $model_slug = 'gallery-' . get_slug($model_title);
                        $model_class = '';

                        if ($model_counter == 1) {
                            $model_class = 'active';
                        }
                        ?>

                        <div class="tab-pane <?php echo $model_class; ?> <?php echo $brand_slug; ?>"
                             id="<?php echo $model_slug . '-' . $model_counter; ?>">
                            <div class="row">
                                <?php
                                while (have_rows('vehicle-gallery', $group_model_id)) {
                                    the_row();
                                    $image_object = get_sub_field('vehicle-gallery-image');
                                    $image_url = $image_object['sizes']['rectangle-default'];
                                    $image_caption = get_sub_field('vehicle-gallery-caption');
                                    ?>
                                    <div class="col-xs-6 col-sm-4">
                                        <div class="gallery-image-container">
                                            <a data-rel="lightcase:<?php echo get_slug($model_title); ?>"
                                               href="<?php echo $image_url; ?>"
                                               title="<?php echo $model_title . ': ' . $image_caption; ?>"
                                               alt="<?php echo $model_title . ': ' . $image_caption; ?>">
                                                <img src="<?php echo $image_url; ?>" class="gallery-image"/>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <?php
                        $model_counter++;
                    }


                } else {
                    $model_title = get_the_title($id);
                    $model_brand = get_field('vehicle-brand', $id);
                    $model_brand = get_term_by('id', $model_brand, 'brand');
                    $brand_slug = get_slug($model_brand->name);
                    $model_name = get_field('vehicle-model', $id);
                    $model_version = get_field('vehicle-version', $id);
                    $model_slug = 'gallery-' . get_slug($model_title);
                    $model_class = '';

                    if ($model_counter == 1) {
                        $model_class = 'active';
                    }
                    ?>

                    <div class="tab-pane <?php echo $model_class; ?> <?php echo $brand_slug ?>"
                         id="<?php echo $model_slug . '-' . $model_counter; ?>">
                        <div class="row">
                            <?php
                            while (have_rows('vehicle-gallery', $id)) {
                                the_row();
                                $image_object = get_sub_field('vehicle-gallery-image');
                                $image_url = $image_object['sizes']['rectangle-default'];
                                $image_caption = get_sub_field('vehicle-gallery-caption');
                                ?>
                                <div class="col-xs-6 col-sm-4">
                                    <div class="gallery-image-container">
                                        <a data-rel="lightcase:<?php echo get_slug($model_title); ?>"
                                           href="<?php echo $image_url; ?>"
                                           title="<?php echo $model_title . ': ' . $image_caption; ?>"
                                           alt="<?php echo $model_title . ': ' . $image_caption; ?>">
                                            <img src="<?php echo $image_url; ?>" class="gallery-image"/>
                                        </a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <?php
                    $model_counter++;
                }

            }
            ?>

        </div>
    </div>
    <script>
        $ = jQuery;
        $(document).ready(function ($) {
            $('a[data-rel^=lightcase]').lightcase({
                maxWidth: 1170,
                maxHeight: 640,
            });
        });
    </script>
<?php
}


add_filter( 'manage_edit-vehicle_columns', 'my_edit_vehicle_columns' ) ;
function my_edit_vehicle_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Bilmodell' ),
		'brand' => __( 'Märke/Modell' ),
		'date' => __( 'Date' )
	);
	return $columns;
}

add_filter( 'manage_edit-engine_columns', 'my_edit_engine_columns' ) ;
function my_edit_engine_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Motorvariant' ),
		'brand' => __( 'Märke/Modell' ),
		'date' => __( 'Date' )
	);
	return $columns;
}

add_filter( 'manage_edit-equipment_columns', 'my_edit_equipment_columns' ) ;
function my_edit_equipment_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Utrustning' ),
		'brand' => __( 'Märke/Modell' ),
        'utrustning' => __( 'Utrustningstyp' ),
		'date' => __( 'Date' )
	);
	return $columns;
}

add_filter( 'manage_edit-modelgroup_columns', 'my_edit_modelgroup_columns' ) ;
function my_edit_modelgroup_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Modellgrupp' ),
		'brand' => __( 'Märke/Modell' ),
		'date' => __( 'Date' )
	);
	return $columns;
}

add_filter( 'manage_edit-offer_columns', 'my_edit_offer_columns' ) ;
function my_edit_offer_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Titel' ),
        'offer_type' => __('Erbjudandetyper' ),
		'brand' => __( 'Märke/Modell' ),
		'date' => __( 'Date' )
	);
	return $columns;
}

add_action( 'manage_vehicle_posts_custom_column', 'my_manage_vehicle_columns', 10, 2 );
add_action( 'manage_engine_posts_custom_column', 'my_manage_vehicle_columns', 10, 2 );
add_action( 'manage_equipment_posts_custom_column', 'my_manage_vehicle_columns', 10, 2 );
add_action( 'manage_modelgroup_posts_custom_column', 'my_manage_vehicle_columns', 10, 2 );
add_action( 'manage_offer_posts_custom_column', 'my_manage_vehicle_columns', 10, 2 );

function my_manage_vehicle_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		/* If displaying the 'genre' column. */
		case 'brand' :
			/* Get the genres for the post. */
			$terms = get_the_terms( $post_id, 'brand' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'brand' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'brand', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'Inget märke' );
			}
			break;
        case 'offer_type' :
			/* Get the genres for the post. */
			$terms = get_the_terms( $post_id, 'offer_type' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'offer_type' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'offer_type', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'Ingen erbjudandetyp' );
			}
			break;
        case 'utrustning' :
			/* Get the genres for the post. */
			$terms = get_the_terms( $post_id, 'utrustning' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'utrustning' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'utrustning', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'Ingen Utrustningstyp' );
			}
			break;
		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}

add_filter( 'manage_edit-vehicle_sortable_columns', 'my_vehicle_sortable_columns' );
add_filter( 'manage_edit-modelgroup_sortable_columns', 'my_vehicle_sortable_columns' );
add_filter( 'manage_edit-engine_sortable_columns', 'my_vehicle_sortable_columns' );
add_filter( 'manage_edit-equipment_sortable_columns', 'my_vehicle_sortable_columns' );
add_filter( 'manage_edit-offer_sortable_columns', 'my_vehicle_sortable_columns' );


function my_vehicle_sortable_columns( $columns ) {
	$columns['brand'] = 'brand';
    $columns['utrustning'] = 'utrustning';
	return $columns;
}

?>
