<?php

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_ga-installningar',
        'title' => 'Visningsalternativ',
        'fields' => array(
            array(
                'key' => 'field_1421763083102',
                'label' => 'Avpublicera',
                'name' => 'hide',
                'type' => 'true_false',
                'instructions' => 'Avpublicerar från siten',
                'message' => '',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_1421763154233',
                'label' => 'ÅF får dölja',
                'name' => 'af_can_hide',
                'type' => 'true_false',
                'instructions' => 'Tillåter ÅF att dölja',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_1421763083102',
                            'operator' => '!=',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'message' => '',
                'default_value' => 1,
            ),
            array(
                'key' => 'field_1421763272606',
                'label' => 'ÅF får redigera',
                'name' => 'af_can_edit',
                'type' => 'true_false',
                'instructions' => 'Tillåter ÅF att redigera',
                'message' => '',
                'default_value' => 0,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_1421763083102',
                            'operator' => '!=',
                            'value' => 1,
                        ),
                    ),
                    'allorany' => 'all',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "shortlink",
                    "order_no" => 0,
                    "group_no" => 0,
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'mb_slideshow',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'offer',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}
