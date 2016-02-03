<?php

/**
 * Template file
 * Not in use.
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($ = get_mazda_transient(''))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        // Do something
    }
}

?>

