<?php 
require_once("shortcode.base.php");
/**
* 
*/
class ContactShortcode extends ShortcodeBase
{
	
	function __construct($vcMap)
	{
		parent::__construct($vcMap);
	}
} 



$map = array(
	"name" => "Kontakt formulär",
	"base" => "tabs",
	"description" => "Lägg till ett formlär här",
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

$vcContact = new ContactShortcode($map);

?>