<?php
get_header();
?>
<?php
    $scroll = false;
?>

<main id="post-<?php the_ID(); ?>" class="">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
    <?php bytbil_content_loop($scroll, true); ?>

    <?php endwhile; endif; ?>

</main>

<?php
get_footer();
?>
