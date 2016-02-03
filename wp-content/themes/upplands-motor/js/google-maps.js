var markers = [];
// The array where to store the markers

function toggleAccordions(id){
    id=id+1;
    if($(".panel-collapse.in").is("#collapse"+id)){
    }
    else {
        $(".panel-collapse.in").collapse("toggle");
        $("#collapse"+id).collapse("toggle");
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
        mapTypeControl: false,
        streetViewControl: false,
        zoomControl:true,
        zoomControlOptions: {
            style:google.maps.ZoomControlStyle.SMALL,
            position: google.maps.ControlPosition.BOTTOM_CENTER
        }
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

    function smoothZoom (map, max, cnt) {
        if (cnt >= max) {
            return;
        }
        else {
            z = google.maps.event.addListener(map, 'zoom_changed', function(event){
                google.maps.event.removeListener(z);
                smoothZoom(map, max, cnt + 1);
            });
            setTimeout(function(){map.setZoom(cnt)}, 80); // 80ms is what I found to work well on my system -- it might not work well on all systems
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
                icon: new google.maps.MarkerImage('/wp-content/themes/upplands-motor/images/map-marker.svg', null, null, null, new google.maps.Size(24,36))
            });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
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
function chooseMarker(id){
    id = id-1;
    google.maps.event.trigger(markers[id], 'click');
}
