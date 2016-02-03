<?php

/**
 * Färger
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($colors = get_mazda_transient('colors'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            // Headline
            $headline = $part->parent()->parent()->prev_sibling()->outertext;

            // Fix scripts
            foreach ($part->find('script') as $script) {
                $script->src = add_base_url($script->src);
            }

            $makeup = str_replace('&#34;', '"', $part->makeup());
            preg_match('/data\-module\-datafile\=\"(.*)\"/', $makeup, $matches);
            $mu = '<div class="module-360-view" data-module-type="Module360View" data-module-datafile="http://www.mazda.se' . $matches[1] . '"></div>';
            $part->outertext = $mu . $part->innertext . '</div>';

            $colors = array();
            $colors['headline'] = $headline;
            $colors['module'] = $part->outertext;
            // Transient
            set_mazda_transient('colors', $colors);
        }
    }
}

echo $colors['headline'];

?>

<div class="row white">
    <div class="row_content">
    <?php echo $colors['module']; ?>
    </div>
</div>

