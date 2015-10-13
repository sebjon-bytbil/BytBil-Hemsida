<?php
/*
Template Name: Företagssida
*/
get_header();
$company_post = IntranetHandler::get_user_company_post();
$user_role = IntranetHandler::get_current_user_role();

$register_form = false;
if($company_post != null){
    $register_form = true;
}
$cid = $company_post->ID;
$title = get_field("company_start_title", $cid);
$company_title = str_replace(" ", "-", $title);
$description = get_field("company_start_description", $cid);
$background = get_field("company_start_background", $cid);
$services = get_field("company_services", $cid);
$pcars = get_field("company_models", $cid);
$scars = get_field("company_seller_models", $cid);
$contacts = get_field("company_employees", $cid);

function getTabOptions($contentArr, $taxonomy) {
    foreach($contentArr as $content){
        $id = $content->ID;
        $title = get_the_title($id);
        $post_terms = wp_get_post_terms($id, $taxonomy);
        foreach($post_terms as $term){
            if($term->parent == 0){
//                $brandname = explode(" ", $term->name);
//                $brands[] = $brandname[0];
                $tab_content[] = $term->name;
            }
        }
    }
    $tab_content = array_unique($tab_content);
    $tab_content[] = "Alla";
    $tab_content = array_reverse($tab_content);

    return $tab_content;
}

if($company_post) {
    ?>
    <main>
        <!-- Bildspel -->
        <section class="section-block dark scroll" style="background: #f7f7f7 ;" name="">
            <div class="container-fluid full default-padding">
                <div class="row-wrapper full ">
                    <div id="1349-1" class="col-xs-12 col-sm-12 slideshow">
                        <div class="flexslider" id="slideshow-1355" data-slideshow="otherslider">
                            <ul class="slides">
                                <li class="slideshow-image-text flex-active-slide"
                                    style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
                                    <img src="<?php echo $background; ?>" alt="" title="1" draggable="false">

                                    <div class="caption-wrapper" style="">
                                        <div class="caption" data-animation="fade"
                                             style="transition: opacity 800ms ease-in; -webkit-transition: opacity 800ms ease-in; opacity: 1;">
                                            <div class="vertical-align-wrapper">
                                                <div class="vertical-align center">
                                                    <div class="horizontal-align">
                                                        <div class="caption-contents"
                                                             style="color: #000; background: rgba(255,255,255,0.6);border: 10px solid rgba(255,255,255,0.75);">
                                                            <h1 style="text-align: center;"><span
                                                                    class="title bold stroked black"
                                                                    style="font-size: 42px;">Välkommen till <?php echo $title; ?>
                                                                    s P-plats!</span></h1>

                                                            <p style="text-align: center;"><span
                                                                    class="subtext black caps spacing-md"><?php echo $description; ?></span>
                                                            </p>

                                                            <p style="text-align: center;">
                                                                <span>
                                                                    <span class="button red standard">
                                                                        <i class=""></i>
                                                                        <a href="#">Se era tjänster</a>
                                                                    </span>
                                                                </span>
                                                                <span>
                                                                    <span class="button black standard">
                                                                        <i class=""></i>
                                                                        <a href="http://upplandsmotor2015.customcms.bytbil.com/verkstad/boka-service-reparation/">Boka
                                                                            service</a>
                                                                    </span>
                                                                </span>
                                                                <span>
                                                                    <span class="button white standard">
                                                                        <i class=""></i>
                                                                        <a href="mailto:verkstadak@upplandsmotor.se">Kontakta
                                                                            oss</a>
                                                                    </span>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                            <ol class="flex-control-nav flex-control-paging">
                                <li><a class="flex-active">1</a></li>
                                <li><a class="">2</a></li>
                                <li><a class="">3</a></li>
                                <li><a class="">4</a></li>
                            </ol>
                            <ul class="flex-direction-nav">
                                <li><a class="flex-prev" href="#">Previous</a></li>
                                <li><a class="flex-next" href="#">Next</a></li>
                            </ul>
                        </div>

                       
                        <script
                            src="http://customcms.bytbil.com/wp-content/themes/upplands-motor-2015/js/jquery.flexslider-min.js"></script>

<!--                        <script>-->
<!--                            $ = jQuery;-->
<!---->
<!--                            function animate_slideshow(slider, when) {-->
<!--                                var current_caption = $(slider).find('.flex-active-slide .caption');-->
<!--                                var animation = $(current_caption).data('animation');-->
<!---->
<!--                                if (when == 'start' || when == 'after') {-->
<!---->
<!--                                    if (animation == 'fade') {-->
<!--                                        $(current_caption).delay(200).css({-->
<!--                                            "transition": "opacity ease-in 800ms",-->
<!--                                            "opacity": 1,-->
<!--                                        });-->
<!--                                    } else if (animation == 'left' || animation == 'right') {-->
<!--                                        $(current_caption).delay(200).css({-->
<!--                                            "transition": "left ease-out 800ms",-->
<!--                                            "left": "0",-->
<!--                                        });-->
<!--                                    } else {-->
<!--                                        //console.log('In');-->
<!--                                    }-->
<!--                                } else if (when == 'before') {-->
<!--                                    if (animation == 'fade') {-->
<!--                                        $(current_caption).delay(200).css({-->
<!--                                            "opacity": 0,-->
<!--                                        });-->
<!--                                    } else if (animation == 'left' || animation == 'right') {-->
<!--                                        if (animation == 'left') {-->
<!--                                            $(current_caption).delay(200).css({-->
<!--                                                "transition": "left ease-in 800ms",-->
<!--                                                "left": "-100%",-->
<!--                                            });-->
<!--                                        }-->
<!--                                        if (animation == 'right') {-->
<!--                                            $(current_caption).delay(200).css({-->
<!--                                                "transition": "left ease-in 800ms",-->
<!--                                                "left": "200%",-->
<!--                                            });-->
<!--                                        }-->
<!--                                    } else {-->
<!--                                        //console.log('Ut');-->
<!--                                    }-->
<!--                                }-->
<!--                            }-->
<!--                            $(document).ready(function () {-->
<!--                                $('#slideshow-1355').flexslider({-->
<!--                                    animation: "fade",-->
<!--                                    direction: "horizontal",-->
<!--                                    slideshowSpeed: 7000,-->
<!--                                    animationSpeed: 600,-->
<!--                                    pauseOnHover: true,-->
<!--                                    directionNav: true,-->
<!--                                    touch: true,-->
<!--                                    useCSS: true,-->
<!--                                    smoothHeight: false,-->
<!--                                    slideshow: true,-->
<!--                                    keyboard: true,-->
<!--                                    start: function (slider) {-->
<!--                                        animate_slideshow(slider, 'start');-->
<!--                                    },-->
<!--                                    after: function (slider) {-->
<!--                                        animate_slideshow(slider, 'after');-->
<!--                                    },-->
<!--                                    before: function (slider) {-->
<!--                                        animate_slideshow(slider, 'before');-->
<!--                                    },-->
<!--                                    // If have Thumbs-->
<!--                                    controlNav: true,-->
<!--                                    animationLoop: true,-->
<!--                                });-->
<!--                            });-->
<!--                        </script>-->
                    </div>
                </div>
            </div>
        </section>

        <!-- Submeny -->
        <section id="sub_menu" class="scroll-menu page-menu">

            <div class="submenu-wrapper">
                <div class="submenu-title">
                    <h1><?php echo $company_title; ?></h1>
                    <div class="submenu-mobile visible-xs">
                        <div class="btn-group">
                            <a class="btn button white dropdown-toggle" data-toggle="dropdown" href="#">
                                Meny
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#">
                                    </a>
                                </li>
                                <!-- dropdown menu links -->
                                <li>
                                    <a href="#tjanster">
                                        Tjänster
                                    </a>
                                </li>
                                <!-- dropdown menu links -->
                                <li>
                                    <a href="#personalbil">
                                        Personalbil
                                    </a>
                                </li>
                                <!-- dropdown menu links -->
                                <li>
                                    <a href="#saljarbil">
                                        Säljarbil
                                    </a>
                                </li>
                                <!-- dropdown menu links -->
                                <li>
                                    <a href="#kontaktpersoner">
                                        Kontaktpersoner
                                    </a>
                                </li>
                                <!-- dropdown menu links -->
                                <li>
                                    <a href="#boka-service">
                                        Boka service
                                    </a>
                                </li>
                                <!-- dropdown menu links -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hidden-xs">
                    <div class="item first">
                        <a href="#">&nbsp;</a>
                        <span></span>
                    </div>

                    <div class="item ">
                        <a href="#tjanster">
                            Tjänster
                        </a>
                        <span></span>
                    </div>
                    <div class="item ">
                        <a href="#personalbil">
                            Personalbil
                        </a>
                        <span></span>
                    </div>
                    <div class="item ">
                        <a href="#saljarbil">
                            Säljarbil
                        </a>
                        <span></span>
                    </div>
                    <div class="item ">
                        <a href="#kontaktpersoner">
                            Kontaktpersoner
                        </a>
                        <span></span>
                    </div>
                    <div class="item ">
                        <a href="#boka-service">
                            Boka service
                        </a>
                        <span></span>
                    </div>
                    <?php if ($register_form && $user_role == "foretagsadmin") { ?>
                        <div class="item ">
                            <a href="#register-company-users">
                                Registrera företagsanvändare
                            </a>
                            <span></span>
                        </div>
                    <?php } ?>

                    <div class="item last">
                        <a href="#">&nbsp;</a>
                        <span></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tjänster -->
        <section class="section-block dark scroll" style="background: #fff;" name="tjanster">
            <div class="container-fluid wrapper default-padding">
                <div class="col-xs-12">
                    <h2>Tjänster</h2>
                </div>
                <div class="row-wrapper wrapper ">
                    <div id="1520-5" class="col-xs-12 col-sm-12 custom">
                        <p>Läs mer om vilka tjänster och unika lösningar Upplands motor tagit fram tillsammans
                            med <?php echo $title; ?> för att göra det så enkelt för dig att ha bil.</p>
                    </div>
                    <?php
                    foreach ($services as $service) {
                        $description = get_field("service_description", $service->ID); ?>

                        <div id="" class="col-xs-12 col-sm-3 block">
                            <div class="card shadow-none" style="background: #ffffff;">
                                <div class="col-xs-12 col-sm-3">
                                    IKON
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <h4><?php echo $service->post_title; ?></h4>
                                    <p><?php echo $description; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </section>

        <!-- Personalbil -->
        <section class="section-block dark scroll" style="background: #f7f7f7 ;" name="personalbil">
            <div class="container-fluid wrapper default-padding">
                <div class="col-xs-12">
                    <h2>Personalbil</h2>
                    <p>Nedan hittar du de personalbilar med utrustning- och prisförslag som tagits fram för Vattenfall</p>
                </div>

                <div class="row-wrapper wrapper ">
                    <div class="col-xs-12">
                        <div class="content-tab-panel">
                            <ul id="content-tabs-company" class="nav nav-tabs responsive" data-tabs="tabs">
                                <?php
                                $brands = getTabOptions($pcars, "brand");
                                foreach($brands as $brand){
                                    $brand = str_replace(" ", "-", $brand);
                                    if($brand == "Alla"){ ?>
                                        <li class="active">
                                    <?php } else { ?>
                                        <li>
                                    <?php } ?>
                                    <a href="#<?php echo $brand. "-pcar"; ?>" data-toggle="tab"><?php echo $brand;?></a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                    <div id="content-tabs-content-1619-6" class="tab-content responsive">
                        <?php foreach ($brands as $brand){
                        $brand = str_replace(" ", "-", $brand);
                        if($brand == "Alla"){ ?>
                        <div class="tab-pane active" id="<?php echo $brand . "-pcar"; ?>">
                            <?php }else{ ?>
                            <div class="tab-pane" id="<?php echo $brand . "-pcar";; ?>">
                                <?php } ?>

                                <div id="1520-2" class="col-xs-12 col-sm-12 vehicle">
                                    <div class="vehicle-list">
                                        <div class="row row-flex row-flex-wrap">

                                            <?php
                                            foreach ($pcars as $pcar) {
                                                $pid = $pcar->ID;
                                                $title = get_field("vehicle-header", $pid);
                                                $description = get_field("vehicle-description", $pid);
                                                $image = get_field("vehicle-image", $pid);
                                                $image_url = wp_get_attachment_image_src($image["id"], "medium");

                                                $post_terms = wp_get_post_terms($pid, "brand");

                                                $link = get_field('brand-page', 'brand_' . $post_terms[0]->term_id);

                                                if($post_terms[0]->name != $brand && $brand != "Alla"){
                                                    continue;
                                                }
                                                ?>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="vehicle-list-item block white-bg">
                                                        <div class="vehicle-list-image">
                                                            <img src="<?php echo $image_url[0]; ?>">
                                                        </div>
                                                        <div class="vehicle-list-information">
                                                            <h4><?php echo $title; ?></h4>
                                                            <?php echo $description; ?>
                                                        </div>
                                                        <div class="vehicle-list-buttons">
                                                            <a href="<?php echo $link; ?>" class="button volvo">Se detaljer</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php }; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
        </section>


        <!-- Säljarbil -->
        <section class="section-block dark scroll" style="background: #fff ;" name="saljarbil">
            <div class="container-fluid wrapper default-padding">
                <div class="col-xs-12">
                    <h2>Säljarbil</h2>
                    <p>Vi är specialister på Volvo och hjälper er att hitta just den modell som passar era behov och smak.</p>
                </div>

                <div class="row-wrapper wrapper ">
                    <div class="col-xs-12">
                        <div class="content-tab-panel">
                            <ul id="content-tabs-company-employee" class="nav nav-tabs responsive" data-tabs="tabs">
                                <?php
                                $brands = getTabOptions($scars, "brand");
                                foreach($brands as $brand){
                                    if($brand == "Alla"){ ?>
                                        <li class="active">
                                    <?php } else { ?>
                                        <li>
                                    <?php } ?>
                                        <a href="#<?php echo $brand . "-scar";  ?>" data-toggle="tab"><?php echo $brand;?></a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                    <div id="content-tabs-content-1618-6" class="tab-content responsive">
                        <?php foreach ($brands as $brand){

                            if($brand == "Alla"){ ?>
                                <div class="tab-pane active" id="<?php echo $brand . "-scar"; ?>">
                            <?php }else{ ?>
                                <div class="tab-pane" id="<?php echo $brand . "-scar"; ?>">
                            <?php } ?>

                            <div id="1520-3" class="col-xs-12 col-sm-12 vehicle">
                                <div class="vehicle-list">
                                    <div class="row row-flex row-flex-wrap">

                                        <?php
                                        foreach ($scars as $scar) {
                                            $sid = $scar->ID;
                                            $title = get_field("vehicle-header", $sid);
                                            $description = get_field("vehicle-description", $sid);
                                            $image = get_field("vehicle-image", $sid);
                                            $image_url = wp_get_attachment_image_src($image["id"], "medium");
                                            $post_terms = wp_get_post_terms($sid, "brand");

                                            $link = get_field('brand-page', 'brand_' . $post_terms[0]->term_id);

                                            if($post_terms[0]->name != $brand && $brand != "Alla"){
                                                continue;
                                            }
                                            ?>
                                            <div class="col-xs-12 col-sm-4">
                                                <div class="vehicle-list-item block white-bg">
                                                    <div class="vehicle-list-image">
                                                        <img src="<?php echo $image_url[0]; ?>">
                                                    </div>
                                                    <div class="vehicle-list-information">
                                                        <h4><?php echo $title; ?></h4>
                                                        <?php echo $description; ?>
                                                    </div>
                                                    <div class="vehicle-list-buttons">
                                                        <a href="<?php echo $link; ?>" class="button volvo">Se detaljer</a>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php }; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

        </section>

        <!-- Kontaktpersoner -->
        <section class="section-block dark scroll" style="background: #f7f7f7 ;" name="kontaktpersoner">
            <div class="container-fluid wrapper default-padding">
                <div class="col-xs-12">
                    <h2>Kontaktpersoner</h2>
                    <p>
                        <span>Tveka inte att kontakta era utvalda kontaktpersoner för snabb hjälp och service gällande din bil.</span></p>
                    <p>
                </div>

                <div class="row-wrapper wrapper ">
                    <div class="col-xs-12">
                        <div class="content-tab-panel">
                            <ul id="content-tabs-company-employee" class="nav nav-tabs responsive" data-tabs="tabs">

                                <?php
                                $cities = getTabOptions($contacts, "cities");

                                foreach ($cities as $city){
                                    $city_stripped = str_replace(" ", "-", $city);
                                    if($city == "Alla"){?>
                                        <li class="active">
                                    <?php }else{?>
                                        <li class="">
                                    <?php } ?>
                                        <a href="#<?php echo $city_stripped;?>" data-toggle="tab"><?php echo $city;?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <div id="content-tabs-content-1618-6" class="tab-content responsive">
                        <?php foreach ($cities as $city){
                            $city_stripped = str_replace(" ", "-", $city);
                            if($city == "Alla"){ ?>
                                <div class="tab-pane active" id="<?php echo $city_stripped; ?>">
                            <?php }else{ ?>
                                <div class="tab-pane" id="<?php echo $city_stripped; ?>">
                            <?php } ?>

                                <div id="1618-4" class="col-xs-12 employees">
                                    <div class="row">
                                        <div id="employee-carousel-6-4" class="employee-gallery-container owl-carousel owl-theme" data-col-size="4" style="opacity: 1; display: block;">
                                            <div class="owl-wrapper-outer">
                                                <div class="owl-wrapper" style="width: 4560px; left: 0px; display: block; -webkit-transition: all 0ms ease; transition: all 0ms ease;">
                                                    <div class="owl-item" style="width: 1140px;">
                                                        <div class="item">
                                                            <?php
                                                            foreach ($contacts as $contact){
                                                                $cid = $contact->ID;
                                                                $title = get_the_title($cid);
                                                                $image = get_field("employee-image", $cid);
                                                                $image_url = wp_get_attachment_image_src($image["id"], "medium");
                                                                $email = get_field("employee-email", $cid);
                                                                $phone = get_field("employee-phone", $cid);
                                                                $position = get_field("employee-work-title", $cid);
                                                                $post_terms = wp_get_post_terms($cid, "cities");

                                                                if($post_terms[0]->name != $city && $city != "Alla"){
                                                                    continue;
                                                                }
                                                                ?>
                                                                <div class="col-xs-12 col-sm-3">
                                                                    <div class="employee-card" id="employeee-<?php echo $cid;?>">
                                                                        <div class="employee-image">
                                                                            <img src="<?php echo $image_url[0];?>">

                                                                            <div class="employee-image-overlay"></div>
                                                                        </div>
                                                                        <div class="clear clearfix"></div>
                                                                        <div class="employee-information block white-bg" data-hide="text">
                                                                            <h5 class="employee-name">
                                                                                <?php echo $title; ?>
                                                                            </h5>
                                                                    <span class="employee-title">
                                                                        <?php echo $position;?>
                                                                    </span>
                                                                    <span class="employee-buttons">
                                                                    <a href="tel:<?php echo $phone;?> " class="employee-phone button green fw"><i class="icon icon-phone"></i> <?php echo $phone;?> </a>
                                                                    <a href="mailto:<?php echo $email;?>" class="employee-mail button blue fw"><i class="icon icon-mail"></i> Skicka e-post</a>
                                                                    </span>

                                                                            <div class="clearfix clear"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

<!--                                            <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"><i class="icon icon-chevron-thin-left"></i></div><div class="owl-next"><i class="icon icon-chevron-thin-right"></i></div></div></div></div>-->
                                    </div>

<!--                                    <script>-->
<!--                                        $ = jQuery;-->
<!---->
<!--                                        var divs = $("#employee-carousel-6-4 > div");-->
<!---->
<!--                                        //Antal Bilder Per Slide-->
<!--                                        for(var i = 0; i < divs.length; i+=4) {-->
<!--                                            divs.slice(i, i+4).wrapAll("<div class='item'></div>");-->
<!--                                        }-->
<!---->
<!--                                        $(document).ready(function () {-->
<!--                                            $("#employee-carousel-6-4").owlCarousel({-->
<!--                                                navigation: true,-->
<!--                                                pagination: true,-->
<!--                                                items: 1,-->
<!--                                                itemsDesktop: [1199,1],-->
<!--                                                itemsDesktopSmall: [979,1],-->
<!--                                                itemsTablet: [768,1],-->
<!--                                                itemsMobile: [479, 1],-->
<!--                                                navigationText: ["<i class='icon icon-chevron-thin-left'></i>","<i class='icon icon-chevron-thin-right'></i>"]-->
<!--                                            });-->
<!--                                        });-->
<!--                                    </script>-->
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Boka Service -->
        <section class="section-block dark scroll" style="background: #fff ;" name="boka-service">
            <div class="container-fluid wrapper default-padding">
                <div class="col-xs-12 col-sm-5">
                    <h2>Boka service</h2>
                </div>
            </div>
        </section>

    </main>

    <?php
    if ($register_form && $user_role == "foretagsadmin") { ?>
        <section class="section-block dark scroll" style="background: #fff ;" name="register-company-users">
            <div class="container-fluid wrapper default-padding">
                <div class="col-xs-12 col-sm-5">
                    <h2>Registrera företagsanvändare</h2>
                    <form id="add-company-users" action="<?php echo admin_url('admin-post.php') ?>" method="post">
                        <input name="action" value="company_user_create" type="hidden"/>
                        <input name="company" value="<?php echo $company_post->post_title; ?>" type="hidden"/>
                        <p>
                            <label for="user_login">E-postadress</label>
                            <input type="text" name="user_login" placeholder="E-postadress" id="user_email" class="input" required/>
                        </p>
                        <p>
                            <label for="password">Lösenord</label>
                            <input type="password" name="password" placeholder="Lösenord" id="user_email" class="input" required/>
                        </p>
                        <p>
                            <input type="submit" id="register-button" value="Registrera" id="register"/>
                        </p>
                    </form>
                </div>
            </div>
        </section>
    <?php }
//If user is not company user, show 404
}else{ ?>
    <section class="section-block padded-block white">
        <div class="container-fluid wrapper">
            <div class="col-xs-12" style="text-align: center;">
                <?php /* If there are no posts to display, such as an empty archive page */ ?>

                    <h1>404 - Sidan hittades inte</h1>
                    <p><strong>Vi ber om ursäkt!</strong><br/> Sidan du försökte besöka kan inte hittas - den kan ha
                        tagits bort eller så kan adressen vara fel.</p><p>Besök gärna vår <a
                            href="<?php echo get_home_url(); ?>">Startsida</a> för att hitta det du söker eller våra
                        genvägar till de vanligaste sidorna nedan.</p>
                    <?php /* Initiera huvudmenyn */
                    wp_nav_menu(array(
                            'menu' => 'Huvudmeny',
                            'depth' => 1,
                            'container' => false,
                            'menu_class' => 'menu-404')
                    );
                    ?>
            </div>

        </div>

    </section>
<?php } ?>
    <script>
        $(function(){
            location.hash = "<?php echo $company_title;?>";
        });

        // $ = jQuery;
        // $(function(){
        //     var width = $(".submenu-wrapper").width();
        //     var menu_items = $(".scroll-menu .item").length - 2;
        //     var item_width = $(".scroll-menu .item").width();
        //     var menu_width = 0;
        //     $(".scroll-menu .item:not(.first):not(.last)").each(function(){
        //         var item_width = $(this).width();
        //         menu_width = menu_width + item_width;
        //     });
        //     var new_width = ((width - menu_width) / 2);
        //     var document_height = $(document).height();

        //     $(".scroll-menu .item.first").css("width", new_width);
        //     $(".scroll-menu .item.last").css("width", new_width);

        // });
        // $(window).scroll(function (){
        //     var submenu_wrapper_height = $(".scroll-menu .submenu-wrapper").height();
        //     var slider_height = $("main .section-block:first-of-type").height();

        //     var top = $(this).scrollTop()+300;

        //     if (top-300 > slider_height) {
        //         $(".scroll-menu .submenu-wrapper").addClass("affix");
        //     }
        //     else {
        //         $(".scroll-menu .submenu-wrapper").removeClass("affix");
        //     }

        //     $(".scroll").each(function(i){
        //         var this_top = $(this).offset().top;
        //         var height = $(this).height();
        //         var this_bottom = this_top + height;
        //         var percent = 0;

        //         var anchor_tag = '#' + $(this).attr('name');
        //         var active_link_parent = $('.scroll-menu .submenu-wrapper').find('a[href="'+anchor_tag+'"]').parent();

        //         if (top >= this_top && top <= this_bottom) {
        //             percent = ((top - this_top) / (height - submenu_wrapper_height)) * 100;
        //             if (percent >= 100) {
        //                 percent = 100;
        //                 $(".scroll-menu .submenu-wrapper .item:eq("+i+")").css("color", "#fff");
        //             }
        //             else {
        //                 $(".scroll-menu .submenu-wrapper .item:eq("+i+")").css("color", "#36a7f3");
        //             }

        //         }
        //         else if (top > this_bottom) {
        //             percent = 100;
        //             $(".scroll-menu .submenu-wrapper .item:eq("+i+")").css("color", "#fff");
        //         }
        //         $(".scroll-menu .submenu-wrapper .item:eq("+i+") span").css("width", percent + "%");
        //     });
        // });

        // // This adds an offset in case the header is fixed
        // $('a[href*=#]:not([href=#])').click(function() {
        //     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
        //         var target = $(this.hash);
        //         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        //         if (target.length) {
        //             var top_offset = 0;
        //             if ( $('.submenu-wrapper').css('position') == 'fixed' ) {
        //                 top_offset = $('.submenu-wrapper').height() + 140;
        //             }
        //             $('html,body').animate({
        //                 scrollTop: target.offset().top - top_offset
        //             }, 1000);
        //             return false;
        //         }
        //     }
        // });
    </script>
<?php get_footer();
