<?php 
require_once('render.class.php');
require_once('Generator.class.php');
	class BBSitemapAdminPage
	{
		
		function __construct()
		{
			add_action('admin_menu', array($this, 'createMenu'));
		}

		function createMenu(){
			add_submenu_page( 'tools.php', "Sitemap generator", "Sitemap generator", 'activate_plugins', 'bbsitemapgenerator', array($this, "renderPage") );
		}

		function renderPage(){
			if (isset($_GET['action']) && $_GET['action'] === 'rendernewsitemap') {
				BBSitemapGenerator::generateXml();
			}
			if (isset($_GET['action']) && $_GET['action'] === 'stopsiitemapcron') {
				wp_unschedule_event( time(), 'bbsitemapgeneratexmslevent' );
				wp_clear_scheduled_hook( 'bbsitemapgeneratexmslevent' );
			}
			

			$time = BBSitemapGenerator::sitemapTime();

			$date = date("H:i:s d/m/Y", $time);
			$nextjobtime = wp_next_scheduled( 'bbsitemapgeneratexmslevent');
			$nextjob = !$nextjobtime ? "jobbet körs inte" : date("H:i:s d/m/Y", $nextjobtime);
			$sitemapExisits = BBSitemapGenerator::sitemapExists();
			echo BBSitemapXmlRender::RenderView('admin', array(
				'latestmap' => htmlspecialchars(BBSitemapGenerator::getSitemapContent()), 
				'exists' => $sitemapExisits,
				'sitemapUrl' => BBSitemapGenerator::getSitemapUrl(),
				'time' => $date,
				'nextjob' => $nextjob
				)
			);
		}
	}
 ?>