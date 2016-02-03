<?php
/*
Template Name: Startsida
*/
?>
<?php get_header(); ?>

<div id="intro-texts" style="margin-top: 15px;">
    <div class="wrapper">
        <div class="container-fluid blogg">
            <div class="col-xs-12">
                <a href="../../../../">&laquo; Tillbaka</a>
            </div>
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <div class="col-xs-12 col-sm-9">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <h3 class="date"><?php the_time('Y-m-d') ?></h3>
                </div>
                <div class="clear"></div>
                <div class="col-xs-12">
                    <?php the_content(); ?>
                </div>

            <?php endwhile; ?>
                <div class="col-xs-12">
                    <div class="nav-links"><?php posts_nav_link(); ?></div>
                </div>


            <?php endif;
            wp_reset_query(); ?>


        </div>
    </div>
    <div class="clear"></div>
</div>
</div>

<?php get_footer(); ?>



<?php

if (is_singular('blogg')) { ?>

    <script>
        $(document).ready(function () {
            $('.menu-item-175').addClass('current_page_item');
        });
    </script>

<?php } ?>


