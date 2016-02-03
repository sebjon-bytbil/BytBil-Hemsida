<?php
/** 
 * Plugin recomendations
 **/
global $theme_options;

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

require_once ('class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'magnium_register_required_plugins' );

function magnium_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        
        array(
            'name'                  => 'Magnium Visual Page Builder', // The plugin name
            'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/js_composer.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '4.4.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),        
        array(
            'name'                  => 'Magnium Theme Addons', // The plugin name
            'slug'                  => 'magnium-theme-addons', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/magnium-theme-addons.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'Magnium Portfolio Gallery Uploader', // The plugin name
            'slug'                  => 'multi-image-metabox', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/multi-image-metabox.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '100.1.3.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'Revolution Slider', // The plugin name
            'slug'                  => 'revslider', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/revslider.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '4.6.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'WooCommerce', // The plugin name
            'slug'                  => 'woocommerce', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/woocommerce.2.3.7.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '2.3.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'WooCommerce Brands', // The plugin name
            'slug'                  => 'mgwoocommercebrands', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/mgwoocommercebrands.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'WooCommerce WishList', // The plugin name
            'slug'                  => 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/yith-woocommerce-wishlist.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '100.1.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'WooCommerce QuickView', // The plugin name
            'slug'                  => 'woo_quickview', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/woo_quickview.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '3.0.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'WooCommerce Sales Countdown', // The plugin name
            'slug'                  => 'woosalescountdown', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/woosalescountdown.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.8.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'WooCommerce Ajax Search', // The plugin name
            'slug'                  => 'yith-woocommerce-ajax-search', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/yith-woocommerce-ajax-search.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '100.1.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'Magnium Translation Manager', // The plugin name
            'slug'                  => 'loco-translate', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/loco-translate.1.4.7.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.4.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'                  => 'PrettyPhoto Lightbox', // The plugin name
            'slug'                  => 'prettyphoto', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/prettyphoto.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),


        array(
            'name'                  => 'Contact Form 7', // The plugin name
            'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/contact-form-7.4.0.3.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '4.0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        
        array(
            'name'                  => 'Regenerate Thumbnails', // The plugin name
            'slug'                  => 'regenerate-thumbnails', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/regenerate-thumbnails.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '2.2.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        
        array(
            'name'                  => 'Simple WP Retina', // The plugin name
            'slug'                  => 'simple-wp-retina', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/simple-wp-retina.1.1.1.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        )

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => 'magnium',           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                          // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',                // Default parent menu slug
        'parent_url_slug'   => 'themes.php',                // Default parent URL slug
        'menu'              => 'install-required-plugins',  // Menu slug
        'has_notices'       => true,                        // Show admin notices or not
        'dismissable'  => true,
        'is_automatic'      => false,                       // Automatically activate plugins after installation or not
        'message'           => '',                          // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', 'magnium' ),
            'menu_title'                                => __( 'Install Plugins', 'magnium' ),
            'installing'                                => __( 'Installing Plugin: %s', 'magnium' ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', 'magnium' ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', 'magnium' ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', 'magnium' ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', 'magnium' ), // %1$s = dashboard link
            'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );

}

/* Widgets */

function magnium_widgets_init() {
    global $theme_options;
    
    register_sidebar(
      array(
        'name' => __( 'Left/Right sidebar', 'magnium' ),
        'id' => 'main-sidebar',
        'description' => __( 'Widgets in this area will be shown in the left or right site column.', 'magnium' )
      )
    );

    register_sidebar(
      array(
        'name' => __( 'Woocommerce Category/listing sidebar', 'magnium' ),
        'id' => 'shop-sidebar',
        'description' => __( 'Widgets in this area will be shown in the left or right column on shop listing pages.', 'magnium' )
      )
    );

    register_sidebar(
      array(
        'name' => __( 'Woocommerce Product page sidebar', 'magnium' ),
        'id' => 'shop-product-sidebar',
        'description' => __( 'Widgets in this area will be shown in the left or right column on shop product page.', 'magnium' )
      )
    );

    register_sidebar(
      array(
        'name' => __( 'Offcanvas Right sidebar', 'magnium' ),
        'id' => 'offcanvas-sidebar',
        'description' => __( 'Widgets in this area will be shown in the right floating offcanvas menu sidebar that can be opened by toggle button in header. You can enable this sidebar in theme control panel.', 'magnium' )
      )
    );

    register_sidebar(
      array(
        'name' => __( 'Footer 4 column sidebar #1', 'magnium' ),
        'id' => 'footer-sidebar',
        'description' => __( 'Widgets in this area will be shown in site footer in 4 column.', 'magnium' )
      )
    );

    register_sidebar(
      array(
        'name' => __( 'Footer 4 column sidebar #2', 'magnium' ),
        'id' => 'footer-sidebar-2',
        'description' => __( 'Widgets in this area will be shown in site footer in 4 column after Footer sidebar #1.', 'magnium' )
      )
    );

    if(isset($theme_options['megamenu_sidebars_count']) && ($theme_options['megamenu_sidebars_count'] > 0)) {
        for ($i = 1; $i <= $theme_options['megamenu_sidebars_count']; $i++) {
            register_sidebar(
              array(
                'name' => __( 'MegaMenu sidebar #'.$i, 'magnium' ),
                'id' => 'megamenu_sidebar_'.$i,
                'description' => __( 'You can use this sidebar to display widgets inside megamenu items in menus.', 'magnium' )
              )
            );
        }
    }
}

add_action( 'widgets_init', 'magnium_widgets_init' );

add_filter('widget_text', 'do_shortcode');

/* WooCommerce product display limit settings */
if ( defined('DEMO_MODE') && isset($_GET['shop_woocommerce_products_per_page']) ) {
  $theme_options['shop_woocommerce_products_per_page'] = intval($_GET['shop_woocommerce_products_per_page']);
}
if ( defined('DEMO_MODE') && isset($_GET['shop_products_per_row']) ) {
  $theme_options['shop_products_per_row'] = intval($_GET['shop_products_per_row']);
}

if(!isset($theme_options['shop_woocommerce_products_per_page'])) {
    $theme_options['shop_woocommerce_products_per_page'] = 4;
}
if(!isset($theme_options['shop_products_per_row'])) {
    $theme_options['shop_products_per_row'] = 4;
}

$products_display_limit = $theme_options['shop_woocommerce_products_per_page'] * $theme_options['shop_products_per_row'];

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.intval($products_display_limit).';' ), 20 );

/*
* WooCommerce ajax add to cart
*/
// Ensure cart contents update when products are added to the cart via AJAX
add_filter('add_to_cart_fragments', 'magnium_woocommerce_header_add_to_cart_fragment');
 
function magnium_woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;
  ob_start();
  ?>
  <div class="shopping-cart" id="shopping-cart">
      
      <div class="shopping-cart-title">
        
        <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><div class="shopping-cart-count"><?php echo $woocommerce->cart->cart_contents_count; ?></div></a>
        <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'magnium'); ?>"><?php _e('Cart', 'magnium'); ?> / <?php echo $woocommerce->cart->get_cart_total(); ?></a>
      </div><a class="shopping-cart-icon" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"></a>
      <div class="shopping-cart-content">
      <?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
      <div class="shopping-cart-products">
      <?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) : $_product = $cart_item['data'];
      if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 ) continue;
      $product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();
      $product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
      ?>
      <div class="shopping-cart-product clearfix">
        <div class="shopping-cart-product-image">
        <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo $_product->get_image(); ?></a>
        </div>
        <div class="shopping-cart-product-remove">
            <?php
                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">×</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
            ?>
        </div>
        <div class="shopping-cart-product-title">
        <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></a>
        </div>
        <div class="shopping-cart-product-price">
        <?php echo $woocommerce->cart->get_item_data( $cart_item ); ?><span class="quantity"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>
        </div>
      </div>
      <?php endforeach; ?>
      </div>
      <div class="shopping-cart-subtotal clearfix"><div class="shopping-cart-subtotal-text"><?php _e('Subtotal', 'magnium'); ?></div><div class="shopping-cart-subtotal-value"><?php echo $woocommerce->cart->get_cart_total(); ?></div></div>
      <a class="view-cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'magnium'); ?>"><?php _e('View cart', 'magnium'); ?></a> <a class="view-cart checkout" href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" title="<?php _e('Proceed to checkout', 'magnium'); ?>"><?php _e('Proceed to checkout', 'magnium'); ?></a>
      <?php else : ?>
        <div class="empty-cart-icon-mini"></div>
        <div class="empty"><?php _e('No products in the cart.', 'magnium'); ?></div>
      <?php endif; ?>
      
      </div>
    </div>
    <script>
        (function($){
        $(document).ready(function() {

            // Shopping cart products
            $(".shopping-cart-products").wrapInner('<div class="nano"></div>');
            $(".shopping-cart-products .nano").wrapInner('<div class="nano-content"></div>');

            $(".shopping-cart-products .nano").nanoScroller();

        });
        })(jQuery);
    </script>
  <?php
  $fragments['#shopping-cart'] = ob_get_clean();
  return $fragments;
}

// Customisation Menu Links
class magnium_description_walker extends Walker_Nav_Menu{
      function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0 ){
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
           $class_names = $value = '';
           $classes = empty( $item->classes ) ? array() : (array) $item->classes;
           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
          
           $add_class = '';
           
           $post = get_post($item->object_id);          

               $class_names = ' class="'.$add_class.' '. esc_attr( $class_names ) . '"';
               $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
               $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
               $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
               $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

                    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

                if (is_object($args)) {
                    $item_output = $args->before;
                    $item_output .= '<a'. $attributes .'>';
                    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
                    $item_output .= $args->link_after;
                    $item_output .= '</a>';
                    $item_output .= $args->after;
                    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

                }
     }
}

function magnium_custom_favicon() {
    global $theme_options;

    if(isset($theme_options['favicon_image']) && $theme_options['favicon_image']['url'] <> '') {
      echo '<link rel="icon" type="image/png" href="'.$theme_options['favicon_image']['url'].'" />';
    }
}
add_action( 'wp_head' , 'magnium_custom_favicon' );

function magnium_google_fonts() {
    global $theme_options;


    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['header_font']) ) {
      $theme_options['header_font']['font-family'] = $_GET['header_font'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['body_font']) ) {
      $theme_options['body_font']['font-family'] = $_GET['body_font'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['additional_font']) ) {
      $theme_options['additional_font']['font-family'] = $_GET['additional_font'];
    }
    ?>

    <?php if(isset($theme_options['font_google_disable']) && $theme_options['font_google_disable'] == false): ?>

        <link href='//fonts.googleapis.com/css?family=<?php if(isset($theme_options['header_font'])) { echo $theme_options['header_font']['font-family']; } ?>:300,400,700<?php if(isset($theme_options['font_cyrillic_enable']) && ($theme_options['font_cyrillic_enable'])) { echo '&amp;subset=cyrillic'; } ?>' rel='stylesheet' type='text/css'>
        <?php if($theme_options['header_font']['font-family'] <> $theme_options['body_font']['font-family']): ?>
        <link href='//fonts.googleapis.com/css?family=<?php echo $theme_options['body_font']['font-family']; ?><?php if(isset($theme_options['font_cyrillic_enable']) && ($theme_options['font_cyrillic_enable'])) { echo '&amp;subset=latin,cyrilic'; } ?>' rel='stylesheet' type='text/css'>
        <?php endif; ?>
        
        <?php if(isset($theme_options['additional_font_enable']) && $theme_options['additional_font_enable']): ?>
        <link href='//fonts.googleapis.com/css?family=<?php if(isset($theme_options['additional_font'])) { echo $theme_options['additional_font']['font-family']; } ?>' rel='stylesheet' type='text/css'>
        <?php endif; ?>

    <?php endif; ?>

    <?php
}
add_action( 'wp_head' , 'magnium_google_fonts' );

// include the WPML installer in the theme
include get_template_directory() . '/inc/wpml-installer/loader.php';

WP_Installer_Setup($wp_installer_instance, array(
    'plugins_install_tab' => 1, // optional, default value: 0
    'affiliate_id' => '90915', // optional, default value: empty
    'affiliate_key' => '2BMypRRSJR46', // optional, default value: empty
    'src_name' => 'Magnium', // optional, default value: empty, needed for coupons 
    'src_author' => 'Magnium themes',// optional, default value: empty, needed for coupons 
    'repositories_include' => array('wpml') // optional, default to empty (show all)
) );


// WooCommerce Variation display inside dropdown
add_filter( 'woocommerce_variation_option_name', 'magnium_display_price_in_variation_option_name' );
function magnium_display_price_in_variation_option_name( $term ) {
    global $wpdb, $product;

    $result = $wpdb->get_col( "SELECT slug FROM {$wpdb->prefix}terms WHERE name = '$term'" );

    $term_slug = ( !empty( $result ) ) ? $result[0] : $term;

    if(!isset($product->id)) {
        $product_id = 0;
    } else {
        $product_id = $product->id;
    }

    $query = "SELECT postmeta.post_id AS product_id
                FROM {$wpdb->prefix}postmeta AS postmeta
                    LEFT JOIN {$wpdb->prefix}posts AS products ON ( products.ID = postmeta.post_id )
                WHERE postmeta.meta_key LIKE 'attribute_%'
                    AND postmeta.meta_value = '$term_slug'
                    AND products.post_parent = $product_id";

    $variation_id = $wpdb->get_col( $query );

    if(isset($variation_id[0])) {
        $parent = wp_get_post_parent_id( $variation_id[0] );

        if ( $parent > 0 ) {
            $_product = new WC_Product_Variation( $variation_id[0] );

            return $term . ' (' . strip_tags(woocommerce_price( $_product->get_price() )) . ')';
        }
    }
    
    return $term;

}

/* Change footer widgets title style */
function magnium_footer_widget_header_func($params) {
    if($params[0]['id'] == 'footer-sidebar') {
        $params[0]['after_title'] .= '<div class="line"></div>' ;
    }
    
    return $params;
}
add_filter('dynamic_sidebar_params', 'magnium_footer_widget_header_func');

// Custom layout functions
function magnium_header_left_show() {
    ?>
    <a class="logo-link" href="<?php echo site_url(); ?>"><img src="<?php echo get_header_image(); ?>" alt="<?php bloginfo('name'); ?>"></a>
    <?php
}

function magnium_menu_below_header_show() {
    global $theme_options;
    
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['header_menu_layout']) ) {
      $theme_options['header_menu_layout'] = esc_html($_GET['header_menu_layout']);
    }
    if ( defined('DEMO_MODE') && isset($_GET['header_menu_color_scheme']) ) {
      $theme_options['header_menu_color_scheme'] = esc_html($_GET['header_menu_color_scheme']);
    }
    if ( defined('DEMO_MODE') && isset($_GET['header_menu_align']) ) {
      $theme_options['header_menu_align'] = esc_html($_GET['header_menu_align']);
    }

    // MainMenu Below header position
    if((isset($theme_options['header_menu_layout'])) && ($theme_options['header_menu_layout'] == 'menu_below_header')): 
    ?>
    <?php 
    if((isset($theme_options['header_menu_color_scheme'])) && ($theme_options['header_menu_color_scheme'] == 'menu_dark')) {
        $menu_add_class = ' mainmenu-dark';
    } else {
        $menu_add_class = '';
    }

    if((isset($theme_options['header_menu_align'])) && ($theme_options['header_menu_align'] == 'menu_center')) {
        $menu_add_class .= ' menu-center';
    }
    ?>
    <div class="mainmenu-belowheader<?php echo esc_attr($menu_add_class); ?>">
    <?php
    // Main Menu

    $menu = wp_nav_menu(
        array (
            'theme_location'  => 'primary',
            'echo' => FALSE,
            'fallback_cb' => '__return_false'
        )
    );

    if (!empty($menu)):
    ?>
      <?php
    // Demo option
    if(isset($_GET['hide_top_menu'])) {
        $hide_top_menu = true;
    } else {
        $hide_top_menu = false;
    }

      if( ((isset($theme_options['megamenu_hideon_homepage'])) && ($theme_options['megamenu_hideon_homepage']) && is_front_page()) || ($hide_top_menu == true) ):
          // Hide menu
      else:
          // Show menu
      ?>
      <?php if(isset($theme_options['megamenu_enable']) && $theme_options['megamenu_enable']) {
        $add_class = " mgt-mega-menu";
      }
      ?>
        <div id="navbar" class="navbar navbar-default clearfix<?php echo esc_attr($add_class);?>">
          <div class="navbar-inner">
              <div class="container">
             
              <div class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
                <?php _e( 'Menu', 'magnium' ); ?>
              </div>

              <?php
              if(isset($theme_options['megamenu_enable']) && $theme_options['megamenu_enable']) {
                wp_nav_menu(array(
                  'theme_location'  => 'primary',
                  'container_class' => 'navbar-collapse collapse',
                  'menu_class'      => 'nav',
                  'walker'          => new rc_scm_walker
                  )); 
              } else {
                 wp_nav_menu(array(
                  'theme_location'  => 'primary',
                  'container_class' => 'navbar-collapse collapse',
                  'menu_class'      => 'nav',
                  'walker'          => new magnium_description_walker
                  ));  
              }
              
              ?>
              </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    </div>
    <?php 
    endif;
    // MainMenu Below header position END 
}

function magnium_header_center_show() {
  global $theme_options;

  ob_start();

  // Search in header
  if(isset($theme_options['search_position']) && $theme_options['search_position'] == 'header'): ?>
  <div class="search-bar"> 
    <?php

      // Change header menu layout
      $theme_options['header_menu_layout'] = 'menu_below_header';

      if((isset($theme_options['search_type'])) && ($theme_options['search_type'] == 'woo')) {
       
          if (class_exists('Woocommerce')) {
            
            if(is_plugin_active('yith-woocommerce-ajax-search/init.php')) {
              echo do_shortcode('[yith_woocommerce_ajax_search]');
            }
            else {
              echo get_product_search_form();
            }
          }
     
      } elseif((isset($theme_options['search_type'])) && ($theme_options['search_type'] == 'wp')) {
          echo get_search_form();
      }
    ?>
  </div>
  
  <?php
  // End Search in header
  endif; ?>

  <?php 
  if((isset($theme_options['header_info_2_editor'])) && (isset($theme_options['header_menu_layout'])) && ($theme_options['header_info_2_editor'] <> '') && ($theme_options['header_menu_layout'] == 'menu_below_header')){
    echo '<div class="header-info-2-text">'.wp_kses_post($theme_options['header_info_2_editor']).'</div>';
  }
  ?>

  <?php 
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['header_menu_layout']) ) {
      $theme_options['header_menu_layout'] = $_GET['header_menu_layout'];
    }

  // MainMenu in Header position
  if((isset($theme_options['header_menu_layout'])) && ($theme_options['header_menu_layout'] == 'menu_in_header')): 
  ?>
    <?php
    // Main Menu

    $menu = wp_nav_menu(
        array (
            'theme_location'  => 'primary',
            'echo' => FALSE,
            'fallback_cb' => '__return_false'
        )
    );

    if (!empty($menu)):
    ?>
    <?php
    // Demo settings
    if(isset($_GET['hide_top_menu'])) {
        $hide_top_menu = true;
    } else {
        $hide_top_menu = false;
    }

    if(((isset($theme_options['megamenu_hideon_homepage'])) && ($theme_options['megamenu_hideon_homepage']) && is_front_page()) || ($hide_top_menu) ):
      // Hide menu
    else:
      // Show menu
    ?>
    <?php 
    if(isset($theme_options['megamenu_enable']) && $theme_options['megamenu_enable']) {
        $add_class = " mgt-mega-menu";
    } else {
        $add_class = "";
    }
    ?>
        <div id="navbar" class="navbar navbar-default clearfix<?php echo esc_attr($add_class); ?>">
          <div class="navbar-inner">

              <div class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
                <?php _e( 'Menu', 'magnium' ); ?>
              </div>

              <?php
                if(isset($theme_options['megamenu_enable']) && $theme_options['megamenu_enable']) {
                    wp_nav_menu(array(
                      'theme_location'  => 'primary',
                      'container_class' => 'navbar-collapse collapse',
                      'menu_class'      => 'nav',
                      'walker'          => new rc_scm_walker
                      )); 
                } else {
                     wp_nav_menu(array(
                      'theme_location'  => 'primary',
                      'container_class' => 'navbar-collapse collapse',
                      'menu_class'      => 'nav',
                      'walker'          => new magnium_description_walker
                      ));  
                }
              ?>

          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  <?php 
  endif;
  // MainMenu in Header position END
  $data_return = ob_get_clean();
  echo $data_return;
}

function magnium_header_right_show() {
    global $theme_options;

    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['enable_offcanvas_sidebar']) ) {
      $theme_options['enable_offcanvas_sidebar'] = $_GET['enable_offcanvas_sidebar'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['shop_disable_cartbox']) ) {
      $theme_options['shop_disable_cartbox'] = $_GET['shop_disable_cartbox'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['shop_catalog_mode_enable']) ) {
      $theme_options['shop_catalog_mode_enable'] = $_GET['shop_catalog_mode_enable'];
    }

    ?>
    <ul class="header-nav">
        <?php
            if(isset($theme_options['enable_offcanvas_sidebar'])&&($theme_options['enable_offcanvas_sidebar'])): 
        ?>
        <li class="float-sidebar-toggle"><div id="st-sidebar-trigger-effects"><a class="float-sidebar-toggle-btn" data-effect="st-sidebar-effect-2"><i class="fa fa-bars"></i></a></div></li>
        <?php endif; ?>
        <li class="mini-cart">
          <?php if((isset($theme_options['shop_disable_cartbox']) && !$theme_options['shop_disable_cartbox']) && (isset($theme_options['shop_catalog_mode_enable']) && !$theme_options['shop_catalog_mode_enable']) ): ?>
              <?php if (class_exists('Woocommerce')): ?>
                <?php 
                    $fragments = array();
                    $cart_display = magnium_woocommerce_header_add_to_cart_fragment($fragments);
                    echo $cart_display['#shopping-cart'];
                 ?>
              <?php endif; ?>
          <?php endif; ?>
        </li>
      
      </ul>
<?php
}

/* Blog post excerpt read more */
function magnium_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'magnium_excerpt_more');

/*
* WooCommerce functions
*/

// Custom WooCommerce product tab
if(isset($theme_options['shop_product_custom_tab_enable']) && $theme_options['shop_product_custom_tab_enable']) {
    add_filter( 'woocommerce_product_tabs', 'magnium_woo_custom_product_tab' );

    function magnium_woo_custom_product_tab( $tabs ) {
        global $theme_options;
        $tabs['custom_tab'] = array(
            'title' => $theme_options['shop_product_custom_tab_title'],
            'priority' => 50,
            'callback' => 'magnium_woo_custom_product_tab_content'
        );
        return $tabs;
    }
    function magnium_woo_custom_product_tab_content() {
        global $theme_options;
        echo do_shortcode(wp_kses_post($theme_options['shop_product_custom_tab_text']));
    } 
}

// Shop product page promo block
function magnium_woo_product_promo_block_display() {
    woocommerce_get_template( 'single-product/single-product-promo-block.php', array(
    'posts_per_page' => 4,
    'orderby' => 'date',
    'columns' => 1
    ) );
}

// Related/Upsell products limit
if(isset($theme_options['shop_products_related_limit'])) {
    $products_limit = $theme_options['shop_products_related_limit'];
} else {
    $products_limit = 4;
}

add_filter( 'woocommerce_related_products_args', 'magnium_related_products_args' );
function magnium_related_products_args( $args ) {
    global $products_limit;

    $args['posts_per_page'] = $products_limit;
    return $args;
}

add_filter( 'woocommerce_upsells_products_args', 'magnium_upsells_products_args' );
function magnium_upsells_products_args( $args ) {
    global $products_limit;
    
    $args['posts_per_page'] = $products_limit;
    return $args;
}

/* Coming soon mode */
if(isset($theme_options['enable_comingsoon']) && $theme_options['enable_comingsoon']) {

    function magnium_maintenance_mode_check_msg() {   
        if(get_current_screen()->parent_base !== 'ipanel_MAGNIUM_PANEL') {
             $msg = '<p><span style="color: red">The Maintenance/Coming soon Mode is active, your website is not visible for regular visitors.</span> Please don\'t forget to <a href="'.get_admin_url( '','admin.php?page=ipanel_MAGNIUM_PANEL').'">deactivate it</a> when you will be ready to go live.</p>';
            echo '<div class="updated fade">'.wp_kses_post($msg).'</div>';
        }
        
    }

    if (is_admin()) {
        add_action('admin_notices', 'magnium_maintenance_mode_check_msg');
    }

    function magnium_toolbar_link_comingsoon( $wp_admin_bar ) {
        $args = array(
            'id'    => 'coming_soon_mode_active',
            'title' => 'Coming soon mode active',
            'href'  => get_admin_url( '','admin.php?page=ipanel_MAGNIUM_PANEL'),
            'meta'  => array( 'class' => 'wpadminbar-coming-soon-active' )
        );
        $wp_admin_bar->add_node( $args );
    }
    add_action( 'admin_bar_menu', 'magnium_toolbar_link_comingsoon', 999 );

    if ( !is_admin_bar_showing() && !is_admin() ) {
        if (!current_user_can('edit_posts') && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ))) {

            function magnium_maintenance_mode_show() {

                $current_url_http = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $current_url_https = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                $pages = get_pages(array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'coming-soon-page.php'
                ));

                if(($current_url_http !== get_permalink( $pages[0]->ID ))&&(($current_url_https !== get_permalink( $pages[0]->ID )))) {

                        wp_redirect( get_permalink( $pages[0]->ID ) );
                    exit;
                    
                }
                
            }

            add_action('init', 'magnium_maintenance_mode_show');

        }
    }
}
