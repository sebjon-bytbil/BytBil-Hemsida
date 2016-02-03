<?php header("Access-Control-Allow-Origin: http://access.bytbil.com"); ?>
<!DOCTYPE html>
<?php ob_start();
$frontpageID = get_option('page_on_front');
?>
<?php
if (function_exists('getSiteSettings')) {
    $settingspage = getSiteSettings();
} else {
    $settingspage->ID = null;
}
?>

<!--[if lt IE 8]><html class="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><html <?php language_attributes(); ?>><![endif]-->
<!--[if !IE]><html <?php language_attributes(); ?>><![endif]-->

<html <?php if( is_user_logged_in() ) { echo 'class="push-down-admin-menu"'; } ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if(get_field("pagesettings-meta-description")): ?>
    <meta name="description" content="<?php the_field('pagesettings-meta-description'); ?>"/>
<?php elseif(get_field('sitesettings-meta-description', $settingspage->ID)): ?>
    <meta name="description" content="<?php the_field('sitesettings-meta-description', $settingspage->ID); ?>"/>
<?php endif; ?>
<?php if(get_field("pagesettings-meta-keywords")): ?>
    <meta name="keywords" content="<?php the_field('pagesettings-meta-keywords'); ?>"/>
<?php elseif(get_field('sitesettings-meta-keywords', $settingspage->ID)): ?>
    <meta name="keywords" content="<?php the_field('sitesettings-meta-keywords', $settingspage->ID); ?>"/>
<?php endif; ?>
<?php if(get_field("pagesettings-title-tag")): ?>
    <title><?php the_field("pagesettings-title-tag")?></title>

<?php elseif (!get_field('sitesettings-seo-meta', $settingspage->ID)) : ?>
    <title><?php bloginfo('name'); ?> : <?php wp_title('|', true, 'right'); ?></title>
<?php else : ?>
    <title><?php wp_title('|', true, "right"); ?> <?php the_field('sitesettings-title-tag', $settingspage->ID); ?></title>
<?php endif; ?>

<?php
if (get_field("sitesettings-header-favicon", $settingspage->ID)) : ?>
    <link rel="icon" type="image/png" href="<?php echo get_field("sitesettings-header-favicon", $settingspage->ID) ?>"/>
<?php endif; ?>

<?php wp_head(); ?>

<?php if (get_field('extra-code') && in_array('CSS', get_field('extra-code'))) : ?>
    <?php the_field('extra-code-css'); ?>
<?php endif; ?>

<?php if (get_field('extra-code') && in_array('Javascript', get_field('extra-code'))) : ?>
    <?php the_field('extra-code-javascript'); ?>
<?php endif; ?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri() . '/js/matchMedia.js'; ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/html5shiv.min.js'; ?>"></script>
<script src="/wp-content/themes/bytbil-classic/js/respond.min.js"></script>
<![endif]-->

</head>
<body <?php body_class(); ?>>

<div class="dimmer cookie-display" style="z-index: 999;"></div>

<div id="cookie-notice" class="cookie-display">
    Denna sajt använder cookies som lagrar viss information för att förbättra användarens besök, såsom bevakade lagerobjekt och jämförelser. Godkänner du att denna cookie-data sparas på din dator?<br><br>

    <button class="btn btn-default" onclick="acceptCookie();"><i class="fa fa-thumbs-up" style="color: #009900;"></i>&nbsp; Ok, jag godkänner</button>
</div>

<div class="wrap" id="header">
    <div class="wrap-inner wide" id="header-default">

        <div class="header-upper hidden-sm hidden-xs">
            <div class="row" style="display: inline-block; width: 101.8%;">
                <div class="col-md-6 col-xs-8 logo">
                    <a href="<?php bloginfo('url');?>">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); echo ' | '; bloginfo('description'); ?>" />
                    </a>
                </div>

                <div class="col-md-6 col-xs-4 col-xs-4" style="margin-bottom: 10px;">
                    <?php get_search_form(); ?>
                </div>
                <div class="col-md-6 col-xs-4 col-xs-4">
                    <button class="btn btn-default btn-block dropdown-toggle pull-right" style="width: 250px;" type="button" id="dropdownMenu1" data-toggle="dropdown">
                        Öppettider/kontakt
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1" id="facilities_dropdown">
                    </ul>

                    <div style="display: none;">
                        <?php /* Initiera menyn för anläggningar */
                        $facilities_menu = new wp_bootstrap_navwalker();

                        $facilities_menu_string = wp_nav_menu( array(
                                'menu' => 'Anläggningar',
                                'echo' => false,
                                'depth' => 1,
                                'container' => false,
                                'menu_class' => 'footer-menu',
                                'walker' => $facilities_menu
                            )
                        );

                        echo $facilities_menu_string;
                        ?>
                    </div>

                    <script>
                        jQuery(function() {
                            jQuery('#menu-anlaggningar').find('li').each(function() {
                                jQuery('#facilities_dropdown').append('<li role="presentation"><a role="menuitem" tabindex="-1" href="' + jQuery(this).find('a').attr('href') + '">' + jQuery(this).find('a').text() + '</a></li>');
                            });
                        });
                    </script>
                </div>
            </div>
        </div>

        <div id="menu" class="menu">
            <?php /* Initiera huvudmenyn */
            $menu = new wp_bootstrap_navwalker();
            /* Ställ så dropdown fungerar för hover */

            if(get_field('sitesetting-menu-settings', $settingspage->ID) && in_array('hover', get_field('sitesetting-menu-settings', $settingspage->ID))) :

                $menu->setHover(true); ?>
                <style>
                    @media (min-width: 768px) {
                        #menu .nav > li:hover > ul.dropdown-menu, #menu .nav > li:active > ul.dropdown-menu {
                            display: block;
                        }
                    }
                </style>
            <?php
            endif;
            $menu_string = wp_nav_menu( array(
                    'menu' => 'Huvudmeny',
                    'echo' => false,
                    'depth' => 3,
                    'container' => false,
                    'menu_class' => 'nav navbar-nav navbar-menu',
                    'walker' => $menu
                )
            );

            echo $menu_string;
            ?>
        </div>

    </div>

    <div id="header-mini" class="wrap-inner wide">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="logo">
                    <a href="<?php bloginfo('url');?>">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/03/landrins_bil_logo_siluett-vit.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); echo ' | '; bloginfo('description'); ?>" />
                    </a>
                </div>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div id="menu-mini" class="menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            Meny
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <?php /* Initiera huvudmenyn */
                        $menu = new wp_bootstrap_navwalker();
                        /* Ställ så dropdown fungerar för hover */

                        if(get_field('sitesetting-menu-settings', $settingspage->ID) && in_array('hover', get_field('sitesetting-menu-settings', $settingspage->ID))) :

                            $menu->setHover(true); ?>
                            <style>
                                @media (min-width: 768px) {
                                    #menu .nav > li:hover > ul.dropdown-menu, #menu .nav > li:active > ul.dropdown-menu {
                                        display: block;
                                    }
                                }
                            </style>
                        <?php
                        endif;
                        $menu_string = wp_nav_menu( array(
                                'menu' => 'Huvudmeny',
                                'echo' => false,
                                'depth' => 3,
                                'container' => false,
                                'menu_class' => 'nav navbar-nav navbar-menu',
                                'walker' => $menu
                            )
                        );

                        echo $menu_string;
                        ?>

                    </div>
                </div>

                <a href="#" id="open-search"><span class="fa fa-search"></span></a>

            </div>
        </div>

        <div id="search-mobile">
            <?php get_search_form(); ?>
        </div>
    </div>

</div>

<div class="slider">
</div>