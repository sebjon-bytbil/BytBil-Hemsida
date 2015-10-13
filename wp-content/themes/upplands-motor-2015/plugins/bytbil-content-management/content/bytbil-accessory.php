<?php
add_action('init', 'cptui_register_my_cpt_accessory');
function cptui_register_my_cpt_accessory()
{
    register_post_type('accessory', array(
        'label' => 'Tillbehör',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'accessory', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'custom-fields', 'revisions'),
        'taxonomies' => array('brand', 'utrustning'),
        'labels' => array(
            'name' => 'Tillbehör',
            'singular_name' => 'Tillbehör',
            'menu_name' => 'Tillbehör',
            'add_new' => 'Add Tillbehör',
            'add_new_item' => 'Add New Tillbehör',
            'edit' => 'Edit',
            'edit_item' => 'Edit Tillbehör',
            'new_item' => 'New Tillbehör',
            'view' => 'View Tillbehör',
            'view_item' => 'View Tillbehör',
            'search_items' => 'Search Tillbehör',
            'not_found' => 'No Tillbehör Found',
            'not_found_in_trash' => 'No Tillbehör Found in Trash',
            'parent' => 'Parent Tillbehör',
        )
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_produkt',
        'title' => 'Produkt',
        'fields' => array(
            array(
                'key' => 'field_551239be69730',
                'label' => 'Bild',
                'name' => 'accessory-image',
                'type' => 'image_crop',
				'crop_type' => 'hard',
				'target_size' => 'accesory-default',
				'width' => '',
				'height' => '',
				'preview_size' => 'accesory-sd',
				'force_crop' => 'yes',
				'save_in_media_library' => 'no',
				'retina_mode' => 'no',
				'save_format' => 'object',
                'library' => 'all',
            ),
            array(
                'key' => 'field_551239216972b',
                'label' => 'Namn',
                'name' => 'accessory-name',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5512392f6972c',
                'label' => 'Modell',
                'name' => 'accessory-model',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_551239416972d',
                'label' => 'Specifikation',
                'name' => 'accessory-specification',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_551232a16973a',
                'label' => 'Pristyp',
                'name' => 'accessory-prices',
				'type' => 'repeater',
				'instructions' => 'Lägg till de priser som skall visas för tillbehöret.',
				'sub_fields' => array (
					array (
						'key' => 'field_5512e32a16973a',
						'label' => 'Pristyp',
						'name' => 'accessory-price-type',
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
						'key' => 'field_551212cef9aa',
						'label' => 'Pris',
						'name' => 'accessory-price-value',
						'type' => 'text',
						'instructions' => 'Fyll i det pris eller text du vill visa.',
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
            array(
                'key' => 'field_55121583697fa',
                'label' => 'Beskrivning',
                'name' => 'accessory-description',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'accessory',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(
                0 => 'excerpt',
                1 => 'custom_fields',
                2 => 'discussion',
                3 => 'comments',
                4 => 'slug',
                5 => 'author',
                6 => 'format',
                7 => 'featured_image',
                8 => 'categories',
                9 => 'tags',
                10 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}

function get_accessory_card($id, $row_counter, $content_count)
{
    $image = get_field('accessory-image', $id);
    if ($image) {
        $image_url = $image['url'];
    } else {
        $image_url = '/wp-content/themes/upplands-motor/images/employee-placeholder.png';
    }

    $accessory_name = get_field('accessory-name', $id);
    $accessory_model = get_field('accessory-model', $id);
    $accessory_specification = get_field('accessory-specification', $id);
    $accessory_prices = get_field('accessory-prices', $id);
    $accessory_description = get_field('accessory-description', $id);
    ?>
    <div class="col-xs-12 col-sm-4">
        <div class="accessory-card panel" id="accessory-<?php echo $id; ?>-<?php echo $row_counter; ?>-<?php echo $content_count; ?>">

            <div class="front">
                <div class="col-xs-12 col-sm-5 accessory-image">
                    <img src="<?php echo $image_url; ?>"/>

                    <div class="accessory-image-overlay"></div>
                </div>
                <div class="col-xs-12 col-sm-7 accessory-information block white-bg">
                    <h5 class="accessory-name">
                        <?php echo $accessory_name; ?>
                    </h5>
                    <p class="accessory-model">
                        <?php echo $accessory_model; ?>
                    </p>
                    <p class="accessory-specification">
                        <?php echo $accessory_specification; ?>
                    </p>
                    <p class="accessory-price">
                        <?php if ($accessory_prices) {
                            $prices_nr = count($accessory_prices);
                            foreach ($accessory_prices as $prices => $price) {
                                ?>
                                <strong><span class="accessory-price-value style-<?php echo get_price_style($price['accessory-price-type']->ID); ?>">
                                    <?php echo $price['accessory-price-value']; ?><?php
                                        if(get_price_suffix($price['accessory-price-type']->ID)){ ?><span class="price-suffix"><?php echo get_price_suffix($price['accessory-price-type']->ID); ?></span><?php
                                        } ?>
                                </span></strong>
                                <?php
                            }
                        } ?>
                    </p>
                    <button type="button" class="accessory-button button blue" onclick="toggleFlip('#accessory-<?php echo $id; ?>-<?php echo $row_counter; ?>-<?php echo $content_count; ?>');">Mer information</button>
                </div>
                <div class="clear clearfix"></div>
            </div>

            <div class="back">
                <div class="accessory-description">
                    <div class="accessory-back-top" onclick="toggleFlip('#accessory-<?php echo $id; ?>-<?php echo $row_counter; ?>-<?php echo $content_count; ?>')"><i class="icon icon-cross"></i></div>
                    <?php echo $accessory_description; ?>
                </div>
            </div>

        </div>
    </div>
<?php
}

function get_accessory_list($accessory_type, $row_counter, $content_count)
{
    $terms = get_terms($accessory_type->taxonomy);

    $args = array(
        'tax_query' => array(
            array(
                'taxonomy' => $terms[0]->taxonomy,
                'field' => 'term_id',
                'terms' => $terms[0]->term_taxonomy_id,
                'include_children' => false,
            )
        )
    );

    global $wp_query;
    $wp_query = new WP_Query($args);

    while ($wp_query->have_posts()) { $wp_query->the_post();
        get_accessory_card(get_the_ID(), $row_counter, $content_count);
    }
}

?>

