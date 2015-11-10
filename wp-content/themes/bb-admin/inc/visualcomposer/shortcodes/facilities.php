<?php 
require_once("shortcode.base.php");
/**
* 
*/
class FacilitiesShortcode extends ShortcodeBase
{
	
	function __construct($vcMap)
	{
		parent::__construct($vcMap);
	}
} 



$map = array(
	"name" => "Anläggningar",
	"base" => "facilities",
	"description" => "anläggningar",
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

$vcFacilities = new FacilitiesShortcode($map);

?>