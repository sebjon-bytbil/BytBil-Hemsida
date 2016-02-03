<?php

// setup post parent stuff
add_action('admin_menu', function () {
    remove_meta_box('pageparentdiv', 'facility', 'normal');
});
add_action('add_meta_boxes', function () {
    add_meta_box('facility-parent', 'Föräldrasida', 'facility_attributes_meta_box', 'facility', 'side', 'low');
});
function facility_attributes_meta_box($post)
{
    $post_type_object = get_post_type_object($post->post_type);
    if (true) {
        $pages = wp_dropdown_pages(array('post_type' => 'page', 'selected' => $post->post_parent, 'name' => 'parent_id', 'show_option_none' => __('(no parent)'), 'sort_column' => 'menu_order, post_title', 'echo' => 0));
        if (!empty($pages)) {
            echo $pages;
        } // end empty pages check
    } // end hierarchical check.
}

// Register Custom Post Type
function custom_post_type_facility()
{

    $labels = array(
        'name' => 'Anläggningar',
        'singular_name' => 'Anläggning',
        'menu_name' => 'Anläggningar',
        'parent_item_colon' => 'Förälder:',
        'all_items' => 'Alla Anläggningar',
        'view_item' => 'Visa Anläggning',
        'add_new_item' => 'Lägg till ny Anläggning',
        'add_new' => 'Lägg till',
        'edit_item' => 'Redigera Anläggning',
        'update_item' => 'Uppdatera Anläggning',
        'search_items' => 'Sök Anläggningar',
        'not_found' => 'Inga träffar',
        'not_found_in_trash' => 'Inga Anläggningar hittades i papperskorgen',
    );
    $args = array(
        'label' => 'facility',
        'description' => 'BBCMS Anläggningar',
        'labels' => $labels,
        'supports' => array('title', 'revisions', 'page-attributes',),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 25.5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'rewrite' => array('slug' => 'facility', "with_front" => false),
    );
    register_post_type('facility', $args);

}

// Hook into the 'init' action
add_action('init', 'custom_post_type_facility', 0);

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_anlaggning',
        'title' => 'Anläggning',
        'fields' => array(
            array(
                'key' => 'field_544958bd124de',
                'label' => 'Kontaktuppgifter',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_544959d2124e0',
                'label' => 'Besöksadress',
                'name' => 'facility_visiting-address',
                'type' => 'google_map',
                'center_lat' => '',
                'center_lng' => '',
                'zoom' => '',
                'height' => '',
            ),
            array(
                'key' => 'field_54495a22124e1',
                'label' => 'Använd annan postadress',
                'name' => 'facility_postal-address',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_54495a80124e3',
                'label' => 'Telefonnummer',
                'name' => 'facility_phonenumber',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_54495a94124e4',
                'label' => 'E-post',
                'name' => 'facility_email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_54495aaf124e5',
                'label' => 'Avdelningar och öppettider',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_54495ac9124e6',
                'label' => 'Avdelning',
                'name' => 'facility_department',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_54495af5124e7',
                        'label' => 'Avdelning',
                        'name' => 'facility_department-name',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_54495b68124e8',
                        'label' => 'Öppettider',
                        'name' => 'facility_department-openhours',
                        'type' => 'repeater',
                        'column_width' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_54495b86124e9',
                                'label' => 'Dag',
                                'name' => 'facility_department-oh-day',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_54495bd7124ea',
                                'label' => 'Tid',
                                'name' => 'facility_department-oh-time',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'table',
                        'button_label' => 'Lägg till öppettid',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till avdelning',
            ),
            array(
                'key' => 'field_544a0874ef0b5',
                'label' => 'Personal och formulär',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_544a08c16ea06',
                'label' => 'Personal',
                'name' => 'facility_employees',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'employee',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'post_title',
                ),
                'max' => '',
            ),
            array(
                'key' => 'field_544a127bdb052',
                'label' => 'Kontaktformulär',
                'name' => 'facility_contact-form',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'wpcf7_contact_form',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'facility',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array(
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

function init_map()
{
    ?>

    <style type="text/css">

        .acf-map {
            width: 100%;
            height: 400px;
            border: #ccc solid 1px;
            margin: 20px 0;
        }

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript">
        (function ($) {

            /*
             *  render_map
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

            function render_map($el) {

                // var
                var $markers = $el.find('.marker');

                // vars
                var args = {
                    zoom: 16,
                    center: new google.maps.LatLng(0, 0),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                // create map
                var map = new google.maps.Map($el[0], args);

                // add a markers reference
                map.markers = [];

                // add markers
                $markers.each(function () {

                    add_marker($(this), map);

                });

                // center map
                center_map(map);

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

            function add_marker($marker, map) {

                // var
                var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

                // create marker
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map
                });

                // add to array
                map.markers.push(marker);

                // if marker contains HTML, add it to an infoWindow
                if ($marker.html()) {
                    // create info window
                    var infowindow = new google.maps.InfoWindow({
                        content: $marker.html()
                    });

                    // show info window when marker is clicked
                    google.maps.event.addListener(marker, 'click', function () {

                        infowindow.open(map, marker);

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

            function center_map(map) {

                // vars
                var bounds = new google.maps.LatLngBounds();

                // loop through all markers and create bounds
                $.each(map.markers, function (i, marker) {

                    var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

                    bounds.extend(latlng);

                });

                // only 1 marker?
                if (map.markers.length == 1) {
                    // set center of map
                    map.setCenter(bounds.getCenter());
                    map.setZoom(16);
                }
                else {
                    // fit to bounds
                    map.fitBounds(bounds);
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

            $(document).ready(function () {

                $('.acf-map').each(function () {

                    render_map($(this));

                });

            });

        })(jQuery);
    </script>
<?php
}


function get_facility_map($id)
{
    $location = get_field('facility_visiting-address', $id);

    if (!empty($location)):
        ?>
        <div class="acf-map">
            <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                 data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
    <?php
    endif;
}


function get_facility_openhours($id)
{
    if (get_field('facility_department', $id)): ?>
        <h2>Öppettider</h2>
        <?php while (have_rows('facility_department', $id)) : the_row(); ?>
            <div class="col-xs-6">
                <label><?php echo get_sub_field('facility_department-name'); ?></label>
                <?php while (have_rows('facility_department-openhours', $id)) : the_row(); ?>
                    <span class="openhour">
			<strong><?php echo get_sub_field('facility_department-oh-day'); ?></strong> <?php echo get_sub_field('facility_department-oh-time'); ?>
		</span>
                <?php endwhile; ?>
            </div>
        <?php endwhile; ?>
    <?php endif;
}


function get_facility_contact($id)
{
    ?>
    <h2>Kontaktuppgifter</h2>
    <label><?php echo get_the_title($id); ?></label>
    <?php $location = get_field('facility_visiting-address', $id); ?>
    <p>
        <span class="address"><?php echo str_replace(', Sverige', '', $location['address']); ?></span>
        <span class="phonenumber"><i
                class="fa fa-fw fa-phone"></i> <strong>Telefon: </strong><?php echo get_field('facility_phonenumber', $id); ?></span>
        <span class="email"><i class="fa fa-fw fa-envelope"></i> <strong>E-post: </strong><a
                href="mailto:<?php echo get_field('facility_email', $id); ?>"><?php echo get_field('facility_email', $id); ?></a></span>
        <span class="website"><i class="fa fa-fw fa-globe"></i> <strong>Hemsida: </strong><a
                href="<?php echo get_field('af-website', 'options'); ?>"
                target="_blank"><?php echo get_field('af-website', 'options'); ?></a></span>
    </p>

<?php
}


function get_employee($id)
{
    ?>

    <div class="employee">
        <?php
        $employee_image = get_field('employee_image', $id);
        $image_url = $employee_image['url'];
        $employee_name = get_the_title($id);
        ?>

        <img src="<?php echo $image_url; ?>" class="employee-image" title="<?php echo $employee_name; ?>"/>

        <div class="info">
            <label><?php echo $employee_name; ?></label>

            <p>
                <span class="title"><?php echo get_field('employee_title', $id); ?></span>

                <?php if (get_field('employee_phonenumber', $id)) { ?>
                    <span class="phone"><i
                            class="fa fa-fw fa-phone"></i> <strong>Telefon: </strong><?php echo get_field('employee_phonenumber', $id); ?></span>
                <?php } ?>

                <?php if (get_field('employee_mobilenumber', $id)) { ?>
                    <span class="mobile"><i
                            class="fa fa-fw fa-phone"></i> <strong>Mobil: </strong><?php echo get_field('employee_mobilenumber', $id); ?></span>
                <?php } ?>

                <a href="mailto:<?php echo get_field('employee_email', $id); ?>" class="email button"><i
                        class="fa fa-fw fa-envelope"></i> Skicka E-post</a>

            </p>
        </div>
    </div>

<?php
}


function get_facility_employees($id)
{
    ?>
    <?php
    $employees = get_field('facility_employees', $id);
    foreach ($employees as $employee) {
        get_employee($employee->ID);
    }
}


function get_facility_card($id)
{
    get_facility_map($id);
    echo '<div class="col-xs-12 col-sm-6 contact-info">';
    get_facility_contact($id);
    echo '</div>';
    echo '<div class="col-xs-12 col-sm-6 open-hours">';
    get_facility_openhours($id);
    echo '</div>';
    echo '<div class="col-xs-12 employees">';
    echo '<h2>Personal</h2>';
    get_facility_employees($id);
    echo '</div>';
    init_map();
}


function get_facilitiy_contactinfo($id, $type)
{

    if ($type == 'address') {
        $location = get_field('facility_visiting-address', $id);
        $address = str_replace(', Sverige', '', $location['address']);
        $firstPart = explode(" ", $address, 3);
        $string = $firstPart[0] . " " . $firstPart[1] . "<br />" . $firstPart[2];
        echo $string;
    } elseif ($type == 'phonenr') {
        ?>
        <a href="tel:<?php echo get_field('facility_phonenumber', $id); ?>"><?php echo get_field('facility_phonenumber', $id); ?></a>
    <?php
    } elseif ($type == 'email') {
        ?>
        <a href="mailto:<?php echo get_field('facility_email', $id); ?>">Kontakta oss</a>
    <?php
    }
}

function facility_get_all_offers($limit = -1)
{
    $args = array(
        "post_type" => "offer",
        "posts_per_page" => $limit
    );
    $offers_array = get_posts($args);
    $ret_array = array();
    $seller_type = get_field("af-reseller", "option");

    foreach ($offers_array as $offer) {
        $offer_type = get_field("offer_date-facility", $offer->ID);
        if (is_array($offer_type)) {
            foreach ($offer_type as $type) {
                if (in_array($type, $seller_type) && !in_array($offer->ID, $ret_array)) {
                    $ret_array[] = $offer->ID;
                }
            }
        }
    }

    return $ret_array;
}


?>

