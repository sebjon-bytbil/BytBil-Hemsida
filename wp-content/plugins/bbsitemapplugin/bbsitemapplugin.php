<?php 
/*
Plugin Name: BytBil Sitemap
Description: Skapar upp en sitemap för en webbplats
Plugin URI: http://bytbil.com
Author: BytBil.com
Author URI: BytBil.com
Version: 1.0
License: GPL2
Text Domain: Text Domain
*/
define("BBSITEMAPPATH",  plugin_dir_path(__FILE__));

require_once('classes/Generator.class.php');
	//wp_unschedule_event( time(), 'bbsitemapgeneratexmslevent' );
	add_filter( 'cron_schedule', 'add_cron_interval', 10, 1 );

	function add_cron_interval($schedules){
			$schedules['one_minute'] = array(
		        'interval' => 60,
		        'display'  => esc_html__( 'Every minute' ),
		    );
		 	
		    return $schedules;
		}

		if( !wp_next_scheduled( 'bbsitemapgeneratexmslevent') ) {
	 		wp_schedule_event( time(), 'hourly', 'bbsitemapgeneratexmslevent' );
		}
	
	add_action('bbsitemapgeneratexmslevent', 'bbsitemapgeneratexml');
	//wanted to run this in class but stuff is wrong with wordpress...
	function bbsitemapgeneratexml(){
		BBSitemapGenerator::generateXml();
	}

	register_deactivation_hook(__FILE__, 'bbsitemap_deactivate');
	function bbsitemap_deactivate() {
	wp_clear_scheduled_hook('bbsitemapgeneratexmslevent');
}

require_once('classes/adminpage.class.php');
$bbxmlsitemapadmin = new BBSitemapAdminPage();
require_once('classes/cronjob.class.php');

require_once('classes/rewrite.class.php');