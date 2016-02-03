<?php
/*
Plugin Name: Mazda Återförsäljarinställningar
Plugin URI: http://www.bytbil.com/
Description: Lägger till Återförsäljarinformation och funktioner som kan användas i temat.
Version: 1.0.0
Author: Sebastian Jonsson : BytBil Nordic AB
Author URI: http://www.bytbil.com/
*/

/* Settings */
if (function_exists('acf_set_options_page_title')) {
    acf_set_options_page_title('Mazda Återförsäljare');
    acf_add_options_sub_page('Inställningar');
}

include 'content/retailer-settings.php';
include 'content/retailer-facilities.php';
include 'content/retailer-plugs.php';
include 'content/mazda-content-blocks/mazda-content-blocks.php';


function bytbil_change_login()
{
    wp_enqueue_style('mazda-login', get_template_directory_uri() . '/plugins/mazda-settings/login.css');
}
add_action('login_enqueue_scripts', 'bytbil_change_login');

?>
