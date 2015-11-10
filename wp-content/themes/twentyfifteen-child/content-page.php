<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="max-width: 1170px; margin: 0 auto;">
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="container-fluid">
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
            <div class="vehicle-grid">

                <?php

                $xml = get_xml_data();

                $i = 0;
                foreach($xml['car'] as $car) {
                    get_vehicle_object($car);

                    /*
                    if($i>10){
                        break;
                    }
                    $i++;
                    */
                }

                ?>

            </div>
        </div>   
	</div><!-- .entry-content -->
    
    <script type="text/javascript">
        $ = jQuery;
        $(document).ready(function() {

        
            var $grid = $('.vehicle-grid').isotope({
                itemSelector: '.col-sm-4',
                layoutMode: 'fitRows'
            });     
            
            $('.selectpicker').selectpicker();
            

              $('.selectpicker').on('change', function(){
                var selected = $(this).find("option:selected").val();
              });

       
            $('.filter-brand').on('change', function() {
                // get filter value from option value
                var filterValue = this.value;
                $('.filter-model [data-brand*='+filterValue+']').each(function(){
                    $(this).remove();
                });
                $('.filter-model option:not([data-brand*='+filterValue+'])')
                
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


</article><!-- #post-## -->
