<?php
add_action('network_admin_menu', 'bytbil_create_options');

function bytbil_create_options()
{
    add_submenu_page('settings.php', 'BytBil Inställningar', 'BytBil', 'manage_networks', 'bytbil-settings', 'bytbil_add_optionspage');
}

function bytbil_add_optionspage()
{
    include('bytbil_optionspage.php');
}

?>