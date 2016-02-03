<?php
$facility_infos = get_sub_field('content-facility-information');
foreach ($facility_infos as $facility_info) {
    $GLOBALS["facility_info"] = $facility_info;
    if ($facility_info == 'all') {
        if($size == 12){
            bytbil_show_facility_all($facility->ID);
        }
        else {
            bytbil_show_facility_compact($facility->ID);
        }
        $init_map = true;
        $mapzoom = get_sub_field('content-facility-map-zoom');

    } elseif ($facility_info == 'address') {
        bytbil_show_facility_address($facility->ID);
    } elseif ($facility_info == 'other-address') {
        bytbil_show_other_facility_address($facility->ID);
    } elseif ($facility_info == 'phonenumber') {
        bytbil_show_facility_phonenumbers($facility->ID);
    } elseif ($facility_info == 'email') {
        bytbil_show_facility_emails($facility->ID);
    } elseif ($facility_info == 'contact') {
        bytbil_show_facility_contact($facility->ID);
    } elseif ($facility_info == 'openhours') {
        bytbil_show_facility_openhours($facility->ID, false, get_sub_field("content-facility-view-option"));
    } elseif ($facility_info == 'map') {
        $mapmode = get_sub_field("content-map-mode");
        bytbil_show_facility_map($facility->ID);
        $init_map = true;
    }

}
?>
