<?php header('Access-Control-Allow-Origin: http://access.bytbil.com'); ?>

<!DOCTYPE html>
<html lang="en" <?php if (is_user_logged_in()) {
    echo 'class="push-down-admin-menu"';
    } ?>>
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta property="og:title" content="Facebook Open Graph Meta-tags" />
    <meta property="og:image" content="/public/images/icons/apple-touch-icon-152x152.png" />
    <meta property="og:site_name" content="Title for Facebook" />
    <meta property="og:description" content="Facebook's Open Graph protocol allows for web developers to turn their websites into Facebook 'graph' objects, allowing a certain level of customization over how information is carried over from a non-Facebook website to Facebook when a page is 'recommended', 'liked', or just generally shared." />
    
        <!--                -->
        <!--- Add SEO Meta --->
        <!--                -->
    
    <title>
        <?php bloginfo( 'name'); ?> |
        <?php wp_title( '|', true, 'right'); ?>
        <?php bloginfo( 'description'); ?>
    </title>

    <?php wp_head(); ?>

    <!-- Shortcut Icons -->
    <!--[if IE]><link rel="shortcut icon" href="/public/images/icons/favicon.ico"><![endif]-->
    <link rel="icon" type="image/x-icon" href="/public/images/icons/favicon.ico" />

    <!-- Touch Icons -->
    <link href="#" rel="apple-touch-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/public/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/public/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/public/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/public/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/public/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/public/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/public/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/public/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="180x180" href="/public/images/icons/apple-touch-icon-152x152.png">

    <link href="<?php echo get_stylesheet_directory_uri(); ?>/public/css/style.min.css" rel="stylesheet">

    <!-- Modernizer -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/public/js/modernizr.custom.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body <?php body_class(); ?>>
<!-- Body start -->
<?php //include( "templateparts/menu.php"); ?>