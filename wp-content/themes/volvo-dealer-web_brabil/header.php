<?php
restore_from_master();
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
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
    <?php
    register_nav_menu('bildelar', 'Bildelar');
    register_nav_menu('na-oss', 'Nå oss');

    $term = get_term_by('name', 'Bildelar', 'nav_menu');
    $term2 = get_term_by('name', 'Nå oss', 'nav_menu');

    $menu_id = $term->term_id;
    $menu_id2 = $term2->term_id;

    $nav_menu = wp_get_nav_menu_object($menu_id);
    $nav_menu2 = wp_get_nav_menu_object($menu_id2);
    ?>

    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/lytebox/lytebox.css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" style=""></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"
            style=""></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lytebox/lytebox.js" style=""></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jslider.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/responsive.js"></script>
    <!--<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/iframeheight.min.js"></script>-->

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">

    <title><?php if (!is_home()) {
            echo the_title() . " - ";
        } ?> <?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

    <script type="text/javascript">
        $(document).ready(function () {
            $('.open_in_lightbox a, a.lytebox').each(function () {
                var boxHeight = 670; //Math.round(Math.max($(window).height() * 0.9, 651));
                var boxWidth = 998; //Math.round(Math.max(boxHeight * 1.2, 994));
                $(this).attr('rev', 'width:' + boxWidth + ' height:' + boxHeight);
                $(this).attr('data-lyte-options', 'width:' + boxWidth + ' height:' + boxHeight + ' scrollbars:no autoResize:false');

                $(this).attr('href', $(this).attr('href') + '?width=' + boxWidth + '&height=' + boxHeight);
            });
        });
    </script>


</head>


<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
    <?php if (is_home()) {
        ?>
        <div id="background-container" class="background-container" style="background-color:#fff;">
        </div>
    <?php
    } else {
        ?>
        <div id="background-container" class="background-container"
             style="background-image: url(<?php bloginfo('template_url'); ?>/images/dealer-web-xc60.jpg);">
        </div>
    <?php
    }
    ?>
    <div id="background-slider-nav" class="background-slider-nav">
        <ul id="background-slider-controls" class="background-slider-controls">

        </ul>
    </div>
    <header id="masthead" class="site-header" role="banner" style="background: transparent;">
        <?php
        $target = get_field('home_link_target', 'options');
        if (!$target || $target == '') {
            $target = '_self';
        }
        ?>
        <a class="vdw-link" href="<?php the_field('home_link', 'options'); ?>"
           target="<?php echo $target; ?>">› <?php the_field('home_link_title', 'options'); ?></a>
        <a class="home-link" href="<?php echo esc_url(home_url('/')); ?>"
           title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
            <img class="header-logo"
                 style="height:<?php the_field('logo_height', 'options'); ?>; width:<?php the_field('logo_width', 'options'); ?>;"
                 src="<?php the_field('logo', 'options'); ?>"/>
        </a>
        <a class="volvo-link" href="http://www.volvocars.se" target="_blank" title="Volvo">
            <img class="volvo-logo" src="<?php bloginfo('template_url'); ?>/images/volvo-logo-new.png"/>
        </a>

        <div class="clear"></div>
        <div id="navbar" class="navbar">
            <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                <?php
                /*
                switch_to_master();
                get_blog_details();
                $menu = volvo_get_custom_menu('Huvudmeny', 'nav-menu');
                $url = $_SERVER['SERVER_NAME'];
                $blog_details = get_blog_details();
                $menu2 = str_replace($blog_details->domain, $url, $menu);
                //echo $menu2;
                restore_from_master();

                //volvo_bottom_menu();
                */
                $menus = new_volvo_menu('bottom-main', false, '', false);
                $submenus = array(
                    'bottom-explore', 'bottom-buy', 'bottom-services'
                );
                ?>
                <ul id="menu-mainmenu" class="nav-menu">
                    <?php
                    $index = 0;
                    foreach ($menus as $menu_item) {
                        ?>
                        <li class="menu-item">
                            <a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
                            <?php new_volvo_menu($submenus[$index]); ?>
                        </li>
                        <?php
                        $index++;
                    }
                    ?>
                    <li class="menu-item">
                        <a href="#"><?php echo $nav_menu->name; ?></a>
                        <?php new_volvo_menu($nav_menu->slug); ?>
                    </li>
                    <li class="menu-item">
                        <a href="#"><?php echo $nav_menu2->name; ?></a>
                        <?php new_volvo_menu($nav_menu2->slug); ?>
                    </li>
                    <script>
                        var linkurl = "<li class='bygg-din-volvo'><a href='<?php echo home_url("/"); ?>/bygg-din-volvo/' class='lytebox'><span class='arrow'></span>Bygg din Volvo</a></li>";
                        $("#menu-mainmenu .menu-item").each(function () {

                            $(this).find("ul").append(linkurl);
                        });
                    </script>
                </ul>
                <div class="clear"></div>
            </nav>
            <!-- #site-navigation -->
        </div>
        <!-- #navbar -->
    </header>
    <!-- #masthead -->
    <div id="main" class="site-main">
