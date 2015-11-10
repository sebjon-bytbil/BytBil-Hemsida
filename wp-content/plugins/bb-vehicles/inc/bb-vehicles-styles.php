<?php
// Load Admin Styles and Scripts
function bytbil_vehicle_styles()
{
    wp_enqueue_style('bb_vehicles_admin', plugins_url('css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('bb_vehicles_admin2', plugins_url('css/bootstrap-theme.min.css', __FILE__));
    wp_enqueue_style('bb_vehicles_admin3', plugins_url('css/bootstrap-select.min.css', __FILE__));
    wp_enqueue_style('bb_vehicles_admin31', plugins_url('css/brabil.css', __FILE__));
    wp_enqueue_style('bb_vehicles_admin32', plugins_url('css/cars.css', __FILE__));
    wp_enqueue_style('bb_vehicles_admin34', 'http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
    wp_enqueue_script('bb_vehicles_admin4', plugins_url('js/bootstrap.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('bb_vehicles_admin5', plugins_url('js/bootstrap-select.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('bb_vehicles_admin6', plugins_url('js/isotope.pkgd.min.js', __FILE__), array('jquery'));
}
add_action('wp_enqueue_scripts', 'bytbil_vehicle_styles');
?>