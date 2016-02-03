<?php
/*
Template Name: Blog masonry fullwidth
*/

get_header(); 

$span_class = 'col-md-12';

$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page='.get_option('posts_per_page').'&paged='.$paged);		

?>
<div class="content-block">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="page-item-title">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="<?php echo $span_class; ?>">

		<?php if ( have_posts() ) : ?>
		<div class="mgt-masonry mgt-masonry-fullwidth">
			<?php /* Start the Loop */ ?>
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<div class="mgt-masonry-item">

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content-masonry', get_post_format() );
				?>
				</div>
			<?php endwhile; ?>
		</div>
			
			<?php magnium_content_nav( 'nav-below' ); ?>
		
		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>
		</div>
	</div>
</div>
</div>
<?php $wp_query = null; $wp_query = $temp; ?>
<?php get_footer(); ?>