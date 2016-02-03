<?php
/*
Plugin Name: BytBil Bildspel
Description: Skapa och visa bildspel med olika effekter och innehållstyper på din hemsida.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 2.0.1
Author URI: http://www.bytbil.com
*/

add_action('init', 'cptui_register_my_cpt_slideshow');
function cptui_register_my_cpt_slideshow()
{
    register_post_type('slideshow', array(
            'label' => 'Bildspel',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'slideshow', 'with_front' => true),
            'query_var' => true,
            'supports' => array('title', 'revisions'),
            'labels' => array(
                'name' => 'Bildspel',
                'singular_name' => 'Bildspel',
                'menu_name' => 'Bildspel',
                'add_new' => 'Lägg till Bildspel',
                'add_new_item' => 'Lägg till nytt Bildspel',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera Bildspel',
                'new_item' => 'Ny Bildspel',
                'view' => 'Visa Bildspel',
                'view_item' => 'Visa Bildspel',
                'search_items' => 'Sök Bildspel',
                'not_found' => 'Inga Bildspel hittade',
                'not_found_in_trash' => 'Inga Bildspel i papperskorgen',
                'parent' => 'Bildspelets förälder',
            )
        )
    );
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_bildspel',
        'title' => 'Bildspel',
        'fields' => array(
            array(
                'key' => 'field_540fd8fa728d4',
                'label' => 'Bilder',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_540fd909728d5',
                'label' => 'Lägg till innehåll',
                'name' => 'slideshow-images',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_540fe43b92839',
                        'label' => 'Innehåll',
                        'name' => 'slideshow-type',
                        'type' => 'radio',
                        'column_width' => '',
                        'choices' => array(
                            'image' => 'Enbart bild',
                            'image-text' => 'Bild och text',
                            'video' => 'Videoklipp',
                            'offer' => 'Erbjudande',
                            'search' => 'Bilsök',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'image',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_540fd9a6509a7',
                        'label' => 'Bild',
                        'name' => 'slideshow-images-url',
                        'type' => 'image',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'image',
                                ),
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'image-text',
                                ),
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'search',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_521c24c023eaf',
                        'label' => 'Fordonsurval',
                        'name' => 'slideshow-assortment',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'search',
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
                        'key' => 'field_540ff12c5721ac',
                        'label' => 'Sökrutans rubrik',
                        'name' => 'slideshow-search-header',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'search',
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
                        'key' => 'field_521c24a123cea',
                        'label' => 'Textfärg',
                        'name' => 'slideshow-assortment-header-color',
                        'type' => 'radio',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'search',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'black' => 'Svart',
                            'white' => 'Vit',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'black',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_540fe4d49283a',
                        'label' => 'Erbjudande',
                        'name' => 'slideshow-offer',
                        'type' => 'post_object',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'offer',
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
                        'key' => 'field_540ff0cc53ebf',
                        'label' => 'Videoklipp',
                        'name' => 'slideshow-video',
                        'type' => 'radio',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'video',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'youtube' => 'YouTube-klipp',
                            'file' => 'Eget videoklipp',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'youtube',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_540ff12c53ec0',
                        'label' => 'YouTube-ID',
                        'name' => 'slideshow-video-youtubeid',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'video',
                                ),
                                array(
                                    'field' => 'field_540ff0cc53ebf',
                                    'operator' => '==',
                                    'value' => 'youtube',
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
                        'key' => 'field_540ff16253ec2',
                        'label' => 'Eget videoklipp',
                        'name' => 'slideshow-video-file',
                        'type' => 'file',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'video',
                                ),
                                array(
                                    'field' => 'field_540ff0cc53ebf',
                                    'operator' => '==',
                                    'value' => 'file',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'save_format' => 'object',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_540fe73d8a18c',
                        'label' => 'Text',
                        'name' => 'slideshow-images-text-field',
                        'type' => 'repeater',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '==',
                                    'value' => 'image-text',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_540fe7a48a18d',
                                'label' => 'Innehåll',
                                'name' => 'slideshow-images-text-field-content',
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
                                'key' => 'field_540fe7f78a18e',
                                'label' => 'Stil',
                                'name' => 'slideshow-images-text-field-style',
                                'type' => 'select',
                                'column_width' => '',
                                'choices' => array(
                                    'header' => 'Rubrik',
                                    'subheader' => 'Liten rubrik',
                                    'caption' => 'Bildspelstext',
                                ),
                                'default_value' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'field_540feba53f487',
                                'label' => 'Anpassa utseende',
                                'name' => 'slideshow-images-text-field-customize',
                                'type' => 'true_false',
                                'column_width' => '',
                                'message' => '',
                                'default_value' => 0,
                            ),
                            array(
                                'key' => 'field_540fe8838a18f',
                                'label' => 'Textfärg',
                                'name' => 'slideshow-images-text-field-color',
                                'type' => 'color_picker',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_540feba53f487',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '#ffffff',
                            ),
                            array(
                                'key' => 'field_540fea52b9fc8',
                                'label' => 'Bakgrundsfärg',
                                'name' => 'slideshow-images-text-field-background',
                                'type' => 'color_picker',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_540feba53f487',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => 'transparent',
                            ),
                            array(
                                'key' => 'field_540fea86b9fc9',
                                'label' => 'Genomskinlig bakgrund',
                                'name' => 'slideshow-images-text-field-opacity',
                                'type' => 'true_false',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_540feba53f487',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'message' => 'Gör bakgrunden genomskinlig',
                                'default_value' => 0,
                            ),
                            array(
                                'key' => 'field_540feaefb9fca',
                                'label' => 'Genomskinlighet',
                                'name' => 'slideshow-images-text-field-opacity-val',
                                'type' => 'number',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_540fea86b9fc9',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                        array(
                                            'field' => 'field_540feba53f487',
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
                                'append' => '%',
                                'min' => '',
                                'max' => '',
                                'step' => '',
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'row',
                        'button_label' => 'Lägg till textruta',
                    ),
                    array(
                        'key' => 'field_540fda29509aa',
                        'label' => 'Vill du länka innehållet till någonting?',
                        'name' => 'slideshow-images-link',
                        'type' => 'radio',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '!=',
                                    'value' => 'video',
                                ),
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '!=',
                                    'value' => 'search',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            'false' => 'Nej',
                            'internal' => 'Ja, till en lokal sida',
                            'external' => 'Ja, till en extern URL',
                            'file' => 'Ja, till en fil.',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'false',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_540fdab1509ab',
                        'label' => 'Sidlänk',
                        'name' => 'slideshow-images-link-internal',
                        'type' => 'page_link',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fda29509aa',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'page',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_540fdb0d509ac',
                        'label' => 'Extern URL',
                        'name' => 'slideshow-images-link-external',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fda29509aa',
                                    'operator' => '==',
                                    'value' => 'external',
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
                        'key' => 'field_540fdb2f509ad',
                        'label' => 'Fil eller media',
                        'name' => 'slideshow-images-link-file',
                        'type' => 'file',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fda29509aa',
                                    'operator' => '==',
                                    'value' => 'file',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'save_format' => 'object',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_540fdbe1e1191',
                        'label' => 'Länkbeteende',
                        'name' => 'slideshow-images-link-target',
                        'type' => 'radio',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fda29509aa',
                                    'operator' => '==',
                                    'value' => 'file',
                                ),
                                array(
                                    'field' => 'field_540fda29509aa',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                                array(
                                    'field' => 'field_540fda29509aa',
                                    'operator' => '==',
                                    'value' => 'external',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            '_self' => 'Öppna i samma fönster',
                            '_blank' => 'Öppna i nytt fönster',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '_self',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_540fdb77e118d',
                        'label' => 'Länkknapp',
                        'name' => 'slideshow-images-link-button',
                        'type' => 'radio',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fda29509aa',
                                    'operator' => '==',
                                    'value' => 'file',
                                ),
                                array(
                                    'field' => 'field_540fda29509aa',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                                array(
                                    'field' => 'field_540fda29509aa',
                                    'operator' => '==',
                                    'value' => 'external',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
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
                        'key' => 'field_540fdbb3e1190',
                        'label' => 'Knapptext',
                        'name' => 'slideshow-images-link-button-text',
                        'type' => 'text',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fdb77e118d',
                                    'operator' => '==',
                                    'value' => 'true',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => 'Läs mer...',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_540feba53f873',
                        'label' => 'Anpassa länkutseende',
                        'name' => 'slideshow-images-linktext-field-customize',
                        'type' => 'true_false',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fdb77e118d',
                                    'operator' => '==',
                                    'value' => 'true',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_540fe8838a554',
                        'label' => 'Länktextfärg',
                        'name' => 'slideshow-images-linktext-field-color',
                        'type' => 'color_picker',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540feba53f873',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '#ffffff',
                    ),
                    array(
                        'key' => 'field_540fea52b9fa8',
                        'label' => 'Länkbakgrundsfärg',
                        'name' => 'slideshow-images-linktext-field-background',
                        'type' => 'color_picker',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540feba53f873',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => 'transparent',
                    ),
                    array(
                        'key' => 'field_540fea86b9f99',
                        'label' => 'Genomskinlig bakgrund',
                        'name' => 'slideshow-images-linktext-field-opacity',
                        'type' => 'true_false',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540feba53f873',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'message' => 'Gör bakgrunden genomskinlig',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_540feaefb9fca',
                        'label' => 'Genomskinlighet',
                        'name' => 'slideshow-images-linktext-field-opacity-val',
                        'type' => 'number',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540feba53f873',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                                array(
                                    'field' => 'field_540fea86b9f99',
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
                        'append' => '%',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),

                    array(
                        'key' => 'field_540fdf3ebd9cd',
                        'label' => 'Bakgrundsfärg',
                        'name' => 'slideshow-slide-bgcolor',
                        'type' => 'color_picker',
                        'column_width' => '',
                        'default_value' => 'transparent',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fe43b92839',
                                    'operator' => '!=',
                                    'value' => 'search',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                    ),

                    array(
                        'key' => 'field_540fdf3ebd833',
                        'label' => 'Datumstyrning',
                        'name' => 'slideshow-date',
                        'type' => 'radio',
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
                        'key' => 'field_540fdfadbd834',
                        'label' => 'Startdatum',
                        'name' => 'slideshow-date-start',
                        'type' => 'date_picker',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fdf3ebd833',
                                    'operator' => '==',
                                    'value' => 'true',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'date_format' => 'yymmdd',
                        'display_format' => 'dd/mm/yy',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_540fdfddbd835',
                        'label' => 'Slutdatum',
                        'name' => 'slideshow-date-stop',
                        'type' => 'date_picker',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_540fdf3ebd833',
                                    'operator' => '==',
                                    'value' => 'true',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'date_format' => 'yymmdd',
                        'display_format' => 'dd/mm/yy',
                        'first_day' => 1,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till bild',
            ),
            array(
                'key' => 'field_540fdc303593e',
                'label' => 'Inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_540fdcbd35941',
                'label' => 'Visningstid',
                'name' => 'slideshow-settings-duration',
                'type' => 'text',
                'default_value' => '6',
                'placeholder' => '',
                'prepend' => '',
                'append' => 'sekunder',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_540fdc3e3593f',
                'label' => 'Animation',
                'name' => 'slideshow-settings-animation',
                'type' => 'select',
                'choices' => array(
                    'slide' => 'Glid in och ut',
                    'fade' => 'Tona in och ut',
                ),
                'default_value' => 'slide',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_540fdc9635940',
                'label' => 'Animationshastighet',
                'name' => 'slideshow-settings-animation-speed',
                'type' => 'text',
                'default_value' => '600',
                'placeholder' => '',
                'prepend' => '',
                'append' => 'millisekunder',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'slideshow',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array(
                //0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
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

if (function_exists('add_image_size')) {
    add_image_size('bildspel-1170x500', 1170, 500, true);
    add_image_size('bildspel-1170x450', 1170, 450, true);
    add_image_size('bildspel-1170x400', 1170, 400, true);
}

function bytbil_show_slideshow($id)
{ ?>

    <div class="flexslider">
        <ul class="slides">
            <?php while (has_sub_fields('slideshow-images', $id)) :

                $show_slide = false;
                $slideshow_date = get_sub_field('slideshow-date');

                if ($slideshow_date == 'true') {
                    $start_date = get_sub_field('slideshow-date-start');
                    $stop_date = get_sub_field('slideshow-date-stop');
                    if (date('Ymd') >= $start_date && date('Ymd') <= $stop_date) {
                        $show_slide = true;
                    }
                } else {
                    $show_slide = true;
                }
                if ($show_slide == true) {

                    $slideshow_type = get_sub_field('slideshow-type');
                    $slideshow_link = get_sub_field('slideshow-images-link');
                    $button = get_sub_field('slideshow-images-link-button');

                    if ($slideshow_link != 'false') {

                        $target = get_sub_field('slideshow-images-link-target');

                        if ($slideshow_link == 'internal') {
                            $url = get_sub_field('slideshow-images-link-internal');
                        } elseif ($slideshow_link == 'external') {
                            $url = get_sub_field('slideshow-images-link-external');
                        } elseif ($slideshow_link == 'file') {
                            $file = get_sub_field('slideshow-images-link-file');
                            $url = $file['url'];
                        }
                    }
                    ?>

                    <?php if ($slideshow_type == 'image' || $slideshow_type == 'image-text' || $slideshow_type == 'search') {
                        $slideshow_image_object = get_sub_field('slideshow-images-url');
                        $size = 'bildspel-1170x400';
                        $image_url = $slideshow_image_object['sizes'][$size];
                        $image_alt = $slideshow_image_object['alt'];
                        $image_title = $slideshow_image_object['title'];
                        $slideshow_slide_bgcolor = get_sub_field('slideshow-slide-bgcolor');
                    } ?>

                    <?php if ($slideshow_type == 'search') : ?>
                        <?php $slideshow_assortment = get_sub_field('slideshow-assortment'); ?>

                        <li style="background-color: <?php echo $slideshow_slide_bgcolor; ?>;">
                            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"
                                 title="<?php echo $image_alt; ?>"/>

                            <div class="caption search-caption">
                                <div class="vertical-align-wrapper">
                                    <div class="vertical-align middle">
                                        <div class="horizontal-align middle full-width">
                                            <div
                                                class="caption-contents <?php echo get_sub_field('slideshow-assortment-header-color'); ?>-text">
                                                <h2 class="search-title">Sök och hitta bilar i lager</h2>
                                                <?php bytbil_show_assortment_search($slideshow_assortment->ID); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    <?php elseif ($slideshow_type == 'image') : ?>
                        <li style="background-color: <?php echo $slideshow_slide_bgcolor; ?>;">
                            <?php if ($button == 'false') { ?>
                            <a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
                                <?php } ?>
                                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"
                                     title="<?php echo $image_alt; ?>"/>
                                <?php if ($button == 'true') { ?>
                                    <div class="flex-caption">
                                        <a class="flex-link" href="<?php echo $url; ?>"
                                           target="<?php echo $target; ?>"><?php echo get_sub_field('slideshow-images-link-button-text'); ?></a>
                                    </div>
                                <?php } ?>

                                <?php if ($button == 'false') { ?>
                            </a>
                        <?php } ?>
                        </li>

                    <?php elseif ($slideshow_type == 'image-text'): ?>
                        <li style="background-color: <?php echo $slideshow_slide_bgcolor; ?>;">
                            <?php if ($button == 'false') { ?>
                            <a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
                                <?php } ?>
                                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"
                                     title="<?php echo $image_alt; ?>"/>

                                <div class="flex-caption">
                                    <?php
                                    $link_text_field_customize = get_sub_field('slideshow-images-linktext-field-customize');
                                    if ($link_text_field_customize) {
                                        $link_text_color = get_sub_field('slideshow-images-linktext-field-color');
                                        $link_bg_color = get_sub_field('slideshow-images-linktext-field-background');
                                        $link_bg_opacity = get_sub_field('slideshow-images-linktext-field-opacity-val');

                                        if ($link_text_color && !$link_bg_color) {
                                            $link_text_field_styles = 'color: ' . $link_text_color;
                                        } elseif ($link_text_color && $link_bg_color) {
                                            if ($link_bg_opacity) {
                                                //Get RGB from HEX
                                                list($r, $g, $b) = sscanf($link_bg_color, "#%02x%02x%02x");
                                                //Add Opacity
                                                $link_bg = 'rgba(' . $r . ',' . $g . ',' . $b . ',0.' . $link_bg_opacity . ')';
                                            } else {
                                                $link_bg = $link_bg_color;
                                            }
                                            $link_text_field_styles = 'style="background: ' . $link_bg . '; color: ' . $link_text_color . ';"';
                                        }
                                    }
                                    ?>
                                    <?php while (has_sub_fields('slideshow-images-text-field', $id)) :
                                        $text_field_style = get_sub_field('slideshow-images-text-field-style');
                                        $text_field_content = get_sub_field('slideshow-images-text-field-content');
                                        $text_field_customize = get_sub_field('slideshow-images-text-field-customize');
                                        if ($text_field_customize) {
                                            $text_color = get_sub_field('slideshow-images-text-field-color');
                                            $bg_color = get_sub_field('slideshow-images-text-field-background');
                                            $bg_opacity = get_sub_field('slideshow-images-text-field-opacity-val');

                                            if ($text_color && !$bg_color) {
                                                $text_field_styles = 'color: ' . $text_color;
                                            } elseif ($text_color && $bg_color) {
                                                if ($bg_opacity) {
                                                    //Get RGB from HEX
                                                    list($r, $g, $b) = sscanf($bg_color, "#%02x%02x%02x");
                                                    //Add Opacity
                                                    $bg = 'rgba(' . $r . ',' . $g . ',' . $b . ',0.' . $bg_opacity . ')';
                                                } else {
                                                    $bg = $bg_color;
                                                }
                                                $text_field_styles = 'style="background: ' . $bg . '; color: ' . $text_color . ';"';
                                            }
                                        }
                                        ?>
                                        <?php if ($text_field_style == 'header'): ?>
                                        <h2 class="header" <?php if ($text_field_styles) {
                                            echo $text_field_styles;
                                        } ?>><?php echo $text_field_content; ?></h2>
                                    <?php endif; ?>
                                        <?php if ($text_field_style == 'subheader'): ?>
                                        <h4 class="subheader" <?php if ($text_field_styles) {
                                            echo $text_field_styles;
                                        } ?>><?php echo $text_field_content; ?></h4>
                                    <?php endif; ?>
                                        <?php if ($text_field_style == 'caption'): ?>
                                        <p class="caption" <?php if ($text_field_styles) {
                                            echo $text_field_styles;
                                        } ?>><?php echo $text_field_content; ?></p>
                                    <?php endif; ?>
                                    <?php endwhile; ?>
                                    <?php if ($button == 'true') { ?>
                                        <a class="flex-link" <?php if ($link_text_field_styles) {
                                            echo $link_text_field_styles;
                                        } ?> href="<?php echo $url; ?>"
                                           target="<?php echo $target; ?>"><?php echo get_sub_field('slideshow-images-link-button-text'); ?></a>
                                    <?php } ?>
                                </div>
                                <?php if ($button == 'false') { ?>
                            </a>
                        <?php } ?>
                        </li>
                    <?php elseif ($slideshow_type == 'video'): ?>
                        <li style="background-color: <?php echo $slideshow_slide_bgcolor; ?>;">
                            <div class="video-container">
                                <?php if (get_sub_field('slideshow-video') == 'youtube'): ?>
                                    <iframe width="100%" height="100%"
                                            src="//www.youtube.com/embed/<?php echo get_sub_field('slideshow-video-youtubeid'); ?>"
                                            frameborder="0" allowfullscreen></iframe>
                                <?php elseif (get_sub_field('slideshow-video') == 'file'):
                                    $slideshow_video_file = get_sub_field('slideshow-video-file');
                                    ?>
                                    <video controls>
                                        <source src="<?php echo $slideshow_video_file['url']; ?>" type="video/mp4">
                                        Tyvärr stödjer inte din webbläsare videoklipp.
                                    </video>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php elseif ($slideshow_type == 'offer'):
                        $offer = get_sub_field('slideshow-offer');
                        $slideshow_image_object = get_field('offer-image', $offer->ID);
                        $slideshow_header = $offer->post_title;
                        $slideshow_subheader = get_field('offer-subheader', $offer->ID);
                        $size = 'bildspel-1170x400';
                        $image_url = $slideshow_image_object['sizes']['bildspel-1170x400'];
                        $image_alt = $slideshow_image_object['alt'];
                        $image_title = $slideshow_image_object['title'];
                        ?>
                        <li style="background-color: <?php echo $slideshow_slide_bgcolor; ?>;">
                            <?php if ($button == 'false') { ?>
                            <a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
                                <?php } ?>
                                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"
                                     title="<?php echo $image_alt; ?>"/>

                                <div class="flex-caption">
                                    <h2 class="header"><?php echo $slideshow_header; ?></h2>
                                    <h4 class="subheader"><?php echo $slideshow_subheader; ?></h4>
                                    <?php if ($button == 'true') { ?>
                                        <a class="flex-link" href="<?php echo $url; ?>"
                                           target="<?php echo $target; ?>"><?php echo get_sub_field('slideshow-images-link-button-text'); ?></a>
                                    <?php } ?>
                                </div>
                                <?php if ($button == 'false') { ?>
                            </a>
                        <?php } ?>
                        </li>
                    <?php endif; ?>

                <?php } ?>

            <?php endwhile; ?>
        </ul>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.flexslider').flexslider({
                animation: '<?php echo get_field('slideshow-settings-animation',$id); ?>',
                direction: 'horizontal',
                slideshowSpeed: <?php echo get_field('slideshow-settings-duration',$id)*1000; ?>,
                animationSpeed: <?php echo get_field('slideshow-settings-animation-speed',$id); ?>,
                pauseOnHover: true,
                animationLoop: false,
                useCSS: true,
                touch: true,
                controlNav: true,
                directionNav: true,
                smoothHeight: true
            });

        });
    </script>

<?php
} ?>
