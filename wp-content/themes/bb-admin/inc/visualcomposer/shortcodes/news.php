<?php 
require_once("shortcode.base.php");
/**
* 
*/
class NewsShortcode extends ShortcodeBase
{
	
	function __construct($vcMap)
	{
		parent::__construct($vcMap);
	}
} 



$map = array(
	"name" => "Nyheter",
	"base" => "news",
	"description" => "Visa nyheter",
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

$vcNews = new NewsShortcode($map);

?>