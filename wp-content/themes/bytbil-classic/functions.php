<?php

global $frontpageID;
$frontpageID = get_option('page_on_front');


require_once('wp_bootstrap_navwalker.php');
//include('plugins/bildspel-pro.php');
//include('plugins/socialmedia-pro.php');
//include('plugins/anlaggning-pro.php');
//include('plugins/personal-pro.php');
//include('plugins/fordonsurval-pro.php');
//include('plugins/fordonsmarken-basic.php');
//include('plugins/blocks-basic.php');
include('plugins/breadcrumb-basic.php');
//include('plugins/brands.php');
include('plugins/installningar-pro.php');
//include('plugins/erbjudanden-pro.php');

include 'bbcms-breadcrumbs.php';

/* Registrera Menyer */
function bytbil_classic_register_theme_menu()
{
    register_nav_menu('primary', 'Huvudmeny');
}

add_action('init', 'bytbil_classic_register_theme_menu');

/* Registrera scripts */
function bytbil_register_styles()
{
    //wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap', '/wp-content/themes/bytbil-classic/css/bootstrap.min.css');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/css/flexslider.css');
    wp_enqueue_style('bb-style', '/wp-content/themes/bytbil-classic/style.css');
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array(), "", true);
    wp_enqueue_script('jquery', '/wp-content/themes/bytbil-classic/js/jquery-1.11.0.min.js', array(), "", false);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), "", true);
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), "", true);
    //wp_enqueue_script('css3mediaqueries', get_template_directory_uri() . '/js/css3-mediaqueries.js');
    wp_enqueue_script('bytbil-custom', get_template_directory_uri() . '/js/custom.js', array(), "", true);
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
add_filter("wp_get_nav_menu_items", "bytbil_show_submenu", 1000000, 3);

function bytbil_show_submenu($items, $menu, $args)
{
    if (empty($args["submenu"])) {
        return $items;
    }

    $pid = array_pop(wp_filter_object_list($items, array('object_id' => $args["submenu"]), 'and', 'ID'));
    $children = wp_filter_object_list($items, array("menu_item_parent" => $pid));

    return $children;
}

function bytbil_show_sidebar_menu($pid, $args = array(), $first = false)
{
    if (!$pid || !is_numeric($pid)) {
        return array();
    }
    $echo = false;
    if (!empty($args['echo']) && $args["echo"]) {
        $echo = true;
    }

    if (empty($args["class"]) || !$first) {
        $args["class"] = "";
    }

    $post = get_post(intval($pid));

    $term = get_term_by("name", "Huvudmeny", "nav_menu");
    $mid = $term->term_id;

    if ($echo && $first) {
        //echo "<li><a href='{$post->url}'>{$post->post_title}</a></li>";
    } else {
        //echo "<a href='{$post->url}'>{$post->post_title}</a>";
    }

    $items = wp_get_nav_menu_items($mid, array(
        "submenu" => $pid
    ));

    if ($echo) echo "<ul class='{$args["class"]}'>";
    foreach ($items as $item) {
        if ($echo) echo "<li>";
        if ($echo) echo "<a href='{$item->url}'>{$item->title}</a>";
        $item->submenu_items = bytbil_show_sidebar_menu($item->object_id, $args);
        if ($echo) echo "</li>";
    }
    if ($echo) echo "</ul>";

    return $items;
}

?>
