<?php
get_header();
?>

<main>
    <div class="container-fluid no-padding no-child-padding">
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
            $hide_header = get_field('content_hide-header');
            $hide_container = get_field('content_hide-container');

            if ($hide_container != 1) {
                ?>
                <section id="content">
            <?php
            }

            if ($hide_header != 1) {
                ?>
                <h1 <?php if ($hide_container == 1) {
                    echo 'style="color: #fff;"';
                } ?>><?php the_title(); ?></h1>
            <?php
            }

            the_content();

            if (get_field('content')) :
                while (have_rows('content')) : the_row(); ?>

                    <?php
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
            <?php if ($hide_container != 1) { ?>
                </section>
            <?php } ?>
        <?php endwhile; endif; ?>
    </div>


<?php get_footer(); ?>