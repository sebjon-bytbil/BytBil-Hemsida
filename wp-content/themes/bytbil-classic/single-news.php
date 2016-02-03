<?php get_header(); ?>

    <div class="container-fluid">
        <div class="col-xs-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <h1><?php the_title(); ?></h1>
                <?php if (get_post_type(get_the_ID() == 'nyheter')) { ?>
                    <span class="date"><?php echo get_the_date('Y-m-d'); ?></span>
                <?php } ?>
                <?php the_content(); ?>

            <?php endwhile;
            else: ?>

            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>