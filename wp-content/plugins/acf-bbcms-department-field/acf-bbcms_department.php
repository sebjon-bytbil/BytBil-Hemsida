<?php

/*
Plugin Name: Advanced Custom Fields: BytBil Departments
Description: Lägger till möjligheten att välja en specifik avdelning av en anläggning
Version: 1.0.0
Author: John Eriksson : Provide IT
Author URI: http://www.provideit.se
*/


// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
load_plugin_textdomain('acf-bbcms_department', false, dirname(plugin_basename(__FILE__)) . '/lang/');


// 2. Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
function include_field_types_bbcms_department($version)
{

    include_once('acf-bbcms_department-v5.php');

}

add_action('acf/include_field_types', 'include_field_types_bbcms_department');


// 3. Include field type for ACF4
function register_fields_bbcms_department()
{

    include_once('acf-bbcms_department-v4.php');

}

add_action('acf/register_fields', 'register_fields_bbcms_department');

?>