<?php
require_once('shortcode.base.php');

/**
 * Sociala länkar
 */
class SocialShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }
}

function bb_init_social_shortcode()
{
    // Map array
    $map = array(
        'name' => 'Sociala länkar',
        'base' => 'social',
        'description' => 'Lägg till länkar till sociala medier',
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
    $map['params'] = apply_filters('bb_alter_social_params', $map['params']);

    $vcSocial = new SocialShortcode($map);
}
add_action('after_setup_theme', 'bb_init_social_shortcode');

?>