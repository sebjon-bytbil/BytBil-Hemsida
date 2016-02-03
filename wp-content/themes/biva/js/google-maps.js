function initialize() {
    var mapOptions = {
        zoom: 7,
        scrollwheel: false,
        center: new google.maps.LatLng(59.6695961, 16.29972)
    }

    var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

    setMarkers(map, anlaggningar);
}

/* Biva Anlaggningar */
var anlaggningar = [
    ['Biva Borlänge', 60.4696983, 15.4016033, 7, '<div class="map-infowindow"><h3>Biva Borlänge</h3><p><strong>Kontaktuppgifter</strong><br>Gjutargatan 40<br>781 70 Borlänge</p><p><strong>Mail:</strong><br><a href="mailto:info@biva.se">info@biva.se</a></p><p><strong>Ring oss:</strong><br>0243-79 40 20</p><p><a href="#">Se öppettider</a></p></div>'],
    ['Biva Falun', 60.6043287, 15.607537, 6, '<div class="map-infowindow"><h3>Biva Falun</h3><p><strong>Kontaktuppgifter</strong><br>Zettergrens väg 4<br>791 77 Falun</p><p><strong>Mail:</strong><br><a href="mailto:info@biva.se">info@biva.se</a></p><p><strong>Ring oss:</strong><br>023-77 71 30</p><p><a href="#">Se öppettider</a></p></div>'],
    ['Biva Karlskoga', 59.298724, 14.4897375, 5, '<div class="map-infowindow"><h3>Biva Karlskoga</h3><p><strong>Kontaktuppgifter</strong><br>Tibastvägen 10<br>691 47 Karlskoga</p><p><strong>Mail:</strong><br><a href="mailto:info@biva.se">info@biva.se</a></p><p><strong>Ring oss:</strong><br>0586-364 50</p><p><a href="#">Se öppettider</a></p></div>'],
    ['Biva Linköping', 58.416716, 15.6430094, 4, '<div class="map-infowindow"><h3>Biva Linköping</h3><p><strong>Kontaktuppgifter</strong><br>Vigfastgatan 5<br>581 19 Linköping</p><p><strong>Mail:</strong><br><a href="mailto:info@biva.se">info@biva.se</a></p><p><strong>Ring oss:</strong><br>013-28 99 00</p><p><a href="#">Se öppettider</a></p></div>'],
    ['Biva Norrköping', 58.5789061, 16.2154116, 3, '<div class="map-infowindow"><h3>Biva Norrköping</h3><p><strong>Kontaktuppgifter</strong><br>Fjärilsgatan 2<br>600 06 Norrköping</p><p><strong>Mail:</strong><br><a href="mailto:info@biva.se">info@biva.se</a></p><p><strong>Ring oss:</strong><br>011-28 26 00</p><p><a href="#">Se öppettider</a></p></div>'],
    ['Biva Uppsala', 59.8561883, 17.6912843, 2, '<div class="map-infowindow"><h3>Biva Uppsala</h3><p><strong>Kontaktuppgifter</strong><br>Stålgatan 8<br>751 08 Uppsala</p><p><strong>Mail:</strong><br><a href="mailto:info@biva.se">info@biva.se</a></p><p><strong>Ring oss:</strong><br>018-67 87 00</p><p><a href="#">Se öppettider</a></p></div>'],
    ['Biva Örebro', 59.2704167, 15.1800759, 1, '<div class="map-infowindow"><h3>Biva Örebro</h3><p><strong>Kontaktuppgifter</strong><br>Otto E Andersens gata 1<br>700 05 Örebro</p><p><strong>Mail:</strong><br><a href="mailto:info@biva.se">info@biva.se</a></p><p><strong>Ring oss:</strong><br>019-16 80 50</p><p><a href="#">Se öppettider</a></p></div>'],
];

function setMarkers(map, locations) {

    var infowindow = new google.maps.InfoWindow({
        content: ""
    });

    var image = {
        url: './wp-content/themes/biva/img/biva-pin.png',
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

    }
}

function bindInfoWindow(marker, map, infowindow, strDescription) {
    google.maps.event.addListener(marker, 'click', function () {
        infowindow.setContent(strDescription);
        infowindow.open(map, marker);
    });
}

google.maps.event.addDomListener(window, 'load', initialize);