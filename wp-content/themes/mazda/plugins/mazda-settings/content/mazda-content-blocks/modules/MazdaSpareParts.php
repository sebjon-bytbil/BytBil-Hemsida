<?php

/**
 * Reservdelar
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($sparts = get_mazda_transient('sparts'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            $parent = $part->parent()->parent()->parent();
            $sparts = $parent->outertext;
            // Transient
            set_mazda_transient('sparts', $sparts);
        }
    }
}

echo $sparts;

?>

