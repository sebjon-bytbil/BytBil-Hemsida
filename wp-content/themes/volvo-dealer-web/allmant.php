<?php /* Template Name: Grundsida : Allmänt */
get_header();


?>



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
                <div class="left-column black-page kop-bil-undersida">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php echo empty($post->post_parent) ? get_the_title($post->ID) : get_the_title($post->post_parent); ?></h1>
                    </header>
                    <!-- .entry-header -->

                    <?php include 'mobile-menu.php'; ?>

                    <div class="side-menu-container side-menu-old">
                        <?php /*
							echo volvo_get_custom_menu('Allmänt', 'side-menu-large');*/
                        ?>
                        <ul class="side-menu-large">
                            <?php
                            new_volvo_menu('footer');
                            ?>
                        </ul>
                    </div>

                </div>

                <div class="right-column block-page kop-bil-undersida" style="text-align: left;">
                    <div class="inner-wrap kop-bil" style="background-color: #fff; padding: 30px">
                        <?php the_content(); ?>
                    </div>
                    <div id="car-content-div" class="car-content-div"></div>
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
