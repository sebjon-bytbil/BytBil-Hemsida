<?php

$slideshow_object = $content['content-existing-slideshow'];

if (function_exists("bytbil_show_slideshow")) {
    bytbil_show_slideshow($slideshow_object->ID, $row_width);
}

?>
