$(document).ready(function () {
    resizeResponsive();
});
$(window).resize(function () {
    resizeResponsive();
});
function resizeResponsive() {
    /*
     $('.right-column').css('max-width', function() {
     var width = $(window).width() - $('.left-column').width() - 10;
     //alert($(document).width());
     width = Math.min(width, 768);
     return width;
     }); */

    if ($('.left-column').children('.container').length === 0) {
        $('.left-column').children().wrapAll(jQuery('<div/>', {class: 'container'}));
        var responseMenuButton = jQuery('<div/>', {class: 'responsive-menu-button'});
        $('.left-column').append(responseMenuButton);
        responseMenuButton.click(function () {
            if ($('.left-column').width() == 0) {
                $('.left-column').width(258);
                $('.left-column').css('border-right-width', '4px');
            } else {
                $('.left-column').css('border-right-width', '0');
                $('.left-column').width(0);
            }
        });
        $('.left-column').css('overflow', 'visible');
    }

    $('#flexslider-bil .slides li a div').css('max-width', function () {
        var width = $(window).width();
        width = Math.min(width, 575);
        return width;
    });
    $('#flexslider-bil .slides li a div').css('height', function () {
        var height = $(window).height() - 85;

        return height;
    });

}