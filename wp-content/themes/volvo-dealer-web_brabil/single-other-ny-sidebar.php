<?php /* Template Name: Tjänster : Ett block Custom Meny*/
get_header();

$ids = get_post_ancestors($post);
the_post();

$sidebarPages = ($post->post_parent == 0) ? get_children(array('post_parent' => $post->ID)) : get_children(array('post_parent' => $post->post_parent));
?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <div class="wrapper">
                <?php /* The loop */ ?>
                <?php //while ( have_posts() ) : the_post();

                if (get_field('bakgrundsbild')) {
                    ?>

                    <script type="text/javascript">

                        $('#background-container').empty();
                        var imageUrl = '<?php echo get_field('bakgrundsbild'); ?>';
                        $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                    </script>

                <?php
                }

                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="left-column black-page">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php echo ($post->post_parent == 0) ? get_the_title($post->ID) : get_the_title($post->post_parent); ?></h1>
                        </header>
                        <!-- .entry-header -->

                        <div class="side-menu-container">
                            <ul class="side-menu-large">
                                <ul>
                                    <?php foreach ($sidebarPages as $page) : ?>
                                        <li>
                                            <a href="<?php echo get_the_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </ul>
                        </div>
                    </div>
                    <div class="right-column block-page" style="text-align: left;">
                        <div class="single-block">
                            <div class="page-content-banner" style="position: relative;">
                                <?php if (get_field('bild')) {
                                    ?>
                                    <img src="<?php the_field('bild'); ?>"/>
                                <?php
                                }
                                if (get_field('bannertext')) {
                                    ?>
                                    <span class="page-content-banner-text"><?php the_field('bannertext'); ?></span>

                                <?php
                                }
                                if (get_field('bannerknapp_url')) {
                                    $span_class = '';
                                    $a_class = '';
                                    if (get_field('open_in_lightbox')) {
                                        $span_class = ' open_in_lightbox';
                                        $a_class = ' lytebox';
                                    }
                                    ?>
                                    <span class="page-content-banner-button<?php echo $span_class; ?>"><a
                                            class="<?php echo $a_class; ?>"
                                            href="<?php the_field('bannerknapp_url'); ?>"><?php the_field('bannerknapp_text'); ?></a></span>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="inner-wrap">
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- .entry-content -->

                </article>
                <!-- #post -->

            </div>

        </div>
        <!-- #content -->
    </div><!-- #primary -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>