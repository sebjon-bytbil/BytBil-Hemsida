<?php
/*
Plugin Name: BytBil Erbjudanden
Description: Skapa och visa erbjudanden på din hemsida.
Author: Sebastian Jonsson : BytBil Nordic AB
Version: 3.0.1
Author URI: http://www.bytbil.com
*/

add_action('init', 'cptui_register_my_cpt_offer');
function cptui_register_my_cpt_offer()
{
    register_post_type('offer', array(
            'label' => 'Erbjudanden',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'erbjudanden'),
            'query_var' => true,
            'supports' => array('title', 'revisions', 'thumbnail'),
            'taxonomies' => array('brand', 'citites'),
            'labels' => array(
                'name' => 'Erbjudanden',
                'singular_name' => 'Erbjudande',
                'menu_name' => 'Erbjudanden',
                'add_new' => 'Add Erbjudande',
                'add_new_item' => 'Add New Erbjudande',
                'edit' => 'Edit',
                'edit_item' => 'Edit Erbjudande',
                'new_item' => 'New Erbjudande',
                'view' => 'View Erbjudande',
                'view_item' => 'View Erbjudande',
                'search_items' => 'Search Erbjudanden',
                'not_found' => 'No Erbjudanden Found',
                'not_found_in_trash' => 'No Erbjudanden Found in Trash',
                'parent' => 'Parent Erbjudande',
            )
        )
    );
}

add_action('init', 'cptui_register_my_cpt_offer_price');
function cptui_register_my_cpt_offer_price() {
    register_post_type('offer_price', array(
            'label' => 'Pristyper',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => 'edit.php?post_type=offer',
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'offer_price', 'with_front' => true),
            'query_var' => true,
            'supports' => array('title'),
            'labels' => array (
                'name' => 'Pristyper',
                'singular_name' => 'Pristyp',
                'menu_name' => 'Pristyper',
                'add_new' => 'Add Pristyp',
                'add_new_item' => 'Add New Pristyp',
                'edit' => 'Edit',
                'edit_item' => 'Edit Pristyp',
                'new_item' => 'New Pristyp',
                'view' => 'View Pristyp',
                'view_item' => 'View Pristyp',
                'search_items' => 'Search Pristyper',
                'not_found' => 'No Pristyper Found',
                'not_found_in_trash' => 'No Pristyper Found in Trash',
                'parent' => 'Parent Pristyp',
            )
        )
    );
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
		'id' => 'acf_erbjudande-3',
		'title' => 'Erbjudande',
		'fields' => array (
			array (
				'key' => 'field_5562a9ad8779e',
				'label' => 'Innehåll',
				'name' => '',
				'type' => 'tab',
			),
            array (
				'key' => 'field_5562ab3f877a3',
				'label' => 'Erbjudandets rubrik',
				'name' => 'offer-title',
				'type' => 'text',
				'instructions' => 'Fyll i en rubrik som skall användas i vyer som exempelvis erbjudandelistan.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
            array (
				'key' => 'field_559b62dd49318',
				'label' => 'Erbjudandeflik',
				'name' => 'offer-tab',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_559b5dbb19fa2',
						'label' => 'Flikrubrik',
						'name' => 'offer-tab-text',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_559b604d19fa8',
						'label' => 'Beskrivning',
						'name' => 'offer-tab-description',
						'type' => 'wysiwyg',
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'full',
						'media_upload' => 'yes',
					),
					array (
						'key' => 'field_559b6322bae9d',
						'label' => 'Flikinnehåll',
						'name' => 'offer-tab-content',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'modelinformation' => 'Modellinformation',
							'equipmentpackage' => 'Utrustningspaket',
							'equipment' => 'Utrustningslista',
							'accessory' => 'Tillbehörsinformation',
							'custom' => 'Eget innehåll',
						),
						'default_value' => 'modelinformation',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_559b63cabae9e',
						'label' => 'Bilmodell',
						'name' => 'offer-vehicle',
						'type' => 'relationship',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_559b6322bae9d',
									'operator' => '==',
									'value' => 'modelinformation',
								),
								array (
									'field' => 'field_559b64d3baea2',
									'operator' => '==',
									'value' => '1',
								),
							),
							'allorany' => 'any',
						),
						'column_width' => '',
						'return_format' => 'object',
						'post_type' => array (
							0 => 'vehicle',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'filters' => array (
							0 => 'search',
						),
						'result_elements' => array (
							0 => 'post_title',
						),
						'max' => 1,
					),
					array (
						'key' => 'field_559b647dbaea0',
						'label' => 'Motorvariant',
						'name' => 'offer-engine',
						'type' => 'relationship',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_559b6322bae9d',
									'operator' => '==',
									'value' => 'modelinformation',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'return_format' => 'object',
						'post_type' => array (
							0 => 'engine',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'filters' => array (
							0 => 'search',
						),
						'result_elements' => array (
							0 => 'post_title',
						),
						'max' => 1,
					),
					array (
						'key' => 'field_559b6454bae9f',
						'label' => 'Utrustningspaket',
						'name' => 'offer-equipmentpackage',
						'type' => 'relationship',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_559b6322bae9d',
									'operator' => '==',
									'value' => 'equipmentpackage',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'return_format' => 'object',
						'post_type' => array (
							0 => 'equipment_package',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'filters' => array (
							0 => 'search',
						),
						'result_elements' => array (
							0 => 'post_title',
						),
						'max' => 1,
					),
					array (
						'key' => 'field_559b64b8baea1',
						'label' => 'Utrustningslista',
						'name' => 'offer-equipment-list',
						'type' => 'relationship',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_559b6322bae9d',
									'operator' => '==',
									'value' => 'equipment',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'return_format' => 'object',
						'post_type' => array (
							0 => 'equipment',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'filters' => array (
							0 => 'search',
						),
						'result_elements' => array (
							0 => 'post_title',
						),
						'max' => '',
					),
					array (
						'key' => 'field_559b6662c322a',
						'label' => 'Eget innehåll',
						'name' => 'offer-custom-content',
						'type' => 'wysiwyg',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_559b6322bae9d',
									'operator' => '==',
									'value' => 'custom',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'full',
						'media_upload' => 'yes',
					),
					array (
						'key' => 'field_559b64d3baea2',
						'label' => 'Visa bild i flik',
						'name' => 'offer-show-image',
						'type' => 'true_false',
						'column_width' => '',
						'message' => '',
						'default_value' => 0,
					),
					array (
						'key' => 'field_559b606419fa9',
						'label' => 'Extra innehåll',
						'name' => 'offer-tab-footer',
						'type' => 'wysiwyg',
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'full',
						'media_upload' => 'yes',
					),
				),
				'row_min' => '',
				'row_limit' => 5,
				'layout' => 'row',
				'button_label' => 'Lägg till flik',
			),
            array (
				'key' => 'field_5562aaed877a1',
				'label' => 'Erbjudandets sidfot',
				'name' => 'offer-footer',
				'type' => 'wysiwyg',
				'instructions' => 'Fyll i disclaimertext som skall visas i sidfoten av erbjudandet - eller lägg till viktiga Action Buttons som leder besökaren till konvertering.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5562ac58877a7',
				'label' => 'Bilder och header',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5562abb7877a5',
				'label' => 'Bild för erbjudandet',
				'name' => 'offer-image',
				'instructions' => 'Välj eller ladda upp en bild som skall visas för erbjudandet.',
                'type' => 'image_crop',
                'crop_type' => 'hard',
                'target_size' => 'slideshow-default',
                'width' => '',
                'height' => '',
                'preview_size' => 'slideshow-preview',
                'force_crop' => 'yes',
                'save_in_media_library' => 'no',
                'retina_mode' => 'no',
                'save_format' => 'object',
			),
            array (
				'key' => 'field_5562ac15877a6',
				'label' => 'Alternativ bild',
				'name' => 'offer-alt-image',
				'instructions' => 'Välj eller ladda upp en annan bild som du vill använda för visning i exempelvis listvy.',
                'type' => 'image_crop',
                'crop_type' => 'hard',
                'target_size' => 'slideshow-default',
                'width' => '',
                'height' => '',
                'preview_size' => 'slideshow-preview',
                'force_crop' => 'yes',
                'save_in_media_library' => 'no',
                'retina_mode' => 'no',
                'save_format' => 'object',
			),
            array(
                'key' => 'field_os5523f93e6aa2a',
                'label' => 'Textrutans innehåll',
                'name' => 'slideshow-caption-content',
                'type' => 'wysiwyg',
                'instructions' => 'Skriv i innehållet du vill visa i textrutan på bildspelet',
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
            array(
                'key' => 'field_os5523fa566aa2d',
                'label' => 'Textrutans bakgrundsfärg',
                'name' => 'slideshow-caption-color',
                'type' => 'color_picker',
                'instructions' => 'Välj vilken färg textrutan skall ha',
                'column_width' => '',
                'default_value' => 'transparent',
            ),
            array(
                'key' => 'field_os5523fbec6aa30',
                'label' => 'Textrutans styrka',
                'name' => 'slideshow-caption-opacity',
                'type' => 'number',
                'instructions' => 'Fyll i en styrka för genomskinligheten på textrutans bakgrund.',
                'column_width' => '',
                'default_value' => 0,
                'placeholder' => '',
                'prepend' => '',
                'append' => '%',
                'min' => 0,
                'max' => 100,
                'step' => '',
            ),
            array(
                'key' => 'field_os55265fcf85b35',
                'label' => 'Animera textrutan',
                'name' => 'slideshow-caption-animation',
                'type' => 'select',
                'instructions' => 'Välj om du vill visa textrutan med en animeringseffekt.',
                'column_width' => '',
                'choices' => array(
                    'none' => 'Ingen',
                    'fade' => 'Tona in',
                    'left' => 'Glid in från vänster',
                    'right' => 'Glid in från höger',
                ),
                'default_value' => 'none',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_os5523fc276aa31',
                'label' => 'Visa kantram',
                'name' => 'slideshow-caption-border',
                'type' => 'radio',
                'instructions' => 'Välj om textrutan skall ha en kantram.',
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
            array(
                'key' => 'field_os5523fa7d6aa2e',
                'label' => 'Textrutans position',
                'name' => 'slideshow-caption-position',
                'type' => 'radio',
                'instructions' => 'Bestäm vart i bilden textrutan skall placeras.',
                'column_width' => '',
                'choices' => array(
                    'center' => 'Centrerad',
                    'left' => 'Vänster',
                    'right' => 'Höger',
                    'top-center' => 'Centrerad i överkant',
                    'top-left' => 'Vänster i överkant',
                    'top-right' => 'Höger i överkant',
                    'bottom-center' => 'Centrerad i underkant',
                    'bottom-left' => 'Vänster i underkant',
                    'bottom-right' => 'Höger i överkant',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'center',
                'layout' => 'horizontal',
            ),
			
            array (
				'key' => 'field_5562ac588ac247',
				'label' => 'Priser och datum',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5562ac67877a8',
				'label' => 'Priser',
				'name' => 'offer-prices',
				'type' => 'repeater',
				'instructions' => 'Lägg till de priser som skall visas i botten på erbjudandet.',
				'sub_fields' => array (
					array (
						'key' => 'field_5562ad26877a9',
						'label' => 'Pristyp',
						'name' => 'offer-price-type',
						'type' => 'post_object',
						'instructions' => 'Välj en pristyp du vill visa priset som.',
						'column_width' => 50,
						'post_type' => array (
							0 => 'offer_price',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_5562ad5e877aa',
						'label' => 'Pris',
						'name' => 'offer-price-value',
						'type' => 'text',
						'instructions' => 'Fyll i det pris eller text du vill visa under rubriken.',
						'column_width' => 50,
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
				'layout' => 'row',
				'button_label' => 'Lägg till pris',
			),
			array (
				'key' => 'field_5562adc4877ac',
				'label' => 'Startdatum',
				'name' => 'offer-start-date',
				'type' => 'date_picker',
				'instructions' => 'Välj det datum som erbjudandet skall visas och gälla från.',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_5562adea877ad',
				'label' => 'Slutdatum',
				'name' => 'offer-stop-date',
				'type' => 'date_picker',
				'instructions' => 'Välj det datum som erbjudandet skall visas och gälla till.',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),		
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'offer',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
    register_field_group(array (
		'id' => 'acf_pristyp',
		'title' => 'Pristyp',
		'fields' => array (
			array (
				'key' => 'field_5562b5b2acf46',
				'label' => 'Rubrik',
				'name' => 'price-header',
				'type' => 'text',
				'instructions' => 'Fyll i en rubrik för pristypen.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5562b5c6acf47',
				'label' => 'Utseende',
				'name' => 'price-appearence',
				'type' => 'select',
				'instructions' => 'Välj ett utseende för priset',
				'choices' => array (
					'default' => 'Standard',
					'campaign' => 'Kampanjpris',
					'ord' => 'Överstruken',
					'brand' => 'Märkesfärg',
					'own' => 'Egen färg',
				),
				'default_value' => 'default',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5562b658acf48',
				'label' => 'Egen färg',
				'name' => 'price-colour',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5562b5c6acf47',
							'operator' => '==',
							'value' => 'own',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#151515',
			),
			array (
				'key' => 'field_5562b686acf49',
				'label' => 'Suffix',
				'name' => 'price-suffix',
				'type' => 'text',
				'instructions' => 'Fyll i om du vill visa ett suffix för priset (Exempelvis "/mån").',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'offer_price',
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
                    


function get_offer_slideshow($id, $offers_choice = false, $brands = false, $facilites = false, $types = false)
{

    if ($offers_choice == false) {
        $offer_args = get_offer_args($id, $brands, $facilites, $types);
        $offers = get_posts($offer_args);
    } else {
        $offers = $offers_choice;
    }

    ?>

    <div class="flexslider" id="slideshow-<?php echo $id; ?>" data-slideshow="otherslider">
        <ul class="slides">

            <?php
            foreach ($offers as $offer) {
                get_offer_slide($offer->ID);
            }

            ?>
        </ul>
    </div>

    <?php
    init_offer_slideshow($id);
}

function get_offer_args($id = false, $brands = false, $facilites = false, $types = false)
{
    $tax_query = array();

    if ($brands) {
        $offers_brands_keys = $brands;

        foreach ($offers_brands_keys as $key => $var) {
            $offers_brands_keys[$key] = (int)$var;
        }

        $tax_query[] = array(
            'taxonomy' => 'brand',
            'field' => 'id',
            'terms' => $offers_brands_keys,
        );

    }

    if ($facilites) {
        $offers_facilites_keys = $facilites;

        foreach ($offers_facilites_keys as $key => $var) {
            $offers_facilites_keys[$key] = (int)$var;
        }

        $tax_query[] = array(
            'taxonomy' => 'cities',
            'field' => 'id',
            'terms' => $offers_facilites_keys,
        );
    }

    if ($types) {
        $offers_types_keys = $types;

        foreach ($offers_types_keys as $key => $var) {
            $offers_types_keys[$key] = (int)$var;
        }

        $tax_query[] = array(
            'taxonomy' => 'offer_type',
            'field' => 'id',
            'terms' => $offers_types_keys,
        );
    }

    $offer_args = array(
        'posts_per_page' => -1,
        'offset' => 0,
        'category' => '',
        'category_name' => '',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'offer',
        'post_mime_type' => '',
        'post_parent' => '',
        'post_status' => 'publish',
        'suppress_filters' => true,
        'tax_query' => $tax_query,
    );

    return $offer_args;
}

function init_offer_slideshow($id)
{
    ?>

    <script>
        //$ = jQuery;
        //function animate_slideshow(slider, when) {
            //var current_caption = $(slider).find('.flex-active-slide .caption');
            //var animation = $(current_caption).data('animation');

            //if (when == 'start' || when == 'after') {

                //if (animation == 'fade') {
                    //$(current_caption).delay(200).css({
                        //"transition": "opacity ease-in 600ms",
                        //"opacity": 1,
                    //});
                //}
            //} else if (when == 'before') {
                //if (animation == 'fade') {
                    //$(current_caption).delay(200).css({
                        //"opacity": 0,
                    //});
                //}
            //}
        //}

        //$(document).ready(function () {

            /*$('#slideshow-<?php //echo $id; ?>').flexslider({
                animation: "fade",
                direction: "horizontal",
                slideshowSpeed: 6000,
                animationSpeed: 600,
                pauseOnHover: true,
                directionNav: true,
                touch: true,
                useCSS: true,
                smoothHeight: false,
                slideshow: true,
                keyboard: true,
                start: function (slider) {
                    animate_slideshow(slider, 'start');
                },
                after: function (slider) {
                    animate_slideshow(slider, 'after');
                },
                before: function (slider) {
                    animate_slideshow(slider, 'before');
                },

            });*/

        //});
    </script>

<?php
}

function get_offer_slide($id)
{
    $offer_image = get_field('offer-image', $id);
    $image_url = $offer_image['url'];
    $image_sd_url = maybe_add_preview_to_url($image_url);
    $image_alt = get_the_title($id);
    $image_title = get_the_title($id) . ' : ' . get_field('offer-description', $id);

    $offer_brand_class = '';
    $offer_type_class = '';

    $offer_types = get_terms('offer_type');
    $brands = get_terms('brand');

    foreach ($brands as $brand) {
        if (has_term($brand->slug, 'brand', $id)) {
            $offer_brand_class = $offer_brand_class . ' brand-' . $brand->slug;
        }
    }

    foreach ($offer_types as $type) {
        if (has_term($type->slug, 'offer_type', $id)) {
            $offer_type_class = $offer_type_class . ' type-' . $type->slug;
        }
    }

    $model_brand = wp_get_post_terms($id, 'brand');
    if ($model_brand) {
        $brand = $model_brand[0]->name;
        $brand_slug = $model_brand[0]->slug;
    }

    $offer_title = get_field('offer-title', $id);
    if ($offer_title) {
        $offer_header = $offer_title;
    } else {
        $offer_header = get_the_title($id);
    }
    
    $offer_description = get_field('slideshow-caption-content', $id);
    
    //$offer_description = get_field('offer-description', $id);
    ?>

    <li class="">
        <img src="<?php echo $image_sd_url; ?>" srcset="<?php echo $image_sd_url; ?> 500w, <?php echo $image_url; ?> 1000w" alt="" title="" draggable="false">
        
        <?php if($offer_description){
        
            $caption_background_color = 'background: transparent;';
            $caption_background = get_field('slideshow-caption-color', $id);
            $caption_opacity = get_field('slideshow-caption-opacity', $id);
            $caption_animation = get_field('slideshow-caption-animation', $id);
            $caption_border = get_field('slideshow-caption-border', $id);
            $caption_position = get_field('slideshow-caption-position', $id);
        
            // Set caption-color
            if ($caption_opacity != 100) {
                if($caption_background!='transparent'){
                    $opacity = $caption_opacity * 0.01;
                    $caption_background_color = 'background: ' . hex2rgba($caption_background, $opacity) . ';';
                }
                else {                    
                }
            }
            else {
                $caption_background_color = $caption_background;
            }

            if (!$caption_background) {
                $caption_background_color = 'background: transparent;';
            }

            // Set caption-order
            if ($caption_border == 'true') {
                $caption_border_color = 'border: 10px solid ' . hex2rgba($caption_background, 0.75) . ';';
            } else {
                $caption_border_color = 'none';
            }

            //Set caption-style
            if ($caption_background_color || $caption_border_color) {
                $caption_style = $caption_background_color . $caption_border_color;
            }
        
            ?>
        
            <div class="caption-wrapper <?php echo $offer_brand_class . ' ' . $offer_type_class; ?>" style="<?php if ($slideshow_border) { echo $slideshow_border_style; }?>">
                <div class="caption" data-animation="<?php echo $caption_animation; ?>">
                    <div class="vertical-align-wrapper">
                        <div class="vertical-align <?php echo $caption_position; ?>">
                            <div class="horizontal-align">
                                <div class="caption-contents" style="<?php echo $caption_style; ?>">
                                    <?php echo $offer_description; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </li>

<?php
}

function get_offer_slider($id)
{
    ?>
    <section class="section-block dark scroll" name="">

        <div class="section-effect shadow-inner-big" style="; ;">

            <div class="container-fluid full default-padding" style="">
                <div class="row-wrapper full ">

                    <div class="col-xs-12 col-sm-12 offer">

                        <div class="offer-header">
                            <div class="flexslider no-paging" id="slideshow-<?php echo $id; ?>" data-slideshow="otherslider">
                                <ul class="slides">

                                    <?php get_offer_slide($id); ?>

                                </ul>
                            </div>
                        </div>

                        <?php init_offer_slideshow($id); ?>

                    </div>

                </div>
            </div>

        </div>

    </section>
<?php
}

function get_offer_submenu($id)
{
    $menu_progress_color = get_field('page-settings-menu-bar', $id);
    $this_post = get_post($id);
    $offer_title = get_field('offer-title', $id);
    $offer_image = get_field('offer-image', $id);
    $image_url = $offer_image['url'];
    $offer_stop_date = get_field('offer-stop-date', $id);
    $prevPage = get_field("page-settings-back-page", $id);
    $prevPageLink = get_permalink($prevPage->ID);
    $prevPageTitle = $prevPage->post_title;
    ?>
    <section id="sub_menu" class="scroll-menu page-menu">
        <div class="submenu-wrapper">
            <div class="submenu-title">
                <h1 class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 share-title"><?php echo get_the_title($id); ?></h1>
                <div class="submenu-buttons">
                    <div class="col-xs-4 col-md-3 left-buttons">
                        <div class="bb-back">
                            <a class="back-link light" href="<?php echo $prevPageLink; ?>">
                                <span class="round-button">
                                    <i class="icon icon-chevron-thin-left"></i>
                                </span>
                                <p class="button-text back-link-title"><?php echo $prevPageTitle; ?></p>
                            </a>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                    <div class="col-xs-8 col-md-3 col-md-offset-6 right-buttons">
                        <div class="col-xs-6 bb-share" onclick="getShareOptions('#shareLinks_1');">
                            <div class="bb-share-links" id="shareLinks_1"></div>
                            <div class="round-button">
                                <i class="icon icon-share-alternative"></i>
                            </div>
                            <p class="button-text">Dela</p>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="col-xs-6 bb-favorite" data-bbfavorite="offer-<?php echo $id; ?>" data-url="<?php echo get_permalink(); ?>" data-title="<?php echo get_the_title($id); ?>" data-image="<?php echo $image_url; ?>" data-enddate="<?php echo $offer_stop_date; ?>" data-type="offer">
                            <div class="share-contain">
                                <div class="round-button">
                                    <p><strong>P</strong></p>
                                    <i class="icon icon-check"></i>
                                </div>
                                <p class="button-text">Spara</p>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="hidden-xs">
                <div class="item first">
                    <a href="#">&nbsp;</a>
                    <span></span>
                </div>
                <div class="item">
                    <a href="#offer">Läs erbjudandet</a>
                    <span></span>
                </div>

                <?php

                if (get_field('row', $id)) {
                    $rows = get_field('row', $id);
                    $counter = 1;
                    $row_count = count($rows);

                    foreach ($rows as $row => $item) {

                        $sub_menu_header = $item['row-settings-menu-header'];
                        $sub_menu_slug = get_slug($sub_menu_header);

                        ?>

                        <div class="item <?php echo $item_class; ?>">
                            <a href="#<?php echo $sub_menu_slug; ?>">
                                <?php echo $sub_menu_header; ?>
                            </a>
                            <span></span>
                        </div>
                        <?php

                        if ($counter == $row_count) {
                            $item_class = 'last';
                            ?>


                            <div class="item last">
                                <a href="#">&nbsp;</a>
                                <span></span>
                            </div>

                        <?php
                        }
                        $counter++;
                    }
                }

                ?>

            </div>
        </div>
    </section>
    <style>
        .scroll-menu .item span {
            background-color: <?php echo $menu_progress_color; ?>;
        }
    </style>

   

<?php
}

function get_offer_page($id, $layout)
{
    $rows = get_field('row', $id);
    if ($rows) {
        get_offer_slider($id);
        get_offer_submenu($id, true);
        get_offer_content($id, $layout);
        bytbil_content_loop(true, false);
    } else {
        get_offer_slider($id);
        get_offer_content($id, $layout);
    }

    ?>

<?php
}

function show_offer_gallery($id, $size, $paging = 4)
{

    $offer_title = get_the_title($id);

    if (get_field('offer-title', $id)) {
        $offer_title = get_field('offer-title', $id);
    }
    $offer_description = get_field('offer-description', $id);

    $image_object = get_field('offer-image', $id);

    if (get_field('offer-alt-image', $id)) {
        $image_object = get_field('offer-alt-image', $id);
    }

    $image_url = $image_object['url'];
    $image_sd_url = maybe_add_preview_to_url($image_url);
    $offer_meta = get_the_title($id);

    $offer_class = '';
    $offer_brand_class = '';
    $offer_type_class = '';

    $brands = get_terms('brand');
    $offer_types = get_terms('offer_type');

    foreach ($brands as $brand) {
        if (has_term($brand->slug, 'brand', $id)) {
            $offer_brand_class = $offer_brand_class . ' brand-' . $brand->slug;
        }
    }

    foreach ($offer_types as $type) {
        if (has_term($type->slug, 'offer_type', $id)) {
            $offer_type_class = $offer_type_class . ' type-' . $type->slug;
        }
    }

    ?>
    <div class="col-xs-12 col-sm-<?php echo $size; ?>">
        <div class="offer-container <?php echo $offer_brand_class . ' ' . $offer_type_class; ?>"
             title="<?php echo $offer_meta; ?>" id="offer-<?php echo $id; ?>"
             style="background-image: url(<?php echo $image_sd_url; ?>);">
            <a href="<?php echo get_permalink($id); ?>">
                <span class="offer-caption-wrapper">
                    <span class="offer-caption">
                        <?php echo $offer_title; ?>
                    </span>
                </span>
            </a>
        </div>
    </div>

<?php
}


function get_single_offer_content($id){
    ?>
    <section class="section-block dark scroll" style="background: #f7f7f7 ;" name="offer">

        <div class="container-fluid wrapper default-padding" style="">
            <div class="offer-page">
                <?php
                $offer_types = get_terms('offer_type');
                $brands = get_terms('brand');

                foreach ($brands as $brand) {
                    if (has_term($brand->slug, 'brand', $id)) {
                        $brand_slug = $offer_brand_class . ' ' . $brand->slug;
                    }
                }
    
                ?>
                <div class="col-xs-12">
                    <h2><?php echo get_field('offer-title', $id); ?></h2>
                </div>
                <div class="col-xs-12">
                    <?php
                        if (get_field('offer-tab', $id)) {
                            ?>
                            <div class="offer-information-panel">
                                <?php
                                $offer_tab = get_field('offer-tab', $id);
                                $counter = 1;
                                $tab_count = count($offer_tab);
                                ?>
                                <ul id="offer-information-tabs-<?php echo $id; ?>" class="nav nav-tabs responsive" data-tabs="tabs">
                                <?php
                                foreach ($offer_tab as $tab => $content) {
                                    $tab_content_type = $content['offer-tab-content'];
                                    ?>
                                    <li class="<?php if($counter == 1){ echo 'active'; } ?> <?php echo $brand_slug; ?>">
                                    <a href="#<?php echo $tab_content_type . '-' . $id . '-' . $counter; ?>" data-toggle="tab"><?php echo $content['offer-tab-text']; ?></a>
                                </li>
                                <?php
                                    $counter++;
                                }
                                ?>                            
                                </ul>
                                <div id="offer-information-content-<?php echo $id; ?>" class="tab-content responsive">
                                    <?php
                                    $counter = 1;
                                    foreach ($offer_tab as $tab => $content) {
                                        $tab_content_type = $content['offer-tab-content'];
                                        $tab_content_image = $content['offer-show-image'];
                                        $offer_vehicle = $content['offer-vehicle'];
                                        ?>
                                        <div role="tabpanel" class="tab-pane <?php if($counter == 1){ echo 'active'; } ?> <?php echo $brand_slug; ?>" id="<?php echo $tab_content_type . '-' . $id . '-' . $counter; ?>">
                                            <div class="row">
                                                
                                                <?php if($tab_content_image==1){
                                                ?>
                                                <div class="col-xs-12 col-sm-6 col-md-5 pull-right">
                                                    <?php $vehicle_image = get_field('vehicle-image', $offer_vehicle[0]->ID); ?>
                                                    <img src="<?php echo $vehicle_image['url']; ?>" />
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-7 pull-left">
                                                <?php
                                                } else {
                                                ?>
                                                <div class="col-xs-12">
                                                <?php
                                                }
                                                ?>
                                                    
                                            <?php echo $content['offer-tab-description']; ?>
                                            
                                            <?php
                                            if($tab_content_type=='modelinformation'){
                                                $offer_engine = $content['offer-engine'];
                                                foreach($offer_engine as $engine){
                                                    $gearbox = get_field_label('engine-gearbox', $engine->ID);
                                                    $horsepower = get_field('engine-horsepower', $engine->ID);
                                                    $consumption = get_field('engine-consumption', $engine->ID);
                                                    $carbondioxide = get_field('engine-carbondioxide', $engine->ID);
                                                    $fuel = get_field_label('engine-fuel', $engine->ID);
                                                    $subtitle = get_field('engine-subtitle', $engine->ID);
                                                }
                                                ?>
                                                <!--<h4 class="engines-title">Motorvariant</h4>-->
                                                <div class="panel-group offer-panel">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h5 class="panel-title">Motor<?php /*echo $engine->post_title;*/ ?></h5>
                                                        </div>
                                                        <div class="panel-body">
                                                            <table class="table table-hover engine-specs">
                                                                <tr class="engine-type-title">
                                                                    <td class="engine-title"><?php echo $gearbox; ?></td>
                                                                    <td class="engine-effect"><span class="engine-value hidden-xs">Effekt</span><span class="engine-value visible-xs">hk</span></td>
                                                                    <td class="engine-consumption"><span class="engine-value hidden-xs">Förbrukning</span><span class="engine-value visible-xs">l/100 km</span></td>
                                                                    <td class="engine-carbon"><span class="engine-value hidden-xs">CO<sup>2</sup>-utsläpp</span><span class="engine-value visible-xs">g/km</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="engine-title"><?php echo $subtitle; ?></td>
                                                                    <td class="engine-effect"><span class="engine-value"><?php echo $horsepower; ?></span><span class="engine-suffix hidden-xs"> hk</span></td>
                                                                    <td class="engine-consumption"><span class="engine-value"><?php echo $consumption; ?></span><span class="engine-suffix hidden-xs"> l/100 km</span></td>
                                                                    <td class="engine-carbon"><span class="engine-value"><?php echo $carbondioxide; ?></span><span class="engine-suffix hidden-xs"> g/km</span></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                
                                            }
                                            elseif($tab_content_type=='equipmentpackage'){
                                                $offer_package = $content['offer-equipmentpackage'];
                                                get_offer_equipment_package($id, $offer_package);
                                            }
                                            elseif($tab_content_type=='equipment'){
                                                $detail_equipment_list = $content['offer-equipment-list'];
                                                foreach($detail_equipment_list as $equipment){
                                                    get_equipment_accordion($id, $equipment->ID);
                                                }
                                            }
                                            elseif($tab_content_type=='custom'){
                                                echo $content['offer-custom-content'];
                                            }
                                            echo $content['offer-tab-footer'];
                                            ?>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    $counter++;
                                    }
                                    ?>
                                            
                                </div>
                            </div>
                            <hr/>
                            <?php
                            $offer_prices = get_field('offer-prices', $id);
                            if($offer_prices){
                                ?>
                                <div class="row">
                                    <div class="offer-prices <?php echo $brand_slug; ?>">
                                    <?php
                                    $prices_nr = count($offer_prices);
                                    foreach($offer_prices as $prices => $price) {
                                        ?>
                                        <div class="col-xs-6 col-sm-2">
                                            <span class="offer-price-label style-<?php echo get_price_style($price['offer-price-type']->ID); ?>">
                                                <?php echo get_price_label($price['offer-price-type']->ID); ?>
                                            </span>
                                            <span class="offer-price-value style-<?php echo get_price_style($price['offer-price-type']->ID); ?>">
                                                <?php echo $price['offer-price-value']; ?><?php
                                                    if(get_price_suffix($price['offer-price-type']->ID)){ ?><span class="price-suffix"><?php echo get_price_suffix($price['offer-price-type']->ID); ?></span><?php
                                                    } ?>
                                            </span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            <?php
                            }
                        ?>
                    </div>            
                <?php } ?>
            </div>
            <div class="col-xs-12">
                <?php echo get_field('offer-footer', $id); ?>
            </div>    
        </div>
    </section>
    <?php
}

function get_price_label($id){
    $price_label = get_field('price-header', $id);
    return $price_label;
}

function get_price_suffix($id){
    $price_suffix = get_field('price-suffix', $id);
    if($price_suffix){
        return $price_suffix;
    }
    else {
        return false;
    }
}

function get_price_style($id){
    $price_style = get_field('price-appearence', $id);
    if($price_style != 'own'){
        return $price_style;
    }
    else {
        return 'my-own';
    }
}

function get_offer_equipment_package($page_id, $model_equipment_package){
    $model_slug = 'test';
    ?>
    <div class="tab-pane" id="<?php echo $model_slug; ?>">
            <div class="row">

                <?php

                foreach ($model_equipment_package as $package) {
                    $package_id = $package->ID;
                    $saftey = get_field('vehicle-equipment-saftey', $package_id);
                    $tech = get_field('vehicle-equipment-tech', $package_id);
                    $comfort = get_field('vehicle-equipment-comfort', $package_id);
                    $styling = get_field('vehicle-equipment-styling', $package_id);
                    $misc = get_field('vehicle-equipment-misc', $package_id);
                    $extra = get_field('vehicle-equipment-extra', $package_id);
                    ?>
                    <?php if ($saftey) { ?>

                        <div class="col-xs-12 col-sm-4">
                            <h4>Säkerhet</h4>

                            <div class="panel-group equipment-saftey accordion model-<?php echo $package_id; ?>"
                                 id="accordion-<?php echo $package_id; ?>" role="tablist" aria-multiselectable="true">

                                <?php
                                foreach ($saftey as $equipment) {
                                    get_equipment_accordion($package_id, $equipment->ID);
                                }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($tech) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <h4>Teknik</h4>

                            <div class="panel-group equipment-tech accordion model-<?php echo $package_id; ?>"
                                 id="accordion-<?php echo $package_id; ?>" role="tablist" aria-multiselectable="true">

                                <?php
                                foreach ($tech as $equipment) {
                                    get_equipment_accordion($package_id, $equipment->ID);
                                }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($comfort) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <h4>Komfort</h4></h¤>
                            <div class="panel-group equipment-tech accordion model-<?php echo $package_id; ?>"
                                 id="accordion-<?php echo $package_id; ?>" role="tablist" aria-multiselectable="true">

                                <?php
                                foreach ($comfort as $equipment) {
                                    get_equipment_accordion($package_id, $equipment->ID);
                                }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($styling) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <h4>Styling</h4></h¤>
                            <div class="panel-group equipment-tech accordion model-<?php echo $package_id; ?>"
                                 id="accordion-<?php echo $package_id; ?>" role="tablist" aria-multiselectable="true">

                                <?php
                                foreach ($styling as $equipment) {
                                    get_equipment_accordion($package_id, $equipment->ID);
                                }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($misc) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <h4>Övrigt</h4></h¤>
                            <div class="panel-group equipment-tech accordion model-<?php echo $package_id; ?>"
                                 id="accordion-<?php echo $package_id; ?>" role="tablist" aria-multiselectable="true">

                                <?php
                                foreach ($misc as $equipment) {
                                    get_equipment_accordion($package_id, $equipment->ID);
                                }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($extra) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <h4>Tillägg</h4></h¤>
                            <div class="panel-group equipment-tech accordion model-<?php echo $package_id; ?>"
                                 id="accordion-<?php echo $package_id; ?>" role="tablist" aria-multiselectable="true">

                                <?php
                                foreach ($extra as $equipment) {
                                    get_equipment_accordion($package_id, $equipment->ID);
                                }
                                ?>

                            </div>
                        </div>
                    <?php } ?>
                <?php


                }
                ?>

            </div>
        </div>
    <?php
}

function get_offer_meta_data($id, $image = false) {
    if (get_field('pagesettings-title-tag', $id)) : ?>
        <meta property="og:title" content="<?php the_field('pagesettings-title-tag'); ?>" />
    <?php else : ?>
        <meta property="og:title" content="<?php echo get_the_title(); ?>" />
    <?php endif;

    if (get_field('pagesettings-meta-description')) : ?>
        <meta property="og:description" content="<?php the_field('pagesettings-meta-description'); ?>" />
    <?php else :
        $offer_tab = get_field('offer-tab', $id);

        $skip = false;
        foreach ($offer_tab as $tab => $content) {
            if (!$skip) : ?>
                <meta property="og:description" content="<?php echo strip_tags($content['offer-tab-description']); ?>" />
            <?php endif;
            $skip = true;
        }
    endif;

    if ($image) :
        $image_object = get_field('offer-image', $id);
        if ($image_object) :
            $image_url = maybe_add_preview_to_url($image_object['url']);
            $image_url = str_replace('customcms.bytbil.com', 'upplandsmotor.se', $image_url); ?>
            <meta property="og:image" content="<?php echo $image_url; ?>" />
        <?php endif;
    endif;

    if (get_field('pagesettings-meta-keywords')) : ?>
        <meta name="keywords" content="<?php the_field('pagesettings-meta-keywords'); ?>" />
    <?php else :
        $search_words = wp_get_post_terms($id, 'search_meta');
        if (!empty($search_words)) : ?>
            <meta name="keywords" content="<?php $words = sizeof($search_words); $i = 1; foreach ($search_words as $search_word) { echo $search_word->name; if ($i !== $words) { echo ', '; } ++$i; } ?>" />
        <?php endif;
    endif;
}

?>

