<?php
/* Register Sizes */
if (function_exists('add_image_size')) {
    
    add_image_size('slideshow-default', 1600, 580, true);
    add_image_size('slideshow-preview', 800, 290, true);
    add_image_size('slideshow-hd', 1920, 696, true);
    add_image_size('slideshow-sd', 480, 174, true);

    add_image_size('rectangle-default', 1170, 600, true);
    add_image_size('rectangle-md', 585, 300, true);
    add_image_size('rectangle-sd', 480, 246, true);
    add_image_size('rectangle-hd', 1600, 820, true);

    add_image_size('employee-default', 480, 676, true);
    add_image_size('employee-preview', 240, 338, true);
    add_image_size('employee-sd', 120, 169, true);
    add_image_size('employee-hd', 960, 1352, true);
    
    add_image_size('accessory-default', 480, 550, true);
    add_image_size('accessory-sd', 240, 275, true);
    add_image_size('accessory-hd', 960, 1100, true);
}

function get_wp_installation()
{
    $full_path = getcwd();
    $ar = explode('wp-', $full_path);
    return $ar[0];
}

function maybe_add_preview_to_url($url)
{
    if (!preg_match('/(.*)(\/uploads\/sites\/\d{1,2}\/\d{4}\/\d{1,2}\/)()(.*$)/', $url, $matches)) {
        return $url;
    } else {
        if (sizeof($matches) !== 5)
            return $url;

        $wp_root = get_wp_installation();

        $path = array();
        $path['abs'] = $wp_root . '/wp-content' . $matches[2] . 'preview_' . $matches[4];
        $path['url'] = $matches[1] . $matches[2] . 'preview_' . $matches[4];

        if (file_exists($path['abs']))
            return $path['url'];
    }

    return $url;
}

?>
