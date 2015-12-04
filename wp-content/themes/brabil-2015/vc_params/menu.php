<?php
function brabil_menu_params($params)
{
    bb_remove_item_from_params('submenu', $params);

    $param = array(
        'type' => 'textfield',
        'heading' => 'Från Bra Bil temat',
        'param_name' => 'brabil_headline',
        'value' => '',
        'description' => 'Testar lite'
    );

    array_push($params, $param);

    return $params;
}
add_filter('bb_alter_menu_params', 'brabil_menu_params');
?>
