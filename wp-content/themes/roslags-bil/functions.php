<?php


// Include acf
require_once('acf.php');
require_once('wp_bootstrap_walker.php');

include('plugins/bytbil_personal/bytbil_personal.php');
include('plugins/bytbil_slider/bytbil-slider.php');
include('plugins/custom-post-type-permalinks/CPTP.php');
//include('plugins/roslagsbil-fields.php');


//Includes a Javascript variable for the ajaxurl in the head of every page
add_action('wp_head', 'ajaxurl');
function ajaxurl()
{
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url("admin-ajax.php"); ?>';
    </script>
<?php
}

//Sets up nav
register_nav_menus(array(
    'main_menu' => 'Huvudmeny',
));


function additional_active_item_classes($classes = array(), $menu_item = false)
{
    global $wp_query;

    if ($menu_item->post_name == 'blogg' && is_page_template('index.php')) {
        $classes[] = 'current-menu-item';
    }

    return $classes;
}

add_filter('nav-roslagsbil', 'additional_active_item_classes', 10, 2);


?>
