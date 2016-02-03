jQuery(function ($) {
    $("[data-lightbox]").click(function (e) {
        e.preventDefault();
        var wHeight = $(window).height();
        var source = $(this).attr("href") || $(this).data("source");
        var attrs = {
            href: source,
            closeButton: false,
            iframe: true,
            width: "1170px",
            maxWidth: "100%",
            height: wHeight * 0.9,
            innerWidth: "100%",
            innerHeigt: "90%",
            fixed: true
        };
        $.colorbox(attrs);
    });
});
