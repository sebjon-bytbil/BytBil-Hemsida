<?php
get_header();
$isPreview = is_preview();
?>
    <div id="content">
        <div class="container-fluid">
            <div class="col-xs-12">
                <?php if ($isPreview) : ?> <h3>Detta är en förhandsgranskning </h3><?php endif; ?>
                <div id="slider">
                    <div class="slider-container">
                        <?php bytbil_show_slideshow($id); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>