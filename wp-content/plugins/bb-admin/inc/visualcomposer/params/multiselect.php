<?php
add_action('init', 'bb_add_multiselect', 10, 0);

function bb_add_multiselect()
{
    add_shortcode_param('multiselect', 'bb_param_multiselect');
}

function bb_param_multiselect($settings, $value)
{
    $output = '';
    $output .= '<select multiple name="'
        . $settings['param_name']
        . '" class="wpb_vc_param_value wpb-input wpb-select '
        . $settings['param_name']
        . ' ' . $settings['type'] . '">';

    $value = explode(",", $value);

    $args = array(
        'post_type' => $settings['post_type'],
        'post_status' => 'publish',
        'posts_per_page' => -1
    );
    $posts = get_posts($args);
    foreach ($posts as $post) {
        $option_label = $post->post_title;
        $option_value = $post->ID;

        $selected = '';
        if (in_array($option_value, $value)) {
            $selected = ' selected="selected"';
        }

        $output .= '<option value="' . $option_value . '"' . $selected . '>'
            . $title_prefix . ' ' . $option_label . '</option>';
    }

    $output .= '</select>';

    return $output;
}
?>
