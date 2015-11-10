<?php
/**
 * Plugin Name: BytBil content pull
 * Plugin URI:
 * Description: Overrides AFC functions to pull content from master site
 * Version: 0.1
 * Author: Provide IT
 * Author URI: http://www.provideit.se
 * License:
 */

// Constants
define("MASTER_CONTENT", true);
define("CHILD_CONTENT", false);

global $current_blog_id;
global $current_blog;
$current_blog_id = $current_blog->blog_id;

// Custom advanced custom fields get_field
function bytbil_get_field($field_key, $master = false, $post_id = false, $format_value = true)
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    // Check if master site
    $isMaster = get_option('multisite_master');

    // Get master blog id
    $master_blog_id = get_master_blog_id();

    if (!$isMaster && $master) {
        if (!isset($master_blog_id)) {
            $master = false;
        } else {
            $masterPostId = get_post_meta($post_id, 'pushed_original_id', true);
            switch_to_blog($master_blog_id);
        }

    }

    // Get
    global $current_blog;
    if (!$master != $master_blog_id && $current_blog->blog_id != $master_blog_id) {
        $return = bytbil_get_child_field($field_key, CHILD_CONTENT, $post_id, $format_value);
    } else {
        if (isset($masterPostId)) {
            $return = get_field($field_key, $masterPostId, $format_value);
        } else {
            $return = get_field($field_key, $post_id, $format_value);
        }
    }

    // Restore current blog
    if (!$isMaster && $master) {

        restore_current_blog();

    }

    return $return;

}

function bytbil_get_master_post($postId)
{
    // Check if master site
    $isMaster = get_option('multisite_master');

    // Get master blog id
    $master_blog_id = get_master_blog_id();

    if (!$isMaster && isset($master_blog_id)) {
        $masterPostId = get_post_meta($postId, 'pushed_original_id', true);
        switch_to_blog($master_blog_id);
        $post = get_post($masterPostId);
        restore_current_blog();
        return $post;
    }
    return false;
}

// Custom advanced custom fields get_field
function bytbil_get_field2($field_name, $master = false, $post_id = false)
{
    $value = bytbil_get_field($field_name, $post_id);

    if (is_array($value)) {
        $value = @implode(', ', $value);
    }

    return $value;
}

// Get child field when on master site
function bytbil_get_child_field($field_key, $master = false, $post_id = false, $format_value = true)
{

    // Check if master site
    $isMaster = get_option('multisite_master');
    global $current_blog_id;
    $master_blog_id = get_current_blog_id();

    if ($isMaster && !$master) {

        // Get master blog id
        if ($master_blog_id == $current_blog_id) {
            $master = true;
        } else {
            switch_to_blog($current_blog_id);

        }

    }

    // Get

    $return = get_field($field_key, $post_id, $format_value);

    // Restore current blog
    if ($isMaster && !$master) {

        restore_current_blog();

    }

    return $return;

}


// Get child permalink when on master site
function get_child_permalink($id = null)
{
    $master = false;

    // Check if master site
    $isMaster = get_option('multisite_master');
    global $current_blog_id;
    $master_blog_id = get_current_blog_id();

    if ($isMaster && !$master) {

        // Get master blog id
        if ($master_blog_id == $current_blog_id) {
            $master = true;
        } else {
            switch_to_blog($current_blog_id);

        }

    }

    // Get
    $return = get_permalink($id);

    // Restore current blog
    if ($isMaster && !$master) {

        restore_current_blog();

    }

    return $return;

}

// Get child permalink when on master site
function the_child_permalink($id = null)
{
    echo get_child_permalink($id);
}

// Custom advanced custom fields the_field
function bytbil_the_field($field_name, $master = false, $post_id = false)
{
    $value = bytbil_get_field($field_name, $post_id);

    if (is_array($value)) {
        $value = @implode(', ', $value);
    }

    echo $value;
}

// Function that switches to master blog if not master blog
global $master;
$master = true;
function switch_to_master()
{
    global $current_site;

    switch_to_blog($current_site->blog_id);
    // // Check if master site
    // $isMaster = get_option( 'multisite_master' );
    // global $current_blog_id;
    // $current_blog_id = get_current_blog_id();
    // global $master;

    // if(!$isMaster && $master )
    // {

    // 	// Get master blog id
    // 	$master_blog_id = get_master_blog_id();
    // 	if(!isset($master_blog_id))
    // 	{
    // 		$master = false;
    // 	}
    // 	else
    // 	{
    // 		switch_to_blog($master_blog_id);

    // 	}

    // }

}

// Restore from master site
function restore_from_master()
{

    // Check if master site
    $isMaster = get_option('multisite_master');
    //global $master;

    // Restore current blog
    if ($isMaster)//&& $master )
    {
        global $current_blog_id;
        switch_to_blog($current_blog_id);
        // restore_current_blog();

    }

}

// Get blog id for master site
global $master_blog_id;
global $current_site;
$master_blog_id = $current_site->blog_id;
function get_master_blog_id()
{

    // Mini cache for master blog id
    global $master_blog_id;
    if (!empty($master_blog_id))
        return $master_blog_id;

    $current_site = get_current_site();
    $id = $current_site->id;
    $domain = $current_site->domain;

    // Get master blog id from wp_blogs
    global $wpdb;
    $blog_row = $wpdb->get_row($wpdb->prepare("SELECT blog_id FROM %s WHERE site_id = %d AND domain = %s", array($wpdb->blogs, $id, $domain)));

    if (!isset($blog_row->blog_id))
        return null;

    $blog_id = $blog_row->blog_id;

    $master_blog_id = $blog_id;

    return $blog_id;

}

function restore_current_blog_fully()
{
    $still_switched = restore_current_blog();

    if ($still_switched) {
        while (!empty($GLOBALS["_wp_switched_stack"])) {
            restore_current_blog();
        }
    }

    if (!empty($GLOBALS["_wp_switched_stack"])) {
        return false;
    } else {
        return true;
    }
}

// Override advanced custom fields get post_id function to switch to master and select master post_id
/*
function bytbil_acf_get_post_id_override($post_id){
	
	//var_dump($post_id);
	
	//var_dump(debug_backtrace());
	
	return $val;
	
}
add_filter('acf/get_post_id', 'bytbil_acf_get_post_id_override');
*/

?>