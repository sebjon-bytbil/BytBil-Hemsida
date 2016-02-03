<?php 
/* Vendor */
//include plugin_dir_path(__FILE__) . '../../mu-plugins/acf-repeater-collapser/acf_repeater_collapser.php';
//include plugin_dir_path(__FILE__) . '../../mu-plugins/advanced-custom-fields/acf.php';
//include plugin_dir_path(__FILE__) . '../../mu-plugins/acf-repeater/acf-repeater.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/advanced-custom-fields-code-area-field/acf-code_area.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/advanced-custom-fields-font-awesome/acf-font-awesome.php';
//include plugin_dir_path(__FILE__) . '../../mu-plugins/google-analytics-dashboard-for-wp/gadwp.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/mce-table-buttons/mce_table_buttons.php';
/* BytBil */

require_once(plugin_dir_path(__FILE__) . "includes/iconspicker.php");
require_once(plugin_dir_path(__FILE__) . 'includes/image-sizes.php');
require_once(plugin_dir_path(__FILE__) . 'includes/taxonomies.php');
require_once(plugin_dir_path(__FILE__) . "includes/bytbilcms-personal/bytbilcms-personal.php");
require_once(plugin_dir_path(__FILE__) . 'includes/bytbilcms-erbjudanden/bytbilcms-erbjudanden.php');
require_once(plugin_dir_path(__FILE__) . '../../plugins/bb-admin/bb-admin.php');
+require_once(plugin_dir_path(__FILE__) . 'includes/brabil-marken/brabil-marken.php');
require_once(plugin_dir_path(__FILE__) . 'includes/tinymce-buttons/tinymce-buttons.php');
require_once(plugin_dir_path(__FILE__) . "../../mu-plugins/BBCore/BBCore.php");
require_once(plugin_dir_path(__FILE__) . 'includes/settings/settings.php');
require_once(plugin_dir_path(__FILE__) . 'vc_params/vc_params.php');
require_once(plugin_dir_path(__FILE__) . 'includes/wp_bootstrap_navwalker.php');

if (!function_exists('bytbil_show_assortment')) {
    require_once('includes/brabil-fordonsurval/brabil-fordonsurval.php');
}


// Add specific CSS class by filter
add_filter( 'body_class', 'body_offcanvas' );
function body_offcanvas( $classes ) {
	// add 'class-name' to the $classes array
	$classes[] = 'body-offcanvas';
	// return the $classes array
	return $classes;
}

function theme_hex2rgba($color, $opacity = false)
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
    }
    elseif ($opacity == '0') {
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    }else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}

function register_my_menu()
{
    register_nav_menu('header-menu',__('Huvudmeny'));
    register_nav_menu('footer-menu',__('Sidfot'));
}
add_action('init', 'register_my_menu');