jQuery(document).ready(function (e) {

    $ = jQuery;
    var href = $('#wp-admin-bar-wp-logo a').attr('href');
    if (href) {
        href = href.replace('about','index');
    }
    $('#wp-admin-bar-wp-logo a').attr('href', href).attr('title', 'Välkommen till BytBil CMS 2.0 BETA');

    if ($('body').not('.wp-admin').hasClass('admin-bar')) {
        $('html').attr('style', 'margin-top: 70px !important');

        if (!$('#background-container').length) {
            $('header#masthead').attr('style', 'top:70px !important');
        }
        //$('#wpadminbar').attr('style','background: rgba(233,130,57,1); box-shadow: 0 1px 2px 0 rgba(0,0,0,0.2);');
        //$('header#site-header').css('top','80px !important');
    }

    // This makes previews work. Do not remove.
    if (!!$('#postexcerpt #excerpt').length) {
        $('#postexcerpt #excerpt').text("there's no text here. *wink* *wink*");
    }

    var colorpickers = $(".field_type-color_picker");
    if (!!colorpickers.length) {
        console.log("color-pickers");
        $(".field_type-color_picker .wp-color-result").click(function () {
            console.log("click");
            var parent = $(this).parents('.field_type-color_picker');
            if (parent.hasClass("open-picker")) {
                parent.removeClass("open-picker");
            } else {
                parent.addClass("open-picker");
            }
        });
    }

    function init_sitesettings() {

        /* Sätt infotext */
        $('.post-type-sitesettings #poststuff p.label').each(function (index, element) {

            var full = $(this).html();
            var header = $(this).find('label').html();
            $(this).find('label').remove();
            var instructions = $(this).html();


            $(this).parent().prepend('<label class="bytbil_field_header">' + header + ' <i class="fa fa-info-circle bytbil_field_instructions" title="' + instructions + '"></i></label>');
            $(this).remove();


        });
        /* Repeaterfält Sätt infotext */
        $('.post-type-sitesettings .repeater tr.sub_field').each(function (index, element) {

            var subinstructions = $(this).find('span.sub-field-instructions').html();
            $(this).find('label').append('<i class="fa fa-info-circle bytbil_sub-field_instructions" title="' + subinstructions + '"></i>');
            $(this).find('span.sub-field-instructions').remove();

        });

        if ($('#acf-plug-icon').length) {
            $('#acf-plug-icon').addClass('clearfix');
        }


    }

    init_sitesettings();

});
