<!DOCTYPE html>
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
    <title><?php bloginfo('name'); ?> <?php wp_title('|', true, 'right'); ?></title>

    <?php wp_head(); ?>

    <link href="/wp-content/themes/mercedes-benz/css/bootstrap.min.css" rel="stylesheet">
    <link href="/wp-content/themes/mercedes-benz/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/wp-content/themes/mercedes-benz/css/flexslider.css" rel="stylesheet">

    <link href="/wp-content/themes/mercedes-benz/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/wp-content/themes/mercedes-benz/js/ie8-shiv/html5shiv.js"></script>
    <script src="/wp-content/themes/mercedes-benz/js/ie8-shiv/matchMedia.js"></script>
    <script src="/wp-content/themes/mercedes-benz/js/ie8-shiv/respond.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap-tabcollapse.js"></script>

</head>
<body class="<?php echo str_replace('.php', '', basename(get_page_template())); ?>">
<div class="wrapper">
    <header>
        <div class="container-fluid no-padding">
            <div class="hidden-xs col-sm-9 col-md-3">
                <a href="//mercedes-benz.se" target="_blank" title="<?php echo bloginfo('description'); ?>">
                    <?php $mb_logotype = get_master_field('settings_logotype', 'options'); ?>
                    <img src="<?php echo $mb_logotype['url'] ?>" class="mb-logotype-n" alt="Mercedes-Benz"
                         title="Mercedes-Benz">
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 pull-right">
                <?php
                get_af_logotype(true);
                ?>
            </div>
            <div id="menu-container" class="col-xs-12 col-md-6">
                <?php get_main_menu(get_the_ID()); ?>
            </div>
        </div>

    </header>
    <?php if (!is_front_page()){ ?>
    <div class="container-fluid no-padding">
        <div class="col-xs-12">

            <div class="breadcrumbs">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            </div>
        </div>
    </div>
<?php } ?>