jQuery(function ($) {
    $("#main-menu .navbar-nav .dropdown-menu").each(function () {
        var children = $(this).children();
        if (children.length === 0) {
            $(this).parent().remove();
        }
    });
});
