<?php
get_header();
$isPreview = is_preview();
?>
<div id="content">
    <div class="container-fluid">
        <?php if ($isPreview) : ?>
            <div class="col-sm-12"><h3>Detta är en förhandsgranskning </h3></div><?php endif; ?>
        <?php
        bytbil_show_facility_all($post->ID);
        ?>
    </div>
</div>
<?php
$mapzoom = get_field('content-facility-map-zoom');
$mapzoom = $mapzoom ? intval($mapzoom, 10) : 16;
bytbil_init_facility_map($mapzoom);

get_footer();
?>
