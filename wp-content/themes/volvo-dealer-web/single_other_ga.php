<?php /* Template Name: Tjänster : Ett block */ get_header(); 

	$ids = get_post_ancestors( $post );

	$id = $post->$ID;
	$post_meta = get_post_meta(get_the_ID());
	$masterPost = bytbil_get_master_post(get_the_ID());
	//var_dump($masterPost);
	

	
//}

?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="wrapper">
			<?php /* The loop */ ?>
			<?php //while ( have_posts() ) : the_post(); 

				if (bytbil_get_field('bakgrundsbild', true)) {
					?>
				
				<script type="text/javascript">

					$('#background-container').empty();
                    var imageUrl = '<?php echo bytbil_get_field('bakgrundsbild', true); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
				</script>
				
				<?php
				}

				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="left-column black-page">

						<header class="entry-header">
							<h1 class="entry-title"><?php 
								switch_to_master();
								echo empty( $masterPost->post_parent ) ? get_the_title( $masterPost->ID ) : get_the_title( $masterPost->post_parent );
								restore_from_master();
							?></h1>
						</header><!-- .entry-header -->

                        <?php include 'mobile-menu.php'; ?>

						<div class="side-menu-container side-menu-old">
							<ul class="side-menu-large">
							<?php 
								new_volvo_menu('bottom-services');
							?>
                            </ul>
						</div>

					</div>

					<div class="right-column block-page" style="text-align: left;">
						<div class="single-block">
								<div class="page-content-banner" style="position: relative;">
									<?php if (bytbil_get_field('bild', true)) {
										?>
										<img src="<?php echo bytbil_get_field('bild', true); ?>" />
										<?php
									}
									if (get_field('bannertext')) {
										?>
										<span class="page-content-banner-text"><div><?php echo bytbil_get_field('bannertext', true);?></div><div><?php echo get_field('bannertext2', get_the_ID());?></div></span>
										<span class="page-content-banner-text2"></span>
									
										<?php
									}
									if (bytbil_get_field('bannerknapp_url', true)) {
										$span_class = '';
										$a_class = '';
										if (get_field('open_in_lightbox')) {
											$span_class = ' open_in_lightbox';
											$a_class = ' lytebox';
										}
										?>

										<span class="page-content-banner-button<?php echo $span_class; ?>"><a class="<?php echo $a_class; ?>" href="<?php echo get_field('bannerknapp_url', get_the_ID()); ?>"><?php echo get_field('bannerknapp_text', get_the_ID()); ?></a></span>
										<?php
									}	
									?>

								</div>
							<div class="inner-wrap">
								<?php echo $masterPost->post_content; ?>
							</div>
						</div>
					</div><!-- .entry-content -->

				</article><!-- #post -->

			</div>

		</div><!-- #content -->
	</div><!-- #primary -->
				


<?php get_footer(); ?>