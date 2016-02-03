<?php
$vehicle_models = get_sub_field('content-vehicle-model');
$vehicle_contents = get_sub_field('content-vehicle-contents');
$vehicle_brands = get_sub_field('content-vehicles-list-brand');
$id = get_the_ID();


switch ($vehicle_contents) {
    case 'header':
    ?>
        <div class="vehicle-<?php echo $vehicle_contents; ?>">
            <!-- Headerbild med beskrivning -->
            <div class="flexslider" id="slideshow-<?php echo $id; ?>">
                <ul class="slides">
                    <?php

                    foreach($vehicle_models as $model){
                        get_vehicle_header($model->ID);
                    }

                    ?>
                </ul>
            </div>
        </div>

    <?php
    break;
    case 'info':
    ?>

        <div class="vehicle-<?php echo $vehicle_contents; ?>">
            <?php

            get_model_information_table($id, $vehicle_models);

            ?>
        </div>

    <?php

    break;

    case 'equipment':
        ?>
        <div class="vehicle-<?php echo $vehicle_contents; ?>">
            <?php
                
                $model_group_counter = 0;

                foreach ($vehicle_models as $model) {
                    $new_model_id = $model->ID;
                    $post_type = get_post_type($new_model_id);
                    if($post_type == 'modelgroup' && $model_group_counter != 1){
                        $vehicle_models = get_field('modelgroup-models', $new_model_id);
                        $model_group_counter = 1;
                    }
                }
    
                get_vehicle_equipment_package($id, $vehicle_models);
            ?>
        </div>
        <?php
    break;

    case 'list':
    ?>

    <div class="vehicle-<?php echo $vehicle_contents; ?>">
        <div class="row row-flex row-flex-wrap">
        <?php
            foreach($vehicle_models as $model){
                $post_type = get_post_type($model->ID);
                get_vehicle_list_item($model->ID, $post_type);
            }
        ?>
        </div>
    </div>

    <?php
    break;

    case 'gallery':
    ?>

        <div class="vehicle-<?php echo $vehicle_contents; ?>">
            <?php
            get_vehicle_gallery($id, $vehicle_models);
            ?>
        </div>

    <?php
    break;
        
    case 'personalbilar' :
        $employee_car_list = get_sub_field('content-vehicle-employees');
        ?>
        <div class="vehicle-<?php echo $vehicle_contents; ?>">
            <div class="row row-flex row-flex-wrap">
                
            <?php
            foreach($employee_car_list as $list)
            {
                $list_fields = get_fields($list->ID);
                $employee_vehicles = $list_fields['employee_vehicles'];
                foreach($employee_vehicles as $vehicle){
                    get_employee_vehicle_list_item($vehicle);
                }
                ?>



                <?php
            }
            ?>
                
            </div>
        </div>
    <?php
    break;
}
?>
