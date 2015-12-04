<?php
$employees_choice = get_sub_field('content-employees');
$employees_cols = get_sub_field('content-employee-cols');

if (!$employees_cols) {
    $employees_cols = 3;
}

if ($employees_choice == 'employees') {
    $employees = get_sub_field('content-employee-employee');

    foreach ($employees as $employee) {
        bytbil_show_employee($employee->ID, $employees_cols);
    }
} elseif ($employees_choice == 'emlpoyee-list') {
    $hide_header = get_sub_field('content-employee-hide-header');
    $employee_lists = get_sub_field('content-employee-lists');
    foreach ($employee_lists as $employee_list) {
        bytbil_show_employee_list($employee_list, $hide_header, $employees_cols);
    }
}
?>