<?php

/**
 * Färgbytare
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($colorator = get_mazda_transient('colorator'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($colorator = $html->find($selector, 0))) {
            throw_non_object_warning('$colorator', __FILE__, __LINE__);
        } else {
            // Transient
            set_mazda_transient('colorator', $colorator);
        }
    }
}

echo $colorator;

?>

