<?php
/**
 * The template for displaying all single posts
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
                    <div class="nyberg-subpage-content">
                        <article class="blog_post_nybergs" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header>

                                <?php if (has_post_thumbnail() && !post_password_required()) : ?>
                                    <div>
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (is_single()) : ?>
                                    <h4><?php the_title(); ?></h4>
                                <?php else : ?>
                                    <h4>
                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                    </h4>
                                <?php endif; // is_single() ?>


                                <div class="info-row-article">
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
                                <div><?php
                                    if (have_posts()) {
                                        while (have_posts()) {
                                            the_post();
                                            the_content();
                                        } // end while
                                    } // end if
                                    ?>
                                </div><!-- .entry-content -->
                            <?php endif; ?>
                            <footer>

                                <?php if (is_single() && get_the_author_meta('description') && is_multi_author()) : ?>
                                    <?php get_template_part('author-bio'); ?>
                                <?php endif; ?>
                            </footer>
                            <!-- .entry-meta -->
                        </article>
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
    <script type="text/javascript">
        <?php global $post; ?>
        $(document).ready(function () {
            var status = "<?php echo $post->comment_status; ?>";
            if (status === "closed") {
                $('#facebookcomments').hide();
            }

        });
        $('.page-content p img').each(function (el) {
            if (this.html()) {
                $('<div class="imgdesc">' + $('page-content img').attr('alt') + '</div>').insertBefore('.page-content img');
            }
        });
    </script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>