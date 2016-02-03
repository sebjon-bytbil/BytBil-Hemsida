<?php

/*
Template Name: Biva Accesspaket
*/

get_header();

$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
$post_object = get_field('assortment-choice');

if ($post_object):
    $post = $post_object;
    setup_postdata($post);

    $criteriastring = get_field('assortment-string');
    $showpage = get_field('assortment-type');
    ?>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>

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

            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="container-fluid">

        <?php bytbil_show_assortment(get_field('fordonsurval')->ID); ?>

    </div>


</div>

<?php require_once('bottom-plugs.php'); ?>

<?php require_once('brands.php'); ?>

<?php get_footer(); ?>
