jQuery(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        direction: "horizontal",
        slideshowSpeed: 4000,
        animationSpeed: 600,
        pauseOnHover: true,
        useCSS: true,
        touch: true,
        controlNav: true,
        directionNav: true
    });
});

function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
}

(function ($) {
    var handleResizeForMenu = function () {
        if (isIE() > 9) {
            var responsive = matchMedia("(max-width: 768px)").matches;

            if (responsive) {
                if (!$('#menu-huvudmeny').hasClass('touch')) {
                    $('#menu-huvudmeny').addClass('touch');
                }
            } else {
                $('#menu-huvudmeny').removeClass('touch');
            }
        }
    };

    $(document).ready(function () {
        handleResizeForMenu();
        window.addEventListener('resize', handleResizeForMenu);
        $(document).on("click", ".touch > li > a", function (e) {
            e.preventDefault();

            if ($(e.target).data('toggle') !== undefined) {
                return;
            }

            $(this).siblings('ul').slideToggle();
        });

        var dupl = $('#menu-huvudmeny > .menu-item-has-children');

        dupl.each(function () {
            var link = $(this).children('a');
            var a = document.createElement('a');

            $(a).prop('href', $(link[0]).prop('href'));
            $(a).text($(link[0]).text());
            $(a).addClass('visible-xs');

            var li = document.createElement('li');
            $(li).append(a);
            $(this).children('ul').eq(0).prepend(li);
        });
    });
}(jQuery));
