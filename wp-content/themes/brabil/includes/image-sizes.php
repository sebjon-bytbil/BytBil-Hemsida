<?php
// Theme image sizes
if (function_exists('add_image_size')) {
    // Slideshow - 32:13
    add_image_size('slideshow-full', 1600, 650);
    add_image_size('slideshow-medium', 800, 325);

    // Employee - 2:3
    add_image_size('employee', 80, 120);

    // Offer
    add_image_size('offer', 960, 390);
    add_image_size('offer-thumbnail', 320, 130);
}
