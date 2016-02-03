<?php
/* Removes ACF menu and includes fields from php */
//define('ACF_LITE', true);

// Add the settings menu


/*if(function_exists('acf_set_options_page_title')){
    acf_set_options_page_title('Siteinställningar');
    acf_add_options_sub_page('Globala Inställningar');
    if(current_user_can('manage_options')){
        acf_add_options_sub_page('Avancerat');
    }
}

/*if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_installningar',
        'title' => 'Inställningar',
        'fields' => array (
            array (
                'key' => 'field_52eb630cda19a',
                'label' => 'Öppettider',
                'name' => 'opentimes',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_52eb6337da19b',
                        'label' => 'Fritext',
                        'name' => 'fritext',
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
                        'key' => 'field_52eb6372da19e',
                        'label' => 'Tider',
                        'name' => 'times',
                        'type' => 'repeater',
                        'column_width' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_52eb6380da19f',
                                'label' => 'Dag(ar)',
                                'name' => 'day',
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
                                'key' => 'field_52eb6395da1a0',
                                'label' => 'Tider',
                                'name' => 'time',
                                'type' => 'text',
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
                        'button_label' => 'Lägg till',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Lägg till',
            ),
            array (
                'key' => 'field_52eb63d0da1a3',
                'label' => 'Företagsnamn',
                'name' => 'company_name',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb63e7da1a4',
                'label' => 'Address',
                'name' => 'company_adress',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb63f7da1a5',
                'label' => 'Postaddress',
                'name' => 'company_zip',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb6412da1a6',
                'label' => 'Telefonnummer',
                'name' => 'telnr',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb743da311b',
                'label' => 'Fax',
                'name' => 'fax',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb641fda1a7',
                'label' => 'E-post',
                'name' => 'email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array (
                'key' => 'field_52eb861e3c2b4',
                'label' => 'Sidfot',
                'name' => 'sidfot',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb63b9da1a2',
                'label' => 'Logga',
                'name' => 'logga',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_52eba6793a543',
                'label' => 'Märkeslogotyper',
                'name' => 'topplugs',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_52eba6dc3a544',
                        'label' => 'Ikon',
                        'name' => 'icon',
                        'type' => 'image',
                        'column_width' => '10',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_52eba6f83a545',
                        'label' => 'Länktyp',
                        'name' => 'linktype',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array (
                            'internal' => 'Intern',
                            '' => 'Extern',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'column_width' => '45',
                    ),
                    array (
                        'key' => 'field_52eba7453a546',
                        'label' => 'Länk',
                        'name' => 'linkexternal',
                        'type' => 'text',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_52eba6f83a545',
                                    'operator' => '==',
                                    'value' => '',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'default_value' => '45',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_52eba7603a547',
                        'label' => 'Länk',
                        'name' => 'linkinternal',
                        'type' => 'page_link',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_52eba6f83a545',
                                    'operator' => '==',
                                    'value' => 'internal',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'post_type' => array (
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'column_width' => '45',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array (
                'key' => 'field_52eb63acda1a1',
                'label' => 'Bakgrund',
                'name' => 'bg',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_52eb6299da195',
                'label' => 'Mittpluggikoner',
                'name' => 'middle_plug_icons',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_52f36537cbb63',
                        'label' => 'Länktyp',
                        'name' => 'linktype',
                        'type' => 'select',
                        'choices' => array (
                            'int' => 'Intern länk',
                            'ext' => 'Extern länk',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_52f36567cbb64',
                        'label' => 'Extern Länk',
                        'name' => 'extlink',
                        'type' => 'text',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_52f36537cbb63',
                                    'operator' => '==',
                                    'value' => 'ext',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_52f3657ccbb65',
                        'label' => 'Intern länk',
                        'name' => 'intlink',
                        'type' => 'page_link',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_52f36537cbb63',
                                    'operator' => '==',
                                    'value' => 'int',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'post_type' => array (
                            0 => 'all',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_52eb62cdda197',
                        'label' => 'Ikonbild',
                        'name' => 'icon_image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_52eb62e0da198',
                        'label' => 'Ikontext',
                        'name' => 'title_text',
                        'type' => 'text',
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
                'layout' => 'row',
                'button_label' => 'Add Row',
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
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}*/

/*if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_avancerat',
        'title' => 'Avancerat',
        'fields' => array (
            array (
                'key' => 'field_52eb627ada193',
                'label' => 'FilterID',
                'name' => 'filterid',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb6286da194',
                'label' => 'Söksida',
                'name' => 'soksida',
                'type' => 'page_link',
                'post_type' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_52eb65fbccb9c',
                'label' => 'Redigera CSS',
                'name' => 'override_css',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'formatting' => 'none',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-avancerat',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
                0 => 'the_content',
            ),
        ),
        'menu_order' => 0,
    ));
}*/

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_kontakt',
        'title' => 'kontakt',
        'fields' => array(
            array(
                'key' => 'field_52eb76f262801',
                'label' => 'Personal',
                'name' => 'personal',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_52eb770262802',
                'label' => 'Kontaktformulär',
                'name' => 'contactform',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-contact.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
                0 => 'the_content',
            ),
        ),
        'menu_order' => 0,
    ));
}


/*if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_service',
        'title' => 'Service',
        'fields' => array (
            array (
                'key' => 'field_52eb7a22ae854',
                'label' => 'Rubrik',
                'name' => 'service_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb7a3dae855',
                'label' => 'Underrubrik',
                'name' => 'service_subtitle',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb7a4dae856',
                'label' => 'Brödtext',
                'name' => 'service_text',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-service.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
                0 => 'the_content',
            ),
        ),
        'menu_order' => 0,
    ));
}
*/
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_hem',
        'title' => 'Hem',
        'fields' => array(
            /*array (
                'key' => 'field_52eb7b4043213',
                'label' => 'Sliderfält',
                'name' => 'sliderfalt',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),*/
            array(
                'key' => 'field_548e9362fc535',
                'label' => 'Bildspel',
                'name' => 'slider-front',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'bildspel',
                ),
                'taxonomy' => array(
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_52eb7b5443214',
                'label' => 'Rubrik',
                'name' => 'start_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_52eb7b7543215',
                'label' => 'Brödtext',
                'name' => 'start_text',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'index.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
                0 => 'the_content',
                1 => 'custom_fields',
            ),
        ),
        'menu_order' => 0,
    ));
}

/*if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_asdasd',
        'title' => 'asdasd',
        'fields' => array (
            array (
                'key' => 'field_52eb8826eb3bf',
                'label' => 'Rubrik',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb8835eb3c0',
                'label' => 'Underrubrik',
                'name' => 'subtitle',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52eb8844eb3c1',
                'label' => 'Brödtext',
                'name' => 'text',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-finance.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
                0 => 'the_content',
            ),
        ),
        'menu_order' => 0,
    ));
}
*/


?>
