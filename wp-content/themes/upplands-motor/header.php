<!DOCTYPE html>

<html lang="en"
    <?php if (is_user_logged_in()) {
    echo 'class="push-down-admin-menu"';
    } ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
        $url = $thumb['0'];
        ?>

        <meta property="og:title" content="<?php echo get_the_title(); ?>" />
        <meta property="og:description" content="testdescription" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo get_permalink(); ?>" />
        <meta property="og:image" content="<?php echo $url ?>" />


        <title><?php bloginfo('name'); ?> | <?php wp_title('|', true, 'right'); ?> <?php bloginfo('description'); ?></title>
        <?php wp_head(); ?>

        <!-- Shortcut Icons -->
        <link rel="icon" type="image/x-icon" href="<?php echo get_favicon(); ?>" />
        <link rel="favicon" href="<?php echo get_favicon(); ?>" />

        <!-- Touch Icons -->
        <?php
        get_touch_icons();
        ?>

        <!-- Iconlibraries -->
        <link href="/wp-content/themes/upplands-motor/fonts/icons/bytbil/bytbil-icons.css" rel="stylesheet">
        <link href="/wp-content/themes/upplands-motor/fonts/icons/fontawesome/fontawesome.css" rel="stylesheet">


        <!-- Bootstrap -->
        <link href="/wp-content/themes/upplands-motor/css/bootstrap.min.css" rel="stylesheet">
        <link href="/wp-content/themes/upplands-motor/css/bootstrap-theme.min.css" rel="stylesheet">

        <!-- Normalize -->
        <link href="/wp-content/themes/upplands-motor/css/normalize.css" rel="stylesheet">

        <!-- Flexslider -->
        <link href="/wp-content/themes/upplands-motor/css/flexslider.css" rel="stylesheet">
        <link href="/wp-content/themes/upplands-motor/css/owl.carousel.css" rel="stylesheet">
        <link href="/wp-content/themes/upplands-motor/css/owl.theme.css" rel="stylesheet">

        <!-- Jasny Bootstrap (Off Canvas Menu) -->
        <link href="/wp-content/themes/upplands-motor/css/jasny-bootstrap.min.css" rel="stylesheet">

        <!-- Helvetica Neue LT -->
        <link href="/wp-content/themes/upplands-motor/fonts/helvetica-neue/helvetica-neue.css" type="text/css" rel="stylesheet" >

        <!-- Morphsearch -->
        <link href="/wp-content/themes/upplands-motor/css/extra/morphsearch.css" rel="stylesheet">
        
        <!-- Brands -->
        <link href="/wp-content/themes/upplands-motor/fonts/volvo/volvo.css" type="text/css" rel="stylesheet">
        <link href="/wp-content/themes/upplands-motor/fonts/renault/renault.css" type="text/css" rel="stylesheet">
        <link href="/wp-content/themes/upplands-motor/fonts/ford/ford.css" type="text/css" rel="stylesheet">
        <link href="/wp-content/themes/upplands-motor/fonts/dacia/dacia.css" type="text/css" rel="stylesheet">

        <link href="/wp-content/themes/upplands-motor/base.css" rel="stylesheet">
        <link href="/wp-content/themes/upplands-motor/style.css" rel="stylesheet">


        <!-- ElasticAccess
        <link href="/wp-content/themes/upplands-motor/css/finance.css" rel="stylesheet">
        <link href="/wp-content/themes/upplands-motor/css/elasticaccess-style.css" rel="stylesheet">
        -->

        <!--[if IE]>
        <link href="/wp-content/themes/upplands-motor/css/ie-9-up.css" rel="stylesheet">
        <![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri() . '/js/matchMedia.js'; ?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/js/html5shiv.min.js'; ?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/js/respond.min.js'; ?>"></script>
        <![endif]-->

        <!--Google Maps / Anläggningar -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQAh825x3dRxn8w6zRUuCvtBOu-1FdgTU"></script>

        <?php echo get_settings_code('css'); ?>
        

    </head>
    <body <?php body_class(); ?>>

        <?php echo get_settings_code('html'); ?>

        <header>
            <nav id="main-nav" class="navbar navbar-fixed-top" role="navigation">
                <div class="navbar">
                    <div class="container-fluid">
                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navbar-offcanvas" data-canvas="body">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="icon-dots-three-horizontal"></i>
                            </button>

                            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                                <img class="logotype"
                                     src="<?php echo get_logotype('svg'); ?>"
                                     onerror="this.onerror=null; this.src='<?php echo get_logotype('png'); ?>'"
                                     alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"
                                     title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
                            </a>

                            <button type="button" class="search-toggle visible-xs">
                                <i class="icon-magnifying-glass"></i>
                            </button>

                        </div>
                        <div class="navbar-offcanvas offcanvas navmenu-fixed-left canvas-slid" style="">
                            <a class="navmenu-brand" href="<?php echo home_url(); ?>">
                                <img src="<?php echo get_logotype('svg'); ?>"
                                     onerror="this.onerror=null; this.src='<?php echo get_logotype('png'); ?>'"
                                     alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"
                                     title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
                            </a>
                            
                            <div id="main-menu">
                                <?php
                                    $walker = new wp_bootstrap_navwalker();

                                    $main_menu = wp_nav_menu(array(
                                        'menu' => 'Huvudmeny',
                                        'echo' => false,
                                        'depth' => 3,
                                        'container' => false,
                                        'menu_class' => 'nav navbar-nav',
                                        'walker' => $walker,
                                    ));

                                    echo $main_menu;
                                ?>
                            </div>

                                <?php include 'search-header.php'; ?>

                            <div id="my-parking" class="pull-right">
                                <div class="collapsed-text">
                                    <span class="parking-icon">
                                        P
                                    </span>
                                    <span class="parking-text light">
                                        Min P-plats
                                    </span>
                                </div>
                            </div>
                            <ul id="brands" class="nav navbar-nav pull-right">
                            <?php
                                $header_brands_keys = get_field('settings-brands', 'options');

                                foreach($header_brands_keys as $key => $var){
                                    $header_brands_keys[$key] = (int)$var;
                                    $page_link = get_brand_pagelink($header_brands_keys[$key]);
                                ?>
                                <li>
                                    <a target="_self" class="brand-link" href="<?php echo $page_link; ?>">
                                        <?php get_brand_logotype($header_brands_keys[$key]); ?>
                                    </a>
                                </li>
                                <?php
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div id="locations" class="spacing-sm hidden-xs">
                <span class="locations-title">
                    Här finns vi:
                </span>

                <!-- Site Login Form -->
                <?php if(!is_user_logged_in()){ ?>
                    <div class="login_form" style="float:right">
                        <?php
                        $slug = IntranetHandler::get_company_page_slug();
                        $redirect_url = site_url($_SERVER['REQUEST_URI']) . $slug;
                        wp_login_form(
                            array(
                                "redirect" => $redirect_url
                            )
                        ); ?>
                    </div>
                <?php }else{
                    $current_user = wp_get_current_user();
                    $current_username = $current_user->user_login; ?>

                    <div style="float: right;">
                        Inloggad som <?php echo $current_username; ?>
                        <a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a>
                    </div>
                <?php } ?>

                <?php
                    $find_us_menu = wp_nav_menu(array(
                        'menu' => 'Här finns vi',
                        'echo' => false,
                        'depth' => 1,
                        'container' => false,
                        'menu_class' => 'find-us-nav-list',
                        'theme_location' => 'find-us'
                    ));

                    echo $find_us_menu;
                ?>
            </div>
            
        </header>
