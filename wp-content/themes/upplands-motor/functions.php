<?php

/* Registrera plugins */
include_once ('plugins/AccessApi.php');
include_once ('plugins/wp_bootstrap_navwalker.php');
include_once ('plugins/upplands-motor-settings/um-settings.php');
include_once ('plugins/bytbil-content-management/bytbil-content-management.php');
include_once ('plugins/intranet/IntranetHandler.php');
include_once ('plugins/intranet/companies.php');
include_once ('plugins/um-search.php');


$BBCore->LoadPlugins(array('Acf', 'Render'));
$BBCore->Plugins['Render']->Paths = array(
    'theme' => dirname(__FILE__), 
    'plugins' => dirname(__FILE__) . '/plugins/bytbil-content-management/views/',
    'layouts' => dirname(__FILE__) . '/plugins/bytbil-content-management/layouts/');


function add_relationship_cache($fields){
    $fields = array(
        'field_554216beabf73',
        'field_5542166dabf70',
        'field_554223e273c9b',
        'field_5542247173c9e',
        'field_5542249773c9f',
        'field_551236af23804',
        'field_5512373a23806',
        'field_5549906c93547',
        'field_5549b8a734a44',
        'field_5549d36d41958',
        'field_5550aced27a4f',
        'field_5551e25540e13',
        'field_553dc04f446b9',
        'field_554a131c3c7ae',
        'field_554a13983c7af',
        'field_554a13ca3c7b0',
        'field_554850fb2b3b4',
        'field_55485153e50ee',
        'field_553f234be6cd8',
        'field_553f1dab9e40f',
        'field_55124bfc7f337',
        'field_5511931887ea8',
        'field_5511934b87ea9',
        'field_5511937387eaa',
        'field_5511938a87eab',
        'field_551193b187ead',
        'field_551193c487eae',
        'field_5549c26b3ac58'
    );
    return $fields;
}
add_filter( 'acf_cache_relationsships_types', 'add_relationship_cache', 10, 1 );

function um_color_picker() {
    if(wp_script_is('wp-color-picker', 'enqueued')){
        wp_enqueue_script('um-color-picker', get_stylesheet_directory_uri() . '/plugins/upplands-motor-settings/color-picker.js');
    }
}
//add_action('admin_enqueue_scripts', 'um_color_picker');

add_theme_support( 'post-thumbnails' );

/* Registrera Menyer */
function upplandsmotor_register_menu()
{
    register_nav_menu(
        'primary', 'Huvudmeny'
    );
    register_nav_menus(array(
        'find-us' => 'Här finns vi',
        'footer' => 'Sidfot',
        'shortcuts' => 'Genvägar',
    ));
}
add_action('init', 'upplandsmotor_register_menu');


function acf_set_featured_image( $value, $post_id, $field  ){
    if($value != ''){
        //Add the value which is the image ID to the _thumbnail_id meta data for the current post
        if(has_post_thumbnail($post_id)){
            update_post_meta($post_id, '_thumbnail_id', $value);
        } else {
            add_post_meta($post_id, '_thumbnail_id', $value);
        }
    }
    return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
/*add_filter('acf/update_value/name=vehicle-image', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=modelgroup-image', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=offer-image', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=employee-image', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=testimonial-image', 'acf_set_featured_image', 10, 3);
*/

function get_field_label($field_key, $post_id=null){
   $field = get_field_object($field_key, $post_id);
   $value = get_field($field_key,$post_id);
   return $field['choices'][ $value ];
}


/*function my_relationship_result( $result, $object, $field, $post ) {

    // load a custom field from this $object and show it in the $result
    $post_type = get_post_type($object->ID);

    $image = wp_get_attachment_image_src(get_post_thumbnail_id($object->ID), 'thumb' );

    $result = '<img class="relationship-image ' . $post_type . '" src="' . $image[0] .  '"/>' . $result;

    return $result;
}*/

// filter for every field
//add_filter('acf/fields/relationship/result', 'my_relationship_result', 10, 4);
//add_action("init", function () {
//    $page = get_page_by_path("bilar-i-lager");
//    if ($page) {
//        add_rewrite_tag("%objekt.html%", '(.+)');
//        add_rewrite_rule('^o/(.+)/?', 'index.php?page_id=' . $page->ID . '&objekt=$matches[1]', 'top');
//    }
//});

?>

