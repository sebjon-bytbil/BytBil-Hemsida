<?php /* Template Name: Tjänster : Egen kod */ get_header(); 

	$ids = get_post_ancestors( $post );

	$id = $post->$ID;
	$post_meta = get_post_meta(get_the_ID());
	$masterPost = bytbil_get_master_post(get_the_ID());
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="wrapper">
			<?php
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
							<?php echo bytbil_get_field('css-code')  ?>
							<?php echo "<div style='position:absolute'>".bytbil_get_field('html-code', true)."</div>"; ?>
                            <?php //echo "<div style='position:absolute'>".$masterPost->post_content."</div>"; ?>
					</div><!-- .entry-content -->

				</article><!-- #post -->

			</div>

		</div><!-- #content -->
	</div><!-- #primary -->
				

<?php echo bytbil_get_field("js-code"); ?>
<?php get_footer(); ?>