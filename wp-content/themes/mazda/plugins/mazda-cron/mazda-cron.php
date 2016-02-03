<?php
/*
Plugin Name: Mazda Cron
Plugin URI: http://www.bytbil.com/
Description: Skickar ett HTTP-request till alla sidor som finns på den aktuella sidan.
Version: 1.0.0
Author: Eric Ejneroos
Author URI: http://www.bytbil.com/
*/

/**
 * Add a "minutely" interval for testing purposes.
 */
function minute_interval()
{
    $interval['minute_1'] = array('interval' => 1*60, 'display' => 'Once every minute');
    return $interval;
}

add_action('wp', 'mazda_setup_schedule');
/**
 * If not scheduled, schedule it.
 *
 * Use wp_clear_scheduled_hook('name') to clear it.
 */
function mazda_setup_schedule()
{
    if (!wp_next_scheduled('mazda_daily_requests_event')) {
        wp_schedule_event(time(), 'hourly', 'mazda_daily_requests_event');
    }
}

add_action('mazda_daily_requests_event', 'mazda_daily_requests');
/**
 * Runned daily.
 * 
 * Collects all published pages and sends a HTTP-request in order
 * to trigger set_transient()
 */
function mazda_daily_requests()
{
    // Remove the time limit in PHP
    set_time_limit(0);

    $args = array(
        'sort_order' => 'ASC',
        'sort_column' => 'post_title',
        'hierarchical' => 1,
        'exclude' => '',
        'include' => '',
        'meta_key' => '',
        'meta_value' => '',
        'authors' => '',
        'child_of' => 0,
        'parent' => -1,
        'exclude_tree' => '',
        'number' => '',
        'offset' => 0,
        'post_type' => 'page',
        'post_status' => 'publish'
    );

    // Retrieve pages
    $pages = get_pages($args);

    $urls = array();
    // Retrieve and store URLs
    foreach ($pages as $page) {
        // TODO: Make this dynamic
        $urls[] = 'http://mazda.cmsprod.bytbil.dev/' . get_page_uri($page->ID) . '/';
    }

    // Request each URL with cURL
    foreach ($urls as $url) {
        $args = array(
            'timeout'     => 30,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking'    => true,
            'headers'     => array(),
            'cookies'     => array(),
            'body'        => null,
            'compress'    => false,
            'decompress'  => true,
            'sslverify'   => true,
            'stream'      => false,
            'filename'    => null
        );
        $response = wp_remote_get($url, $args);
        // For testing purposes
        /*if (!is_wp_error($response)) {
            error_log(print_r($response, true));
        }*/
    }
}

?>

