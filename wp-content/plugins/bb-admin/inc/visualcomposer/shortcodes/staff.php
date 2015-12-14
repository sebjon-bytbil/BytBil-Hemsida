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

    private function append_employee(&$employees, $i, $id)
    {
        $employees[$i]['name'] = get_the_title($id);
        $image = get_field('employee-image', $id);
        $employees[$i]['image'] = $image['url'];
        $employees[$i]['work_title'] = get_field('employee-jobtitle', $id);
        $employees[$i]['email'] = get_field('employee-email', $id);
        $phonenumbers = get_field('employee-phonenumbers', $id);
        if (!empty($phonenumbers)) {
            $employees[$i]['phone'] = $phonenumbers[0]['employee-phonenumber-number'];
        }
    }

    function processData($atts)
    {
        $employees = array();
        $type = self::Exists($atts['employee_type'], false);
        $row_amount = self::Exists($atts['row_amount'], '3');

        if ($type) {
            if ($type === 'employee') {
                $ids = self::Exists($atts['employees'], false);

                if ($ids) {
                    $expl = explode(',', $ids);

                    foreach ($expl as $i => $id) {
                        self::append_employee($employees, $i, $id);
                    }
                }

            } elseif ($type === 'employee_list') {
                $id = self::Exists($atts['employee_list'], false);

                if ($id) {
                    $ids = get_field('employee_list', $id);

                    if ($ids) {
                        foreach ($ids as $i => $id) {
                            self::append_employee($employees, $i, $id);
                        }
                    }
                }
            }
        }

        $atts['employees'] = $employees;
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
                'type' => 'dropdown',
                'heading' => 'Välj visningssätt',
                'param_name' => 'employee_type',
                'value' => array(
                    'Välj personal' => 'employee',
                    'Personallista' => 'employee_list'
                ),
                'description' => 'Välj om du vill visa personal från en lista eller välja själv.'
            ),
            array(
                'type' => 'cptlist',
                'post_type' => 'employee',
                'heading' => 'Välj personal',
                'param_name' => 'employees',
                'value' => '',
                'description' => 'Välj ur en lista av personal',
                'dependency' => array(
                    'element' => 'employee_type',
                    'value' => 'employee'
                )
            ),
            array(
                'type' => 'cpt',
                'post_type' => 'employee_list',
                'heading' => 'Personallista',
                'param_name' => 'employee_list',
                'placeholder' => 'Välj personallista',
                'value' => '',
                'description' => 'Välj en existerande personallista.',
                'dependency' => array(
                    'element' => 'employee_type',
                    'value' => 'employee_list'
                )
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