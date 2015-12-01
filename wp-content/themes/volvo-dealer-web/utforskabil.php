<?php /* Template Name: Grundsida : Utforska bil */
get_header();
$siteUrl = get_site_url();
?>
    <article cid="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div style="text-align: center; position: fixed; width: 100%; height: 100%; display: table; z-index: 100; left: 0; top: 0;">
        <div style="z-index: 999999; left: 0; top: 0; display: table-cell; vertical-align: middle; text-align: center;">

            <div class="flexslider-mask" style="max-width: 948px; margin: 0 auto;">
                <div id="flexslider-bil" style="max-width: 575px; margin: 0 auto;">
                    <ul class="slides">
                    <?php
                    switch_to_master();

                    $page = get_page_by_title('Utforska Bil');

                    $args = array(
                        'post_type' => 'page',
                        'post_parent' => $page->ID,
                        'posts_per_page'   => -1,                        
                    );

                    $posts = get_posts($args);


                    foreach($posts as $post){
                    $fields = get_fields($post->ID);
                        ?>
                        <li>
                            <?php
                            
                            
                            $slideImage = $fields['slideshow2'];
                            $url_endpoint = get_permalink($post->ID);
                            $url_endpoint = parse_url($url_endpoint);
                            $url_endpoint = $url_endpoint['path'];
                            $url = $siteUrl . $url_endpoint;
                                                
                            ?>
                            
                            <a style="-webkit-tap-highlight-color: rgba(255, 255, 255, 0);" href="<?php echo $url; ?>">
                                <div
                                    style="-webkit-user-select: none; -webkit-tap-highlight-color: transparent; background-image: url(<?php echo $slideImage; ?>); background-size: contain; background-position: center center; background-repeat: no-repeat; ">
                                    <img style="width: 100%; height: 100%"
                                         src="<?php bloginfo('template_url'); ?>/images/transparent.png"/>
                                </div>
                            </a>
                        </li>                
                    <?php
                    } 
                        
                    restore_from_master();

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
        <header class="entry-header" style="width: 100%;">
            <h2 class="entry-title" style="width: 100%; text-align: center;">
                <?php
                $masterPost = bytbil_get_master_post(get_the_ID());
                switch_to_master();
                echo empty($masterPost->post_parent) ? get_the_title($masterPost->ID) : get_the_title($masterPost->post_parent);
                restore_from_master();
                ?></h2>
        </header>
        <!-- .entry-header -->
        <?php include 'mobile-menu.php'; ?>
        
        <div class="side-menu-container">
            <?php
            /*            echo volvo_get_custom_menu('Köp bil', 'side-menu-large');
            new_volvo_menu('bottom-explore');
            
            */
            ?>
        </div>
    </div>

    <!-- .entry-content -->
    </article><!-- #post -->
    </div>
<style>
    @media (min-width: 768px){
        .page-template-utforskabil .left-column,
        .page-template-utforskabil .container,
        .entry-header{
            width: 100%;
            display: inline-block;
            float: left;

        }
        .entry-header {
            text-align: centeR;
        }
         .page-template-utforskabil h2.entry-title {
          font-size: 48px !important
        }  

    }
    
    @media only screen and (max-width: 1010px) {}
        .page-template-utforskabil .slides li a div {
            background-position: 50% 50% !important;
        }
    }
</style>
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