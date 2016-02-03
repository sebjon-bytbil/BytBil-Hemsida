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
/* Functions for Ahlberg BIl */


// Register Navwalker and Menu
require_once('plugins/wp_bootstrap_navwalker.php');
register_nav_menus( array(
    'primary' => __( 'Huvudmeny', 'ahlberg-bil' ),
) );

require_once('plugins/post-types.php');
require_once('plugins/acf-fields.php');
require_once('plugins/assortment.php');
/*
require_once('plugins/advanced-custom-fields-font-awesome/acf-font-awesome.php');

*/



/* Settings */
if (function_exists('acf_set_options_page_title')) {
    acf_set_options_page_title('BytBil CMS');
    acf_add_options_sub_page('Inställningar');
    acf_add_options_sub_page('Startsida');
}


/* Adding Custom Styles to WYSIWYG */
function add_custom_editor_style() {
    add_editor_style('ahlberg-editor-style.css');
}
if (function_exists('add_custom_editor_style')){
    add_action( 'admin_init', 'add_custom_editor_style' );
}
// add hook
add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );
// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;
    
    // find the current menu item
    foreach ( $sorted_menu_items as $menu_item ) {
      if ( $menu_item->current ) {
        // set the root id based on whether the current menu item has a parent or not
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }
    
    // find the top level parent
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
    
    
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $menu_title = $menu_item->title;
            echo '<h2>'. $menu_title . '</h2>';
            $prev_root_id = $menu_item->menu_item_parent;
            // don't set the root_id to 0 if we've reached the top of the menu
            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          } 
        }
      }
    }
    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {
      // init menu_item_parents
      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;
      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
        // part of sub-tree: keep!
        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
        // not part of sub-tree: away with it!
        unset( $sorted_menu_items[$key] );
      }
    }
    
    return $sorted_menu_items;
  } else {
    return $sorted_menu_items;
  }
}
function show_employee($id, $sidebar){
    $employee = get_fields($id);
    $employee_title = get_the_title($id);
    if($sidebar){
        $col_size = 'col-sm-4';
    } else {
        $col_size = 'col-sm-3';
    }
    ?>
    <div class="col-xs-12 <?php echo $col_size; ?>">
        <div class="employee-wrapper white-bg border-bottom-blue">
            <img class="img-responsive" src="<?php echo $employee['employee-image']['url']; ?>" alt="<?php echo $employee_title . ' - ' . $employee['employee-title']; ?>" title="<?php echo $employee_title . ' - ' . $employee['employee-title']; ?>">
            <h4 class="align-center"><?php echo $employee_title; ?></h4>
            <h5 class="light align-center"><?php echo $employee['employee-title']; ?></h5>
            <?php if($employee['employee-phone'] || $employee['employee-email']) { ?>
            <p class="small align-center">
                <?php if($employee['employee-phone']){ ?>
                <a class="btn btn-blue" href="tel:<?php echo $employee['employee-phone']; ?>"><i class="fa fa-phone fa-fw"></i> <?php echo $employee['employee-phone']; ?></a><br>
                <?php } ?>
                <?php if($employee['employee-email']){ ?>
                <a class="btn btn-white" href="mailto:<?php echo $employee['employee-email']; ?>"><i class="fa fa-envelope fa-fw"></i> Maila mig</a>
                <?php } ?>
            </p>
            <?php } ?>
        </div>
    </div>
    <?php
}
function show_plug($id, $sidebar){
    $plug = get_fields($id);
    $plug_title = get_the_title($id);
    
    $plug_type = $plug['plug-type'];
    $link_type = $plug['plug-link-type'];
    
    if($plug_type != 'none'){
        $image_type = $plug['plug-image-type'];
        if($image_type == 'icon'){
            $icon_class = $plug['plug-icon'];
        }
        elseif($image_type == 'image'){
            $image = $plug['plug-image'];
        }
        else {
        }
    }
                                        
    if($link_type == 'internal'){
        $href = $plug['plug-link-page'];
    }
    elseif($link_type == 'external'){
        $href = $plug['plug-link-url'];
    }
    elseif($link_type == 'file'){
        $href = $plug['plug-link-file'];
    }
    else {
        $href = '#';
    }
    
    $plug_size = $plug['plug-size'];
    
    if($sidebar == true){
        $plug_size = '12 sidebar-plug';
    }
    
    ?>

    <div class="col-xs-12 col-sm-<?php echo $plug_size; ?>">
        <a href="<?php echo $href; ?>" target="<?php echo $plug['plug-link-target']; ?>" class="<?php echo $plug['plug-text-color']; ?>">
            <div class="plug-wrapper <?php
                echo $plug_type . ' ' .
                    $plug['plug-background-color'] . ' ' .
                    $plug['plug-border-color'] . ' ' .
                    $image_type;
                        ?>">
                <?php if($plug_type=='big' && $image_type =='image') { ?>
                    <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $plug_title; ?>" title="<?php echo $plug_title; ?>">
                <?php } ?>
                <h3><?php
                    if($image_type=='icon'){ ?>
                        <i class="fa <?php echo $icon_class; ?>"></i>
                    <?php }
                    elseif($plug_type=='small' && $image_type=='image'){ ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $plug_title; ?>" title="<?php echo $plug_title; ?>">
                    <?php } ?>
                    <?php echo $plug_title; ?></h3>
                <p><?php echo $plug['plug-text']; ?></p>
                <?php //var_dump($plug); ?>
            </div>
        </a>
    </div>

<?php  
}

function render_map($id){
    ?>
    
    <style type="text/css">

.acf-map-<?php echo $id; ?> {
	width: 100%;
	height: 200px;
	border: #ccc solid 1px;
	margin: 20px 0;
}

</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map-<?php echo $id; ?>').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
</script>

    <?php
}



?>