$(function () {
    var viewportWidth = $(window).width();

    /* Sticky navigation */
    /*------------------------------------------------*/

    if (viewportWidth > '768') {
        $('.navbar .dropdown ul .dropdown').hover(function () {
            $(this).find('.dropdown-menu').first().stop(false, false).fadeIn('fast');
        }, function () {
            $(this).find('.dropdown-menu').first().stop(false, false).fadeOut('fast');
        });

        var sticky_navigation_offset_top = $('#menu').offset().top;

        var sticky_navigation = function () {
            var scroll_top = $(window).scrollTop();

            if (scroll_top > sticky_navigation_offset_top) {
                $('#menu').css({
                    'z-index': '999999',
                    'position': 'fixed',
                    'top': 0,
                    'left': 0,
                    'border-bottom': '1px solid #ccc',
                    'width': '100%'
                });
                $('.push-down-admin-menu #menu').css({'top': '70px'});
                $('#menu ul li').addClass('scrolled-current');
            } else {
                $('#menu').css({'position': 'relative', 'border-bottom': '0px'});
                $('.push-down-admin-menu #menu').css({'top': '0px'});
                $('#menu ul li').removeClass('scrolled-current');
            }
        };

        sticky_navigation();

        $(window).scroll(function () {
            sticky_navigation();
        });

        $('a[href="#"]').click(function (event) {
            event.preventDefault();
        });

        $('a[href*="wp-content/themes/biva/biva-kampanj"]').each(function () {
            $(this).addClass('colorbox-kampanj');
        });

    }


    /* Backdrop adjustments */
    /*------------------------------------------------*/

    var iHeight = window.screen.height;
    if (iHeight <= 480) {
        $('#backdrop img').css('max-height', '150px !important');
    }
    else if (iHeight > 480 && iHeight <= 960) {
        $('#backdrop img').css('max-height', '170px !important');
    }


    /* Expandable blocks */
    /*------------------------------------------------*/

    $(".expandable h3").click(function () {
        var showGroup = $(this).parent("div").attr("data-expand");
        $("." + showGroup).slideToggle();
        $(this).parent("div").toggleClass("closed");
        $(this).parent("div").toggleClass("opened");
    });


    /* Contact form code */
    /*------------------------------------------------*/

    $("select[name='regarding']").change(function() {
        if($(this).val() == "Boka service") {
            window.location.href = "/aga-bil/boka-service/";
        }
    });

    /* Testdrive code */
    /*------------------------------------------------*/

    var locations = [];
    locations["Borlänge"]   = ["Opel","Kia"];
    locations["Falun"]      = ["BMW","Kia"];
    locations["Karlskoga"]  = ["Opel","Chevrolet","Subaru"];
    locations["Linköping"]  = ["Opel","Nissan"];
    locations["Norrköping"] = ["Opel","Nissan","Chevrolet","Fiat","Jeep"];
    locations["Uppsala"]    = ["Opel","Chevrolet","Mitsubishi"];
    locations["Örebro"]     = ["Opel","Chevrolet","Fiat","Jeep","Alfa Romeo","Lancia","Isuzu"];

    // Enable only brands that are available for the selected location
    $("select[name='location']").change(function() {

        if($(this).find("option:first-child").is(":selected")) {
            $("select[name='brand'] option").attr("disabled",false);
        } else {
            var current_location = $(this).val();

            $("select[name='brand'] option:not(:first)").each(function () {
                $(this).attr("disabled", true);
                if (locations[current_location].indexOf($(this).val()) != -1) {
                    $(this).attr("disabled", false);
                }
            });
        }
    });

    // Enable only locations that are available for the selected brand
    $("select[name='brand']").change(function() {

        if($(this).find("option:first-child").is(":selected")) {
            $("select[name='location'] option").attr("disabled",false);
        } else {
            var current_brand = $(this).val();

            $("select[name='location'] option:not(:first)").each(function () {
                $(this).attr("disabled", true);
                if(locations[$(this).val()].indexOf(current_brand) != -1) {
                    $(this).attr("disabled", false);
                }
            });
        }
    });

});
