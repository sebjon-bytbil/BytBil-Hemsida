<?php include_once('simple_html_dom.php');
/* 
*	http://simplehtmldom.sourceforge.net/manual.htm
*	TODO:
*	- inline-css URL (eg.backgrounds)
*	- @import CSS inside CSS
*	- Javascript
*
*
*/
function bytbil_embed_func($atts)
{
    //URL
    $url = $atts['url'];

    $parsed_url = parse_url($url);
    $full_url = $parsed_url['scheme'] . '://' . $parsed_url['host'];

    //HTML
    $html = file_get_html($url);
    $elementWithId = $atts['id'];
    $elementWithClass = $atts['class'];
    $getCss = $atts['css'];

    $elem = $html->find('*[id=' . $elementWithId . ']', 0);

    $count = 0;
    $current = 0;
    $img_links = array();

    //var_dump($html);

    //REPLACE INLINE CSS URLS
    //$html->find('div[style="padding: 0px 2px;"]');

    $style = $html->find('head', 0)->find('style')->plaintext;
    //var_dump($style);

    //REPLACE IMG LINKS
    foreach ($elem->find('img') as $element) {

        if (strpos($element->src, 'http://') !== false) {
            $img_target = $element->src;
            array_push($img_links, $img_target);
        } else if (strpos($element->src, '..') !== false) {
            $img_target = substr($element->src, 2);
            array_push($img_links, $full_url . $img_target);
        } else {
            $img_target = $element->src;
            array_push($img_links, $full_url . $img_target);
        }

        $count++;
    }

    while ($current <= $count) {
        $elem->find('img', $current)->outertext = '<img src="' . $img_links[$current] . '"/>';
        $current++;
    }

    if ($getCss == 'yes' || $getCss == '1' || $getCss == 'ja') {
        //CSS
        $count_css = 0;
        $current_css = 0;

        $css_urls = array();
        foreach ($html->find('link') as $element) {

            if (strpos($element->href, 'http://') !== false) {
                $link_path = $element->href;
                $css_url = $link_path;
            } else if (strpos($element->href, '../') !== false) {
                $link_path = substr($element->href, 2);
                $css_url = $full_url . $link_path;

            } else {
                $link_path = $element->href;
                $css_url = $full_url . $link_path;
            }
            $count_css++;
            array_push($css_urls, $css_url);
        }
        //var_dump($css_urls);

        while ($current_css <= $count_css) {
            $css = file_get_html($css_urls[$current_css]);
            if ($css != '') {
                $css_plaintext = $css->plaintext;

                $css_block = split("}", $css_plaintext);

                //$css_block = split(",", $css_block);

                $css_plaintext = str_ireplace("..", $full_url, $css_plaintext);

                echo '<style>';
                foreach ($css_block as $line) {
                    echo ' #embedded_content ' . $line . '}';
                }
                echo '</style>';

            }
            $current_css++;
        }
    }

    //PRINT
    echo '<div id="embedded_content">' . $elem . '</div>';

}

add_shortcode('bytbil_embed', 'bytbil_embed_func');
?>