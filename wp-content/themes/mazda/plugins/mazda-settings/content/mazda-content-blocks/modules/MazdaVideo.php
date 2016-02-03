<?php

/**
 * Video
 */

// Get options
$selector = get_sub_field('selector');
$multiple_videos = (get_sub_field('multiple-videos') == 1) ? true : false;
$video_text = (get_sub_field('video-text') == 1) ? true : false;

if (false === ($video_parts = get_mazda_transient('video'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($video = $html->find($selector, 0))) {
            throw_non_object_warning('$video', __FILE__, __LINE__);
        } else {
            $videos = array();
            foreach ($video->find('script') as $script) {
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
            $video->find('.video_container', 0)->innertext = $vhtml;

            $vids = null;
            if ($multiple_videos) {
                $vids = array();
                foreach ($video->parent()->find('.videos .video_category_list li') as $i => $li) {
                    $a = $li->find('div > div > a', 0);
                    $onclick = str_replace('&#39;', "'", $a->onclick);
                    $pattern = '/playVideo\(\'(.*?)\|(.*?)\|(.*?)\'/';
                    preg_match($pattern, $onclick, $matches);
                    $a->onclick = "videoLinks('" . $matches[1] . "|" . $matches[2] . "|" . $matches[3] . "');";
                    $vids[] = $li->outertext;
                }
            }

            $module = null;
            if ($video_text) {
                $module = $video->parent()->find('.module', 0);
            }

            $video_parts = array();
            $video_parts['video'] = $video;
            $video_parts['multiple'] = $vids;
            $video_parts['module'] = $module->outertext;

            // Transient
            set_mazda_transient('video', $video_parts);
        }
    }
}

?>

<div class="row">
    <div class="row_content">
    <?php echo $video_parts['video']; ?>
    <?php if ($multiple_videos) : ?>
        <div class="videos marginT12 marginB12">
            <div class="video_category clearB">
                <ul class="video_category_list">
                <?php
                foreach ($video_parts['multiple'] as $i => $video) {
                    echo $video;
                }
                ?>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
            function videoLinks(path) {
                var pathArray = path.split('|');
                var html = '';
                $.each(pathArray, function(i, link) {
                    html += '<source src="' + link + '">';
                });
                $('.video_container video').remove();
                $('.video_container').append('<video width="960" height="540" controls>' + html + '</video>');
            }
        </script>
    <?php endif; ?>
    <?php if ($video_text) : ?>
        <?php echo $video_parts['module']; ?>
    <?php endif; ?>
    </div>
</div>
