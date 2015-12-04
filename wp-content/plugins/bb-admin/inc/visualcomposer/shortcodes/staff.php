<?php
require_once('shortcode.base.php');

/**
 * Personal
 */
class StaffShortcode extends ShortcodeBase
{
    function __construct($vcMap)
    {
        parent::__construct($vcMap);
    }

    function processData($atts)
    {
        $ids = self::Exists($atts['employees'], '');
        $row_amount = self::Exists($atts['row_amount'], '3');

        if ($ids !== '') {
            $employees = array();
            $expl = explode(',', $ids);

            foreach ($expl as $i => $id) {
                $employees[$i]['name'] = get_the_title($id);
                $image = get_field('employee-image', $id);
                $employees[$i]['image'] = $image['url'];
                $employees[$i]['work_title'] = get_field('employee-work-title', $id);
                $employees[$i]['email'] = get_field('employee-email', $id);
                $employees[$i]['phone'] = get_field('employee-phone', $id);
            }

            $atts['employees'] = $employees;
        }

        $atts['row_amount'] = $row_amount;

        return $atts;
    }
}

function bb_init_staff_shortcode()
{
    // Map array
    $map = array(
        'name' => 'Personal',
        'base' => 'staff',
        'description' => 'Visa personal',
        'class' => '',
        'show_settings_on_create' => true,
        'weight' => 10,
        'category' => 'Innehåll',
        'params' => array(
            array(
                'type' => 'cptlist',
                'post_type' => 'employee',
                'heading' => 'Välj personal',
                'param_name' => 'employees',
                'value' => '',
                'description' => 'Välj ur en lista av personal',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Antal per rad',
                'param_name' => 'row_amount',
                'value' => array(
                    '1' => '12',
                    '2' => '6',
                    '3' => '4',
                    '4' => '3'
                ),
                'description' => 'Välj antalet som ska synas per rad'
            )
        )
    );

    // Alter params filter
    $map['params'] = apply_filters('bb_alter_staff_params', $map['params']);

    $vcStaff = new StaffShortcode($map);
}
add_action('after_setup_theme', 'bb_init_staff_shortcode');

?>