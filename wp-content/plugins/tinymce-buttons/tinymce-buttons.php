<?php
/**
 * Plugin Name: Upplands Motor Knappar
 * Description:
 * Plugin URI:
 * Version:     0.0.1
 * Author:      Frank Bültge
 * Author URI:  http://bueltge.de
 * License:     GPLv2
 * License URI: ./assets/license.txt
 * Text Domain:
 * Domain Path: /languages
 * Network:     false
 */


add_action( 'admin_head', 'um_add_tinymce' );
function um_add_tinymce() {
    global $typenow;

    // only on Post Type: post and page
    if( ! in_array( $typenow, array( 'post', 'page', 'slideshow', 'vehicle', 'offer', 'section', 'warranties') ) )
        return ;

    add_filter( 'mce_external_plugins', 'um_add_tinymce_plugin' );
    // Add to line 1 form WP TinyMCE
    add_filter( 'mce_buttons', 'um_add_tinymce_button' );
}

// inlcude the js for tinymce
function um_add_tinymce_plugin( $plugin_array ) {

    $plugin_array['um_buttons'] = plugins_url( '/tinymce-buttons.js', __FILE__ );
    // Print all plugin js path
    return $plugin_array;
}

// Add the button key for address via JS
function um_add_tinymce_button( $buttons ) {

    array_push( $buttons, 'actionbutton_button' );
    array_push( $buttons, 'icon_button' );
    // Print all buttons
    return $buttons;
}

function um_add_editor_styles() {
    add_editor_style( plugins_url( '/tinymce-buttons.css', __FILE__ ));
}
add_action( 'init', 'um_add_editor_styles' );


?>
