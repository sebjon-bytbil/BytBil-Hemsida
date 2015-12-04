<?php /* Template Name: Grundsida : Beställ broschyr */ ?>

<?php get_header();
//if(isset($post_meta['orig_id'][0])){
$ids = get_post_ancestors($post);

/*$id = $post->$ID;
$post_meta = get_post_meta(get_the_ID());
$masterId = get_post_meta(get_the_ID(), 'pushed_original_id', true);
if ($masterId) {
    switch_to_master();
    $args = array('page_id' => $masterId);
    $the_query = new WP_Query($args);
    //$the_query = wp_get_single_post($post_meta['orig_id']);
    restore_from_master();
    $post = $the_query->the_post();
} */

//}

the_post();

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
                    var imageUrl = '<?php echo get_field("bakgrundsbild"); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                </script>

            <?php
            }

            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="left-column">

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

                        <?php $parent_menu = true; ?>
                        <?php include 'mobile-menu.php'; ?>

                        <div class="side-menu-container side-menu-old">
                            <ul class="side-menu-large">
                                <?php


                                echo wpb_list_child_pagesparam($ids, true);?>


                            </ul>
                            <?php new_volvo_menu('bilmeny', true, 'side-menu-small', false); ?>

                        </div>

                </div>

                <div class="right-column block-page" style="text-align: left;">
                    <div class="single-block">
                        <div class="inner-wrap">
                            <?php

                            if (!isset($_GET['width'])) {
                                $width = '100%';
                            } else {
                                $width = $_GET['width'];
                            }
                            if (!isset($_GET['height'])) {
                                $height = '100%';
                            } else {
                                $height = $_GET['height'];
                            }

                            $dealer = get_field('dealer_broschyr', 'options');

                            $url = 'https://www.clickredirect.net/_forms/volvo/iframe/AFBroshure/afbroshure2.asp?s=' . $dealer;

                            /* $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                            $data = curl_exec($ch);
                            curl_close($ch); */

                            ?>
                            <iframe id="broschyr-frame"
                                    style="width: <?php echo $width; ?>; height:<?php echo $height; ?>; min-height: 1000px; border: 0 !important;"
                                    src="<?php echo $url; ?>"></iframe>
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



<?php get_footer(); ?>
