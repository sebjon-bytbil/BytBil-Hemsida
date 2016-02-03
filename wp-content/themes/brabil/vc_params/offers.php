<?php
// Add some theme-based functionaliy for offers
function brabil_process_offers_data($atts)
{
    $items = $atts['items'];
    if (isset($items) && !empty($items)) {
        foreach ($items as $i => $item) {
            $id = $item['id'];
            if ($atts['show_as_slideshow']) {
                $offer_image = ($image = get_field('offer-image', $id)) ? $image : false;
                if ($offer_image) {
                    $items[$i]['image_url'] = $offer_image['url'];
                    $items[$i]['image_full_url'] = $offer_image['url'];
                    $items[$i]['image_medium_url'] = $offer_image['sizes']['offer'];
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
                $items[$i]['overlay_background_color'] = $overlay_background_color;

                // Caption
                $caption_background_color = 'background: transparent;';
                $caption_content = get_field('offer-caption-content', $id);
                $caption_background = get_field('offer-caption-color', $id);
                $caption_opacity = get_field('offer-caption-opacity', $id);
                $caption_animation = get_field('offer-caption-animation', $id);
                $caption_border = get_field('offer-caption-border', $id);
                $caption_position = get_field('offer-caption-position', $id);

                // Caption color
                if ($caption_opacity != 100) {
                    $opacity = $caption_opacity * 0.01;
                    $caption_background_color = 'background: ' . brabil_hex2rgba($caption_background, $opacity) . ';';
                } else {
                    $caption_background_color = $caption_background;
                }

                if ($caption_background === '') {
                    $caption_background_color = 'background: transparent;';
                }

                // Caption border
                if ($caption_border === 'true') {
                    $caption_border_color = 'border: 10px solid ' . brabil_hex2rgba($caption_background, 0.75) . ';';
                } else {
                    $caption_border_color = 'none';
                }

                // Caption style
                if ($caption_background_color !== '' || $caption_border_color !== '') {
                    $caption_style = $caption_background_color . $caption_border_color;
                }

                $items[$i]['caption_animation'] = $caption_animation;
                $items[$i]['caption_content'] = $caption_content;
                $items[$i]['caption_style'] = $caption_style;
                $items[$i]['caption_position'] = $caption_position;
            }

            $links = get_field('offer-links', $item['id']);
            if (!empty($links)) {
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
                    $offer_links[$j]['target'] = $offer_links;
                }
                $items[$i]['links'] = $offer_links;
            }
        }

        $atts['items'] = $items;
    }

    return $atts;
}
add_filter('vc-process-data-offers', 'brabil_process_offers_data');

?>
