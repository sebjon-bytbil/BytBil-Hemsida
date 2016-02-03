<?php
function brabil_imageslider_params($params)
{
    bb_remove_item_from_params(array('overlay_dotted', 'slider_speed', 'slider_animation_speed', 'start_date', 'stop_date'), $params);

    return $params;
}
//add_filter('bb_alter_imageslider_params', 'brabil_imageslider_params');

// Add some theme-based functionality for offers in imageslider
function brabil_process_imageslider_data($atts)
{
    if (brabil_exists($atts['slides']) && !empty($atts['slides'])) {
        foreach ($atts['slides'] as $i => $slide) {
            if ($slide['type'] !== 'offer')
                continue;

            $id = $slide['id'];

            $offer_image = ($image = get_field('offer-image', $id)) ? $image : false;
            if ($offer_image) {
                $atts['slides'][$i]['image_url'] = $offer_image['url'];
                $atts['slides'][$i]['image_full_url'] = $offer_image['url'];
                $atts['slides'][$i]['image_medium_url'] = $offer_image['sizes']['offer'];
            }

            $overlay_background_color = 'background: transparent;';
            $overlay_background = get_field('offer-overlay-color', $id);
            $overlay_opacity = get_field('offer-overlay-opacity', $id);

            if ($overlay_opacity != 100) {
                $opacity = $overlay_opacity * 0.01;
                $overlay_background_color = 'background: ' . brabil_hex2rgba($overlay_background, $opacity) . ';';
            } else {
                $overlay_background_color = $overlay_background;
            }
            $atts['slides'][$i]['overlay_background_color'] = $overlay_background_color;

            $links = get_field('offer-links', $id);
            if ($links) {
                $atts['slides'][$i]['slider_link'] = 'none';
                $offer_links = array();
                foreach ($links as $j => $link) {
                    $offer_links[$j]['text'] = $link['offer-link-text'];
                    $link_type = $link['offer-link-type'];
                    if ($link_type === 'internal') {
                        $offer_link = $link['offer-link-internal'];
                    } elseif ($link_type === 'external') {
                        $offer_link = $link['offer-link-external'];
                    } elseif ($link_type === 'file') {
                        $offer_link = $link['offer-link-file'];
                    }
                    $offer_links[$j]['link'] = $offer_link;
                    $offer_links[$j]['target'] = $link['offer-link-target'];
                }
                $atts['slides'][$i]['links'] = $offer_links;
            }

            //$overlay_dotted = get_field('offer-overlay-dotted', $id) ? '1' : '0';
            //$atts['slides'][$i]['overlay_dotted'] = $overlay_dotted;
        }
    }

    return $atts;
}
add_filter('vc-process-data-imageslider', 'brabil_process_imageslider_data');

?>
