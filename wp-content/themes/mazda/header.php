<?php header("Access-Control-Allow-Origin: http://access.bytbil.com"); ?>

<!DOCTYPE html>

<html lang="en" <?php if (is_user_logged_in()) {
    echo 'class="push-down-admin-menu"';
} ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">

    <meta property="og:title" content="Facebook Open Graph Meta-tags"/>
    <meta property="og:image" content="./img/icons/apple-touch-icon-152x152.png"/>
    <meta property="og:site_name" content="Title for Facebook"/>
    <meta property="og:description" content="Facebook's Open Graph protocol allows for web developers to turn their websites into Facebook 'graph' objects, allowing a certain level of customization over how information is carried over from a non-Facebook website to Facebook when a page is 'recommended', 'liked', or just generally shared."/>

<?php if(get_field("pagesettings-meta-description")): ?>
    <meta name="description" content="<?php the_field('pagesettings-meta-description'); ?>"/>
<?php elseif(get_field('sitesettings-meta-description', 'options')): ?>
    <meta name="description" content="<?php the_field('sitesettings-meta-description', 'options'); ?>"/>
<?php endif; ?>
<?php if(get_field("pagesettings-meta-keywords")): ?>
    <meta name="keywords" content="<?php the_field('pagesettings-meta-keywords'); ?>"/>
<?php elseif(get_field('sitesettings-meta-keywords', 'options')): ?>
    <meta name="keywords" content="<?php the_field('sitesettings-meta-keywords', 'options'); ?>"/>
<?php endif; ?>
<?php if(get_field("pagesettings-title-tag")): ?>
    <title><?php the_field("pagesettings-title-tag")?></title>
<?php elseif (!get_field('sitesettings-seo-meta', 'options')) : ?>
    <title><?php bloginfo('name'); ?> : <?php wp_title('|', true, 'right'); ?></title>
<?php else : ?>
    <title><?php wp_title('|', true, "right"); ?> <?php the_field('sitesettings-title-tag', 'options'); ?></title>
<?php endif; ?>

    <!-- Shortcut Icons -->
    <link rel="shortcut icon" href="">
    <link rel="icon" type="image/x-icon" href="./img/icons/favicon.ico" />
    <link rel="icon" type="image/png" href="./img/icons/favicon.png" />
    <link rel="icon" type="image/gif" href="./img/icons/favicon.gif" />

    <!-- Touch Icons -->
    <link href="#" rel="apple-touch-icon" />
    <link href="./img/icons/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
    <link href="./img/icons/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
    <link href="./img/icons/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />

    <!-- Iconlibraries -->
    <link href="<?php echo get_template_directory_uri(); ?>/fonts/entypo.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/fonts/fontawesome.css" rel="stylesheet">

    <!-- Webfonts -->


    <?php wp_head(); ?>

    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Normalize -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/normalize.css" rel="stylesheet">

    <!-- Flexslider -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" rel="stylesheet">

    <!-- Bootstrap Select -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/extra/bootstrap-select.min.css" rel="stylesheet">

    <!-- Jasny Bootstrap (Off Canvas Menu) -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/extra/jasny-bootstrap.min.css" rel="stylesheet">

    <!-- Alertify -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/extra/alertify.core.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/extra/alertify.bootstrap.css" rel="stylesheet">

    <!-- Featherweight Lightbox -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/extra/featherlight.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/extra/featherlight.gallery.min.css" rel="stylesheet">

    <!-- Main -->
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/mazda.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63700523-1', 'auto');
  ga('send', 'pageview');

  </script>

</head>


<?php
    if (!$body_class = get_field('body-class')) {
        $body_class = 'isDesktop';
    }
?>


<body <?php body_class($body_class); ?>>

<header>

    <?php get_main_menu(get_the_ID()); ?>

</header>
