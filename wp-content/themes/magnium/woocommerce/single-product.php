<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); 

global $theme_options;

if(!isset($theme_options['shop_show_breadcrumbs'])) {
	$theme_options['shop_show_breadcrumbs'] = true;
}

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['product_sidebar_position']) ) {
  $theme_options['product_sidebar_position'] = $_GET['product_sidebar_position'];
}

if(isset($theme_options['product_sidebar_position'])) {
	$product_sidebar_position = $theme_options['product_sidebar_position'];
} else {
	$product_sidebar_position = 'disable';
}

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_product_page_header_layout']) ) {
  $theme_options['shop_product_page_header_layout'] = $_GET['shop_product_page_header_layout'];
}

if(isset($theme_options['shop_product_page_header_layout'])) {
	$product_page_header_layout = $theme_options['shop_product_page_header_layout'];
} else {
	$product_page_header_layout = 1;
}

if(is_active_sidebar( 'shop-product-sidebar' ) && ($product_sidebar_position !== 'disable') ) {
	$span_class = 'col-md-9';
}
else {
	$span_class = 'col-md-12';
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'woocommerce_before_main_content_breadcrumb', 'woocommerce_breadcrumb', 20 );

?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

<?php while ( have_posts() ) : the_post(); ?>
	
	<?php if(isset($theme_options['shop_product_page_navigation']) && $theme_options['shop_product_page_navigation']): ?>
		<?php
		    $prevPost = get_previous_post();

		    if($prevPost) {
		    	$prevthumbnail = get_the_post_thumbnail($prevPost->ID, 'mgt-product-nav');
		    } else {
		    	$prevthumbnail = false;
		    }

		    $nextPost = get_next_post();

		    if($nextPost) {
		    	$nextthumbnail = get_the_post_thumbnail($nextPost->ID, 'mgt-product-nav');
		    } else {
		    	$nextthumbnail = false;
		    }
		?>
		
		<?php if($prevthumbnail): ?>
		<div class="product-navigation-prev">
			<div class="product-navigation-image">
				<?php previous_post_link('%link', $prevthumbnail); ?>
			</div>
		</div>
		<?php endif;?>
		<?php if($nextthumbnail): ?>
		<div class="product-navigation-next">
			<div class="product-navigation-image">
				<?php next_post_link('%link', $nextthumbnail); ?>
			</div>
		</div>
		<?php endif;?>
	<?php endif; ?>

<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>	
	<?php if(!(!$theme_options['shop_show_breadcrumbs'] && $product_page_header_layout == 3)): ?>	
		<div class="woocommerce-page-title-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php 
						if($product_page_header_layout == 1) {
							echo '<h1 class="page-title">';
							woocommerce_page_title();
							echo '</h1>';
						}
						if($product_page_header_layout == 2) {
							echo '<h1 class="page-title">';
							the_title();
							echo '</h1>';
						}
						
						?>
						<?php 
						if($theme_options['shop_show_breadcrumbs']) {
							
							do_action('woocommerce_before_main_content_breadcrumb');
							
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<div class="content-block">
<div class="container shop shop-product">
	<div class="row">
	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		if(is_active_sidebar( 'shop-product-sidebar' ) && ($product_sidebar_position == 'left') ) {
			echo '<div class="col-md-3 main-sidebar sidebar"><ul id="shop-sidebar">';
			dynamic_sidebar( 'shop-product-sidebar' );
			echo "</ul></div>";
		}
		
	?>
	
	<div class="<?php echo esc_attr($span_class); ?>">
	<div class="shop-content">
			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
	</div>
	</div>
	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		if(is_active_sidebar( 'shop-product-sidebar' ) && ($product_sidebar_position == 'right') ) {
			echo '<div class="col-md-3 main-sidebar sidebar"><ul id="shop-sidebar">';
			dynamic_sidebar( 'shop-product-sidebar' );
			echo "</ul></div>";
		}
		
	?>
	</div></div></div>
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	
	
<?php get_footer( 'shop' ); ?>