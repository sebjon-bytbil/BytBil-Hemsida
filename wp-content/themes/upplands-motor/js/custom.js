/* Dropdown Menu
$(function () {
    $(".dropdown-menu > li > a.trigger").on("click", function (e) {
        var current = $(this).next();
        var grandparent = $(this).parent().parent();
        grandparent.find(".sub-menu:visible").not(current).hide();
        current.toggle();
        e.stopPropagation();
    });

    $(".dropdown-menu > li > a:not(.trigger)").on("click", function () {
        var root = $(this).closest('.dropdown');
        root.find('.left-caret').toggleClass('right-caret left-caret');
        root.find('.sub-menu:visible').hide();
    });
});
 */

function bootstrapAngular($el){
    if ($el.hasClass('ng-scope')) return;

    //get clean dom
    var el = $el[0];
    //bootstrap angular module ElasticAccess
    angular.bootstrap(el, ['ElasticAccess']);

    // remember to add flag for window location hash blocker!
}

(function($){


    var screen_width = window.innerWidth;
    var screen_height = window.innerHeight;

    $(function () {

        $(window).scroll(function (event) {

            if ($(this).scrollTop() > 240) {
                $('#scroll-to-top').addClass('show-button');
            } else {
                $('#scroll-to-top').removeClass('show-button');
            }
        });
        
        $('#scroll-to-top').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

    });    
    


    // X-Small Devices
    if (screen_width < 768) {
        $(".panel-collapse.in").collapse("toggle");

        $(function () {

            var lastScrollTop = 0;
            var headerHeight = $('#main-nav').outerHeight();

            $(window).scroll(function (event) {

                var st = $(this).scrollTop();

                if (st > lastScrollTop + headerHeight) {
                    $('#main-nav').addClass('hide-header');
                    $('.submenu-wrapper').addClass('stick-top');

                } else {
                    $('#main-nav').removeClass('hide-header');
                    $('.submenu-wrapper').removeClass('stick-top');
                }

                lastScrollTop = st;
            });
        });

    }
    // Small Devices
    else if (screen_width > 768 && screen_width < 992) {}
    // Large Devices
    else if (screen_width > 998 && screen_width < 1199) {}
    // X-Large Devices
    else {}

    $('.ElasticAccess').each(function(){
        
        bootstrapAngular($(this));
    });

})(jQuery)