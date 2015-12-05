<?php
get_header();
$dir = get_template_directory_uri();
?>

    <main>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="wrapper">
            <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>

    </main>

<?php get_footer(); ?>