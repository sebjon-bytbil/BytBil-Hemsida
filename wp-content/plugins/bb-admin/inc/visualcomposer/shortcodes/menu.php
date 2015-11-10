<?php
require_once('shortcode.base.php');
/**
 *
 */
class MenuShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }
}

function populate_menus()
{
    $menus = array();
    $nav_menus = get_terms('nav_menu');
    if (!empty($nav_menus)) {
        foreach ($nav_menus as $nav_menu) {
            $menus[$nav_menu->name] = $nav_menu->term_id;
        }
    } else {
        $menus['Inga menyer hittades'] = '0';
    }

    return $menus;
}

$map = array(
    'name' => 'Meny',
    'base' => 'menu',
    'description' => 'Menyer',
    'class' => '',
    'show_settings_on_create' => true,
    'weight' => 10,
    'category' => 'Innehåll',
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => 'Meny',
            'param_name' => 'menu',
            'description' => 'Välj den meny som du vill visa.',
            'value' => populate_menus()
        )
    )
);

$vcMenus = new MenuShortcode($map);
