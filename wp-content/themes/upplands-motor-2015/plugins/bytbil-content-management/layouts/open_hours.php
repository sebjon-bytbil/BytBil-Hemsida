<?php

$layout = get_sub_field('content-open-hours-layout');
$facilities = get_sub_field('content-open-hours-facility');
$departments = get_sub_field('content-open-hours-department');

if($layout != 'accordion'){

foreach ($facilities as $facility){
    get_open_hours($facility->ID, $layout, $departments);
}

}
elseif($layout == 'accordion') {
    get_facility_widget($page_id, $facilities, $content_width);
}

?>
