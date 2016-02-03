<?php header("Access-Control-Allow-Origin: http://access.bytbil.com"); ?>

<!DOCTYPE html>

<?php ob_start(); ?>

<html lang="en" <?php if (is_user_logged_in()) {
    echo 'class="push-down-admin-menu"';
} ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1;">
    <title><?php
        if(get_field('pagesettings-title-tag') && get_field('settings-title','options')){
            echo get_field('pagesettings-title-tag') . " | " . get_field('settings-title','options');
        }
        elseif(get_field('pagesettings-title-tag')){
            echo get_field('pagesettings-title-tag');
        }
        elseif(get_field('settings-title','options')){
            echo get_field('settings-title','options') . " | " . wp_title('|',true,'right');
        }
        else {
            //echo bloginfo('name') . " | " . wp_title(' | ', true, 'right') . ' | ' . bloginfo('description');
            echo wp_title(' | ', true, 'right') . bloginfo('name') . ' - '; echo bloginfo('description');
        }
        ?></title>
    <meta name="description" content="<?php
        if(get_field('pagesettings-meta-description')){
            echo get_field('pagesettings-meta-description');
        } else {
            echo get_field('settings-meta-description','options');
        }
    ?>"/>
    <meta name="keywords" content="<?php
        if(get_field('pagesettings-meta-keywords')){
            echo get_field('pagesettings-meta-keywords');
        } else {
            echo get_field('settings-meta-keywords','options');
        }
    ?>"/>

    <?php wp_head(); ?>

    <script type="text/javascript">
        var htmldoc = document.documentElement;
        htmldoc.setAttribute('data-useragent', navigator.userAgent);
        
        (function(doc) {
            var addEvent = 'addEventListener',
                type = 'gesturestart',
                qsa = 'querySelectorAll',
                scales = [1, 1],
                meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

            function fix() {
                meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
                doc.removeEventListener(type, fix, true);
            }

            if ((meta = meta[meta.length - 1]) && addEvent in doc) {
                fix();
                scales = [.25, 1.6];
                doc[addEvent](type, fix, true);
            }

        }(document));
    </script>

    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/jasny-bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/jquery.cookiebar.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri() . '/js/matchMedia.js'; ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/js/html5shiv.min.js'; ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/js/respond.min.js'; ?>"></script>
    <![endif]-->
    
 
</head>
<?php
$header_logotype = get_field('header-logotype', 'options');
$header_logotype_url = $header_logotype['url'];

$walker = new wp_bootstrap_navwalker();

$about_menu = wp_nav_menu(array(
    'menu' => 'Om företaget',
    'echo' => false,
    'depth' => 1,
    'container' => false,
    'menu_class' => 'dropdown-menu',
    'theme_location' => 'about'
));

$contact_menu = wp_nav_menu(array(
    'menu' => 'Kontakta oss',
    'echo' => false,
    'depth' => 1,
    'container' => false,
    'menu_class' => 'dropdown-menu',
    'theme_location' => 'contact'
));

$mobile_contact_menu = wp_nav_menu(array(
    'menu' => 'Kontakta oss',
    'echo' => false,
    'depth' => 1,
    'container' => false,
    'theme_location' => 'contact'
));


$main_menu = wp_nav_menu(array(
    'menu' => 'Huvudmeny',
    'echo' => false,
    'depth' => 3,
    'container' => false,
    'menu_class' => 'nav navbar-nav',
    'walker' => $walker,
));

?>

<body <?php body_class(); ?>>
<!--<div class="mobile-contact-menu"><?php echo $mobile_contact_menu; ?></div>-->
    <?php
    $facebook_show = get_field('facebook-show', 'options');
    if($facebook_show=='true'){ ?>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v2.3&appId=892905050767006";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <?php } ?>
<header>
    <div class="wrapper">
        <div class="col-xs-12">



            <a href="<?php echo home_url(); ?>">
                <img class="logotype hidden-xs" src="<?php echo $header_logotype_url; ?>" alt="Gustaf E Bil"
                     title="Gustaf E Bil">
            </a>
            <nav id="top-menu" role="navigation">

                <div class="mobile-contact-menu"><?php echo $mobile_contact_menu; ?></div>

                <button type="button" class="visible-xs navbar-toggle pull-left" data-toggle="offcanvas"
                        data-target="#mobile-menu" data-canvas="body">
                    <span class="sr-only">Toggle navigation</span>
                    <i data-toggle="offcanvas" data-target="#mobile-menu" data-canvas="body" class="fa fa-bars"></i>
                </button>

                <a href="<?php echo home_url(); ?>" class="hidden-sm hidden-md hidden-lg" style="width: 150px; height: 60px; display: block; position: absolute; top: 0; left: 50%; margin-left: -75px; background-color: transparent !important;">&nbsp;</a>

                <div class="pull-right">
                    <ul class="nav navbar-nav">


                        <li class="dropdown hidden-xs">
                            <a href="#" class="about dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="entypo circled-info"></i><span class="hidden-xs"> Om företaget</span></a>
                            <?php echo $about_menu; ?>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a href="#" class="contact dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="entypo mail"></i><span
                                    class="hidden-xs"> Kontakta oss</span></a>
                            <?php echo $contact_menu; ?>
                        </li>
                        <li class="hidden-xs">
                            <?php get_search_form(); ?>
                        </li>
                        <li>
                            <button class="scrollup"><i class="fa fa-2x fa-angle-up"></i>
                            </button>
                        </li>
                    </ul>
                    <a href="#" class="contact-toggle visible-xs"><i class="entypo mail"></i></a>
                </div>
            </nav>
            <nav id="mobile-menu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
                <a href="<?php echo home_url(); ?>">
                    <img class="logotype visible-xs" src="<?php echo $header_logotype_url; ?>" alt="Gustaf E Bil"
                         title="Gustaf E Bil">
                </a>

                <div class="clearfix"></div>

                <?php echo $main_menu; ?>

                <div id="search-form">
                    <form role="search" method="get" class="search-form" action="">
                        <label>
                            <input type="search" class="search-field" placeholder="Sök på gustafebil.se" value="" name="s" title="Sök efter">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>
                </div>

                <div id="quick-call">
                    <?php
                        while (have_rows('setting-mobile-numbers', 'options')) {
                            the_row();
                            $facility = get_sub_field('setting-mobile-numbers-facility');
                            $id = $facility->ID;
                        ?>
                        <a href="tel:<?php echo bytbil_show_first_facility_phonenumber_clean($id); ?>"><i class="entypo phone"></i> <?php echo get_the_title($id); ?></a>
                    <?php
                        }
                    ?>

                </div>

            </nav>
            <div class="clearfix"></div>

            <nav id="main-menu" class="navbar" role="navigation">
                <div class="pull-right hidden-xs">
                    <?php echo $main_menu; ?>
                </div>
            </nav>
        </div>
    </div>
</header>
