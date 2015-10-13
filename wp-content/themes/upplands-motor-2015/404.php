<?php

get_header();

?>

    <?php /* If there are no posts to display, such as an empty archive page */ ?>
    <?php if (!have_posts()) : ?>

        <?php
        $page_404 = get_field('404-page','options');
        $page_id = $page_404->ID;

        ?>
        <?php
        global $post;
        $post = get_post($page_id);
        setup_postdata($page_404);

        $model_brand = wp_get_post_terms(get_the_ID(), 'brand');
        $brand = $model_brand[0]->name;
        $brand_slug = $model_brand[0]->slug;

        $scroll = get_field('page-settings-menu');
        ?>

        <main id="post-<?php the_ID(); ?>" class="<?php echo $brand_slug ?>">

            <?php bytbil_content_loop($scroll, true); ?>

        </main>
        
        <?php
        wp_reset_postdata();
        ?>
        
    <?php endif; ?>

    <?php while (have_posts()) : the_post(); ?>

        <div class="post">
        </div><!-- post -->

    <?php endwhile; ?>
    


<?php get_footer(); ?>
