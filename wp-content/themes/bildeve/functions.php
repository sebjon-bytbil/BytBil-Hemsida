<?php

include_once('breadcrumbs.php');
include_once('wp_bootstrap_navwalker.php');
//require_once('wp-simple-301-redirects.php');
//require_once('plugins/anlaggningar.php');
include_once('plugins/bildeve-settings.php');


/* Custom plugins 
if (!function_exists('bytbil_brands')) {
    include_once('plugins/bildeve-marken/bildeve-marken.php');
}
*/
/*
if (!function_exists('bytbil_show_facility_all')) {
    include_once('plugins/bildeve-anlaggning/bildeve-anlaggning.php');
}*/


/* Settings */
if (function_exists('acf_set_options_page_title')) {
    acf_set_options_page_title('BytBil CMS');
    acf_add_options_sub_page('Inställningar');
    acf_add_options_sub_page('Startsida');
}


function register_theme_menu() {
    register_nav_menus( array(
        'primary' => __( 'Huvudmeny', 'bildeve' ),
        'footer' => __( 'Sidfot', 'bildeve' ),
    ) );
}

add_action('init', 'register_theme_menu');


function custom_excerpt_length($length) {
    return 18;
}


function get_ID_by_slug($page_slug)
{
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

/*add_action('init', 'highlight_init_jquery');*/
/*add_action('wp_print_scripts', 'highlight_set_query');*/

?>
