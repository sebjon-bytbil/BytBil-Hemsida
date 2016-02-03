<!DOCTYPE HTML>
<?php
$dir = get_template_directory_uri();
?>
<html <?php if (is_user_logged_in()) {
    echo 'class="push-down-admin-menu"';
} ?>>
<head>


    <?php wp_head(); ?>

    <title><?php bloginfo('name'); ?> : <?php wp_title('|', true, 'right');
        bloginfo('description'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale = 1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>/css/bootstrap-columns.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>/style.css">
    <!--<link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>css/print.css" media="print" />-->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Globala script -->
    <script type="text/javascript" src="<?php echo $dir; ?>/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $dir; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $dir; ?>/js/site.js"></script>
    <!-- site.js -->

    <!-- Framside specificka script -->
    <script type="text/javascript" src="<?php echo $dir; ?>/js/jquery.flexslider-min.js"></script>


    <script type="text/javascript">
        var scrollPos = 0;

        $(document).scroll(function () {
            scrollPos = $(document).scrollTop();
            $("#backdrop").css('top', (scrollPos - (scrollPos / 2)) + "px");
        });


        $(document).ready(function () {
            jQuery("#toTop").click(function () {
                $("html, body").animate({scrollTop: 0}, "slow");
                return false;
            });
            //jQuery('.flexslider').flexslider();
        });

    </script>

    <!--Carlist code (Expanding Iframe)-->
    <script type="text/javascript">
        var accesspack = "roslagsbil2014"; // name of dealercode in .NET package
        var iframewidth = "100%"; // iframewidth
        var scrollHeight = "0"; // height to scroll anchor from absolute top of page.
        var showPage = "SokLista"; // name of the page

        // PERSONBILAR
        <?php
            if ( is_front_page() ) { ?>
        var showPage = "Senaste";
        var criteriaString = "AEyDUDIAAYAWDnkAAYcA!"; //Personbil Ny /Beg, alla märken 4/sida
        <?php } elseif(is_page(51)) { ?>	//Alla bilar
        var criteriaString = "AECDUDIAAYAOeQABiYA_!"; // searchstring from bytbil.
        <?php } elseif(is_page(274)) { ?>	//Begagnade
        var criteriaString = "AGCDUDIAAYAUDnkAAYmA!"; // searchstring from bytbil.
        <?php } elseif(is_page(298)) { ?>   //Transport
        var criteriaString = "AECDUDIAA4ADnkAAYmQw!"; // searchstring from bytbil.
        <?php } elseif(is_page(377)) { ?>   //Nybil : Renault
        var criteriaString = "AWCDUDIAAY3AAMHPIAAxMA__!"; // searchstring from bytbil.
        <?php } elseif(is_page(379)) { ?>   //Nybil : Ford
        var criteriaString = "AWCDUDIAAYtgAYOeQABiYA__!"; // searchstring from bytbil.
        <?php } elseif(is_page(375)) { ?>   //Nybil : Volvo
        var criteriaString = "AWCDUDIAAY8cAGDnkAAYmA__!"; // searchstring from bytbil.
        <?php } else { ?>            //Nya bilar
        var criteriaString = "AGCDUDIAAYAMHPIAAxMA!"; // searchstring from bytbil.


        <?php } ?>


    </script>

    <SCRIPT type=text/javascript
            src="http://access.bytbil.com/roslagsbil2014/access/Content/GetContent/1/jquery.ba-bbq.js"></SCRIPT>
    <SCRIPT type=text/javascript
            src="http://access.bytbil.com/roslagsbil2014/access/Content/GetContent/1/jquery.ba-postmessage.js"></SCRIPT>
    <SCRIPT type=text/javascript
            src="http://access.bytbil.com/roslagsbil2014/access/Content/GetContent/1/jquery.expandable-iframe.js"></SCRIPT>
    <!-- End of Carlist code-->


</head>

<body>

<div id="backdrop">
</div>
<div id="top">
    <div class="wrapper">
        <div class="container-fluid hidden-xs">

            <div class="logo col-sm-6">
                <a href="<?php echo get_option('home'); ?>"><img
                        src="<?php echo get_field('logotyp-image', 8); ?>"/></a>
            </div>

            <div class="brands col-sm-6 ">

                <?php
                if (have_rows('varumarken', 8)):
                    while (have_rows('varumarken', 8)): the_row(); ?>
                        <a href="<?php the_sub_field('varumarke-link'); ?>">
                            <img src="<?php the_sub_field('varumarke-logotype'); ?>">
                        </a>
                    <?php endwhile;
                else :
                endif;
                ?>

            </div>

            <div class="clear"></div>
        </div>
    </div>


    <div id="menu">
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
                            <a class="navbar-brand visible-xs" href="#">Meny</a>
                        </div>
                        <div class="hidden-xs">
                            <?php
                            wp_nav_menu(array(
                                    'menu' => 'main_menu',
                                    'theme_location' => 'main_menu',
                                    'depth' => 1,
                                    'container' => 'div',
                                    'menu_class' => 'nav navbar-nav')
                            );
                            ?>
                        </div>
                        <div class="visible-xs">
                            <?php
                            wp_nav_menu(array(
                                    'menu' => 'main_menu',
                                    'theme_location' => 'main_menu',
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
                    </div>
                </nav>
            </div>
        </div>
    </div>


    <div class="container-fluid visible-xs" style="background: #fff;">
        <div class="logo col-xs-12">
            <a href="<?php echo get_option('home'); ?>"><img src="<?php echo get_field('logotyp-image', 8); ?>"/></a>
        </div>
    </div>

</div>

