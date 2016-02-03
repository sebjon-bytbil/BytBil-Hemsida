<?php get_header(); ?>

<main>
    <section id="content">
        <div class="wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php block_loop(); ?>
        <?php endwhile; endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>

