<?php
/*
Plugin Name: BytBil Bildspel
Description: Skapa och visa slideshow med olika effekter och innehållstyper på din hemsida.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 3.0.1
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
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till bildspel',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera bildspel',
            'new_item' => 'Nytt bildspel',
            'view' => 'Visa bildspel',
            'view_item' => 'Visa bildspel',
            'search_items' => 'Sök bildspel',
            'not_found' => 'Inga bildspel hittade',
            'not_found_in_trash' => 'Inga bildspel i papperskorgen',
            'parent' => 'Bildspelets förälder',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_bildspel',
        'title' => 'Bildspel',
        'fields' => array(
            array(
                'key' => 'field_5523f7196aa25',
                'label' => 'Bilder',
                'name' => 'slideshow-slides',
                'type' => 'flexible_content',
                'layouts' => array(
                    array(
                        'label' => 'Bild och text',
                        'name' => 'slideshow-image-text',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5523f80b6aa27',
                                'label' => 'Välj bild',
                                'name' => 'slideshow-image-object',
                                'instructions' => 'Ladda upp eller välj en bild du vill visa i bildspelet.',
                                'type' => 'image_crop',
                                'crop_type' => 'hard',
                                'target_size' => 'slideshow-default',
                                'width' => '',
                                'height' => '',
                                'preview_size' => 'slideshow-sd',
                                'force_crop' => 'yes',
                                'save_in_media_library' => 'no',
                                'retina_mode' => 'no',
                                'save_format' => 'object',
                            ),
                            array(
                                'key' => 'field_12523f80b6aa31',
                                'label' => 'Overlay bakgrundsfärg',
                                'name' => 'slideshow-overlay-color',
                                'type' => 'color_picker',
                                'instructions' => 'Välj vilken färg overlay skall ha',
                                'column_width' => '',
                                'default_value' => 'transparent',
                            ),
                            array(
                                'key' => 'field_12523f80b6aa32',
                                'label' => 'Overlay styrka',
                                'name' => 'slideshow-overlay-opacity',
                                'type' => 'number',
                                'instructions' => 'Fyll i en styrka för genomskinligheten på overlay bakgrund.',
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
                                'key' => 'field_5523f93e6aa2a',
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
                                'key' => 'field_5523fa566aa2d',
                                'label' => 'Textrutans bakgrundsfärg',
                                'name' => 'slideshow-caption-color',
                                'type' => 'color_picker',
                                'instructions' => 'Välj vilken färg textrutan skall ha',
                                'column_width' => '',
                                'default_value' => 'transparent',
                            ),
                            array(
                                'key' => 'field_5523fbec6aa30',
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
                                'key' => 'field_55265fcf85b35',
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
                                'key' => 'field_5523fc276aa31',
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
                                'key' => 'field_5523fa7d6aa2e',
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
                            array(
                                'key' => 'field_5523fcb86aa33',
                                'label' => 'Länka slide till',
                                'name' => 'slideshow-link-type',
                                'type' => 'radio',
                                'instructions' => 'Välj om du vill länka hela bilden till ett innehåll.',
                                'column_width' => '',
                                'choices' => array(
                                    'none' => 'Ingenting',
                                    'internal' => 'Intern sida',
                                    'external' => 'Extern URL',
                                    'file' => 'Fil eller media',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 'none',
                                'layout' => 'horizontal',
                            ),
                            array(
                                'key' => 'field_5523fd0e6aa34',
                                'label' => 'Sida',
                                'name' => 'slideshow-link-internal',
                                'type' => 'post_object',
                                'instructions' => 'Välj en sida som bilden skall länka till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_5523fcb86aa33',
                                            'operator' => '==',
                                            'value' => 'internal',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'post_type' => array(
                                    0 => 'page',
                                    1 => 'offer',
                                    2 => 'vehicle',
                                    3 => 'news',
                                ),
                                'taxonomy' => array(
                                    0 => 'all',
                                ),
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'field_5523fd376aa35',
                                'label' => 'URL',
                                'name' => 'slideshow-link-external',
                                'type' => 'text',
                                'instructions' => 'Fyll i en adress bilden skall länka till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_5523fcb86aa33',
                                            'operator' => '==',
                                            'value' => 'external',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => 'www.bytbil.com',
                                'prepend' => 'http://',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_5523fd876aa36',
                                'label' => 'Fil',
                                'name' => 'slideshow-link-file',
                                'type' => 'file',
                                'instructions' => 'Välj eller ladda upp en fil bilden skall länka till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_5523fcb86aa33',
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
                                'key' => 'field_5524e3243b328',
                                'label' => 'Visa från',
                                'name' => 'slideshow-date-start',
                                'type' => 'date_picker',
                                'instructions' => 'Fyll i det datum bilden skall visas från.',
                                'column_width' => '',
                                'date_format' => 'yymmdd',
                                'display_format' => 'dd/mm/yy',
                                'first_day' => 1,
                            ),
                            array(
                                'key' => 'field_5524e33d3b329',
                                'label' => 'Visa till',
                                'name' => 'slideshow-date-stop',
                                'type' => 'date_picker',
                                'instructions' => 'Fyll i det datum bilden skall visas till.',
                                'column_width' => '',
                                'date_format' => 'yymmdd',
                                'display_format' => 'dd/mm/yy',
                                'first_day' => 1,
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Modellbildspel',
                        'name' => 'slideshow-image-model',
                        'display' => 'row',
                        'min' => '',
                        'max' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_ms554216beabf73',
                                'label' => 'Välj bilmodellern',
                                'instructions' => 'Välj en modell du vill visa i bildspelet.',
                                'name' => 'slideshow-model-object',
                                'type' => 'relationship',
                                'return_format' => 'object',
                                'post_type' => array(
                                    0 => 'vehicle',
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
                                'key' => 'field_ms5523f93e6aa2a',
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
                                'key' => 'field_ms5523fa566aa2d',
                                'label' => 'Textrutans bakgrundsfärg',
                                'name' => 'slideshow-caption-color',
                                'type' => 'color_picker',
                                'instructions' => 'Välj vilken färg textrutan skall ha',
                                'column_width' => '',
                                'default_value' => 'transparent',
                            ),
                            array(
                                'key' => 'field_ms5523fbec6aa30',
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
                                'key' => 'field_ms55265fcf85b35',
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
                                'key' => 'field_ms5523fc276aa31',
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
                                'key' => 'field_ms5523fa7d6aa2e',
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
                            array(
                                'key' => 'field_ms5523fcb86aa33',
                                'label' => 'Länka slide till',
                                'name' => 'slideshow-link-type',
                                'type' => 'radio',
                                'instructions' => 'Välj om du vill länka hela bilden till ett innehåll.',
                                'column_width' => '',
                                'choices' => array(
                                    'none' => 'Ingenting',
                                    'internal' => 'Intern sida',
                                    'external' => 'Extern URL',
                                    'file' => 'Fil eller media',
                                ),
                                'other_choice' => 0,
                                'save_other_choice' => 0,
                                'default_value' => 'none',
                                'layout' => 'horizontal',
                            ),
                            array(
                                'key' => 'field_ms5523fd0e6aa34',
                                'label' => 'Sida',
                                'name' => 'slideshow-link-internal',
                                'type' => 'post_object',
                                'instructions' => 'Välj en sida som bilden skall länka till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_5523fcb86aa33',
                                            'operator' => '==',
                                            'value' => 'internal',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'post_type' => array(
                                    0 => 'page',
                                    1 => 'offer',
                                    2 => 'vehicle',
                                    3 => 'news',
                                ),
                                'taxonomy' => array(
                                    0 => 'all',
                                ),
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'field_ms5523fd376aa35',
                                'label' => 'URL',
                                'name' => 'slideshow-link-external',
                                'type' => 'text',
                                'instructions' => 'Fyll i en adress bilden skall länka till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_5523fcb86aa33',
                                            'operator' => '==',
                                            'value' => 'external',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => 'www.bytbil.com',
                                'prepend' => 'http://',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_ms5523fd876aa36',
                                'label' => 'Fil',
                                'name' => 'slideshow-link-file',
                                'type' => 'file',
                                'instructions' => 'Välj eller ladda upp en fil bilden skall länka till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_5523fcb86aa33',
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
                                'key' => 'field_ms5524e3243b328',
                                'label' => 'Visa från',
                                'name' => 'slideshow-date-start',
                                'type' => 'date_picker',
                                'instructions' => 'Fyll i det datum bilden skall visas från.',
                                'column_width' => '',
                                'date_format' => 'yymmdd',
                                'display_format' => 'dd/mm/yy',
                                'first_day' => 1,
                            ),
                            array(
                                'key' => 'field_ms5524e33d3b329',
                                'label' => 'Visa till',
                                'name' => 'slideshow-date-stop',
                                'type' => 'date_picker',
                                'instructions' => 'Fyll i det datum bilden skall visas till.',
                                'column_width' => '',
                                'date_format' => 'yymmdd',
                                'display_format' => 'dd/mm/yy',
                                'first_day' => 1,
                            ),
                        ),
                    ),
                ),
                'button_label' => 'Lägg till bild',
                'min' => '',
                'max' => '',
            ),
            array(
                'key' => 'field_552661a6366ad',
                'label' => 'Utseende och effekter',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_552660cb366ab',
                'label' => 'Kantram',
                'name' => 'slideshow-border',
                'type' => 'checkbox',
                'instructions' => 'Bocka i om du vill visa en kantram på bildspelet',
                'choices' => array(
                    'true' => 'Ja',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_55266131366ac',
                'label' => 'Ramfärg',
                'name' => 'slideshow-border-color',
                'type' => 'color_picker',
                'instructions' => 'Välj en färg du vill rama in bildspelet med.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_552660cb366ab',
                            'operator' => '==',
                            'value' => 'true',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_552661b4366ae',
                'label' => 'Animationseffekt',
                'name' => 'slideshow-animation',
                'type' => 'select',
                'instructions' => 'Välj den animationseffekt bilderna skall växla med.',
                'choices' => array(
                    'fade' => 'Tona in / ut',
                    'slide' => 'Glid in / ut',
                ),
                'default_value' => 'fade',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_5526630b366b1',
                'label' => 'Glid in från',
                'name' => 'slideshow-animation-slide',
                'type' => 'select',
                'instructions' => 'Välj åt vilket håll bilderna skall glida in.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_552661b4366ae',
                            'operator' => '==',
                            'value' => 'slide',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'horizontal' => 'Vågrätt',
                    'vertical' => 'Lodrätt',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_552661e6366af',
                'label' => 'Animationshastighet',
                'name' => 'slideshow-animation-speed',
                'type' => 'select',
                'instructions' => 'Välj vilken animationshastighet bilderna skall växla med.',
                'choices' => array(
                    600 => 'Standard',
                    250 => 'Snabb',
                    950 => 'Långsam',
                ),
                'default_value' => 600,
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_5526638f366b2',
                'label' => 'Övriga inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_55266245366b0',
                'label' => 'Tid per bild',
                'name' => 'slideshow-speed',
                'type' => 'number',
                'instructions' => 'Fyll i det antal sekunder varje bild skall visas i.',
                'default_value' => 7,
                'placeholder' => '',
                'prepend' => '',
                'append' => 'sekunder',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_5526640b366b4',
                'label' => 'Pilar',
                'name' => 'slideshow-arrows',
                'type' => 'radio',
                'instructions' => 'Välj om du vill visa pilar i bildspelet',
                'choices' => array(
                    'true' => 'Ja',
                    'false' => 'Nej',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'true',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_552663a1366b3',
                'label' => 'Bildkontroller',
                'name' => 'slideshow-controls',
                'type' => 'select',
                'instructions' => 'Välj vilken typ av bildkontroller som skall visas',
                'choices' => array(
                    'true' => 'Punkter',
                    'thumbs' => 'Miniatyrer',
                    'false' => 'Inga kontroller',
                ),
                'default_value' => 'true',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_55266457366b5',
                'label' => 'Miniatyrstorlek',
                'name' => 'slideshow-controls-thumbs',
                'type' => 'select',
                'instructions' => 'Välj vilken storlek miniatyrerna skall ha',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_552663a1366b3',
                            'operator' => '==',
                            'value' => 'thumbs',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'medium' => 'Standard',
                    'small' => 'Små',
                    'large' => 'Stora',
                ),
                'default_value' => 'medium',
                'allow_null' => 0,
                'multiple' => 0,
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
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'permalink',
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


function bytbil_show_slideshow($id, $row_width = 12)
{

    /* General Slideshow-settings */
    $fields = get_fields($id);
    
    $date_today = date('Ymd');
    $slideshow_border = $fields['slideshow-border'];
    if ($slideshow_border) {
        $slideshow_border_color = $fields['slideshow-border-color'];
        $slideshow_border_style = 'border: 10px solid ' . hex2rgba($slideshow_border_color, 0.75);
    }
    $slideshow_animation = $fields['slideshow-animation'];
    $slideshow_animation_speed = $fields['slideshow-animation-speed'];
    $slideshow_speed = $fields['slideshow-speed'] * 1000;
    $slideshow_arrows = $fields['slideshow-arrows'];
    $slideshow_controls = $fields['slideshow-controls'];
    $slideshow_thumbnail_size = '';

    ?>

    <div class="flexslider" id="slideshow-<?php echo $id; ?>"
        data-id="<?php echo $id; ?>"
        data-slideshow="slider"
        data-animationspeed="<?php echo $slideshow_animation_speed; ?>"
        data-animation="<?php echo $slideshow_animation; ?>"
        data-speed="<?php echo $slideshow_speed; ?>"
        data-arrows="<?php echo $slideshow_arrows; ?>"
        data-controls="<?php echo $slideshow_controls; ?>"
        <?php if ($slideshow_thumbnail_size == 'thumbs') { echo 'data-thumbnailsize="' . $slideshow_thumbnail_size . '"'; }?>>

        <ul class="slides">
            <?php
        
            $slides_repeater_field = $fields['slideshow-slides'];
            if (is_array($slides_repeater_field)) {

                foreach ($slides_repeater_field as $slide) {
                    $show_slide = false;

                    // Check date
                    if (exists($slide['slideshow-date-start'])) {
                        $start_date = $slide['slideshow-date-start'];
                    } else {
                        $start_date = $date_today;
                    }

                    if (exists($slide['slideshow-date-stop'])) {
                        $stop_date = $slide['slideshow-date-stop'];
                    } else {
                        $stop_date = $date_today;
                    }

                    if ($date_today >= $start_date && $date_today <= $stop_date) {
                        $show_slide = true;
                    }

                    // Start showing slides
                    if ($show_slide === true) {
                        $slideshow_type = exists($slide['acf_fc_layout']) ? $slide['acf_fc_layout'] : '';
                        $slideshow_link = exists($slide['slideshow-link-type']) ? $slide['slideshow-link-type'] : '';

                        // Check slide-link
                        if ($slideshow_link === 'internal') {
                            // Maybe have to use get_field here
                            $internal = $slide['slideshow-link-internal'];
                            $url = get_permalink($internal->ID);
                            $target = '_self';
                        } elseif ($slideshow_link === 'external') {
                            $url = $slide['slideshow-link-external'];
                            $target = '_blank';
                        } elseif ($slideshow_link === 'file') {
                            // Maybe have to use get_field here
                            $file = $slide['slideshow-link-file'];
                            $url = $file['url'];
                            $target = '_blank';
                        }

                        // Check image
                        if ($slideshow_type === 'slideshow-image-text') {
                            $image_object = exists($slide['slideshow-image-object']) ? $slide['slideshow-image-object'] : '';
                            $image_url = '';
                            $image_alt = '';
                            $image_title = '';
                            if (exists($image_object['url'])) {
                                $image_url = $image_object['url'];
                                $image_sd_url = maybe_add_preview_to_url($image_url);
                            }
                            if (exists($image_object['alt'])) {
                                $image_alt = $image_object['alt'];
                            }
                            if (exists($image_object['title'])) {
                                $image_title = $image_object['title'];
                            }
                        }
                        ?>

                        <li class="<?php echo $slideshow_type; ?>">
                        <?php if ($slideshow_link !== 'none') : ?>
                            <a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
                        <?php endif; ?>

                            <img src="<?php echo $image_sd_url; ?>"
                                 srcset="<?php echo $image_sd_url; ?> 500w, <?php echo $image_url; ?> 1000w"
                                 alt="<?php echo $image_alt; ?>"
                                 title="<?php echo $image_title; ?>" />

                            <?php
                            if (exists($slide['slideshow-overlay-color'])) {
                                $overlay_background_color = 'background: transparent;';
                                $overlay_background = exists($slide['slideshow-overlay-color']) ? $slide['slideshow-overlay-color'] : '';
                                $overlay_opacity = exists($slide['slideshow-overlay-opacity']) ? $slide['slideshow-overlay-opacity'] : '';

                                // Set caption-color
                                if ($overlay_opacity != 100) {
                                    $opacity = $overlay_opacity * 0.01;
                                    $overlay_background_color = 'background: ' . hex2rgba($overlay_background, $opacity) . ';';
                                } else {
                                    $overlay_background_color = $overlay_background;
                                }

                                if ($overlay_background === '' || $overlay_background === 'transparent') {
                                    $overlay_background_color = 'background: transparent;';
                                }
                            }

                            if (exists($slide['slideshow-caption-content'])) {

                                // Register caption-fields
                                $caption_background_color = 'background: transparent;';
                                $caption_contents = exists($slide['slideshow-caption-content']) ? $slide['slideshow-caption-content'] : '';
                                $caption_background = exists($slide['slideshow-caption-color']) ? $slide['slideshow-caption-color'] : '';
                                $caption_opacity = exists($slide['slideshow-caption-opacity']) ? $slide['slideshow-caption-opacity'] : '';
                                $caption_animation = exists($slide['slideshow-caption-animation']) ? $slide['slideshow-caption-animation'] : '';
                                $caption_border = exists($slide['slideshow-caption-border']) ? $slide['slideshow-caption-border'] : '';
                                $caption_position = exists($slide['slideshow-caption-position']) ? $slide['slideshow-caption-position'] : '';

                                // Set caption-color
                                if ($caption_opacity != 100) {
                                    $opacity = $caption_opacity * 0.01;
                                    $caption_background_color = 'background: ' . hex2rgba($caption_background, $opacity) . ';';
                                } else {
                                    $caption_background_color = $caption_background;
                                }

                                if ($caption_background === '') {
                                    $caption_background_color = 'background: transparent;';
                                }

                                // Set caption-border
                                if ($caption_border === 'true') {
                                    $caption_border_color = 'border: 10px solid ' . hex2rgba($caption_background, 0.75) . ';';
                                } else {
                                    $caption_border_color = 'none';
                                }

                                // Set caption-style
                                if ($caption_background_color !== '' || $caption_border_color !== '') {
                                    $caption_style = $caption_background_color . $caption_border_color;
                                }

                                ?>
                                <div class="caption-wrapper" style="<?php if ($slideshow_border) echo $slideshow_border_style; ?>">
                                    <div class="caption" data-animation="<?php echo $caption_animation; ?>">
                                        <div class="vertical-align-wrapper" style="<?php echo $overlay_background_color; ?>">
                                            <div class="vertical-align <?php echo $caption_position; ?>">
                                                <div class="horizontal-align">
                                                    <div class="caption-contents" style="<?php echo $caption_style; ?>"><?php echo $caption_contents; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        if ($slideshow_link !== 'none') : ?>
                            </a>
                        <?php endif; ?>
                        </li>
                        <?php
                    }
                }
            }
            ?>
        </ul>
    </div>

    <?php

    if ($slideshow_controls === 'thumbs') : ?>

        <div class="flexslider thumbnails" id="carousel-<?php echo $id; ?>">
            <ul class="slides">
            <?php
            if (is_array($slides_repeater_field)) {

                foreach ($slides_repeater_field as $slide) {
                    $show_slide = false;

                    // Check date
                    if (exists($slide['slideshow-date-start'])) {
                        $start_date = $slide['slideshow-date-start'];
                    } else {
                        $start_date = $date_today;
                    }

                    if (exists($slide['slideshow-date-stop'])) {
                        $stop_date = $slide['slideshow-date-stop'];
                    } else {
                        $stop_date = $date_today;
                    }

                    if ($date_today >= $start_date && $date_today <= $stop_date) {
                        $show_slide = true;
                    }

                    // Start showing slides
                    if ($show_slide === true) {

                        if ($slideshow_type === 'slideshow-image-text') {
                            $image_object = exists($slide['slideshow-image-object']) ? $slide['slideshow-image-object'] : '';
                            $thumb_url = $image_object['sizes']['slideshow-sd'];
                        }
                        ?>

                        <li>
                            <img src="<?php echo $thumb_url; ?>" />
                        </li>
                    <?php
                    }
                }
            }
            ?>
            </ul>
        </div>

    <?php endif;
}
?>
