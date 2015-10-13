<?php

function exists($var) {
    if (isset($var) && $var !== '') {
        return true;
    }
    return false;
}


require_once('plugins/BBCore/BBCore.php');
/* Registrera plugins */
include_once('plugins/AccessApi.php');
include_once('plugins/wp_bootstrap_navwalker.php');
include_once('plugins/upplands-motor-settings/um-settings.php');
include_once('plugins/bytbil-content-management/bytbil-content-management.php');
include_once('plugins/intranet/IntranetHandler.php');
include_once('plugins/intranet/companies.php');
include_once('plugins/intranet/services/services.php');
include_once('plugins/um-form.php');
include_once('plugins/favorites/favorites.php');

//To not conflict on Admin Post Type Search
global $pagenow;
if ($pagenow != 'edit.php') {
    include_once('plugins/um-search.php');
}

add_action( 'wp_enqueue_scripts', 'register_upplandsmotor_scripts' );
function register_upplandsmotor_scripts() {
    //wp_register_script( $handle, $src, $deps, $ver, $in_footer );
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), "1.11.1", true );
     wp_localize_script( 'jquery', 'bbfavorites',
              array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
    wp_enqueue_script( 'jquery' );

   

}

function um_color_picker()
{
    if (wp_script_is('wp-color-picker', 'enqueued')) {
        wp_enqueue_script('um-color-picker', get_stylesheet_directory_uri() . '/plugins/upplands-motor-settings/color-picker.js');
    }
}
add_action('admin_enqueue_scripts', 'um_color_picker');
add_theme_support('post-thumbnails');
/* Registrera Menyer */
function upplandsmotor_register_menu()
{
    register_nav_menu(
        'primary', 'Huvudmeny'
    );
    register_nav_menus(array(
        'find-us' => 'Här finns vi',
        'footer' => 'Sidfot',
        'shortcuts' => 'Genvägar',
    ));
}
add_action('init', 'upplandsmotor_register_menu');
function acf_set_featured_image($value, $post_id, $field)
{
    if ($value != '') {
        //Add the value which is the image ID to the _thumbnail_id meta data for the current post
        if (has_post_thumbnail($post_id)) {
            update_post_meta($post_id, '_thumbnail_id', $value);
        } else {
            add_post_meta($post_id, '_thumbnail_id', $value);
        }
    }
    return $value;
}
// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=vehicle-image', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=modelgroup-image', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=offer-image', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=employee-image', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=testimonial-image', 'acf_set_featured_image', 10, 3);
function get_field_label($field_key, $post_id = null)
{
    $field = get_field_object($field_key, $post_id);
    $value = get_field($field_key, $post_id);
    return $field['choices'][$value];
}

function recursiveMobileMenu($rows){
        foreach($rows as $row => $item){
                if ($item["row-settings-section"] != "") {
                    foreach ($item["row-settings-section"] as $subkey => $subitem) {
                        $tmpId = $subitem->ID;
                        $childRows = get_field('row',$tmpId);
                        recursiveMobileMenu($childRows);
                    }
                    
                }else{
                    $sub_menu_header = $item['row-settings-menu-header'];
                    $sub_menu_slug = get_slug($sub_menu_header);

                
                    ?>
                    <li>
                        <a href="#<?php echo $sub_menu_slug; ?>">
                            <?php echo $sub_menu_header; ?>
                        </a>
                    </li>
                    <?php
                    
                    $counter++;
                }
                
            }
        
    }

function recursiveMenu($rows, &$counter, &$row_count){
        foreach($rows as $row => $item){
                if ($item["row-settings-section"] != "") {
                    foreach ($item["row-settings-section"] as $subkey => $subitem) {
                        $tmpId = $subitem->ID;
                        $childRows = get_field('row',$tmpId);
                        $row_count = $row_count + count($childRows) - 1;
                        recursiveMenu($childRows, $counter, $row_count);
                    }
                    
                }else{
                    $sub_menu_header = $item['row-settings-menu-header'];
                    $sub_menu_slug = get_slug($sub_menu_header);

                    if($counter==1){
                        $item_class = 'first';
                    ?>
                    <div class="item <?php echo $item_class; ?>">
                        <a href="#">&nbsp;</a>
                        <span></span>
                    </div>
                    <?php
                    }
                    if($counter!=1){
                        $item_class = '';
                    ?>

                    <div class="item <?php echo $item_class; ?>">
                        <a href="#<?php echo $sub_menu_slug; ?>">
                            <?php echo $sub_menu_header; ?>
                        </a>
                        <span></span>
                    </div>
                    

                    <?php
                    }
                    if($counter==$row_count){
                        $item_class = 'last';
                    ?>
                    <div class="item <?php echo $item_class; ?>">
                        <a href="#">&nbsp;</a>
                        <span></span>
                    </div>
                    <?php
                    }
                    $counter++;
                }
                
            }
        
    }

    add_filter( 'search_match_word_to_status_old', 'word_match_status_old', 10, 1 );
    add_filter( 'search_match_word_to_status_new', 'word_match_status_new', 10, 1 );

    function word_match_status_old($matches){
        $arr = array(
            'beg',
            'begagnad',
            'begagnade'
        );
        return array_merge($arr, $matches);
    }

    function word_match_status_new($matches){
        $arr = array(
            'ny',
            'nya',
            'fabriksny'
        );
        return array_merge($arr, $matches);
    }

    function get_object_meta_data()
    {
        $brand = isset($_GET['ogb']) ? $_GET['ogb'] : null;
        $model = isset($_GET['ogm']) ? $_GET['ogm'] : null;
        $modeldesc = isset($_GET['ogmd']) ? $_GET['ogmd'] : null;
        $city = isset($_GET['ogc']) ? $_GET['ogc'] : null;
        $year = isset($_GET['ogy']) ? $_GET['ogy'] : null;
        $miles = isset($_GET['ogmi']) ? number_format((int) $_GET['ogmi'], 0, '', ' ') : null;
        $gearbox = isset($_GET['oggb']) ? $_GET['oggb'] : null;
        $bodytype = isset($_GET['ogbt']) ? $_GET['ogbt'] : null;
        $color = isset($_GET['ogco']) ? $_GET['ogco'] : null;
        $fuel = isset($_GET['ogf']) ? $_GET['ogf'] : null;
        $regnr = isset($_GET['ogrn']) ? $_GET['ogrn'] : null;
        $price = isset($_GET['ogp']) ? number_format((int) $_GET['ogp'], 0, '', ' ') . ' kr' : null;
        $image = isset($_GET['ogi']) ? $_GET['ogi'] : null;
        ?>
        <meta property="og:title" content="<?php echo $brand . ' ' . $model . ' hos Upplands Motor ' . $city . ' | ' . $price; ?>" />
        <meta property="og:description" content="<?php echo $brand . ' ' . $model . ' ' . $modeldesc . ' - Årsmodell: ' . $year . ' - Miltal: ' . $miles . ' - Växellåda: ' . $gearbox . ' - Kaross: ' . $bodytype . ' - Färg: ' . $color . ' - Bränsle: ' . $fuel . ' - Reg.nr: ' . $regnr; ?>" />
        <meta property="og:image" content="<?php echo $image; ?>" />
        <meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <?php
    }


    add_filter( 'bbsitemap_posttypes', 'add_sitemap_types', 10, 1);

    function add_sitemap_types($types){
        $types[] = 'offer';
        $types[] = 'news';
        return $types;
    }

    add_filter( 'bbsitemap_extraUrls', 'bbsitemap_extraUrls_add', 10, 1 );

    function bbsitemap_extraUrls_add($urls){
        global $wp_version;
        $url = "http://elasticaccess.herokuapp.com/api/cars/?s=*&pageSize=2000";
        $r = wp_remote_get( $url, array(
            'timeout'     => 30,
            'redirection' => 10,
            'httpversion' => '1.1',
            'user-agent'  => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' ),
            'blocking'    => true,
            'cookies'     => array(),
            'body'        => null,
            'compress'    => false,
            'decompress'  => true,
            'sslverify'   => true,
            'stream'      => false,
            'filename'    => null,
            'headers' => array( "x-authentication" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkZWFsZXIiOiJ1cHBsYW5kc21vdG9yIn0.mq-UIAa7nlZJ3Sct5XLn1N6FONKjHhCI2ePJZoakoZc")
        ));
        $car = json_decode($r['body']);
        $car->similarCars = null;
        $cars = $car->cars;

        $carUrls = array();
        foreach ($cars as $key => $car) {
            $carUrls[] = get_site_url() . "/bilar/bilar-i-lager/objekt/?redirecttohash=true&id=" . $car->id;
        }
        return $carUrls;
    }


    add_filter('query_vars', 'add_favorites_query_var');
    function add_favorites_query_var($vars)
    {
        $vars[] = 'h';
        return $vars;
    }

    add_filter('rewrite_rules_array', 'add_favorites_rewrite_rule');
    function add_favorites_rewrite_rule($rules)
    {
        $new_rule = array('mina-favoriter/([^/]+)/?$' => 'index.php?pagename=mina-favoriter&h=$matches[1]');
        $rules = $new_rule + $rules;
        return $rules;
    }

    //hello!
    // this is redirect for seo reasons
    // google is dumb and ajax is great...
    // here we go..
    // google gets a sitemap for all the objects with a url with a param with name redirecttohash and is set to true
    // when wordpress gets this param it will remove this param and rewrite it to a hashed, angular specific, url instead.

    add_action( "init", "objectRedirect", 1, 1 );
    function objectRedirect(){
        // 0.5 dont do this in admin
        if (is_admin()) {
            return;
        }
        // 1. see if param is set
        if (!isset($_GET['redirecttohash'])) {
            return;
        }
        // 2. check if is spider or bot
        if (crawlerDetect($_SERVER['HTTP_USER_AGENT']) == true) {
            return;
        }


        // 3. extract id
        $objectId = isset($_GET['id']) ? $_GET['id'] : "";
        // 4. create new uri
        $url = strtok($_SERVER["REQUEST_URI"],'?') . "#?id=" . $objectId;
        
        // 5. set header location
        header("Location: " . $url);
        // 6. DIE! cuz stuff (http://thedailywtf.com/articles/WellIntentioned-Destruction)
        die();
    }

    function isCrawler(){
        return crawlerDetect($_SERVER['HTTP_USER_AGENT']);
    }
    function crawlerDetect($USER_AGENT){
        $crawlers = array(
            'Google' => 'Google',
            'MSN' => 'msnbot',
            'Rambler' => 'Rambler',
            'Yahoo' => 'Yahoo',
            'AbachoBOT' => 'AbachoBOT',
            'accoona' => 'Accoona',
            'AcoiRobot' => 'AcoiRobot',
            'ASPSeek' => 'ASPSeek',
            'CrocCrawler' => 'CrocCrawler',
            'Dumbot' => 'Dumbot',
            'FAST-WebCrawler' => 'FAST-WebCrawler',
            'GeonaBot' => 'GeonaBot',
            'Gigabot' => 'Gigabot',
            'Lycos spider' => 'Lycos',
            'MSRBOT' => 'MSRBOT',
            'Altavista robot' => 'Scooter',
            'AltaVista robot' => 'Altavista',
            'ID-Search Bot' => 'IDBot',
            'eStyle Bot' => 'eStyle',
            'Scrubby robot' => 'Scrubby',
            'Facebook' => 'facebookexternalhit',
        );
        // to get crawlers string used in function uncomment it
        // it is better to save it in string than use implode every time
        // global $crawlers
        $crawlers_agents = implode('|',$crawlers);
        if (strpos($crawlers_agents, $USER_AGENT) === false)
          return false;
        else {
            return true;
        }
    }
?>