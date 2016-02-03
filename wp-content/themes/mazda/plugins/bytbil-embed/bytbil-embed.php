<?php
/*
Plugin Name: BytBil Embed
Plugin URI: http://www.bytbil.com/
Description: Adds core embedding functions to be used in templates
Version: 1.0.0
Author: Sebastian Jonsson : BytBil Nordic AB
Author URI: http://www.bytbil.com/
*/


/* Register Base URL Field for Pages */
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_mazda-moduler',
        'title' => 'Mazda moduler',
        'fields' => array (
            array (
                'key' => 'field_553a3941a5af4',
                'label' => 'Innehåll',
                'name' => 'mazda-content',
                'type' => 'flexible_content',
                'layouts' => array (
                    array (
                        'label' => 'Eget innehåll',
                        'name' => 'content-custom',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_5537df4014821',
                                'label' => 'Bredd',
                                'name' => 'content-width',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
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
                            array (
                                'key' => 'field_5537deee1481e',
                                'label' => 'Innehåll',
                                'name' => 'content-wysiwyg',
                                'type' => 'wysiwyg',
                                'column_width' => '',
                                'default_value' => '',
                                'toolbar' => 'full',
                                'media_upload' => 'yes',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Puffar',
                        'name' => 'content-plugs',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_5537dfc914823',
                                'label' => 'Bredd',
                                'name' => 'content-width',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
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
                            array (
                                'key' => 'field_5537dfd014825',
                                'label' => 'Puffar',
                                'name' => 'content-plugs',
                                'type' => 'relationship',
                                'column_width' => '',
                                'return_format' => 'object',
                                'post_type' => array (
                                    0 => 'plug',
                                ),
                                'taxonomy' => array (
                                    0 => 'all',
                                ),
                                'filters' => array (
                                    0 => 'search',
                                ),
                                'result_elements' => array (
                                    0 => 'post_title',
                                ),
                                'max' => 4,
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Anläggningar',
                        'name' => 'content-facility',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_5537dfd096778',
                                'label' => 'Anläggningar',
                                'name' => 'content-facility',
                                'type' => 'relationship',
                                'column_width' => '',
                                'return_format' => 'object',
                                'post_type' => array (
                                    0 => 'facility',
                                ),
                                'taxonomy' => array (
                                    0 => 'all',
                                ),
                                'filters' => array (
                                    0 => 'search',
                                ),
                                'result_elements' => array (
                                    0 => 'post_title',
                                ),
                                'max' => 1,
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Fordon i lager',
                        'name' => 'content-assortment',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_5537e13558638',
                                'label' => 'Bredd',
                                'name' => 'content-width',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
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
                            array (
                                'key' => 'field_5537e13555638',
                                'label' => 'Rubrik',
                                'name' => 'content-assortment-header',
                                'type' => 'text',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                                'instructions' => 'Fyll i en rubrik som du vill visa ovanför fordonsurvalet'
                            ),
                            array (
                                'key' => 'field_5537e187638',
                                'label' => 'Visa länk till alla lagerbilar',
                                'name' => 'content-assortment-link',
                                'type' => 'radio',
                                'choices' => array (
                                    'false' => 'Nej',
                                    'true' => 'Ja',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 'false',
                                'layout' => 'horizontal',
                            ),
                            array (
                                'key' => 'field_5537e13558639',
                                'label' => 'Fordonsurval',
                                'name' => 'content-assortment',
                                'type' => 'post_object',
                                'column_width' => '',
                                'post_type' => array (
                                    0 => 'assortment',
                                ),
                                'taxonomy' => array (
                                    0 => 'all',
                                ),
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Bildspel',
                        'name' => 'content-slideshow',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a3e0f1f7ca',
                                'label' => 'Singelbild',
                                'name' => 'single',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
                                    1 => 'Ja',
                                    0 => 'Nej',
                                    2 => 'Video'
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 0,
                                'layout' => 'horizontal',
                            ),
                            array (
                                'key' => 'field_553a3e381f7cb',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'conditional_logic' => array (
                                    'status' => 1,
                                    'rules' => array (
                                        array (
                                            'field' => 'field_553a3e0f1f7ca',
                                            'operator' => '==',
                                            'value' => '0',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '#hero_carousel',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Sekundär nav',
                        'name' => 'content-secnav',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553e41c31m887',
                                'label' => 'Extra meny',
                                'name' => 'extra-menu',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
                                    1 => 'Ja',
                                    0 => 'Nej',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 0,
                                'layout' => 'horizontal',
                            ),
                            array (
                                'key' => 'field_553e41c31b090',
                                'label' => 'Exkludera menyval',
                                'name' => 'exclude',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
                                    1 => 'Ja',
                                    0 => 'Nej',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 0,
                                'layout' => 'horizontal',
                            ),
                            array (
                                'key' => 'field_554b484d152a0',
                                'label' => 'Exkluderingar',
                                'name' => 'menu-excludes',
                                'type' => 'repeater',
                                'conditional_logic' => array (
                                    'status' => 1,
                                    'rules' => array (
                                        array (
                                            'field' => 'field_553e41c31b090',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'sub_fields' => array (
                                    array (
                                        'key' => 'field_554b4876152a1',
                                        'label' => 'Exkludera från',
                                        'name' => 'exclude-from',
                                        'type' => 'radio',
                                        'column_width' => '',
                                        'choices' => array (
                                            0 => 'Desktop',
                                            1 => 'Mobil',
                                            2 => 'Båda',
                                        ),
                                        'other_choice' => 0,
                                        'save_other_choice' => 0,
                                        'default_value' => '',
                                        'layout' => 'horizontal',
                                    ),
                                    array (
                                        'key' => 'field_554b48a9152a2',
                                        'label' => 'Menyval',
                                        'name' => 'exclude-number',
                                        'type' => 'text',
                                        'instructions' => 'Menyvalet i nummerordning',
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
                                'button_label' => 'Lägg till',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Innehållsblock',
                        'name' => 'content-content',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a40f684377',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '.richtext',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_553a40f609576',
                                'label' => 'Nth-child',
                                'name' => 'nth-child',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '0',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Konfigurera sidebar',
                        'name' => 'content-sidebar',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553f3ebb17b17',
                                'label' => 'Ändra pris/rubrik',
                                'name' => 'alter-headline',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
                                    1 => 'Ja',
                                    0 => 'Nej',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 0,
                                'layout' => 'horizontal',
                            ),
                            array (
                                'key' => 'field_553f3ef817b18',
                                'label' => 'Pris/rubrik',
                                'name' => 'headline-text',
                                'type' => 'text',
                                'conditional_logic' => array (
                                    'status' => 1,
                                    'rules' => array (
                                        array (
                                            'field' => 'field_553f3ebb17b17',
                                            'operator' => '==',
                                            'value' => '1',
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
                            array (
                                'key' => 'field_553f3f0e17b19',
                                'label' => 'Sidebar-fält',
                                'name' => 'sidebar-fields',
                                'type' => 'repeater',
                                'column_width' => '',
                                'sub_fields' => array (
                                    array (
                                        'key' => 'field_553f3f2217b1a',
                                        'label' => 'Menynummer',
                                        'name' => 'menu-number',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'none',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_553f3ff717b1e',
                                        'label' => 'Exkludera?',
                                        'name' => 'menu-exclude',
                                        'type' => 'radio',
                                        'column_width' => '',
                                        'choices' => array (
                                            1 => 'Ja',
                                            0 => 'Nej',
                                        ),
                                        'other_choice' => 0,
                                        'save_other_choice' => 0,
                                        'default_value' => 0,
                                        'layout' => 'horizontal',
                                    ),
                                    array (
                                        'key' => 'field_553f401217b1f',
                                        'label' => 'Text',
                                        'name' => 'menu-text',
                                        'type' => 'text',
                                        'instructions' => 'Lämna tom om du inte vill ändra',
                                        'conditional_logic' => array (
                                            'status' => 1,
                                            'rules' => array (
                                                array (
                                                    'field' => 'field_553f3ff717b1e',
                                                    'operator' => '==',
                                                    'value' => '0',
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
                                    array (
                                        'key' => 'field_553f52ab9cd65',
                                        'label' => 'Färg',
                                        'name' => 'menu-color',
                                        'type' => 'radio',
                                        'conditional_logic' => array (
                                            'status' => 1,
                                            'rules' => array (
                                                array (
                                                    'field' => 'field_553f3ff717b1e',
                                                    'operator' => '==',
                                                    'value' => '0',
                                                ),
                                            ),
                                            'allorany' => 'all',
                                        ),
                                        'column_width' => '',
                                        'choices' => array (
                                            'blue' => 'Blå',
                                            'purple' => 'Lila',
                                        ),
                                        'other_choice' => 0,
                                        'save_other_choice' => 0,
                                        'default_value' => 'blue',
                                        'layout' => 'horizontal',
                                    ),
                                    array (
                                        'key' => 'field_553f402217b20',
                                        'label' => 'Länk',
                                        'name' => 'menu-link',
                                        'type' => 'text',
                                        'instructions' => 'Lämna tom om du inte vill ändra',
                                        'conditional_logic' => array (
                                            'status' => 1,
                                            'rules' => array (
                                                array (
                                                    'field' => 'field_553f3ff717b1e',
                                                    'operator' => '==',
                                                    'value' => '0',
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
                                ),
                                'row_min' => '',
                                'row_limit' => '',
                                'layout' => 'row',
                                'button_label' => 'Lägg till',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Jämförelseblock',
                        'name' => 'content-comparison',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553e4c16d0543',
                                'label' => 'Blocktyp',
                                'name' => 'block',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
                                    0 => 'Vilken bil passar dig?',
                                    1 => 'Specifikation & Priser',
                                    2 => 'Jämför modeller',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 0,
                                'layout' => 'horizontal',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Utmärkelser slider',
                        'name' => 'content-awards-slider',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a41a304d58',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '#linkCarousel',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Reservdelar',
                        'name' => 'content-spare-parts',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_558c99p304d58',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '#mazdaParts',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Egenskaper',
                        'name' => 'content-properties',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_558c99p304d58',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '#mazdaParts',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Egenskaper',
                        'name' => 'content-properties',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                    ),
                    array (
                        'label' => 'Färger',
                        'name' => 'content-colors',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a4250efc44',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '.module-360-view',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Navigationssytem',
                        'name' => 'content-navsys',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                    ),
                    array (
                        'label' => 'Bluetooth Support',
                        'name' => 'content-bluetooth',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a3333lkj11',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '.bluetooth-system',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Förvaringsverktyg',
                        'name' => 'content-storage',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a3223nbv99',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '#storageTool',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Navigationssytem',
                        'name' => 'content-navsys',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a4250lkj98',
                                'label' => 'Selektor',
                                'name' => 'selector',
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
                    ),
                    array (
                        'label' => 'Bluetooth Support',
                        'name' => 'content-bluetooth',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a3333lkj11',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '.bluetooth-system',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Förvaringsverktyg',
                        'name' => 'content-storage',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a3223nbv99',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '#storageTool',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Galleri',
                        'name' => 'content-gallery',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a450e54425',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '.module-gallery',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Video',
                        'name' => 'content-video',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a459ab3294',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_551f3olb18b49',
                                'label' => 'Flera videoklipp?',
                                'name' => 'multiple-videos',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
                                    1 => 'Ja',
                                    0 => 'Nej',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 0,
                                'layout' => 'horizontal',
                            ),
                            array (
                                'key' => 'field_551f1kmm28b59',
                                'label' => 'Video-text?',
                                'name' => 'video-text',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
                                    1 => 'Ja',
                                    0 => 'Nej',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 0,
                                'layout' => 'horizontal',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Awards modul',
                        'name' => 'content-awards-module',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a482fde3b6',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '.awardModule',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Stort galleri',
                        'name' => 'content-big-gallery',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a48d1d0b27',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '#gallery',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'HTML Text modul',
                        'name' => 'content-text-module',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                    ),
                    array (
                        'label' => 'Fokuslåda',
                        'name' => 'content-focus-box',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553f9fd8ddf00',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '.featureFocus',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_553a40f987861',
                                'label' => 'Nth-child',
                                'name' => 'nth-child',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '0',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_551f3oll98j77',
                                'label' => 'Videoklipp?',
                                'name' => 'video',
                                'type' => 'radio',
                                'column_width' => '',
                                'choices' => array (
                                    1 => 'Ja',
                                    0 => 'Nej',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 0,
                                'layout' => 'horizontal',
                            ),
                            array (
                                'key' => 'field_553f52a98jd11',
                                'label' => 'Position',
                                'name' => 'video-position',
                                'type' => 'radio',
                                'conditional_logic' => array (
                                    'status' => 1,
                                    'rules' => array (
                                        array (
                                            'field' => 'field_551f3oll98j77',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'choices' => array (
                                    'left' => 'Vänster',
                                    'right' => 'Höger',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 'left',
                                'layout' => 'horizontal',
                            ),
                            array (
                                'key' => 'field_553f52a44vv12',
                                'label' => 'Video-text?',
                                'name' => 'video-text',
                                'type' => 'radio',
                                'conditional_logic' => array (
                                    'status' => 1,
                                    'rules' => array (
                                        array (
                                            'field' => 'field_551f3oll98j77',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'choices' => array (
                                    1 => 'Ja',
                                    0 => 'Nej',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 1,
                                'layout' => 'horizontal',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Buying slider',
                        'name' => 'content-buying-slider',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a494981e0b',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '#buying-slider-wrapper',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Färgbytare',
                        'name' => 'content-colorator',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a4cbe3affc',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '#carColorator',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Egenskaper slider',
                        'name' => 'content-props-slider',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_553a4d5d89fe6',
                                'label' => 'Selektor',
                                'name' => 'selector',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '#featuresCarousel',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'label' => 'HTML block',
                        'name' => 'content-empty',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_554b0fbc9e700',
                                'label' => 'Innehåll',
                                'name' => 'content',
                                'type' => 'textarea',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'maxlength' => '',
                                'rows' => '',
                                'formatting' => 'html',
                            ),
                        ),
                    ),
                ),
                'button_label' => 'Lägg till',
                'min' => '',
                'max' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
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
    register_field_group(array (
        'id' => 'acf_body-class',
        'title' => 'Body class',
        'fields' => array (
            array (
                'key' => 'field_5540d1c0740f5',
                'label' => 'Class',
                'name' => 'body-class',
                'type' => 'text',
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
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
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
    register_field_group(array (
        'id' => 'acf_base-url',
        'title' => 'Base URL',
        'fields' => array (
            array (
                'key' => 'field_552bd1079f285',
                'label' => 'URL',
                'name' => 'url',
                'type' => 'text',
                'default_value' => 'http://www.mazda.se',
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
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
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

// Expiration lifetime on transients
define('TRANSIENT_LIFETIME', 10);
// Base URL
define('MAZDA_BASE_URL', 'http://www.mazda.se');

// Include Simple HTML DOM
include_once('inc/simple_html_dom.php');

// Get specified URL to use when scraping
function get_page_url()
{
    if (!get_field('url')) {
        return MAZDA_BASE_URL;
    }
    return get_field('url');
}

// Add the base URL to an existing URL
function add_base_url($url)
{
    return MAZDA_BASE_URL . $url;
}

// Remove the base URL from an existing URL
function remove_base_url($url)
{
    return str_replace(MAZDA_BASE_URL, '', $url);
}

// Encode the value parameter and set transient
function set_mazda_transient($name, $value)
{
    $encoded = base64_encode(serialize($value));
    set_transient(hash('md5', remove_base_url(get_page_url())) . $name, $encoded, TRANSIENT_LIFETIME);
}

// Retrieve the transient and decode it
function get_mazda_transient($name)
{
    $transient = get_transient(hash('md5', remove_base_url(get_page_url())) . $name);
    $decoded = unserialize(base64_decode($transient));
    return $decoded;
}

// Delete the specified transient
function delete_mazda_transient($name)
{
    delete_transient(hash('md5', remove_base_url(get_page_url())) . $name);
}

// Scrape the specified URL on the page and modifies the HTML
function set_mazda_html()
{
    $html = file_get_html(get_page_url());
    set_mazda_transient('html', $html);

    // Get links from option page and modify them based on selection
    $retailer_links = get_retailer_links();
    if ($retailer_links !== false) {
        foreach ($html->find('a') as $a) {
            $a = handle_retailer_link($retailer_links, $a);
        }
    }

    // Add base URL to images
    foreach ($html->find('img') as $image) {
        if (!preg_match('/(^data\:image)/', $image->src)) {
            $image->src = add_base_url($image->src);
        }
    }

    // Replace the old transient
    delete_mazda_transient('html');
    set_mazda_transient('html', $html);
}

// Retrieve HTML transient and echo the <link> tags
function set_mazda_css()
{
    $html = get_mazda_transient('html');

    $links = array();
    foreach ($html->find('link') as $link) {
        if (isset($link->href) && $link->rel === 'stylesheet' && (substr_count($link->href, 'main.min.css') > 0 || substr_count($link->href, 'site.css') > 0)) {
            $link->href = add_base_url($link->href);
            $links[] = $link;
            echo '<link rel="stylesheet" href="' . $link->href . '">';
        }
    }
}

// Logs a warning if variable is not an object
function throw_non_object_warning($v, $f, $l)
{
    $l--;
    error_log("PHP Warning: variable $v is not an object in $f on line $l");
}

?>

