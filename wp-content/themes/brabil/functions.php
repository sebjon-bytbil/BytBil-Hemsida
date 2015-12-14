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
require_once(plugin_dir_path(__FILE__) . '../../plugins/bb-admin/bb-admin.php');
require_once(plugin_dir_path(__FILE__) . "../../mu-plugins/BBCore/BBCore.php");
require_once(plugin_dir_path(__FILE__) . 'includes/settings/settings.php');
require_once(plugin_dir_path(__FILE__) . 'vc_params/vc_params.php');

function register_my_menu()
{
    register_nav_menu('header-menu',__('Header Menu'));
}
add_action('init', 'register_my_menu');