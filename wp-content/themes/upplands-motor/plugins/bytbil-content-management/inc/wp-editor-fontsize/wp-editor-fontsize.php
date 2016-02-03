<?php
/*
Plugin Name: EditorFontsize
Plugin URI: https://github.com/kubenstein/wp-editor-fontsize
Description: Add font size dropdown menu to tinyMCE content editor
Version: 1.0
Author: kubenstein
Author URI: https://github.com/kubenstein
Tags: admin, tinymce, fontsize, size, font, editor
*/

// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
    function wpex_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "10px 14px 15px 16px 18px 20px 24px 28px 32px 36px 42px 54px 72px";
        return $initArray;
    }
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );

function wp_editor_fontsize_filter( $options ) {
    array_shift( $options );
    array_unshift( $options, 'fontsizeselect');
    array_unshift( $options, 'formatselect');
    return $options;
}
add_filter('mce_buttons_2', 'wp_editor_fontsize_filter');



