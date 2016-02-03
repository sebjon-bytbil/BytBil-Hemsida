<?php
$offer_choice = get_sub_field('content-offers-choice');
if ($offer_choice == 'specific') {
    $offer = get_sub_field('content-offer-specific');
    bytbil_show_offer($offer->ID, $size);
} elseif ($offer_choice == 'brand') {
    $col_size = get_sub_field('content-offer-col-size');
    $brand = get_sub_field('content-offer-brand');
    echo '<div class="row">';
    bytbil_show_offers_brands($brand, $col_size);
    echo '</div>';
} elseif ($offer_choice == 'facility') {
    echo '<div class="row">';
    $col_size = get_sub_field('content-offer-col-size');
    $facility = get_sub_field('content-offer-facility');
    bytbil_show_offers_facility($facility, $col_size);
    echo '</div>';
} elseif ($offer_choice == 'all') {
    echo '<div class="row">';
    $col_size = get_sub_field('content-offer-col-size');
    bytbil_show_offers_all($col_size);
    echo '</div>';
} elseif ($offer_choice == 'latest') {
    $col_size = get_sub_field('content-offer-col-size');
    bytbil_show_offers_latest($col_size);
} elseif ($offer_choice == 'own') {
    $offers = get_sub_field('content-offers-own');
    $col_size = get_sub_field('content-offer-col-size');
    echo '<div class="row">';
    bytbil_show_offers_own($offers, $col_size);
    echo '</div>';
}
?>
