<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header('undersida');
?>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.infinitescroll.js"></script>
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
            <div class="midcontent" id="blogposts">
                <div class="nyberg-subpage-maincontent">
                    <div class="nyberg-subpage-content">
                        <h1><?php printf(__('Tag Archives: %s', 'twentythirteen'), single_tag_title('', false)); ?></h1>
                        <?php if (tag_description()) : // Show an optional tag description ?>
                            <div class="archive-meta"><?php echo tag_description(); ?></div>
                        <?php endif; ?>
                        <div id="poster">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'paged' => $paged,
                                'post_type' => 'blogg',
                                'posts_per_page' => 10,
                            );
                            $wp_query = new WP_Query($args);
                            if ($wp_query->have_posts()) : ?>

                            <!-- pagination here -->
                            <!-- the loop -->
                            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>


                                <article class="blog_post_nybergs" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <header>
                                        <?php if (has_post_thumbnail() && !post_password_required()) : ?>
                                            <div class="entry-thumbnail">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (is_single()) : ?>
                                            <h4><?php the_title(); ?></h4>
                                        <?php else : ?>
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"
                                                   rel="bookmark"><?php the_title(); ?></a>
                                            </h4>
                                        <?php endif; // is_single() ?>

                                        <div>
                                            <?php twentythirteen_entry_meta(); ?>
                                            <?php edit_post_link(__('Edit', 'twentythirteen'), '<span class="edit-link">', '</span>'); ?>
                                        </div>
                                        <!-- .entry-meta -->
                                    </header>
                                    <!-- .entry-header -->

                                    <?php if (is_search()) : // Only display Excerpts for Search ?>
                                        <div>
                                            <?php the_excerpt(); ?>
                                        </div><!-- .entry-summary -->
                                    <?php else : ?>
                                        <div>
                                            <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen')); ?>
                                            <?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'twentythirteen') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>

                                    <footer>


                                        <?php if (is_single() && get_the_author_meta('description') && is_multi_author()) : ?>
                                            <?php get_template_part('author-bio'); ?>
                                        <?php endif; ?>
                                    </footer>
                                    <!-- .entry-meta -->
                                </article>
                            <?php endwhile; ?>
                            <!-- end of the loop -->
                            <!-- pagination -->
                        </div>

                        <nav class="next-links">
                            <?php next_posts_link(); ?>
                        </nav>
                    <?php endif; ?>
                        <?php wp_reset_query(); ?>

                    </div>

                    <div class="nyberg-subpage-plugs">
                        <?php $args = array(
                            'taxonomy' => 'categories_for_blog',
                            'class' => 'categories'
                        ); ?>
                        <?php wp_list_categories($args); ?>


                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->
    <script type="text/javascript">

        $('#poster').infinitescroll({
            loading: {
                finished: undefined,
                finishedMsg: "<em>Det finns inga mer poster</em>",
                img: "../../../wp-admin/images/spinner.gif",
                msgText: "",
                msg: null,
                speed: 'fast',
                start: undefined
            },
            navSelector: ".next-links",
            nextSelector: "#next",
            itemSelector: ".blog_post_nybergs"
        });
    </script>
<?php get_footer(); ?>