<?php

/**
 * Förvaringsverktyg
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($storage = get_mazda_transient('storage'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            $script = $part->prev_sibling();

            $storage = array();
            $storage['module'] = $part->outertext;
            $storage['script'] = $script->outertext;
            // Transient
            set_mazda_transient('storage', $storage);
        }
    }
}

echo $storage['module'];

?>

