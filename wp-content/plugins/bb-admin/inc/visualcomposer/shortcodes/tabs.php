<?php 
require_once("shortcode.base.php");
/**
* 
*/
class TabsShortcode extends ShortcodeBase
{
	
	function __construct($vcMap)
	{
		parent::__construct($vcMap);
	}
} 



$map = array(
	"name" => "Tabbar",
	"base" => "tabs",
	"description" => "Tabbar",
	"class" => "",
	"show_settings_on_create" => true,
	"weight" => 10,
	"category" => "Innehåll",
	"params" => array(
		array(
		  "type" => "textfield",
		  "holder" => "h2",
		  "class" => "",
		  "heading" => "Rubrik",
		  "param_name" => "headline",
		  "value" => "",
		  "description" => "skriv in en rubrik"
		)
	)

);

$vcTabs = new TabsShortcode($map);

?>