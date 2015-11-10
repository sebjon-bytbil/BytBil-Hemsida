<?php 
require_once("shortcode.base.php");
/**
* 
*/
class ReserveShortcode extends ShortcodeBase
{
	
	function __construct($vcMap)
	{
		parent::__construct($vcMap);
	}
} 



$map = array(
	"name" => "Boka provkörning",
	"base" => "reserve",
	"description" => "Formulär för boka provkörning",
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

$vcReserve = new ReserveShortcode($map);

?>