<?php

/**
 * Awards modul
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($module = get_mazda_transient('awmodule'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($awmodule = $html->find($selector, 0))) {
            throw_non_object_warning('$awmodule', __FILE__, __LINE__);
        } else {
            $uncle = null;
            if (!$awmodule->find('h2')) {
                $uncle = $awmodule->parent()->parent()->prev_sibling();
            }

            // Transient
            $module['uncle'] = $uncle;
            $module['module'] = $awmodule;
            set_mazda_transient('awmodule', $module);
        }
    }
}

if (!is_null($module['uncle'])) {
    echo $module['uncle'];
}

?>
<div class="row">
    <div class="row_content">
    <?php echo $module['module']; ?>
    </div>
</div>

