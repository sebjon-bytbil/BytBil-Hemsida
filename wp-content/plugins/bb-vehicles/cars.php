<?php

include_once('vehicle-search/vehicle-object.php');
$xml = simplexml_load_file('data/upplandsakalla.xml');

?>

<section class="white-bg align-center">
    <div class="container-fluid wrapper align-center">
        <div class="col-xs-12">
            <h2>Sök bland 235 olika fordon</h2>
            <p class="bigger-text">Letar du efter din nästa drömbil? Sök och hitta den bland våra lagerbilar!</p>
        </div>
        <div class="wrapper-960">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <label class="selectpicker-label">Vad för bil?</label>
                    <select class="selectpicker filter-select filter-used">
                        <option value="all">Nya och begagnade</option>
                        <option value="1">Endast nya</option>
                        <option value="0">Endast begagnade</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <label class="selectpicker-label">Vilket märke?</label>
                    <select class="selectpicker filter-select filter-brand">
                        <option value="all">Alla märken</option>
                        <option value="Volvo">Volvo</option>
                        <option value="Renault">Renault</option>
                        <option value="Dacia">Dacia</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <label class="selectpicker-label">Vilken modell?</label>
                    <?php

                    foreach($xml->car as $car){
                        get_select_list($car);
                    }

                    ?>
                    <!--<select class="selectpicker">
                        <option>Alla modeller</option>
                    </select>-->
                </div>
                <div class="col-xs-12">
                    <input type="submit" class="btn btn-blue big" value="Sök och hitta">
                    <br>
                    <a href="#" class="caps grey-text smaller-text">Visa fler sökalternativ</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="grey-bg">
    <div class="container-fluid wrapper">
        <div class="vehicle-grid">
            <?php

            foreach($xml->car as $car){
                get_vehicle_object($car);
            }

            ?>
        </div>
    </div>
</section>