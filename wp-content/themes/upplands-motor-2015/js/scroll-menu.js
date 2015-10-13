(function($, window, document){
    "use strict";
    $.fn.scrollMenu = function( options ){
      //defaults
      if (this.length < 1){ return this; }
      var settings = $.extend( {}, $.fn.scrollMenu.defaults, options );



      var scrollMenu = this;
      var wrapper = scrollMenu.find(".submenu-wrapper");
      
      // run this on start
      calculateAndSetWidths();
      //also run this in event RECALCULATE! EXTERMINATE!
     $(window).on('resize', function(){
        calculateAndSetWidths();
     });

      //var slider_height = null;

      //this is for the menu scroll
      var trigger = $('<div id="menutrigger" />').insertBefore(wrapper);
      var clone = $('<div id="menuclone" />').insertBefore(wrapper);

      function calculateAndSetWidths(){
        var width = wrapper.width();
      
        //var menu_items = scrollMenu.find(".item").length - 2;
        var item_width = scrollMenu.find(".item").width();
        var menu_width = 0;
        scrollMenu.find(".item:not(.first):not(.last)").each(function(){
          //this variable calculates total margin and add it to the witdh.
          //this means that this works with negative margin 
          var margT = ($(this).outerWidth(true) - $(this).outerWidth()) / 2;
          item_width = $(this).innerWidth() + margT;
            
          menu_width = menu_width + item_width;
        });
        var new_width = ((width - menu_width) / 2);
        //var document_height = $(document).height();
        scrollMenu.find(".item.first").css("width", new_width);
        scrollMenu.find(".item.last").css("width", new_width);
      }

      $(window).on("scroll touchmove", function (){
          var submenu_wrapper_height = wrapper.height();


          // menu stuff
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
          // //var slider_height = $("main .section-block:first-of-type").height();
          // //var slider_height = $(".scroll-menu .submenu-wrapper").offset().top;

          // if (slider_height === null && wrapper.offset()) {
          //   slider_height = wrapper.offset().top - $('#main-nav').height();
          // }



          // var top = $(this).scrollTop();

          // if (top > slider_height) {
          //     wrapper.addClass("affix");
          //     //console.log("set affix");

          // }
          // else {
          //     wrapper.removeClass("affix");
          //     //console.log("remove affix");
          // }

          var extra_padding = $("#main-nav").height() + $("#sub_menu").height();

          $(settings.targetContainer + " ." + settings.sectionClass).each(function(i){

              var this_top = $(this).next("#sub_menu").length > 0 ? $(this).offset().top : $(this).offset().top - extra_padding;
              var height = $(this).innerHeight();
              var this_bottom = this_top + height;
              var percent = 0;

              //var anchor_tag = '#' + $(this).attr('name');
              //var active_link_parent = wrapper.find('a[href="'+anchor_tag+'"]').parent();

              if (top >= this_top && top <= this_bottom) {
                  percent = ((top - this_top) / (height - submenu_wrapper_height)) * 100;
                  
                  if (percent >= 100) {
                      percent = 100;
                      wrapper.find(".item:eq("+i+")").css("color", "#fff");
                  }
                  else {
                      wrapper.find(".item:eq("+i+")").css("color", "#36a7f3");
                  }

              }
              else if (top > this_bottom) {
                  percent = 100;
                  wrapper.find(".item:eq("+i+")").css("color", "#fff");
              }
              wrapper.find(".item:eq("+i+") span").css("width", percent + "%");
          });

        
      });

      // function onElementHeightChange(elm, callback){
      //     var lastHeight = elm.clientHeight, newHeight;
      //     (function run(){
      //         newHeight = elm.clientHeight;
      //         if( lastHeight != newHeight )
      //             callback();
      //         lastHeight = newHeight;

      //         if( elm.onElementHeightChangeTimer )
      //             clearTimeout(elm.onElementHeightChangeTimer);

      //         elm.onElementHeightChangeTimer = setTimeout(run, 200);
      //     })();
      // }

      //   if (settings.headerImageContainerId != "") {
      //     onElementHeightChange(document.getElementById(settings.headerImageContainerId), function(){
      //       slider_height = slider_height + $("#" + settings.headerImageContainerId).height();
      //   });  
      //   };
        

      // click event for links in the menu
      $('a[href*=#]:not([href=#]):not([data-toggle]), .submenu-mobile li a').click(function() {
            var $parent = $(this).parents('.btn-group').first();
            if (!$parent.hasClass('open')) {
                $parent.addClass('open');
            } else {
                $parent.removeClass('open');
            }
         if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') || location.hostname === this.hostname) {
             var hash = this.hash.substr(this.hash.lastIndexOf("#"));//3
             //alert(hash);
             var target = $(hash);
             //alert(this.hash);
             target = target.length ? target : $('[name=' + hash.slice(1) +']');
             if (target.length) {
                 var top_offset = $("#wpadminbar").length > 0 ? $("#wpadminbar").height() : 0;

                 if ( $(".submenu-wrapper").css('position') === 'fixed') {
                     top_offset = (wrapper.height() + $("#main-menu").height()) + top_offset;
                 }else{
                    top_offset = top_offset = (wrapper.height() + $("#main-menu").height()) + top_offset - 45;
                 }
                 if ($(document).width() < 768) {
                  top_offset = top_offset + 85;
                 }
                 
                 //console.log(wrapper.height());
                 $('html,body').stop().animate({
                     scrollTop: target.offset().top - top_offset
                 }, 1000);

                 return false;
             }
         }
      });

      

    };

    $.fn.scrollMenu.defaults = {
      sectionClass: "scroll",
      targetContainer: "body",
      headerImageContainerId: ""
    };
})(jQuery, window, document);



(function($){
  "use strict";
  if ($(".object-menu").length > 0) {
    $("main > section").removeClass("scroll");
    $(".object-menu").scrollMenu({sectionClass: "scroll", headerImageContainerId: "owl-carousel"});
  }else if($(".page-menu").length > 0){
    $(".page-menu").scrollMenu();
  }
})(jQuery);
