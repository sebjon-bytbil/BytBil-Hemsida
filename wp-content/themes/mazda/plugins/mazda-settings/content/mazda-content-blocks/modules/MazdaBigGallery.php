<?php

/**
 * Stort galleri
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($bgallery = get_mazda_transient('bgallery'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            $class = $part->class;
            $part->class = $class . ' dark-grey visible-md-block visible-lg-block';
            $prev = $part->prev_sibling();
            $script = $prev->innertext;
            $script = str_replace('&#39;', "'", $script);
            $script = str_replace('&#34;', '"', $script);

            $pattern = '/(var\s*galleryArray\s*\=\s*\{[\s\S]*?};)/';

            preg_match($pattern, $script, $matches);

            $replacement = preg_replace('/\$.getScript\(\s*\'/', "$.getScript('" . MAZDA_BASE_URL, $script);

            $the_script = $prev->makeup() . $replacement;

            $images = array();
            $text = array();
            foreach ($part->find('.carousel') as $carousel) {
                foreach ($carousel->find('ul') as $ul) {
                    foreach ($ul->find('li') as $li) {
                        $images[] = $li->find('div.marginT20 img', 0)->outertext;
                        $text[] = $li->find('div.description', 0)->innertext;
                    }
                }
            }

            $bgallery = array();
            $bgallery['array'] = $matches[1];
            $bgallery['script'] = $the_script;
            $bgallery['module'] = $part->outertext;
            $bgallery['images'] = $images;
            $bgallery['text'] = $text;
            // Transient
            set_mazda_transient('bgallery', $bgallery);
        }
    }
}

echo $bgallery['module'];

?>

<div id="mobileGallerySlides" class="col-xs-12 col-sm-12 visible-xs-block visible-sm-block flexslider">
    <ul class="slides">
        <?php foreach ($bgallery['images'] as $i => $image) : ?>
        <li>
            <?php echo $image; ?>
            <?php echo $bgallery['text'][$i]; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<script type="text/javascript">
<?php echo $bgallery['array']; ?>
</script>

