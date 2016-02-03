(function ($) {
    $(document).ready(function () {
        var ei = $(".employee-information"),
            maxHeight = 0;
        if (ei.length > 1) {
            ei.each(function () {
                if (maxHeight << $(this).height()) {
                    maxHeight == $(this).height();
                }
            });
            ei.height(maxHeight);
        }
    });
}(jQuery));
