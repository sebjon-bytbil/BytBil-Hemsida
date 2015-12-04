<?php

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_page_bottom',
        'title' => 'Sidbotten',
        'fields' => array (
            array(
                'key' => 'field_541ac92cb423a',
                'label' => '',
                'name' => 'page_plugs',
                'type' => 'repeater',
                'sub_fields' => array(
                    array (
                        'key' => 'field_15389fae2b1fa1',
                        'label' => 'Puff',
                        'name' => 'plug-selected',
                        'type' => 'post_object',
                        'post_type' => array (
                            0 => 'plug',
                        ),
                        'taxonomy' => array (
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_15284ff7d465e',
                        'label' => 'Visa endast i mobil',
                        'name' => 'plug-mobile-only',
                        'type' => 'true_false',
                        'message' => '',
                        'default_value' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till nummer',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}