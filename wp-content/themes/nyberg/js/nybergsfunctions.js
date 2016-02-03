jQuery(document).ready(function ($) {
    function alignMenuItems(parent, trimmed) {
        trimmed = trimmed || false;
        var totEltWidth = 0;
        //alert($($('ul#nyberg-nav-menu')[0]).width());
        var menuWidth = parent.width();

        var availableWidth = 0;
        var space = 0;

        var elts = parent.children();
        elts.each(function (inx, elt) {
            // reset paddding to 0 to get correct offsetwidth
            $(elt).css('margin-left', '0px');
            $(elt).css('margin-right', '0px');

            totEltWidth += $(elt).outerWidth();
            //alert($(elt).width());
        });

        availableWidth = menuWidth - totEltWidth;
        var isMSIE = /*@cc_on!@*/0;
        var isIE11 = !!navigator.userAgent.match(/Trident.*rv[ :]?11\./)

        if (isMSIE || isIE11) {
            space = (availableWidth / (elts.length) - 3);
            if (trimmed) {
                availableWidth = availableWidth + (space);
                space = Math.floor(availableWidth / (elts.length) - 3);
            }
        }
        else {
            space = (availableWidth / (elts.length) - 3);
            if (trimmed) {
                availableWidth = availableWidth + (space);
                space = Math.floor(availableWidth / (elts.length) - 3);
            }
        }

        elts.each(function (inx, elt) {
            if (!(trimmed && inx == 0)) {
                $(elt).css('margin-left', Math.floor((space / 2)) + 'px');
            }
            if (!(trimmed && inx == elts.length - 1)) {
                $(elt).css('margin-right', Math.floor((space / 2)) + 'px');
            }
        });
    };

    $(window).load(function () {
        setTimeout(function () {
            //alignMenuItems($('#nyberg-bilknappar-div'), true);
            alignMenuItems($('#nyberg-bilknappar-footer-div'), true);

        }, 1000);
        //Desktop
        if ($(window).width() < 1300) {
            var menylength = $('#nyberg-nav-menu').children().length - 3;
            do {
                $('#nyberg-nav-menu').children().eq(menylength).find('.sub-menu').eq(0).addClass('leftymenu');
                $('#nyberg-nav-menu').children().eq(menylength).find('.sub-menu').eq(1).addClass('leftymenu2');
                menylength++;
            }
            while (menylength < $('#nyberg-nav-menu').children().length);
        }

        if ($(window).width() > 980) {
            alignMenuItems($('#nyberg-nav-menu'));
            $('.specialmenu_container').each(function () {
                a++;
                if (a % 2 == 0) {
                    $(this).css("margin-left", "20px");
                }
            });

            $('.columns').each(function () {
                var children = $(this).find('.column3');
                var tallest = 0;
                children.each(function () {
                    if ($(this).height() > tallest) {
                        tallest = $(this).height();
                    }
                });
                children.css('min-height', tallest + 3);
            });

        }
        else {
            //iphone
            if ($(window).width() < 400) {
                //Om de ej finns slidertext
                if ($(".sliderContainer .text").length == 0) {
                    //$("#page #masthead").css("height", "180px");
                    $("#masthead .slides .headslide").css("height", "180px");
                }
                //$(".nyberg-undersida-header-plug-container").css("bottom", "260px");
            }
            else {
                //telefon bredare än 400
                //Om de ej finns slidertext
                if ($(".sliderContainer .text").length == 0) {
                    // $("#page #masthead").css("height", "190px");
                    //$("#masthead .slides .headslide").css("height", "190px");
                    //$(".nyberg-undersida-header-plug-container").css("bottom", "230px");
                }
                else {
                    //adds greyspace on responsive when all slides doesnt have text
                    $(".sliderContainer").each(function () {
                        $(this).find('.notext').addClass('fixresp');
                    })
                }
            }

            $('<form action="/" method="get"><input class="nyberg-search-input hiddendesktop" type="text" name="s" placeholder="Sök" id="search" value=""></form>').appendTo($("#nyberg-nav-menu"));
            $('#nyberg-bilknappar-div a').css('margin-left', '5px').css('margin-right', '5px');
            $("#nyberg-nav-menu > li > a").siblings().siblings().each(function () {
                var copy = $(this).clone().prependTo($(this).siblings());
                copy.wrap(jQuery("<li/>"));
            });
            $("#nyberg-nav-menu > li > a").click(function (event) {
                if ($(window).width() < 980) {
                    if ($(this).parent().hasClass("menu-item-has-children")) {
                        event.preventDefault();
                    }
                }
            });


            var search = $('.nyberg-search-plug').parent();

            $('<div class="nyberg-middle-plugs show-car"><div class="plug" id="showbutton"><img class="plug-image" src="http://nybergs.webbplatser.cms.bytbil.com/wp-content/themes/nyberg/images/icon-bilar.png"><div class="plug-white">Sök bil</div><div class="plug-marker"></div></div></div>').prependTo(search);
            $('#showbutton').click(function () {
                $('.nyberg-search-plug').show();
                $('.nyberg-middle-plugs').hide();
            });


        }
    });

    $('.Checked-field').removeClass("ninja-forms-req");

    $('.Checked-field').parent().hide();
    $('.Checked-box').on('change', function () {
        if ($(this).is(':checked')) {
            $('.Checked-field').fadeIn();
            $('.Checked-field').parent().fadeIn();
        }
        else {
            $('.Checked-field').removeClass("ninja-forms-req");
            $('.Checked-field').fadeOut();
            $('.Checked-field').parent().fadeOut();
        }
    });

    var a = 0;

//infinite scroll objekt
    $('#allabilar').waypoint('infinite', {
        items: '#allabilar',
        more: '#next',
        offset: 'bottom-in-view',
        onBeforePageLoad: $.noop,
        onAfterPageLoad: $.noop
    });

//fix for link to car in contactform
    $("#ninja_forms_field_22_div_wrap #ninja_forms_field_22").val(window.location.href);
    $("#ninja_forms_field_38_div_wrap #ninja_forms_field_38").val(window.location.href);

    $(".specialMenu li ul li").parent().parent().each(function () {
        $(this).addClass('specialmenusubarrow');
    });


    $('.plug-row.pl3').each(function () {
        var children = $(this).find('.bread');
        var tallest = 0;
        children.each(function () {
            if ($(this).height() > tallest) {
                tallest = $(this).height();
            }
        });
        children.css('min-height', tallest);
    });

    $('.plug-row.pl1').find('.colspan1').each(function () {
        var children = $(this).find('.bread');
        var tallest = 0;
        children.each(function () {
            if ($(this).height() > tallest) {
                tallest = $(this).height();
            }
        });
        children.css('min-height', tallest);
    });


    $(window).resize(function () {
        if ($(window).width() < 1300) {
            var menylength = $('#nyberg-nav-menu').children().length - 3;
            do {
                $('#nyberg-nav-menu').children().eq(menylength).find('.sub-menu').eq(0).addClass('leftymenu');
                $('#nyberg-nav-menu').children().eq(menylength).find('.sub-menu').eq(1).addClass('leftymenu2');
                menylength++;
            }
            while (menylength < $('#nyberg-nav-menu').children().length);
        }
        else {
            var menylength = $('#nyberg-nav-menu').children().length - 3;
            do {
                $('#nyberg-nav-menu').children().eq(menylength).find('.sub-menu').eq(0).removeClass('leftymenu');
                $('#nyberg-nav-menu').children().eq(menylength).find('.sub-menu').eq(1).removeClass('leftymenu2');
                menylength++;
            }
            while (menylength < $('#nyberg-nav-menu').children().length);
        }

        if ($(window).width() > 980) {


            //setTimeout(function() {
            //alignMenuItems($('#nyberg-nav-menu')); }, 1000
            //  );

            $('.columns').each(function () {
                var children = $(this).find('.column3');
                var tallest = 0;
                children.each(function () {
                    if ($(this).height() > tallest) {
                        tallest = $(this).height();
                    }
                });
                children.css('min-height', '0');
            });
            if ($(".sliderContainer .text").length == 0) {
                $("#page #masthead").css("height", "");
                $(".nyberg-undersida-header-plug-container").css("bottom", "");
            }
        }
        else if ($(window).width() < 400) {
            if ($(".sliderContainer .text").length == 0) {
                //$("#page #masthead").css("height", "180px");
                $("#masthead .slides .headslide").css("height", "180px");
            }
        }
        else {
            if ($(".sliderContainer .text").length == 0) {
                //$("#page #masthead").css("height", "190px");
                //$("#masthead .slides .headslide").css("height", "190px");
            }
        }

        alignMenuItems($('#nyberg-bilknappar-div'), true);
        alignMenuItems($('#nyberg-bilknappar-footer-div'), true);
        $('.facebook-iframe-widget > span').css({'width': '100%'});
    });

    if (window.navigator.userAgent.indexOf('Firefox/30') !== -1) {
        $('select').css({
            'background': 'transparent',
        });
    }
});