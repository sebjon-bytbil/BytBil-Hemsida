<?php /* Template Name: Sida : Flera block */
get_header();
$ids = get_post_ancestors($post);

$id = $post->$ID;
$post_meta = get_post_meta(get_the_ID());
$masterPost = bytbil_get_master_post(get_the_ID());
//var_dump($masterPost);


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
            $mpid = get_post_meta($post->ID, 'pushed_original_id', true);
            switch_to_master();
            $bgimg = get_field('bakgrundsbild', $mpid);
            restore_from_master();

            if (bytbil_get_field('bakgrundsbild', true)) {
                ?>

                <script type="text/javascript">

                    $('#background-container').empty();
                    var imageUrl = '<?php echo $bgimg; //bytbil_get_field('bakgrundsbild', true); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                </script>

            <?php
            }
            $menu = bytbil_get_field('menu');
            ?>
            <?php
                $menu_color = bytbil_get_field('menu_color');
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="left-column black-page <?php if ($menu == 'bottom-services' && $menu_color == null) {
                    echo 'white-menu ';
                }
                if($menu_color) {
                    echo 'menu_color-'.$menu_color;
                }
                ?>">
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
                                    switch_to_master();
                                    echo empty($masterPost->post_parent) ? get_the_title($masterPost->ID) : get_the_title($masterPost->post_parent);
                                    restore_from_master();
                                }
                                ?>
                            </h1>
                        </header><!-- .entry-header -->


                        <div class="side-menu-container">
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
                        $masterPostID = $masterPost->ID;

                        if (!$masterPostID) {

                            if (get_field('css-code')) {
                                $cssCode = get_field('css-code');
                            }
                            echo $cssCode;

                            if (have_rows('html-blocks')) :
                                while (have_rows('html-blocks')) : the_row();
                                    $htmlCode = get_sub_field('html-code');
                                    $blockBackground = get_sub_field('block-background');
                                    $blockPadding = get_sub_field('padding');
                                    $blockMargin = get_sub_field('margin');
                                    $blockWidth = get_sub_field('block-width');
                                    $blockHeight = get_sub_field('block-height');
                                    echo '<div class="blocks-block" style="float: left; background:' . $blockBackground . '; padding: ' . $blockPadding . '; margin: ' . $blockMargin . '; height: ' . $blockHeight . '; width: ' . $blockWidth . '">' . $htmlCode . '</div>';

                                endwhile;

                            endif;
                        } else {

                            switch_to_master();

                            $rowNo = 0;

                            if (get_field('css-code', $masterPost)) {
                                $cssCode = get_field('css-code', $masterPost);
                            }
                            echo $cssCode;

                            if (have_rows('html-blocks', $masterPost)):



                                // loop through the rows of data
                                while (have_rows('html-blocks', $masterPost)) : the_row();

                                    $blockEditable = get_sub_field('af-editable');
                                    $htmlCode = get_sub_field('html-code');
                                    $blockBackground = get_sub_field('block-background');
                                    $blockPadding = get_sub_field('padding');
                                    $blockMargin = get_sub_field('margin');
                                    $blockWidth = get_sub_field('block-width');
                                    $blockHeight = get_sub_field('block-height');

                                    $rowNo++;

                                    if ($blockEditable == true) {

                                        restore_from_master();

                                        $pageID = $post->ID;
                                        $afRowNo = 0;

                                        while (have_rows('html-blocks', $pageID)) : the_row();
                                            $afRowNo++;
                                            if ($afRowNo == $rowNo) {

                                                $blockBackground = get_sub_field('block-background');
                                                $blockPadding = get_sub_field('padding');
                                                $blockMargin = get_sub_field('margin');
                                                $htmlCode = get_sub_field('html-code');
                                            }

                                        endwhile;

                                        switch_to_master();
                                    }

                                    echo '<div class="blocks-block" style="float: left; background:' . $blockBackground . '; padding: ' . $blockPadding . '; margin: ' . $blockMargin . '; height: ' . $blockHeight . '; width: ' . $blockWidth . '">' . $htmlCode . '</div>';
                                endwhile;


                            else :

                            endif;

                            restore_from_master();

                        }
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
        imgTags.unwrap();
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
