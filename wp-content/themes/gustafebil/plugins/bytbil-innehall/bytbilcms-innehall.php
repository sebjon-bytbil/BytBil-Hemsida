<?php
/*
Plugin Name: BytBil Innehållsblock
Description: Gör det möjligt att använda sig av innehållsblock i BytBil CMS 2.0
Author: Sebastian Jonsson / Leo Starcevic : BytBil.com
Version: 2.0
Author URI: http://www.bytbil.com
*/

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_innehall',
        'title' => 'Innehåll',
        'fields' => array(

            array(
                'key' => 'field_541c202166ebc',
                'label' => 'Innehåll',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541c243966ec0',
                'label' => 'Lägg till innehållsblock',
                'name' => 'contents',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_541c2e53ac6fe',
                        'label' => 'Blockrubrik',
                        'name' => 'content-title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => 'Rubrik...',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_541c2e7eca9ff',
                        'label' => 'Dölj blockets rubrik på sidan',
                        'name' => 'setting-hide-header',
                        'type' => 'true_false',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_321c2e7ec3211',
                        'label' => 'Dölj blocket för mobiltelefoner',
                        'name' => 'setting-hide-for-mobile',
                        'type' => 'true_false',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_1422865792725',
                        'label' => 'Dölj blockram',
                        'name' => 'block-hide-container',
                        'type' => 'true_false',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_541c2f5ae6cb8',
                        'label' => 'Blockbredd',
                        'name' => 'content-size',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            12 => '100%',
                            9 => '75%',
                            8 => '66%',
                            6 => '50%',
                            4 => '33%',
                            3 => '25%',
                            2 => '16%',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 12,
                        'layout' => 'horizontal',
                    ),
                    /*array (
                        'key' => 'field_1422879977051',
                        'label' => 'Rubrik ikon',
                        'name' => 'content-header_icon',
                        'type' => 'select',
                        'choices' => array (
                            'entypo-archive' => 'entypo-archive',
                            'entypo-attatch' => 'entypo-attatch',
                            'entypo-attention' => 'entypo-attention',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),*/
                    array(
                        'key' => 'field_541c246266ec1',
                        'label' => 'Innehåll',
                        'name' => 'content-type',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'wysiwyg' => 'Eget innehåll',
                            /*'slideshow' => 'Bildspel',*/
                            'bildspel' => 'Bildspel 2',
                            'offers' => 'Erbjudanden',
                            'assortment' => 'Fordon i lager',
                            'plugs' => 'Puffar',
                            'employees' => 'Personal',
                            'facility' => 'Anläggningsinformation',
                            'map' => 'Karta',
                            'contactform' => 'Kontaktformulär',
                            'news' => 'Nyhetsflöde',
                            'brands' => "Märken",
                            'html' => 'HTML-kod',
                            'department' => "Avdelning"

                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'wysiwyg',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_587dfkjh98efbj38s66ec2',
                        'label' => 'Avdelning',
                        'name' => 'content-department',
                        'type' => 'bbcms_department',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'department',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                    ),
                    array(
                        'key' => 'field_541c248366ec2',
                        'label' => 'Eget innehåll',
                        'name' => 'content-wysiwyg',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'wysiwyg',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    /*array (
                        'key' => 'field_541c249a66ec3',
                        'label' => 'Bildspel',
                        'name' => 'content-slideshow',
                        'type' => 'post_object',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'slideshow',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array (
                            0 => 'slideshow',
                        ),
                        'taxonomy' => array (
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),*/
                    array(
                        'key' => 'field_541c249c77ec3',
                        'label' => 'Bildspel',
                        'name' => 'content-slideshow-2',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'bildspel',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'bildspel',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_541casd32r987fsdg98h23sdf249a66ec3',
                        'label' => 'Bredd',
                        'name' => 'content-slideshow-width',
                        'type' => 'number',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'slideshow',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        "default_value" => 1110,
                        "append" => "px"
                    ),
                    array(
                        'key' => 'field_541casd32r2asdfsdf249a66ec3',
                        'label' => 'Höjd',
                        'name' => 'content-slideshow-height',
                        'type' => 'number',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'slideshow',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        "default_value" => 389,
                        "append" => "px"
                    ),
                    array(
                        'key' => 'field_541d64e8a7382',
                        'label' => 'Visa',
                        'name' => 'content-offers-choice',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'offers',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'latest' => 'Senaste erbjudanden',
                            'specific' => 'Ett specifikt erbjudande',
                            'brand' => 'Alla från ett märke',
                            'facility' => 'Alla hos en anläggning',
                            'all' => 'Alla erbjudanden',
                            'own' => 'Välj egna',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_5423ac096321ca6',
                        'label' => 'Erbjudanden',
                        'name' => 'content-offers-own',
                        'type' => 'relationship',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541d64e8a7382',
                                    'operator' => '==',
                                    'value' => 'own',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'return_format' => 'object',
                        'post_type' => array(
                            0 => 'offer',
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
                        'key' => 'field_541d6552a7383',
                        'label' => 'Erbjudande',
                        'name' => 'content-offer-specific',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541d64e8a7382',
                                    'operator' => '==',
                                    'value' => 'specific',
                                ),
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'offers',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'offer',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_541d657fa7384',
                        'label' => 'Erbjudanden från',
                        'name' => 'content-offer-brand',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541d64e8a7382',
                                    'operator' => '==',
                                    'value' => 'brand',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'brand',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_541d6688a7385',
                        'label' => 'Erbjudanden hos',
                        'name' => 'content-offer-facility',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541d64e8a7382',
                                    'operator' => '==',
                                    'value' => 'facility',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'facility',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_562a23ebc126e',
                        'label' => 'Storlek',
                        'name' => 'content-offer-col-size',
                        'type' => 'radio',
                        'column_width' => '',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541d64e8a7382',
                                    'operator' => '!=',
                                    'value' => 'specific',
                                ),
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'offers',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'choices' => array(
                            3 => 'Fyra kolumner',
                            4 => 'Tre kolumner',
                            6 => 'Två kolumner',

                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 4,
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_541c36101aded',
                        'label' => 'Visa:',
                        'name' => 'content-assortment',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'assortment',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'list' => 'Fordonslista',
                            'object' => 'Enskilt fordon',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'list',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_541c35d51adec',
                        'label' => 'Fordons ID',
                        'name' => 'content-assortment-object',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c36101aded',
                                    'operator' => '==',
                                    'value' => 'object',
                                ),
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'assortment',
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
                        'key' => 'field_541c24e066ec5',
                        'label' => 'Fordonslista',
                        'name' => 'content-assortment-list',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c36101aded',
                                    'operator' => '==',
                                    'value' => 'list',
                                ),
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'assortment',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'assortment',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_541c250966ec6',
                        'label' => 'Puffar',
                        'name' => 'content-plugs',
                        'type' => 'relationship',
                        'conditional_logic' => array(
                            'status' => 1,

                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'plugs',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'return_format' => 'object',
                        'post_type' => array(
                            0 => 'plug',
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
                        'key' => 'field_541fab9e566c7',
                        'label' => 'Vilken personal?',
                        'name' => 'content-employees',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'employees',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'employees' => 'Enskild personal',
                            'emlpoyee-list' => 'Personallista',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'vertical',
                    ),
                    array(
                        'key' => 'field_541c25ba4cee7',
                        'label' => 'Dölj personallistans rubrik',
                        'name' => 'content-employee-hide-header',
                        'type' => 'true_false',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'employees',
                                ),
                                array(
                                    'field' => 'field_541fab9e566c7',
                                    'operator' => '==',
                                    'value' => 'emlpoyee-list',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_541c25ba4ca54',
                        'label' => 'Antal per rad',
                        'name' => 'content-employee-cols',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'employees',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'choices' => array(
                            '6' => 'Två',
                            '4' => 'Tre',
                            '3' => 'Fyra',
                        ),
                        'message' => '',
                        'default_value' => '4',
                    ),
                    array(
                        'key' => 'field_541c25b566ec8',
                        'label' => 'Personallistor',
                        'name' => 'content-employee-lists',
                        'type' => 'relationship',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'employees',
                                ),
                                array(
                                    'field' => 'field_541fab9e566c7',
                                    'operator' => '==',
                                    'value' => 'emlpoyee-list',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'return_format' => 'object',
                        'post_type' => array(
                            0 => 'employee_list',
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
                        'key' => 'field_541fabf1566c8',
                        'label' => 'Personal',
                        'name' => 'content-employee-employee',
                        'type' => 'relationship',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'employees',
                                ),
                                array(
                                    'field' => 'field_541fab9e566c7',
                                    'operator' => '==',
                                    'value' => 'employees',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'return_format' => 'object',
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
                            0 => 'post_title',
                        ),
                        'max' => '',
                    ),
                    array(
                        'key' => 'field_541c261a66ec9',
                        'label' => 'Anläggningsinformation',
                        'name' => 'content-facility-information',
                        'type' => 'checkbox',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'facility',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'all' => 'Anläggningskort',
                            'address' => 'Adress',
                            'other-address' => 'Annan adress',
                            'phonenumber' => 'Telefonnummer',
                            'email' => 'E-post',
                            'openhours' => 'Öppettider',
                            'map' => 'Karta',
                        ),
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_541c2d32bf1be',
                        'label' => 'För vilken anläggning?',
                        'name' => 'content-facility-choice',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'facility'
                                ),
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'map'
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'facility',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_541123wsdb4241',
                        'label' => 'Visning',
                        'name' => 'content-facility-view-option',
                        'type' => 'select',
                        'default_value' => '',
                        'choices' => array(
                            12 => '1 kolumn',
                            6 => '2 kolumner',
                            4 => '3 kolumner',
                            3 => '4 kolumner'
                        ),
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c261a66ec9',
                                    'operator' => '==',
                                    'value' => 'openhours',
                                ),
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '!=',
                                    'value' => 'department'
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                    ),
                    array(
                        'key' => 'field_532a392ec07c1',
                        'label' => 'Höjd på karta',
                        'name' => 'content-map-height',
                        'type' => 'number',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'map',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'default_value' => 400,
                        'placeholder' => 'Exempel: 400',
                        'prepend' => '',
                        'append' => 'px',
                    ),
                    array(
                        'key' => 'field_532a32wfe3fwef3erg5392ec07c1',
                        'label' => 'Satellitkarta',
                        'name' => 'content-map-mode',
                        'type' => 'true_false',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'map',
                                ),
                                array(
                                    "field" => "field_541c261a66ec9",
                                    "operator" => "==",
                                    "value" => "all"
                                ),
                                array(
                                    "field" => "field_541c261a66ec9",
                                    "operator" => "==",
                                    "value" => "map"
                                )
                            ),
                            'allorany' => 'any',
                        ),
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_543112asdasd5ea2',
                        'label' => 'Zoomnivå',
                        'name' => 'content-facility-map-zoom',
                        'type' => 'number',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c261a66ec9',
                                    'operator' => '==',
                                    'value' => 'map',
                                ),
                                array(
                                    'field' => 'field_541c261a66ec9',
                                    'operator' => '==',
                                    'value' => 'all',
                                ),
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'map',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'default_value' => 16,
                        'placeholder' => 'Välj zoomnivå för kartan',
                        'prepend' => '',
                        'append' => '',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_532a392ec05a1',
                        'label' => 'HTML',
                        'name' => 'content-html-code',
                        'type' => 'code_area',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'html',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'language' => 'htmlmixed',
                        'theme' => 'solarized',
                    ),
                    array(
                        'key' => 'field_112342ace185381',
                        'label' => 'Välj märkesinnehåll',
                        'name' => 'content_brands_type',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'brands',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'logotypes' => 'Logotyper',
                            'brand-plugs' => 'Märkespuffar',
                            'facilities' => 'Anläggningar',
                        ),
                        'default_value' => 'menu',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_1422871815381',
                        'label' => 'Välj märken',
                        'name' => 'content_brands',
                        'type' => 'relationship',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'brands',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'return_format' => 'object',
                        'post_type' => array(
                            0 => 'brand',
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
                        'key' => 'field_54360ff1c2bd7',
                        'label' => 'Kategorier',
                        'name' => 'content-news-categories',
                        'type' => 'taxonomy',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'news',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'taxonomy' => 'news_categories',
                        'field_type' => 'checkbox',
                        'allow_null' => 1,
                        'load_save_terms' => 0,
                        'return_format' => 'id',
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_5436130925ea2',
                        'label' => 'Inlägg',
                        'name' => 'content-news-nr-posts',
                        'type' => 'number',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'news',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => 10,
                        'placeholder' => 'Välj antal inlägg du vill visa i blocket',
                        'prepend' => '',
                        'append' => '',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_543619e6aa16a',
                        'label' => 'Visa',
                        'name' => 'content-contact-form',
                        'type' => 'acf_cf7',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'contactform',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'required' => 0,
                        'column_width' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'disable' => array(
                            0 => 0,
                        ),
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till innehåll',
            ),
            array(
                'key' => 'field_541c26b8c176c',
                'label' => 'Sidomeny',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541c2683c176b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_541c26c6c176d',
                'label' => 'Lägg till innehåll',
                'name' => 'sidebar-contents',
                'type' => 'repeater',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541c2683c176b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'sub_fields' => array(
                    array(
                        'key' => 'field_541c2e53cc6fa',
                        'label' => 'Blockrubrik',
                        'name' => 'sidebar-content-title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_532c2e7eca9fa',
                        'label' => 'Dölj blockets rubrik',
                        'name' => 'sidebar-hide-title',
                        'type' => 'true_false',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_543629eac3e92',
                        'label' => 'Innehåll',
                        'name' => 'sidebar-content-type',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'menu' => 'Meny',
                            'wysiwyg' => 'Eget innehåll',
                            'plugs' => 'Puffar',
                            'contactform' => 'Kontaktformulär',
                        ),
                        'default_value' => 'menu',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54362a43c3e93',
                        'label' => 'Meny',
                        'name' => 'sidebar-menu-type',
                        'type' => 'radio',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_543629eac3e92',
                                    'operator' => '==',
                                    'value' => 'menu',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'page' => 'Sidans meny',
                            'main' => 'Huvudmeny',
                        ),
                        'default_value' => 'page',
                        'allow_null' => 0,
                        'layout' => 'horizontal',
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54362a66c3e94',
                        'label' => 'Eget innehåll',
                        'name' => 'sidebar-content-wysiwyg',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_543629eac3e92',
                                    'operator' => '==',
                                    'value' => 'wysiwyg',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array(
                        'key' => 'field_54362a89c3e95',
                        'label' => 'Puffar',
                        'name' => 'sidebar-content-plugs',
                        'type' => 'relationship',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_543629eac3e92',
                                    'operator' => '==',
                                    'value' => 'plugs',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'return_format' => 'object',
                        'post_type' => array(
                            0 => 'plug',
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
                    array(
                        'key' => 'field_54362abcc3e96',
                        'label' => 'Formulär',
                        'name' => 'sidebar-content-form',
                        'type' => 'acf_cf7',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_543629eac3e92',
                                    'operator' => '==',
                                    'value' => 'contactform',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'disable' => array(
                            0 => 0,
                        ),
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till innehåll',
            ),
            array(
                'key' => 'field_541c2759e54d9',
                'label' => 'Inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541c2e7bac6ff',
                'label' => 'Dölj sidans rubrik',
                'name' => 'setting-hide-page-header',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_541c2683c176b',
                'label' => 'Använd en sidomeny',
                'name' => 'setting-use-sidebar',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_542bc8de00f10',
                'label' => 'Omdirigeringssida',
                'name' => 'setting-redirect-page',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_542bca065833d',
                'label' => 'Omdirigering till',
                'name' => 'setting-redirect-page-type',
                'type' => 'select',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_542bc8de00f10',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'internal' => 'Lokal sida',
                    'external' => 'Extern URL',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_542bc8f100f11',
                'label' => 'URL',
                'name' => 'setting-redirect-page-url',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_542bca065833d',
                            'operator' => '==',
                            'value' => 'external',
                        ),
                        array(
                            'field' => 'field_542bc8de00f10',
                            'operator' => '==',
                            'value' => '1',
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
                'key' => 'field_542bc9ec5833c',
                'label' => 'Lokal sida',
                'name' => 'setting-redirect-page-link',
                'type' => 'page_link',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_542bca065833d',
                            'operator' => '==',
                            'value' => 'internal',
                        ),
                        array(
                            'field' => 'field_542bc8de00f10',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_541c278be54da',
                'label' => 'Lägg till egen kod',
                'name' => 'extra-code',
                'type' => 'checkbox',
                'choices' => array(
                    'CSS' => 'CSS',
                    'Javascript' => 'Javascript',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_541c286ec05a5',
                'label' => 'Egen CSS',
                'name' => 'extra-code-css',
                'type' => 'code_area',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541c278be54da',
                            'operator' => '==',
                            'value' => 'CSS',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'language' => 'css',
                'theme' => 'solarized',
            ),
            array(
                'key' => 'field_541c287ec05a6',
                'label' => 'Egen Javascript',
                'name' => 'extra-code-javascript',
                'type' => 'code_area',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541c278be54da',
                            'operator' => '==',
                            'value' => 'Javascript',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'language' => 'javascript',
                'theme' => 'solarized',
            ),
            array(
                'key' => 'field_5244b23b3e062',
                'label' => 'SEO',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5244b85105ba1',
                'label' => 'Titeltag',
                'name' => 'pagesettings-title-tag',
                'type' => 'text',
                'instructions' => 'Skriv över sidans standard Titel-tag.',
                'default_value' => '',
                'placeholder' => 'Exempel: Autoking - Mesta bilhandlaren i Stockholm!',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5244b8c105ba2',
                'label' => 'META Description',
                'name' => 'pagesettings-meta-description',
                'type' => 'textarea',
                'instructions' => 'Fyll i en egen description för webbsidan.',
                'default_value' => '',
                'placeholder' => 'Exempel: Stockholms främsta bilhandlare - Nya Mercedes-Benz, BMW och Audi.',
                'maxlength' => 160,
                'rows' => 3,
                'formatting' => 'none',
            ),
            array(
                'key' => 'field_5244b93305ba3',
                'label' => 'META Keywords',
                'name' => 'pagesettings-meta-keywords',
                'type' => 'text',
                'instructions' => 'Fyll i ett antal relevanta keywords som beskriver er hemsida. Separera med kommatecken (,).',
                'default_value' => '',
                'placeholder' => 'Exempel: (Nya bilar, Stockholm, Mercedes-Benz, Audi, BMW)',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '4',
                    'order_no' => 0,
                    'group_no' => 1,
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
}

function bytbil_block_loop()
{
    require "loop.php";
}

function register_styles()
{
    wp_enqueue_style('bytbil_admin_content', get_template_directory_uri() . '/plugins/bytbil-innehall/bytbil-content.css');
}

add_action('admin_enqueue_scripts', 'register_styles');
add_action('wp_enqueue_scripts', 'register_styles');


?>
