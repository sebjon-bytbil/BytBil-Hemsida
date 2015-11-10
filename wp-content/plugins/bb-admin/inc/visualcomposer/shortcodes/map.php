<?php
require_once("shortcode.base.php");
/**
*
*/
class MapShortcode extends ShortcodeBase
{

    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }

    function RegisterScripts()
    {
        wp_register_script('map', VCADMINURL . 'assets/js/map.js', array(), '1.0.0', true);
    }

    function EnqueueScripts()
    {
        wp_enqueue_script('map');
    }

    function processData($atts)
    {
        $map_type = self::Exists($atts['map_type'], 'map');
        if ($map_type === 'facility') {
            $id = self::Exists($atts['coordinates_facility'], '');
            if ($id !== '') {
                $coordinates = get_field('facility-visiting-address', $id);
            }

            $atts['coordinates'] = $coordinates;
            $atts['zoom'] = 14;
        } else if ($map_type === 'map') {
            $coordinates = self::Exists($atts['coordinates_map'], '');
            if ($coordinates !== '') {
                $coordinates_expl = explode(',', $coordinates);
                $coordinates = array(
                    'lat' => $coordinates_expl[0],
                    'lng' => $coordinates_expl[1]
                );
                $zoom = $coordinates_expl[2];
            } else {
                $coordinates = array(
                    'lat' => '',
                    'lng' => '',
                );
            }
            $atts['coordinates'] = $coordinates;
            $atts['zoom'] = self::Exists($zoom, '16');
        }

        $prevent_scroll = self::Exists($atts['preventscroll'], '0');
        $atts['preventscroll'] = $prevent_scroll;

        $controls = self::Exists($atts['controls'], '0');
        $atts['controls'] = $controls;

        $height = self::Exists($atts['height'], '300');
        $atts['height'] = $height;

        return $atts;
    }
}



$map = array(
    "name" => "Karta",
    "base" => "map",
    "description" => "Karta",
    "class" => "",
    "show_settings_on_create" => true,
    "weight" => 10,
    "category" => "Innehåll",
    'front_enqueue_js' => array(
        VCADMINURL . 'assets/js/editor/map_editor.js'
    ),
    "params" => array(
        array(
            'type' => 'dropdown',
            'heading' => 'Välj från anläggning eller hitta plats på kartan',
            'param_name' => 'map_type',
            'value' => array(
                'Anläggning' => 'facility',
                'Karta' => 'map'
            ),
            'description' => 'Välj om du vill visa en karta från en existerande anläggning eller on du vill hitta en plats på kartan.'
        ),
        array(
            'type' => 'cpt',
            'post_type' => 'facility',
            'heading' => 'Välj anläggning',
            'param_name' => 'coordinates_facility',
            'placeholder' => 'Välj anläggning',
            'value' => '',
            'description' => 'Välj en existerande anläggning.'
        ),
        array(
            'type' => 'map',
            'heading' => 'Karta',
            'param_name' => 'coordinates_map',
            'value' => '',
            'description' => 'Sök efter den plats som du vill visa på kartan.'
        ),
        array(
            'type' => 'checkbox',
            'heading' => 'Förhindra scroll',
            'param_name' => 'preventscroll',
            'description' => 'Bocka i om du inte vill att man ska kunna scrolla på kartan.',
            'value' => array(
                'Ja' => '1'
            )
        ),
        array(
            'type' => 'checkbox',
            'heading' => 'Kontroller',
            'param_name' => 'controls',
            'description' => 'Bocka i om du vill visa kontroller på kartan.',
            'value' => array(
                'Ja' => '1'
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Höjd',
            'param_name' => 'height',
            'description' => 'Ange höjden i pixlar.',
            'value' => ''
        )
    )

);

$vcMap = new MapShortcode($map);

?>