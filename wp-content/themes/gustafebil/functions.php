<?php
/* Vendor */
include plugin_dir_path(__FILE__) . '../../mu-plugins/acf-repeater-collapser/acf_repeater_collapser.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/advanced-custom-fields/acf.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/acf-repeater/acf-repeater.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/advanced-custom-fields-code-area-field/acf-code_area.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/advanced-custom-fields-font-awesome/acf-font-awesome.php';
//include plugin_dir_path(__FILE__) . '../../mu-plugins/google-analytics-dashboard-for-wp/gadwp.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/mce-table-buttons/mce_table_buttons.php';
/* BytBil */
include plugin_dir_path(__FILE__) . '../../mu-plugins/bytbilcms-admin/bytbilcms-admin.php';
require_once(plugin_dir_path(__FILE__) . "../../mu-plugins/BBCore/BBCore.php");
/* Plugin Includes */
include 'plugins/wp_bootstrap_navwalker.php';
include 'plugins/breadcrumb.php';
include 'plugins/acf-options-page/acf-options-page.php';
include 'plugins/wp-media-library-categories/index.php';
//include 'plugins/bytbil-bildspel/bytbil-bildspel.php';
include 'plugins/bytbil-bildspel/bytbil-bildspel-2.php';
include 'plugins/bytbil-puffar/bytbil-puffar.php';
include 'plugins/bytbil-anlaggning/bytbil-anlaggning.php';
include 'plugins/bytbil-personal/bytbil-personal.php';
include 'plugins/bytbil-innehall/bytbilcms-innehall.php';
include 'plugins/bytbil-fordonsurval/bytbil-fordonsurval.php';
include 'plugins/bytbil-marken/bytbil-marken.php';
include 'plugins/bytbil-erbjudanden/bytbil-erbjudanden.php';
include 'plugins/custom-editor-styles/custom-editor-styles.php';
include 'plugins/iframe/iframe.php';

/* Registrera Menyer */
function gustafebil_register_theme_menu()
{
    register_nav_menu(
        'primary', 'Huvudmeny'
    );
    register_nav_menus(array(
        'about' => 'Om företaget',
        'contact' => 'Kontakta oss',
        'footer' => 'Sidfot',
    ));
}
add_action('init', 'gustafebil_register_theme_menu');



/* Settings */
if (function_exists('acf_set_options_page_title')) {
    acf_set_options_page_title('Alternativ');
    acf_add_options_sub_page('Inställningar');

    if (current_user_can('manage_options')) {
        acf_add_options_sub_page('Konton');
    }
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_installningar',
        'title' => 'Inställningar',
        'fields' => array (
            array (
                'key' => 'field_1425287542423',
                'label' => 'Utseende',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_1425273607008',
                'label' => 'Sidhuvud',
                'name' => 'header-logotype',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_1425287523933',
                'label' => 'Sidfot',
                'name' => 'footer-logotype',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_551a5633584c8',
                'label' => 'Egen kod',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_551a564b584c9',
                'label' => 'HTML',
                'name' => 'settings-html',
                'type' => 'code_area',
                'language' => 'htmlmixed',
                'theme' => 'solarized',
            ),
            array (
                'key' => 'field_551a5666584ca',
                'label' => 'CSS',
                'name' => 'settings-css',
                'type' => 'code_area',
                'language' => 'css',
                'theme' => 'solarized',
            ),
            array (
                'key' => 'field_551a5679584cb',
                'label' => 'Javascript',
                'name' => 'settings-js',
                'type' => 'code_area',
                'language' => 'javascript',
                'theme' => 'solarized',
            ),
            array (
                'key' => 'field_551a5510584c7',
                'label' => 'SEO',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_551a577dd1d36',
                'label' => 'Title',
                'name' => 'settings-title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => 60,
            ),
            array (
                'key' => 'field_551a578ed1d37',
                'label' => 'META Description',
                'name' => 'settings-meta-description',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => 160,
                'rows' => '',
                'formatting' => 'br',
            ),
            array (
                'key' => 'field_551a57b0d1d38',
                'label' => 'META Keywords',
                'name' => 'settings-meta-keywords',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => 60,
            ),
            array (
                'key' => 'field_551a55ce584a2',
                'label' => 'Mobilmeny',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_551a90119b76d',
                'label' => 'Telefonnummer',
                'name' => 'setting-mobile-numbers',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_551a902e9b76e',
                        'label' => 'Anläggning',
                        'name' => 'setting-mobile-numbers-facility',
                        'type' => 'post_object',
                        'column_width' => '',
                        'post_type' => array (
                            0 => 'facility',
                        ),
                        'taxonomy' => array (
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till nummer',
            ),
            array (
                'key' => 'field_551a55813c12a2',
                'label' => 'Övrigt',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_551a55813c12a3',
                'label' => '404-meddelande',
                'name' => 'settings-404-message',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_551a55813c12b4',
                'label' => 'Erbjudandesida',
                'name' => 'settings-offers-page',
                'type' => 'page_link',
                'post_type' => array(
                    0 => 'page',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_551a55813c1134',
                'label' => 'Nyhetssida',
                'name' => 'settings-news-page',
                'type' => 'page_link',
                'post_type' => array(
                    0 => 'page',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
				'key' => 'field_5555a4da185ed',
				'label' => 'Kontaktformulär för sidfot',
				'name' => 'contact-form-footer',
				'type' => 'acf_cf7',
				'allow_null' => 0,
				'multiple' => 0,
				'disable' => array (
					0 => 0,
				),
			),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-installningar',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
                6 => 'revisions',
                7 => 'slug',
                8 => 'author',
                9 => 'format',
                10 => 'featured_image',
                11 => 'categories',
                12 => 'tags',
                13 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_konton',
        'title' => 'Konton',
        'fields' => array (
            array (
                'key' => 'field_1425276218819',
                'label' => 'BytBil Alias',
                'name' => 'bytbil-access_alias',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_541c246262ac7',
                'label' => 'Visa Facebook-box',
                'name' => 'facebook-show',
                'type' => 'radio',
                'column_width' => '',
                'choices' => array(
                    'false' => 'Nej',
                    'true' => 'Ja',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'false',
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_551a5463837a3',
                'label' => 'Facebook kod',
                'name' => 'facebook-page',
                'type' => 'textarea',
                'default_value' => '',
                'instructions' => 'Generera din kod på <a href="https://developers.facebook.com/docs/plugins/page-plugin">https://developers.facebook.com/docs/plugins/page-plugin</a>',
                'placeholder' => '',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541c246262ac7',
                            'operator' => '==',
                            'value' => 'true',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'maxlength' => '',
                'rows' => '5',
                'formatting' => 'html',
            ),
            array(
                'key' => 'field_541c246266ec1',
                'label' => 'Instagrambox',
                'name' => 'instagram-type',
                'type' => 'radio',
                'column_width' => '',
                'choices' => array(
                    'hashtag' => 'Hashtag',
                    'user' => 'Användarnamn',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'user',
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_551a5476837a4',
                'label' => 'Instagram Hashtag',
                'name' => 'instagram-hashtag',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '#',
                'append' => '',
                'formatting' => 'none',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541c246266ec1',
                            'operator' => '==',
                            'value' => 'hashtag',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'maxlength' => '',
            ),
            array (
                'key' => 'field_551a5476836c8',
                'label' => 'Instagram Användare',
                'name' => 'instagram-user',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '@',
                'append' => '',
                'formatting' => 'none',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_541c246266ec1',
                            'operator' => '==',
                            'value' => 'user',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-konton',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
                6 => 'revisions',
                7 => 'slug',
                8 => 'author',
                9 => 'format',
                10 => 'featured_image',
                11 => 'categories',
                12 => 'tags',
                13 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}

/* End Settings */

if (function_exists('add_image_size')) {
    add_image_size('personal-320x425', 320, 425, true);
    add_image_size('personal-640x850', 640, 850, true);
}

/* Add Critierastring generator */
function bytbil_criteria_generator()
{
    wp_enqueue_script('bytbil-criteriastring', get_template_directory_uri() . '/js/bytbil-criteriastring.js');
}

add_action('admin_enqueue_scripts', 'bytbil_criteria_generator', 0);

function bytbil_show_sidebar_menu($post)
{
    $current_page_parent = $post->post_parent;
    wp_list_pages('title_li=&child_of=$current_page_parent');

}

/* EXCERPT */
function excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...<br/>';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

function content($limit)
{
    $content = explode(' ', get_the_content(), $limit);
    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }
    $content = preg_replace('/\[.+\]/', '', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

?>
