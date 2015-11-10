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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php print_seo_meta(get_the_ID()); ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="https://cdn.rawgit.com/davidchambers/Base64.js/master/base64.min.js"></script>
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

    <?php
    switch_to_master();
    $csscode = get_field('global_css-code', 'options');
    if($csscode){
        echo $csscode;
    }
    restore_from_master();
    ?>

</head>


<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
    <?php if (is_home()) {
        ?>
        <div id="background-container" class="background-container" style="background-color:#fff;">
        </div>
    <?php
    } else {
        $bg = false;
        $uid = get_post_meta($post->ID, "pushed_original_id", true);
        if ($uid) {
            switch_to_master();
            $bg = get_field("bakgrundsbild", $uid);
            restore_current_blog();
        }

        if (!$bg) {
            switch_to_master();
            $bg = get_field('general_backgroundimage', 'options');
            restore_current_blog();
        }

        ?>
        <div id="background-container" class="background-container" style="background-image: url(<?php echo $bg; ?>);">
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
        <a class="home-link"
           href="<?php echo preg_replace("/http:\/\/.*?(?=\/)/", "http://" . $_SERVER['HTTP_HOST'], esc_url(home_url('/'))); ?>"
           title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
            <img class="header-logo"
                 style="max-height:<?php the_field('logo_height', 'options'); ?>; max-width:<?php the_field('logo_width', 'options'); ?>; height: auto; width: auto;"
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
                    if ($menus) {
                        foreach ($menus as $menu_item) {
                            ?>
                            <li class="menu-item">
                                <a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
                                <?php new_volvo_menu($submenus[$index]); ?>
                            </li>
                            <?php
                            $index++;
                        }
                    }
                    ?>
                    <script>
                        var linkurl = "<li class='bygg-din-volvo'><a href='<?php echo preg_replace('/http:\/\/.*?(?=\/)/', 'http://' . $_SERVER['HTTP_HOST'], home_url('/')); ?>bygg-din-volvo/' class='lytebox'><span class='arrow'></span>Bygg din Volvo</a></li>";
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
