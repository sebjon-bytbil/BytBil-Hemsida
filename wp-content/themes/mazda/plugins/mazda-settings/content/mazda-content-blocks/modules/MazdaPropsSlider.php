<?php

/**
 * Egenskaper slider
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($features = get_mazda_transient('features'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($features = $html->find($selector, 0))) {
            throw_non_object_warning('$features', __FILE__, __LINE__);
        } else {
            foreach ($features->find('.features_navigation_list') as $ul) {
                $ul->class = $ul->class . ' slides';
            }
            // Transient
            set_mazda_transient('features', $features);
        }
    }
}

echo $features;

?>

