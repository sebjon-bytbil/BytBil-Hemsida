<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Magnium
 */

global $theme_options;
?>

<?php
  $page_fullwidth = get_post_meta( $post->ID, '_page_fullwidth_value', true );
  $page_stick_footer = get_post_meta( $post->ID, '_page_stick_footer_value', true );

  $page_sidebarposition = get_post_meta( $post->ID, '_page_sidebarposition_value', true );
  $page_notdisplaytitle = get_post_meta( $post->ID, '_page_notdisplaytitle_value', true );

  if(!isset($page_sidebarposition)||($page_sidebarposition == '')) {
    $page_sidebarposition = 0;
  }

  if($page_sidebarposition == "0") {
    $page_sidebarposition = $theme_options['page_sidebar_position'];
  }

  if($page_fullwidth) {
      $containerclass = 'container-fluid';
  }
  else {
      $containerclass = 'container';
  }

  $page_class = get_post_meta( $post->ID, '_page_class_value', true );

  $page_bgcolor = get_post_meta( $post->ID, '_page_bgcolor_value', true );

  $page_bgcolor_css = '';

  if(isset($page_bgcolor)&&($page_bgcolor<>'')) {
      $page_bgcolor_css = 'background-color: '.$page_bgcolor;
  }
  else
  {
      $page_bgcolor_css = '';
  }
  
  if($page_stick_footer) {
    $page_class .= ' stick-to-footer';
  }

  if(is_active_sidebar( 'main-sidebar' ) && ($page_sidebarposition <> 'disable') && (!$page_fullwidth)) {
    $span_class = 'col-md-9';
  }
  else {
    $span_class = 'col-md-12';
  }
?>
<div class="content-block <?php echo esc_attr($page_class); ?>">
  <?php if(!$page_notdisplaytitle): ?>
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
  <div class="page-container <?php echo esc_attr($containerclass); ?>" <?php if($page_bgcolor_css<>'') { echo 'data-style="'.$page_bgcolor_css.'"'; }; ?>>
    <div class="row">
      <?php if ( is_active_sidebar( 'main-sidebar' ) && ( $page_sidebarposition == 'left') && (!$page_fullwidth)) : ?>
      <div class="col-md-3 main-sidebar sidebar">
        <ul id="main-sidebar">
          <?php dynamic_sidebar( 'main-sidebar' ); ?>
        </ul>
      </div>
      <?php endif; ?>
			<div class="<?php echo esc_attr($span_class);?> entry-content">
      
      <article>
				<?php the_content(); ?>
      </article>
      <?php if($page_fullwidth): ?>
          <div class="container fullwidth-no-padding">
            <div class="row">
              <div class="col-md-12">
        <?php endif; ?> 

        <?php 
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
            comments_template();
        ?>
        
        <?php if($page_fullwidth): ?>
              </div>
            </div>
          </div>
        <?php endif; ?> 
      
			</div>
      <?php if ( is_active_sidebar( 'main-sidebar' ) && ( $page_sidebarposition == 'right') && (!$page_fullwidth)) : ?>
      <div class="col-md-3 main-sidebar sidebar">
        <ul id="main-sidebar">
          <?php dynamic_sidebar( 'main-sidebar' ); ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>