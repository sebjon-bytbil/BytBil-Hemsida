<?php
/*
Plugin Name: BytBil Sitesettings
Description: Ändra utseende och inställningar för mallsidor.
Author: Sebastian Jonsson : BytBil Nordic AB / John Eriksson : ProvideIT
Version: 2.0.1
Author URI: http://www.bytbil.com
*/

include 'bytbilcms-dashboard.php';

function getSiteSettings($id = null)
{
    $settings = null;
    $id = get_option("selected-settings-page");
    if (!!$id) {
        $settings = get_post($id);
    } else {
        $posts = get_posts(array(
            'post_type' => 'sitesettings',
            'posts_per_page' => 1,
        ));

        if (!empty($posts[0])) {
            $settings = $posts[0];
        }
    }

    return $settings;
}

function renderSettings($id = null)
{
    $settings = getSiteSettings($id);

    if ($settings) {
        $sid = $settings->ID;
        include __DIR__ . "/bbcms-styles.php";
    }
}

function renderSettingsFooter($id = null)
{
    $settings = getSiteSettings($id);

    if ($settings) {
        $sid = $settings->ID;
        include __DIR__ . "/bbcms-scripts.php";
    }
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

add_action('wp_head', 'renderSettings', PHP_INT_MAX - 1);
add_action('wp_footer', 'renderSettingsFooter', PHP_INT_MAX - 1);

add_action("admin_menu", "setup_admin_page");
function setup_admin_page()
{
    add_submenu_page("edit.php?post_type=sitesettings", "Aktiv Hemsideinställning", "Aktiv Hemsideinställning", "manage_options", "sitesettings-picker", "init_admin_page");
}

function init_admin_page()
{
    require 'admin_page.php';
}

function admin_styles()
{
    wp_enqueue_style("sitesettings-admin-style", plugins_url("/bytbilcms-sitesettings/css/admin.css"));
}

add_action("admin_enqueue_scripts", "admin_styles", PHP_INT_MAX - 100);


add_action('init', 'cptui_register_my_cpt_sitesettings');
function cptui_register_my_cpt_sitesettings()
{
    register_post_type('sitesettings', array(
        'label' => 'Sidinställningar',
        'description' => 'Denna innehållstyp styr de generalla inställningarna för denna webbplats.',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'sitesettings', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions'),
        'labels' => array(
            'name' => 'Sidinställningar',
            'singular_name' => 'Sidinställning',
            'menu_name' => 'Hemsideinställningar',
            'add_new' => 'Lägg till inställning',
            'add_new_item' => 'Ny inställning',
            'edit' => 'Redigera hemsida',
            'edit_item' => 'Redigera hemsida',
            'new_item' => 'Ny inställning',
            'view' => 'Visa inställningar',
            'view_item' => 'Visa inställning',
            'search_items' => 'Sök inställningar',
            'not_found' => 'Inga inställningar hittade',
            'not_found_in_trash' => 'Inga inställningar i papperskorgen',
            'parent' => 'Inställningens förälder.',
        )
    ));
}


if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_hemsidans-installningar',
        'title' => 'Hemsidans inställningar',
        'fields' => array(
            array(
                'key' => 'field_5424b2013e060',
                'label' => 'Utseende',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_54252ce8c2b5a',
                'label' => 'Redigera bakgrund',
                'name' => 'sitesettings-edit-background',
                'type' => 'radio',
                'instructions' => 'Välj om du vill använda en bild, färg eller toning som bakgrund.',
                'choices' => array(
                    'color' => 'Färg',
                    'image' => 'Bild',
                    'gradient' => 'Toning',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_54252deac2b5c',
                'label' => 'Bakgrundsfärg',
                'name' => 'sitesetting-background-color',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg skall hemsidan ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252ce8c2b5a',
                            'operator' => '==',
                            'value' => 'color',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#f0f0f0',
            ),
            array(
                'key' => 'field_54254a0545019',
                'label' => 'Startfärg',
                'name' => 'sitesetting-background-gradient-start',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg toningen skall börja med.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252ce8c2b5a',
                            'operator' => '==',
                            'value' => 'gradient',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ddd;',
            ),
            array(
                'key' => 'field_54254a2b4501a',
                'label' => 'Slutfärg',
                'name' => 'sitesetting-background-gradient-end',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg toningen skall börja med.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252ce8c2b5a',
                            'operator' => '==',
                            'value' => 'gradient',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#fff',
            ),
            array(
                'key' => 'field_54254a4c4501b',
                'label' => 'Längd',
                'name' => 'sitesetting-background-gradient-length',
                'type' => 'text',
                'instructions' => 'Fyll i hur lång toningen skall vara i pixlar eller procent.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252ce8c2b5a',
                            'operator' => '==',
                            'value' => 'gradient',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '150px',
                'placeholder' => 'Exempel: 150px eller 10%.',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5424b34805b9b',
                'label' => 'Bakgrundsbild',
                'name' => 'sitesetting-background-image',
                'type' => 'image',
                'instructions' => 'Välj eller ladda upp en bakgrundsbild som skall visas på hemsidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252ce8c2b5a',
                            'operator' => '==',
                            'value' => 'image',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_asd542asd98725b9c',
                'label' => 'Wrapperbredd',
                'name' => 'sitesettings-wrapper-width',
                'type' => 'number',
                'message' => '',
                'default_value' => 1170,
                'append' => "px"
            ),
            array(
                'key' => 'field_5424b3a105b9c',
                'label' => 'Redigera Typsnitt och text',
                'name' => 'sitesetting-edit-type',
                'type' => 'true_false',
                'instructions' => 'Vill du redigera typsnitten på din hemsida?',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_5424b45305b9d',
                'label' => 'Rubriker : Typsnitt',
                'name' => 'sitesetting-font-family-header',
                'type' => 'select',
                'instructions' => 'Välj ett typsnitt i listan som skall användas av rubriker på sidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105b9c',
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
                    'Slabo 27px' => 'Slabo',
                    'Lato' => 'Lato',
                    'Roboto' => 'Roboto',
                    'Kelly Slab' => 'Kelly',
                    'Arbutus Slab' => 'Arbutus Slab',
                    "annat" => "Annat",
                ),
                'default_value' => 'Open Sans',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_5424b69d05b9e',
                'label' => 'Rubriker : Storlek',
                'name' => 'sitesetting-font-size-header',
                'type' => 'number',
                'instructions' => 'Välj vilken storlek rubrikerna på din hemsida ska ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105b9c',
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
                'key' => 'field_5424b74805b9f',
                'label' => 'Rubriker : Färg',
                'name' => 'sitesetting-font-color-header',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg hemsidans rubriker skall ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105b9c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#222222',
            ),
            array(
                'key' => 'field_54fontasdasdc2b60',
                'label' => '@import-länk',
                'name' => 'sitesetting-font-other-import',
                'type' => 'text',
                'instructions' => 'Klistra in @import länken här',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            "field" => "field_5424b45305b9d",
                            "operator" => "==",
                            "value" => "annat"
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'placeholder' => '@import url(...);',
            ),
            array(
                "key" => "field_09asdhiq890hasdf87fwu3",
                "label" => "Fontnamn",
                "name" => "sitesetting-font-other-name",
                "instructions" => "Namnet som skrivs in i CSSen",
                "placeholder" => "'Open Sans', sans-serif",
                "type" => "text",
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            "field" => "field_5424b45305b9d",
                            "operator" => "==",
                            "value" => "annat"
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_09uasdojn3r9y23b45g98",
                "label" => "Vart gäller denna font?",
                "name" => "sitesetting-font-other-locations",
                "instructions" => "På vilka delar av siten skall custom-fonten gälla?",
                "type" => "checkbox",
                "choices" => array(
                    "headers" => "Rubriker",
                    "paragraphs" => "Brödtext",
                    "menuTopLevel" => "Toppnivå menyer",
                    "menuSubMenu" => "Undernivå menyer",
                    "menuSidebar" => "Sidomeny"
                ),
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            "field" => "field_5424b45305b9d",
                            "operator" => "==",
                            "value" => "annat"
                        ),
                    ),
                    'allorany' => 'all',
                ),
                "layout" => "horizontal",
                "default_value" => "headers"
            ),
            array(
                'key' => 'field_54252b219d252',
                'label' => 'Text : Typsnitt',
                'name' => 'sitesetting-font-family-paragraph',
                'type' => 'select',
                'instructions' => 'Välj ett typsnitt i listan som skall användas av brödtext på sidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105b9c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            "field" => "field_09uasdojn3r9y23b45g98",
                            "operator" => "!=",
                            "value" => "paragraphs"
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
                    'Slabo 13px' => 'Slabo',
                    'Lato' => 'Lato',
                    'Roboto' => 'Roboto',
                    'Kelly Slab' => 'Kelly',
                    'Arbutus Slab' => 'Arbutus Slab',
                ),
                'default_value' => 'Open Sans',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_54252b9f9d254',
                'label' => 'Text : Storlek',
                'name' => 'sitesetting-font-size-paragraph',
                'type' => 'number',
                'instructions' => 'Välj vilken storlek texten på din hemsida ska ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105b9c',
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
                            'field' => 'field_5424b3a105b9c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#111',
            ),
            array(
                'key' => 'field_5429388b6629c',
                'label' => 'Redigera Länkinställningar',
                'name' => 'sitesetting-edit-links',
                'type' => 'true_false',
                'instructions' => 'Här kan du redigera hur länkar visas på din hemsida?',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_5425485cbf64a',
                'label' => 'Länkfärg',
                'name' => 'sitesetting-link-color',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg en länk skall ha på sidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5429388b6629c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#2b58ae',
            ),
            array(
                'key' => 'field_542937c12e815',
                'label' => 'Länkeffekt',
                'name' => 'sitesetting-link-effect',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill ha någon texteffekt på länken.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5429388b6629c',
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
                'key' => 'field_542548e7bf64b',
                'label' => 'Länkfärg : Hover',
                'name' => 'sitesetting-link-color-hover',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg en länk få när man har musen över.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5429388b6629c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#2f5db4',
            ),
            array(
                'key' => 'field_542938082e816',
                'label' => 'Länkeffekt : Hover',
                'name' => 'sitesetting-link-effect-hover',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill ha någon texteffekt på länken.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5429388b6629c',
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
                'key' => 'field_542565442a730',
                'label' => 'Redigera sidyta',
                'name' => 'sitesetting-wrapper-edit',
                'type' => 'checkbox',
                'instructions' => 'Gör inställningar för ytan som visar innehåll på sidan.',
                'choices' => array(
                    'background' => 'Bakgrundsfärg',
                    'shadow' => 'Skugga',
                    'border' => 'Kantlinje',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_542566042a732',
                'label' => 'Bakgrundsfärg',
                'name' => 'sitesetting-wrapper-bgcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj en bakgrundsfärg som skall visas på ytan där innehåll skrivs ut.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_542565442a730',
                            'operator' => '==',
                            'value' => 'background',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_982465827a732',
                'label' => 'Genomskinlighet',
                'name' => 'sitesetting-wrapper-opacity',
                'type' => 'number',
                'instructions' => 'Genomskinlighet på sidytans bakgrundsfärg',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_542565442a730',
                            'operator' => '==',
                            'value' => 'background',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '0',
                'append' => '%',
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ),
            array(
                'key' => 'field_542566292a733',
                'label' => 'Skugga',
                'name' => 'sitesetting-wrapper-shadow',
                'type' => 'text',
                'instructions' => 'Fyll i CSS-kod för sidytans skugga.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_542565442a730',
                            'operator' => '==',
                            'value' => 'shadow',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: 0px 1px 2px #333 eller 0px 2px 3px 0px rgba(0,0,0.8) inset.',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_542566d32a734',
                'label' => 'Kantlinje',
                'name' => 'sitesetting-wrapper-border',
                'type' => 'text',
                'instructions' => 'Fyll i CSS-kod för sidytans kantlinje.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_542565442a730',
                            'operator' => '==',
                            'value' => 'border',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: 1px solid #ddd eller 2px dotted rgba(0,0,0,0.5).',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6248388b6629a',
                'label' => 'Använd rundade hörn',
                'name' => 'sitesetting-border-radius',
                'type' => 'true_false',
                'instructions' => 'Välj om du vill att designen skall använda sig av rundade hörn',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_54252fd1c2b63',
                'label' => 'Rundning',
                'name' => 'sitesetting-border-radius-val',
                'type' => 'number',
                'instructions' => 'Välj hur många pixlar hörnen skall rundas med.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_6248388b6629a',
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
                'key' => 'field_5424b3a105a55',
                'label' => 'Redigera Accesspaket',
                'name' => 'sitesetting-edit-accesspackage',
                'type' => 'true_false',
                'instructions' => 'Vill du redigera ditt accesspaket?',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_54252deac2a81',
                'label' => 'Bakgrundsfärg - Knappar',
                'name' => 'sitesetting-account-button-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_42272deac2a81',
                'label' => 'Bakgrundsfärg - Aktiva knappar',
                'name' => 'sitesetting-account-button-active-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_91352deac2a826',
                'label' => 'Kantfärg - Knappar',
                'name' => 'sitesetting-account-button-bordercolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_54252deac2a76',
                'label' => 'Textfärg - Knappar',
                'name' => 'sitesetting-account-button-textcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_54252deac2a99',
                'label' => 'Bakgrundsfärg - Pris',
                'name' => 'sitesetting-account-price-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#C00',
            ),
            array(
                'key' => 'field_54252deac2c31',
                'label' => 'Textfärg - Pris',
                'name' => 'sitesetting-account-price-textcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_54252deac2a9934',
                'label' => 'Bakgrundsfärg - Extrapris',
                'name' => 'sitesetting-account-extraprice-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'color_picker',
                'default_value' => '#C00',
            ),
            array(
                'key' => 'field_54252deac2c32341',
                'label' => 'Textfärg - Extrapris',
                'name' => 'sitesetting-account-extraprice-textcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_54252deac2b61',
                'label' => 'Bakgrundsfärg - Block',
                'name' => 'sitesetting-account-block-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_54252deac2a66',
                'label' => 'Textfärg - Block',
                'name' => 'sitesetting-account-block-textcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_54252deac2b22',
                'label' => 'Bakgrundsfärg - Blockhuvud',
                'name' => 'sitesetting-account-blockhead-bgcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_54252deac2a96',
                'label' => 'Textfärg - Blockhuvud',
                'name' => 'sitesetting-account-blockhead-textcolor',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_54252deac2c77',
                'label' => 'Dölj',
                'name' => 'sitesetting-account-hide-read-button',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_194837deac2c88',
                'label' => 'Priser',
                'name' => 'sitesetting-account-prices',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_92142deac2c812',
                'label' => 'Listvy - Extra fält',
                'name' => 'sitesetting-account-extra-fields',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_84217deac2c336',
                'label' => 'Sökmotor - Filtreringsfält',
                'name' => 'sitesetting-account-search-fields',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_82364912a105b9c',
                'label' => 'Läs mer - Knapptext',
                'name' => 'sitesetting-account-readmore-text',
                'type' => 'text',
                'instructions' => '',
                'default_value' => 'Läs mer',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'allow_null' => 0,
            ),
            array(
                'key' => 'field_2816abe228482',
                'label' => 'Visningsläge vid start',
                'name' => 'sitesetting-account-initial-view',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_54254be4a0af4',
                'label' => 'CSS-kod',
                'name' => 'sitesetting-accesspackage-custom-css',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'type' => 'code_area',
                'instructions' => '',
                'language' => 'js',
                'theme' => "solarized"
            ),
            array(
                'key' => 'field_2083572893467234563',
                'label' => 'Javascript-kod',
                'name' => 'sitesetting-accesspackage-custom-js',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b3a105a55',
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
                'key' => 'field_5424b2293e061',
                'label' => 'Menyer',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_54252dccc2b5b',
                'label' => 'Redigera menyer',
                'name' => 'sitesetting-edit-menus',
                'type' => 'true_false',
                'instructions' => 'Vill du redigera hur menyn visas?',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_54294282ae41e',
                'label' => 'Huvudmeny',
                'name' => '',
                'type' => 'message',
                'instructions' => 'Vill du redigera hur menyn visas?',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'message' => '',
            ),
            array(
                'key' => 'field_54252eb4c2b5f',
                'label' => 'Typsnitt',
                'name' => 'sitesetting-menus-font-family',
                'type' => 'select',
                'instructions' => 'Välj ett typsnitt i listan som skall användas av brödtext på sidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            "field" => "field_09uasdojn3r9y23b45g98",
                            "operator" => "!=",
                            "value" => "menuTopLevel",
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
                    'Slabo 13px' => 'Slabo',
                    'Lato' => 'Lato',
                    'Roboto' => 'Roboto',
                    'Kelly Slab' => 'Kelly',
                    'Arbutus Slab' => 'Arbutus Slab',
                ),
                'default_value' => 'Open Sans',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_54252ebfc2b60',
                'label' => 'Textstorlek',
                'name' => 'sitesetting-menus-font-size',
                'type' => 'number',
                'instructions' => 'Välj vilken typsnittsstorlek som skall användas i huvudmenyn.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
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
                'key' => 'field_54252e60c2b5d',
                'label' => 'Menyfärg',
                'name' => 'sitesetting-menus-background',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg det skall vara på menyn.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#333333',
            ),
            array(
                'key' => 'field_54252ef6c2b61',
                'label' => 'Effekter',
                'name' => 'sitesetting-menu-settings',
                'type' => 'checkbox',
                'instructions' => 'Redigera i inställningar för menyn.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'shadow' => 'Skugga',
                    'border' => 'Kantlinje',
                    'caps' => 'Stora bokstäver',
                    'hover' => 'Undermeny vid hover',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_542940611ce00',
                'label' => 'Kantlinje',
                'name' => 'sitesetting-menu-border',
                'type' => 'text',
                'instructions' => 'Fyll i CSS-kod för menynskantlinje.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252ef6c2b61',
                            'operator' => '==',
                            'value' => 'border',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: 1px solid #ddd.',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_542940201cdff',
                'label' => 'Skugga ',
                'name' => 'sitesetting-menu-shadow',
                'type' => 'text',
                'instructions' => 'Fyll i CSS-kod för menyns skugga.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252ef6c2b61',
                            'operator' => '==',
                            'value' => 'shadow',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: 0px 1px 2px #333',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_54253036c2b64',
                'label' => 'Länkfärg',
                'name' => 'sitesetting-menus-link-color',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg länken skall ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_542530f5c2b68',
                'label' => 'Bakgrundsfärg',
                'name' => 'sitesetting-menus-link-bgcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg länken skall ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_54294e0639e6c',
                'label' => 'Länkeffekt',
                'name' => 'sitesetting-menus-link-effects',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill ha någon texteffekt på länken.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
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
                'key' => 'field_54253082c2b65',
                'label' => 'Länkfärg : Hover',
                'name' => 'sitesetting-menus-link-color-hover',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg länken skall ha när man håller musen över.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_5425310ac2b69',
                'label' => 'Bakgrundsfärg : Hover',
                'name' => 'sitesetting-menus-link-bgcolor-hover',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg länken skall ha när man håller musen över.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_54294e2f39e6d',
                'label' => 'Länkeffekt : Hover',
                'name' => 'sitesetting-menus-link-effects-hover',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill ha någon texteffekt på länken när du har musen över den.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
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
                'key' => 'field_54294cdf5f758',
                'label' => 'Undermeny',
                'name' => '',
                'type' => 'message',
                'instructions' => 'Vill du redigera hur menyn visas?',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'message' => '',
            ),
            array(
                'key' => 'field_54295095a0c61',
                'label' => 'Typsnitt',
                'name' => 'sitesetting-submenu-font-family',
                'type' => 'select',
                'instructions' => 'Välj ett typsnitt i listan som skall användas av brödtext på sidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            "field" => "field_09uasdojn3r9y23b45g98",
                            "operator" => "!=",
                            "value" => "menuSubMenu",
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
                    'Slabo 13px' => 'Slabo',
                    'Lato' => 'Lato',
                    'Roboto' => 'Roboto',
                    'Kelly Slab' => 'Kelly',
                    'Arbutus Slab' => 'Arbutus Slab',
                ),
                'default_value' => 'Open Sans',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_54295098a0c62',
                'label' => 'Textstorlek',
                'name' => 'sitesetting-submenu-font-size',
                'type' => 'number',
                'instructions' => 'Välj vilken typsnittsstorlek som skall användas i huvudmenyn.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
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
                'key' => 'field_542531b6c2b6d',
                'label' => 'Menyfärg',
                'name' => 'sitesetting-submenus-background',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg undermenyn skall ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#111111',
            ),
            array(
                'key' => 'field_54253207c2b6f',
                'label' => 'Länkfärg',
                'name' => 'sitesetting-submenu-link-color',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken textfärg länken i en undermeny skall ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_54254812bf649',
                'label' => 'Bakgrundsfärg',
                'name' => 'sitesetting-submenu-link-bgcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg länken skall ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => 'transparent',
            ),
            array(
                'key' => 'field_5429517cdd24a',
                'label' => 'Länkeffekt',
                'name' => 'sitesetting-submenu-link-effect',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill ha någon texteffekt på länken.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'underline' => 'Understruken',
                    'bold' => 'Fetstil',
                    'ucase' => "Stora bokstäver"
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_54253229c2b71',
                'label' => 'Länkfärg : Hover',
                'name' => 'sitesetting-submenu-link-color-hover',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken textfärg länken i en undermeny skall ha när man för musen över.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_542547a9bf646',
                'label' => 'Bakgrundsfärg : Hover',
                'name' => 'sitesetting-submenu-link-bgcolor-hover',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg länken skall ha när man håller musen över',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#111111',
            ),
            array(
                'key' => 'field_54295190dd24b',
                'label' => 'Länkeffekt : Hover',
                'name' => 'sitesetting-submenu-link-effect-hover',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill ha någon texteffekt på länken.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54252dccc2b5b',
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

            /* START SIDEBAR */

            array(
                'key' => 'field_54234552dccc2b5b',
                'label' => 'Redigera sidomeny',
                'name' => 'sitesetting-edit-sidebar-menus',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),

            array(
                'key' => 'field_54sdfsddddfdae41e',
                'label' => 'Sidomeny',
                'name' => '',
                'type' => 'message',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'message' => '',
            ),
            array(
                'key' => 'field_5123sdf234c2b5f',
                'label' => 'Typsnitt',
                'name' => 'sitesetting-sidebarmenus-font-family',
                'type' => 'select',
                'instructions' => 'Välj ett typsnitt i listan som skall användas av brödtext på sidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            "field" => "field_09uasdojn3r9y23b45g98",
                            "operator" => "!=",
                            "value" => "menuSidebar",
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
                    'Slabo 13px' => 'Slabo',
                    'Lato' => 'Lato',
                    'Roboto' => 'Roboto',
                    'Kelly Slab' => 'Kelly',
                    'Arbutus Slab' => 'Arbutus Slab',
                ),
                'default_value' => 'Open Sans',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_54252easdfdgfghbfc2b60',
                'label' => 'Textstorlek',
                'name' => 'sitesetting-sidebarmenus-font-size',
                'type' => 'number',
                'instructions' => 'Välj vilken typsnittsstorlek som skall användas i huvudmenyn.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
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
                'key' => 'field_asdafasf3246c2b61',
                'label' => 'Effekter',
                'name' => 'sitesetting-sidebarmenu-settings',
                'type' => 'checkbox',
                'instructions' => 'Redigera i inställningar för menyn.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'caps' => 'Stora bokstäver'
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_54294edfjhdfjhgd6c',
                'label' => 'Länkeffekt',
                'name' => 'sitesetting-sidebarmenus-link-effects',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill ha någon texteffekt på länken.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
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
                'key' => 'field_5429asd3f39e6d',
                'label' => 'Länkeffekt : Hover',
                'name' => 'sitesetting-sidebarmenus-link-effects-hover',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill ha någon texteffekt på länken när du har musen över den.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
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
                "key" => "field_ranbogmord123",
                "label" => "Ändra färger",
                "name" => "sitesetting-sidebarmenus-change-colors",
                "type" => "true_false",
                'default_value' => 0,
                "instructions" => "Med denna ifylld kan du ändra färgerna för menyn, annars ärver den från huvudmenyn",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_54252e60c2blkjdf5d',
                'label' => 'Menyfärg',
                'name' => 'sitesetting-sidebarmenus-background',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg det skall vara på menyn.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'field_ranbogmord123',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#333333',
            ),
            array(
                'key' => 'field_5425dfgsdfc2b64',
                'label' => 'Länkfärg',
                'name' => 'sitesetting-sidebarmenus-link-color',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg länken skall ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'field_ranbogmord123',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_542asddfsdf5c2b68',
                'label' => 'Bakgrundsfärg',
                'name' => 'sitesetting-sidebarmenus-link-bgcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg länken skall ha.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'field_ranbogmord123',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_542sdfsde2c2b65',
                'label' => 'Länkfärg : Hover',
                'name' => 'sitesetting-sidebarmenus-link-color-hover',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg länken skall ha när man håller musen över.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'field_ranbogmord123',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_542fghsdac2b69',
                'label' => 'Bakgrundsfärg : Hover',
                'name' => 'sitesetting-sidebarmenus-link-bgcolor-hover',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg länken skall ha när man håller musen över.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54234552dccc2b5b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'field_ranbogmord123',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '#ffffff',
            ),

            /* END SIDEBAR */

            array(
                'key' => 'field_54254f8673c49',
                'label' => 'Sidhuvud',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5424b2e505b9a',
                'label' => 'Logotyp',
                'name' => 'sitesetting-logotype',
                'type' => 'image',
                'instructions' => 'Ladda upp en bild på er logotyp som skall visas på hemsidan.',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_54123dsfsda7985c',
                'label' => 'Kolumnbredd för logotype',
                'name' => 'sitesetting-header-columns',
                'type' => 'select',
                'column_width' => '',
                'choices' => array(
                    3 => '25%',
                    4 => '33%',
                    6 => '50%',
                    8 => '66%',
                    12 => '100%'
                ),
                'default_value' => 6,
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                "key" => "field_908ha08h2ifnv082vb028gbv9024ubv97gb24v",
                "label" => "Favicon",
                "name" => "sitesettings-header-favicon",
                "type" => "image",
                "save_format" => "url",
            ),
            array(
                'key' => 'field_54255ff73579a',
                'label' => 'Bakgrundsfärg',
                'name' => 'sitesetting-header-bgcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg du vill ha på sidhuvudet.',
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_1245729376a732',
                'label' => 'Genomskinlighet på sidhuvudets bakgrundsfärg',
                'name' => 'sitesetting-header-opacity',
                'type' => 'number',
                'instructions' => 'Genomskinlighet',
                'default_value' => '0',
                'append' => '%',
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ),
            array(
                'key' => 'field_54254b56a0bf3',
                'label' => 'Egen kod',
                'name' => 'sitesetting-custom-code',
                'type' => 'checkbox',
                'instructions' => 'Välj om du vill infoga egen kod i sidhuvudet på hemsidan.',
                'choices' => array(
                    'css' => 'CSS',
                    'javascript' => 'Javascript',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_54254be4a0bf4',
                'label' => 'CSS-kod',
                'name' => 'sitesetting-custom-code-css',
                'type' => 'code_area',
                'instructions' => 'Fyll i den CSS du vill skall läsas in i sidhuvudet på hemsidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54254b56a0bf3',
                            'operator' => '==',
                            'value' => 'css',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'language' => 'css',
                'theme' => "solarized",
            ),
            array(
                'key' => 'field_54254c3cbbe8f',
                'label' => 'Javascript-kod',
                'name' => 'sitesetting-custom-code-js',
                'type' => 'code_area',
                'instructions' => 'Fyll i den Javascript du vill skall läsas in i sidhuvudet på hemsidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_54254b56a0bf3',
                            'operator' => '==',
                            'value' => 'javascript',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'language' => 'javascript',
                'theme' => "solarized",
            ),
            array(
                'key' => 'field_5425501e73c4a',
                'label' => 'Märken',
                'name' => 'sitesetting-brands',
                'type' => 'relationship',
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
                'key' => 'field_5425506573c4b',
                'label' => 'Snabblänkar',
                'name' => 'sitesetting-header-shortlinks',
                'type' => 'repeater',
                'instructions' => 'Lägg till snabblänkar som visas i sidhuvudet',
                'sub_fields' => array(
                    array(
                        'key' => 'field_54255e497985f',
                        'label' => 'Länktext',
                        'name' => 'sitesetting-header-shortlink-text',
                        'type' => 'text',
                        'instructions' => 'Ange en text som skall stå i länken',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => 'Exempel: Läs mer eller Kontakta oss',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_54255dca7985c',
                        'label' => 'Länktyp',
                        'name' => 'sitesetting-header-shortlink-type',
                        'type' => 'select',
                        'instructions' => 'Välj vilken typ av länk.',
                        'column_width' => '',
                        'choices' => array(
                            'internal' => 'Lokal sida',
                            'external' => 'Extern url',
                            'phone' => 'Telefonnummer',
                            'email' => 'E-postaddress',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54255f009f062',
                        'label' => 'Lokal sida',
                        'name' => 'sitesetting-header-shortlink-page',
                        'type' => 'page_link',
                        'instructions' => 'Välj vilken sida länken skall gå till.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54255dca7985c',
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
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54255f229f063',
                        'label' => 'Extern URL',
                        'name' => 'sitesetting-header-shortlink-url',
                        'type' => 'text',
                        'instructions' => 'Ange addressen länken skall gå till.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54255dca7985c',
                                    'operator' => '==',
                                    'value' => 'external',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => 'Exempel: http://www.mercedes-benz.se',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_54255e107985d',
                        'label' => 'Länkbeteende',
                        'name' => 'sitesetting-header-shortlink-target',
                        'type' => 'select',
                        'instructions' => 'Välj hur du vill att länken skall öppnas.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54255dca7985c',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                                array(
                                    'field' => 'field_54255dca7985c',
                                    'operator' => '==',
                                    'value' => 'external',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'choices' => array(
                            '_self' => 'Öppna i samma fönster',
                            '_blank' => 'Öppna i nytt fönster',
                            'lightbox' => 'Öppna i en lightbox',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_54255e6b79860',
                        'label' => 'Telefonnummer',
                        'name' => 'sitesetting-header-shortlink-phone',
                        'type' => 'text',
                        'instructions' => 'Ange telefonnumret länken skall gå till.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54255dca7985c',
                                    'operator' => '==',
                                    'value' => 'phone',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => 'Exempel: 07012345678',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_54255e9379861',
                        'label' => 'E-post',
                        'name' => 'sitesetting-header-shortlink-email',
                        'type' => 'email',
                        'instructions' => 'Ange epostaddressen länken skall gå till.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54255dca7985c',
                                    'operator' => '==',
                                    'value' => 'email',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => 'Exempel: info@autoking.se',
                        'prepend' => '',
                        'append' => '',
                    ),
                    array(
                        'key' => 'field_54256147357a1',
                        'label' => 'Redigera utseende',
                        'name' => 'sitesetting-header-shortlink-apperence',
                        'type' => 'true_false',
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_5425604b3579b',
                        'label' => 'Bakgrund',
                        'name' => 'sitesetting-header-shortlink-bgcolor',
                        'type' => 'color_picker',
                        'instructions' => 'Välj vilken bakgrundsfärg länken skall ha.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54256147357a1',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '#cccccc',
                    ),
                    array(
                        'key' => 'field_5425609a3579d',
                        'label' => 'Bakgrund : Hover',
                        'name' => 'sitesetting-header-shortlink-bgcolor-hover',
                        'type' => 'color_picker',
                        'instructions' => 'Välj vilken bakgrundsfärg länken skall ha när man håller musen över.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54256147357a1',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '#dddddd',
                    ),
                    array(
                        'key' => 'field_5425606f3579c',
                        'label' => 'Textfärg',
                        'name' => 'sitesetting-header-shortlink-color',
                        'type' => 'color_picker',
                        'instructions' => 'Välj vilken färg länktexten skall ha',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54256147357a1',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '#333333',
                    ),
                    array(
                        'key' => 'field_542560c93579e',
                        'label' => 'Textfärg : Hover',
                        'name' => 'sitesetting-header-shortlink-color-hover',
                        'type' => 'color_picker',
                        'instructions' => 'Välj vilken färg länktexten skall ha när man håller musen över.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54256147357a1',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '#333333',
                    ),
                    array(
                        'key' => 'field_54256106357a0',
                        'label' => 'Ikon',
                        'name' => 'sitesetting-header-shortlink-icon',
                        'type' => 'font-awesome',
                        'instructions' => 'Välj en ikon som skall visas bredvid med länken.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_54256147357a1',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => 'fa-comment',
                        'save_format' => 'class',
                        'allow_null' => 0,
                        'enqueue_fa' => 0,
                        'choices' => require(WP_PLUGIN_DIR . "/font-awesome-choices/font-awesome-choices.php"),
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till Snabblänk',
            ),
            array(
                'key' => 'field_542562ee24acc',
                'label' => 'Sidfot',
                'name' => '',
                'type' => 'tab',
            ),

            array(
                'key' => 'field_19278562789ace',
                'label' => 'Textfärg',
                'name' => 'sitesetting-footer-textcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg du vill ha på texten i sidfoten.',
                'default_value' => '#000000',
            ),

            array(
                'key' => 'field_1298742707def',
                'label' => 'Länkfärg',
                'name' => 'sitesetting-footer-linkcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg du vill ha på länkarna i sidfoten.',
                'default_value' => '#000000',
            ),

            array(
                'key' => 'field_5425630624ace',
                'label' => 'Bakgrundsfärg',
                'name' => 'sitesetting-footer-bgcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg du vill ha på sidfoten.',
                'default_value' => '#f1f1f1',
            ),

            array(
                'key' => 'field_12345782a732',
                'label' => 'Genomskinlighet',
                'name' => 'sitesetting-footer-opacity',
                'type' => 'number',
                'instructions' => 'Genomskinlighet på sidfotens bakgrundsfärg',
                'default_value' => '0',
                'append' => '%',
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ),

            array(
				'key' => 'field_893248324756',
				'label' => 'Fäst sidfot till botten',
				'name' => 'sitesetting-footer-sticky',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
                'key' => 'field_5425632b24acf',
                'label' => 'Innehåll',
                'name' => 'sitesetting-footer-content',
                'type' => 'repeater',
                'instructions' => 'Lägg till innehåll som skall visas i sidfoten.',
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
                        'label' => 'Dölj rubrik på sidan',
                        'name' => 'setting-hide-header',
                        'type' => 'true_false',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array(
                        'key' => 'field_541c246266ec1',
                        'label' => 'Innehåll',
                        'name' => 'content-type',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'wysiwyg' => 'Eget innehåll',
                            'links' => 'Snabblänkar',
                            'sitemap' => 'Sidkarta',
                            //'slideshow' => 'Bildspel',
                            'offers' => 'Erbjudanden',
                            //'assortment' => 'Fordon i lager',
                            'plugs' => 'Puffar',
                            //'employees' => 'Personal',
                            'facility' => 'Anläggningsinformation',
                            'map' => 'Karta',
                            'contactform' => 'Kontaktformulär',
                            'news' => 'Nyhetsflöde',
                            'html' => 'HTML-kod',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'wysiwyg',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_542563c824ad2',
                        'label' => 'Storlek',
                        'name' => 'sitesetting-footer-content-size',
                        'type' => 'radio',
                        'instructions' => 'Välj vilken storlek innehållsblocket ska ha.',
                        'column_width' => '',
                        'choices' => array(
                            12 => '100%',
                            9 => '75%',
                            8 => '67%',
                            6 => '50%',
                            4 => '33%',
                            3 => '25%',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_542123s573c4b',
                        'label' => 'Snabblänkar',
                        'name' => 'sitesetting-footer-shortlinks',
                        'type' => 'repeater',
                        'instructions' => 'Lägg till snabblänkar som visas i sidfoten',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_541c246266ec1',
                                    'operator' => '==',
                                    'value' => 'links',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'sub_fields' => array(
                            array(
                                'key' => 'field_54255e497321f',
                                'label' => 'Länktext',
                                'name' => 'sitesetting-footer-shortlink-text',
                                'type' => 'text',
                                'instructions' => 'Ange en text som skall stå i länken',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => 'Exempel: Läs mer eller Kontakta oss',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_54asddca7985c',
                                'label' => 'Länktyp',
                                'name' => 'sitesetting-footer-shortlink-type',
                                'type' => 'select',
                                'instructions' => 'Välj vilken typ av länk.',
                                'column_width' => '',
                                'choices' => array(
                                    'internal' => 'Lokal sida',
                                    'external' => 'Extern url',
                                    'phone' => 'Telefonnummer',
                                    'email' => 'E-postaddress',
                                ),
                                'default_value' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'field_54gfdf009f062',
                                'label' => 'Lokal sida',
                                'name' => 'sitesetting-footer-shortlink-page',
                                'type' => 'page_link',
                                'instructions' => 'Välj vilken sida länken skall gå till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54asddca7985c',
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
                                ),
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'field_5agdf229f063',
                                'label' => 'Extern URL',
                                'name' => 'sitesetting-footer-shortlink-url',
                                'type' => 'text',
                                'instructions' => 'Ange addressen länken skall gå till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54asddca7985c',
                                            'operator' => '==',
                                            'value' => 'external',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => 'Exempel: http://www.mercedes-benz.se',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_54fdsd107985d',
                                'label' => 'Länkbeteende',
                                'name' => 'sitesetting-footer-shortlink-target',
                                'type' => 'select',
                                'instructions' => 'Välj hur du vill att länken skall öppnas.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54asddca7985c',
                                            'operator' => '==',
                                            'value' => 'internal',
                                        ),
                                        array(
                                            'field' => 'field_54asddca7985c',
                                            'operator' => '==',
                                            'value' => 'external',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'choices' => array(
                                    '_self' => 'Öppna i samma fönster',
                                    '_blank' => 'Öppna i nytt fönster',
                                    'lightbox' => 'Öppna i en lightbox',
                                ),
                                'default_value' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'field_54321sde6b79860',
                                'label' => 'Telefonnummer',
                                'name' => 'sitesetting-footer-shortlink-phone',
                                'type' => 'text',
                                'instructions' => 'Ange telefonnumret länken skall gå till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54asddca7985c',
                                            'operator' => '==',
                                            'value' => 'phone',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => 'Exempel: 07012345678',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_54kljdhjb9379861',
                                'label' => 'E-post',
                                'name' => 'sitesetting-footer-shortlink-email',
                                'type' => 'email',
                                'instructions' => 'Ange epostaddressen länken skall gå till.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_54asddca7985c',
                                            'operator' => '==',
                                            'value' => 'email',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => 'Exempel: info@autoking.se',
                                'prepend' => '',
                                'append' => '',
                            ),
                            array(
                                'key' => 'field_584736447357a1',
                                'label' => 'Redigera utseende',
                                'name' => 'sitesetting-footer-shortlink-apperence',
                                'type' => 'true_false',
                                'column_width' => '',
                                'message' => '',
                                'default_value' => 0,
                            ),
                            array(
                                'key' => 'field_54345dfds04b3579b',
                                'label' => 'Bakgrund',
                                'name' => 'sitesetting-footer-shortlink-bgcolor',
                                'type' => 'color_picker',
                                'instructions' => 'Välj vilken bakgrundsfärg länken skall ha.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_584736447357a1',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '#cccccc',
                            ),
                            array(
                                'key' => 'field_542asdafadfasd79d',
                                'label' => 'Bakgrund : Hover',
                                'name' => 'sitesetting-footer-shortlink-bgcolor-hover',
                                'type' => 'color_picker',
                                'instructions' => 'Välj vilken bakgrundsfärg länken skall ha när man håller musen över.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_584736447357a1',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '#dddddd',
                            ),
                            array(
                                'key' => 'field_5sdf76dff3579c',
                                'label' => 'Textfärg',
                                'name' => 'sitesetting-footer-shortlink-color',
                                'type' => 'color_picker',
                                'instructions' => 'Välj vilken färg länktexten skall ha',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_584736447357a1',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '#333333',
                            ),
                            array(
                                'key' => 'field_54jksdhgs8793579e',
                                'label' => 'Textfärg : Hover',
                                'name' => 'sitesetting-footer-shortlink-color-hover',
                                'type' => 'color_picker',
                                'instructions' => 'Välj vilken färg länktexten skall ha när man håller musen över.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_584736447357a1',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => '#333333',
                            ),
                            array(
                                'key' => 'field_54256asdkhgasd123',
                                'label' => 'Ikon',
                                'name' => 'sitesetting-footer-shortlink-icon',
                                'type' => 'font-awesome',
                                'instructions' => 'Välj en ikon som skall visas bredvid med länken.',
                                'conditional_logic' => array(
                                    'status' => 1,
                                    'rules' => array(
                                        array(
                                            'field' => 'field_584736447357a1',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                    'allorany' => 'all',
                                ),
                                'column_width' => '',
                                'default_value' => 'fa-comment',
                                'save_format' => 'class',
                                'allow_null' => 0,
                                'enqueue_fa' => 0,
                                'choices' => require(WP_PLUGIN_DIR . "/font-awesome-choices/font-awesome-choices.php"),
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'row',
                        'button_label' => 'Lägg till Snabblänk',
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


                    array(
                        'key' => 'field_541c249a66ec3',
                        'label' => 'Bildspel',
                        'name' => 'content-slideshow',
                        'type' => 'post_object',
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
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'slideshow',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
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
                            'specific' => 'Ett specifikt erbjudande',
                            'brand' => 'Alla från ett märke',
                            'facility' => 'Alla hos en anläggning',
                            'all' => 'Alla erbjudanden',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'horizontal',
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
                                    'field' => 'field_541c261a66ec9',
                                    'operator' => '==',
                                    'value' => 'all',
                                ),
                                array(
                                    'field' => 'field_541c261a66ec9',
                                    'operator' => '==',
                                    'value' => 'openhours',
                                ),
                                array(
                                    'field' => 'field_541c261a66ec9',
                                    'operator' => '==',
                                    'value' => 'map',
                                ),
                                array(
                                    'field' => 'field_541c261a66ec9',
                                    'operator' => '==',
                                    'value' => 'address',
                                ),
                                array(
                                    'field' => 'field_541c261a66ec9',
                                    'operator' => '==',
                                    'value' => 'other-address',
                                ),
                                array(
                                    'field' => 'field_541c261a66ec9',
                                    'operator' => '==',
                                    'value' => 'email',
                                ),
                                array(
                                    'field' => 'field_541c261a66ec9',
                                    'operator' => '==',
                                    'value' => 'phonenumber',
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
                        'theme' => "solarized",
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
                        'taxonomy' => 'news-categories',
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
                'key' => 'field_5424b24c3e063',
                'label' => 'Accesspaket',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5473239e996fd',
                'name' => 'sitesetting-account-run-ap-admin',
                'type' => 'message',
                'message' => '<a class="iframe" href="http://access.bytbil.com/AdmTools/">Öppna admin</a>',
            ),
            array(
                'key' => 'field_542558c8a235f',
                'label' => 'BytBil Alias',
                'name' => 'sitesetting-account-bbalias',
                'type' => 'text',
                'instructions' => 'Fyll i BytBil Alias för det accesspaket som skall användas.',
                'default_value' => '',
                'placeholder' => 'Exempel: basicclassic',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_542558c8a222f',
                'label' => 'Grupp ID',
                'name' => 'sitesetting-account-groupid',
                'type' => 'text',
                'instructions' => '',
                'default_value' => 'G-711',
                'placeholder' => 'Exempel: G-711',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                "key" => "field_j32084j3347630846534",
                "type" => "message",
                "message" => "Layout - Listvy",
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
                'key' => 'field_5424b23b3e062',
                'label' => 'SEO',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5424b79d05ba0',
                'label' => 'Använd egen SEO och META',
                'name' => 'sitesettings-seo-meta',
                'type' => 'true_false',
                'instructions' => 'Välj om du vill fylla i och påverka sitens generella SEO och META-data.',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_5424b85105ba1',
                'label' => 'Titeltag',
                'name' => 'sitesettings-title-tag',
                'type' => 'text',
                'instructions' => 'Skriv över sidans standard Titel-tag.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b79d05ba0',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: Autoking - Mesta bilhandlaren i Stockholm!',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5424b8c105ba2',
                'label' => 'META Description',
                'name' => 'sitesettings-meta-description',
                'type' => 'textarea',
                'instructions' => 'Fyll i en egen description för webbsidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b79d05ba0',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: Stockholms främsta bilhandlare - Nya Mercedes-Benz, BMW och Audi.',
                'maxlength' => 160,
                'rows' => 3,
                'formatting' => 'none',
            ),
            array(
                'key' => 'field_5424b93305ba3',
                'label' => 'META Keywords',
                'name' => 'sitesettings-meta-keywords',
                'type' => 'text',
                'instructions' => 'Fyll i ett antal relevanta keywords som beskriver er hemsida. Separera med kommatecken (,).',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b79d05ba0',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: (Nya bilar, Stockholm, Mercedes-Benz, Audi, BMW)',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),

            /* FORMS */
            array(
                'key' => 'field_5424asdgfg33423062',
                'label' => 'Formulär',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                "key" => "field_987adfjhsd8f",
                "label" => "Redigera formulär",
                "name" => "sitesettings-forms-edit",
                "type" => "true_false",
                "default_value" => 0
            ),
            array(
                "key" => "field_ouh098ölkjdfh8935asfa",
                "label" => "Ettikettplacering",
                "type" => "select",
                "name" => "sitesettings-forms-label-placement",
                "choices" => array(
                    "above" => "Ovanför",
                    "before" => "Framför"
                ),
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_897345dfsg345k7dfhas98a",
                "label" => "Etikettbredd",
                "name" => "sitesettings-forms-label-width",
                "instructions" => "",
                "type" => "number",
                "append" => "%",
                "default_value" => 30,
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                        array(
                            "field" => "field_ouh098ölkjdfh8935asfa",
                            "operator" => "==",
                            "value" => "before"
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "type" => "message",
                "key" => "field_msgfields123098",
                "message" => "<h2>Fält</h2>",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_897daf0987dfhas98a",
                "label" => "Höjd inputfält",
                "name" => "sitesettings-forms-inputs-height",
                "instructions" => "Gäller text, email, password och date",
                "type" => "number",
                "append" => "px",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_asd0ljk94593244",
                "label" => "Höjd textarea",
                "name" => "sitesettings-forms-textarea-height",
                "type" => "number",
                "append" => "px",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_ranas8798743ljhfg",
                "label" => "Border för inputfält",
                "type" => "text",
                "name" => "sitesettings-forms-inputs-border",
                "placeholder" => "1px solid #333",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_as123r453w493244",
                "label" => "Font size för inputs",
                "instructions" => "Gäller input och textarea",
                "name" => "sitesettings-forms-inputs-fz",
                "type" => "number",
                "append" => "px",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_897ljpo39823nf89jk7dfhas98a",
                "label" => "Använd global border-radius",
                "name" => "sitesettings-forms-border-radius-global",
                "instructions" => "",
                "type" => "true_false",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_897dafsdf89hjk7dfhas98a",
                "label" => "Border-radius",
                "name" => "sitesettings-forms-border-radius",
                "instructions" => "",
                "type" => "number",
                "append" => "px",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                        array(
                            "field" => "field_897ljpo39823nf89jk7dfhas98a",
                            "operator" => "!=",
                            "value" => 1
                        )
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_asd9a0987fg7gh6fg856fgh93244",
                "label" => "Textfärg",
                "instructions" => "",
                "name" => "sitesettings-forms-input-text-color",
                "type" => "color_picker",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_as098dfgjkh4e345hw493244",
                "label" => "Färg placeholder-text",
                "name" => "sitesettings-forms-placeholder-color",
                "type" => "color_picker",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_msgbtns123098",
                "type" => "message",
                "message" => "<h2>Knappar</h2>",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_asd987dskjhw493244",
                "label" => "Höjd knappar",
                "instructions" => "Gäller input:submit och button",
                "name" => "sitesettings-forms-buttons-height",
                "type" => "number",
                "append" => "px",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_asd9asd345hw493244",
                "label" => "Bakgrundsfärg knappar",
                "instructions" => "Gäller input:submit och button",
                "name" => "sitesettings-forms-buttons-bgc",
                "type" => "color_picker",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_asd9asd987sdfjhsdf44",
                "label" => "Textfärg knappar",
                "instructions" => "Gäller input:submit och button",
                "name" => "sitesettings-forms-buttons-color",
                "type" => "color_picker",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_ra087dfgdfg98743ljhfg",
                "label" => "Border för knappar",
                "type" => "text",
                "name" => "sitesettings-forms-buttons-border",
                "placeholder" => "1px solid #333",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_ra08712323asdf25efsd43ljhfg",
                "label" => "Padding för knapparfält",
                "type" => "text",
                "name" => "sitesettings-forms-buttons-padding",
                "placeholder" => "10px 20px",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_msgchkrad1256fdg98",
                "type" => "message",
                "message" => "<h2>Radio/Checkbox</h2>",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_ouhasd9832498asfa",
                "label" => "Storlek",
                "type" => "number",
                "name" => "sitesettings-forms-radchk-size",
                "append" => "px",
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_ouh0987sdf76235asfa",
                "label" => "Visning",
                "type" => "select",
                "name" => "sitesettings-forms-radchk-display",
                "choices" => array(
                    "inline-block" => "Horisontellt",
                    "block" => "Vertikalt"
                ),
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                "key" => "field_ou235trh456fthsdf76235asfa",
                "label" => "Placering text (Alternativ)",
                "type" => "select",
                "name" => "sitesettings-forms-radchk-optname-placement",
                "choices" => array(
                    "before" => "Framför",
                    "above" => "Ovanför",
                ),
                "conditional_logic" => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_987adfjhsd8f',
                            'operator' => '==',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'sitesettings',
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

add_action('admin_enqueue_scripts', 'sitesettings_scripts', 0);

function sitesettings_scripts()
{
    wp_enqueue_script('sitesettings_scripts', '/wp-content/plugins/bytbilcms-sitesettings/bytbilcms-sitesettings.js', array(), '1.0.0', true);
    wp_enqueue_script('colorbox', '/wp-content/plugins/bytbilcms-sitesettings/jquery.colorbox.js', array(), '1.0.0', true);
    wp_register_style('sitesettings_ap_style', '/wp-content/plugins/bytbilcms-sitesettings/sitesettings.css', false, '1.0.0');
    wp_enqueue_style('sitesettings_ap_style');
}

function add_fb_accesspackage($post_id){
    require('FTPClient.php');
    $title = get_the_title($post_id);
    $alias = get_field("sitesetting-account-bbalias", $post_id);
    $fb_id = get_field("sitesetting-account-fb-id", $post_id);

    $groupId = "";
    $custom_css = "";
    $custom_js = "";
    $layout_less = "";
    $editAccesspackage = "facebook";
    $FTPClient = new FTPClient($alias, $fb_id, $title, $layout_less, $editAccesspackage);

    $send_email = get_field("send-email", $post_id);
    if ($send_email != "") {
        update_field("field_542937c12b2345677", array("1"), $post_id);
        $fb = true;
        sendAccesspackageToCustomer($post_id, $fb);
    }
}

function sendFilesToFtp($post_id, $post)
{
    if($post->post_type == 'facebook-accesspaket'){
        add_fb_accesspackage($post_id);
        return;
    }
    if ($post->post_status == "auto-draft" ||
        $post->post_status == "draft" ||
        $post->post_status == "trash" ||
        $post->post_parent != 0 ||
        $post->post_type != 'sitesettings' &&
        $post->post_type != 'accesspaket') {
            return;
        }
    //If deactivate checkbox is checked
    $deactivate = get_field("sitesetting-account-deactivate", $post_id);
    $deactivate_js_code = "";
    $deactivate_css_code = "";
    if($deactivate == true){
        $deactivate_js_code = "$(function(){ $('html').remove(); });";
        $deactivate_css_code = "html{\n\tdisplay:none!important;\n}\n";
    }

    //Used by the accesspackage demo plugin.
    $send_email = get_field("send-email", $post_id);
    if ($send_email != "") {
        update_field("field_542937c12b5677", array("1"), $post_id);
        sendAccesspackageToCustomer($post_id);
    }

    if ($post->post_type == 'accesspaket') {
        update_field("field_542937c12b877", "", $post_id);
        if($post->post_parent == 0){
            createOrUpdateViews($post_id);
        }
    }

    if (!get_field("sitesetting-account-groupid", $post_id)) {
        return;
    }

    //$po = json_decode(json_encode($_POST['fields']), true);

    $groupId = get_field("sitesetting-account-groupid", $post_id);

    //G-1105 = Classic2-Look
    if($groupId == "G-1105"){
        echo "Ändringar i Classic2-Looken (G-1105) tillåts inte. Var god skapa en ny grupp som ärver från Classic2 - Look.";
        return;
    }

    $initial_view = get_field("sitesetting-account-initial-view", $post_id);
    if($initial_view == "gallery") {
        $initial_view_css = "#initial-view-gallery { display: block; } #initial-view-list { display: none; }\n";
    } else if($initial_view == "list") {
        $initial_view_css = "#initial-view-list { display: block; } #initial-view-gallery { display: none; }\n";
    }

    $button_bgcolor = get_field("sitesetting-account-button-bgcolor", $post_id);
    $button_active_bgcolor = get_field("sitesetting-account-button-active-bgcolor", $post_id);
    $button_bordercolor = get_field("sitesetting-account-button-bordercolor", $post_id);
    $button_textcolor = get_field("sitesetting-account-button-textcolor", $post_id);
    $price_bgcolor = get_field("sitesetting-account-price-bgcolor", $post_id);
    $price_textcolor = get_field("sitesetting-account-price-textcolor", $post_id);
    $extraprice_textcolor = get_field("sitesetting-account-extraprice-textcolor", $post_id);
    $extraprice_bgcolor = get_field("sitesetting-account-extraprice-bgcolor", $post_id);
    $block_textcolor = get_field("sitesetting-account-block-textcolor", $post_id);
    $block_bgcolor = get_field("sitesetting-account-block-bgcolor", $post_id);
    $blockhead_textcolor = get_field("sitesetting-account-blockhead-textcolor", $post_id);
    $blockhead_bgcolor = get_field("sitesetting-account-blockhead-bgcolor", $post_id);

    $header_font_family = get_field("sitesetting-font-family-header", $post_id);
    $header_font_color = get_field("sitesetting-font-color-header", $post_id);
    $header_font_size = get_field("sitesetting-font-size-header", $post_id);
    $font_family = get_field("sitesetting-font-family-paragraph", $post_id);
    $font_size = get_field("sitesetting-font-size-paragraph", $post_id);
    $font_color = get_field("sitesetting-font-color-paragraph", $post_id);
    $link_color = get_field("sitesetting-link-color", $post_id);
    $link_hover_color = get_field("sitesetting-link-color-hover", $post_id);

    $font_imports = "@import url(http://fonts.googleapis.com/css?family=" . str_replace(" ","+",$header_font_family) . ":400,700);\n";
    if($header_font_family != $font_family) {
        $font_imports .= "@import url(http://fonts.googleapis.com/css?family=" . str_replace(" ","+",$font_family) . ":400,700);\n";
    }

    $link_effect = get_field("sitesetting-link-effect", $post_id);
    $link_underline = $link_effect[0];
    $link_weight = $link_effect[1];

    $link_hover_effect = get_field("sitesetting-link-effect-hover", $post_id);
    $link_hover_underline = $link_hover_effect[0];
    $link_hover_weight = $link_hover_effect[1];

    $hide_things = get_field("sitesetting-account-hide-read-button", $post_id);
    $hide_readmore = "block";
    $hide_sorting = "block";
    $hide_finance = "block";
    $hide_switcher = "block";

    foreach($hide_things as $hide_thing){
        if ($hide_thing == "readmore-button") {
            $hide_readmore = "none";
        }
        else if ($hide_thing == "sort-button") {
            $hide_sorting = "none";
        }
        else if ($hide_thing == "finance") {
            $hide_finance = "none";
        }
        else if ($hide_thing == "switchview") {
            $hide_switcher = "none";
        }
    }

    $prices = get_field("sitesetting-account-prices", $post_id);
    $prices_original = "none";
    $prices_original_no_vat = "none";
    $prices_extra = "none";
    $prices_extra_no_vat = "none";
    foreach($prices as $price){
        if ($price == "original-price") {
            $prices_original = "block";
        }
        else if ($price == "original-price-no-vat") {
            $prices_original_no_vat = "block";
        }
        else if ($price == "extra-price") {
            $prices_extra = "block";
        }
        else if ($price == "extra-price-no-vat") {
            $prices_extra_no_vat = "block";
        }
    }

    $extra_fields = get_field("sitesetting-account-extra-fields", $post_id);
    $extra_fields_full_title = "nowrap";
    $extra_fields_year = "none";
    $extra_fields_miles = "none";
    $extra_fields_fuel = "none";
    $extra_fields_gearbox = "none";

    $extra_fields_color = "none";
    $extra_fields_body = "none";
    $extra_fields_location = "none";
    $extra_fields_customer = "none";

    $extra_fields_beds = "none";
    $extra_fields_length = "none";
    $extra_fields_weight = "none";

    foreach($extra_fields as $extra_field){
        if($extra_field == "info-full-title"){
            $extra_fields_full_title = "normal";
        }
        else if ($extra_field == "info-year") {
            $extra_fields_year = "block";
        }
        else if ($extra_field == "info-miles") {
            $extra_fields_miles = "block";
        }
        else if ($extra_field == "info-fuel") {
            $extra_fields_fuel = "block";
        }
        else if ($extra_field == "info-gearbox") {
            $extra_fields_gearbox = "block";
        }
        else if ($extra_field == "info-color") {
            $extra_fields_color = "block";
        }
        else if ($extra_field == "info-body") {
            $extra_fields_body = "block";
        }
        else if ($extra_field == "info-location") {
            $extra_fields_location = "block";
        }
        else if ($extra_field == "info-customer") {
            $extra_fields_customer = "block";
        }

        else if ($extra_field == "info-beds") {
            $extra_fields_beds = "block";
        }
        else if ($extra_field == "info-length") {
            $extra_fields_length = "block";
        }
        else if ($extra_field == "info-weight") {
            $extra_fields_weight = "block";
        }
    }


    $search_fields = get_field("sitesetting-account-search-fields", $post_id);
    $search_fields_show = "";
    $fields_index = 1;
    foreach($search_fields as $search_field) {
        $search_fields_show .= "." . $search_field;
        if($fields_index != count($search_fields)) {
            $search_fields_show .= ", ";
        }
        $fields_index++;
    }

    $border_radius = get_field("sitesetting-border-radius-val", $post_id);

    $css_field = get_field("sitesetting-accesspackage-custom-css", $post_id);
    $custom_js = get_field("sitesetting-accesspackage-custom-js", $post_id);
    $custom_js = $deactivate_js_code . $custom_js;

    $readmore_text = get_field("sitesetting-account-readmore-text", $post_id);
    if( $readmore_text != "Läs mer" || $readmore_text == null ) {
        $readmore_text = ".read-more:before { content: '" . $readmore_text . "' }\n.read-more span { display: none; }\n";
    }else{
        $readmore_text = "";
    }

    $i = "!important;\n";
    $custom_css =
        $font_imports .
        ".col-field {\n" .
        "\tdisplay: none;\n" .
        "}\n" .
        $search_fields_show . "{\n" .
        "\tdisplay: block" . $i .
        "}\n" .
        ".FormButton, .btn, button{\n" .
        "\tbackground:" . $button_bgcolor . $i .
        "\tborder: 1px solid " . $button_bordercolor . $i .
        "\tcolor:" . $button_textcolor . $i .
        "}\n" .
        ".desc, .asc, .btn.active{\n" .
        "\tbackground:" . $button_active_bgcolor . $i .
        "}\n" .
        $initial_view_css .
        "#gallery-view  .Prices .regular-price, #list-view .Prices .regular-price, #gallery-view .Prices span.current-price{\n" .
        "\tbackground:" . $price_bgcolor . $i .
        "\tcolor:" . $price_textcolor . $i .
        "}\n" .
        "#gallery-view .Prices .current-price{\n" .
        "\tbackground:" . $extraprice_bgcolor . $i .
        "\tcolor:" . $extraprice_textcolor . $i .
        "}\n" .
        "h1{\n" .
        "\tfont-family:\"" . $header_font_family . "\"" . $i .
        "\tfont-size:" . $header_font_size . "px" . $i .
        "\tcolor:" . $blockhead_textcolor . $i .
        "}\n" .
        "a{\n" .
        "\tcolor:" . $link_color . $i .
        "\ttext-decoration:" . $link_underline . $i .
        "\tfont-weight:" . $link_weight . $i .
        "}\n" .
        "a:hover{\n" .
        "\tcolor:" . $link_hover_color . $i .
        "\ttext-decoration:" . $link_hover_underline . $i .
        "\tfont-weight:" . $link_hover_weight . $i .
        "}\n" .
        ".searchform, .panel, .panel-tabs .panel-body, .media, .prices-container, .Prices span, button, .btn-primary {\n" .
        "\tborder-radius:" . $border_radius . "px" . $i .
        "}\n" .
        "img, .flexslider, input, select{\n" .
        "\tborder-radius:" . round($border_radius / 2) . "px" . $i .
        "}\n" .
        ".btn-group>.btn:first-child{\n" .
        "\tborder-top-left-radius:" . $border_radius . "px" . $i .
        "\tborder-bottom-left-radius:" . $border_radius . "px" . $i .
        "}\n" .
        ".btn-group>.btn:last-child{\n" .
        "\tborder-top-right-radius:" . $border_radius . "px" . $i .
        "\tborder-bottom-right-radius:" . $border_radius . "px" . $i .
        "}\n" .
        ".nav-tabs a{\n" .
        "\tborder-top-left-radius:" . $border_radius . "px" . $i .
        "\tborder-top-right-radius:" . $border_radius . "px" . $i .
        "}\n" .
        ".nav-tabs .active a {\n" .
        "\tbackground-color:" . $blockhead_bgcolor . $i .
        "\tcolor:" . $blockhead_textcolor . $i .
        "}\n" .
        $readmore_text .
        ".sorting{\n" .
        "\tdisplay:" . $hide_sorting . $i .
        "}\n" .
        ".switch-view{\n" .
        "\tdisplay:" . $hide_switcher . $i .
        "}\n" .
        ".read-more{\n" .
        "\tdisplay:" . $hide_readmore . $i .
        "}\n" .
        ".finance-info{\n" .
        "\tdisplay:" . $hide_finance . $i .
        "}\n" .

        ".regular-price, .disabled-price{\n" .
        "\tdisplay:" . $prices_original . $i .
        "}\n" .
        ".price-no-vat, .disabled-price-no-vat{\n" .
        "\tdisplay:" . $prices_original_no_vat . $i .
        "}\n" .
        ".current-price{\n" .
        "\tdisplay:" . $prices_extra . $i .
        "}\n" .
        ".current-price.price-no-vat{\n" .
        "\tdisplay:" . $prices_extra_no_vat . $i .
        "}\n" .

        ".info_year{\n" .
        "\tdisplay:" . $extra_fields_year . $i .
        "}\n" .
        ".info_miles{\n" .
        "\tdisplay:" . $extra_fields_miles . $i .
        "}\n" .
        ".info_fuel{\n" .
        "\tdisplay:" . $extra_fields_fuel . $i .
        "}\n" .
        ".info_gearbox{\n" .
        "\tdisplay:" . $extra_fields_gearbox . $i .
        "}\n" .

        ".info_color{\n" .
        "\tdisplay:" . $extra_fields_color . $i .
        "}\n" .
        ".info_body{\n" .
        "\tdisplay:" . $extra_fields_body . $i .
        "}\n" .
        ($extra_fields_customer == "block" ? "#gallery-view " : "") . ".info_location{\n" .
        "\tdisplay:" . $extra_fields_location . $i .
        "}\n" .
        ".info_customer_city{\n" .
        "\tdisplay:" . ($extra_fields_location == "block" ? "inline-block" : $extra_fields_location) . $i .
        "}\n" .
        ".info_customer_name{\n" .
        "\tdisplay:" . ($extra_fields_customer == "block" ? "inline-block" : $extra_fields_customer) . $i .
        "}\n" .

        ".info_beds{\n" .
        "\tdisplay:" . $extra_fields_beds . $i .
        "}\n" .
        ".info_length{\n" .
        "\tdisplay:" . $extra_fields_length . $i .
        "}\n" .
        ".info_weight{\n" .
        "\tdisplay:" . $extra_fields_weight . $i .
        "}\n" .
        ".panel-body, .searchform, .media, .prices-container, .nav-tabs a{\n" .
        "\tbackground:" . $block_bgcolor . $i .
        "\tcolor:" . $block_textcolor . $i .
        "}\n" .
        ".panel-body, .panel-tabs .panel-body{\n" .
        "\tborder-top-left-radius: 0px" . $i .
        "\tborder-top-right-radius: 0px" . $i .
        "}\n" .
        ".panel-heading{\n" .
        "\tbackground:" . $blockhead_bgcolor . $i .
        "\tcolor:" . $blockhead_textcolor . $i .
        "\tborder-bottom-left-radius: 0px" . $i .
        "\tborder-bottom-right-radius: 0px" . $i .
        "\tborder-bottom: 0px" . $i .
        "}\n" .
        ".panel-title{\n" .
        "\tcolor:" . $blockhead_textcolor . $i .
        "}\n" .
        "#gallery-view .panel-title{\n" .
        "\tcolor:" . $link_color . $i .
        "}\n" .
        "#gallery-view .panel-heading:hover{\n" .
        "\tbackground:" . $blockhead_bgcolor . $i .
        "}\n" .
        "body{\n" .
        "\tfont-family:\"" . $font_family . "\"" . $i .
        "\tfont-size:" . $font_size . "px" . $i .
        "\tcolor:" . $font_color . $i .
        "}\n" .
        "@media (min-width: 400px){ #gallery-view h4 {" .
        "\twhite-space:" . $extra_fields_full_title . $i .
        "}}\n" .
        $css_field .
        $deactivate_css_code;

    //Listvy
    $col_xxs_object = get_field("sitesetting-accesspackage-cars-per-row-xxs", $post_id);
    $col_xs_object = get_field("sitesetting-accesspackage-cars-per-row-xs", $post_id);
    $col_sm_object = get_field("sitesetting-accesspackage-cars-per-row-sm", $post_id);
    $col_md_object = get_field("sitesetting-accesspackage-cars-per-row-md", $post_id);
    //Objektvy
    $col_left = get_field("sitesetting-accesspackage-column-1", $post_id);
    $col_right = get_field("sitesetting-accesspackage-column-2", $post_id);
    $col_slider = get_field("sitesetting-accesspackage-object-slider", $post_id);
    $col_prices = get_field("sitesetting-accesspackage-object-price", $post_id);
    $col_properties = get_field("sitesetting-accesspackage-object-properties", $post_id);
    $col_equipment = get_field("sitesetting-accesspackage-object-equipment", $post_id);
    $col_finance = get_field("sitesetting-accesspackage-object-finance", $post_id);
    $col_contactform = get_field("sitesetting-accesspackage-object-contactform", $post_id);
    $col_seller = get_field("sitesetting-accesspackage-object-seller", $post_id);
    $col_auctorized = get_field("sitesetting-accesspackage-object-auctorized", $post_id);

    $bootstrap_variables_less = file_get_contents(plugin_dir_url(__FILE__) . "lib/bootstrap/variables.less");
    $bootstrap_mixins_grid_less = file_get_contents(plugin_dir_url(__FILE__) . "lib/bootstrap/mixins/grid.less");

    /*
    * Layouts
    * layout.less is sent to FTPClient,
    * where it is compiled to layout.css
    * and then sent to the accesspackage FTP.
    * */
    $layout_less =
        $bootstrap_variables_less .
        $bootstrap_mixins_grid_less .
        '.col-object {
            .make-xxs-column('. $col_xxs_object .');
            .make-xs-column('. $col_xs_object .');
            .make-sm-column('. $col_sm_object .');
            .make-md-column('. $col_md_object .');
        }
        .col-left-column {
          .make-xs-column(12);
          .make-sm-column('. $col_left .');
        }
        .col-right-column {
          .make-xs-column(12);
          .make-sm-column('. $col_right .');
        }
        .col-slider {
          .make-xs-column(12);
          .make-sm-column('. $col_slider .');
        }
        .col-prices {
          .make-xs-column(12);
          .make-sm-column('. $col_prices .');
        }
        .col-properties {
          .make-xs-column(12);
          .make-sm-column('. $col_properties .');
        }
        .col-equipment {
          .make-xs-column(12);
          .make-sm-column('. $col_equipment .');
        }
        .col-finance {
          .make-xs-column(12);
          .make-sm-column('. $col_finance .');
        }
        .col-contactform {
          .make-xs-column(12);
          .make-sm-column('. $col_contactform .');
        }
        .col-seller {
          .make-xs-column(12);
          .make-sm-column('. $col_seller .');
        }
        .col-auctorized {
          .make-xs-column(12);
          .make-sm-column('. $col_auctorized .');
        }
        ';

    //FTP-CLIENT
    require('FTPClient.php');
    $editAccesspackage = get_field("sitesetting-edit-accesspackage", $post_id);
    if($editAccesspackage){
        $editAccesspackage = "accesspaket";
    }else{
        $editAccesspackage = "";
    }

    $FTPClient = new FTPClient($groupId, $custom_css, $custom_js, $layout_less, $editAccesspackage);
    return;
}

add_action('save_post', 'sendFilesToFtp', 10, 2);

function hideTabs(){
    if(bytbil_check_user_role("anvandare", get_current_user_id()) ||
       bytbil_check_user_role("priviligerad", get_current_user_id()))
    {
        remove_menu_page( 'edit.php?post_type=sitesettings' );
        wp_enqueue_style("sitesettings-hide", plugin_dir_url(__FILE__)."/css/hiddens.css");
        wp_enqueue_script('sitesettings_hide_scripts', plugin_dir_url(__FILE__)."/js/sitesetting-scripts.js", array(), '1.0.0', true);
    }
}
add_action( "admin_enqueue_scripts", "hideTabs" );

function addUserSitesettings(){
    if(bytbil_check_user_role("anvandare", get_current_user_id()) ||
        bytbil_check_user_role("priviligerad", get_current_user_id())) {
        add_menu_page('user-sitesettings', "Hemsideinställningar", 'edit_posts', 'user-sitesettings', 'addSiteSettings', '', 34);
    }
}
add_action( 'admin_menu', 'addUserSitesettings' );

function addFontPreviewScript()
{
    wp_enqueue_script("bbcms-font-preview", plugin_dir_url(__FILE__) . "/js/font-preview.js", array(), filemtime(__DIR__ . "/js/font-preview.js"), true);
}

add_action("admin_enqueue_scripts", "addFontPreviewScript");

function addSiteSettings(){
    $settings = getSiteSettings();
    $setting_id = $settings->ID;
    $url = sprintf("<script>window.location.href='/wp-admin/post.php?post=%d&action=edit'</script>", $setting_id);
    echo $url;
}

function hex2rgba($color, $opacity = false)
{

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if (empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb = array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}

?>