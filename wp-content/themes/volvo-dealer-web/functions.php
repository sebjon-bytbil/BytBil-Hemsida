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


include 'plugins/bytbil_misc/bytbil-misc.php';
include 'plugins/bytbil_personal/bytbil_personal.php';
include 'plugins/bytbil_content_pull/bytbil-content-pull.php';
include 'plugins/acf-options-page/acf-options-page.php';
include(locate_template('plugins/bytbil_embed/embed-basic.php'));
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
require get_template_directory() . '/inc/custom-header.php';

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
    //register_nav_menu( 'primary', __( 'Navigation Menu', 'twentythirteen' ) );

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

    wp_enqueue_style('admin-styles-css', get_template_directory_uri() . '/admin-style-all.css');

    wp_enqueue_script('fixes_vdw', get_template_directory_uri() . '/js/fixes.js');
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

            <div class="nav-links">

                <?php if (get_next_posts_link()) : ?>
                    <div
                        class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen')); ?></div>
                <?php endif; ?>

                <?php if (get_previous_posts_link()) : ?>
                    <div
                        class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen')); ?></div>
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


function get_share_box()
{
    ob_start();
    ?>
    <div onclick="toggleDiv('shareBoxLinks');" class="shareBox">
        <div class="shareBoxLinks">
            <a class="iconlink-facebook" href="#"
               onclick="window.open('http://www.facebook.com/sharer/sharer.php?u='+window.location.href,'window','width=600,height=400,scrollbars=no');">Facebook</a>
            <a class="iconlink-twitter" href="#"
               onclick="window.open('https://twitter.com/share', 'window', 'width=600,height=400,scrollbars=no');">Twitter</a>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/images/dela.png" style="cursor: pointer;">
    </div>
    <script type="text/javascript">
        var openDiv;

        function toggleDiv(divClass) {
            $("." + divClass).fadeToggle(200, function () {
                openDiv = $(this).is(':visible') ? divClass : null;
            });
        }

        $(document).click(function (e) {
            if (!$(e.target).closest('.' + openDiv).length) {
                toggleDiv(openDiv);
            }
        });
    </script>
    <?php
    return ob_get_clean();
}

add_shortcode('bytbil_share_box', 'get_share_box');

function function_build_car()
{
    $vendor_id = get_field('build_car_id', 'options');

    ob_start();
    ?>
    <div class="build-car-div open_in_lightbox">
        <a href="<?php echo site_url(); ?>/bygg-din-volvo/" class="btn lytebox2">
            <span>BYGG DIN <?php the_title() ?></span>
        </a>
    </div>

    <?php
    return ob_get_clean();

}

add_shortcode('bytbil_build_car', 'function_build_car');


add_action('init', 'menu_excerpt__add_menu_field');
function menu_excerpt__add_menu_field()
{
    if (!is_callable('bh_add_custom_menu_fields'))
        return;

    bh_add_custom_menu_fields(array(
        'open_in_lightbox' => array(
            'description' => 'Öppna i lightbox',
            'type' => 'select',
            'options' => array(
                array('description' => 'Nej', 'value' => 'no'),
                array('description' => 'Ja', 'value' => 'yes')
            )
        )));
}

add_action('init', 'cptui_register_my_cpt_startsidor');
function cptui_register_my_cpt_startsidor()
{
    register_post_type('startsidor', array(
        'label' => 'Startsidor',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'startsidor', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title', 'thumbnail'),
        'labels' => array(
            'name' => 'Startsidor',
            'singular_name' => 'Startsida',
            'menu_name' => 'Startsidor',
            'add_new' => 'Ny Startsida',
            'add_new_item' => 'Lägg Till Ny Startsida',
            'edit' => 'Editera',
            'edit_item' => 'Editera Startsida',
            'new_item' => 'Ny Startsida',
            'view' => 'Visa Startsida',
            'view_item' => 'Visa Startsida',
            'search_items' => 'Sök Startsidor',
            'not_found' => 'Inga Startsidor Hittades',
            'not_found_in_trash' => 'Inga Startsidor Hittades i papperskorgen',
            'parent' => 'Parent Startsida',
        )
    ));
}

function menuvolvo($id, $checkForParent = false)
{

    if ($checkForParent) {
        $post = get_post($id);
        while ($post->post_parent > 0) {
            $id = $post->post_parent;
            $post = get_post($id);
        }
    }

    switch_to_master();

    //$id = url_to_postid($menu->url);

    $masterChildren = get_children(array('post_parent' => $id, 'post_type' => 'page'));

    foreach ($masterChildren as $key => $value) {
        $masterChildren[$key]->url = get_permalink($value->ID);
    }

    $post = get_post($id);
    $post_name = $post->post_name;

    restore_from_master();

    $page = get_page_by_path($post_name);
    $childChildren = get_children(array('post_parent' => $page->ID, 'post_type' => 'page'));
    $children = $masterChildren;
    foreach ($childChildren as $a) {
        foreach ($masterChildren as $key => $b) {
            if ($a->post_name == $b->post_name) {
                unset($children[$key]);
            }
        }
        $a->url = get_permalink($a->ID);
        $children[] = $a;
    }

    $menu->children = $children;
    $menus[] = $menu;

}

function volvo_bottom_menu($menuName = 'Mainmenu', $displaychildren = true)
{

    switch_to_master();
    $menuItems = wp_get_nav_menu_items($menuName);
    foreach ($menuItems as $key => $value) {
        $id = url_to_postid($value->url);
        $post = get_post($id);
        $post_name = $post->post_name;
        restore_from_master();
        $page = get_page_by_path($post_name);
        $menuItems[$key]->newurl = get_permalink($page->ID);
        switch_to_master();
    }
    restore_from_master();

    $menus = array();

    if ($displaychildren) {
        foreach ($menuItems as $menu) {

            switch_to_master();

            $id = url_to_postid($menu->url);

            $masterChildren = get_children(array('post_parent' => $id, 'post_type' => 'page'));

            foreach ($masterChildren as $key => $value) {
                $masterChildren[$key]->url = get_permalink($value->ID);
            }

            $post = get_post($id);
            $post_name = $post->post_name;

            restore_from_master();

            $page = get_page_by_path($post_name);
            $childChildren = get_children(array('post_parent' => $page->ID, 'post_type' => 'page'));
            $children = $masterChildren;
            foreach ($childChildren as $a) {
                foreach ($masterChildren as $key => $b) {
                    if ($a->post_name == $b->post_name) {
                        unset($children[$key]);
                    }
                }
                $a->url = get_permalink($a->ID);
                $children[] = $a;
            }

            $menu->children = $children;
            $menus[] = $menu;
        }
    }

    ?>
    <div class="nav-menu">
        <ul id="menu-<?php echo strtolower($menuName); ?>" class="nav-menu">

            <?php
            foreach ($menus as $menu) {
                $classes = 'menu-item menu-item-type-' . $menu->type . ' menu-item-object-' . $menu->object . ' menu-item-' . $menu->ID;
                ?>
                <li class="<?php echo $classes; ?>">
                    <a <?php echo $target; ?>href="<?php echo $menu->newurl ?>"><?php echo $menu->title; ?></a>
                    <?php
                    if ($displaychildren && $menu->children) {
                        ?>
                        <ul class="submenu">
                            <?php
                            $subindex = 0;
                            foreach ($menu->children as $child) {
                                $subclasses = 'menu-item menu-item-type-' . $child->type . ' menu-item-object-' . $child->object . ' menu-item-' . $child->ID;
                                if ($child->ID == get_the_ID()) {
                                    $subclasses .= ' current-item';
                                }
                                $subclasses .= ' item-index-' . $subindex;
                                $subclasses .= ' item-col-' . ($subindex % 2);
                                $subindex++;
                                ?>
                                <li id="menu-item-<?php echo $child->ID; ?>" class="<?php echo $subclasses; ?>">
                                    <a <?php echo $target; ?>href="<?php echo $child->url ?>"<?php if ($child->open_in_lightbox == 'yes') {
                                        echo ' class="lytebox"';
                                    } ?>><?php echo $child->post_title; ?></a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    <?php
                    } ?>


                </li>
            <?php
            }
            ?>
        </ul>
    </div>

<?php

}

/*	add_action('init', 'cptui_register_my_cpt_bilar');
	function cptui_register_my_cpt_bilar() {
		register_post_type('bilar', array(
			'label' => 'Bilar',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'bilar', 'with_front' => true),
			'query_var' => true,
			'supports' => array('title','editor'),
			'labels' => array (
				'name' => 'Bilar',
				'singular_name' => 'Bil',
				'menu_name' => 'Bilar',
				'add_new' => 'Ny Bil',
				'add_new_item' => 'Lägg Till Ny Bil',
				'edit' => 'Editera',
				'edit_item' => 'Editera Bil',
				'new_item' => 'Ny Bile',
				'view' => 'Visa Bil',
				'view_item' => 'Visa Bil',
				'search_items' => 'Sök Bilar',
				'not_found' => 'Inga Bilar Hittades',
				'not_found_in_trash' => 'Inga Bilar hittades i papperskorgen',
				'parent' => 'Parent Bil',
				)
			) ); } */

function volvo_get_custom_menu($menu, $menu_class = 'menu', $get_sub_index = -1)
{
    ob_start();
    $items = wp_get_nav_menu_items($menu);
    ?>
    <div class="<?php echo strtolower($menu_class); ?>">
        <?php if ($items) { ?>
            <ul id="menu-<?php echo strtolower($menu); ?>" class="<?php echo $menu_class; ?>">
                <?php
                $menu_obj = array();
                foreach ($items as $item) {

                    $item_id = $item->ID;
                    if ($item->menu_item_parent == 0) {
                        $menu_item = array();
                        foreach ($item as $key => $value) {
                            $menu_item[$key] = $value;
                        }
                        if (is_array($menu_obj[$item_id])) {
                            $menu_obj[$item_id] = array_merge($menu_obj[$item_id], $menu_item);
                        } else {
                            $menu_obj[$item_id] = $menu_item;
                        }
                    } else {
                        $parent_id = $item->menu_item_parent;
                        if (!is_array($menu_obj[$parent_id]['children'])) {
                            $menu_obj[$parent_id]['children'] = array();
                        }

                        $menu_item = array();
                        foreach ($item as $key => $value) {
                            $menu_item[$key] = $value;
                        }
                        $menu_obj[$parent_id]['children'][] = $menu_item;
                    }
                }

                if ($get_sub_index < 0) :
                    $index = 0;
                    foreach ($menu_obj as $menu_item) {
                        $classes = 'menu-item menu-item-type-' . $menu_item['type'] . ' menu-item-object-' . $menu_item['object'] . ' menu-item-' . $menu_item['ID'];
                        foreach ($menu_item['classes'] as $class) {
                            $classes .= ' ' . $class;
                        }
                        if ($menu_item['open_in_lightbox'] == 'yes') {
                            $classes .= ' open_in_lightbox';
                        }
                        if ($menu_item['object_id'] == get_the_ID()) {
                            $classes .= ' current-item';
                        }
                        $classes .= ' item-index-' . $index;
                        $index++;
                        ?>
						<li id="menu-item-<?php echo $menu_item['ID']; ?>" class="<?php echo $classes; ?>">

							<?php

                        if (strpos($menu_item['url'], site_url()) === false) {
                            $target = 'target="_blank" ';
                        }
                        ?>
							<a <?php echo $target; ?>href="<?php echo $menu_item['url']; ?>"<?php if ($menu_item['open_in_lightbox'] == 'yes') {
                            echo ' class="lytebox"';
                        } ?>><?php echo $menu_item['title']; ?></a>
							<?php
                        if (count($menu_item['children']) > 0) {
                            echo '<ul class="submenu">';
                            $subindex = 0;
                            foreach ($menu_item['children'] as $submenu_item) {
                                $subclasses = 'menu-item menu-item-type-' . $submenu_item['type'] . ' menu-item-object-' . $submenu_item['object'] . ' menu-item-' . $submenu_item['ID'];
                                foreach ($submenu_item['classes'] as $subclass) {
                                    $subclasses .= ' ' . $subclass;
                                }
                                if ($submenu_item['open_in_lightbox'] == 'yes') {
                                    $subclasses .= ' open_in_lightbox';
                                }
                                if ($submenu_item['object_id'] == get_the_ID()) {
                                    $subclasses .= ' current-item';
                                }
                                $subclasses .= ' item-index-' . $subindex;
                                $subclasses .= ' item-col-' . ($subindex % 2);
                                $subindex++;
                                ?>
                                <li id="menu-item-<?php echo $submenu_item['ID']; ?>"
                                    class="<?php echo $subclasses; ?>">
                                    <?php
                                    if (strpos($submenu_item['url'], site_url()) === false) {
                                        $target = 'target="_blank" ';
                                    }
                                    ?>
                                    <a <?php echo $target; ?>href="<?php echo $submenu_item['url']; ?>"<?php if ($submenu_item['open_in_lightbox'] == 'yes') {
                                        echo ' class="lytebox"';
                                    } ?>><?php echo $submenu_item['title']; ?></a>
                                </li>
                            <?php
                            }
                            if (strtolower($menu_item['title']) == 'utforska bil' || strtolower($menu_item['title']) == 'köp bil') {
                                ?>
                                <div class="clear"></div>
                                <li class="build_car_menu_item open_in_lightbox"><a class="lytebox"
                                                                                    href="<?php echo site_url(); ?>/bygg-din-volvo/">Bygg
                                        din Volvo</a></li>
                            <?php
                            }
                            echo '</ul>';
                        }

                        ?>
						</li>

						<?php
                    }
                endif;

                if ($get_sub_index >= 0) :

                    $key_array = array();
                    foreach ($menu_obj as $key => $value) {
                        $key_array[] = $key;
                    }

                    // var_dump($menu_obj);
                    // var_dump($key_array);
                    // var_dump($get_sub_index);

                    foreach ($menu_obj[$key_array[$get_sub_index]]['children'] as $menu_item) {

                        $classes = 'menu-item menu-item-type-' . $menu_item['type'] . ' menu-item-object-' . $menu_item['object'] . ' menu-item-' . $menu_item['ID'];
                        foreach ($menu_item['classes'] as $class) {
                            $classes .= ' ' . $class;
                        }
                        if ($menu_item['open_in_lightbox'] == 'yes') {
                            $classes .= ' open_in_lightbox';
                        }
                        if ($menu_item['object_id'] == get_the_ID()) {
                            $classes .= ' current-item';
                        }
                        $classes .= ' item-index-' . $index;
                        $index++;
                        ?>
                        <li id="menu-item-<?php echo $menu_item['ID']; ?>" class="<?php echo $classes; ?>">

                            <?php

                            if (strpos($menu_item['url'], site_url()) === false) {
                                $target = 'target="_blank" ';
                            }
                            ?>
                            <a <?php echo $target; ?>href="<?php echo $menu_item['url']; ?>"<?php if ($menu_item['open_in_lightbox'] == 'yes') {
                                echo ' class="lytebox"';
                            } ?>><?php echo $menu_item['title']; ?></a>
                            <?php


                            ?>
                        </li>

                    <?php
                    }

                endif;


                ?>
            </ul>
        <?php } else {
            echo '&nbsp;';
        } ?>
    </div>

    <?php
    return ob_get_clean();
}


//Get cars from Access
function getVolvoCars($filter = null)
{

    $url = "http://webapi.bytbil.com/object/search/?FilterId=" . get_field('filterid', 'options') . "&" . implode("&", $filter);

    // Simple file cache
    $key = str_replace("=", "", implode("", $filter));
    $key = sha1($key);
    $cache_file = getcwd() . "/cache/" . $key . ".cache";
    if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 15))) {
        // Cache file is less than fifteen minutes old.
        $response = file_get_contents($cache_file);
    } else {
        // Update or create cache file
        $response = file_get_contents($url);
        file_put_contents($cache_file, $response, LOCK_EX);
    }

    $response = file_get_contents($url);
    $response = json_decode($response);
    return $response;
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
        $brand = $_POST['brand'];
        $url = 'http://webapi.bytbil.com/startvalues/models?searchType=rvppdkyg&brand=' . $brand;

        die(file_get_contents($url));
    }
}

add_action('wp_ajax_get_orter', 'getOrter');
add_action('wp_ajax_nopriv_get_orter', 'getOrter');
function getOrter()
{
    $url = 'http://webapi.bytbil.com/dealer/search/?FilterId=' . get_field('filterid', 'options');
    die(file_get_contents($url));
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

function volvo_searchbox($atts)
{
    ob_start();
    extract(shortcode_atts(array(
        'listcars' => 'no',
        'used' => '',
    ), $atts));
    include(locate_template('includes/include-searchbox.php'));


    if ($listcars == 'yes') {
        parse_car_response($response);
    }
    return ob_get_clean();
}

add_shortcode('volvo_searchbox', 'volvo_searchbox');


/**
 * Inserts a list of cars
 * @param brand , what brand to filter
 * @param body , what type of body
 * @param fuel , what type of fuel
 * @param pricefrom , minimum price to show
 * @param priceto , maximum price to show
 * @param yearfrom , minimum year to show
 * @param yearto , maximum year to show
 * @param milesfrom , minimum miles to show
 * @param milesto , maximum miles to show
 * @param sort , sort by this (price, model etc)
 * @param sortasc , true or false
 * @param exclvat , show prices without VAT
 * @param limit , limit how many to show
 *
 * @return Renders a list of cars
 */
function volvo_search_cars($atts)
{
    ob_start();
    extract(shortcode_atts(array(
        'brand' => '',
        'body' => '',
        'gearbox' => '',
        'fuel' => '',
        'pricefrom' => '',
        'priceto' => '',
        'yearfrom' => '',
        'yearto' => '',
        'milesfrom' => '',
        'milesto' => '',
        'sort' => '',
        'sortasc' => 'true',
        'exclvat' => '',
        'limit' => '',
    ), $atts));

    switch ($sort) {
        case 'model':
            $sort = 'rvppdkyg';
            break;
        case 'year':
            $sort = '3v2pdkyg';
            break;
        case 'miles':
            $sort = 'ivfpdkyg';
            break;
        case 'color':
            $sort = '7v4pdkyg';
            break;
        case 'price':
            $sort = 'pv7pdkyg';
            break;
    }

    switch ($fuel) {
        case 'bensin' :
            $fuel = 'tv5pdkyg';
            break;
        case 'bensinetanol' :
            $fuel = 'evhpdkyg';
            break;
        case 'bensingas' :
            $fuel = 'cvg5dkyg';
            break;
        case 'diesel' :
            $fuel = 'wvxpdkyg';
            break;
        case 'el' :
            $fuel = 'xvqpdkyg';
            break;
        case 'hybrid' :
            $fuel = '5vepdkyg';
            break;
        case 'naturgas' :
            $fuel = '6vcpdkyg';
            break;
    }

    switch ($gearbox) {
        case 'automatisk' :
            $gearbox = 'gvwpdkyg';
            break;
        case 'manuell' :
            $gearbox = '4v8pdkyg';
            break;
        case 'sekventiell' :
            $gearbox = '8vnpdkyg';
            break;
    }

    switch ($body) {
        case 'sedan' :
            $body = 'rvppdkyg';
            break;
        case 'kombi' :
            $body = 'sv3pdkyg';
            break;
        case 'halvkombi' :
            $body = 'vvipdkyg';
            break;
        case 'sportkupe' :
            $body = '3v2pdkyg';
            break;
        case 'suv' :
            $body = 'ivfpdkyg';
            break;
        case 'cab' :
            $body = '7v4pdkyg';
            break;
        case 'minibuss' :
            $body = '2v9pdkyg';
            break;
        case 'övrigt' :
            $body = 'fvgpdkyg';
            break;
    }

    switch ($brand) {
        case 'abarth':
            $brand = 'mv3ydkyg';
            break;
        case 'ac':
            $brand = 'gv8idkyg';
            break;
        case 'acura':
            $brand = 'rvq6dkyg';
            break;
        case 'aixam':
            $brand = 'jvxwdkyg';
            break;
        case 'alfa':
            $brand = 'rvppdkyg';
            break;
        case 'aston':
            $brand = 'pv7pdkyg';
            break;
        case 'audi':
            $brand = '3v2pdkyg';
            break;
        case 'austin':
            $brand = 'ivfpdkyg';
            break;
        case 'austin':
            $brand = '6vbudkyg';
            break;
        case 'beach':
            $brand = '9vzqdkyg';
            break;
        case 'bentley':
            $brand = '7v4pdkyg';
            break;
        case 'bmw':
            $brand = '2v9pdkyg';
            break;
        case 'buick':
            $brand = 'fvgpdkyg';
            break;
        case 'cadillac':
            $brand = '4v8pdkyg';
            break;
        case 'caterham':
            $brand = 'ev3cdkyg';
            break;
        case 'chatenet':
            $brand = '4vkmdkyg';
            break;
        case 'chevrolet':
            $brand = '9vtpdkyg';
            break;
        case 'chrysler':
            $brand = 'gvwpdkyg';
            break;
        case 'citroën':
            $brand = '8vnpdkyg';
            break;
        case 'dacia':
            $brand = '3vbtdkyg';
            break;
        case 'daewoo':
            $brand = 'tv5pdkyg';
            break;
        case 'daihatsu':
            $brand = 'nv6pdkyg';
            break;
        case 'daimler':
            $brand = '5vepdkyg';
            break;
        case 'desoto':
            $brand = 'svu8dkyg';
            break;
        case 'dodge':
            $brand = 'xvqpdkyg';
            break;
        case 'ecar':
            $brand = '2v6udkyg';
            break;
        case 'edsel':
            $brand = 'svc6dkyg';
            break;
        case 'excalibur':
            $brand = '6vcpdkyg';
            break;
        case 'ferrari':
            $brand = 'evhpdkyg';
            break;
        case 'fiat':
            $brand = 'qvkpdkyg';
            break;
        case 'fisker':
            $brand = '6vdydkyg';
            break;
        case 'ford':
            $brand = 'cvmpdkyg';
            break;
        case 'galloper':
            $brand = 'hvjpdkyg';
            break;
        case 'gmc':
            $brand = 'kvypdkyg';
            break;
        case 'honda':
            $brand = 'mvupdkyg';
            break;
        case 'hudson':
            $brand = '2vs8dkyg';
            break;
        case 'hummer':
            $brand = '4vp8dkyg';
            break;
        case 'hyundai':
            $brand = 'jvzpdkyg';
            break;
        case 'infiniti':
            $brand = 'cvn8dkyg';
            break;
        case 'isuzu':
            $brand = 'yvbpdkyg';
            break;
        case 'iveco':
            $brand = 'uvdpdkyg';
            break;
        case 'jaguar':
            $brand = 'zvapdkyg';
            break;
        case 'jdm':
            $brand = 'bvrpdkyg';
            break;
        case 'jeep':
            $brand = 'dvspdkyg';
            break;
        case 'kia':
            $brand = 'svp3dkyg';
            break;
        case 'koenigsegg':
            $brand = 'bvk8dkyg';
            break;
        case 'lada':
            $brand = 'vv33dkyg';
            break;
        case 'lamborghini':
            $brand = 'pvi3dkyg';
            break;
        case 'lancia':
            $brand = '3v73dkyg';
            break;
        case 'land':
            $brand = 'iv23dkyg';
            break;
        case 'lexus':
            $brand = '7vf3dkyg';
            break;
        case 'lincoln':
            $brand = '2v43dkyg';
            break;
        case 'lotus':
            $brand = 'fv93dkyg';
            break;
        case 'maserati':
            $brand = '4vg3dkyg';
            break;
        case 'mazda':
            $brand = '9v83dkyg';
            break;
        case 'mclaren':
            $brand = 'fv22dkyg';
            break;
        case 'mercedes':
            $brand = 'gvt3dkyg';
            break;
        case 'mercury':
            $brand = 'jvn5dkyg';
            break;
        case 'mg':
            $brand = '8vw3dkyg';
            break;
        case 'microcar':
            $brand = 'jv6tdkyg';
            break;
        case 'mini':
            $brand = 'tvn3dkyg';
            break;
        case 'mitsubishi':
            $brand = 'wv53dkyg';
            break;
        case 'morgan':
            $brand = 'nvx3dkyg';
            break;
        case 'nissan':
            $brand = 'xve3dkyg';
            break;
        case 'oldsmobile':
            $brand = '6vq3dkyg';
            break;
        case 'opel':
            $brand = 'evc3dkyg';
            break;
        case 'packard':
            $brand = 'hvntdkyg';
            break;
        case 'peugeot':
            $brand = 'qvh3dkyg';
            break;
        case 'plymouth':
            $brand = 'cvk3dkyg';
            break;
        case 'pontiac':
            $brand = 'hvm3dkyg';
            break;
        case 'porsche':
            $brand = 'kvj3dkyg';
            break;
        case 'renault':
            $brand = 'mvy3dkyg';
            break;
        case 'reynard':
            $brand = 'bv2zdkyg';
            break;
        case 'rolls':
            $brand = 'jvu3dkyg';
            break;
        case 'rover':
            $brand = 'hvc2dkyg';
            break;
        case 'saab':
            $brand = 'uvb3dkyg';
            break;
        case 'seat':
            $brand = 'bva3dkyg';
            break;
        case 'simca':
            $brand = 'jvgqdkyg';
            break;
        case 'singer':
            $brand = 'evdudkyg';
            break;
        case 'skoda':
            $brand = 'dvr3dkyg';
            break;
        case 'smart':
            $brand = 'avs3dkyg';
            break;
        case 'ssangyong':
            $brand = 'svvidkyg';
            break;
        case 'studebaker':
            $brand = 'rvy8dkyg';
            break;
        case 'subaru':
            $brand = 'vvpidkyg';
            break;
        case 'suzuki':
            $brand = 'pv3idkyg';
            break;
        case 'tazzari':
            $brand = '5vzydkyg';
            break;
        case 'toyota':
            $brand = 'iv7idkyg';
            break;
        case 'triumph':
            $brand = '7v2idkyg';
            break;
        case 'tvr':
            $brand = 'gv4fdkyg';
            break;
        case 'ultima':
            $brand = '9vcudkyg';
            break;
        case 'vauxhall':
            $brand = 'vvecdkyg';
            break;
        case 'westfield':
            $brand = 'zv7zdkyg';
            break;
        case 'wiesmann':
            $brand = 'uvtqdkyg';
            break;
        case 'volkswagen':
            $brand = '2vfidkyg';
            break;
        case 'volvo':
            $brand = 'fv4idkyg';
            break;
        case 'vpg':
            $brand = 'bvfudkyg';
            break;
    }
    $brand = 'fv4idkyg';
    $filter = array(
        "Brand=" . $brand,
        "Body=" . $body,
        "Gearbox=" . $gearbox,
        "Fuel=" . $fuel,
        "PriceFrom=" . $pricefrom, "PriceTo=" . $priceto,
        "YearFrom=" . $yearfrom, "YearTo=" . $yearto,
        "MilesFrom=" . $milesfrom, "MilesTo=" . $milesto,
        "Sort=" . $sort,
        "SortAsc=" . $sortasc,
        "OnlyVat=" . $exclvat,
        "PageSize=" . $limit,
    );
    $response = getVolvoCars($filter);
    parse_car_response($response);
    ?>

    <?php
    return ob_get_clean();
}

add_shortcode('volvo_billista', 'volvo_search_cars');

function parse_car_response($response)
{
    ?>
    <div id="car-list">
        <div class="midcontent paginationn">
            <?php if ($response->TotalCount < 1) {
                $totalcars = 0;
            } else {
                $totalcars = $response->TotalCount;
            }
            ?>
            <span class="total"><?php echo $totalcars; ?> object matchade dina sökkriterier.</span>
            <?php if ($totalcars > 20) {
                include(locate_template('includes/include-pagination.php'));
            } ?>

            <div class="clear"></div>
        </div>
        <div class="nyberg-car-row">
            <?php
            $i = 0;
            foreach ($response->Items as $item) :
            $imgurl = $item->ImageUrl;
            $imgurl = str_replace('thumb', 'gallery', $imgurl);

            ?>
            <div class="nyberg-car-container">

                <a onclick="loadCar(this); return false;"
                   href="<?php echo site_url(); ?>/fordon/?f=<?php echo $item->Id; ?>&model=<?php echo $item->ModelName; ?>&fullName=<?php echo urlencode($item->FullName); ?>">
                    <div class="responsive-table-row" style="display: table-row">
                        <img class="nyberg-car-image" src="<?php echo $imgurl; ?>"/>

                        <div class="nyberg-car-text">
                            <div class="nyberg-car-title"><?php echo $item->FullName; ?></div>
                            <div class="nyberg-car-left">

                                <div style="display: inline-block; width: 49%;">
                                    Fordonsår:<br/>
                                    Miltal:<br/>
                                    Drivmedel:<br/>
                                    Färg:<br/>
                                    Ort:
                                </div>
                                <div style="display: inline-block; width: 49%">
                                    <?php echo $item->Year; ?><br/>
                                    <?php echo $item->SweMiles; ?><br/>
                                    <?php echo $item->KM; ?><br/>
                                    <?php echo $item->KM; ?><br/>

                                    <?php echo ucfirst(mb_strtolower($item->Location)); ?>

                                </div>

                            </div>
                            <div class="nyberg-car-right">
                                <div style="display: none;" class="responsive-miles"><?php echo $item->SweMiles; ?>
                                    mil
                                </div>
                                <?php
                                $price = $item->Price;
                                $current_price = $item->CurrentPrice;
                                if ($current_price > 0) {
                                    ?>
                                    <span class="oldprice"><?php echo number_format($price, 0, ',', '.'); ?> kr</span>
                                    <br/>
                                    <span class="newprice-red"><?php echo number_format($current_price, 0, ',', '.'); ?>
                                        kr</span>
                                <?php
                                } else {
                                    ?>
                                    <span class="newprice"><?php echo number_format($price, 0, ',', '.'); ?> kr</span>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="nyberg-car-corner"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </a>

            </div>
            <?php
            $i++;
            if ($i == 4){
            $i = 0; ?>
        </div>
        <div class="nyberg-car-row">
            <?php }
            endforeach;
            ?>
        </div>
        <div class="clear"></div>
    </div>
<?php
}

/* Includes ACF */
include_once('acf.php');

function oppettider($atts)
{
    ob_start();
    if (get_field('opentimes', 'options')) {
        while (has_sub_fields('opentimes', 'options')) { ?>
            <div style="width:100%">
                <h4><?php the_sub_field('fritext', 'options'); ?></h4>
                <?php while (has_sub_fields('times', 'options')) : ?>
                    <span><?php the_sub_field('day', 'options'); ?>: <?php the_sub_field('time', 'options'); ?></span>
                    <br>
                <?php endwhile; ?>
            </div>

        <?php }
    }
    return ob_get_clean();
}

add_shortcode('oppettider', 'oppettider');


function wpb_list_child_pages($includeBuildCar = false, $carTitle = null)
{

    global $post;


    $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0&exv');

    if ($childpages) {
        if ($includeBuildCar) {
            if (!$carTitle) {
                $carTitle = get_the_title();
            }
            $string = '<ul>' . $childpages;
            $string .= '<li class="page_item open_in_lightbox">
						<a href="' . site_url() . '/bygg-din-volvo/" class="lytebox">
							Bygg din ' . $carTitle . '
						</a>
					</li>'
                . '</ul>';
        } else {
            $string = '<ul>' . $childpages . '</ul>';
        }

    }

    return $string;

}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');


function wpb_list_child_pagesparam($ids)
{

    global $post;


    $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $ids[0] . '&echo=0&exv');

    if ($childpages) {
        $string = '<ul>' . $childpages . '</ul>';
    }

    return $string;

}


add_action('init', 'cptui_register_my_cpt_assortment');
function cptui_register_my_cpt_assortment()
{
    register_post_type('assortment', array(
        'label' => 'Fordonsurval',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'assortment', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title'),
        'labels' => array(
            'name' => 'Fordonsurval',
            'singular_name' => 'Fordonsurval',
            'menu_name' => 'Fordonsurval',
            'add_new' => 'Lägg till',
            'add_new_item' => 'Lägg till urval',
            'edit' => 'Redigera ',
            'edit_item' => 'Redigera urval',
            'new_item' => 'Nytt urval',
            'view' => 'Visa urval',
            'view_item' => 'Visa urval',
            'search_items' => 'Sök urval',
            'not_found' => 'Hittade inget urval',
            'not_found_in_trash' => 'No Fordonsurval Found in Trash',
            'parent' => 'Parent Fordonsurval',
        )
    ));
}


add_filter('the_posts', 'filter_startsidor', 10, 2);
function filter_startsidor($posts, $args)
{
    if (is_admin()) {
        return $posts;
    }

    //var_dump($args);
    //var_dump($args->query_vars['post_type']);
    if ($args->query_vars['post_type'] == 'startsidor') {
        if ($args->is_single) {
            if (filter_startsida($posts)) {
                return $posts;
            } else {
                return false;
            }
        } else {

            $newPosts = array();
            foreach ($posts as $post) {
                if (filter_startsida($post)) {
                    $newPosts[] = $post;
                }
            }
            return $newPosts;
        }
    } else {
        return $posts;
    }

    //var_dump($args);
    //$hideable = bytbil_get_field('hideable', true, $post->ID);
}

function filter_startsida($post)
{
    $hideable = bytbil_get_field('hideable', true, $post->ID);
    $hidden = bytbil_get_field('hidden', false, $post->ID);

    return !($hideable && $hidden);
}

register_nav_menu('bottom-main', 'Huvudmeny');
register_nav_menu('bottom-buy', 'Köp bil');
register_nav_menu('bottom-explore', 'Utforska bil');
register_nav_menu('bottom-services', 'Tjänster');
register_nav_menu('footer', 'Allmänt');
register_nav_menu('bilmeny', 'Bilmeny');
register_nav_menu('startsida', 'Startsida');

function new_volvo_menu($menu_name = 'main', $echoHtml = true, $ulclass = '', $includeChild = true)
{

    global $wpdb;

    if (!get_option('multisite_master')) {
        switch_to_master();
        $locations = get_registered_nav_menus();
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        $masterMenu = wp_get_nav_menu_items($menu->term_id);
        restore_current_blog();
        $locations = get_registered_nav_menus();
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        if ($menu) {
            $childMenu = wp_get_nav_menu_items($menu->term_id);
        }

        $menu = array();
        if ($masterMenu) {
            foreach ($masterMenu as $item) {
                if ($item->type !== 'custom') {
                    $item->url = get_local_permalink($item);
                }
                $menu[] = $item;
            }
        }
        if ($includeChild && $childMenu) {
            $menu = array_merge($menu, $childMenu);
        }
    } else {
        $locations = get_registered_nav_menus();
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        $menu = wp_get_nav_menu_items($menu->term_id);
    }


    if ($echoHtml) {
        $menu_list = '<ul id="menu-' . $menu_name . '" class="' . $ulclass . '">';
        if ($menu) {
            foreach ($menu as $key => $menu_item) {
                $title = $menu_item->title;
                if ($menu_item->type !== "custom") {
                    $url = get_local_permalink($menu_item);
                } else {
                    $url = $menu_item->url;
                }
                if ($menu_item->open_in_lightbox == 'yes') {
                    $class = 'lytebox';
                } else {
                    $class = '';
                }
                if ($menu_item->target) {
                    $target = $menu_item->target;
                } else {
                    $target = '';
                }
                $menu_list .= '<li><a href="' . $url . '" class="' . $class . '" target="' . $target . '">' . $title . '</a></li>';
            }
        }
        $menu_list .= '</ul>';
        echo $menu_list;
    } else {
        return $menu;
    }

}

function custom_mobile_menu($menus = array(), $print = false)
{
    if (!is_array($menus) && !empty($menus))
        return;

    $current_post = get_post(get_the_ID());
    $current_post_title = $current_post->post_title;
    $html = '<div>';

    foreach ($menus as $slug => $title) {
        $open = false;
        if (strtolower($title) === strtolower($current_post_title))
            $open = true;

        $html .= '<h2 class="accordion-header" data-target="accordion-' . $slug .'">' . $title . '</h2>';
        $volvo_menu = new_volvo_menu($slug, false);
        $items = '';

        foreach ($volvo_menu as $key => $menu_item) {
            if (strtolower($menu_item->title) === strtolower($current_post_title))
                $open = true;

            $title = $menu_item->title;
            if ($menu_item->type !== 'custom')
                $url = get_local_permalink($menu_item);
            else
                $url = $menu_item->url;

            $class = '';
            if ($menu_item->open_in_lightbox == 'yes')
                $class = 'lytebox';

            $target = '';
            if ($menu_item->target)
                $target = $menu_item->target;

            $items .= '<li><a href="' . $url . '" class="' . $class . '" target="' . $target . '">' . $title . '</a></li>';
        }

        $html .= '<ul class="accordion accordion-' . $slug . ($open ? ' accordion-open' : '') . '">';
        $html .= $items;
        $html .= '</ul>';
    }

    $html .= '</div>';

    if ($print)
        echo $html;
    else
        return $html;
}

function get_local_permalink($upstreamPost)
{
    return preg_replace('/^http:\/\/.*?(?=\/)/i', "http://" . $_SERVER['HTTP_HOST'], $upstreamPost->url);

    // global $wpdb;

    // $post = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->postmeta WHERE meta_key = %s AND meta_value = %d", array('pushed_original_id', $upstreamPost->object_id)), ARRAY_A);

    // if ($post) {
    // 	$url = get_permalink($post['post_id']);
    // 	$url = preg_replace('/^http:\/\/.*?(?=\/)/i', "http://" . $_SERVER['HTTP_HOST'], $url);
    // } else {
    // 	$url = $upstreamPost->url;
    // }
    // return $url;
}

add_action('wp_ajax_provkor', 'provkor_form_ajax');
add_action("wp_ajax_nopriv_provkor", "provkor_form_ajax");
function provkor_form_ajax()
{
    $data = array();
    parse_str($_POST['data'], $data);
    $headers = 'From: ' . sanitize_text_field($data['fornamn']) . " " . sanitize_text_field($data['efternamn']) . ' <' . sanitize_text_field($data['email']) . '>' . "\nContent-Type: text/html; charset=UTF-8" . PHP_EOL;
    $message = "Namn: " . sanitize_text_field($data['fornamn']) . " " . sanitize_text_field($data['efternamn']) . "<br>";
    $message .= "Tel: " . sanitize_text_field($data['telefon']) . "<br>";
    $message .= "E-mail: " . sanitize_email($data['email']) . "<br>";
    $message .= "RegNr: " . sanitize_text_field($data['regnr']) . "<br>";
    $message .= "<br><br>";
    $message .= "Bil(ar): <br>";
    foreach ($data['checkedCar'] as $car) {
        $message .= "&nbsp;&nbsp;&nbsp;" . sanitize_text_field($car) . "<br>";
    }
    $message .= "Kontakttid: <br>";
    foreach ($data['contactWhen'] as $when) {
        $message .= "&nbsp;&nbsp;&nbsp;" . sanitize_text_field($when) . "<br>";
    }
    $message .= "Vill ha nyheter via e-post: ";
    $message .= isset($data['contact_me']) ? "Ja" : "Nej";

    $success = wp_mail(sanitize_email($data['targetMail']), 'Provkörning', $message, $headers);
    if (!$success) {
        global $ts_mail_errors;
        global $phpmailer;
        if (!isset($ts_mail_errors)) $ts_mail_errors = array();
        if (isset($phpmailer)) {
            $ts_mail_errors[] = $phpmailer->ErrorInfo;
        }
        $error = $ts_mail_errors;
    }
    echo json_encode(array(
        'success' => $success,
        'errors' => isset($error) ? $error : '',
    ));
    die();
}

function bytbil_remove_pages()
{
    if (!current_user_can('promote_users')) {
        remove_menu_page('acf-options-header');
        remove_menu_page('gadash_settings');
        remove_menu_page('edit.php?post_type=acf');
        remove_menu_page('tools.php');
        remove_menu_page('options-general.php');
    }
    // var_dump($GLOBALS['menu']);
}

add_action('admin_init', 'bytbil_remove_pages', PHP_INT_MAX);


function bytbil_vdw3_mod()
{
    wp_enqueue_script('bytbil-vdw-criteriastring', get_template_directory_uri() . '/bytbil-vdw-criteriastring.js');
}

add_action('admin_enqueue_scripts', 'bytbil_vdw3_mod', 0);


if (!current_user_can('promote_users')) {

    function bytbil_vdw2_mod()
    {
        wp_enqueue_style('extra-admin-styles-css', get_template_directory_uri() . '/extra-admin-style.css');

    }

    add_action('admin_enqueue_scripts', 'bytbil_vdw2_mod', 0);

    global $pagenow;

    if ($pagenow == "post.php") {

        $post_id = $_GET['post'];
        $post_meta = get_post_meta($post_id);

        if (isset($post_meta['pushed_original_id'][0])) {
            function bytbil_vdw_mod()
            {
                wp_enqueue_style('bytbil-vdw-css', get_template_directory_uri() . '/admin-style.css');
                wp_enqueue_script('bytbil-vdw-js', get_template_directory_uri() . '/admin-js.js');
            }

            add_action('admin_enqueue_scripts', 'bytbil_vdw_mod', 0);
        }
    }


}

function volvo_personal_orter_func($atts)
{
    $orter = get_terms(array('ort'), array('order' => 'ASC', 'orderby' => 'name'));
    $no_orter = count($orter);

    ob_start();
    $i = 0;
    if ($no_orter > 0) {
        echo '<select class="personal_select">';
        echo '<option value="">Välj ort</option>';
        $param = isset($_GET['ort']) ? $_GET['ort'] : false;
        foreach ($orter as $ort) {
            $selected = ($param == $ort->slug) ? ' selected="selected"' : '';
            echo '<option value="' . $ort->slug . '"' . $selected . '>' . $ort->name . '</option>';
            echo '</select>';
        }
    }
    ?>
    <script>
        $(function () {
            $('.personal_select').change(function () {

                var val = $('.personal_select').val();
                window.location.href = '<?php echo get_permalink(); ?>?ort=' + val;

            });
        });

    </script>

    <?php
    return ob_get_clean();
}

add_shortcode('volvo_orter', 'volvo_personal_orter_func');

/*
function get_cars_from_master ($posts)
{
	$isMaster = get_option( 'multisite_master' );
	if (!$posts || count($posts) <= 0) {
		if (!$isMaster) {
			global $wp_query;
			if (strpos($wp_query->query['pagename'], 'bil/') >= 0) {

				if (!$wp_query->alreadyProcessed || $wp_query->alreadyProcessed == false) {
					switch_to_master();
					$newposts = $wp_query->query($wp_query->query);
					restore_from_master();
					if ($newposts) {
						$posts = $newposts;
						foreach($posts as $post) {
							$post->isMaster = true;
							$post->isCar = true;
						}
					}
					$wp_query->alreadyProcessed = true;
				}
			}
		}
	}
	return $posts;
}
add_action('the_posts', 'get_cars_from_master');

function add_car_template ($template)
{
	global $post;
	if ($post->isMaster && $post->isCar) {
		$new_template = locate_template(array('single-bilar.php'));
		return $new_template;

	}

	return $template;
}
add_filter('template_include', 'add_car_template');
*/

function filter_ptags_on_images($content)
{
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');


function my_myme_types($mime_types)
{
    $mime_types['js'] = 'application/javascript'; //Adding avi extension
    return $mime_types;
}

add_filter('upload_mimes', 'my_myme_types', 1, 1);

function parse_model_name($name) {
    $find = array('Cross Country', 'Classic Summum', 'Classic');
    $replace = array('<small>Cross<br />Country</small>', '<small>Classic<br />Summum</small>', '<small>Classic</small>');
    return str_replace($find, $replace, $name);
}

function print_seo_meta($id)
{
    $seo_settings = get_field('options-seo', 'option');
    $meta = false;
    $found_match = false;
    $match = false;

    if ($seo_settings) {
        foreach ($seo_settings as $page) {
            if ($found_match)
                break;

            if ($page['options-seo-page']->ID === $id)
                $match = true;

            if (!$match)
                continue;

            $meta = array(
                'title' => $page['options-seo-title'],
                'keywords' => $page['options-seo-keywords'],
                'description' => $page['options-seo-description']
            );

            $found_match = true;
        }

        if ($meta) {
            extract($meta);
            if ($title) : ?>
                <title><?php echo $title; ?></title>
            <?php else : ?>
            <title><?php if (!is_home()) {
                    echo the_title() . " - ";
                } ?><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
            <?php endif;
            if ($keywords) : ?>
                <meta name="keywords" content="<?php echo $keywords; ?>" />
            <?php endif;
            if ($description) : ?>
                <meta name="description" content="<?php echo $description; ?>" />
            <?php endif;
        }
    }
}
