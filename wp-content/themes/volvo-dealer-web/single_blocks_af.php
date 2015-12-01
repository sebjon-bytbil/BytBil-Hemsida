<?php /* Template Name: Sida : Flera block (ÅF) */
get_header();

$ids = get_post_ancestors($post);

$id = $post->$ID;
$post_meta = get_post_meta(get_the_ID());



//}

?>
    <style>
        .blocks-block img {
            max-width: 100%;
        }
    </style>
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <div class="wrapper">
                <?php /* The loop */ ?>
                <?php //while ( have_posts() ) : the_post();

                if (bytbil_get_field('bakgrundsbild', true)) {
                    ?>

                    <script type="text/javascript">

                        $('#background-container').empty();
                        var imageUrl = '<?php echo bytbil_get_field('bakgrundsbild', true); ?>';
                        $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                    </script>

                <?php
                }
                $menu = bytbil_get_field('menu');
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="left-column black-page <?php if ($menu == 'bottom-services') {
                        echo 'white-menu';
                    } ?>">
                        <?php


                        if ($menu != 'none') {
                            ?>

                            <header class="entry-header">
                                <h1 class="entry-title">
                                    <?php
                                    if ($menu == 'bottom-services') {
                                        echo 'Tjänster';
                                    } else if ($menu == 'footer') {
                                        echo 'Allmänt';
                                    } else if ($menu == 'bottom-buy') {
                                        echo 'Köp Bil';
                                    } else {
                                        echo empty($post->post_parent) ? get_the_title($post->ID) : get_the_title($post->post_parent);
                                    }
                                    ?>
                                </h1>
                            </header><!-- .entry-header -->

                            <?php include 'mobile-menu.php'; ?>

                            <div class="side-menu-container side-menu-old">
                                <ul class="side-menu-large">
                                    <?php
                                    new_volvo_menu($menu);
                                    ?>
                                </ul>
                            </div>

                        <?php
                        } else {
                        }

                        ?>

                    </div>

                    <div class="right-column block-page" style="text-align: left;">
                        <div style="position:absolute; padding-bottom: 100px;">


                            <?php

                            $postID = $post->ID;

                            if (have_rows('html-blocks', $postID)):

                                if (bytbil_get_field('css-code')) {
                                    $cssCode = bytbil_get_field('css-code');
                                }
                                echo $cssCode;

                                // loop through the rows of data
                                while (have_rows('html-blocks', $postID)) : the_row();

                                    $blockEditable = get_sub_field('af-editable');
                                    $htmlCode = get_sub_field('html-code');
                                    $blockBackground = get_sub_field('block-background');
                                    $blockPadding = get_sub_field('padding');
                                    $blockMargin = get_sub_field('margin');
                                    $blockWidth = get_sub_field('block-width');
                                    $blockHeight = get_sub_field('block-height');

                                    echo '<div class="blocks-block" style="float: left; background:' . $blockBackground . '; padding: ' . $blockPadding . '; margin: ' . $blockMargin . '; height: ' . $blockHeight . '; width: ' . $blockWidth . '">' . $htmlCode . '</div>';


                                endwhile;

                            else :

                            endif;
                            ?>

                        </div>
                        <!-- .entry-content -->
                    </div>

                </article>
                <!-- #post -->

            </div>

        </div>
        <!-- #content -->
    </div><!-- #primary -->

<?php echo site_url(); ?>
    <script>

        var imgTags = $(".blocks-block").find("img");
        if (imgTags.parent().is("p")) {
            imgTags.contents().unwrap();
        }
        else {
        }

        /*$('.blocks-block a[href^="http://volvo.cms.bytbil.com"]').each(function(index, element) {
         this.href = this.href.replace(/http\:\/\/volvo\.cms\.bytbil\.com/g, "<?php echo site_url(); ?>");
         });*/

        $(document).ready(function () {
            var i = 0;
            $('a[href^="http://volvo.cms"]').each(function (index, element) {

                var href = $(this).attr('href');

                var find = 'http://volvo.cms.bytbil.com';

                var re = new RegExp(find, 'g');

                href = href.replace(re, '<?php echo site_url();/*bloginfo('url');*/ ?>');

                $(this).attr('href', href);
            });
        });

    </script>



<?php get_footer(); ?>