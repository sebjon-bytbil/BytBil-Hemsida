<?php
/**
 * Twenty Thirteen functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
date_default_timezone_set('Europe/Stockholm');
setlocale(LC_ALL, 'sv_SE', 'sv_SE.iso88591', 'sv_SE.iso885915', 'sv_SE.utf8', 'swedish');

include(__DIR__ . '/plugins/nyberg_personal/bytbil_personal.php');
include(__DIR__ . '/plugins/nyberg_slider/bytbil-slider.php');
include(__DIR__ . '/plugins/bytbil_misc/bytbil-misc.php');
include(__DIR__ . '/plugins/bytbil_feed/bytbil_feed.php');
include(__DIR__ . '/plugins/acf-options-page/acf-options-page.php');
include(__DIR__ . '/plugins/eps-301-redirects/eps-301-redirects.php');

/*
 * Set up the content width value based on the theme's design.
 *
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
if (!isset($content_width))
    $content_width = 604;
/**
 * Add support for a custom header image.
 */
/*require get_template_directory() . '/inc/custom-header.php'; */
/**
 * Twenty Thirteen only works in WordPress 3.6 or later.
 */
if (version_compare($GLOBALS['wp_version'], '3.6-alpha', '<'))
    require get_template_directory() . '/inc/back-compat.php';
/**
 * Twenty Thirteen setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Thirteen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_setup()
{
    /*
     * Makes Twenty Thirteen available for translation.
     *
     * Translations can be added to the /languages/ directory.
     * If you're building a theme based on Twenty Thirteen, use a find and
     * replace to change 'twentythirteen' to the name of your theme in all
     * template files.
     */
    load_theme_textdomain('twentythirteen', get_template_directory() . '/languages');
    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    add_editor_style(array('css/editor-style.css', 'fonts/genericons.css', twentythirteen_fonts_url()));
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');
    /*
     * Switches default core markup for search form, comment form,
     * and comments to output valid HTML5.
     */
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));
    /*
     * This theme supports all available post formats by default.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats', array(
        'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
    ));
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', __('Navigation Menu', 'twentythirteen'));
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(604, 270, true);
    // This theme uses its own gallery styles.
    add_filter('use_default_gallery_style', '__return_false');
}

add_action('after_setup_theme', 'twentythirteen_setup');
/**
 * Return the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentythirteen_fonts_url()
{
    $fonts_url = '';
    /* Translators: If there are characters in your language that are not
     * supported by Source Sans Pro, translate this to 'off'. Do not translate
     * into your own language.
     */
    $source_sans_pro = _x('on', 'Source Sans Pro font: on or off', 'twentythirteen');
    /* Translators: If there are characters in your language that are not
     * supported by Bitter, translate this to 'off'. Do not translate into your
     * own language.
     */
    $bitter = _x('on', 'Bitter font: on or off', 'twentythirteen');
    if ('off' !== $source_sans_pro || 'off' !== $bitter) {
        $font_families = array();
        if ('off' !== $source_sans_pro)
            $font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';
        if ('off' !== $bitter)
            $font_families[] = 'Bitter:400,700';
        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );
        $fonts_url = add_query_arg($query_args, "//fonts.googleapis.com/css");
    }
    return $fonts_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
register_nav_menus(array(
    'verktyg' => 'Verktyg',
    'omnybergs' => 'Om Nybergs',
));
function get_menu_by_location($location)
{
    if (empty($location)) return false;
    $locations = get_nav_menu_locations();
    if (!isset($locations[$location])) return false;
    $menu_obj = get_term($locations[$location], 'nav_menu');
    return $menu_obj;
}

function twentythirteen_scripts_styles()
{
    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');
    // Adds Masonry to handle vertical alignment of footer widgets.
    if (is_active_sidebar('sidebar-1'))
        wp_enqueue_script('jquery-masonry');
    // Loads JavaScript file with functionality specific to Twenty Thirteen.
    wp_enqueue_script('twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '2013-07-18', true);
    // Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
    wp_enqueue_style('twentythirteen-fonts', twentythirteen_fonts_url(), array(), null);
    // Add Genericons font, used in the main stylesheet.
    wp_enqueue_style('genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09');
    // Loads our main stylesheet.
    wp_enqueue_style('twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18');
    // Loads the Internet Explorer specific stylesheet.
    wp_enqueue_style('twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array('twentythirteen-style'), '2013-07-18');
    wp_style_add_data('twentythirteen-ie', 'conditional', 'lt IE 9');
}

add_action('wp_enqueue_scripts', 'twentythirteen_scripts_styles');
/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title($title, $sep)
{
    global $paged, $page;
    if (is_feed())
        return $title;
    // Add the site name.
    $title .= get_bloginfo('name');
    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page()))
        $title = "$title $sep $site_description";
    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2)
        $title = "$title $sep " . sprintf(__('Page %s', 'twentythirteen'), max($paged, $page));
    return $title;
}

add_filter('wp_title', 'twentythirteen_wp_title', 10, 2);
/**
 * Register two widget areas.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_widgets_init()
{
    register_sidebar(array(
        'name' => __('Main Widget Area', 'twentythirteen'),
        'id' => 'sidebar-1',
        'description' => __('Appears in the footer section of the site.', 'twentythirteen'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Secondary Widget Area', 'twentythirteen'),
        'id' => 'sidebar-2',
        'description' => __('Appears on posts and pages in the sidebar.', 'twentythirteen'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'twentythirteen_widgets_init');
if (!function_exists('twentythirteen_paging_nav')) :
    /**
     * Display navigation to next/previous set of posts when applicable.
     *
     * @since Twenty Thirteen 1.0
     *
     * @return void
     */
    function twentythirteen_paging_nav()
    {
        global $wp_query;
        // Don't print empty markup if there's only one page.
        if ($wp_query->max_num_pages < 2)
            return;
        ?>
        <nav class="navigation paging-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e('Posts navigation', 'twentythirteen'); ?></h1>

            <div class="">
                <?php if (get_next_posts_link()) : ?>
                    <div class="nav-previous"><?php next_posts_link(__('Äldre Inlägg', 'twentythirteen')); ?></div>
                <?php endif; ?>
                <?php if (get_previous_posts_link()) : ?>
                    <div class="nav-next"><?php previous_posts_link(__('Nyare Inlägg', 'twentythirteen')); ?></div>
                <?php endif; ?>
            </div>
            <!-- .nav-links -->
        </nav><!-- .navigation -->
    <?php
    }
endif;
if (!function_exists('twentythirteen_post_nav')) :
    /**
     * Display navigation to next/previous post when applicable.
     *
     * @since Twenty Thirteen 1.0
     *
     * @return void
     */
    function twentythirteen_post_nav()
    {
        global $post;
        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);
        if (!$next && !$previous)
            return;
        ?>
        <nav class="navigation post-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e('Post navigation', 'twentythirteen'); ?></h1>

            <div class="nav-links">
                <?php previous_post_link('%link', _x('<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen')); ?>
                <?php next_post_link('%link', _x('%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen')); ?>
            </div>
            <!-- .nav-links -->
        </nav><!-- .navigation -->
    <?php
    }
endif;
if (!function_exists('twentythirteen_entry_meta')) :
    /**
     * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
     *
     * Create your own twentythirteen_entry_meta() to override in a child theme.
     *
     * @since Twenty Thirteen 1.0
     *
     * @return void
     */
    function twentythirteen_entry_meta()
    {
        if (is_sticky() && is_home() && !is_paged())
            echo '<span class="featured-post">' . __('Sticky', 'twentythirteen') . '</span>';
        if (!has_post_format('link') && 'post' == get_post_type())
            twentythirteen_entry_date();
        // Translators: used between list items, there is a space after the comma.
        $categories_list = get_the_category_list(__(', ', 'twentythirteen'));
        if ($categories_list) {
            echo '<span class="categories-links">' . $categories_list . '</span>';
        }
        // Translators: used between list items, there is a space after the comma.
        $tag_list = get_the_tag_list('', __(', ', 'twentythirteen'));
        if ($tag_list) {
            echo '<span class="tags-links">' . $tag_list . '</span>';
        }
        // Post author
        if ('post' == get_post_type()) {
            printf('<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
                esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                esc_attr(sprintf(__('View all posts by %s', 'twentythirteen'), get_the_author())),
                get_the_author()
            );
        }
    }
endif;
if (!function_exists('twentythirteen_entry_date')) :
    /**
     * Print HTML with date information for current post.
     *
     * Create your own twentythirteen_entry_date() to override in a child theme.
     *
     * @since Twenty Thirteen 1.0
     *
     * @param boolean $echo (optional) Whether to echo the date. Default true.
     * @return string The HTML-formatted post date.
     */
    function twentythirteen_entry_date($echo = true)
    {
        if (has_post_format(array('chat', 'status')))
            $format_prefix = _x('%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen');
        else
            $format_prefix = '%2$s';
        $date = sprintf('<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
            esc_url(get_permalink()),
            esc_attr(sprintf(__('Permalink to %s', 'twentythirteen'), the_title_attribute('echo=0'))),
            esc_attr(get_the_date('c')),
            esc_html(sprintf($format_prefix, get_post_format_string(get_post_format()), get_the_date()))
        );
        if ($echo)
            echo $date;
        return $date;
    }
endif;
if (!function_exists('twentythirteen_the_attached_image')) :
    /**
     * Print the attached image with a link to the next attached image.
     *
     * @since Twenty Thirteen 1.0
     *
     * @return void
     */
    function twentythirteen_the_attached_image()
    {
        /**
         * Filter the image attachment size to use.
         *
         * @since Twenty thirteen 1.0
         *
         * @param array $size {
         * @type int The attachment height in pixels.
         * @type int The attachment width in pixels.
         * }
         */
        $attachment_size = apply_filters('twentythirteen_attachment_size', array(724, 724));
        $next_attachment_url = wp_get_attachment_url();
        $post = get_post();
        /*
         * Grab the IDs of all the image attachments in a gallery so we can get the URL
         * of the next adjacent image in a gallery, or the first image (if we're
         * looking at the last image in a gallery), or, in a gallery of one, just the
         * link to that image file.
         */
        $attachment_ids = get_posts(array(
            'post_parent' => $post->post_parent,
            'fields' => 'ids',
            'numberposts' => -1,
            'post_status' => 'inherit',
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'order' => 'ASC',
            'orderby' => 'menu_order ID'
        ));
        // If there is more than 1 attachment in a gallery...
        if (count($attachment_ids) > 1) {
            foreach ($attachment_ids as $attachment_id) {
                if ($attachment_id == $post->ID) {
                    $next_id = current($attachment_ids);
                    break;
                }
            }
            // get the URL of the next image attachment...
            if ($next_id)
                $next_attachment_url = get_attachment_link($next_id);
            // or get the URL of the first image attachment.
            else
                $next_attachment_url = get_attachment_link(array_shift($attachment_ids));
        }
        printf('<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
            esc_url($next_attachment_url),
            the_title_attribute(array('echo' => false)),
            wp_get_attachment_image($post->ID, $attachment_size)
        );
    }
endif;
/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url()
{
    $content = get_the_content();
    $has_url = get_url_in_content($content);
    return ($has_url) ? $has_url : apply_filters('the_permalink', get_permalink());
}

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentythirteen_body_class($classes)
{
    if (!is_multi_author())
        $classes[] = 'single-author';
    if (is_active_sidebar('sidebar-2') && !is_attachment() && !is_404())
        $classes[] = 'sidebar';
    if (!get_option('show_avatars'))
        $classes[] = 'no-avatars';
    return $classes;
}

add_filter('body_class', 'twentythirteen_body_class');
/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_content_width()
{
    global $content_width;
    if (is_attachment())
        $content_width = 724;
    elseif (has_post_format('audio'))
        $content_width = 484;
}

add_action('template_redirect', 'twentythirteen_content_width');
/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentythirteen_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
}

add_action('customize_register', 'twentythirteen_customize_register');
/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_customize_preview_js()
{
    wp_enqueue_script('twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array('customize-preview'), '20130226', true);
}

add_action('customize_preview_init', 'twentythirteen_customize_preview_js');
function nyberg_byggbil($attr)
{
    ob_start();
    extract(shortcode_atts(array('post_id' => '', 'slug' => ""), $attr));
    $bygg_title = '';
    $bygg_content = '';
    $bygg_id = '';
    $bygg_links = array();
    if ($slug != "") {
        $args = array(
            'name' => $slug,
            'post_type' => 'bygg_bil',
            'post_status' => 'publish',
            'numberposts' => 1
        );
        $post = get_posts($args);
        $post_id = $post[0]->ID;
        $post = get_post($post_id, ARRAY_A);
    } else if ($post_id != "") {
        $post = get_post($post_id, ARRAY_A);
    } else {
        $args = array('numberposts' => 1, 'post_type' => 'bygg_bil', 'post_status' => 'publish');
        $recent_posts = wp_get_recent_posts($args, ARRAY_A);
        $post = $recent_posts[0];
    }
    $bygg_title = $post['post_title'];
    $bygg_content = $recent['post_content'];
    if (get_field('links', $post_id)) {
        while (has_sub_field('links', $post_id)) {
            $bygg_text = get_sub_field('text');
            $bygg_url = get_sub_field('url');
            $bygg_target = get_sub_field('open_link_in');
            $bygg_links[] = array('text' => $bygg_text, 'url' => $bygg_url, 'target' => $bygg_target);
        }
    }
    if ($slug == "" && !is_home()) {
        $bygg_title = '';
    }
    ?>
    <div class="nyberg-byggbil-plug">
        <div class="header"><?php echo $bygg_title; ?></div>
        <div class="bread"><?php echo $bygg_content; ?></div>
        <ul class="links">
            <?php
            for ($i = 0; $i < count($bygg_links); $i++) {
                $bygg_link = $bygg_links[$i];
                ?>
                <li><a target="<?php echo $bygg_link['target']; ?>"
                       href="<?php echo $bygg_link['url']; ?>"><?php echo $bygg_link['text']; ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('nyberg_byggbil', 'nyberg_byggbil');
function nyberg_alertbox()
{
    $social_box = get_field('social_links_plug', 'options');
    $social_box = $social_box[0];
    ob_start();
    ?>
    <div id="nyberg-alert-box" class="nyberg-alert-box">
        <img src="<?php bloginfo('template_url'); ?>/images/alert-box-arrow.png"/>

        <div class="alert-content">
            <div class="header"><?php echo $social_box['header']; ?></div>
            <div class="bread">
                <?php echo $social_box['bread']; ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('nyberg_alertbox', 'nyberg_alertbox');
/* Includes ACF */
//define('ACF_LITE', true);
include_once('acf.php');
function nyberg_pages_plug($atts)
{
    extract(shortcode_atts(array(
        'limit' => '',
        'name' => ''
    ), $atts));
    if ($name != '') {
        $name = explode(',', $name);
    }
    $puffs = array();
    if (is_array($name)) {
        foreach ($name as $puff) {
            $the_puff = get_posts(array('name' => $puff, 'post_type' => 'puff', 'post_status' => 'published', 'posts_per_page' => 1));
            $puffs[] = $the_puff[0]->ID;
        }
    }
    ob_start(); ?>
    <div class="nyberg-pages-plugs">
        <div class="plug-row">
            <?php
            $args = array(
                'post_type' => 'puff',
                'post__in' => $puffs,
                'post_status' => 'publish',
                'orderby' => 'post__in'
            );
            $puffar = new WP_Query($args);
            $big = 0;
            $small = 0;
            $medium = 0;
            while ($puffar->have_posts()) :
            $puffar->the_post();
            if ($big == 1){
            $big = 0; ?>
            <div class="clear"></div>
        </div>
        <div class="plug-row">
            <?php }
            if ($small == 4){
            $small = 0; ?>
        </div>
        <div class="plug-row">
            <?php }
            if ($medium == 3){
            $medium = 0; ?>
        </div>
        <div class="plug-row">
            <?php }
            if (get_field('storlek') == 4) {
                $rubrik = '<h2>' . get_the_title() . '</h2>';
                if (get_sub_field('twotext') == 'true') {
                }
                $medium = 0;
                $small = 0;
                ?>
                <?php
                $big++;
            } else if (get_field('storlek') == 1) {
                $rubrik = '<h4>' . get_the_title() . '</h4>';
                $small++;
            } else if (get_field('storlek') == 3) {
                $rubrik = '<h3>' . get_the_title() . '</h3>';
                $medium++;
            }
            if (get_field('pufflank') == "ext") {
                $link = get_field('extlink');
            } else {
                $link = get_field('intlink');
            }
            $open_link_in = get_field('open_link_in');
            ?>
            <div class="plug clear colspan<?php the_field('storlek');
            if (get_field('twotext') == 'true') {
                echo ' image-right';
            } else {
                echo ' ';
                the_field('bildjustering');
            } ?>">
                <?php if ($link){ ?> <a href="<?php echo $link; ?>" target="<?php echo $open_link_in; ?>"> <?php } ?>
                    <?php if (get_field('bild')) { ?>
                        <div class="plug-image" style="background-image: url(<?php the_field('bild'); ?>);" ><img
                            src="<?php the_field('bild'); ?>"></div><?php } ?>
                    <?php if (get_field('twotext') == 'true') { ?>
                        <?php if ($rubrik != '<h2></h2>') { ?>
                            <?php echo $rubrik; ?>
                        <?php } ?>
                    <?php } ?>
                    <div class="plug-text">
                        <?php if (get_field('twotext') != 'true') { ?>
                            <div class="header"><?php echo $rubrik; ?></div> <?php } ?>
                        <div class="bread"><?php the_field('ingress'); ?></div>
                    </div>
                    <?php if (get_field('twotext') == 'true') { ?>
                        <div class="plug-text2"> <?php the_field('ingress2') ?> </div> <?php } ?>
                    <div class="plug-marker"></div>
                    <?php if ($link){ ?></a> <?php } ?>
            </div>
            <?php
            endwhile; ?>
        </div>
    </div>
    <div class="clear"></div>
    <?php
    wp_reset_query();
    return ob_get_clean();
}

add_shortcode('nyberg_pages_plug', 'nyberg_pages_plug');
function nyberg_contact_form()
{
    ob_start();
    the_field('kontaktformular');
    return ob_get_clean();
}

add_shortcode('nyberg_contact_form', 'nyberg_contact_form');
function nyberg_startsida_plugs()
{
    ob_start();
    the_field('startsida_pluggar', 'options');
    return ob_get_clean();
}

add_shortcode('nyberg_startsida_plugs', 'nyberg_startsida_plugs');
//Get cars from Access
function getCars($filter = null)
{
    $url = "http://webapi.bytbil.com/object/search/?FilterId=" . get_field('filterid', 'options') . "&" . implode("&", $filter);
    // Simple file cache
    $key = str_replace("=", "", implode("", $filter));
    $key = sha1($key);
    $cache_file = dirname(__FILE__) . "/cache/" . $key . ".cache";
    if (get_field('filterid', 'options')) {
        if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 15))) {
            // Cache file is less than fifteen minutes old.
            $response = file_get_contents($cache_file);
        } else {
            // Update or create cache file
            $response = file_get_contents($url);
            file_put_contents($cache_file, $response . LOCK_EX);
        }
        $response = file_get_contents($url);
        $response = json_decode($response);
    }
    return $response;
}

add_action('wp_head', 'ajaxurl');
function ajaxurl()
{
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url("admin-ajax.php"); ?>';
    </script>
<?php
}

//Register ajax for getModels
add_action('wp_ajax_get_models', 'getModels');
add_action('wp_ajax_nopriv_get_models', 'getModels');
//Get models from Access
function getModels()
{
    if (!isset($_POST['brand']) || empty($_POST['brand'])) {
        return false;
    } else {
        $searchType = "";
        if ($_POST['searchtype'] != "") {
            $searchType = $_POST['searchtype'];
        } else {
            $searchType = "&searchType=rvppdkyg";
        }
        $brand = $_POST['brand'];
        if ($_POST['selectcity'] != "") {
            $facility = '&customerid=' . $_POST['selectcity'];
        } else {
            $facility = '&filterid=' . get_field('filterid', 'options');
        }
        $url = 'http://webapi.bytbil.com/startvalues/models?' . $searchType . '&brand=' . $brand . $facility;

        die(file_get_contents($url));
    }
}

// Bygg bil CPT
add_action('init', 'cptui_register_my_cpt_bygg_bil');
function cptui_register_my_cpt_bygg_bil()
{
    register_post_type('bygg_bil', array(
        'label' => 'Bygg bil',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'bygg_bil', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor'),
        'exclude_from_search' => true,
        'labels' => array(
            'name' => 'Bygg bil',
            'singular_name' => 'Bygg bil',
            'menu_name' => 'Bygg bil',
            'add_new' => 'Add Bygg bil',
            'add_new_item' => 'Add New Bygg bil',
            'edit' => 'Edit',
            'edit_item' => 'Edit Bygg bil',
            'new_item' => 'New Bygg bil',
            'view' => 'View Bygg bil',
            'view_item' => 'View Bygg bil',
            'search_items' => 'Search Bygg bil',
            'not_found' => 'No Bygg bil Found',
            'not_found_in_trash' => 'No Bygg bil Found in Trash',
            'parent' => 'Parent Bygg bil',
        )
    ));
}

// Puff CPT
add_action('init', 'cptui_register_my_cpt_puff');
function cptui_register_my_cpt_puff()
{
    register_post_type('puff', array(
        'label' => 'Puffar',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'puff', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'exclude_from_search' => true,
        'labels' => array(
            'name' => 'Puffar',
            'singular_name' => 'Puff',
            'menu_name' => 'Puffar',
            'add_new' => 'Skapa ny Puff',
            'add_new_item' => 'Skapa ny Puff',
            'edit' => 'Redigera',
            'edit_item' => 'Redigera Puff',
            'new_item' => 'Ny Puff',
            'view' => 'Visa Puff',
            'view_item' => 'Visa Puff',
            'search_items' => 'Sök Puffar',
            'not_found' => 'Inga Puffar hittades',
            'not_found_in_trash' => 'Inga Puffar hittades i papperskorgen',
            'parent' => 'Parent Puff',
        )
    ));
}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes()
{
    return 'id="next"';
}

add_action('wp_ajax_get_orter', 'getOrter');
add_action('wp_ajax_nopriv_get_orter', 'getOrter');
function getOrter()
{
    $url = 'http://webapi.bytbil.com/dealer/search/?FilterId=' . get_field('filterid', 'options');
    die(file_get_contents($url));
}

add_action('wp_ajax_get_orter', 'getOrter');
add_action('wp_ajax_nopriv_get_orter', 'getOrter');
function getDealerBrands()
{
    $customerid = $_POST['customerid'];
    $searchtype = $_POST['searchtype'];
    $usedstate = $_POST['usedstate'];

    $url = null;
    $filterId = 'filterId=' . get_field('filterid', 'options');
    if (!$customerid === '') {
        $url = 'http://webapi.bytbil.com/startvalues/?' . $customerid . $searchtype . $usedstate;
    } else if ($searchtype === '') {
        $searchtype = '&SearchType=rvppdkyg';
        $url = 'http://webapi.bytbil.com/startvalues/?' . $filterId . $searchtype . $usedstate;
    } else {
        $url = 'http://webapi.bytbil.com/startvalues/?' . $filterId . $searchtype . $usedstate;
    }
    die(file_get_contents($url));
}

add_action('wp_ajax_getDealerBrands', 'getDealerBrands');
add_action('wp_ajax_nopriv_getDealerBrands', 'getDealerBrands');

function dealersubmenu_nybergs($atts)
{
    ob_start();
    $page = get_page_by_path($atts['page_path']);
    $page_id = $page->ID;
    $imgurl = $atts['imgurl'];
    $imgalt = $atts['imgalt'];
    $imgtitle = $atts['imgtitle'];
    $items = wp_get_nav_menu_items('Huvudmeny');
    $filtered_menu_items = array();
    foreach ($items as $item) {
        if ($item->post_parent == !0 || $item->menu_item_parent == !0) {
            $menu_item = array(
                'title' => $item->title,
                'url' => $item->url,
                'menu_item_parent' => $item->menu_item_parent,
                'post_parent' => $item->post_parent,
                'ID' => $item->ID,
                'object_id' => $item->object_id,
                'target' => $item->target
            );
            $filtered_menu_items[] = $menu_item;
        }
    }
    $filtered_menu_items2 = $filtered_menu_items;
    $found_submenu_item_array = array();
    $found_menu_item = null;
    $found_submenu_item = null;
    $found_subsubmenu_item_array2 = array();
    foreach ($filtered_menu_items as $filtered_menu_item) {
        if ($page_id == $filtered_menu_item['object_id']) {
            $found_menu_item = $filtered_menu_item;
        }
    }
    foreach ($filtered_menu_items as $filtered_menu_item) {
        if ($filtered_menu_item['menu_item_parent'] == $found_menu_item['ID']) {
            $found_submenu_item_array[] = $filtered_menu_item;
        }
    }
    foreach ($filtered_menu_items as $filtered_menu_item) {
        //Loop 2
        foreach ($filtered_menu_items2 as $filtered_menu_item2) {
            if ($filtered_menu_item['ID'] == $filtered_menu_item2['menu_item_parent']) {
                $found_subsubmenu_item_array2[] = $filtered_menu_item2;
            }
        }
    }
    $arraylength_sub = count($found_submenu_item_array);
    $arraylength_subsub = count($found_subsubmenu_item_array2);
    $length = $arraylength_subsub - $arraylength_sub;
    //var_dump($found_submenu_item_array);
    $i = 0;
    do {
        unset($found_subsubmenu_item_array2[$i]);
        $i++;
    } while ($i <= $length);
    ?>
    <?php

    ?>
    <div class="specialmenu_container">
        <a href="<?php echo $found_menu_item['url'] ?>"><h4
                class="specialmenuHeader"> <?php echo $found_menu_item['title'] ?></a></h4>
        <div class="special-nybergs">
            <div class="left_partspecialmenu">
                <img src="<?php echo $imgurl ?>" title="<?php echo $imgtitle ?>" alt"<?php echo $imgalt ?>"/>
            </div>
            <div class="specialmenudiv">
                <ul class="specialMenu">
                    <?php foreach ($found_submenu_item_array as $found_submenu_item) {
                        ?>
                        <li>
                            <a href="<?php echo $found_submenu_item['url'] ?>"
                               target="<?php echo $found_submenu_item['target'] ?>"> <?php echo $found_submenu_item['title'] ?></a>
                            <ul>
                                <?php foreach ($found_subsubmenu_item_array2 as $found_subsubmenu_item) {
                                    if ($found_submenu_item['ID'] == $found_subsubmenu_item['menu_item_parent']) {
                                        ?>
                                        <li>
                                            <a href="<?php echo $found_subsubmenu_item['url'] ?> target="<?php echo $found_subsubmenu_item['target'] ?>
                                            ""> <?php echo $found_subsubmenu_item['title'] ?></a>
                                        </li>
                                    <?php }
                                } ?>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
    wp_reset_query();
    return ob_get_clean();
}

add_shortcode('dealersubmenu_nybergs', 'dealersubmenu_nybergs');
add_action('init', 'demo_add_default_boxes');

function demo_add_default_boxes()
{
    register_taxonomy_for_object_type('categories_for_blog', 'blogg');
    register_taxonomy_for_object_type('post_tag', 'blogg');
}

add_action('init', 'create_book_tax');
function create_book_tax()
{
    register_taxonomy(
        'categories_for_blog',
        'blogg',
        array(
            'label' => __('Kategori För Bloggpost'),
            'rewrite' => array('slug' => 'categories_for_blog'),
            'hierarchical' => true,
        )
    );
}

function GetFooterImg()
{
    $daystartunix = strtotime(get_field('dagbildstart', 'options'));
    $daysendunix = strtotime(get_field('dagbildslut', 'options'));
    $nowunix = strtotime('now');
    if ($nowunix > $daystartunix && $nowunix < $daysendunix) {
        $imgurl = get_field('footerbild_dag', 'options');
    } else {
        $imgurl = get_field('footerbild_natt', 'options');
    }
    if ($imgurl == "") {
        $imgurl = bloginfo('template_url') . "/images/footer-fallback.png";
    }
    return $imgurl;
}

function openhours($atts)
{
    ob_start();
    $ort = $atts['kategori'];
    ?>
    <div class="openhours-container"> <?php
    if (get_field('opentimes', 'options')) {
        while (has_sub_fields('opentimes', 'options')) { ?>
            <?php if ($ort === get_sub_field('kategorin', 'options')) { ?>
                <div class="open">
                    <h4><?php the_sub_field('fritext', 'options'); ?></h4>
                    <?php while (has_sub_fields('times', 'options')) : ?>
                        <span><?php the_sub_field('day', 'options'); ?>
                            : <?php the_sub_field('time', 'options'); ?></span><br>
                    <?php endwhile; ?>
                </div>
            <?php
            }
        } ?>
        </div>
        <?php
        return ob_get_clean();
    }
}

add_shortcode('openhours', 'openhours');
function register_button_nybergs($buttons)
{
    array_push($buttons, "", "searchbox");
    array_push($buttons, "", "pluggar");
    array_push($buttons, "", "bytbilbillista");
    return $buttons;
}

function add_plugin_nybergs($plugin_array)
{
    $plugin_array['pluggar'] = get_template_directory_uri() . '/plugins/bytbil_misc/js/pluggar.js';
    $plugin_array['bytbilbillista'] = get_template_directory_uri() . '/plugins/bytbil_misc/js/billista.js';
    $plugin_array['searchbox'] = get_template_directory_uri() . '/plugins/bytbil_misc/js/searchbox.js';
    return $plugin_array;
}

function my_recent_posts_nybergs()
{
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    if (get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'add_plugin_nybergs');
        add_filter('mce_buttons', 'register_button_nybergs');
    }
}

add_action('init', 'my_recent_posts_nybergs');
function shorten($string, $length)
{
// By default, an ellipsis will be appended to the end of the text.
    $suffix = '&hellip;';
// Convert 'smart' punctuation to 'dumb' punctuation, strip the HTML tags,
// and convert all tabs and line-break characters to single spaces.
    $short_desc = trim(str_replace(array("\r", "\n", "\t"), ' ', strip_tags($string)));
// Cut the string to the requested length, and strip any extraneous spaces 
// from the beginning and end.
    $desc = trim(substr($short_desc, 0, $length));
// Find out what the last displayed character is in the shortened string
    $lastchar = substr($desc, -1, 1);
// If the last character is a period, an exclamation point, or a question 
// mark, clear out the appended text.
    if ($lastchar == '.' || $lastchar == '!' || $lastchar == '?') $suffix = '';
// Append the text.
    $desc .= $suffix;
// Send the new description back to the page.
    return $desc;
}

function getnybergbloggrss($atts)
{
    ob_start();
    $limit = $atts['limit'];
    include_once(ABSPATH . WPINC . '/feed.php');
    $rss = fetch_feed('http://nybergsbil.wordpress.com/feed/');
    $maxitems = $rss->get_item_quantity($limit);
    $rss_items = $rss->get_items(0, $maxitems);
    ?>
    <div class="nyheter-container">
        <?php foreach ($rss_items as $item) { ?>
            <div>
                <?php echo $item->get_title(); ?>
                <span><a target="_blank" href="<?php echo $item->get_permalink(); ?>">Läs mer »</a></span>
            </div>
        <?php }?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('getnybergbloggrss', 'getnybergbloggrss');
function getnybergbloggrss_footer()
{
    ob_start();
    include_once(ABSPATH . WPINC . '/feed.php');
    $rss = fetch_feed('http://nybergsbil.wordpress.com/feed/');
    $maxitems = $rss->get_item_quantity(2);
    $rss_items = $rss->get_items(0, $maxitems);
    ?>
    <div class="nyberg-footer-nyheter">
        <div class="header">Nyheter</div>
        <div class="nyheter-container">
            <?php foreach ($rss_items as $item) { ?>
                <div>
                    <?php ?> <strong> <?php echo $item->get_title(); ?></strong> -
                    <?php
                    preg_match('/^([^.!?\s]*[\.!?\s]+){0,13}/', strip_tags($item->get_content()), $abstract);
                    echo $abstract[0];
                    ?>
                    […]
                    <br/><span><a target="_blank" href="<?php echo $item->get_permalink(); ?>">Läs mer »</a></span>
                </div>
            <?php }?>
        </div>
        <div class="black-button" style="position: absolute; bottom: 17px; right: 14px;">
            <a target="_blank" href="http://nybergsbil.wordpress.com/" style="color:inherit; text-decoration: none;">Läs
                alla nyheter</a>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('getnybergbloggrss_footer', 'getnybergbloggrss_footer');
function remove_those_menu_items()
{
    remove_menu_page('edit.php?post_type=blogg');
    remove_menu_page('edit.php?post_type=nyheter');
}

add_filter('admin_menu', 'remove_those_menu_items');
function addthis_nybergs()
{
    ob_start();
    ?>
    <div id="addthiscontainer" class="clear">
        <div id="addthiswrapper">
            <!-- AddThis Button BEGIN -->
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox" id="modded-addthis"></div>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript"
                    src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53a7eb221cf4b8fa"></script>
            <span class="addthistext">Dela sidan:</span>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('addthis_nybergs', 'addthis_nybergs');
function nyberg_puffar($first = null)
{
    if ($first == 'first') {
        if (get_field('puffarsida')) {

            while (has_sub_field('puffarsida')) {

                $ingress = get_sub_field('ingress');
                $ingress_excerpt = substr($ingress, 0, 500);

                $clean = array("", "", "", "");
                $html = array("<ul>", "</ul>", "<li>", "</li>");
                $ingress_stripped = str_replace($html, $clean, $ingress_excerpt);


                echo $ingress_stripped . ' [...]';
                break;
            }
        }

    } else {
        if (get_field('puffarsida')) {
            $big = 0;
            $small = 0;
            $medium = 0;
            ?>
            <div class="nyberg-pages-plugs">
                <div class="plug-row">
                    <?php
                    while (has_sub_field('puffarsida'))
                    {
                    ?>
                    <?php
                    if ($big == 1){
                    $big = 0; ?>
                    <div class="clear"></div>
                </div>
                <div class="plug-row">
                    <?php }
                    if ($small == 4){
                    $small = 0; ?>
                </div>
                <div class="plug-row">
                    <?php }
                    if ($medium == 3){
                    $medium = 0; ?>
                </div>
                <div class="plug-row">
                    <?php }
                    if (get_sub_field('storlek') == 4) {
                        $rubrik = '<h2>' . get_sub_field('rubrik') . '</h2>';
                        $big++;
                        $medium = 0;
                        $small = 0;
                        ?>
                    <?php
                    } else if (get_sub_field('storlek') == 1) {
                        $rubrik = '<h4>' . get_sub_field('rubrik') . '</h4>';
                        $small++;
                    } else if (get_sub_field('storlek') == 3) {
                        $rubrik = '<h3>' . get_sub_field('rubrik') . '</h3>';
                        $medium++;
                    }
                    if (get_sub_field('pufflank') == "ext") {
                        $link = get_sub_field('extlink');
                    } else {
                        $link = get_sub_field('intlink');
                    }
                    $open_link_in = get_sub_field('open_link_in');
                    $img = get_sub_field('bild');
                    ?>
                    <div class="plug clear colspan<?php the_sub_field('storlek');
                    if (get_sub_field('twotext') == 'true') {
                        echo ' image-right';
                    } else {
                        echo ' ';
                        the_sub_field('bildjustering');
                    } ?>">
                        <?php if ($link){ ?> <a href="<?php echo $link; ?>"
                                                target="<?php echo $open_link_in; ?>"> <?php }?>
                            <?php if (get_sub_field('bild')) { ?>
                                <div class="plug-image" style="background-image: url(<?php echo $img['url']; ?>);" ><img
                                    title="<?php echo $img['title']; ?>" alt="<?php echo $img['alt']; ?>"
                                    src="<?php echo $img['url']; ?>"></div><?php } ?>
                            <?php if (get_sub_field('twotext') == 'true') { ?>
                                <?php if ($rubrik != '<h2></h2>') { ?>
                                    <?php echo $rubrik; ?>
                                <?php } ?>
                            <?php } ?>
                            <div class="plug-text">
                                <?php if (get_sub_field('twotext') != 'true') { ?>
                                    <div class="header"><?php echo $rubrik; ?></div> <?php } ?>
                                <div class="bread"><?php the_sub_field('ingress'); ?></div>
                            </div>
                            <?php if (get_sub_field('twotext') == 'true') { ?>
                                <div class="plug-text2"> <?php the_sub_field('ingress2') ?> </div> <?php } ?>
                            <div class="plug-marker"></div>
                            <?php if ($link){ ?></a> <?php } ?>
                    </div>
                    <?php
                    if ($first === 'first') {
                        break;
                    }
                    }
                    ?>
                </div>
            </div>
            <div class="clear"></div>
        <?php
        }
    }
}

?>
<?php
function nyberg_sidopuffar()
{
    $i = 1;
    if (get_field('puffarsidebar')) :
        while (has_sub_field('puffarsidebar')): ?>
            <?php
            if (get_sub_field('pufflank') == "ext") {
                $link = get_sub_field('extlink');
            } else {
                $link = get_sub_field('intlink');
            }
            $open_link_in = get_sub_field('open_link_in');
            $rubrik = '<h4>' . get_sub_field('rubrik') . '</h4>';
            ?>

            <div class="plug clear colspan1">
                <?php if ($link){ ?> <a href="<?php echo $link; ?>" target="<?php echo $open_link_in; ?>"> <?php } ?>
                    <?php if (get_sub_field('bild')) { ?>
                        <div class="plug-image" style="background-image: url(<?php the_sub_field('bild'); ?>);" ><img
                            src="<?php the_sub_field('bild'); ?>"></div><?php } ?>

                    <div class="plug-text">
                        <div class="header"><?php echo $rubrik; ?></div>
                        <div class="bread"><?php the_sub_field('ingress'); ?></div>
                    </div>
                    <div class="plug-marker"></div>
                    <?php if ($link){ ?></a> <?php } ?>
            </div>

        <?php
        endwhile;
    endif;
}

?>
<?php
function upload_flash($mimes)
{
    $mimes2 = $mimes;
    $mimes2 = array(
        // Image formats
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png',
        'bmp' => 'image/bmp',
        'tif|tiff' => 'image/tiff',
        'ico' => 'image/x-icon',
        // Video formats
        'asf|asx' => 'video/x-ms-asf',
        'wmv' => 'video/x-ms-wmv',
        'wmx' => 'video/x-ms-wmx',
        'wm' => 'video/x-ms-wm',
        'avi' => 'video/avi',
        'divx' => 'video/divx',
        'flv' => 'video/x-flv',
        'mov|qt' => 'video/quicktime',
        'mpeg|mpg|mpe' => 'video/mpeg',
        'mp4|m4v' => 'video/mp4',
        'ogv' => 'video/ogg',
        'webm' => 'video/webm',
        'mkv' => 'video/x-matroska',

        // Text formats
        'txt|asc|c|cc|h' => 'text/plain',
        'csv' => 'text/csv',
        'tsv' => 'text/tab-separated-values',
        'ics' => 'text/calendar',
        'rtx' => 'text/richtext',
        'css' => 'text/css',
        'htm|html' => 'text/html',

        // Audio formats
        'mp3|m4a|m4b' => 'audio/mpeg',
        'ra|ram' => 'audio/x-realaudio',
        'wav' => 'audio/wav',
        'ogg|oga' => 'audio/ogg',
        'mid|midi' => 'audio/midi',
        'wma' => 'audio/x-ms-wma',
        'wax' => 'audio/x-ms-wax',
        'mka' => 'audio/x-matroska',

        // Misc application formats
        'rtf' => 'application/rtf',
        'js' => 'application/javascript',
        'pdf' => 'application/pdf',
        'swf' => 'application/x-shockwave-flash',
        'class' => 'application/java',
        'tar' => 'application/x-tar',
        'zip' => 'application/zip',
        'gz|gzip' => 'application/x-gzip',
        'rar' => 'application/rar',
        '7z' => 'application/x-7z-compressed',
        'exe' => 'application/x-msdownload',

        // MS Office formats
        'doc' => 'application/msword',
        'pot|pps|ppt' => 'application/vnd.ms-powerpoint',
        'wri' => 'application/vnd.ms-write',
        'xla|xls|xlt|xlw' => 'application/vnd.ms-excel',
        'mdb' => 'application/vnd.ms-access',
        'mpp' => 'application/vnd.ms-project',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'docm' => 'application/vnd.ms-word.document.macroEnabled.12',
        'dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
        'dotm' => 'application/vnd.ms-word.template.macroEnabled.12',
        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'xlsm' => 'application/vnd.ms-excel.sheet.macroEnabled.12',
        'xlsb' => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
        'xltx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
        'xltm' => 'application/vnd.ms-excel.template.macroEnabled.12',
        'xlam' => 'application/vnd.ms-excel.addin.macroEnabled.12',
        'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'pptm' => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
        'ppsx' => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
        'ppsm' => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
        'potx' => 'application/vnd.openxmlformats-officedocument.presentationml.template',
        'potm' => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
        'ppam' => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
        'sldx' => 'application/vnd.openxmlformats-officedocument.presentationml.slide',
        'sldm' => 'application/vnd.ms-powerpoint.slide.macroEnabled.12',
        'onetoc|onetoc2|onetmp|onepkg' => 'application/onenote',
        // OpenOffice formats
        'odt' => 'application/vnd.oasis.opendocument.text',
        'odp' => 'application/vnd.oasis.opendocument.presentation',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        'o dg' => 'application/vnd.oasis.opendocument.graphics',
        'odc' => 'application/vnd.oasis.opendocument.chart',
        'odb' => 'application/vnd.oasis.opendocument.database',
        'odf' => 'application/vnd.oasis.opendocument.formula',
        // WordPerfect formats
        'wp|wpd' => 'application/wordperfect',
        // iWork formats
        'key' => 'application/vnd.apple.keynote',
        'numbers' => 'application/vnd.apple.numbers',
        'pages' => 'application/vnd.apple.pages',
    );
    return $mimes2;
}

add_filter('upload_mimes', 'upload_flash');
add_filter('relevanssi_get_words_query', 'fix_query');
function fix_query($query)
{
    $query = $query . " HAVING c > 1";
    return $query;
}

?>