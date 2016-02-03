<?php
get_header();
?>
<?php
    $model_brand = wp_get_post_terms(get_the_ID(), 'brand');
    $brand = $model_brand[0]->name;
    $brand_slug = $model_brand[0]->slug;
?>

<main id="post-<?php the_ID(); ?>" class="<?php echo $brand_slug ?>">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php bytbil_content_loop(false, true); ?>

    <?php endwhile; endif; ?>

</main>

<?php
get_footer();
?>
