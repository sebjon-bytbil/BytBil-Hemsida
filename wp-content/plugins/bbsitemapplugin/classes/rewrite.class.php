<?php
// require_once('Generator.class.php');
// /**
// * 
// */
// class BBSiteMapRewrites
// {
	
// 	function __construct()
// 	{
// 		add_action( "registered_post_type", array($this, "getXml") );
// 		add_action('init', array($this, 'rewriteSitemap') );
// 		add_filter('query_vars', array( $this, 'add_favorites_query_var') );
// 		add_filter('rewrite_rules_array', array($this, 'add_favorites_rewrite_rule') );


// 	}

// 	function add_favorites_query_var($vars){
//         $vars[] = 'sitemap';
//         print_r($vars);
//         return $vars;
//     }

//      function add_favorites_rewrite_rule($rules)
//     {
//         $new_rule = array('sitemap.xml$' => 'index.php?sitemap');
//         $rules = $new_rule + $rules;
//         return $rules;
//     }

// 	function getXml(){
// 		if (!isset($_GET["sitemap"])) {
// 			return;
// 		}
// 		load_template(BBSITEMAPPATH . "/views/xmlgenerator.tpl.php");
// 		die();
// 	}

// 	function rewriteSitemap(){
// 		global $wp_rewrite;
// 		//add_rewrite_rule('^sitemap.xml$', 'index.php?sitemap=true', 'top');
		
// 		//flush_rewrite_rules();
// 		//print_r($wp_rewrite);
// 	}
// }
// $BBSiteMapRewrites = new BBSiteMapRewrites();
//  ?>