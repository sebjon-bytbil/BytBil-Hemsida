<?php

/*
Template Name: Personal
*/

get_header();

$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
$avdelning = $_GET["avdelning"];
$city = $_GET["city"];
$avdBig = '';
$cityBig = '';

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

switch ($avdelning) {
    case "servicecenter":
        $avdelningBig = 'Service';
        break;
    case "bilforsaljning":
        $avdelningBig = 'Bilförsäljning';
        break;
    case "platschef":
        $avdelningBig = 'Platschef';
        break;
    case "verkstad":
        $avdelningBig = 'Verkstad';
        break;

}

?>

<?php bytbil_init_slideshows(); ?>

<?php $topImage = get_post_meta($post->ID, 'top-image', true); ?>
<div id="backdrop" <?php if (!empty($topImage)) {
    echo 'style="background-image: url(' ?><?php the_field('top-image'); ?><?php echo ')"';
} ?>>
    <h1><?php the_title(); ?></h1>
</div>

<div id="content" class="anlaggningar">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            </div>
            <!--<div class="hidden-xs col-sm-3 col-first orange-sub menu-column">

                <?php
                $args = array(
                    'theme_location' => 'primary',
                    'start_in' => $ID_of_page,
                    'container-class' => 'main-nav',
                    'menu_class' => 'nav submenu',
                );

                wp_nav_menu($args);
                ?>


            </div>-->
            <div class="col-xs-12 col-sm-12">

                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-3">

                        <select class="offer-select city" name="event-dropdown"
                                onchange='document.location.href=this.options[this.selectedIndex].value;'>
                            <option
                                value="?city=&brands=<?php echo $brands ?>"><?php echo 'Filtrera på ort (alla)'; ?></option>
                            <?php
                            $facilities = get_posts(array('post_type'=>'facility', 'posts_per_page'=>-1));

                            foreach ($facilities as $facility) {
                                $option = '<option value="?city=' . str_replace("biva-","",$facility->post_name) . '&avdelning=' . $avdelning . '">';
                                $option .= $facility->post_title;
                                $option .= '</option>';
                                echo $option;
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">

                        <select class="offer-select avdelning" name="event-dropdown"
                                onchange='document.location.href=this.options[this.selectedIndex].value;'>
                            <option
                                value="?city=&brands=<?php echo $brands ?>"><?php echo 'Avdelning (Alla)'; ?></option>
                            <?php
                            $departments = get_posts(array('post_type'=>'department', 'posts_per_page'=>-1));

                            foreach ($departments as $department) {
                                $option = '<option value="?avdelning=' . $department->post_name . '&city=' . $city . '">';
                                $option .= $department->post_title;
                                $option .= '</option>';
                                echo $option;
                            }
                            ?>
                        </select>

                    </div>

                </div>


                    <?php

                    if (!empty($avdelning) AND !empty($city)) { ?>

                        <script>
                            $("select.city option:contains('<?php echo $cityBig ?>')").attr("selected", "selected");
                            $("select.avdelning option:contains('<?php echo $avdelningBig ?>')").attr("selected", "selected");
                        </script>

                    <?php }

                    else if (!empty($avdelning)) { ?>
                        <script>
                            $("select.avdelning option:contains('<?php echo $avdelningBig ?>')").attr("selected", "selected");
                        </script>

                    <?php }

                    else if (!empty($city)) { ?>
                        <script>
                            $("select.city option:contains('<?php echo $cityBig; ?>')").attr("selected", "selected");
                        </script>

                    <?php }

                    ?>

                <div class="employees">
                    <div class="row">

                    <?php
                        function get_post_id($post_type, $post_name) {
                            $post_query = get_posts( array('post_type'=>$post_type,'s'=>$post_name));
                            return $post_query[0]->ID;
                        }

                        $department_query = array(
                            'key' => 'employee-department',
                            'value' => get_post_id('department', $avdelning),
                            'compare' => 'LIKE'
                        );
                        $city_query = array(
                            'key' => 'employee-facility',
                            'value' => get_post_id('facility', $city),
                            'compare' => 'LIKE'
                        );

                        if (!empty($avdelning) AND !empty($city)) {
                            $specific_args = array(
                                'relation' => 'AND',
                                $department_query,
                                $city_query,
                            );
                        }
                        else if (!empty($avdelning)) {
                            $specific_args = array(
                                'relation' => 'AND',
                                $department_query,
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
                            'post_type' => 'employee',
                            'posts_per_page' => -1,
                            'meta_key' => 'priority',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => $specific_args
                        );

                        $employees = get_posts($args);

                        foreach($employees as $employee) {
                            $id = $employee->ID;
                            bytbil_show_employee($id, 3);
                        }
                    ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<?php require_once('bottom-plugs.php'); ?>

<?php require_once('brands.php'); ?>

<?php get_footer(); ?>
