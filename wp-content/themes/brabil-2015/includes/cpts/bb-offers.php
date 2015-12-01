<?php
add_action('init', 'cptui_register_my_cpt_offer');
function cptui_register_my_cpt_offer()
{
    register_post_type('offer', array(
            'label' => 'Erbjudanden',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'erbjudanden'),
            'query_var' => true,
            'supports' => array('title', 'revisions', 'thumbnail'),
            'labels' => array(
                'name' => 'Erbjudanden',
                'singular_name' => 'Erbjudande',
                'menu_name' => 'Erbjudanden',
                'add_new' => 'Lägg till erbjudande',
                'add_new_item' => 'Lägg till nytt erbjudande',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera erbjudande',
                'new_item' => 'Nytt erbjudande',
                'view' => 'Visa',
                'view_item' => 'Visa erbjudande',
                'search_items' => 'Sök bland erbjudanden',
                'not_found' => 'Inga erbjudanden hittades',
                'not_found_in_trash' => 'Inga erbjudanden hittades i papperskorgen',
                'parent' => 'Erbjudandets förälder',
            )
        )
    );
}

add_action('init', 'cptui_register_my_cpt_offer_price');
function cptui_register_my_cpt_offer_price() {
    register_post_type('offer_price', array(
            'label' => 'Pristyper',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => 'edit.php?post_type=offer',
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'offer_price', 'with_front' => true),
            'query_var' => true,
            'supports' => array('title'),
            'labels' => array (
                'name' => 'Pristyper',
                'singular_name' => 'Pristyp',
                'menu_name' => 'Pristyper',
                'add_new' => 'Lägg till pristyp',
                'add_new_item' => 'Lägg till ny pristyp',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera pristyp',
                'new_item' => 'Ny pristyp',
                'view' => 'Visa',
                'view_item' => 'Visa pristyp',
                'search_items' => 'Sök bland pristyper',
                'not_found' => 'Inga pristyper hittades',
                'not_found_in_trash' => 'Inga pristyper hittades i papperskorgen',
                'parent' => 'Pristypens förälder',
            )
        )
    );
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_erbjudande',
        'title' => 'Erbjudande',
        'fields' => array (
            array (
                'key' => 'field_5562a9ad8779e',
                'label' => 'Innehåll',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_5562ab3f877a3',
                'label' => 'Erbjudandets rubrik',
                'name' => 'offer-title',
                'type' => 'text',
                'instructions' => 'Fyll i en rubrik som skall användas i vyer som exempelvis erbjudandelistan.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_559b62dd49318',
                'label' => 'Erbjudandeflik',
                'name' => 'offer-tab',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_559b5dbb19fa2',
                        'label' => 'Flikrubrik',
                        'name' => 'offer-tab-text',
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
                        'key' => 'field_559b604d19fa8',
                        'label' => 'Beskrivning',
                        'name' => 'offer-tab-description',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array (
                        'key' => 'field_559b6662c322a',
                        'label' => 'Eget innehåll',
                        'name' => 'offer-custom-content',
                        'type' => 'wysiwyg',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_559b6322bae9d',
                                    'operator' => '==',
                                    'value' => 'custom',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array (
                        'key' => 'field_559b606419fa9',
                        'label' => 'Extra innehåll',
                        'name' => 'offer-tab-footer',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => '',
                'row_limit' => 5,
                'layout' => 'row',
                'button_label' => 'Lägg till flik',
            ),
            array (
                'key' => 'field_5562aaed877a1',
                'label' => 'Erbjudandets sidfot',
                'name' => 'offer-footer',
                'type' => 'wysiwyg',
                'instructions' => 'Fyll i disclaimertext som skall visas i sidfoten av erbjudandet - eller lägg till viktiga Action Buttons som leder besökaren till konvertering.',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_5562ac58877a7',
                'label' => 'Bilder och header',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_5562abb7877a5',
                'label' => 'Bild för erbjudandet',
                'name' => 'offer-image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => 'Välj eller ladda upp en bild som skall visas för erbjudandet.',
            ),
            array (
                'key' => 'field_5562ac15877a6',
                'label' => 'Alternativ bild',
                'name' => 'offer-alt-image',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => 'Välj eller ladda upp en annan bild som du vill använda för visning i exempelvis listvy.',
            ),
            array(
                'key' => 'field_os5523f93e6aa2a',
                'label' => 'Textrutans innehåll',
                'name' => 'slideshow-caption-content',
                'type' => 'wysiwyg',
                'instructions' => 'Skriv i innehållet du vill visa i textrutan på bildspelet',
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
            array(
                'key' => 'field_os5523fa566aa2d',
                'label' => 'Textrutans bakgrundsfärg',
                'name' => 'slideshow-caption-color',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg textrutan skall ha',
                'column_width' => '',
                'default_value' => 'transparent',
            ),
            array(
                'key' => 'field_os5523fbec6aa30',
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
                'key' => 'field_os55265fcf85b35',
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
                'key' => 'field_os5523fc276aa31',
                'label' => 'Visa kantram',
                'name' => 'slideshow-caption-border',
                'type' => 'radio',
                'instructions' => 'Välj om textrutan skall ha en kantram.',
                'column_width' => '',
                'choices' => array(
                    'false' => 'Nej',
                    'true' => 'Ja',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'false',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_os5523fa7d6aa2e',
                'label' => 'Textrutans position',
                'name' => 'slideshow-caption-position',
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

            array (
                'key' => 'field_5562ac588ac247',
                'label' => 'Priser och datum',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_5562ac67877a8',
                'label' => 'Priser',
                'name' => 'offer-prices',
                'type' => 'repeater',
                'instructions' => 'Lägg till de priser som skall visas i botten på erbjudandet.',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5562ad26877a9',
                        'label' => 'Pristyp',
                        'name' => 'offer-price-type',
                        'type' => 'post_object',
                        'instructions' => 'Välj en pristyp du vill visa priset som.',
                        'column_width' => 50,
                        'post_type' => array (
                            0 => 'offer_price',
                        ),
                        'taxonomy' => array (
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_5562ad5e877aa',
                        'label' => 'Pris',
                        'name' => 'offer-price-value',
                        'type' => 'text',
                        'instructions' => 'Fyll i det pris eller text du vill visa under rubriken.',
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
                'layout' => 'row',
                'button_label' => 'Lägg till pris',
            ),
            array (
                'key' => 'field_5562adc4877ac',
                'label' => 'Startdatum',
                'name' => 'offer-start-date',
                'type' => 'date_picker',
                'instructions' => 'Välj det datum som erbjudandet skall visas och gälla från.',
                'date_format' => 'yymmdd',
                'display_format' => 'dd/mm/yy',
                'first_day' => 1,
            ),
            array (
                'key' => 'field_5562adea877ad',
                'label' => 'Slutdatum',
                'name' => 'offer-stop-date',
                'type' => 'date_picker',
                'instructions' => 'Välj det datum som erbjudandet skall visas och gälla till.',
                'date_format' => 'yymmdd',
                'display_format' => 'dd/mm/yy',
                'first_day' => 1,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'offer',
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
        'id' => 'acf_pristyp',
        'title' => 'Pristyp',
        'fields' => array (
            array (
                'key' => 'field_5562b5b2acf46',
                'label' => 'Rubrik',
                'name' => 'price-header',
                'type' => 'text',
                'instructions' => 'Fyll i en rubrik för pristypen.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5562b5c6acf47',
                'label' => 'Utseende',
                'name' => 'price-appearence',
                'type' => 'select',
                'instructions' => 'Välj ett utseende för priset',
                'choices' => array (
                    'default' => 'Standard',
                    'campaign' => 'Kampanjpris',
                    'ord' => 'Överstruken',
                    'brand' => 'Märkesfärg',
                    'own' => 'Egen färg',
                ),
                'default_value' => 'default',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5562b658acf48',
                'label' => 'Egen färg',
                'name' => 'price-colour',
                'type' => 'color_picker',
                'conditional_logic' => array (
                    'status' => 1,
                    'rules' => array (
                        array (
                            'field' => 'field_5562b5c6acf47',
                            'operator' => '==',
                            'value' => 'own',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#151515',
            ),
            array (
                'key' => 'field_5562b686acf49',
                'label' => 'Suffix',
                'name' => 'price-suffix',
                'type' => 'text',
                'instructions' => 'Fyll i om du vill visa ett suffix för priset (Exempelvis "/mån").',
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
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'offer_price',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
                0 => 'permalink',
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


?>