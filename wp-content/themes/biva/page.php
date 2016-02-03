<?php
get_header();
$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
?>

<?php bytbil_init_slideshows(); ?>

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
            <div class="col-xs-12 col-sm-9 blocks">

                <?php while (have_posts()) : the_post(); ?>

                    <?php if (!get_field('setting-hide-page-header')): ?>
                        <h1><?php the_title(); ?></h1>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-xs-12">
                            <?php the_content(); //bytbil_block_loop(); ?>

                            <?php if (have_rows('content-button')): ?>
                                <div class="linkbuttons">
                                    <?php while (have_rows('content-button')): the_row(); ?>
                                        <a class="button" href="<?php the_sub_field('content-button-url'); ?>"
                                           target="<?php the_sub_field('content-button-target'); ?>"><?php the_sub_field('content-button-text'); ?>
                                            <i class="fa fa-angle-right"></i></a>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>
        </div>
    </div>
</div>
</div>

<?php require_once('bottom-plugs.php'); ?>

<?php require_once('brands.php'); ?>

<?php get_footer(); ?>
