(function($){
$(document).ready(function() {

	'use strict';
/**
*	Init
*/	

	// iOS button fixes
	var iOS = false,
        p = navigator.platform;

    if (p === 'iPad' || p === 'iPhone' || p === 'iPod') {
        iOS = true;
    }
	if (iOS) {
        $('input.button, input[type="text"],input[type="button"],input[type="password"],textarea, input.input-text').css('-webkit-appearance', 'none');
        $('input').css('border-radius', '0');
    } 

    // Remove animations on touch devices
    function isTouchDevice(){
	    return true == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch);
	}

	if(isTouchDevice()===true) {
	    $("#animations-css").remove();
	}

	$("select").select2({
		allowClear: true,
		minimumResultsForSearch: 10
	});


	// Mobile menu
	$('.nav > li > a').on('click', function(e){
		
		if($(window).width() < 767) {
			
			if ( $(this).next(".sub-menu").length > 0 ) {
				var sm = $(this).next(".sub-menu");
			
				if(sm.data('open') !== 1)
				{
					e.preventDefault();
					e.stopPropagation();
					sm.css('display', 'block');

					sm.prepend('<div class="mega-menu-close">×</div>');

					sm.data('open', 1);
					$(this).parent().addClass('mobile-submenu-opened');

				}
				
			}
		}
	});

	$( document ).on( "click", ".nav .mega-menu-close", function(e) {
		$(this).parent().css('display', 'none');
		$(this).parent().data('open', 0);
		$(this).parent().parent().removeClass('mobile-submenu-opened');
		$(this).remove();
	});

	// Onepage scroll
	var header_original_height_one = $("header.sticky-header .col-md-12").height();
	
	$(".navbar li.onepage-link-inside a.onepage-link").click(function() {
		if($($(this).attr("href")).offset()) {

			var header_height = header_original_height_one;

			var header_add_top = 0;

			if(header_fixed == 0) {
				header_add_top = header_original_height_one;
			}

			$("html, body").animate({scrollTop: $($(this).attr("href")).offset().top - header_height - $("#wpadminbar").height() - header_add_top}, 500);

			return false;
		}	
	});

	// Add CSS styles to shortcodes
	$('.mgt-cta-block').each(function( index ) {
		$(this).attr('style', ($(this).attr('data-style')));
	});
	$('.mgt-category-image').each(function( index ) {
		$(this).attr('style', ($(this).attr('data-style')));
	});
	$('.portfolio-item-image').each(function( index ) {
		$(this).attr('style', ($(this).attr('data-style')));
	});
	$('.mgt-post-image').each(function( index ) {
		$(this).attr('style', ($(this).attr('data-style')));
	});
	$('.mgt-signup-block').each(function( index ) {
		$(this).attr('style', ($(this).attr('data-style')));
	});
	$('.vc_row').each(function( index ) {
		$(this).attr('style', ($(this).attr('data-style')));
	});
	$('.fullwidth-background').each(function( index ) {
		$(this).attr('style', ($(this).attr('data-style')));
	});
	$('.page-container').each(function( index ) {
		$(this).attr('style', ($(this).attr('data-style')));
	});
	$('.post-container').each(function( index ) {
		$(this).attr('style', ($(this).attr('data-style')));
	});
	$('.mgt-menu-bg-image').each(function( index ) {
		$(this).attr('style', ($(this).attr('data-style')));
	});

	// WooCommerce cart button
	$(".wpb_column .product-buttons-cart .button").addClass('btn mgt-button mgt-align-center');

	// Categories menu opening
	$('.woocommerce.widget .product-categories li.cat-parent').prepend('<div class="cat-menu-close"></div>');

	$( document ).on( "click", ".woocommerce.widget .product-categories li.cat-parent:not(.opened) > .cat-menu-close", function(e) {
		$(this).parent().addClass('opened');
		
		$(this).next().next('ul.children').slideDown();

	});

	$( document ).on( "click", ".woocommerce.widget .product-categories li.cat-parent.opened > .cat-menu-close", function(e) {
		$(this).parent().removeClass('opened');
		
		$(this).next().next('ul.children').slideUp();

	});

	$('.woocommerce.widget .product-categories li ul.children li.current-cat').parent().show().parent().addClass('opened').parent().show().parent().addClass('opened');
	
	/* Adjust megamenu */
	function magnium_megamenufitwidth() {
		if($(window).width() > 767) {
			$(".mgt-mega-menu:not(.mgt-menu-vertical) .nav > li").mouseenter(function() {
				if ( $(this).children(".sub-menu").length > 0 ) {

					var sm = $(this).children(".sub-menu");

					sm.css("left", "-15px");
					sm.css("right", "auto");
					
					var window_width = parseInt($(window).innerWidth());
					var sm_width = parseInt(sm.width());
					var sm_offset_left = parseInt(sm.offset().left);
					var sm_adjust = window_width - sm_width - sm_offset_left;

					if (sm_adjust < 0) {
						sm.css("left", sm_adjust-30 + "px");
						
					}

				}
			});
		}
	}

	magnium_megamenufitwidth();

	// Adjust vertical menu positions
	function magnium_adjustVerticalMenu() {
		if($(window).width() > 767) {
			$('.mgt-mega-menu.mgt-menu-vertical .nav > li.menu-item-multicolumn > .sub-menu').css('width', $('.content-block > .container').width() - $('.mgt-mega-menu.mgt-menu-vertical').width());
		}
	}

	if($('.mgt-mega-menu.mgt-menu-vertical').length > 0) {

		magnium_adjustVerticalMenu();
		
		$(window).resize(function () {
			magnium_adjustVerticalMenu();
		});
		
	}
	
	// Wishlist page style
	$(".wishlist_table .button.add_to_cart").removeClass("alt");

	// WooCommerce tabs click
	$(".woocommerce-tabs ul.tabs li a").unbind('click');

	$(".woocommerce div.product .woocommerce-tabs ul.tabs li a").click(function(e){
		e.preventDefault();
		e.stopPropagation();

		var current_tab_a = $(this);
		var c = current_tab_a.closest(".woocommerce-tabs");
		$("ul.tabs li",c).removeClass("active");

		$("div.panel").first().addClass("active-content");

		$("div.panel.active-content").removeClass("active-content").slideUp();
		$("div.panel#tab-reviews").slideUp();

		$("div"+current_tab_a.attr("href")).addClass("active-content").slideDown();

		current_tab_a.parent().addClass("active");
	});


	// Accordion products tab
	var productTabs = $(".woocommerce div.product .woocommerce-tabs.accordion-tabs li");
	var productTabsContents = $(".woocommerce div.product .woocommerce-tabs.accordion-tabs .panel");

	productTabs.each(function( index ) {
		$(this).after(productTabsContents.get(index));
	});

	// Review form
	$('#product_show_review_form').on('click', function(e){
		$(this).slideUp();
		$('.woocommerce .shop-product #review_form_wrapper').slideDown();
	});

	// Comments form
	$('#blog_show_comment_form').on('click', function(e){
		$(this).slideUp();
		$('#comments-form-wrapper').slideDown();
	});
		
	// Swiper for thumbnails
	$( ".shop-content .thumbnails" ).wrapInner('<div class="swiper-container"></div>');
	$( ".shop-content .thumbnails .swiper-container" ).wrapInner('<div class="swiper-wrapper"></div>');

	$( ".shop-content .thumbnails a" ).wrap('<div class="swiper-slide"></div>');

	$( ".shop-content .thumbnails.horizontal .swiper-container").append('<div class="swipe-arrow-left"></div>');
	$( ".shop-content .thumbnails.horizontal .swiper-container").append('<div class="swipe-arrow-right"></div>');
	$( ".shop-content .thumbnails.vertical").append('<div class="swipe-arrow-down"></div>');

	if ( ($(".woocommerce-page div.product div.thumbnails.columns-6 .swiper-slide").length > 6) || ($(".woocommerce-page div.product div.thumbnails.columns-5 .swiper-slide").length > 5) || ($(".woocommerce-page div.product div.thumbnails.columns-4 .swiper-slide").length > 4) || ($(".woocommerce-page div.product div.thumbnails.columns-3 .swiper-slide").length > 3) ) {

		$(".woocommerce-page div.product div.thumbnails .swiper-container .swipe-arrow-left, .woocommerce-page div.product div.thumbnails .swiper-container .swipe-arrow-right").show();
	}

	if ( ($(".woocommerce-page div.product div.thumbnails.vertical .swiper-slide").length > 3) ) {
		$(".woocommerce-page div.product div.thumbnails.vertical .swipe-arrow-down").show();
	}
	
	var productThumbnailsSwiper = $('.woocommerce-page div.product div.thumbnails.horizontal .swiper-container').swiper({

		mode:'horizontal',
		loop: false,
		slidesPerView: 'auto',
		roundLengths: true,
		calculateHeight: true,
		onFirstInit: function() {
	      $( ".shop-content .thumbnails").show();
	      if($('.cloud-zoom, .cloud-zoom-gallery').data('zoom')) {
	      	$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
	      }
	    }

	});

	var productThumbnailsSwiperVertical = $('.woocommerce-page div.product div.thumbnails.vertical .swiper-container').swiper({

		mode:'vertical',
		loop: true,
		slidesPerViewFit: true,
		slidesPerView: 3,
		calculateHeight: false,

		onFirstInit: function() {
	      $( ".shop-content .thumbnails").show();
	      if($('.cloud-zoom, .cloud-zoom-gallery').data('zoom')) {
	      	$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
	      }
	    }

	});

	// Product thumbs active highlight
	$(".woocommerce .product .thumbnails a").click(function(e) {
		$(".woocommerce .product .thumbnails a").removeClass("active");
		$(this).addClass("active");
	});

	$('.shop-content .thumbnails.horizontal .swiper-container .swipe-arrow-left').on('click', function(e){
		e.preventDefault();
		productThumbnailsSwiper.swipePrev();
	})
	$('.shop-content .thumbnails.horizontal .swiper-container .swipe-arrow-right').on('click', function(e){
		e.preventDefault();
		productThumbnailsSwiper.swipeNext();
	})

	$(".woocommerce .product .thumbnails.vertical .swipe-arrow-down").click(function(e) {
		e.preventDefault();
		productThumbnailsSwiperVertical.swipeNext();
	});

	// Product page Lightbox
	if (typeof prettyPhoto == 'function') { 
	  $(".woocommerce .product .thumbnails a.lightbox").prettyPhoto({hook:"data-rel",show_title: false, social_tools:!1,theme:"pp_woocommerce",horizontal_padding:20,opacity:.8,deeplinking:!1});
	}
	
	$(".shop-content .woocommerce-main-image.lightbox").click(function(e) {

		e.stopPropagation();
		e.preventDefault();

		

		if($(".shop-content .woocommerce-main-image.lightbox.variable-image").length > 0) {

			var variable_image_src = $(".shop-content .woocommerce-main-image.lightbox.variable-image").attr('href');

			$.prettyPhoto.open(variable_image_src,'','');

		} else {

			$(".woocommerce .product .thumbnails .swiper-slide a.lightbox")[$(this).data('counter')-1].click();
		}
		
	});

	$(".woocommerce .product .thumbnails a.lightbox" ).hover(function(e) {
		e.stopPropagation();
		e.preventDefault();

		$(".woocommerce .product .thumbnails a").removeClass("active");
		$(this).addClass("active");

		var attachment_counter = $(this).data('counter');
		
		$(".shop-content .product-main-image-wrapper a").attr("href", $(this).data('zoom-image'));
		$(".shop-content .product-main-image-wrapper a img").attr("src", $(this).data('image'));
		$(".shop-content .product-main-image-wrapper a").data('counter', attachment_counter);

		console.log($(".shop-content .product-main-image-wrapper a").data('counter'));

	});

	// Swiper for product page promo block
	var productUpsellsSwiper = $('.product-page-promo-block .upsells-mini .swiper-container').swiper({

		mode:'horizontal',
		loop: true,
		calculateHeight: true,
		/*slidesPerViewFit: true,*/
		slidesPerView: 1,

		onFirstInit: function() {
	      $( ".product-page-promo-block .upsells-mini").show();
	    }

	});

	$('.product-page-promo-block .upsells-mini .swipe-arrow-left').on('click', function(e){
		e.preventDefault();
		productUpsellsSwiper.swipePrev();
	});
	$('.product-page-promo-block .upsells-mini .swipe-arrow-right').on('click', function(e){
		e.preventDefault();
		productUpsellsSwiper.swipeNext();
	});

	var productRelatedSwiper = $('.product-page-promo-block .related-mini .swiper-container').swiper({

		mode:'horizontal',
		loop: true,
		calculateHeight: true,
		slidesPerView: 1,

		onFirstInit: function() {
	      $( ".product-page-promo-block .related-mini").show();
	    }

	});

	$('.product-page-promo-block .related-mini .swipe-arrow-left').on('click', function(e){
		e.preventDefault();
		productRelatedSwiper.swipePrev();
	});
	$('.product-page-promo-block .related-mini .swipe-arrow-right').on('click', function(e){
		e.preventDefault();
		productRelatedSwiper.swipeNext();
	});

	// Offcanvas menu
	function magnium_offCanvasMenuInit() {
		$( ".st-menu" ).wrapInner('<div class="nano"></div>');
		$( ".st-menu .nano" ).wrapInner('<div class="nano-content"></div>');

		$(".st-menu .nano").nanoScroller();

		$("html").addClass('offcanvasmenu');

		var wp_adminbar_height = 0;

		if($("#wpadminbar").length > 0) {
			wp_adminbar_height = $("#wpadminbar").height();
		}

		$("html.offcanvasmenu .st-content-inner").css("margin-top", wp_adminbar_height);

		var container = $('#st-container'),
		buttons = $("#st-trigger-effects > button"),
		// event type (if mobile use touch events)
		eventtype = mobilecheck() ? 'touchstart' : 'click',
		resetMenu = function() {
			$(container).removeClass("st-menu-open");
			$("html").removeClass('offcanvasmenu-open');
			setTimeout( function() {
				$('.sg_widget_custom_box_left').fadeIn();
			}, 1000 );
			
		},
		bodyClickFn = function(evt) {
		
			if( !hasParentClass( evt.target, 'st-menu' ) ) {
				resetMenu();
				$("html").unbind( eventtype, bodyClickFn );
			}
			if( hasParentClass( evt.target, 'st-menu-close-btn' )) {
				resetMenu();
				$("html").unbind( eventtype, bodyClickFn );
			}
		};

		buttons.each( function( i ) {

			var el = $( this );

			var effect = el.attr( 'data-effect' );

			el.bind( eventtype, function( ev ) {
				ev.stopPropagation();
				ev.preventDefault();
				container.attr('class', 'st-container');// clear
				container.addClass(effect);
				$("html").addClass('offcanvasmenu-open');
				$('.sg_widget_custom_box_left').fadeOut();
				setTimeout( function() {
					container.addClass('st-menu-open');
				}, 25 );
				$("html").bind( eventtype, bodyClickFn );
			});
		} );
	}

	function magnium_offCanvasSidebarInit() {
		$( ".st-sidebar-menu" ).wrapInner('<div class="nano"></div>');
		$( ".st-sidebar-menu .nano" ).wrapInner('<div class="nano-content"></div>');

		$(".st-sidebar-menu .nano").nanoScroller();
		
		$("html").addClass('offcanvassidebar');

		var wp_adminbar_height = 0;

		if($("#wpadminbar").length > 0) {
			wp_adminbar_height = $("#wpadminbar").height();
		}

		$("html.offcanvassidebar .st-sidebar-content-inner").css("margin-top", wp_adminbar_height);

		var container = $('#st-container'), //-sidebar
		buttons = $("#st-sidebar-trigger-effects > a"),
		// event type (if mobile use touch events)
		eventtype = mobilecheck() ? 'touchstart' : 'click',
		resetMenu = function() {
			$(container).removeClass("st-sidebar-menu-open");
			$("html").removeClass('offcanvassidebar-open');
		},
		bodyClickFn = function(evt) {
	
			if( !hasParentClass( evt.target, 'st-sidebar-menu' ) ) {
				resetMenu();
				$("html").unbind( eventtype, bodyClickFn );
			}
			if( hasParentClass( evt.target, 'st-sidebar-menu-close-btn' )) {
				resetMenu();
				$("html").unbind( eventtype, bodyClickFn );
			}
		};

		buttons.each( function( i ) {

			var el = $( this );

			var effect = el.attr( 'data-effect' );

			el.bind( eventtype, function( ev ) {
				ev.stopPropagation();
				ev.preventDefault();
				container.attr('class', 'st-sidebar-container');// clear
				container.addClass(effect);
				$("html").addClass('offcanvassidebar-open');
				setTimeout( function() {

					container.addClass('st-sidebar-menu-open');
				}, 25 );
				$("html").bind( eventtype, bodyClickFn );
			});
		} );

	}

	if($("#st-trigger-effects").length > 0) {
		$( "body" ).wrapInner('<div id="st-container" class="st-container"></div>');
		$( ".st-container" ).wrapInner('<div class="st-pusher"></div>');
		$( ".st-pusher" ).wrapInner("<div class='st-content'></div>");
		$( ".st-content" ).wrapInner("<div class='st-content-inner'></div>");

		$( ".st-menu" ).insertBefore($(".st-pusher"));

		magnium_offCanvasMenuInit();
	}

	if($("#st-sidebar-trigger-effects").length > 0) {

		if($("#st-trigger-effects").length > 0) {

			$("#st-container").addClass("st-sidebar-container");
			$(".st-pusher").addClass("st-sidebar-pusher");
			$(".st-content").addClass("st-sidebar-content");
			$(".st-content-inner").addClass("st-sidebar-content-inner");

			$( ".st-sidebar-menu" ).insertBefore($(".st-sidebar-pusher"));

		} else {
			$( "body" ).wrapInner('<div id="st-container" class="st-sidebar-container"></div>');
			$( ".st-sidebar-container" ).wrapInner('<div class="st-sidebar-pusher"></div>');
			$( ".st-sidebar-pusher" ).wrapInner("<div class='st-sidebar-content'></div>");
			$( ".st-sidebar-content" ).wrapInner("<div class='st-sidebar-content-inner'></div>");

			$( ".st-sidebar-menu" ).insertBefore($(".st-sidebar-pusher"));
		}

		magnium_offCanvasSidebarInit();
	}
	
	// WPML Switchers
	var wpmlLangOpened = false;

	$('.wpml-lang #lang_sel ul li').click(
		function() {
			if(wpmlLangOpened == false) {
				$('.wpml-lang #lang_sel ul li ul').css('visibility', 'visible');
				wpmlLangOpened = true;
			} else {
				$('.wpml-lang #lang_sel ul li ul').css('visibility', 'hidden');
				wpmlLangOpened = false;
			}
		}
	);

	$(".wpml-lang #lang_sel ul ul").hover(
		function() {
		
		}, function() {
			$('.wpml-lang #lang_sel ul li ul').css('visibility', 'hidden');
			wpmlLangOpened = false;
		}
	);
	
	// Toggle Search behavior
	var toggledSearch = false;

	$('.search-bar-toggle input[type="text"],.search-bar-toggle input[type="search"]').val('');

	$('.search-bar-toggle input[type="submit"],.search-bar-toggle input[type="button"]').click(function(){
		
		if($('.search-bar-toggle input[type="text"],.search-bar-toggle input[type="search"]').val() == '') {
			if(toggledSearch == false) {
				$('.search-bar-toggle input[type="text"],.search-bar-toggle input[type="search"]').fadeIn();
				toggledSearch = true;
			}
			else {
				$('.search-bar-toggle input[type="text"],.search-bar-toggle input[type="search"]').val('');

				$('.search-bar-toggle input[type="text"],.search-bar-toggle input[type="search"]').fadeOut();
				
				toggledSearch = false;
			}
			
			return false;
		}
	});

	if($(window).width() > 767) {
		$('#mega_main_menu.left ul > li.submenu_full_width > .mega_dropdown').css('width', $('.content-block > .container').width() - $('.main-left-menu-place').width() + 30);
		$('#mega_main_menu.left ul > li.submenu_full_width > .mega_dropdown').css('width', $('.content-block > .container-fluid').width() - $('.main-left-menu-place').width() + 30);
	}

	var menu_hover_link_color = '';
	var menu_link_color = $(".navbar .nav > li > a").css('color');
	var menu_hover_bg = '';
	
/**
*	Scroll functions
*/
$(window).scroll(function () {
		
		var scrollonscreen = $(window).scrollTop() + $(window).height();
		
		// Scroll to top function
		if(scrollonscreen > $(window).height() + 350){
			$('#top-link').css("bottom", "22px");
		}
		else {
			$('#top-link').css("bottom", "-60px");
		}

});

// WooCommerce 2.3 QTY buttons back
// Quantity buttons
$( '.woocommerce .shop-product .summary div.quantity:not(.buttons_added), .woocommerce .shop-product .summary td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );

$('.woocommerce .shop-product .summary .input-text.qty').attr('type', '');

$( document ).on( 'click', '.plus, .minus', function() {

	// Get values
	var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
		currentVal	= parseFloat( $qty.val() ),
		max			= parseFloat( $qty.attr( 'max' ) ),
		min			= parseFloat( $qty.attr( 'min' ) ),
		step		= $qty.attr( 'step' );

	// Format values
	if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
	if ( max === '' || max === 'NaN' ) max = '';
	if ( min === '' || min === 'NaN' ) min = 0;
	if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

	// Change the value
	if ( $( this ).is( '.plus' ) ) {

		if ( max && ( max == currentVal || currentVal > max ) ) {
			$qty.val( max );
		} else {
			$qty.val( currentVal + parseFloat( step ) );
		}

	} else {

		if ( min && ( min == currentVal || currentVal < min ) ) {
			$qty.val( min );
		} else if ( currentVal > 0 ) {
			$qty.val( currentVal - parseFloat( step ) );
		}

	}

	// Trigger change event
	$qty.trigger( 'change' );
});

// Sticky header
function magnium_stickyHeaderWorker() {
	// Sticky header
	if(isTouchDevice()==false) {

		var scrolltop = $(document).scrollTop();
	
		if((scrolltop > ($(window).height()/2))) {

			if((header_hided == 1) && (header_fixed = 1)) {
				header_fixed = 0;
			}

			if(header_fixed == 0) {

				header_fixed = 1;

				$("header.sticky-header").addClass('fixed');

				$("header.sticky-header .col-md-12").css("height", 50);

				$("header.sticky-header").css("top", -50 + wp_adminbar_height);
				
				$("header.sticky-header").css("top", wp_adminbar_height);
					
				if($("header.sticky-header .mainmenu-belowheader").length > 0) {

					$(".header-menu-bg").css("margin-bottom", header_original_height+$("header.sticky-header .mainmenu-belowheader").height());
				} else {
					$(".header-menu-bg").css("margin-bottom", header_original_height);
				}

			}

		} else {

			if(header_fixed == 1) {

				$("header.sticky-header").css("top", -90 - wp_adminbar_height);

				header_hided = 1;

				if((scrolltop < ($(window).height()/2) -100)) {

					$("header.sticky-header").removeClass('fixed');
					$(".header-menu-bg").css("margin-bottom", 0);
					$("header.sticky-header .col-md-12").css("height", header_original_height);

					header_fixed = 0;
					header_hided = 0;

				}
			}
			
		}

	} 
}

if($("header.sticky-header").length > 0) {
	if($(window).width() > 767) {

		var header_fixed = 0;
		var header_original_height = $("header.sticky-header .col-md-12").height();
		var header_menu_bg_original_height= $(".header-menu-bg").height()
		var header_mainmenu_belowheader_height = 0;
		var wp_adminbar_height = 0;
		var header_hided = 0;

		if($("header.sticky-header .mainmenu-belowheader").length > 0) {
			header_mainmenu_belowheader_height = $("header.sticky-header .mainmenu-belowheader").height();
		} else {
			header_mainmenu_belowheader_height = 0;
		}

		if($("#wpadminbar").length > 0) {
			wp_adminbar_height = $("#wpadminbar").height();
		}

		$("header.sticky-header").css("top", -90 - wp_adminbar_height);

		// Run first time
		
		magnium_stickyHeaderWorker();	
		
		// Run on scroll
		$(window).scroll(function () {
			
			magnium_stickyHeaderWorker();
			
		});

	}

}

//scroll up event
$('#top-link').click(function(){
	$('body,html').stop().animate({
		scrollTop:0
	},800,'easeOutCubic')
	return false;
});


/**
*	Resize events
*/

	$(window).resize(function () {
		
	});

/**
*	Other scripts
*/


/**
* Social share for products
*/

$( ".post-social-wrapper" ).hover(
	function() {
		$('.post-social').fadeIn();
	}, function() {
		$('.post-social').fadeOut();
	}
);

function magnium_facebookShare(){
	window.open( 'https://www.facebook.com/sharer/sharer.php?u='+window.location, "facebookWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
	return false;
}
function magnium_googlePlusShare(){
	window.open( 'https://plus.google.com/share?url='+window.location, "googleplusWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
	return false;
}
function magnium_twitterShare(){
	if($(".section-title h1").length > 0) {
		var $page_title = encodeURIComponent($(".portfolio-item-title h1").text());
	} else {
		var $page_title = encodeURIComponent($(document).find("title").text());
	}
	window.open( 'http://twitter.com/intent/tweet?text='+$page_title +' '+window.location, "twitterWindow", "height=370,width=600,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
	return false;
}
function magnium_pinterestShare(){
	var $sharingImg;

	if($('.attachment-shop_single').length > 0) {
		$sharingImg = $('.attachment-shop_single').first().attr('src'); 
	}

	if($('.porftolio-slider li img').length > 0) {
		$sharingImg = $('.porftolio-slider li img').first().attr('src'); 
	}
	
	if($(".section-title h1").length > 0) {
		var $page_title = encodeURIComponent($(".portfolio-item-title h1").text());
	} else {
		var $page_title = encodeURIComponent($(document).find("title").text());
	}
	
	window.open( 'http://pinterest.com/pin/create/button/?url='+window.location+'&media='+$sharingImg+'&description='+$page_title, "pinterestWindow", "height=620,width=600,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
	return false;
}
if( $('a.facebook-share').length > 0 || $('a.twitter-share').length > 0 || $('a.pinterest-share').length > 0 || $('a.googleplus-share').length > 0)  {
	
	$('.facebook-share').click(magnium_facebookShare);
	
	$('.twitter-share').click(magnium_twitterShare);

	$('.pinterest-share').click(magnium_pinterestShare);

	$('.googleplus-share').click(magnium_googlePlusShare);
	
}
// Common functions
function hasParentClass( e, classname ) {
	if(e === document) return false;

	if( $( e ).hasClass( classname ) ) {
		return true;
	}
	if( $( e ).parents().hasClass( classname ) ) {
		return true;
	}
}

// http://coveroverflow.com/a/11381730/989439
function mobilecheck() {
	var check = false;
	(function(a){if(/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
	return check;
}
	
});
})(jQuery);