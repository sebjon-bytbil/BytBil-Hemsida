<?php

	add_action( 'wp_enqueue_scripts', 'magnium_enqueue_dynamic_styles', '999' );

	function magnium_enqueue_dynamic_styles( ) {
		// remove later
		global $theme_options;

		if ( function_exists( 'is_multisite' ) && is_multisite() ){
			$cache_file_name = 'cache.skin.b' . get_current_blog_id();
		} else {
			$cache_file_name = 'cache.skin';
		}

        $ipanel_saved_date = get_option( 'ipanel_saved_date', 1 );
        $cache_saved_date = get_option( 'cache_css_saved_date', 0 );

		if( file_exists( get_stylesheet_directory() . '/cache/' . $cache_file_name . '.css' ) ) {
			$cache_status = 'exist';

            if($ipanel_saved_date > $cache_saved_date) {
                $cache_status = 'no-exist';
            }

		} else {
			$cache_status = 'no-exist';
		}

        if ( defined('DEMO_MODE') ) {
            $cache_status = 'no-exist';
        }

		if ( $cache_status == 'exist' ) {

			wp_register_style( $cache_file_name, get_stylesheet_directory_uri() . '/cache/' . $cache_file_name . '.css', array(), $cache_saved_date);
			wp_enqueue_style( $cache_file_name );

		} else {
			
			$out = '';

			$generated = microtime(true);

			$out = magnium_get_css();
	
			$out = str_replace( array( "\t", "
", "\n", "  ", "   ", ), array( "", "", " ", " ", " ", ), $out );

			$out .= '/* CSS Generator Execution Time: ' . floatval( ( microtime(true) - $generated ) ) . ' seconds */';

			$cache_file = @fopen( get_stylesheet_directory() . '/cache/' . $cache_file_name . '.css', 'w' );

			if ( @fwrite( $cache_file, $out ) ) {
			
				wp_register_style( $cache_file_name, get_stylesheet_directory_uri() . '/cache/' . $cache_file_name . '.css', array(), $cache_saved_date);
				wp_enqueue_style( $cache_file_name );

                // Update save options date
                $option_name = 'cache_css_saved_date';
                
                $new_value = microtime(true) ;

                if ( get_option( $option_name ) !== false ) {

                    // The option already exists, so we just update it.
                    update_option( $option_name, $new_value );

                } else {

                    // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
                    $deprecated = null;
                    $autoload = 'no';
                    add_option( $option_name, $new_value, $deprecated, $autoload );
                }
			}
		
		}
	}

	function magnium_get_css () {
		global $theme_options;
		// ===
		ob_start();
    ?>
    <?php
    if ( defined('DEMO_MODE') && isset($_GET['header_height']) ) {
      $theme_options['header_height'] = $_GET['header_height'];
    }

    if(isset($theme_options['header_height']) && $theme_options['header_height'] > 0) {
        $header_height = $theme_options['header_height'];
    } else {
        $header_height = 120;
    } 
    ?>
    header .col-md-12 {
        height: <?php echo intval($header_height); ?>px;
    }
    <?php
    // Retina logo
    if(isset($theme_options['enable_retina_logo']) && ($theme_options['enable_retina_logo'])):
    ?>
    header .logo img {
        width: <?php echo intval($theme_options['logo_width']); ?>px;
    }
    <?php endif; ?>
    <?php
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['shop_product_photo_size']) ) {
      $theme_options['shop_product_photo_size'] = $_GET['shop_product_photo_size'];
    }

    if(isset($theme_options['shop_product_photo_size']) && $theme_options['shop_product_photo_size'] == 'regular'): 
    ?>
    .woocommerce #content div.product div.images, 
    .woocommerce div.product div.images, 
    .woocommerce-page #content div.product div.images, 
    .woocommerce-page div.product div.images {
        width: 38.718%;
    }
    .woocommerce #content div.product div.summary, 
    .woocommerce div.product div.summary, 
    .woocommerce-page #content div.product div.summary, 
    .woocommerce-page div.product div.summary {
        width: 58.718%;
    }
    <?php endif; ?>
    <?php if(isset($theme_options['shop_secondimage_onhover']) && $theme_options['shop_secondimage_onhover']): ?>
    .product-item-box .flip-container:hover .flipper .front {
        opacity: 0;
    }
    .product-item-box .flip-container:hover .flipper .back {
        opacity: 1;
    }
    <?php endif; ?>
    <?php
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['woocommerce_show_cat_search']) ) {
      $theme_options['woocommerce_show_cat_search'] = $_GET['woocommerce_show_cat_search'];
    }

    if(isset($theme_options['woocommerce_show_cat_search']) && !$theme_options['woocommerce_show_cat_search']): ?>
    .search-bar .yith-ajaxsearchform-container .select2-container {
        display: none;
    }
    <?php endif; ?>
    <?php if(isset($theme_options['enable_parallax']) && $theme_options['enable_parallax']): ?>
        .fullwidth-section.parallax,
        .parallax {
            background-attachment: fixed!important;
        }
    <?php endif; ?>
    <?php
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['search_position']) ) {
      $theme_options['search_position'] = $_GET['search_position'];
    }
    if(isset($theme_options['search_position']) && $theme_options['search_position'] == 'top'): ?>
        .menu-top-menu-container {
            margin-right: 60px;
        }
    <?php endif; ?>
    
    <?php
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['shop_catalog_mode_enable']) ) {
      $theme_options['shop_catalog_mode_enable'] = $_GET['shop_catalog_mode_enable'];
    }

    if(isset($theme_options['shop_catalog_mode_enable']) && $theme_options['shop_catalog_mode_enable']): ?>
    .anim_add_to_cart_button,
    .single_add_to_cart_button, 
    .quantity,
    .link-checkout,
    .add_to_cart {
        display: none!important;
    }
    <?php endif; ?>

    <?php if(isset($theme_options['shop_hide_wishlist']) && $theme_options['shop_hide_wishlist']): ?>
    .yith-wcwl-add-to-wishlist,
    .link-wishlist {
        display: none!important;
    }
    <?php endif; ?>

    <?php if(isset($theme_options['shop_hide_qv']) && $theme_options['shop_hide_qv']): ?>
    .woocommerce .product-item-box .jckqvBtn {
        display: none!important;
    }

    <?php endif; ?>
    
    <?php 
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['shop_products_per_row']) ) {
      $theme_options['shop_products_per_row'] = intval($_GET['shop_products_per_row']);
    }

    if(isset($theme_options['shop_products_per_row'])) { 

        $product_per_row = intval($theme_options['shop_products_per_row']);

    } else { 

        $product_per_row = 4; 
    }

    if($product_per_row == 6) {
        $woo_catalog_product_width = 16.6666;
    }
    if($product_per_row == 5) {
        $woo_catalog_product_width = 20;
    }
    if($product_per_row == 4) {
        $woo_catalog_product_width = 25;
    }
    if($product_per_row == 3) {
        $woo_catalog_product_width = 33.3333;
    }
    if($product_per_row == 2) {
        $woo_catalog_product_width = 50;
    }
    ?>
    .woocommerce ul.products li.product, 
    .woocommerce-page ul.products li.product,
    .woocommerce .col-md-9 ul.products li.product, 
    .woocommerce-page .col-md-9 ul.products li.product {
        width: <?php echo intval($woo_catalog_product_width); ?>%;
    }
    @media (min-width: 1200px) {
        .woocommerce :not(.mgt-products-list) ul.products li.product:nth-of-type(<?php echo $product_per_row; ?>n+1), 
        .woocommerce-page :not(.mgt-products-list) ul.products li.product:nth-of-type(<?php echo $product_per_row; ?>n+1),
        .woocommerce .col-md-9 ul.products li.product:nth-of-type(<?php echo $product_per_row; ?>n+1), 
        .woocommerce-page .col-md-9 ul.products li.product:nth-of-type(<?php echo $product_per_row; ?>n+1) {
            clear: both;
        }
    }
    /**
    * Custom CSS
    **/
    <?php if(isset($theme_options['custom_css_code'])) { echo $theme_options['custom_css_code']; } ?>
    
    /** 
    * Theme Google Font
    **/
    <?php 
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

        if(isset($theme_options['font_google_disable']) && $theme_options['font_google_disable']) {

            $theme_options['body_font']['font-family'] = $theme_options['font_regular'];
            $theme_options['header_font']['font-family'] = $theme_options['font_regular'];
            $theme_options['additional_font']['font-family'] = $theme_options['font_regular'];
        }
    ?>
    h1, h2, h3, h4, h5, h6 {
        font-family: '<?php echo str_replace("+"," ", $theme_options['header_font']['font-family']); ?>';
    }
    h1 {
        font-size: <?php echo $theme_options['header_font']['font-size']; ?>px;
    }
    #jckqv,
    #jckqv *,
    #jckqv p,
    .wpml-lang #lang_sel {
        font-family: '<?php echo str_replace("+"," ", $theme_options['body_font']['font-family']); ?>';
    }
    body {
        font-family: '<?php echo str_replace("+"," ", $theme_options['body_font']['font-family']); ?>';
        font-size: <?php echo $theme_options['body_font']['font-size']; ?>px;
    }
    <?php if(isset($theme_options['additional_font_enable']) && $theme_options['additional_font_enable']): ?>
    .mgt-promo-block .mgt-promo-block-content strong,
    .magnium-slide strong {
        font-family: '<?php echo str_replace("+"," ", $theme_options['additional_font']['font-family']); ?>';
    }
    <?php endif; ?>
    /**
    * Colors and color skins
    */
    <?php
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['color_skin_name']) ) {
      $theme_options['color_skin_name'] = $_GET['color_skin_name'];
    }

    if(!isset($theme_options['color_skin_name'])) {
        $color_skin_name = 'none';
    }
    else {
        $color_skin_name = $theme_options['color_skin_name'];
    }
    // Use panel settings
    if($color_skin_name == 'none') {

        $theme_body_color = $theme_options['theme_body_color'];
        $theme_text_color = $theme_options['theme_text_color'];
        $theme_links_color = $theme_options['theme_links_color'];
        $theme_links_hover_color = $theme_options['theme_links_hover_color'];
        $theme_main_color = $theme_options['theme_main_color'];
        $theme_buttons_light_color = $theme_options['theme_buttons_light_color'];
        $theme_hover_color = $theme_options['theme_hover_color'];
        $theme_header_bg_color = $theme_options['theme_header_bg_color'];
        $theme_header_link_color = $theme_options['theme_header_link_color'];
        $theme_header_link_hover_color = $theme_options['theme_header_link_hover_color'];
        $theme_cat_menu_bg_color = $theme_options['theme_cat_menu_bg_color'];
        $theme_cat_menu_link_color = $theme_options['theme_cat_menu_link_color'];
        $theme_cat_menu_link_hover_color = $theme_options['theme_cat_menu_link_hover_color'];
        $theme_cat_menu_dark_bg_color = $theme_options['theme_cat_menu_dark_bg_color'];
        $theme_cat_menu_dark_link_color = $theme_options['theme_cat_menu_dark_link_color'];
        $theme_cat_menu_dark_link_hover_color = $theme_options['theme_cat_menu_dark_link_hover_color'];
        $theme_cat_submenu_1lvl_bg_color = $theme_options['theme_cat_submenu_1lvl_bg_color'];
        $theme_cat_submenu_1lvl_link_color = $theme_options['theme_cat_submenu_1lvl_link_color'];
        $theme_cat_submenu_1lvl_link_hover_color = $theme_options['theme_cat_submenu_1lvl_link_hover_color'];
        $theme_footer_color = $theme_options['theme_footer_color'];
        $theme_footer_header_color = $theme_options['theme_footer_header_color'];
        $theme_footer_link_color = $theme_options['theme_footer_link_color'];
        $theme_footer_text_color = $theme_options['theme_footer_text_color'];
        $theme_title_color = $theme_options['theme_title_color'];
        $theme_product_title_color = $theme_options['theme_product_title_color'];
        $theme_widget_title_color = $theme_options['theme_widget_title_color'];
        $theme_border_color = $theme_options['theme_border_color'];
        $theme_content_bg_color = $theme_options['theme_content_bg_color'];
        $theme_salebadge_bg_color = $theme_options['theme_salebadge_bg_color'];
        $theme_header_search_button_color = $theme_options['theme_header_search_button_color'];

    }
    // Default skin
    if($color_skin_name == 'default') {
        
        $theme_body_color = '#ffffff';
        $theme_text_color = '#000000';
        $theme_links_color = '#17477c';
        $theme_links_hover_color = '#606060';
        $theme_main_color = '#4686cc';
        $theme_buttons_light_color = '#eeeeee';
        $theme_hover_color = '#000000';
        $theme_header_bg_color = '#4686CC';
        $theme_header_link_color = '#ffffff';
        $theme_header_link_hover_color = '#8ebef3';
        $theme_cat_menu_bg_color = '#EEEEEE';
        $theme_cat_menu_link_color = '#000000';
        $theme_cat_menu_link_hover_color = '#606060';
        $theme_cat_menu_dark_bg_color = '#262626';
        $theme_cat_menu_dark_link_color = '#ffffff';
        $theme_cat_menu_dark_link_hover_color = '#c9c9c9';
        $theme_cat_submenu_1lvl_bg_color = '#ffffff';
        $theme_cat_submenu_1lvl_link_color = '#000000';
        $theme_cat_submenu_1lvl_link_hover_color = '#17477c';
        $theme_footer_color = '#262626';
        $theme_footer_header_color = '#c9c9c9';
        $theme_footer_link_color = '#ffffff';
        $theme_footer_text_color = '#A3A8A9';
        $theme_title_color = '#000000';
        $theme_product_title_color = '#17477c';
        $theme_widget_title_color = '#000000';
        $theme_border_color = '#eeeeee';
        $theme_content_bg_color = '#ffffff';
        $theme_salebadge_bg_color = '#4FBA9F';
        $theme_header_search_button_color = '#1a5698';

    }
    // Green skin
    if($color_skin_name == 'green') {

        $theme_body_color = '#ffffff';
        $theme_text_color = '#000000';
        $theme_links_color = '#00BC8F'; //
        $theme_links_hover_color = '#606060';
        $theme_main_color = '#00BC8F'; //
        $theme_buttons_light_color = '#eeeeee';
        $theme_hover_color = '#000000';
        $theme_header_bg_color = '#37ad91';
        $theme_header_link_color = '#ffffff';
        $theme_header_link_hover_color = '#a5d7cb'; //
        $theme_cat_menu_bg_color = '#EEEEEE';
        $theme_cat_menu_link_color = '#000000';
        $theme_cat_menu_link_hover_color = '#606060';
        $theme_cat_menu_dark_bg_color = '#262626';
        $theme_cat_menu_dark_link_color = '#ffffff';
        $theme_cat_menu_dark_link_hover_color = '#c9c9c9';
        $theme_cat_submenu_1lvl_bg_color = '#ffffff';
        $theme_cat_submenu_1lvl_link_color = '#000000';
        $theme_cat_submenu_1lvl_link_hover_color = '#00BC8F'; //
        $theme_footer_color = '#262626';
        $theme_footer_header_color = '#c9c9c9';
        $theme_footer_link_color = '#ffffff';
        $theme_footer_text_color = '#A3A8A9';
        $theme_title_color = '#000000';
        $theme_product_title_color = '#2e836f'; //
        $theme_widget_title_color = '#000000';
        $theme_border_color = '#eeeeee';
        $theme_content_bg_color = '#ffffff';
        $theme_salebadge_bg_color = '#4FBA9F';
        $theme_header_search_button_color = '#288d75'; //

    }
    // Blue skin
    if($color_skin_name == 'blue') {

        $theme_body_color = '#ffffff';
        $theme_text_color = '#000000';
        $theme_links_color = '#5a7e9f'; //
        $theme_links_hover_color = '#606060';
        $theme_main_color = '#5a7e9f'; //
        $theme_buttons_light_color = '#eeeeee';
        $theme_hover_color = '#000000';
        $theme_header_bg_color = '#eef0f0';
        $theme_header_link_color = '#57728a';
        $theme_header_link_hover_color = '#6389ab'; //
        $theme_cat_menu_bg_color = '#EEEEEE';
        $theme_cat_menu_link_color = '#000000';
        $theme_cat_menu_link_hover_color = '#606060';
        $theme_cat_menu_dark_bg_color = '#262626';
        $theme_cat_menu_dark_link_color = '#ffffff';
        $theme_cat_menu_dark_link_hover_color = '#c9c9c9';
        $theme_cat_submenu_1lvl_bg_color = '#ffffff';
        $theme_cat_submenu_1lvl_link_color = '#000000';
        $theme_cat_submenu_1lvl_link_hover_color = '#5a7e9f'; //
        $theme_footer_color = '#262626';
        $theme_footer_header_color = '#c9c9c9';
        $theme_footer_link_color = '#ffffff';
        $theme_footer_text_color = '#A3A8A9';
        $theme_title_color = '#000000';
        $theme_product_title_color = '#466683'; //
        $theme_widget_title_color = '#000000';
        $theme_border_color = '#eeeeee';
        $theme_content_bg_color = '#ffffff';
        $theme_salebadge_bg_color = '#4FBA9F';
        $theme_header_search_button_color = '#466683'; //

    }
    // Red skin
    if($color_skin_name == 'red') {

        $theme_body_color = '#ffffff';
        $theme_text_color = '#000000';
        $theme_links_color = '#e86f75'; //
        $theme_links_hover_color = '#606060';
        $theme_main_color = '#e86f75'; //
        $theme_buttons_light_color = '#eeeeee';
        $theme_hover_color = '#000000';
        $theme_header_bg_color = '#e86f75';
        $theme_header_link_color = '#ffffff';
        $theme_header_link_hover_color = '#ecbabd'; //
        $theme_cat_menu_bg_color = '#EEEEEE';
        $theme_cat_menu_link_color = '#000000';
        $theme_cat_menu_link_hover_color = '#606060';
        $theme_cat_menu_dark_bg_color = '#262626';
        $theme_cat_menu_dark_link_color = '#ffffff';
        $theme_cat_menu_dark_link_hover_color = '#c9c9c9';
        $theme_cat_submenu_1lvl_bg_color = '#ffffff';
        $theme_cat_submenu_1lvl_link_color = '#000000';
        $theme_cat_submenu_1lvl_link_hover_color = '#e86f75'; //
        $theme_footer_color = '#262626';
        $theme_footer_header_color = '#e86f75';
        $theme_footer_link_color = '#ffffff';
        $theme_footer_text_color = '#A3A8A9';
        $theme_title_color = '#000000';
        $theme_product_title_color = '#cc4e55'; //
        $theme_widget_title_color = '#000000';
        $theme_border_color = '#eeeeee';
        $theme_content_bg_color = '#ffffff';
        $theme_salebadge_bg_color = '#4FBA9F';
        $theme_header_search_button_color = '#cc4e55'; //

    }
    // Black&White skin
    if($color_skin_name == 'blackandwhite') {

        $theme_body_color = '#ffffff';
        $theme_text_color = '#000000';
        $theme_links_color = '#535353'; //
        $theme_links_hover_color = '#606060';
        $theme_main_color = '#535353'; //
        $theme_buttons_light_color = '#eeeeee';
        $theme_hover_color = '#000000';
        $theme_header_bg_color = '#eef0f0';
        $theme_header_link_color = '#868686';
        $theme_header_link_hover_color = '#535353'; //
        $theme_cat_menu_bg_color = '#EEEEEE';
        $theme_cat_menu_link_color = '#000000';
        $theme_cat_menu_link_hover_color = '#606060';
        $theme_cat_menu_dark_bg_color = '#262626';
        $theme_cat_menu_dark_link_color = '#ffffff';
        $theme_cat_menu_dark_link_hover_color = '#c9c9c9';
        $theme_cat_submenu_1lvl_bg_color = '#ffffff';
        $theme_cat_submenu_1lvl_link_color = '#000000';
        $theme_cat_submenu_1lvl_link_hover_color = '#535353'; //
        $theme_footer_color = '#262626';
        $theme_footer_header_color = '#ffffff';
        $theme_footer_link_color = '#ffffff';
        $theme_footer_text_color = '#A3A8A9';
        $theme_title_color = '#000000';
        $theme_product_title_color = '#000000'; //
        $theme_widget_title_color = '#000000';
        $theme_border_color = '#eeeeee';
        $theme_content_bg_color = '#ffffff';
        $theme_salebadge_bg_color = '#4FBA9F';
        $theme_header_search_button_color = '#606060'; //

    }

    // Black dark skin
    if($color_skin_name == 'black') {

        $theme_body_color = '#333333';
        $theme_text_color = '#A3A3A3';
        $theme_links_color = '#a3a3a3'; //
        $theme_links_hover_color = '#606060';
        $theme_main_color = '#4686cc'; //
        $theme_buttons_light_color = '#eeeeee';
        $theme_hover_color = '#000000';
        $theme_header_bg_color = '#363636';
        $theme_header_link_color = '#868686';
        $theme_header_link_hover_color = '#535353'; //
        $theme_cat_menu_bg_color = '#EEEEEE';
        $theme_cat_menu_link_color = '#000000';
        $theme_cat_menu_link_hover_color = '#606060';
        $theme_cat_menu_dark_bg_color = '#262626';
        $theme_cat_menu_dark_link_color = '#ffffff';
        $theme_cat_menu_dark_link_hover_color = '#c9c9c9';
        $theme_cat_submenu_1lvl_bg_color = '#ffffff';
        $theme_cat_submenu_1lvl_link_color = '#000000';
        $theme_cat_submenu_1lvl_link_hover_color = '#535353'; //
        $theme_footer_color = '#262626';
        $theme_footer_header_color = '#ffffff';
        $theme_footer_link_color = '#ffffff';
        $theme_footer_text_color = '#A3A8A9';
        $theme_title_color = '#ffffff';
        $theme_product_title_color = '#ffffff'; //
        $theme_widget_title_color = '#ffffff';
        $theme_border_color = '#3e3e3e';
        $theme_content_bg_color = '#333333';
        $theme_salebadge_bg_color = '#4FBA9F';
        $theme_header_search_button_color = '#606060'; //

        echo 'header.main-header { background-color: #ffffff!important; }
              .related-products-wrapper { background-color: #3f3f3f; }
              .woocommerce .shop-product .summary .product-categories a:hover, .woocommerce ul.products li.product .product-categories a:hover { color: #ffffff; }
              .woocommerce-page-title-wrapper h1 { color: #000000!important; }
              .woocommerce-checkout .woocommerce-checkout-review-order, .woocommerce .cart-collaterals, .woocommerce-page .cart-collaterals { background-color: #3D3D3D; }
              .woocommerce div.product .woocommerce-tabs.horizontal-centered-tabs ul.tabs li.active a,
              .woocommerce div.product .woocommerce-tabs.horizontal-centered-tabs ul.tabs li:hover a {  color: #ffffff; border-color: #ffffff;  }
              .nav > li > .sub-menu.sidebar-inside { background-color: #3D3D3D; }
              .woocommerce-cart .cart-collaterals .cart_totals table td h5 { color: #fff; }
            ';

    }

    // Orange skin
    if($color_skin_name == 'orange') {

        $theme_body_color = '#ffffff';
        $theme_text_color = '#000000';
        $theme_links_color = '#faa732'; //
        $theme_links_hover_color = '#606060';
        $theme_main_color = '#FDAD46'; //
        $theme_buttons_light_color = '#eeeeee';
        $theme_hover_color = '#000000';
        $theme_header_bg_color = '#D9BF9C';
        $theme_header_link_color = '#ffffff';
        $theme_header_link_hover_color = '#f1ece5'; //
        $theme_cat_menu_bg_color = '#EEEEEE';
        $theme_cat_menu_link_color = '#000000';
        $theme_cat_menu_link_hover_color = '#606060';
        $theme_cat_menu_dark_bg_color = '#FDAD46';
        $theme_cat_menu_dark_link_color = '#ffffff';
        $theme_cat_menu_dark_link_hover_color = '#f1ece5';
        $theme_cat_submenu_1lvl_bg_color = '#ffffff';
        $theme_cat_submenu_1lvl_link_color = '#000000';
        $theme_cat_submenu_1lvl_link_hover_color = '#faa732'; //
        $theme_footer_color = '#262626';
        $theme_footer_header_color = '#faa732';
        $theme_footer_link_color = '#ffffff';
        $theme_footer_text_color = '#A3A8A9';
        $theme_title_color = '#000000';
        $theme_product_title_color = '#faa732'; //
        $theme_widget_title_color = '#000000';
        $theme_border_color = '#eeeeee';
        $theme_content_bg_color = '#ffffff';
        $theme_salebadge_bg_color = '#4FBA9F';
        $theme_header_search_button_color = '#FDAD46'; //

    }
    // Fencer skin
    if($color_skin_name == 'fencer') {
        
        $theme_body_color = '#ffffff';
        $theme_text_color = '#000000';
        $theme_links_color = '#26cdb3'; //
        $theme_links_hover_color = '#606060';
        $theme_main_color = '#26cdb3'; //
        $theme_buttons_light_color = '#eeeeee';
        $theme_hover_color = '#232b33';
        $theme_header_bg_color = '#eef0f0';
        $theme_header_link_color = '#868686';
        $theme_header_link_hover_color = '#a6a6a6'; //
        $theme_cat_menu_bg_color = '#EEEEEE';
        $theme_cat_menu_link_color = '#000000';
        $theme_cat_menu_link_hover_color = '#606060';
        $theme_cat_menu_dark_bg_color = '#262626';
        $theme_cat_menu_dark_link_color = '#ffffff';
        $theme_cat_menu_dark_link_hover_color = '#c9c9c9';
        $theme_cat_submenu_1lvl_bg_color = '#f8f8f8';
        $theme_cat_submenu_1lvl_link_color = '#000000';
        $theme_cat_submenu_1lvl_link_hover_color = '#26cdb3'; //
        $theme_footer_color = '#2d363a';
        $theme_footer_header_color = '#26cdb3';
        $theme_footer_link_color = '#ffffff';
        $theme_footer_text_color = '#a3a8a9';
        $theme_title_color = '#000000';
        $theme_product_title_color = '#26cdb3'; //
        $theme_widget_title_color = '#000000';
        $theme_border_color = '#eeeeee';
        $theme_content_bg_color = '#ffffff';
        $theme_salebadge_bg_color = '#4FBA9F';
        $theme_header_search_button_color = '#26cdb3'; //

    }
    // Perfectum skin
    if($color_skin_name == 'perfectum') {

        $theme_body_color = '#ffffff';
        $theme_text_color = '#000000';
        $theme_links_color = '#F2532F'; //
        $theme_links_hover_color = '#606060';
        $theme_main_color = '#F2532F'; //
        $theme_buttons_light_color = '#eeeeee';
        $theme_hover_color = '#232b33';
        $theme_header_bg_color = '#eef0f0';
        $theme_header_link_color = '#868686';
        $theme_header_link_hover_color = '#000000'; //
        $theme_cat_menu_bg_color = '#EEEEEE';
        $theme_cat_menu_link_color = '#000000';
        $theme_cat_menu_link_hover_color = '#606060';
        $theme_cat_menu_dark_bg_color = '#262626';
        $theme_cat_menu_dark_link_color = '#ffffff';
        $theme_cat_menu_dark_link_hover_color = '#c9c9c9';
        $theme_cat_submenu_1lvl_bg_color = '#f8f8f8';
        $theme_cat_submenu_1lvl_link_color = '#000000';
        $theme_cat_submenu_1lvl_link_hover_color = '#F2532F'; //
        $theme_footer_color = '#FAFAFA';
        $theme_footer_header_color = '#000000';
        $theme_footer_link_color = '#F2532F';
        $theme_footer_text_color = '#000000';
        $theme_title_color = '#000000';
        $theme_product_title_color = '#F2532F'; //
        $theme_widget_title_color = '#000000';
        $theme_border_color = '#eeeeee';
        $theme_content_bg_color = '#ffffff';
        $theme_salebadge_bg_color = '#4FBA9F';
        $theme_header_search_button_color = '#000000'; //
    
    }
    // Simplegreat skin
    if($color_skin_name == 'simplegreat') {

        $theme_body_color = '#ffffff';
        $theme_text_color = '#000000';
        $theme_links_color = '#C3A36B'; //
        $theme_links_hover_color = '#000000';
        $theme_main_color = '#C3A36B'; //
        $theme_buttons_light_color = '#eeeeee';
        $theme_hover_color = '#232b33';
        $theme_header_bg_color = '#eef0f0';
        $theme_header_link_color = '#868686';
        $theme_header_link_hover_color = '#000000'; //
        $theme_cat_menu_bg_color = '#EEEEEE';
        $theme_cat_menu_link_color = '#000000';
        $theme_cat_menu_link_hover_color = '#606060';
        $theme_cat_menu_dark_bg_color = '#262626';
        $theme_cat_menu_dark_link_color = '#ffffff';
        $theme_cat_menu_dark_link_hover_color = '#c9c9c9';
        $theme_cat_submenu_1lvl_bg_color = '#f8f8f8';
        $theme_cat_submenu_1lvl_link_color = '#000000';
        $theme_cat_submenu_1lvl_link_hover_color = '#C3A36B'; //
        $theme_footer_color = '#4A5456';
        $theme_footer_header_color = '#ffffff';
        $theme_footer_link_color = '#a3a8a9';
        $theme_footer_text_color = '#ffffff';
        $theme_title_color = '#000000';
        $theme_product_title_color = '#C3A36B'; //
        $theme_widget_title_color = '#000000';
        $theme_border_color = '#eeeeee';
        $theme_content_bg_color = '#ffffff';
        $theme_salebadge_bg_color = '#4FBA9F';
        $theme_header_search_button_color = '#C3A36B'; //

    }

    ?>
    
    body {
        background-color: <?php echo $theme_body_color; ?>;
        color: <?php echo $theme_text_color; ?>;
    }
    .st-pusher, .st-sidebar-pusher {
        background-color: <?php echo $theme_body_color; ?>;
    }
    a.btn,
    .btn,
    .btn:focus,
    input[type="submit"],
    .woocommerce #content input.button, 
    .woocommerce #respond input#submit, 
    .woocommerce a.button, 
    .woocommerce button.button,
    .woocommerce input.button, 
    .woocommerce-page #content input.button, 
    .woocommerce-page #respond input#submit, 
    .woocommerce-page a.button, 
    .woocommerce-page button.button, 
    .woocommerce-page input.button, 
    .woocommerce a.added_to_cart, 
    .woocommerce-page a.added_to_cart,
    #jckqv .button,
    #navbar .navbar-toggle,
    #top-link,
    .woocommerce .widget_layered_nav ul li.chosen a,
    .woocommerce-page .widget_layered_nav ul li.chosen a,
    .woocommerce .widget_layered_nav_filters ul li a,
    .woocommerce-page .widget_layered_nav_filters ul li a,
    .woocommerce .product-item-box a.add_to_cart_button,
    .woocommerce .product-item-box a.product_type_simple,
    .woocommerce .product-item-box a.product_type_grouped,
    .woocommerce .product-item-box a.product_type_external,
    .woocommerce .quantity .plus:hover,
    .woocommerce .quantity .minus:hover,
    .woocommerce div.product .woocommerce-tabs ul.tabs li:not(.active):hover,
    .woocommerce #content div.product .woocommerce-tabs ul.tabs li:not(.active):hover,
    .woocommerce-page div.product .woocommerce-tabs ul.tabs li:not(.active):hover,
    .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li:not(.active):hover,
    .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
    .woocommerce #content nav.woocommerce-pagination ul li a:focus,
    .woocommerce #content nav.woocommerce-pagination ul li a:hover,
    .woocommerce #content nav.woocommerce-pagination ul li span.current,
    .woocommerce nav.woocommerce-pagination ul li a:focus,
    .woocommerce nav.woocommerce-pagination ul li a:hover,
    .woocommerce nav.woocommerce-pagination ul li span.current,
    .woocommerce-page #content nav.woocommerce-pagination ul li a:focus,
    .woocommerce-page #content nav.woocommerce-pagination ul li a:hover,
    .woocommerce-page #content nav.woocommerce-pagination ul li span.current,
    .woocommerce-page nav.woocommerce-pagination ul li a:focus,
    .woocommerce-page nav.woocommerce-pagination ul li a:hover,
    .woocommerce-page nav.woocommerce-pagination ul li span.current,
    .widget_tag_cloud .tagcloud a:hover,
    .widget_product_tag_cloud .tagcloud a:hover,
    .footer-sidebar-2-wrapper .widget_tag_cloud .tagcloud a:hover, 
    .footer-sidebar-2-wrapper .widget_product_tag_cloud .tagcloud a:hover,
    .magnium-button a,
    .tp-bullets.simplebullets.round .bullet:hover,
    .tp-bullets.simplebullets.round .bullet.selected,
    .tp-bullets.simplebullets.navbar .bullet:hover,
    .tp-bullets.simplebullets.navbar .bullet.selected,
    body .wpb_content_element.wpb_tour .wpb_tabs_nav li.ui-tabs-active, 
    body .wpb_content_element.wpb_tour .wpb_tabs_nav li:hover,
    body .flex-control-paging li a.flex-active,
    body .flex-control-paging li a:hover,
    .woocommerce ul.products li.product .product-item-box .ob_categories .counter-group,
    .mgt-button.mgt-style-solid-invert:hover,
    .mgt-button.mgt-style-bordered:hover,
    .mgt-button.mgt-style-grey:hover,
    .portfolio-item-block .portfolio-item-bg,
    .st-menu-close-btn:hover,
    .st-sidebar-menu-close-btn:hover,
    .btn-primary,
    .btn-primary:focus,
    .shopping-cart .view-cart.checkout,
    body .wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header:hover,
    body .wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active,
    .sidebar .widget_calendar th,
    .sidebar .widget_calendar tfoot td,
    .mgt-post-list .mgt-post-icon,
    body .vc_images_carousel .vc_carousel-indicators .vc_active {
        background-color: <?php echo esc_html($theme_main_color); ?>;
    }
    .page-404 h1,
    .post-social-title i,
    .post-social a:hover,
    .woocommerce .product-item-box .yith-wcwl-wishlistexistsbrowse a:hover,
    .woocommerce .product-item-box .yith-wcwl-wishlistaddedbrowse a:hover,
    .woocommerce .shop-product .summary .yith-wcwl-add-button a,
    .woocommerce .shop-product .summary .yith-wcwl-wishlistexistsbrowse a,
    .woocommerce .product-item-box .yith-wcwl-wishlistaddedbrowse a,
    .woocommerce .product-item-box .yith-wcwl-add-button a:hover,
    .woocommerce .shop-product .summary .yith-wcwl-wishlistexistsbrowse a,
    .woocommerce .shop-product .summary .yith-wcwl-wishlistaddedbrowse a,
    .woocommerce .shop-product .summary .yith-wcwl-add-button a:before,
    .woocommerce .shop-product .summary .yith-wcwl-wishlistaddedbrowse a:before,
    .woocommerce .shop-product .summary .yith-wcwl-wishlistexistsbrowse a:before,
    .woocommerce .shop-product .summary .compare.button,
    .portfolio-filter a.view-all {
        color: <?php echo esc_html($theme_main_color); ?>;
    }
    .post-social a:hover,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
    .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
    .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range,
    .woocommerce-page div.product div.thumbnails a.active,
    .widget_tag_cloud .tagcloud a,
    .widget_product_tag_cloud .tagcloud a,
    .widget_tag_cloud .tagcloud a:hover,
    .widget_product_tag_cloud .tagcloud a:hover,
    .footer-sidebar-2-wrapper .widget_product_tag_cloud .tagcloud a:hover,
    .footer-sidebar-2-wrapper .widget_tag_cloud .tagcloud a:hover,
    body .owl-theme .owl-controls .owl-page.active span, 
    body .owl-theme .owl-controls.clickable .owl-page:hover span,
    .mgt-button.mgt-style-bordered:hover,
    .cloud-zoom-lens,
    .sidebar .widget_calendar tbody td a,
    body .vc_images_carousel .vc_carousel-indicators .vc_active {
        border-color: <?php echo esc_html($theme_main_color); ?>;
    }
    .btn:hover,
    input[type="submit"]:hover,
    .woocommerce #content input.button:hover,
    .woocommerce #respond input#submit:hover,
    .woocommerce a.button:hover,
    .woocommerce button.button:hover,
    .woocommerce input.button:hover,
    .woocommerce-page #content input.button:hover,
    .woocommerce-page #respond input#submit:hover,
    .woocommerce-page a.button:hover,
    .woocommerce-page button.button:hover,
    .woocommerce-page input.button:hover,
    .woocommerce #content input.button.alt:hover,
    .woocommerce #respond input#submit.alt:hover,
    .woocommerce a.button.alt:hover,
    .woocommerce button.button.alt:hover,
    .woocommerce input.button.alt:hover,
    .woocommerce-page #content input.button.alt:hover,
    .woocommerce-page #respond input#submit.alt:hover,
    .woocommerce-page a.button.alt:hover,
    .woocommerce-page button.button.alt:hover,
    .woocommerce-page input.button.alt:hover,
    #jckqv .button:hover,
    .btn:active,
    .btn-primary,
    .btn-primary:focus,
    header .search-bar #searchform #searchsubmit:hover,
    .shopping-cart .view-cart:hover,
    #navbar .navbar-toggle:hover,
    #top-link:hover,
    .woocommerce .widget_layered_nav ul li.chosen a:hover, 
    .woocommerce-page .widget_layered_nav ul li.chosen a:hover,
    .magnium-button a:hover,
    .mgt-button.mgt-style-solid-invert,
    .mgt-button.mgt-style-green:hover,
    .mgt-button.mgt-style-red:hover,
    .mgt-signup-block .mgt-signup-block-form input.mgt-button:hover {
        background-color: <?php echo esc_html($theme_hover_color); ?>;
    }
    .mgt-button.mgt-style-bordered {
        border-color: <?php echo esc_html($theme_hover_color); ?>;
    }
    .woocommerce #content input.button.alt,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .woocommerce-page #content input.button.alt,
    .woocommerce-page #respond input#submit.alt,
    .woocommerce-page a.button.alt,
    .woocommerce-page button.button.alt,
    .woocommerce-page input.button.alt,
    .shopping-cart .view-cart,
    .woocommerce .product-item-box a.add_to_cart_button:hover,
    .woocommerce .product-item-box a.product_type_simple:hover,
    .woocommerce .product-item-box a.product_type_grouped:hover,
    .woocommerce .product-item-box a.product_type_external:hover,
    .woocommerce .product-item-box .jckqvBtn,
    .woocommerce .product-item-box .jckqvBtn:hover,
    .comment-meta .reply a.comment-edit-link,
    .mgt-button.mgt-style-grey-invert:hover,
    .mgt-button.mgt-style-grey {
        background-color: <?php echo esc_html($theme_buttons_light_color); ?>;
    }
    .header-menu-bg {
        background-color: <?php echo esc_html($theme_header_bg_color); ?>;
    }
    .header-menu li a,
    .header-info-text,
    .header-info-text a,
    .wpml-lang #lang_sel a.lang_sel_sel,
    .wpml-currency .wcml_currency_switcher .select2-choice {
        color: <?php echo esc_html($theme_header_link_color); ?>;
    }
    .header-menu li a:hover,
    .header-info-text a:hover,
    .wpml-lang #lang_sel a:hover,
    .wpml-currency .wcml_currency_switcher .select2-choice:hover {
        color: <?php echo esc_html($theme_header_link_hover_color); ?>;
    }
    .mainmenu-belowheader {
        background-color: <?php echo esc_html($theme_cat_menu_bg_color); ?>;
    }
    .mainmenu-belowheader.mainmenu-dark {
        background-color: <?php echo esc_html($theme_cat_menu_dark_bg_color); ?>;
    }
    a,
    a:focus,
    .woocommerce .shop-product .summary .yith-wcwl-add-button a,
    .woocommerce .shop-product .summary .yith-wcwl-wishlistaddedbrowse a,
    .woocommerce .shop-product .summary .yith-wcwl-wishlistexistsbrowse a,
    .woocommerce .shop-product .summary h1.product_title,
    body .select2-search:before,
    body .select2-drop,
    #jckqv h1,
    .wpml-lang #lang_sel ul ul a,
    .woocommerce.widget .product-categories li > .cat-menu-close:hover {
        color: <?php echo esc_html($theme_links_color); ?>;
    }
    a:hover,
    header .header-right ul.header-nav > li.float-sidebar-toggle a:hover,
    .shopping-cart .shopping-cart-title a:hover,
    .woocommerce .shop-product .summary .yith-wcwl-add-button a:hover,
    .woocommerce .shop-product .summary .yith-wcwl-wishlistexistsbrowse a:hover,
    .woocommerce .shop-product .summary .yith-wcwl-wishlistaddedbrowse a:hover,
    .wpml-lang #lang_sel ul ul a:hover {
        color: <?php echo esc_html($theme_links_hover_color); ?>;
    }
    .widget_tag_cloud .tagcloud a:hover,
    .widget_product_tag_cloud .tagcloud a:hover {
        background-color: <?php echo esc_html($theme_links_hover_color); ?>;
    }
    .widget_tag_cloud .tagcloud a:hover,
    .widget_product_tag_cloud .tagcloud a:hover {
        border-color: <?php echo esc_html($theme_links_hover_color); ?>;
    }
    .navbar .nav > li > a,
    header .header-right ul.header-nav > li.float-sidebar-toggle a,
    .shopping-cart .shopping-cart-title a,
    .shopping-cart .shopping-cart-title,
    .shopping-cart .shopping-cart-count {
        color: <?php echo esc_html($theme_cat_menu_link_color); ?>;
    }
    .navbar .nav > li > a:hover {
        color: <?php echo esc_html($theme_cat_menu_link_hover_color); ?>;
    }
    .mainmenu-belowheader.mainmenu-dark .navbar .nav > li > a {
        color: <?php echo esc_html($theme_cat_menu_dark_link_color); ?>;
    }
    .mainmenu-belowheader.mainmenu-dark .navbar .nav > li > a:hover {
        color: <?php echo esc_html($theme_cat_menu_dark_link_hover_color); ?>;
    }
    .nav > li > .sub-menu,
    .nav > li > .children,
    .nav > li .sub-menu,
    .nav > li .children {
        background-color: <?php echo esc_html($theme_cat_submenu_1lvl_bg_color); ?>;
    }
    .nav .sub-menu li.menu-item > a,
    .nav .children li.menu-item > a {
        color: <?php echo esc_html($theme_cat_submenu_1lvl_link_color); ?>;
    }
    .nav .sub-menu li.menu-item > a:hover,
    .nav .children li.menu-item > a:hover {
        color: <?php echo esc_html($theme_cat_submenu_1lvl_link_hover_color); ?>;
    }
    .footer-sidebar-2-wrapper,
    footer {
        background-color: <?php echo esc_html($theme_footer_color); ?>;
    }
    .footer-container a,
    footer a,
    footer {
        color: <?php echo esc_html($theme_footer_link_color); ?>;
    }

    .footer-sidebar-2-wrapper .widget_tag_cloud .tagcloud a, 
    .footer-sidebar-2-wrapper .widget_product_tag_cloud .tagcloud a {
        border-color: <?php echo esc_html($theme_footer_link_color); ?>;
    }
    .footer-container h2.widgettitle {
        color: <?php echo esc_html($theme_footer_header_color); ?>;
    }
    .footer-container {
        color: <?php echo esc_html($theme_footer_text_color); ?>;
    }
    .woocommerce .page-title,
    .page-item-title h1 {
        color: <?php echo esc_html($theme_title_color); ?>;
    }
    #jckqv h1,
    .woocommerce .shop-product .summary h1.product_title {
        color: <?php echo esc_html($theme_product_title_color); ?>;
    }
    .sidebar .widgettitle,
    .woocommerce .upsells h2, 
    .woocommerce .related h2 {
        color: <?php echo esc_html($theme_widget_title_color); ?>;
    }
    .footer-sidebar .line {
        background-color: <?php echo esc_html($theme_widget_title_color); ?>;
    }
    input,
    input.input-text,
    select,
    textarea,
    .search-bar #searchform #s,
    header .search-bar #searchform #s,
    .mgt-masonry-item .blog-post .post-content,
    .blog-post,
    .author-bio,
    .post-social a,
    .navigation-post,
    .navigation-paging,
    .navigation-paging .nav-previous a,
    .navigation-paging .nav-next a,
    .sidebar .widget_calendar th,
    .sidebar .widget_calendar tbody td,
    .sidebar .widget_product_categories a,
    .sidebar .widget_pages ul li a,
    .sidebar .widget_meta ul li a,
    .sidebar .widget_nav_menu a,
    .woocommerce .widget_layered_nav ul li,
    .woocommerce-page .widget_layered_nav ul li,
    .content-block .widget_archive ul li,
    .woocommerce-page .widget_archive ul li,
    .woocommerce-page .widget_categories ul li,
    .content-block .widget_categories ul li,
    .woocommerce .widget_shopping_cart .cart_list li,
    .woocommerce .quantity input.qty,
    #jckqv .quantity .qty,
    .woocommerce .quantity .minus,
    .woocommerce .quantity .plus,
    .woocommerce-page .table-cart-actions,
    .woocommerce .cart-collaterals, 
    .woocommerce-page .cart-collaterals,
    .woocommerce-page div.product .woocommerce-tabs .panel,
    .woocommerce #reviews .id-comments ol.commentlist li, 
    .woocommerce-page #reviews .id-comments ol.commentlist li,
    .woocommerce .shop-product .reviews-big-stars,
    .woocommerce nav.woocommerce-pagination,
    .woocommerce .woocommerce-ordering select,
    .woocommerce-page .woocommerce-ordering select,
    .shop-content .product-main-image-wrapper,
    .woocommerce-page div.product div.thumbnails a,
    .woocommerce-thanksyou-page table.shop_table.order_details thead th,
    .woocommerce-thanksyou-page table.shop_table.order_details tr.order_item td,
    .woocommerce-vieworder-page table.shop_table.order_details thead th,
    .woocommerce-vieworder-page table.shop_table.order_details tr.order_item td,
    .comment-list li:first-child,
    .comment-list li,
    .comment-list .children li,
    body .select2-container .select2-choice,
    body .select2-search input,
    body .select2-drop-active,
    body .select2-results,
    body .select2-results .select2-result-label,
    body .select2-container-active .select2-choice,
    body .select2-container-active .select2-choices,
    body .select2-dropdown-open.select2-drop-above .select2-choice,
    body .select2-dropdown-open.select2-drop-above .select2-choices,
    .content-block .vc_separator .vc_sep_holder .vc_sep_line,
    .wpml-lang #lang_sel ul ul a,
    .cloud-zoom-big,
    .cloud-zoom-loading,
    .mgt-menu-vertical.navbar .nav > li,
    .mgt-menu-vertical.navbar .nav > li:first-child {
        border-color: <?php echo esc_html($theme_border_color); ?>;
    }
    .sidebar .widget_calendar tbody td.pad,
    .sidebar .widget_calendar tfoot td.pad {
        background-color: <?php echo esc_html($theme_border_color); ?>;
    }
    .woocommerce-page div.product div.thumbnails .swipe-arrow-down {
        color: <?php echo esc_html($theme_border_color); ?>;
    }

    header.main-header,
    .shopping-cart .shopping-cart-content,
    .st-sidebar-menu .sidebar,
    .mgt-masonry-item,
    .sidebar .widget_calendar tbody td,
    .woocommerce-page div.product .woocommerce-tabs .panel,
    body .wpb_content_element.wpb_tabs .wpb_tour_tabs_wrapper .wpb_tab {
        background-color: <?php echo esc_html($theme_content_bg_color); ?>;
    }
    @media (max-width: 767px) {
        #menu-categories {
            background-color: <?php echo esc_html($theme_content_bg_color); ?>;
        }
        .navbar .nav .sub-menu li a:hover {
            color: <?php echo esc_html($theme_links_hover_color); ?>;;
        }
        .navbar .nav li a {
            color: <?php echo esc_html($theme_links_color); ?>;
        }
    }
    .woocommerce span.onsale,
    .woocommerce-page span.onsale,
    .woocommerce ul.products li.product .onsale,
    .woocommerce-page ul.products li.product .onsale,
    .woocommerce span.onsale,
    .woocommerce-page span.onsale,
    #jckqv .onsale { 
        background-color: <?php echo esc_html($theme_salebadge_bg_color); ?>;
    }
    header .search-bar #searchform #searchsubmit,
    .search-bar-toggle input[type="submit"],
    .search-bar-toggle input[type="button"] { 
        background-color: <?php echo esc_html($theme_header_search_button_color); ?>;
    }

    <?php

    	$out = ob_get_clean();

		$out .= ' /*' . date("Y-m-d H:i") . '*/';
		/* RETURN */
		return $out;
	}
?>
