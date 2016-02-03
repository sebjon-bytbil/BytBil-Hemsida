<?php
$dir = get_template_directory_uri();
?>

<!DOCTYPE html>
<html <?php if (is_user_logged_in()) {
    echo 'class="push-down-admin-menu"';
} ?>>
<head>
    <?php wp_head(); ?>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9"/>
    <meta name="viewport" content="width=device-width">
    <meta name="google-site-verification" content="n87oaD8g-0_vdhE89423Y8u33NEdqJ73vCSfC_1Ir9Q"/>

    <title>
        <?php
        global $page, $paged;

        $site_description = get_bloginfo('description', 'display');

        if(is_front_page()) {
            bloginfo('name'); echo " | $site_description";
        } else {
            echo "$site_description | "; bloginfo('name');
        }
        //wp_title('|', true, 'right');

        /*$site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";*/
        ?>
    </title>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $dir; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lte IE 8]>
    <link href="<?php echo $dir; ?>/css/bootstrap-ie7.css" rel="stylesheet">
    <link href="<?php echo $dir; ?>/css/ie7-fix.css" rel="stylesheet">
    <![endif]-->

    <link href="<?php echo $dir; ?>/style.css" rel="stylesheet">
    <link href="<?php echo $dir; ?>/css/colorbox.css" rel="stylesheet">
    <link href="<?php echo $dir; ?>/css/flexslider.css" rel="stylesheet">


    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo $dir; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $dir; ?>/js/custom.js"></script>
    <script src="<?php echo $dir; ?>/js/jquery.flexslider-min.js"></script>
    <script src="<?php echo $dir; ?>/js/jquery.colorbox-min.js"></script>


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript"
            src="http://access.bytbil.com/biva2014/access/Content/GetContent/1/jquery.ba-postmessage.js"></script>
    <script type="text/javascript"
            src="http://access.bytbil.com/biva2014/access/Content/GetContent/1/jquery.ba-bbq.js"></script>
    <script type="text/javascript"
            src="http://access.bytbil.com/biva2014/access/Content/GetContent/1/jquery.expandable-iframe.js"></script>-->


    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>

    <!--[if lte IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->

    <!--[if lte IE 8]>
    <link href="<?php echo $dir; ?>/css/bootstrap-ie7.css" rel="stylesheet">
    <link href="<?php echo $dir; ?>/fonts/antenna/stylesheet.css" rel="stylesheet">
    <![endif]-->

    <link rel="apple-touch-icon" href="<?php echo $dir; ?>/img/touch-icon-small.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $dir; ?>/img/touch-icon-big.png"/>
</head>
<body
    id="<?php echo get_bloginfo('title'); ?>" <?php if ((/*!is_home() || */!is_front_page())) echo 'class="page id-' . get_the_ID() . '"'; ?>>

<header>
    <div id="top">
        <div class="wrapper">
            <div class="container-fluid">

                <div class="col-xs-12 col-md-6">
                    <a href="<?php echo get_option('home'); ?>" title="<?php echo get_bloginfo('name');
                    echo " | ";
                    echo get_bloginfo('description'); ?>"><img class="logotype"
                                                               src="<?php echo $dir; ?>/img/biva-logotype-normal.png<?php //echo get_field('logotype-header', 49); ?>"></a>
                </div>

                <div class="col-md-6 hidden-xs hidden-sm">
                    <div class="search-container">
                        <?php get_search_form(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="menu" style="z-index: 999;">
        <div class="wrapper">
            <div class="container-fluid">
                <nav class="menu main navbar" role="navigation">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand visible-xs navbar-toggle" href="#" data-toggle="collapse"
                               data-target="#bs-example-navbar-collapse-1">Meny</a>
                        </div>

                        <?php
                        wp_nav_menu(array(
                                'menu' => 'primary',
                                'theme_location' => 'primary',
                                'depth' => 3,
                                'container' => 'div',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id' => 'bs-example-navbar-collapse-1',
                                'menu_class' => 'nav navbar-nav',
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker())
                        );
                        ?>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
