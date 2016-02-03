<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $theme_options;
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo esc_attr(woocommerce_get_product_schema()); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

		// Demo settings
		if ( defined('DEMO_MODE') && isset($_GET['shop_product_page_promo_block_display']) ) {
		  $theme_options['shop_product_page_promo_block_display'] = $_GET['shop_product_page_promo_block_display'];
		}

		if(isset($theme_options['shop_product_page_promo_block_display']) && $theme_options['shop_product_page_promo_block_display'] == 1) {
			
			add_action( 'woocommerce_before_single_product_summary', 'magnium_woo_product_promo_block_display', 10 );
		}

		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
			//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 60 );

			// Vertical accordion instead of tabs
			// Demo settings
			if ( defined('DEMO_MODE') && isset($_GET['shop_product_page_tabs_layout']) ) {
			  $theme_options['shop_product_page_tabs_layout'] = $_GET['shop_product_page_tabs_layout'];
			}
			if ( defined('DEMO_MODE') && isset($_GET['shop_product_page_reviews_display']) ) {
			  $theme_options['shop_product_page_reviews_display'] = $_GET['shop_product_page_reviews_display'];
			}

			if((isset($theme_options['shop_product_page_tabs_layout'])) && (($theme_options['shop_product_page_tabs_layout']) == 5)) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
				add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 25 );

				$theme_options['shop_product_page_reviews_display'] = 2;
				// Remove short description
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30 );
			}

			// Product reviews below tab
			if((isset($theme_options['shop_product_page_reviews_display'])) && (($theme_options['shop_product_page_reviews_display']) == 2)) {
				function woocommerce_show_product_reviews() {
					echo '<div class="product-reviews-below-tabs">';
					comments_template();
					echo "</div>";
				}

				add_action( 'woocommerce_after_single_product_summary', 'woocommerce_show_product_reviews', 10 );
			}

			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->
	<div class="clear"></div>
	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */

		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
		add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 20 );

		// Demo settings
		if ( defined('DEMO_MODE') && isset($_GET['shop_product_page_upsells_display']) ) {
		  $theme_options['shop_product_page_upsells_display'] = $_GET['shop_product_page_upsells_display'];
		}
		if ( defined('DEMO_MODE') && isset($_GET['shop_product_page_related_display']) ) {
		  $theme_options['shop_product_page_related_display'] = $_GET['shop_product_page_related_display'];
		}
		
		if(isset($theme_options['shop_product_page_upsells_display']) && $theme_options['shop_product_page_upsells_display'] == 2) {
			// Remove upsell products display
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		}
		
		if(isset($theme_options['shop_product_page_related_display']) && $theme_options['shop_product_page_related_display'] == 2) {
			// Remove related products display
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 20 );
		}

		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
