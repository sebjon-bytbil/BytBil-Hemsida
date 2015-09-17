<!DOCTYPE html>
<html lang="en"<?php if (is_user_logged_in()) { echo 'class="push-down-admin-menu"'; } ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta property="og:title" content="Facebook Open Graph Meta-tags" />
        <meta property="og:image" content="./img/icons/apple-touch-icon-152x152.png" />
        <meta property="og:site_name" content="Title for Facebook" />
        <meta property="og:description" content="Facebook's Open Graph protocol allows for web developers to turn their websites into Facebook 'graph' objects, allowing a certain level of customization over how information is carried over from a non-Facebook website to Facebook when a page is 'recommended', 'liked', or just generally shared." />
        
        <title><?php bloginfo('name'); ?> | <?php wp_title('|', true, 'right'); ?> <?php bloginfo('description'); ?></title>
        
        <?php wp_head(); ?>
        
        <link rel="icon" type="image/x-icon" href="" />
        <link rel="favicon" href="" />
        
        <!-- Shortcut Icons -->
        <link rel="shortcut icon" href="">
        <link rel="icon" type="image/x-icon" href="" />
        <link rel="icon" type="image/png" href="" />
        <link rel="icon" type="image/gif" href="" />

        <!-- Touch Icons -->
        <link href="#" rel="apple-touch-icon" />
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="">
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="">
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="">
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="">
        <link rel="apple-touch-icon-precomposed" sizes="180x180" href="">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        
        <!-- Bootstrap -->
        <link href="/wp-content/themes/ahlberg-bil/css/bootstrap.min.css" rel="stylesheet">
        <link href="/wp-content/themes/ahlberg-bil/css/bootstrap-theme.min.css" rel="stylesheet">

        <!-- Normalize -->
        <link href="/wp-content/themes/ahlberg-bil/css/normalize.css" rel="stylesheet">

        <!-- CookieBar -->
        <link href="/wp-content/themes/ahlberg-bil/css/jquery.cookiebar.css" rel="stylesheet">

        <!-- Main -->
        <link href="/wp-content/themes/ahlberg-bil/style.css" rel="stylesheet">
        
    </head>
    <body>
        <header>
            <nav class="navbar" role="navigation">
                <div class="container-fluid wrapper">
                    <div class="navbar-header">

                        <div class="brands">
                            <a href="#">
                                <img src="./img/volvo.png">
                            </a>
                            <a href="#">
                                <img src="./img/Renault-logo-2.png">
                            </a>
                            <a href="#" class="btn navbar-button btn-default btn-blue big"><i class="fa fa-facebook"></i> Facebook</a>
                        </div>
                        <a class="navbar-brand" href="#">
                            <img src="./img/logo_hires.png" alt="Ahlberg Bil - Med fokus på dig" title="Ahlberg Bil - Med fokus på dig">
                        </a>
                    </div>
                    <div class="mobile-navbar">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="visible-xs" href="#"><i class="fa fa-home"></i></a> 
                            </li>
                            <li>
                            <button type="button" class="navbar-toggle slidedown" data-toggle="collapse" data-target=".navbar-collapse">
                                <span>Menyval</span>
                                <span class="sr-only">Toggle navigation</span>
                            </button>
                            </li>
                        </ul>

                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="active">
                                <a class="hidden-sm hidden-xs" href="#">Start</a>
                            </li>
                            <li>
                                <a href="#">Nya bilar</a>
                            </li>
                            <li>
                                <a href="#">Beg. Bilar</a>
                            </li>
                            <li>
                                <a href="#">Transportbilar</a>
                            </li>
                            <li>
                                <a href="./page.php">Verkstad</a>
                            </li>
                            <li>
                                <a href="#">Butik</a>
                            </li>
                            <li>
                                <a href="#">Tjänster</a>
                            </li>
                            <li>
                                <a href="#">Blogg</a>
                            </li>
                            <li>
                                <a href="#">Om oss</a>
                            </li>
                            <li class="dropdown pull-right">
                                <a href="#" class="hidden-sm dropdown-toggle" data-toggle="dropdown">Våra anläggningar</a>
                                <a href="#" class="visible-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-map-pin"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Karlshamn</a>
                                    </li>
                                    <li><a href="#">Karlskrona</a>
                                    </li>
                                    <li><a href="#">Sölvesborg</a>
                                    </li>
                                    <li><a href="#">Ljungby</a>
                                    </li>
                                    <li><a href="#">Olofström</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--.nav-collapse -->
                </div>
            </nav>
        </header>