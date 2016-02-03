<?php

/**
 * HTML Text module
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($textmod = get_mazda_transient('textmod'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        $part = $html->find('div[data-module-type="html"]');
        $textmod = null;
        foreach ($part as $piece) {
            $parent = $piece->parent();
            if (substr_count($parent->class, 'column')) {
                if (substr_count($parent->class, 'alpha')) {
                    $textmod = $piece->parent()->parent()->outertext;
                }
            }
        }
        // Set transient
        set_mazda_transient('textmod', $textmod);
    }
}

if (!is_null($textmod)) : ?>
<div class="row">
<?php echo $textmod; ?>
</div>
<?php endif; ?>

