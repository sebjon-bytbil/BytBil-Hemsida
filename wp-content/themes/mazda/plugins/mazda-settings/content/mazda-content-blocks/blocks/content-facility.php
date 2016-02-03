<?php

$facility = get_sub_field('facility');
$id = $facility[0]->ID;
$coordinates = get_field('facility-adress', $id);
// TODO: if populated or something
$custom_postal_address = get_field('facility-postal-address', $id);
$stripped_address = str_replace(array("\r\n", "\r", "\n"), ',', $custom_postal_address);
$address_link = 'http://maps.google.com/maps?saddr=&daddr='. $stripped_address .'&ie=UTF8&t=h&z=7&layer=t';
$custom_postal_address = str_replace(array("\r\n", "\r", "\n"), '<br>', $custom_postal_address);
$phone_number = get_field('facility-phonenumber', $id);
$email = get_field('facility-email', $id);
//$vehicles_stock = get_field('page-vehicles-in-stock', 'options');
?>

<section id="map">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
        // When the window has finished loading create our google map below
        var map;
        var myLatLang = new google.maps.LatLng(<?php echo $coordinates['lat'] . ',' . $coordinates['lng']; ?>);
        var center = new google.maps.LatLng(<?php echo ((float) $coordinates['lat'] + 0.0155) . ',' . $coordinates['lng']; ?>);

        function init() {
            var mapOptions = {
                zoom: 12,
                center: center,
                scrollwheel: false,
                styles: [
                    {
                        "featureType": "administrative",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#627586"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.locality",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.neighborhood",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f7f7f7"
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
                            },
                            {
                                "saturation": "-0"
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
                        "featureType": "road.highway",
                        "elementType": "labels.icon",
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
                                "color": "#0099fe"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            map = new google.maps.Map(mapElement, mapOptions);

            var infoWindowHTML = '' +
                '<div class="content">' +
                    '<div class="information">' +
                        '<h2><?php echo get_the_title($id); ?></h2>' +
                        '<span class="address"><?php echo $custom_postal_address; ?></span>' +
                        '<span class="phonenr"><strong>Telefon:</strong> <a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></span>' +
                        '<span class="email"><strong>E-post:</strong> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>' +
                        '<a href="<?php echo $vehicles_stock; ?>" class="button blue button-link"><i class="fa fa-car"></i> Våra bilar i lager</a>' +
                        '<a href="<?php echo $address_link; ?>" class="button gray button-link" target="_blank"><i class="fa fa-location-arrow"></i> Hitta till oss</a>' +
                    '</div>' +
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: infoWindowHTML
            });


            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: myLatLang,
                map: map,
                title: '<?php echo get_the_title($id); ?>'
            });

            infowindow.open(map,marker);

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });

        }

        google.maps.event.addDomListener(window, 'load', init);

        google.maps.event.addDomListener(window, "resize", function() {
            var center = map.getCenter();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });
    </script>
</section>

