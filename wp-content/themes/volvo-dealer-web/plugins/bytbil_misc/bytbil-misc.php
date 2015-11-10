<?php
/**
 * Plugin Name: BytBil Misc
 * Plugin URI:
 * Description: Diverse inställningar (Colorschemes, döljer saker etc)
 * Version: 0.1
 * Author: Provide IT
 * Author URI: http://www.provideit.se
 * License:
 */

// include_once('bytbil_create_options.php');

// Set site as not master site if no option is set
function addMultisiteMasterOption()
{
    if (add_option('multisite_master', false)) {
    }
}

add_action('admin_init', 'addMultisiteMasterOption', 1);

function custom_menu_order($menu_ord)
{
    if (!$menu_ord) return true;
    $menu = 'acf-options';
    $menu_ord = array_diff($menu_ord, array($menu));
    array_splice($menu_ord, 3, 0, array($menu));
    return $menu_ord;
}

add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');