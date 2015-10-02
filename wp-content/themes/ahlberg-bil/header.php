<!DOCTYPE html>
<html lang="en" <?php if (is_user_logged_in()) { echo 'class="push-down-admin-menu"'; } ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta property="og:title" content="<?php bloginfo('name'); ?> | <?php wp_title('|', true, 'right'); ?> <?php bloginfo('description'); ?>" />
    <meta property="og:image" content="./img/icons/apple-touch-icon-152x152.png" />
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta property="og:description" content="" />

    <title>
        <?php bloginfo( 'name'); ?> |
        <?php wp_title( '|', true, 'right'); ?>
        <?php bloginfo( 'description'); ?>
    </title>

    <?php wp_head(); ?>

    <link rel="icon" type="image/x-icon" href="" />
    <link rel="favicon" href="" />

    <!-- Shortcut Icons -->
    <link rel="shortcut icon" href="">
    <link rel="icon" type="image/x-icon" href="" />
    <link rel="icon" type="image/png" href="" />
    <link rel="icon" type="image/gif" href="" />

    <!-- Touch Icons -->
    <link href="#" rel="apple-touch-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="">
    <link rel="apple-touch-icon-precomposed" sizes="180x180" href="">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Bootstrap -->
    <link href="/wp-content/themes/ahlberg-bil/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="/wp-content/themes/ahlberg-bil/css/bootstrap-theme.min.css" rel="stylesheet">-->
    <link href="/wp-content/themes/ahlberg-bil/css/flexslider.css" rel="stylesheet">

    <!-- Normalize -->
    <link href="/wp-content/themes/ahlberg-bil/css/normalize.css" rel="stylesheet">

    <!-- Main -->
    <link href="/wp-content/themes/ahlberg-bil/style.css" rel="stylesheet">

</head>

<?php

$logotype = get_field('settings-logotype','options');

$settings_background = get_field('settings-background','options');
if($settings_background=='color'){
    $background_style = 'background: ' . get_field('settings-background-color','options');
}
else if($settings_background=='image'){
    $background_image = get_field('settings-background-image','options');
    $background_style = 'background: url(' . $background_image['url'] . ') no-repeat center center fixed;';
}
else {
    $background_style = '';
}

$brands = get_field('settings-brands','options');

?>
    
<body <?php body_class( $class ); ?> style="<?php echo $background_style; ?>">
    <header>
        
            <div class="container-fluid wrapper no-side-padding">
                <div class="top-header">
                    <a href="/">
                        <img class="logotype" src="<?php echo $logotype['url']; ?>" alt="Ahlberg Bil - Med fokus på dig" title="Ahlberg Bil - Med fokus på dig">
                    </a>
                    <div class="brands">
                        <?php
                            foreach($brands as $brand){
                                ?>
                                <a href="<?php echo $brand['brands-link']; ?>" target="<?php echo $brand['brands-target']; ?>"><img src="<?php echo $brand['brands-logotyp']['url']; ?>" alt="<?php echo $brand['brands-logotyp']['alt']; ?>" title="<?php echo $brand['brands-logotyp']['title']; ?>"></a>
                                <?php
                            }
                
                        ?>
                        <a href="<?php echo get_field('settings-facebookpage', 'options'); ?>" target="_blank" class="btn navbar-button btn-default btn-blue big"><i class="fa fa-facebook"></i> Facebook</a>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ahlberg-navbar-collapse-1">
                            <span class="sr-only">Visa eller dölj menyn</span>
                            <span>Menyval</span>
                        </button>
                        <a class="navbar-brand visible-xs" href="<?php echo home_url(); ?>">
                        <i class="fa fa-home"></i>
                        </a>
                    </div>
                    <?php
                        wp_nav_menu( array(
                            'menu'              => 'primary',
                            'theme_location'    => 'primary',
                            'depth'             => 3,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse no-side-padding',
                            'container_id'      => 'ahlberg-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav no-side-margin',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>
                </nav>
            </div>
        
    </header>