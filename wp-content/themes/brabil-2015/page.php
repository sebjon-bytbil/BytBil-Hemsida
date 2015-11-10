<?php get_header(); ?>

    <main>
        <section>
            <div class="container-fluid wrapper align-center">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <!-- post -->
                <?php the_content(); ?>
                <?php endwhile; ?>
                <!-- post navigation -->
                <?php else: ?>
                <!-- no posts found -->
                <?php endif; ?>
        </section>
    </main>

    <?php get_footer(); ?>