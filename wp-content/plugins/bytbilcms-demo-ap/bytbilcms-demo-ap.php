<?php
/*
Plugin Name: BytBil Demo Accesspaket
Description: Skapa/implementera accesspaket & skicka till kund (aktiveras endast på en demo-accesspakets site)
Author: Leo Starcevic : BytBil Nordic AB
Version: 1.0
Author URI: http://www.bytbil.com
*/

add_action('init', 'cptui_register_my_cpt_accesspaket');
function cptui_register_my_cpt_accesspaket()
{
    register_post_type('accesspaket', array(
        'label' => 'Accesspaket',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'handlare', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title'),
        'labels' => array(
            'name' => 'Accesspaket',
            'singular_name' => 'accesspaket',
            'menu_name' => 'Accesspaket',
            'add_new' => 'Lägg till accesspaket',
            'add_new_item' => 'Lägg till nytt accesspaket',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera accesspaket',
            'new_item' => 'Nytt accesspaket',
            'view' => 'Visa accesspaket',
            'view_item' => 'Visa accesspaket',
            'search_items' => 'Sök accesspaket',
            'not_found' => 'Inga accesspaket hittades',
            'not_found_in_trash' => 'Inga accesspaket hittades i papperskorgen',
            'parent' => 'Accesspaketsförälder',
        )
    ));
}

add_action('init', 'cptui_register_my_cpt_facebook_accesspaket');
function cptui_register_my_cpt_facebook_accesspaket()
{
    register_post_type('facebook-accesspaket', array(
        'label' => 'Accesspaket',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => true,
        'query_var' => true,
        'supports' => array('title'),
        'labels' => array(
            'name' => 'Facebook-Accesspaket',
            'singular_name' => 'Facebook-accesspaket',
            'menu_name' => 'Facebook-Accesspaket',
            'add_new' => 'Lägg till Facebook-accesspaket',
            'add_new_item' => 'Lägg till nytt Facebook-accesspaket',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera Facebook-accesspaket',
            'new_item' => 'Nytt Facebook-accesspaket',
            'view' => 'Visa Facebook-accesspaket',
            'view_item' => 'Visa Facebook-accesspaket',
            'search_items' => 'Sök Facebook-accesspaket',
            'not_found' => 'Inga Facebook-accesspaket hittades',
            'not_found_in_trash' => 'Inga Facebook-accesspaket hittades i papperskorgen',
            'parent' => 'Facebook-Accesspaketsförälder',
        )
    ));
}

$bootstrap_col_classes = array(
    "12" => "100%",
    "11" => "91,6%",
    "10" => "83,3%",
    "9" => "75%",
    "8" => "66.6%",
    "7" => "58.3%",
    "6" => "50%",
    "5" => "41,6%",
    "4" => "33.3%",
    "3" => "25%",
    "2" => "16.6%",
    "1" => "8.3%",
);
add_action('init', 'cptui_register_my_cpt_user_administration');
function cptui_register_my_cpt_user_administration()
{
    register_post_type('user-administration', array(
        'label' => 'Administrera utförare',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'user-administration', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels' => array(
            'name' => 'Administrera utförare',
            'singular_name' => '',
            'menu_name' => 'user-administration',
            'add_new' => 'Lägg till utförare',
            'add_new_item' => 'Lägg till ny utförare',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera utförare',
            'new_item' => 'Ny utförare',
            'view' => 'Visa utförare',
            'view_item' => 'Visa utförare',
            'search_items' => 'Sök utförare',
            'not_found' => 'Hittade inga utförare',
            'not_found_in_trash' => 'Inga utförare hittades i papperskorgen',
            'parent' => 'Parent user-administration',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_hemsidans-installningar',
        'title' => 'Accesspaketsinställningar',
        'fields' => array(
            array(
                'key' => 'field_5424b2013e0656',
                'label' => 'Inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5473239e9962fd',
                'name' => 'sitesetting-account-run-ap-admin',
                'type' => 'message',
                'message' => '<a class="iframe" href="http://access.bytbil.com/AdmTools/">Öppna admin</a>',
            ),
            array(
                'key' => 'field_5499579bcdea3',
                'label' => 'Alias',
                'name' => 'sitesetting-account-bbalias',
                'type' => 'text',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_549957a1c4dea4',
                'label' => 'Grupp-ID',
                'name' => 'sitesetting-account-groupid',
                'type' => 'text',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5473239456e9962fd',
                'name' => 'sitesetting-account-run-ap-criterias',
                'type' => 'message',
                'message' => '<a class="iframe" href="http://access.bytbil.com/petermdemogrupp/Access/Home/Sok">Öppna Kriteria-Generatorn</a>',
            ),
            array(
                'key' => 'field_542550657324635473c4b',
                'label' => 'Vyer / Urval',
                'name' => 'repeater-views',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        "key" => "field_i3u4t80347u6538045",
                        "label" => "Slug",
                        "name" => "view-slug",
                        "type" => "text",
                    ),
                    array(
                        'key' => 'field_549957a6cdea55',
                        'label' => 'Vy',
                        'name' => 'view',
                        'type' => 'select',
                        'choices' => array(
                            'Lista' => 'Lista',
                            'SokLista' => 'Lista med sökfunktion',
                            'Senaste' => 'Senaste',
                            'Sok' => 'Sökfunktion',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_5499575a1cde65',
                        'label' => 'Kriteriasträng',
                        'name' => 'criteria',
                        'type' => 'text',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '1',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till Vy / Urval',
            ),
            array(
                "key" => "field_32847529487523085",
                "name" => "sitesetting-account-deactivate",
                "type" => "true_false",
                "label" => "Inaktivera accesspaketet",
            ),
            array(
                'key' => 'field_5424b2013e5060',
                'label' => 'Utseende',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5424b53a105b9c',
                'label' => 'Redigera Typsnitt och text',
                'name' => 'sitesetting-edit-type',
                'type' => 'true_false',
                'instructions' => 'Vill du redigera typsnitten på din hemsida?',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_5424b45305b95d',
                'label' => 'Rubriker : Typsnitt',
                'name' => 'sitesetting-font-family-header',
                'type' => 'select',
                'instructions' => 'Välj ett typsnitt i listan som skall användas av rubriker på sidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b53a105b9c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'Open Sans' => 'Open Sans',
                    'Arial' => 'Arial',
                    'Helvetica' => 'Helvetica',
                    'Georgia' => 'Georgia',
                    'Arvo' => 'Arvo',
                    'Slabo' => 'Slabo',
                    'Lato' => 'Lato',
                    'Roboto' => 'Roboto',
                    'Kelly' => 'Kelly',
                    'Arbutus Slab' => 'Arbutus Slab',
                ),
                'default_value' => 'Open Sans',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_5424b693d05b9e',
                'label' => 'Rubriker : Storlek',
                'name' => 'sitesetting-font-size-header',
                'type' => 'number',
                'instructions' => 'Välj vilken storlek rubrikerna på din hemsida ska ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b53a105b9c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => 36,
                'placeholder' => 'Ex: 36 (pt)',
                'prepend' => '',
                'append' => 'pt',
                'min' => 1,
                'max' => 150,
                'step' => 1,
            ),
            array(
                'key' => 'field_5424b748053b29f',
                'label' => 'Rubriker : Färg',
                'name' => 'sitesetting-font-color-header',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg hemsidans rubriker skall ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b53a105b9c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#222222',
            ),
            array(
                'key' => 'field_54252b219d2652',
                'label' => 'Text : Typsnitt',
                'name' => 'sitesetting-font-family-paragraph',
                'type' => 'select',
                'instructions' => 'Välj ett typsnitt i listan som skall användas av brödtext på sidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b53a105b9c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'Open Sans' => 'Open Sans',
                    'Arial' => 'Arial',
                    'Helvetica' => 'Helvetica',
                    'Georgia' => 'Georgia',
                    'Arvo' => 'Arvo',
                    'Slabo' => 'Slabo',
                    'Lato' => 'Lato',
                    'Roboto' => 'Roboto',
                    'Kelly' => 'Kelly',
                    'Arbutus Slab' => 'Arbutus Slab',
                ),
                'default_value' => 'Open Sans',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_54252b9f9d2564',
                'label' => 'Text : Storlek',
                'name' => 'sitesetting-font-size-paragraph',
                'type' => 'number',
                'instructions' => 'Välj vilken storlek texten på din hemsida ska ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b53a105b9c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => 14,
                'placeholder' => 'Ex: 14 (pt)',
                'prepend' => '',
                'append' => 'pt',
                'min' => 1,
                'max' => 150,
                'step' => 1,
            ),
            array(
                'key' => 'field_54252bc69d255',
                'label' => 'Text : Färg',
                'name' => 'sitesetting-font-color-paragraph',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg hemsidans brödtext skall ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b53a105b9c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#111',
            ),
            array(
                'key' => 'field_5429388b66329c',
                'label' => 'Redigera Länkinställningar',
                'name' => 'sitesetting-edit-links',
                'type' => 'true_false',
                'instructions' => 'Här kan du redigera hur länkar visas på din hemsida?',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_5425485cbf634a',
                'label' => 'Länkfärg',
                'name' => 'sitesetting-link-color',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg en länk skall ha på sidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5429388b66329c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#2b58ae',
            ),
            array(
                'key' => 'field_5432937c12e815',
                'label' => 'Länkeffekt',
                'name' => 'sitesetting-link-effect',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill ha någon texteffekt på länken.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5429388b66329c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'underline' => 'Understruken',
                    'bold' => 'Fetstil',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_542548e37bf64b',
                'label' => 'Länkfärg : Hover',
                'name' => 'sitesetting-link-color-hover',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg en länk få när man har musen över.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5429388b66329c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#2f5db4',
            ),
            array(
                'key' => 'field_542938082e8616',
                'label' => 'Länkeffekt : Hover',
                'name' => 'sitesetting-link-effect-hover',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill ha någon texteffekt på länken.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5429388b66329c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'underline' => 'Understruken',
                    'bold' => 'Fetstil',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_6248388b66329a',
                'label' => 'Använd rundade hörn',
                'name' => 'sitesetting-border-radius',
                'type' => 'true_false',
                'instructions' => 'Välj om du vill att designen skall använda sig av rundade hörn',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_54252fd1c2b663',
                'label' => 'Rundning',
                'name' => 'sitesetting-border-radius-val',
                'type' => 'number',
                'instructions' => 'Välj hur många pixlar hörnen skall rundas med.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_6248388b66329a',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => 5,
                'placeholder' => 'Exempel: 5 px',
                'prepend' => '',
                'append' => 'px',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_5424b3a105a535',
                'label' => 'Redigera Accesspaket',
                'name' => 'sitesetting-edit-accesspackage',
                'type' => 'true_false',
                'instructions' => 'Vill du redigera ditt accesspaket?',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_54252deac2a281',
                'label' => 'Bakgrundsfärg - Knappar',
                'name' => 'sitesetting-account-button-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#333',
            ),
            array(
                'key' => 'field_1938567812',
                'label' => 'Bakgrundsfärg - Aktiva knappar',
                'name' => 'sitesetting-account-button-active-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#333',
            ),
            array(
                'key' => 'field_91352deac2a56756826',
                'label' => 'Kantfärg - Knappar',
                'name' => 'sitesetting-account-button-bordercolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#d0d0d0',
            ),
            array(
                'key' => 'field_54252deac2a716',
                'label' => 'Textfärg - Knappar',
                'name' => 'sitesetting-account-button-textcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#fff',
            ),
            array(
                'key' => 'field_54252deac2a959',
                'label' => 'Bakgrundsfärg - Pris',
                'name' => 'sitesetting-account-price-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#333',
            ),
            array(
                'key' => 'field_54252deac2c361',
                'label' => 'Textfärg - Pris',
                'name' => 'sitesetting-account-price-textcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#fff',
            ),
            array(
                'key' => 'field_54252deac2b621',
                'label' => 'Bakgrundsfärg - Block',
                'name' => 'sitesetting-account-block-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#fff',
            ),
            array(
                'key' => 'field_54252deac2a766',
                'label' => 'Textfärg - Block',
                'name' => 'sitesetting-account-block-textcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#333',
            ),
            array(
                'key' => 'field_54252deac2b224',
                'label' => 'Bakgrundsfärg - Blockhuvud',
                'name' => 'sitesetting-account-blockhead-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#f5f5f5',
            ),
            array(
                'key' => 'field_54252deac2a976',
                'label' => 'Textfärg - Blockhuvud',
                'name' => 'sitesetting-account-blockhead-textcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#333',
            ),
            array(
                'key' => 'field_54252deac2c771',
                'label' => 'Dölj',
                'name' => 'sitesetting-account-hide-read-button',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'checkbox',
                'choices' => array(
                    'readmore-button' => 'Läs mer - knapp',
                    'sort-button' => 'Sorteringsknappar',
                    'finance' => 'Finanssnurran',
                    'switchview' => 'Växla listvy',
                    'disabled-price' => 'Ursprungligt pris (om extrapris finns)'
                ),
                'default_value' => '',
            ),
            array(
                'key' => 'field_1923457deac2c88',
                'label' => 'Priser',
                'name' => 'sitesetting-account-prices',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'checkbox',
                'choices' => array(
                    'original-price' => 'Ursprungspris',
                    'original-price-no-vat' => 'Ursprungspris ex moms',
                    'extra-price' => 'Extrapris',
                    'extra-price-no-vat' => 'Extrapris ex moms',
                ),
                'default_value' => array(
                    'original-price',
                    'extra-price',
                ),
            ),
            array(
                'key' => 'field_92717deac2c771',
                'label' => 'Listvy - Extra fält',
                'name' => 'sitesetting-account-extra-fields',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'checkbox',
                'choices' => array(
                    'info-full-title' => 'Visa hela titeln',
                    'info-year' => 'Fordonsår',
                    'info-miles' => 'Mil',
                    'info-fuel' => 'Drivmedel',
                    'info-gearbox' => 'Växellåda',
                    'info-color' => 'Färg',
                    'info-body' => 'Fordonstyp',
                    'info-location' => 'Säljställe',
                    'info-customer' => 'Företagsnamn',
                    'info-beds' => 'Bäddar',
                    'info-length' => 'Längd',
                    'info-weight' => 'Vikt',
                ),
                'default_value' => '',
            ),
            array(
                'key' => 'field_84217deac3462c336',
                'label' => 'Sökmotor - Filtreringsfält',
                'name' => 'sitesetting-account-search-fields',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'checkbox',
                'choices' => array(
                    'field-condition' => 'Fordonsskick',
                    'field-type' => 'Fordonstyp',
                    'field-brand' => 'Märke',
                    'field-model' => 'Modell',
                    'field-body' => 'Karosseri',
                    'field-fuel' => 'Drivmedel',
                    'field-gearbox' => 'Växellåda',
                    'field-year' => 'År',
                    'field-miles' => 'Mil',
                    'field-price' => 'Pris',
                    'field-city' => 'Ort',
                    'field-color' => 'Färg',
                    'field-weight' => 'Maxvikt',
                    'field-length' => 'Längd',
                    'field-beds' => 'Bäddar',
                    'field-latest' => 'Inkommet',
                    'field-vat' => 'Avdragbar moms',
                    'field-photo' => 'Endast med bild',
                    'sorting' => 'Sortering',
                ),
                'default_value' => array(
                    'field-condition',
                    'field-type',
                    'field-brand',
                    'field-model',
                    'field-body',
                    'field-fuel',
                    'field-gearbox',
                    'field-year',
                    'field-miles',
                    'field-price',
                    'field-city',
                    'field-color',
                    'field-weight',
                    'field-length',
                    'field-beds',
                    'field-latest',
                    'field-vat',
                    'field-photo',
                    'sorting',
                ),
            ),

            array(
                'key' => 'field_82364914562a105b9c',
                'label' => 'Läs mer - Knapptext',
                'name' => 'sitesetting-account-readmore-text',
                'type' => 'text',
                'instructions' => '',
                'default_value' => 'Läs mer',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'allow_null' => 0,
            ),

            array(
                'key' => 'field_1927abe249182',
                'label' => 'Visningsläge vid start',
                'name' => 'sitesetting-account-initial-view',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'radio',
                'choices' => array(
                    'gallery' => 'Galleri',
                    'list' => 'Lista',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'gallery',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_54254be4a0af44',
                'label' => 'CSS-kod',
                'name' => 'sitesetting-accesspackage-custom-css',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'code_area',
                'instructions' => '',
                'language' => 'js',
            ),
            array(
                'key' => 'field_208357289346723',
                'label' => 'Javascript-kod',
                'name' => 'sitesetting-accesspackage-custom-js',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a535',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'code_area',
                'instructions' => '',
                'language' => 'js',
            ),
            array(
                "key" => "field_iu234089u234089",
                "label" => "Layout",
                "name" => "",
                "type" => "tab",
            ),
            array(
                'key' => 'field_5e1d8565-18b1-4e15-8ffa-27df11314f6e',
                'message' => 'Layout - Generellt',
                'type' => 'message'
            ),
            array(
                'key' => 'field_378027f4-7fac-4e33-9464-0b9e7b4f3d36',
                'name' => 'sitesetting-accesspackage-fixed-container',
                'label' => 'Fast containerbredd',
                'type' => 'true_false',
                'default_value' => 0
            ),
            array(
                'key' => 'field_701ff45f-6677-4577-a0d8-f15adb0c032c',
                'name' => 'sitesetting-accesspackage-fixed-container-width',
                'label' => 'Containerbredd',
                'append' => 'px',
                'type' => 'number',
                'default_value' => '960',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_378027f4-7fac-4e33-9464-0b9e7b4f3d36',
                            'operator' => '==',
                            'value' => 1
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_j32084j3347630846534",
                "type" => "message",
                "message" => 'Layout - Listvy',
            ),
            array(
                "key" => "field_iu23804572832fd232",
                "label" => "Objekt/rad - Desktop/Stor (min-width: 992px)",
                "name" => "sitesetting-accesspackage-cars-per-row-md",
                "type" => "select",
                "choices" => array(
                    "12" => "1",
                    "6" => "2",
                    "4" => "3",
                    "3" => "4",
                ),
                "default_value" => "3",
            ),
            array(
                "key" => "field_iu238045728392fd2",
                "label" => "Objekt/rad - Desktop/Liten (min-width: 768px)",
                "name" => "sitesetting-accesspackage-cars-per-row-sm",
                "type" => "select",
                "choices" => array(
                    "12" => "1",
                    "6" => "2",
                    "4" => "3",
                    "3" => "4",
                ),
                "default_value" => "3",
            ),
            array(
                "key" => "field_iu238045724563832fd2",
                "label" => "Objekt/rad - Tablet (min-width: 501px)",
                "name" => "sitesetting-accesspackage-cars-per-row-xs",
                "type" => "select",
                "choices" => array(
                    "12" => "1",
                    "6" => "2",
                    "4" => "3",
                    "3" => "4",
                ),
                "default_value" => "6",
            ),
            array(
                "key" => "field_iu23804575672832fd2",
                "label" => "Objekt/rad - Mobil (max-width: 500px)",
                "name" => "sitesetting-accesspackage-cars-per-row-xxs",
                "type" => "select",
                "choices" => array(
                    "12" => "1",
                    "6" => "2",
                    "4" => "3",
                    "3" => "4",
                ),
                "default_value" => "12",
            ),
            array(
                "key" => "field_j32084j330846534",
                "type" => "message",
                "message" => "Layout - Objektsidan",
            ),
            array(
                "key" => "field_203u5208346208345",
                "label" => "Kolumn: Vänster (1)",
                "name" => "sitesetting-accesspackage-column-1",
                "type" => "select",
                "choices" => $bootstrap_col_classes,
                "default_value" => "8",
            ),
            array(
                "key" => "field_203u5208343456208345",
                "label" => "Kolumn: Höger (2)",
                "name" => "sitesetting-accesspackage-column-2",
                "type" => "select",
                "choices" => $bootstrap_col_classes,
                "default_value" => "4",
            ),
            array(
                "key" => "field_203u3462043342ba45",
                "label" => "Bildspel",
                "name" => "sitesetting-accesspackage-object-slider",
                "type" => "select",
                "choices" => $bootstrap_col_classes,
                "default_value" => "12",
            ),
            array(
                "key" => "field_203a4658587834620u8345",
                "label" => "Finans",
                "name" => "sitesetting-accesspackage-object-finance",
                "type" => "select",
                "choices" => $bootstrap_col_classes,
                "default_value" => "12",
            ),
            array(
                "key" => "field_203a5878346208345",
                "label" => "Prisblocket",
                "name" => "sitesetting-accesspackage-object-price",
                "type" => "select",
                "choices" => $bootstrap_col_classes,
                "default_value" => "12",
            ),
            array(
                "key" => "field_203a58783457a46208345",
                "label" => "Kontaktformulär",
                "name" => "sitesetting-accesspackage-object-contactform",
                "type" => "select",
                "choices" => $bootstrap_col_classes,
                "default_value" => "12",
            ),
            array(
                "key" => "field_203a5878346345y208345",
                "label" => "Egenskaper",
                "name" => "sitesetting-accesspackage-object-properties",
                "type" => "select",
                "choices" => $bootstrap_col_classes,
                "default_value" => "12",
            ),
            array(
                "key" => "field_203a5878ac346208345",
                "label" => "Säljarinformation",
                "name" => "sitesetting-accesspackage-object-seller",
                "type" => "select",
                "choices" => $bootstrap_col_classes,
                "default_value" => "12",
            ),
            array(
                "key" => "field_203a5878346256408345",
                "label" => "Utrustning",
                "name" => "sitesetting-accesspackage-object-equipment",
                "type" => "select",
                "choices" => $bootstrap_col_classes,
                "default_value" => "12",
            ),
            array(
                "key" => "field_203a587cce8346208345",
                "label" => "Auktoriserad försäljare",
                "name" => "sitesetting-accesspackage-object-auctorized",
                "type" => "select",
                "choices" => $bootstrap_col_classes,
                "default_value" => "12",
            ),
            array(
                'key' => 'field_5424b2013e022',
                'label' => 'Kontakta kund',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_549957a6cde25',
                'label' => 'Utförare',
                'name' => 'email-from',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'user-administration',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_5499579bcdaa9',
                'label' => 'Skicka till (e-post)',
                'name' => 'email-to',
                'type' => 'text',
                'required' => 0,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),

            array(
                'key' => 'field_5499579bcda44',
                'label' => 'Meddelande',
                'name' => 'email-content',
                'type' => 'wysiwyg',
                'default_value' => 'Hej,
Ert accesspaket är nu klart och en demo finns på:
LÄNK

För att implementera accesspaketet i er webbsida så måste ni:
<ul>
<li>Lägga in kod (se bifogad bodykod.txt) i er befintliga <body> -kod, där ni vill att accesspaketet ska visas.</li>
</ul>',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_542937c12b877',
                'label' => 'Skicka vid uppdatering',
                'name' => 'send-email',
                'type' => 'checkbox',
                'instructions' => '',
                'choices' => array(
                    true => 'Ja',
                ),
                'default_value' => 0,
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_542937c12b5677',
                'label' => 'Har redan skickats?',
                'name' => 'already-sent',
                'type' => 'checkbox',
                'instructions' => '',
                'choices' => array(
                    true => 'Ja',
                ),
                'default_value' => 0,
                'layout' => 'horizontal',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'accesspaket',
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
/* Facebook Accesspaket */
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_facebook_accesspaket',
        'title' => 'Administration av utförare',
        'fields' => array(
            array(
                'key' => 'field_2803572a374123',
                'type' => 'tab',
                'label' => 'Inställningar'
            ),
            array(
                'key' => 'field_5473239e996a22fd',
                'name' => 'sitesetting-account-run-ap-admin-facebook',
                'type' => 'message',
                'message' => '<a class="iframe" href="http://access.bytbil.com/AdmTools/">Öppna admin</a>',
            ),
            array(
                'key' => 'field_5499579bcdea4a3',
                'label' => 'Alias',
                'name' => 'sitesetting-account-bbalias',
                'type' => 'text',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_209357837258aa235',
                'name' => 'sitesetting-account-run-ap-admin-facebook-id',
                'type' => 'message',
                'message' => '<a class="iframe" href="http://findmyfacebookid.com/">Hitta Facebook-ID</a>',
            ),
            array(
                'key' => 'field_230abb2350912a',
                'label' => 'Facebook ID',
                'name' => 'sitesetting-account-fb-id',
                'type' => 'text',
            ),
            array(
                'key' => 'field_5424a5b2013e022',
                'label' => 'Kontakta kund',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_549957a6cda7e25',
                'label' => 'Utförare',
                'name' => 'email-from',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'user-administration',
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_5499579bcaa23daa9',
                'label' => 'Skicka till (e-post)',
                'name' => 'email-to',
                'type' => 'text',
                'required' => 0,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),

            array(
                'key' => 'field_5499579bca562da44',
                'label' => 'Meddelande',
                'name' => 'email-content',
                'type' => 'wysiwyg',
                'default_value' => 'Hej,
Ert Facebook-Accesspaket är nu färdigt för användning!
Jag bifogar en PDF som visar hur ni lägger in appen på er Facebook-sida.',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_542937c12b82436577',
                'label' => 'Skicka vid uppdatering',
                'name' => 'send-email',
                'type' => 'checkbox',
                'instructions' => '',
                'choices' => array(
                    true => 'Ja',
                ),
                'default_value' => 0,
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_542937c12b2345677',
                'label' => 'Har redan skickats?',
                'name' => 'already-sent',
                'type' => 'checkbox',
                'instructions' => '',
                'choices' => array(
                    true => 'Ja',
                ),
                'default_value' => 0,
                'layout' => 'horizontal',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'facebook-accesspaket',
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

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_accesspaket-utforare-installningar',
        'title' => 'Administration av utförare',
        'fields' => array(
            array(
                'key' => 'field_542937345737c12b877',
                'label' => 'Email',
                'name' => 'accesspackage-bytbil-email',
                'type' => 'text',
            ),
            array(
                "key" => "field_230952730582753",
                "label" => "Signatur",
                "name" => "accesspackage-bytbil-signature",
                "type" => "textarea",
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'user-administration',
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

add_action("admin_menu", "createAdministrationPage");
function createAdministrationPage()
{
    //FB-Accesspaket
    add_submenu_page("edit.php?post_type=accesspaket", "Facebook-Accesspaket", "Facebook-Accesspaket", 0, "edit.php?post_type=facebook-accesspaket");
    /*add_submenu_page("edit.php?post_type=accesspaket", "Lägg till Facebook-Accesspaket", "Lägg till Facebook-Accesspaket", 0, "post-new.php?post_type=facebook-accesspaket");*/

    //Remove "lägg till accesspaket" submenu
    remove_submenu_page( "edit.php?post_type=accesspaket", "post-new.php?post_type=accesspaket" );
    add_submenu_page("edit.php?post_type=accesspaket", "Administrera utförare", "Administrera utförare", 0, "edit.php?post_type=user-administration");
}

add_action('admin_enqueue_scripts', 'ap_scripts', 0);

function ap_scripts()
{
    //wp_enqueue_script( 'sitesettings_scripts', '/wp-content/plugins/bytbilcms-sitesettings/bytbilcms-sitesettings.js', array(), '1.0.0', true);
    wp_enqueue_script('colorbox', '/wp-content/plugins/bytbilcms-sitesettings/jquery.colorbox.js', array(), '1.0.0', true);
    wp_enqueue_script('demo-ap', '/wp-content/plugins/bytbilcms-demo-ap/js/bytbilcms-demo-ap.js', array(), '1.0.0', true);
    wp_register_style('sitesettings_ap_style', '/wp-content/plugins/bytbilcms-sitesettings/sitesettings.css', false, '1.0.0');
    wp_enqueue_style('access_ap_style');

    wp_enqueue_style("sitesettings-admin-style", '/wp-content/plugins/bytbilcms-innehall/bytbil-content.css');
    wp_enqueue_style("bytbilcms-admin-style", '/wp-content/mu-plugins/bytbilcms-admin/css/bytbilcms_admin.css');
}

function createOrUpdateViews($post_id){

    $slugs = array();
    $repeater_views = get_field("repeater-views");

    if(count($repeater_views) > 1){

        $childs = get_posts(array(
            "post_parent" => $post_id,
            "post_type" => "accesspaket",
        ));
        $childs_meta = get_post_meta($post_id);

        foreach($repeater_views as $repeater_view) {
            $slugs[] = $repeater_view["view-slug"];
        }

        $existing = array_map(function($child) use ($slugs){
            if(in_array($child->post_title, $slugs)){
                return $child->post_title;
            }
        }, $childs);

        //Update child-post meta
        foreach($childs as $child){
            foreach($childs_meta as $key => $meta ){
                update_post_meta($child->ID, $key, $meta[0]);
            }
        }

        $create_arr = array_diff($slugs, $existing);

        foreach($create_arr as $create){
            $insert_post = array(
                "post_title" => $create,
                "post_name" => $create,
                "post_status" => "publish",
                "post_parent" => $post_id,
                "post_type" => "accesspaket",
            );
            $inserted_post = wp_insert_post($insert_post);
        }
    }
}


function sendAccesspackageToCustomer($post_id, $fb = false)
{
    $email_from_field = get_field('email-from');
    $email_from_id = $email_from_field->ID;
    $email_from_post = get_post($email_from_id);
    $full_name = $email_from_post->post_title;

    $email_user_meta = get_post_meta($email_from_id);
    $email_from = $email_user_meta["accesspackage-bytbil-email"][0];
    $email_content_footer = $email_user_meta["accesspackage-bytbil-signature"][0];

    $email_to = get_field('email-to');
    $email_to = explode(",", $email_to);
    $packageName = get_field('sitesetting-account-bbalias');
    $repeaterViews = get_field("repeater-views", $post_id);

    if (is_array($repeaterViews) && count($repeaterViews) > 1) {
        $posts = get_posts(array(
            "post_parent" => $post_id,
            "post_type" => "accesspaket",
            "post_status" => array("publish", "inherit")
        ));

        $links = array_map(function ($post) {
            return get_permalink($post->ID);
        }, $posts);

        $link = implode("<br />", $links);
    } else {
        $link = get_permalink($post_id);
    }

    $email_content = get_field("email-content");
    $email_content = str_replace("LÄNK", $link, $email_content);
    $email_content = str_replace("bodykod.txt", $packageName . "-bodykod.txt", $email_content);

    $email_content_footer = nl2br($email_content_footer);
    $email_content = $email_content . $email_content_footer;

    $local_body_file_name = WP_CONTENT_DIR . '/uploads/' . $packageName . '-bodykod.txt';
    $body_file_name = $packageName . '-bodykod.txt';

    $useFixedWidth = get_field("sitesetting-accesspackage-fixed-container", $post_id);
    $fixedWidth = get_field("sitesetting-accesspackage-fixed-container-width", $post_id);

    $body_code = "";
    foreach ($repeaterViews as $view) {
        if ($useFixedWidth) {
            $encWidth = base64_encode($fixedWidth);
            $body_code .= sprintf("<!-- " . $view["view-slug"] . " -->\r\n" . '<script data-packagename="%s" data-assortment="%s" data-actionname="%s" data-idname="%s" src="http://access.bytbil.com/%s/access/content/getcontent/1/accesspaket-autoloader.min.js" data-opt="%s"></script>' . "\r\n\r\n", $packageName, $view["criteria"], $view["view"], "objekt", $packageName, $encWidth);
        } else {
            $body_code .= sprintf("<!-- " . $view["view-slug"] . " -->\r\n" . '<script data-packagename="%s" data-assortment="%s" data-actionname="%s" data-idname="%s" src="http://access.bytbil.com/%s/access/content/getcontent/1/accesspaket-autoloader.min.js"></script>' . "\r\n\r\n", $packageName, $view["criteria"], $view["view"], "objekt", $packageName);
        }
    }

    file_put_contents($local_body_file_name, $body_code);

    $attachments = array($local_body_file_name);

    if($fb){
        $attachments = array(plugin_dir_path(__FILE__) . "facebook-accesspaket-guide.pdf");
    }
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/html; charset=UTF-8";
    $headers[] = "From: " . $full_name . " <" . $email_from . ">";
    $headers[] = "Cc: " . $full_name . " <" . $email_from . ">";

    wp_mail($email_to, 'Accesspaket / Bytbil', $email_content, $headers, $attachments);

}
