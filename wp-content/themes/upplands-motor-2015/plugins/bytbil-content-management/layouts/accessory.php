<?php
$layout = get_sub_field('content-accessory-layout');
$use_slider = get_sub_field('content-accessory-slider');
?>
<div class="row">

<?php
if ($use_slider) {
    $accessory_paging = get_sub_field('content-accessory-paging');
    ?>
    <div id="accessory-carousel-<?php echo $row_counter . '-' . $content_count; ?>" class="employee-gallery-container" data-col-size="<?php echo $employees_paging; ?>">
<?php } ?>

<?php
switch ($layout) {
case 'specific' :
    $accessories = get_sub_field('content-accessory-specific');
    if ($accessories) {
        foreach ($accessories as $accessory) {
            get_accessory_card($accessory->ID, $row_counter, $content_count);
        }
    }
    break;

case 'list' :
    $accessory_type = get_sub_field('content-accessory-type');
    get_accessory_list($accessory_type, $row_counter, $content_count);
}
?>

<?php if ($use_slider) { ?>
    </div>
<?php } ?>

</div>

<?php if ($use_slider) { ?>
<script>
    $ = jQuery;

    var divs = $('#accessory-carousel-<?php echo $row_counter . '-' . $content_count; ?> > div');

    //Antal Bilder Per Slide
    for(var i = 0; i < divs.length; i+=<?php echo $accessory_paging; ?>) {
        divs.slice(i, i+<?php echo $accessory_paging; ?>).wrapAll('<div class="item"></div>');
    }

    $(document).ready(function() {
        $('#accessory-carousel-<?php echo $row_counter . '-' . $content_count; ?>').owlCarousel({
            navigation: true,
            pagination: true,
            items: 1,
            itemsDesktop: [1199,1],
            itemsDesktopSmall: [979,1],
            itemsTablet: [768,1],
            itemsMobile: [479,1],
            navigationText: ['<i class="icon icon-chevron-thin-left"></i>', '<i class="icon icon-chevron-thin-right"></i>']
        });
    });
</script>
<?php } ?>

