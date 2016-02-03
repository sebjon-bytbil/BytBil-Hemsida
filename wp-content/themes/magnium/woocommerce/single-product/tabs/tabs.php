<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

global $theme_options;

if(isset($theme_options['shop_product_page_tabs_layout'])) {
	$shop_product_page_tabs_layout = $theme_options['shop_product_page_tabs_layout'];
} else {
	$shop_product_page_tabs_layout = 1;
}

if($shop_product_page_tabs_layout == 1) {
	$tabs_class = 'horizontal-centered-tabs';
}
if($shop_product_page_tabs_layout == 2) {
	$tabs_class = 'horizontal-tabs'; // normal tabs
}
if($shop_product_page_tabs_layout == 3) {
	$tabs_class = 'horizontal-tabs-fullwidth';
}
if($shop_product_page_tabs_layout == 4) {
	$tabs_class = 'vertical-tabs';
}
if($shop_product_page_tabs_layout == 5) {
	$tabs_class = 'accordion-tabs';
}

// Show product reviews below tabs
if(isset($theme_options['shop_product_page_reviews_display'])) {
    $reviews_display = $theme_options['shop_product_page_reviews_display'];
} else {
    $reviews_display = 1;
}

if($reviews_display == 2) {
	unset( $tabs['reviews'] ); // Remove the reviews tab
}

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs <?php echo $tabs_class; ?>">
		<ul class="tabs">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<li class="<?php echo $key ?>_tab">
					<a href="#tab-<?php echo $key ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
				</li>

			<?php endforeach; ?>

		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>

			<div class="panel entry-content" id="tab-<?php echo $key ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ) ?>
			</div>

		<?php endforeach; ?>

	</div>

<?php endif; ?>
<div class="clear"></div>