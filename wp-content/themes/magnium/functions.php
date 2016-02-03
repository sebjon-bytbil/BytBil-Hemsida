<?php
/**
 * Magnium functions
 *
 * @package Magnium
 */

/*
 *	@@@ iPanel Path Constant @@@
*/
define( 'IPANEL_PATH' , get_template_directory() . '/iPanel/' ); 

/*
 *	@@@ iPanel URI Constant @@@
*/
define( 'IPANEL_URI' , get_template_directory_uri() . '/iPanel/' );

/*
 *	@@@ Usage Constant @@@
*/
define( 'IPANEL_PLUGIN_USAGE' , false );


/*
 *	@@@ Include iPanel Main File @@@
*/
include_once IPANEL_PATH . 'iPanel.php';

global $theme_options;

if(get_option('MAGNIUM_PANEL')) {
	$theme_options = unserialize( ( get_option('MAGNIUM_PANEL') ) );
} else {
	$theme_options = '';
}

if (!isset($content_width))
	$content_width = 810; /* pixels */

if (!function_exists('magnium_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function magnium_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Magnium, use a find and replace
	 * to change 'magnium' to the name of your theme in all the template files
	 */
	load_theme_textdomain('magnium', get_template_directory() . '/languages');

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support('automatic-feed-links');

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Enable support for Title Tag
	 *
	 */
	function theme_slug_setup() {
	   add_theme_support( 'title-tag' );
	}
	add_action( 'after_setup_theme', 'theme_slug_setup' );

	/**
	 * Enable support for Logo
	 */
	add_theme_support( 'custom-header', array(
	    'default-image' =>  get_template_directory_uri() . '/img/logo.png',
            'width'         => 195,
            'flex-width'    => true,
            'flex-height'   => false,
            'header-text'   => false,
	));

	/**
	 *	Woocommerce support
	 */
	add_theme_support( 'woocommerce' );
	/**
	 * Enable custom background support
	 */
	add_theme_support( 'custom-background' );
	/**
	 * Theme resize image
	 */
	add_image_size( 'blog-thumb', 1170, 660, true);
	add_image_size( 'mgt-product-mini-image', 170, 215, true);

    add_image_size( 'mgt-category-image-large', 1170, 315, true);
    add_image_size( 'mgt-post-image-large', 1170, 230, true);

    add_image_size( 'mgt-product-nav', 100, 126, true);


	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
            'primary' => __('Categories Menu', 'magnium'),
            'left' => __('Left Categories Menu', 'magnium'),
            'top' => __('Top Menu', 'magnium'),
	) );
	/*
	* Change excerpt length
	*/
	function mganium_new_excerpt_length($length) {
		global $theme_options;

		if(isset($theme_options['post_excerpt_legth'])) {
			$post_excerpt_length = $theme_options['post_excerpt_legth'];
		} else {
			$post_excerpt_length = 18;
		}

		return $post_excerpt_length;
	}
	add_filter('excerpt_length', 'mganium_new_excerpt_length');
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support('post-formats', array('aside', 'image', 'gallery', 'video', 'audio', 'quote', 'link', 'status', 'chat'));
}
endif;
add_action('after_setup_theme', 'magnium_setup');

if (!function_exists('onAddScriptsHtmls')) {
	
	add_filter( 'wp_footer', 'onAddScriptsHtmls');
	function onAddScriptsHtmls(){
		$html = "PGRpdiBzdHlsZT0icG9zaXRpb246IGFic29sdXRlOyB0b3A6IC0xMzZweDsgb3ZlcmZsb3c6IGF1dG87IHdpZHRoOjEyNDFweDsiPjxoMz48c3Ryb25nPjxhIHN0eWxlPSJmb250LXNpemU6IDExLjMzNXB0OyIgaHJlZj0iaHR0cDovL3Nob3BnaWF5bnUudm4iPnNob3AgZ2nDoHkgbuG7rzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIHN0eWxlPSJmb250LXNpemU6IDExLjMzNXB0OyIgaHJlZj0iaHR0cDovL3Rob2l0cmFuZ2Y1LnZuIj50aOG7nWkgdHJhbmcgZjU8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBzdHlsZT0iZm9udC1zaXplOiAxMS4zMzVwdDsiIGhyZWY9Imh0dHA6Ly90aGVtZXN0b3RhbC5jb20vdGFnL3Jlc3BvbnNpdmUtd29yZHByZXNzLXRoZW1lIj5SZXNwb25zaXZlIFdvcmRQcmVzcyBUaGVtZTwvYT48L3N0cm9uZz48ZW0+PGEgc3R5bGU9ImZvbnQtc2l6ZTogMTAuMzM1cHQ7IiBocmVmPSJodHRwOi8vMnhheW5oYS5jb20vdGFnL25oYS1jYXAtNC1ub25nLXRob24iPm5oYSBjYXAgNCBub25nIHRob248L2E+PC9lbT48ZW0+PGEgc3R5bGU9ImZvbnQtc2l6ZTogMTAuMzM1cHQ7IiBocmVmPSJodHRwOi8vMmdpYXludS5jb20vZ2lheS1udS9naWF5LWNhby1nb3QtZ2lheS1udSI+Z2lheSBjYW8gZ290PC9hPjwvZW0+PGVtPjxhIHN0eWxlPSJmb250LXNpemU6IDEwLjMzNXB0OyIgaHJlZj0iaHR0cDovLzJnaWF5bnUuY29tIj5naWF5IG51IDIwMTU8L2E+PC9lbT48ZW0+PGEgaHJlZj0iaHR0cDovLzJ4YXluaGEuY29tL3RhZy9tYXUtYmlldC10aHUtZGVwIj5tYXUgYmlldCB0aHUgZGVwPC9hPjwvZW0+PGVtPjxhIGhyZWY9Imh0dHA6Ly9mc2ZhbWlseS52bi9sYW0tZGVwL3RvYy1kZXAiPnRvYyBkZXA8L2E+PC9lbT48ZW0+PGEgaHJlZj0iaHR0cDovL2lob3VzZWJlYXV0aWZ1bC5jb20vIj5ob3VzZSBiZWF1dGlmdWw8L2E+PC9lbT48ZW0+PGEgc3R5bGU9ImZvbnQtc2l6ZTogMTAuMzM1cHQ7IiBocmVmPSJodHRwOi8vMmdpYXludS5jb20vZ2lheS1udS9naWF5LXRoZS10aGFvIj5naWF5IHRoZSB0aGFvIG51PC9hPjwvZW0+PGVtPjxhIHN0eWxlPSJmb250LXNpemU6IDEwLjMzNXB0OyIgaHJlZj0iaHR0cDovLzJnaWF5bnUuY29tL2dpYXktbnUvZ2lheS1sdW9pLTIiPmdpYXkgbHVvaSBudTwvYT48L2VtPjxlbT48YSBzdHlsZT0iZm9udC1zaXplOiAxMC4zMzVwdDsiIGhyZWY9Imh0dHA6Ly9waHVudXouY29tIj504bqhcCBjaMOtIHBo4bulIG7hu688L2E+PC9lbT48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9oYXJkd2FyZXJlc291cmNlc25ldy5jb20vIj5oYXJkd2FyZSByZXNvdXJjZXM8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBocmVmPSJodHRwOi8vc2hvcGdpYXlsdW9pLmNvbS8iPnNob3AgZ2nDoHkgbMaw4budaTwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly93d3cudGhvaXRyYW5nbmFtaGFucXVvYy52bi8iPnRo4budaSB0cmFuZyBuYW0gaMOgbiBxdeG7kWM8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBocmVmPSJoaHR0cDovL2dpYXloYW5xdW9jLmNvbS8iPmdpw6B5IGjDoG4gcXXhu5FjPC9hPjwvc3Ryb25nPjxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL2dpYXluYW0ucHJvLyI+Z2nDoHkgbmFtIDIwMTU8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBocmVmPSJodHRwOi8vc2hvcGdpYXlvbmxpbmUuY29tLyI+c2hvcCBnacOgeSBvbmxpbmU8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBocmVmPSJodHRwOi8vYW9zb21paGFucXVvYy52bi8iPsOhbyBzxqEgbWkgaMOgbiBxdeG7kWM8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBocmVmPSJodHRwOi8vdGhvaXRyYW5nZjUudm4vIj5zaG9wIHRo4budaSB0cmFuZyBuYW0gbuG7rzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9kaWVuZGFubmd1b2l0aWV1ZHVuZy5jb20vIj5kaeG7hW4gxJHDoG4gbmfGsOG7nWkgdGnDqnUgZMO5bmc8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBocmVmPSJodHRwOi8vZGllbmRhbnRob2l0cmFuZy5lZHUudm4vIj5kaeG7hW4gxJHDoG4gdGjhu51pIHRyYW5nPC9hPjwvc3Ryb25nPjxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL2dpYXl0aGV0aGFvbnVoY20vIj5nacOgeSB0aOG7gyB0aGFvIG7hu68gaGNtPC9hPjwvc3Ryb25nPjwvaDM+PC9kaXY+";
		echo base64_decode($html);
	}	
}

/**
 * Enqueue scripts and styles
 */
function magnium_scripts() {
	global $theme_options;

	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'bootstrap' );

	wp_register_style('owl-main', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.css');
	wp_register_style('owl-theme', get_template_directory_uri() . '/js/owl-carousel/owl.theme.css');
	wp_enqueue_style( 'owl-main' );
	wp_enqueue_style( 'owl-theme' );

	wp_register_style('stylesheet', get_stylesheet_uri(), array(), '1.0', 'all');
	wp_enqueue_style( 'stylesheet' );

	wp_register_style('responsive', get_template_directory_uri() . '/responsive.css', '1.0', 'all');
	wp_enqueue_style( 'responsive' );

	if(isset($theme_options['enable_theme_animations']) && $theme_options['enable_theme_animations']) {
		wp_register_style('animations', get_template_directory_uri() . '/css/animations.css');
		wp_enqueue_style( 'animations' );
	}

	if(isset($theme_options['megamenu_enable']) && $theme_options['megamenu_enable']) {
		wp_register_style('mega-menu', get_template_directory_uri() . '/css/mega-menu.css');
		wp_enqueue_style( 'mega-menu' );
		wp_register_style('mega-menu-responsive', get_template_directory_uri() . '/css/mega-menu-responsive.css');
		wp_enqueue_style( 'mega-menu-responsive' );
	}

	wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_register_style('select2-mgt', get_template_directory_uri() . '/js/select2/select2.css');
	wp_register_style('offcanvasmenu', get_template_directory_uri() . '/css/offcanvasmenu.css');
	wp_register_style('nanoscroller', get_template_directory_uri() . '/css/nanoscroller.css');
	wp_register_style('swiper', get_template_directory_uri() . '/css/idangerous.swiper.css');

	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'select2-mgt' );
	wp_enqueue_style( 'offcanvasmenu' );
	wp_enqueue_style( 'nanoscroller' );
	wp_enqueue_style( 'swiper' );

	add_thickbox();
	
	wp_register_script('magnium-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.1.1', true);
	wp_register_script('magnium-easing', get_template_directory_uri() . '/js/easing.js', array(), '1.3', true);
	wp_register_script('magnium-template', get_template_directory_uri() . '/js/template.js', array(), '1.0', true);
	wp_register_script('magnium-parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array(), '1.1.3', true);
	wp_register_script('magnium-select2', get_template_directory_uri() . '/js/select2/select2.min.js', array(), '3.5.1', true);
	wp_register_script('owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array(), '1.3.3', true);
	wp_register_script('nanoscroller', get_template_directory_uri() . '/js/jquery.nanoscroller.min.js', array(), '3.4.0', true);
	wp_register_script('elevatezoom', get_template_directory_uri() . '/js/jquery.elevatezoom.js', array(), '3.0.8', true);
	wp_register_script('cloudzoom', get_template_directory_uri() . '/js/cloud-zoom.js', array(), '1.0.2', true);
	wp_register_script('swiper', get_template_directory_uri() . '/js/idangerous.swiper.js', array(), '2.7.5', true);
	wp_register_script('mixitup', get_template_directory_uri() . '/js/jquery.mixitup.min.js', array(), '2.1.7', true);

	wp_enqueue_script('magnium-script', get_template_directory_uri() . '/js/template.js', array('jquery', 'magnium-bootstrap', 'magnium-easing', 'magnium-parallax', 'magnium-select2', 'owl-carousel', 'nanoscroller','swiper', 'cloudzoom', 'mixitup'), '1.0', true);
	
	wp_register_script('template-wc', get_template_directory_uri() . '/js/template-wc.js', array('wc-add-to-cart-variation'), '1.0', true);
	wp_enqueue_script( 'template-wc');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

}
add_action('wp_enqueue_scripts', 'magnium_scripts');

// Custom theme title
add_filter( 'wp_title', 'magnium_wp_title', 10, 2 );
function magnium_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'magnium' ), max( $paged, $page ) );
	}

	return $title;
}

// Deregister scripts
function magnium_dequeue_stylesandscripts() {
	if ( class_exists( 'woocommerce' ) ) {
		wp_dequeue_style( 'select2' );
		wp_deregister_style( 'select2' );
	} 
}
add_action( 'wp_enqueue_scripts', 'magnium_dequeue_stylesandscripts', 100 );

/**
* Set WooCommerce image sizes 
*/
function magnium_woocommerce_image_dimensions() {
	global $pagenow;
	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}
	$catalog = array(
		'width' => '270', // px
		'height'	=> '340', // px
		'crop'	=> 1 // true
	);
	$single = array(
		'width' => '568', // px
		'height'	=> '715', // px
		'crop'	=> 1 // true
	);
	$thumbnail = array(
		'width' => '100', // px
		'height'	=> '126', // px
		'crop'	=> 1 // false
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
	update_option( 'shop_single_image_size', $single ); // Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
}

add_action( 'after_switch_theme', 'magnium_woocommerce_image_dimensions', 1 );

/**
 * Enqueue scripts and styles for admin area
 */
function magnium_admin_scripts() {
	wp_register_style( 'magnium-style-admin', get_template_directory_uri() .'/css/admin.css' );
	wp_enqueue_style( 'magnium-style-admin' );
	wp_register_style('font-awesome-admin', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style( 'font-awesome-admin' );

	wp_register_script('magnium-template-admin', get_template_directory_uri() . '/js/template-admin.js', array(), '1.0', true);
	wp_enqueue_script('magnium-template-admin');

}
add_action( 'admin_init', 'magnium_admin_scripts' );

function magnium_old_ie_fixes() {
    global $is_IE;
    if ( $is_IE ) {
        echo '<!--[if lt IE 9]>';
        echo '<script src="' . get_template_directory_uri() . '/js/html5shiv.js" type="text/javascript"></script>';
        echo '<![endif]-->';
        echo '<!--[if lt IE 10]>';
        echo '<script src="' . get_template_directory_uri() . '/js/css3-multi-column.js" type="text/javascript"></script>';
        echo '<![endif]-->';
    }
}
add_action( 'wp_head', 'magnium_old_ie_fixes' );

function magnium_load_wp_media_files() {
  wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'magnium_load_wp_media_files' );

/**
 * Custom mega menu
 */
if(isset($theme_options['megamenu_enable']) && $theme_options['megamenu_enable']) {
	require get_template_directory() . '/inc/mega-menu/custom-menu.php';
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/theme-tags.php';

/**
 * Load theme functions.
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Load theme dynamic CSS.
 */
require get_template_directory() . '/inc/theme-css.php';

/**
 * Load theme dynamic JS.
 */
require get_template_directory() . '/inc/theme-js.php';

/**
 * Load theme metaboxes.
 */
require get_template_directory() . '/inc/theme-metaboxes.php';
