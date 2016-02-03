<?php
/*
Plugin Name: Biva Inställningar
Description: Inställingar för hemsidan.
Author: Tobias Franzén: BytBil Nordic AB
Version: 1.0.0
Author URI: http://www.bytbil.com
*/

// create custom plugin settings menu
add_action('admin_menu', 'settings_page_menu');

function __construct()
{
    add_action( 'plugins_loaded', array( $this, 'modify_menus' ) );
}

function modify_menus()
{
    // 1) Add ACF Options pages
    if( function_exists( "register_options_page" ) )
    {
        register_options_page( 'Header' );
        register_options_page( 'Footer' );
    }

    // 2) Create this plugin page
    add_action( 'admin_menu', array( $this, 'add_aux_menu' ) );

    // 3) Remove (hide) this plugin page
    add_action( 'admin_init', array( $this, 'remove_aux_menu' ) );

    // 4) Move this plugin page into ACF Options page
    // Priority here (9999) is to put the submenu at last postition
    // If the priority is removed, the submenu is put at first position
    add_action( 'admin_menu', array( $this, 'add_aux_menu_again'), 9999 );
}

function add_aux_menu()
{
    add_menu_page(
        'Dummy Page First Level',
        'Dummy Title',
        'edit_posts',
        'dummy-page-slug',
        array( $this, 'menu_page_content' )
    );
}

function menu_page_content()
{
    ?>
    <div id="icon-post" class="icon32"></div>
    <h2>Dummy Page</h2>
    <p> Lorem ipsum</p>
<?php
}

function remove_aux_menu()
{
    remove_menu_page( 'dummy-page-slug' );
}


function add_aux_menu_again()
{
    // To move into default pages, f.ex., use add_theme_page or add_options_page
    add_submenu_page(
        'acf-options-header', // <---- Destination menu slug
        'Dummy Page Second Level',
        'Dummy Page Second Level',
        'edit_posts',
        'dummy-page-slug',
        array( $this, 'menu_page_content' )
    );
}
?>