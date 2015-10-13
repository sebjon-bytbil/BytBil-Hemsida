<!DOCTYPE html>

<html lang="en"
    <?php if (is_user_logged_in()) {
    echo 'class="push-down-admin-menu"';
    } ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="fragment" content="!" />
        <title><?php bloginfo('name'); ?> | <?php wp_title('|', true, 'right'); ?> <?php bloginfo('description'); ?></title>
        <?php wp_head(); ?>

        <!-- Shortcut Icons -->
        <link rel="icon" type="image/x-icon" href="<?php echo get_favicon(); ?>" />
        <link rel="favicon" href="<?php echo get_favicon(); ?>" />

        <!-- Touch Icons -->
        <?php
        get_touch_icons();
        ?>
        <link href="/wp-content/themes/upplands-motor-2015/minified/css/clean.style.min.css" rel="stylesheet">
        <!-- Iconlibraries -->
        <!-- <link href="<?php echo get_template_directory_uri(); ?>/fonts/icons/bytbil/bytbil-icons.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/fonts/icons/fontawesome/fontawesome.css" rel="stylesheet"> -->


        <!-- Bootstrap -->
       <!--  <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.min.css" rel="stylesheet"> -->

        <!-- Normalize -->
        <!-- <link href="<?php echo get_template_directory_uri(); ?>/css/normalize.css" rel="stylesheet"> -->

        <!-- Flexslider -->
        <!-- <link href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.css" rel="stylesheet"> -->

        <!-- Jasny Bootstrap (Off Canvas Menu) -->
        <!-- <link href="<?php echo get_template_directory_uri(); ?>/css/jasny-bootstrap.min.css" rel="stylesheet"> -->

        <!-- Helvetica Neue LT -->
        <!-- <link href="<?php echo get_template_directory_uri(); ?>/fonts/helvetica-neue/helvetica-neue.css" type="text/css" rel="stylesheet" > -->
        <!-- Volvo Broad -->
        <!-- <link href="<?php echo get_template_directory_uri(); ?>/fonts/volvo-broad/volvo.css" type="text/css" rel="stylesheet"> -->


       <!--  <link href="<?php echo get_template_directory_uri(); ?>/base.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet"> -->


        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>

        <!-- Bootstrap -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

        <!-- Modernizer -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>

        <!-- Flexslider -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider-min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.js"></script>

        <!-- jQueryUI -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.min.js"></script>

        <!-- Custom files -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/jasny-bootstrap.min.js"></script>

        <!-- Google Maps / Anläggningar -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQAh825x3dRxn8w6zRUuCvtBOu-1FdgTU"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/google-maps.js"></script>

        <!-- ElasticAccess
        <link href="<?php echo get_template_directory_uri(); ?>/css/finance.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/elasticaccess-style.css" rel="stylesheet">
        -->


        <!--[if IE]>
        <link href="<?php echo get_template_directory_uri(); ?>/css/ie-9-up.css" rel="stylesheet">
        <![endif]-->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri() . '/js/matchMedia.js'; ?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/js/html5shiv.min.js'; ?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/js/respond.min.js'; ?>"></script>
        <![endif]-->

        <?php echo get_settings_code('css'); ?>

    </head>
    <body <?php body_class(); ?>>

        <?php echo get_settings_code('html'); ?>
