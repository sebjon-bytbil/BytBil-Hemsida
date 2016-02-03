<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $theme_options, $jckqv;

$att_ids = $product->get_gallery_attachment_ids();

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<li <?php post_class( $classes ); ?>>
	<div class="product-item-box">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	
	<?php woocommerce_get_template( 'loop/sale-flash.php' ); ?>
	<?php if ( !$product->is_in_stock() ) : ?>            
		<div class="out-of-stock-badge"><?php echo __('Out of stock', 'magnium'); ?></div>            
	<?php endif; ?>

	<div class="product-item-image flip-container">

	<?php 
	// Quickview
	if(is_plugin_active('woo_quickview/jck_woo_quickview.php')) {
		$jckqv->displayBtn($product->id); 
	} 
	?>
	<a href="<?php the_permalink(); ?>">
		<div class="flipper">
		<div class="front"><?php if ( has_post_thumbnail() ) { echo get_the_post_thumbnail( $post->ID, 'shop_catalog'); } else { echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="'.__('No image', 'magnium').'" />', woocommerce_placeholder_img_src() ), $post->ID ); } ?></div>
                    
                    <?php if ( isset($theme_options['shop_secondimage_onhover']) && $theme_options['shop_secondimage_onhover']) { ?>
                    
					<?php

						if ( $att_ids ) {
					
							$loop = 0;				
							
							foreach ( $att_ids as $att_id ) {
					
								$image_url = wp_get_attachment_url( $att_id );
					
								if ( ! $image_url )
									continue;
								
								$loop++;

								printf( '<div class="back">%s</div>', wp_get_attachment_image( $att_id, 'shop_catalog' ) );
								
								if ($loop == 1) break;
							
							}
					
						} else {
						
						?>
                        
                        <div class="back"><?php if ( has_post_thumbnail() ) { echo get_the_post_thumbnail( $post->ID, 'shop_catalog'); } else { echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="'.__('No image', 'magnium').'" />', woocommerce_placeholder_img_src() ), $post->ID ); } ?></div>
                        <?php
							
						}
					?>
                    
                    <?php } ?>
		</div>
		</a>
        </div>
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			//do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<?php 
		// Wishlist
		if(is_plugin_active('yith-woocommerce-wishlist/init.php')) {
			echo do_shortcode('[yith_wcwl_add_to_wishlist]');
		}
		?>
		<?php if(isset($theme_options['shop_show_productbox_category']) && $theme_options['shop_show_productbox_category']): ?>
		<?php 
		$terms = get_the_terms( $product->id, 'product_cat' );

		$i = 0;

		if(isset($theme_options['shop_productbox_category_limit'])) {
			$product_category_display_limit = $theme_options['shop_productbox_category_limit'];
		} else {
			$product_category_display_limit = 1;
		}

		foreach ( $terms as $term ) {
			$i++;
			$link = get_term_link( $term, 'product_cat' );
			
			$term_links[] = '<a href="' . esc_url( $link ) . '" rel="tag">' . esc_html($term->name) . '</a>';

			if($i == $product_category_display_limit) {
				break;
			}
		}

		$term_links = apply_filters( "term_links-product_cat", $term_links );

  		$product_categories = join( ', ', $term_links );

		?>
		
		<div class="product-categories"><?php echo $product_categories; ?></div>
		<?php endif; ?>

		<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */

			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

		

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

	</div>
</li>