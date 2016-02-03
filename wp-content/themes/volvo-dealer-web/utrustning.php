<?php /* Template Name: Modellsida : Utrustning/Motorvar. */
get_header();

$ids = get_post_ancestors($post);

$post_meta = get_post_meta(get_the_ID());
$masterPost = bytbil_get_master_post(get_the_ID());

if ($masterPost):

    switch_to_master();

    $args = array('page_id' => $post_meta['orig_id'][0]);
    $the_query = new WP_Query($args);

    while ($the_query->have_posts()) : $the_query->the_post();

        ?>

        <?php
        $postParent = $post->post_parent;

        if (get_field('bakgrundsbild') || get_field('mobilback')) {
            ?>

            <script type="text/javascript">

                $('#background-container').empty();
                if ($(window).width() < 900) {
                    var imageUrl = '<?php echo get_field('mobilback'); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                }
                else {
                    var imageUrl = '<?php echo get_field('bakgrundsbild'); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                }
            </script>
        <?php } elseif (get_field('bakgrundsbild', $postParent) || get_field('mobilback', $postParent)) { ?>

            <script type="text/javascript">

                $('#background-container').empty();
                if ($(window).width() < 900) {
                    var imageUrl = '<?php echo get_field('mobilback'), $postParent; ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                }
                else {
                    var imageUrl = '<?php echo get_field('bakgrundsbild',$postParent); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                }
            </script>

        <?php
        }
        ?>


    <?php
    endwhile;
    restore_current_blog();
    restore_from_master();

    ?>
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <div class="wrapper">

                <?php //$bilid = $_GET['car_id'];
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

                        <div class="side-menu-container">
                            <ul class="side-menu-large">
                                <?php


                                echo wpb_list_child_pagesparam($ids, true);?>


                            </ul>
                            <?php new_volvo_menu('bilmeny', true, 'side-menu-large', false); ?>

                        </div>

                    </div>

                    <div id="utrustning" class="right-column">
                        <?php

                        switch_to_master();

                        $args = array('page_id' => $post_meta['orig_id'][0]);
                        $the_query = new WP_Query($args);

                        while ($the_query->have_posts()) :
                        $the_query->the_post();
                        ?>
                        <div class="modelinfo-top">

                            <?php
                            if (get_field('utrustningsnivaer')): ?>
                            <div class="modelinfo-top-left">
                                <h2 id="header2"><?php the_field('utrustringspaketheader'); ?></h2>
                                <?php
                                $masterPost = bytbil_get_master_post(get_the_ID());
                                switch_to_master();
                                $parentIds = get_post_ancestors($masterPost->ID);
                                ?>
                                <div class="model">Volvo <?php echo get_the_title($parentIds[0]); ?></div>

                            </div>
                            <div class="modelinfo-top-right">
                                <img src="<?php the_field('bild_utrustning') ?>">
                            </div>
                        </div>
                    <?php while (has_sub_field('utrustningsnivaer')): ?>
                        <div class="expandable"><span> <?php the_sub_field('utrustringspaket'); ?> </span>

                            <div class="expandablediv">
                                <?php the_sub_field('utrustringspaket-editor'); ?>

                            </div>
                        </div>

                    <?php endwhile; ?>
                        <div class="bottom-links">
                            <span id="close_all">Stäng allt</span>
                            <span id="expand_all">Expandera allt</span>
                            <span id="printeq" class="link-print">Skriv ut allt</span>
                        </div>

                    <?php

                    endif;

                    ?>

                    </div>
                    <!-- .entry-content -->
                    <?php endwhile;

                    restore_from_master();
                    ?>
                </article>
                <!-- #post -->

            </div>


        </div>
        <!-- #content -->
    </div><!-- #primary -->
<?php

else:

    $args = array('page_id' => $post->ID);
    $the_query = new WP_Query($args);

    while ($the_query->have_posts()) : $the_query->the_post(); ?>

        <?php
        $postParent = $post->post_parent;

        if (get_field('bakgrundsbild') || get_field('mobilback')) { ?>

            <script type="text/javascript">

                $('#background-container').empty();
                if ($(window).width() < 900) {
                    var imageUrl = '<?php echo get_field('mobilback'); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                }
                else {
                    var imageUrl = '<?php echo get_field('bakgrundsbild'); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                }
            </script>

        <?php } elseif (get_field('bakgrundsbild', $postParent) || get_field('mobilback', $postParent)) { ?>

            <script type="text/javascript">

                $('#background-container').empty();
                if ($(window).width() < 900) {
                    var imageUrl = '<?php echo get_field('mobilback'), $postParent; ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                }
                else {
                    var imageUrl = '<?php echo get_field('bakgrundsbild',$postParent); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                }
            </script>

        <?php } ?>


    <?php endwhile; ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <div class="wrapper">

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="left-column black-page">

                        <header class="entry-header">
                            <?php $parentIds = get_post_ancestors($post->ID); ?>
                            <h2 class="entry-title"><?php echo get_the_title($parentIds[0]); ?></h2>
                        </header>

                        <div class="side-menu-container">
                            <ul class="side-menu-large">
                                <?php echo wpb_list_child_pagesparam($ids, true);?>
                            </ul>
                            <div class="side-menu-small">
                                <?php new_volvo_menu('bottom-buy'); ?>
                            </div>
                        </div>

                    </div>

                    <div id="utrustning" class="right-column">
                        <?php
                        $args = array('page_id' => $post->ID);
                        $the_query = new WP_Query($args);

                        while ($the_query->have_posts()) :
                        $the_query->the_post();
                        ?>
                        <div class="modelinfo-top">

                            <?php
                            if (get_field('utrustningsnivaer')): ?>
                            <div class="modelinfo-top-left">
                                <h2 id="header2"><?php the_field('utrustringspaketheader'); ?></h2>

                                <div class="model">Volvo <?php echo get_the_title($parentIds[0]); ?></div>
                            </div>
                            <div class="modelinfo-top-right">
                                <img src="<?php the_field('bild_utrustning') ?>">
                            </div>
                        </div>
                    <?php while (has_sub_field('utrustningsnivaer')): ?>
                        <div class="expandable"><span> <?php the_sub_field('utrustringspaket'); ?> </span>

                            <div class="expandablediv">
                                <?php the_sub_field('utrustringspaket-editor'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>

                        <div class="bottom-links">
                            <span id="close_all">Stäng allt</span>
                            <span id="expand_all">Expandera allt</span>
                            <span id="printeq" class="link-print">Skriv ut allt</span>
                        </div>

                    <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
                </article>
            </div>
        </div>
        <!-- #content -->
    </div><!-- #primary -->

<?php endif; ?>

<script>
    $(document).ready(function () {

        $('.expandable').click(function () {
            var expandablediv = $(this).find('.expandablediv');
            if (expandablediv.parent().find('.expandable-open').length === 0) {
                expandablediv.slideDown();
                expandablediv.addClass('expandable-open');
            }
            else {
                expandablediv.slideUp();
                expandablediv.removeClass('expandable-open');
            }
            if (expandablediv.parent().parent().find('.expandable-open').length === 0) {
                $('#close_all').hide();
                $('#expand_all').show();
            }
        });
        $('#printeq').click(function () {
            window.print();
        })
        $('#close_all').click(function () {
            $('.expandable').find('.expandablediv').slideUp();
            $('.expandable').removeClass('expandable-open');
            $('#close_all').hide();
            $('#expand_all').show();

        });
        $('#expand_all').click(function () {
            $('.expandable').find('.expandablediv').slideDown();
            $('.expandable').addClass('expandable-open');
            $('#expand_all').hide();
            $('#close_all').show();
        });
    });
</script>

<?php
get_footer(); ?>
