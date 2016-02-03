<?php
$employee_choice = get_sub_field('employees');
$employee_cols = get_sub_field('employee-cols');

if (!$employee_cols) {
    $employee_cols = null;
}

if ($employee_choice == 'single') {
    $employee = get_sub_field('employee');
    bytbil_show_employee($employee);
} elseif ($employee_choice == 'multiple') {
    $hide_header = get_sub_field('employee-hide-header');
    $employee_lists = get_sub_field('employee-lists');
    foreach ($employee_lists as $employee_list) {
        bytbil_show_employee_list($employee_list, $hide_header, $employee_cols);
    }
}

?>

