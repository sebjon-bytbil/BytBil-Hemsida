<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <?php if (has_post_thumbnail() && !post_password_required()) : ?>
            <div class="entry-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>

        <?php if (is_single()) : ?>
            <h3 class="articleheader"><?php the_title(); ?></h3>
        <?php else : ?>
            <h3 class="articleheader">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h3>
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
        <div>
            <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen')); ?>
            <?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'twentythirteen') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
        </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="">

        <?php if (is_single() && get_the_author_meta('description') && is_multi_author()) : ?>
            <?php get_template_part('author-bio'); ?>
        <?php endif; ?>
    </footer>
    <!-- .entry-meta -->
</article><!-- #post -->
