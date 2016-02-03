<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Magnium
 */
?>
<?php 
global $theme_options;

$show_footer_sidebar_1 = true;

if(isset($theme_options['footer_sidebar_1_homepage_only']) && ($theme_options['footer_sidebar_1_homepage_only']) && is_front_page()) {
  $show_footer_sidebar_1 = true;
} 
if(isset($theme_options['footer_sidebar_1_homepage_only']) && ($theme_options['footer_sidebar_1_homepage_only']) && !is_front_page()) {
  $show_footer_sidebar_1 = false;
}
?>
<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
  <?php if($show_footer_sidebar_1): ?>
  <div class="footer-sidebar sidebar container">
    <ul id="footer-sidebar">
      <?php dynamic_sidebar( 'footer-sidebar' ); ?>
    </ul>
  </div>
  <?php endif; ?>
<?php endif; ?>
<div class="container-fluid container-fluid-footer">
<div class="row">
<div class="footer-sidebar-2-wrapper">
<div class="footer-sidebar-2 sidebar container footer-container">
<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
  <ul id="footer-sidebar-2" class="clearfix">
    <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
  </ul>
<?php endif; ?>
     
</div>
      
</div>


<footer>
<div class="container">
<div class="row">
    <div class="col-md-6 copyright">
    <?php echo wp_kses_post($theme_options['footer_copyright_editor']); ?>
    </div>
    <div class="col-md-6 payment-icons">
         
          <?php
          if(isset($theme_options['footer_payment_icons'])) {
            foreach( $theme_options['footer_payment_icons'] as $footer_payment_icon ){

              echo '<img src="'.get_stylesheet_directory_uri().'/img/payment/'.esc_attr($footer_payment_icon).'.png" alt="'.esc_attr($footer_payment_icon).'"/>';
            }
          }

          ?>
          
    </div>
</div>
</div>
<a id="top-link" href="#top"></a>
</footer>

</div>
</div>
<?php wp_footer(); ?>
<?php

    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['enable_offcanvas_sidebar']) ) {
      $theme_options['enable_offcanvas_sidebar'] = $_GET['enable_offcanvas_sidebar'];
    }
    
    if(isset($theme_options['enable_offcanvas_sidebar'])&&($theme_options['enable_offcanvas_sidebar'])): 
?>
      <nav id="offcanvas-sidebar-nav" class="st-sidebar-menu st-sidebar-effect-2">
      <div class="st-sidebar-menu-close-btn">×</div>
        <?php if ( is_active_sidebar( 'offcanvas-sidebar' ) ) : ?>
          <div class="offcanvas-sidebar sidebar">
          <ul id="offcanvas-sidebar" class="clearfix">
            <?php dynamic_sidebar( 'offcanvas-sidebar' ); ?>
          </ul>
          </div>
        <?php endif; ?>
      </nav>
<?php endif; ?>
</body>
</html>