<?php

include_once('breadcrumbs.php');
include_once('wp_bootstrap_navwalker.php');
include_once('plugins/bildeve-settings.php');

require_once(plugin_dir_path(__FILE__) . "inc/iconspicker.php");

/* Custom plugins */
if (!function_exists('bytbil_brands')) {
    include_once('plugins/bildeve-marken/bildeve-marken.php');
}
if (!function_exists('bytbil_show_facility_all')) {
    include_once('plugins/bildeve-anlaggning/bildeve-anlaggning.php');
}
if (!function_exists('bytbil_show_assortment')) {
    include_once('plugins/bildeve-fordonsurval/bildeve-fordonsurval.php');
}

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

add_filter( 'vc_load_default_templates', 'my_custom_template_modify_array' ); // Hook in
function my_custom_template_modify_array( $data ) {
    return array(); // This will remove all default templates. Basically you should use native PHP functions to modify existing array and then return it.
}

/*add_action('init', 'highlight_init_jquery');
add_action('wp_print_scripts', 'highlight_set_query');*/

function new_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag)
{
    if (!is_admin()) {
        if ($tag == 'vc_row' || $tag == 'vc_row_inner') {
            $class_string = str_replace('vc_row-fluid', 'row', $class_string);
        }
        if ($tag == 'vc_column' || $tag == 'vc_column_inner') {
            $class_string = preg_replace('/vc_(col-\w{1,2}-\d{1,2})/', '$1', $class_string);
        }
    }

    return $class_string; // Important: you should always return modified or original $class_string
}
add_filter('vc_shortcodes_css_class', 'new_custom_css_classes_for_vc_row_and_vc_column', 10, 2);

?>
