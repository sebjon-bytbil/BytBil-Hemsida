<!DOCTYPE html>
<?php
checkRedirect(get_the_ID());
?>
<html lang="en"
    <?php if (is_user_logged_in()) {
    echo 'class="push-down-admin-menu"';
    } ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="fragment" content="!" />

        <?php
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'rectangle-sd' );
        $url = $thumb['0'];
        ?>

        <?php if (isset($_GET['object']) && $_GET['object'] == 1) : ?>
            <?php get_object_meta_data(); ?>
        <?php elseif (get_post_type() === 'offer') : ?>
            <?php if (is_null($url)) : ?>
                <?php get_offer_meta_data(get_the_id(), true); ?>
            <?php else : ?>
                <?php get_offer_meta_data(get_the_id(), false); ?>
                <meta property="og:image" content="<?php echo $url; ?>" />
            <?php endif; ?>
            <meta property="og:url" content="<?php echo get_permalink(); ?>" />
        <?php else : ?>
            <?php if (get_field('pagesettings-title-tag')) : ?>
            <meta property="og:title" content="<?php the_field('pagesettings-title-tag'); ?>" />
            <?php else : ?>
            <meta property="og:title" content="<?php echo get_the_title(); ?>" />
            <?php endif; ?>
            <?php if (get_field('pagesettings-meta-description')) : ?>
            <meta property="og:description" content="<?php the_field('pagesettings-meta-description'); ?>" />
            <?php else : ?>
            <meta property="og:description" content="<?php bloginfo('description'); ?>" />
            <?php endif; ?>
            <meta property="og:image" content="<?php echo $url ?>" />
            <?php if (get_field('pagesettings-meta-keywords')) : ?>
            <meta name="keywords" content="<?php the_field('pagesettings-meta-keywords'); ?>" />
            <?php else :
                $search_words = wp_get_post_terms(get_the_ID(), 'search_meta');
                if (!empty($search_words)) : ?>
                    <meta name="keywords" content="<?php $words = sizeof($search_words); $i = 1; foreach ($search_words as $search_word) { echo $search_word->name; if ($i !== $words) { echo ', '; } ++$i; } ?>" />
                <?php endif;
            endif; ?>
            <meta property="og:url" content="<?php echo get_permalink(); ?>" />
        <?php endif; ?>
        <meta property="og:type" content="website" />

        <title><?php bloginfo('name'); ?> | <?php wp_title('|', true, 'right'); ?> <?php bloginfo('description'); ?></title>
        <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
        <?php wp_head(); ?>

        <!-- Shortcut Icons -->
        <link rel="icon" type="image/x-icon" href="<?php echo get_favicon(); ?>" />
        <link rel="favicon" href="<?php echo get_favicon(); ?>" />

        <!-- Touch Icons -->
        <?php
        get_touch_icons();
        ?>

      

        


        <link href="/wp-content/themes/upplands-motor-2015/minified/css/style.min.css?ver=jklPXVo7l74YYEp0VwfH" rel="stylesheet">
    

        <!--[if IE]>
        <link href="/wp-content/themes/upplands-motor-2015/css/ie-9-up.css" rel="stylesheet">
        <![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri() . '/js/matchMedia.js'; ?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/js/html5shiv.min.js'; ?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/js/respond.min.js'; ?>"></script>
        <![endif]-->

        <!--Google Maps / Anläggningar -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQAh825x3dRxn8w6zRUuCvtBOu-1FdgTU"></script>

        <?php echo get_settings_code('css'); ?>
        

    </head>
    <body <?php body_class(); ?>>
        <div id="transparent-overlay"></div>

        <?php echo get_settings_code('html'); ?>

        <header>
            <nav id="main-nav" class="navbar navbar-fixed-top" role="navigation">
                <div class="navbar">
                    <div class="container-fluid">
                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navbar-offcanvas" data-canvas="body">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="icon-menu"></i>
                            </button>

                            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                                <img class="logotype"
                                     src="<?php echo get_logotype('svg'); ?>"
                                     onerror="this.onerror=null; this.src='<?php echo get_logotype('png'); ?>'"
                                     alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"
                                     title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
                            </a>

                            <button type="button" class="search-toggle visible-xs visible-sm" onclick="toggleSearch();">
                                <i class="icon-magnifying-glass"></i>
                            </button>

                            <div id="mobile-search">
                                <h2 class="large">Sök på Upplands Motor</h2>
                                <p>Använd vår snabbsök för att smidigt och enkelt hitta det du letar efter.</p>
                                <form method="get" action="/">
                                    <input class="search-input" name="s" type="search" placeholder="Vad letar du efter?">
                                </form>
                            </div>

                            <div id="my-parking-mobile" class="visible-xs my-parking">
                                <?php include 'my-parking-header.php'; ?>
                            </div>

                        </div>
                        <div class="navbar-offcanvas offcanvas navmenu-fixed-left canvas-slid" style="">
                            <a class="navmenu-brand" href="<?php echo home_url(); ?>">
                                <img src="<?php echo get_logotype('svg'); ?>"
                                     onerror="this.onerror=null; this.src='<?php echo get_logotype('png'); ?>'"
                                     alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"
                                     title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
                            </a>
                            
                            <div id="main-menu">
                                <?php
                                    $walker = new wp_bootstrap_navwalker();

                                    $main_menu = wp_nav_menu(array(
                                        'menu' => 'Huvudmeny',
                                        'echo' => false,
                                        'depth' => 3,
                                        'container' => false,
                                        'menu_class' => 'nav navbar-nav',
                                        'walker' => $walker,
                                    ));

                                    echo $main_menu;
                                ?>
                            </div>

                                <?php include 'search-header.php'; ?>

                            <div id="my-parking" class="hidden-xs my-parking">
                                <?php include "my-parking-header.php"; ?>
                            </div>

                            <script id="favoriteTemplate" type="text/x-jsrender" data-jsv-tmpl="_0">
                                <li id="favorites-{{>id}}" class="item">
                                    <a href="/objekt/#?id={{>id}}">
                                        <div class="image">
                                            <img class="img-responsive" src="{{>image}}" onerror="this.onerror=null;this.src='http://customcms.bytbil.com/wp-content/uploads/sites/22/2015/07/upplands-no-image.jpg'">
                                            <div class="img-overlay"></div>
                                        </div>
                                        <div class="info">
                                            <p><strong>{{>title}}</strong></p>
                                            <p>{{>body}}</p>
                                            <p><strong>{{>price}}</strong></p>
                                        </div>
                                        <div class="choices">
                                            <div class="choice-button compare">
                                                <input type="checkbox" id="mp-compare-{{>id}}" name="mp-compare-{{>id}}">
                                                <label for="mp-compare-{{>id}}"></label>
                                                <p><strong>Jämför</strong></p>
                                            </div>
                                            <div class="choice-button delete" data-bbfavorite="{{>id}}" data-type="{{>type}}">
                                                <div>
                                                    <i class="icon icon-cross"></i>
                                                    <p><strong>Ta bort</strong></p>
                                                    <div style="clear: both;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="clear: both;"></div>
                                    </a>
                                </li>
                            </script>

                            <script id="offerTemplate" type="text/x-jsrender" data-jsv-tmpl="_1">
                                <li id="favorites-{{>id}}">
                                    <a href="{{>url}}">
                                        <div class="info">
                                            <p><strong>{{>title}}</strong></p>
                                        </div>
                                        <div class="choices">
                                            <div class="choice-button delete" data-bbfavorite="{{>id}}" data-type="{{>type}}">
                                                <div>
                                                    <i class="icon icon-cross"></i>
                                                    <p><strong>Ta bort</strong></p>
                                                    <div style="clear: both;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="clear: both;"></div>
                                    </a>
                                </li>
                            </script>

                            <script id="searchTemplate" type="text/x-jsrender" data-jsv-tmpl="_1">
                                <li class="favorites-search" data-search="{{>url}}">
                                    <a href="/bilar/bilar-i-lager/{{>url}}">
                                        <div class="info">
                                            <p><strong>{{>search}}</strong></p>
                                        </div>
                                        <div class="choices">
                                            <div class="choice-button delete" data-bbfavorite="{{>id}}" data-type="{{>type}}">
                                                <div>
                                                    <i class="icon icon-cross"></i>
                                                    <p><strong>Ta bort</strong></p>
                                                    <div style="clear: both;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="clear: both;"></div>
                                    </a>
                                </li>
                            </script>

                            <ul id="brands" class="nav navbar-nav pull-right">
                            <?php
                                $header_brands_keys = get_field('settings-brands', 'options');

                                if ($header_brands_keys) {
                                    foreach($header_brands_keys as $key => $var){
                                        $header_brands_keys[$key] = (int)$var;
                                        $page_link = get_brand_pagelink($header_brands_keys[$key]);
                                    ?>
                                    <li>
                                        <a target="_self" class="brand-link" href="<?php echo $page_link; ?>">
                                            <?php get_brand_logotype($header_brands_keys[$key]); ?>
                                        </a>
                                    </li>
                                    <?php
                                    }
                                }
                            ?>
                            </ul>
                            <?php
                                $contact_phone = get_field('settings-contact-phonenumber','options');
                                /*$service_phone = get_field('settings-contact-phonenumber-service','options');*/
                            ?>
                            <div class="header-contact-wrapper visible-xs">
                            <a href="tel:<?php echo $contact_phone; ?>" title="Ring oss på: <?php echo $contact_phone; ?>" class="header-contact button green button-fw fullwidth"><i class="icon icon-phone"></i> Växel</a>
                                </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div id="locations" class="spacing-sm hidden-xs">
                <span class="locations-title">
                    Här finns vi:
                </span>
                <?php
                    $find_us_menu = wp_nav_menu(array(
                        'menu' => 'Här finns vi',
                        'echo' => false,
                        'depth' => 1,
                        'container' => false,
                        'menu_class' => 'find-us-nav-list',
                        'theme_location' => 'find-us'
                    ));

                    echo $find_us_menu;
                ?>
            </div>
            
        </header>
