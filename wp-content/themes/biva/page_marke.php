<?php

/*
Template Name: Biva Märkessida
*/


get_header();

$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
$brandChoice = get_field('marke');
$brandterm = get_term($brandChoice, 'brands');
$brandslug = $brandterm->slug;

?>
<div id="backdrop" <?php
if (!empty($topImage)) {
    echo 'style="background-image: url(' ?><?php the_field('top-image'); ?><?php echo ')"';
}
?>>
    <div class="wrapper">
        <div class="slider">
            <?php $slideshow = get_field('bildspel'); bytbil_init_slideshows(); bytbil_show_slideshow($slideshow->ID); ?>
        </div>
    </div>
</div>

<div id="content">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            </div>
            <!--<div class="hidden-xs col-sm-3 col-first menu-column">

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
                    <div class="col-xs-12 col-sm-6">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="container-fluid no-padding no-margin">

                                <h3>Vi är auktoriserade <?php the_title(); ?>-handlare</h3>

                                <?php the_content(); ?>
                            </div>
                        <?php endwhile; endif; ?>

                    </div>

                    <div class="col-xs-12 col-sm-4">
                        <h3>Var finns <?php the_title(); ?>?</h3>

                        <?php

                        $brands = get_field('brands');

                        $args = array(
                            'order'            => 'ASC',
                            'post_type'        => 'facility',
                            'posts_per_page'   => -1
                        );
                        $facilities = get_posts( $args );

                        foreach($facilities as $facility) {

                            $id = $facility->ID;
                            $facility_name = get_the_title($id);
                            $facility_brands = get_field('brands', $id);
                            $brand_ids = get_post_meta(get_the_ID(), 'brands');

                            $facility_link = get_permalink($id);
                            $facility_link = str_replace("facility", "vara-anlaggningar", $facility_link);

                            foreach ($facility_brands as $facility_brand) {
                                if ($facility_brand->post_title == $brands[0]->post_title) {
                                    echo '<a href="' . $facility_link . '" style="color: #f85523; text-transform: uppercase; display: block; width: 33%; float: left; font-weight: bold; margin: 0 0 10px 0;">' . str_replace("Biva ","",$facility_name) . '</a>';
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="col-xs-12 col-sm-2">
                        <?php
                        if ($brands) { ?>
                            <div class="brands" style="float: right;">
                                <?php
                                foreach ($brands as $brand) {
                                    $id = $brand->ID; ?>
                                    <a target="<?php echo get_field('brand_link-target', $id); ?>"
                                       href="<?php echo get_field('brand_link', $id); ?>"><img
                                            src="<?php echo get_field('brand_image', $id); ?>"
                                            alt="<?php echo 'Besök ' . $brand->post_title . ' på: ' . get_field('brand_link', $id); ?>"
                                            title="<?php echo 'Besök ' . $brand->post_title . ' på: ' . get_field('brand_link', $id); ?>" class="pull-right" style="width: 90px;"></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- KAMPANJER -->
                <div style="margin-bottom: 20px;">

                    <div class="expandable opened" data-expand="offers"><h3>Kampanjer</h3></div>
                    <div class="group offers" style="display: block;">

                        <div class="row">

                            <?php

                            function get_post_id($post_type, $post_name) {
                                $post_query = get_posts( array('post_type'=>$post_type,'s'=>$post_name));
                                return $post_query[0]->ID;
                            }

                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                            $brand_query = array(
                                'key' => 'offer-brands',
                                'value' => get_post_id('brand',$brands[0]->post_title),
                                'compare' => 'LIKE'
                            );

                            $specific_args = array(
                                'relation' => 'AND',
                                $brand_query,
                            );

                            $args = array(
                                'post_type' => 'offer',
                                'posts_per_page' => 8,
                                'paged' => $paged,
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'meta_query' => $specific_args
                            );

                            $offers = new WP_Query( $args );

                            if ( $offers->have_posts() ) :
                                while ( $offers->have_posts() ) : $offers->the_post();
                                    $id = $offer->ID;
                                    bytbil_show_offer($id, 3);
                                endwhile;
                                ?>
                                <div class="col-xs-12">
                                    <?php
                                    previous_posts_link( '&laquo; Föregående sida' );
                                    if(get_previous_posts_link()) { echo " &nbsp;|&nbsp; "; }
                                    next_posts_link( 'Nästa sida &raquo;', $offers->max_num_pages );
                                    ?>
                                </div>
                                <?php
                                wp_reset_postdata();
                            else :
                                echo '<div class="col-xs-12">Vi har inga aktuella kampanjer.</div>';
                            endif;
                            ?>
                        </div>

                    </div>

                </div>

                <!-- BILAR I LAGER -->
                <div class="expandable closed" data-expand="assortment"><h3><?php the_title(); ?>-bilar i lager</h3></div>
                <div class="group assortment">
                    <div class="container-fluid no-padding no-margin">
                        <?php bytbil_show_assortment(get_field('fordonsurval')->ID); ?>
                    </div>
                </div>

                <!-- TJÄNSTER -->
                <?php
                    $services_info = get_field("brand-services");
                    if($services_info != "") {
                ?>
                <div class="expandable opened" data-expand="services"><h3>Våra <?php the_title(); ?>-tjänster</h3></div>
                <div class="group services" style="display: block;">
                    <div class="container-fluid no-padding no-margin">
                        <?php echo get_field("brand-services"); ?>
                    </div>
                </div>
                <?php } ?>

                <a id="contact"></a>
                <!-- KONTAKTA -->
                <div class="expandable opened" data-expand="facilities"><h3><!--Kontakta våra auktoriserade-->Här säljer vi <?php the_title(); ?></h3></div>
                <div class="group facilities" style="display: block;">
                    <div class="container-fluid no-padding no-margin">

                        <?php $args = array(
                            'order'            => 'ASC',
                            'post_type'        => 'facility',
                            'posts_per_page'   => -1
                        );
                        $facilities = get_posts( $args );

                        foreach($facilities as $facility) {

                            $id = $facility->ID;
                            $facility_name = get_the_title($id);
                            $facility_brands = get_field('brands', $id);
                            $brand_ids = get_post_meta(get_the_ID(), 'brands');

                            $facility_link = get_permalink($id);
                            $facility_link = str_replace("facility", "vara-anlaggningar", $facility_link);

                            foreach ($facility_brands as $facility_brand) {
                                if ($facility_brand->post_title == $brands[0]->post_title) {
                                    $visiting_address = get_field('facility-visiting-address', $id);
                                    $visiting_address = str_replace('Sverige','',str_replace(',','<br/>',$visiting_address['address']));

                                    $post_address = get_field('facility-other-adress', $id);

                                    $phone_numbers = get_field('facility-phonenumbers', $id);
                                    ?>

                                    <div class="facility">
                                        <h3 style="margin-bottom: 5px;"><?php echo str_replace("Biva ", "", $facility_name); ?></h3>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3">
                                                <?php echo $visiting_address; ?><!--<br><br>

                                                <strong>Postadress:</strong><br>
                                                <?php echo $post_address; ?><br><br>-->
                                            </div>

                                            <div class="col-xs-12 col-sm-3">
                                                <?php bytbil_show_facility_phonenumbers($id); ?><br>
                                                <!--<?php bytbil_show_facility_emails($id); ?><br>-->
                                            </div>

                                            <div class="col-xs-12 col-sm-3">
                                                <?php bytbil_show_facility_openhours($id); ?>
                                            </div>

                                            <div class="col-xs-12 col-sm-3">
                                                <div class="linkbuttons">
                                                    <a class="button btn-block" href="/aga-bil/boka-service/">Boka service<i class="fa fa-angle-right"></i></a>
                                                    <a class="button btn-block" href="<?php echo $facility_link; ?>#contact">Kontakt<i class="fa fa-angle-right"></i></a>
                                                    <a class="button btn-block" href="<?php echo $facility_link; ?>">Anläggningssida<i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                        }
                        ?>

                    </div>
                </div>

                <script>
                    $(function() {
                        $("select[name='brand']").val("<?php the_title(); ?>");
                        $("select[name='brand']").trigger("change");
                    });
                </script>

            </div>

        </div>
    </div>
</div>

<?php require_once('bottom-plugs.php'); ?>

<?php require_once('brands.php'); ?>

<?php get_footer(); ?>
