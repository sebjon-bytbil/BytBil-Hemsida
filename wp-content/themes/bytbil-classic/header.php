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

<!--[if lt IE 8]>
<html class="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]>
<html class="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]>
<html class="ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]>
<html <?php language_attributes(); ?>><![endif]-->
<!--[if !IE]>
<html <?php language_attributes(); ?>><![endif]-->

<html <?php if (is_user_logged_in()) {
    echo 'class="push-down-admin-menu"';
} ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
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
<body <?php body_class(); ?>  <?php if (get_field('background', $frontpageID)) { ?> style="background: transparent fixed url(<?php the_field('background', $frontpageID); ?>); background-attachment: fixed; background-size: cover;" <?php } ?>>

<div class="wrapper">

    <header>
        <div id="top-menu" class="pull-right">
            <?php
            if (get_field('sitesetting-header-shortlinks', $settingspage->ID)) {
                $i = 1;
                while (has_sub_fields('sitesetting-header-shortlinks', $settingspage->ID)) {
                    $type = get_sub_field('sitesetting-header-shortlink-type');
                    $icon = get_sub_field('sitesetting-header-shortlink-icon');
                    $text = get_sub_field('sitesetting-header-shortlink-text');
                    $target = get_sub_field('sitesetting-header-shortlink-target');

                    if ($type == 'phone') {
                        $url = 'tel:' . get_sub_field('sitesetting-header-shortlink-phone');
                    } elseif ($type == 'external') {
                        $url = get_sub_field('sitesetting-header-shortlink-url');
                    } elseif ($type == 'internal') {
                        $url = get_sub_field('sitesetting-header-shortlink-page');
                    } elseif ($type == 'email') {
                        $url = 'mailto:' . get_sub_field('sitesetting-header-shortlink-email');
                    }

                    if (get_sub_field('sitesetting-header-shortlink-apperence')) {
                        $bg_color = get_sub_field('sitesetting-header-shortlink-bgcolor');
                        $bg_color_hover = get_sub_field('sitesetting-header-shortlink-bgcolor-hover');
                        $text_color = get_sub_field('sitesetting-header-shortlink-color');
                        $text_color_hover = get_sub_field('sitesetting-header-shortlink-color-hover');
                    }
                    ?>

                    <a id="link<?php echo $i;?>" href="<?php echo $url; ?>" class="top-menu-link"><i
                            class="fa <?php echo $icon; ?>"></i> <?php echo $text; ?></a>
                    <?php echo '<style>a#link' . $i . '.top-menu-link{background: ' . $bg_color . '; color:' . $text_color . ';} a#link' . $i . '.top-menu-link:hover{background:' . $bg_color_hover . '; color:' . $text_color_hover . ';</style>'; ?>
                    <?php $i++; ?>
                <?php }
            }

            ?>
        </div>
        <?php
        // Header column widths
        $cols = get_field("sitesetting-header-columns", $settingspage->ID);
        if (!$cols) {
            $cols = 6;
        }
        $brandcols = 12 - $cols;
        if ($brandcols == 0) {
            $brandcols = 12;
        }
        ?>
        <div class="container-fluid" id="top">
            <div class="col-xs-12 col-sm-<?php echo $cols; ?>">
                <a href="<?php bloginfo('url'); ?>" class="logotype">
                    <img src="<?php echo get_field('sitesetting-logotype', $settingspage->ID); ?>"
                         alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name');
                    echo ' | ';
                    bloginfo('description'); ?>">
                </a>
            </div>
            <div class="col-xs-12 col-sm-<?php echo $brandcols; ?> hidden-xs">
                <?php
                bytbil_brands();
                ?>
            </div>
        </div>
        <nav id="menu">
            <div class="container-fluid">
                <div class="navbar-header" data-toggle="collapse" data-target="#navbar-collapse">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-fw fa-lg"></i>
                    </button>
                    <span class="navbar-brand visible-xs">Meny</span>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <?php /* Initiera huvudmenyn */
                    $menu = new wp_bootstrap_navwalker();
                    /* Ställ så dropdown fungerar för hover */

                    if (get_field('sitesetting-menu-settings', $settingspage->ID) && in_array('hover', get_field('sitesetting-menu-settings', $settingspage->ID))) :

                        $menu->setHover(true);
                        ?>
                        <style>
                            @media (min-width: 768px) {
                                #menu .nav > li:hover > ul.dropdown-menu, #menu .nav > li:active > ul.dropdown-menu {
                                    display: block;
                                }
                            }
                        </style>
                    <?php
                    endif;

                    $hover = $menu->getHover() ? "hover" : "click";

                    $menu_string = wp_nav_menu(array(
                            'menu' => 'Huvudmeny',
                            'echo' => false,
                            'depth' => 3,
                            'container' => false,
                            'menu_class' => 'nav navbar-nav navbar-menu ' . $hover,
                            'walker' => $menu
                        )
                    );

                    echo $menu_string;
                    ?>

                </div>
            </div>
        </nav>
        <div class="clear"></div>
    </header>
    <div class="container-fluid">
        <div class="col-xs-12">
            <?php
            if (!is_page($frontpageID)) : ?>
                <div class="breadcrumbs">
                    <?php echo bbcms_breadcrumbs($post, array("show_sitename" => true)); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
