<?php

/**
 * Egenskaper
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($properties = get_mazda_transient('properties'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find('div[data-module-type="showroom-features"]', 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            // Headline
            $headline = $part->parent()->parent()->prev_sibling();

            $properties = array();
            $properties['headline'] = $headline->outertext;
            $properties['module'] = $part->outertext;
            // Transient
            set_mazda_transient('properties', $properties);
        }
    }
}

echo $properties['headline'];

?>

<div class="row white">
    <div class="row_content">
    <?php echo $properties['module']; ?>
    </div>
</div>
