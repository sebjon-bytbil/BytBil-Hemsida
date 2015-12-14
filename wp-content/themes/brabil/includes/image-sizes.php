<?php
// Theme image sizes
if (function_exists('add_image_size')) {
    // Slideshow - 32:13
    add_image_size('slideshow-full', 1600, 650);
    add_image_size('slideshow-medium', 800, 325);

    // Employee - 2:3
    add_image_size('employee', 120, 180);
}
