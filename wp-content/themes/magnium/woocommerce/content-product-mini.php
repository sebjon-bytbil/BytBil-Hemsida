<?php
/**
 * The template for displaying mini product content within loops.
 *
 *
 * @author 		MagniumThemes
 * @package 	WooCommerce/Templates
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $theme_options;

?>
<div class="product-mini">
<div class="product-mini-image"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() ) { echo get_the_post_thumbnail( $post->ID, 'mgt-product-mini-image'); } else { echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="'.__('No image', 'magnium').'" />', woocommerce_placeholder_img_src() ), $post->ID ); } ?></a></div>
</div>