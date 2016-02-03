<?php
if (get_field('start_slider')) : ?>
<div id="<?php echo $name; ?>-slider" class="slider nygren-header-gallery flexslider">
    <ul class="slides">
        <?php
        while (has_sub_fields('start_slider')) : ?>
        <?php $showslide = false;
        if (get_sub_field('temp') == 1) {
            $start = get_sub_field('start');
            if (date('Ymd') >= $start) {
                if (get_sub_field('tempslut') == 1) {
                    $stop = get_sub_field('stop');
                    if (date('Ymd') <= $stop) {
                        //visa slide
                        $showslide = true;
                    }
                } else {
                    //visa slide
                    $showslide = true;
                }
            }
        } else {
            //visa slide
            $showslide = true;
        }
        if ($showslide) { ?>
            <li>
                <a href="<?php the_sub_field('link'); ?>">
                    <img title="<?php the_sub_field('titleattr'); ?>" alt="<?php the_sub_field('alt'); ?>"
                         src="<?php the_sub_field('imgurl'); ?>">

                    <div class="largetext"
                         style="color:<?php the_sub_field('titlecolor'); ?>"><?php the_sub_field('caption'); ?></div>
                    <?php if (get_sub_field('caption2')) : ?>
                        <div class="smalltext"
                             style="color:<?php the_sub_field('subtitlecolor'); ?>"><?php the_sub_field('caption2'); ?></div><?php endif; ?>
                </a>
            </li>
        <?php }
        ?>
    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var hash = window.location.hash;
        hash = parseInt(hash.split('#')[1]);
        console.log(hash);

        $('.slider').each(function () {
            if (hash) {
                $(this).flexslider({animation: 'slide', startAt: hash, animationLoop: false, controlNav: true});
            } else {
                $(this).flexslider({
                    animation: 'slide',
                    slideshowSpeed: <?php the_field('slideduration'); ?>,
                    controlNav:<?php if(get_field('controlnav')){the_field('controlnav');}else{echo "false";} ?>
                });
            }
        });
    });