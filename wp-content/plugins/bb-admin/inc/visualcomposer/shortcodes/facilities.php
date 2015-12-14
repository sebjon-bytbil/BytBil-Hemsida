<?php
require_once('shortcode.base.php');

/**
 * Anläggningar
 */
class FacilitiesShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }

    function processData($atts) {

        $args = array(
            'posts_per_page'    => -1,
            'orderby'           => 'date',
            'order'             => 'DESC',
            'post_type'         => 'facility',
        );

        //echo "<pre>"; print_r($args); echo "</pre>"; // Useful for viewing the arguments in their entirety

        $facilities = new WP_Query( $args );

        if ( $facilities->have_posts() ) :

            $items = array();
            $i = 0;

            while ( $facilities->have_posts() ) : $facilities->the_post();

                // Facility/location name
                $items[$i]['name'] = get_the_title();

                // Permalink
                $items[$i]['permalink'] = get_the_permalink();

                // Visiting address
                $visiting_address = get_field('facility-visiting-address');
                $visiting_address = explode(",", $visiting_address['address']);
                $items[$i]['visiting_address_street'] = $visiting_address[0];
                $items[$i]['visiting_address_zip_postal'] = $visiting_address[1];

                // Postal address
                $items[$i]['use_postal'] = get_field('facility-use-postal-adress');
                $items[$i]['postal_address'] = get_field('facility-other-adress');

                // Phone numbers
                $items[$i]['phonenumbers'] = get_field('facility-phonenumbers');

                // E-mail addresses
                $items[$i]['emails'] = get_field('facility-emails');

                // Departments
                $items[$i]['departments'] = get_field('facility-departments');

                $i++;
            endwhile;

            $atts['items'] = $items;

        endif;

        wp_reset_query();

        return $atts;
    }
}

function bb_init_facilities_shortcode()
{
    // Map array
    $map = array(
        'name' => 'Anläggningar',
        'base' => 'facilities',
        'description' => 'anläggningar',
        'class' => '',
        'show_settings_on_create' => true,
        'weight' => 10,
        'category' => 'Innehåll',
        'params' => array(
            array(
                'type' => 'textfield',
                'holder' => 'h2',
                'class' => '',
                'heading' => 'Rubrik',
                'param_name' => 'headline',
                'value' => '',
                'description' => 'skriv in en rubrik'
            )
        )
    );

    // Alter params filter
    $map['params'] = apply_filters('bb_alter_facilities_params', $map['params']);

    $vcFacilities = new FacilitiesShortcode($map);
}
add_action('after_setup_theme', 'bb_init_facilities_shortcode');

?>