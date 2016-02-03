<?php
get_header();
$dir = get_template_directory_uri();
?>

    <main>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="side-padding">
                <div class="wrapper wrapper-narrow">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; endif; ?>

    </main>

<?php get_footer(); ?>
