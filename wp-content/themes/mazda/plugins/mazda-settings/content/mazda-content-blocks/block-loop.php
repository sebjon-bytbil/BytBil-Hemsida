<script>$ = jQuery;</script>

<?php

if (have_rows('mazda-content')) :
    // loop through the rows of data
    while (have_rows('mazda-content')) : the_row();
        $row_layout = get_row_layout();

        if ($row_layout == 'content-slideshow') {
            require 'modules/MazdaSlideshow.php';
        }
        elseif ($row_layout == 'content-secnav') {
            require 'modules/MazdaSecNav.php';
        }
        elseif ($row_layout == 'content-empty') {
            require 'modules/MazdaEmpty.php';
        }
        elseif ($row_layout == 'content-sidebar') {
            require 'modules/MazdaConfigSidebar.php';
        }
        elseif ($row_layout == 'content-content') {
            require 'modules/MazdaContent.php';
        }
        elseif ($row_layout == 'content-awards-slider') {
            require 'modules/MazdaAwardsSlider.php';
        }
        elseif ($row_layout == 'content-properties') {
            require 'modules/MazdaProperties.php';
        }
        elseif ($row_layout == 'content-colors') {
            require 'modules/MazdaColors.php';
        }
        elseif ($row_layout == 'content-gallery') {
            require 'modules/MazdaGallery.php';
        }
        elseif ($row_layout == 'content-video') {
            require 'modules/MazdaVideo.php';
        }
        elseif ($row_layout == 'content-awards-module') {
            require 'modules/MazdaAwardsModule.php';
        }
        elseif ($row_layout == 'content-big-gallery') {
            require 'modules/MazdaBigGallery.php';
        }
        elseif ($row_layout == 'content-buying-slider') {
            require 'modules/MazdaBuyingSlider.php';
        }
        elseif ($row_layout == 'content-colorator') {
            require 'modules/MazdaColorator.php';
        }
        elseif ($row_layout == 'content-props-slider') {
            require 'modules/MazdaPropsSlider.php';
        }
        elseif ($row_layout == 'content-comparison') {
            require 'modules/MazdaComparison.php';
        }
        elseif ($row_layout == 'content-focus-box') {
            require 'modules/MazdaFocusBox.php';
        }
        elseif ($row_layout == 'content-navsys') {
            require 'modules/MazdaNavSys.php';
        }
        elseif ($row_layout == 'content-bluetooth') {
            require 'modules/MazdaBluetooth.php';
        }
        elseif ($row_layout == 'content-storage') {
            require 'modules/MazdaStorageTool.php';
        }
        elseif ($row_layout == 'content-spare-parts') {
            require 'modules/MazdaSpareParts.php';
        }
        elseif ($row_layout == 'content-text-module') {
            require 'modules/MazdaTextModule.php';
        }

    endwhile;
endif;

if (have_rows('content')) :
    // loop through the rows of data
    $container = false;
    while (have_rows('content')) : the_row();
        $row_layout = get_row_layout();
        $background = get_sub_field('background-color');
        $width = get_sub_field('content-width');
        $full_width = get_sub_field('full-width');

        // Full width block
        if ($full_width) {
            if ($container) {
                $container = false;
                echo '</div>';
            }
            echo '<div class="container-fluid full">';
        }

        // Not full width and not container
        elseif (!$full_width && !$container) {
            $container = true;
            // Open container
            echo '<div class="container">';
        }
        ?>

        <div class="col-xs-12<?php echo (!$width) ? '' : ' col-sm-' . $width; ?>"<?php echo (!$background) ? '' : ' style="background: ' . $background . ';"'; ?>>
        <?php
        if ($row_layout == 'content-facility') {
            require 'blocks/content-facility.php';
        }
        elseif ($row_layout == 'content-slideshow') {
            require 'blocks/content-slideshow.php';
        }
        elseif ($row_layout == 'content-custom') {
            require 'blocks/content-custom.php';
        }
        elseif ($row_layout == 'content-offer') {
            require 'blocks/content-offer.php';
        }
        elseif ($row_layout == 'content-assortment') {
            require 'blocks/content-assortment.php';
        }
        elseif ($row_layout == 'content-plugs') {
            require 'blocks/content-plugs.php';
        }
        elseif ($row_layout == 'content-employee') {
            require 'blocks/content-employee.php';
        }
        elseif ($row_layout == 'content-form') {
            require 'blocks/content-form.php';
        }
        elseif ($row_layout == 'content-newcarmodel') {
            require 'blocks/content-newcarmodel.php';
        }
        elseif ($row_layout == 'content-iframe') {
            require 'blocks/content-iframe.php';
        }
        ?>
        </div>

        <?php if ($full_width) : ?>
            </div>
        <?php endif; ?>

        <?php
    endwhile;
    if ($container) {
        // Close container
        echo '</div>';
    }
endif;

if (have_rows('page-content')) {

    // loop through the rows of data
    while (have_rows('page-content')) {
            the_row();
            $content_width = get_sub_field('content-width');
            ?>

            <div class="col-xs-12 col-sm-<?php echo $content_width; ?>">

                <?php
                if( get_row_layout() == 'content-custom' ) {
                    require 'blocks/content-custom.php';
                }

                elseif( get_row_layout() == 'content-plugs' ){
                    require 'blocks/content-plugs.php';
                }

                elseif( get_row_layout() == 'content-assortment' ){
                    require 'blocks/content-assortment.php';
                }
                ?>

            </div>

            <?php
        }
    }

?>
