<?php if (get_field('contents')) : while (have_rows('contents')) : the_row();

    $size = get_sub_field('content-size');
    $type = get_sub_field('content-type');
    $title = get_sub_field('content-title');
    $hideForMobile = get_sub_field('setting-hide-for-mobile');
    $expandable = get_sub_field('setting-expandable');
    if (get_sub_field('content-slideshow')) {
        $slideshow = get_sub_field('content-slideshow');
    }
    if (get_sub_field('content-facility-choice')) {
        $facility = get_sub_field('content-facility-choice');
    }


    ?>

    <div class="col-xs-12 col-sm-<?php echo $size . ' ' . $type; ?> <?php $hideForMobile ? print('hidden-xs') : ''; ?> <?php $expandable ? print('expandable closed ') : ''; ?> <?php get_sub_field('setting-group') != '' ? print(get_sub_field('setting-group') . ' group') : ''; ?>" <?php $expandable ? print('data-expand="' . get_sub_field('setting-expandable-group') . '"') : ''; ?>>

        <?php if (get_sub_field('setting-hide-header') != true) { ?>
            <h3><?php get_sub_field('setting-group') != '' ? print('<span class="glyphicon glyphicon-play orange"></span> ') : ''; ?><?php echo $title; ?></h3>
        <?php } ?>

        <?php
        if ($type == 'wysiwyg') {
            the_sub_field('content-wysiwyg');
        } elseif ($type == 'slideshow') {
            if (function_exists("bytbil_show_slideshow")) {
                require "blocks/slideshow.php";
            }
        } elseif ($type == 'facility') {
            if (function_exists("bytbil_show_facility_all")) {
                require "blocks/facility.php";
            }
        } elseif ($type == 'assortment') {
            if (function_exists("bytbil_show_assortment")) {
                require "blocks/assortment.php";
            }
        } elseif ($type == 'plugs') {
            if (function_exists("bytbil_show_plug")) {
                require "blocks/plugs.php";
            }
        } elseif ($type == 'employees') {
            if (function_exists("bytbil_show_employee")) {
                require "blocks/employees.php";
            }
        } elseif ($type == 'offers') {
            //if (function_exists("bytbil_show_offer")) {
            require "blocks/offers.php";
            //}
        } elseif ($type == 'brands') {
            //if(function_exists("bytbil_show_brands")) {
            require "blocks/brands.php";
            //}
        } elseif ($type == 'socialmedia') {
            require "blocks/socialmedia.php";
        } elseif ($type == 'contactform') {
            echo "<div class='contact-form'>";
            the_sub_field('content-contact-form');
            echo "</div>";
        } elseif ($type == 'map') {
            if (function_exists("bytbil_show_map")) {
                require "blocks/map.php";
            }
        } elseif ($type == 'news') {
            if (function_exists("bytbil_show_news_feed")) {
                require "blocks/news.php";
            }
        } elseif ($type == 'html') {
            the_sub_field('content-html-code');
        }
        ?>

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

<?php endwhile; endif;
if ($init_map == true) {
    $mapzoom = $mapzoom ? intval($mapzoom, 10) : 16;
    if (function_exists("bytbil_init_facility_map")) {
        bytbil_init_facility_map($mapzoom);
    }
} ?>