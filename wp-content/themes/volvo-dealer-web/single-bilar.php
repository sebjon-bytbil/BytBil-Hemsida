<?php /* Template Name: Modellsida */
get_header();

$post_meta = get_post_meta(get_the_ID());
$masterPost = bytbil_get_master_post(get_the_ID());

if ($masterPost):

    switch_to_master();
    $args = array('page_id' => $post_meta['orig_id'][0]);
    $the_query = new WP_Query($args);

    while ($the_query->have_posts()) : $the_query->the_post();
        ?>
        <h1 id="HeaderMain"><?php get_field('doldh1a'); ?></h1>
        <?php

        if (get_field('bakgrundsbild')) {
            ?>

            <script type="text/javascript">

                $('#background-container').empty();
                var imageUrl = '<?php echo get_field('bakgrundsbild'); ?>';
                $('#background-container').css('background-image', 'url(' + imageUrl + ')');
            </script>
        <?php }
    endwhile;
    restore_from_master();
    ?>

    <div id="primary" class="content-area kopbil">
        <div id="content" class="site-content" role="main">
            <div class="wrapper">
                <?php /* The loop */ ?>
                <?php while (have_posts()) :
                the_post();

                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div
                        class="left-column  <?php get_field('page_color') ? print(get_field('page_color')) : print('black-page'); ?>">

                        <header class="entry-header">
                            <?php
                                $masterPost = bytbil_get_master_post(get_the_ID());
                                switch_to_master();
                                $name = get_the_title($masterPost->ID);
                            ?>
                            <h2 class="entry-title"><?php echo parse_model_name($name); ?></h2>
                            <?php restore_from_master(); ?>
                        </header>
                        <!-- .entry-header -->
                        
                        <?php
                        $page_menu = true;
                        ?>
                        <?php include 'mobile-menu.php'; ?>

                        <div class="side-menu-container side-menu-old">
                            <ul class="side-menu-large">
                                <?php echo wpb_list_child_pages(true); ?>

                            </ul>
                            <?php new_volvo_menu('bilmeny', true, 'side-menu-large', false); ?>

                        </div>


                    </div>

                    <div
                        class="right-column <?php get_field('page_color') ? print(get_field('page_color')) : print('black-page'); ?>">
                        <?php                    
                        $pris = get_field('pris');
                        $id = get_the_ID();
                        $af_text = get_field('af-sidor', 'options');
                        if($af_text){
                            foreach($af_text as $text){
                                if($text['af-sida']->ID==$id){
                                    $pris = $text['af-text'];
                                }
                            }
                        }
                        $post_meta = get_post_meta(get_the_ID());
                        switch_to_master();
                        $args = array('page_id' => $post_meta['orig_id'][0]);
                        $the_query = new WP_Query($args);

                        while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <h2><?php echo get_field('rubriktexten'); ?> </h2>
                            <?php the_content(); ?>
                            <h3><?php echo $pris; ?></h3>
                            <?php

                            if (bytbil_get_field('show_share', true) == 1) {
                                echo '<br/>';
                                echo do_shortcode('[bytbil_share_box]');
                            }
                            if (bytbil_get_field('show_build', true) == 1) {
                                echo '<br/>';
                                echo '<br/>';
                                echo do_shortcode('[bytbil_build_car]');
                            }
                        endwhile;


                        ?>
                    </div>
                    <!-- .entry-content -->

                </article>
                <!-- #post -->

            </div>
            <?php
            endwhile;
            switch_to_master();
            ?>
        </div>
        <!-- #content -->
    </div><!-- #primary -->

<?php else:

    $args = array('page_id' => $post->ID);
    $the_query = new WP_Query($args);

    while ($the_query->have_posts()) : $the_query->the_post(); ?>

        <h1 id="HeaderMain"><?php get_field('doldh1a'); ?></h1>

        <?php if (get_field('bakgrundsbild')) { ?>

            <script type="text/javascript">
                $('#background-container').empty();
                var imageUrl = '<?php echo get_field('bakgrundsbild'); ?>';
                $('#background-container').css('background-image', 'url(' + imageUrl + ')');
            </script>

        <?php }

    endwhile; ?>

    <div id="primary" class="content-area kopbil">
        <div id="content" class="site-content" role="main">
            <div class="wrapper">

                <?php while (have_posts()) :
                the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div
                        class="left-column <?php get_field('page_color') ? print(get_field('page_color')) : print('black-page'); ?>">

                        <header class="entry-header">
                            <h2 class="entry-title"><?php echo get_the_title($post->ID); ?></h2>
                        </header>

                        <?php include 'mobile-menu.php'; ?>

                        <div class="side-menu-container side-menu-old">
                            <ul class="side-menu-large">
                                <?php echo wpb_list_child_pages(true); ?>
                            </ul>
                            <?php new_volvo_menu('bilmeny', true, 'side-menu-small', false); ?>
                        </div>

                    </div>

                    <div
                        class="right-column <?php get_field('page_color') ? print(get_field('page_color')) : print('black-page'); ?>">
                        <?php
                        $pris = get_field('pris');
                        $post_meta = $post->ID;

                        $args = array('page_id' => $post_meta);
                        $the_query = new WP_Query($args);

                        while ($the_query->have_posts()) : $the_query->the_post(); ?>

                            <h2><?php echo get_field('rubriktexten'); ?> </h2>
                            <?php the_content(); ?>
                            <h3><?php echo $pris; ?></h3>
                            <?php

                            if (bytbil_get_field('show_share', true) == 1) {
                                echo '<br/>';
                                echo do_shortcode('[bytbil_share_box]');
                            }

                            if (bytbil_get_field('show_build', true) == 1) {
                                echo '<br/>';
                                echo '<br/>';
                                echo do_shortcode('[bytbil_build_car]');
                            }
                        endwhile;

                        ?>
                    </div>

                </article>

            </div>
            <?php endwhile; ?>
        </div>
        <!-- #content -->
    </div><!-- #primary -->

<?php endif; ?>

<?php restore_current_blog_fully(); ?>
<?php get_footer(); ?>
