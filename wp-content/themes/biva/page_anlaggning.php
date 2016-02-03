<?php

/*
Template Name: Enskild anläggning
*/

get_header();

$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
$title = get_the_title();
$title = str_replace("Biva ", "", $title);
$city = strtolower($title);
$vowels = array("Å", "Ä", "Ö", "å", "ä", "ö");
$change = array("a", "a", "o", "a", "a", "o");
$city = str_replace($vowels, $change, $city);


?>
<?php $topImage = get_post_meta($post->ID, 'top-image', true); ?>
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
            <!--<div class="hidden-xs col-sm-3 col-first">

					<?php
            $args = array(
                'theme_location' => 'primary',
                'start_in' => $ID_of_page,
                'container-class' => 'main-nav',
                'menu_class' => 'nav submenu',
            );
            wp_nav_menu($args);
            ?>

				</div>-->
            <div class="col-xs-12 col-sm-12 blocks">

                <?php while (have_posts()) : the_post(); ?>

                    <?php if (!get_field('setting-hide-page-header')): ?>
                        <h1><?php the_title(); ?></h1>
                    <?php endif; ?>

                    <div class="row">
                        <?php bytbil_block_loop(); ?>
                    </div>

                <?php endwhile; ?>

            </div>
        </div>
    </div>
</div>
<div id="brands" style="padding-top: 10px;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12 brands">
                <?php
                if (have_rows('brands', 49)):
                    while (have_rows('brands', 49)): the_row(); ?>
                        <a href="<?php the_sub_field('brand-link'); ?>"
                           title="Besök <?php the_sub_field('brand-name'); ?>s hemsida" target="_blank">
                            <img src="<?php the_sub_field('brand-logotype'); ?>"
                                 alt="Besök <?php the_sub_field('brand-name'); ?>s hemsida">
                        </a>
                    <?php endwhile;
                else :
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
