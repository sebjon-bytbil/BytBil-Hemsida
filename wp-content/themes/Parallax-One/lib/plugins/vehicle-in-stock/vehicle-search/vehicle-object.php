<?php

function get_select_list($object){
    

}

function get_vehicle_object($object){
    
    $first_image = $object->images->image;
    $first_image_thumb = str_replace('1004','1006',$first_image[0]);
    $first_image_thumb = '';
    ?>
    <div class="col-xs-12 col-sm-4 vehicle"
         data-brand="all <?php echo $object->brand; ?>" 
         data-regno="<?php echo $object->regno; ?>" 
         data-model="all <?php echo $object->model; ?>" 
         data-description="<?php echo $object->modeldescription; ?>" 
         data-year="all<?php echo $object->yearmodel; ?>" 
         data-miles="all<?php echo $object->miles; ?>" 
         data-price="all<?php echo $object['price-sek']; ?>" 
         data-extra-price="all<?php echo $object->brand; ?>" 
         data-body="all<?php echo $object->bodytype; ?>"
         data-used="all<?php echo $object->status; ?>"
         data-color="all<?php echo $object->color; ?>"
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
                    <h3 class="card-title"><?php echo $object->brand . ' ' . $object->model . ' ' . $object->modeldescription; ?></h3>
                </div>
            </div>
        </article>
    </div>
<?php    
}
?>