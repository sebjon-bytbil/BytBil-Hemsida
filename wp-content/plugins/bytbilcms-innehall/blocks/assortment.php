<?php
$assortment = get_sub_field('content-assortment');
if ($assortment == 'list') {
    $assortment_list = get_sub_field('content-assortment-list');
    bytbil_show_assortment($assortment_list->ID);
} elseif ($assortment == 'object') {
    $assortment_object = get_sub_field('content-assortment-object');
    bytbil_show_assortment_object($assortment_object);
}
?>