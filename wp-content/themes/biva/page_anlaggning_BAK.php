<?php

/*
BAK_Template Name: Enskild anläggning
*/

get_header();

$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
$title = get_the_title();
$title = str_replace("Biva ", "", $title);
$city = strtolower($title);
$vowels = array("Å", "Ä", "Ö", "å", "ä", "ö");
$change = array("a", "a", "o", "a", "a", "o");
$city = str_replace($vowels, $change, $city);

$id = get_the_ID();

?>

    <div id="backdrop" <?php
    if (!empty($topImage)) {
        echo 'style="background-image: url(' ?><?php the_field('top-image'); ?><?php echo ')"';
    }
    ?>>
        <div class="wrapper">
            <div class="slider">
                <?php
                    $slideshow = get_field('bildspel');
                    bytbil_init_slideshows();
                    bytbil_show_slideshow($slideshow->ID);
                ?>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="col-xs-12">
                    <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                </div>

                <div class="col-xs-12 col-sm-12 anlaggning-page">

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="container-fluid">

                            <?php
                            $facility = get_field('facility');
                            $facility_id = $facility->ID;

                            $facility_location = str_replace("Biva i ", "", get_the_title());

                            $visiting_address = get_field('facility-visiting-address', $facility_id);
                            $visiting_address_raw = get_field('facility-visiting-address', $facility_id);
                            $visiting_address = str_replace('Sverige','',str_replace(',','<br/>',$visiting_address['address']));

                            $use_post_adress = get_field('facility-use-postal-adress', $facility_id);

                            $post_address = get_field('facility-other-adress', $facility_id);

                            $phone_numbers = get_field('facility-phonenumbers', $facility_id);
                            ?>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <h3>Välkommen till <?php the_title(); ?>!</h3>
                                    <?php the_content(); ?>

                                    Vi finns på <?php echo str_replace(', Sverige','',$visiting_address_raw['address']); ?><br>
                                    <?php bytbil_show_facility_phonenumbers($facility_id); ?><br>

                                    <a href="#contact">Se mer kontaktinformation och öppettider</a>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <h3>Våra bilmärken:</h3>
                                    <?php

                                    $brands = get_field('brands');

                                    if ($brands) { ?>
                                        <div class="brands">
                                            <div class="row">
                                                <?php

                                                if(count($brands) <= 5) {
                                                    $brand_width = 20;
                                                } else {
                                                    $brand_width = 100 / count($brands);
                                                }
                                                ?>

                                                <style type="text/css">
                                                    @media(min-width: 500px) {
                                                        .brands .col-sm-5cols {
                                                            width: <?php echo $brand_width; ?>%;
                                                        }
                                                    }
                                                </style>

                                                <?php
                                                foreach ($brands as $brand) {
                                                    $id = $brand->ID; ?>
                                                    <div class="col-xs-3 col-sm-5cols brand">
                                                        <a target="<?php echo get_field('brand_link-target', $id); ?>"
                                                           href="<?php echo get_field('brand_link', $id); ?>"><img
                                                                src="<?php echo get_field('brand_image', $id); ?>"
                                                                alt="<?php echo 'Besök ' . $brand->post_title . ' på: ' . get_field('brand_link', $id); ?>"
                                                                title="<?php echo 'Besök ' . $brand->post_title . ' på: ' . get_field('brand_link', $id); ?>"></a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <br>
                                    <strong>Även auktoriserad verkstad för:</strong><br>
                                    <span style="text-transform: uppercase;"><?php echo get_field('service-brands'); ?></span>
                                </div>

                                <!-- KAMPANJER -->
                                <div class="col-xs-12 col-sm-12">
                                    <div class="expandable opened" data-expand="offers"><h3>Kampanjer</h3></div>
                                    <div class="group offers" style="display: block;">
                                        <div class="row">
                                            <?php
                                            $offer_locations = get_field('offer-location');
                                            ?>

                                            <?php

                                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                            $city_query = array(
                                                'key' => 'offer-facilities',
                                                'value' => $offer_locations[0]->ID,
                                                'compare' => 'LIKE'
                                            );

                                            $specific_args = array(
                                                'relation' => 'AND',
                                                $city_query,
                                                array(
                                                    'key' => 'offer-type',
                                                    'value' => array('car', 'transport', 'other'),
                                                    'compare' => 'IN'
                                                ),
                                                // Expiration date
                                                /*array(
                                                    'relation' => 'OR',
                                                    array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'key' => 'offer-date-start',
                                                            'value' => date("Ymd"),
                                                            'compare' => '<='
                                                        ),
                                                        array(
                                                            'key' => 'offer-date-stop',
                                                            'value' => date("Ymd"),
                                                            'compare' => '>='
                                                        ),
                                                    ),
                                                    array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'key' => 'offer-date-start',
                                                            'value' => '',
                                                            'compare' => '='
                                                        ),
                                                        array(
                                                            'key' => 'offer-date-stop',
                                                            'value' => '',
                                                            'compare' => '='
                                                        ),
                                                    ),
                                                ),*/
                                            );

                                            $args = array(
                                                'post_type' => 'offer',
                                                'posts_per_page' => -1,
                                                'paged' => $paged,
                                                'order' => 'DESC',
                                                'orderby' => 'date',
                                                'meta_query' => $specific_args,
                                            );

                                            /*echo "<pre><button style='font-family: Antenna, sans-serif; font-size: 15px; padding: 6px 10px;'>Visa utskriven kod</button><div class='printed' style='display:none; padding-top:10px;'>";
                                            print_r($args);
                                            echo "</div></pre>";*/

                                            $offers = new WP_Query( $args );

                                            if ( $offers->have_posts() ) :

                                                echo "<div class='offers-slides group-slides'>";

                                                $i = 1;
                                                $groupcount = 0;

                                                while ( $offers->have_posts() ) : $offers->the_post();

                                                    $offer_id = $post->ID;

                                                    $start_date = get_field('offer-date-start', $offer_id);
                                                    $stop_date = get_field('offer-date-stop', $offer_id);

                                                    $show_offer = bytbil_check_offer_date($start_date, $stop_date);

                                                    if($i == 1 && $show_offer == true) {
                                                        $groupcount++;
                                                        echo "<div class='offers-slide group-slide'>";
                                                    }

                                                    if($show_offer == true) {

                                                        bytbil_show_offer($offer_id, 3);

                                                        if($i == 8 || $offers->current_post == ($offers->found_posts-1)) {
                                                            echo "</div>";
                                                            $i = 1;
                                                        } else {
                                                            $i++;
                                                        }

                                                    }

                                                endwhile;
                                                ?>

                                                    <?php if($groupcount > 1) { ?>

                                                    <div class="col-xs-12">
                                                        Sida:
                                                        <?php
                                                            for($i=0; $i < $groupcount; $i++) {
                                                                echo '<a href="#" class="group-switch" data-var="' . ($i+1) . '">' . ($i+1) . '</a>';
                                                                if($i < $groupcount-1) {
                                                                    echo " | ";
                                                                }
                                                            }
                                                        ?>
                                                    </div>

                                                    <?php } ?>

                                                </div>

                                                <script>
                                                    $(".group-switch").click(function() {
                                                        var which_slide = $(this).attr("data-var") - 1;
                                                        $(this).closest(".group-slides").find(".group-slide").hide();
                                                        $(this).closest(".group-slides").find(".group-slide:eq("+which_slide+")").fadeIn();
                                                    });
                                                </script>

                                                <!--<div class="col-xs-12">
                                                    <?php
                                                    previous_posts_link( '&laquo; Föregående sida' );
                                                    if(get_previous_posts_link()) { echo " &nbsp;|&nbsp; "; }
                                                    next_posts_link( 'Nästa sida &raquo;', $offers->max_num_pages );
                                                    ?>
                                                </div>-->
                                                <?php

                                            endif;
                                            wp_reset_postdata();
                                            wp_reset_query();
                                            ?>

                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $("pre button").click(function() {
                                       $(this).parent("pre").find(".printed").toggle();
                                    });
                                </script>

                                <!-- BOKA PROVKÖRNING -->
                                <div class="col-xs-12 col-sm-12">
                                    <div class="expandable opened" data-expand="testdrive"><h3>Boka provkörning</h3></div>
                                    <div class="group testdrive" style="display: block;">

                                        <div class="contact-form">
                                            <?php
                                            $testdrive_form = get_field('testdrive-form');
                                            if($testdrive_form) {
                                                echo do_shortcode('[contact-form-7 id="' . $testdrive_form->ID . '"]');
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>

                                <script>
                                    $(function() {
                                        $("select[name='location']")
                                            .val("<?php echo $facility_location; ?>")
                                            .trigger("change");
                                    });
                                </script>

                                <!-- BILAR I LAGER -->
                                <div class="col-xs-12 col-sm-12">
                                    <div class="expandable closed" data-expand="assortment"><h3>Bilar i lager i <?php echo $facility_location; ?></h3></div>
                                    <div class="group assortment">
                                        <?php bytbil_show_assortment(get_field('fordonsurval')->ID); ?>
                                    </div>
                                </div>

                                <!-- NYHETER & SOCIAL MEDIA -->
                                <?php $facebook_id = get_field('social-media-facebook-id'); ?>
                                <div class="col-xs-12 col-sm-12">
                                    <div class="expandable opened" data-expand="news_social"><h3>Nyheter & social media</h3></div>
                                    <div class="group news_social" style="display: block;">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <h3 style="border-bottom: 1px solid #e0e0e0; height: 54px;">
                                                    Följ oss&nbsp;&nbsp;&nbsp;
                                                    <a href="https://www.facebook.com/<?php echo $facebook_id; ?>" target="_blank"><span class="social-icon facebook"></span></a>&nbsp;&nbsp;&nbsp;
                                                    <!--<span class="social-icon instagram"></span>&nbsp;&nbsp;&nbsp;-->
                                                    <a href="https://www.youtube.com/user/BivaBilvaruhuset" target="_blank"><span class="social-icon youtube"></span></a>
                                                </h3>

                                                <div id="fb-root"></div>
                                                <script>(function(d, s, id) {
                                                        var js, fjs = d.getElementsByTagName(s)[0];
                                                        if (d.getElementById(id)) return;
                                                        js = d.createElement(s); js.id = id;
                                                        js.src = "//connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v2.3";
                                                        fjs.parentNode.insertBefore(js, fjs);
                                                    }(document, 'script', 'facebook-jssdk'));</script>
                                                <div style="width: 100%;">
                                                    <div class="fb-page" data-href="https://www.facebook.com/<?php echo $facebook_id; ?>" data-small-header="false" data-width="482" data-height="420" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/<?php echo $facebook_id; ?>"><a href="https://www.facebook.com/<?php echo $facebook_id; ?>">Facebook</a></blockquote></div></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <h3 style="border-bottom: 1px solid #e0e0e0; height: 54px; line-height: 40px;">Anmälan till nyhetsbrev</h3>

                                                I våra nyhetsbrev informerar vi om oss och våra tjänster och annat som är av vikt för dig som läsare.
                                                Fyll i dina uppgifter och få den senaste informationen direkt via din mail.<br><br>

                                                <!--<button class="btn btn-block action"><a href="#">Anmäl dig till vårat nyhetsbrev &nbsp;<i class="fa fa-external-link"></i></a></button>-->

                                                <script language="JavaScript">
                                                    <!--
                                                    function MailingListValidation(SubscriberForm){
                                                        var counter = 0;
                                                        for (i=1; i<=SubscriberForm.pf_CounterMailinglists.value; i++)
                                                        {
                                                            var checkBoxName = "pf_MailinglistName" + i;
                                                            if (document.getElementsByName(checkBoxName)[0].checked || document.getElementsByName(checkBoxName)[0].type == "hidden") counter++;
                                                        }
                                                        if (counter == 0)
                                                        {
                                                            alert("En eller flera e-postlistor krävs för detta formulär.");
                                                            return false; }
                                                    }//-->
                                                </script>
                                                <form name="SubscriberForm" class="contact-form" action="http://www.anpdm.com/public/process-subscription-form.aspx?formId=41415D4479424650477240" onSubmit="return MailingListValidation(this);" method="post">

                                                    Förnamn:<br/><input type="text" name="pf_Demographicfield5" value="" style="width: 100%;" /><br>

                                                    Efternamn:<br/><input type="text" name="pf_Demographicfield6" value="" style="width: 100%;" /><br>

                                                    Välj din anläggning:<br/><!--<input type="text" name="pf_Demographicfield2" value="" style="width: 100%;" /><br>-->
                                                    <select name="pf_Demographicfield2" style="width: 100%;">
                                                        <option value="" disabled="disabled" selected>Välj från listan</option>
                                                        <option value="Borlänge">Borlänge</option>
                                                        <option value="Falun">Falun</option>
                                                        <option value="Karlskoga">Karlskoga</option>
                                                        <option value="Linköping">Linköping</option>
                                                        <option value="Norrköping">Norrköping</option>
                                                        <option value="Uppsala">Uppsala</option>
                                                        <option value="Örebro">Örebro</option>
                                                    </select>

                                                    E-postadress:<br/><input type="text" name="pf_Email" value="" style="width: 100%;" /><br>

                                                    <select name="pf_DeliveryFormat" style = "display:none;" ><option value="HTML" selected >HTML</option><option value="Text"  >Text</option></select></td></tr><tr><td>
                                                    <input type="submit" name="Submit" value="Prenumerera" class="btn btn-block action" />

                                                    <!-- Ändra inte namn eller typ på Skicka-knappen. För att ändra den synliga texten, ändra istället texten för \ &quot;värde \&quot; -->
                                                    <input type="hidden" name="pf_FormType" value="OptInForm">
                                                    <input type="hidden" name="pf_OptInMethod" value="SingleOptInMethod">
                                                    <input type="hidden" name="pf_CounterDemogrFields" value="3">
                                                    <input type="hidden" name="pf_CounterMailinglists" value="1">
                                                    <input type="hidden" name="pf_AccountId" value="17122">
                                                    <input type="hidden" name="pf_ListById" value="1">
                                                    <input type="hidden" name="pf_Version" value="2">
                                                    <input type="hidden" name="pf_MailinglistName1" value="1134976">

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- PERSONAL -->
                                <div class="col-xs-12 col-sm-12">
                                    <div class="expandable closed" data-expand="employees"><h3>Vår personal i <?php echo $facility_location; ?></h3></div>
                                    <div class="group employees">
                                        <?php
                                        /*$employee_lists = get_field('personal');
                                        foreach ($employee_lists as $employee_list) {
                                            bytbil_show_employee_list($employee_list, 1, 3);
                                        }*/
                                        ?>

                                        <?php
                                            $args = array(
                                                'post_type'        => 'employee',
                                                'posts_per_page'   => -1,
                                                'meta_key'         => 'priority',
                                                'orderby'          => 'meta_value_num title',
                                                'order'            => 'ASC',
                                                'meta_query' => array(
                                                    'relation' => 'AND',
                                                    array(
                                                        'key' => 'employee-facility',
                                                        'value' => $facility_id,
                                                        'compare' => '='
                                                    )
                                                ),
                                            );
                                            $employees = get_posts( $args );

                                            foreach($employees as $employee) {

                                                $id = $employee->ID;
                                                $name = $employee->post_title;
                                                $image = get_field('employee-image', $id);
                                                if(empty($image['url'])) {
                                                    $image = get_template_directory_uri() . "/img/no-face.png";
                                                } else {
                                                    $image = $image['url'];
                                                }
                                                $facility = get_field('employee-facility', $id);
                                                $textarea = get_field('employee-textarea', $id);
                                                $hide_email = get_field('employee-email-replacement', $id);

                                            ?>

                                            <div class="col-xs-12 col-sm-3">
                                                <article class="personal-wrapper">
                                                    <img src="<?php echo $image; ?>"/>
                                                    <section>
                                                        <h4><?php echo $name; ?></h4>
                                                        <?php echo $facility->post_title; ?>
                                                        <span class="employee-title"><?php echo get_field('employee-jobtitle', $id); ?></span>
                                                    <span class="employee-contact">
                                                        <?php while (has_sub_fields('employee-phonenumbers', $id)) : ?>
                                                            <a href="tel:<?php echo get_sub_field('employee-phonenumber-number'); ?>"
                                                               class="employee-phonenumber">
                                                                <strong class="title"><?php echo get_sub_field('employee-phonenumber-title'); ?></strong>
                                                                <span class="number">
                                                                    <?php echo get_sub_field('employee-phonenumber-number'); ?>
                                                                </span>
                                                            </a>
                                                        <?php endwhile; ?>
                                                        <a class="employee-email" href="mailto:<?php echo get_field('employee-email', $id); ?>">
                                                            <?php if (!$hide_email) : ?>
                                                                <?php echo get_field('employee-email', $id); ?>
                                                            <?php else : ?>
                                                                <?php the_field('employee-email-replacement-text', $id); ?>
                                                            <?php endif; ?>
                                                        </a>
                                                        <span class="employee-textarea">
                                                            <?php echo get_field('employee-textarea', $id); ?>
                                                        </span>
                                                    </span>
                                                    </section>
                                                </article>
                                            </div>

                                            <?php
                                            }
                                        ?>

                                    </div>
                                </div>


                                <!-- KONTAKTA OSS -->
                                <div class="col-xs-12 col-sm-12">
                                    <div class="expandable opened" data-expand="contact"><a id="contact"></a><h3>Kontakta oss</h3></div>
                                    <div class="group contact" style="display: block;">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3">
                                                <strong>Besöksadress:</strong><br>
                                                <?php echo $visiting_address; ?><br>

                                                <strong>Kontakta oss:</strong><br>
                                                <?php bytbil_show_facility_phonenumbers($facility_id); ?><br>
                                                <!--<?php bytbil_show_facility_emails($facility_id); ?><br>-->
                                                <a href="#facility-map">Se karta</a><br><br>
                                            </div>

                                            <div class="col-xs-12 col-sm-3">
                                                <?php if($use_post_adress) { ?>
                                                    <strong>Postadress:</strong><br>
                                                    <?php echo $post_address; ?><br><br>
                                                <?php } else { ?>
                                                    <strong>Postadress:</strong><br>
                                                    <?php echo $visiting_address; ?><br><br>
                                                <?php } ?>
                                            </div>

                                            <div class="col-xs-12 col-sm-3">
                                                <strong>Öppettider:</strong><br>
                                                <?php bytbil_show_facility_openhours($facility_id); ?>
                                                <a href="/vara-anlaggningar/avvikande-oppettider-<?php echo date("Y"); ?>">Se avvikande öppettider</a><br><br>
                                            </div>

                                            <div class="col-xs-12 col-sm-3 offer">
                                                <div class="row">
                                                    <!--<strong>Öppettider:</strong><br>
                                                    <?php bytbil_show_facility_openhours($facility_id); ?>
                                                    <a href="#">Se avvikande öppettider</a><br><br>-->

                                                    <style>
                                                        #plug-5252, #plug-5252:link, #plug-5252:visited {

                                                            background-color: #333333;
                                                            color: #ffffff;
                                                        }

                                                        #plug-5252 h3 {
                                                            color: #ffffff;
                                                        }

                                                        #plug-5252:hover {
                                                            background-color: #515151;
                                                        }
                                                    </style>

                                                    <div class="col-xs-12 col-sm-12">

                                                        <?php if($facility_location != "Falun") { ?>
                                                        <a href="/aga-bil/boka-service/" class="plug" id="plug-5252" target="_self">
                                                        <?php } else { ?>
                                                        <a href="/aga-bil/boka-service-i-falun/" class="plug" id="plug-5252" target="_self">
                                                        <?php } ?>
                                                            <h2>Boka service</h2>
                                                            <span class="plug-icon-text">
                                                                Boka snabbt och smidigt via vår onlinebokning!
                                                            </span>
                                                            <span class="plug-icon">
                                                                <img src="http://customcms.bytbil.com/wp-content/uploads/sites/23/2015/09/symbol-service.png"/>
                                                            </span>
                                                            <button class="button">Boka här</button>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-3 offer">
                                                <div class="row">
                                                    <!--<div class="linkbuttons">-->
                                                    <!--<a class="button btn-block" href="#">Avvikande öppettider<i class="fa fa-angle-right"></i></a>-->
                                                    <!--<a class="button btn-block" href="#">Boka service<i class="fa fa-angle-right"></i></a>-->
                                                    <!--<a class="button btn-block" href="#">Personal<i class="fa fa-angle-right"></i></a>-->
                                                    <!--</div>-->

                                                </div>
                                            </div>
                                        </div>

                                        <div class="contact-form">
                                            <?php
                                            $contact_form = get_field('contact-form');
                                            if($contact_form) {
                                                echo do_shortcode('[contact-form-7 id="' . $contact_form->ID . '"]');
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

    <a id="facility-map"></a>
    <div style="margin-top: 30px;"></div>

<?php
$active_marker = "Biva " . str_replace("Biva i ", "", get_the_title());
require_once('google-maps.php');
?>

<?php require_once('brands.php'); ?>

<?php get_footer(); ?>