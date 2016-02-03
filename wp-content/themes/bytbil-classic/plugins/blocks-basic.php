<?php
/**
 * Plugin Name: BytBil Blocks Basic
 * Description: Blocks för bytbil
 * Version: 0.1
 * Author: BytBil AB
 * Author URI: http://www.bytbil.com
 */

// Lägg till fält för block

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_block',
        'title' => 'Block',
        'fields' => array(
            array(
                'key' => 'field_535f56e8d59ae',
                'label' => 'Block',
                'name' => 'page_block',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_535f57fd3cafb',
                        'label' => 'Blockstorlek',
                        'name' => 'page_block-size',
                        'type' => 'radio',
                        'column_width' => '',
                        'choices' => array(
                            'col-sm-6 col-md-3' => 'Liten',
                            'col-sm-6 col-md-4' => 'Mellan',
                            'col-md-6' => 'Stor',
                            'col-md-8' => 'Störst',
                            'col-sm-12' => 'Fullbredd',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_535f5735d59b0',
                        'label' => 'Rubrik',
                        'name' => 'page_block-title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_535f5711d59af',
                        'label' => 'Innehåll',
                        'name' => 'page_block-content',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array(
                        'key' => 'field_535f62b69a30e',
                        'label' => 'Dölj block på...',
                        'name' => 'page_block-hide-on',
                        'type' => 'checkbox',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_535f57fd3cafb',
                                    'operator' => '==',
                                    'value' => 'col-sm-6 col-md-3',
                                ),
                                array(
                                    'field' => 'field_535f57fd3cafb',
                                    'operator' => '==',
                                    'value' => 'col-sm-6 col-md-4',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'hidden-xs' => 'Mobilen',
                            'hidden-sm' => 'Surfplatta',
                            'hidden-md' => 'Datorer',
                            '' => '',
                        ),
                        'default_value' => '',
                        'layout' => 'vertical',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till block',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_blocks.php',
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


?>