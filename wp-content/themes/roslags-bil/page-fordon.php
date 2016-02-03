<?php
/*
Template Name: Undersida : Lagerbilar
*/
?>
<?php get_header(); ?>

    <div id="content" class="wrapper">
        <div class="container-fluid page-with-submenu">
            <div class="col-sm-3 hidden-xs">
                <div id="submenu">
                    <?php

                    wp_nav_menu(array(
                        'theme_location' => 'Huvudmeny',
                        'start_in' => $ID_of_page,
                        'container' => false,
                        'items_wrap' => '%3$s'
                    ));

                    ?>
                </div>
                <div id="quicklinks">
                    <?php

                    // check if the repeater field has rows of data
                    if (have_rows('puffar', 8)):

                        // loop through the rows of data
                        while (have_rows('puffar', 8)): the_row(); ?>

                            <div class="col-xs-12">
                                <div class="puff">
                                    <?php
                                    if (get_sub_field('link-type') == 'intern'){ ?>
                                    <a href="<?php the_sub_field('pufflank');?>">
                                        <?php }
                                        if (get_sub_field('link-type') == 'extern'){ ?>
                                        <a target="_blank" href="<?php the_sub_field('pufflank_url'); ?>">
                                            <?php } ?>
                                            <img src="<?php the_sub_field('puffbild'); ?>"/>

                                            <h3><?php the_sub_field('puffrubrik') ?></h3>
                                        </a>
                                </div>
                            </div>

                        <?php endwhile;
                    else :
                        // no rows found
                    endif;
                    ?>
                </div>

            </div>

            <div class="col-sm-9">
                <h1><?php the_title(); ?></h1>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <p><?php the_content(); ?></p>
                <?php endwhile; endif; ?>


            </div>
            <div class="clear"></div>
        </div>
    </div>

<?php get_footer(); ?>