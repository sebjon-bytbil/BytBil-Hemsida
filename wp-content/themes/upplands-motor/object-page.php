<?php
/*
Template Name: Objektsida
*/

get_header('clean');
?>
<link href="<?php echo get_template_directory_uri(); ?>/css/elasticaccess-style.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/finance.css"/>
<link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel2.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/owl.theme2.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.custom.css" rel="stylesheet">

<main id="post-<?php the_ID(); ?>">
	
    <script src="<?php echo get_template_directory_uri(); ?>/js/ElasticAccess.js"></script>
    <div ng-app="ElasticAccess">
    <input type="hidden" id="formData" value="<?php echo AccessInterestMailApi::AngularVars() ?>">
        <div ng-include="'templates/SingleObject.html'">

        </div>
    </div>

    <?php
    if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php bytbil_content_loop(false, false); ?>

    <?php endwhile; endif; ?>

</main>

<?php
get_footer('clean');
?>
