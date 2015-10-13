<?php
/* Set pagesettings */

if($scroll==true){
    $use_sub_menu = true;
} else {
    $use_sub_menu = get_field('page-settings-menu');
}




/* Begin Rows */
if (get_field('row')) {
    while (have_rows('row')) {
        the_row();


        $row_section = get_sub_field('row-settings-section');
        $row_menu_title = get_sub_field('row-settings-menu-header');
        
        if($row_section){
            
            global $post;
            global $backup_post;
            $backup_post = $post;
            
            foreach($row_section as $section){
                $post = get_post($section->ID);
                setup_postdata($post);
                if ($use_sub_menu) {
                    $nestedSection = true;
                }
                require 'content-loop.php';
                wp_reset_postdata();
                $nestedSection = false;
            }
        }
        else {
            require 'regular-loop.php';

        }

    }
}

?>
