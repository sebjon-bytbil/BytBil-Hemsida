<?php

/**
 * Fokuslåda
 */

// Get options
$selector = get_sub_field('selector');
$nth = get_sub_field('nth-child');
$video = (get_sub_field('video') == 1) ? true : false;
$video_text = (get_sub_field('video-text') == 1) ? true : false;
$position = get_sub_field('video-position');

if (false === ($focus_box = get_mazda_transient('fbox' . $nth))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, $nth))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            if ($video) {
                $videos = array();
                foreach ($part->find('script') as $script) {
                    $video_script = $script->innertext;
                    $video_script = str_replace('&#34;', '"', $video_script);
                    $video_script = str_replace('&#39;', "'", $video_script);
                    $video_script = str_replace('&#91;', "[", $video_script);
                    $video_script = str_replace('&#93;', "]", $video_script);
                    $video_script = str_replace('&#123;', "{", $video_script);
                    $video_script = str_replace('&#125;', "}", $video_script);
                    $pattern = '/\'levels\'\:\[\{\s*\'file\'\s*\:\s*\'(.*)\'\s*\},\s*\{\s*\'file\'\s*\:\s*\'(.*)\'\s*\},\s*\{\s*\'file\'\s*\:\s*\'(.*)\'\s*\}\]/';
                    preg_match($pattern, $script->innertext, $matches);
                    $videos[] = $matches;
                }

                $vhtml = '<video width="100%" controls>';
                foreach ($videos as $arr) {
                    if (!empty($arr)) {
                        foreach ($arr as $i => $v) {
                            if ($i === 0) {
                                continue;
                            }
                            $vhtml .= '<source src="' . $v . '">';
                        }
                    }
                }
                $vhtml .= '</video>';

                // If to the left or right
                $grids = $part->find('.grid-12', 0)->children();
                foreach ($grids as $grid) {
                    if ($position == 'left') {
                        if (substr_count($grid->class, 'alpha') > 0) {
                            $container = $grid;
                        }
                    }
                    if ($position == 'right') {
                        if (substr_count($grid->class, 'omega') > 0) {
                            $container = $grid;
                        }
                    }
                }

                if ($video_text) {
                    if (!is_object($smallhd = $container->find('.smallhd', 0))) {
                        throw_non_object_warning('smallhd', __FILE__, __LINE__);
                    } else {
                        $vhtml .= $smallhd->outertext;
                    }
                }
                $container->innertext = $vhtml;
            }

            $focus_box = $part->outertext;
            // Transient
            set_mazda_transient('fbox' . $nth, $focus_box);

        }
    }
}

?>

<div class="row">
<?php echo $focus_box; ?>
</div>

