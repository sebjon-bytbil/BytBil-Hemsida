<?php

/**
 * Bildspel
 */

// Get options
$single = (get_sub_field('single') == 1) ? true : false;
$video = (get_sub_field('single') == 2) ? true : false;
$selector = get_sub_field('selector');

if ($single) {
    $selector = '.hero_image';
}

if ($video) {
    $selector = '.video-container';
}

if (false === ($bildspel = get_mazda_transient('bildspel'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        // Add selector
        if (!is_object($part = $html->find($selector, 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            $images = null;
            $htext = null;
            $video_part = null;

            if ($video) {
                $video_obj = $part->find('video', 0);
                $video_obj->poster = add_base_url($video_obj->poster);
                $source = $video_obj->find('source', 0);
                $source->src = add_base_url($source->src);
                $part->find('img', 0)->outertext = '';
                $video_part = $part->outertext;
            } else {
                // This seems to be the same for both
                $htext = array();
                foreach ($part->find('.hero_text .hero-text-wrapper') as $text) {
                    $htext[] = $text;
                }

                if ($single) {
                    $images = $part->find('img', 0);
                } else {
                    $images = array();
                    foreach ($part->find('.carousel-image img') as $image) {
                        $images[] = $image;
                    }
                }
            }

            $bildspel = array();
            $bildspel['images'] = $images;
            $bildspel['text'] = $htext;
            $bildspel['video'] = $video_part;
            $bildspel['single'] = $single;
            // Transient
            set_mazda_transient('bildspel', $bildspel);
        }
    }
}

?>

<?php if ($video) : ?>
    <div class="row black hero-wrapper">
        <div class="row_content">
        <?php echo $bildspel['video']; ?>
        </div>
    </div>
<?php elseif ($single) : ?>
     <section id="main-slideshow" class="flexslider">
        <ul class="slides">
            <a href="#">
                <?php echo $bildspel['images']; ?>
                <div class="flexslider-caption"><?php echo $bildspel['text'][0]; ?></div>
            </a>
        </ul>
    </section>
<?php else : ?>
    <section class="section-block">
        <div class="container-fluid full">
            <div class="col-xs-12">
                <div id="main-slideshow" class="flexslider">
                    <ul class="slides">
                    <?php if (is_front_page()) : ?>
                        <?php bytbil_show_slideshow(); ?>
                    <?php endif; ?>
                    <?php foreach ($bildspel['images'] as $i => $image) : ?>
                        <li data-number="<?php echo $i; ?>">
                            <a href="#">
                                <?php echo $image; ?>
                                <div class="flexslider-caption"><?php echo $bildspel['text'][$i]; ?></div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
