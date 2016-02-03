<?php

/**
 * Konfigurera sidebar
 */

// Get HTML-transient
$html = get_mazda_transient('html');

if (!is_object($html)) {
    throw_non_object_warning('$html', __FILE__, __LINE__);
} else {
    // Get options
    $alter_headline = (get_sub_field('alter-headline') == 1) ? true : false;
    if ($alter_headline) {
        $headline = get_sub_field('headline-text');
        // Alter headline
        if (!is_object($elements = $html->find('div[data-role="dynamic-pricing-panel"] > div div', 0))) {
            throw_non_object_warning('$elements', __FILE__, __LINE__);
        } else {
            foreach ($elements->children() as $box) {
                // Example for Norway
                //$innertext = $box->innertext;
                //preg_match_all('!\d+!', $innertext, $matches);
                //$price = implode('', $matches[0]);
                //$formatted_price = number_format(($price * 0.8), 0, '.', ' ');
                //$box->innertext = 'Från ' . $formatted_price . ' kr';
                $box->innertext = $headline;
            }
        }
    }

    $sidebar_fields = get_sub_field('sidebar-fields');
    if (sizeof($sidebar_fields) > 0) {
        // Alter sidebar
        if (!is_object($elements = $html->find('div[data-role="dynamic-pricing-panel"] > div div'))) {
            throw_non_object_warning('$elements', __FILE__, __LINE__);
        } else {
            foreach ($elements as $i => $box) {
                if (substr_count($box->class, 'bluebox') > 0 || substr_count($box->class, 'mouvebox') > 0) {
                    foreach ($sidebar_fields as $field) {

                        if ($field['menu-number'] == $i) {
                            $exclude = ($field['menu-exclude'] == 1) ? true : false;
                            if ($exclude) {
                                $box->outertext = '';
                                continue;
                            }

                            $link = ($field['menu-link'] == '') ? null : $field['menu-link'];
                            if (is_null($link)) {
                                $prop = 'data-href';
                                $link = $box->$prop;
                            }

                            $text = ($field['menu-text'] == '') ? null : $field['menu-text'];
                            if (!is_null($text)) {
                                $box->innertext = '<a href="' . $link . '">' . $text . '<span class="arrow_right"></span></a>';
                            } else {
                                $a = $box->find('a', 0);
                                $a->outertext = '<a href="' . $link . '">' . $a->innertext . '</a>';
                            }

                            if ($field['menu-color'] == 'blue') {
                                $box->outertext = '<div class="bluebox titleblue" data-href="' . $link . '">' . $box->innertext . '</div>';
                            }
                            if ($field['menu-color'] == 'purple') {
                                $box->outertext = '<div class="mouvebox titlemouve" data-href="' . $link . '">' . $box->innertext . '</div>';
                            }

                        }
                    }
                }
            }
        }
    }

    // Replace the old transient
    delete_mazda_transient('html');
    set_mazda_transient('html', $html);
}

?>

