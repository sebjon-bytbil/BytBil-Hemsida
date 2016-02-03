<?php
require_once('Generator.class.php');
	//wp_unschedule_event( time(), 'bbsitemapgeneratexml' );
	// add_filter( 'cron_schedule', 'add_cron_interval' );

	// function add_cron_interval(){
	// 		$schedules['one_minute'] = array(
	// 	        'interval' => 60,
	// 	        'display'  => esc_html__( 'Every minute' ),
	// 	    );
		 
	// 	    return $schedules;
	// 	}
	// add_action( "init", "bbsitemapgeneratexmlcron");
	// function bbsitemapgeneratexmlcron(){
	// 	if( !wp_next_scheduled( 'bbsitemapgeneratexmsl') ) {
	//  		wp_schedule_event( time(), 'hourly', 'bbsitemapgeneratexmsl' );
	// 	}
	// }
	
	// //wanted to run this in class but stuff is wrong with wordpress...
	// function bbsitemapgeneratexml(){
	// 	error_log("one_minute");
	// 	BBSitemapGenerator::generateXml();
	// }
?>