<?php /* Template Name: Sida : Högerställt innehåll */
get_header(); ?>
<h1 id="HeaderMain"><?php the_field('dolh1a'); ?></h1>
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <div class="wrapper">

            <?php /* The loop */ ?>
            <?php while (have_posts()) :
            the_post();

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
                <div class="left-column">

                    <header class="entry-header">
                        <h2 class="entry-title"><?php the_title(); ?></h2>
                    </header>
                    <!-- .entry-header -->

                    <div class="side-menu-container">
                        <?php
                        echo volvo_get_custom_menu('Huvudmeny', 'side-menu-large', 2);
                        ?>
                    </div>

                </div>

                <div class="right-column normal-page" style="text-align: left; float: right;">
                    <div style="text-align: right;">
                        <?php the_content(); ?>
                    </div>
                    <div class="clear"></div>

                </div>
                <!-- .entry-content -->

            </article>
            <!-- #post -->

        </div>
        <?php endwhile; ?>

    </div>
    <!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
