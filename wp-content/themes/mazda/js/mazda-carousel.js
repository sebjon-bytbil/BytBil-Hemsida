(function ($) {
    $.fn.mazdaCarousel = function (o) {
        o = $.extend({
            btnPrev: null,
            btnNext: null,
            btnGo: null,

            mouseWheel: false,
            auto: null,

            speed: 200,
            easing: null,

            vertical: false,
            circular: true,
            visible: 3,
            start: 0,
            scroll: 1,

            arrows: false,
            bullets: false,
            outside: false,

            beforeStart: null,
            afterEnd: null
        }, o || {});


        return this.each(function () {

            var div = $(this);

            // avoid multiple calls
            if (div.hasClass('handled')) return false;
            div.addClass('handled');

            // Fix to remove enveloping divs caused by Epi-Server personalisation blocks - 30/08/2013
            $('.hero-carousel-item').each(function() {
                if ($(this).parent().is('div')) {
                    $(this).unwrap();
                }
            });

            var running = false,
                shouldAutoPlay = false,
                autorun,
                cssDirection = o.vertical ? 'top' : 'left',
                cssDimension = o.vertical ? 'height' : 'width';

            var ul = $('> ul', div),
                v = o.visible;

            if (o.auto > 0) {
                shouldAutoPlay = true;
            }

            if (o.circular) {
                var tLi = $('> li', ul),
                    tLen = tLi.length;

                //create the 'before' and 'after' plates only if there is more than one slide
                if (tLen > 1) {
                    ul.prepend(tLi.slice(tLen - v).clone()).append(tLi.slice(0, v).clone());
                    //ul.prepend(tLi.slice(tLen - v - 1 + 1).clone()).append(tLi.slice(0, v).clone());
                }
                o.start += v;
            }



            var carousel_id;
            var run = 1;

            var li = $('> li', ul),
                itemLength = li.length,
                currentIndex = o.start;

            //$('body').css('overflow-y', 'scroll');

            li.css({ 'overflow': 'hidden', 'float': o.vertical ? 'none' : 'left' });
            ul.css({ 'margin': '0', 'padding': '0', 'position': 'relative', 'list-style-type': 'none', 'z-index': '1' });
            div.css({ 'overflow': 'hidden', 'position': 'relative', 'z-index': '2', 'left': '0px' });
            //gallery
            div.find('ul > li:first .description').css('display', 'block');


            // resize elements
            var initWindowWidth = $(window).width(),
                liWidth = li.width(),
                canResize = (liWidth === initWindowWidth) ? true : false,
                liSize = 0, ulSize = 0, divSize = 0,
                heroCarouselImages = $('.image_container img', div);
            
            adjustCarouselDimensions();

            var supportsOrientationChange = 'onorientationchange' in window,
                orientationEvent = supportsOrientationChange ? 'orientationchange' : 'resize';

            $(window).bind(orientationEvent, function() {
                adjustCarouselDimensions();
            });

            // handle options
            /*if (o.btnPrev) {
            $(o.btnPrev).click(function () {
            shouldAutoPlay = false;
            return go(currentIndex - o.scroll);
            });
            }*/

            /*if (o.btnNext) {
            $(o.btnNext).click(function () {
            shouldAutoPlay = false;
            return go(currentIndex + o.scroll);
            });
            }*/

            /*if (o.btnGo) {
            $.each(o.btnGo, function (i, val) {
            $(val).click(function () {
            shouldAutoPlay = false;
            return go(o.circular ? o.visible + i : i);
            });
            });
            }*/

            if (o.mouseWheel && div.mousewheel) {
                div.mousewheel(function (e, d) {
                    return d > 0 ? go(currentIndex - o.scroll) : go(currentIndex + o.scroll);
                });
            }

            if (o.auto && tLen > 1) {
                carousel_id = div.attr('id');
                startInterval();
            }

            if (o.circular && o.auto) {
                // add mouseover pausing tech
                div.mouseenter(function () {

                    if (typeof (autorun) !== 'undefined') {
                        clearInterval(autorun);
                    }

                }).mouseleave(function () {

                    if (o.auto > 0) { shouldAutoPlay = true; }
                    if (shouldAutoPlay) {
                        startInterval();
                    }
                });
            }

            if (o.arrows) {

                var leftArrow = $('<a href="#" class="carousel-arrow disabled" id="prev">&lt;</a>'),
                    rightArrow = $('<a href="#" class="carousel-arrow disabled" id="next">&gt;</a>');

                leftArrow.click(function (e) {
                    carousel_id = div.attr('id');

                    e.preventDefault();
                    shouldAutoPlay = false;
                    go(currentIndex - o.scroll);
                });

                rightArrow.click(function (e) {
                    carousel_id = div.attr('id');

                    e.preventDefault();
                    shouldAutoPlay = false;
                    go(currentIndex + o.scroll);
                });



                if (o.outside) {
                    div.after(leftArrow).after(rightArrow);
                }
                else {
                    div.append(leftArrow).append(rightArrow);
                }

                toggleArrowVisibility();
            }

            if (o.bullets) {

                var bullets = '',
                    len = (o.circular) ? tLen / o.visible : itemLength / o.visible,
                    index = (o.circular) ? (currentIndex - o.start) : currentIndex;

                if (len) {
                    bullets += '<ol class="carousel-bullets rad5">';

                    for (var i = 0; i < len; i++) {

                        if (i === index) {
                            bullets += '<li><a href="#" data-position="' + i + '" class="active">' + (i + 1) + '</a></li>';
                        } else {
                            bullets += '<li><a href="#" data-position="' + i + '">' + (i + 1) + '</a></li>';
                        }
                    }

                    bullets += '</ol>';

                    bullets = $(bullets);

                    $('a', bullets).click(function (e) {

                        carousel_id = $(this).closest('div').attr('id');

                        e.preventDefault();

                        if ($(this).hasClass('active')) {
                            return;
                        }
                        else {
                            $(this).addClass('active');
                        }

                        var index = $('a', bullets).index(this);

                        shouldAutoPlay = false;

                        go(o.circular ? o.visible + index : index);
                    });

                    div.append(bullets);
                }
            };

            if ($('.touch').length) {
                var swipeOptions = {
                    triggerOnTouchEnd: true,
                    swipeStatus: swipeStatus,
                    allowPageScroll: 'vertical'
                };

                div.swipe(swipeOptions);

                function swipeStatus(event, phase, direction, distance) {
                    if (phase === 'end' && (direction === 'left' || direction === 'right')) {
                        carousel_id = div.attr('id');
                        shouldAutoPlay = false;
                        if (direction === 'left') {
                            go(currentIndex + o.scroll);
                        } else if (direction === 'right') {
                            go(currentIndex - o.scroll);
                        }
                    }
                }
            }

            function visitedElements() {
                return li.slice(currentIndex).slice(0, v);
            };

            function startInterval() {
                autorun = setInterval(function () {
                    shouldAutoPlay = true;
                    go(currentIndex + o.scroll);
                }, o.auto + o.speed);
            };

            function adjustCarouselDimensions() {
                var windowWidth = $(window).width();
  
                var isMobileView = false;
                if (!isMobileView) {
                    if (canResize) {
                        li.css('width', windowWidth);
                    } else {
                        if (li.width() > windowWidth) {
                            li.css('width', windowWidth);
                        }
                    }
                }
                
                //Some androids take sometime before the window dimensions are fully calculated upon resize
                //So for that we'll stick a timeout
                var ua = navigator.userAgent.toLowerCase();
                var isAndroid = ua.indexOf("android") > -1;
                if(isAndroid) {
                console.log('this is an adroid device');
                    setTimeout(function(){
                        console.log('commence back up resize');
                        windowWidth = $(window).width();
                        li.css('width', windowWidth);
                    },2000);
                }

                applyDimensions(windowWidth);
            };

            function applyDimensions(windowWidth) {
                var isMobileView = false;
                if (!isMobileView) {
                    liSize = o.vertical ? height(li) : width(li);                                   // Full li size (incl margin) - Used for animation
                    if (!liSize) liSize = o.vertical ? li.height() : li.width();
                } else {
                    if (div.parents('#linkCarousel').length) {
                        liSize = li.outerWidth();
                    } else {
                        liSize = windowWidth;
                    }
                }

                ulSize = liSize * itemLength;                                                   // size of full ul (total length, not just for the visible items)
                
                divSize = (div.parents('#gallery').length) ? windowWidth : liSize * v;  // size of entire div (total length for just the visible items)
                
                li.css('height', li.height());
                ul.css(cssDimension, ulSize + 'px').css(cssDirection, -(currentIndex * liSize));
                div.css(cssDimension, divSize + 'px');                                          // Width of the DIV. length of visible images

                if (!isMobileView) {
                    adjustImages(windowWidth);
                }
            };

            function adjustImages(windowWidth) {
                var $heroImage = $('#hero_carousel .hero-img .carousel-image img');
                var el = [],
                    setWidth = function(image) {
                        window.setTimeout(function(){
                            if (windowWidth > image.data('width')) {
                                image.removeAttr('class').css('margin-left', '-' + windowWidth / 2 + 'px').addClass('fullWidth');
                                $heroImage.css('width', (window.innerWidth) + 'px');
                                $heroImage.css('margin-left', '-952px');

                            } else {
                                image.removeAttr('class').css('margin-left', '-' + image.data('width') / 2 + 'px').addClass('autoWidth');
                                $heroImage.css('width',(image.data('width')) + 'px');
                                $heroImage.css('margin-left', '-952px');
                            }
                        },1000)
                    },
                    loadImage = function(image) {
                        image.load(function() {
                            $(this).attr('data-width', $(this).width());
                            setWidth($(this));
                        });
                    };

                for (var i = 0, l = heroCarouselImages.length; i < l; i++) {

                    el = $(heroCarouselImages[i]);

                    if (typeof(el).data('width') !== 'undefined') {
                    // window resize
                        setWidth(el);
                    } else {
                    // onload
                        loadImage(el);
                    }
                }
            };

            function toggleArrowVisibility() {
                if (currentIndex - o.scroll < 0) {
                    leftArrow.addClass('disabled');
                } else {
                    leftArrow.removeClass('disabled');
                }

                if (currentIndex + o.scroll > itemLength - v) {
                    rightArrow.addClass('disabled');
                } else {
                    rightArrow.removeClass('disabled');
                }
            };

            function go(to) {
                //o = $("#" + carousel_id);

                $("#" + carousel_id + " .carousel-bullets a").removeClass('active');

                if (!running) {

                    running = true;

                    if (o.beforeStart) {
                        if (to >= 0 && to <= itemLength - v) {
                            o.beforeStart.call(this, visitedElements());
                        }
                    }

                    if (o.bullets) {
                        //var len = (o.circular) ? tLen : itemLength,
                        //  bulletIndex = (o.circular) ? (currentIndex % 2) + 1 : len - visitedElements().prevObject.length;

                        var len = (o.circular) ? tLen : itemLength,
                            bulletIndex = (o.circular) ? (currentIndex - 1) : len - 1;

                        if (bulletIndex === len) bulletIndex = 0;
                        $(this).addClass("active");

                    }

                    if (o.circular) {                           // If circular we are in first or last, then goto the other end

                        if (to <= o.start - v - 1) {            // If first, then goto last
                            ul.css(cssDirection, -((itemLength - (v * 2)) * liSize) + 'px');

                            // If 'scroll' > 1, then the 'to' might not be equal to the condition; it can be lesser depending on the number of elements.
                            currentIndex = (to === o.start - v - 1) ? itemLength - (v * 2) - 1 : itemLength - (v * 2) - o.scroll;
                        } else if (to >= itemLength - v + 1) { // If last, then goto first
                            ul.css(cssDirection, -((v) * liSize) + 'px');
                            // If 'scroll' > 1, then the 'to' might not be equal to the condition; it can be greater depending on the number of elements.
                            currentIndex = (to === itemLength - v + 1) ? v + 1 : v + o.scroll;

                        } else currentIndex = to;

                    } else {                    // If non-circular and to points to first or last, we just return.
                        if (to < 0 || to > itemLength - v) {
                            running = false;
                            return;
                        } else {
                            currentIndex = to;
                        }

                    }                           // If neither overrides it, the currentIndex will still be 'to' and we can proceed.

                    ul.animate(
                        (cssDirection === 'left') ? { 'left': -(currentIndex * liSize)} : { 'top': -(currentIndex * liSize) }, o.speed, o.easing,
                        function () {

                            if (o.afterEnd) {
                                o.afterEnd.call(this, visitedElements());
                            }

                            if (o.bullets) {
                                //var len = (o.circular) ? tLen : itemLength,
                                //  bulletIndex = (o.circular) ? (currentIndex % 2) + 1 : len - visitedElements().prevObject.length;

                                var len = (o.circular) ? tLen : itemLength,
                                    bulletIndex = (o.circular) ? (currentIndex - 1) : len - visitedElements().prevObject.length;


                                if (bulletIndex === len) bulletIndex = 0;

                                //if on a circular system, go to the end
                                if (bulletIndex < 0) bulletIndex = len - 1;

                                $($('#' + carousel_id + ' .carousel-bullets a')[bulletIndex]).addClass('active');

                            }

                            running = false;
                        }
                    );

                    // Disable buttons when the carousel reaches the last/first, and enable when not
                    if (!o.circular && o.arrows) {
                        toggleArrowVisibility();
                    }

                    if (o.auto && !shouldAutoPlay) {

                        if (typeof (autorun) !== 'undefined') {
                            clearInterval(autorun);
                        }

                        startInterval();

                        if (shouldAutoPlay == false) {
                            clearInterval(autorun);
                        }

                        //new code end

                    }
                }
                return false;
            };
        });
    };

    function css(el, prop) {
        return parseInt($.css(el[0], prop), 10) || 0;
    };
    function width(el) {
        return el[0].offsetWidth + css(el, 'marginLeft') + css(el, 'marginRight');
    };
    function height(el) {
        return el[0].offsetHeight + css(el, 'marginTop') + css(el, 'marginBottom');
    };

})(jQuery);

$(function () {

    // Deep linking to carousel

    function getParameterByName(name) {

        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)",
            regex = new RegExp(regexS),
            results = regex.exec(window.location.search);

        if (results == null)
            return "";
        else
            return decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    var index = getParameterByName('carouselIndex');

    if (index !== '') {
        var listItem = $('.carousel-bullets li').eq(index - 1),
            anchor = listItem.find('a');

        anchor.trigger('click');
    }
    
});
