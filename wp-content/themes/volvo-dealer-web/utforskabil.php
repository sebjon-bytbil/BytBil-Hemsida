<?php /* Template Name: Grundsida : Utforska bil */
get_header();
$post_meta = get_post_meta(get_the_ID());
switch_to_master();

$args = array('page_id' => $post_meta['orig_id'][0]);
$the_query = new WP_Query($args);

while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <h1 id="HeaderMain"><?php the_field('dolh1a'); ?></h1>
    <div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
    <div class="wrapper">

    <?php

    if (get_field('bakgrundsbild')) {
        ?>
        <script type="text/javascript">
            $('#flex-slider').flexslider({
                animation: 'fade',
                animationLoop: true,
                prevText: '<',
                nextText: '>',
                slideshow: false,
                directionNav: true
            });

            $('#background-container').empty();
            var imageUrl = '<?php echo get_field('bakgrundsbild'); ?>';
            $('#background-container').css('background-image', 'url(' + imageUrl + ')');

        </script>


    <?php

    }
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div style="text-align: center; position: fixed; width: 100%; height: 100%; display: table; z-index: 100; left: 0; top: 0;">
    <div style="z-index: 999999; left: 0; top: 0; display: table-cell; vertical-align: middle; text-align: center;">

    <div class="flexslider-mask" style="max-width: 948px; margin: 0 auto;">
    <div id="flexslider-bil" style="max-width: 575px; margin: 0 auto;">
    <ul class="slides">
    <?php

    $page = get_page_by_title('Utforska Bil');
    $args = array(
        'post_type' => 'page',
        'post_parent' => $page->ID
    );
    $wp_query = new WP_Query($args);
    while (have_posts()) : the_post();
        $slideImage = get_field('slideshow2');

        restore_from_master();
        $siteUrl = get_site_url();
        switch_to_master();
        $url_endpoint = get_permalink($page->ID);
        $url_endpoint = parse_url($url_endpoint);
        $url_endpoint = $url_endpoint['path'];
        $url = $siteUrl . $url_endpoint;

        ?>
        <li style="display: none; height: 100%">
            <a style="-webkit-tap-highlight-color: rgba(255, 255, 255, 0);" href="<?php echo $url; ?>">
                <div
                    style="-webkit-user-select: none; -webkit-tap-highlight-color: transparent; background-image: url(<?php echo $slideImage; ?>); background-size: contain; background-position: center center; background-repeat: no-repeat; ">
                    <img style="width: 100%; height: 100%"
                         src="<?php bloginfo('template_url'); ?>/images/transparent.png"/></div>
            </a>
        </li>
    <?php endwhile;
    restore_from_master();

endwhile;
wp_reset_query();
?>

    </ul>
    </div>
    </div>
    <div class="utforska-nav-container" style="position: absolute; width: 100%; left: 0; top: 55%;">
        <div style="max-width: 948px; margin: 0 auto; position: relative;">
            <a href="#" onclick="javascript:flexBilPrev();return false;"><span style="position: absolute; left: 0;"><img
                        src="<?php bloginfo('template_url'); ?>/images/gallery-previous.png"/></span></a>
            <a href="#" onclick="javascript:flexBilNext();return false;"><span
                    style="position: absolute; right: 0;"><img
                        src="<?php bloginfo('template_url'); ?>/images/gallery-next.png"/></span></a>
        </div>
    </div>

    </div>
    </div>
    <div class="left-column black-page kop-bil">
        <header class="entry-header">
            <h2 class="entry-title"><?php
                $masterPost = bytbil_get_master_post(get_the_ID());
                switch_to_master();
                echo empty($masterPost->post_parent) ? get_the_title($masterPost->ID) : get_the_title($masterPost->post_parent);
                restore_from_master();
                ?></h2>
        </header>
        <!-- .entry-header -->

        <div class="side-menu-container">
            <?php
            //echo volvo_get_custom_menu('Köp bil', 'side-menu-large');
            //new_volvo_menu('bottom-explore');
            ?>
        </div>
    </div>

    <!-- .entry-content -->
    </article><!-- #post -->
    </div>
<?php // endwhile; ?>

    </div><!-- #content -->
</div><!-- #primary -->
    <script type="text/javascript">
        function flexBilPrev() {
            $('#flexslider-bil').flexslider('prev');
        }
        function flexBilNext() {
            $('#flexslider-bil').flexslider('next');
        }
        $(window).load(function () {
            $('#flexslider-bil').flexslider({
                animationLoop: true,
                prevText: '<',
                nextText: '>',
                slideshow: false,
                directionNav: false,
                controlNav: false,
                easing: "swing",
                animation: 'slide',
                itemWidth: 575,
                startAt: 1,
            });
        });
    </script>
<?php get_footer(); ?>