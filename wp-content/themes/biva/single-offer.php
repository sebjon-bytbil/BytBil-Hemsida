<?php

get_header();

$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
$postType = get_post_meta($post->ID, 'offer-type', true);
$type = $_GET["type"];
$city = $_GET["city"];
?>

<?php
    $offer_active = false;
    $start_date = 0;
    $stop_date = 0;

    if (have_posts()) : while (have_posts()) : the_post();

        $current_date = date("Ymd");

        $start_date = get_field('offer-date-start');
        $stop_date = get_field('offer-date-stop');

        if( ($start_date <= $current_date || !$start_date) && ($stop_date >= $current_date || !$stop_date) ) {
            $offer_active = true;
        } else {
            $offer_active = false;
        }

    endwhile; endif;
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
                <div class="contentcontainer2"></div>

            </div>

            <div class="hidden-xs col-sm-3 col-first">

                <?php
                $args = array(
                    'theme_location' => 'primary',
                    'start_in' => $ID_of_page,
                    'container-class' => 'main-nav',
                    'menu_class' => 'nav submenu',
                );

                //wp_nav_menu($args);
                ?>

                <ul class="nav submenu">
                    <li <?php if ($postType == 'car') {
                        echo 'class="current"';
                    } ?>>
                        <a href="../../kampanjer/personbilar/">Bilkampanjer</a></li>
                    <li <?php if ($postType == 'transport') {
                        echo 'class="current"';
                    } ?>>
                        <a href="../../kampanjer/transportbilar/">Transportbilar</a></li>
                    <li <?php if ($postType == 'other') {
                        echo 'class="current"';
                    } ?>>
                        <a href="../../kampanjer/ovriga-erbjudanden/">Övriga erbjudanden</a></li>
                </ul>

            </div>

            <div class="col-xs-12 col-sm-9 offer">

                <?php

                if($offer_active == true) {

                    if (have_posts()) : while (have_posts()) : the_post();

                        $image = get_field('offer-image');

                        ?>
                        <div class="offer-container offertype-<?php echo $postType;
                        $attachment = get_post_field('offer-file') ?>">
                            <img src="<?php echo $image['url']; ?>"/>

                            <h2><?php the_field('offer-headline'); ?></h2>
                            <?php the_field('offer-description'); ?>

                            <div class="linkbuttons">
                                <p>
                                    <?php if (!empty($attachment)) { ?>
                                        <a class="button" href="<?php the_field('offer-file') ?>" target="_blank">Se PDF-annons <i class="fa fa-angle-right"></i></a>
                                    <?php } ?>

                                    <?php if (have_rows('offer-links')): ?>
                                        <?php while (have_rows('offer-links')): the_row(); ?>

                                            <?php
                                                $link_url = "";
                                                $link_type = get_sub_field('offer-link-type');
                                                if($link_type == "internal") {
                                                    $link_url = get_sub_field('offer-link-internal');
                                                }
                                                else if($link_type == "external") {
                                                    $link_url = get_sub_field('offer-link-external');
                                                }
                                                else if($link_type == "file") {
                                                    $link_url = get_sub_field('offer-link-file');
                                                    $link_url = $link_url['url'];
                                                }
                                            ?>

                                            <a class="button" href="<?php echo $link_url; ?>" target="<?php the_sub_field('offer-link-target'); ?>"><?php the_sub_field('offer-link-text'); ?> <i class="fa fa-angle-right"></i></a>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                        <?php

                    endwhile; endif;

                } else {
                ?>
                    <h2 style="padding-top: 10px;">Erbjudandet har upphört</h2>
                    Detta erbjudande gick ut <?php echo date( "Y-m-d", strtotime( $stop_date ) ); ?>.
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>

<?php require_once('bottom-plugs.php'); ?>

<?php require_once('brands.php'); ?>

<script>
    $("ul.nav li#menu-item-164").addClass('current-menu-item');
</script>

<?php get_footer(); ?>
