<script>
$ = jQuery;
</script>

<?php

    if( have_rows('mazda-content') ) {
        // loop through the rows of data
        while ( have_rows('mazda-content') ) {
            the_row();
            $content_width = get_sub_field('content-width');
            ?>

<!--            <div class="col-xs-12 col-sm-<?php //echo $content_width; ?>">-->

                <?php
                if( get_row_layout() == 'content-bildspel' ) {
                    require 'modules/MazdaBildspel.php';
                }

                elseif( get_row_layout() == 'content-custom' ) {
                    require 'blocks/content-custom.php';
                }

                elseif( get_row_layout() == 'content-plugs' ){
                    require 'blocks/content-plugs.php';
                }

                elseif( get_row_layout() == 'content-assortment' ){
                    require 'blocks/content-assortment.php';
                }

                elseif( get_row_layout() == 'content-facility' ){
                    require 'blocks/content-facility.php';
                }

                /***     NEW STUFF     ***/
                elseif (get_row_layout() == 'content-slideshow') {
                    require 'modules/MazdaSlideshow.php';
                }

                elseif (get_row_layout() == 'content-secnav') {
                    require 'modules/MazdaSecNav.php';
                }

                elseif (get_row_layout() == 'content-empty') {
                    require 'modules/MazdaEmpty.php';
                }

                elseif (get_row_layout() == 'content-sidebar') {
                    require 'modules/MazdaConfigSidebar.php';
                }

                elseif (get_row_layout() == 'content-content') {
                    require 'modules/MazdaContent.php';
                }

                elseif (get_row_layout() == 'content-awards-slider') {
                    require 'modules/MazdaAwardsSlider.php';
                }

                elseif (get_row_layout() == 'content-properties') {
                    require 'modules/MazdaProperties.php';
                }

                elseif (get_row_layout() == 'content-colors') {
                    require 'modules/MazdaColors.php';
                }

                elseif (get_row_layout() == 'content-gallery') {
                    require 'modules/MazdaGallery.php';
                }

                elseif (get_row_layout() == 'content-video') {
                    require 'modules/MazdaVideo.php';
                }

                elseif (get_row_layout() == 'content-awards-module') {
                    require 'modules/MazdaAwardsModule.php';
                }

                elseif (get_row_layout() == 'content-big-gallery') {
                    require 'modules/MazdaBigGallery.php';
                }

                elseif (get_row_layout() == 'content-buying-slider') {
                    require 'modules/MazdaBuyingSlider.php';
                }

                elseif (get_row_layout() == 'content-colorator') {
                    require 'modules/MazdaColorator.php';
                }

                elseif (get_row_layout() == 'content-props-slider') {
                    require 'modules/MazdaPropsSlider.php';
                }

                elseif (get_row_layout() == 'content-comparison') {
                    require 'modules/MazdaComparison.php';
                }

                elseif (get_row_layout() == 'content-focus-box') {
                    require 'modules/MazdaFocusBox.php';
                }

                elseif (get_row_layout() == 'content-navsys') {
                    require 'modules/MazdaNavSys.php';
                }

                elseif (get_row_layout() == 'content-bluetooth') {
                    require 'modules/MazdaBluetooth.php';
                }

                elseif (get_row_layout() == 'content-storage') {
                    require 'modules/MazdaStorageTool.php';
                }

                elseif (get_row_layout() == 'content-spare-parts') {
                    require 'modules/MazdaSpareParts.php';
                }

                elseif (get_row_layout() == 'content-text-module') {
                    require 'modules/MazdaTextModule.php';
                }

                ?>

            <!--</div>-->

            <?php
        }
    }

    else{

    }

?>
