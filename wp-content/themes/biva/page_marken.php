<?php

/*
Template Name: Märken
*/

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

            <div class="col-xs-12 col-sm-12 blocks">

                <?php while (have_posts()) : the_post(); ?>

                    <?php if (!get_field('setting-hide-page-header')): ?>
                        <h1><?php the_title(); ?></h1>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-xs-12">
                            <?php the_content(); ?>

                            <br>

                            <div class="row">
                                <?php
                                $args = array(
                                    'post_type' => 'brand',
                                    'posts_per_page' => -1,
                                    'caller_get_posts'=> 1,
                                    'orderby' => 'title',
                                    'order' => 'asc',
                                );

                                $my_query = new WP_Query($args);

                                $posts_count = $my_query->found_posts;

                                if( $my_query->have_posts() ) {
                                    while ($my_query->have_posts()) : $my_query->the_post();

                                        $brand_title = get_the_title();

                                        if($brand_title != "Saab") {
                                            ?>

                                            <div class="col-xs-6 col-sm-2 col-md-2" style="text-align: center;">

                                                <a href="/kopa-bil/marken/<?php echo $post->post_name; ?>" style="display: block; position: relative; width: 100%; height: 140px; margin: 10px 0; line-height: 140px; box-shadow: 1px 1px 2px rgba(0,0,0,0.35);"
                                                   title="<?php echo get_the_title(); ?>">
                                                    <img src="<?php the_field('brand_image'); ?>" style="max-height: 120px; padding: 20px;" alt="<?php echo get_the_title(); ?>">

                                                    <i class="fa fa-angle-right" style="position: absolute; top: inherit; bottom: 10px; right: 10px; color: #444;"></i>

                                                </a>

                                            </div>

                                            <?php

                                        }
                                    endwhile;
                                }
                                ?>
                            </div>

                        </div>
                    </div>

                <?php endwhile; ?>

            </div>
        </div>
    </div>
</div>

<?php require_once('bottom-plugs.php'); ?>

<?php require_once('brands.php'); ?>

<?php get_footer(); ?>
