<?php
/**
 * The Template for displaying Portfolio single posts.
 *
 * @package magnium
 */

global $theme_options;

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php 
	$comments_loaded = false;

  $portfolio_css_classes = '';

  $portfolio_small = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'mgt-portfolio-small' );
  $portfolio_large = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'mgt-portfolio-large' );
  $portfolio_source = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'source' );

  $portfolio_brand = get_post_meta( get_the_ID(), '_portfolio_brand_value', true );
  $portfolio_brand_url = get_post_meta( get_the_ID(), '_portfolio_brand_url_value', true );
  $portfolio_url = get_post_meta( get_the_ID(), '_portfolio_url_value', true );

  $portfolio_fullwidthslider = get_post_meta( get_the_ID(), '_portfolio_fullwidthslider_value', true );
  $portfolio_socialshare_disable = get_post_meta( get_the_ID(), '_portfolio_socialshare_disable_value', true );
  $portfolio_original_image_sizes = get_post_meta( get_the_ID(), '_portfolio_original_image_sizes_value', true );
  $portfolio_hide_details = get_post_meta( get_the_ID(), '_portfolio_hide_details_value', true );
  $page_fullwidth = get_post_meta( get_the_ID(), '_page_fullwidth_value', true );

  $portfolio_hide_1st_image_from_slider = get_post_meta( get_the_ID(), '_portfolio_hide_1st_image_from_slider_value', true );

  $portfolio_images = array();
  $portfolio_images_sources = array();

  $portfolio_images_sources = get_images_src('source', false, get_the_ID());

  $portfolio_layout = get_post_meta( get_the_ID(), '_portfolio_display_type_value', true );
  $portfolio_disableslider = get_post_meta( get_the_ID(), '_portfolio_disableslider_value', true );

  $portfolio_sidebarposition = get_post_meta( $post->ID, '_portfolio_sidebarposition_value', true );
  $portfolio_titleposition = get_post_meta( $post->ID, '_portfolio_titleposition_value', true );

  if(!isset($portfolio_sidebarposition) || ($portfolio_sidebarposition == '')) {
    $portfolio_sidebarposition = 0;
  }

  if(!isset($portfolio_titleposition) || ($portfolio_titleposition == '')) {
    $portfolio_titleposition = 'default';
  }

  if($portfolio_sidebarposition == "0") {
    $portfolio_sidebarposition = $theme_options['portfolio_sidebar_position'];
  }

  $portfolio_css_classes = 'portfolio-layout-'.$portfolio_layout.' portfolio-title-position-'.$portfolio_titleposition;

  if($page_fullwidth) {
      $containerclass = 'container-fluid';
      $containerboxclass = 'container fullwidth-no-padding';
      $portfolio_sidebarposition = 'disable';
      $portfolio_layout = 1;
  }
  else {
      $containerclass = 'container';
      $containerboxclass = '';
  }

  if($portfolio_layout == 0) {

  	if(is_active_sidebar( 'main-sidebar' ) && ($portfolio_sidebarposition <> 'disable')) {
  		$span_class = 'col-md-4';
  		$span_class2 = 'col-md-5';
  	}
  	else {
  		$span_class = 'col-md-7';
  		$span_class2 = 'col-md-5';
  	}

  	$portfolio_main_image = $portfolio_small;
  	$portfolio_images = get_images_src('mgt-portfolio-small',false, get_the_ID());
  }
  else {
  	if(is_active_sidebar( 'main-sidebar' ) && ($portfolio_sidebarposition <> 'disable') ) {
  		$span_class = 'col-md-9';
  	}
  	else {
  		$span_class = 'col-md-12';
  		$span_class2 = 'col-md-12 portfolio-single-content';
  	}

  	$portfolio_main_image = $portfolio_large;
  	$portfolio_images = get_images_src('mgt-portfolio-large',false, get_the_ID());
  }

  // full image size for fullwidth slider
  if($portfolio_fullwidthslider) { 
  	$portfolio_images = get_images_src('source',false, get_the_ID());
  	$portfolio_main_image = $portfolio_source;

    $span_class = 'col-md-12';

    $portfolio_css_classes .= ' portfolio-fullwidthslider';
  }

  if(!isset($portfolio_original_image_sizes)) {
    $portfolio_original_image_sizes = false;
  }

  if($portfolio_original_image_sizes) {
      $portfolio_images = get_images_src('source',false, get_the_ID());
      $portfolio_main_image = $portfolio_source;
  }
  
  $terms = get_the_terms( $post->ID , 'mgt_portfolio_filter' );

  $terms_count = count($terms);

  $terms_counter = 0;

  $terms_slug = '';

  $categories_html = '';

  $parent_link = get_post_type_archive_link('mgt_portfolio');

  $related_filter = '';

  foreach ( $terms ? $terms: array() as $term ) {

    if($terms_counter  < $terms_count - 1) {
      $categories_html .= esc_html($term->name).', ';
      $related_filter .= esc_html($term->slug).', ';
    }
    else
    {
      $categories_html .= esc_html($term->name);
      $related_filter .= esc_html($term->slug);
    }
    
    $terms_slug .= ' '.$term->slug;

    $terms_counter++;
  }

?>
<?php if(isset($theme_options['portfolio_show_item_navigation']) && $theme_options['portfolio_show_item_navigation']): ?>
    <?php
        $prevPost = get_previous_post();

        if($prevPost) {
          $prevthumbnail = get_the_post_thumbnail($prevPost->ID, 'mgt-portfolio-nav');
        } else {
          $prevthumbnail = false;
        }

        $nextPost = get_next_post();

        if($nextPost) {
          $nextthumbnail = get_the_post_thumbnail($nextPost->ID, 'mgt-portfolio-nav');
        } else {
          $nextthumbnail = false;
        }
    ?>
    
    <?php if($prevthumbnail): ?>
    <div class="portfolio-navigation-prev">
      <div class="portfolio-navigation-image">
        <?php previous_post_link('%link', $prevthumbnail); ?>
      </div>
    </div>
    <?php endif;?>
    <?php if($nextthumbnail): ?>
    <div class="portfolio-navigation-next">
      <div class="portfolio-navigation-image">
        <?php next_post_link('%link', $nextthumbnail); ?>
      </div>
    </div>
    <?php endif;?>
  <?php endif; ?>

<div class="content-block">
  <?php if($portfolio_titleposition == 'default'): ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-item-title">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if($portfolio_fullwidthslider):?>
  <div class="portfolio-item-image">
    <div class="porftolio-slider porfolio-slider-fullwidth<?php if((!$portfolio_disableslider)&&(count($portfolio_images) > 0)) { echo ' enable-slider'; } ?>">
      <ul class="slides">
        <?php if(!$portfolio_hide_1st_image_from_slider): ?>
        <li><a href="<?php echo esc_url($portfolio_source[0]); ?>" rel="prettyPhoto[]"><img src="<?php echo esc_url($portfolio_main_image[0]); ?>" alt="<?php the_title(); ?>"/></a></li>
        <?php endif; ?>
        <?php
        $i = 1;
        foreach ( $portfolio_images as $portfolio_image ) {
          echo '<li><a href="'.esc_url($portfolio_images_sources['image'.$i][0]).'" rel="prettyPhoto[]"><img src="'.esc_url($portfolio_image[0]).'" alt=""/></a></li>';
          $i++;
        }

        ?>
      </ul>
    </div>
  </div>
  <?php endif;?>
	<div class="<?php echo esc_attr($containerclass);?> portfolio-item-details <?php echo esc_attr($portfolio_css_classes);?>">
		<div class="row">
		<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $portfolio_sidebarposition == 'left') &&(!$portfolio_fullwidthslider)) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		  <ul id="main-sidebar">
		    <?php dynamic_sidebar( 'main-sidebar' ); ?>
		  </ul>
		</div>
		<?php endif; ?>

		<div class="<?php echo esc_attr($span_class); ?>">
      <?php if(!$portfolio_fullwidthslider):?>

        <?php if((!$portfolio_hide_1st_image_from_slider)||(count($portfolio_images) > 0)):?>
        <div class="<?php echo esc_attr($containerboxclass); ?> portfolio-item-image-container">
        <div class="row">
        <div class="col-md-12">
  			<div class="portfolio-item-image">
  				<div class="porftolio-slider<?php if((!$portfolio_disableslider)&&(count($portfolio_images) > 0)) { echo ' enable-slider'; } ?>">
            <ul class="slides">
              <?php if(!$portfolio_hide_1st_image_from_slider): ?>
              <li><a href="<?php echo esc_url($portfolio_source[0]); ?>" rel="prettyPhoto[]"><img src="<?php echo esc_url($portfolio_main_image[0]); ?>" alt="<?php the_title(); ?>"/></a></li>
              <?php endif; ?>
              <?php
              $i = 1;
              foreach ( $portfolio_images as $portfolio_image ) {
                echo '<li><a href="'.esc_url($portfolio_images_sources['image'.$i][0]).'" rel="prettyPhoto[]"><img src="'.esc_url($portfolio_image[0]).'" alt=""/></a></li>';
                $i++;
              }

              ?>
            </ul>
          </div>
        </div>
        </div>
        </div>
        </div>
        <?php endif;?>

      <?php endif;?>
    <?php if ( !is_active_sidebar( 'main-sidebar' ) || ($portfolio_sidebarposition == 'disable') || ($portfolio_layout == 0)) : ?>    
		</div>
		<div class="<?php echo esc_attr($span_class2); ?>">
		<?php endif; ?>

		  <div class="portfolio-item-data clearfix">
            
            <div class="project-content">
            <?php the_content(); ?>
            <div class="clear"></div>
            </div>

             <div class="<?php echo esc_attr($containerboxclass); ?>">
              <div class="row">
                <div class="col-md-12">
            <?php if($portfolio_titleposition == 'description'): ?>
         
                  <div class="page-item-title">
                    <h1><?php the_title(); ?></h1>
                  </div>
               
            <?php endif; ?>
            <?php if(!isset($portfolio_hide_details) || (!$portfolio_hide_details)): ?>
      
              <div class="project-details">
               

                  <p><span><?php esc_html_e('Date:', 'magnium');?></span> <?php the_time(get_option('date_format')); ?></p>
                  <?php if(isset($portfolio_brand) && $portfolio_brand <> ''): ?>
                  <p><span><?php esc_html_e('Client:', 'magnium');?></span> <a href="<?php echo esc_url($portfolio_brand_url); ?>" target="_blank"><?php echo esc_html($portfolio_brand); ?></a></p>
                  <?php endif; ?>
                  <?php if(isset($portfolio_url) && $portfolio_url <> ''): ?>
                  <p><span><?php esc_html_e('Project url:', 'magnium');?></span> <a href="<?php echo esc_url($portfolio_url); ?>" target="_blank"><?php echo esc_html($portfolio_url); ?></a></p>
                  <?php endif; ?>
                  <p><span><?php esc_html_e('Category:', 'magnium');?></span> <?php echo esc_html($categories_html); ?></p>
               
              </div>

            <?php endif; ?>

            <?php if(!isset($portfolio_socialshare_disable) || !$portfolio_socialshare_disable): ?>
              <?php get_template_part( 'share-post' ); ?>
            <?php endif; ?>
            
                </div>
               </div>
              </div>
            
      </div>
      <div class="clear"></div>
      <?php if(($portfolio_sidebarposition !== 'disable')): ?>
 
            <?php 
            if(!$comments_loaded) {
               if ( comments_open() || '0' != get_comments_number() ) 
            
                  comments_template();
            }
            ?>
   
      <?php endif; ?>
		</div>
		
		<?php if ( is_active_sidebar( 'main-sidebar' ) &&( $portfolio_sidebarposition == 'right') &&(!$portfolio_fullwidthslider) ) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		  <ul id="main-sidebar">
		    <?php dynamic_sidebar( 'main-sidebar' ); ?>
		  </ul>
		</div>
		<?php endif; ?>
    
 
		</div>
    <?php if($portfolio_sidebarposition == 'disable'): ?>
    <div class="container fullwidth-no-padding">
      <div class="row">
        <div class="col-md-12">
          <?php 
          if(!$comments_loaded) {
             if ( comments_open() || '0' != get_comments_number() ) 
          
                comments_template();
          }
          ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
	</div>
</div> <?php //content-block ?>

<?php if(isset($theme_options['portfolio_related_works']) && ($theme_options['portfolio_related_works'])): ?>
<div class="related-works">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-item-title">
          <h1><?php esc_html_e('Related works', 'magnium'); ?></h1>
        </div>
      </div>
    </div>
  </div>
<?php get_template_part( 'portfolio-related' ); ?>
</div>
<?php endif; ?>

<?php endwhile; // end of the loop. ?>



<?php if(!$portfolio_disableslider): ?>

<?php 
if(isset($theme_options['portfolio_show_slider_navigation']) && $theme_options['portfolio_show_slider_navigation']) {
  $portfolio_show_slider_navigation = 'true';
} else {
  $portfolio_show_slider_navigation = 'false';
}

if(isset($theme_options['portfolio_slider_autoplay']) && $theme_options['portfolio_slider_autoplay']) {
  $portfolio_slider_autoplay = 'true';
} else {
  $portfolio_slider_autoplay = 'false';
}

if(isset($theme_options['portfolio_show_slider_pagination']) && $theme_options['portfolio_show_slider_pagination']) {
  $portfolio_show_slider_pagination = 'true';
} else {
  $portfolio_show_slider_pagination = 'false';
}

?>
<?php if(count($portfolio_images) > 0): ?>
<script>
(function($){
$(document).ready(function() {
  $(".porftolio-slider.enable-slider ul.slides").owlCarousel({
          items: 1,
          itemsDesktop: [1024,3],
          itemsTablet: [770,2],
          itemsMobile : [480,1],
          autoHeight: true,
          autoPlay: <?php echo esc_js($portfolio_slider_autoplay);?>,
          navigation: <?php echo esc_js($portfolio_show_slider_navigation);?>,
          navigationText : false,
          pagination: <?php echo esc_js($portfolio_show_slider_pagination);?>,
          afterInit : function(elem){
              $(".porftolio-slider").css("display", "block");
          }
    });

});
})(jQuery);
</script>
<?php endif; ?>
<?php endif; ?>

<?php get_footer(); ?>