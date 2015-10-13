<?php
$layout = get_sub_field('content-employee-layout');
$hide = get_sub_field('content-employees-hide-brand');
$use_slider = get_sub_field('content-slider');
$employee_show_vehicle_type = get_sub_field('content-employees-hide-vehicle-type');
?>
<div class="row">

<?php
if($use_slider){
    $employees_paging = get_sub_field('content-employees-paging');
    ?>
    <div id="employee-carousel-<?php echo $row_counter . '-' . $content_count; ?>" class="employee-gallery-container" data-col-size="<?php echo $employees_paging; ?>">
<?php } ?>


<?php

switch ($layout){
    case 'specific' :
        $employees = get_sub_field('content-employees-specific');
        if($employees){
            ?>

            <?php
            foreach($employees as $employee){
                get_employee_card($employee->ID, $hide);
            }
            ?>

        <?php
        }
    break;

    case 'list' :
        $employee_list = get_sub_field('content-employees-list');
        foreach($employee_list as $list){
            $list_id = $list->ID;
            $employees = get_field('employee-list-employee', $list_id);
            
            /*if($employees){
                foreach($employees as $employee => $item){
                    get_employee_card($item, $hide);
                }
            }*/
            if($employees){
                /*foreach ($employees as $employee) {
                    $employee_ids[] = $employee->ID;
                }
                echo '<pre>'; var_dump($employees); echo '</pre>';
                echo '<pre>'; var_dump($employee_ids); echo '</pre>';
                */
                $employee_args = array(
                    'posts_per_page'   => -1,
                    'offset'           => 0,
                    'orderby'          => 'rand',
                    'include'          => $employees,
                    'post_type'        => 'employee',
                    'post_status'      => 'publish',
                    'suppress_filters' => true 
                );
                
                get_employee_list(false, false, false, false, $hide, $employee_show_vehicle_type, $employee_args);
            }
            
        }
    break;

    case 'automatisk' :
        $employee_cities = get_sub_field('content-employees-cities');
        $employee_department = get_sub_field('content-employees-department');
        $employee_brand = get_sub_field('content-employees-brand');
        $employee_vehicle_type = get_sub_field('content-employees-vehicle-type');

        get_employee_list($employee_cities, $employee_department, $employee_vehicle_type, $employee_brand, $hide, $employee_show_vehicle_type, $employee_args);

    break;
}
?>

<?php if($use_slider){ ?>
    </div>
<?php }
?>
</div>

<?php if($use_slider){ ?>
<script>
    $ = jQuery;

    var divs = $("#employee-carousel-<?php echo $row_counter . '-' . $content_count; ?> > div");

    //Antal Bilder Per Slide
    for(var i = 0; i < divs.length; i+=<?php echo $employees_paging; ?>) {
        divs.slice(i, i+<?php echo $employees_paging; ?>).wrapAll("<div class='item'></div>");
    }

    $(document).ready(function () {
        $("#employee-carousel-<?php echo $row_counter . '-' . $content_count; ?>").owlCarousel({
            navigation: true,
            pagination: true,
            items: 1,
            itemsDesktop: [1199,1],
            itemsDesktopSmall: [979,1],
            itemsTablet: [768,1],
            itemsMobile: [479, 1],
            navigationText: ["<i class='icon icon-chevron-thin-left'></i>","<i class='icon icon-chevron-thin-right'></i>"]
        });
    });

</script>
<?php } ?>
