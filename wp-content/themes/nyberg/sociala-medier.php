<?php
/*
    Template Name: Sociala Medier
*/
get_header('undersida');
?>
    <div id="primary" class="content-area">
        <div id="content" class="nyberg-site-content" role="main">

            <div class="midcontent">

                <div class="nyberg-middle-bar">
                    <div class="nyberg-breadcrumbs">
                        <?php if (function_exists('bcn_display')) {
                            bcn_display();
                        } ?>
                    </div>
                    <?php echo do_shortcode('[nyberg_social_plugs]'); ?>
                </div>
            </div>
            <div class="midcontent">
                <div class="nyberg-subpage-maincontent">
                    <?php if (get_field('dolj_rubriker') != true) : ?>
                        <h1><?php if (get_field('alternativ_rubrik')) {
                                the_field('alternativ_rubrik');
                            } else {
                                the_title();
                            } ?></h1>
                    <?php endif; ?>
                    <div class="columns">
                        <?php if (get_field('social-block')) {
                            while (has_sub_fields('social-block')) { ?>
                                <div class="column3">
                                    <div class="headertext"><?php the_sub_field('rubrik') ?></div>
                                    <div class="column-content">
                                        <?php the_sub_field('falt') ?>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
                <div class="nyberg-subpage-content">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_content();
                        }
                    }
                    nyberg_puffar();
                    ?>

                </div>

                <div class="clear"></div>
            </div>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->
    <div id="fb-root"></div>
<?php get_footer(); ?>