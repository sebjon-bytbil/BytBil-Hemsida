<?php
$plugs = get_sub_field('content-plugs');
foreach ($plugs as $plug) {
    bytbil_show_plug($plug->ID, $size);
}
?>