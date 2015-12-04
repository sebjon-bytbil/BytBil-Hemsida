<?php
require_once("shortcode.base.php");
/**
 *
 */
class TextShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }
}

$map = array(
    'name' => 'Testblock',
    'base' => 'text',
    'description' => 'Innehåll',
    'class' => '',
    'show_settings_on_create' => true,
    'weight' => 10,
    'category' => 'Innehåll',
    'params' => array(
        array(
            'type' => 'wysiwyg',
            'value' => '',
            'heading' => 'Innehåll',
            'param_name' => 'the_content',
            'description' => 'Textblockets innehåll.'
        ),
        array(
            'type' => 'dropdown',
            'heading' => 'Textfärg',
            'param_name' => 'color',
            'description' => 'Välj textfärg.',
            'value' => array(
                'Vit' => '#fff',
                'Svart' => '#151515'
            )
        )
    )
);

$vcText = new TextShortcode($map);

?>