<?php
/* Set pagesettings */
$fields = get_fields(get_the_ID());


if($scroll==true){
    $use_sub_menu = true;
} else {
    $use_sub_menu = $fields['page-settings-menu'];
}

$rows = $fields['row'];

foreach ($rows as $row){
    $row_section = $row['row-settings-section'];
    $row_menu_title = $row['row-settings-section'];
    
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


?>
