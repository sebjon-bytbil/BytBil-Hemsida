<?php

/*
Template Name: Enskild nyhet
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


                <?php if (have_posts()) while (have_posts()) : the_post(); ?>

                    <div id="news-article">
                        <div id="news-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h2 class="entry-title"><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>

                        <div id="nav-below" class="navigation">
                            <div class="nav-previous"><?php previous_post_link('%link', '&laquo; %title'); ?></div>
                            <div class="nav-next"><?php next_post_link('%link', '%title &raquo;'); ?></div>
                            <div class="clear"></div>
                        </div>
                        <!-- #nav-below -->
                    </div>

                <?php endwhile; // end of the loop. ?>

            </div>
        </div>
    </div>

<?php get_footer(); ?>