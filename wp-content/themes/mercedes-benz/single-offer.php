<?php
get_header();
?>

<main>
    <div class="container-fluid no-padding no-child-padding">
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
            $offer_image = get_field('offer_image');
            $offer_date_start = get_field('offer_date-start');
            $offer_date_stop = get_field('offer_date-stop');
            ?>
            <div class="col-xs-12">
                <section id="content">
                    <img src="<?php echo $offer_image['url']; ?>">

                    <div class="content-block">

                        <div class="col-xs-12 col-sm-9">
                            <h1><?php the_title(); ?></h1>

                            <p>
                                <?php echo get_field('offer_description'); ?>
                            </p>
                            <?php if ($offer_date_stop != false) { ?>
                                <span class="valid-to">
                                    	Erbjudandet gäller tom: <?php echo $offer_date_stop ?>.
                                    </span>
                            <?php } ?>


                        <?php

                            if (get_field('content')) : ?>
                            <div class="content no-padding no-child-padding">
                            <?php
                            while (have_rows('content')) : the_row();

                            $content_type = get_sub_field('content_type');
                            $content_size = get_sub_field('content_size');
                            $block_container = '';
                            $hide_block_container = get_sub_field('content_hide-block-container');
                            $hide_block_title = get_sub_field('content_hide-header');

                                if ($hide_block_container == 1) {
                                    $block_container = 'no-container';
                                }

                            ?>

                            <div class="col-xs-12 col-sm-<?php echo $content_size . ' ' . $content_type ?>">
                                <div class="content-block <?php echo $content_type . ' ' . $block_container; ?>">

                                    <?php if ($content_type == 'assortment'): ?>
                                    <?php
                                        $assortment = get_sub_field('content_assortment');
                                        bytbil_show_assortment_page($assortment->ID);
                                    ?>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('content_header')): ?>
                                    <?php if ($hide_block_title != 1) { ?>
                                    <h2><?php echo get_sub_field('content_header'); ?></h2>
                                    <?php } ?>
                                    <?php endif; ?>

                                    <?php if ($content_type == 'wysiwyg'): ?>
                                    <?php echo get_sub_field('content_wysiwyg'); ?>
                                    <?php endif; ?>

                                    <?php if ($content_type == 'image'): ?>
                                    <?php $content_image = get_sub_field('content_image'); ?>
                                    <img src="<?php echo $content_image['url']; ?>"/>
                                    <?php endif; ?>

                                    <?php if ($content_type == 'af-menu'): ?>
                                    <?php get_af_menu(); ?>
                                    <?php endif; ?>

                                    <?php if ($content_type == 'form'): ?>
                                    <?php
    $form_content = get_sub_field('content_form');
                                    ?>
                                    <?php get_af_form($form_content->ID); ?>
                                    <?php endif; ?>


                                    <?php if ($content_type == 'facilities'): ?>
                                    <?php
                                        if ($content_facility != 'all') {
                                            $facility = get_sub_field('content_facilities_facility');
                                        }
                                        $content_facility = get_sub_field('content_facilities');
                                        if ($content_facility == 'specific') {
                                            get_facility_card($facility->ID);
                                        } elseif ($content_facility == 'all') {
                                        } elseif ($content_facility == 'map') {
                                        } elseif ($content_facility == 'contact') {
                                        } elseif ($content_facility == 'openhours') {
                                        } elseif ($content_facility == 'employees') {
                                            echo '<div class="col-xs-12 employees">';
                                            get_facility_employees($facility->ID);
                                            echo '</div>';
                                        }
                                    ?>
                                    <?php endif; ?>

                                    <?php if ($content_type == 'offer'): ?>
                                    <?php
                                        $offer_type = get_sub_field('content_offers');
                                        $offer_facility = get_sub_field("content_offer_facility");
                                        $use_offer_facility = get_sub_field("content_use_offer_facility");

                                        if ($offer_type == 'all') {
                                            get_all_offers();
                                        } elseif ($offer_type == 'slider') {
                                            if ($use_offer_facility && $offer_facility) {
                                                get_facility_offer_slider($offer_facility->ID);
                                            } else {
                                                get_offer_slider();
                                            }

                                        }
                                    ?>

                                    <?php endif; ?>

                                </div>
                            </div>

                        <?php endwhile; endif; ?>
                        </div>
                        </div>


                        <div class="col-xs-12 col-sm-3">
                            <ul class="offer-links">
                                <?php while (have_rows('offer_links')) {
                                    the_row();

                                    $offer_type = get_sub_field('offer_link-type');

                                    $target = get_sub_field("offer_link-target");

                                    if ($offer_type == "internal"){
                                        $offer_page = get_sub_field('offer_link-page');
                                        $offer_url = get_permalink($offer_page->ID);
                                    }
                                    elseif($offer_type == "external"){
                                        $offer_url = get_sub_field('offer_link-url');
                                    }
                                    elseif($offer_type == "file"){
                                        $offer_file = get_sub_field('offer_link-file');
                                        $offer_url = $offer_file['url'];
                                    }

                                    ?>
                                    <li class="offer-link">
                                        <a class="button" href="<?php echo $offer_url; ?>"
                                            <?php if ($target == "lightbox") : ?> data-lightbox <?php elseif ($target != false) : ?> target="<?php echo $target; ?>" <?php endif; ?>
                                            >
                                            <i class="fa <?php echo get_sub_field('offer_link-icon'); ?>"></i> <?php echo get_sub_field('offer_link-text'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        <?php
        endwhile; endif;
        ?>


    </div>


<?php get_footer(); ?>
