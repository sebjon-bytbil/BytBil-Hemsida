<?php
require_once('shortcode.base.php');

/**
 * Erbjudanden
 */
class OffersShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }

    function RegisterScripts()
    {
        wp_register_script('multiselect', VCADMINURL . 'assets/js/multiselect.js', array(), '1.0.0', true);
    }
    function EnqueueScripts()
    {
        wp_enqueue_script('multiselect');
    }

    function processData($atts)
    {

        if ($atts['offers_choice'] == 'all') {

            $columns = $atts['columns'];

            $relation = array('relation' => 'OR');
            $posts_per_page = $atts['posts_per_page'];

            if($atts['posts_per_page'] == null) {
                $posts_per_page = "-1";
            }

            // Set up the array for brand filtration
            $brand_query = array();
            if($atts['offer_brands']) {
                $offer_brands = explode(",", $atts['offer_brands']);

                foreach($offer_brands as $offer_brand) {
                    array_push(
                        $brand_query,
                        array(
                            'key'       => 'offer-brands',
                            'value'     => $offer_brand,
                            'compare'   => 'LIKE',
                        )
                    );
                }
                $brand_query = array_merge($relation, $brand_query);
            }

            // Set up the array for facility filtration
            $facility_query = array();
            if($atts['offer_facilities']) {
                $offer_facilities = explode(",", $atts['offer_facilities']);

                foreach($offer_facilities as $offer_facility) {
                    array_push(
                        $facility_query,
                        array(
                            'key'       => 'offer-facililties',
                            'value'     => $offer_facility,
                            'compare'   => 'LIKE',
                        )
                    );
                }
                $facility_query = array_merge($relation, $facility_query);
            }

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
                'posts_per_page'    => $posts_per_page,
                'orderby'           => 'date',
                'order'             => 'DESC',
                'paged'             => $paged,
                'post_type'         => 'offer',
                'meta_query'        => array(
                    'relation' => 'AND',
                    $brand_query,
                    $facility_query,
                    array(
                        'relation' => 'AND',
                        array(
                            'relation' => 'OR',
                            array(
                                'key'       => 'offer-date-start',
                                'value'     => date("Ymd"),
                                'compare'   => '<=',
                                'type'      => 'date',
                            ),
                            array(
                                'key'       => 'offer-date-start',
                                'value'     => '',
                                'compare'   => '=',
                            ),
                        ),
                        array(
                            'relation' => 'OR',
                            array(
                                'key'       => 'offer-date-stop',
                                'value'     => date("Ymd"),
                                'compare'   => '>=',
                                'type'      => 'date',
                            ),
                            array(
                                'key'       => 'offer-date-stop',
                                'value'     => '',
                                'compare'   => '=',
                            ),
                        ),
                    ),
                )
            );

            //echo "<pre>"; print_r($args); echo "</pre>"; // Useful for viewing the arguments in their entirety

            $offers = new WP_Query( $args );

            if ( $offers->have_posts() ) :

                $items = array();
                $i = 0;

                while ( $offers->have_posts() ) : $offers->the_post();

                    // Headline
                    $items[$i]['headline'] = get_the_title();
            
                    $items[$i]['permalink'] = get_the_permalink();

                    // Ingress
                    $items[$i]['ingress'] = get_field('offer-subheader');

                    // Image
                    $offer_image = get_field('offer-image');
                    $items[$i]['image'] = $offer_image['url'];

                    // Brands
                    $offer_brands = get_field('offer-brands');
                    $brands_list = array();
                    foreach($offer_brands as $offer_brand) {
                        array_push($brands_list, $offer_brand->post_title);
                    }
                    $items[$i]['brands'] = $brands_list;

                    $i++;
                endwhile;

                $atts['items'] = $items;

            endif;

            $atts['pagination_prev'] = get_previous_posts_link( '&lsaquo; Föregående sida' );
            $atts['pagination_separator'] = get_previous_posts_link() ? " &nbsp;|&nbsp; " : "";
            $atts['pagination_next'] = get_next_posts_link( 'Nästa sida &rsaquo;', $offers->max_num_pages );

            wp_reset_query();

        } else {

            $id = self::Exists($atts['offer'], false);
            if ($id) {
                $image = get_field('offer-image', $id);
                $atts['image_url'] = $image['url'];

                $title = get_field('offer-title', $id);
                $atts['title'] = $title;
            }

        }

        return $atts;
    }
}

function bb_init_offers_shortcode()
{
    // Map array
    $map = array(
        'name' => 'Erbjudanden',
        'base' => 'offers',
        'description' => 'Visa erbjudanden',
        'class' => '',
        'show_settings_on_create' => true,
        'weight' => 10,
        'category' => 'Innehåll',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => 'Urval av erbjudanden',
                'param_name' => 'offers_choice',
                'value' => array(
                    'Alla erbjudanden' => 'all',
                    'Enskilt erbjudande' => 'single',
                )
            ),
            array(
                'type' => 'cpt',
                'post_type' => 'offer',
                'heading' => 'Välj erbjudande',
                'param_name' => 'offer',
                'placeholder' => 'Välj erbjudande',
                'value' => '',
                'description' => 'Välj ett existerande erbjudande.',
                'dependency' => array(
                    'element' => 'offers_choice',
                    'value' => 'single'
                )
            ),
            array(
                'type' => 'multiselect',
                'post_type' => 'brand',
                'heading' => 'Filtrera på märke',
                'param_name' => 'offer_brands',
                'dependency' => array(
                    'element' => 'offers_choice',
                    'value' => 'all'
                )
            ),
            array(
                'type' => 'multiselect',
                'post_type' => 'facility',
                'heading' => 'Filtrera på ort',
                'param_name' => 'offer_facilities',
                'dependency' => array(
                    'element' => 'offers_choice',
                    'value' => 'all'
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Kolumner per rad',
                'param_name' => 'columns',
                'placeholder' => 'Kolumner per rad',
                'value' => array(
                    'En' => 12,
                    'Två' => 6,
                    'Tre' => 4,
                    'Fyra' => 3,
                    'Sex' => 2,
                ),
                'dependency' => array(
                    'element' => 'offers_choice',
                    'value' => 'all'
                )
            ),
            array(
                'type' => 'integer',
                'heading' => 'Poster per sida',
                'param_name' => 'posts_per_page',
                'placeholder' => 'Poster per rad',
                'min' => 0,
                'max' => 100,
                'dependency' => array(
                    'element' => 'offers_choice',
                    'value' => 'all'
                )
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Inkludera sidbläddring',
                'param_name' => 'pagination',
                'value' => array(
                    'Ja' => 1,
                ),
                'dependency' => array(
                    'element' => 'offers_choice',
                    'value' => 'all'
                )
            ),
        )
    );

    // Alter params filter
    $map['params'] = apply_filters('bb_alter_offers_params', $map['params']);

    $vcOffers = new OffersShortcode($map);
}
add_action('after_setup_theme', 'bb_init_offers_shortcode');

?>