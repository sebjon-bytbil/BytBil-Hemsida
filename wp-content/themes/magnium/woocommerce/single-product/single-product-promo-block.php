<?php
/**
 * Single Product Promo Block
 *
 * @author 		MagniumThemes
 * @package 	WooCommerce/Templates
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $post, $theme_options;

echo '<div class="product-page-promo-block">';

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_product_page_upsells_display']) ) {
  $theme_options['shop_product_page_upsells_display'] = $_GET['shop_product_page_upsells_display'];
}

if(!isset($theme_options['shop_products_related_limit'])) {
	$theme_options['shop_products_related_limit'] = 4;
}

// Up-sells
if(isset($theme_options['shop_product_page_upsells_display']) && $theme_options['shop_product_page_upsells_display'] == 2) {

	$upsells = $product->get_upsells();

	if ( sizeof( $upsells ) > 0 ) {

		$meta_query = WC()->query->get_meta_query();

		$args = array(
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'no_found_rows'       => 1,
			'posts_per_page'      => $theme_options['shop_products_related_limit'],
			'orderby'             => $orderby,
			'post__in'            => $upsells,
			'post__not_in'        => array( $product->id ),
			'meta_query'          => $meta_query
		);

		$products = new WP_Query( $args );

		$woocommerce_loop['columns'] = $columns;

		if ( $products->have_posts() ) : ?>

			<div class="upsells-mini products-mini">
				<div class="swipe-arrow-left"></div>
				<div class="swipe-arrow-right"></div>
				<h5><?php _e( 'Best match', 'magnium' ) ?></h5>

				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php while ( $products->have_posts() ) : $products->the_post(); ?>
							<div class="swiper-slide">
							<?php wc_get_template_part( 'content', 'product-mini' ); ?>
							</div>
						<?php endwhile; // end of the loop. ?>
					</div>
				</div>

			</div>

		<?php endif;

		wp_reset_postdata();

	}
}

// Related products

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_product_page_related_display']) ) {
  $theme_options['shop_product_page_related_display'] = $_GET['shop_product_page_related_display'];
}

if(isset($theme_options['shop_product_page_related_display']) && $theme_options['shop_product_page_related_display'] == 2) {

	$related = $product->get_related( $posts_per_page );

	if ( sizeof( $related ) > 0 ) {

		$args = apply_filters( 'woocommerce_related_products_args', array(
			'post_type'				=> 'product',
			'ignore_sticky_posts'	=> 1,
			'no_found_rows' 		=> 1,
			'posts_per_page' 		=> $theme_options['shop_products_related_limit'],
			'orderby' 				=> $orderby,
			'post__in' 				=> $related,
			'post__not_in'			=> array( $product->id )
		) );

		$products = new WP_Query( $args );

		$woocommerce_loop['columns'] = $columns;

		if ( $products->have_posts() ) : ?>

						<div class="related-mini products-mini">
							<div class="swipe-arrow-left"></div>
							<div class="swipe-arrow-right"></div>
							<h5><?php _e( 'Related', 'magnium' ); ?></h5>
							
								<div class="swiper-container">
									
									<div class="swiper-wrapper">
										<?php while ( $products->have_posts() ) : $products->the_post(); ?>
											<div class="swiper-slide">
											<?php wc_get_template_part( 'content', 'product-mini' ); ?>
											</div>
										<?php endwhile; // end of the loop. ?>
									</div>
								</div>

						</div>
					
		<?php endif;

		wp_reset_postdata();

	}

}
echo '<div class="clear"></div>';
// Promo content
if(isset($theme_options['shop_product_page_promo_content']) && ($theme_options['shop_product_page_promo_content']) !=='') {
	echo '<div class="promo-block-custom-content">';
	echo do_shortcode($theme_options['shop_product_page_promo_content']);
	echo '</div>';
}

echo '</div>';
?>
