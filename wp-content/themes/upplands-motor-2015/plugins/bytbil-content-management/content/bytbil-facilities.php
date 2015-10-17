<?php
/*
Plugin Name: BytBil Anläggningar
Description: Skapa och visa anläggningsinformation på din hemsida.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 3.0.1
Author URI: http://www.bytbil.com
*/

add_action('init', 'cptui_register_my_cpt_facility');
function cptui_register_my_cpt_facility()
{
    register_post_type('facility', array(
        'label' => 'Anläggningar',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'facility', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions'),
        'taxonomies' => array('brand', 'cities'),
        'labels' => array(
            'name' => 'Anläggningar',
            'singular_name' => 'Anläggning',
            'menu_name' => 'Anläggningar',
            'add_new' => 'Add Anläggning',
            'add_new_item' => 'Add New Anläggning',
            'edit' => 'Edit',
            'edit_item' => 'Edit Anläggning',
            'new_item' => 'New Anläggning',
            'view' => 'View Anläggning',
            'view_item' => 'View Anläggning',
            'search_items' => 'Search Anläggningar',
            'not_found' => 'No Anläggningar Found',
            'not_found_in_trash' => 'No Anläggningar Found in Trash',
            'parent' => 'Parent Anläggning',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_anlaggningsinformation',
        'title' => 'Anläggningsinformation',
        'fields' => array(
            array(
                'key' => 'field_5511781bd226c',
                'label' => 'Kontaktuppgifter',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_551176e2d2268',
                'label' => 'Besöksadress',
                'name' => 'facility-visiting-address',
                'type' => 'google_map',
                'instructions' => 'Välj eller sök reda på positionen på kartan där anläggningen ligger.',
                'center_lat' => '59.421137',
                'center_lng' => '17.924942',
                'zoom' => 14,
                'height' => 250,
            ),
            array(
                'key' => 'field_551177a3d2269',
                'label' => 'Använd annan postadress',
                'name' => 'facility-use-postal-address',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_551177c9d226a',
                'label' => 'Postaddress',
                'name' => 'facility-postal-address',
                'type' => 'textarea',
                'instructions' => 'Fyll i anläggningens postadress.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_551177a3d2269',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_postal5511782ad226d',
                'label' => 'Textruta Kontakta Oss',
                'name' => 'facility-contact-us-text',
                'type' => 'wysiwyg',
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
            array(
                'key' => 'field_5511782ad226d',
                'label' => 'Kontaktformulär',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_contact5511782ad226d',
                'label' => 'Textruta formulär',
                'name' => 'facility-form-text',
                'type' => 'wysiwyg',
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
            array(
                'key' => 'field_fac554840e002bb8',
                'label' => 'Kontaktformulär',
                'name' => 'content-existing-form',
                'type' => 'acf_cf7',
                'column_width' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'disable' => array(
                    0 => 0,
                ),
            ),
            array (
                'key' => 'field_fac55e6ac5358bf1',
                'label' => 'Anläggningar',
                'name' => 'content-form-facilities',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'facility',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
            array (
                'key' => 'field_fac55e6aca558bf2',
                'label' => 'Märke',
                'name' => 'content-form-brands',
                'type' => 'taxonomy',
                'taxonomy' => 'brand',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'load_save_terms' => 0,
                'return_format' => 'object',
                'multiple' => 0,
            ),
            array (
                'key' => 'field_fac55e6ad4558bf3',
                'label' => 'Avdelning',
                'name' => 'content-form-departments',
                'type' => 'taxonomy',
                'taxonomy' => 'departments',
                'field_type' => 'multi_select',
                'allow_null' => 0,
                'load_save_terms' => 0,
                'return_format' => 'object',
                'multiple' => 0,
            ),
            /*array(
                'key' => 'field_55117848d226e',
                'label' => 'Växel',
                'name' => 'facility-telephone-nr',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),*/
            /*array(
                'key' => 'field_551178cad226f',
                'label' => 'Verkstad',
                'name' => 'facility-telephone-nr-service',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),*/
            /*array(
                'key' => 'field_551178f7d2270',
                'label' => 'E-post',
                'name' => 'facility-email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),*/
            array(
                'key' => 'field_5511782add126d',
                'label' => 'Lokaltrafik',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5511782add126d123as',
                'label' => 'Knapptext',
                'name' => 'localtrafic-text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5511782add126d123a2',
                'label' => 'URL för sökning',
                'name' => 'localtrafic-url',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'facility',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'excerpt',
                1 => 'custom_fields',
                2 => 'discussion',
                3 => 'comments',
                4 => 'revisions',
                5 => 'slug',
                6 => 'author',
                7 => 'format',
                8 => 'featured_image',
                9 => 'categories',
                10 => 'tags',
                11 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 1,
    ));

    register_field_group(array(
        'id' => 'acf_avdelningar-och-oppettider',
        'title' => 'Avdelningar och öppettider',
        'fields' => array(
            array(
                'key' => 'field_55117bfc3478b',
                'label' => 'Avdelningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_55117c143478c',
                'label' => 'Vad har anläggningen för avdelningar',
                'name' => 'facility-departments',
                'type' => 'checkbox',
                'choices' => array(
                    'carsales' => 'Bilförsäljning',
                    'store' => 'Butik och bildelar',
                    'damage' => 'Skadecenter',
                    'workshop' => 'Verkstad',
                    'other' => 'Lägg till andra',
                ),
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_5152acb68d1645a700',
                'label' => 'Extrainformation (Öppettider)',
                'name' => 'facility-openhours-contents',
                'type' => 'wysiwyg',
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
            array(
                'key' => 'field_5511798334776',
                'label' => 'Bilförsäljning',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_55117c143478c',
                            'operator' => '==',
                            'value' => 'carsales',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_55117ab43477b',
                'label' => 'Direktnummer',
                'name' => 'facility-carsales-telephone-nr',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5511798e34777',
                'label' => 'Måndag - Fredag',
                'name' => 'facility-carsales-openhours-weekdays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_551179d234778',
                'label' => 'Lördag',
                'name' => 'facility-carsales-openhours-saturdays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117a653477a',
                'label' => 'Söndag',
                'name' => 'facility-carsales-openhours-sundays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117acf3477c',
                'label' => 'Butik och bildelar',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_55117c143478c',
                            'operator' => '==',
                            'value' => 'store',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_55117adf3477d',
                'label' => 'Direktnummer',
                'name' => 'facility-store-telephone-nr',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117ae23477e',
                'label' => 'Måndag - Fredag',
                'name' => 'facility-store-openhours-weekdays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117ae73477f',
                'label' => 'Lördag',
                'name' => 'facility-store-openhours-saturdays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117af034780',
                'label' => 'Söndag',
                'name' => 'facility-store-openhours-sundays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117b3a34781',
                'label' => 'Skadecenter',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_55117c143478c',
                            'operator' => '==',
                            'value' => 'damage',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_55117b5c34785',
                'label' => 'Direktnummer',
                'name' => 'facility-damage-telephone-nr',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117b4c34782',
                'label' => 'Måndag - Fredag',
                'name' => 'facility-damage-openhours-weekdays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117b4e34783',
                'label' => 'Lördag',
                'name' => 'facility-damage-openhours-saturdays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117b5334784',
                'label' => 'Söndag',
                'name' => 'facility-damage-openhours-sundays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117b9334786',
                'label' => 'Verkstad',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_55117c143478c',
                            'operator' => '==',
                            'value' => 'workshop',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_55117ba534787',
                'label' => 'Direktnummer',
                'name' => 'facility-workshop-telephone-nr',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117ba734788',
                'label' => 'Måndag - Fredag',
                'name' => 'facility-workshop-openhours-weekdays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117ba934789',
                'label' => 'Lördag',
                'name' => 'facility-workshop-openhours-saturdays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117bab3478a',
                'label' => 'Söndag',
                'name' => 'facility-workshop-openhours-sundays',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_55117cc1f1cb7',
                'label' => 'Andra avdelningar',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_55117c143478c',
                            'operator' => '==',
                            'value' => 'other',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_55117cd3f1cb8',
                'label' => 'Avdelning',
                'name' => 'facility-other-departments',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_55117cecf1cb9',
                        'label' => 'Namn',
                        'name' => 'department-name',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_55117cfcf1cba',
                        'label' => 'Direktnummer',
                        'name' => 'department-telephone-nr',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_55117d0cf1cbb',
                        'label' => 'Måndag - Fredag',
                        'name' => 'department-openhours-weekdays',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_55117d24f1cbc',
                        'label' => 'Lördag',
                        'name' => 'department-openhours-saturdays',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_55117d35f1cbd',
                        'label' => 'Söndag',
                        'name' => 'department-openhours-sundays',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till avdelning',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'facility',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 2,
    ));
}


function show_map($id)
{

    $location = get_field('facility-visiting-address', $id);

    if (!empty($location)) {
        ?>
        <style type="text/css">

            .acf-map {
                width: 100%;
                height: 670px;
                border: none;
            }

        </style>

        <link rel="stylesheet" href="/wp-content/themes/upplands-motor/css/extra/lightcase.css">
        <script src="/wp-content/themes/upplands-motor/js/extra/lightcase.min.js"></script>

        <div class="direction-container">
            <h1 class="visible-xs" style="text-align: center;"><?php the_title(); ?></h1>
            <a class="button red button-red" data-rel="lightcase" href="//maps.google.se/maps?daddr=<?php echo $location['address']; ?>&ie=UTF8&t=h&z=7&layer=t&output=embed"> Visa vägbeskrivning</a>
            <a class="button sl" data-rel="lightcase" href="<?php echo get_field('localtrafic-url', $id); ?>"><?php echo get_field('localtrafic-text', $id); ?></a>
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('a[data-rel^=lightcase]').lightcase();
            });
        </script>

        <div class="acf-map" id="facility-map-<?php echo $id; ?>">
            <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                 data-lng="<?php echo $location['lng']; ?>">
            </div>
        </div>

        <script>
        
            (function ($) {
                function render_map($el) {

                    // var
                    var $markers = $el.find('.marker');

                    // vars
                    var args = {
                        zoom: 16,
                        center: new google.maps.LatLng(0, 0),
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        styles: [
                            {
                                "featureType": "administrative",
                                "elementType": "labels.text.fill",
                                "stylers": [
                                    {
                                        "color": "#444444"
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative.province",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative.locality",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "on"
                                    }
                                ]
                            },
                            {
                                "featureType": "landscape",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "color": "#f2f2f2"
                                    },
                                    {
                                        "visibility": "on"
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "road",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "saturation": -100
                                    },
                                    {
                                        "lightness": 45
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "simplified"
                                    }
                                ]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "labels.icon",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "transit",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "water",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "color": "#86a6b2"
                                    },
                                    {
                                        "visibility": "on"
                                    }
                                ]
                            }
                        ],
                    };

                    // create map
                    var map = new google.maps.Map($el[0], args);

                    // add a markers reference
                    map.markers = [];

                    // add markers
                    $markers.each(function () {

                        add_marker($(this), map);

                    });

                    // center map
                    center_map(map);

                }

                /*
                 *  add_marker
                 *
                 *  This function will add a marker to the selected Google Map
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	$marker (jQuery element)
                 *  @param	map (Google Map object)
                 *  @return	n/a
                 */

                function add_marker($marker, map) {

                    // var
                    var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

                    // create marker
                    var marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        icon: new google.maps.MarkerImage('/wp-content/themes/upplands-motor/images/map-marker.png', null, null, null, new google.maps.Size(72, 72)),
                    });

                    // add to array
                    map.markers.push(marker);

                }

                /*
                 *  center_map
                 *
                 *  This function will center the map, showing all markers attached to this map
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	map (Google Map object)
                 *  @return	n/a
                 */

                function center_map(map) {

                    // vars
                    var bounds = new google.maps.LatLngBounds();

                    // loop through all markers and create bounds
                    $.each(map.markers, function (i, marker) {

                        var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

                        bounds.extend(latlng);

                    });

                    // only 1 marker?
                    if (map.markers.length == 1) {
                        // set center of map
                        map.setCenter(bounds.getCenter());
                        map.setZoom(12);
                        map.panBy(-15, 200)

                    }
                    else {
                        // fit to bounds
                        map.fitBounds(bounds);
                    }

                }

                $(document).ready(function () {
                    
                    $('a[data-rel^=lightcase]').lightcase({
                        maxWidth: 1170,
                        maxHeight: 640,
                    });

                    $('#facility-map-<?php echo $id; ?>').each(function () {

                        render_map($(this));

                    });

                });
            })(jQuery);


        </script>
    <?php
    }
}

function show_cards($id)
{

    $facility_address = get_field('facility-visiting-address', $id);
    $use_postal_address = get_field('facility-use-postal-address', $id);

    if ($use_postal_address) {
        $facility_postal_address = get_field('facility-postal-address', $id);
    }

    $facility_phone = $option_fields['settings-contact-phonenumber'];
    /*$facility_service = get_field('facility-telephone-nr-service', $id);*/
    /*$facility_email = get_field('facility-email', $id);*/

    $facility_address = str_replace('Sverige', '', str_replace(',', '<br>', $facility_address['address']));
    ?>

    <div class="facility-card-wrapper">
        <div class="container-fluid wrapper">
            <div class="">
                <div class="col-xs-12 col-sm-4">
                    <div class="facility-card block white-bg" style="text-align: center;">
                        <?php
                            the_field('facility-contact-us-text', $id);
                        ?>
                        <span class="facility-card-subtitle bold"><?php echo get_the_title($id); ?></span>
                        <span class="facility-card-text"><?php echo $facility_address; ?></span>

                        <?php if ($use_postal_address) { ?>
                            <span class="facility-card-subtitle bold">Postadress</span>
                            <span class="facility-card-text"><?php echo $facility_postal_address; ?></span>
                        <?php } ?>

                        <span class="facility-card-subtitle bold">Ring oss</span>
                        <a href="tel:<?php echo $facility_phone; ?>" class="button green">
                            <i class="icon icon-phone"></i> <?php echo $facility_phone; ?>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="facility-card block white-bg">
                        <?php
                            the_field('facility-form-text', $id);
                        ?>

                        <!-- FORM START -->

                        <?php
                            $facilities = get_field('content-form-facilities', $id);
                            $facility_from_terms = false;
                            $brands_tax = get_field('content-form-brands', $id);
                            $departments = get_field('content-form-departments', $id);
                            $form = get_field('content-existing-form', $id);
                            $form_id = set_wpcf7_array($form);

                            if (!$facilities) {
                                $cities_terms = wp_get_post_terms($id, 'cities');
                                if (!empty($cities_terms)) {
                                    $facilities = $cities_terms;
                                    $facility_from_terms = true;
                                }
                            }

                            if (!$brands_tax) {
                                $brands_terms = wp_get_post_terms($id, 'brand');
                                if (!empty($brands_terms)) {
                                    $brands_tax = $brands_terms;
                                }
                            }

                            if ($facilities) {
                                ?>

                                <script>
                                    var facilities = [
                                        <?php
                                        $items = count($facilities);
                                        $i = 0;
                                        foreach ($facilities as $facility) {
                                            if ($facility->name === 'Arlanda')
                                                $facility->name = 'Arlandastad';

                                            if ($facility_from_terms) {
                                                echo "'" . $facility->name . "'";
                                            } else {
                                                $name = str_replace('Upplands Motor ', '', $facility->post_title);
                                                echo "'" . $name . "'";
                                            }
                                            if (++$i !== $items) {
                                                echo ', ';
                                            }
                                        }
                                        ?>
                                    ];

                                    wpcf7forms['<?php echo $form_id; ?>']['facilities'] = facilities;
                                </script>

                            <?php
                            }

                            if ($brands_tax) {
                                $brands = array();
                                $models = array();

                                foreach ($brands_tax as $tax) {
                                    if ($tax->parent !== 0) {
                                        // Model
                                        $parent = get_term_top_most_parent($tax->term_id, 'brand');
                                        $models[] = str_replace($parent->name . ' ', '', $tax->name);
                                    } else {
                                        // Brand
                                        $brands[] = $tax->name;
                                    }
                                }
                                ?>

                                <script>
                                    var brands = [
                                        <?php
                                        $items = count($brands);
                                        $i = 0;
                                        foreach ($brands as $brand) {
                                            echo "'" . $brand . "'";
                                            if (++$i !== $items) {
                                                echo ', ';
                                            }
                                        }
                                        ?>
                                    ];

                                    wpcf7forms['<?php echo $form_id; ?>']['brands'] = brands;
                                </script>

                                <?php
                                if (!empty($models)) {
                                    ?>

                                    <script>
                                        var models = [
                                            <?php
                                            $items = count($models);
                                            $i = 0;
                                            foreach ($models as $model) {
                                                echo "'" . $model . "'";
                                                if (++$i !== $items) {
                                                    echo ', ';
                                                }
                                            }
                                            ?>
                                        ];

                                        wpcf7forms['<?php echo $form_id; ?>']['models'] = models;
                                    </script>

                                <?php
                                }
                            }

                            if ($departments) {
                                ?>

                                <script>
                                    var departments = [
                                        <?php
                                        $items = count($departments);
                                        $i = 0;
                                        foreach ($departments as $department) {
                                            echo "'" . $department->name . "'";
                                            if (++$i !== $items) {
                                                echo ', ';
                                            }
                                        }
                                        ?>
                                    ];

                                    wpcf7forms['<?php echo $form_id; ?>']['departments'] = departments;
                                </script>

                            <?php
                            }

                            echo $form;

                            ?>



                        <!-- Form END -->

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}

function get_facility_cards($id)
{

    $facility_visiting_address = get_field('facility-visiting-address', $id);
    $use_postal_address = get_field('facility-use-postal-address', $id);

    if ($use_postal_address) {
        $facility_postal_address = get_field('facility-postal-address', $id);
    }

    $facility_phone = get_field('settings-contact-phonenumber', 'options');
    /*$facility_service = get_field('facility-telephone-nr-service', $id);*/
    /*$facility_email = get_field('facility-email', $id);*/

    show_map($id);

    show_cards($id);

}

function init_facility_widget($id, $locations = null)
{
    ?>
    <script>
        var markers = [];
        // The array where to store the markers

        function toggleAccordions(id) {
            id = id + 1;
            if ($(".panel-collapse.in").is("#collapse" + id)) {
            }
            else {
                $(".panel-collapse.in").collapse("toggle");
                $("#collapse" + id).collapse("toggle");
            }

            $(".gm-style-iw").next("div").hide();
        }

        function initialize() {

            var mapOptions = {
                zoom: 10,
                center: new google.maps.LatLng(59.865612, 17.858261),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scaleControl: true,
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL
                },
                styles: [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#444444"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.province",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.locality",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#86a6b2"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ],
            }

            var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

            var locations = [
                <?php $i = 0; ?>
                <?php foreach ($locations as $location) : ?>
                ['<?php echo $location['title']; ?>', <?php echo $location['lat'] . ', ' . $location['lng']; ?>, <?php echo $i; ?>, '<span class="info-window-caption"><span class="bold">Upplands Motor</span><br><?php echo $location['title']; ?></span><p>'],
                <?php $i++; ?>
                <?php endforeach; ?>
            ];

            var marker, i;

            var infowindow = new google.maps.InfoWindow();

            function smoothZoom(map, max, cnt, marker) {
                if (cnt >= max) {
                    return;
                }
                else {
                    z = google.maps.event.addListener(map, 'zoom_changed', function (event) {
                        google.maps.event.removeListener(z);
                        smoothZoom(map, max, cnt + 1, marker);
                    });
                    setTimeout(function () {
                        map.setZoom(cnt);
                        map.panTo(marker.getPosition());
                    }, 80); // 80ms is what I found to work well on my system -- it might not work well on all systems
                }
            }

            var bounds = new google.maps.LatLngBounds();
            for (i = 0; i < locations.length; i++) {
                var myLatLng = new google.maps.LatLng(locations[i][1], locations[i][2]),
                    marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        title: locations[i][0],
                        zIndex: locations[i][3],
                        icon: new google.maps.MarkerImage('/wp-content/themes/upplands-motor/images/map-marker.png', null, null, null, new google.maps.Size(36, 36))
                    });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][4]);
                        infowindow.open(map, marker);
                        if (map.getZoom() == 13) {
                            setTimeout(function() {
                                map.setCenter(marker.getPosition());
                            }, 150);
                        } else {
                            smoothZoom(map, 14, map.getZoom(), marker);
                        }
                        toggleAccordions(i);
                    }
                })(marker, i));

                markers.push(marker);
                bounds.extend(myLatLng);
            }
            map.fitBounds(bounds);

        }
        google.maps.event.addDomListener(window, 'load', initialize);

        // The function to trigger the marker click, 'id' is the reference index to the 'markers' array.
        function chooseMarker(id) {
            id = id - 1;
            google.maps.event.trigger(markers[id], 'click');
        }

    </script>
<?php
}

function get_facility_widget_object($id, $width)
{
    ?>
<?php
}

function get_accordion_object($id, $counter, $width)
{
    $title = get_the_title($id);
    $aria_expanded = false;
    $collapse_class = '';

    if ($counter == 1) {
        $aria_expanded = true;
        $collapse_class = 'in';
    }

    $location = get_field('facility-visiting-address', $id);

    if ($width <= 6) {
        $title = str_replace('Upplands Motor', '', $title);
        ?>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-<?php echo $id; ?>">
                <h5 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $id; ?>"
                       aria-expanded="<?php echo $aria_expanded; ?>" aria-controls="collapse-<?php echo $id; ?>"
                       data-order="<?php echo $counter; ?>">
                        <?php echo $title; ?>
                    </a>
                </h5>
            </div>
            <div id="collapse-<?php echo $id; ?>" class="panel-collapse collapse <?php echo $collapse_class; ?>"
                 role="tabpanel" aria-labelledby="heading-<?php echo $id; ?>">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php the_field('facility-openhours-contents', $id); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <span class="open-hours">
                                    <?php
                                    $departments = get_field('facility-departments', $id);
                                    for ($i = 0; $i < count($departments); ++$i) {
                                        $department_slug = $departments[$i];

                                        $weekdays = get_field('facility-' . $department_slug . '-openhours-weekdays', $id);
                                        $saturdays = get_field('facility-' . $department_slug . '-openhours-saturdays', $id);
                                        $sundays = get_field('facility-' . $department_slug . '-openhours-sundays', $id);

                                        $weekdays = str_replace(':00', '', $weekdays);
                                        $saturdays = str_replace(':00', '', $saturdays);
                                        $sundays = str_replace(':00', '', $sundays);

                                        if ($department_slug != 'other') {
                                            switch ($department_slug) {
                                                case 'carsales' :
                                                    $department_name = 'Bilförsäljning';
                                                    break;
                                                case 'store' :
                                                    $department_name = 'Butik och bildelar';
                                                    break;
                                                case 'damage' :
                                                    $department_name = 'Skadeverkstad';
                                                    break;
                                                case 'workshop' :
                                                    $department_name = 'Verkstad';
                                                    break;
                                            }
                                            ?>
                                            <p class="col-xs-6 col-md-3 col-lg-2">
                                                <span class="bold"><?php echo $department_name; ?></span><br>
                                                Vardag: <?php echo $weekdays; ?><br>
                                                Lördag: <?php echo $saturdays; ?><br>
                                                Söndag: <?php echo $sundays; ?><br>
                                            </p>
                                        <?php
                                        } else {
                                            $other_departments = get_field('facility-other-departments', $id);
                                            foreach ($other_departments as $other => $department) {
                                                $department_name = $department['department-name'];
                                                $weekdays = $department['department-openhours-weekdays'];
                                                $saturdays = $department['department-openhours-saturdays'];
                                                $sundays = $department['department-openhours-sundays'];

                                                $weekdays = str_replace(':00', '', $weekdays);
                                                $saturdays = str_replace(':00', '', $saturdays);
                                                $sundays = str_replace(':00', '', $sundays);
                                                ?>
                                                <p class="col-xs-6 col-md-3">
                                                    <span class="bold"><?php echo $department_name; ?></span><br>
                                                    Vardag: <?php echo $weekdays; ?><br>
                                                    Lördag: <?php echo $saturdays; ?><br>
                                                    Söndag: <?php echo $sundays; ?><br>
                                                </p>
                                            <?php
                                            }
                                        }
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {

        ?>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-<?php echo $id; ?>">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $id; ?>"
                       aria-expanded="<?php echo $aria_expanded; ?>" aria-controls="collapse-<?php echo $id; ?>"
                       data-order="<?php echo $counter; ?>">
                        <?php echo $title; ?>
                    </a>
                </h4>
            </div>
            <div id="collapse-<?php echo $id; ?>" class="panel-collapse collapse <?php echo $collapse_class; ?>"
                 role="tabpanel" aria-labelledby="heading-<?php echo $id; ?>">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                        <span class="contact-information">
                            <h5>Kontaktinformation</h5>
                            <p>
                                <?php
                                $facility_address = get_field('facility-visiting-address', $id);
                                $facility_address = str_replace('Sverige', '', str_replace(',', '<br>', $facility_address['address']));
                                echo $facility_address;
                                ?>
                            </p>
                        </span>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <div class="row">
                            <span class="open-hours">
                                <?php
                                $departments = get_field('facility-departments', $id);
                                for ($i = 0; $i < count($departments); ++$i) {
                                    if(count($departments) >= 3){
                                        $col_class = 'col-md-3';
                                    } else {
                                        $col_class = 'col-md-4';
                                    }
                                    $department_slug = $departments[$i];

                                    $weekdays = get_field('facility-' . $department_slug . '-openhours-weekdays', $id);
                                    $saturdays = get_field('facility-' . $department_slug . '-openhours-saturdays', $id);
                                    $sundays = get_field('facility-' . $department_slug . '-openhours-sundays', $id);

                                    switch ($department_slug) {
                                        case 'carsales' :
                                            $department_name = 'Bilförsäljning';
                                            break;
                                        case 'store' :
                                            $department_name = 'Butik och bildelar';
                                            break;
                                        case 'damage' :
                                            $department_name = 'Skadeverkstad';
                                            break;
                                        case 'workshop' :
                                            $department_name = 'Verkstad';
                                            break;
                                        case 'other' :
                                            $department_name = 'Annan';
                                            break;
                                    }
                                    ?>
                                    <p class="col-xs-6 <?php echo $col_class; ?>">
                                        <span class="bold"><?php echo $department_name; ?></span><br>
                                        Vardagar: <?php echo $weekdays; ?><br>
                                        Lördagar: <?php echo $saturdays; ?><br>
                                        Söndagar: <?php echo $sundays; ?><br>
                                    </p>
                                <?php
                                }
                                ?>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
}

function get_facility_accordion($id, $facilities)
{
    $counter = 1;
    ?>

    <div class="facilities-list f-left left">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
            foreach ($facilities as $facility) {
                get_accordion_object($facility->ID, $counter, 6);
                $counter++;
            }
            ?>
        </div>
    </div>

<?php
}

function get_facility_widget($fid, $facilities, $width)
{

    if ($width <= 8) {
        get_facility_accordion($fid, $facilities);
    } else {

        ?>

        <div class="facilities-list max-w-60 f-left left">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

            <?php
            $locations = array();
            $counter = 1;
            foreach ($facilities as $facility) {
                $aria_expanded = false;
                $collapse_class = '';

                if ($counter == 1) {
                    $aria_expanded = true;
                    $collapse_class = 'in';
                }

                $id = $facility->ID;
                $title = get_the_title($id);
                $title = str_replace('Upplands Motor ', '', $title);
                $visiting_address = get_field('facility-visiting-address', $id);
                $map_data = array();
                $map_data['title'] = $title;
                $map_data['lat'] = $visiting_address['lat'];
                $map_data['lng'] = $visiting_address['lng'];
                $locations[] = $map_data;
?>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading-<?php echo $id; ?>">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $counter; ?>"
                               aria-expanded="<?php echo ($aria_expanded) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $counter; ?>"
                               data-order="<?php echo $counter; ?>" onclick="chooseMarker(<?php echo $counter; ?>)">
                                <?php echo $title; ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $counter; ?>" class="panel-collapse collapse <?php echo $collapse_class; ?>"
                         role="tabpanel" aria-lbaelledby="heading-<?php echo $id; ?>">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php the_field('facility-openhours-contents', $id); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <span class="contact-information">
                                        <h5>Kontaktinformation</h5>
                                        <p>
                                            <?php
                                            $facility_address = get_field('facility-visiting-address', $id);
                                            $original_address = $facility_address;
                                            $facility_address = str_replace('Sverige', '', str_replace(',', '<br>', $facility_address['address']));
                                            echo $facility_address;
                                            ?>
                                        </p>
                                    </span>
                                </div>
                                <link rel="stylesheet" href="/wp-content/themes/upplands-motor/css/extra/lightcase.css">
                                <script src="/wp-content/themes/upplands-motor/js/extra/lightcase.min.js"></script>
                                <div class="col-xs-12 col-sm-4">
                                    <span class="contact-information">
                                        <a class="button gmaps" target="_blank" href="http://maps.google.se/maps?daddr=<?php echo $original_address['address']; ?>&ie=UTF8&t=h&z=7&layer=t"><i class="icon icon-address"></i> Vägbeskrivning</a>
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <span class="contact-information">
                                        <a class="button sl" traget="_blank" href="<?php echo get_field('localtrafic-url', $id); ?>"><?php echo get_field('localtrafic-text', $id); ?></a>
                                    </span>
                                </div>
                                <script type="text/javascript">
                                    jQuery(document).ready(function($) {
                                        $('a[data-rel^=lightcase]').lightcase();
                                    });
                                </script>
                                
                                <div class="col-xs-12">
                                    <div class="row">
                                        <span class="open-hours">
                                            <h5 class="col-xs-12">Öppettider</h5>
                                            <?php
                                            $departments = get_field('facility-departments', $id);
                                            if ($departments) {
                                                for ($i = 0; $i < count($departments); ++$i) {
                                                    $department_slug = $departments[$i];

                                                    $weekdays = get_field('facility-' . $department_slug . '-openhours-weekdays', $id);
                                                    $saturdays = get_field('facility-' . $department_slug . '-openhours-saturdays', $id);
                                                    $sundays = get_field('facility-' . $department_slug . '-openhours-sundays', $id);

                                                    switch ($department_slug) {
                                                        case 'carsales' :
                                                            $department_name = 'Bilförsäljning';
                                                            break;
                                                        case 'store' :
                                                            $department_name = 'Butik och bildelar';
                                                            break;
                                                        case 'damage' :
                                                            $department_name = 'Skadeverkstad';
                                                            break;
                                                        case 'workshop' :
                                                            $department_name = 'Verkstad';
                                                            break;
                                                        case 'other' :
                                                            $department_name = 'Annan';
                                                            break;
                                                    }
                                                    ?>
                                                    <p class="col-xs-6 col-md-3">
                                                        <span class="bold"><?php echo $department_name; ?></span><br>
                                                        Vardagar: <?php echo $weekdays; ?><br>
                                                        Lördagar: <?php echo $saturdays; ?><br>
                                                        Söndagar: <?php echo $sundays; ?><br>
                                                    </p>
                                                <?php
                                                }
                                            }
                                            
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
                $counter++;
            }
            ?>

            </div>
        </div>
        <div class="facilities-map min-w-40 f-right">
            <div id="map-canvas">
            </div>
        </div>
        <?php
        init_facility_widget($fid, $locations);
    }
}

function get_open_hours($id, $layout, $departments)
{
    switch ($layout) {
        case 'block-icons' :
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php the_field('facility-openhours-contents', $id); ?>
                </div>
            </div>
            <div class="row" class="block-icons">
                <?php
                for ($i = 0; $i < count($departments); ++$i) {
                    $department_slug = $departments[$i];

                    $weekdays = get_field('facility-' . $department_slug . '-openhours-weekdays', $id);
                    $saturdays = get_field('facility-' . $department_slug . '-openhours-saturdays', $id);
                    $sundays = get_field('facility-' . $department_slug . '-openhours-sundays', $id);

                    if ($department_slug != 'other') {
                        switch ($department_slug) {
                            case 'carsales' :
                                $icon_class = 'icon-key';
                                $header = 'Bilförsäljning';
                                break;
                            case 'store' :
                                $icon_class = 'icon-shop';
                                $header = 'Butik och bildelar';
                                break;
                            case 'damage' :
                                $icon_class = 'icon-tools';
                                $header = 'Skadecenter';
                                break;
                            case 'workshop' :
                                $icon_class = 'icon-cog';
                                $header = 'Verkstad';
                                break;
                        }
                        ?>
                        <div class="col-xs-12 col-sm-6">
                            <div class="open-hours-item">
                                <span class="open-hours-icon">
                                    <i data-size="default" data-border="black"
                                       class="icon-holder icon <?php echo $icon_class; ?> pull-left"></i>
                                </span>
                                <span class="open-hours-text">
                                    <h3><?php echo $header ?></h3>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="day"><strong>Mån-Fre</strong></span><br>
                                            <span class="time"><?php echo $weekdays; ?></span>
                                        </div>
                                        <div class="col-xs-4">
                                            <span class="day"><strong>Lördag</strong></span><br>
                                            <span class="time"><?php echo $saturdays; ?></span>
                                        </div>
                                        <div class="col-xs-4">
                                            <span class="day"><strong>Söndag</strong></span><br>
                                            <span class="time"><?php echo $sundays; ?></span>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    <?php
                    } else {
                        $other_departments = get_field('facility-other-departments', $id);
                        foreach ($other_departments as $other => $department) {
                            $department_name = $department['department-name'];
                            $weekdays = $department['department-openhours-weekdays'];
                            $saturdays = $department['department-openhours-saturdays'];
                            $sundays = $department['department-openhours-sundays'];
                            ?>
                            <div class="col-xs-12 col-sm-6">
                                <div class="open-hours-item">
                                    <span class="open-hours-icon">
                                        <i data-size="default" data-border="black" class="icon-holder pull-left">
                                            <span
                                                style="font-family:HelveticaNeueLT-Bold; font-style: normal; font-size: 1.4em; line-height: 1.6em;">UM</span>
                                        </i>
                                    </span>
                                    <span class="open-hours-text">
                                        <h3><?php echo $department_name ?></h3>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span class="day"><strong>Mån-Fre</strong></span><br>
                                                <span class="time"><?php echo $weekdays; ?></span>
                                            </div>
                                            <div class="col-xs-4">
                                                <span class="day"><strong>Lördag</strong></span><br>
                                                <span class="time"><?php echo $saturdays; ?></span>
                                            </div>
                                            <div class="col-xs-4">
                                                <span class="day"><strong>Söndag</strong></span><br>
                                                <span class="time"><?php echo $sundays; ?></span>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        <?php
                        }
                    }
                }
                ?>
            </div>
            <?php
            break;
        case 'list-icons' :
            break;
        case 'accordion' :
            break;
        case 'facilites' :
            break;

    }
}
?>
