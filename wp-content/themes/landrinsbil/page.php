<?php

get_header();
$init_map = false;
?>

<?php
if(!is_page($frontpageID)) : ?>
    <div id="breadcrumbs-wrapper" class="wrap">
        <div class="wrap-inner">
            <div class="breadcrumbs">
                <?php the_breadcrumb(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<div id="middle" class="wrap">

<div class="wrap-inner <?php echo !is_page($frontpageID) ? " content padding" : "margin"; ?>">

<div class="row">

<!-- Om Side är i bockat printa ut Sidebar -->
<?php if(get_field('setting-use-sidebar')==true){ ?>
    <div class="col-md-3 col-sm-3 hidden-xs" id="submenu">
        <?php if(get_field('sidebar-contents')) : while( have_rows('sidebar-contents')) : the_row();
            $type = get_sub_field('sidebar-content-type');
            $block_title = get_sub_field('sidebar-content-title');

            if(get_sub_field('sidebar-hide-title')!=true && $block_title != ''){
                echo '<h2>'.$block_title.'</h2>';
            }

            if($type=='wysiwyg'){
                echo get_sub_field('sidebar-content-wysiwyg');
            }
            elseif($type=='menu'){
                $menu_type = get_sub_field('sidebar-menu-type');
                if($menu_type=='page'){
                    wp_nav_menu(array(
                        'menu' => 'Huvudmeny',
                        'menu_class' => 'sidebar-menu',
                        'submenu' => $post->ID,
                        'container' => false
                    ));

                }
                elseif($menu_type=='main'){
                    wp_nav_menu( array(
                            'menu' => 'Huvudmeny',
                            'depth' => 3,
                            'container' => false,
                            'menu_class' => 'sidebar-menu')
                    );
                }
            }
            elseif($type=='contactform'){
                echo get_sub_field('sidebar-content-form');
            }
            elseif($type=='plugs'){
                $plugs = get_sub_field('sidebar-content-plugs');
                foreach($plugs as $plug){
                    bytbil_show_plugs_sidebar($plug->ID);
                }
            }
            ?>
        <?php endwhile; endif; ?>
    </div>
<?php } ?>

<?php if(get_field('setting-use-sidebar')==true){ ?>
<div class="col-md-9 col-sm-9" id="page-content">
<?php } else { ?>
<div class="col-md-12 col-sm-12" id="page-content">
<?php } ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php if(get_field('setting-hide-page-header')==false){ ?>
        <h1><?php the_title(); ?></h1>
    <?php } ?>

    <div class="row">
    <?php if(get_field('contents')) : while( have_rows('contents')) : the_row();

        $size = get_sub_field('content-size');
        $type = get_sub_field('content-type');
        $title = get_sub_field('content-title');
        $hideForMobile = get_sub_field('setting-hide-for-mobile');
        if(get_sub_field('content-slideshow')) {
            $slideshow = get_sub_field('content-slideshow');
        }
        if(get_sub_field('content-facility-choice')){
            $facility = get_sub_field('content-facility-choice');
        }

        ?>

        <div class="col-xs-12 col-sm-12 col-md-<?php echo $size . ' ' . $type; ?> <?php $hideForMobile ? print('hidden-xs') : ''; ?>">

        <?php if(get_sub_field('setting-hide-header')!=true){ ?>
            <h3><?php echo $title; ?></h3>
        <?php }

        if($type=='wysiwyg'){
            echo get_sub_field('content-wysiwyg');
        }

        elseif($type=='slideshow') { ?>
            <div id="slider">
                <div class="slider-container">
                    <?php bytbil_show_slideshow($slideshow->ID); ?>
                </div>
            </div>
        <?php }

        elseif($type=='sitemap') {
            $sitemap_type = get_sub_field('sitemap');
            if ($sitemap_type == 'all') {
                $menus = get_terms('nav_menu', array('hide_empty' => true));

                foreach ($menus as $menu) {
                    if (!get_sub_field('sitemap-hide-titles')) {
                        echo '<h4>' . $menu->name . '</h4>';
                    }
                    wp_nav_menu(array(
                            'menu' => $menu,
                            'menu_class' => 'sitemap')
                    );
                }
            } elseif ($sitemap_type == 'main') {
                wp_nav_menu(array(
                        'menu' => 'Huvudmeny',
                        'menu_class' => 'content-menu')
                );
            }
        }

        elseif($type=='facility') {
            $facility_infos = get_sub_field('content-facility-information');
            foreach($facility_infos as $facility_info){

                if($facility_info=='all'){
                    bytbil_show_facility_all($facility->ID);
                    $init_map = true;
                    $mapzoom = get_sub_field('content-facility-map-zoom');
                }
                elseif($facility_info=='address'){
                    bytbil_show_facility_address($facility->ID);
                }
                elseif($facility_info=='other-address'){
                    bytbil_show_other_facility_address($facility->ID);
                }
                elseif($facility_info=='phonenumber'){
                    bytbil_show_facility_phonenumbers($facility->ID);
                }
                elseif($facility_info=='email'){
                    bytbil_show_facility_emails($facility->ID);
                }
                elseif($facility_info=='contact'){
                    bytbil_show_facility_contact($facility->ID);
                }
                elseif($facility_info=='openhours'){
                    bytbil_show_facility_openhours($facility->ID, false, get_sub_field("content-facility-view-option"));
                }
                elseif($facility_info=='map'){
                    bytbil_show_facility_map($facility->ID);
                    $init_map = true;
                    $mapzoom = get_sub_field('content-facility-map-zoom');
                }

            }
        }
        elseif($type=='assortment') {
            ?>
            <?php if(!is_page($frontpageID)) { echo '<div class="row">'; } ?>
            <?php
            $assortment = get_sub_field('content-assortment');
            if($assortment=='list'){
                $assortment_list = get_sub_field('content-assortment-list');
                bytbil_show_assortment($assortment_list->ID);
            }
            elseif($assortment=='object'){
                $assortment_object = get_sub_field('content-assortment-object');
                bytbil_show_assortment_object($assortment_object);
            }
            ?>
            <?php if(!is_page($frontpageID)) { echo '</div>'; } ?>
        <?php
        }
        elseif($type=='plugs'){
            $plugs = get_sub_field('content-plugs');
            foreach($plugs as $plug){
                bytbil_show_plug($plug->ID, $size);
            }
        }
        elseif($type=='employees'){
            $employees_choice = get_sub_field('content-employees');
            $employees_cols = get_sub_field('content-employee-cols');
            if($employees_choice=='employees'){
                $employees = get_sub_field('content-employee-employee');
                foreach($employees as $employee){
                    bytbil_show_employee($employee->ID, $employees_cols);
                }
            }
            elseif($employees_choice=='emlpoyee-list'){
                $hide_header = get_sub_field('content-employee-hide-header');
                $employee_lists = get_sub_field('content-employee-lists');
                foreach($employee_lists as $employee_list){
                    bytbil_show_employee_list($employee_list, $hide_header, $employees_cols);
                }
            }
        }
        elseif($type=='offers'){
            $offer_choice = get_sub_field('content-offers-choice');
            if($offer_choice=='specific'){
                $offer = get_sub_field('content-offer-specific');
                bytbil_show_offer($offer->ID, $size);
            }
            elseif($offer_choice=='brand'){
                $col_size = get_sub_field('content-offer-col-size');
                $brand = get_sub_field('content-offer-brand');
                bytbil_show_offers_brand($brand,$col_size);
            }
            elseif($offer_choice=='facility'){
                $col_size = get_sub_field('content-offer-col-size');
                $facility = get_sub_field('content-offer-facility');
                bytbil_show_offers_facility($facility,$col_size);
            }
            elseif($offer_choice=='all'){
                $col_size = get_sub_field('content-offer-col-size');
                bytbil_show_offers_all($col_size);
            }

        }
        elseif($type=='socialmedia') {
            $user = get_sub_field('social_media-user');
            $height = get_sub_field('social_media-height');
            $width = get_sub_field('social_media-width');
            $showposts = get_sub_field('social_media-show_posts');
            $showfaces = get_sub_field('social_media-show_faces');
            $socialmedia = get_sub_field('social_media-type');
            $resolution = get_sub_field('social_media-quality');
            $hashtag = get_sub_field('social_media-hashtag');

            //Facebook
            if($socialmedia == 'fb'){ ?>
                <div id="fb-root"></div>
                <script>
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>

                <?php $randomnr = rand(); ?>

                <div id="fb-like-box-<?php echo $randomnr; ?>">
                    <div class="fb-like-box" data-href="https://www.facebook.com/<?php echo $user; ?>" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" data-colorscheme="<?php echo $theme; ?>" data-show-faces="<?php echo $showfaces; ?>" data-header="false" data-stream="<?php echo $showposts[0]; ?>" data-show-border="false"></div>
                </div>

                <style type="text/css">
                    #fb-like-box-<?php echo $randomnr; ?> .fb_iframe_widget, #fb-like-box-<?php echo $randomnr; ?> .fb_iframe_widget span, #fb-like-box-<?php echo $randomnr; ?> .fb_iframe_widget span iframe[style] {
                        width: <?php echo $width; ?> !important;
                    }
                </style>

                <?php
                //Twitter
            }else if($socialmedia == 'tw'){ ?>

                <a class="twitter-timeline" href="https://twitter.com/<?php echo $user; ?>" data-theme="<?php echo $theme; ?>" data-screen-name="<?php echo $user; ?>" data-widget-id="495141016639250432">Tweets från @<?php echo $user; ?></a>
                <script>
                    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
                </script>



                <?php
                //Instagram
            }else if($socialmedia == 'ig'){

                $count = get_sub_field('social_media-pic_count'); ?>
                <div id="socialmedia-container">
                    <i class="fa fa-instagram"></i> #<?php echo $hashtag; ?>
                    <div id="socialmedia-view" style="height: <?php echo $height; ?>px; width: <?php echo $width; ?>px"></div>
                </div>

                <script>
                    var Instagram = {};
                    Instagram.search = search;
                    var Count = <?php echo $count; ?>;
                    Instagram.search("<?php echo $hashtag; ?>");


                    function search(tag){
                        $.getJSON(url, toScreen);
                    }

                    function show(photos){
                        $.each(photos.data, function(index, photo){
                            photo = "<div class='list-object'><a target='_blank' href='"+photo.link+"'><img src='"+ photo.images.<?php echo $resolution; ?>.url + "' /></a>"
                            <?php if(get_sub_field('social_media-show_title')){ ?>
                            +"<span>"+photo.caption.text+"</span>"
                            <?php } ?>;

                            $('#socialmedia-view').append(photo);
                        });
                    }
                    function search(tag){
                        var url = 'https://api.instagram.com/v1/tags/' + tag + '/media/recent/?callback=?&count='+Count+'&client_id=b44483be244e4e8cb84f25e290bca2ab'
                        jQuery.getJSON(url, show);
                    }

                </script>
                <?php
                //Youtube
                //AIzaSyC6k6DXb7okpfijmHwduzTZ-MKc4AaXlh0
            }else if($socialmedia == 'yt'){

                $count = get_sub_field('social_media-vids_count'); ?>

                <script src="https://apis.google.com/js/platform.js"></script>
                <div id="socialmedia-container">
                    <div class="g-ytsubscribe" data-channel="<?php echo $user; ?>" data-layout="full" data-count="default"></div>
                    <div id="socialmedia-view" style="height: <?php echo $height; ?>px; width: <?php echo $width; ?>px"></div>
                    <?php
                    switch($resolution){
                        case 'low_resolution': $resolution = 'list_object.snippet.thumbnails.medium.url'; break;
                        case 'standard_resolution': $resolution = 'list_object.snippet.thumbnails.high.url'; break;
                        case 'thumbnail': $resolution = 'list_object.snippet.thumbnails.default.url'; break;
                    }
                    ?>
                    <script>
                        var id_url = 'https://www.googleapis.com/youtube/v3/channels?part=contentDetails&forUsername=<?php echo $user; ?>&key=AIzaSyC6k6DXb7okpfijmHwduzTZ-MKc4AaXlh0';
                        jQuery.getJSON(id_url, getPlayListID);

                        function getPlayListID(data){
                            var playListID = data.items[0].contentDetails.relatedPlaylists.uploads;
                            console.log(data);
                            var url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=<?php echo $count; ?>&playlistId='+playListID+'&key=AIzaSyC6k6DXb7okpfijmHwduzTZ-MKc4AaXlh0';
                            jQuery.getJSON(url, getPlayListVideos);
                        }

                        function getPlayListVideos(data){
                            var resolution = "<?php echo $resolution; ?>";
                            console.log(data);
                            jQuery.each(data.items, function(index, list_object){
                                //console.log(list_object);

                                list_object = "<a target='_blank' href='https://www.youtube.com/watch?v="+list_object.snippet.resourceId.videoId+"'><div class='list-object no-padding col-sm-12'>"+
                                "<span class='col-sm-3 no-padding'><img src='"+eval(resolution)+"'/></span><span class='col-sm-9 no-padding'>"+list_object.snippet.title+"</span></div><a/>";

                                $('#socialmedia-view').append(list_object);
                            });
                        }
                    </script>
                </div>
            <?php
            }

        }
        elseif($type=='contactform'){
            the_sub_field('content-contact-form');
        }
        elseif($type=='map'){
            bytbil_show_map(get_sub_field('content-map-height'));
            $init_map = true;
            $mapzoom = get_sub_field('content-facility-map-zoom');
        }
        elseif($type=='news'){
            $posts = get_sub_field('content-news-nr-posts');
            $categories = get_sub_field('content-news-categories');
            bytbil_show_news_feed($posts, $categories);
        }
        elseif ($type == 'html') {
            the_sub_field('content-html-code');
        }

        ?>
        </div>

    <?php endwhile; endif; if($init_map==true){
        $mapzoom = $mapzoom ? intval($mapzoom, 10) : 16;
        bytbil_init_facility_map($mapzoom);
    } ?>
    <!-- THIS IS EDITED -->
    </div>

<?php endwhile; endif; ?>

</div>

</div>

</div>

<?php
if(is_page($frontpageID)) : ?>

    <div class="wrap-inner">
        <h3 class="chapter">Hitta anläggning & öppettider</h3>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="location-box">
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/03/Anläggningsbild-startsida-webb-Avesta.jpg" style="width: 100%; min-height: 120px; max-height: 300px;" />
                    <div class="location-title">
                        <a href="<?php echo site_url(); ?>/kontakt/avesta/">Avesta</a>
                        <div class="location-brands pull-right">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo-mb-sm.png" />
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo-nissan-sm.png" />
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo-subaru-sm.png" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="location-box">
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/eskilstuna.png" style="width: 100%; min-height: 120px; max-height: 300px;" />
                    <div class="location-title">
                        <a href="<?php echo site_url(); ?>/kontakt/eskilstuna/">Eskilstuna</a> / <a href="<?php echo site_url(); ?>/kontakt/bilgard/">Bilgård</a>
                        <div class="location-brands pull-right">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo-mb-sm.png" />
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo-nissan-sm.png" />
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo-subaru-sm.png" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="location-box">
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/03/Anläggningsbild-startsida-webb-Hälla.jpg" style="width: 100%; min-height: 120px; max-height: 300px;" />
                    <div class="location-title">
                        <a href="<?php echo site_url(); ?>/kontakt/vasteras-halla/">Västerås - Hälla</a>
                        <div class="location-brands pull-right">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo-hyundai-sm.png" />
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo-subaru-sm.png" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="location-box">
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/vasteras-hasslo.png" style="width: 100%; min-height: 120px; max-height: 300px;" />
                    <div class="location-title">
                        <a href="<?php echo site_url(); ?>/kontakt/vasteras-hasslo/">Västerås - Hässlö</a>
                        <div class="location-brands pull-right">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo-mb-sm.png" />
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/sites/104/2015/01/logo-nissan-sm.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="social-media">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="chapter">Följ oss</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 social-media-box">
                    <div class="content padding">
                        <h3><a href="https://www.facebook.com/LandrinsBil"><span class="fa fa-facebook-square"></span>&nbsp; Facebook</a></h3>
                        <div class="social-media-content hidden-sm hidden-xs" id="facebook">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 social-media-box">
                    <div class="content padding">
                        <h3><a href="http://instagram.com/landrinsbil"><span class="fa fa-instagram"></span>&nbsp; Instagram</a></h3>
                        <div class="social-media-content hidden-sm hidden-xs" id="instagram">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 social-media-box">
                    <div class="content padding">
                        <h3><a href="https://www.youtube.com/user/landrinsbil"><span class="fa fa-youtube"></span>&nbsp; YouTube</a></h3>
                        <div class="social-media-content hidden-sm hidden-xs" id="youtube">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php endif; ?>

</div>

<?php get_footer(); ?>
