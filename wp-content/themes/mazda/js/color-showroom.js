function templateBuilder(data, template, bindings) {
    return template.replace(
        /\{([^{}]*)\}/g,
        function(a, b) {
            var r = bindings[b];
            return typeof r === 'string' || typeof r === 'number' ? r : a;
        }
    );
}

$(document).ready(function() {

    var moduleClone = $("#module-360-view-template").clone(),
        viewer;

    function View360() {

        this.view = $('[data-module-type="Module360View"]');
        this.data;

        this.processedImages = [];

        var _this = this;
        setTimeout(function() {
            _this.init();
        }, 2000);
    }

    View360.prototype.init = function() {

        var dataFile = this.view.data("module-datafile");

        if (typeof dataFile == "undefined" || dataFile === "") {
            console.log("Colour module, no data file specified", dataFile);
        }

        this.getData(dataFile);

        this.loadedColours = {
            "0": 1
        };
    };

    View360.prototype.getData = function(url, callback) {

        var _this = this;

        $.ajax({
            url: $('.module-360-view').data('module-datafile'),
            dataType: 'json'
        }).done(function(result) {

            _this.data = result;
            _this.renderMarkup();

            _this.bindColourSwitch();

            // select the default colour option
            _this.view.find('[data-colour-trigger]')[0].click();

            if ((navigator.userAgent.toLowerCase().indexOf("msie 8") > -1) === true) {
                setTimeout(function() {
                    _this.spartanFunctionality();
                }, 2000);
            }

        }).error(function(jqXHR, textStatus, errorThrown) {

            console.log("360 Module - DATA ERROR: jqXHR: %o, textStatus: %o, errorThrown: %o", jqXHR, textStatus, errorThrown);
        });
    };




    View360.prototype.spartanFunctionality = function() {

        //console.log('initializing ie');
        var $spartanIntercator = $('.module-360-view').find('.spacer');
        View360.prototype.backUpCarImage = $('.module-360-view').find('.spacer')[0];

        var rotateSpeed = 1;
        var clockWiseRotation = true;

        var imageIndex = 0;

        View360.prototype.baseURL = 'http://www.mazda.se/Canvas/showroom_2015/l10n/master/Colour/images/LHD/2400_001_41V/';
        View360.prototype.baseUrlImageIndex = '00.jpg';

        var imageChecker = function() {
            switch (Math.round(imageIndex)) {
                case 0:
                    View360.prototype.baseUrlImageIndex = '00.jpg';
                    break;
                case 1:
                    View360.prototype.baseUrlImageIndex = '01.jpg';
                    break;
                case 2:
                    View360.prototype.baseUrlImageIndex = '02.jpg';
                    break;
                case 3:
                    View360.prototype.baseUrlImageIndex = '03.jpg';
                    break;
                case 4:
                    View360.prototype.baseUrlImageIndex = '04.jpg';
                    break;
                case 5:
                    View360.prototype.baseUrlImageIndex = '05.jpg';
                    break;
                case 6:
                    View360.prototype.baseUrlImageIndex = '06.jpg';
                    break;
                case 7:
                    View360.prototype.baseUrlImageIndex = '07.jpg';
                    break;
                case 8:
                    View360.prototype.baseUrlImageIndex = '08.jpg';
                    break;
                case 9:
                    View360.prototype.baseUrlImageIndex = '09.jpg';
                    break;
                case 10:
                    View360.prototype.baseUrlImageIndex = '10.jpg';
                    break;
                case 11:
                    View360.prototype.baseUrlImageIndex = '11.jpg';
                    break;
            }
            View360.prototype.backUpCarImage.src = View360.prototype.baseURL + View360.prototype.baseUrlImageIndex;
        }

        $spartanIntercator.mouseover(function() {
            this.rotationGear = setInterval(function() {
                if (clockWiseRotation === true) {
                    imageIndex = imageIndex + rotateSpeed;
                    if (imageIndex > 11) {
                        clockWiseRotation = false;
                    }
                } else {
                    imageIndex = imageIndex - rotateSpeed;
                    if (imageIndex < 0) {
                        clockWiseRotation = true;
                    }
                }
                imageChecker();
            }, 100);
        });

        $spartanIntercator.mouseout(function() {
            clearInterval(this.rotationGear);
        });
    };


    View360.prototype.renderMarkup = function() {

        var _this = this;

        // Render the main container markup
        var bindings = {
            title: this.data.Desktop.Header,
            description: this.data.Desktop.Description,
            button: this.data.l10n.BuildButton,
            buttonlink: this.data.l10n.BuildLink
        };

        var template = this.view.find($('#module-360-view-template')).html();

        var template = '<ul class="helper-tabs level-1"><li class="selected" data-processed="true"><ul class="helper-tabs level-2"><li class="selected"><ul class="colour-tab"></ul><div class="colour-selector"><ul class="colour-options"></ul></div><div class="model-details"><h3 class="model">{title}</h3><div class="description">{description}</div></div></li></ul></li></ul>';



        this.view.append(
            templateBuilder(this.data, template, bindings)
        );

        var colourTab = this.view.find('ul.colour-tab');

        _this.colourOptionList = [];

        // Build colour sections
        this.data.Desktop.Items.forEach(function(item, itemIndex) {

            var colourItem;

            var ua = navigator.userAgent.toLowerCase();
            var isIE8 = ua.indexOf("msie 8") > -1;


            if (isIE8 === true) {
                colourItem = $('' +
                    '<li data-processed="false" data-colour-index="' + itemIndex + '">\n' +
                    '<div class="canvas-wrapper">\n' +
                    '<img class="spacer" alt="" src="http://www.mazda.se' + _this.data.Desktop.Items[0].ImageBaseUrl + _this.data.Desktop.Items[0].ImageFiles[0] + '" />\n' +
                    '<div class="legend-rotate"><p>' + _this.data.l10n.RotateLegend + '</p></div>\n' +
                    '<!-- <div id="PointerBind" class="interactor"></div> --></div>\n' +
                    '<div class="canvas-loader"></div>\n' +
                    '</li>\n');
            } else {
                colourItem = $('' +
                    '<li data-processed="false" data-colour-index="' + itemIndex + '">\n' +
                    '<div class="canvas-wrapper">\n' +
                    '<img class="spacer" alt="" src="http://www.mazda.se' + _this.data.Desktop.Items[0].ImageBaseUrl + _this.data.Desktop.Items[0].ImageFiles[0] + '" />\n' +
                    '<div class="legend-rotate"><p>' + _this.data.l10n.RotateLegend + '</p></div>\n' +
                    '</div>\n' +
                    '<div class="canvas-loader"></div>\n' +
                    '</li>\n');
            }



            colourTab.append(colourItem);

            _this.colourOptionList.push({
                "Index": itemIndex,
                "ColourName": item.ColourText,
                "ImageSrc": item.ColourImage,
                "SelectedImageSrc": item.ColourImageSelected
            });
        });

        var colourSelector = this.view.find('ul.colour-options');
        // Build colour selector
        this.colourOptionList.forEach(function(colour, colourIndex) {

            var colourSelectorItem = $('' +
                '<li data-colour-trigger="' + colour.Index + '">' +
                '<a href="#">' +
                '<span class="text">' + colour.ColourName + '</span>' +
                '<img class="default-image" alt="' + colour.ColourName + '" src="http://www.mazda.se' + colour.ImageSrc + '"/>' +
                '<img class="selected-image" alt="' + colour.ColourName + '" src="http://www.mazda.se' + colour.SelectedImageSrc + '"/>' +
                '</a>' +
                '</li>\n');

            colourSelector.append(colourSelectorItem);
        });
    };

    View360.prototype.bindColourSwitch = function() {
        var _this = this;

        this.view.find('[data-colour-trigger]').each(function() {

            $(this).on('click', function(e) {
                e.preventDefault();

                var triggerId = $(this).data('colour-trigger');



                $('[data-colour-trigger]').removeClass('selected');
                $(this).addClass('selected');

                // hide all panels
                $('[data-colour-index]').removeClass('selected');

                _this.loadedColours[triggerId] = 1;

                _this.selectedView = $('[data-colour-index="' + triggerId + '"]');



                _this.loadImages(
                    $(this).data('colour-trigger')
                );

            });

        });
    };

    View360.prototype.loadImages = function(tabId) {

        var _this = this;



        _this.view.find('[data-colour-index="' + tabId + '"]').addClass('selected');

        this.selectedColourTab = this.view.find('[data-colour-index="' + tabId + '"]');

        this.selectedColourTabId = tabId

        /* Images */
        this.imagesLoaded = 0;
        // var sequence; processedImages & this.newImages


        //console.log(this.data.Desktop.Items[this.selectedColourTabId].ImageBaseUrl);


        this.processedImages[this.selectedColourTabId] = [];

        this.preloadingBar(this.data.Desktop.Items[this.selectedColourTabId].ImageFiles, function() {

            _this.imagesLoaded = 0, newImages = [];

            if (_this.processedImages[_this.selectedColourTabId].length > 1) {

                _this.createCanvas((typeof G_vmlCanvasManager !== 'undefined'));
            } else {
                // display image
                _this.view.append(_this.processedImages[this.selectedColourTabId]);
            }
        });


        View360.prototype.baseURL = this.data.Desktop.Items[this.selectedColourTabId].ImageBaseUrl;

        View360.prototype.backUpCarImage = $('.module-360-view').find('.spacer')[0];

        if (View360.prototype.baseUrlImageIndex == void(0)) {
            View360.prototype.baseUrlImageIndex = '00.jpg';
        }
        View360.prototype.backUpCarImage.src = 'http://www.mazda.se' + View360.prototype.baseURL + View360.prototype.baseUrlImageIndex;

        if ((navigator.userAgent.toLowerCase().indexOf("msie 8") > -1) === true) {
            $('[data-colour-index]').css('display', 'none');
            $('[data-colour-index]')[0].style['display'] = 'block';
        }



        //$('[data-colour-index]').css('display','none');
        //$('[data-colour-index]')[0].style['display'] = 'none';




    };

    View360.prototype.preloadingBar = function(images, callback) {

        var _this = this;

        images = (typeof images !== 'object') ? [images] : images;

        var preloadWrapper = this.selectedColourTab.find('.preload-wrapper');
        if (!this.selectedColourTab.find('.preload-wrapper').length) {
            preloadWrapper = this.createPreloadingEl();
            $('.canvas-loader', this.selectedColourTab).append(preloadWrapper);
        }

        // console.log("Preloading images", images.length);

        // Create new images
        for (var i = 0; i < images.length; i++) {

            _this.processedImages[this.selectedColourTabId][i] = $('<img>');
            _this.processedImages[this.selectedColourTabId][i].load(function() {

                _this.imagesLoaded++;

                _this.updatePreloadingEl(preloadWrapper, images, _this.imagesLoaded);

                if (_this.imagesLoaded === images.length) {

                    _this.removePreloadingEl(preloadWrapper);

                    callback();
                }
            });

            _this.processedImages[this.selectedColourTabId][i].attr('src', 'http://mazda.se' + this.data.Desktop.Items[this.selectedColourTabId].ImageBaseUrl + images[i]);
        }
    };

    View360.prototype.createPreloadingEl = function() {

        var preloadWrapper = $("<div>"),
            preloader = $("<div>"),
            preloaderBar = $("<span>");

        preloader.append(preloaderBar);
        preloader.addClass('preloader');

        preloadWrapper.append(preloader);
        preloadWrapper.addClass('preload-wrapper');

        return preloadWrapper
    }

    View360.prototype.updatePreloadingEl = function(preloadingEl, images, status) {
        if (preloadingEl) {
            preloadingEl.css({
                'width': Math.round((status * 100) / images.length) + '%'
            });
        }
    }

    View360.prototype.removePreloadingEl = function(preloadingEl) {
        if (preloadingEl) {
            preloadingEl.remove();
        }
    }

    View360.prototype.createCanvas = function(canvasFallback) {

        var _this = this;

        var widget = this.selectedColourTab.find('.canvas-wrapper');

        this.imgDimensions = this.getImageDimensions();

        // Fallback mode  // this.ctx = (additionalTask ? additionalTask(el) : canvas[0]).getContext('2d');
        if (canvasFallback) {

            var canvas = document.createElement('canvas');

            canvas.setAttribute("width", this.imgDimensions.width);
            canvas.setAttribute("height", this.imgDimensions.height);

            widget.append(canvas);

            canvas = G_vmlCanvasManager.initElement(canvas);

            this.ctx = canvas.getContext('2d');
        } else {

            var canvas = $('<canvas></canvas>');
            if (this.selectedColourTab.find('canvas').length) {
                canvas = this.selectedColourTab.find('canvas');
            }

            canvas
                .width(this.imgDimensions.width)
                .height(this.imgDimensions.height)
                .prop('width', this.imgDimensions.width)
                .prop('height', this.imgDimensions.height);

            widget.append(canvas);

            if ((navigator.userAgent.toLowerCase().indexOf("msie 8") > -1) === false) {
                this.ctx = canvas[0].getContext('2d');
            }


        }



        //console.log("Canvas dimensions: %o, %o", imgDimensions.width, imgDimensions.height);

        this.ctx.drawImage(this.processedImages[this.selectedColourTabId][0].get(0), 0, 0, this.imgDimensions.width, this.imgDimensions.height);

        //if(! this.selectedColourTab.find('.interactor').length) {
        widget.find('.interactor').remove();
        widget.append('<div id="PointerBind" class="interactor"></div>');
        //}

        this.dragEvents(
            _this.selectedView.find('.interactor')
        );
    }

    View360.prototype.dragEvents = function(target) {

        var index = 0;
        var mobileDirection = 'left';

        var _this = this;

        function reset() {
            selected = 0;
            count = 0
            mdX = 0;
            mdY = 0;
            throttle = {
                'left': 0,
                'right': 0
            };
        }

        var selected, mdX, mdY, count, direction, throttle, throttlePosition;
        reset();


        //FIXME: Algorithm to get the throttle position calced based on screen width, its then dynamic i.e. more aggressive timings on a smaller screen
        throttlePosition = 8;

        var supportList = {
            'touchstart': 'ontouchstart' in document,
            'touchend': 'ontouchend' in document,
            'touchmove': 'ontouchmove' in document
        }

        var dragEvent = {
            down: function(x, y) {
                mdX = x;
                mdY = y;
                selected = 1;
                if (window.innerWidth <= 640) {
                    throttlePosition = 0.5;
                } else {
                    throttlePosition = 8;
                }
            },
            up: function() {
                reset();
            },
            move: function(x, y) {

                if (selected === 1) {
                    subscription({
                        'x': x,
                        'y': y
                    });
                }
                /*
                if(window.innerWidth <= 640){
                  if(x <= window.innerWidth/2){
                    mobileDirection = 'left';
                  }else{
                    mobileDirection = 'right';
                  }
                  mobileRotate(mobileDirection);
                }else{
                  if(selected === 1) {
                    subscription({ 'x': x, 'y': y });
                  }
                }
                */

            }
        }

        function subscription(pos) {

            //console.log("Binding event: ", _this.selectedView);

            if (count < pos.x) {

                throttle.right++;
                count = pos.x;

                if (throttle.right % throttlePosition === 0) {
                    //360: index = (--index < 0) ? processedImages.length - 1 : index;
                    if (index - 1 >= 0) {
                        index--
                        drawFrames(index);
                    }
                }

            } else {

                throttle.left++
                    count = pos.x;

                if (throttle.left % throttlePosition === 0) {
                    //360: index = (++index === processedImages.length) ? 0 : index;
                    if (index + 1 < _this.processedImages[_this.selectedColourTabId].length - 1) {
                        index++
                        drawFrames(index);
                    }
                }
            }

        }

        function mobileRotate(direction) {
            if (direction == 'left') {
                if (index + 1 < _this.processedImages[_this.selectedColourTabId].length - 1) {
                    index++
                    drawFrames(index);
                }
            } else {
                if (index - 1 >= 0) {
                    index--
                    drawFrames(index);
                }
            }
        }

        function drawFrames(index) {

            _this.imgDimensions = _this.getImageDimensions();

            //console.log("Image dimensions draw frames: ", _this.imgDimensions);

            clearCanvas(_this.ctx);
            _this.ctx.drawImage(_this.processedImages[_this.selectedColourTabId][index][0], 0, 0, _this.imgDimensions.width, _this.imgDimensions.height);
            requestAnimationFrame(_this.drawFrames);
        }

        function requestAnimationFrame(callback) {
            return function(callback) {
                setTimeout(callback, 1000 / 60);
            };
        }

        function clearCanvas(context) {
            context.clearRect(0, 0, _this.ctx.canvas.width, _this.ctx.canvas.height)
        }
        if (supportList.touchstart) {
            //console.log("Turning on touchstart");
            target.on("touchstart", function(e) {
                dragEvent.down(e.originalEvent.targetTouches[0].pageX, e.originalEvent.targetTouches[0].pageY);
            });
            if (window.innerWidth > 1000) {
                //console.log('This is likely a laptop/desktop with touch capabilities');
                target.on("mousedown", function(e) {
                    dragEvent.down(e.pageX, e.pageY);
                });
            }
        } else {
            target.on("mousedown", function(e) {
                dragEvent.down(e.pageX, e.pageY);
            });
        }

        if (supportList.touchend) {
            //console.log("Turning on touchend");
            target.on("touchend", function(e) {
                dragEvent.up();
            });

            if (window.innerWidth > 1000) {
                //console.log('This is likely a laptop/desktop with touch capabilities');
                target.on("mouseup", function(e) {
                    dragEvent.up();
                });
            }

        } else {
            target.on("mouseup", function(e) {
                dragEvent.up();
            });
        }

        if (supportList.touchmove) {
            //console.log("Turning on touchmove");
            target.on("touchmove", function(e) {
                //console.log("touch dragging = ClientX: %o, ClientY: %o\n Page down = mdX: %o mdY: %o", mdX, mdY, e.originalEvent.targetTouches[0].pageX, e.originalEvent.targetTouches[0].pageY);
                dragEvent.move(mdX - e.originalEvent.targetTouches[0].pageX, mdY - e.originalEvent.targetTouches[0].pageY);
                e.preventDefault();
            });
            if (window.innerWidth > 1000) {
                //console.log('This is likely a laptop/desktop with touch capabilities');
                target.on("mousemove", function(e) {
                    dragEvent.move(mdX - e.pageX, mdY - e.pageY);
                });
            }
        } else {
            target.on("mousemove", function(e) {
                //console.log("mouse dragging = ClientX: %o, ClientY: %o\n Page down = mdX: %o mdY: %o", mdX, mdY, e.pageX, e.pageY);
                dragEvent.move(mdX - e.pageX, mdY - e.pageY);
            });
        }
    };

    View360.prototype.getImageDimensions = function() {

        var $spacer = this.selectedView.find('.spacer');

        return {
            width: $spacer.width(),
            height: $spacer.height()
        }
    };

    View360.prototype.removeMarkup = function() {
        var module = $('#module-360-view-template')
        $('#module-360-view-template').next('.helper-tabs').remove();
    };

    if (window.addEventListener) {
        window.addEventListener("orientationchange", function() {
            View360.prototype.removeMarkup();
            viewer = new View360();
        }, false);
    }

    viewer = new View360();
});

