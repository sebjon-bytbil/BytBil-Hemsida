<?php
require_once('shortcode.base.php');

/**
 * Bildspel
 */
class ImageSliderShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }

    function RegisterScripts()
    {
        wp_register_script('flexslider', VCADMINURL . 'assets/js/vendor/jquery.flexslider-min.js', array(), '1.0.0', true);
        wp_register_script('imageslider_functionality', VCADMINURL . 'assets/js/imageslider_functionality.js', array(), '1.0.0', true);
        wp_register_script('imageslider', VCADMINURL . 'assets/js/imageslider.js', array(), '1.0.0', true);
    }

    function EnqueueScripts()
    {
        wp_enqueue_script('flexslider');
        wp_enqueue_script('imageslider_functionality');
        wp_enqueue_script('imageslider');
    }

    function processData($atts)
    {
        // Slider border
        $slider_border = self::Exists($atts['slider_border'], '0');
        if ($slider_border === '1') {
            $slider_border_color = self::Exists($atts['slider_border_color'], 'transparent');
            if (substr($slider_border_color, 0, 1) === '#') {
                $slider_border_color = self::hex2rgba($slider_border_color);
            }
            $expl_border_color = explode(',', $slider_border_color);
            $expl_border_color[3] = '0.75);';
            $impl_border_color = implode(',', $expl_border_color);
            $slider_border_style = 'border: 10px solid ' . $impl_border_color;
            $atts['slider_border_style'] = $slider_border_style;
        }

        // Slider animation
        $slider_animation = self::Exists($atts['slider_effect'], 'fade');
        $atts['slider_effect'] = $slider_animation;

        // Slider animation speed
        $slider_animation_speed = self::Exists($atts['slider_animation_speed'], '600');
        $atts['slider_animation_speed'] = $slider_animation_speed;

        // Slider speed
        $slider_speed = self::Exists($atts['slider_speed'], '7') * 1000;
        $atts['slider_speed'] = $slider_speed;

        // Arrows
        $slider_arrows = self::Exists($atts['slider_arrows'], 'false');
        $atts['slider_arrows'] = $slider_arrows;

        // Slideshow controls
        $slider_thumbnail_size = '';
        $slider_controls = self::Exists($atts['slider_controls'], 'false');
        $atts['slider_controls'] = $slider_controls;
        if ($slider_controls === 'thumbs') {
            $slider_thumbnail_size = 150;
            $slider_controls_thumbs = self::Exists($atts['slider_controls_thumbs'], 'medium');
            if ($slider_controls_thumbs === 'small') {
                $slider_thumbnail_size = 75;
            } elseif ($slider_controls_thumbs === 'large') {
                $slider_thumbnail_size = 290;
            }
            $atts['slider_thumbnail_size'] = $slider_thumbnail_size;
        }

        $i = 0;
        $slides = array();
        $slider_images = vc_param_group_parse_atts($atts['slider_images']);

        foreach ($slider_images as $slider_image) {
            $show_slide = false;
            // Dates
            $todays_date = date('Y-m-d');
            $start_date = self::Exists($slider_image['start_date'], $todays_date);
            $stop_date = self::Exists($slider_image['stop_date'], $todays_date);
            if ($todays_date >= $start_date && $todays_date <= $stop_date) {
                $show_slide = true;
            }

            if (!$show_slide) {
                continue;
            }

            // Image
            $attachment = wp_get_attachment_image_src($slider_image['slider_image'], 'full');
            $image_url = $attachment[0];
            $slides[$i]['image_url'] = $image_url;

            // Link
            $target = '_blank';
            $url = '';
            $link_type = $slider_image['link_type'];
            if ($link_type === 'internal') {
                // Get internal page link
                $page_id = self::Exists($slider_image['link_internal'], '#');
                $url = get_permalink($page_id);
                $target = '_self';
            } elseif ($link_type === 'external') {
                // Get external page link
                $url = self::Exists($slider_image['link_external'], '#');
            } elseif ($link_type === 'file') {
                // Get file link
                $url = '';
            }
            $slides[$i]['slider_link'] = $link_type;
            $slides[$i]['url'] = $url;
            $slides[$i]['target'] = $target;

            // Overlay
            $overlay_dotted = self::Exists($slider_image['overlay_dotted'], '0');
            $overlay_background_color = self::Exists($slider_image['overlay_color'], 'transparent') . ';';
            $explode_overlay = explode(',', $overlay_background_color);
            if ($explode_overlay[3] === '0.01);') {
                $overlay_background_color = 'transparent';
            }
            $slides[$i]['overlay_dotted'] = $overlay_dotted;
            $slides[$i]['overlay_background_color'] = 'background: ' . $overlay_background_color;

            // Caption
            $caption_white = self::Exists($slider_image['caption_white'], '0');
            $caption_content = self::Exists($slider_image['caption_content'], '');
            $caption_background_color = self::Exists($slider_image['caption_color'], 'transparent') . ';';
            $caption_animation = self::Exists($slider_image['caption_animation'], 'fade');
            $caption_border = self::Exists($slider_image['caption_border'], '0');
            if ($caption_border === '1') {
                // Caption border color
                if (substr($caption_background_color, 0, 1) === '#') {
                    $slider_border_color = self::hex2rgba($caption_background_color);
                }
                $expl_caption_bg = explode(',', $caption_background_color);
                $expl_caption_bg[3] = '0.75);';
                $impl_caption_bg = implode(',', $expl_caption_bg);
                $caption_border_color = '10px solid ' . $impl_caption_bg;
            } else {
                $caption_border_color = 'none;';
            }
            $caption_style = 'background:' . $caption_background_color . 'border:' . $caption_border_color;
            $caption_position = self::Exists($slider_image['caption_position'], 'center');
            $slides[$i]['caption_white'] = $caption_white;
            $slides[$i]['caption_content'] = $caption_content;
            $slides[$i]['caption_animation'] = $caption_animation;
            $slides[$i]['caption_style'] = $caption_style;
            $slides[$i]['caption_position'] = $caption_position;

            // Increment
            ++$i;
        }

        $atts['slides'] = $slides;

        return $atts;
    }
}

function bb_init_imageslider_shortcode()
{
    // Map array
    $map = array(
        'name' => 'Bildspel',
        'base' => 'imageslider',
        'description' => 'Bildspel',
        'class' => '',
        'show_settings_on_create' => true,
        'weight' => 10,
        'category' => 'Innehåll',
        'front_enqueue_js' => array(
            VCADMINURL . 'assets/js/editor/imageslider_editor.js',
            VCADMINURL . 'assets/js/datepicker.js'
        ),
        'front_enqueue_css' => array(
            'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css'
        ),
        'params' => array(
            array(
                'type' => 'param_group',
                'value' => '',
                'param_name' => 'slider_images',
                'save_always' => 'true',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'value' => '',
                        'heading' => 'Bild',
                        'param_name' => 'slider_image'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'value' => '',
                        'heading' => 'Overlay bakgrundsfärg',
                        'param_name' => 'overlay_color',
                        'description' => 'Välj vilken färg samt styrka som overlay skall ha.'
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => 'Prickig overlay',
                        'param_name'=> 'overlay_dotted',
                        'description' => 'Bocka i om du vill ha en prickig overlay.',
                        'value' => array(
                            'Ja' => '1',
                        )
                    ),
                    array(
                        'type' => 'wysiwyg',
                        'value' => '',
                        'heading' => 'Textrutans innehåll',
                        'param_name' => 'caption_content',
                        'description' => 'Skriv i innehållet du vill visa i textrutan på bildspelet.'
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => 'Vit text',
                        'param_name' => 'caption_white',
                        'description' => 'Bocka i om du vill ha vit textfärg.',
                        'value' => array(
                            'Ja' => '1',
                        )
                    ),
                    array(
                        'type' => 'colorpicker',
                        'value' => '',
                        'heading' => 'Textrutans bakgrundsfärg',
                        'param_name' => 'caption_color',
                        'description' => 'Välj vilken färg samt styrka som textrutan skall ha.'
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => 'Animera textrutan',
                        'param_name' => 'caption_animation',
                        'value' => array(
                            'Ingen' => 'none',
                            'Tona in' => 'fade',
                            'Glid in från vänster' => 'left',
                            'Glid in från höger' => 'right'
                        ),
                        'description' => 'Välj om du vill visa textrutan med en animeringseffekt.'
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => 'Visa kantram',
                        'param_name' => 'caption_border',
                        'description' => 'Bocka i om du vill visa en kantram på textrutan.',
                        'value' => array(
                            'Ja' => '1',
                        )
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => 'Textrutans position',
                        'param_name' => 'caption_position',
                        'value' => array(
                            'Centrerad' => 'center',
                            'Vänster' => 'left',
                            'Höger' => 'right',
                            'Centrerad i överkant' => 'top-center',
                            'Vänster i överkant' => 'top-left',
                            'Höger i överkant' => 'top-right',
                            'Centrerad i underkant' => 'bottom-center',
                            'Vänster i underkant' => 'bottom-left',
                            'Höger i underkant' => 'bottom-right'
                        ),
                        'description' => 'Bestäm vart i bilden textrutan skall placeras.'
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => 'Länka slide till',
                        'param_name' => 'link_type',
                        'value' => array(
                            'Ingenting' => 'none',
                            'Intern sida' => 'internal',
                            'Extern URL' => 'external',
                            'Fil eller media' => 'file'
                        ),
                        'description' => 'Välj om du vill länka hela bilden till ett innehåll.'
                    ),
                    array(
                        'type' => 'pages',
                        'heading' => 'Sida',
                        'param_name' => 'link_internal',
                        'value' => '',
                        'description' => 'Välj en sida som bilden skall länka till.'
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => 'URL',
                        'param_name' => 'link_external',
                        'value' => '',
                        'description' => 'Fyll i en adress som bilden skall länka till.'
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => 'Fil',
                        'param_name' => 'link_file',
                        'value' => '',
                        'description' => 'Välj eller ladda upp en fil som bilden skall länka till.'
                    ),
                    array(
                        'type' => 'datepicker',
                        'heading' => 'Visa från',
                        'param_name' => 'start_date',
                        'value' => '',
                        'description' => 'Fyll i det datum bilden skall visas från.'
                    ),
                    array(
                        'type' => 'datepicker',
                        'heading' => 'Visa till',
                        'param_name' => 'stop_date',
                        'value' => '',
                        'description' => 'Fyll i det datum bilden skall visas till.'
                    )
                )
            ),
            array(
                'type' => 'checkbox',
                'group' => 'Inställningar',
                'heading' => 'Kantram',
                'param_name' => 'slider_border',
                'save_always' => 'true',
                'value' => array(
                    'Ja' => '1'
                ),
                'description' => 'Bocka i om du vill visa en kantram på bildspelet.'
            ),
            array(
                'type' => 'colorpicker',
                'group' => 'Inställningar',
                'heading' => 'Ramfärg',
                'param_name' => 'slider_border_color',
                'value' => '',
                'description' => 'Välj en färg du vill rama in bildspelet med.',
            ),
            array(
                'type' => 'dropdown',
                'group' => 'Inställningar',
                'heading' => 'Animationseffekt',
                'param_name' => 'slider_effect',
                'value' => array(
                    'Tona in / ut' => 'fade',
                    'Glid in / ut' => 'slide'
                ),
                'description' => 'Välj den animationseffekt bilderna skall växla med.'
            ),
            array(
                'type' => 'dropdown',
                'group' => 'Inställningar',
                'heading' => 'Animationshastighet',
                'param_name' => 'slider_animation_speed',
                'value' => array(
                    'Standard' => '600',
                    'Snabb' => '250',
                    'Långsam' => '950'
                ),
                'description' => 'Välj vilken animationshastighet bilderna skall växla med.'
            ),
            array(
                'type' => 'textfield',
                'group' => 'Inställningar',
                'heading' => 'Tid per bild',
                'param_name' => 'slider_speed',
                'value' => '',
                'description' => 'Fyll i det antal sekunder varje bild skall visas i.'
            ),
            array(
                'type' => 'radio',
                'group' => 'Inställningar',
                'heading' => 'Pilar',
                'param_name' => 'slider_arrows',
                'value' => array(
                    'Ja' => 'true',
                    'Nej' => 'false'
                ),
                'description' => 'Välj om du vill visa pilar i bildspelet.'
            ),
            array(
                'type' => 'dropdown',
                'group' => 'Inställningar',
                'heading' => 'Bildkontroller',
                'param_name' => 'slider_controls',
                'value' => array(
                    'Punkter' => 'true',
                    'Miniatyrer' => 'thumbs',
                    'Inga kontroller' => 'false'
                ),
                'description' => 'Välj vilken typ av bildkontroller som skall visas.'
            ),
            array(
                'type' => 'dropdown',
                'group' => 'Inställningar',
                'heading' => 'Miniatyrstorlek',
                'param_name' => 'slider_controls_thumbs',
                'value' => array(
                    'Standard' => 'medium',
                    'Små' => 'small',
                    'Stora' => 'large'
                ),
                'description' => 'Välj vilken storlek miniatyrerna skall ha.'
            )
        )
    );

    // Alter params filter
    $map['params'] = apply_filters('bb_alter_imageslider_params', $map['params']);

    $vcImageSlider = new ImageSliderShortcode($map);
}
add_action('after_setup_theme', 'bb_init_imageslider_shortcode');

?>