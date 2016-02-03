<?php
    $assortment = get_sub_field('assortment');
    $assortment_header = get_sub_field('assortment-header');
    $assortment_link = get_sub_field('assortment-link');

    if($assortment_header || $assortment_link=='true') {
        ?>
        <div class="container-fluid"><div class="col-xs-12" style="margin-top: 10px;">
            <?php
            if($assortment_header){
            ?>
            <h2 class="assortment-header pull-left"><?php echo $assortment_header; ?></h2>
            <?php
            }
            if($assortment_link=='true'){
            ?>
            <a href="<?php echo get_field('page-vehicles-in-stock', 'options'); ?>" class="button blue pull-right"><i class="fa fa-car fa-fw"></i> Se alla Mazda i lager</a>
            <?php
            }
            ?>
        </div></div>
        <?php
    }
    ?>

    <?php
    bytbil_show_assortment($assortment->ID);
?>
