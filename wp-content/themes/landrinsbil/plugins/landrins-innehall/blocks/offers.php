<?php
$offer_choice = get_sub_field('content-offers-choice');
if ($offer_choice == 'specific') {
    $offer = get_sub_field('content-offer-specific');
    bytbil_show_offer($offer->ID, $size);
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
    bytbil_show_offers_all($col_size);
}
?>