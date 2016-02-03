<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product, $theme_options;

$product_image_effect = '';

$zoom_type_data = '';

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_product_photo_effect']) ) {
  $theme_options['shop_product_photo_effect'] = $_GET['shop_product_photo_effect'];
}
if ( defined('DEMO_MODE') && isset($_GET['shop_product_zoom_type']) ) {
  $theme_options['shop_product_zoom_type'] = $_GET['shop_product_zoom_type'];
}

if(isset($theme_options['shop_product_photo_effect']) && $theme_options['shop_product_photo_effect'] == 'zoom' ) {
	if(isset($theme_options['shop_product_zoom_type'])) {
		$zoom_type = $theme_options['shop_product_zoom_type'];
		if($theme_options['shop_product_zoom_type'] == 'inside') {
			$adjustX = 0;
		} else {
			$adjustX = 30;
		}
	} else {
		$zoom_type = 'inside';
		$adjustX = 0;
	}

	$product_image_effect = 'zoom';
	$product_image_effect_a = 'cloud-zoom';
	$product_image_effect_rel = "useWrapper: false, showTitle: false, adjustY:0, adjustX:$adjustX, position: '$zoom_type'";

	$zoom_type_data = ' data-zoom-type="'.$zoom_type.'"';

} else {
	$product_image_effect = 'lightbox';
	$product_image_effect_a = 'lightbox';
	$product_image_effect_rel = '';
}

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_product_thumbs_layout']) ) {
  $theme_options['shop_product_thumbs_layout'] = $_GET['shop_product_thumbs_layout'];
}

if(isset($theme_options['shop_product_thumbs_layout'])) {
	$product_thumbs_layout = $theme_options['shop_product_thumbs_layout'];
} else {
	$product_thumbs_layout = 'horizontal';
}
if(isset($theme_options['shop_product_thumbs_layout'])) {
	$product_thumbs_layout_class = ' '.$theme_options['shop_product_thumbs_layout'].'-thumbnails';
} else {
	$product_thumbs_layout_class = ' horizontal-thumbnails';
}
?>
<div class="images<?php echo $product_thumbs_layout_class;?>">
	<div class="product-main-image-wrapper <?php echo $product_image_effect; ?>">
	<?php
		// Sale
		woocommerce_show_product_sale_flash();

		if ( has_post_thumbnail() ) {

			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title,
				'class' => $product_image_effect,
				'data-zoom-image' => $image_link
				) );

			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" id="product-main-image" itemprop="image" class="woocommerce-main-image '.$product_image_effect_a.'" rel="'.$product_image_effect_rel.'" data-counter=1 title="%s">%s</a>', $image_link, $image_title, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );

		}
	?>
	</div>
	<?php 
	//if($product_thumbs_layout == 'horizontal') {
		do_action( 'woocommerce_product_thumbnails' );
	//}
	?>

</div>
