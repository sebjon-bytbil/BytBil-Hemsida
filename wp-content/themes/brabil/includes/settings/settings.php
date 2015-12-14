<?php

/* Options Page */
if (function_exists('acf_set_options_page_title')) {
    acf_set_options_page_title('Bra Bil');
    acf_add_options_sub_page('Inställningar');
}

if (function_exists('register_field_group')) {
    register_field_group(array(
        'id' => 'acf_hemsideinstallningar',
        'title' => 'Hemsideinställningar',
        'fields' => array(
            array(
                'key' => 'field_91084091248bb',
                'label' => 'Sociala länkar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_91085091249bb',
                'label' => 'Facebook',
                'name' => 'settings-fb',
                'type' => 'text',
                'instructions' => 'Facebook',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_91085091250bb',
                'label' => 'Facebook App ID',
                'name' => 'settings-fb-app-id',
                'type' => 'text',
                'instructions' => 'Fyll i ert Facebook app-id som kommer användas vid delningar till Facebook.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_91085091251bb',
                'label' => 'Instagram',
                'name' => 'settings-insta',
                'type' => 'text',
                'instructions' => 'Instagram',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_91085091252bb',
                'label' => 'Instagram App ID',
                'name' => 'settings-insta-app-id',
                'type' => 'text',
                'instructions' => 'Fyll i ert Instagram',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_91085091253bb',
                'label' => 'Twitter',
                'name' => 'settings-twitter',
                'type' => 'text',
                'instructions' => 'Twitter',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_91085091254bb',
                'label' => 'Twitter App ID',
                'name' => 'settings-twitter-app-id',
                'type' => 'text',
                'instructions' => 'Fyll i ert Twitter App ID.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-installningar',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

?>
