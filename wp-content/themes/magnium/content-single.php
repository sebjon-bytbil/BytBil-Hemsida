<?php
/**
 * @package Magnium
 */
global $theme_options;

$post_sidebarposition = get_post_meta( get_the_ID(), '_post_sidebarposition_value', true );
$post_socialshare_disable = get_post_meta( get_the_ID(), '_post_socialshare_disable_value', true );
$post_fullwidth  = get_post_meta( get_the_ID(), '_post_fullwidth_value', true );

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['post_sidebar_position']) ) {
  $theme_options['post_sidebar_position'] = $_GET['post_sidebar_position'];
}

if(!isset($post_sidebarposition)) {
	$post_sidebarposition = 0;
}

if($post_sidebarposition == "0") {
	$post_sidebarposition = $theme_options['post_sidebar_position'];
}

if($post_fullwidth) {
  $containerclass = 'container-fluid';
  $post_sidebarposition = 'disable';
  $add_class = ' post-fullwidth';
}
else {
  $containerclass = 'container';
  $add_class = '';
}

$post_bgcolor = get_post_meta( $post->ID, '_post_bgcolor_value', true );

$post_bgcolor_css = '';

if(isset($post_bgcolor)&&($post_bgcolor<>'')) {
  $post_bgcolor_css = 'background-color: '.$post_bgcolor;
}
else
{
  $post_bgcolor_css = '';
}

if(is_active_sidebar( 'main-sidebar' ) && ($post_sidebarposition <> 'disable') ) {
	$span_class = 'col-md-9';
}
else {
	$span_class = 'col-md-12 post-single-content';
}

?>

<div class="content-block">
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-item-title">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
  </div>
<div class="post-container <?php echo esc_attr($containerclass); ?>" <?php if($post_bgcolor_css<>'') { echo ' data-style="'.esc_attr($post_bgcolor_css).'"'; }; ?>>
	<div class="row">
<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $post_sidebarposition == 'left')) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		<ul id="main-sidebar">
		  <?php dynamic_sidebar( 'main-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($span_class); ?>">
			<div class="blog-post blog-post-single<?php echo esc_attr($add_class); ?>">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="post-content-wrapper">
					
								<div class="post-content">
									<div class="post-info">
									<span><?php esc_html_e('by','magnium'); ?> <strong><?php the_author();?></strong></span> 
									 / <span><?php esc_html_e('on','magnium'); ?><strong><?php 
										$post_classes = get_post_class();

										if($post_classes[4] == 'format-chat') {
											esc_html_e("Chat on ", 'magnium');
										}
									?> <?php the_time(get_option( 'date_format' ));  ?></strong></span> / 
									
									<?php
											/* translators: used between list items, there is a space after the comma */
											$categories_list = get_the_category_list( ', ' );
											if ( $categories_list ) :
										?>
										
										 <span><?php esc_html_e('in','magnium'); ?> <?php printf( __( '%1$s', 'magnium' ), $categories_list ); ?></span>
										
										<?php endif; // End if categories ?>
										
										<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
										 / <span><?php comments_popup_link( __( 'Leave a comment', 'magnium' ), __( '1 Comment', 'magnium' ), __( '% Comments', 'magnium' ) ); ?></span>
										<?php endif; ?>
										
										<?php edit_post_link( __( 'Edit', 'magnium' ), ' / <span class="edit-link">', '</span>' ); ?>
									</div>

									
									
										<?php 
										if ( has_post_thumbnail() ): // check if the post has a Post Thumbnail assigned to it.
										?>
										<div class="blog-post-thumb text-center">
										
										<?php the_post_thumbnail(); ?>
										
										</div>
										<?php endif; ?>
									
										<?php if ( is_search() ) : // Only display Excerpts for Search ?>
										<div class="entry-summary">
											<?php the_excerpt(); ?>
										</div><!-- .entry-summary -->
										<?php else : ?>
										<div class="entry-content">
											<?php the_content('<div class="more-link">'.__( 'Continue reading...', 'magnium' ).'</div>' ); ?>
											<?php
												wp_link_pages( array(
													'before' => '<div class="page-links">' . __( 'Pages:', 'magnium' ),
													'after'  => '</div>',
												) );
											?>
										</div><!-- .entry-content -->
										
										
										<?php endif; ?>
									</div>
					
							</div>
				<?php if($post_fullwidth): ?>
					<div class="container fullwidth-no-padding">
						<div class="row">
							<div class="col-md-12">
				<?php endif; ?>	
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', ', '  );
					if ( $tags_list ) :
				?>
				
				<span class="tags">
					<?php printf( __( 'Tags: %1$s', 'magnium' ), $tags_list ); ?>
				</span>
				
				<?php endif; // End if $tags_list ?>
				<?php if(!isset($post_socialshare_disable) || !$post_socialshare_disable): ?>
					<?php get_template_part( 'share-post' ); ?>
				<?php endif; ?>

				<?php if($post_fullwidth): ?>
							</div>
						</div>
					</div>
				<?php endif; ?>	

				</article>

				

			</div>
			

			<?php if($post_fullwidth): ?>
					<div class="container fullwidth-no-padding">
						<div class="row">
							<div class="col-md-12">
				<?php endif; ?>	
			
			<?php if(isset($theme_options['blog_enable_author_info'])&&($theme_options['blog_enable_author_info'])): ?>
				<?php if ( is_single() && get_the_author_meta( 'description' ) ) : ?>
					<?php get_template_part( 'author-bio' ); ?>
				<?php endif; ?>
			<?php endif; ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) 
					
					comments_template();
			?>
			<?php 
			if(isset($theme_options['blog_post_navigation']) && $theme_options['blog_post_navigation']) {
				magnium_content_nav( 'nav-below' ); 
			}
			?>

			<?php if($post_fullwidth): ?>
							</div>
						</div>
					</div>
			<?php endif; ?>	
		</div>
		<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $post_sidebarposition == 'right')) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		<ul id="main-sidebar">
		  <?php dynamic_sidebar( 'main-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
	</div>
	</div>
</div>
</div>
