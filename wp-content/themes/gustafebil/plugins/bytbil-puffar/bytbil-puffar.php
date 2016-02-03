<?php
/*
Plugin Name: BytBil Puffar
Description: Skapa och visa puffar.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 2.0.1
Author URI: http://www.bytbil.com
*/

function bb_plugs_add_mce_modal()
{
    if (!current_user_can("edit_posts") || !current_user_can("edit_pages")) {
        return;
    }

    add_filter("mce_external_plugins", "bb_plugs_add_mce_plugin");
    add_filter("mce_buttons", "bb_plugs_register_mce_button");

    $plugs = get_posts(array(
        "post_type" => "plug",
        "posts_per_page" => -1,
        "orderby" => "title",
        "order" => "ASC"
    ));
    $formatted_plugs = array();

    foreach ($plugs as $plug) {
        $formatted_plugs[] = array(
            "text" => $plug->post_title,
            "value" => $plug->ID
        );
    }

    $plugs = json_encode($formatted_plugs);

    echo "<script>var PLUGS = {$plugs}; </script>";
}

//add_action("admin_head", "bb_plugs_add_mce_modal");

function bb_plugs_add_mce_plugin($arr)
{
    $url = plugin_dir_url(__FILE__) . "js/bb-plugs-modal.js";
    $arr["bb_plugs_modal"] = $url;
    return $arr;
}

function bb_plugs_register_mce_button($buttons)
{
    array_push($buttons, "bb_plugs_modal");
    return $buttons;
}

function bb_plugs_shortcode($atts)
{
    if (empty($atts["id"]))
        return false;

    $id = intval($atts["id"]);
    ob_start();
    bytbil_show_plug($id);
    return ob_get_clean();
}

add_shortcode("puff", "bb_plugs_shortcode");

add_action('init', 'cptui_register_my_cpt_plug');
function cptui_register_my_cpt_plug()
{
    register_post_type('plug', array(
        'label' => 'Puffar',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'plug', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels' => array(
            'name' => 'Puffar',
            'singular_name' => 'Puff',
            'menu_name' => 'Puffar',
            'add_new' => 'Lägg till Puff',
            'add_new_item' => 'Lägg till Puff',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera Puff',
            'new_item' => 'Ny Puff',
            'view' => 'VIsa Puff',
            'view_item' => 'VIsa Puff',
            'search_items' => 'Sök Puffar',
            'not_found' => 'Inga Puffar hittade',
            'not_found_in_trash' => 'Inga Puffar i papperskorgen',
            'parent' => 'Puffens förälder',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_puffar',
        'title' => 'Puffar',
        'fields' => array(
            array(
                'key' => 'field_541a8dccc6f11',
                'label' => 'Innehåll',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541a8616d1d12',
                'label' => 'Pufftyp',
                'name' => 'plug-type',
                'type' => 'radio',
                'choices' => array(
                    'text' => 'Enbart text',
                    'small-image' => 'Med liten bild',
                    'big-image' => 'Med stor bild',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'text',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_541a86cdd1d13',
                'label' => 'Text',
                'name' => 'plug-text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_541a873ed1d14',
                'label' => 'Liten bild',
                'name' => 'plug-small-type',
                'type' => 'radio',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'small-image',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'icon' => 'Befintlig ikon',
                    'image' => 'Egen bild',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_541a881ad1d19',
                'label' => 'Stor bild',
                'name' => 'plug-big-type',
                'type' => 'radio',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'big-image',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'icon' => 'Befintlig ikon',
                    'image' => 'Egen bild',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_541a87asdd1d15',
                'label' => 'Ikon',
                'name' => 'plug-icon-small',
                'type' => 'font-awesome',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'small-image',
                        ),
                        array(
                            'field' => 'field_541a873ed1d14',
                            'operator' => '==',
                            'value' => 'icon',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => 'fa-certificate',
                'save_format' => 'class',
                'allow_null' => 0,
                'enqueue_fa' => 0,
                'choices' => array(
                    'fa-adjust' => ' fa-adjust',
                    'fa-adn' => ' fa-adn',
                    'fa-align-center' => ' fa-align-center',
                    'fa-align-justify' => ' fa-align-justify',
                    'fa-align-left' => ' fa-align-left',
                    'fa-align-right' => ' fa-align-right',
                    'fa-ambulance' => ' fa-ambulance',
                    'fa-anchor' => ' fa-anchor',
                    'fa-android' => ' fa-android',
                    'fa-angellist' => ' fa-angellist',
                    'fa-angle-double-down' => ' fa-angle-double-down',
                    'fa-angle-double-left' => ' fa-angle-double-left',
                    'fa-angle-double-right' => ' fa-angle-double-right',
                    'fa-angle-double-up' => ' fa-angle-double-up',
                    'fa-angle-down' => ' fa-angle-down',
                    'fa-angle-left' => ' fa-angle-left',
                    'fa-angle-right' => ' fa-angle-right',
                    'fa-angle-up' => ' fa-angle-up',
                    'fa-apple' => ' fa-apple',
                    'fa-archive' => ' fa-archive',
                    'fa-area-chart' => ' fa-area-chart',
                    'fa-arrow-circle-down' => ' fa-arrow-circle-down',
                    'fa-arrow-circle-left' => ' fa-arrow-circle-left',
                    'fa-arrow-circle-o-down' => ' fa-arrow-circle-o-down',
                    'fa-arrow-circle-o-left' => ' fa-arrow-circle-o-left',
                    'fa-arrow-circle-o-right' => ' fa-arrow-circle-o-right',
                    'fa-arrow-circle-o-up' => ' fa-arrow-circle-o-up',
                    'fa-arrow-circle-right' => ' fa-arrow-circle-right',
                    'fa-arrow-circle-up' => ' fa-arrow-circle-up',
                    'fa-arrow-down' => ' fa-arrow-down',
                    'fa-arrow-left' => ' fa-arrow-left',
                    'fa-arrow-right' => ' fa-arrow-right',
                    'fa-arrow-up' => ' fa-arrow-up',
                    'fa-arrows' => ' fa-arrows',
                    'fa-arrows-alt' => ' fa-arrows-alt',
                    'fa-arrows-h' => ' fa-arrows-h',
                    'fa-arrows-v' => ' fa-arrows-v',
                    'fa-asterisk' => ' fa-asterisk',
                    'fa-at' => ' fa-at',
                    'fa-backward' => ' fa-backward',
                    'fa-ban' => ' fa-ban',
                    'fa-bar-chart' => ' fa-bar-chart',
                    'fa-barcode' => ' fa-barcode',
                    'fa-bars' => ' fa-bars',
                    'fa-beer' => ' fa-beer',
                    'fa-behance' => ' fa-behance',
                    'fa-behance-square' => ' fa-behance-square',
                    'fa-bell' => ' fa-bell',
                    'fa-bell-o' => ' fa-bell-o',
                    'fa-bell-slash' => ' fa-bell-slash',
                    'fa-bell-slash-o' => ' fa-bell-slash-o',
                    'fa-bicycle' => ' fa-bicycle',
                    'fa-binoculars' => ' fa-binoculars',
                    'fa-birthday-cake' => ' fa-birthday-cake',
                    'fa-bitbucket' => ' fa-bitbucket',
                    'fa-bitbucket-square' => ' fa-bitbucket-square',
                    'fa-bold' => ' fa-bold',
                    'fa-bolt' => ' fa-bolt',
                    'fa-bomb' => ' fa-bomb',
                    'fa-book' => ' fa-book',
                    'fa-bookmark' => ' fa-bookmark',
                    'fa-bookmark-o' => ' fa-bookmark-o',
                    'fa-briefcase' => ' fa-briefcase',
                    'fa-btc' => ' fa-btc',
                    'fa-bug' => ' fa-bug',
                    'fa-building' => ' fa-building',
                    'fa-building-o' => ' fa-building-o',
                    'fa-bullhorn' => ' fa-bullhorn',
                    'fa-bullseye' => ' fa-bullseye',
                    'fa-bus' => ' fa-bus',
                    'fa-calculator' => ' fa-calculator',
                    'fa-calendar' => ' fa-calendar',
                    'fa-calendar-o' => ' fa-calendar-o',
                    'fa-camera' => ' fa-camera',
                    'fa-camera-retro' => ' fa-camera-retro',
                    'fa-car' => ' fa-car',
                    'fa-caret-down' => ' fa-caret-down',
                    'fa-caret-left' => ' fa-caret-left',
                    'fa-caret-right' => ' fa-caret-right',
                    'fa-caret-square-o-down' => ' fa-caret-square-o-down',
                    'fa-caret-square-o-left' => ' fa-caret-square-o-left',
                    'fa-caret-square-o-right' => ' fa-caret-square-o-right',
                    'fa-caret-square-o-up' => ' fa-caret-square-o-up',
                    'fa-caret-up' => ' fa-caret-up',
                    'fa-cc' => ' fa-cc',
                    'fa-cc-amex' => ' fa-cc-amex',
                    'fa-cc-discover' => ' fa-cc-discover',
                    'fa-cc-mastercard' => ' fa-cc-mastercard',
                    'fa-cc-paypal' => ' fa-cc-paypal',
                    'fa-cc-stripe' => ' fa-cc-stripe',
                    'fa-cc-visa' => ' fa-cc-visa',
                    'fa-certificate' => ' fa-certificate',
                    'fa-chain-broken' => ' fa-chain-broken',
                    'fa-check' => ' fa-check',
                    'fa-check-circle' => ' fa-check-circle',
                    'fa-check-circle-o' => ' fa-check-circle-o',
                    'fa-check-square' => ' fa-check-square',
                    'fa-check-square-o' => ' fa-check-square-o',
                    'fa-chevron-circle-down' => ' fa-chevron-circle-down',
                    'fa-chevron-circle-left' => ' fa-chevron-circle-left',
                    'fa-chevron-circle-right' => ' fa-chevron-circle-right',
                    'fa-chevron-circle-up' => ' fa-chevron-circle-up',
                    'fa-chevron-down' => ' fa-chevron-down',
                    'fa-chevron-left' => ' fa-chevron-left',
                    'fa-chevron-right' => ' fa-chevron-right',
                    'fa-chevron-up' => ' fa-chevron-up',
                    'fa-child' => ' fa-child',
                    'fa-circle' => ' fa-circle',
                    'fa-circle-o' => ' fa-circle-o',
                    'fa-circle-o-notch' => ' fa-circle-o-notch',
                    'fa-circle-thin' => ' fa-circle-thin',
                    'fa-clipboard' => ' fa-clipboard',
                    'fa-clock-o' => ' fa-clock-o',
                    'fa-cloud' => ' fa-cloud',
                    'fa-cloud-download' => ' fa-cloud-download',
                    'fa-cloud-upload' => ' fa-cloud-upload',
                    'fa-code' => ' fa-code',
                    'fa-code-fork' => ' fa-code-fork',
                    'fa-codepen' => ' fa-codepen',
                    'fa-coffee' => ' fa-coffee',
                    'fa-cog' => ' fa-cog',
                    'fa-cogs' => ' fa-cogs',
                    'fa-columns' => ' fa-columns',
                    'fa-comment' => ' fa-comment',
                    'fa-comment-o' => ' fa-comment-o',
                    'fa-comments' => ' fa-comments',
                    'fa-comments-o' => ' fa-comments-o',
                    'fa-compass' => ' fa-compass',
                    'fa-compress' => ' fa-compress',
                    'fa-copyright' => ' fa-copyright',
                    'fa-credit-card' => ' fa-credit-card',
                    'fa-crop' => ' fa-crop',
                    'fa-crosshairs' => ' fa-crosshairs',
                    'fa-css3' => ' fa-css3',
                    'fa-cube' => ' fa-cube',
                    'fa-cubes' => ' fa-cubes',
                    'fa-cutlery' => ' fa-cutlery',
                    'fa-database' => ' fa-database',
                    'fa-delicious' => ' fa-delicious',
                    'fa-desktop' => ' fa-desktop',
                    'fa-deviantart' => ' fa-deviantart',
                    'fa-digg' => ' fa-digg',
                    'fa-dot-circle-o' => ' fa-dot-circle-o',
                    'fa-download' => ' fa-download',
                    'fa-dribbble' => ' fa-dribbble',
                    'fa-dropbox' => ' fa-dropbox',
                    'fa-drupal' => ' fa-drupal',
                    'fa-eject' => ' fa-eject',
                    'fa-ellipsis-h' => ' fa-ellipsis-h',
                    'fa-ellipsis-v' => ' fa-ellipsis-v',
                    'fa-empire' => ' fa-empire',
                    'fa-envelope' => ' fa-envelope',
                    'fa-envelope-o' => ' fa-envelope-o',
                    'fa-envelope-square' => ' fa-envelope-square',
                    'fa-eraser' => ' fa-eraser',
                    'fa-eur' => ' fa-eur',
                    'fa-exchange' => ' fa-exchange',
                    'fa-exclamation' => ' fa-exclamation',
                    'fa-exclamation-circle' => ' fa-exclamation-circle',
                    'fa-exclamation-triangle' => ' fa-exclamation-triangle',
                    'fa-expand' => ' fa-expand',
                    'fa-external-link' => ' fa-external-link',
                    'fa-external-link-square' => ' fa-external-link-square',
                    'fa-eye' => ' fa-eye',
                    'fa-eye-slash' => ' fa-eye-slash',
                    'fa-eyedropper' => ' fa-eyedropper',
                    'fa-facebook' => ' fa-facebook',
                    'fa-facebook-square' => ' fa-facebook-square',
                    'fa-fast-backward' => ' fa-fast-backward',
                    'fa-fast-forward' => ' fa-fast-forward',
                    'fa-fax' => ' fa-fax',
                    'fa-female' => ' fa-female',
                    'fa-fighter-jet' => ' fa-fighter-jet',
                    'fa-file' => ' fa-file',
                    'fa-file-archive-o' => ' fa-file-archive-o',
                    'fa-file-audio-o' => ' fa-file-audio-o',
                    'fa-file-code-o' => ' fa-file-code-o',
                    'fa-file-excel-o' => ' fa-file-excel-o',
                    'fa-file-image-o' => ' fa-file-image-o',
                    'fa-file-o' => ' fa-file-o',
                    'fa-file-pdf-o' => ' fa-file-pdf-o',
                    'fa-file-powerpoint-o' => ' fa-file-powerpoint-o',
                    'fa-file-text' => ' fa-file-text',
                    'fa-file-text-o' => ' fa-file-text-o',
                    'fa-file-video-o' => ' fa-file-video-o',
                    'fa-file-word-o' => ' fa-file-word-o',
                    'fa-files-o' => ' fa-files-o',
                    'fa-film' => ' fa-film',
                    'fa-filter' => ' fa-filter',
                    'fa-fire' => ' fa-fire',
                    'fa-fire-extinguisher' => ' fa-fire-extinguisher',
                    'fa-flag' => ' fa-flag',
                    'fa-flag-checkered' => ' fa-flag-checkered',
                    'fa-flag-o' => ' fa-flag-o',
                    'fa-flask' => ' fa-flask',
                    'fa-flickr' => ' fa-flickr',
                    'fa-floppy-o' => ' fa-floppy-o',
                    'fa-folder' => ' fa-folder',
                    'fa-folder-o' => ' fa-folder-o',
                    'fa-folder-open' => ' fa-folder-open',
                    'fa-folder-open-o' => ' fa-folder-open-o',
                    'fa-font' => ' fa-font',
                    'fa-forward' => ' fa-forward',
                    'fa-foursquare' => ' fa-foursquare',
                    'fa-frown-o' => ' fa-frown-o',
                    'fa-futbol-o' => ' fa-futbol-o',
                    'fa-gamepad' => ' fa-gamepad',
                    'fa-gavel' => ' fa-gavel',
                    'fa-gbp' => ' fa-gbp',
                    'fa-gift' => ' fa-gift',
                    'fa-git' => ' fa-git',
                    'fa-git-square' => ' fa-git-square',
                    'fa-github' => ' fa-github',
                    'fa-github-alt' => ' fa-github-alt',
                    'fa-github-square' => ' fa-github-square',
                    'fa-gittip' => ' fa-gittip',
                    'fa-glass' => ' fa-glass',
                    'fa-globe' => ' fa-globe',
                    'fa-google' => ' fa-google',
                    'fa-google-plus' => ' fa-google-plus',
                    'fa-google-plus-square' => ' fa-google-plus-square',
                    'fa-google-wallet' => ' fa-google-wallet',
                    'fa-graduation-cap' => ' fa-graduation-cap',
                    'fa-h-square' => ' fa-h-square',
                    'fa-hacker-news' => ' fa-hacker-news',
                    'fa-hand-o-down' => ' fa-hand-o-down',
                    'fa-hand-o-left' => ' fa-hand-o-left',
                    'fa-hand-o-right' => ' fa-hand-o-right',
                    'fa-hand-o-up' => ' fa-hand-o-up',
                    'fa-hdd-o' => ' fa-hdd-o',
                    'fa-header' => ' fa-header',
                    'fa-headphones' => ' fa-headphones',
                    'fa-heart' => ' fa-heart',
                    'fa-heart-o' => ' fa-heart-o',
                    'fa-history' => ' fa-history',
                    'fa-home' => ' fa-home',
                    'fa-hospital-o' => ' fa-hospital-o',
                    'fa-html5' => ' fa-html5',
                    'fa-ils' => ' fa-ils',
                    'fa-inbox' => ' fa-inbox',
                    'fa-indent' => ' fa-indent',
                    'fa-info' => ' fa-info',
                    'fa-info-circle' => ' fa-info-circle',
                    'fa-inr' => ' fa-inr',
                    'fa-instagram' => ' fa-instagram',
                    'fa-ioxhost' => ' fa-ioxhost',
                    'fa-italic' => ' fa-italic',
                    'fa-joomla' => ' fa-joomla',
                    'fa-jpy' => ' fa-jpy',
                    'fa-jsfiddle' => ' fa-jsfiddle',
                    'fa-key' => ' fa-key',
                    'fa-keyboard-o' => ' fa-keyboard-o',
                    'fa-krw' => ' fa-krw',
                    'fa-language' => ' fa-language',
                    'fa-laptop' => ' fa-laptop',
                    'fa-lastfm' => ' fa-lastfm',
                    'fa-lastfm-square' => ' fa-lastfm-square',
                    'fa-leaf' => ' fa-leaf',
                    'fa-lemon-o' => ' fa-lemon-o',
                    'fa-level-down' => ' fa-level-down',
                    'fa-level-up' => ' fa-level-up',
                    'fa-life-ring' => ' fa-life-ring',
                    'fa-lightbulb-o' => ' fa-lightbulb-o',
                    'fa-line-chart' => ' fa-line-chart',
                    'fa-link' => ' fa-link',
                    'fa-linkedin' => ' fa-linkedin',
                    'fa-linkedin-square' => ' fa-linkedin-square',
                    'fa-linux' => ' fa-linux',
                    'fa-list' => ' fa-list',
                    'fa-list-alt' => ' fa-list-alt',
                    'fa-list-ol' => ' fa-list-ol',
                    'fa-list-ul' => ' fa-list-ul',
                    'fa-location-arrow' => ' fa-location-arrow',
                    'fa-lock' => ' fa-lock',
                    'fa-long-arrow-down' => ' fa-long-arrow-down',
                    'fa-long-arrow-left' => ' fa-long-arrow-left',
                    'fa-long-arrow-right' => ' fa-long-arrow-right',
                    'fa-long-arrow-up' => ' fa-long-arrow-up',
                    'fa-magic' => ' fa-magic',
                    'fa-magnet' => ' fa-magnet',
                    'fa-male' => ' fa-male',
                    'fa-map-marker' => ' fa-map-marker',
                    'fa-maxcdn' => ' fa-maxcdn',
                    'fa-meanpath' => ' fa-meanpath',
                    'fa-medkit' => ' fa-medkit',
                    'fa-meh-o' => ' fa-meh-o',
                    'fa-microphone' => ' fa-microphone',
                    'fa-microphone-slash' => ' fa-microphone-slash',
                    'fa-minus' => ' fa-minus',
                    'fa-minus-circle' => ' fa-minus-circle',
                    'fa-minus-square' => ' fa-minus-square',
                    'fa-minus-square-o' => ' fa-minus-square-o',
                    'fa-mobile' => ' fa-mobile',
                    'fa-money' => ' fa-money',
                    'fa-moon-o' => ' fa-moon-o',
                    'fa-music' => ' fa-music',
                    'fa-newspaper-o' => ' fa-newspaper-o',
                    'fa-openid' => ' fa-openid',
                    'fa-outdent' => ' fa-outdent',
                    'fa-pagelines' => ' fa-pagelines',
                    'fa-paint-brush' => ' fa-paint-brush',
                    'fa-paper-plane' => ' fa-paper-plane',
                    'fa-paper-plane-o' => ' fa-paper-plane-o',
                    'fa-paperclip' => ' fa-paperclip',
                    'fa-paragraph' => ' fa-paragraph',
                    'fa-pause' => ' fa-pause',
                    'fa-paw' => ' fa-paw',
                    'fa-paypal' => ' fa-paypal',
                    'fa-pencil' => ' fa-pencil',
                    'fa-pencil-square' => ' fa-pencil-square',
                    'fa-pencil-square-o' => ' fa-pencil-square-o',
                    'fa-phone' => ' fa-phone',
                    'fa-phone-square' => ' fa-phone-square',
                    'fa-picture-o' => ' fa-picture-o',
                    'fa-pie-chart' => ' fa-pie-chart',
                    'fa-pied-piper' => ' fa-pied-piper',
                    'fa-pied-piper-alt' => ' fa-pied-piper-alt',
                    'fa-pinterest' => ' fa-pinterest',
                    'fa-pinterest-square' => ' fa-pinterest-square',
                    'fa-plane' => ' fa-plane',
                    'fa-play' => ' fa-play',
                    'fa-play-circle' => ' fa-play-circle',
                    'fa-play-circle-o' => ' fa-play-circle-o',
                    'fa-plug' => ' fa-plug',
                    'fa-plus' => ' fa-plus',
                    'fa-plus-circle' => ' fa-plus-circle',
                    'fa-plus-square' => ' fa-plus-square',
                    'fa-plus-square-o' => ' fa-plus-square-o',
                    'fa-power-off' => ' fa-power-off',
                    'fa-print' => ' fa-print',
                    'fa-puzzle-piece' => ' fa-puzzle-piece',
                    'fa-qq' => ' fa-qq',
                    'fa-qrcode' => ' fa-qrcode',
                    'fa-question' => ' fa-question',
                    'fa-question-circle' => ' fa-question-circle',
                    'fa-quote-left' => ' fa-quote-left',
                    'fa-quote-right' => ' fa-quote-right',
                    'fa-random' => ' fa-random',
                    'fa-rebel' => ' fa-rebel',
                    'fa-recycle' => ' fa-recycle',
                    'fa-reddit' => ' fa-reddit',
                    'fa-reddit-square' => ' fa-reddit-square',
                    'fa-refresh' => ' fa-refresh',
                    'fa-renren' => ' fa-renren',
                    'fa-repeat' => ' fa-repeat',
                    'fa-reply' => ' fa-reply',
                    'fa-reply-all' => ' fa-reply-all',
                    'fa-retweet' => ' fa-retweet',
                    'fa-road' => ' fa-road',
                    'fa-rocket' => ' fa-rocket',
                    'fa-rss' => ' fa-rss',
                    'fa-rss-square' => ' fa-rss-square',
                    'fa-rub' => ' fa-rub',
                    'fa-scissors' => ' fa-scissors',
                    'fa-search' => ' fa-search',
                    'fa-search-minus' => ' fa-search-minus',
                    'fa-search-plus' => ' fa-search-plus',
                    'fa-share' => ' fa-share',
                    'fa-share-alt' => ' fa-share-alt',
                    'fa-share-alt-square' => ' fa-share-alt-square',
                    'fa-share-square' => ' fa-share-square',
                    'fa-share-square-o' => ' fa-share-square-o',
                    'fa-shield' => ' fa-shield',
                    'fa-shopping-cart' => ' fa-shopping-cart',
                    'fa-sign-in' => ' fa-sign-in',
                    'fa-sign-out' => ' fa-sign-out',
                    'fa-signal' => ' fa-signal',
                    'fa-sitemap' => ' fa-sitemap',
                    'fa-skype' => ' fa-skype',
                    'fa-slack' => ' fa-slack',
                    'fa-sliders' => ' fa-sliders',
                    'fa-slideshare' => ' fa-slideshare',
                    'fa-smile-o' => ' fa-smile-o',
                    'fa-sort' => ' fa-sort',
                    'fa-sort-alpha-asc' => ' fa-sort-alpha-asc',
                    'fa-sort-alpha-desc' => ' fa-sort-alpha-desc',
                    'fa-sort-amount-asc' => ' fa-sort-amount-asc',
                    'fa-sort-amount-desc' => ' fa-sort-amount-desc',
                    'fa-sort-asc' => ' fa-sort-asc',
                    'fa-sort-desc' => ' fa-sort-desc',
                    'fa-sort-numeric-asc' => ' fa-sort-numeric-asc',
                    'fa-sort-numeric-desc' => ' fa-sort-numeric-desc',
                    'fa-soundcloud' => ' fa-soundcloud',
                    'fa-space-shuttle' => ' fa-space-shuttle',
                    'fa-spinner' => ' fa-spinner',
                    'fa-spoon' => ' fa-spoon',
                    'fa-spotify' => ' fa-spotify',
                    'fa-square' => ' fa-square',
                    'fa-square-o' => ' fa-square-o',
                    'fa-stack-exchange' => ' fa-stack-exchange',
                    'fa-stack-overflow' => ' fa-stack-overflow',
                    'fa-star' => ' fa-star',
                    'fa-star-half' => ' fa-star-half',
                    'fa-star-half-o' => ' fa-star-half-o',
                    'fa-star-o' => ' fa-star-o',
                    'fa-steam' => ' fa-steam',
                    'fa-steam-square' => ' fa-steam-square',
                    'fa-step-backward' => ' fa-step-backward',
                    'fa-step-forward' => ' fa-step-forward',
                    'fa-stethoscope' => ' fa-stethoscope',
                    'fa-stop' => ' fa-stop',
                    'fa-strikethrough' => ' fa-strikethrough',
                    'fa-stumbleupon' => ' fa-stumbleupon',
                    'fa-stumbleupon-circle' => ' fa-stumbleupon-circle',
                    'fa-subscript' => ' fa-subscript',
                    'fa-suitcase' => ' fa-suitcase',
                    'fa-sun-o' => ' fa-sun-o',
                    'fa-superscript' => ' fa-superscript',
                    'fa-table' => ' fa-table',
                    'fa-tablet' => ' fa-tablet',
                    'fa-tachometer' => ' fa-tachometer',
                    'fa-tag' => ' fa-tag',
                    'fa-tags' => ' fa-tags',
                    'fa-tasks' => ' fa-tasks',
                    'fa-taxi' => ' fa-taxi',
                    'fa-tencent-weibo' => ' fa-tencent-weibo',
                    'fa-terminal' => ' fa-terminal',
                    'fa-text-height' => ' fa-text-height',
                    'fa-text-width' => ' fa-text-width',
                    'fa-th' => ' fa-th',
                    'fa-th-large' => ' fa-th-large',
                    'fa-th-list' => ' fa-th-list',
                    'fa-thumb-tack' => ' fa-thumb-tack',
                    'fa-thumbs-down' => ' fa-thumbs-down',
                    'fa-thumbs-o-down' => ' fa-thumbs-o-down',
                    'fa-thumbs-o-up' => ' fa-thumbs-o-up',
                    'fa-thumbs-up' => ' fa-thumbs-up',
                    'fa-ticket' => ' fa-ticket',
                    'fa-times' => ' fa-times',
                    'fa-times-circle' => ' fa-times-circle',
                    'fa-times-circle-o' => ' fa-times-circle-o',
                    'fa-tint' => ' fa-tint',
                    'fa-toggle-off' => ' fa-toggle-off',
                    'fa-toggle-on' => ' fa-toggle-on',
                    'fa-trash' => ' fa-trash',
                    'fa-trash-o' => ' fa-trash-o',
                    'fa-tree' => ' fa-tree',
                    'fa-trello' => ' fa-trello',
                    'fa-trophy' => ' fa-trophy',
                    'fa-truck' => ' fa-truck',
                    'fa-try' => ' fa-try',
                    'fa-tty' => ' fa-tty',
                    'fa-tumblr' => ' fa-tumblr',
                    'fa-tumblr-square' => ' fa-tumblr-square',
                    'fa-twitch' => ' fa-twitch',
                    'fa-twitter' => ' fa-twitter',
                    'fa-twitter-square' => ' fa-twitter-square',
                    'fa-umbrella' => ' fa-umbrella',
                    'fa-underline' => ' fa-underline',
                    'fa-undo' => ' fa-undo',
                    'fa-university' => ' fa-university',
                    'fa-unlock' => ' fa-unlock',
                    'fa-unlock-alt' => ' fa-unlock-alt',
                    'fa-upload' => ' fa-upload',
                    'fa-usd' => ' fa-usd',
                    'fa-user' => ' fa-user',
                    'fa-user-md' => ' fa-user-md',
                    'fa-users' => ' fa-users',
                    'fa-video-camera' => ' fa-video-camera',
                    'fa-vimeo-square' => ' fa-vimeo-square',
                    'fa-vine' => ' fa-vine',
                    'fa-vk' => ' fa-vk',
                    'fa-volume-down' => ' fa-volume-down',
                    'fa-volume-off' => ' fa-volume-off',
                    'fa-volume-up' => ' fa-volume-up',
                    'fa-weibo' => ' fa-weibo',
                    'fa-weixin' => ' fa-weixin',
                    'fa-wheelchair' => ' fa-wheelchair',
                    'fa-wifi' => ' fa-wifi',
                    'fa-windows' => ' fa-windows',
                    'fa-wordpress' => ' fa-wordpress',
                    'fa-wrench' => ' fa-wrench',
                    'fa-xing' => ' fa-xing',
                    'fa-xing-square' => ' fa-xing-square',
                    'fa-yahoo' => ' fa-yahoo',
                    'fa-yelp' => ' fa-yelp',
                    'fa-youtube' => ' fa-youtube',
                    'fa-youtube-play' => ' fa-youtube-play',
                    'fa-youtube-square' => ' fa-youtube-square',
                ),
            ),
            array(
                'key' => 'field_541a87e8d1d17',
                'label' => 'Egen bild',
                'name' => 'plug-image-small',
                'type' => 'image',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'small-image',
                        ),
                        array(
                            'field' => 'field_541a873ed1d14',
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
            array(
                'key' => 'field_541aasd41d1d15',
                'label' => 'Ikon',
                'name' => 'plug-icon-big',
                'type' => 'font-awesome',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'big-image',
                        ),
                        array(
                            'field' => 'field_541a881ad1d19',
                            'operator' => '==',
                            'value' => 'icon',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => 'fa-certificate',
                'save_format' => 'class',
                'allow_null' => 0,
                'enqueue_fa' => 0,
                'choices' => array(
                    'fa-adjust' => ' fa-adjust',
                    'fa-adn' => ' fa-adn',
                    'fa-align-center' => ' fa-align-center',
                    'fa-align-justify' => ' fa-align-justify',
                    'fa-align-left' => ' fa-align-left',
                    'fa-align-right' => ' fa-align-right',
                    'fa-ambulance' => ' fa-ambulance',
                    'fa-anchor' => ' fa-anchor',
                    'fa-android' => ' fa-android',
                    'fa-angellist' => ' fa-angellist',
                    'fa-angle-double-down' => ' fa-angle-double-down',
                    'fa-angle-double-left' => ' fa-angle-double-left',
                    'fa-angle-double-right' => ' fa-angle-double-right',
                    'fa-angle-double-up' => ' fa-angle-double-up',
                    'fa-angle-down' => ' fa-angle-down',
                    'fa-angle-left' => ' fa-angle-left',
                    'fa-angle-right' => ' fa-angle-right',
                    'fa-angle-up' => ' fa-angle-up',
                    'fa-apple' => ' fa-apple',
                    'fa-archive' => ' fa-archive',
                    'fa-area-chart' => ' fa-area-chart',
                    'fa-arrow-circle-down' => ' fa-arrow-circle-down',
                    'fa-arrow-circle-left' => ' fa-arrow-circle-left',
                    'fa-arrow-circle-o-down' => ' fa-arrow-circle-o-down',
                    'fa-arrow-circle-o-left' => ' fa-arrow-circle-o-left',
                    'fa-arrow-circle-o-right' => ' fa-arrow-circle-o-right',
                    'fa-arrow-circle-o-up' => ' fa-arrow-circle-o-up',
                    'fa-arrow-circle-right' => ' fa-arrow-circle-right',
                    'fa-arrow-circle-up' => ' fa-arrow-circle-up',
                    'fa-arrow-down' => ' fa-arrow-down',
                    'fa-arrow-left' => ' fa-arrow-left',
                    'fa-arrow-right' => ' fa-arrow-right',
                    'fa-arrow-up' => ' fa-arrow-up',
                    'fa-arrows' => ' fa-arrows',
                    'fa-arrows-alt' => ' fa-arrows-alt',
                    'fa-arrows-h' => ' fa-arrows-h',
                    'fa-arrows-v' => ' fa-arrows-v',
                    'fa-asterisk' => ' fa-asterisk',
                    'fa-at' => ' fa-at',
                    'fa-backward' => ' fa-backward',
                    'fa-ban' => ' fa-ban',
                    'fa-bar-chart' => ' fa-bar-chart',
                    'fa-barcode' => ' fa-barcode',
                    'fa-bars' => ' fa-bars',
                    'fa-beer' => ' fa-beer',
                    'fa-behance' => ' fa-behance',
                    'fa-behance-square' => ' fa-behance-square',
                    'fa-bell' => ' fa-bell',
                    'fa-bell-o' => ' fa-bell-o',
                    'fa-bell-slash' => ' fa-bell-slash',
                    'fa-bell-slash-o' => ' fa-bell-slash-o',
                    'fa-bicycle' => ' fa-bicycle',
                    'fa-binoculars' => ' fa-binoculars',
                    'fa-birthday-cake' => ' fa-birthday-cake',
                    'fa-bitbucket' => ' fa-bitbucket',
                    'fa-bitbucket-square' => ' fa-bitbucket-square',
                    'fa-bold' => ' fa-bold',
                    'fa-bolt' => ' fa-bolt',
                    'fa-bomb' => ' fa-bomb',
                    'fa-book' => ' fa-book',
                    'fa-bookmark' => ' fa-bookmark',
                    'fa-bookmark-o' => ' fa-bookmark-o',
                    'fa-briefcase' => ' fa-briefcase',
                    'fa-btc' => ' fa-btc',
                    'fa-bug' => ' fa-bug',
                    'fa-building' => ' fa-building',
                    'fa-building-o' => ' fa-building-o',
                    'fa-bullhorn' => ' fa-bullhorn',
                    'fa-bullseye' => ' fa-bullseye',
                    'fa-bus' => ' fa-bus',
                    'fa-calculator' => ' fa-calculator',
                    'fa-calendar' => ' fa-calendar',
                    'fa-calendar-o' => ' fa-calendar-o',
                    'fa-camera' => ' fa-camera',
                    'fa-camera-retro' => ' fa-camera-retro',
                    'fa-car' => ' fa-car',
                    'fa-caret-down' => ' fa-caret-down',
                    'fa-caret-left' => ' fa-caret-left',
                    'fa-caret-right' => ' fa-caret-right',
                    'fa-caret-square-o-down' => ' fa-caret-square-o-down',
                    'fa-caret-square-o-left' => ' fa-caret-square-o-left',
                    'fa-caret-square-o-right' => ' fa-caret-square-o-right',
                    'fa-caret-square-o-up' => ' fa-caret-square-o-up',
                    'fa-caret-up' => ' fa-caret-up',
                    'fa-cc' => ' fa-cc',
                    'fa-cc-amex' => ' fa-cc-amex',
                    'fa-cc-discover' => ' fa-cc-discover',
                    'fa-cc-mastercard' => ' fa-cc-mastercard',
                    'fa-cc-paypal' => ' fa-cc-paypal',
                    'fa-cc-stripe' => ' fa-cc-stripe',
                    'fa-cc-visa' => ' fa-cc-visa',
                    'fa-certificate' => ' fa-certificate',
                    'fa-chain-broken' => ' fa-chain-broken',
                    'fa-check' => ' fa-check',
                    'fa-check-circle' => ' fa-check-circle',
                    'fa-check-circle-o' => ' fa-check-circle-o',
                    'fa-check-square' => ' fa-check-square',
                    'fa-check-square-o' => ' fa-check-square-o',
                    'fa-chevron-circle-down' => ' fa-chevron-circle-down',
                    'fa-chevron-circle-left' => ' fa-chevron-circle-left',
                    'fa-chevron-circle-right' => ' fa-chevron-circle-right',
                    'fa-chevron-circle-up' => ' fa-chevron-circle-up',
                    'fa-chevron-down' => ' fa-chevron-down',
                    'fa-chevron-left' => ' fa-chevron-left',
                    'fa-chevron-right' => ' fa-chevron-right',
                    'fa-chevron-up' => ' fa-chevron-up',
                    'fa-child' => ' fa-child',
                    'fa-circle' => ' fa-circle',
                    'fa-circle-o' => ' fa-circle-o',
                    'fa-circle-o-notch' => ' fa-circle-o-notch',
                    'fa-circle-thin' => ' fa-circle-thin',
                    'fa-clipboard' => ' fa-clipboard',
                    'fa-clock-o' => ' fa-clock-o',
                    'fa-cloud' => ' fa-cloud',
                    'fa-cloud-download' => ' fa-cloud-download',
                    'fa-cloud-upload' => ' fa-cloud-upload',
                    'fa-code' => ' fa-code',
                    'fa-code-fork' => ' fa-code-fork',
                    'fa-codepen' => ' fa-codepen',
                    'fa-coffee' => ' fa-coffee',
                    'fa-cog' => ' fa-cog',
                    'fa-cogs' => ' fa-cogs',
                    'fa-columns' => ' fa-columns',
                    'fa-comment' => ' fa-comment',
                    'fa-comment-o' => ' fa-comment-o',
                    'fa-comments' => ' fa-comments',
                    'fa-comments-o' => ' fa-comments-o',
                    'fa-compass' => ' fa-compass',
                    'fa-compress' => ' fa-compress',
                    'fa-copyright' => ' fa-copyright',
                    'fa-credit-card' => ' fa-credit-card',
                    'fa-crop' => ' fa-crop',
                    'fa-crosshairs' => ' fa-crosshairs',
                    'fa-css3' => ' fa-css3',
                    'fa-cube' => ' fa-cube',
                    'fa-cubes' => ' fa-cubes',
                    'fa-cutlery' => ' fa-cutlery',
                    'fa-database' => ' fa-database',
                    'fa-delicious' => ' fa-delicious',
                    'fa-desktop' => ' fa-desktop',
                    'fa-deviantart' => ' fa-deviantart',
                    'fa-digg' => ' fa-digg',
                    'fa-dot-circle-o' => ' fa-dot-circle-o',
                    'fa-download' => ' fa-download',
                    'fa-dribbble' => ' fa-dribbble',
                    'fa-dropbox' => ' fa-dropbox',
                    'fa-drupal' => ' fa-drupal',
                    'fa-eject' => ' fa-eject',
                    'fa-ellipsis-h' => ' fa-ellipsis-h',
                    'fa-ellipsis-v' => ' fa-ellipsis-v',
                    'fa-empire' => ' fa-empire',
                    'fa-envelope' => ' fa-envelope',
                    'fa-envelope-o' => ' fa-envelope-o',
                    'fa-envelope-square' => ' fa-envelope-square',
                    'fa-eraser' => ' fa-eraser',
                    'fa-eur' => ' fa-eur',
                    'fa-exchange' => ' fa-exchange',
                    'fa-exclamation' => ' fa-exclamation',
                    'fa-exclamation-circle' => ' fa-exclamation-circle',
                    'fa-exclamation-triangle' => ' fa-exclamation-triangle',
                    'fa-expand' => ' fa-expand',
                    'fa-external-link' => ' fa-external-link',
                    'fa-external-link-square' => ' fa-external-link-square',
                    'fa-eye' => ' fa-eye',
                    'fa-eye-slash' => ' fa-eye-slash',
                    'fa-eyedropper' => ' fa-eyedropper',
                    'fa-facebook' => ' fa-facebook',
                    'fa-facebook-square' => ' fa-facebook-square',
                    'fa-fast-backward' => ' fa-fast-backward',
                    'fa-fast-forward' => ' fa-fast-forward',
                    'fa-fax' => ' fa-fax',
                    'fa-female' => ' fa-female',
                    'fa-fighter-jet' => ' fa-fighter-jet',
                    'fa-file' => ' fa-file',
                    'fa-file-archive-o' => ' fa-file-archive-o',
                    'fa-file-audio-o' => ' fa-file-audio-o',
                    'fa-file-code-o' => ' fa-file-code-o',
                    'fa-file-excel-o' => ' fa-file-excel-o',
                    'fa-file-image-o' => ' fa-file-image-o',
                    'fa-file-o' => ' fa-file-o',
                    'fa-file-pdf-o' => ' fa-file-pdf-o',
                    'fa-file-powerpoint-o' => ' fa-file-powerpoint-o',
                    'fa-file-text' => ' fa-file-text',
                    'fa-file-text-o' => ' fa-file-text-o',
                    'fa-file-video-o' => ' fa-file-video-o',
                    'fa-file-word-o' => ' fa-file-word-o',
                    'fa-files-o' => ' fa-files-o',
                    'fa-film' => ' fa-film',
                    'fa-filter' => ' fa-filter',
                    'fa-fire' => ' fa-fire',
                    'fa-fire-extinguisher' => ' fa-fire-extinguisher',
                    'fa-flag' => ' fa-flag',
                    'fa-flag-checkered' => ' fa-flag-checkered',
                    'fa-flag-o' => ' fa-flag-o',
                    'fa-flask' => ' fa-flask',
                    'fa-flickr' => ' fa-flickr',
                    'fa-floppy-o' => ' fa-floppy-o',
                    'fa-folder' => ' fa-folder',
                    'fa-folder-o' => ' fa-folder-o',
                    'fa-folder-open' => ' fa-folder-open',
                    'fa-folder-open-o' => ' fa-folder-open-o',
                    'fa-font' => ' fa-font',
                    'fa-forward' => ' fa-forward',
                    'fa-foursquare' => ' fa-foursquare',
                    'fa-frown-o' => ' fa-frown-o',
                    'fa-futbol-o' => ' fa-futbol-o',
                    'fa-gamepad' => ' fa-gamepad',
                    'fa-gavel' => ' fa-gavel',
                    'fa-gbp' => ' fa-gbp',
                    'fa-gift' => ' fa-gift',
                    'fa-git' => ' fa-git',
                    'fa-git-square' => ' fa-git-square',
                    'fa-github' => ' fa-github',
                    'fa-github-alt' => ' fa-github-alt',
                    'fa-github-square' => ' fa-github-square',
                    'fa-gittip' => ' fa-gittip',
                    'fa-glass' => ' fa-glass',
                    'fa-globe' => ' fa-globe',
                    'fa-google' => ' fa-google',
                    'fa-google-plus' => ' fa-google-plus',
                    'fa-google-plus-square' => ' fa-google-plus-square',
                    'fa-google-wallet' => ' fa-google-wallet',
                    'fa-graduation-cap' => ' fa-graduation-cap',
                    'fa-h-square' => ' fa-h-square',
                    'fa-hacker-news' => ' fa-hacker-news',
                    'fa-hand-o-down' => ' fa-hand-o-down',
                    'fa-hand-o-left' => ' fa-hand-o-left',
                    'fa-hand-o-right' => ' fa-hand-o-right',
                    'fa-hand-o-up' => ' fa-hand-o-up',
                    'fa-hdd-o' => ' fa-hdd-o',
                    'fa-header' => ' fa-header',
                    'fa-headphones' => ' fa-headphones',
                    'fa-heart' => ' fa-heart',
                    'fa-heart-o' => ' fa-heart-o',
                    'fa-history' => ' fa-history',
                    'fa-home' => ' fa-home',
                    'fa-hospital-o' => ' fa-hospital-o',
                    'fa-html5' => ' fa-html5',
                    'fa-ils' => ' fa-ils',
                    'fa-inbox' => ' fa-inbox',
                    'fa-indent' => ' fa-indent',
                    'fa-info' => ' fa-info',
                    'fa-info-circle' => ' fa-info-circle',
                    'fa-inr' => ' fa-inr',
                    'fa-instagram' => ' fa-instagram',
                    'fa-ioxhost' => ' fa-ioxhost',
                    'fa-italic' => ' fa-italic',
                    'fa-joomla' => ' fa-joomla',
                    'fa-jpy' => ' fa-jpy',
                    'fa-jsfiddle' => ' fa-jsfiddle',
                    'fa-key' => ' fa-key',
                    'fa-keyboard-o' => ' fa-keyboard-o',
                    'fa-krw' => ' fa-krw',
                    'fa-language' => ' fa-language',
                    'fa-laptop' => ' fa-laptop',
                    'fa-lastfm' => ' fa-lastfm',
                    'fa-lastfm-square' => ' fa-lastfm-square',
                    'fa-leaf' => ' fa-leaf',
                    'fa-lemon-o' => ' fa-lemon-o',
                    'fa-level-down' => ' fa-level-down',
                    'fa-level-up' => ' fa-level-up',
                    'fa-life-ring' => ' fa-life-ring',
                    'fa-lightbulb-o' => ' fa-lightbulb-o',
                    'fa-line-chart' => ' fa-line-chart',
                    'fa-link' => ' fa-link',
                    'fa-linkedin' => ' fa-linkedin',
                    'fa-linkedin-square' => ' fa-linkedin-square',
                    'fa-linux' => ' fa-linux',
                    'fa-list' => ' fa-list',
                    'fa-list-alt' => ' fa-list-alt',
                    'fa-list-ol' => ' fa-list-ol',
                    'fa-list-ul' => ' fa-list-ul',
                    'fa-location-arrow' => ' fa-location-arrow',
                    'fa-lock' => ' fa-lock',
                    'fa-long-arrow-down' => ' fa-long-arrow-down',
                    'fa-long-arrow-left' => ' fa-long-arrow-left',
                    'fa-long-arrow-right' => ' fa-long-arrow-right',
                    'fa-long-arrow-up' => ' fa-long-arrow-up',
                    'fa-magic' => ' fa-magic',
                    'fa-magnet' => ' fa-magnet',
                    'fa-male' => ' fa-male',
                    'fa-map-marker' => ' fa-map-marker',
                    'fa-maxcdn' => ' fa-maxcdn',
                    'fa-meanpath' => ' fa-meanpath',
                    'fa-medkit' => ' fa-medkit',
                    'fa-meh-o' => ' fa-meh-o',
                    'fa-microphone' => ' fa-microphone',
                    'fa-microphone-slash' => ' fa-microphone-slash',
                    'fa-minus' => ' fa-minus',
                    'fa-minus-circle' => ' fa-minus-circle',
                    'fa-minus-square' => ' fa-minus-square',
                    'fa-minus-square-o' => ' fa-minus-square-o',
                    'fa-mobile' => ' fa-mobile',
                    'fa-money' => ' fa-money',
                    'fa-moon-o' => ' fa-moon-o',
                    'fa-music' => ' fa-music',
                    'fa-newspaper-o' => ' fa-newspaper-o',
                    'fa-openid' => ' fa-openid',
                    'fa-outdent' => ' fa-outdent',
                    'fa-pagelines' => ' fa-pagelines',
                    'fa-paint-brush' => ' fa-paint-brush',
                    'fa-paper-plane' => ' fa-paper-plane',
                    'fa-paper-plane-o' => ' fa-paper-plane-o',
                    'fa-paperclip' => ' fa-paperclip',
                    'fa-paragraph' => ' fa-paragraph',
                    'fa-pause' => ' fa-pause',
                    'fa-paw' => ' fa-paw',
                    'fa-paypal' => ' fa-paypal',
                    'fa-pencil' => ' fa-pencil',
                    'fa-pencil-square' => ' fa-pencil-square',
                    'fa-pencil-square-o' => ' fa-pencil-square-o',
                    'fa-phone' => ' fa-phone',
                    'fa-phone-square' => ' fa-phone-square',
                    'fa-picture-o' => ' fa-picture-o',
                    'fa-pie-chart' => ' fa-pie-chart',
                    'fa-pied-piper' => ' fa-pied-piper',
                    'fa-pied-piper-alt' => ' fa-pied-piper-alt',
                    'fa-pinterest' => ' fa-pinterest',
                    'fa-pinterest-square' => ' fa-pinterest-square',
                    'fa-plane' => ' fa-plane',
                    'fa-play' => ' fa-play',
                    'fa-play-circle' => ' fa-play-circle',
                    'fa-play-circle-o' => ' fa-play-circle-o',
                    'fa-plug' => ' fa-plug',
                    'fa-plus' => ' fa-plus',
                    'fa-plus-circle' => ' fa-plus-circle',
                    'fa-plus-square' => ' fa-plus-square',
                    'fa-plus-square-o' => ' fa-plus-square-o',
                    'fa-power-off' => ' fa-power-off',
                    'fa-print' => ' fa-print',
                    'fa-puzzle-piece' => ' fa-puzzle-piece',
                    'fa-qq' => ' fa-qq',
                    'fa-qrcode' => ' fa-qrcode',
                    'fa-question' => ' fa-question',
                    'fa-question-circle' => ' fa-question-circle',
                    'fa-quote-left' => ' fa-quote-left',
                    'fa-quote-right' => ' fa-quote-right',
                    'fa-random' => ' fa-random',
                    'fa-rebel' => ' fa-rebel',
                    'fa-recycle' => ' fa-recycle',
                    'fa-reddit' => ' fa-reddit',
                    'fa-reddit-square' => ' fa-reddit-square',
                    'fa-refresh' => ' fa-refresh',
                    'fa-renren' => ' fa-renren',
                    'fa-repeat' => ' fa-repeat',
                    'fa-reply' => ' fa-reply',
                    'fa-reply-all' => ' fa-reply-all',
                    'fa-retweet' => ' fa-retweet',
                    'fa-road' => ' fa-road',
                    'fa-rocket' => ' fa-rocket',
                    'fa-rss' => ' fa-rss',
                    'fa-rss-square' => ' fa-rss-square',
                    'fa-rub' => ' fa-rub',
                    'fa-scissors' => ' fa-scissors',
                    'fa-search' => ' fa-search',
                    'fa-search-minus' => ' fa-search-minus',
                    'fa-search-plus' => ' fa-search-plus',
                    'fa-share' => ' fa-share',
                    'fa-share-alt' => ' fa-share-alt',
                    'fa-share-alt-square' => ' fa-share-alt-square',
                    'fa-share-square' => ' fa-share-square',
                    'fa-share-square-o' => ' fa-share-square-o',
                    'fa-shield' => ' fa-shield',
                    'fa-shopping-cart' => ' fa-shopping-cart',
                    'fa-sign-in' => ' fa-sign-in',
                    'fa-sign-out' => ' fa-sign-out',
                    'fa-signal' => ' fa-signal',
                    'fa-sitemap' => ' fa-sitemap',
                    'fa-skype' => ' fa-skype',
                    'fa-slack' => ' fa-slack',
                    'fa-sliders' => ' fa-sliders',
                    'fa-slideshare' => ' fa-slideshare',
                    'fa-smile-o' => ' fa-smile-o',
                    'fa-sort' => ' fa-sort',
                    'fa-sort-alpha-asc' => ' fa-sort-alpha-asc',
                    'fa-sort-alpha-desc' => ' fa-sort-alpha-desc',
                    'fa-sort-amount-asc' => ' fa-sort-amount-asc',
                    'fa-sort-amount-desc' => ' fa-sort-amount-desc',
                    'fa-sort-asc' => ' fa-sort-asc',
                    'fa-sort-desc' => ' fa-sort-desc',
                    'fa-sort-numeric-asc' => ' fa-sort-numeric-asc',
                    'fa-sort-numeric-desc' => ' fa-sort-numeric-desc',
                    'fa-soundcloud' => ' fa-soundcloud',
                    'fa-space-shuttle' => ' fa-space-shuttle',
                    'fa-spinner' => ' fa-spinner',
                    'fa-spoon' => ' fa-spoon',
                    'fa-spotify' => ' fa-spotify',
                    'fa-square' => ' fa-square',
                    'fa-square-o' => ' fa-square-o',
                    'fa-stack-exchange' => ' fa-stack-exchange',
                    'fa-stack-overflow' => ' fa-stack-overflow',
                    'fa-star' => ' fa-star',
                    'fa-star-half' => ' fa-star-half',
                    'fa-star-half-o' => ' fa-star-half-o',
                    'fa-star-o' => ' fa-star-o',
                    'fa-steam' => ' fa-steam',
                    'fa-steam-square' => ' fa-steam-square',
                    'fa-step-backward' => ' fa-step-backward',
                    'fa-step-forward' => ' fa-step-forward',
                    'fa-stethoscope' => ' fa-stethoscope',
                    'fa-stop' => ' fa-stop',
                    'fa-strikethrough' => ' fa-strikethrough',
                    'fa-stumbleupon' => ' fa-stumbleupon',
                    'fa-stumbleupon-circle' => ' fa-stumbleupon-circle',
                    'fa-subscript' => ' fa-subscript',
                    'fa-suitcase' => ' fa-suitcase',
                    'fa-sun-o' => ' fa-sun-o',
                    'fa-superscript' => ' fa-superscript',
                    'fa-table' => ' fa-table',
                    'fa-tablet' => ' fa-tablet',
                    'fa-tachometer' => ' fa-tachometer',
                    'fa-tag' => ' fa-tag',
                    'fa-tags' => ' fa-tags',
                    'fa-tasks' => ' fa-tasks',
                    'fa-taxi' => ' fa-taxi',
                    'fa-tencent-weibo' => ' fa-tencent-weibo',
                    'fa-terminal' => ' fa-terminal',
                    'fa-text-height' => ' fa-text-height',
                    'fa-text-width' => ' fa-text-width',
                    'fa-th' => ' fa-th',
                    'fa-th-large' => ' fa-th-large',
                    'fa-th-list' => ' fa-th-list',
                    'fa-thumb-tack' => ' fa-thumb-tack',
                    'fa-thumbs-down' => ' fa-thumbs-down',
                    'fa-thumbs-o-down' => ' fa-thumbs-o-down',
                    'fa-thumbs-o-up' => ' fa-thumbs-o-up',
                    'fa-thumbs-up' => ' fa-thumbs-up',
                    'fa-ticket' => ' fa-ticket',
                    'fa-times' => ' fa-times',
                    'fa-times-circle' => ' fa-times-circle',
                    'fa-times-circle-o' => ' fa-times-circle-o',
                    'fa-tint' => ' fa-tint',
                    'fa-toggle-off' => ' fa-toggle-off',
                    'fa-toggle-on' => ' fa-toggle-on',
                    'fa-trash' => ' fa-trash',
                    'fa-trash-o' => ' fa-trash-o',
                    'fa-tree' => ' fa-tree',
                    'fa-trello' => ' fa-trello',
                    'fa-trophy' => ' fa-trophy',
                    'fa-truck' => ' fa-truck',
                    'fa-try' => ' fa-try',
                    'fa-tty' => ' fa-tty',
                    'fa-tumblr' => ' fa-tumblr',
                    'fa-tumblr-square' => ' fa-tumblr-square',
                    'fa-twitch' => ' fa-twitch',
                    'fa-twitter' => ' fa-twitter',
                    'fa-twitter-square' => ' fa-twitter-square',
                    'fa-umbrella' => ' fa-umbrella',
                    'fa-underline' => ' fa-underline',
                    'fa-undo' => ' fa-undo',
                    'fa-university' => ' fa-university',
                    'fa-unlock' => ' fa-unlock',
                    'fa-unlock-alt' => ' fa-unlock-alt',
                    'fa-upload' => ' fa-upload',
                    'fa-usd' => ' fa-usd',
                    'fa-user' => ' fa-user',
                    'fa-user-md' => ' fa-user-md',
                    'fa-users' => ' fa-users',
                    'fa-video-camera' => ' fa-video-camera',
                    'fa-vimeo-square' => ' fa-vimeo-square',
                    'fa-vine' => ' fa-vine',
                    'fa-vk' => ' fa-vk',
                    'fa-volume-down' => ' fa-volume-down',
                    'fa-volume-off' => ' fa-volume-off',
                    'fa-volume-up' => ' fa-volume-up',
                    'fa-weibo' => ' fa-weibo',
                    'fa-weixin' => ' fa-weixin',
                    'fa-wheelchair' => ' fa-wheelchair',
                    'fa-wifi' => ' fa-wifi',
                    'fa-windows' => ' fa-windows',
                    'fa-wordpress' => ' fa-wordpress',
                    'fa-wrench' => ' fa-wrench',
                    'fa-xing' => ' fa-xing',
                    'fa-xing-square' => ' fa-xing-square',
                    'fa-yahoo' => ' fa-yahoo',
                    'fa-yelp' => ' fa-yelp',
                    'fa-youtube' => ' fa-youtube',
                    'fa-youtube-play' => ' fa-youtube-play',
                    'fa-youtube-square' => ' fa-youtube-square',
                ),
            ),
            array(
                'key' => 'field_541a87e8d123sa7',
                'label' => 'Egen bild',
                'name' => 'plug-image-big',
                'type' => 'image',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8616d1d12',
                            'operator' => '==',
                            'value' => 'big-image',
                        ),
                        array(
                            'field' => 'field_541a881ad1d19',
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
            array(
                'key' => 'field_541a8dccc5e21',
                'label' => 'Utseende',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541a9cbd1f1f7',
                'label' => 'Storlek',
                'name' => 'plug-size',
                'type' => 'radio',
                'instructions' => 'Välj vilken storlek puffen skall ha',
                'choices' => array(
                    9 => 'Stor (75%)',
                    6 => 'Medium (50%)',
                    4 => 'Liten (33%)',
                    3 => 'Minst (25%)',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 3,
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_592821e6a1b68',
                'label' => 'Bakgrundsfärg',
                'name' => 'plug-bgcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken bakgrundsfärg puffen skall ha.',
                'default_value' => '#333333',
            ),
            array(
                'key' => 'field_59241236a1b68',
                'label' => 'Textfärg',
                'name' => 'plug-textcolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg texten i puffen skall ha.',
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_592821e6a1a37',
                'label' => 'Bakgrundsfärg : Hover',
                'name' => 'plug-bghovercolor',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken hover-bakgrundsfärg puffen skall ha.',
                'default_value' => '#333333',
            ),
            array(
                'key' => 'field_541a8ddbc6f12',
                'label' => 'Länkning',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_541a8951d1d20',
                'label' => 'Länktyp',
                'name' => 'plug-link-type',
                'type' => 'radio',
                'choices' => array(
                    'internal' => 'Lokal sida',
                    'external' => 'Extern URL',
                    'file' => 'Fil',
                    'false' => 'Ingen länk',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'internal',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_541a8995d1d21',
                'label' => 'Lokal sida',
                'name' => 'plug-link-internal',
                'type' => 'page_link',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8951d1d20',
                            'operator' => '==',
                            'value' => 'internal',
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
                'key' => 'field_541a89b4d1d22',
                'label' => 'Extern URL',
                'name' => 'plug-link-external',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8951d1d20',
                            'operator' => '==',
                            'value' => 'external',
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
                'key' => 'field_541ranbo1d22',
                'label' => 'Fil',
                'name' => 'plug-link-file',
                'prefix' => '',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'return_format' => 'url',
                'library' => 'all',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8951d1d20',
                            'operator' => '==',
                            'value' => 'file',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_541a89cdd1d23',
                'label' => 'Länkbeteende',
                'name' => 'plug-link-target',
                'type' => 'radio',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541a8951d1d20',
                            'operator' => '!=',
                            'value' => 'false',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    '_self' => 'Öppna i samma fönster',
                    '_blank' => 'Öppna i nytt fönster',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'plug',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array(
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

function bytbil_show_plugs_sidebar($id)
{
    $plug_type = get_field('plug-type', $id);
    $plug_text = get_field('plug-text', $id);
    $plug_link_type = get_field('plug-link-type', $id);
    $plug_image_small = get_field('plug-image-small', $id);
    $plug_image_big = get_field('plug-image-big', $id);
    $plug_bgcolor = get_field('plug-bgcolor', $id);
    $plug_textcolor = get_field('plug-textcolor', $id);
    $plug_bghovercolor = get_field('plug-bghovercolor', $id);

    if ($plug_bgcolor || $plug_textcolor || $plug_bghovercolor) : ?>
        <style>
            #plug-<?php echo $id; ?>:link, #plug-<?php echo $id; ?>:visited {

            <?php if($plug_bgcolor) {?> background-color: <?php echo $plug_bgcolor; ?>;
            <?php }

            if($plug_textcolor) {?> color: <?php echo $plug_textcolor; ?>;
            <?php } ?>
            }

            #plug-<?php echo $id; ?>:hover {
            <?php if($plug_bghovercolor){?> background-color: <?php echo $plug_bghovercolor; ?>;
            <?php } ?>
            }
        </style>
    <?php endif; ?>

    <div class="col-xs-12">
        <?php if ($plug_link_type != 'false'){ ?>
        <a href="<?php if ($plug_link_type == 'internal') {
            echo get_field('plug-link-internal', $id);
        } else if ($plug_link_type == "external") {
            echo get_field('plug-link-external', $id);
        } else if ($plug_link_type == "file") {
            the_field("plug-link-file", $id);
        } else {
            echo "#";
        } ?>" class="plug" id="plug-<?php echo $id; ?>" target="<?php echo get_field('plug-link-target', $id); ?>">
            <?php } else { ?>
            <span class="plug">
		<?php } ?>
                <?php
                if ($plug_type == 'text') { ?>
                    <span class="plug-text">
						<?php echo $plug_text; ?>
					</span>
                <?php } elseif ($plug_type == 'small-image') { ?>
                    <span class="plug-icon">
						<?php
                        if (get_field('plug-small-type', $id) == 'icon') {
                            ?>
                            <i class="fa fa-fw <?php echo get_field('plug-icon-small', $id); ?>"></i>
                        <?php } elseif (get_field('plug-small-type', $id) == 'image') {
                            ?>
                            <img src="<?php echo $plug_image_small['url']; ?>"/>
                        <?php } ?>
					</span>
                    <span class="plug-icon-text">
						<?php echo $plug_text; ?>
					</span>
                <?php } elseif ($plug_type == 'big-image') { ?>
                    <span class="plug-image">
						<?php
                        if (get_field('plug-big-type', $id) == 'icon') {
                            ?>
                            <div class="plug-big-icon">
                                <i class="fa fa-fw <?php echo get_field('plug-icon-big', $id); ?>"></i>
                            </div>
                        <?php } elseif (get_field('plug-big-type', $id) == 'image') {
                            ?>
                            <div class="plug-big-image"
                                 style="background-image: url(<?php echo $plug_image_big['url']; ?>);">
                            </div>
                        <?php } ?>
					</span>
                    <span class="plug-image-text">
						<h3><?php echo $plug_text; ?></h3>
					</span>
                <?php } ?>
                <?php if ($plug_link_type != 'false'){ ?>
        </a>
    <?php } else { ?>
			</span>
		<?php } ?>
    </div>
<?php
}


function bytbil_show_plug($id, $size = 12)
{
    $plug_size = get_field('plug-size', $id);

    if ($size == 12) {
        $plug_size = $plug_size;
    } else if ($size == 9 && $plug_size == 3) {
        $plug_size = 6;
    } else {
        $plug_size = 12;
    }

    $plug_type = get_field('plug-type', $id);
    $plug_text = get_field('plug-text', $id);
    $plug_link_type = get_field('plug-link-type', $id);
    $plug_image_small = get_field('plug-image-small', $id);
    $plug_image_big = get_field('plug-image-big', $id);
    $plug_bgcolor = get_field('plug-bgcolor', $id);
    $plug_textcolor = get_field('plug-textcolor', $id);
    $plug_bghovercolor = get_field('plug-bghovercolor', $id);

    if ($plug_bgcolor || $plug_textcolor) : ?>
        <style>
            #plug-<?php echo $id; ?>:link, #plug-<?php echo $id; ?>:visited {

            <?php if($plug_bgcolor) {?> background-color: <?php echo $plug_bgcolor; ?>;
            <?php }

            if($plug_textcolor) {?> color: <?php echo $plug_textcolor; ?>;
            <?php } ?>
            }

            #plug-<?php echo $id; ?> h3 {
            <?php if($plug_textcolor) {?> color: <?php echo $plug_textcolor; ?>;
            <?php } ?>
            }

            #plug-<?php echo $id; ?>:hover {
            <?php if($plug_bghovercolor){?> background-color: <?php echo $plug_bghovercolor; ?>;
            <?php } ?>
            }

        </style>
    <?php endif; ?>

    <div class="col-xs-12 col-sm-<?php echo $plug_size; ?>">
        <?php if ($plug_link_type != 'false'){ ?>
        <a href="<?php if ($plug_link_type == 'internal') {
            echo get_field('plug-link-internal', $id);
        } else if ($plug_link_type == "external") {
            echo get_field('plug-link-external', $id);
        } else if ($plug_link_type == "file") {
            $file = get_field("plug-link-file", $id);
            echo $file["url"];
        } else {
            echo "#";
        } ?>" class="plug <?php echo $plug_type; ?>" id="plug-<?php echo $id; ?>"
           target="<?php echo get_field('plug-link-target', $id); ?>">
            <?php } else { ?>
            <span class="plug <?php echo $plug_type; ?>">
		<?php } ?>
                <?php
                if ($plug_type == 'text') { ?>
                    <span class="plug-text">
						<?php echo $plug_text; ?>
					</span>
                <?php } elseif ($plug_type == 'small-image') { ?>
                    <span class="plug-icon">
						<?php
                        if (get_field('plug-small-type', $id) == 'icon') {
                            ?>
                            <i class="fa fa-fw <?php echo get_field('plug-icon-small', $id); ?>"></i>
                        <?php } elseif (get_field('plug-small-type', $id) == 'image') {
                            ?>
                            <img src="<?php echo $plug_image_small['url']; ?>"/>
                        <?php } ?>
					</span>
                    <span class="plug-icon-text">
						<?php echo $plug_text; ?>
					</span>
                <?php } elseif ($plug_type == 'big-image') { ?>
                    <span class="plug-image">
						<?php
                        if (get_field('plug-big-type', $id) == 'icon') {
                            ?>
                            <div class="plug-big-icon">
                                <i class="fa fa-fw <?php echo get_field('plug-icon-big', $id); ?>"></i>
                            </div>
                        <?php } elseif (get_field('plug-big-type', $id) == 'image') {
                            ?>
                            <img src="<?php echo $plug_image_big['url']; ?>" alt="<?php echo $plug_text; ?>"/>
                        <?php } ?>
					</span>
                    <span class="plug-image-text">
						<h3><?php echo $plug_text; ?></h3>
					</span>
                <?php } ?>
                <?php if ($plug_link_type != 'false'){ ?>
        </a>
    <?php } else { ?>
			</span>
		<?php } ?>
    </div>
<?php
}

?>
