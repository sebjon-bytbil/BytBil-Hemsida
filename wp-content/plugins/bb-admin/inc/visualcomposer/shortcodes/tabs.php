<?php
require_once('shortcode.base.php');

/**
 * Tabbar
 */
class TabsShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }
}

function bb_init_tabs_shortcode()
{
    // Map array
    $map = array(
        'name' => 'Tabbar',
        'base' => 'tabs',
        'description' => 'Tabbar',
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
    $map['params'] = apply_filters('bb_alter_tabs_params', $map['params']);

    $vcTabs = new TabsShortcode($map);
}
add_action('after_setup_theme', 'bb_init_tabs_shortcode');

?>