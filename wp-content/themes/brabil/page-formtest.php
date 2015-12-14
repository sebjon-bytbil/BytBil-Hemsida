<?php
/*
Template Name: Formtest
 */

$HELPUrl = 'https://servicebooking-modules-test-volvobil.azurewebsites.net/api/servicebooking/help';

$HELPOptions = array(
    'http' => array(
        'header' => "Content-Type: application/json\r\n",
        'method' => 'GET',
    )
);

$HELPContext = stream_context_create($HELPOptions);

$HELP = file_get_contents($HELPUrl, false, $HELPContext);

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
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
        <link href="https://volvobil.se/content/volvobil-base?v=zTibl-efzEhOUSRU0oCtWyjWsSvJ4ru4pFCbTAz_RiI1" rel="stylesheet">
        <!--<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/public/js/scripts.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-animate.min.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/scripts/vendor/ui-bootstrap-tpls-0.14.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/i18n/angular-locale_sv-se.js"></script>
    </head>
    <body>
        <br><br><hr><br><br>
        <?php echo $HELP; ?>
        <br><br><hr><br><br>
        <style>
        .container {
            padding-left: 0;
            padding-right: 0;
        }
        </style>
        <div class="container body-content">
            <div id="brabil-dealerweb-contacts">
                <section class="content container clearfix">
                    <div class="side-col" style="float: left;">
                        <!-- filter -->
                        <? //print $filter; ?>
                    </div>
                    <div class="content-col" style="float: left;">
                        <!-- css -->
                        <? //print $css; ?>
                        <!-- display -->
                        <? //print $display; ?>
                        <!-- print -->
                        <?php print $view; ?>
                        <!-- script -->
                        <? print $script; ?>
                    </div>
                </section>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>
