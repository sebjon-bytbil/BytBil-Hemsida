<?php

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_facility',
        'title' => 'Anläggning',
        'fields' => array (
            array (
                'key' => 'field_559285abdd9693',
                'label' => 'Välj anläggning',
                'name' => 'facility',
                'type' => 'post_object',
                'post_type' => array (
                    0 => 'facility',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning_BAK.php',
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
        'id' => 'acf_bilar-i-lager',
        'title' => 'Bilar i lager',
        'fields' => array (
            array (
                'key' => 'field_5591479f3dfaf',
                'label' => 'Fordonsurval',
                'name' => 'fordonsurval',
                'type' => 'post_object',
                'instructions' => 'Välj vilket fordonsurval du vill visa på anläggningssidan.',
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
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning_BAK.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_accesspaket.php',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_marke.php',
                    'order_no' => 0,
                    'group_no' => 2,
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
        'id' => 'acf_page_slideshow',
        'title' => 'Bildspel',
        'fields' => array (
            array (
                'key' => 'field_24824479f3dfaf',
                'label' => 'Bildspel',
                'name' => 'bildspel',
                'type' => 'post_object',
                'instructions' => 'Välj vilket bildspel du vill visa i sidtoppen.',
                'post_type' => array (
                    0 => 'slideshow',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning_BAK.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_accesspaket.php',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_marke.php',
                    'order_no' => 0,
                    'group_no' => 2,
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
        'id' => 'acf_erbjudanden',
        'title' => 'Erbjudanden',
        'fields' => array (
            array (
                'key' => 'field_5593e6f771a47',
                'label' => 'Erbjudanden i',
                'name' => 'offer-location',
                'type' => 'relationship',
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
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning_BAK.php',
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
        'id' => 'acf_formular',
        'title' => 'Formulär',
        'fields' => array (
            array (
                'key' => 'field_5593fae2b1fa1',
                'label' => 'Formulär',
                'name' => 'contact-form',
                'type' => 'post_object',
                'post_type' => array (
                    0 => 'wpcf7_contact_form',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning_BAK.php',
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
        'id' => 'acf_testdrive_form',
        'title' => 'Formulär för provkörning',
        'fields' => array (
            array (
                'key' => 'field_2538fae2b1fa1',
                'label' => 'Formulär',
                'name' => 'testdrive-form',
                'type' => 'post_object',
                'post_type' => array (
                    0 => 'wpcf7_contact_form',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning_BAK.php',
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
        'id' => 'acf_lankknappar',
        'title' => 'Länkknappar',
        'fields' => array (
            array (
                'key' => 'field_55c9dd6314a23',
                'label' => 'Länkknappar',
                'name' => 'content-button',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_55c9ddf714a24',
                        'label' => 'URL',
                        'name' => 'content-button-url',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_55c9de2c14a25',
                        'label' => 'Länktext',
                        'name' => 'content-button-text',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_55c9de6714a26',
                        'label' => 'Länkbeteende',
                        'name' => 'content-button-target',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array (
                            '_self' => 'I samma fönster',
                            '_blank' => 'I nytt fönster',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till knapp',
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
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_lightbox',
        'title' => 'Lightbox',
        'fields' => array (
            array (
                'key' => 'field_55e41ff7d465e',
                'label' => 'Aktivera lightbox',
                'name' => 'activate-lightbox',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
            array (
                'key' => 'field_55e4203bd465f',
                'label' => 'Välj lightbox',
                'name' => 'selected-lightbox',
                'type' => 'post_object',
                'post_type' => array (
                    0 => 'lightbox',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'conditional_logic' => array (
                    'status' => 1,
                    'rules' => array (
                        array (
                            'field' => 'field_55e41ff7d465e',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
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






    register_field_group(array (
        'id' => 'acf_page_plugs',
        'title' => 'Puffar',
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

    register_field_group(array (
        'id' => 'acf_marken',
        'title' => 'Märken',
        'fields' => array (
            array (
                'key' => 'field_55924649af034',
                'label' => 'Märken',
                'name' => 'brands',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'brand',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning_BAK.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_marke.php',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'facility',
                    'order_no' => 0,
                    'group_no' => 2,
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
        'id' => 'acf_service-brands',
        'title' => 'Auktoriserad verkstad för',
        'fields' => array (
            array (
                'key' => 'field_4824d58498f8567',
                'label' => 'Lista över märken',
                'name' => 'service-brands',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning_BAK.php',
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
        'id' => 'acf_markestjanster',
        'title' => 'Märkestjänster',
        'fields' => array (
            array (
                'key' => 'field_55d44b0e43f67',
                'label' => 'Märkestjänster',
                'name' => 'brand-services',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_marke.php',
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
        'id' => 'acf_personal',
        'title' => 'Personal',
        'fields' => array (
            array (
                'key' => 'field_5591483b36100',
                'label' => 'Personallistning',
                'name' => 'personallistning',
                'type' => 'select',
                'choices' => array (
                    'specific' => 'Enskild personal',
                    'list' => 'Personallista',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5591486e36101',
                'label' => 'Välj personal',
                'name' => 'personal',
                'type' => 'relationship',
                'conditional_logic' => array (
                    'status' => 1,
                    'rules' => array (
                        array (
                            'field' => 'field_5591483b36100',
                            'operator' => '==',
                            'value' => 'list',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'employee_list',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning_BAK.php',
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
        'id' => 'acf_sociala-medier',
        'title' => 'Sociala medier',
        'fields' => array (
            array (
                'key' => 'field_55d58498f8567',
                'label' => 'Facebook ID',
                'name' => 'social-media-facebook-id',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_anlaggning_BAK.php',
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
        'id' => 'acf_toppbild',
        'title' => 'Toppbild',
        'fields' => array (
            array (
                'key' => 'field_55c9db645be55',
                'label' => 'Toppbild',
                'name' => 'top-image',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
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
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_erbjudanden.php',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_marke.php',
                    'order_no' => 0,
                    'group_no' => 2,
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

?>