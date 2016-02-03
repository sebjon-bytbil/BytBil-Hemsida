jQuery(document).ready(function($) {
    isMobileView = false;

    // Mobile gallery
    $('#mobileGallerySlides').flexslider({
        controlNav: false,
        slideshow: false,
        touch: true
    });

    // Desktop gallery
    $.getScript('http://www.mazda.se/js/mazda-carousel.js', function(){

        $('#gallery .carousel').each(function(i) {
            if (i > 0) {
                $(this).css('opacity', '0');
            }
        });

        $('#gallery .carousel').mazdaCarousel({
            circular: false,
            visible: 1,
            speed: 500,
            arrows: true,
            bullets: true,
            beforeStart: function(el) {
                $('.description', el).fadeOut(150);
            },
            afterEnd: function(el) {
                $('.description', el).fadeIn(350);
            }
        });

        $('#gallery .containers').height($('#gallery .carousel').height());
        positionGalleryCarousel();
        $(window).resize(positionGalleryCarousel);

        function positionGalleryCarousel() {
            var marginWidth = ($(window).width() - 905) / 2;
            $('#gallery .carousel ul').css({ 'margin-left': (marginWidth - 26) - 8 + 'px' });
            $('#gallery .carousel #next').css({ 'right': (marginWidth < 43) ? -8 : (marginWidth - 26) + 'px' });
            // 960 + 43 = 1003
            // visible width across most browsers @ 1024 x 768
            $('#gallery .carousel #prev').css({ 'left': (marginWidth < 43) ? -8 : (marginWidth - 26) + 'px' });
            $('#gallery .carousel .carousel-bullets').css({ 'right': (marginWidth < 43) ? 15 : (marginWidth) + 'px' });
        };

        $('.tab').unbind('click').click(function () {
            showTab($(this).attr('id'));
        });

        function showTab(id) {
            $('#gallery .carousel').fadeTo(150, 0, function() {
                $(this).css('z-index', '1');
                $('.tabs .active').removeClass('active');
                $('#' + id).addClass('active');
                $('#' + id.replace('tab', 'carousel')).css('z-index', '2').fadeTo(350, 1, function() {
                    $('li:first .description', $(this)).fadeIn(350);
                });
            });
        };

        var id;
        for (key in galleryArray) {
            if (galleryArray.hasOwnProperty(key))  {
                id = key.toString();
                break;
            }
        }
        var split = id.split('_');
        var tab = split[0] + '_tab';
        showTab(tab);
    });
});
