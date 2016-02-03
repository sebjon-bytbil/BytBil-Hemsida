<?php /** * The Header template for our theme * * Displays all of the <head>section and everything up till
 * <div id="main">
 * * @package WordPress * @subpackage Twenty_Thirteen * @since Twenty Thirteen 1.0
 */ ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>
        <?php wp_title('|', true, 'right'); ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link href='http://fonts.googleapis.com/css?family=Londrina+Solid' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap-columns.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/flexslider.css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jslider.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/waypoints.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/waypoints-infinite.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/nybergsfunctions.js"></script>

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/responsive.css">
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url' ); ?>/css/ie-fix.css">
    <![endif]-->
    <meta name="google-site-verification" content="-V9ejnmbNUEnZ2_wjTJpzWBqNHbvNXU6LFp4WvYV3j0"/>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <div id="topsearchbar" class="nyberg-topsearchbar">
        <div>
            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'nyberg-search-menu', 'menu_class' => 'nyberg-search-menu', 'menu' => 'Search Topp'));
            get_search_form(); ?>
        </div>

    </div>
    <div id="tire-bar" class="tire-bar">
        <div>
            <a href="<?php echo home_url(); ?>"><img class="tire-bar-logo"
                                                     src="<?php bloginfo('template_url'); ?>/images/top-logo.png"/></a>

            <div class="nyberg-navbar">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <nav class="nav-collapse collapse" id="site-navigation" role="navigation">
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'nyberg-nav-menu', 'menu_class' => 'nyberg-nav-menu', 'menu' => 'Huvudmeny')); ?>
                </nav>
                <!-- #site-navigation -->
            </div>
            <!-- #navbar -->
        </div>
    </div>
    <div id="masthead" class="site-header" role="banner">
        <div class="nygren-header-content">
            <?php echo do_shortcode('[slider name="startsida" dirnav="true"]'); ?>
        </div>
    </div>
    <!-- #masthead -->

    <div id="main" class="site-main">
