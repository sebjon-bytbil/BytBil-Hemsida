jQuery(document).ready(function($) {

    // Normal size images
    $.getJSON('http://www.mazda.se' + $('.module-gallery').data('module-datafile'), function(data) {
        var images = [];
        $.each(data.items, function(i, obj) {
            var objects = {};
            $.each(obj.items, function(j, image) {
                var metadata = {};
                metadata['image'] = image.image;
                metadata['image-text'] = image.description;
                objects[image.id] = metadata;
            });
            images.push(objects);
        });
        // Thumbnails
        $.getJSON('http://www.mazda.se' + $('[data-module-type="showroom-gallery"]').data('module-datafile'), function(thumbs) {
            // Desktop
            $.each(thumbs.Desktop, function(i, obj) {
                if (i === 0) {
                    var selected = ' class="selected"';
                    var hidden = '';
                } else {
                    var selected = '';
                    var hidden = ' class="hidden"';
                }

                $('[data-module-section="gallery-tab-navigation"] ul').append('<li data-gallery-tab-trigger="' + i + '"' + selected + '>' + obj.Title + '</li>');
                $('[data-module-section="gallery-tabs"]').append('<div data-gallery-tab-target="' + i + '"' + hidden + '></div>');

                $.each(obj.Images, function(j, image) {
                    $('[data-gallery-tab-target="' + i + '"]').append('<a class="gallery-' + obj.TabId + '" href="http://www.mazda.se' + images[i][image.OverlayId]['image'] + '" data-image-text="' + images[i][image.OverlayId]['image-text'] + '"><span class="showroom-gallery-marker"></span><img src="http://www.mazda.se' + image.Src + '" alt="' + image.Alt + '">');
                });

                $('.gallery-' + (i + 1)).featherlightGallery({
                    gallery: {
                        fadeIn: 300,
                        fadeOut: 300
                    },
                    openSpeed: 300,
                    closeSpeed: 300,
                    afterContent: function() {
                        this.$legend = this.$legend || $('<div class="legend"/>').insertAfter(this.$content);
                        this.$legend.html(this.$currentTarget.attr('data-image-text'));
                    }
                });
            });

            $('[data-module-section="gallery-tab-navigation"] ul li').click(function() {
                $('[data-module-section="gallery-tab-navigation"] ul li').removeClass('selected');
                $(this).addClass('selected');
                var i = $(this).attr('data-gallery-tab-trigger');
                $.each($('[data-module-section="gallery-tabs"] > div'), function() {
                    if (!$(this).hasClass('hidden')) {
                        $(this).addClass('hidden');
                    }
                });
                $('[data-gallery-tab-target="' + i + '"]').addClass('selected').removeClass('hidden');
            });

        });
    });
});
