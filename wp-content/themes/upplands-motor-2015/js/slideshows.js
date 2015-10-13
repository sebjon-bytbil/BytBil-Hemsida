(function($){
    "use strict";
    function animate_slideshow(slider, when, animationspeed) {
        var current_caption = $(slider).find('.flex-active-slide .caption');
        var animation = $(current_caption).data('animation');

        if (when === 'start' || when === 'after') {

            if (animation === 'fade') {
                $(current_caption).delay(200).css({
                    "transition": "opacity ease-in " + (animationspeed + 200) + "ms",
                    "opacity": 1,
                });
            } else if (animation === 'left' || animation === 'right') {
                $(current_caption).delay(200).css({
                    "transition": "left ease-out " + (animationspeed + 200) + "ms",
                    "left": "0",
                });
            }
        } else if (when === 'before') {
            if (animation === 'fade') {
                $(current_caption).delay(200).css({
                    "opacity": 0,
                });
            } else if (animation === 'left' || animation === 'right') {
                if (animation === 'left') {
                    $(current_caption).delay(200).css({
                        "transition": "left ease-in " + (animationspeed + 200) + "ms",
                        "left": "-100%",
                    });
                }
                if (animation === 'right') {
                    $(current_caption).delay(200).css({
                        "transition": "left ease-in " + (animationspeed + 200) + "ms",
                        "left": "200%",
                    });
                }
            }
        }
    }

    $(document).ready(function () {
        var slides = $('[data-slideshow="slider"]');

        slides.each(function(){

            var slideshow   = $(this),
            id 				= slideshow.data("id"),
            animationspeed 	= slideshow.data("animationspeed"),
            animation 		= slideshow.data("animation"),
            speed 			= slideshow.data("speed"),
            arrows 			= slideshow.data("arrows"),
            controls 		= slideshow.data("controls"),
            thumbnailsize 	= slideshow.data("thumbnailsize");

            if (controls === 'thumbs') {
                $('#carousel-' + id).flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: true,
                    keyboard: true,
                    slideshow: true,
                    itemWidth: thumbnailsize,
                    itemMargin: 0,
                    asNavFor: '#slideshow-' + id,
                });
            }

            var sliderData = {
                animation: animation,
                direction: "horizontal",
                slideshowSpeed: speed,
                animationSpeed: animationspeed,
                pauseOnHover: true,
                directionNav: arrows,
                touch: true,
                useCSS: true,
                smoothHeight: false,
                slideshow: true,
                keyboard: true,
                start: function (slider) {
                    animate_slideshow(slider, 'start', animationspeed);
                },
                after: function (slider) {
                    animate_slideshow(slider, 'after', animationspeed);
                },
                before: function (slider) {
                    animate_slideshow(slider, 'before', animationspeed);
                }
            };

            if (controls === 'thumbs') {
                sliderData.sync = '#carousel-' + id;
                sliderData.controlNav =  false;
                sliderData.animationLoop = true;
            } else {
                sliderData.controlNav = true;
                sliderData.animationLoop = true;
            }
            slideshow.flexslider(sliderData);
        });

        var otherSlides = $('[data-slideshow="offerslider"], [data-slideshow="modelslider"], [data-slideshow="otherslider"]');

        otherSlides.each(function(){

            $(this).flexslider({
                animation: "fade",
                direction: "horizontal",
                slideshowSpeed: 6000,
                animationSpeed: 600,
                pauseOnHover: true,
                directionNav: true,
                touch: true,
                useCSS: true,
                smoothHeight: false,
                slideshow: true,
                keyboard: true,
                start: function (slider) {
                    animate_slideshow(slider, 'start', 400);
                },
                after: function (slider) {
                    animate_slideshow(slider, 'after', 400);
                },
                before: function (slider) {
                    animate_slideshow(slider, 'before', 400);
                },
            });

        });

    });
})(jQuery);
