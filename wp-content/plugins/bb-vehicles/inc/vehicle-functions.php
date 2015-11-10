<?php

function get_xml_data($url=false){
    // Get any existing copy of our transient data
    
    $xml_array = json_decode(get_site_transient( 'my_mood' ), true); // Multisite Transient
    
    if($xml_array){
    } else {
        $xml_data = simplexml_load_file(plugin_dir_path(__FILE__) . 'upplandsakalla.xml');
        $value = json_encode($xml_data);
        set_site_transient( 'my_mood', $value, MINUTE_IN_SECONDS ); // Multisite Transient
        
        $xml_array = json_decode(get_site_transient( 'my_mood' ), true); // Multisite Transient
    }    
    return $xml_array;
}

function get_select_options($object=false){
    $xml_data = get_xml_data();
    $options = array();
    
    foreach($xml_data['car'] as $car)
    {
        $options[] = $car[$object];
    }
    
    $options = array_unique($options);
    return $options;    
}



function get_select_element($object=false){
    $xml_data = get_xml_data();
    $options = array();
    $select_options = array();
    
    
    switch($object)
    {
        case 'model' :
            ?>
            <select class="selectpicker filter-select filter-model">
                <option data-brand="all" value="all">Alla modeller</option>
            <?php

            foreach($xml_data['car'] as $car)
            {
                $options[] = $car['model'];
                $select_options[] = '<option data-brand="' . $car['brand'] . '" value="' . $car['model'] . '">'. $car['model'] .'</option>';
            }
            
            $options = array_unique($options);
            $select_options = array_unique($select_options);
            
            foreach($select_options as $option) {
                echo $option;
            }

            ?>
            </select>
            <?php
        
        break;
    }
    
    
}



function get_vehicle_object($object){
    
    $first_image = $object['images']['image'][0];
    $first_image_thumb = str_replace('1004','1006',$first_image);
    ?>
    <div class="col-xs-12 col-sm-4 vehicle"
         data-id="<?php echo $object['id']?>" 
         data-brand="all <?php echo $object['brand']; ?>" 
         data-regno="<?php echo $object['regno']; ?>" 
         data-model="all <?php echo $object['model']; ?>" 
         data-description=" <?php echo $object['description']; ?>" 
         data-year="all <?php echo $object['yearmodel']; ?>" 
         data-miles="all <?php echo $object['miles']; ?>" 
         data-price="all <?php echo $object['price-sek']; ?>" 
         data-extra-price="all <?php echo $object['extra-price']; ?>"
         data-body="all<?php echo $object['bodytype'];; ?>"
         data-status="all<?php echo $object['status']; ?>"
         data-color="all<?php echo $object['color']; ?>"
         >
        <article class="vehicle-object">
            <div class="card white-bg">
                <div class="card-header">
                    <img src="<?php echo $first_image_thumb; ?>" data-original="<?php echo $first_image_thumb; ?>" class="lazy vehicle-image" height="226">
                    <noscript>
                        <img src="<?php echo $first_image_thumb; ?>" width="640" height="480">
                    </noscript>
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?php echo $object['brand'] . ' ' . $object['model'] . ' ' . $object['description']; ?></h3>
                </div>
            </div>
        </article>
    </div>
<?php    
}
?>