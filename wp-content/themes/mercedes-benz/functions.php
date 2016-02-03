<?php

// Content Management
include("plugins/ContentManagement/content-management.php");
require_once('plugins/wp_bootstrap_navwalker.php');
require_once('plugins/breadcrumb.php');
if (!function_exists("acf_set_options_page_title")) {
    require_once('plugins/acf-options-page/acf-options-page.php');
}
require_once('plugins/options-importer/options-importer.php');
require_once('plugins/acf-image-crop-add-on/acf-image-crop.php');
//include("plugins/contact-form-7/wp-contact-form-7.php");
include('plugins/mb-functions.php');
include('plugins/mb-options.php');
include('plugins/mb-content.php');
include('plugins/mb-shortlinks.php');
include('plugins/mb-menus.php');
include('plugins/mb-models.php');
include('plugins/mb-slideshow.php');
include('plugins/mb-af-slideshow.php');
include('plugins/mb-lagerbilar.php');
include('plugins/mb-employee.php');
include('plugins/mb-offers.php');
include('plugins/mb-facility.php');

// Ändra Inloggningsfönster
function mb_login()
{
    $url = get_template_directory_uri();
    wp_enqueue_style('mercedes_benz_login', $url . '/css/mb_login.css');
}

add_action('login_enqueue_scripts', 'mb_login');


/* Register Menues */
function mb_register_theme_menu()
{
    register_nav_menu('primary', 'Mercedes-Benz : Huvudmeny');
}

add_action('init', 'mb_register_theme_menu');

function add_lightbox_script()
{
    wp_enqueue_script("colorbox", get_template_directory_uri() . "/js/jquery.colorbox-min.js", array("jquery"), null, true);

    if (is_super_admin() || is_network_admin()) {
        wp_enqueue_script("colorbox-handler", get_template_directory_uri() . "/js/colorbox-handler.js", array("jquery", "colorbox"), null, true);
        wp_enqueue_style("colorbox-admin-style", get_template_directory_uri() . "/css/colorbox-admin.css", array(), null);
    }
}

function add_scripts()
{
    global $wp_styles;
    wp_enqueue_script("scripts", get_template_directory_uri() . "/js/scripts.js", array("jquery"), null, true);
    wp_enqueue_style("mb-ie8", get_template_directory_uri() . "/ie.css", array(), filemtime(__DIR__ . "/ie.css"));
    $wp_styles->add_data("mb-ie8", "conditional", "IE");
}

add_action("wp_enqueue_scripts", "add_scripts");
add_action("wp_enqueue_scripts", "add_lightbox_script");
add_action("admin_enqueue_scripts", "add_lightbox_script");


add_action("init", function () {
    if (!empty($_GET["objekt"])) {
        return false;
    }

    $page = get_page_by_path("personbilar");
    if ($page) {
        add_rewrite_tag("%objekt%", '(.+)');
        add_rewrite_rule('^o/(.+)/?', 'index.php?page_id=' . $page->ID . '&objekt=$matches[1]', 'top');
    }
});

