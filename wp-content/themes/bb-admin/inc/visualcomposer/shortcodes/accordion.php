<?php
require_once("shortcode.base.php");
/**
 *
 */
class AccordionShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }

    function processData($atts)
    {
        $atts['accordions'] = vc_param_group_parse_atts($atts['accordions']);
        return $atts;
    }
}

$map = array(
    "name" => "Accordion",
    "base" => "accordion",
    "description" => "Accordion",
    "class" => "",
    "show_settings_on_create" => true,
    "weight" => 10,
    "category" => "Innehåll",
    "params" => array(
        array(
            'type' => 'param_group',
            'value' => '',
            'param_name' => 'accordions',
            'save_always' => 'true',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Rubrik',
                    'param_name' => 'headline',
                    'description' => 'Accordionens rubrik.'
                ),
                array(
                    'type' => 'wysiwyg',
                    'value' => '',
                    'heading' => 'Innehåll',
                    'param_name' => 'accordion_content',
                    'description' => 'Accordionens innehåll.'
                )
            )
        )
    )
);

$vcAccordion = new AccordionShortcode($map);

?>