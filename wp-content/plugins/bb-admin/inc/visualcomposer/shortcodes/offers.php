<?php
require_once("shortcode.base.php");
/**
 *
 */
class OffersShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }

    function processData($atts)
    {
        $id = self::Exists($atts['offer'], false);
        if ($id) {
            $image = get_field('offer-image', $id);
            $atts['image_url'] = $image['url'];

            $title = get_field('offer-title', $id);
            $atts['title'] = $title;
        }

        return $atts;
    }
}

$map = array(
    "name" => "Erbjudanden",
    "base" => "offers",
    "description" => "Visa erbjudanden",
    "class" => "",
    "show_settings_on_create" => true,
    "weight" => 10,
    "category" => "Innehåll",
    "params" => array(
        array(
            'type' => 'cpt',
            'post_type' => 'offer',
            'heading' => 'Välj erbjudande',
            'param_name' => 'offer',
            'placeholder' => 'Välj erbjudande',
            'value' => '',
            'description' => 'Välj ett existerande erbjudande.'
        )
    )
);

$vcOffers = new OffersShortcode($map);

?>