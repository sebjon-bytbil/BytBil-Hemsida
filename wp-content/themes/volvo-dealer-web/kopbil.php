<?php /* Template Name: Grundsida : Köp bil */
get_header(); ?>
    <h1 id="HeaderMain"><?php the_field('dolh1a') ?></h1>
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
                        var imageUrl = '<?php echo get_field("bakgrundsbild"); ?>';
                        $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                    </script>

                <?php
                }

                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="left-column">
                        <header class="entry-header">
                            <h2 class="entry-title"><?php echo empty($post->post_parent) ? get_the_title($post->ID) : get_the_title($post->post_parent); ?></h2>
                        </header>
                        <!-- .entry-header -->

                        <div id="mobileMenu" class="side-menu-container">
   
   
                            <div class="mobile-logo">
                                <!--<img src="<?php bloginfo('template_url'); ?>/images/volvo-logo-new.png"/> -->
                                <img class="header-logo"
                                     style="height:<?php the_field('logo_height', 'options'); ?>; width:<?php the_field('logo_width', 'options'); ?>;"
                                     src="<?php the_field('logo', 'options'); ?>"/>
                            </div>
                            
                            <h4><?php the_title(); ?></h4>
                            <ul class="side-menu-small">
                                <?php new_volvo_menu('bilmeny'); ?>
                            </ul>
                            

                            <?php
                                $menus = array(
                                    'bottom-explore' => 'Utforska bil',
                                    'bottom-buy' => 'Köp bil',
                                    'bottom-services' => 'Tjänster'
                                );
                                custom_mobile_menu($menus, true);
                            ?>
                        </div>

                        <div class="side-menu-container side-menu-old">
                            <ul class="side-menu-large">
                                <?php
                                new_volvo_menu('bottom-buy');
                                ?>
                            </ul>
                            <ul class="side-menu-small">
                                <?php new_volvo_menu('bilmeny'); ?>
                            </ul>
                        </div>

                    </div>

                    <div class="right-column kop-bil">
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
                        <div class="inner-wrap kop-bil">
                            <?php the_content(); ?>
                        </div>
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