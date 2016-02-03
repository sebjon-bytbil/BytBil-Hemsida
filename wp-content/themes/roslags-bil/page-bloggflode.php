<?php
/*
Template Name: Bloggflöde
*/
?>

<?php get_header(); ?>

    <div id="intro-texts" style="margin-top: 15px;">
        <div class="wrapper">
            <div class="container-fluid blogg">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                ?>
                <?php query_posts(array('posts_per_page' => 3, 'post_type' => 'blogg', 'paged' => $paged)); ?>
                <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                        <div class="col-xs-12 col-sm-9">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <h3 class="date"><?php the_time('Y-m-d') ?></h3>
                        </div>
                        <div class="col-xs-12">
                            <?php the_excerpt(); ?>
                            <p class="permalink"><a href="<?php the_permalink(); ?>">Läs mer</a></p>
                        </div>

                    <?php endwhile; ?>
                    <div class="col-xs-12 align-center">
                        <?php posts_nav_link(); ?>
                    </div>

                <?php else : ?>
                <?php endif;
                wp_reset_query(); ?>


            </div>
        </div>
        <div class="clear"></div>

    </div>

<?php get_footer(); ?>