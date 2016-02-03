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
    acf_add_options_sub_page('Konton');
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
				'name' => 'settings-contact-phonenumber	-service',
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
                            register_field_group(array (
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
		'menu_order' => 3,
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
    if ($filetype=='png') {
        $logotype = get_field('settings-logotype-png', 'options');
    }
    elseif ($filetype=='svg') {
        $logotype = get_field('settings-logotype-svg', 'options');
    }
    return $logotype['url'];
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
