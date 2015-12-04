<?php
function brabil_imageslider_params($params)
{
    bb_remove_item_from_params(array('overlay_dotted', 'slider_speed', 'slider_animation_speed', 'start_date', 'stop_date'), $params);

    return $params;
}
add_filter('bb_alter_imageslider_params', 'brabil_imageslider_params');
?>
