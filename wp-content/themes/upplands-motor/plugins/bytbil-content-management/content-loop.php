<?php
/* Set pagesettings */

if($scroll==true){
    $use_sub_menu = true;
} else {
$use_sub_menu = get_field('page-settings-menu');
}

$row_counter = 1;

/* Begin Rows */
if (get_field('row')) {
    while (have_rows('row')) {
        the_row();

        $row_section = get_sub_field('row-settings-section');
        $row_menu_title = get_sub_field('row-settings-menu-header');

        if($row_section){
            require 'section-loop.php';
        }
        else {
            require 'regular-loop.php';
        }

    }
}

?>
