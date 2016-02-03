<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header('undersida'); ?>

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
                    <div class="nyberg-subpage-content" id="results">


                        <?php if (have_posts()) : ?>

                            <header>
                                <h2><?php printf(__('Sökresultat för: %s', 'twentythirteen'), get_search_query()); ?></h2>
                            </header>

                            <?php /* The loop */ ?>



                            <?php while (have_posts()) : the_post(); ?>

                                <div class="search-result-post">
                                    <?php get_template_part('content', get_post_format());
                                    nyberg_puffar('first');
                                    ?>
                                </div>
                            <?php
                            endwhile; ?>

                            <?php twentythirteen_paging_nav(); ?>

                        <?php else : ?>
                            <?php get_template_part('content', 'none'); ?>
                            <?php if (function_exists('relevanssi_didyoumean')) {
                                relevanssi_didyoumean(get_search_query(), "<p>Menade du: ", "</p>", 5);
                            } ?>
                        <?php endif; ?>
                    </div>
                    <div class="nyberg-subpage-plugs">
                        <!--<?php the_field('sidokolumn'); ?>-->
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- #content -->
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>