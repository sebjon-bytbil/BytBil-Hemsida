<?php
$layout = $content['content-employee-layout'];
$hide = $content['content-employees-hide-brand'];
$use_slider = $content['content-slider'];
?>
<div class="row">

    <?php
if($use_slider){
    $employees_paging = $content['content-employees-paging'];
    ?>
    <div id="employee-carousel-<?php echo $row_counter . '-' . $content_count; ?>" class="employee-gallery-container" data-col-size="<?php echo $employees_paging; ?>">
        <?php } ?>


        <?php
switch ($layout){
    case 'specific' :
    $employees = $content['content-employees-specific'];
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
    $employee_list = $content['content-employees-list'];
    foreach($employee_list as $list){
        $list_id = $list->ID;
        $employees = get_field('employee-list-employee', $list_id);

        if($employees){
            foreach($employees as $employee => $item){
                get_employee_card($item, $hide);
            }
        }
    }
    break;

    case 'automatisk' :
    $employee_cities = $content['content-employees-cities'];
    $employee_department = $content['content-employees-department'];
    $employee_brand = $content['content-employees-brand'];

    get_employee_list($employee_cities, $employee_department, $employee_brand, $hide);

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
            navigationText: ["<i class='icon icon-chevron-thin-left'></i>","<i class='icon icon-chevron-thin-right'></i>"]
        });
    });

</script>
<?php } ?>
