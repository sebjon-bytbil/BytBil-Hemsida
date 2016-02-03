<?php
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
                <div class="nyberg-subpage-ingress">
                    <img src="<?php the_field('bild'); ?>" alt=""/>

                    <div class="nyberg-ingress-text">
                        <h4><?php the_title(); ?></h4>
                        <?php the_field('ingress'); ?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="nyberg-subpage-maincontent">
                    <div class="nyberg-subpage-content">
                        <h4><?php the_field('brodtext_rubrik'); ?></h4>
                        <?php the_field('brodtext'); ?>
                    </div>
                    <div class="nyberg-subpage-plugs">
                        <?php the_field('sidokolumn'); ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->
<?php get_footer(); ?>