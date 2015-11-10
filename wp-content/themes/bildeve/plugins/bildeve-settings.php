<?php

register_field_group(array (
		'id' => 'acf_installningar',
		'title' => 'Inställningar',
		'fields' => array (
			array (
				'key' => 'field_55fac48b39636',
				'label' => 'Generella inställningar',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_55fabf269b1f4',
				'label' => 'Logotyp',
				'name' => 'settings-logotype',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		  array (
				'key' => 'field_560227c550504',
				'label' => 'Sidhuvud',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_55fac4a939637',
				'label' => 'Märken',
				'name' => 'settings-brands',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_55faccc339638',
						'label' => 'Logotyp',
						'name' => 'brands-logotyp',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_55faccee39639',
						'label' => 'Länk',
						'name' => 'brands-link',
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
						'key' => 'field_55faccfb3963a',
						'label' => 'Länkbeteende',
						'name' => 'brands-target',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'_self' => 'Öppna i samma fönster',
							'_blank' => 'Öppna i ett nytt fönster',
						),
						'default_value' => '_self',
						'allow_null' => 0,
						'multiple' => 0,
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Lägg till märke',
			),
			array (
				'key' => 'field_560282b95f96e',
				'label' => 'Sidfot',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_560282c95f96f',
				'label' => 'Anläggningar',
				'name' => 'settings-facilities',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'facility',
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
				'key' => 'field_5602337b3c39b',
				'label' => 'Avancerade inställningar',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_560233943c39c',
				'label' => 'BytBil Alias',
				'name' => 'settings-bbalias',
				'type' => 'text',
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
		'menu_order' => 0,
	));

?>