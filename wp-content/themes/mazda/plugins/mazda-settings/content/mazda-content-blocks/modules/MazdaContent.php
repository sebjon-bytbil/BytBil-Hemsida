<?php

/**
 * Innehållsblock
 */

// Get options
$selector = get_sub_field('selector');
$nth = get_sub_field('nth-child');

if (false === ($content = get_mazda_transient('content' . $nth))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, $nth)->parent()->parent())) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            $content = $part->outertext;
            // Transient
            set_mazda_transient('content' . $nth, $content);
        }
    }
}

?>

<div class="row">
<?php echo $content; ?>
</div>

