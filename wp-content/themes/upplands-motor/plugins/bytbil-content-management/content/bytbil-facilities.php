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
                'label' => 'Adress',
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
                'key' => 'field_5511782ad226d',
                'label' => 'Kontaktinformation',
                'name' => '',
                'type' => 'tab',
            ),
            array(
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
            ),
            array(
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
            ),
            array(
                'key' => 'field_551178f7d2270',
                'label' => 'E-post',
                'name' => 'facility-email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
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


        <div class="acf-map" id="facility-map-<?php echo $id; ?>">
            <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                 data-lng="<?php echo $location['lng']; ?>"></div>
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
                        icon: new google.maps.MarkerImage('/wp-content/themes/upplands-motor/images/map-marker.png', null, null, null, new google.maps.Size(48, 72)),
                    });

                    // add to array
                    map.markers.push(marker);

                    // if marker contains HTML, add it to an infoWindow
                    if ($marker.html()) {
                        // create info window
                        var infowindow = new google.maps.InfoWindow({
                            content: $marker.html()
                        });

                        // show info window when marker is clicked
                        google.maps.event.addListener(marker, 'click', function () {

                            infowindow.open(map, marker);

                        });
                    }

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
                        map.setZoom(16);
                        map.panBy(15, 170)

                    }
                    else {
                        // fit to bounds
                        map.fitBounds(bounds);
                    }

                }

                $(document).ready(function () {

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

    $facility_phone = get_field('facility-telephone-nr', $id);
    $facility_service = get_field('facility-telephone-nr-service', $id);
    $facility_email = get_field('facility-email', $id);

    $facility_address = str_replace('Sverige', '', str_replace(',', '<br>', $facility_address['address']));
    ?>

    <div class="facility-card-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="facility-card block white-bg">
                        <h3><i class="icon-holder icon icon-user" data-size="default" data-border="black"></i><br>Snabbkontakt
                        </h3>
                        <a href="tel:<?php echo $facility_phone; ?>" class="button green fw"><i
                                class="icon icon-phone"></i> Växel <?php echo $facility_phone; ?></a>
                        <a href="tel:<?php echo $facility_service; ?>" class="button black fw"><i
                                class="icon icon-phone"></i> Verkstad <?php echo $facility_service; ?></a>
                        <a href="mailto:<?php echo $facility_email; ?>" class="button blue fw"><i
                                class="icon icon-mail"></i> Skicka e-post</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="facility-card block white-bg">
                        <h3><i class="icon-holder icon icon-location-pin" data-size="default"
                               data-border="black"></i><br>Besök oss</h3>
                        <span class="facility-card-subtitle bold"><?php echo get_the_title($id); ?></span>
                        <span class="facility-card-text"><?php echo $facility_address; ?></span>
                        <?php if ($use_postal_address) { ?>
                            <span class="facility-card-subtitle bold">Postadress</span>
                            <span class="facility-card-text"><?php echo $facility_postal_address; ?></span>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="facility-card block white-bg">
                        <h3><i class="icon-holder icon icon-comment" data-border="black"></i><br>Skicka ett meddelande
                        </h3>
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

    $facility_phone = get_field('facility-telephone-nr', $id);
    $facility_service = get_field('facility-telephone-nr-service', $id);
    $facility_email = get_field('facility-email', $id);

    show_map($id);

    show_cards($id);

}

function init_facility_widget($id)
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
                center: new google.maps.LatLng(40.714364, -74.005972),
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
            }

            var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

            var locations = [
                ['Kista', 59.421079, 17.924961, 1, '<span class="info-window-caption"><span class="bold">Upplands Motor</span><br>Kista</span><p>'],
                ['Uppsala', 59.848372, 17.660164, 2, '<span class="info-window-caption"><span class="bold">Upplands Motor</span><br>Uppsala</span><p>'],
                ['Hammarby Sjöstad', 59.300962, 18.095736, 3, '<span class="info-window-caption"><span class="bold">Upplands Motor</span><br>Hammarby Sjöstad</span><p>'],
                ['Tierp', 60.338902, 17.520513, 4, '<span class="info-window-caption"><span class="bold">Upplands Motor</span><br>Tierp</span><p>'],
                ['Arlandastad', 59.614302, 17.870941, 5, '<span class="info-window-caption"><span class="bold">Upplands Motor</span><br>Arlandastad</span><p>']
            ];

            var marker, i;

            var infowindow = new google.maps.InfoWindow();

            function smoothZoom(map, max, cnt) {
                if (cnt >= max) {
                    return;
                }
                else {
                    z = google.maps.event.addListener(map, 'zoom_changed', function (event) {
                        google.maps.event.removeListener(z);
                        smoothZoom(map, max, cnt + 1);
                    });
                    setTimeout(function () {
                        map.setZoom(cnt)
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
                        icon: new google.maps.MarkerImage('/wp-content/themes/upplands-motor/images/map-marker.png', null, null, null, new google.maps.Size(24, 36))
                    });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][4]);
                        smoothZoom(map, 14, map.getZoom());
                        map.panTo(marker.getPosition());
                        infowindow.open(map, marker);
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
                                            <p class="col-xs-6 col-md-3">
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
                        <div class="col-xs-12 col-sm-4">
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
                        <div class="col-xs-12 col-sm-8">
                            <div class="row">
                            <span class="open-hours">
                                <?php
                                $departments = get_field('facility-departments', $id);
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
                                    <p class="col-xs-6 col-md-4">
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

function get_facility_widget($id, $facilities, $width)
{

    if ($width <= 8) {
        get_facility_accordion($id, $facilities);
    } else {

        ?>

        <div class="facilities-list max-w-60 f-left left">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading1">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true"
                               aria-controls="collapse1" data-order="1" onclick="chooseMarker(1)">
                                Kista
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                <span class="contact-information">
                                    <h5>Kontaktinformation</h5>
                                    <p>
                                        Kronåsvägen 2-4<br>
                                        191 46 Sollentuna<br>
                                        <span class="bold">E-post:</span> <a href="#">Visa e-post</a>
                                    </p>
                                </span>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <div class="row">
                                    <span class="open-hours">
                                        <h5 class="col-xs-12">Öppettider</h5>
                                        <p class="col-xs-6 col-md-4">
                                            <span class="bold">Bilförsäljning</span><br>
                                            Vardagar: 11-18<br>
                                            Lördagar: 11-16<br>
                                            Söndagar: 11-16<br>
                                        </p>
                                        <p class="col-xs-6 col-md-4">
                                            <span class="bold">Verkstad</span><br>
                                            Vardagar: 07-18<br>
                                            Lördagar: stängt<br>
                                            Söndagar: Stängt<br>
                                        </p>
                                        <p class="col-xs-6 col-md-4">
                                            <span class="bold">Skadecenter</span><br>
                                            Vardagar: 07-16<br>
                                            Lördagar: Stängt<br>
                                            Söndagar: Stängt<br>
                                        </p>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading2">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2"
                               aria-expanded="false" aria-controls="collapse2" data-order="2" onclick="chooseMarker(2)">
                                Uppsala
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                <span class="contact-information">
                                    <h5>Kontaktinformation</h5>
                                    <p>
                                        Kronåsvägen 2-4<br>
                                        191 46 Sollentuna<br>
                                        <span class="bold">E-post:</span> <a href="#">Visa e-post</a>
                                    </p>
                                </span>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <div class="row">
                                    <span class="open-hours">
                                        <h5 class="col-xs-12">Öppettider</h5>
                                        <p class="col-xs-6 col-md-4">
                                            <span class="bold">Bilförsäljning</span><br>
                                            Vardagar: 11-18<br>
                                            Lördagar: 11-16<br>
                                            Söndagar: 11-16<br>
                                        </p>
                                        <p class="col-xs-6 col-md-4">
                                            <span class="bold">Verkstad</span><br>
                                            Vardagar: 07-18<br>
                                            Lördagar: stängt<br>
                                            Söndagar: Stängt<br>
                                        </p>
                                        <p class="col-xs-6 col-md-4">
                                            <span class="bold">Skadecenter</span><br>
                                            Vardagar: 07-16<br>
                                            Lördagar: Stängt<br>
                                            Söndagar: Stängt<br>
                                        </p>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading3">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3"
                               aria-expanded="false" aria-controls="collapse3" data-order="3" onclick="chooseMarker(3)">
                                Hammarby Sjöstad
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <h5>Kontaktinformation</h5>

                                    <p>
                                        Kronåsvägen 2-4<br>
                                        191 46 Sollentuna<br>
                                        <span class="bold">E-post:</span> <a href="#">Visa e-post</a>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <div class="row">
                                        <h5 class="col-xs-12">Öppettider</h5>

                                        <p class="col-xs-12 col-sm-6 col-md-4">
                                            <span class="bold">Bilförsäljning</span><br>
                                            Vardagar: 11-18<br>
                                            Lördagar: 11-16<br>
                                            Söndagar: 11-16<br>
                                        </p>

                                        <p class="col-xs-12 col-sm-6 col-md-4">
                                            <span class="bold">Verkstad</span><br>
                                            Vardagar: 07-18<br>
                                            Lördagar: stängt<br>
                                            Söndagar: Stängt<br>
                                        </p>

                                        <p class="col-xs-12 col-sm-6 col-md-4">
                                            <span class="bold">Skadecenter</span><br>
                                            Vardagar: 07-16<br>
                                            Lördagar: Stängt<br>
                                            Söndagar: Stängt<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading4">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4"
                               aria-expanded="false" aria-controls="collapse4" data-order="4" onclick="chooseMarker(4)">
                                Tierp
                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <h5>Kontaktinformation</h5>

                                    <p>
                                        Kronåsvägen 2-4<br>
                                        191 46 Sollentuna<br>
                                        <span class="bold">E-post:</span> <a href="#">Visa e-post</a>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <div class="row">
                                        <h5 class="col-xs-12">Öppettider</h5>

                                        <p class="col-xs-12 col-sm-6 col-md-4">
                                            <span class="bold">Bilförsäljning</span><br>
                                            Vardagar: 11-18<br>
                                            Lördagar: 11-16<br>
                                            Söndagar: 11-16<br>
                                        </p>

                                        <p class="col-xs-12 col-sm-6 col-md-4">
                                            <span class="bold">Verkstad</span><br>
                                            Vardagar: 07-18<br>
                                            Lördagar: stängt<br>
                                            Söndagar: Stängt<br>
                                        </p>

                                        <p class="col-xs-12 col-sm-6 col-md-4">
                                            <span class="bold">Skadecenter</span><br>
                                            Vardagar: 07-16<br>
                                            Lördagar: Stängt<br>
                                            Söndagar: Stängt<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading5">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5"
                               aria-expanded="false" aria-controls="collapse5" data-order="5" onclick="chooseMarker(5)">
                                Arlandastad
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <h5>Kontaktinformation</h5>

                                    <p>
                                        Kronåsvägen 2-4<br>
                                        191 46 Sollentuna<br>
                                        <span class="bold">E-post:</span> <a href="#">Visa e-post</a>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <div class="row">
                                        <h5 class="col-xs-12">Öppettider</h5>

                                        <p class="col-xs-12 col-sm-6 col-md-4">
                                            <span class="bold">Bilförsäljning</span><br>
                                            Vardagar: 11-18<br>
                                            Lördagar: 11-16<br>
                                            Söndagar: 11-16<br>
                                        </p>

                                        <p class="col-xs-12 col-sm-6 col-md-4">
                                            <span class="bold">Verkstad</span><br>
                                            Vardagar: 07-18<br>
                                            Lördagar: stängt<br>
                                            Söndagar: Stängt<br>
                                        </p>

                                        <p class="col-xs-12 col-sm-6 col-md-4">
                                            <span class="bold">Skadecenter</span><br>
                                            Vardagar: 07-16<br>
                                            Lördagar: Stängt<br>
                                            Söndagar: Stängt<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="facilities-map min-w-40 f-right">
            <div id="map-canvas">
            </div>
        </div>
        <?php
        init_facility_widget($id);
    }
}

function get_open_hours($id, $layout, $departments)
{
    switch ($layout) {
        case 'block-icons' :
            ?>
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
