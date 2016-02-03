<?php
/*
Template Name: Empty Page
 */
get_header('clean');
?>


<?php
    $model_brand = wp_get_post_terms(get_the_ID(), 'brand');
    $brand_slug = "";
    if (isset($model_brand[0])) {
    	$brand = $model_brand[0]->name;
    	$brand_slug = $model_brand[0]->slug;
    }
    $scroll = get_field('page-settings-menu');
?>

<main id="post-<?php the_ID(); ?>" class="<?php echo $brand_slug ?>">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
    <?php bytbil_content_loop($scroll, true); ?>

    <?php endwhile; endif; ?>

</main>


<?php get_footer('clean'); ?>
