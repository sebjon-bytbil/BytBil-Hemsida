<?php
/**
 * Template name: Fordonslista
 *
 * @package parallax-one
 */

	get_header(); 
?>

	</div>
	<!-- /END COLOR OVER IMAGE -->
</header>
<!-- /END HOME / HEADER  -->
<link rel="stylesheet" href="/wp-content/plugins/bb-vehicles/inc/css/bootstrap-select.css">
<div class="content-wrap">
	<div class="container">

		<div id="primary" class="content-area col-md-12">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

              <?php
                    $status_options = get_select_options('status');
                    $brand_options = get_select_options('brand');

                ?>
                
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <label class="selectpicker-label">Vad för bil?</label>                        
                        <select class="selectpicker filter-select filter-status">
                            <option value="all">Alla</option>
                            <?php foreach($status_options as $status) { ?>
                                <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                            <?php } ?>
                        </select>
                        
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <label class="selectpicker-label">Vilket märke?</label>
                        <select class="selectpicker filter-select filter-brand">
                            <option value="all">Alla</option>
                            <?php foreach($brand_options as $brand) { ?>
                                <option value="<?php echo $brand; ?>"><?php echo $brand; ?></option>
                            <?php } ?>
                        </select>
                        
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        
                        <label class="selectpicker-label">Vilken modell?</label>
                        <?php
                        get_select_element('model');
                        ?>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="container-fluid wrapper">
                        <div class="vehicle-grid">
                    
                            <?php
        
                            $xml = get_xml_data();

                            $i = 0;
                            foreach($xml['car'] as $car) {
                                get_vehicle_object($car);
                                
                                if($i>10){
                                    break;
                                }
                                $i++;
                            }

                            ?>
                            
                        </div>
                    </div>
                </div>
                
				
			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div>
</div><!-- .content-wrap -->

    <script src="/wp-content/themes/Parallax-One/js/jquery-1.11.1.min.js"></script>
    <!-- Bootstrap Select -->
    <script src="/wp-content/plugins/bb-vehicles/inc/js/bootstrap-select.js"></script>
    <script src="/wp-content/themes/Parallax-One/js/jquery.lazyload.min.js"></script>
    <!-- Isotope Filter List -->
    <script src="/wp-content/themes/Parallax-One/js/isotope.pkgd.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

        
            var $grid = $('.vehicle-grid').isotope({
                itemSelector: '.col-sm-4',
                layoutMode: 'fitRows'
            });     
            
            $('.selectpicker').selectpicker();
            

              $('.selectpicker').on('change', function(){
                var selected = $(this).find("option:selected").val();
                alert(selected);
              });

       
            $('.filter-brand').on('change', function() {
                // get filter value from option value
                var filterValue = this.value;
                
                // use filterFn if matches value
                
                $grid.isotope({
                    filter: '[data-brand*='+ filterValue +']'
                });
            });
            
            $('.filter-model').on('change', function() {
                // get filter value from option value
                var filterValue = this.value;
                // use filterFn if matches value
                $grid.isotope({
                    filter: '[data-model*='+ filterValue +']'
                });
            });
            
            $('.filter-status').on('change', function() {
                // get filter value from option value
                var filterValue = this.value;
                // use filterFn if matches value
                $grid.isotope({
                    filter: '[data-status*='+ filterValue +']'
                });
            });            
            
            
            
           
        });
            
    </script>

<?php get_footer(); ?>
