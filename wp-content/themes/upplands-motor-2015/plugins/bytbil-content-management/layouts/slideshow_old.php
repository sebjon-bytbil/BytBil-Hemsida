<?php
$slideshow_type = get_sub_field('content-slideshow-type');

switch($slideshow_type){
    case 'existing':
        $slideshow_object = get_sub_field('content-existing-slideshow');

        if (function_exists("bytbil_show_slideshow")) {
            bytbil_show_slideshow($slideshow_object->ID, $row_width);
        }
    break;

    case 'offers':
        $slideshow_offers = get_sub_field('content-slideshow-offers');

        if($slideshow_offers == 'automatic'){
            $offer_brands = get_sub_field('content-slideshow-brand');
            $offer_facilities = get_sub_field('content-slideshow-facility');
            $offer_type = get_sub_field('content-slideshow-offer-type');
        }

        elseif($slideshow_offers == 'specific'){
            $offer_specific = get_sub_field('content-slideshow-offers-specific');
            $offers_choice = $offer_specific;
        }

        get_offer_slideshow($page_id, $offers_choice, $offer_brands, $offer_facilities, $offer_type);


    break;

    case 'models':
        $slideshow_models = get_sub_field('content-slideshow-model');
        get_model_slideshow($page_id, $slideshow_models);
    break;
}
?>
