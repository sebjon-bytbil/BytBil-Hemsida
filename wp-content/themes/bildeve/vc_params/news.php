<?php
function bildeve_news_params($params)
{
    //bb_remove_item_from_params('news_choice', $params);

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
/* process params */
//add_filter('bb_alter_news_params', 'bildeve_news_params');


function test_process($atts)
{
    return $atts;
}
/* processData */
//add_filter('vc-process-data-menu', 'test_process');

?>

