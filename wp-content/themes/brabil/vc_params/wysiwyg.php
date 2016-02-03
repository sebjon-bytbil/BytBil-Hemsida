<?php
function brabil_wysiwyg_styles()
{
    $urls = array(
        '/wp-content/themes/brabil/assets/styles/theme/brabil.css',
        '/wp-content/themes/brabil/assets/styles/theme/buttons.css',
        '/wp-content/themes/brabil/assets/styles/vendor/ionicons.css'
    );

    return $urls;
}
add_filter('bb_alter_wysiwyg_styles', 'brabil_wysiwyg_styles');

function brabil_wysiwyg_buttons()
{
    $buttons = array(
        array(
            'text' => 'Blå',
            'value' => 'blue'
        ),
        array(
            'text' => 'Vit',
            'value' => 'white'
        )
    );

    return $buttons;
}
add_filter('bb_alter_wysiwyg_buttons', 'brabil_wysiwyg_buttons');

function brabil_wysiwyg_icons()
{
    $icons = array(
        array(
            'text' => 'Ingen',
            'value' => 'none'
        ),
        array(
            'text' => 'Pint',
            'value' => 'ion ios-pint-outline',
            'icon' => 'ion ion-ios-pint-outline'
        ),
        array(
            'text' => 'Test',
            'value' => 'ion ion-android-alarm-clock',
            'icon' => 'ion ion-android-alarm-clock'
        )
    );

    return $icons;
}
add_filter('bb_alter_wysiwyg_icons', 'brabil_wysiwyg_icons');
