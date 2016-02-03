<?php

/**
 * Buying slider
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($buying_slider = get_mazda_transient('bslider'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($bslider = $html->find($selector, 0))) {
            throw_non_object_warning('$bslider', __FILE__, __LINE__);
        } else {
            $slider_content = $bslider->find('#buying-slider li');
            $content = array();
            foreach ($slider_content as $li) {
                if (!empty($li->class)) {
                    if (substr_count('opaque', $li->class)) {
                        $li->class = '';
                    }
                }
                // Store and remove outertext for mobile
                $outertext = $li->find('div.owning', 0)->outertext;
                $li->find('div.owning', 0)->outertext = '';
                $content[] = $li->outertext;
                $li->find('div.owning', 0)->outertext = $outertext;
            }

            $buying_slider = array();
            $buying_slider['slider'] = $bslider->parent()->outertext;
            $buying_slider['content'] = $content;
            // Transient
            set_mazda_transient('bslider', $buying_slider);
        }
    }
}

?>

<div class="row gray visible-md-block visible-lg-block" style="padding:30px 0;">
<?php echo $buying_slider['slider']; ?>
</div>

<div id="mobileBuying" class="col-xs-12 col-sm-12 visible-xs-block visible-sm-block">
    <ul>
    <?php foreach ($buying_slider['content'] as $li) : ?>
        <?php echo $li; ?>
    <?php endforeach; ?>
    </ul>
</div>

