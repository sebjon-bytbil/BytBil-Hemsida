<?php
require_once('shortcode.base.php');

/**
 * Anläggningar
 */
class FacilitiesShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }
}

function bb_init_facilities_shortcode()
{
    // Map array
    $map = array(
        'name' => 'Anläggningar',
        'base' => 'facilities',
        'description' => 'anläggningar',
        'class' => '',
        'show_settings_on_create' => true,
        'weight' => 10,
        'category' => 'Innehåll',
        'params' => array(
            array(
                'type' => 'textfield',
                'holder' => 'h2',
                'class' => '',
                'heading' => 'Rubrik',
                'param_name' => 'headline',
                'value' => '',
                'description' => 'skriv in en rubrik'
            )
        )
    );

    // Alter params filter
    $map['params'] = apply_filters('bb_alter_facilities_params', $map['params']);

    $vcFacilities = new FacilitiesShortcode($map);
}
add_action('after_setup_theme', 'bb_init_facilities_shortcode');

?>