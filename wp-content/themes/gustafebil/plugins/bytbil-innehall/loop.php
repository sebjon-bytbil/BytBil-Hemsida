<?php if (get_field('contents')) : while (have_rows('contents')) : the_row();

    $size = get_sub_field('content-size');
    $type = get_sub_field('content-type');
    $title = get_sub_field('content-title');
    $hideForMobile = get_sub_field('setting-hide-for-mobile');
    /*if(get_sub_field('content-slideshow')) {
        $slideshow = get_sub_field('content-slideshow');
    }*/
    if (get_sub_field('content-slideshow-2')) {
        $slideshow_2 = get_sub_field('content-slideshow-2');
    }
    if (get_sub_field('content-facility-choice')) {
        $facility = get_sub_field('content-facility-choice');
    }

    $block_wrapper = 'block';

    if (get_sub_field('block-hide-container')) {
        $block_wrapper = 'block-no-wrapper';
    } else {
        $block_wrapper = 'block-wrapper';
    }


    ?>
    <div class="col-xs-12 col-sm-<?php echo $size . ' ' . $type; ?> <?php $hideForMobile ? print('hidden-xs') : ''; ?>">
        <div class="<?php echo $block_wrapper; ?>">

            <?php if (get_sub_field('setting-hide-header') != true) { ?>
                <h2><?php echo $title; ?></h2>
            <?php }

            if ($type == 'wysiwyg') {
                the_sub_field('content-wysiwyg');
            }/* elseif($type=='slideshow') {
        if (function_exists("bytbil_show_slideshow")) {
            require "blocks/slideshow.php";
        }
    }*/ elseif ($type == 'bildspel') {
                if (function_exists("bb_show_slideshow")) {
                    require "blocks/slideshow-2.php";
                }
            } elseif ($type == 'facility') {
                if (function_exists("bytbil_show_facility_all")) {
                    require "blocks/facility.php";
                }
            } elseif ($type == 'assortment') {
                if (function_exists("bytbil_show_assortment")) {
                    require "blocks/assortment.php";
                }
            } elseif ($type == 'plugs') {
                if (function_exists("bytbil_show_plug")) {
                    require "blocks/plugs.php";
                }
            } elseif ($type == 'employees') {
                if (function_exists("bytbil_show_employee")) {
                    require "blocks/employees.php";
                }
            } elseif ($type == 'brands') {
                $brand_type = get_sub_field('content_brands_type');
                $brands = get_sub_field('content_brands');

                if($brand_type == 'logotypes'){
                    if (function_exists("bytbil_show_brand")) {
                        ?>
                        <div style="text-align: center;">
                            <?php
                            foreach ($brands as $brand) {
                                bytbil_show_brand($brand->ID);
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
                elseif($brand_type == 'brand-plugs'){
                    if (function_exists("bytbil_show_brand_plugs")) {
                        foreach($brands as $brand){
                            bytbil_show_brand_plugs($brand->ID);
                        }
                    }
                }
                elseif($brand_type == 'facilities'){
                }
            } elseif ($type == 'offers') {
                if (function_exists("bytbil_show_offer")) {
                    require "blocks/offers.php";
                }
            } elseif ($type == 'socialmedia') {
                require "blocks/socialmedia.php";
            } elseif ($type == 'contactform') {
                the_sub_field('content-contact-form');
            } elseif ($type == 'map') {
                if (function_exists("bytbil_show_map")) {
                    require "blocks/map.php";
                }
            } elseif ($type == 'news') {
                if (function_exists("bytbil_show_news_feed")) {
                    require "blocks/news.php";
                }
            } elseif ($type == 'html') {
                the_sub_field('content-html-code');
            } else if ($type == "department") {
                require "blocks/department.php";
            }
            ?>
        </div>
    </div>

<?php endwhile; endif;
if ($init_map == true) {
    $mapzoom = $mapzoom ? intval($mapzoom, 10) : 16;
    $mapmode = $mapmode ? "SATELLITE" : "ROADMAP";
    if (function_exists("bytbil_init_facility_map")) {
        bytbil_init_facility_map($mapzoom, $mapmode);
    }
} ?>
