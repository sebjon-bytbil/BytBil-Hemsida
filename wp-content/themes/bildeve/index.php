<?php
    get_header();
    $dir = get_template_directory_uri();
?>

    <main>

        <div class="side-padding">
            <div class="wrapper wrapper-narrow">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <!--<h1><?php the_title(); ?></h1>-->

                    Här hamnar alla block.

                    <?php //bytbil_block_loop(); ?>

                <?php endwhile; endif; ?>

            </div>
        </div>

    </main>

<?php get_footer(); ?>