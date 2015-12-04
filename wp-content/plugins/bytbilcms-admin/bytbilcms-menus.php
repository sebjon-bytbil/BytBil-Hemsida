<?php
function remove_menus()
{
    remove_menu_page('edit.php');                   //Posts
    remove_menu_page('edit-comments.php');          //Comments
    add_menu_page('Menyer', 'Menyer', 'edit_theme_options', 'nav-menus.php', '', null, 21);

    // Läs in menyförändringar för användarroll USER
    if (bytbil_check_user_role('anvandare')) {
        remove_menu_page('themes.php');
        remove_menu_page('profile.php');
        remove_menu_page('options-general.php');
        remove_menu_page('edit.php?post_type=acf');
        //remove_menu_page('edit.php?post_type=sitesettings');
        remove_menu_page('wpcf7');
        remove_menu_page('gadash_settings');
        remove_menu_page('tools.php');
        remove_menu_page('users.php');
    } else if (bytbil_check_user_role('priviligerad')) {
        remove_menu_page('users.php');
        remove_menu_page('themes.php');
        remove_menu_page('profile.php');
        remove_menu_page('options-general.php');
        remove_menu_page('edit.php?post_type=acf');
        remove_menu_page('tools.php');
    }
}

add_action('admin_menu', 'remove_menus', PHP_INT_MAX - 10);
?>