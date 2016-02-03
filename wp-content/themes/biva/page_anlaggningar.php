<?php

/*
Template Name: Anläggningar
*/

get_header();

$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);

?>

<?php bytbil_init_slideshows(); ?>

<?php $topImage = get_post_meta($post->ID, 'top-image', true); ?>
<div id="backdrop" <?php if (!empty($topImage)) {
    echo 'style="background-image: url(' ?><?php the_field('top-image'); ?><?php echo ')"';
} ?>>
</div>

<div id="content" class="anlaggningar">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            </div>
            <div class="hidden-xs col-sm-3 col-first orange-sub">

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
            <div class="col-xs-12 col-sm-9">

                <?php

                $args = array(
                    'post_type' => 'facility',
                    'orderby' => 'title',
                    'order' => 'ASC'
                );
                $loop = new WP_Query($args);

                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <?php
                    //$city = strtolower(get_field('anlaggning-city'));
                    $city = $post->post_name;
                    $vowels = array("Å", "Ä", "Ö", "å", "ä", "ö");
                    $change = array("a", "a", "o", "a", "a", "o");
                    $cityhref = str_replace($vowels, $change, $city);
                    $postbox = get_post_field('anlaggning-postbox');
                    $location_data = get_field('facility-visiting-address');

                    $emails = get_field('facility-emails');
                    $emails_list = "";
                    foreach($emails as $email) {
                        $emails_list .= "<a href=\"" . $email['facility-email-address'] . "\">" . $email['facility-email-address'] . "</a><br>";
                    }

                    $phonenumbers = get_field('facility-phonenumbers');
                    $phonenumbers_list = "";
                    foreach($phonenumbers as $phonenumber) {
                        $phonenumbers_list .= $phonenumber['facility-phonenumber-title'] . " <a href=\"tel:" . $phonenumber['facility-phonenumber-number'] . "\">" . $phonenumber['facility-phonenumber-number'] . "</a><br>";
                    }
                    ?>

                    <div class="container-fluid anlaggning">
                        <h3 class="underlined"><?php echo str_replace("Biva ", "", get_the_title()); ?><a href="https://www.facebook.com/<?php echo str_replace("-", "", $post->post_name); ?>" target="_blank" class="facebook-link">Facebook</a></h3>

                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <p><strong>Besöksadress:</strong><br/>
                                <?php the_title(); ?><br/>
                                <?php echo str_replace("Sverige", "", str_replace(", ","<br>", $location_data['address'])); ?>

                                <?php the_field('anlaggning-postnr') ?> <?php the_field('anlaggning-city'); ?></p>
                        </div>

                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <p class="minmargin"><strong>Öppettider:</strong><br/>

                            <span class="facility_openhours">
                                <?php
                                while (has_sub_fields('facility-departments')) :

                                    $department_name = get_sub_field('facility-department');

                                    if($department_name == "Bilförsäljning") {
                                        echo $department_name . ":<br>";
                                        while (has_sub_fields('facility-department-openhours')) : ?>
                                            <span class="facility-department-openhours-day"><?php the_sub_field('facility-department-openhours-day'); ?></span>
                                            <span class="facility-department-openhours-time"><?php the_sub_field('facility-department-openhours-time'); ?></span>
                                            <br>
                                            <?php
                                        endwhile;
                                    }
                                endwhile;
                                ?>
                            </span>

                            </p>
                        </div>

                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <p><strong>Kontakta oss:</strong><br>
                                <?php echo $phonenumbers_list ?>
                            </p>
                        </div>

                        <div style="clear: both;"></div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <a class="button" style="position: relative; top: 0; width: auto;" href="/vara-anlaggningar/<?php echo $cityhref; ?>">Mer information <i class="fa fa-angle-right"></i></a>

                            <a class="button pull-right" style="position: relative; top: 0; width: auto;" href="/vara-anlaggningar/<?php echo $cityhref; ?>">Anläggningssida <i class="fa fa-angle-right"></i></a>
                        </div>

                        <br><br><br>

                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once('bottom-plugs.php'); ?>

<?php require_once('brands.php'); ?>

<?php get_footer(); ?>
