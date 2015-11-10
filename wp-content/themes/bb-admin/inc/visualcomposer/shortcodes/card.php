<?php 
require_once("shortcode.base.php");
/**
* 
*/
class CardShortcode extends ShortcodeBase
{
	
	function __construct($vcMap)
	{
		parent::__construct($vcMap);
	}

    public function ProcessData($atts){
        if ($atts['use_picture'] == "0" && !isset($atts['icon_bytbil'])){
            $atts['icon_bytbil'] = "";
        }
        return $atts;
    }
}



$map = array(
	"name" => "Kort",
	"base" => "card",
	"description" => "Kort",
	"class" => "",
	"show_settings_on_create" => true,
	"weight" => 10,
	"category" => "Innehåll",
	"params" => array(
		
        array(
            'type' => 'dropdown',
            'heading' => 'Välj ikontyp',
            'param_name' => 'use_picture',
            'value' => array(
                'Välj en ikon' => "0",
                'Välj egen bild som ikon' => "1",
            )
        ),
        array(
            'type' => 'iconpicker',
            'heading' => "välj ikon",
            'param_name' => 'icon_bytbil',
            'settings' => array(
                'type' => 'icon_bytbil',
                'emptyIcon' => true, 
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'use_picture',
                'value' => "0"
            ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => "Välj bild",
            'param_name' => 'icon_image',
            'dependency' => array(
                'element' => 'use_picture',
                'value' => "1"
            ),
        ),
        array(
          "type" => "textfield",
          "holder" => "",
          "class" => "",
          "heading" => "Rubrik",
          "param_name" => "headline",
          "value" => "",
          "description" => "Skriv in en rubrik som ska visas under ikon/bild"
        ),
        array(
          "type" => "textarea_html",
          "holder" => "div",
          "class" => "content",
          "heading" => "Text",
          "param_name" => "blockcontent",
          "value" => "Skriv text här",
          "description" => "Skriv in text som ska visas i kortet"
        ),
        array(
          "type" => "param_group",
          "holder" => "",
          "class" => "",
          "heading" => "Länklista",
          "param_name" => "link_list",
          "description" => "Skapa länklista",
          "params" => array(
            array(
            "type" => "href",
            "holder" => "",
            "class" => "",
            "heading" => "url",
            "param_name" => "href",
            "value" => "",
            "description" => "Skriv in en rubrik som ska visas under ikon/bild"
            )
          ),
        ),

	)

);

$vcCards = new CardShortcode($map);

?>