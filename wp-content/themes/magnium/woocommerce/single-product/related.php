<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $theme_options;

if(!isset($theme_options['shop_products_related_limit'])) {
	$theme_options['shop_products_related_limit'] = 4;
}

$related = $product->get_related( $theme_options['shop_products_related_limit'] );

if ( sizeof( $related ) == 0 ) return;

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
<div class="related-products-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="related products">

					<h2><?php _e( 'Related Products', 'woocommerce' ); ?></h2>
				
					<?php woocommerce_product_loop_start(); ?>

						<?php while ( $products->have_posts() ) : $products->the_post(); ?>

							<?php wc_get_template_part( 'content', 'product' ); ?>

						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php endif;

wp_reset_postdata();
