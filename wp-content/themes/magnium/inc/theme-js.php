<?php

	add_action( 'wp_enqueue_scripts', 'magnium_enqueue_dynamic_js', '999' );

	function magnium_enqueue_dynamic_js( ) {
		// remove later
		global $theme_options;

		if ( function_exists( 'is_multisite' ) && is_multisite() ){
			$cache_file_name = 'cache.skin.b' . get_current_blog_id();
		} else {
			$cache_file_name = 'cache.skin';
		}

        $ipanel_saved_date = get_option( 'ipanel_saved_date', 1 );
        $cache_saved_date = get_option( 'cache_js_saved_date', 0 );

		if( file_exists( get_stylesheet_directory() . '/cache/' . $cache_file_name . '.js' ) ) {
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

			wp_register_script( $cache_file_name, get_stylesheet_directory_uri() . '/cache/' . $cache_file_name . '.js',  array(), $cache_saved_date);
			wp_enqueue_script( $cache_file_name );

		} else {
			
			$out = '';

			$js_generated = microtime(true);

			$out = magnium_get_js();

			$out .= '/* JS Generator Execution Time: ' . floatval( ( microtime(true) - $js_generated ) ) . ' seconds */';

			$cache_file = @fopen( get_stylesheet_directory() . '/cache/' . $cache_file_name . '.js', 'w' );

			if ( @fwrite( $cache_file, $out ) ) {

				wp_register_script($cache_file_name, get_template_directory_uri() . '/cache/' . $cache_file_name . '.js', array(), $cache_saved_date);
				wp_enqueue_script( $cache_file_name );

                // Update save options date
                $option_name = 'cache_js_saved_date';
                
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

	function magnium_get_js () {
		global $theme_options;
		// ===
		ob_start();
    ?>
    (function($){
    $(document).ready(function() {
        
        <?php if(isset($theme_options['shop_addedtocart_popup']) && $theme_options['shop_addedtocart_popup']): ?>
        // Cart popup
        $('body').on('added_to_cart',function(e,data) {
        <?php global $woocommerce; ?>
                $('body').append('<a href="#TB_inline?width=205&height=115&inlineId=hidden_popup_cart" id="show_popup_cart" title="<?php _e("Product added to cart", "magnium"); ?>" class="thickbox" style="display:none"></a>');

                // Some customization:

                var s = '';

                s += '<div class="popup_shopping_cart_content">';

                s += '<p>';

                s += '<?php _e("Product was successfully added to your shopping cart.", "magnium"); ?>';

                s += '</p>';

                s += '<p class="buttons">';

                s += '  <a href="" onclick="javascript:tb_remove();return false;" class="btn button wc-forward"><?php _e("Continue Shopping", "magnium"); ?></a>';

                s += '  <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="btn button checkout wc-forward"><?php _e("Checkout", "magnium"); ?></a>';

                s += '</p>';

                s += '</div>';

                $('body').append('<div id="hidden_popup_cart" style="display:none">'+s+'</div>');

                $('#show_popup_cart').click();

        });
        <?php endif; ?>
        $('.mgt-promo-block').each(function( index ) {
            $(this).attr('style', ($(this).attr('data-style')));
        });
        <?php if(isset($theme_options['enable_parallax']) && $theme_options['enable_parallax']): ?>
  
        $('.parallax').each(function(){
           $(this).parallax("50%", 0.4);
        });

        <?php endif; ?>
        
        <?php if(isset($theme_options['custom_js_code'])) { echo $theme_options['custom_js_code']; } ?>

    });
    })(jQuery);
    <?php

    	$out = ob_get_clean();

		$out .= ' /*' . date("Y-m-d H:i") . '*/';
		/* RETURN */
		return $out;
	}

?>