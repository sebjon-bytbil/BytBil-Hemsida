<div class="container-fluid no-padding no-child-padding">
    <div class="col-xs-12">
        <section id="model-table">
            <ul>
                <li><img src="<?php bloginfo('template_url'); ?>/images/mb-icon.svg" class="mb-icon"/><span class="model-table-title">Modellöversikt</span>
                </li>
                <?php

                function make_lower_case($string) {
                    //Lower case everything
                    $string = strtolower($string);
                    //Make alphanumeric (removes all other characters)
                    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
                    //Clean up multiple dashes or whitespaces
                    $string = preg_replace("/[\s-]+/", " ", $string);
                    //Convert whitespaces and underscore to dash
                    $string = preg_replace("/[\s_]/", "-", $string);
                    return $string;
                }

                $seller_type = get_field("af-reseller", "option");
                switch_to_master();
                $args = array(
                    'post_type' => 'model',
                    "posts_per_page" => -1
                );
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    $model_title = get_the_title();
                    $model_find = get_field('model_shortlinks-find');
                    $show = false;
                    $showfors = get_field("model_show_for");
                    foreach ($showfors as $show_for) {
                        if (in_array($show_for, $seller_type)) {
                            if($show_for == 'pb'){
                                $show = true;
                            }
                        }
                    }
                    if ($show) :
                        ?>
                        <li>
                            <a href="#"><?php echo str_replace('-Klass', '', $model_title); ?></a>
                            <div class="model" style="background: #fff url(<?php echo $image['url'] ?>) no-repeat bottom right;">

                                <div class="model-bodys">
                                    <h3><?php echo the_title(); ?></h3>
                                    <ul class="model-body-list">
                                    <?php
                                        $i = 1;
                                        while (have_rows('model_body')) { the_row();
                                        $model_body_name = get_sub_field('model_body_name');
                                        $model_body_stripped = make_lower_case($model_body_name);
                                    ?>
                                        <li <?php if($i ==1){ echo 'class="active"'; } ?>><a class="body-<?php echo $model_body_stripped; ?>" href="#"><?php echo $model_body_name; ?></a></li>

                                    <?php $i++; } ?>

                                    </ul>


                                <?php
                                while (have_rows('model_body')) { the_row();
                                    $model_body_name = get_sub_field('model_body_name');
                                    $model_body_stripped = make_lower_case($model_body_name);
                                    $image = get_sub_field('model_image');
                                    ?>
                                    <div class="model body-<?php echo $model_body_stripped; ?>" style="background: #fff url(<?php echo $image['url'] ?>) no-repeat bottom right;">
                                        <span class="model-description"><?php echo get_sub_field('model_description'); ?></span>
                                        <div class="model-links">
                                            <ul>
                                                <?php if (get_sub_field('model_shortlinks-experience')): ?>
                                                <li><a class="shortlink"
                                                       href="<?php echo get_sub_field('model_shortlinks-experience'); ?>"
                                                       target="_blank">
                                                    <i class="fa fa-fw fa-bullseye"></i>Upplev <?php echo the_title(); ?>
                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                                <?php if (get_sub_field('model_shortlinks-data')): ?>
                                                <li><a class="shortlink"
                                                       href="<?php echo get_sub_field('model_shortlinks-data'); ?>"
                                                       target="_blank">
                                                    <i class="fa fa-fw fa-file"></i>Tekniska data</a>
                                                </li>
                                                <?php endif; ?>
                                                <?php if (get_sub_field('model_shortlinks-brochure')): ?>
                                                <li><a class="shortlink"
                                                       href="<?php echo get_sub_field('model_shortlinks-brochure'); ?>"
                                                       target="_blank">
                                                    <i class="fa fa-fw fa-book"></i>Broschyr</a>
                                                </li>
                                                <?php endif; ?>
                                                <?php if (get_sub_field('model_shortlinks-configurator')): ?>
                                                <li><a class="shortlink"
                                                       href="<?php echo get_sub_field('model_shortlinks-configurator'); ?>"
                                                       target="_blank">
                                                    <i class="fa fa-fw fa-cogs"></i>Bygg
                                                    din <?php echo get_the_title(); ?></a>
                                                </li>
                                                <?php endif; ?>
                                                <?php if (get_field('model_shortlinks-find')): ?>
                                                <?php

                                                     $model_assortment_object = get_sub_field('model_assortment-object');
                                                     $model_critiera = get_field('assortment_string', $model_assortment_object->ID);

                                                ?>
                                                <li><a class="shortlink"
                                                       href="<?php echo get_local_url(get_field('model_shortlinks-find')); ?>?criteriastring=<?php echo $model_critiera; ?>"
                                                       target="_self">
                                                    <i class="fa fa-fw fa-search"></i>Hitta
                                                    begagnad <?php echo get_the_title() . ' ' . $model_body_name; ?></a>
                                                </li>
                                                <?php endif; ?>

                                            </ul>
                                        </div>
                                    </div>


                                <?php } ?>
                                </div>
                            </div>
                            </a>
                        </li>
                    <?php endif; endwhile;
                restore_blog();
                ?>
            </ul>
        </section>
        <?php
            $seller_type = get_field("af-reseller", "option");
            if(in_array('tb',$seller_type)){
        ?>
        <section id="model-table" style="margin-top: 0; border: 0;">
            <ul>
                <li><img src="<?php bloginfo('template_url'); ?>/images/mb-icon.svg" class="mb-icon"/> Transportbilar
                </li>
                <?php

                    $seller_type = get_field("af-reseller", "option");
                    switch_to_master();
                    $args = array(
                        'post_type' => 'model',
                        'order' => 'ASC',
                        "posts_per_page" => -1
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                    $model_title = get_the_title();
                    $model_find = get_field('model_shortlinks-find');
                    $show = false;
                    $showfors = get_field("model_show_for");
                    foreach ($showfors as $show_for) {
                        if (in_array($show_for, $seller_type)) {
                            if($show_for == 'tb'){
                                $show = true;
                            }
                        }
                    }
                    if ($show) :
                ?>
                <li>
                    <a href="#"><?php echo str_replace('-Klass', '', $model_title); ?></a>
                    <div class="model" style="background: #fff url(<?php echo $image['url'] ?>) no-repeat bottom right;">

                        <div class="model-bodys">
                            <h3><?php echo the_title(); ?></h3>
                            <ul class="model-body-list">
                                <?php
                                $i = 1;
                                while (have_rows('model_body')) { the_row();
                                    $model_body_name = get_sub_field('model_body_name');
                                    $model_body_stripped = make_lower_case($model_body_name);
                                ?>
                                <li <?php if($i ==1){ echo 'class="active"'; } ?>><a class="body-<?php echo $model_body_stripped; ?>" href="#"><?php echo $model_body_name; ?></a></li>

                                <?php $i++; } ?>

                            </ul>


                            <?php
                            while (have_rows('model_body')) { the_row();
                                $model_body_name = get_sub_field('model_body_name');
                                $model_body_stripped = make_lower_case($model_body_name);
                                $image = get_sub_field('model_image');
                            ?>
                            <div class="model body-<?php echo $model_body_stripped; ?>" style="background: #fff url(<?php echo $image['url'] ?>) no-repeat bottom right;">
                                <span class="model-description"><?php echo get_sub_field('model_description'); ?></span>
                                <div class="model-links">
                                    <ul>
                                        <?php if (get_sub_field('model_shortlinks-experience')): ?>
                                        <li><a class="shortlink"
                                               href="<?php echo get_sub_field('model_shortlinks-experience'); ?>"
                                               target="_blank">
                                            <i class="fa fa-fw fa-bullseye"></i>Upplev <?php echo the_title(); ?>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('model_shortlinks-data')): ?>
                                        <li><a class="shortlink"
                                               href="<?php echo get_sub_field('model_shortlinks-data'); ?>"
                                               target="_blank">
                                            <i class="fa fa-fw fa-file"></i>Tekniska data</a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('model_shortlinks-brochure')): ?>
                                        <li><a class="shortlink"
                                               href="<?php echo get_sub_field('model_shortlinks-brochure'); ?>"
                                               target="_blank">
                                            <i class="fa fa-fw fa-book"></i>Broschyr</a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('model_shortlinks-configurator')): ?>
                                        <li><a class="shortlink"
                                               href="<?php echo get_sub_field('model_shortlinks-configurator'); ?>"
                                               target="_blank">
                                            <i class="fa fa-fw fa-cogs"></i>Bygg
                                            din <?php echo get_the_title(); ?></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (get_field('model_shortlinks-find')): ?>
                                        <?php

                                         $model_assortment_object = get_sub_field('model_assortment-object');
                                         $model_critiera = get_sub_field('assortment_string', $model_assortment_object->ID);

                                        ?>
                                        <li><a class="shortlink"
                                               href="<?php echo get_local_url(get_field('model_shortlinks-find')); ?>?criteriastring=<?php echo $model_critiera; ?>"
                                               target="_self">
                                            <i class="fa fa-fw fa-search"></i>Hitta
                                            begagnad <?php echo get_the_title() . ' ' . $model_body_name; ?></a>
                                        </li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            </div>


                            <?php } ?>
                        </div>
                    </div>
                </a>
            </li>
        <?php endif; endwhile;
        restore_blog();
        ?>
        </ul>
        </section>
        <?php } ?>
    </div>
</div>
</main>
<footer>
    <div class="container-fluid no-padding no-child-padding">

        <section id="af-contact">
            <div class="col-xs-12 col-sm-2">
                <?php
                get_af_logotype();
                ?>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="af-about">
                    <h4>Om <?php get_af_name(); ?></h4>

                    <p><?php get_af_about(); ?></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <?php

                $args = array(
                    'post_type' => 'facility',
                    'order' => 'ASC',
                );
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    $postid = get_the_ID();
                    ?>
                    <div class="col-xs-12 col-sm-4">
                        <span class="af-facility">
                            <h4><?php the_title(); ?></h4>
                            <span class="address">
                                <i class="fa fa-fw fa-map-marker"></i> <?php get_facilitiy_contactinfo($postid, 'address'); ?>
                            </span>
                            <span class="telephone">
                                <i class="fa fa-fw fa-phone"></i> <?php get_facilitiy_contactinfo($postid, 'phonenr'); ?>
                            </span>
                            <span class="contact">
                                <i class="fa fa-fw fa-envelope"></i> <?php get_facilitiy_contactinfo($postid, 'email'); ?>
                            </span>
                        </span>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
            <div class="col-xs-12 col-sm-2">
                <?php
                if (get_field('af-social-media', 'options')) {
                    $header = get_field("af-social-media-header", "options");

                    echo "<h4>{$header}</h4>";

                    while (have_rows('af-social-media', 'options')) {
                        the_row(); ?>
                        <span class="<?php echo str_replace("fa-", "", get_sub_field('af-social-media-type')); ?>"><a
                                href="<?php the_sub_field('af-social-media-url'); ?>" target="_blank">
                                <i class="fa fa-fw <?php the_sub_field('af-social-media-type'); ?>"></i> <?php the_sub_field('af-social-media-text'); ?>
                            </a></span>
                    <?php
                    }
                }
                ?>

            </div>
        </section>
    </div>
    <div class="container-fluid no-padding no-child-padding">

        <section id="mb-contact">
            <div class="col-xs-12 col-sm-2">
                <a href="#" title="Mercedes-Benz">
                    <?php switch_to_master(); ?>
                    <?php $mb_logotype = get_field('settings_logotype', 'options'); ?>
                    <?php restore_blog(); ?>
                    <img src="<?php echo $mb_logotype['url']; ?>" class="mb-logotype-n" alt="Mercedes-Benz"
                         title="Mercedes-Benz">
                </a>
            </div>
            <div class="col-xs-12 col-sm-5">
                <div class="mb-news">
                    <h4>Nyheter</h4>
                    <?php
                    switch_to_master();
                    if (get_field('settings_footer-news', 'options')) {
                        while (have_rows('settings_footer-news', 'options')) {
                            the_row(); ?>
                            <span class="news-link">
                                <a href="<?php echo get_sub_field('settings_footer-news-link'); ?>"
                                   target="_blank"><i
                                        class="fa fa-fw fa-angle-right"></i> <?php echo get_sub_field('settings_footer-news-title'); ?>
                                </a>
                            </span>
                        <?php
                        }
                    }
                    restore_blog();
                    ?>
                    <span class="news-link"><a
                            href="http://www.mercedes-benz.se/content/sweden/mpc/mpc_sweden_website/sv/home_mpc/passengercars/home/world/news_and_events.html#_int_passengercars:home:core-navi:news_and_events"
                            target="_blank">
                            Läs fler nyheter <i class="fa fa-fw fa-angle-right"></i>
                        </a></span>

                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="col-xs-6 mb-links">
                    <h4>Snabblänkar</h4>
                    <?php
                    switch_to_master();
                    if (get_field('settings_footer-links', 'options')) {
                        while (have_rows('settings_footer-links', 'options')) {
                            the_row(); ?>
                            <span class="link">
                                <a href="<?php if (get_sub_field('settings_footer-link-type') == 'internal') {
                                    echo get_local_url(get_sub_field('settings_footer-link-page'));
                                } else {
                                    echo get_sub_field('settings_footer-link-url');
                                } ?>"
                                   target="<?php echo get_sub_field('settings_footer-link-target'); ?>"><?php echo get_sub_field('settings_footer-link-title'); ?></a>
                            </span>
                        <?php
                        }
                    }
                    restore_blog();
                    ?>
                </div>
                <div class="col-xs-6 mb-links">
                    <h4>Om Webbplatsen</h4>
                    <?php
                    switch_to_master();
                    if (get_field('settings_about-links', 'options')) {
                        while (have_rows('settings_about-links', 'options')) {
                            the_row(); ?>
                            <span class="link">
                                <a href="<?php if (get_sub_field('settings_footer-about-link-type') == 'internal') {
                                    echo get_local_url(get_sub_field('settings_footer-about-link-page'));
                                } else {
                                    echo get_sub_field('settings_footer-about-link-url');
                                } ?>"
                                   target="<?php echo get_sub_field('settings_footer-about-link-target'); ?>"><?php echo get_sub_field('settings_footer-about-link-title'); ?></a>
                            </span>

                        <?php
                        }
                    }
                    restore_blog();
                    ?>
                </div>

            </div>
            <div class="col-xs-12 col-sm-2">
                <div class="mb-links">
                    <h4>Mercedes-Benz.se</h4>
                    <?php
                    switch_to_master();
                    if (get_field('settings_mbse-links', 'options')) {
                        while (have_rows('settings_mbse-links', 'options')) {
                            the_row(); ?>
                            <span class="link">
                                <a href="<?php echo get_sub_field('settings_mbse-link-url'); ?>" target="_blank"><?php echo get_sub_field('settings_mbse-link-title'); ?></a>
                            </span>
                        <?php
                        }
                    }
                    restore_blog();
                    ?>
                </div>
            </div>
        </section>
        <span class="created-by">
            Producerad av <a href="http://www.bytbil.com">BytBil.com</a> i <a href="http://www.bytbil.com">BytBil
                CMS</a> för <a href="http://www.mercedes-benz.se">Mercedes-Benz</a> och <a href="#">Landrins
                Bil</a>.
        </span>
    </div>
</footer>
</div>


<!--<script src="<?php bloginfo('template_url'); ?>/js/bootstrap-select.min.js"></script>-->

<script src="<?php bloginfo('template_url'); ?>/js/mb-slider.js"></script>
<script>

    $(window).load(function () {
        $('.nav-tabs a').each(function () {
            var $this = $(this);
            $this.click(function (e) {
                e.preventDefault();
                $this.tab('show');
                $($this.attr('href')).find('.flexslider').data('flexslider').resize();
            });
        });

        /*$('.model-bodys .model-body-list li a').click(function(e){
            e.preventDefault();
            $('.model-bodys .model-body-list li').removeClass('active');
            $(this).parent().addClass('active');
            var bodytype = $(this).attr('class');
            $('.model-bodys .model').each(function(){
                if($(this).hasClass(bodytype)){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });
        });*/

        $('.model-bodys .model-body-list li a').click(function(e){

            e.preventDefault();

            var bodyList = $(this).parent().parent();
            var bodyContainer = $(bodyList).parent();

            $(bodyList).find('li').removeClass('active');

            $(this).parent().addClass('active');
            var bodyType = $(this).attr('class');

            $(bodyContainer).find('.model').each(function(){
                if($(this).hasClass(bodyType)){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });

        });

        $('#assortment-tabs').tabCollapse();

        $('#assortments .flexslider').flexslider({
            animation: "slide",				//String: Select your animation type, "fade" or "slide"
            slideDirection: "horizontal",	//String: Select the sliding direction, "horizontal" or "vertical"
            slideshow: true,				//Boolean: Animate slider automatically
            slideshowSpeed: 7000,			//Integer: Set the speed of the slideshow cycling, in milliseconds
            animationDuration: 600,			//Integer: Set the speed of animations, in milliseconds
            directionNav: true,				//Boolean: Create navigation for previous/next navigation? (true/false)
            smoothHeight: false,
            animationLoop: false,			//Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
            pauseOnAction: true,			//Boolean: Pause the slideshow when interacting with control elements, highly recommended.
            pauseOnHover: true,			//Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
            useCSS: true,
            touch: true,
        });

        //$('.selectpicker').selectpicker();
    });

</script>

<?php wp_footer(); ?>


</body>
</html>
