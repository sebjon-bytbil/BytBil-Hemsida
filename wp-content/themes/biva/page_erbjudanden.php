<?php


/*
Template Name: Biva Erbjudanden
*/


get_header();

$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);

$brands = $_GET["brands"];
$city = $_GET["city"];
$cityBig = '';
$brandsBig = '';

switch ($city) {
    case "orebro":
        $cityBig = 'Örebro';
        break;
    case "borlange":
        $cityBig = 'Borlänge';
        break;
    case "linkoping":
        $cityBig = 'Linköping';
        break;
    case "karlskoga":
        $cityBig = 'Karlskoga';
        break;
    case "falun":
        $cityBig = 'Falun';
        break;
    case "norrkoping":
        $cityBig = 'Norrköping';
        break;
    case "uppsala":
        $cityBig = 'Uppsala';
        break;
}

switch ($brands) {
    case "kia":
        $brandsBig = 'Kia';
        break;
    case "opel":
        $brandsBig = 'Opel';
        break;
    case "alfa-romeo":
        $brandsBig = 'Alfa Romeo';
        break;
    case "bmw":
        $brandsBig = 'BMW';
        break;
    case "chevrolet":
        $brandsBig = 'Chevrolet';
        break;
    case "jeep":
        $brandsBig = 'Jeep';
        break;
    case "lancia":
        $brandsBig = 'Lancia';
        break;
    case "mitsubishi":
        $brandsBig = 'Mitsubishi';
        break;
    case "nissan":
        $brandsBig = 'Nissan';
        break;
    case "subaru":
        $brandsBig = 'Subaru';
        break;
    case "saab":
        $brandsBig = 'SAAB';
        break;
}


$slug = sanitize_title(get_the_title(), $fallback_title);

if ($slug == 'personbilar') {
    $type = 'car';
} else if ($slug == 'ovriga-erbjudanden') {
    $type = 'other';
} else if ($slug == 'transportbilar') {
    $type = 'transport';
} else {
    $type = '';
}

?>

<?php bytbil_init_slideshows(); ?>

<div id="backdrop" <?php if (!empty($topImage)) {
    echo 'style="background-image: url(' ?><?php the_field('top-image'); ?><?php echo ')"';
} ?>>
    <h1><?php the_title(); ?></h1>
</div>

<div id="content">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            </div>
            <div class="hidden-xs col-sm-3 col-first menu-column">

                <?php
                $args = array(
                    'theme_location' => 'primary',
                    'start_in' => $ID_of_page,
                    'container-class' => 'main-nav',
                    'menu_class' => 'nav submenu',
                );

                wp_nav_menu($args);

                ?>

            </div>

            <div class="col-xs-12 col-sm-9 offers offer-select-header">
                <div class="row">

                    <div class="col-xs-6 col-sm-6 col-md-4 column">
                        <select class="offer-select city" name="event-dropdown"
                                onchange='document.location.href=this.options[this.selectedIndex].value;'>
                            <option
                                value="?city=&brands=<?php echo $brands ?>"><?php echo 'Filtrera på ort (alla)'; ?></option>
                            <?php
                            $facilities = get_posts(
                                array(
                                    'post_type' => 'facility',
                                    'posts_per_page' => -1,
                                    'orderby' => 'title',
                                    'order' => 'ASC',
                                )
                            );

                            foreach ($facilities as $facility) {
                                $option = '<option value="?city=' . str_replace("biva-","",$facility->post_name) . '&brands=' . $brands . '">';
                                $option .= str_replace("Biva ", "", $facility->post_title);
                                $option .= '</option>';
                                echo $option;
                            }
                            ?>
                        </select>

                        <?php

                        if (!empty($brands) AND !empty($city)) { ?>
                            <script>
                                $("select.city option:contains('<?php echo $cityBig; ?>')").attr("selected", "selected");
                                $("select.brands option:contains('<?php echo $brandsBig; ?>')").attr("selected", "selected");
                            </script>

                        <?php }

                        else if (!empty($brands)) { ?>
                            <script>
                                $("select.brands option:contains('<?php echo $brandsBig; ?>')").attr("selected", "selected");
                            </script>

                        <?php }

                        else if (!empty($city)) { ?>
                            <script>
                                $("select.city option:contains('<?php echo $cityBig; ?>')").attr("selected", "selected");
                            </script>

                        <?php }

                        ?>

                    </div>

                    <?php if ($type == 'car' || $type == 'transport') { ?>

                        <div class="col-xs-6 col-sm-6 col-md-4 column">
                            <select class="offer-select brands" name="event-dropdown"
                                    onchange='document.location.href=this.options[this.selectedIndex].value;'>
                                <option
                                    value="?brands=&city=<?php echo $city ?>"><?php echo 'Filtrera på märke (alla)'; ?></option>
                                <?php

                                $brands_list = get_posts(
                                    array(
                                        'post_type' => 'brand',
                                        'posts_per_page' => -1,
                                        'orderby' => 'title',
                                        'order' => 'ASC',
                                    )
                                );

                                foreach ($brands_list as $brand_item) {

                                    if($brand_item->post_title != "Saab") {

                                        $option = '<option value="?brands=' . $brand_item->post_name . '&city=' . $city . '">';
                                        $option .= $brand_item->post_title;
                                        $option .= '</option>';
                                        echo $option;

                                    }
                                }
                                ?>
                            </select>
                        </div>

                    <?php } ?>

                </div>

                <div class="row">

                    <?php

                        function get_post_id($post_type, $post_name) {
                            $post_query = get_posts( array('post_type'=>$post_type,'s'=>$post_name));
                            return $post_query[0]->ID;
                        }

                        $brand_query = array(
                            'key' => 'offer-brands',
                            'value' => get_post_id('brand', $brandsBig),
                            'compare' => 'LIKE'
                        );
                        $city_query = array(
                            'key' => 'offer-facilities',
                            'value' => get_post_id('facility', $city),
                            'compare' => 'LIKE'
                        );

                        if (!empty($brands) AND !empty($city)) {
                            $specific_args = array(
                                'relation' => 'AND',
                                $brand_query,
                                $city_query,
                            );
                        }
                        else if (!empty($brands)) {
                            $specific_args = array(
                                'relation' => 'AND',
                                $brand_query,
                            );
                        }
                        else if (!empty($city)) {
                            $specific_args = array(
                                'relation' => 'AND',
                                $city_query,
                            );
                        }
                        else {
                            $specific_args = array(
                                'relation' => 'AND',
                            );
                        }

                        $args = array(
                            'post_type' => 'offer',
                            'posts_per_page' => -1,
                            'meta_key' => 'offer-type',
                            'meta_value' => $type,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'meta_query' => $specific_args
                        );

                        $offers = get_posts($args);

                        foreach($offers as $offer) {
                            $id = $offer->ID;
                            bytbil_show_offer($id, 4);
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('bottom-plugs.php'); ?>

<?php require_once('brands.php'); ?>

<?php get_footer(); ?>
