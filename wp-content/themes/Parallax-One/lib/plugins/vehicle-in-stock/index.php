<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta property="og:title" content="Facebook Open Graph Meta-tags" />
    <meta property="og:image" content="./img/icons/apple-touch-icon-152x152.png" />
    <meta property="og:site_name" content="Title for Facebook" />
    <meta property="og:description" content="Facebook's Open Graph protocol allows for web developers to turn their websites into Facebook 'graph' objects, allowing a certain level of customization over how information is carried over from a non-Facebook website to Facebook when a page is 'recommended', 'liked', or just generally shared." />


    <title>Bra Bil - Lite personligare</title>

    <!-- Shortcut Icons 
    <link rel="shortcut icon" href="">
    <link rel="icon" type="image/x-icon" href="./img/icons/favicon.ico" />
    <link rel="icon" type="image/png" href="./img/icons/favicon.png" />
    <link rel="icon" type="image/gif" href="./img/icons/favicon.gif" />
    -->

    <!-- Touch Icons -->
    <link href="#" rel="apple-touch-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="./img/iconsapple-touch-icon-57x57.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./img/iconsapple-touch-icon-114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./img/iconsapple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./img/iconsapple-touch-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="./img/iconsapple-touch-icon-60x60.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="./img/iconsapple-touch-icon-120x120.png">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="./img/iconsapple-touch-icon-76x76.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="./img/iconsapple-touch-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="180x180" href="./img/iconsapple-touch-icon-180x180.png">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- FlexSlider -->
    <link href="css/flexslider.css" rel="stylesheet">

    <!-- Off Canvas CSS -->
    <link href="css/bootstrap.offcanvas.min.css" rel="stylesheet">

    <!-- Bootstrap Select -->
    <link href="css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Normalize -->
    <link href="css/normalize.css" rel="stylesheet">

    <!-- Icons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">
    <link href="css/brabil.css" rel="stylesheet">
    <link href="css/cars.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="body-offcanvas">

    <header>
        <div class="navbar navbar-fixed-top visible-xs">

            <a class="navbar-brand " href="/">
                <img src="img/bytbil.png" class="logotype">
            </a>

            <button type="button" class="navbar-toggle btn-blue offcanvas-toggle pull-right " data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas" style="float:left;">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <nav class="navbar navbar-default navbar-offcanvas navbar-offcanvas-touch navbar-offcanvas-fade navbar-fixed-top" role="navigation" id="js-bootstrap-offcanvas">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img src="img/bytbil.png" class="logotype">
                    </a>
                    <button type="button" class="navbar-toggle btn btn-blue offcanvas-toggle pull-right  offcanvas-toggle-close" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas" style="float:left;">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="ion ion-ios-close-empty"></i>
                    </button>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bilar</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Nya personbilar</a>
                                </li>
                                <li><a href="#">Begagnade personbilar</a>
                                </li>
                                <li><a href="#">Volvo i lager</a>
                                </li>
                                <li><a href="#">Renault i lager</a>
                                </li>
                                <li><a href="#">Dacia i lager</a>
                                </li>
                                <li><a href="#">Transportbilar i lager</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <?php include_once( 'cars.php'); ?>

    </main>

    <footer>
        <section class="blue-bg small-padding">
            <div class="container-fluid wrapper align-center">
                <div class="col-xs-12">
                    <p>
                        <a href="#">BytBil Fordonsurval oss</a>
                    </p>
                </div>
            </div>
        </section>

    </footer>

    <!-- jQuery -->
    <script src="js/jquery-1.11.1.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>

    <!-- OffCanvas Menu -->
    <script src="js/bootstrap.offcanvas.min.js"></script>

    <!-- Bootstrap Select -->
    <script src="js/bootstrap-select.min.js"></script>

    <script src="js/jquery.lazyload.min.js"></script>

    <!-- Isotope Filter List -->
    <script src="js/isotope.pkgd.min.js"></script>

    <!-- Modernizer -->
    <script src="js/modernizr.custom.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $('.selectpicker').selectpicker();

            var screen_width = window.innerWidth;
            var screen_height = window.innerHeight;


            var $grid = $('.vehicle-grid').isotope({
                itemSelector: '.col-sm-4',
                layoutMode: 'fitRows'
            });
           
            $('.filter-brand').on('change', function() {
                // get filter value from option value
                var filterValue = this.value;
                // use filterFn if matches value
                $grid.isotope({
                    filter: '[data-brand*='+ filterValue +']'
                });
            });
            
            $('.filter-used').on('change', function() {
                // get filter value from option value
                var filterValue = this.value;
                // use filterFn if matches value
                $grid.isotope({
                    filter: '[data-used*='+ filterValue +']'
                });
            });
        });
    </script>


</body>

</html>
