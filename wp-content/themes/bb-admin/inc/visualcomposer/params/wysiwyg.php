<?php
add_action('init', 'bb_add_wysiwyg', 10, 0);

function bb_add_wysiwyg()
{
    if (function_exists('add_shortcode_param')) {
        add_shortcode_param('wysiwyg', 'bb_param_wysiwyg');
    }

    wp_register_script('wysiwyg_editor', VCADMINURL . 'assets/js/editor/wysiwyg_editor.js', array(), '1.0.0', true);
    wp_enqueue_script('wysiwyg_editor');
}

function bb_param_wysiwyg($settings, $value)
{
    $default_content = __($value, 'js_composer');

    $tinymce = '<textarea id="" class="wysiwyg">' . $default_content . '</textarea>';

    $hidden = '<input type="hidden" name="' . $settings['param_name']
              . '" class="wysiwyg-input vc_textarea_html_content wpb_vc_param_value '
              . $settings['param_name']
              . '" value="' . htmlspecialchars($default_content) . '" />';

    $output = $tinymce . $hidden;

    return $output;
}
