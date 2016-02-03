<?php
get_header();
$isPreview = is_preview();
?>
<div id="content">
    <div class="container-fluid">
        <?php if ($isPreview) : ?>
            <div class="col-sm-12"><h3>Detta är en förhandsgranskning </h3></div><?php endif; ?>
        <?php
        bytbil_show_plug($post->ID);
        ?>
    </div>
</div>
<?php
get_footer();
?>
