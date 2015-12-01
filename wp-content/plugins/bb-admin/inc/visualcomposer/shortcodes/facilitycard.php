<?php
require_once('shortcode.base.php');
/**
 *
 */
class FacilityCardShortcode extends ShortcodeBase
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
        $id = self::Exists($atts['facility'], '');
        if ($id !== '') {
            $title = get_the_title($id);
            $atts['title'] = $title;

            $coordinates = get_field('facility-visiting-address', $id);
            if ($coordinates) {
                $atts['coordinates'] = $coordinates;
                $atts['zoom'] = 14;
            }

            $i = 0;
            $buttons = array();
            $facility_buttons = vc_param_group_parse_atts($atts['facility_buttons']);
            foreach ($facility_buttons as $button) {
                $buttons[$i]['text'] = $button['button_text'];
                $buttons[$i]['color'] = $button['color'];
                $buttons[$i]['link_to'] = $button['link_to'];
                ++$i;
            }

            $atts['buttons'] = $buttons;
        }

        return $atts;
    }
}

$map = array(
    'name' => 'Anläggningskort',
    'base' => 'facilitycard',
    'description' => 'Anläggningskort - Header',
    'class' => '',
    'show_settings_on_create' => true,
    'weight' => 10,
    'category' => 'Innehåll',
    'params' => array(
        array(
            'type' => 'cpt',
            'post_type' => 'facility',
            'heading' => 'Välj anläggning',
            'param_name' => 'facility',
            'placeholder' => 'Välj anläggning',
            'value' => '',
            'description' => 'Välj en existerande anläggning.'
        ),
        array(
            'type' => 'wysiwyg',
            'value' => '',
            'heading' => 'Innehåll',
            'param_name' => 'facility_content',
            'description' => 'Skriv i innehållet som du vill visa i anläggningskortet.'
        ),
        array(
            'type' => 'param_group',
            'heading' => 'Knappar',
            'param_name' => 'facility_buttons',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => 'Knapptext',
                    'param_name' => 'button_text',
                    'value' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Färg',
                    'param_name' => 'color',
                    'value' => array(
                        'Blå' => 'blue',
                        'Vit' => 'white'
                    )
                ),
                array(
                    'type' => 'href',
                    'heading' => 'Länka till',
                    'param_name' => 'link_to',
                    'value' => ''
                )
            )
        )
    )
);

$vcFacilityCard = new FacilityCardShortcode($map);

?>