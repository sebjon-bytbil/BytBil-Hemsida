<?php
/*
Template Name: Biva Lightbox
*/
?>

<?php
$dir = get_template_directory_uri();
?>

<!DOCTYPE html>
<html>
<head>
    <?php wp_head(); ?>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9"/>
    <meta name="viewport" content="width=device-width">
    <meta name="google-site-verification" content="n87oaD8g-0_vdhE89423Y8u33NEdqJ73vCSfC_1Ir9Q"/>

    <title>
        <?php
        global $page, $paged;
        wp_title('|', true, 'right');

        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";
        ?>
    </title>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $dir; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lte IE 8]>
    <link href="<?php echo $dir; ?>/css/bootstrap-ie7.css" rel="stylesheet">
    <link href="<?php echo $dir; ?>/css/ie7-fix.css" rel="stylesheet">
    <![endif]-->

    <link href="<?php echo $dir; ?>/style.css" rel="stylesheet">
    <link href="<?php echo $dir; ?>/css/flexslider.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo $dir; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $dir; ?>/js/custom.js"></script>
    <script src="<?php echo $dir; ?>/js/jquery.flexslider-min.js"></script>
    <script src="<?php echo $dir; ?>/js/jquery.colorbox-min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>

    <!--[if lte IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->

    <!--[if lte IE 8]>
    <link href="<?php echo $dir; ?>/css/bootstrap-ie7.css" rel="stylesheet">
    <link href="<?php echo $dir; ?>/fonts/antenna/stylesheet.css" rel="stylesheet">
    <![endif]-->

    <link rel="apple-touch-icon" href="<?php echo $dir; ?>/img/touch-icon-small.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $dir; ?>/img/touch-icon-big.png"/>

    <style type="text/css">
        body, html {
            background-color: #fff !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>

</head>
<body
    id="<?php echo get_bloginfo('title'); ?>" <?php if ((!is_home() || !is_front_page())) echo 'class="page id-' . get_the_ID() . '"'; ?>>

    <?php while (have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>

    <p><?php the_content(); ?></p>
    <?php endwhile; ?>

</body>
</html>