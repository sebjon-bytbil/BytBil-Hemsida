<?php

global $frontpageID;
$frontpageID = get_option('page_on_front');

require_once('wp_bootstrap_navwalker.php');
include('plugins/breadcrumb-basic.php');
include('plugins/installningar-pro.php');

if (!function_exists('bytbil_facility_phonenrs')) {
    include('plugins/landrins-anlaggning/landrins-anlaggning.php');
}
if (!function_exists('bytbil_show_slideshow')) {
    include('plugins/landrins-bildspel/landrins-bildspel.php');
}
if (!function_exists('bytbil_show_offer')) {
    include('plugins/landrins-erbjudanden/landrins-erbjudanden.php');
}
if (!function_exists('bytbil_show_assortment')) {
    include('plugins/landrins-fordonsurval/landrins-fordonsurval.php');
}
if (!function_exists('bytbil_block_loop')) {
    include('plugins/landrins-innehall/landrins-innehall.php');
}
if (!function_exists('bytbil_brands')) {
    include('plugins/landrins-marken/landrins-marken.php');
}
if (!function_exists('bytbil_show_news_feed')) {
    include('plugins/landrins-nyheter/landrins-nyheter.php');
}
if (!function_exists('bytbil_show_employee_list')) {
    include('plugins/landrins-personal/landrins-personal.php');
}

include('plugins/landrins-puffar/landrins-puffar.php');

if (!function_exists('getSiteSettings')) {
    include('plugins/landrins-sitesettings/landrins-sitesettings.php');
}
if (!function_exists('bytbil_show_social_media_widget')) {
    include('plugins/landrins-socialmedia/landrins-socialmedia.php');
}

function deactivateplugins()
{
    //deactivate_plugins(realpath('../../plugins/bytbilcms-anlaggning/bytbilcms-anlaggning.php'), false, false);
    //include('plugins/landrins-anlaggning/landrins-anlaggning.php');
}

//add_action('admin_init', 'deactivateplugins');

/* Registrera Menyer */
function bytbil_classic_register_theme_menu()
{
    register_nav_menu('primary', 'Huvudmeny');
}

add_action('init', 'bytbil_classic_register_theme_menu');

/* Registrera scripts */
function bytbil_register_styles()
{
    wp_enqueue_style('bootstrap', '/wp-content/themes/bytbil-classic/css/bootstrap.min.css');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/css/flexslider.css');
    wp_enqueue_style('fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
    wp_enqueue_style('bb-style', '/wp-content/themes/landrinsbil/style.css');
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.custom.js');
    wp_enqueue_script('jquery', '/wp-content/themes/bytbil-classic/js/jquery-1.11.0.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js');
    wp_enqueue_script('bytbil-custom', get_template_directory_uri() . '/js/custom.js');
    wp_enqueue_script('functions', get_template_directory_uri() . '/js/functions.js');
}

add_action('wp_enqueue_scripts', 'bytbil_register_styles');

add_filter('redirect_canonical', 'custom_disable_redirect_canonical');
function custom_disable_redirect_canonical($redirect_url)
{
    if (is_singular('your_custom_post_type')) $redirect_url = false;
    return $redirect_url;
}

/* EXCERPT */
function excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...<br/>';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

function content($limit)
{
    $content = explode(' ', get_the_content(), $limit);
    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }
    $content = preg_replace('/\[.+\]/', '', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}


// Submenus
add_filter("wp_nav_menu_objects", "bytbil_show_submenu", 10, 2);

function bytbil_show_submenu($items, $args)
{
    if (empty($args->submenu)) {
        return $items;
    }

    $pid = array_pop(wp_filter_object_list($items, array('object_id' => $args->submenu), 'and', 'ID'));
    $children = wp_filter_object_list($items, array("menu_item_parent" => $pid));

    return $children;
}

?>