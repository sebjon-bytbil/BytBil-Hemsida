jQuery(function($) {

    $("body").prepend("<div class='dimmer'></div>");

    var scrollPos = $(window).scrollTop();
    var distance = $(document).height() - (scrollPos + window.innerHeight) - 125;
    $(window).scroll(function() {
        scrollPos = $(window).scrollTop();
        distance = $(document).height() - (scrollPos + window.innerHeight) - 125;
    });

    function checkToTop() {
        if( (window.innerHeight) < ($(document).height()-400) ) {
            if(distance <= 50 || scrollPos > 900) {
                $("#btn-totop").fadeIn();
            } else {
                $("#btn-totop").fadeOut();
            }
        }
    }

    function checkHeader() {
        if( $(window).width() > 991 && (window.innerHeight) < ($(document).height()-250) ) {
            if(scrollPos > 108 ) {
                $("#header").css("position", "fixed");
                $("#header #header-default").hide();
                $("#header-mini").css("max-width", "100%");
                $("#header #header-mini").slideDown();
                $("body").css("padding-top", "151px");
            } else if(scrollPos < 108) {
                $("#header").css("position", "relative");
                $("#header #header-mini").hide();
                $("#header #header-default").show();
                $("body").css("padding-top", "0px");
            }
        }
    }

    function switchPlace(first,second) {
        $(first).before( $(second) );
        $(second).after( $(first) );
    }

    // Move slideshow from content block to top panorama
    $(".slideshow").appendTo(".slider");

    // Move image with class "panorama" to top panorama
    $(".panorama").parent("p").appendTo(".slider");
    $(".slider").css("background-color", $(".panorama").css("background-color"));

    function checkMovables() {
        /*if( $(window).width() < 500 ) {
         switchPlace("#brands","#promo-blocks");
         } else {
         switchPlace("#promo-blocks","#brands");
         }*/
    }
    checkMovables();

    $(window).resize(function() {
        checkHeader();
        checkToTop();
        checkMovables();
    });

    $(window).scroll(function() {

        checkHeader();
        checkToTop();

        if( $("#submenu").length > 0 ) {

            if( scrollPos > ($("#submenu").offset().top - 68) ) {

                if(window.innerHeight > ($("#submenu").height() * 2)) {
                    $("#menu-huvudmeny-2").css("top", (scrollPos - $("#submenu").offset().top) + 48 + 20);
                } else {
                    if(distance > 20) {
                        $("#menu-huvudmeny-2").css("top", (scrollPos - $("#submenu").offset().top) + 48 + 20);
                    }
                }
            } else {
                $("#menu-huvudmeny-2").css("top", 0);
            }
        }

    });

    $("#open-search").click(function(e) {
        $(".dimmer").fadeToggle();
        $("body").toggleClass("blurred");
        $("#search-mobile").slideToggle();
        e.preventDefault();
    });

    $("#btn-totop").click(function() {
        $('html,body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });

    $("#map-dropdown a").click(function() {
        codeAddress( $(this).attr("title") + ", Sverige" );
    });

    var activeChapter = 0;
    var chapters = $(".chapter").length;
    $(document).keydown(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 40) {
            if(activeChapter != chapters) {
                activeChapter++;
                if(activeChapter == 1) {
                    $('html,body').animate({ scrollTop: $('.chapter:eq(' + (activeChapter-1) + ')').offset().top - 80 }, 'slow');
                } else {
                    $('html,body').animate({ scrollTop: $('.chapter:eq(' + (activeChapter-1) + ')').offset().top - 80 }, 'slow');
                }
            } else {
                $('html,body').animate({ scrollTop: $(document).height() }, 'slow');
            }
            e.preventDefault();
        } else if (code == 38) {
            if(activeChapter != 1) {
                activeChapter--;
                $('html,body').animate({ scrollTop: $('.chapter:eq(' + (activeChapter-1) + ')').offset().top - 80 }, 'slow');
            } else {
                activeChapter = 0;
                $('html,body').animate({ scrollTop: 0 }, 'slow');
            }
            e.preventDefault();
        }
    });


    var sliderMargin;

    function centerSlider() {
        sliderMargin = ($(window).width() / 2) - ($(".slider").find("img").width() / 2);
        $(".slider").find("img").animate({
            left: sliderMargin
        },500);
    }

    $(document).ready(function() { centerSlider(); });
    $(window).load(function() {
        setTimeout(function() {
            centerSlider();
        },100);
    });

    var currentWidth = $(window).width();

    setInterval(function() {
        if($(window).width() != currentWidth) {
            centerSlider();
            currentWidth = $(window).width();
        }
    },1000);

    if( $(window).width() > 1024 ) {
        $('.social-media-content#facebook').append('<IFRAME style="margin-left: -5px; border: 0; WIDTH: 100.8%; HEIGHT: 515px; OVERFLOW: hidden;" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FLandrinsBil&amp;width=334px&amp;height=520&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=true&amp;show_border=false&amp;appId=1389603857942228" frameBorder=0 allowTransparency scrolling=no></IFRAME>');
        $('.social-media-content#instagram').append('<IFRAME style="border:none;overflow:hidden;width:345px; height: 515px" src="http://widget.websta.me/in/landrinsbil/?s=158&w=2&h=4&b=0&p=18" allowtransparency="true" frameborder="0" scrolling="no"></iframe> <!-- websta - web.stagram.com -->');
        /*$('.social-media-content#youtube').append('<IFRAME style="border: 0; WIDTH: 100%; HEIGHT: 525px;" class=visible-phone marginHeight=0 src="http://ytchannelembed.com/gallery.php?vids=6&amp;user=landrinsbil&amp;row=2&amp;width=160&amp;hd=1&amp;desc=58&amp;desc_color=9E9E9E&amp;title=30&amp;title_color=000000&amp;views=0&amp;likes=0&amp;dislikes=0&amp;fav=0&amp;playlist=" frameBorder=0 width=100% scrolling=no></IFRAME>');*/
        $('.social-media-content#youtube').append('<IFRAME style="border: 0; WIDTH: 100%; HEIGHT: 515px;" class=visible-phone marginHeight=0 src="http://ytchannelembed.com/gallery.php?vids=2&amp;user=landrinsbil&amp;row=1&amp;width=332&amp;hd=1&amp;desc=100&amp;desc_color=9E9E9E&amp;title=30&amp;title_color=000000&amp;views=0&amp;likes=0&amp;dislikes=0&amp;fav=0&amp;playlist=" frameBorder=0 width=100% scrolling=no></IFRAME>');
    }
    if( $(window).width() <= 1024 ) {
        $('.social-media-content#facebook').append('<IFRAME style="margin-left: -5px; border: 0; WIDTH: 100.8%; HEIGHT: 565px; OVERFLOW: hidden;" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FLandrinsBil&amp;width=293px&amp;height=520&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=true&amp;show_border=false&amp;appId=1389603857942228" frameBorder=0 allowTransparency scrolling=no></IFRAME>');
        $('.social-media-content#instagram').append('<IFRAME src="http://widget.websta.me/in/landrinsbil/?s=128&w=2&h=4&b=0&p=18" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:345px; height: 565px" ></iframe> <!-- websta - web.stagram.com -->');
        $('.social-media-content#youtube').append('<IFRAME style="border: 0; WIDTH: 100%; HEIGHT: 565px;" class=visible-phone marginHeight=0 src="http://ytchannelembed.com/gallery.php?vids=6&amp;user=landrinsbil&amp;row=2&amp;width=130&amp;hd=1&amp;desc=58&amp;desc_color=9E9E9E&amp;title=30&amp;title_color=000000&amp;views=0&amp;likes=0&amp;dislikes=0&amp;fav=0&amp;playlist=" frameBorder=0 width=100% scrolling=no></IFRAME>');
    }

    $(".menu").find("li").hover(function() {
        $(this).children("ul").slideDown(100);
    }, function() {
        $(this).children("ul").slideUp(50);
    });


    $(".bubble-link").mouseenter(function() {
        var elementRef = $(this).prop("id").replace("bubble-link","bubble");

        if( $(this).offset().left < ($(window).width() - 220) ) {
            $("#" + elementRef).css({
                "left" : $(this).offset().left
            });
        } else {
            $("#" + elementRef).css({
                "left" : $(window).width() - 220
            });
        }

        $("#" + elementRef).css({
            "top" : $(this).offset().top + 20,
            "z-index" : 999
        });
        $("#" + elementRef).animate({
            top: "+=10",
            opacity: 1
        },200);
    });
    $(".bubble-link").mouseleave(function() {
        var elementRef = $(this).prop("id").replace("bubble-link","bubble");
        $("#" + elementRef).animate({
            top: "-=10",
            opacity: 0
        },200, function() {
            $("#" + elementRef).css({
                "z-index" : 0,
                "left" : 0
            });
        });
    });

    checkCookie("accepted_cookie");

});

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function checkCookie() {
    var accepted_cookie = getCookie("accepted_cookie");
    if (accepted_cookie == "hide" && window.location.href.indexOf("nocookie") == -1) {
        $(".cookie-display").hide();
    } else {
        $(".cookie-display").show();
    }
}

function acceptCookie() {
    setCookie("accepted_cookie", "hide", 365);
    $(".cookie-display").hide();
}