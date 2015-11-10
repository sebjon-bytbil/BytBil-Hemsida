<?php /* Template Name: Modellsida : Galleri */
get_header();
$ids = get_post_ancestors($post);

$post_meta = get_post_meta(get_the_ID());
$masterPost = bytbil_get_master_post(get_the_ID());

if ($masterPost):

switch_to_master();
$args = array('page_id' => $post_meta['orig_id'][0]);
$the_query = new WP_Query($args);

while ($the_query->have_posts()) :
$the_query->the_post();


?>




<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <div class="wrapper">

            <?php

            $postParent = $post->post_parent;

            if (get_field('bakgrundsbild')) {
                ?>

                <script type="text/javascript">

                    $('#background-container').empty();
                    var imageUrl = '<?php echo get_field('bakgrundsbild'); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                </script>
            <?php }

            else if (get_field('bakgrundsbild', $postParent)){ ?>

                <script type="text/javascript">

                    $('#background-container').empty();
                    var imageUrl = '<?php echo get_field('bakgrundsbild', $postParent); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                </script>

            <?php }
            endwhile;
            restore_from_master();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="left-column black-page">

                    <header class="entry-header">
                        <?php
                        $masterPost = bytbil_get_master_post(get_the_ID());
                        switch_to_master();
                        $parentIds = get_post_ancestors($masterPost->ID);

                        ?>
                        <h2 class="entry-title"><?php echo parse_model_name(get_the_title($parentIds[0])); ?></h2>
                        <?php restore_from_master(); ?>
                    </header>
                    <!-- .entry-header -->

                    <?php include 'mobile-menu.php'; ?>

                    <div class="side-menu-container side-menu-old">
                        <ul class="side-menu-large">
                            <?php


                            echo wpb_list_child_pagesparam($ids);?>


                        </ul>
                        <?php new_volvo_menu('bilmeny', true, 'side-menu-large', false); ?>

                    </div>

                </div>

                <div class="right-column" style="text-align: left; width: 100%;">
                    <?php
                    switch_to_master();
                    $gallery = get_field('galleri', $post->ID);
                    restore_current_blog_fully();

                    foreach ($gallery as $image_obj) { ?>
                        <a class="car-gallery-link" href="<?php echo $image_obj[image][url]; ?>"
                           onclick="showImage(this); return false;"><span class="gallery-span"
                                                                          style="background-image: url(<?php echo $image_obj[image][sizes][thumbnail]; ?>);"></span></a>
                    <?php }?>

                </div>
                <!-- .entry-content -->

                <?php else: ?>

            <?php

            $args = array('page_id' => $post->ID);
            $the_query = new WP_Query($args);

            while ($the_query->have_posts()) :
            $the_query->the_post(); ?>

                <div id="primary" class="content-area">
                    <div id="content" class="site-content" role="main">
                        <div class="wrapper">

                            <?php

                            $postParent = $post->post_parent;

                            if (get_field('bakgrundsbild')) { ?>

                                <script type="text/javascript">

                                    $('#background-container').empty();
                                    var imageUrl = '<?php echo get_field('bakgrundsbild'); ?>';
                                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');

                                </script>

                            <?php }

                            else if (get_field('bakgrundsbild', $postParent)){ ?>

                                <script type="text/javascript">

                                    $('#background-container').empty();
                                    var imageUrl = '<?php echo get_field('bakgrundsbild', $postParent); ?>';
                                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');

                                </script>

                            <?php }
                            endwhile; ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="left-column black-page">

                                    <header class="entry-header">
                                        <?php $parentIds = get_post_ancestors($post->ID); ?>
                                        <h2 class="entry-title"><?php echo get_the_title($parentIds[0]); ?></h2>
                                    </header>
                                    <!-- .entry-header -->

                                    <?php include 'mobile-menu.php'; ?>

                                    <div class="side-menu-container side-menu-old">
                                        <ul class="side-menu-large">
                                            <?php echo wpb_list_child_pagesparam($ids, true); ?>
                                        </ul>
                                        <div class="side-menu-small">
                                            <?php new_volvo_menu('bottom-buy'); ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="right-column" style="text-align: left; width: 100%;">
                                    <?php

                                    $gallery = get_field('galleri', $gallery_id);

                                    foreach ($gallery as $image_obj) { ?>
                                        <a class="car-gallery-link" href="<?php echo $image_obj[image][url]; ?>"
                                           onclick="showImage(this); return false;"><span class="gallery-span"
                                                                                          style="background-image: url(<?php echo $image_obj[image][sizes][thumbnail]; ?>);"></span></a>
                                    <?php } ?>

                                </div>
                                <!-- .entry-content -->

                                <?php endif; ?>
                                <script>
                                    function showImage(obj) {
                                        var link = $(obj);
                                        var parent = link.parent();
                                        var index = link.index();

                                        var limiter = jQuery('<div/>', {
                                            style: 'position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 1000000;'
                                        }).appendTo('body');
                                        var cover = jQuery('<div/>', {
                                            id: 'gallery_cover',
                                            style: 'position: fixed; display: table; z-index: 1000000; width: 100%; height: 100%; top: 0; left: 0; background-color: rgba(100, 100, 100, 0.8);'
                                        }).appendTo(limiter);

                                        cover.click(function () {
                                            cover.remove();
                                            limiter.remove();
                                        });
                                        var imageBox = jQuery('<div/>', {
                                            id: 'imageBox',
                                            style: 'display: table-cell; vertical-align: middle; text-align: center;'
                                        }).appendTo(cover);
                                        var imageSpan = jQuery('<span/>', {
                                            //style: 'position: relative; text-align: center; width: ' + ($(document).width() * 0.8) + 'px; height: ' + ($(document).height() * 0.8) + 'px;'
                                            style: 'position: relative; text-align: center; display: inline-block; max-height: 100%;'
                                        }).appendTo(imageBox);
                                        var image = jQuery('<img/>', {
                                            src: link.attr('href'),
                                            style: 'width: auto; max-height: ' + $(window).height() + 'px; box-shadow: 2px 2px 8px #333333; -moz-box-shadow: 2px 2px 8px #333333; -webkit-box-shadow: 2px 2px 8px #333333;'
                                        }).appendTo(imageSpan);
                                        var rightButton;
                                        var leftButton;


                                        var closeButton = jQuery('<img/>', {
                                            class: 'gallery-close',
                                            src: '<?php bloginfo( "template_url" ); ?>/images/btn-close.png',
                                            style: 'position: absolute; top: 15px; right: 15px; cursor: pointer;'
                                        }).appendTo(imageSpan);
                                        closeButton.click(function () {
                                            cover.remove();
                                            limiter.remove();
                                        });
                                        var counterSpan = jQuery('<span/>', {
                                            style: 'color: #fff; position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background-color: rgba(0, 0, 0, 0.3); padding: 5px;'
                                        }).appendTo(imageSpan);


                                        image.load(function () {

                                            var leftButton = jQuery('<img/>', {
                                                src: '<?php bloginfo( "template_url" ); ?>/images/gallery-previous.png',
                                                style: 'position: absolute; top: 50%; transform: translateY(-50%); display: block; cursor: pointer;',
                                                class: 'gallery-prev'
                                            }).appendTo(imageSpan);
                                            leftButton.css('left', (imageSpan.width() - image.width()) / 2);
                                            var rightButton = jQuery('<img/>', {
                                                src: '<?php bloginfo( "template_url" ); ?>/images/gallery-next.png',
                                                style: 'position: absolute; top: 50%; transform: translateY(-50%); display: block; cursor: pointer;',
                                                class: 'gallery-next'
                                            }).appendTo(imageSpan);
                                            rightButton.css('right', ((imageSpan.width() - image.width()) / 2));

                                            counterSpan.text((index + 1) + " / " + parent.children().length);
                                            if (index === 0) {
                                                leftButton.css('display', 'none');
                                            } else {
                                                leftButton.css('display', 'block');
                                            }
                                            if (index == (parent.children().length - 1)) {
                                                rightButton.css('display', 'none');
                                            }
                                            else {
                                                rightButton.css('display', 'block');
                                            }
                                            if (parent.children().length < 2) {
                                                leftButton.css('display', 'none');
                                                rightButton.css('display', 'none');
                                            }

                                            leftButton.click(function () {
                                                leftButton.remove();
                                                rightButton.remove();
                                                image.attr('src', parent.children().eq(index - 1).attr('href'));
                                                index--;
                                                return false;
                                            });
                                            rightButton.click(function () {
                                                leftButton.remove();
                                                rightButton.remove();
                                                image.attr('src', parent.children().eq(index + 1).attr('href'));
                                                index++;
                                                return false;
                                            });

                                        });


                                    }
                                </script>
                            </article>
                            <!-- #post -->

                        </div>


                    </div>
                    <!-- #content -->
                </div>
                <!-- #primary -->


                <?php get_footer(); ?>
