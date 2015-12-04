<?php 

/* BytBil */
//require_once(plugin_dir_path(__FILE__) . 'includes/cpts.php');
//require_once(plugin_dir_path(__FILE__) . "includes/iconspicker.php");
require_once(plugin_dir_path(__FILE__) . '../../plugins/bb-admin/bb-admin.php');
require_once(plugin_dir_path(__FILE__) . 'vc_params/vc_params.php');

function register_my_menu()
{
    register_nav_menu('header-menu',__('Header Menu'));
}
add_action('init', 'register_my_menu');