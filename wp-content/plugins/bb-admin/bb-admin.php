<?php
/*
Plugin Name: BytBil Hemsida - Administration
Description: Admintema och förändringar för BytBil Hemsida
Author: Sebastian Jonsson : BytBil.com
Version: 3.0
Author URI: http://www.bytbil.com
*/

// Load Jquery in Admin
function jquery_admin()
{
    global $concatenate_scripts;
    $concatenate_scripts = false;
    wp_register_script('jquery', ('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'), false, '1.x', true);
}
add_action('admin_init', 'jquery_admin');


// Load Admin Styles and Scripts
function bytbil_admin_styles()
{
    wp_enqueue_style('bytbil_admin', plugins_url('css/bb-hemsida-admin.css', __FILE__));
    wp_enqueue_script('bytbil_admin', plugins_url('js/bb-hemsida-admin.js', __FILE__), array('jquery'));
}
add_action('admin_enqueue_scripts', 'bytbil_admin_styles');


// Ändra Loginfönster
function bytbil_login()
{
    wp_enqueue_style('bytbil_admin', plugins_url('css/bytbilcms_login.css', __FILE__));
}
add_action('login_enqueue_scripts', 'bytbil_login');