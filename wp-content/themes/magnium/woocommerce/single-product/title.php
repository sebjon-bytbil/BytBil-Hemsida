<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $theme_options, $product;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="product-categories"><?php echo $product->get_categories(); ?></div>
<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
