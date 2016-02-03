<?php
/**
 * Plugin Name: BytBil Misc
 * Plugin URI:
 * Description: Diverse inställningar (Colorschemes, döljer saker etc)
 * Version: 0.1
 * Author: Provide IT
 * Author URI: http://www.provideit.se
 * License:
 */

include_once('shortcodes.php');
include_once('bytbil_create_options.php');

add_action('admin_head', 'admin_ajax_url');
add_action("wp_head", "admin_ajax_url");
function admin_ajax_url()
{ ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url("admin-ajax.php"); ?>';
    </script>
<?php
}

add_action('admin_enqueue_scripts', 'bytbil_add_misc_scripts', 0);

function bytbil_add_misc_scripts()
{
    wp_enqueue_style('bytbil-misc-style', get_template_directory_uri() . '/plugins/bytbil_misc/style.css');
    //wp_enqueue_script( 'bytbil-misc-scripts-jq', 'http://code.jquery.com/jquery-1.10.2.min.js');
    global $pagenow;
    $url = $pagenow . "?" . $_SERVER['QUERY_STRING'];
    $url = split("&", $url);
    //var_dump($url[0]);
    if ($url[0] != 'admin.php?page=blog_templates_main' && $url[0] != 'admin.php?page=mcp_network_page' && $url[0] != 'admin.php?page=ninja-forms') {
        wp_enqueue_script('bytbil-misc-scripts-jqui', 'http://code.jquery.com/ui/1.10.4/jquery-ui.js');
        wp_enqueue_script('bytbil-misc-scripts-jq', 'http://code.jquery.com/jquery-1.10.2.min.js');
    }
    wp_enqueue_script('bytbil-misc-scripts-func', get_template_directory_uri() . '/plugins/bytbil_misc/functions.js');
}

// function remove_dashboard_widgets(){
//     remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
//     remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
//     remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
//     remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
//     remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Recent Drafts
//     remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
//     remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
//     remove_meta_box('dashboard_activity', 'dashboard', 'normal');
//     remove_meta_box('wds_sitemaps_dashboard_widget', 'dashboard', 'normal');
// 	remove_action( 'welcome_panel', 'wp_welcome_panel' );

// // use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.
// }
// add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

// function custom_menu_order( $menu_ord ) {  
//     if (!$menu_ord) return true;  
//     $menu = 'acf-options';
//     $menu_ord = array_diff($menu_ord, array( $menu ));
//     array_splice( $menu_ord, 3, 0, array( $menu ) );
//     return $menu_ord;
// }
// add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order  
// add_filter('menu_order', 'custom_menu_order');