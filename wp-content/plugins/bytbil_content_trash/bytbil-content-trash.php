<?php /**
 * Plugin Name: BytBil content trash
 * Plugin URI:
 * Description: Hooks on to post trash and trashes all pushed childsite posts
 * Version: 0.1
 * Author: Provide IT
 * Author URI: http://www.provideit.se
 * License:
 */// Trash Pushed child pages
function trash_child_pages()
{
// Check if master site
    $isMaster = get_option('multisite_master');
    if (!$isMaster) {
        return false;
    }
    $current_site = get_current_site();
    $post_id = $_GET['post'];
    $site_id = $current_site->id;
    $blog_id = get_current_blog_id();
// Get child blogs id from wp_blogs
    global $wpdb;
    $blogs = $wpdb->get_results($wpdb->prepare("SELECT blog_id FROM $wpdb->blogs WHERE site_id = $site_id AND blog_id != $blog_id"), ARRAY_A);
    foreach ($blogs as $blog) {
        switch_to_blog($blog['blog_id']);
        $child_post_id = $wpdb->get_row($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'pushed_original_id' AND meta_value = '$post_id'"), ARRAY_A);
// Trash child
        if (isset($child_post_id, $child_post_id['post_id'])) {
            wp_trash_post($child_post_id['post_id']);
        }
        restore_current_blog();
    }
}

add_filter('wp_trash_post', 'trash_child_pages');
// Delete Pushed child pages
function delete_child_pages()
{
// Check if master site
    $isMaster = get_option('multisite_master');
    if (!$isMaster) {
        return false;
    }
    $current_site = get_current_site();
    $post_id = $_GET['post'];
    $site_id = $current_site->id;
    $blog_id = get_current_blog_id();
// Get child blogs id from wp_blogs
    global $wpdb;
    $blogs = $wpdb->get_results($wpdb->prepare("SELECT blog_id FROM $wpdb->blogs WHERE site_id = $site_id AND blog_id != $blog_id"), ARRAY_A);
    foreach ($blogs as $blog) {
        switch_to_blog($blog['blog_id']);
        $child_post_id = $wpdb->get_row($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'pushed_original_id' AND meta_value = '$post_id'"), ARRAY_A);
// Delete child
        if (isset($child_post_id, $child_post_id['post_id'])) {
            wp_delete_post($child_post_id['post_id']);
        }
        restore_current_blog();
    }
}

add_filter('before_delete_post', 'delete_child_pages');
// Untrash Pushed child pages
function untrash_child_pages()
{
// Check if master site
    $isMaster = get_option('multisite_master');
    if (!$isMaster) {
        return false;
    }
    $current_site = get_current_site();
    $post_id = $_GET['post'];
    $site_id = $current_site->id;
    $blog_id = get_current_blog_id();
// Get child blogs id from wp_blogs
    global $wpdb;
    $blogs = $wpdb->get_results($wpdb->prepare("SELECT blog_id FROM $wpdb->blogs WHERE site_id = $site_id AND blog_id != $blog_id"), ARRAY_A);
    foreach ($blogs as $blog) {
        switch_to_blog($blog['blog_id']);
        $child_post_id = $wpdb->get_row($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'pushed_original_id' AND meta_value = '$post_id'"), ARRAY_A);
// Untrash child
        if (isset($child_post_id, $child_post_id['post_id'])) {
            wp_untrash_post($child_post_id['post_id']);
        }
        restore_current_blog();
    }
}

add_filter('untrash_post', 'untrash_child_pages'); ?>