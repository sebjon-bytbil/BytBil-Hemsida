<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $theme_options, $wp_query;

$offcanvas = false;

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_sidebar_position']) ) {
  $theme_options['shop_sidebar_position'] = $_GET['shop_sidebar_position'];
}

$shop_sidebar_position = $theme_options['shop_sidebar_position'];

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_category_layout']) ) {
  $theme_options['shop_category_layout'] = $_GET['shop_category_layout'];
}

if(!isset($theme_options['shop_category_layout'])) {
	$shop_category_layout = 0;
} else {
	$shop_category_layout = $theme_options['shop_category_layout'];
}

if(is_active_sidebar( 'shop-sidebar' ) && ($shop_sidebar_position <> 'disable') ) {
	if($shop_sidebar_position == "offcanvas") {
		$span_class = 'col-md-12';
		$offcanvas = true;
	} else {
		$span_class = 'col-md-9';
	}
}
else {
	$span_class = 'col-md-12';
}

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['shop_category_layout_parallax']) ) {
  $theme_options['shop_category_layout_parallax'] = $_GET['shop_category_layout_parallax'];
}

if(isset($theme_options['shop_category_layout_parallax']) && ($theme_options['shop_category_layout_parallax']) ) {
	$category_parallax = 1;
} else {
	$category_parallax = 0;
}

$cat = $wp_query->get_queried_object();

if(isset($cat->term_id)) {
	$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'woocommerce_before_main_content_breadcrumb', 'woocommerce_breadcrumb', 20 );

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		

		<?php 
		if($shop_category_layout == 1): 
		?>
		<?php
			$category_description = apply_filters( 'the_content', term_description() );

			if(trim($category_description) !== '') {
				
				if((isset($theme_options['shop_show_breadcrumbs'])) && ($theme_options['shop_show_breadcrumbs'])) {
					ob_start();
					do_action('woocommerce_before_main_content_breadcrumb');
					$breadcrumbs_html = ob_get_clean();
				} else {
					$breadcrumbs_html = '';
				}

				echo '<div class="woocommerce-category-description">'.do_shortcode('[mgt_promo_block_wp text_size="large" is_category_usage="2" background_image_id="'.$thumbnail_id.'" background_repeat="no-repeat" animated="0" parallax="'.$category_parallax.'" text_size="normal"]'.$breadcrumbs_html.$category_description.'[/mgt_promo_block_wp]').'</div>';

			} else { ?>
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			
					<div class="woocommerce-page-title-wrapper">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
									<?php 
									if((isset($theme_options['shop_show_breadcrumbs'])) && ($theme_options['shop_show_breadcrumbs'])) {
										
										do_action('woocommerce_before_main_content_breadcrumb');
										
									}
									?>
								</div>
							</div>
						</div>
					</div>
				
				<?php endif; ?>
			<?php }
			?>
		<?php
		else:
		?>
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			
				<div class="woocommerce-page-title-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
								<?php 
								if((isset($theme_options['shop_show_breadcrumbs'])) && ($theme_options['shop_show_breadcrumbs'])) {
									
									do_action('woocommerce_before_main_content_breadcrumb');
									
								}
								?>
							</div>
						</div>
					</div>
				</div>
			
			<?php endif; ?>
		<?php
		endif;
		?>

		<?php if ( have_posts() ) : ?>

	<div class="content-block">
	<div class="container shop shop-archive">

	<div class="row">

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		if(is_active_sidebar( 'shop-sidebar' ) && ($shop_sidebar_position == 'left') ) {
			do_action( 'woocommerce_sidebar' );
		}
		
	?>
	<div class="<?php echo esc_attr($span_class); ?>">
	<div class="shop-content">
			<?php if($shop_category_layout == 0) {
				$category_description = apply_filters( 'the_content', term_description() );

				if(trim($category_description) !== '') {
					
					echo '<div class="woocommerce-category-description">'.do_shortcode('[mgt_promo_block_wp text_size="large" is_category_usage="1" background_image_id="'.$thumbnail_id.'" background_repeat="no-repeat" animated="0" parallax="'.$category_parallax.'" text_size="normal"]'.$category_description.'[/mgt_promo_block_wp]').'</div>';

				}
				
			}
			?>

			<?php
				// Subcategories display
				if(isset($cat->term_id)) {
					$display_type = get_woocommerce_term_meta( $cat->term_id, 'display_type', true );
				} else {
					$display_type = '';
				}

				if(($display_type == 'products')||($display_type == '')) {
					$display_subcategories = false;
				} else {
					$display_subcategories = true;
				}

				if($display_subcategories) {
					if(isset($theme_options['shop_subcategory_show_post_count'])) {
						$show_post_count = $theme_options['shop_subcategory_show_post_count'];
					} else {
						$show_post_count = 0;
					}
					if(isset($theme_options['shop_subcategory_cta_text'])) {
						$subcategory_cta_text = $theme_options['shop_subcategory_cta_text'];
					} else {
						$subcategory_cta_text = __("Show products", 'magnium');
					}

					// Demo settings
					if ( defined('DEMO_MODE') && isset($_GET['shop_subcategory_use_slider']) ) {
					  $theme_options['shop_subcategory_use_slider'] = $_GET['shop_subcategory_use_slider'];
					}
					if ( defined('DEMO_MODE') && isset($_GET['shop_subcategory_slider_navigation']) ) {
					  $theme_options['shop_subcategory_slider_navigation'] = $_GET['shop_subcategory_slider_navigation'];
					}
					if ( defined('DEMO_MODE') && isset($_GET['shop_subcategory_slider_pagination']) ) {
					  $theme_options['shop_subcategory_slider_pagination'] = $_GET['shop_subcategory_slider_pagination'];
					}

					if(isset($theme_options['shop_subcategory_use_slider'])) {
						$use_slider = $theme_options['shop_subcategory_use_slider'];
					} else {
						$use_slider = 0;
					}
					if(isset($theme_options['shop_subcategory_slider_navigation'])) {
						$slider_navigation = $theme_options['shop_subcategory_slider_navigation'];
					} else {
						$slider_navigation = 0;
					}
					if(isset($theme_options['shop_subcategory_slider_pagination'])) {
						$slider_pagination = $theme_options['shop_subcategory_slider_pagination'];
					} else {
						$slider_pagination = 0;
					}

					if($span_class == 'col-md-12') {
						$block_size = "small";
					} else {
						$block_size = "normal";
					}

					$subcategories_html = do_shortcode('[mgt_category_list_wp block_size="'.$block_size.'" call_to_action_text="'.$subcategory_cta_text.'" show_post_count="'.$show_post_count.'" child_of="0" parent="'.$cat->term_id.'" hide_empty="0" orderby="name" order="asc" use_slider="'.$use_slider.'" slider_autoplay="0" slider_navigation="'.$slider_navigation.'" slider_pagination="'.$slider_pagination.'"]');

					if($subcategories_html !== '') {
						echo '<div class="woocommerce-subcategories-list">'.$subcategories_html.'</div>';
					}
				}
				
			?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */

				if($offcanvas && is_active_sidebar( 'shop-sidebar' )) {
					echo '<div id="st-trigger-effects"><button class="btn mgt-button mgt-style-grey" data-effect="st-effect-2"><i class="fa fa-cog"></i>'.__("Filter", 'magnium').'</button></div>';
				}

				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
		
		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
			<div class="content-block">
			<div class="container shop shop-archive">
			<div class="row">

			
			
			<?php
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				if(is_active_sidebar( 'shop-sidebar' ) && ($shop_sidebar_position == 'left') ) {
					do_action( 'woocommerce_sidebar' );
				}
				
			?>

			<div class="<?php echo esc_attr($span_class); ?>">
		
				<div class="shop-content">
				
				<?php wc_get_template( 'loop/no-products-found.php' ); ?>
				</div>
			
			</div>
			<?php
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				if(is_active_sidebar( 'shop-sidebar' ) && ($shop_sidebar_position == 'right')) {
					do_action( 'woocommerce_sidebar' );
				}
				
			?>
			</div>
			</div>
			</div>
		<?php endif; ?>	
	</div>
	</div>
	<?php if ( have_posts() ):?>
	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		if(is_active_sidebar( 'shop-sidebar' ) && ($shop_sidebar_position == 'right')) {
			do_action( 'woocommerce_sidebar' );
		}
		
	?>
	<?php endif; ?>
</div></div></div>
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php
	if($offcanvas && is_active_sidebar( 'shop-sidebar' )) {
		echo '<nav id="menu-1" class="st-menu st-effect-2">';
		echo '<div class="st-menu-close-btn">×</div>';
		do_action( 'woocommerce_sidebar' );
		echo '</nav>';
	}
?>


<?php get_footer( 'shop' ); ?>