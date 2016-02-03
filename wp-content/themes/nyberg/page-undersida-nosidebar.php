<?php
/*
    Template Name: Undersida utan sidebar
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
                    <div class="nyberg-subpage-content nyberg-subpage-content-full">
                        <?php if (get_field('dolj_rubriker') != true) : ?>
                            <h1><?php if (get_field('alternativ_rubrik')) {
                                    the_field('alternativ_rubrik');
                                } else {
                                    the_title();
                                } ?></h1>
                        <?php endif; ?>
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
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->
<?php get_footer(); ?>