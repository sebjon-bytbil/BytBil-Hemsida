<?php
/*
Template Name: Startsida
*/
$latest_assortment = get_field('af-car-tab-latest', 'options');
$starclass_assortment = get_field('af-car-tab-star-class', 'options');
$search_assortment = get_field('af-car-tab-search', 'options');

$path = bytbil_get_path_assortment($latest_assortment->ID);

$uri = $_SERVER['REQUEST_URI'];
$url = $path . $uri;

if ($_GET["objekt"]) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location:" . $url);
}


get_header();
$templateDir = get_bloginfo('template_url');

?>

<main>
    <div class="container-fluid no-padding no-child-padding">
        <section id="slideshows">
            <div class="col-xs-12 col-sm-9">
                <div id="mb-slideshow" class="flexslider">
                    <ul class="slides">

                        <?php
                        $mb_slides_args = array(
                            'post_type' => 'mb_slideshow',
                            'meta_query' => array(
                                array(
                                    "key" => "mcc_copied",
                                    "compare" => "==",
                                    "value" => 1
                                )
                            )
                        );
                        $mb_slides = get_posts($mb_slides_args);

                        foreach ($mb_slides as $slide) {
                            $date_control = get_field("mb-slideshow_datecontrol", $slide->ID);
                            $show = true;

                            if ($date_control) {
                                $startDate = strtotime(get_field("mb-slideshow_date-start", $slide->ID));
                                $endDate = strtotime(get_field("mb-slideshow_date-end", $slide->ID));
                                $now = time();

                                if ($startDate > $now || $endDate < $now) {
                                    $show = false;
                                }
                            }
                            if ($show && !get_field("hide", $slide->ID)) {
                                get_mb_slide($slide->ID);
                            }
                        }

                        $mb_slides_local_args = array(
                            'post_type' => 'mb_slideshow',
                            'meta_query' => array(
                                array(
                                    "key" => "mcc_copied",
                                    "compare" => "NOT EXISTS",
                                    "value" => 1
                                )
                            )
                        );
                        $mb_slides_local = get_posts($mb_slides_local_args);

                        foreach ($mb_slides_local as $slide) {
                            $date_control = get_field("mb-slideshow_datecontrol", $slide->ID);
                            $show = true;

                            if ($date_control) {
                                $startDate = strtotime(get_field("mb-slideshow_date-start", $slide->ID));
                                $endDate = strtotime(get_field("mb-slideshow_date-end", $slide->ID));
                                $now = time();

                                if ($startDate > $now || $endDate < $now) {
                                    $show = false;
                                }
                            }
                            if ($show && !get_field("hide", $slide->ID)) {
                                get_mb_slide($slide->ID);
                            }
                        }

                        if ($mb_slides) {
                            init_mb_slider();
                        } else {
                            init_mb_slider();
                        }
                        ?>

                    </ul>

                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div id="af-slideshow" class="flexslider">
                    <ul class="slides">
                        <?php
                        $slideshow = get_field('af-slideshow', 'options');
                        get_af_slideshow($slideshow->ID);
                        ?>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <div class="container-fluid no-padding no-child-padding">
        <?php
        $master_shortlinks_front = get_master_field('ga-frontpage-shortlinks', 'options');
        $child_shortlinks_front = get_field("af-frontpage-shortlinks", "options");
        ?>

        <section id="shortlinks">

            <?php
            if ($master_shortlinks_front) {
                foreach ($master_shortlinks_front as $shortlink) {
                    $lpid = maybe_get_local_id($shortlink->ID);

                    if (!get_field("hide", $lpid)) {
                        switch_to_master();
                        get_shortlink($shortlink->ID);
                        restore_blog();
                    }
                }
            }
            if ($child_shortlinks_front) {
                foreach ($child_shortlinks_front as $childlink) {
                    get_shortlink($childlink->ID);
                }
            }
            ?>

        </section>
    </div>
    <div id="assortments-af-links" class="container-fluid no-padding no-child-padding">
        <div class="col-xs-12 col-sm-9">
            <section id="assortments">
                <ul class="nav nav-tabs" id="assortment-tabs" role="tablist">
                    <li class="active">
                        <a href="#latest-mb" role="tab" data-toggle="tab">
                            <img src="<?php bloginfo('template_url'); ?>/images/mb-icon.svg" class="mb-icon"/> <span
                                class="text">Senaste Mercedes-Benz</span>
                        </a>
                    </li>
                    <li>
                        <a href="#monthly-starclass" role="tab" data-toggle="tab">
                            <i class="fa fa-fw fa-star"></i><span class="text">Månadens StarClass</span>
                        </a>
                    </li>
                    <li>
                        <a href="#search-mb" role="tab" data-toggle="tab">
                            <i class="fa fa-fw fa-search"></i><span class="text">Sök Mercedes-Benz</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="latest-mb">
                        <h2>Senaste Mercedes-Benz på lager.</h2>

                        <p>Bläddra bland alla våra senaste Mercedes-Benz på lager <a href="#">eller visa alla
                                lagerbilar</a>.
                            <?php
                            bytbil_show_assortment_front($latest_assortment->ID);
                            ?>
                    </div>
                    <div class="tab-pane" id="monthly-starclass">

                        <h2>Månadens StarClass.</h2>

                        <p>Bläddra bland månadens StarClass <a href="#">eller visa alla StarClass</a>.
                            <?php
                            bytbil_show_assortment_front($starclass_assortment->ID);
                            ?>

                    </div>
                    <div class="tab-pane" id="search-mb">
                        <?php
                        bytbil_show_assortment_front($search_assortment->ID);
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xs-12 col-sm-3">
            <?php
            get_af_menu();
            ?>
        </div>
    </div>


<?php get_footer(); ?>