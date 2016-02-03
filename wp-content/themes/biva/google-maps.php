<?php
$dir = get_template_directory_uri();
?>

<div id="map_canvas">
</div>

<?php if(!is_front_page()) {
    $map_zoom = 15;
} else {
    $map_zoom = 7;
}
?>

<script>

    function initialize() {
        var viewportWidth = $(window).width();
        var zoomSwitch = 6;
        var draggableSwitch = false;

        if (viewportWidth > '768') {
            draggableSwitch = true;
            zoomSwitch = <?php echo $map_zoom; ?>;
        }

        var mapOptions = {
            zoom: zoomSwitch,
            scrollwheel: false,
            draggable: draggableSwitch,


            //center: new google.maps.LatLng(59.6695961, 16.29972)
            center: new google.maps.LatLng(59.6695961, 16.29972)
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

        setMarkers(map, anlaggningar);
    }

    /* Anläggning Exempelformat /*
     ['Biva Borlänge', 60.4696983,15.4016033, 7, '<div class="map-infowindow"><h3>Biva Borlänge</h3><p><strong>Kontaktuppgifter</strong><br>Gjutargatan 40<br>781 70 Borlänge</p><p><strong>Mail:</strong><br><a href="mailto:info@biva.se">info@biva.se</a></p><p><strong>Ring oss:</strong><br>0243-79 40 20</p><p><a href="#">Se öppettider</a></p></div>'],*/

    var anlaggningar = [

        <?php
        $args = array( 'post_type' => 'facility' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();

        $title = get_the_title();
        //$title = str_replace("Biva ", "", $title);
        $city = strtolower($title);
        $vowels = array("Å", "Ä", "Ö", "å", "ä", "ö");
        $change = array("a", "a", "o", "a", "a", "o");
        $city = str_replace($vowels, $change, $city);
        $location_data = get_field('facility-visiting-address');

        $emails = get_field('facility-emails');
        $emails_list = "";
        foreach($emails as $email) {
            $emails_list .= "<a href=\"mailto:" . $email['facility-email-address'] . "\">" . $email['facility-email-address'] . "</a><br>";
        }

        $phonenumbers = get_field('facility-phonenumbers');
        $phonenumbers_list = "";
        foreach($phonenumbers as $phonenumber) {
            if($phonenumber['facility-phonenumber-title'] == "Tel:" || $phonenumber['facility-phonenumber-title'] == "Tel") {
                $phonenumbers_list .= $phonenumber['facility-phonenumber-title'] . " <a href=\"tel:" . $phonenumber['facility-phonenumber-number'] . "\">" . $phonenumber['facility-phonenumber-number'] . "</a><br>";
                break;
            }
        }

        $infoWindowContent = "";
        $infoWindowContent .= "<h3>" .$title . "</h3>";
        $infoWindowContent .= "<p>";
        $infoWindowContent .= "<p><strong>Kontaktuppgifter:</strong><br>" . str_replace("Sverige", "", str_replace(", ","<br>", $location_data['address'])) . "</p>";
        $infoWindowContent .= "<p><a href=\"/vara-anlaggningar/" . str_replace(" ","-",$city) . "/#contact\">Till kontaktformulär ></a></p>";
        $infoWindowContent .= "<p>Ring oss:<br>" . $phonenumbers_list . "</p>";
        $infoWindowContent .= "<p><a href=\"/vara-anlaggningar/" . str_replace(" ","-",$city) . "/#contact\">Se öppettider ></a></p>";

        ?>

        [
            '<?php the_title(); ?>', <?php echo $location_data['lat'] . "," . $location_data['lng']; ?>, 1,
            '<div class="map-infowindow"><?php echo $infoWindowContent; ?></div>'
        ],

        <?php endwhile;	?>

    ];


    function setMarkers(map, locations) {

        var infowindow = new google.maps.InfoWindow({
            content: ""
        });

        var image = {
            url: '<?php echo $dir; ?>/img/biva-pin.png',
            size: new google.maps.Size(34, 48),
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

            bindInfoWindow(marker, map, infowindow, descr);

            <?php if($active_marker != "") { ?>
            var activeMarker = "<?php echo $active_marker; ?>";
            if(locations[i][0] == activeMarker) {
                google.maps.event.trigger(marker, 'click');
                setTimeout(function()
                {
                    map.setCenter(marker.getPosition());
                    google.maps.event.trigger(marker, 'click');
                },500);
                break;
            }
            <?php } ?>

        }
    }

    function bindInfoWindow(marker, map, infowindow, strDescription) {
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(strDescription);
            infowindow.open(map, marker);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>