<?php /* Template Name: Modellsida : Erbjudanden */
get_header(); ?>
<?php
$ids = get_post_ancestors($post);
?>
<h1 id="HeaderMain"><?php the_field('dolh1a') ?></h1>
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <div class="wrapper">

            <?php /* The loop */ ?>
            <?php while (have_posts()) :
            the_post(); ?>

            <?php
            $post_meta = get_post_meta(get_the_ID());
            switch_to_master();

            $args = array('page_id' => $post_meta['pushed_original_id'][0]);
            $the_query = new WP_Query($args);

            while ($the_query->have_posts()) : $the_query->the_post();
                $jsonParam = get_field('json_parameters');
                //$jsonParam = bytbil_get_field('json_parameters', true);
                $backgroundIMG = get_field('bakgrundsbild', $post->post_parent);
            endwhile;
            wp_reset_query();

            restore_from_master();

            $dealer = get_field('aterforsaljid', 'options');
            $url = 'http://dms.fbinhouse.se/app/index/' . $dealer . '/?' . $jsonParam . '';
            ?>

            <?php

            if ($backgroundIMG) {
                ?>

                <script type="text/javascript">

                    $('#background-container').empty();
                    var imageUrl = '<?php echo $backgroundIMG; ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                </script>

            <?php
            }

            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="left-column offer-specific black-page">
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
                    
                    <?php
                    $parent_menu = true;
                    ?>
                    <?php include 'mobile-menu.php'; ?>

                    <div class="side-menu-container side-menu-old">
                        <ul class="side-menu-large">
                            <?php
                            echo wpb_list_child_pagesparam(true); ?>
                        </ul>
                        <?php new_volvo_menu('bilmeny', true, 'side-menu-small', false); ?>
                    </div>

                </div>


                <script type="text/javascript">

                    function iframeLoaded() {
                        jQuery("#kampanjer").load(function () {
                            var frame = $('#kampanjer', window.parent.document);
                            var width = jQuery("body").width();
                            var height = jQuery("body").height();
                            frame.width(width + 15);
                            frame.height(height + 15);
                            frame.css('overflow-y', 'hidden');
                        });
                    }
                </script>

                <div class="right-column allakampanjer" style="text-align: left; height:100%; width: 100%;">
<!--                    <iframe id="kampanjer" style="border: 0 !important;" src="--><?php //echo $url; ?><!--" width="100%"-->
<!--                            height="100%"></iframe>-->
                    <style>
                        #kampanjer-20 {
                            max-width: none;
                        }

                        #kampanjer-20 div {
                            max-width: none;
                        }
                        
                        #kampanjer-20 .fbi-link-top a {
                            -webkit-box-sizing: content-box;
                            -moz-box-sizing: content-box;
                            box-sizing: content-box;
                        }
                    </style>
                    <div id="kampanjer-20"></div>
                </div>
                <!-- .entry-content -->
                <?php $jsonData = bytbil_get_field("json_parameters", true); ?>
                <?php $newUrl = "target=#kampanjer-20&reseller=". $dealer ."&" . $jsonData ?>
                <script id="dmsloader" src="//dms.fbinhouse.se/assets/js/loader.js"
                        data-defaults="<?php echo $newUrl; ?>"></script>
                <script>
                    //iframeLoaded();

                </script>

            </article>
            <!-- #post -->

        </div>
        <?php endwhile; ?>

    </div>
    <!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
