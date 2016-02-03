<?php
/* Vendor */
include plugin_dir_path(__FILE__) . '../../mu-plugins/acf-repeater-collapser/acf_repeater_collapser.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/advanced-custom-fields/acf.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/acf-repeater/acf-repeater.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/advanced-custom-fields-code-area-field/acf-code_area.php';
include plugin_dir_path(__FILE__) . '../../mu-plugins/advanced-custom-fields-font-awesome/acf-font-awesome.php';
/*include plugin_dir_path(__FILE__) . '../../mu-plugins/google-analytics-dashboard-for-wp/gadwp.php';*/
include plugin_dir_path(__FILE__) . '../../mu-plugins/mce-table-buttons/mce_table_buttons.php';
/* BytBil */
include plugin_dir_path(__FILE__) . '../../mu-plugins/bytbilcms-admin/bytbilcms-admin.php';
require_once(plugin_dir_path(__FILE__) . "../../mu-plugins/BBCore/BBCore.php");

require_once('breadcrumbs.php');
require_once('wp_bootstrap_navwalker.php');
require_once('wp-simple-301-redirects.php');
require_once('plugins/anlaggningar.php');
require_once('plugins/installningar.php');

function biva_register_theme_menu()
{
    register_nav_menu('primary', 'Huvudmeny');
}

add_action('init', 'biva_register_theme_menu');


if (!function_exists('bytbil_brands')) {
    include('plugins/biva-marken/biva-marken.php');
}
if (!function_exists('bytbil_show_facility_all')) {
    include('plugins/biva-anlaggning/biva-anlaggning.php');
}
if (!function_exists('bytbil_init_assortment')) {
    include('plugins/biva-fordonsurval/biva-fordonsurval.php');
}
if (!function_exists('bytbil_show_offers')) {
    include('plugins/biva-erbjudanden/biva-erbjudanden.php');
}

if (!function_exists('bytbil_show_employee')) {
    include('plugins/biva-personal/biva-personal.php');
}

if (!function_exists('bytbil_show_news_feed')) {
    include('plugins/biva-nyheter/biva-nyheter.php');
}

if (!function_exists('bytbil_init_slideshows')) {
    include('plugins/biva-bildspel/biva-bildspel.php');
}

if (!function_exists('bytbil_show_plug')) {
    include('plugins/biva-puffar/biva-puffar.php');
}

include('custom-fields.php');

include('plugins/biva-installningar/biva-installningar.php');

include('plugins/biva-lightbox/biva-lightbox.php');

function register_my_custom_menu_page()
{
    //add_menu_page( 'custom menu title', 'Startsida', 'edit_theme_options', 'post.php?post=49&action=edit', '', get_template_directory_uri() . '/img/admin-icons/home.png', 6);
    add_menu_page('301 Redirects', 'Redirect', 'edit_theme_options', 'options-general.php?page=301options', '', '', 7);
}

add_action('admin_menu', 'register_my_custom_menu_page');



function modify_offer_post_table( $column ) {
    $column['offer-type'] = 'Erbjudandetyp';
    return $column;
}

function modify_employee_post_table( $column ) {
    $column['employee-facility'] = 'Anläggning';
    $column['employee-department'] = 'Avdelning';
    return $column;
}

function modify_assortment_post_table( $column ) {
    $column['assortment_page'] = 'Sidtyp';
    return $column;
}

add_filter( 'manage_offer_posts_columns', 'modify_offer_post_table' );
add_filter( 'manage_employee_posts_columns', 'modify_employee_post_table' );
add_filter( 'manage_assortment_posts_columns', 'modify_assortment_post_table' );

function modify_offer_post_table_row( $column_name, $post_id ) {

    $custom_fields = get_post_custom( $post_id );

    switch ($column_name) {
        case 'offer-type' :
            if($custom_fields['offer-type'][0] == 'car') {
                echo "Personbil";
            } else if($custom_fields['offer-type'][0] == 'transport') {
                echo "Transportbil";
            } else {
                echo "Övrigt erbjudande";
            }
            break;

        default:
    }
}

function modify_employee_post_table_row( $column_name, $post_id ) {

    $custom_fields = get_post_custom( $post_id );

    switch ($column_name) {
        case 'employee-facility' :
            echo get_the_title( $custom_fields['employee-facility'][0] );
            break;

        case 'employee-department' :
            echo get_the_title( $custom_fields['employee-department'][0] );
            break;

        default:
    }
}

function modify_assortment_post_table_row( $column_name, $post_id ) {

    $custom_fields = get_post_custom( $post_id );

    switch ($column_name) {
        case 'assortment_page' :
            $assortment_page = get_field_object('assortment_page');
            $assortment_page = $assortment_page['choices'][ get_field('assortment_page') ];
            echo $assortment_page;
            break;

        default:
    }
}

add_action( 'manage_offer_posts_custom_column', 'modify_offer_post_table_row', 10, 2 );
add_action( 'manage_employee_posts_custom_column', 'modify_employee_post_table_row', 10, 2 );
add_action( 'manage_assortment_posts_custom_column', 'modify_assortment_post_table_row', 10, 2 );

add_action('admin_head', 'my_admin_custom_styles');
function my_admin_custom_styles() {
    $output_css = '<style type="text/css">
        .column-employee-facility { width: 15%; };
        .column-employee-department { width: 15%; };
    </style>';
    echo $output_css;
}


/*add_action( 'admin_init', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
	global $user_ID;
	if ( current_user_can( 'biva-user' ) ) {
		remove_menu_page( 'acf-options' );
		remove_menu_page( 'edit.php?post_type=acf' );
		remove_menu_page( 'cpt_main_menu' );
	}
}*/

/* add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
} */

function custom_excerpt_length($length)
{
    return 18;
}

function add_change_ninja_forms_admin_email()
{
    add_action('ninja_forms_pre_process', 'change_ninja_forms_admin_email');
}

add_action('init', 'add_change_ninja_forms_admin_email');

function change_ninja_forms_admin_email()
{
    global $ninja_forms_processing; // The global variable gives us access to all the form and field settings.

    $form_id = $ninja_forms_processing->get_form_ID(); // Gets the ID of the form we are currently processing.
    if ($form_id == 2) { // Check to make sure that this form has the same ID as the one we got earlier.
        $dept = $ninja_forms_processing->get_field_value(6); // Gets the value that the user has submitted.
        // We're going to use a switch() case to set the admin email address based upon the value of $dept.
        // This could also be an if...else statement, but I think that the switch() is cleaner.
        switch ($dept) {
            case 'Borlänge':
                $admin_mailto = array('info.borlange@biva.se');
                break;
            case 'Falun':
                $admin_mailto = array('info.falun@biva.se');
                break;
            case 'Karlskoga':
                $admin_mailto = array('info.karlskoga@biva.se');
                break;
            case 'Linköping':
                $admin_mailto = array('info.linkoping@biva.se');
                break;
            case 'Norrköping':
                $admin_mailto = array('info.norrkoping@biva.se');
                break;
            case 'Uppsala':
                $admin_mailto = array('info.uppsala@biva.se');
                break;
            case 'Örebro':
                $admin_mailto = array('info.orebro@biva.se');
                break;

        }

        // $admin_mailto now contains our new admin email address. Let's update the form setting.
        $ninja_forms_processing->update_form_setting('admin_mailto', $admin_mailto);
    }
}


function get_ID_by_slug($page_slug)
{
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

//Highlights matching words in search
function highlight_set_query()
{
    $query = attribute_escape(get_search_query());

    if (strlen($query) > 0) {
        echo '
		<script type="text/javascript">
		var highlight_query  = "' . $query . '";
		</script>
	';
    }
}

function highlight_init_jquery()
{
    wp_enqueue_script('jquery');
}

add_action('init', 'highlight_init_jquery');
add_action('wp_print_scripts', 'highlight_set_query');

function biva_admin_mod()
{
    wp_enqueue_style('extra-admin-styles-css', get_template_directory_uri() . '/css/admin-style.css');
}

add_action('admin_enqueue_scripts', 'biva_admin_mod', 0);


function youtube($atts)
{
    extract(shortcode_atts(array(
        "value" => 'http://',
        "width" => '475',
        "height" => '350',
        "name" => 'movie',
        "allowFullScreen" => 'true',
        "allowScriptAccess" => 'always',
    ), $atts));
    return '<object style="height: ' . $height . 'px; width: ' . $width . 'px"><param name="' . $name . '" value="' . $value . '"><param name="allowFullScreen" value="' . $allowFullScreen . '"></param><param name="allowScriptAccess" value="' . $allowScriptAccess . '"></param><embed src="' . $value . '" type="application/x-shockwave-flash" allowfullscreen="' . $allowFullScreen . '" allowScriptAccess="' . $allowScriptAccess . '" width="' . $width . '" height="' . $height . '"></embed></object>';
}

add_shortcode("youtube", "youtube");

?>
