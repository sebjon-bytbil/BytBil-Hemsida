<?php
if (function_exists("register_field_group")) {

    acf_set_options_page_title('Siteinställningar');
    acf_add_options_sub_page('Header');
    acf_add_options_sub_page('Boka service');
    acf_add_options_sub_page('Bygg din bil');
    acf_add_options_sub_page('Beställ broschyr');
    if (current_user_can('manage_options')) {
        acf_add_options_sub_page('Avancerat');
        acf_add_options_sub_page('Globala Inställningar');
    }
    acf_add_options_sub_page('SEO');

    register_field_group(array(
        'id' => 'acf_alla-sidor',
        'title' => 'Bakgrundsbild',
        'fields' => array(
            array(
                'key' => 'field_52ea6d499b684',
                'label' => 'Bakgrundsbild',
                'name' => 'bakgrundsbild',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'medium',
                'instructions' => 'Välj bakgrundsbild för sidan.',
                'library' => 'all',
            ),
            array(
                'key' => 'field_537c50d4506a2',
                'label' => 'Mobil Bakgrundsbildsbild',
                'name' => 'mobilback',
                'type' => 'text',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'medium',
                'instructions' => 'Välj en annan bakgrundsbild som skall visas på sidan i mobilen.',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_seo-vdw',
        'title' => 'SEO',
        'fields' => array(
            array(
                'key' => 'field_1233217761241',
                'label' => 'Titel',
                'name' => 'seo_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '60',
                'instructions' => 'Ange en unik titel för sidan. Max 60 tecken.',
            ),
            array(
                'key' => 'field_12332asd54gh241',
                'label' => 'Meta keywords',
                'name' => 'seo_keywords',
                'type' => 'text',
                'default_value' => 'bil, bilar, beg bil, begagnad bil, ny bil, nya bilar, köpa bil, köp bil, köpa begagnad bil, köpa ny bil, bilköp, bilmodell, bilmodeller, sök bil, söka bil, VOLVO, Volvo återförsäljare, Volvo bilar, ny bil, miljöbil, V40, V40 Cross Country, V70, V60, V50, C70, C30, XC60, XC70, XC90, S60, S80, tillbehör, däck, provkörning, säkerhet i bil, säker bil, hyra Volvo, Volvo service, Volvo reparationer, Volvo plåtverkstad',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
                'instructions' => 'Ange ett antal nyckelord som beskriver sidan.',
            ),
            array(
                'key' => 'field_12332asd76gh241',
                'label' => 'Meta description',
                'name' => 'seo_desc',
                'type' => 'textarea',
                'default_value' => 'Välkommen till din Volvo återförsäljare Utforska nya modeller och bygg din perfekta Volvo.',
                'maxlength' => 160,
                'rows' => 3,
                'formatting' => 'none',
                'placeholder' => '',
                'instructions' => 'Ange en beskrivning av sidan och vad besökaren kan göra. Max 160 tecken.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_erbjudanden-json',
        'title' => 'Erbjudandeinställningar',
        'fields' => array(
            array(
                'key' => 'field_53a943776fa41',
                'label' => 'JSON-parametrar',
                'name' => 'json_parameters',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'Exempel: tag=s60&campaign=car&template=list',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
                'instructions' => 'Ange JSON-parametrar som definerar de erbjudanden som visas',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'erbjudandesida-json.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'erbjudanden-json.php',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'wp_box',
            'hide_on_screen' => array(
                0 => 'the_content',
            ),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_egen-kod',
        'title' => 'Egen kod',
        'fields' => array(
            array(
                'key' => 'field_53cdf47f37a29',
                'label' => 'HTML',
                'name' => 'html-code',
                'type' => 'code_area',
                'language' => 'htmlmixed',
                'theme' => 'solarized'
            ),
            array(
                'key' => 'field_53cdf4a437a2a',
                'label' => 'CSS',
                'name' => 'css-code',
                'type' => 'code_area',
                'language' => 'css',
                'theme' => 'solarized'
            ),
            array(
                'key' => 'field_53cdf4a437a2f',
                'label' => 'JavaScript',
                'name' => 'js-code',
                'type' => 'code_area',
                'language' => 'javascript',
                'theme' => 'solarized'
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'single_html_ga.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_block',
        'title' => 'Block',
        'fields' => array(
            array(
                'key' => 'field_53eda4703dd03',
                'label' => 'Block',
                'name' => 'html-blocks',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_53eda4b1f2104',
                        'label' => 'HTML-kod',
                        'name' => 'html-code',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array(
                        'key' => 'field_53eda4cff2105',
                        'label' => 'Redigerbar för ÅF',
                        'name' => 'af-editable',
                        'type' => 'checkbox',
                        'column_width' => '',
                        'choices' => array(
                            'Ja' => 'Ja',
                        ),
                        'default_value' => '',
                        'layout' => 'vertical',
                    ),
                    array(
                        'key' => 'field_53eda88b61576',
                        'label' => 'Bakgrundsfärg',
                        'name' => 'block-background',
                        'type' => 'color_picker',
                        'column_width' => '',
                        'default_value' => 'transparent',
                    ),
                    array(
                        'key' => 'field_53edaa978931b',
                        'label' => 'Padding',
                        'name' => 'padding',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '0px',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_53edaacf8931c',
                        'label' => 'Margin',
                        'name' => 'margin',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '0px',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_53f1288133b59',
                        'label' => 'Bredd',
                        'name' => 'block-width',
                        'type' => 'radio',
                        'choices' => array(
                            '100%' => '100%',
                            '75%' => '75%',
                            '66%' => '66%',
                            '50%' => '50%',
                            '33%' => '33%',
                            '25%' => '25%',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => '100%',
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_53edaacf89312',
                        'label' => 'Höjd',
                        'name' => 'block-height',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => 'auto',
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
                'button_label' => 'Lägg till block',
            ),
            /*array (
                'key' => 'field_53cdf4a437a2b',
                'label' => 'CSS',
                'name' => 'css-code',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'none',
            ),*/
            array(
                'key' => 'field_53cdf4a437a2b',
                'label' => 'CSS',
                'name' => 'css-code',
                'type' => 'code_area',
                'language' => 'css',
                'theme' => 'default',
            ),
            array(
                'key' => 'field_53edb55983bd3',
                'label' => 'Meny',
                'name' => 'menu',
                'type' => 'select',
                'choices' => array(
                    'none' => 'Ingen meny',
                    'bottom-services' => 'Tjänster',
                    'bottom-buy' => 'Köp bil',
                    'footer' => 'Allmänt',
                    '' => '',
                ),
                'default_value' => 'none',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_523645bgd26345g',
                'label' => 'Textfärg',
                'name' => 'menu_color',
                'type' => 'select',
                'choices' => array(
                    'black' => 'Svart',
                    'white' => 'Vit',
                ),
                'default_value' => 'black',
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'single_blocks.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'single_blocks_af.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_servicetekniker',
        'title' => 'Servicetekniker',
        'fields' => array(
            array(
                'key' => 'field_52ed0aba94861',
                'label' => 'Iframe-URL',
                'name' => 'iframe_url',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'servicetekniker.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
                0 => 'permalink',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
                5 => 'revisions',
                6 => 'author',
                7 => 'format',
                8 => 'featured_image',
                9 => 'categories',
                10 => 'tags',
                11 => 'send-trackbacks',
            ),
        ),
        'menu_order' => -1,
    ));

    register_field_group(array(
        'id' => 'acf_avancerat',
        'title' => 'ÅF-Inställningar',
        'fields' => array(
            /*array (
                'key' => 'field_52eba24afd73a',
                'label' => 'FilterID',
                'name' => 'filterid',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),*/
            array(
                'key' => 'field_532c42ba8994d',
                'label' => 'Accesspaket',
                'name' => 'accesspaket',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'Exempel: aterfarsaljarevdw2014',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                'instructions' => 'Ange återförsäljarens unika Accesspaketalias.',
            ),
            array(
                'key' => 'field_5331880903bcf',
                'label' => 'ÅF-ID för Erbjudanden',
                'name' => 'aterforsaljid',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'Exempel: 123',
                'prepend' => '',
                'append' => '',
                'formatting' => 'text',
                'maxlength' => '',
                'instructions' => 'Ange återförsäljarens unika ÅF-ID.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-avancerat',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_bestall-broschyr',
        'title' => 'Beställ broschyr',
        'fields' => array(
            array(
                'key' => 'field_52ea7215d684e',
                'label' => 'Handlare',
                'name' => 'dealer_broschyr',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                'instructions' => 'Ange handlarnamn som skall förknippas med broschyrbeställningen.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-bestall-broschyr',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_galleri',
        'title' => 'Modellsida : Galleri',
        'fields' => array(
            array(
                'key' => 'field_52ed16b83641b',
                'label' => 'Bildgalleri',
                'name' => 'galleri',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_52ed16c13641c',
                        'label' => 'Bild',
                        'name' => 'image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'instructions' => 'Lägg till bilder som skall visas i galleriet för modellen',
                'button_label' => 'Lägg till bild',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'bilgalleri.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_bilar',
        'title' => 'Modellsida',
        'fields' => array(
            /*array (
                'key' => 'field_533407ad67549',
                'label' => 'Rubrik',
                'name' => 'rubriktext',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),*/
            array(
                'key' => 'field_52e8d91d6e34b',
                'label' => 'Visa "Dela"-länk',
                'name' => 'show_share',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 1,
                'instructions' => 'Bocka i för att visa "Dela"-länk på sidan.',
            ),
            array(
                'key' => 'field_52e8d9326e34c',
                'label' => 'Visa "Bygg din Volvo"-länk',
                'name' => 'show_build',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 1,
                'instructions' => 'Bocka i för att visa "Bygg din Volvo"-länk på sidan.',
            ),
            array(
                'key' => 'field_523645bgd535g',
                'label' => 'Textfärg',
                'name' => 'page_color',
                'type' => 'select',
                'choices' => array(
                    'black-page' => 'Svart',
                    'white-page' => 'Vit',
                ),
                'default_value' => 'black-page',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_52ebd37c1b740',
                'label' => 'Bildspelsbild',
                'name' => 'slideshow2',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => 'Välj en bild som skall visas i bildspelet på Utforska bil.',
            ),
            /*array (
                'key' => 'field_52ed2c783e58e',
                'label' => 'Erbjudanden',
                'name' => 'erbjudanden',
                'type' => 'page_link',
                'instructions' => 'Länk till erbjudande',
                'post_type' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'instructions' => 'Länk till erbjudande',
            ),*/
        ),

        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'single-bilar.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_bilen',
        'title' => 'Modellsida : Rubrik och ÅF-text',
        'fields' => array(
            array(
                'key' => 'field_533409bdd1274',
                'label' => 'Rubrik',
                'name' => 'rubriktexten',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'text',
                'instructions' => 'Ange rubriken som skall visas på sidan',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5367b1437e47b',
                'label' => 'ÅF : Textfält',
                'name' => 'pris',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'text',
                'instructions' => 'Ange eventuell information som respektive ÅF skall kunna redigera.',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'single-bilar.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));


    register_field_group(array(
        'id' => 'acf_boka-service',
        'title' => 'Boka service',
        'fields' => array(
            array(
                'key' => 'field_52ea66ec062b3',
                'label' => 'Boka Service-ID',
                'name' => 'ccode',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'Ex: 23111010',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                'instructions' => 'Ange återförsäljarens Boka Service-ID som kopplas till Volvos Boka Service-system.'
            ),
            array(
                'key' => 'field_53f1a4deddf1a',
                'label' => '',
                'name' => 'external_service-check',
                'type' => 'checkbox',
                'choices' => array(
                    'true' => 'Har du en annan Boka Service-sida?',
                ),
                'default_value' => '',
                'layout' => 'vertical',
            ),
            array(
                'key' => 'field_53f1a506ddf1b',
                'label' => 'Annan adress till din Boka Service-sida',
                'name' => 'external_service-link',
                'type' => 'text',
                'default_value' => '',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53f1a4deddf1a',
                            'operator' => '==',
                            'value' => 'true',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-boka-service',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_bygg-din-bil',
        'title' => 'Bygg din bil',
        'fields' => array(
            array(
                'key' => 'field_52e8feb63b50d',
                'label' => 'Återförsäljare Filter-ID',
                'name' => 'build_car_id',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'Exempel: 0012, 0013, 0014',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                'instructions' => 'Ange återförsäljarens Filter-ID som kopplas till Bygg din Bil hos Volvo.',
            ),
            array(
                'key' => 'field_52ea651d7d315',
                'label' => 'Priskod',
                'name' => 'price_localization',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'Exempel: SE1234',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                'instructions' => 'Ange återförsäljarens Priskod som kopplas till Bygg din Bil hos Volvo.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-bygg-din-bil',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_fordon',
        'title' => 'Fordon',
        'fields' => array(
            array(
                'key' => 'field_52ec556a63501',
                'label' => 'Kontaktformulär',
                'name' => 'kontaktformular',
                'type' => 'text',
                'instructions' => 'Shortcode från Ninja Forms',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'fordon.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_header',
        'title' => 'Hem och startsida',
        'fields' => array(
            array(
                'key' => 'field_53f1288133b59',
                'label' => 'Logotyp',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_52e90728e99d0',
                'label' => 'Logotyp',
                'name' => 'logo',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_53f5c2d1e5f02',
                'label' => 'Höjd',
                'name' => 'logo_height',
                'type' => 'text',
                'instructions' => 'Fyll i en fast höjd för logotypen. Ex: 300px eller 50%',
                'default_value' => '74px',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53f5c2d1e5f03',
                'label' => 'Bredd',
                'name' => 'logo_width',
                'type' => 'text',
                'instructions' => 'Fyll i en fast bredd för logotypen. (Ex: 300px eller 50%)',
                'default_value' => '320px',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53f1288133b54',
                'label' => 'Länkar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_52e90739e99d1',
                'label' => 'Länk till hemsida',
                'name' => 'home_link',
                'type' => 'text',
                'instructions' => 'Fyll i webbadressen för er egen företagssida.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_52e9076ee99d2',
                'label' => 'Länk : Text',
                'name' => 'home_link_title',
                'type' => 'text',
                'instructions' => 'Fyll i vad det skall stå i knappen. (Ex: Gå till vår hemsida.)',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_52e9076ee99d3',
                'label' => 'Länk : Beteende',
                'name' => 'home_link_target',
                'type' => 'radio',
                'instructions' => 'Välj om er hemsida skall öppnas i ett nytt eller i samma fönster.',
                'choices' => array(
                    '_self' => 'Öppna i samma fönster',
                    '_blank' => 'Öppna i nytt fönster',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '_self',
                'layout' => 'vertical',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-header',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_startsidor',
        'title' => 'Startsidor',
        'fields' => array(
            array(
                'key' => 'field_52e242c2ef09f',
                'label' => 'Beskrivning',
                'name' => 'description',
                'type' => 'wysiwyg',
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
                'instructions' => 'Ange texten som skall visas under rubriken på startsidan.',
            ),
            array(
                'key' => 'field_5332b786f9dba',
                'label' => 'ÅF : Textfält',
                'name' => 'description2',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                'instructions' => 'Ange eventuell information som respektive ÅF skall kunna redigera.',

            ),
            array(
                'key' => 'field_5332fa57fe615',
                'label' => 'Textfärg',
                'name' => 'textcolor',
                'type' => 'color_picker',
                'required' => 1,
                'default_value' => '#FFFFFF',
                'instructions' => 'Välj färg för textinnehållet på startsidan.',
            ),

            array(
                'key' => 'field_52f8f6a2ba743',
                'label' => 'Öppna länk i..',
                'name' => 'open_link_in',
                'type' => 'radio',
                'choices' => array(
                    '_self' => 'Öppna i samma Fönster',
                    '_blank' => 'Öppna i nytt Fönster',
                    'lightbox' => 'Öppna i Lightbox',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'instructions' => 'Välj om länken skall öppnas i nytt eller samma fönster.',
                'layout' => 'vertical',
            ),
            array(
                'key' => 'field_531f23d6a7765',
                'label' => 'Länktyp',
                'name' => 'lanktypen',
                'type' => 'radio',
                'choices' => array(
                    'ext' => 'Extern adress',
                    'int' => 'Intern sida',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'instructions' => 'Välj om länken skall gå till en intern sida eller en extern adress.',
                'layout' => 'vertical',
            ),
            array(
                'key' => 'field_531f23dca7766',
                'label' => 'Intern sida',
                'name' => 'internlank',
                'type' => 'page_link',
                'instructions' => 'Välj vilken sida länken skall gå till.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_531f23d6a7765',
                            'operator' => '==',
                            'value' => 'int',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_531f23e8a7767',
                'label' => 'Extern Länk',
                'name' => 'externlank',
                'type' => 'text',
                'instructions' => 'Välj vilken adress länken skall gå till.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_531f23d6a7765',
                            'operator' => '==',
                            'value' => 'ext',
                        ),
                    ),
                    'allorany' => 'any',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53ec6e730e222',
                'label' => 'Prioritet',
                'name' => 'prioritet',
                'type' => 'number',
                'instructions' => 'Ange prioritet 1-10 för att styra ordningen på Startsidorna.',
                'default_value' => 5,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'startsidor',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_undersidor',
        'title' => 'Undersidor',
        'fields' => array(
            array(
                'key' => 'field_52e9365bcd798',
                'label' => 'Bild',
                'name' => 'bild',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_52eacc6da3444',
                'label' => 'Bannertext1',
                'name' => 'bannertext',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_52eacc6da3445',
                'label' => 'Bannertext2',
                'name' => 'bannertext2',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_52eacc8c298c7',
                'label' => 'Bannerknapp text',
                'name' => 'bannerknapp_text',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_52eacc9cef09f',
                'label' => 'Bannerknapp url',
                'name' => 'bannerknapp_url',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_52eaf0b5c749e',
                'label' => 'Öppna bannerlänk i lightbox',
                'name' => 'open_in_lightbox',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'single-other.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'single_other_ga.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'kampanj.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'kampanj_nomenu.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_globala-installningar',
        'title' => 'Globala inställningar',
        'fields' => array(/*array (
                'key' => 'field_52e79997aa748',
                'label' => 'Öppettider',
                'name' => 'opentimes',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_52e94ca8362bf',
                        'label' => 'Fritext',
                        'name' => 'fritext',
                        'type' => 'text',
                        'instructions' => 'Till exempel vilken avdelning. Eller vilken ort. Eller bägge.',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_52e94cd4362c0',
                        'label' => 'Tider',
                        'name' => 'times',
                        'type' => 'repeater',
                        'column_width' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_52e94cec362c1',
                                'label' => 'Dag(ar)',
                                'name' => 'day',
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
                                'key' => 'field_52e94cff362c2',
                                'label' => 'Tider',
                                'name' => 'time',
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
                        'button_label' => 'Lägg till tid',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till',
            ),*/
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-globala-installningar',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));

}
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_utrustringspaket',
        'title' => 'Utrustning/Motorvarianter',
        'fields' => array(
            array(
                'key' => 'field_532ae9ae1aaf2',
                'label' => 'Modellbild',
                'name' => 'bild_utrustning',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => 'Välj en modellbild som skall visas i sidhuvudet på sidan.',
            ),
            array(
                'key' => 'field_532aeb0706502',
                'label' => 'Rubrik',
                'name' => 'utrustringspaketheader',
                'type' => 'text',
                'column_width' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'instructions' => 'Ange en rubrik som skall visas i sidhuvudet på sidan.',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_532aea391aaf3',
                'label' => 'Utrustringspaket/Motorvarianter',
                'name' => 'utrustningsnivaer',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_532aeb0706502',
                        'label' => 'Utrustringspaket/Motorvariant',
                        'name' => 'utrustringspaket',
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
                        'key' => 'field_532aeac41aaf4',
                        'label' => 'Beskrivning',
                        'name' => 'utrustringspaket-editor',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'instructions' => 'Lägg till olika utrustningspaket/motorvarianter.',
                'button_label' => 'Lägg till',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'utrustning.php',
                    'order_no' => 0,
                    'group_no' => 0,

                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'wp_box',
            'hide_on_screen' => array(
                0 => 'comments'
            ),
        ),
        'menu_order' => 0,
    ));
}

/*if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_motorvarianter',
        'title' => 'motorvarianter',
        'fields' => array (
            array (
                'key' => 'field_53319694db4b4',
                'label' => 'Bild För motorvarianter (GA)',
                'name' => 'bild_motorvarianter',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_53319699db4b5',
                'label' => 'motorvarianter ',
                'name' => 'motorvarianter2',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5331969edb4b6',
                        'label' => 'Motorvarianter Header (GA)',
                        'name' => 'motorvarianterheader',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_533196a1db4b7',
                        'label' => 'Motorvarianter (GA)',
                        'name' => 'motorvarianter-editor',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'motor-alternative.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}*/

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_urval',
        'title' => 'Urval',
        'fields' => array(
            array(
                'key' => 'field_5326fc46d53a6',
                'label' => 'Sidtyp',
                'name' => 'assortment-type',
                'type' => 'select',
                'choices' => array(
                    'Lista' => 'Utan sökfunktion',
                    'SokLista' => 'Med sökfunktion',
                    'Senaste' => 'Senaste bilarna',
                ),
                'default_value' => 'Lista',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_5326fc32d53a5',
                'label' => 'Criteriasträng',
                'name' => 'assortment-string',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'assortment',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_fordonsurval',
        'title' => 'Fordonslistning',
        'fields' => array(
            array(
                'key' => 'field_5326fc4dd53a7',
                'label' => 'Fordonsurval',
                'name' => 'assortment-choice',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'assortment',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'allow_null' => 1,
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'lagerbil-iframe.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'lagerbil-newiframe.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'lagerbil-iframe2-0.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_doldh1',
        'title' => 'doldh1',
        'fields' => array(
            array(
                'key' => 'field_53344c3bb4bfa',
                'label' => 'Dold H1',
                'name' => 'dolh1a',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'instructions' => 'Ange en rubrik som enbart är synlig för sökmotorer.',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'utforskabil.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page.php',
                    'order_no' => 0,
                    'group_no' => 2,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'kopbil.php',
                    'order_no' => 0,
                    'group_no' => 3,
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'single-bilar.php',
                    'order_no' => 0,
                    'group_no' => 4,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_startsidorhide',
        'title' => 'Dolda startsidor',
        'fields' => array(
            array(
                'key' => 'field_53957a4234d92',
                'label' => 'Dölj rubrik',
                'name' => 'dolj-rubrik',
                'type' => 'true_false',
                'message' => '',
                'instructions' => 'Bocka i för att dölja rubriken på denna startsida.',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_537a3be6fe133',
                'label' => 'ÅF får dölja',
                'name' => 'hideable',
                'type' => 'true_false',
                'message' => '',
                'instructions' => 'Bocka i för att tillåta ÅF att dölja denna startsida.',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_537a5002a4aee',
                'label' => 'Dölj',
                'name' => 'hidden',
                'type' => 'true_false',
                'instructions' => 'Bocka i för att dölja denna startsida.',
                'message' => '',
                'default_value' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'startsidor',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'side',
            'layout' => 'wp_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_newsticker',
        'title' => 'Newsticker',
        'fields' => array(
            array(
                'key' => 'field_53844a391f88c',
                'label' => 'Nyhetsflöde RSS',
                'name' => 'newsticker_url',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                'instructions' => 'Ange adressen till Volvos Nyhetsflöde-flöde.',
            ),
            array(
                'key' => 'field_54cdf4a437c21',
                'label' => 'CSS',
                'name' => 'global_css-code',
                'type' => 'code_area',
                'language' => 'css',
                'theme' => 'solarized'
            ),
            array(
                'key' => 'field_54cdf4a437c22',
                'label' => 'JavaScript',
                'name' => 'global_js-code',
                'type' => 'code_area',
                'language' => 'javascript',
                'theme' => 'solarized'
            ),
            array(
                'key' => 'field_54cdfsdsa24a437c22',
                'label' => 'Generell Bakgrundsbild',
                'name' => 'general_backgroundimage',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => 'Välj en bakgrundsgbild som skall visas på de sidor som ej har angivet en egen bakgrund.',
            ),
            array(
                "key" => "field_huodaf8790dfijhkw4rt9y8wefnjo23f4y787",
                "label" => "Boka Provkörning E-post",
                "name" => "new_car_email_rows",
                "type" => "repeater",
                "instructions" => "Här kan du fylla i epostadresser till de olika orter man ska kunna boka provkörning på",
                "row_min" => 1,
                'button_label' => 'Lägg till ort',
                "sub_fields" => array(
                    array(
                        "key" => "field_oyasd80yoqu3b98ywef08yw30poifib8",
                        "label" => "Ortnamn",
                        "name" => "car_location",
                        "type" => "text",
                        "required" => 1,
                    ),
                    array(
                        'key' => 'field_538ee9768fedsuhi4w978yf38fc8',
                        'label' => 'E-postadress',
                        'name' => 'car_email',
                        'type' => 'email',
                        'instructions' => 'E-postadress att skicka formuläret till',
                        'required' => 1,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                    )
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-globala-installningar',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_seo',
        'title' => 'SEO Inställningar',
        'fields' => array (
            array (
                'key' => 'field_5603ede1e64e1',
                'label' => 'SEO',
                'name' => 'options-seo',
                'type' => 'repeater',
                'instructions' => '<a id="mtoMigrate" class="hidden button button-primary" href="#" onclick="migrateToOptions();" style="min-width:50px;min-height:30px;text-align:center;">Hämta SEO-data från sidor</a>',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5603f28be64e2',
                        'label' => 'Sida',
                        'name' => 'options-seo-page',
                        'type' => 'post_object',
                        'column_width' => '',
                        'post_type' => array (
                            0 => 'page',
                        ),
                        'taxonomy' => array (
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_5603f35ce64e3',
                        'label' => 'Titel',
                        'name' => 'options-seo-title',
                        'type' => 'text',
                        'instructions' => 'Ange en unik titel för sidan. Max 60 tecken.',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => 60,
                    ),
                    array (
                        'key' => 'field_5603f378e64e4',
                        'label' => 'Meta keywords',
                        'name' => 'options-seo-keywords',
                        'type' => 'text',
                        'instructions' => 'Ange ett antal nyckelord som beskriver sidan.',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_5603f39de64e5',
                        'label' => 'Meta description',
                        'name' => 'options-seo-description',
                        'type' => 'textarea',
                        'instructions' => 'Ange en beskrivning av sidan och vad besökaren kan göra. Max 160 tecken.',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => 160,
                        'rows' => '',
                        'formatting' => 'none',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-seo',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
		'id' => 'acf_af-text',
		'title' => 'ÅF-Text',
		'fields' => array (
			array (
				'key' => 'field_5594ba5b1a279',
				'label' => 'Sidor',
				'name' => 'af-sidor',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5594ba8c1a27a',
						'label' => 'Sida',
						'name' => 'af-sida',
						'type' => 'post_object',
						'instructions' => 'Välj den sida du vill lägga till text i det fördefinierade ÅF-fältet',
						'column_width' => 30,
						'post_type' => array (
							0 => 'page',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_5594babb1a27b',
						'label' => 'Text',
						'name' => 'af-text',
						'type' => 'text',
						'instructions' => 'Fyll i den text som skall stå i det fördefinierade ÅF-fältet',
						'column_width' => 70,
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
				'button_label' => 'Lägg till sida',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-globala-installningar',
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
}
                    

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_boka-provkorning',
        'title' => 'Boka provkörning',
        'fields' => array(
            array(
                'key' => 'field_538ee26338fc9',
                'label' => 'Bilar',
                'name' => 'bilar',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_538ee27438fca',
                        'label' => 'Bild',
                        'name' => 'car_image',
                        'type' => 'image',
                        'required' => 1,
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_538ee2a838fcb',
                        'label' => 'Bilnamn',
                        'name' => 'car_name',
                        'type' => 'text',
                        'required' => 1,
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Lägg till bil',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'boka_provkorning.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'no_box',
            'hide_on_screen' => array(
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
                6 => 'revisions',
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




?>
