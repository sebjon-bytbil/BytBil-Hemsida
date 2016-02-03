<?php

/**
 * Utmärkelser slider
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($slideshow = get_mazda_transient('slideshow'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            // Headline
            $headline = $part->prev_sibling()->outertext;

            // Retrieve CSS background and insert into <img> tag
            foreach ($part->find('.features_navigation_list li') as $li) {
                $style = str_replace('&#39;', "'", $li->style);
                $pattern = '/url\([\'](.+)[\']\)/';
                preg_match($pattern, $style, $matches);
                $link = add_base_url($matches[1]);
                $li->innertext = '<img src="' . $link . '" />';
                $li->class = '';
                $li->style = '';
            }

            foreach ($part->find('.features_navigation_list') as $ul) {
                $ul->class = 'slides';
            }

            $slideshow = array();
            $slideshow['headline'] = $headline;
            $slideshow['module'] = $part->outertext;
            // Transient
            set_mazda_transient('slideshow', $slideshow);
        }
    }
}

echo $slideshow['headline'];
echo $slideshow['module'];

?>

