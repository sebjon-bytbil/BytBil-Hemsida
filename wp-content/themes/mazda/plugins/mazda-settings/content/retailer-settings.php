<?php

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_installningar',
        'title' => 'Inställningar',
        'fields' => array (
            array (
                'key' => 'field_552b9e25d736b',
                'label' => 'Information',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_552b9eafd736f',
                'label' => 'Namn',
                'name' => 'retailer-name',
                'type' => 'text',
                'instructions' => 'Fyll i företagets namn som skall visas på webbplatsen.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_552b9e32d736c',
                'label' => 'Logotyp',
                'name' => 'retailer-logotype',
                'type' => 'image',
                'instructions' => 'Välj eller ladda upp en logotyp för företaget.',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_552b9f75d7373',
                'label' => 'Hemsida',
                'name' => 'retailer-webpage',
                'type' => 'text',
                'instructions' => 'Fyll i den hemsideaddress som skall länkas till (används när återförsäljaren inte har Mazda Återförsäljarsida som sin egen hemsida).',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_552b9f75p0948',
                'label' => 'c/o',
                'name' => 'retailer-careof',
                'type' => 'text',
                'instructions' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_552b9f75m4988',
                'label' => 'Adress',
                'name' => 'retailer-address',
                'type' => 'text',
                'instructions' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_552b9f75j1143',
                'label' => 'Postnummer',
                'name' => 'retailer-postal-number',
                'type' => 'text',
                'instructions' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_552b9f75a3392',
                'label' => 'Ort',
                'name' => 'retailer-postal-city',
                'type' => 'text',
                'instructions' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_552b9e90d736e',
                'label' => 'BytBil Alias',
                'name' => 'retailer-bytbil-alias',
                'type' => 'text',
                'instructions' => 'Fyll i återförsäljarens access-alias hos BytBil.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_552b9e90d737b',
                'label' => 'Mazda Handlarkod',
                'name' => 'mazda-retailer-code',
                'type' => 'text',
                'instructions' => 'Fyll i återförsäljarens Handlarkod från Mazda',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_552b9f19d7370',
                'label' => 'Startsidan',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_552b9e52d736d',
                'label' => 'Om återförsäljaren',
                'name' => 'retailer-about',
                'type' => 'wysiwyg',
                'instructions' => 'Skriv en generell Om-oss-text som skall visas på webbplatsen.',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'no',
            ),
            array (
                'key' => 'field_5530s0d12ca02',
                'label' => 'Bildspel',
                'name' => 'retailer-slideshow',
                'type' => 'post_object',
                'instructions' => 'Välj det bildspel som skall visas på startsidan.',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'slideshow',
                ),
                'taxonomy' => array (
                    0 => 'search',
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
                'key' => 'field_552b9f2ed7371',
                'label' => 'Puffar',
                'name' => 'retailer-front-plugs',
                'type' => 'relationship',
                'instructions' => 'Välj de puffar som skall visas på startsidan.',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'plug',
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
                'key' => 'field_552b9f4dd7372',
                'label' => 'Fordonsurval',
                'name' => 'retailer-front-vehicles',
                'instructions' => 'Välj det fordonsurval som skall visas på Startsidan.',
                'type' => 'post_object',
                'column_width' => '',
                'post_type' => array (
                    0 => 'assortment',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_662b9f6as7289',
                'label' => 'Länkar',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_5541d9800b21f',
                'label' => 'Länk',
                'name' => 'retailer-links',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5541d9bb0b220',
                        'label' => 'Länken',
                        'name' => 'retailer-links-radio',
                        'type' => 'radio',
                        'column_width' => '',
                        'choices' => array (
                            0 => 'Innehåller',
                            1 => 'Börjar',
                            2 => 'Slutar',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'horizontal',
                    ),
                    array (
                        'key' => 'field_5541dbe70b221',
                        'label' => 'Sökord',
                        'name' => 'retailer-links-address',
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
                        'key' => 'field_5541dq111b456',
                        'label' => 'Länktext',
                        'name' => 'retailer-links-text',
                        'type' => 'text',
                        'instructions' => 'Lämna tom om du inte vill ändra',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_5541dc050b222',
                        'label' => 'Länken ska:',
                        'name' => 'retailer-links-action',
                        'type' => 'radio',
                        'column_width' => '',
                        'choices' => array (
                            0 => 'Tas bort',
                            1 => 'Länkas till',
                            2 => 'Lägg till bas-URL',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 0,
                        'layout' => 'horizontal',
                    ),
                    array (
                        'key' => 'field_5541dc520b223',
                        'label' => 'Sida',
                        'name' => 'retailer-links-page',
                        'type' => 'post_object',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_5541dc050b222',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'page',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till',
            ),
            array (
				'key' => 'field_555af2b48497b',
				'label' => 'Bilar i lager',
				'name' => 'page-vehicles-in-stock',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
            array(
                'key' => 'field_5446179e88927',
                'label' => 'Menyer',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_544617a788928',
                'label' => 'Huvudmeny',
                'name' => 'settings_menu',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_544617c488929',
                        'label' => 'Menyval',
                        'name' => 'settings_menu_item',
                        'type' => 'post_object',
                        'column_width' => '',
                        'post_type' => array(
                            0 => 'page',
                            1 => 'menus',
                        ),
                        'taxonomy' => array(
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till menyval',
            ),
            array(
                'key' => 'field_5424b23b3e062',
                'label' => 'SEO',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5424b79d05ba0',
                'label' => 'Använd egen SEO och META',
                'name' => 'sitesettings-seo-meta',
                'type' => 'true_false',
                'instructions' => 'Välj om du vill fylla i och påverka sitens generella SEO och META-data.',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_5424b85105ba1',
                'label' => 'Titeltag',
                'name' => 'sitesettings-title-tag',
                'type' => 'text',
                'instructions' => 'Skriv över sidans standard Titel-tag.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b79d05ba0',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: Mazda Återförsäljare - Mesta bilhandlaren i Stockholm!',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5424b8c105ba2',
                'label' => 'META Description',
                'name' => 'sitesettings-meta-description',
                'type' => 'textarea',
                'instructions' => 'Fyll i en egen description för webbsidan.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b79d05ba0',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: Stockholms främsta bilhandlare - Nya Mazda.',
                'maxlength' => 160,
                'rows' => 3,
                'formatting' => 'none',
            ),
            array(
                'key' => 'field_5424b93305ba3',
                'label' => 'META Keywords',
                'name' => 'sitesettings-meta-keywords',
                'type' => 'text',
                'instructions' => 'Fyll i ett antal relevanta keywords som beskriver er hemsida. Separera med kommatecken (,).',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5424b79d05ba0',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => 'Exempel: (Nya bilar, Stockholm, Mazda)',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-installningar',
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
                6 => 'slug',
                7 => 'author',
                8 => 'format',
                9 => 'featured_image',
                10 => 'categories',
                11 => 'tags',
                12 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}

function get_retailer_logotype($type){
    $image_object = get_field('retailer-logotype', 'options');
    return $image_object[$type];
}

function get_retailer_name(){
    return get_field('retailer-name', 'options');
}

function get_retailer_about(){
    return get_field('retailer-about', 'options');
}

function get_retailer_webpage(){
    return get_field('retailer-webpage', 'options');
}

function get_retailer_front_plugs(){
    $plugs = get_field('retailer-front-plugs', 'options');
    if ($plugs) {
        foreach ($plugs as $plug){
            if(function_exists("show_plug")){
                show_plug($plug->ID);
            }
        }
    }
}

function get_retailer_links()
{
    return get_field('retailer-links', 'options');
}

function handle_retailer_link($retailer_links, $object)
{
    foreach ($retailer_links as $retailer_link) {
        switch ((int) $retailer_link['retailer-links-radio']) {
            // Contains
            case 0:
                if (substr_count($object->href, $retailer_link['retailer-links-address']) > 0) {
                    switch_or_remove_link($retailer_link, $object);
                }
                break;

            // Starts with
            case 1:
                $pattern = '/^[\/]?' . $retailer_link['retailer-links-address'] . '/';
                if (preg_match($pattern, $object->href)) {
                    switch_or_remove_link($retailer_link, $object);
                }
                break;

            // Ends with
            case 2:
                $pattern = '/' . $retailer_link['retailer-links-address'] . '[\/]?$/';
                if (preg_match($pattern, $object->href)) {
                    switch_or_remove_link($retailer_link, $object);
                }
                break;
        }
    }
    return $object;
}

function switch_or_remove_link($retailer_link, &$object)
{
    // Replace link text
    if ($retailer_link['retailer-links-text'] !== '') {
        $object->innertext = $retailer_link['retailer-links-text'];
    }

    switch ((int) $retailer_link['retailer-links-action']) {
        case 0:
            // Remove tag
            $object->outertext = $object->innertext;
            break;
        case 1:
            // Replace link
            $object->href = get_permalink($retailer_link['retailer-links-page']->ID);
            break;
        case 2:
            // Prepend base URL (or URL by choosing if needed)
            // and open in new tab
            $object->target = '_blank';
            $object->href = MAZDA_BASE_URL . $object->href;
            break;
    }
}

?>
