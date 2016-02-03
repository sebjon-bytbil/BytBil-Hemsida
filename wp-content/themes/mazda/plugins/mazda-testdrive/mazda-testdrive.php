<?php
/*
Plugin Name: Mazda Provkör
Plugin URI: http://www.bytbil.com/
Description: Lägger till stöd för Mazdas provkör-formulär via Contact Form 7.
Version: 1.0.0
Author: Eric Ejneroos
Author URI: http://www.bytbil.com/
*/

add_action('init', 'cptui_register_my_cpt_models');
function cptui_register_my_cpt_models()
{
    register_post_type('models', array(
            'label' => 'Modeller',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'models', 'with_front' => true),
            'query_var' => true,
            'supports' => array('title', 'revisions'),
            'labels' => array(
                'name' => 'Modeller',
                'singular_name' => 'Modell',
                'menu_name' => 'Modeller',
                'add_new' => 'Lägg till Modell',
                'add_new_item' => 'Lägg till Modell',
                'edit' => 'Redigera',
                'edit_item' => 'Redigera Modell',
                'new_item' => 'Ny Modell',
                'view' => 'Visa Modeller',
                'view_item' => 'Visa Modell',
                'search_items' => 'Sök Modeller',
                'not_found' => 'Inga Modeller hittade',
                'not_found_in_trash' => 'Inga Modeller i papperskorgen',
                'parent' => 'Modellernas förälder',
            )
        )
    );
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_modellinstallningar',
        'title' => 'Modellinställningar',
        'fields' => array (
            array (
                'key' => 'field_55476082d7dbb',
                'label' => 'Värde',
                'name' => 'model-value',
                'type' => 'text',
                'instructions' => 'Värdet som används i Provkör-formuläret.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_55476032d2dpo',
                'label' => 'Thumbnail',
                'name' => 'model-thumbnail',
                'type' => 'text',
                'instructions' => '',
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
                    'value' => 'models',
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

//if (function_exists('acf_set_options_page_title')) {
//    acf_set_options_page_title('Bilar');
//}

/**
 * WPCF7 Hook
 */
add_action('wpcf7_before_send_mail', 'mazda_testdrive_form');
function mazda_testdrive_form($cf7)
{
    // Skip mail
    $wpcf7 = WPCF7_ContactForm::get_current();
    $wpcf7->skip_mail = true;

    $submission = WPCF7_Submission::get_instance();
    // Create XML
    $xml = mazda_create_xml($submission);

    // Post XML to Mazda
    // Test URL: http://ds.mazdamotors.eu:9000
    // Live URL: https://submissionservice.mazdamotors.eu
    mazda_post_xml($xml, 'http://ds.mazdamotors.eu:9000');
}

function mazda_create_xml($instance)
{
    $models = $instance->get_posted_data('models');
    $fname = $instance->get_posted_data('first-name');
    $lname = $instance->get_posted_data('last-name');
    $pnumber = $instance->get_posted_data('phone-number');
    $mnumber = $instance->get_posted_data('mobile-number');
    $email_address = $instance->get_posted_data('email-address');
    $newsletter = $instance->get_posted_data('newsletter');
    $phone_info = $instance->get_posted_data('phone-info');

    if ($newsletter[0] == 1)
        $newsletter = true;
    else
        $newsletter = false;

    if ($phone_info[0] == 1)
        $phone_info = true;
    else
        $phone_info = false;

    $dom = new DOMDocument('1.0', 'UTF-8');

    $xml_root = $dom->createElement('SubmissionRequest');
    $xml_root->setAttribute('xmlns:i', 'http://www.w3.org/2001/XMLSchema-instance');
    $xml_root = $dom->appendChild($xml_root);

    $xml_root->appendChild($dom->createElement('ApiKey', '04d3e9c3-4444-4281-888e-a19d9fc35ca3'));
    $xml_root->appendChild($dom->createElement('CultureCode', 'sv-SE'));
    $xml_root->appendChild($dom->createElement('SubmissionType', 'TestDrive'));
    $xml_root->appendChild($dom->createElement('CampaignCode', 'DEFAULT'));

    $user = $xml_root->appendChild($dom->createElement('User'));
    $user->appendChild($dom->createElement('Title', ''));
    $user->appendChild($dom->createElement('FirstName', $fname));
    $user->appendChild($dom->createElement('LastName', $lname));

    $contact = $user->appendChild($dom->createElement('Contact'));
    $emails = $contact->appendChild($dom->createElement('Emails'));
    $email = $emails->appendChild($dom->createElement('Email'));
    $email->appendChild($dom->createElement('EmailAddress', $email_address));
    $email->appendChild($dom->createElement('EmailType', 'Personal'));
    $email->appendChild($dom->createElement('IsDefaultEmail', 'true'));

    $phones = $contact->appendChild($dom->createElement('Phones'));
    $phone_number = $phones->appendChild($dom->createElement('PhoneNumber'));
    $phone_number->appendChild($dom->createElement('IsDefaultNumber', 'true'));
    $phone_number->appendChild($dom->createElement('Number', $pnumber));
    $phone_number->appendChild($dom->createElement('PhoneType', 'Home'));

    if (isset($mnumber)) {
        $mobile_number = $phones->appendChild($dom->createElement('PhoneNumber'));
        $mobile_number->appendChild($dom->createElement('IsDefaultNumber', 'true'));
        $mobile_number->appendChild($dom->createElement('Number', $mnumber));
        $mobile_number->appendChild($dom->createElement('PhoneType', 'Mobile'));
    }

    $permissions = $contact->appendChild($dom->createElement('Permissions'));
    $contact_permissions = $permissions->appendChild($dom->createElement('ContactPermissions'));
    $contact_permissions->appendChild($dom->createElement('CommunicationType', 'EmailOptIn'));
    $contact_permissions->appendChild($dom->createElement('ContactPermissionsId', '0'));
    $contact_permissions->appendChild($dom->createElement('IsSelected', 'true'));

    $contact_permissions_1 = $permissions->appendChild($dom->createElement('ContactPermissions'));
    $contact_permissions_1->appendChild($dom->createElement('CommunicationType', 'MailOptIn'));
    $contact_permissions_1->appendChild($dom->createElement('ContactPermissionsId', '0'));
    $contact_permissions_1->appendChild($dom->createElement('IsSelected', ($newsletter ? 'true' : 'false')));

    $contact_permissions_2 = $permissions->appendChild($dom->createElement('ContactPermissions'));
    $contact_permissions_2->appendChild($dom->createElement('CommunicationType', 'PhoneOptIn'));
    $contact_permissions_2->appendChild($dom->createElement('ContactPermissionsId', '0'));
    $contact_permissions_2->appendChild($dom->createElement('IsSelected', ($phone_info ? 'false' : 'true')));

    $address = $user->appendChild($dom->createElement('Address'));
    $address_lines = $address->appendChild($dom->createElement('AddressLines'));
    $address_lines->setAttribute('xmlns:d4p1', 'http://schemas.microsoft.com/2003/10/Serialization/Arrays');
    $address_lines->appendChild($dom->createElement('d4p1:string', get_field('retailer-careof', 'options')));
    $address_lines->appendChild($dom->createElement('d4p1:string', get_field('retailer-address', 'options')));
    $address_lines->appendChild($dom->createElement('d4p1:string', get_field('retailer-postal-city', 'options')));

    $address->appendChild($dom->createElement('AddressType', 'Home'));
    $address->appendChild($dom->createElement('City', get_field('retailer-postal-city', 'options')));
    $address->appendChild($dom->createElement('Country', 'Sverige'));
    $address->appendChild($dom->createElement('County', ''));
    $address->appendChild($dom->createElement('IsDefaultAddress', 'true'));
    $address->appendChild($dom->createElement('PostCode', get_field('retailer-postal-number', 'options')));

    $profiling = $user->appendChild($dom->createElement('Profiling'));
    $models_of_interest = $profiling->appendChild($dom->createElement('ModelsOfInterest'));
    $models_of_interest->setAttribute('xmlns:d4p1', 'http://schemas.microsoft.com/2003/10/Serialization/Arrays');
        //$models_of_interest->appendChild($dom->createElement('d4p1:string', 'Mazda2'));
    foreach ($models as $model) {
        $models_of_interest->appendChild($dom->createElement('d4p1:string', $model));
    }

    $profiling->appendChild($dom->createElement('NextCarPurchaseTimeFrame', 'up to 3 Months'));

    $xml = $dom->saveXML();
    return $xml;
}

function mazda_post_xml($xml, $url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    $result = curl_exec($ch);
    curl_close($ch);
}

if (function_exists('wpcf7_add_shortcode')) {
    wpcf7_add_shortcode('models', 'mazda_models_dropdown', true);
}

function mazda_models_dropdown()
{
    $args = array(
        'post_type' => 'models',
        'post_status' => 'published',
        'posts_per_page' => -1,
        'caller_get_posts' => 1
    );

    $output = '';

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        $output = '<ul class="testdrive-models">';
        while ($query->have_posts()) : $query->the_post();
            $title = get_the_title();
            if ($title == 'Auto Draft') {
                continue;
            }
            $output .= '<li><label>';
            $output .= '<img src="' . get_field('model-thumbnail') . '">';
            $output .= '<div>';
            $output .= '<input name="models[]" type="checkbox" value="' . get_field('model-value') . '" class="wpcf7-validates-as-required" aria-required="true">';
            $output .= '<h3>' . $title . '</h3>';
            $output .= '</div></label></li>';
        endwhile;
    }

    return $output;
}

?>

