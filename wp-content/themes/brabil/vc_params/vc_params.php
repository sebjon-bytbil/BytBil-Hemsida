<?php
function brabil_exists($var, $val = false)
{
    if (isset($var) && $var !== '') {
        return $var;
    }
    return $val;
}

function brabil_hex2rgba($color, $opacity = false)
{
    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if (empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb = array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    }
    elseif ($opacity == '0') {
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    }else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}

// Theme based modules
require_once(plugin_dir_path(__FILE__) . 'bookservice.php');

// Include param alterations
require_once(plugin_dir_path(__FILE__) . 'wysiwyg.php');
require_once(plugin_dir_path(__FILE__) . 'menu.php');
require_once(plugin_dir_path(__FILE__) . 'imageslider.php');
require_once(plugin_dir_path(__FILE__) . 'offers.php');
?>
