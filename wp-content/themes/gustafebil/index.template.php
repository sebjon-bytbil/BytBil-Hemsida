<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gustaf E Bil : Web template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jasny-bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>

<!-- Facebook -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/sv_SE/sdk.js#xfbml=1&appId=1429733897281411&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<header>
    <div class="wrapper">
        <div class="col-xs-12">
            <div class="contact-box">
                <div class="col-xs-6">
                    <span class="contact-title"><i class="entypo circled-info"></i> Om företaget</span>
                    <ul>
                        <li><a href="#">Om Gustaf E Bil</a></li>
                        <li><a href="#">Platschefer</a></li>
                        <li><a href="#">Press och nyheter</a></li>
                        <li><a href="#">Jobba hos oss</a></li>
                    </ul>
                </div>
                <div class="col-xs-6">
                    <span class="contact-title"><i class="entypo mail"></i> Kontakta oss</span>
                    <ul>
                        <li><a href="#">Skövde</a></li>
                        <li><a href="#">Lidköping</a></li>
                        <li><a href="#">Mariestad</a></li>
                        <li><a href="#">Vara</a></li>
                        <li><a href="#">Boka provkörning</a></li>
                        <li><a href="#">Boka service</a></li>
                    </ul>
                </div>
            </div>
            <a href="#"><img class="logotype hidden-xs" src="./images/gustafebil-logotype.png" alt="Gustaf E Bil"
                             title="Gustaf E Bil"></a>
            <nav id="top-menu" role="navigation">
                <div class="container-fluid">
                    <button type="button" class="visible-xs navbar-toggle pull-left" data-toggle="offcanvas"
                            data-target="#mobile-menu" data-canvas="body">
                        <span class="sr-only">Toggle navigation</span>
                        <i data-toggle="offcanvas" data-target="#mobile-menu" data-canvas="body" class="fa fa-bars"></i>
                    </button>
                    <div class="pull-right">
                        <ul class="nav navbar-nav">
                            <li class="dropdown hidden-xs">
                                <a href="#" class="about dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="entypo circled-info"></i><span class="hidden-xs"> Om företaget</span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Om Gustaf E Bil</a></li>
                                    <li><a href="#">Platschefer</a></li>
                                    <li><a href="#">Press och nyheter</a></li>
                                    <li><a href="#">Jobba hos oss</a></li>
                                </ul>
                            </li>
                            <li class="dropdown hidden-xs">
                                <a href="#" class="contact dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="entypo mail"></i><span class="hidden-xs"> Kontakta oss</span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Skövde</a></li>
                                    <li><a href="#">Lidköping</a></li>
                                    <li><a href="#">Mariestad</a></li>
                                    <li><a href="#">Vara</a></li>
                                    <li><a href="#">Boka provkörning</a></li>
                                    <li><a href="#">Boka service</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="search"><i class="entypo search"></i></a></li>
                            <li>
                                <button class="scrollup"><i class="entypo chevron-thin-up"></i></button>
                            </li>
                        </ul>
                        <a href="#" class="contact-toggle visible-xs"><i class="entypo mail"></i></a>
                    </div>
                </div>
            </nav>
            <nav id="mobile-menu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
                <a href="#"><img class="logotype visible-xs" src="./images/gustafebil-logotype.png" alt="Gustaf E Bil"
                                 title="Gustaf E Bil"></a>

                <div class="clearfix"></div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Start</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bilar
                            <i class="fa fa-angle-down"></i></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Nya bilar</a></li>
                            <li><a href="#">Begagnade bilar</a></li>
                            <li><a href="#">Nyinkommet i lager</a></li>
                            <li><a href="#">Bygg din bil</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Service
                            <i class="fa fa-angle-down"></i></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Boka service</a></li>
                            <li><a href="#">Verkstad</a></li>
                            <li><a href="#">Däckhotell</a></li>
                            <li><a href="#">Förmånskort</a></li>
                            <li><a href="#">Reservdelar</a></li>
                            <li><a href="#">Hyrbil</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Erbjudanden
                            <i class="fa fa-angle-down"></i></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Aktuella erbjudanden</a></li>
                            <li><a href="#">Servicemarknad</a></li>
                            <li><a href="#">Kia</a></li>
                            <li><a href="#">Mitsubishi</a></li>
                            <li><a href="#">Opel</a></li>
                            <li><a href="#">Peugeot</a></li>
                            <li><a href="#">Subaru</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tjänster
                            <i class="fa fa-angle-down"></i></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Finansiering</a></li>
                            <li><a href="#">Försäkring</a></li>
                            <li><a href="#">Förmånskort</a></li>
                            <li><a href="#">Däckhotell</a></li>
                            <li><a href="#">Hyrbil</a></li>
                        </ul>
                    </li>
                </ul>

                <form id="search-form">
                    <input type="text" id="search-input" placeholder="Sök på Gustaf E Bil">
                    <button type="submit" id="search-submit"><i class="entypo search"></i></button>
                </form>

                <div id="quick-call">
                    <a href="tel:0500-44 48 00"><i class="entypo phone"></i> Skövde</a>
                    <a href="tel:0510-48 81 80"><i class="entypo phone"></i> Linköping</a>
                    <a href="tel:0501-646 00"><i class="entypo phone"></i> Mariestad</a>
                    <a href="tel:0512-326 40"><i class="entypo phone"></i> Vara</a>
                </div>
            </nav>
            <div class="clearfix"></div>
            <nav id="main-menu" class="navbar" role="navigation">
                <div class="container-fluid">
                    <div class="pull-right hidden-xs">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Start</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">Bilar <i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Nya bilar</a></li>
                                    <li><a href="#">Begagnade bilar</a></li>
                                    <li><a href="#">Nyinkommet i lager</a></li>
                                    <li><a href="#">Bygg din bil</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">Service <i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Boka service</a></li>
                                    <li><a href="#">Verkstad</a></li>
                                    <li><a href="#">Däckhotell</a></li>
                                    <li><a href="#">Förmånskort</a></li>
                                    <li><a href="#">Reservdelar</a></li>
                                    <li><a href="#">Hyrbil</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">Erbjudanden <i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Aktuella erbjudanden</a></li>
                                    <li><a href="#">Servicemarknad</a></li>
                                    <li><a href="#">Kia</a></li>
                                    <li><a href="#">Mitsubishi</a></li>
                                    <li><a href="#">Opel</a></li>
                                    <li><a href="#">Peugeot</a></li>
                                    <li><a href="#">Subaru</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">Tjänster <i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Finansiering</a></li>
                                    <li><a href="#">Försäkring</a></li>
                                    <li><a href="#">Förmånskort</a></li>
                                    <li><a href="#">Däckhotell</a></li>
                                    <li><a href="#">Hyrbil</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</header>
<main>
    <section id="slideshow">
        <div class="wrapper">
            <div class="col-xs-12">
                <div class="flexslider">
                    <ul class="slides">
                        <li><img src="./images/slideshow/1.jpg"></li>
                        <li><img src="./images/slideshow/2.jpg"></li>
                        <li><img src="./images/slideshow/3.jpg"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="plugs">
        <div class="wrapper">
            <div class="col-xs-12 col-sm-3">
                <a href="#" class="plug small dark">
                    <i class="entypo tools"></i> Service och verkstad
                </a>
            </div>
            <div class="col-xs-12 col-sm-3">
                <a href="#" class="plug small dark">
                    <i class="entypo location"></i> Våra anläggningar
                </a>
            </div>
            <div class="col-xs-12 col-sm-3">
                <a href="#" class="plug small dark">
                    <i class="entypo tag"></i> Erbjudanden
                </a>
            </div>
            <div class="col-xs-12 col-sm-3">
                <a href="#" class="plug small dark">
                    <i class="entypo search"></i> Sök bilar i lager
                </a>
            </div>
        </div>
    </section>
    <section id="brands">
        <div class="wrapper">
            <a href="#" class="brand">
                <img src="./images/brands/kia.png">
            </a>
            <a href="#" class="brand">
                <img src="./images/brands/peugeot.png">
            </a>
            <a href="#" class="brand">
                <img src="./images/brands/opel.png">
            </a>
            <a href="#" class="brand">
                <img src="./images/brands/chevrolet.png">
            </a>
            <a href="#" class="brand">
                <img src="./images/brands/subaru.png">
            </a>
            <a href="#" class="brand">
                <img src="./images/brands/mitsubishi.png">
            </a>
        </div>
    </section>
    <section id="latest-vehicles">
        <div class="wrapper">
            <div class="col-xs-12">
                <div class="block white">
                    <h2><i class="entypo new"></i> Nyinkomna bilar i lager <a class="header-link hidden-xs" href="#">Se
                            alla bilar i lager <i class="entypo chevron-thin-right small"></i></a></h2>
                    <iframe id="assortment-frame"></iframe>
                    <a class="header-link visible-xs" href="#">Se alla bilar i lager <i
                            class="entypo chevron-thin-right small"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section id="service">
        <div class="wrapper">
            <div class="col-xs-12">
                <div class="block white">
                    <h2><i class="entypo tools"></i> Servicemarknad</h2>

                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                            <a href="#" class="plug big light">
                                <img src="./images/service/1.jpg">
									<span class="title">
										Service och verkstad
									</span>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <a href="#" class="plug big light">
                                <img src="./images/service/2.jpg">
									<span class="title">
										Däckhotell
									</span>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <a href="#" class="plug big light">
                                <img src="./images/service/3.jpg">
									<span class="title">
										Förmånskort
									</span>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <a href="#" class="plug big light">
                                <img src="./images/service/4.jpg">
									<span class="title">
										Reservdelar
									</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="offers">
        <div class="wrapper">
            <div class="col-xs-12 col-sm-6">
                <a href="#" class="plug big light offer">
                    <img src="./images/offers/1.jpg">
						<span class="title bold">
							Begagnade vinterhjul från 500 kr/st
						</span>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6">
                <a href="#" class="plug big light offer">
                    <img src="./images/offers/2.jpg">
						<span href="#" class="brand">
							<img src="./images/brands/subaru.png">
						</span>
						<span class="title bold">
							Kampanjpris på alla Subaru årsmodeller -13 och -14
						</span>
                </a>
            </div>
        </div>
    </section>
    <section id="facilities">
        <div class="wrapper">
            <div class="col-xs-12">
                <div id="map">
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <div class="wrapper">
        <div class="col-xs-12 col-sm-5 pull-right">
            <h3><i class="entypo pencil"></i> Kontakta oss</h3>

            <form id="contact-form">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <input id="name" type="text" placeholder="Ditt namn *" required>
                        <input id="email" type="email" placeholder="E-mail *" required>
                        <input id="phone" type="tel" placeholder="Telefon">
                        <select id="facility-choice">
                            <option disabled selected>Välj anläggning</option>
                            <option>Lidköping</option>
                            <option>Skövde</option>
                            <option>Mariestad</option>
                            <option>Vara</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <textarea id="message" placeholder="Meddelande *" rows="5" required></textarea>
                        <input id="submit" type="submit" value="Skicka">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-sm-4 pull-right">
            <h3><i class="entypo location"></i> Våra anläggningar</h3>

            <div class="facility">
                <h4>Lidköping</h4>
                <span class="address"><i class="entypo fw location"></i> Truvegatan 5</span>
                <span class="phone"><a href="#"><i class="entypo fw phone"></i> 0510-48 81 00</a></span>
            </div>
            <div class="facility">
                <h4>Skövde</h4>
                <span class="address"><i class="entypo fw location"></i> Truvegatan 5</span>
                <span class="phone"><a href="#"><i class="entypo fw phone"></i> 0510-48 81 00</a></span>
            </div>
            <div class="facility">
                <h4>Mariestad</h4>
                <span class="address"><i class="entypo fw location"></i> Truvegatan 5</span>
                <span class="phone"><a href="#"><i class="entypo fw phone"></i> 0510-48 81 00</a></span>
            </div>
            <div class="facility">
                <h4>Vara</h4>
                <span class="address"><i class="entypo fw location"></i> Truvegatan 5</span>
                <span class="phone"><a href="#"><i class="entypo fw phone"></i> 0510-48 81 00</a></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 pull-left">
            <h3><i class="entypo address"></i> Genvägar</h3>
            <ul class="shortcuts">
                <li><a href="#">Start</a></li>
                <li><a href="#">Bilar</a></li>
                <li><a href="#">Service</a></li>
                <li><a href="#">Erbjudanden</a></li>
                <li><a href="#">Tjänster</a></li>
                <li><a href="#">Om företaget</a></li>
                <li><a href="#">Kontakta oss</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 col-sm-7">
            <h3><i class="entypo social facebook"></i> Hitta oss på Facebook</h3>

            <div class="fb-like-box" data-href="https://www.facebook.com/pages/Gustaf-E-Bil/156923274349816"
                 data-width="640" data-colorscheme="light" data-show-faces="true" data-header="false"
                 data-stream="false" data-show-border="false"></div>
        </div>
        <div class="col-xs-12 col-sm-5">
            <h3><i class="entypo social instagram"></i> #gustafebil</h3>

            <div id="instafeed">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 pull-left">
            <a class="button-link" href="https://itunes.apple.com/se/app/gustaf-e-bil/id893992081?mt=8&uo=4"
               target="itunes_store"><i class="fa fa-fw fa-apple"></i> App för iOS</a>
            <a class="button-link" href="http://play.google.com/store/apps/details?id=se.webgroup203.bilweb.gustafebil"
               target="_blank"><i class="fa fa-fw fa-android"></i> App för Android</a>
        </div>
    </div>
</footer>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jasny-bootstrap.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>

<script src="js/instagram.min.js"></script>
<script src="js/instafeed.min.js"></script>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
<script type="text/javascript"
        src="http://access.bytbil.com/gustafebil2014/access/content/getcontent/1/access.iframe.host.js"></script>


<script>
    // Fordonsurval
    $(function () {
        var iframe = $('#assortment-frame');
        var iframeLoad = new Access.Iframe.Load({
            packageName: "gustafebil2014",
            actionName: "Senaste",
            assortment: "AGyDUDIAAYAWDBzyAAML!",
            parentUrl: window.location
        });

        iframeLoad.load(iframe);
    });

    var width = window.innerWidth;

    $(window).load(function () {
        $('.flexslider').flexslider();
        init_map();


    });

    // Responsive / Mobile
    if (width > 767) {
        // Fixed Header
        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > 100) {
                $('header').addClass('fixed');
                $('main').addClass('fixed-header');
            }
            else {
                $('header').removeClass('fixed');
                $('main').removeClass('fixed-header');
            }
        });

        //Toggla top-menyn
        $('.contact-toggle').click(function () {
            $('.contact-box').slideToggle('slow');
        });

        // Skrolla Up
        $('.scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    }

    // Toggla sidomenyn/kryss
    $(".navbar-toggle").click(function () {
        $('.navbar-toggle').html($('.navbar-toggle').html() == '<i class="fa fa-times"></i>' ? '<i class="fa fa-bars"></i>' : '<i class="fa fa-times"></i>');
    });

    // Instagram Feed
    var feed = new Instafeed({
        get: 'tagged',
        tagName: 'gustafebil',
        clientId: '680e76451708413485859ff3caf1c0df',
        limit: 9,
        links: true,
        resolution: 'thumbnail',

    });
    feed.run();

    // Google Maps
    function init_map() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions

        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap',
            scrollwheel: false,
            mapTypeControl: false,
        };

        // Display a map on the page
        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        map.setTilt(45);

        // Multiple Markers
        var markers = [
            ['Gustaf E Bil i Skövde', 58.395338, 13.871803],
            ['Gustaf E Bil i Lidköping', 58.497512, 13.188648],
            ['Gustaf E Bil i Mariestad', 58.678862, 13.817979],
            ['Gustaf E Bil i Vara', 58.257385, 12.970045],
        ];

        var infoWindowContent = [
            ['<div class="info_content">' +
            '<h3>Skövde</h3>' +
            '</div>'],
            ['<div class="info_content">' +
            '<h3>Lidköping</h3>' +
            '</div>'],
            ['<div class="info_content">' +
            '<h3>Mariestad</h3>' +
            '</div>'],
            ['<div class="info_content">' +
            '<h3>Vara</h3>' +
            '</div>'],
        ];


        // Display multiple markers on a map
        var infoWindow = new google.maps.InfoWindow(), marker, i;

        // Loop through our array of markers & place each one on the map
        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });

            // Allow each marker to have an info window
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            // Automatically center the map fitting all markers on the screen
            map.fitBounds(bounds);
        }

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
            this.setZoom(8);
            google.maps.event.removeListener(boundsListener);
        });

    }

</script>

</body>
</html>
