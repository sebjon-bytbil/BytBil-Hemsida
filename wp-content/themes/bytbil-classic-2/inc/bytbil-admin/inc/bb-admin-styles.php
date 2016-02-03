<?php
// Load Admin Styles and Scripts
function bytbil_admin_styles()
{
    wp_enqueue_style('bytbil_admin', '/wp-content/themes/bytbil-classic-2/inc/bytbil-admin/inc/css/bb-hemsida-admin.css');
    wp_enqueue_script('bytbil_admin', '/wp-content/themes/bytbil-classic-2/inc/bytbil-admin/inc/js/bb-hemsida-admin.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'bytbil_admin_styles');
?>