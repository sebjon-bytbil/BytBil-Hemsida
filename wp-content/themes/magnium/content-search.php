<?php
/**
 * @package Magnium
 */

$post_classes = get_post_class();

$current_post_class = $post_classes[4];

// This post formats will display content before title
$post_classes_content_top = array('format-audio', 'format-image', 'format-video', 'format-gallery', 'format-status', 'format-link');

?>

<div class="content-block blog-post clearfix">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
				
				<div class="post-content-wrapper">
					<?php 
					if(in_array($current_post_class , $post_classes_content_top)) {

						if($current_post_class !== 'format-image') {
							echo '<div class="entry-content">';
							the_content( __( 'Continue reading...', 'magnium' ) );
							echo '</div>';
						}
						
						if($current_post_class == 'format-image'): ?>
						<div class="blog-post-thumb text-center">
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php the_post_thumbnail('blog-thumb'); ?>
							</a>
						</div>
							
					<?php
					endif;

					} else {
						if ( has_post_thumbnail() ):
						?>
						<div class="blog-post-thumb text-center">
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php the_post_thumbnail('blog-thumb'); ?>
							</a>
						</div>
						<?php
						endif;
					}
					?>
					<div class="post-content">

						<h1 class="entry-title post-header-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
						<div class="post-info">
						<span><?php esc_html_e('by','magnium'); ?> <strong><?php the_author();?></strong></span> 
						 / <span><?php esc_html_e('on','magnium'); ?><strong><?php 
							$post_classes = get_post_class();

							if($current_post_class == 'format-chat') {
								esc_html_e("Chat on ", 'magnium');
							}
						?> <?php the_time(get_option( 'date_format' ));  ?></strong></span> / 
						
						<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list(  ', '  );
								if ( $categories_list ) :
							?>
							
							 <span><?php esc_html_e('in','magnium'); ?></i> <?php printf( __( '%1$s', 'magnium' ), $categories_list ); ?></span>
							
							<?php endif; // End if categories ?>
							
							
							
							<?php edit_post_link( __( 'Edit', 'magnium' ), ' / <span class="edit-link">', '</span>' ); ?>
						</div>
						
						
						
							<?php if(!in_array($current_post_class , $post_classes_content_top)): ?>
							<div class="entry-content">
								<?php 
								
								the_excerpt( __( 'Continue reading...', 'magnium' ) );
								

								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'magnium' ),
									'after'  => '</div>',
								) );
								?>
							</div><!-- .entry-content -->
							<?php endif;?>
							<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
							<div class="comments-count"><?php comments_popup_link( __( 'Leave a comment', 'magnium' ), __( '1 Comment', 'magnium' ), __( '% Comments', 'magnium' ) ); ?></div>
							<?php endif; ?>
							
						</div>
		
				</div>
			
		
	</article>
</div>