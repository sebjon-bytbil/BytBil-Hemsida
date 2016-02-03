<?php
/**
 * Plugin Name: Bra Bil Knappar
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

function brabil_add_tinymce()
{
    global $typenow;

    if(!in_array($typenow, array('post', 'page', 'offer')))
        return;

    add_filter('mce_external_plugins', 'brabil_add_tinymce_plugin');
    add_filter('mce_buttons', 'brabil_add_tinymce_button');
}
add_action('admin_head', 'brabil_add_tinymce');

// Include the js for tinymce
function brabil_add_tinymce_plugin($plugin_array)
{
    $plugin_array['brabil_buttons'] = get_template_directory_uri() . '/includes/tinymce-buttons/tinymce-buttons.js';

    return $plugin_array;
}

// Add the button key for address via JS
function brabil_add_tinymce_button($buttons)
{
    array_push($buttons, 'button_button');
    array_push($buttons, 'icon_button');

    return $buttons;
}

function brabil_add_editor_styles()
{
    add_editor_style(get_template_directory_uri() . '/includes/tinymce-buttons/tinymce-buttons.css');
}
add_action('init', 'brabil_add_editor_styles');

?>
