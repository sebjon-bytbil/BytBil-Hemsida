<?php
$offer = get_sub_field('offer');
if (get_sub_field('all-offers')) {
    bytbil_show_offers_all();
} else {
    bytbil_show_offer($offer);
}
?>

