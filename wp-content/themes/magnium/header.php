<?php
/**
 * WP Theme Header
 *
 * Displays all of the <head> section
 *
 * @package Magnium
 */
global $theme_options;

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['search_position']) ) {
  $theme_options['search_position'] = esc_html($_GET['search_position']);
}
if ( defined('DEMO_MODE') && isset($_GET['header_logo_position']) ) {
  $theme_options['header_logo_position'] = esc_html($_GET['header_logo_position']);
}
if ( defined('DEMO_MODE') && isset($_GET['search_type']) ) {
  $theme_options['search_type'] = esc_html($_GET['search_type']);
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php echo body_class(); ?>>

<?php do_action( 'before' ); ?>

<div class="header-menu-bg">
  <div class="header-menu">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
            
            <div class="header-info-text"><?php

            $social_services_arr = Array("facebook", "vk","twitter", "google-plus", "linkedin", "dribbble", "instagram", "tumblr", "pinterest", "vimeo-square", "youtube", "skype");

            $s_count = 0;

            foreach( $social_services_arr as $ss_data ){
              if(isset($theme_options[$ss_data]) && (trim($theme_options[$ss_data])) <> '') {
                $s_count++;
                $social_service_url = $theme_options[$ss_data];
                $social_service = $ss_data;
                echo '<a href="'.esc_url($social_service_url).'" target="_blank" class="a-'.esc_attr($social_service).'"><i class="fa fa-'.esc_attr($social_service).'"></i></a>';
              }
            }
            
            if($s_count > 0) {
              echo '<span class="sep"></span>';
            }
            
            ?>
            <?php 
            if((isset($theme_options['header_info_editor'])) && ($theme_options['header_info_editor'] <> '')) {
              echo '<div class="header-info-text-content">'.wp_kses_post($theme_options['header_info_editor']).'</div>';
            }
            ?>
            </div>
        </div>
        <div class="col-md-7">
          
          <?php
          wp_nav_menu(array(
            'theme_location'  => 'top',
            'menu_class'      => 'links'
            ));
          ?>
          <div class="wpml-wrapper">
            <?php if(isset($theme_options['header_show_currency_switcher']) && $theme_options['header_show_currency_switcher']): ?>
            <div class="wpml-currency">
            <?php do_action('currency_switcher', array('format' => '%symbol%')); ?>
            </div>
            <?php endif; ?>
            <?php if(isset($theme_options['header_show_language_switcher']) && $theme_options['header_show_language_switcher']): ?>
            <div class="wpml-lang">
            <?php do_action('icl_language_selector'); ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
          <?php if(isset($theme_options['search_position']) && $theme_options['search_position'] == 'top'): ?>
          <div class="col-md-12">
            <div class="search-bar-toggle">
              <?php
                if((isset($theme_options['search_type'])) && ($theme_options['search_type'] == 'woo')) {
                 
                    if (class_exists('Woocommerce')) {
                      
                      echo get_product_search_form();
                      
                    }
                  
                } elseif((isset($theme_options['search_type'])) && ($theme_options['search_type'] == 'wp')) {
                    echo get_search_form();
                }
              ?>
            </div>
          </div>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php 

// Center logo
if(isset($theme_options['header_logo_position']) && $theme_options['header_logo_position'] == 'center') {
  $header_container_add_class = ' header-logo-center';
} else {
  $header_container_add_class = '';
}

// Sticky header

if(isset($theme_options['enable_sticky_header']) && $theme_options['enable_sticky_header']) {
  $header_add_class = ' class="'.esc_attr('sticky-header main-header').'"';
} else {
  $header_add_class = ' class="'.esc_attr('main-header').'"';
}
?>
<header<?php echo $header_add_class; ?>>
<div class="container<?php echo esc_attr($header_container_add_class); ?>">
  <div class="row">
    <div class="col-md-12">
     
      <div class="header-left logo">
        <?php
        // Center logo
        if(isset($theme_options['header_logo_position']) && $theme_options['header_logo_position'] == 'center'): ?>
          <?php magnium_header_center_show(); ?>
        <?php else: ?>
          <?php magnium_header_left_show(); ?>
        <?php endif;
        // Center logo END
        ?>
      </div>
      
      <div class="header-center">
      <?php 
      // Center logo
      if(isset($theme_options['header_logo_position']) && $theme_options['header_logo_position'] == 'center'):
      ?>
        <?php magnium_header_left_show(); ?>
      <?php else: ?>
        <?php magnium_header_center_show(); ?>
      <?php 
      endif; 
      // Center logo END
      ?>
      </div>

      <div class="header-right">
        <?php magnium_header_right_show(); ?>
      </div>
    </div>
  </div>
    
</div>
<?php magnium_menu_below_header_show(); ?>
</header>