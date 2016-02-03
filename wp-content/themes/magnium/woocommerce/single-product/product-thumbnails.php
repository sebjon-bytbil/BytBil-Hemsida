<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce, $theme_options;

$attachment_ids = $product->get_gallery_attachment_ids();

$product_image_effect_datarel = '';
$product_image_effect = '';

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_product_thumbs_layout']) ) {
  $theme_options['shop_product_thumbs_layout'] = $_GET['shop_product_thumbs_layout'];
}

if(isset($theme_options['shop_product_thumbs_layout'])) {
	$product_thumbs_layout_class = ' '.$theme_options['shop_product_thumbs_layout'];
} else {
	$product_thumbs_layout_class = ' horizontal';
}

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_product_photo_effect']) ) {
  $theme_options['shop_product_photo_effect'] = $_GET['shop_product_photo_effect'];
}
if ( defined('DEMO_MODE') && isset($_GET['shop_product_zoom_type']) ) {
  $theme_options['shop_product_zoom_type'] = $_GET['shop_product_zoom_type'];
}

if(isset($theme_options['shop_product_photo_effect']) && $theme_options['shop_product_photo_effect'] == 'lightbox' ) {
	$product_image_effect_datarel = 'prettyPhoto[product-gallery]';
	$product_image_effect = 'lightbox';
	$product_image_effect_a = 'lightbox';
}
if(isset($theme_options['shop_product_photo_effect']) && $theme_options['shop_product_photo_effect'] == 'zoom' ) {
	$product_image_effect = 'zoom';
	$product_image_effect_a = 'cloud-zoom-gallery';

	if(isset($theme_options['shop_product_zoom_type'])) {
		$zoom_type = $theme_options['shop_product_zoom_type'];
	} else {
		$zoom_type = 'inner';
	}
}

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_product_thumbs_columns']) ) {
  $theme_options['shop_product_thumbs_columns'] = $_GET['shop_product_thumbs_columns'];
}

if(!isset($theme_options['shop_product_thumbs_columns'])) {
	$shop_product_thumbs_columns = 5;
} else {
	$shop_product_thumbs_columns = $theme_options['shop_product_thumbs_columns'];
}

$columns = apply_filters( 'woocommerce_product_thumbnails_columns', $shop_product_thumbs_columns);

if ( $attachment_ids ) {
	?>
	<div id="thumbnails" class="thumbnails columns-<?php echo $shop_product_thumbs_columns;?><?php echo $product_thumbs_layout_class; ?>">
	<?php
		// Main Thumb
		if ( has_post_thumbnail() ) {

			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$image_large = wp_get_attachment_image_src( get_post_thumbnail_id(), apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
			$image_full = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
			$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), array(
				'title' => $image_title
				) );

			if(isset($theme_options['shop_product_photo_effect']) && $theme_options['shop_product_photo_effect'] == 'zoom' ) {
				$product_image_effect_rel = "useZoom: 'product-main-image', smallImage: '".$image_large[0]."'";
			} else {
				$product_image_effect_rel = '';
			}

			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			$attachment_counter = 1;

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" itemprop="image" class="'.$product_image_effect_a.'" first" title="%s" rel="'.$product_image_effect_rel.'" data-rel="'.$product_image_effect_datarel.'" data-zoom-image="%s" data-image="%s" data-counter="%s">%s</a>', $image_link, $image_title, $image_link, $image_large[0], $attachment_counter, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<img src="%s" alt="'.__('Placeholder', 'magnium').'" />', wc_placeholder_img_src() ), $post->ID );

		}

		// Other thumbs

		$loop = 0;
		
		$attachment_counter = 1;

		foreach ( $attachment_ids as $attachment_id ) {

			$attachment_counter++;

			$classes = array( $product_image_effect );

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = '';// was first here

			if ( ( $loop + 2 ) % $columns == 0 ) // was +1
				$classes[] = 'last';

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link ) {
				$attachment_counter--;
				continue;
			}

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
			$image_large = wp_get_attachment_image_src( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
			$image_full = wp_get_attachment_image_src( $attachment_id, 'full');
			$image_class = esc_attr( implode( ' ', $classes ) );
			$image_title = esc_attr( get_the_title( $attachment_id ) );

			if(isset($theme_options['shop_product_photo_effect']) && $theme_options['shop_product_photo_effect'] == 'zoom' ) {
				$product_image_effect_rel = "useZoom: 'product-main-image', smallImage: '".$image_large[0]."'";
			} else {
				$product_image_effect_rel = '';
			}

			$preload_array[] = "'".$image_large[0]."'";

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s '.$product_image_effect_a.'" title="%s" rel="'.$product_image_effect_rel.'" data-rel="'.$product_image_effect_datarel.'" data-zoom-image="%s" data-image="%s" data-counter="%s">%s</a>', $image_link, $image_class, $image_title, $image_full[0], $image_large[0], $attachment_counter, $image ), $attachment_id, $post->ID, $image_class );

			$loop++;
		}

		$preload_array_string = implode(",", $preload_array);

		if(isset($theme_options['shop_product_photo_effect']) && $theme_options['shop_product_photo_effect'] == 'zoom' ):
		?>
		<script>
		(function($){
			$(document).ready(function() {
				// Preload zoom images
				function preload(arrayOfImages) {
				    $(arrayOfImages).each(function(){
				        $('<img/>')[0].src = this;
				        // Alternatively you could use:
				        // (new Image()).src = this;
				    });
				}
				preload([<?php echo $preload_array_string; ?>]);
			}); 
		})(jQuery);
		</script>
		<?php
		endif;
		
	?></div>
	<?php
}

?>