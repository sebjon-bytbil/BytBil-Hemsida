(function ($) {
    var fontContainers = [
        $("#acf-sitesetting-font-family-header"),
        $("#acf-sitesetting-font-family-paragraph"),
        $("#acf-sitesetting-menus-font-family"),
        $("#acf-sitesetting-submenu-font-family"),
        $("#acf-sitesetting-sidebarmenus-font-family")
    ];

    $(fontContainers).each(function () {
        var el = document.createElement("span");
        $(el).addClass("font-preview");
        $(el).text("Lorem ipsum dolor sit amet");
        $(el).css({
            "font-family": $("select", this).val(),
        });

        $(this).append(el);

        $("select", this).on("change", function () {
            $(el).css("font-family", $(this).val());
        });
    });
}(jQuery));
