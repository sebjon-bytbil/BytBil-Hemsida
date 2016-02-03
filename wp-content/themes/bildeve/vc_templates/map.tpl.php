<?php $dir = get_template_directory_uri(); ?>

<div class="map">

    <div class="facilities-container">
        <div class="box">

            <div class="row">
                <div class="col-sm-6"><h2>Våra anläggningar</h2></div>

                <div class="col-sm-6"><button class="btn btn-primary pull-right">Se mer kontaktinfo</button></div>
            </div>

            <?php foreach($facilities as $key => $item) { ?>
            <div class="facility">
                <h5><?php echo $item['name']; ?></h5>

                <div class="row facility-content">
                    <div class="col-sm-4">
                        <strong>Kontaktinfo</strong><br>
                        <div class="facility-visiting-address">
                            <?php echo $item['visiting_address_street']; ?><br>
                            <?php echo $item['visiting_address_zip_postal']; ?>
                        </div>

                        <?php if($item['use_postal'] == true) { ?>
                            <div class="facility-postal-address">
                                Postadress: <?php echo $item['postal_address']; ?>
                            </div>
                        <?php } ?>

                        <?php if($item['phonenumbers'] != null) { ?>
                            <div class="facility-phonenumbers">
                                <?php foreach($item['phonenumbers'] as $phonenumber) { ?>
                                    <?php echo $phonenumber['facility-phonenumber-title'] != null ? $phonenumber['facility-phonenumber-title'] . ": " : ''; ?><a href="tel:<?php echo $phonenumber['facility-phonenumber-number']; ?>"><?php echo $phonenumber['facility-phonenumber-number']; ?></a><br>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if($item['emails'] != null) { ?>
                            <div class="facility-emails">
                                <?php foreach($item['emails'] as $email) { ?>
                                    <a href="mailto:<?php echo $email['facility-email-address']; ?>"><?php echo $email['facility-email-title'] == null ? $email['facility-email-address'] : $email['facility-email-title']; ?></a><br>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-8 facility-departments">
                        <strong>Öppettider</strong><br>
                        <?php foreach($item['departments'] as $department) { ?>
                            <div class="facility-department">

                                <span class="facility-department-name"><?php echo $department['facility-department']; ?></span>
                                <ul>
                                    <?php if($department['facility-department-openhours'] != null) { ?>
                                        <li class="facility-department-openhours">
                                            <ul>
                                                <?php foreach($department['facility-department-openhours'] as $openhours) { ?>
                                                    <li><span class="openhours-day"><?php echo $openhours['facility-department-openhours-day']; ?>:</span> <span class="openhours-time"><?php echo $openhours['facility-department-openhours-time']; ?></span></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div><br>
            <?php } ?>
        </div>
    </div>

    <script>
        $(function() {
            $(".facilities-container .facility:eq(0) .facility-content").show();
            $(".facilities-container .facility:eq(0)").addClass("opened");

            $(".facility h5").click(function() {
                $(".facility-content").not( $(this).next(".facility-content") ).slideUp();
                $(".facility").not( $(this).parent(".facility")).removeClass("opened");
                $(this).next(".facility-content").slideToggle();
                $(this).parent(".facility").toggleClass("opened");
            });
        });
    </script>

    <div id="<?php echo $blockid; ?>" style="height: <?php echo $height; ?>px;">
    </div>

    <?php if($map_type == 'facility') { ?>

        <script>

            var map;

            /* Initialize map */
            function initialize() {
                var viewportWidth = $(window).width();
                var zoomSwitch = 6;
                var draggableSwitch = false;

                if (viewportWidth > '768') {
                    draggableSwitch = <?php echo $preventscroll == 1 ? "false" : "true"; ?>;
                    zoomSwitch = <?php echo $zoom; ?>;
                }

                var mapOptions = {
                    zoom: zoomSwitch,
                    scrollwheel: false,
                    draggable: draggableSwitch,
                    disableDefaultUI: <?php echo $controls == 1 ? "false" : "true"; ?>,
                    center: new google.maps.LatLng(0, 0)
                };

                map = new google.maps.Map(document.getElementById('<?php echo $blockid; ?>'), mapOptions);

                setMarkers(map, facilities);
            }

            /* Create InfoWindow elements for each facility */
            var facilities = [
                <?php
                foreach($coordinates_list as $key => $coordinates) {
                    $infoWindowContent = "";
                    $infoWindowContent .= $coordinates['address'];
                ?>
                [
                    '<?php echo $infoWindowContent; ?>', <?php echo $coordinates['lat'] . "," . $coordinates['lng']; ?>, 1,
                    '<div class="map-infowindow"><?php echo $infoWindowContent; ?></div>'
                ],
                <?php
                }
                ?>
            ];

            /* Create markers and attach InfoWindow elements */
            function setMarkers(map, locations) {

                var bounds = new google.maps.LatLngBounds();
                var infowindow = new google.maps.InfoWindow({
                    content: ""
                });

                var image = {
                    url: '<?php echo $dir; ?>/images/map-pin.png',
                    size: new google.maps.Size(23, 36),
                    scaledSize: new google.maps.Size(23, 36),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(0, 48)
                };

                for (var i = 0; i < locations.length; i++) {

                    var anlaggningar = locations[i];
                    var descr = anlaggningar[4];
                    var myLatLng = new google.maps.LatLng(anlaggningar[1], anlaggningar[2]);
                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        icon: image,
                        title: anlaggningar[0],
                        zIndex: anlaggningar[3]
                    });

                    bounds.extend(marker.position);

                    bindInfoWindow(marker, map, infowindow, descr);

                }

                var newBounds = new google.maps.LatLngBounds(
                    new google.maps.LatLng(bounds.getSouthWest().lat(),bounds.getSouthWest().lng()-0.58),
                    new google.maps.LatLng(bounds.getNorthEast().lat(),bounds.getNorthEast().lng()-0.58)
                );

                map.fitBounds(newBounds);
            }

            function bindInfoWindow(marker, map, infowindow, strDescription) {
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.setContent(strDescription);
                    infowindow.open(map, marker);
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);

            /*google.maps.event.addDomListener(window, "resize", function() {
                google.maps.event.trigger(map, "resize");
                var center = map.getBounds().getCenter();
                map.setCenter(center);
                initialize();
            });*/

        </script>

    <?php } ?>

</div>