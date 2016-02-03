<div style="text-align: center;">
    <?php
    $brands = get_sub_field('content_brands');

    foreach ($brands as $brand) {
        bytbil_show_brand($brand->ID);
    }
    ?>
</div>
