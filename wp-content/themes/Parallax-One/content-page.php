<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package parallax-one
 */
?>
<div class=""

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="single-title" itemprop="headline">', '</h1>' ); ?>
		<div class="colored-line-left"></div>
		<div class="clearfix"></div>
	</header><!-- .entry-header -->

	<div class="entry-content content-page" itemprop="text">
		<?php the_content(); ?>
        
		
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
