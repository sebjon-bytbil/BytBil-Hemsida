<?php
/*
Template Name: Startsida
*/
?>
<?php get_header(); ?>
<?php

//the_field('sliderfalt');
$frontpage_slider = get_field('slider-front');
$slider_id = $frontpage_slider->ID;

show_bytbil_slider($slider_id)

?>

<div id="quicklinks">
    <div class="wrapper">
        <div class="container-fluid puffar">
            <?php

            // check if the repeater field has rows of data
            if (have_rows('puffar', 8)):

                // loop through the rows of data
                while (have_rows('puffar', 8)): the_row(); ?>

                    <div class="col-sm-3 col-xs-3">
                        <div class="puff">
                            <?php
                            if (get_sub_field('link-type') == 'intern'){ ?>
                            <a href="<?php the_sub_field('pufflank');?>">
                                <?php }
                                if (get_sub_field('link-type') == 'extern'){ ?>
                                <a target="_blank" href="<?php the_sub_field('pufflank_url'); ?>">
                                    <?php } ?>
                                    <img src="<?php the_sub_field('puffbild'); ?>"/>

                                    <h3><?php the_sub_field('puffrubrik') ?></h3>
                                </a>
                        </div>
                    </div>

                <?php endwhile;
            else :
                // no rows found
            endif;
            ?>

            <div class="clear"></div>
        </div>
    </div>
</div>

<div id="new-cars">
    <div class="wrapper">
        <div class="container-fluid">
            <h2>Nyinkommet</h2>

            <div id="iframeDiv" class="ContentAP"></div>
        </div>
    </div>
</div>

<div id="intro-texts">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-md-8 col-xs-12">
                <h2><?php the_field('start_title'); ?></h2>

                <h3 class="slogan"><?php echo bloginfo('description'); ?></h3>
                <?php the_field('start_text'); ?>
            </div>
            <div id="oppettider" class="col-md-4 col-xs-12">
                <h2>Öppettider</h2>

                <div class="container-fluid no-padding">
                    <?php
                    if (have_rows('oppettider')):
                        while (have_rows('oppettider')): the_row(); ?>
                            <div class="col-md-6 col-sm-3 col-xs-6 no-padding">
                                <h3><?php the_sub_field('oppettider-avdelning'); ?></h3>

                                <p>Mån-Fre</p>

                                <p>Lördag</p>

                                <p>Söndag</p>
                            </div>
                            <div class="col-md-6 col-sm-3 col-xs-6 no-padding">
                                <h3>&nbsp;</h3>

                                <p><?php the_sub_field('oppettider-vardagar'); ?></p>

                                <p><?php the_sub_field('oppettider-lordagar'); ?></p>

                                <p><?php the_sub_field('oppettider-sondagar'); ?></p>
                            </div>

                        <?php endwhile;
                    else :
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>
