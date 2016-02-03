<?php

/* Load Admin-settings for Upplands Motor */
function add_settings_js() {
    wp_enqueue_script("um-settings-js", get_template_directory_uri() . "/plugins/upplands-motor-settings/um-settings.js", array("jquery"), null, true);
}
add_action("admin_enqueue_scripts", "add_settings_js");

/* Options Page */
if (function_exists('acf_set_options_page_title')) {
    acf_set_options_page_title('Upplands Motor');
    acf_add_options_sub_page('Inställningar');
    acf_add_options_sub_page('Epost');
    acf_add_options_sub_page('Sidhuvud');
    acf_add_options_sub_page('Min P-plats');
    acf_add_options_sub_page('Sidfot');
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
		'id' => 'acf_hemsideinstallningar',
		'title' => 'Hemsideinställningar',
		'fields' => array (
			array (
				'key' => 'field_551162dd1f8a3',
				'label' => 'Logotyper',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_55115e9ba37f3',
				'label' => 'Logotyp (.SVG)',
				'name' => 'settings-logotype-svg',
				'type' => 'file',
				'instructions' => 'Ladda upp en logotyp i vektorformat (.svg) som skall användas på hemsidan.',
				'save_format' => 'object',
				'library' => 'all',
			),
			array (
				'key' => 'field_55115fa9a37f5',
				'label' => 'Logotyp (.PNG)',
				'name' => 'settings-logotype-png',
				'type' => 'image',
				'instructions' => 'Ladda upp en logotyp i webbformat (.png) som skall användas på hemsidan.',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_551162f31f8a4',
				'label' => 'Övrigt gränssnitt',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_55115eb4a37f4',
				'label' => 'Favicon',
				'name' => 'settings-favicon',
				'type' => 'file',
				'instructions' => 'Ladda upp en favicon som skall visas för siten med namn "favico.ico".',
				'save_format' => 'object',
				'library' => 'all',
			),
			array (
				'key' => 'field_55116f268a94c',
				'label' => 'Touchicon',
				'name' => 'settings-touchicon',
				'type' => 'image',
				'instructions' => 'Ladda upp en bild som ni vill skall användas som genvägsikon för touchbaserade enheter som iPhone och iPad. (512x512 px)',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5546d6b086ceb',
				'label' => 'Kontaktinformation',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5546d6ca86cec',
				'label' => 'Växelnummer',
				'name' => 'settings-contact-phonenumber',
				'type' => 'text',
				'instructions' => 'Fyll i ett generellt växelnummer som skall användas i de fall som inte inlägget är butiksspecifikt.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5546d6fa86ced',
				'label' => 'Verkstadsnummer',
				'name' => 'settings-contact-phonenumber-service',
				'type' => 'text',
				'instructions' => 'Fyll i ett generellt verkstadsnummer som skall användas i de fall som inte inlägget är butiksspecifikt.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5546d71486cee',
				'label' => 'E-post',
				'name' => 'settings-contact-email',
				'type' => 'email',
				'instructions' => 'Fyll i en generell e-post som skall användas i de fall innehållet inte inlägget är butiksspecifikt.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
            array (
				'key' => 'field_531c162dd1fa3',
				'label' => '404-sida',
				'name' => '',
				'type' => 'tab',
			),
            array (
				'key' => 'field_55e6889f5b4e3',
				'label' => '404-sida',
				'name' => '404-page',
                'type' => 'post_object',
                'column_width' => '',
                'post_type' => array(
                    0 => 'page',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'allow_null' => 1,
                'multiple' => 0,
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
			),
		),
		'menu_order' => 1,
	));
	/*register_field_group(array (
		'id' => 'acf_mobil-och-tablet',
		'title' => 'Mobil och tablet',
		'fields' => array (
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
			),
		),
		'menu_order' => 2,
	));*/
     register_field_group(array (
        'id' => 'acf_myparking',
		'title' => 'Min P-plats',
		'fields' => array (
            array (
				'key' => 'field_551162b6a832a5',
				'label' => 'Mina Favoriter',
				'name' => '',
				'type' => 'tab',
			),
            array(
                'key' => 'field_421fa1726c14431',
                'label' => 'Mina Favoriter Rubrik',
                'name' => 'favorites-headertext',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'Mina favoriter',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(            
                'key' => 'field_421fa1726c14432',
                'label' => 'Mina Favoriter Brödtext',
                'name' => 'favorites-bodytext',
                'type' => 'wysiwyg',
                'instructions' => 'Skriv i innehållet du vill visa i Favoriter-rutan',
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
            array(
                'key' => 'field_421fa1827c14432',
                'label' => 'Mina Favoriter Spara text',
                'name' => 'favorites-save-text',
                'type' => 'text',
                'instructions' => 'Den beskrivande texten som dyker upp när man försöker spara sina favoriter utan att ha sparat dem.',
                'column_width' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_421fa1928c14432',
                'label' => 'Mina Favoriter Dela text',
                'name' => 'favorites-share-text',
                'type' => 'text',
                'instructions' => 'Den beskrivande texten som dyker upp när man försöker dela sina favoriter utan att ha sparat dem.',
                'column_width' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_421fa2029c14432',
                'label' => 'Mina Favoriter Dela med e-post text',
                'name' => 'favorites-share-email-text',
                'type' => 'text',
                'instructions' => 'Den beskrivande texten som dyker upp när man försöker dela sina favoriter med e-post utan att ha sparat dem.',
                'column_width' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
				'key' => 'field_5511a2c6d832a5',
				'label' => 'Företagslogin',
				'name' => '',
				'type' => 'tab',
			),
            array(
                'key' => 'field_421fa1726c14436',
                'label' => 'Företagslogin Rubrik',
                'name' => 'company-headertext',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'Företagslogin',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_421fa1726c14435',
                'label' => 'Företagslogin Brödtext',
                'name' => 'company-bodytext',
                'type' => 'wysiwyg',
                'instructions' => 'Skriv i innehållet du vill visa i Företagslogin-rutan',
                'column_width' => '',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
         ),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-min-p-plats',
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
		'menu_order' => 3,
	));
    
    
    
    
    register_field_group(array (
        'id' => 'acf_sidhuvud',
		'title' => 'Sidhuvud',
		'fields' => array (
			array (
				'key' => 'field_551162b6a8695',
				'label' => 'Märken',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5511629aa8694',
				'label' => 'Märken',
				'name' => 'settings-brands',
				'type' => 'taxonomy',
				'taxonomy' => 'brand',
				'field_type' => 'checkbox',
				'allow_null' => 0,
				'load_save_terms' => 0,
				'return_format' => 'id',
				'multiple' => 0,
			),
                   
			array (
				'key' => 'field_5511619f6bd98',
				'label' => 'CSS',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5511611417835',
				'label' => 'CSS',
				'name' => 'settings-css',
				'type' => 'code_area',
				'instructions' => 'Fyll i CSS som skall köras i <head>-taggen på alla sidor.',
				'language' => 'css',
				'theme' => 'solarized',
			),
			array (
				'key' => 'field_551161be6bd99',
				'label' => 'Javascript',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5511614917836',
				'label' => 'Javascript',
				'name' => 'settings-js',
				'type' => 'code_area',
				'instructions' => 'Fyll i Javascript som skall köras i <head>-taggen på alla sidor.',
				'language' => 'javascript',
				'theme' => 'solarized',
			),
			array (
				'key' => 'field_551161d16bd9a',
				'label' => 'HTML',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5511616317837',
				'label' => 'HTML',
				'name' => 'settings-html',
				'type' => 'code_area',
				'instructions' => 'Fyll i HTML som skall köras i <body>-taggen på alla sidor.',
				'language' => 'htmlmixed',
				'theme' => 'solarized',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-sidhuvud',
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
		'menu_order' => 3,
	));

    register_field_group(array (
        'id' => 'acf_sidfot',
        'title' => 'Sidfot',
        'fields' => array (
            array (
                'key' => 'field_5511642323b6a869534',
                'label' => 'Inställningar',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_5542990a43d93548',
                'label' => 'Visa sökfunktion',
                'name' => 'footer-show-search',
                'type' => 'true_false',
                'default_value' => 1
            ),
            array(
                'key' => 'field_ut44444a23gew47652',
                'label' => 'Visa genvägar',
                'name' => 'footer-show-shortcuts',
                'type' => 'true_false',
                'default_value' => 1
            ),
            array(
                'key' => 'field_55421890a433d93548',
                'label' => 'Visa Öppettider',
                'name' => 'footer-show-openhours',
                'type' => 'true_false',
                'default_value' => 1
            ),
            array(
                'key' => 'field_554299043a43d9783548',
                'label' => 'Visa Sagt om oss',
                'name' => 'footer-show-aboutus',
                'type' => 'true_false',
                'default_value' => 1
            ),
            array(
                'key' => 'field_55432990a43d9367548',
                'label' => 'Visa Kontaktformulär',
                'name' => 'footer-show-help',
                'type' => 'true_false',
                'default_value' => 1
            ),
            array(
                'key' => 'field_5542990a43463d93548',
                'label' => 'Visa fordonsurval',
                'name' => 'footer-show-accesspackage',
                'type' => 'true_false',
                'default_value' => 0
            ),
            array (
                'key' => 'field_5511642b6a869534',
                'label' => 'Sök',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5542990a43d93548',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_5520e83b1fe6f',
                'label' => 'Bredd',
                'name' => 'footer-search-content-width',
                'type' => 'radio',
                'column_width' => '',
                'choices' => array(
                    12 => '100%',
                    9 => '75%',
                    8 => '66%',
                    7 => '58%',
                    6 => '50%',
                    5 => '42%',
                    4 => '33%',
                    3 => '25%',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 9,
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_5546e4d457644d4435',
                'label' => 'Rubrik',
                'name' => 'footer-search-headertext',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'Sök på upplandsmotor.se',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5546e4d117644d4435',
                'label' => 'Brödtext',
                'name' => 'footer-search-bodytext',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'Använd vår smarta sökfunktion för att hitta sidor du letar efter.',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),

            array (
                'key' => 'field_555411619f6bd9348',
                'label' => 'Genvägar',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_ut44444a23gew47652',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),

            array(
                'key' => 'field_5520e83b345145fe6f',
                'label' => 'Bredd',
                'name' => 'footer-shortcuts-content-width',
                'type' => 'radio',
                'column_width' => '',
                'choices' => array(
                    12 => '100%',
                    9 => '75%',
                    8 => '66%',
                    7 => '58%',
                    6 => '50%',
                    5 => '42%',
                    4 => '33%',
                    3 => '25%',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 3,
                'layout' => 'horizontal',
            ),

            array(
                'key' => 'field_5546e4d4573464435',
                'label' => 'Rubrik',
                'name' => 'footer-shortcuts-headertext',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'Genvägar',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),

            array (
                'key' => 'field_534551161be56bd99',
                'label' => 'Öppettider',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_55421890a433d93548',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_5520e83b55145fe6f',
                'label' => 'Bredd',
                'name' => 'footer-openhours-content-width',
                'type' => 'radio',
                'column_width' => '',
                'choices' => array(
                    12 => '100%',
                    9 => '75%',
                    8 => '66%',
                    7 => '58%',
                    6 => '50%',
                    5 => '42%',
                    4 => '33%',
                    3 => '25%',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 6,
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_5546e4d11144d4435',
                'label' => 'Rubrik',
                'name' => 'footer-openhours-headertext',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'Öppettider',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5949876c93547',
                'label' => 'Välj anläggning',
                'name' => 'footer-openhours-facility',
                'type' => 'relationship',
                'column_width' => '',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'facility',
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

            array (
                'key' => 'field_55115261d16bd6759a',
                'label' => 'Sagt om oss',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_554299043a43d9783548',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_510e83b5533145fe6f',
                'label' => 'Bredd',
                'name' => 'footer-aboutus-content-width',
                'type' => 'radio',
                'column_width' => '',
                'choices' => array(
                    12 => '100%',
                    9 => '75%',
                    8 => '66%',
                    7 => '58%',
                    6 => '50%',
                    5 => '42%',
                    4 => '33%',
                    3 => '25%',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 3,
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_522546e4d4576435',
                'label' => 'Rubrik',
                'name' => 'footer-aboutus-headertext',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'Sagt om oss',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5546e334d4571a435',
                'label' => 'Brödtext',
                'name' => 'footer-aboutus-bodytext',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'Vi älskar att höra vad vi gör bra och vad vi kan förbättra.',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_49324d36d419548',
                'label' => 'Välj sagt om oss',
                'name' => 'footer-testimonial',
                'type' => 'relationship',
                'instructions' => '',
                'instructions' => '',
                'column_width' => '',
                'return_format' => 'object',
                'post_type' => array(
                    0 => 'testimonial',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'max' => '',
            ),
            array (
                'key' => 'field_55115222d16b7109a',
                'label' => 'Kontaktformulär',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_55432990a43d9367548',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_551a0e83b4455145fe6f',
                'label' => 'Bredd',
                'name' => 'footer-help-content-width',
                'type' => 'radio',
                'column_width' => '',
                'choices' => array(
                    12 => '100%',
                    9 => '75%',
                    8 => '66%',
                    7 => '58%',
                    6 => '50%',
                    5 => '42%',
                    4 => '33%',
                    3 => '25%',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 3,
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_55d44343232f2',
                'label' => 'Formulär',
                'name' => 'footer-form',
                'type' => 'acf_cf7',
                'allow_null' => 0,
                'multiple' => 0,
                'disable' => array (
                    0 => 0,
                ),
            ),
            array(
                'key' => 'field_522546e4d11276435',
                'label' => 'Rubrik',
                'name' => 'footer-help-headertext',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'Behöver du hjälp',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_522546e4d1127641aa',
                'label' => 'Brödtext',
                'name' => 'footer-help-bodytext',
                'type' => 'text',
                'column_width' => '',
                'default_value' => 'Skicka ett meddelande till oss så hjälper vi dig.',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_55115222d18rkjf837',
                'label' => 'Dela-formulär',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_55d44316389b0',
                'label' => 'Formulär',
                'name' => 'share-form',
                'type' => 'acf_cf7',
                'allow_null' => 0,
                'multiple' => 0,
                'disable' => array (
                    0 => 0,
                ),
            ),
            array (
                'key' => 'field_55198982d16b7109a',
                'label' => 'Fordonsurval',
                'name' => '',
                'type' => 'tab',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_5542990a43463d93548',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
            array(
                'key' => 'field_1110e83b4455145fe6f',
                'label' => 'Bredd',
                'name' => 'footer-accesspackage-content-width',
                'type' => 'radio',
                'column_width' => '',
                'choices' => array(
                    12 => '100%',
                    9 => '75%',
                    8 => '66%',
                    7 => '58%',
                    6 => '50%',
                    5 => '42%',
                    4 => '33%',
                    3 => '25%',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 3,
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_fe4380utr34534083',
                'label' => 'Ladda in fler fordon?',
                'name' => 'accesspackage-load-type',
                'type' => 'select',
                'choices' => array(
                    'None' => 'Ladda inte in fler fordon',
                    'Infinite' => 'Ladda fler fordon vid scrollning',
                    'Button' => 'Ladda in fler fordon genom en knapp'
                )
            ),
            array(
                'key' => 'field_4324093s3346724jre495',
                'label' => 'Landningssida (objekt)',
                'name' => 'accesspackage-object-page',
                'type' => 'post_object',
                'column_width' => '',
                'post_type' => array(
                    0 => 'page',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'allow_null' => 1,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_547453239efee996fd',
                'name' => 'accesspackage-search',
                'type' => 'message',
                'message' => '<div data-app="elasticaccesspackage"><div ng-controller="SetupCtrl"><div ng-include src="\'templates/WP-Admin.html\'"></div></div></div>',
            ),
            array(
                'key' => 'field_elasticaccess-hash',
                'label' => '',
                'name' => 'accesspackage-hash',
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
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-sidfot',
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
        'menu_order' => 4,
    ));
                            
}
                    
    if(function_exists("register_field_group"))
    {
        register_field_group(array (
        'id' => 'acf_e-postadresser',
        'title' => 'E-postadresser för formulär',
        'fields' => array (
            array (
                'key' => 'field_559d21d5df263',
                'label' => 'E-postadresser',
                'name' => 'settings-emails',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_559cfef27826d',
                        'label' => 'E-post',
                        'name' => 'email',
                        'type' => 'email',
                        'column_width' => 25,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                    ),
                    array (
                        'key' => 'field_559cff117826e',
                        'label' => 'Anläggning',
                        'name' => 'facility',
                        'type' => 'post_object',
                        'column_width' => 20,
                        'post_type' => array (
                            0 => 'facility',
                        ),
                        'taxonomy' => array (
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 1,
                    ),
                    array (
                        'key' => 'field_55e5739162da5',
                        'label' => 'Avdelning',
                        'name' => 'settings-emails-department',
                        'type' => 'taxonomy',
                        'column_width' => 15,
                        'taxonomy' => 'departments',
                        'field_type' => 'select',
                        'allow_null' => 0,
                        'load_save_terms' => 0,
                        'return_format' => 'object',
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_559cff4c78270',
                        'label' => 'Märke',
                        'name' => 'brand',
                        'type' => 'taxonomy',
                        'column_width' => 20,
                        'taxonomy' => 'brand',
                        'field_type' => 'multi_select',
                        'allow_null' => 0,
                        'load_save_terms' => 0,
                        'return_format' => 'object',
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_559cff4c78270_ansvarig',
                        'label' => 'Ansvarig',
                        'name' => 'settings-emails-name',
                        'type' => 'text',
                        'column_width' => 20,
                        'instructions' => 'Fyll i namnet på den ansvarige/kontaktpersonen.',
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
                'button_label' => 'Lägg till',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-epost',
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

if (function_exists('add_image_size')) {
    add_image_size('touchicon-57x57', 57, 57, true);
    add_image_size('touchicon-60x60', 60, 60, true);
    add_image_size('touchicon-72x72', 72, 72, true);
    add_image_size('touchicon-76x76', 76, 76, true);
    add_image_size('touchicon-114x114', 114, 114, true);
    add_image_size('touchicon-120x120', 120, 120, true);
    add_image_size('touchicon-144x144', 144, 144, true);
    add_image_size('touchicon-152x152', 152, 152, true);
    add_image_size('touchicon-180x180', 180, 180, true);
}

function get_touch_icons(){
    $touchicon = get_field('settings-touchicon', 'options');
    ?>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $touchicon['sizes']['touchicon-57x57']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $touchicon['sizes']['touchicon-114x114']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $touchicon['sizes']['touchicon-72x72']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $touchicon['sizes']['touchicon-114x114']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo $touchicon['sizes']['touchicon-60x60']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo $touchicon['sizes']['touchicon-120x120']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo $touchicon['sizes']['touchicon-76x76']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $touchicon['sizes']['touchicon-152x152']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?php echo $touchicon['sizes']['touchicon-180x180']; ?>">
    <?php
}

function get_logotype($filetype){
    $logotype = "";
    if ($filetype=='png') {
        $logotype = get_field('settings-logotype-png', 'options');
    }
    elseif ($filetype=='svg') {
        $logotype = get_field('settings-logotype-svg', 'options');
    }

    $url = isset($logotype['url']) && $logotype['url'] != "" ? $logotype['url'] : ""; 
    return  $url;
}

function get_favicon(){
    $favicon = get_field('settings-favicon', 'options');
    return $favicon['url'];
}

function get_settings_code($type){
    if($type=='css' && get_field('settings-css', 'options')){
        return get_field('settings-css', 'options');
    }
    elseif($type=='js' && get_field('settings-js', 'options')){
        return get_field('settings-js', 'options');
    }
    elseif($type=='html' && get_field('settings-html', 'options')){
        return get_field('settings-html', 'options');
    }
}


/* HEX Till RGBA Function */
function hex2rgba($color, $opacity = false)
{

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if (empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb = array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    }
    elseif ($opacity == '0') {
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    }else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}

?>
