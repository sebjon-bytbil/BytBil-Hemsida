<?php /* Template Name: Home */
$page_style = "start";
get_header();
$pagebyggbil = get_field('byggbil');
?>

    <div id="primary" class="content-area">
        <div id="content" class="nyberg-site-content" role="main">

            <div class="midcontent clear">
                <?php echo do_shortcode('[nyberg_alertbox]') ?>

                <div class="nyberg-middle-bar">
                    <?php echo do_shortcode('[nyberg_brand_plugs]'); ?>

                    <?php echo do_shortcode('[nyberg_social_plugs]'); ?>
                </div>
                <div class="nyberg-search-plug">
                    <?php echo do_shortcode('[bytbil_searchbox target="sok-alla-bilar-i-lager"]'); ?>
                    </form>
                </div>
                <?php echo do_shortcode('[nyberg_byggbil slug="bygg-din-nya-bil-sjalv"]'); ?>

            </div>
            <div class="nyberg-middle-plugs">
                <div class="midcontent">
                    <?php echo do_shortcode('[nyberg_middle_plugs]'); ?>
                </div>
            </div>
            <div class="midcontent">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif;
                nyberg_puffar();
                ?>
            </div>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->

    <script>
        $(document).ready(function () {
            $(".search-box-plug ").click(function () {
                $(".midcontent").addClass("open");
            });
        });

    </script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>