<?php
/*
Template Name: Mina favoriter
 */

$hash = urldecode($wp_query->query_vars['h']);

$BytBilFavorites = new BytBilFavorites();
$list = $BytBilFavorites->getFavoritesList($hash);
if (!$list) {
    $wp_query->set_404();
    status_header(404);
    get_template_part(404); exit();
}

$base_url = get_site_url();
$description = '';

if ($list['cars']['amount'] > 0) {
    $description .= 'Fordon:
        ';
    foreach ($list['cars']['items'] as $car) {
        $description .= $car->title . ' - ' . $car->body . ' - ' . $car->price . '
            ';
        $description .= $base_url . '/objekt/#?id=' . $car->id . '
            ';
        $description .= '------------- ';
    }
}

if ($list['offers']['amount'] > 0) {
    $description .= 'Erbjudanden:
        ';
    foreach ($list['offers']['items'] as $offer) {
        $description .= $offer->title . '
            ';
        $description .= $offer->url . '
            ';
        $description .= '------------- ';
    }
}

$email = $BytBilFavorites->getEmailFromHash($hash);
preg_match('/(.*)\@/', $email, $matches);
$email = $matches[1];


?>
<!DOCTYPE html>
<html lang="en"
    <?php if (is_user_logged_in()) {
    echo 'class="push-down-admin-menu"';
    } ?>>

    <head>
        <?php wp_head(); ?>
        <meta property="og:title" content="Se mina favoriter som jag har sparat på upplandsmotor.se">
        <meta property="og:description" content="<?php echo $description; ?>">
        <meta property="og:url" content="http://upplandsmotor.se/mina-favoriter/?h=<?php echo $hash; ?>">
        <meta property="og:image" content="http://upplandsmotor.se/wp-content/themes/upplands-motor-2015/images/upplands-motor-logotype-fb.jpg">
        <title>Upplands Motor | Mina favoriter</title>
        <link href="/wp-content/themes/upplands-motor-2015/minified/css/style.min.css?ver=gQKsHz5LgumdKuze3CGz" rel="stylesheet">
    </head>

    <body <?php body_class(); ?>>

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
                                $header_brands_keys = $option_fields['settings-brands'];

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

        <main>
            <section class="section-block dark">
                <div class="container-fluid wrapper default-padding">
                    <div id="myFavorites" class="col-xs-12">
                        <h2><?php echo $email; ?>'s favoriter</h2>
                        <div class="ftabs">
                            <div class="ftab active" data-tabid="fvehicles">
                                <i class="icon icon-cab"></i>
                                <p><strong>Fordon</strong> (<span><?php echo $list['cars']['amount']; ?></span>)</p>
                            </div>
                            <div class="ftab" data-tabid="foffers">
                                <i class="icon icon-folder"></i>
                                <p><strong>Erbjudanden</strong> (<span><?php echo $list['offers']['amount']; ?></span>)</p>
                            </div>
                            <div class="ftab" data-tabid="fsubs">
                                <i class="icon icon-eye"></i>
                                <p><strong>Bevakningar</strong> (<span><?php echo $list['subs']['amount']; ?></span>)</p>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="fvehicles-content ftab-content active">
                            <p class="mobile-headline"><strong>Fordon</strong></p>
                            <ul>
                            <?php if ($list['cars']['amount'] > 0) : ?>
                                <?php foreach ($list['cars']['items'] as $car) : ?>
                                <li>
                                    <a href="<?php echo '/objekt/#?id=' . $car->id; ?>">
                                        <div class="image">
                                            <img class="img-responsive" src="<?php echo $car->image; ?>" onerror="this.onerror=null;this.src='http://customcms.bytbil.com/wp-content/uploads/sites/22/2015/07/upplands-no-image.jpg'">
                                            <div class="img-overlay"></div>
                                        </div>
                                        <div class="info">
                                            <p><strong><?php echo $car->title; ?></strong></p>
                                            <p><?php echo $car->body; ?></p>
                                            <p><strong><?php echo $car->price; ?></strong></p>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p><?php echo $email; ?> har inte lagt till några fordon.</p>
                            <?php endif; ?>
                            </ul>
                        </div>
                        <div class="foffers-content ftab-content">
                            <p class="mobile-headline"><strong>Erbjudanden</strong></p>
                            <ul>
                            <?php if ($list['offers']['amount'] > 0) : ?>
                                <?php foreach ($list['offers']['items'] as $offer) : ?>
                                <li>
                                    <a href="<?php echo $offer->url; ?>">
                                        <div class="info">
                                            <p><strong><?php echo $offer->title; ?></strong></p>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p><?php echo $email; ?> har inte lagt till några erbjudanden.</p>
                            <?php endif; ?>
                            </ul>
                        </div>
                        <div class="fsubs-content ftab-content">
                            <p class="mobile-headline"><strong>Bevakningar</strong></p>
                            <ul>
                            <?php if ($list['subs']['amount'] > 0) : ?>
                                <?php foreach ($list['subs']['items'] as $sub) : ?>
                                <li>
                                    <a href="/bilar/bilar-i-lager/<?php echo $sub->url; ?>">
                                        <div class="info">
                                            <p><strong><?php echo $sub->search; ?></strong></p>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p><?php echo $email; ?> har inte lagt till några bevakningar.</p>
                            <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </main>

<?php get_footer(); ?>
