<?php header("Access-Control-Allow-Origin: http://access.bytbil.com"); ?>
<!DOCTYPE html>
<?php ob_start();
$dir = get_template_directory_uri();

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

    <meta name="description" content="<?php echo get_bloginfo('description'); ?>" />

    <link rel="favicon" href="<?php echo $dir; ?>/favicon.ico" />
    <!-- Shortcut Icons -->
    <link rel="shortcut icon" href="<?php echo $dir; ?>/favicon.ico">
    <link rel="icon" type="image/x-icon" href="" />
    <link rel="icon" type="image/png" href="<?php echo $dir; ?>/favicon.ico"/>
    <link rel="icon" type="image/gif" href="" />
    
    <title>
        <?php bloginfo( 'name'); ?> |
        <?php wp_title( '|', true, 'right'); ?>
        <?php bloginfo( 'description'); ?>
    </title>
    
    <?php wp_head(); ?>

  

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Normalize -->
    <link href="/wp-content/themes/bildeve/css/normalize.css" rel="stylesheet">

    <!-- Main -->
    <link href="/wp-content/themes/bildeve/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $dir; ?>/js/matchMedia.js"></script>
    <script src="<?php echo $dir; ?>/js/html5shiv.min.js"></script>
    <script src="<?php echo $dir; ?>/js/respond.min.js"></script>
    <![endif]-->


</head>

<?php
$logotype = get_field('settings-logotype','options');
$brands = get_field('settings-brands','options');

?>
    
<body <?php body_class( $class ); ?> style="<?php echo $background_style; ?>">

<div class="wrapper-all">

    <header id="header-full" class="box">
        <div class="wrapper">
            <div class="container-fluid">
            
            
            <nav class="navbar navbar-default" role="navigation">
                <div class="logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <img class="logotype" src="<?php echo $logotype['url']; ?>" alt="<?php bloginfo( 'name'); ?> | <?php bloginfo( 'description'); ?>" title="<?php bloginfo( 'name'); ?> | - <?php bloginfo( 'description'); ?>">
                    </a>
                </div>
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bildeve-navbar-collapse-1">
                        <span class="sr-only">Visa eller dölj menyn</span>
                        <span>Menyval</span>
                    </button>
                </div>
                <?php
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 3,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse no-side-padding',
                        'container_id'      => 'bildeve-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav no-side-margin',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>
                <div id="header-second">

                    <?php get_brands(); ?>

                    <?php
                        foreach($brands as $brand){
                            ?>
                            <a href="<?php echo $brand['brands-link']; ?>" class="brand" target="<?php echo $brand['brands-target']; ?>"><img src="<?php echo $brand['brands-logotyp']['url']; ?>" alt="<?php echo $brand['brands-logotyp']['alt']; ?>" title="<?php echo $brand['brands-logotyp']['title']; ?>"></a>
                            <?php
                        }

                    ?>

                </div>
            </nav>

            

            <div class="clear"></div>
        </div>

        </div>
    </header>
