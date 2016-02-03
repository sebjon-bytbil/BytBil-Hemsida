<?php
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_innehall',
        'title' => 'Innehåll',
        'fields' => array(
            array(
                'key' => 'field_54490d3fe274b',
                'label' => 'Innehåll',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5415ada6d06fe',
                'label' => 'Innehållsblock',
                'name' => 'content',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5415b0d07f831',
                        'label' => 'Blockrubrik',
                        'name' => 'content_header',
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
                        'key' => 'field_5415aef0d0701',
                        'label' => 'Storlek',
                        'name' => 'content_size',
                        'type' => 'radio',
                        'column_width' => '',
                        'choices' => array(
                            12 => 'Fullbredd (100%)',
                            9 => 'Stor (75%)',
                            6 => 'Medium (50%)',
                            4 => 'Liten (33%)',
                            3 => 'Minst (25%)',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_5415adebd06ff',
                        'label' => 'Innehållstyp',
                        'name' => 'content_type',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'wysiwyg' => 'Eget innehåll',
                            'slideshow' => 'Bildspel',
                            'image' => 'Bild',
                            'offer' => 'Erbjudanden',
                            'facilities' => 'Anläggningar',
                            'shortlinks' => 'Snabblänkar',
                            'form' => 'Kontaktformulär',
                            'af-menu' => 'ÅF-Meny',
                            'assortment' => 'Bilar i lager',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_5415aeb7d0700',
                        'label' => 'Eget innehåll',
                        'name' => 'content_wysiwyg',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5415adebd06ff',
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
                        'key' => 'field_5415b034d0702',
                        'label' => 'Bild',
                        'name' => 'content_image',
                        'type' => 'image',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5415adebd06ff',
                                    'operator' => '==',
                                    'value' => 'image',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_544a1ba44525f',
                        'label' => 'Snabblänkar',
                        'name' => 'content_shortlinks',
                        'type' => 'relationship',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5415adebd06ff',
                                    'operator' => '==',
                                    'value' => 'shortlinks',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'return_format' => 'object',
                        'post_type' => array(
                            0 => 'shortlink',
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
                        'key' => 'field_54490b74beacb',
                        'label' => 'Fordonsurval',
                        'name' => 'content_assortment',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5415adebd06ff',
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
                        'key' => 'field_544a173793741',
                        'label' => 'Kontaktformulär',
                        'name' => 'content_form',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5415adebd06ff',
                                    'operator' => '==',
                                    'value' => 'form',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'wpcf7_contact_form',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_544a175493742',
                        'label' => 'Anläggningsinformation',
                        'name' => 'content_facilities',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5415adebd06ff',
                                    'operator' => '==',
                                    'value' => 'facilities',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'all' => 'Alla anläggningar',
                            'specific' => 'Anläggningskort',
                            'map' => 'Karta',
                            'contact' => 'Kontaktuppgifter',
                            'openhours' => 'Öppettider',
                            'employees' => 'Personal',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_544a181ef6839',
                        'label' => 'För anläggning',
                        'name' => 'content_facilities_facility',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5415adebd06ff',
                                    'operator' => '==',
                                    'value' => 'facilities',
                                ),
                                array(
                                    'field' => 'field_544a175493742',
                                    'operator' => '!=',
                                    'value' => 'all',
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
                        'key' => 'field_544a1a514525e',
                        'label' => 'Erbjudanden',
                        'name' => 'content_offers',
                        'type' => 'select',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5415adebd06ff',
                                    'operator' => '==',
                                    'value' => 'offer',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'all' => 'Alla erbjudanden',
                            'pb' => 'Personbilar',
                            'tb' => 'Transportbilar',
                            'lb' => 'Lastbilar',
                            'hb' => 'Hyrbilar',
                            'specific' => 'Ett erbjudande',
                            'slider' => 'Erbjudandeslider',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        "key" => "field_usespecificfacility0872397tyc",
                        "name" => "content_use_offer_facility",
                        "label" => "Anläggningsspecifika erbjudanden",
                        "type" => "true_false",
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_544a1a514525e',
                                    'operator' => '==',
                                    'value' => 'slider',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                    ),
                    array(
                        "key" => "field_offerfacility9tasdikjb2397",
                        "label" => "Anläggning",
                        "name" => "content_offer_facility",
                        "type" => "post_object",
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_usespecificfacility0872397tyc',
                                    'operator' => '==',
                                    'value' => 1,
                                ),
                                array(
                                    'field' => 'field_544a1a514525e',
                                    'operator' => '==',
                                    'value' => 'slider',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'post_type' => array(
                            0 => 'facility',
                        ),
                    ),
                    array(
                        'key' => 'field_544915bba5596',
                        'label' => 'Dölj blockram',
                        'name' => 'content_hide-block-container',
                        'type' => 'true_false',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5415adebd06ff',
                                    'operator' => '!=',
                                    'value' => 'assortment',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_544a18d7164ab',
                        'label' => 'Dölj blockrubrik',
                        'name' => 'content_hide-header',
                        'type' => 'true_false',
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till innehåll',
            ),
            array(
                'key' => 'field_54490cb16934c',
                'label' => 'Sidinställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_54490cbc6934d',
                'label' => 'Dölj rubrik',
                'name' => 'content_hide-header',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_54490d6f61d41',
                'label' => 'Dölj sidram',
                'name' => 'content_hide-container',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
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
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'offer',
                    'order_no' => 1,
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
                5 => 'author',
                6 => 'format',
                7 => 'featured_image',
                8 => 'categories',
                9 => 'tags',
                10 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_omdirigering',
        'title' => 'Omdirigering',
        'fields' => array(
            array(
                'key' => 'field_5415bd0e63807',
                'label' => 'Länk',
                'name' => 'redirect_link-url',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5444fd6281d38',
                'label' => 'Mobil länk',
                'name' => 'redirect_link-mobile',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5444fd6f81d39',
                'label' => 'Surfplatta länk',
                'name' => 'redirect_link-tablet',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5415bcc963806',
                'label' => 'Egen text',
                'name' => 'redirect_custom-text',
                'type' => 'wysiwyg',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
            ),
            array(
                "key" => "field_304857239857028375",
                "label" => "Antal sekunder innan omdirigering sker",
                "name" => "redirect_timer",
                "type" => "number",
                "default_value" => 8,
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_redirect.php',
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
}

?>
