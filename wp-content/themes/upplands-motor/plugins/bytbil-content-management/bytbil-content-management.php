<?php
include_once('inc/bytbil-image-sizes.php');
include_once('inc/acf-image-crop-add-on/acf-image-crop.php');
include_once('inc/breadcrumb/breadcrumb.php');
include_once('inc/wp-editor-fontsize/wp-editor-fontsize.php');
include_once('content/bytbil-rows.php');
include_once('content/bytbil-slideshow.php');
include_once('content/bytbil-vehicles.php');
include_once('content/bytbil-offers.php');
include_once('content/bytbil-accessory.php');
include_once('content/bytbil-equipment.php');
include_once('content/bytbil-facilities.php');
include_once('content/bytbil-news.php');
include_once('content/bytbil-sections.php');
include_once('content/bytbil-employee.php');
include_once('content/bytbil-testimonial.php');
include_once('content/bytbil-taxonomies.php');

function get_slug($title){
    return preg_replace('@[^a-z0-9-]+@','-', strtolower($title));
}

function get_sub_menu($id, $section=false)
{
    require "menu-loop.php";
}

function bytbil_content_loop($scroll, $scroll_init)
{
    require "content-loop.php";
}

function get_content_tabs($id, $row_counter){
    require "content-tabs.php";
}

function get_custom_excerpt($content, $size){
    $excerpt = $content;
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $the_str = substr($excerpt, 0, $size);
    return $the_str;
}

/* Load Style and Script for Content Management */
function bytbil_content_management_styles()
{
    $screen = get_current_screen();

    //var_dump($screen);
    $post_type = $screen->id;

    if ($post_type !== 'slideshow') {

        wp_enqueue_style('bytbil_cm_admin_style', get_template_directory_uri() . '/plugins/bytbil-content-management/bytbil-cm-admin.css');
        wp_enqueue_script('bytbil_cm_arrive_script', get_template_directory_uri() . '/plugins/bytbil-content-management/arrive.js');
        wp_enqueue_script('bytbil_cm_admin_script', get_template_directory_uri() . '/plugins/bytbil-content-management/bytbil-cm-admin.js', array('jquery'));
    }else{
        wp_enqueue_style('bytbil_cm_admin_style', get_template_directory_uri() . '/plugins/bytbil-content-management/bytbil-cm-admin-slideshow.css');
        wp_enqueue_script('bytbil_cm_arrive_script', get_template_directory_uri() . '/plugins/bytbil-content-management/arrive.js');
        wp_enqueue_script('bytbil_cm_admin_script', get_template_directory_uri() . '/plugins/bytbil-content-management/bytbil-cm-admin-slideshow.js', array('jquery'));
    }
    
    
}
add_action('admin_enqueue_scripts', 'bytbil_content_management_styles');
// Ändra Inloggningsfönster
function bytbil_change_login()
{
    wp_enqueue_style('upplands-motor-login', get_template_directory_uri() . '/plugins/bytbil-content-management/login.css');
}
add_action('login_enqueue_scripts', 'bytbil_change_login');


function override_mce_options($initArray) {
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');

//ELASTICACCESS
add_action('admin_enqueue_scripts', 'elasticaccess_scripts', 0);

function elasticaccess_scripts($hook)
{

    if ( 'post.php' != $hook ) {
        return;
    }


    //wp_enqueue_script('elasticaccess-admin', '//code.jquery.com/jquery-latest.min.js', array(), '1.0.0', true);
    wp_enqueue_script('elasticaccess-admin', '/wp-content/themes/upplands-motor/js/ElasticAccess.js', array(), '1.0.0', true);
    wp_enqueue_script('elasticaccess-admin-extra', '/wp-content/themes/upplands-motor/js/ElasticAccessAdmin.js', array(), '1.0.0', true);

    wp_register_style('bootstrap_style', '/wp-content/themes/upplands-motor/lib/bootstrap-3.3.5/less/bootstrap-elasticaccess.css', false, '1.0.0');
    wp_enqueue_style('bootstrap_style');

    wp_register_style('elasticaccess_ap_style', '/wp-content/themes/upplands-motor/css/elasticaccess-admin-style.css', false, '1.0.0');
    wp_enqueue_style('elasticaccess_ap_style');
}



function elasticaccess_scripts_frontend($hook){
    var_dump("expression");
    wp_register_script( 'elasticaccess', get_stylesheet_directory_uri() . "/js/ElasticAccess.js", '1.0.0', true );

    wp_register_style( 'elasticaccesscss', get_stylesheet_directory_uri() . "/css/elasticaccess-style.css", array(), '1.0.0');

}; add_action( 'wp_enqueue_scripts', 'elasticaccess_scripts_frontend', 10, 1 );


function admin_head_post_editing() {
    if (get_field('row')) {
        while (have_rows('row')) {
            the_row();
            $row_content = get_sub_field('row-content');
            if (have_rows('row-content')) {
                while (have_rows('row-content')) {
                    the_row();
                    $existing_hash = get_sub_field('accesspackage-hash');
                }
            }
        }
    }
    $existing_hash = htmlspecialchars_decode($existing_hash);
    ?>
    <script>
        console.log("<?php echo $existing_hash; ?>");
        location.hash = "<?php echo $existing_hash; ?>";
    </script>
<?php }
add_action( 'admin_head-post.php', 'admin_head_post_editing' );


?>
