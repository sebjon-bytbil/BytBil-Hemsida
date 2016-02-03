<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $theme_options;

?>

<?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here ?>

<?php if(isset($theme_options['shop_social_buttons_enable']) && $theme_options['shop_social_buttons_enable']): ?>
	<?php get_template_part( 'share-post' ); ?>
<?php endif; ?>