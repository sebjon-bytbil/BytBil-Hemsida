<?php
$vehicle_models = $content['content-vehicle-model'];
$vehicle_contents = $content['content-vehicle-contents'];
$vehicle_brands = $content['content-vehicles-list-brand'];
$id = $content['id'];


switch ($vehicle_contents) {
    case 'header':
    ?>
        <div class="vehicle-<?php echo $vehicle_contents; ?>">
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

    init_slideshow($id);

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
}
?>
