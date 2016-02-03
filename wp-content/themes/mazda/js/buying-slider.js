jQuery(document).ready(function($) {
    $(function () {

        // Set up the slides
        $('#buying-slider li').each(function (i) {

            var li = $(this),
                owning = $('.owning', li).html();

            $('.owning', li).remove();

            $('.buying .wrap ul').append('<li class="owning" data-class="services">' + owning + '</li>');

            $('.buying-owning-bullets').append('<li><a data-position="' + i + '" href="#">' + i + '</a></li>');
        });

        $(function () {

            var slider = $('#buying-slider'),
                slides = $('li', slider),
                slideWidth = 960,
                accumWidth = slides.length * slideWidth,
                topSlider = $('.buying .wrap'),
                topSlides = $('li', topSlider),
                topSlideWidth = 240,
                accumTopWidth = topSlides.length * topSlideWidth,
                highlights = $('div', '.wrap'),
                currentIndex = 0,
                visible = 3,
                move = 1,
                inTransition = false,
                animateSlider = function (index) {

                    if (inTransition) return false;
                    inTransition = true;

                    $('.owning.active').removeClass('active');
                    slides.addClass('semi-opaque');

                    slider.animate({ 'left': -(index * slideWidth) + 'px' }, 1000, function () {

                        $('.buying .wrap .owning:eq(' + index + ')').addClass('active');

                        // handle arrow visibility
                        if (index === 0) {
                            $('.prev.slide-control').addClass('inactive');
                        } else {
                            $('.prev.slide-control').removeClass('inactive');
                        }

                        if (index === (slides.length - 1)) {
                            $('.next.slide-control').addClass('inactive');
                        } else {
                            $('.next.slide-control').removeClass('inactive');
                        }

                        slides.removeClass('semi-opaque');

                        // Handle bullet status here
                        $('.active', '.buying-owning-bullets').removeClass('active');
                        $('a:eq(' + index + ')', '.buying-owning-bullets').addClass('active');

                        // update the currentIndex
                        currentIndex = index;

                        inTransition = false;
                    });

                    slides.removeClass('opaque');
                    $('#buying-slider li:eq(' + index + ')').addClass('opaque');

                    if (index > visible) {
                        move = index - visible;
                        topSlider.animate({ 'left': -(move * topSlideWidth) + 'px' }, 1000);
                    } else {
                        topSlider.animate({ 'left': '0px' }, 1000);
                    }

                };

            slider.width(accumWidth);
            topSlider.width(accumTopWidth);

            highlights.click(function () {
                animateSlider(highlights.index($(this)));
            });

            $('.slide-control', '#buying-slider-wrapper').click(function () {
                if ($(this).hasClass('inactive')) return false;

                var index = ($(this).hasClass('prev')) ? --currentIndex : ++currentIndex;

                animateSlider(index);
            });

            $('.buying-owning-bullets a').click(function (e) {
                e.preventDefault();

                $('.active', '.buying-owning-bullets').removeClass('active');
                $(this).addClass('active');

               animateSlider($(this).data('position'));

            });

        });

        // Pre-select first items
        $('#buying-slider li:eq(0)').addClass('opaque');
        $('.buying .wrap .owning:first-child').addClass('active');
        $('.buying-owning-bullets a:eq(0)').addClass('active');

        if ($('.touch').length) {

            var addSwiping = function () {

                var swipeHandler = function (event, phase, direction, distance) {
                    if (phase === 'end' && (direction === 'left' || direction === 'right')) {

                        if (direction === 'left') {
                            $('.next.slide-control', '#buying-slider-wrapper').trigger('click');
                        } else if (direction === 'right') {
                            $('.prev.slide-control', '#buying-slider-wrapper').trigger('click');
                        }
                    }
                },
                swipeOptions = {
                    triggerOnTouchEnd: true,
                    swipeStatus: swipeHandler,
                    allowPageScroll: 'vertical',
                    threshold: 200
                };

                $('#buying-slider').swipe(swipeOptions);

            };

            if (typeof ($.fn.swipe) === 'function') {
                addSwiping();
            } else {
                $.getScript('/js/jquery.touchSwipe.js', function () {
                    addSwiping();
                });
            }

        }



        /*$('.ptext').each(function () {
        var lastspace = $(this).text().lastIndexOf(' ', 90);
        if ($(this).text().length > 90) {
        if ($(this).text().charAt(lastspace - 1) == '.') {
        $(this).html($(this).text().substr(0, lastspace));
        }
        else {
        $(this).html($(this).text().substr(0, lastspace) + '.');
        }
        }
        });*/


        /*$('.owning').each(function () {

        $('div.owning').mouseenter(function () {
        $(this).addClass('current');
        var longtext = $(this).find('.disabled').text().substr(0, 140);
        $(this).find(".ptext").html(longtext);

        }).mouseleave(function () {
        $(this).removeClass('current');
        var shorttext = $(this).find('.disabled').text().substr(0, 90);
        $(this).find(".ptext").html(shorttext);

        });

        $('div.owning').click(function () {
        $('.owning.active').removeClass('active');
        $(this).addClass('active');
        });
        });*/

    });
});
