<?php
require_once("shortcode.base.php");
/**
 *
 */
class IFrameShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }

    function processData($atts)
    {
        $border = self::Exists($atts['border'], '0');
        $border_style = ' style="border:0px;"';
        if ($border === '1') {
            $border_style = ' style="border:2px solid #2a2a2a;"';
        }
        $atts['border_style'] = $border_style;

        return $atts;
    }
}

$map = array(
    "name" => "Iframe",
    "base" => "iframe",
    "description" => "Lägg till en iframe",
    "class" => "",
    "show_settings_on_create" => true,
    "weight" => 10,
    "category" => "Innehåll",
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => 'URL',
            'param_name' => 'url',
            'value' => '',
            'description' => 'Skriv in URLen som du vill ha i din iframe.'
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Höjd',
            'param_name' => 'height',
            'value' => '300',
            'description' => 'Skriv in höjden (i pixlar) för din iframe.'
        ),
        array(
            'type' => 'checkbox',
            'heading' => 'Kantram',
            'param_name' => 'border',
            'description' => 'Bocka i om du vill ha en kantram.',
            'value' => array(
                'Ja' => '1'
            )
        )
    )
);

$vcIframe = new IFrameShortcode($map);

?>