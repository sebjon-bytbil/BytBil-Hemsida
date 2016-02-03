<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<div>
		<input type="text" value="<?php echo esc_attr(get_search_query()); ?>" name="s" id="s" placeholder="<?php esc_html_e( 'Search for products', 'woocommerce' ); ?>" />
        <?php
        global $theme_options;
        
        $args = array(
             'parent'    =>  0
        );
        $product_categories = get_terms( 'product_cat', $args );

        // Demo settings
        if ( defined('DEMO_MODE') && isset($_GET['search_position']) ) {
          $theme_options['search_position'] = esc_html($_GET['search_position']);
        }

        if(isset($theme_options['search_position']) && $theme_options['search_position'] == 'header'): ?><select name="product_cat">
        <option value='' selected><?php _e( 'All categories', 'magnium' ) ?></option>
        <?php foreach( $product_categories as $cat ) {
        echo '<option value="'. esc_attr($cat->slug) .'">' . esc_html($cat->name) . '</option>';
        }
        ?>
        </select><?php endif; ?><input type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Search' ); ?>" /><input type="hidden" name="post_type" value="product" />
	</div>
</form>