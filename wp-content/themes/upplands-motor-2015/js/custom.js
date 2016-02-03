 /*exported bootstrapAngular, getShareOptions, toggleSearch, toggleFlip */
 /* globals angular */

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

function toggleFlip(el) {
    "use strict";
    var $el = $(el);
    if (!$el.hasClass('flip')) {
        $el.addClass('flip');
    } else {
        $el.removeClass('flip');
    }
}

function toggleSearch() {
    "use strict";
    var $body = $('body');
    var $search = $('#mobile-search');
    if ($search.hasClass('open')) {
        $body.removeClass('search-open');
        $search.removeClass('open');
    } else {
        $body.addClass('search-open');
        $search.addClass('open');
    }
}

function getShareOptions(targetDiv) {
    "use strict";
    //$('[property="og:url"]').attr("content", location.href);
    //$('[property="og:title"]').attr("content", $("#vehicleinfo h3:first").text());
    //$('[property="og:image"]').attr("content", $(".owl-item:first img").attr("src"));

    $('#shareLinks_1').click(function(e) {
        e.stopPropagation();
    });

    var $target = $(targetDiv);
    var url = location.href;
    var encodedUrl = encodeURIComponent(url);

    $('#shareUrl').val(url);

    if ($target.hasClass('open')) {
        $target.html('').removeClass('open');
    } else {
        $target.addClass('open');

        var fb_url = "https://www.facebook.com/dialog/share?app_id=1091242480887465&display=popup&redirect_uri=" + encodedUrl  + "&href=" + encodedUrl;
        $target.append('<a class="socialbutton" target="_blank" id="facebook" href="'+fb_url+'"><i class="icon icon-facebook"></i> Facebook</a>');
		$target.append("<a class=\"socialbutton\" target=\"_blank\" id=\"twitter\" href=\"https://twitter.com/intent/tweet?url=" + encodedUrl + "\"><i class=\"icon icon-twitter\"></i> Twitter</a>");
		$target.append("<a class=\"socialbutton\" target=\"_blank\" id=\"googleplus\" href=\"https://plus.google.com/share?url=" + encodedUrl + "\"><i class=\"icon icon-gplus\"></i> Google +</a>");
        $target.append('<a class="socialbutton" id="mail" data-toggle="modal" onclick="$(\'#shareModal\').modal(\'show\'); return false;" data-target="#myModal" href="javascript:;"><i class="icon icon-mail"></i> E-post</a>');
    }
}

function bootstrapAngular($el){
    "use strict";
    if ($el.hasClass('ng-scope')){ return; }

    //get clean dom
    var el = $el[0];
    //bootstrap angular module ElasticAccess
    angular.bootstrap(el, ['ElasticAccess']);
    jQuery(window).trigger("angularBootstraped", [$el]);
    // remember to add flag for window location hash blocker!
}

(function($){
    "use strict";
    // Clear footer form
    $('#clearFooterForm').on('click', function() {
        // Clear inputs and textarea
        $('#footer-form input, #footer-form textarea').val('');

        // Reset selectpicker
        $('#footer-form select.selectpicker').val('0').trigger('change');
    });

    $('a.inactive-page').each(function(){
        $(this).attr('href','#');
    });

    $('body').on('click', '#myFavorites .ftab', function() {
        if ($(this).hasClass('active')) {
            return;
        }

        $('.ftabs .ftab').removeClass('active');
        $(this).addClass('active');

        var id = $(this).data('tabid');
        var content = $('#myFavorites').find('.' + id + '-content');

        $('#myFavorites .ftab-content').removeClass('active');
        content.addClass('active');
    });

    $("#footer-form .departments").on('change', function(){
        setTimeout(function(){
            var text = $("#footer-form .departments .filter-option").text();

            if(text === "Skadeverkstad" || text === "Biluthyrning" || text === "Tillbehör" || text === "Däckhotell"){
                $("#footer-form-brand").fadeOut();
            }else{
                $("#footer-form-brand").fadeIn();
            }
        }, 20);
    });

    var screen_width = window.innerWidth;
    //var screen_height = window.innerHeight;

    $(function () {

        $(window).scroll(function () {

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
        /*$(".panel-collapse.in").collapse("toggle");*/

         $('#main-menu .dropdown-menu .dropdown').removeClass('dropdown').addClass('dropdown-custom');

        $('body').on('click', '.dropdown-menu > .dropdown-custom > a', null, function(e) {
            e.preventDefault();
            e.stopPropagation();
            var $parent = $(this).parent();
            if (!$parent.hasClass('open')) {
                $parent.addClass('open');
            } else {
                $parent.removeClass('open');
            }
            return false;
        });

        // $(function(){
        //      var scope = $("main");
        //      scope.html(scope.html().replace(/&nbsp;/g,''));
        // });

        // $(function () {

        //     var $mn = $('#main-nav'),
        //         $smw = $('.submenu-wrapper'),
        //         headerHeight = $mn.outerHeight(),
        //         lastScrollTop = 0,
        //         delta = 5;

        //     $(window).on({
        //         'touchmove': function(e) {
        //             var st = $(this).scrollTop();

        //             if (Math.abs(lastScrollTop - st) <= delta)
        //                 return;

        //             if (st > headerHeight) {
        //                 if (st > lastScrollTop) {
        //                     //$mn.addClass('hide-header');
        //                     //$smw.addClass('stick-top');
        //                 } else {
        //                     //$mn.removeClass('hide-header');
        //                     //$smw.removeClass('stick-top');
        //                 }
        //             }

        //             lastScrollTop = st;
        //         }
        //     });

        // });

    }
    // Small Devices
    //else if (screen_width > 768 && screen_width < 992) {}
    // Large Devices
    //else if (screen_width > 998 && screen_width < 1199) {}
    // X-Large Devices
    //else {}

    

})(jQuery);


//scrollmenu for filter
(function($){
    "use strict";
    $.fn.simpleScrollMenu = function(){
        if (this.length < 1){ return this; }
        var slider_height = null;
        var wrapper = $(this);
        var trigger = $('<div id="menutrigger" />').insertBefore(wrapper);
        var clone = $('<div id="menuclone" />').insertBefore(wrapper);
        $(window).on("scroll", function(){
            if (slider_height === null && wrapper.offset()) {
                slider_height = wrapper.offset().top - $('#main-nav').height();
            }

            //console.log(slider_height);

            var top = $(this).scrollTop();
            var triggertop = trigger.offset().top - $("#main-nav").height();

            if (top > triggertop && wrapper.hasClass("affix") === false) {
                clone.height(wrapper.height());
                wrapper.addClass("affix");

            }
            else if(top < triggertop && wrapper.hasClass("affix") === true){
                clone.height(0);
                wrapper.removeClass("affix");
            }
        });
        
        return this;    
    };

    $(window).on("angularBootstraped", function(){
        $('.accessscroll[name=vehicles]').simpleScrollMenu();
    });
    

    $("body").on('submit', "form.wpcf7-form", function(){
        $(this).find('input[type="submit"], .submit').prop("disabled", "disabled");
    });

    $(document).on('mailsent.wpcf7 spam.wpcf7 invalid.wpcf7', function(){
        $('form.wpcf7-form').find('input[type="submit"], .submit').prop('disabled', false);
    });
})(jQuery);