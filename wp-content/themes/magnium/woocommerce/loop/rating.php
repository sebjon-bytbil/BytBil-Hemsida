<?php
/**
 * Loop Rating
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $theme_options;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
	return;

if((isset($theme_options['shop_show_productbox_rating'])) && ($theme_options['shop_show_productbox_rating'])): ?>
	<?php if ( $rating_html = $product->get_rating_html() ) : ?>
		<?php echo $rating_html; ?>
	<?php endif; ?>
<?php endif; ?>