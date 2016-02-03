<?php
/* Register Sizes */

if (function_exists('add_image_size')) {
    
    add_image_size('slideshow-default', 1600, 580, true);
    add_image_size('slideshow-hd', 1920, 696, true);
    add_image_size('slideshow-sd', 480, 174, true);

    add_image_size('rectangle-default', 1170, 600, true);
    add_image_size('rectangle-sd', 480, 246, true);
    add_image_size('rectangle-hd', 1600, 820, true);

    add_image_size('employee-default', 480, 676, true);
    add_image_size('employee-sd', 240, 338, true);
    add_image_size('employee-hd', 960, 1352, true);
    
    add_image_size('accessory-default', 480, 550, true);
    add_image_size('accessory-sd', 240, 275, true);
    add_image_size('accessory-hd', 960, 1100, true);
    
}

?>
