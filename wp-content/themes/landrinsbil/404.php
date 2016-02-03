<?php

get_header();

?>

    <div id="breadcrumbs-wrapper" class="wrap">
        <div class="wrap-inner">
            <div class="breadcrumbs">

            </div>
        </div>
    </div>

    <div id="middle" class="wrap">

        <div class="wrap-inner <?php echo !is_page($frontpageID) ? " content padding" : "margin"; ?>">

            <div class="row">

                <div class="col-md-12 col-sm-12" id="page-content">

                    <?php /* If there are no posts to display, such as an empty archive page */ ?>
                    <?php if (!have_posts()) : ?>
                        <h1>Hoppsan...</h1>
                        <strong>Vi ber om ursäkt!</strong><br/> Sidan du försökte besöka kan inte hittas - den kan ha tagits bort eller så kan adressen vara fel.<br><br>
                        <a href="<?php echo get_home_url(); ?>">Till startsidan</a>.
                    <?php endif; ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="post">
                            <h1><?php the_title(); ?> <span
                                    class="date pull-right"><?php echo get_the_date('Y-m-d'); ?></span></h1>
                            <?php if (is_archive() || is_search()) : // Only display excerpts for archives and search. ?>
                                <?php the_excerpt(); ?>
                            <?php else : ?>
                                <?php the_content('Read More'); ?>
                            <?php endif; ?>
                        </div><!-- post -->

                    <?php endwhile; ?>

                </div>

            </div>
        </div>

    </div>

<?php get_footer(); ?>