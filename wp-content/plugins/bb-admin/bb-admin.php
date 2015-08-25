<?php
/*
Plugin Name: BytBil Hemsida - Administration
Description: Admintema och förändringar för BytBil Hemsida
Author: Sebastian Jonsson : BytBil.com
Version: 3.0
Author URI: http://www.bytbil.com
*/


//include 'bytbilcms-dashboard.php';
//include 'bytbilcms-menus.php';
//include 'bytbilcms-users.php';

/*
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
    wp_enqueue_style('bytbil_admin', plugins_url('css/bytbilcms_admin.css', __FILE__));
    wp_enqueue_script('bytbil_admin', plugins_url('js/bytbilcms_admin.js', __FILE__), array('jquery'));

    // Läs in Admin-förändringar för användarroll USER
    if (!current_user_can('promote_users')) {
        wp_enqueue_style('bytbil_admin-user', plugins_url('css/bytbilcms_admin-user.css', __FILE__));
    }
}

// Skip Confirmation
function bytbil_auto_skip_confirmation($hook)
{
    if ($hook !== "user-new.php") {
        return;
    }
    wp_enqueue_script("bbcms-skip-confirm", plugin_dir_url(__FILE__) . "/js/skip-confirm.js", array("jquery"), "", true);
}
add_action("admin_enqueue_scripts", "bytbil_auto_skip_confirmation");


// Ändra Inloggningsfönster
function bytbil_login()
{
    wp_enqueue_style('bytbil_admin', plugins_url('css/bytbilcms_login.css', __FILE__));
}
add_action('login_enqueue_scripts', 'bytbil_login');


// Lägg till godkända filtyper för uppladdning
function custom_upload_mimes($existing_mimes = array())
{
    $existing_mimes['svg'] = 'mime/type';

    return $existing_mimes;
}

add_filter('upload_mimes', 'custom_upload_mimes');

// Ändra utseendet på Innehållseditor
function bytbil_editor_styles()
{
    add_editor_style(plugins_url('css/bytbilcms_editor.css', __FILE__));
}

add_action('after_setup_theme', 'bytbil_editor_styles');


function siteid_columns($column, $blog_id)
{
    global $wpdb;
    if ($column == 'site_id') {
        echo $blog_id;
    }
}

// Add in a column header
function site_id($columns)
{
    $columns['site_id'] = __('ID', 'site_id');
    return $columns;
}

function site_name($columns)
{
    $newCol = array('site_name' => __('Sitenamn', 'site_name'));

    $res = array_slice($columns, 0, 1, true) + $newCol + array_slice($columns, 1, count($columns) - 1, true);
    return $res;
}

function site_name_columns($col, $bid)
{
    global $wpdb;
    $cur = get_current_blog_id();
    if ($col == 'site_name') {
        switch_to_blog($bid);
        echo '<a href="' . get_site_url() . '/wp-admin">' . get_bloginfo('name') . '</a>'; //get_bloginfo('name');
        switch_to_blog($cur);
    }
}

add_filter('wpmu_blogs_columns', 'site_id', 9999);
add_filter('wpmu_blogs_columns', 'site_name', 10);


add_action('manage_sites_custom_column', 'siteid_columns', 10, 3);
add_action('manage_blogs_custom_column', 'siteid_columns', 10, 3);

add_action('manage_sites_custom_column', 'site_name_columns', 10, 3);
add_action('manage_blogs_custom_column', 'site_name_columns', 10, 3);



// This sets the default link-type to none when inserting media.
// From: http://www.wpbeginner.com/wp-tutorials/automatically-remove-default-image-links-wordpress/
function bb_imagelink_setup()
{
    $image_set = get_option('image_default_link_type');

    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'bb_imagelink_setup', 10);

*/

// Fonts import
// ALL THE FONTS IN THE SYSTEM GOES HERE
/*
function bb_font_imports()
{
    $url = "/wp-content/mu-plugins/" . basename(__DIR__) . "/css/font-imports.css";
    wp_enqueue_style("bb-fonts-selection", $url, array(), filemtime(dirname(__FILE__) . "/css/font-imports.css"));
}
add_action("admin_enqueue_scripts", "bb_font_imports", -9999);
add_action("wp_enqueue_scripts", "bb_font_imports", -9999);
*/
