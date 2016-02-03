<?php
get_header();
?>

<main>
    <div class="container-fluid no-padding no-child-padding">
        <div class="col-xs-12 col-sm-9 facilities">
            <div class="content-block facilities">
                <?php get_facility_card($post->ID); ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 offer">
            <div class="content-block offer">
                <h2>Erbjudanden</h2>

                <div class="offer-slider-wrapper">
                    <ul class="slides">
                        <?php
                        $fac_offers = get_facility_offers($post->ID);
                        $all_offers = facility_get_all_offers(3);

                        if (count($fac_offers) >= 3) {
                            $fac_count = 3;
                            $all_count = 0;
                        } else if (count($fac_offers) < 3) {
                            $fac_count = count($fac_offers);
                            $all_count = 3 - count($fac_offers);

                            foreach ($all_offers as $k => $offer) {
                                if (in_array($offer, $fac_offers)) {
                                    array_splice($all_offers, $k, 1);
                                }
                            }

                            if (count($all_offers) < $all_count) {
                                $all_count = count($all_offers);
                            }
                        }


                        ?>


                        <?php for ($i = 0; $i < $fac_count; $i++) : ?>
                            <li><?php show_offer_slide($fac_offers[$i]); ?></li>
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < $all_count; $i++) : ?>
                            <li><?php show_offer_slide($all_offers[$i]); ?></li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <script>
                    $(document).ready(function () {
                        $('.offer-slider-wrapper').flexslider();
                    });
                </script>
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 offer">
            <div class="content-block offer">
                <?php $form = get_field("facility_contact-form") ?>
                <?php $title = get_the_title(); ?>
                <h2>Vill du bli kontaktad?</h2>
                <?php echo do_shortcode("[contact-form-7 id='{$form->ID}' title='{$title}']") ?>
            </div>
        </div>
    </div>


<?php get_footer(); ?>