/* This file loaded after WooCommerce scripts to allow overrides */
(function($){
$(document).ready(function() {
	if($('form.variations_form').length > 0) {

		$(".woocommerce .product .thumbnails a.zoom").click(function(e) {
			if($(".woocommerce-main-image.cloud-zoom.variable-image").length > 0) {
				$(".woocommerce-main-image").removeClass('variable-image');

				$("form.variations_form").trigger( 'reset_image' );
			}
		});


		if($(".woocommerce-main-image.cloud-zoom").length > 0) {
			$('.woocommerce-page div.product div.thumbnails a').first().click();
		} else {
			$('.woocommerce-page div.product div.thumbnails a').first().mouseenter();
		}
		
		// Variations
		$('form.variations_form').on( 'found_variation', function( event, variation ) {

			var variation_image = variation.image_src;
			var variation_link  = variation.image_link;

			if(variation_image !== '') {
			  $(".woocommerce-main-image").attr('href', variation_link);
			  $(".woocommerce-main-image").addClass('variable-image');
			  $(".woocommerce .product .thumbnails a").removeClass("active");

			  $(".woocommerce-main-image.cloud-zoom > img").attr('data-zoom-image', variation_link);
			  $(".woocommerce-main-image.cloud-zoom > img").attr('data-o_src', variation_image);

			} else {
			  $(".woocommerce-main-image").removeClass('variable-image');

			  if($(".woocommerce-main-image.cloud-zoom").length > 0) {

			    $('.woocommerce-page div.product div.thumbnails a').first().click();

			  } else {

			  	$('.woocommerce-page div.product div.thumbnails a').first().mouseenter();

			  }
			}

			$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
		});

		$('form.variations_form').on( 'reset_image', function( event, variation ) {

			if($(".woocommerce-main-image.cloud-zoom").length > 0) {
				$('.woocommerce-page div.product div.thumbnails a').first().click();
			} else {
				$('.woocommerce-page div.product div.thumbnails a').first().mouseenter();
			}
		});

	}

 });
})(jQuery);