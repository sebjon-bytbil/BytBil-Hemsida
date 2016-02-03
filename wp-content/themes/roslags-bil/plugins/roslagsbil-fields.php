<?php

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_banners',
        'title' => 'Banners',
        'fields' => array(
            array(
                'key' => 'field_5305c30e0a246',
                'label' => 'Banner',
                'name' => 'banner',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5305c3280a247',
                        'label' => 'Banner Bild',
                        'name' => 'banner-image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_5305c3550a248',
                        'label' => 'Banner Länk',
                        'name' => 'banner-link',
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
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '8',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_criteriastring',
        'title' => 'Criteriastring',
        'fields' => array(),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-fordon.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_kontaktinformation',
        'title' => 'Kontaktinformation',
        'fields' => array(
            array(
                'key' => 'field_5305c5e78f3e9',
                'label' => 'Kontaktinformation',
                'name' => 'contactinformation',
                'type' => 'repeater',
                'instructions' => 'Fyll i kontaktinformation som skall synas i sidfoten.',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5305c74a9f718',
                        'label' => 'Telefon',
                        'name' => 'contactinfo-telephone',
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
                        'key' => 'field_5305c7619f719',
                        'label' => 'E-post',
                        'name' => 'contactinfo-email',
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
                        'key' => 'field_5305c76c9f71a',
                        'label' => 'Facebook',
                        'name' => 'contactinfo-facebook',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '8',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_logotyp',
        'title' => 'Logotyp',
        'fields' => array(
            array(
                'key' => 'field_5305f8f778059',
                'label' => 'Logotyp Bild',
                'name' => 'logotyp-image',
                'type' => 'image',
                'instructions' => 'Logotyp som visas i sidhuvudet.',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '8',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_oppettider-2',
        'title' => 'Öppettider',
        'fields' => array(
            array(
                'key' => 'field_53147ed9cc495',
                'label' => 'Öppettider',
                'name' => 'oppettider',
                'type' => 'repeater',
                'instructions' => 'Fyll i avdelningens öppettider',
                'sub_fields' => array(
                    array(
                        'key' => 'field_53147ef0cc496',
                        'label' => 'Avdelning',
                        'name' => 'oppettider-avdelning',
                        'type' => 'text',
                        'instructions' => 'Avdelningens namn',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_53147f07cc497',
                        'label' => 'Vardagar',
                        'name' => 'oppettider-vardagar',
                        'type' => 'text',
                        'instructions' => 'Öppettider för vardagar',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_53147f1ccc498',
                        'label' => 'Lördagar',
                        'name' => 'oppettider-lordagar',
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
                        'key' => 'field_53147f30cc499',
                        'label' => 'Söndagar',
                        'name' => 'oppettider-sondagar',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '8',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_puffar',
        'title' => 'Puffar',
        'fields' => array(
            array(
                'key' => 'field_5301c84519c68',
                'label' => 'Puffar',
                'name' => 'puffar',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5301d4a2c3166',
                        'label' => 'puffbild',
                        'name' => 'puffbild',
                        'type' => 'image',
                        'column_width' => 10,
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_5301d4c1c3167',
                        'label' => 'puffrubrik',
                        'name' => 'puffrubrik',
                        'type' => 'text',
                        'column_width' => 25,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5388793519138',
                        'label' => 'Länktyp',
                        'name' => 'link-type',
                        'type' => 'radio',
                        'column_width' => 15,
                        'choices' => array(
                            'intern' => 'Intern',
                            'extern' => 'Extern',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'intern',
                        'layout' => 'vertical',
                    ),
                    array(
                        'key' => 'field_5301e06dfdd9c',
                        'label' => 'Pufflänk',
                        'name' => 'pufflank',
                        'type' => 'page_link',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5388793519138',
                                    'operator' => '==',
                                    'value' => 'intern',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => 50,
                        'post_type' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_5388796019139',
                        'label' => 'Pufflänk (URL)',
                        'name' => 'pufflank_url',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5388793519138',
                                    'operator' => '==',
                                    'value' => 'extern',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => 50,
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
                'layout' => 'table',
                'button_label' => 'Lägg till',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '8',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
                0 => 'discussion',
                1 => 'comments',
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_varumarken-3',
        'title' => 'Varumärken',
        'fields' => array(
            array(
                'key' => 'field_530378b2b07be',
                'label' => 'Varumärken',
                'name' => 'varumarken',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_530378bab07bf',
                        'label' => 'Logotyp',
                        'name' => 'varumarke-logotype',
                        'type' => 'image',
                        'instructions' => 'Ladda upp varumärkets logotyp. ',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_530378c4b07c0',
                        'label' => 'Namn',
                        'name' => 'varumarke-name',
                        'type' => 'text',
                        'instructions' => 'Skriv varumärkets namn. Exempel: Volvo',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_53045747f2624',
                        'label' => 'Länk',
                        'name' => 'varumarke-link',
                        'type' => 'text',
                        'instructions' => 'Skriv adressen för varumärkets hemsida. Exempel: http://www.volvo.se.',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '8',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}
?>
