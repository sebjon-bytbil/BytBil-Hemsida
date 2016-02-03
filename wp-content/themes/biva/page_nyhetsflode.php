<?php

/*
Template Name: Nyhetsflöde
*/


get_header();
$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
?>

    <div id="backdrop" <?php if (!empty($topImage)) {
        echo 'style="background-image: url(' ?><?php the_field('top-image'); ?><?php echo ')"';
    } ?>>
        <h1><?php the_title(); ?></h1>
    </div>

    <div id="content">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="col-xs-12">
                    <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                </div>
                <div class="hidden-xs col-sm-3 col-first">

                    <?php
                    $args = array(
                        'theme_location' => 'primary',
                        'start_in' => $ID_of_page,
                        'container-class' => 'main-nav',
                        'menu_class' => 'nav submenu',
                    );
                    wp_nav_menu($args);
                    ?>

                </div>

                <div class="col-xs-12 col-sm-9 news">

                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    query_posts(array('posts_per_page' => 5, 'post_type' => 'news', 'paged' => $paged));

                    if (have_posts()):
                        while (have_posts()): the_post(); ?>
                            <article class="news-item-wrapper">
                                <h1><?php the_title(); ?></h1>

                                <h3 class="date"><?php the_time('Y-m-d') ?></h3>
                                <?php the_content(); ?>
                                <p class="permalink"><a href="<?php the_permalink(); ?>">Läs mer</a></p><br>
                            </article>
                        <?php endwhile; ?>
                        <?php echo posts_nav_link(); ?>
                    <?php else : ?>
                    <?php endif;
                    wp_reset_query(); ?>

                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>