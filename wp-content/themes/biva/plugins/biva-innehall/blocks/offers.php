<?php
$offer_choice = get_sub_field('content-offers-choice');
if ($offer_choice == 'specific') {
    $offer = get_sub_field('content-offer-specific');
    //bytbil_show_offer($offer->ID, $size);
    echo "Test";
} elseif ($offer_choice == 'brand') {
    $col_size = get_sub_field('content-offer-col-size');
    $brand = get_sub_field('content-offer-brand');
    bytbil_show_offers_brand($brand, $col_size);
} elseif ($offer_choice == 'facility') {
    $col_size = get_sub_field('content-offer-col-size');
    $facility = get_sub_field('content-offer-facility');
    bytbil_show_offers_facility($facility, $col_size);
} elseif ($offer_choice == 'all') {
    $col_size = get_sub_field('content-offer-col-size');

    $args = array('post_type' => 'erbjudande', 'posts_per_page' => 10);

    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();
        ?>

        <div class="col-xs-12 col-sm-<?php echo $col_size ?> col-md-<?php echo $col_size ?> column erbjudanden">

            <a class="block-link" href="<?php echo get_post_permalink(); ?>">
                <div class="offer-column-image">
                    <img src="<?php the_field('erbjudande-puffimage'); ?>">
                </div>
                <div class="offer-column offertype-car">
                    <h4><?php the_field('erbjudande-header'); ?></h4>

                    <p>
                        <?php the_field('erbjudande-excerpt'); ?><br>
                    </p>
                    <span class="button" href="<?php echo get_post_permalink(); ?>">Se erbjudandet <i
                            class="fa fa-angle-right"></i></span>
                </div>
            </a>
        </div>

    <?php endwhile;
}
?>