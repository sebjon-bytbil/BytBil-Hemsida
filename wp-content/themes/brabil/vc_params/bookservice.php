<?php

if (class_exists('ShortcodeBase')) {
    /**
     * Boka verkstad
     */
    class BookService extends ShortcodeBase
    {
        function __construct($vcMap)
        {
            parent::__construct($vcMap);
        }

        function RegisterScripts()
        {
            //wp_register_script('angular', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js', array(), '1.3.15');
            //wp_register_script('angular-animate', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-animate.min.js', array(), '1.3.15');
        }

        function EnqueueScripts()
        {
            //wp_enqueue_script('angular');
            //wp_enqueue_script('angular-animate');
        }

        function processData($atts)
        {
            $options = array(
                'http' => array(
                    'header' => "Content-Type: application/json\r\n",
                    'method' => 'POST',
                    'content' => '{ apiUrl: "http://servicebooking-modules-test-volvobil.azurewebsites.net/api/servicebooking", apiRootUrl: "http://dataapi-modules-test-volvobil.azurewebsites.net/api/", includeScript: "True", includeVendorScripts: "True", includeBootstrap: "True", appTagId: "brabil-dealerweb-contacts" }'
                )
            );

            $context = stream_context_create($options);

            $scriptUrl = 'https://servicebooking-modules-test-volvobil.azurewebsites.net/api/servicebooking/script';
            $viewUrl = 'https://servicebooking-modules-test-volvobil.azurewebsites.net/api/servicebooking/view';

            $script = file_get_contents($scriptUrl, false, $context);
            $view = file_get_contents($viewUrl, false, $context);

            $atts['script'] = $script;
            $atts['view'] = $view;

            return $atts;
        }
    }

    // Map array
    $map = array(
        'name' => 'Boka verkstad',
        'base' => 'bookservice',
        'description' => 'Innehåll',
        'class' => '',
        'show_settings_on_create' => true,
        'weight' => 10,
        'category' => 'Innehåll',
        'params' => array(
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => 'Rubrik',
                'param_name' => 'headline'
            )
        )
    );

    $vcBookService = new BookService($map);
}

?>
