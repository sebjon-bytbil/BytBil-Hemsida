<?php


// Register Custom Post Type
function add_companypage_cpt() {
    $labels = array(
        'name'                => _x( 'Företagssidor', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Företagssida', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Företagssidor', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'Alla företagssidor', 'text_domain' ),
        'view_item'           => __( 'Visa företagssida', 'text_domain' ),
        'add_new_item'        => __( 'Lägg till företagssida', 'text_domain' ),
        'add_new'             => __( 'Lägg till företagssida', 'text_domain' ),
        'rewrite'             => array('slug' => 'foretagssidor', 'with_front' => true),
        'edit_item'           => __( 'Redigera företagssida', 'text_domain' ),
        'update_item'         => __( 'Update Item', 'text_domain' ),
        'search_items'        => __( 'Sök företagssida', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Inga företagssidor hittades i papperskorgen', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'company_page', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 25,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'company_page', $args );

}
// Hook into the 'init' action
add_action( 'init', 'add_companypage_cpt', 0 );


add_action('init', 'cptui_register_my_cpt_billista_list');
function cptui_register_my_cpt_billista_list()
{
    register_post_type('employee_car_list', array(
        'label' => 'Billista',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=company_page',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'employee_car_list', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'revisions', 'thumbnail'),
        'taxonomies' => array('brand', 'cities'),
        'labels' => array(
            'name' => 'Billista',
            'singular_name' => 'Billista',
            'menu_name' => 'Billista',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till billista',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera billista',
            'new_item' => 'Ny billista',
            'view' => 'Visa billista',
            'view_item' => 'Visa billista',
            'search_items' => 'Sök billista',
            'not_found' => 'Ingen billista hittad',
            'not_found_in_trash' => 'Ingen billista i papperskorgen',
            'parent' => 'Billistans förälder',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_car_list_models',
        'title' => 'Personalbilar',
        'fields' => array(
            array (
				'key' => 'field_5562ac67877a8ev',
				'label' => 'Personalbilar',
				'name' => 'employee_vehicles',
				'type' => 'repeater',
				'instructions' => 'Lägg till modeller och den information du vill visa för varje modell.',
				'sub_fields' => array (
					array (
						'key' => 'field_5562ad26877a9ev',
						'label' => 'Bilmodell',
						'name' => 'Bilmodell',
                        'type' => 'relationship',
                        'post_type' => array(
                            0 => 'vehicle',
                            1 => 'modelgroup',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'formatting' => 'br',
                        'rows' => '',
					),
                    array (
						'key' => 'field_5562ad5e877aaev-descr',
						'label' => 'Pris',
						'name' => 'vehicle-description-ev',
						'type' => 'text',
						'instructions' => 'Fyll i en mindre beskrivning.',
						'column_width' => 50,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
                    array (
						'key' => 'field_5512e32a16973a-ev',
						'label' => 'Pristyp',
						'name' => 'vehicle-price-type-ev',
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
						'key' => 'field_5562ad5e877aaev',
						'label' => 'Pris',
						'name' => 'vehicle-price-value-ev',
						'type' => 'text',
						'instructions' => 'Fyll i pris.',
						'column_width' => 50,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
                    array(
                        'key' => 'field_5523fcb86aa33ev',
                        'label' => 'Länka objekt',
                        'name' => 'ev-link-type',
                        'type' => 'radio',
                        'instructions' => 'Välj om du vill länka hela bilden till ett innehåll.',
                        'column_width' => '',
                        'choices' => array(
                            'none' => 'Ingenting',
                            'internal' => 'Intern sida',
                            'external' => 'Extern URL',
                            'file' => 'Fil eller media',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'none',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_5523fd0e6aa34ev',
                        'label' => 'Sida',
                        'name' => 'ev-link-internal',
                        'type' => 'relationship',
                        'post_type' => array(
                            0 => 'page',
                            1 => 'offer'
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'formatting' => 'br',
                        'rows' => '',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5523fcb86aa33ev',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                    ),
                    array(
                        'key' => 'field_5523fd376aa35ev',
                        'label' => 'URL',
                        'name' => 'ev-link-external',
                        'type' => 'text',
                        'instructions' => 'Fyll i en adress bilden skall länka till.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5523fcb86aa33ev',
                                    'operator' => '==',
                                    'value' => 'external',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => 'www.bytbil.com',
                        'prepend' => 'http://',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5523fd876aa36ev',
                        'label' => 'Fil',
                        'name' => 'ev-link-file',
                        'type' => 'file',
                        'instructions' => 'Välj eller ladda upp en fil bilden skall länka till.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5523fcb86aa33',
                                    'operator' => '==',
                                    'value' => 'file',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'save_format' => 'object',
                        'library' => 'all',
                    ),
                    array (
						'key' => 'field_5562ad5e877aa-ev-button',
						'label' => 'Knapptext',
						'name' => 'vehicle-more-text',
						'type' => 'text',
						'instructions' => 'Fyll i Läsmer knapp.',
                        'conditional_logic' => array(
                            'status' => 1,
                            'rules' => array(
                                array(
                                    'field' => 'field_5523fcb86aa33',
                                    'operator' => '==',
                                    'value' => 'file',
                                ),
                                array(
                                    'field' => 'field_5523fcb86aa33',
                                    'operator' => '==',
                                    'value' => 'external',
                                ),
                                array(
                                    'field' => 'field_5523fcb86aa33',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
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
				'button_label' => 'Lägg till Modell',
			),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'employee_car_list',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
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
        'menu_order' => 2,
    ));
}


if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_car_logo',
        'title' => 'Logotype',
        'fields' => array(
            array(
                'key' => 'field_535944894619e9438',
                'label' => 'Logotyp',
                'name' => 'company_logotype',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
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
        'menu_order' => 1,
    ));
}

/*
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_start',
        'title' => 'Start',
        'fields' => array(
            array(
                'key' => 'field_535944894619e9438',
                'label' => 'Bakgrundsbild',
                'name' => 'company_start_background',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => '',
            ),
            array(
                'key' => 'field_230333b7232390e076',
                'label' => 'Rubrik',
                'name' => 'company_start_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_45686579354672',
                'label' => 'Beskrivning',
                'name' => 'company_start_description',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'rows' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
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

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_services',
        'title' => 'Tjänster',
        'fields' => array(
            array(
                'key' => 'field_456865793543845672',
                'label' => 'Välj tjänster',
                'name' => 'company_services',
                'type' => 'relationship',
                'post_type' => array(
                    0 => 'services',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'rows' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
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
        'menu_order' => 1,
    ));
}


if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_models',
        'title' => 'Säljarbil',
        'fields' => array(
            array(
                'key' => 'field_456865734693545672',
                'label' => 'Välj modeller',
                'name' => 'company_models',
                'type' => 'relationship',
                'post_type' => array(
                    0 => 'vehicle',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'rows' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
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
        'menu_order' => 2,
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_seller_models',
        'title' => 'Personalbil',
        'fields' => array(
            array(
                'key' => 'field_45686579354345672',
                'label' => 'Välj modeller',
                'name' => 'company_seller_models',
                'type' => 'relationship',
                'post_type' => array(
                    0 => 'vehicle',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'rows' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
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
        'menu_order' => 2,
    ));
}
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_employees',
        'title' => 'Personal',
        'fields' => array(
            array(
                'key' => 'field_45686579aa225672',
                'label' => 'Välj kontaktpersoner',
                'name' => 'company_employees',
                'type' => 'relationship',
                'post_type' => array(
                    0 => 'employee',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'br',
                'rows' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'company_page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
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
        'menu_order' => 3,
    ));
}
*/
