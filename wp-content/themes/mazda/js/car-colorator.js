jQuery(document).ready(function($) {
            $("#carColorator .storage_container").css('background-image', 'url(' + $('.base .slider-colorbar-img').attr('src') + ')');

             var divColorator = $("#sideColorator"),
                storageBullets = '',
                storageItems = $('#carColorator li:not(.base)').length,
                min = 0,
                max = 960;

             var sliders = [], lastImg, lastBg, currentText, lastText, moveIt, moveIt2, coloratorWidth, startValue;

             coloratorWidth = $("#carColorator ul").width();

             var coloratorCount = ($('#carColorator ul li:visible').length - 1);

             var ieMobile = false;

             if (navigator.userAgent.toString().indexOf('IEMobile') !== -1) {
                 ieMobile = true;
             }

             $('#carColorator li:not(.base)').each(function (sliderNo) {
                 var slider = $("<div class='slider' data-sliderno='" + sliderNo + "'></div>").insertAfter(divColorator).slider({
                     min: min,
                     max: max,
                     animate: true,
                     value: max,
                     slide: function (event, ui) {

                         var sliderNo = $(ui.handle).parent().data('sliderno'),
                            leftLabel = sliders[sliderNo].find('.left_label'),
                            rightLabel = sliders[sliderNo].find('.label_right');

                         //set the width of the car image li
                         $('#carColorator li').eq(storageItems).css('width', (Math.round((ui.value / max) * 1000) / 10) + '%');

                         //move the labels with the slider
                         leftLabel.css('right', ((100 - Math.round((ui.value / max) * 1000) / 10) + 5) + '%');
                         rightLabel.css('right', ((100 - Math.round((ui.value / max) * 1000) / 10) - 20) + '%');

                         if (ui.value >= 864 || ui.value >= '90%') {
                             rightLabel.hide();
                         } else if (ui.value <= 144 || ui.value <= '15%') {
                             leftLabel.hide();
                         } else {

                             leftLabel.show();

                             if (rightLabel.text() !== leftLabel.text()) {
                                 rightLabel.show();
                             }

                         }

                     },
                     start: function (event, ui) {

                         // tagging
                         var handle = $(ui.handle),
                             label = '';

                         if (!handle.hasClass('tagged')) {
                             handle.addClass('tagged');

                             label = $('.label_right', handle.parent()).text();
                             s3_log('colourator/' + label);
                         }

                         startValue = ui.value;

                         //hide all right labels and only show the current one with corresponding background bar
                         $('.label_right, .left_label').hide();
                         $('.base .label_right').show();


                         var sliderNo = $(ui.handle).parent().data('sliderno'),
                            leftLabel = sliders[sliderNo].find('.left_label'),
                            rightLabel = sliders[sliderNo].find('.label_right');

                         if ($(this).find('a').css('left').replace(/[^-\d\.]/g, '') > (coloratorWidth - 1) || $(this).find('a').css('left') == '100%') {

                             moveIt = true;

                         } else { moveIt = false; }



                         $('.fakeHandle').css('display', 'none');
                         $(this).find('.fakeHandle').css('display', 'block');

                         $("#carColorator .storage_container").css('background-image', 'url(' + $(this).find('a').data('colorbar') + ')');

                         for (var i = 0, l = sliders.length; i < l; i++) {
                             //reset all the sliders to max and remove the current class

                             if (ui.value == max) {
                                 sliders[i].slider('value', max).removeClass('current');
                                 $('#carColorator li').css({
                                     'width': '100%'
                                 });
                                 //hide all but the last image (the base image)
                                 $('#carColorator li:lt(' + storageItems + ')').hide();
                             }
                         }

                         //show the current image and give it the current class so that the line and label
                         //are visible

                         if (ui.value === max || ui.value === '100%') {
                             $('#carColorator li').eq(sliderNo).css('display', 'block');
                             sliders[sliderNo].addClass('current');
                             //set the initial label position

                             leftLabel.css('right', ((100 - Math.round((ui.value / max) * 1000) / 10) + 5) + '%');
                             rightLabel.css('right', ((100 - Math.round((ui.value / max) * 1000) / 10) - 20) + '%');

                             window.setTimeout(function () {

                                 leftLabel.show();

                                 if (rightLabel.text() !== leftLabel.text()) {
                                     rightLabel.show();
                                 }

                             }, 500);
                         } else {
                             leftLabel.show();
                             if (rightLabel.text() !== leftLabel.text()) {
                                 rightLabel.show();
                             }
                         }

                         /*remove this if you don't want to compare with the last colour but always to the base colour */
                         var baseImg = $('#carColorator li.base img:not(.handle)'),
                                currentImg = $('#carColorator li').eq(sliderNo).find('img:not(.handle)').attr('src');

                         if (lastImg && currentImg != lastImg) {// if the last image isn't the current image

                             //set the base car image to the last image that was selected
                             $('#carColorator li.base img:not(.handle)').attr('src', lastImg);
                             $("#carColorator .storage_container div.label").css('background-image', 'url(' + lastBg + ')');
                             $(".left_label").text(lastText);

                         } else {
                             if ($(this).find(".left_label").text().length < 1) {
                                 $(this).find(".left_label").text(lastText);
                             }
                         }

                         return;
                     },
                     stop: function (event, ui) {

                         if ($(this).find('a').css('left').replace(/[^-\d\.]/g, '') < (coloratorWidth - 1)) { moveIt = false; }

                         if ($(this).find('a').css('left') == '100%' && startValue == max) { moveIt = true; }

                         if ($(this).find('a').css('left').replace(/[^-\d\.]/g, '') > (coloratorWidth - 1) || $(this).find('a').css('left') == '100%') {
                             $('.fakeHandle').css('display', 'none');
                             $('.fakeHandle:first').css('display', 'block');

                             if (moveIt == true) { moveIt2 = true; }
                         }

                         currentText = $(this).find('.label_right').text();

                         var sliderNo = $(ui.handle).parent().data('sliderno');

                         if (moveIt && moveIt2) {
                             // IE Mobile check
                             if (ieMobile) {
                                 $(this).find('a').animate({
                                     left: '0%'
                                 }, { duration: 900, queue: false });

                                 $(this).slider("option", "value", 0);
                                 ui.value = 0;

                                 $('#carColorator li.base').css('width', '0%');

                                 sliders[sliderNo].find('.label_right').css({
                                     'right': '40%'
                                 });

                                 sliders[sliderNo].find('.left_label').css({
                                     'right': '100%'
                                 });
                             } else {
                                 $(this).find('a').animate({
                                     left: '80%'
                                 }, { duration: 500, queue: false });

                                 $(this).slider("option", "value", 768);
                                 ui.value = 768;

                                 $('#carColorator li.base').css('width', '80%');


                                 sliders[sliderNo].find('.label_right').css({
                                     'right': '0%'
                                 });

                                 sliders[sliderNo].find('.left_label').css({
                                     'right': '25%'
                                 });
                             }



                             $('.fakeHandle').css('display', 'none');
                             $(this).find(".fakeHandle").css('display', 'block');

                             $('#carColorator li:lt(' + storageItems + ')').hide();

                             //show the current image and give it the current class so that the line and label
                             //are visible
                             $('#carColorator li').eq(sliderNo).css('display', 'block');

                             sliders[sliderNo].addClass('current');

                         }

                         //save the last image src
                         lastImg = $('#carColorator li').eq(sliderNo).find('img:not(.handle)').attr('src');
                         lastBg = $('#carColorator li').eq(sliderNo).find('.slider-colorbar-img').attr('src');
                         lastText = currentText;

                         if (ui.value === max || ui.value === '100%') {
                             sliders[sliderNo].find('.left_label').css({ 'right': ((100 - Math.round((ui.value / max) * 1000) / 10) + 5) + '%' });
                             sliders[sliderNo].find('.label_right').css({ 'right': ((100 - Math.round((ui.value / max) * 1000) / 10) - 20) + '%' });
                             $('.fakeHandle').css('display', 'none');
                             $(".fakeHandle:first").css('display', 'block');
                         }

                         return;
                     }
                 });
                 sliders.push(slider);

                 slider.each(function () {
                     $(this).append('<div class="label left_label"></div>');
                 });

                 slider.find('a').each(function () {

                     var fakeHandle = $('<div class="fakeHandle"></div>').css({
                         top: (-320 + (sliderNo * 25)) + 'px' //have to set the position relative to the container
                     }), inner = $('<div class="inner"></div>').css({
                         backgroundPosition: 'center ' + (320 - (sliderNo * 25)) + 'px', //have to set the background position relative to the container
                         backgroundImage: 'url(' + $('#carColorator li').eq(sliderNo).find('.handle').attr('src') + ')'//use the image in the markup as the background image
                     });

                     $(this).attr('data-colorbar', $('#carColorator li').eq(sliderNo).find('.slider-colorbar-img').attr('src'));

                     //use the image in the markup as the background image
                     $(this).css('background-image', 'url(' + $('#carColorator li').eq(sliderNo).find('.handle').attr('src') + ')').append(fakeHandle.append(inner));

                 });

                 //append the label from the markup
                 slider.append($('#carColorator li').eq(sliderNo).find('.label'));

             });

             $('#carColorator .slider').each(function (i) {

                 if (i === ($('#carColorator .slider').length - 1)) {
                     $(this).find('.left_label').text($(this).find('.label_right').text());
                     //$(this).addClass('current');

                     lastText = $(this).find('.left_label').text();
                 }

                 $('.fakeHandle').css('display', 'none');
                 $('#carColorator').find(".fakeHandle").first().css('display', 'block');

                 //set the positions of the sliders
                 $('#carColorator .slider[data-sliderno="' + i + '"]').css('top', (-140 - (i * 25)) + 'px');

                 var wrapper_height = $("#carColorator .storage_container").height();

                 $('.label', '#carColorator .slider[data-sliderno="' + i + '"]').css('top', ((wrapper_height - 340) + (i * 25)) + 'px');
             });

             $('div.fakeHandle:first').show();

             $('.base .label_right').css('background-image', 'url("' + $("#carColorator .slider:last a").data("colorbar") + '")');
             $('.base .label_right').show();

            window.setTimeout(function(){
                preSelectFirstSwatch;
            }, 1000);

            var preSelectFirstSwatch = (function(){

                var firstSlider = $('.slider:first'),
                    handle = $('a', firstSlider),
                    leftLabel = $('.left_label', firstSlider),
                    rightLabel = $('.label_right', firstSlider),
                    lastLabelText = $('.left_label', '.slider:last').text();

                 $('.storage_container').css('background-image', 'url(' + handle.data('colorbar') + ')');

                 leftLabel.text(lastLabelText);

                 handle.addClass('current').animate({ 'left': '80%' }, 1000, function () {
                     leftLabel.css('right', '25%').fadeIn(750);
                     rightLabel.css('right', '0%').fadeIn(750);
                     firstSlider.slider('option', 'value', 768);
                 });

                 $('.storage_container .base').animate({ 'width': '80%' }, 1000);

            }());
});
