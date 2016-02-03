<?php

/**
 * Galleri
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($gallery = get_mazda_transient('gallery'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            // Headline
            $headline = $part->parent()->parent()->prev_sibling()->outertext;

            foreach ($part->find('script') as $script) {
                $script->src = add_base_url($script->src);
            }

            $gallery = array();
            $gallery['headline'] = $headline;
            $gallery['module'] = $part->outertext;
            // Transient
            set_mazda_transient('gallery', $gallery);
        }
    }
}

echo $gallery['headline'];

?>

<div class="row white">
    <div class="row_content">
        <?php echo $gallery['module']; ?>
    </div>
</div>
