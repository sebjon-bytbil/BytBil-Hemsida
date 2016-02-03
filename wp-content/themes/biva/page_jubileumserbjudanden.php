<?php


/*
Template Name: Biva Jubileumserbjudanden
*/


get_header();

$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);

$brands = $_GET["brands"];
$city = $_GET["city"];
$cityBig = '';
$brandsBig = '';

switch ($city) {
    case "orebro":
        $cityBig = 'Örebro';
        break;
    case "borlange":
        $cityBig = 'Borlänge';
        break;
    case "linkoping":
        $cityBig = 'Linköping';
        break;
    case "karlskoga":
        $cityBig = 'Karlskoga';
        break;
    case "falun":
        $cityBig = 'Falun';
        break;
    case "norrkoping":
        $cityBig = 'Norrköping';
        break;
    case "uppsala":
        $cityBig = 'Uppsala';
        break;
}

switch ($brands) {
    case "kia":
        $brandsBig = 'Kia';
        break;
    case "opel":
        $brandsBig = 'Opel';
        break;
    case "alfa-romeo":
        $brandsBig = 'Alfa Romeo';
        break;
    case "bmw":
        $brandsBig = 'BMW';
        break;
    case "chevrolet":
        $brandsBig = 'Chevrolet';
        break;
    case "jeep":
        $brandsBig = 'Jeep';
        break;
    case "lancia":
        $brandsBig = 'Lancia';
        break;
    case "nissan":
        $brandsBig = 'Nissan';
        break;
    case "subaru":
        $brandsBig = 'Subaru';
        break;
    case "saab":
        $brandsBig = 'SAAB';
        break;
}


$slug = sanitize_title(get_the_title(), $fallback_title);

if ($slug == 'personbilar') {
    $type = 'car';
} else if ($slug == 'ovriga-erbjudanden') {
    $type = 'misc';
} else if ($slug == 'transportbilar') {
    $type = 'carrier';
} else {
    $type = '';
}

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
            <div class="hidden-xs col-sm-3 col-first menu-column">

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

            <div class="col-xs-12 col-sm-9 offer offer-select-header">

                <div class="container-fluid no-padding no-margin">
                    <?php
                    $id = 2494;
                    $jubpost = get_post($id);
                    $content = apply_filters('the_content', $jubpost->post_content);
                    echo $content;
                    ?>
                </div>

                <div class="container-fluid no-padding no-margin">

                    <?php

                    if (!empty($brands) AND !empty($city)) {
                        $args = array(
                            'post_type' => 'erbjudande',
                            'meta_key' => 'erbjudande-type',
                            'meta_value' => $type,
                            'tax_query' => array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => 'brands', //or tag or custom taxonomy
                                    'field' => 'name',
                                    'terms' => array($brands)
                                ),
                                array(
                                    'taxonomy' => 'anlaggning', //or tag or custom taxonomy
                                    'field' => 'name',
                                    'terms' => array($city)
                                )
                            )
                        );
                    } else if (!empty($brands)) {
                        $args = array(
                            'post_type' => 'erbjudande',
                            'meta_key' => 'erbjudande-type',
                            'meta_value' => $type,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'brands', //or tag or custom taxonomy
                                    'field' => 'name',
                                    'terms' => array($brands)
                                )
                            )
                        );
                    } else if (!empty($city)) {
                        $args = array(
                            'post_type' => 'erbjudande',
                            'meta_key' => 'erbjudande-type',
                            'meta_value' => $type,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'anlaggning', //or tag or custom taxonomy
                                    'field' => 'name',
                                    'terms' => array($city)
                                )
                            )
                        );
                    } else {
                        $args = array(
                            'post_type' => 'erbjudande',
                            'meta_key' => 'erbjudande-type',
                            'meta_value' => $type,
                        );
                    }

                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post(); ?>

                        <?php
                        $showoffer = false;
                        $datecontrol = get_post_meta($post->ID, 'erbjudande-datecontrol', true);
                        $jubileum = get_post_meta($post->ID, 'erbjudande-jubileum', true);

                        if ($datecontrol == "ja") {
                            $startdate = get_post_meta($post->ID, 'erbjudande-date-start', true);

                            if (date('Ymd') >= $startdate) {
                                $stopdate = get_post_meta($post->ID, 'erbjudande-date-stop', true);
                                if (date('Ymd') <= $stopdate) {
                                    //visa slide

                                    $showoffer = true;
                                }
                            }
                        } else {
                            $showoffer = true;
                        }

                        ?>

                        <?php
                        /* Jubileum */


                        if ($jubileum == 1) {
                            $showoffer = true;
                        } else {
                            $showoffer = false;
                        }

                        if ($showoffer == true) { ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 column erbjudanden">
                                <a class="block-link" href="<?php the_permalink(); ?>">
                                    <div class="offer-column-image">
                                        <img src="<?php the_field('erbjudande-puffimage'); ?>"/>
                                    </div>
                                    <div
                                        class="offer-column offertype-<?php $postmeta = get_post_meta($post->ID, 'erbjudande-type', true);
                                        echo $postmeta; ?>">
                                        <h4><?php the_field('erbjudande-header') ?></h4>

                                        <p>
                                            <?php the_field('erbjudande-excerpt'); ?>

                                        </p>
                                        <span class="button">Se erbjudandet <i class="fa fa-angle-right"></i></span>
                                    </div>
                                </a>
                            </div>

                        <?php } endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="bottom-plugs">
    <div class="wrapper">
        <div class="container-fluid offer">                    <!-- Vi erbjuder dig -->
            <div class="col-xs-12 col-md-6 column-double">
                <?php echo do_shortcode('[slider name=Erbjudanden]'); ?>
            </div>

            <?php
            if (have_rows('puff', 49)):
                while (have_rows('puff', 49)): the_row(); ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 column">
                        <a href="<?php the_sub_field('puff-link'); ?>"
                           class="offer-text <?php the_sub_field('puff-colour'); ?>">
                            <h4><?php the_sub_field('puff-header'); ?></h4>
                            <img src="<?php the_sub_field('puff-image'); ?>"/>

                            <p><?php the_sub_field('puff-message'); ?></p>
                            <button><?php the_sub_field('puff-linklabel'); ?>&nbsp;&nbsp;<i
                                    class="fa fa-angle-right"></i></button>
                        </a>
                    </div>
                <?php endwhile;
            else :
            endif;
            ?>
        </div>
    </div>
</div>

<div id="brands" class="hidden-xs">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12">
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
