<?php

/**
 * Bluetooth Support
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($bluetooth = get_mazda_transient('bluetooth'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            $bluetooth = $part->outertext;

            // Transient
            set_mazda_transient('bluetooth', $bluetooth);
        }
    }
}

?>

<div class="row">
<?php echo $bluetooth; ?>
</div>

