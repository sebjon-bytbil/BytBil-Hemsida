(function ($) {
    var footer = $(".wrapper > footer");

    if (footer.css("position") === "absolute") {
        footer.parent().css("padding-bottom", footer.height() + 50 + "px");
    }

    $(document).ready(function () {
        var dupl = $('ul.nav.hover > .menu-item-has-children');

        dupl.each(function () {
            var link = $(this).children('a');
            var a = document.createElement('a');

            $(a).prop('href', $(link[0]).prop('href'));
            $(a).text($(link[0]).text());
            $(a).addClass('visible-xs');

            var li = document.createElement('li');
            $(li).append(a);
            $(this).children('ul').eq(0).prepend(li);
        });
    });

    $("ul.nav li.menu-item-has-children > a").click(function (e) {
        var uls = $("ul.nav > li > ul").not($(e.target).siblings()).not($(e.target).parentsUntil("ul.nav"));
        if ($(window).width() < 768) {
            uls.slideUp();
            e.preventDefault();

            $(this).siblings("ul").slideToggle();
        }
    });

    $("ul.nav li.menu-item-has-children > a.dropdown-toggle").click(function (e) {
        $("ul.nav > li > ul").not($(this).siblings("ul")).hide();
        if ($(window).width() >= 768) {
            e.preventDefault();

            $(this).siblings("ul").toggle();
        }
    });

    $(document).on("click", function (e) {
        if ($("ul.nav").hasClass("hover")) {
            return;
        }
        if (!$(e.target).parents(".menu-item").length) {
            $("ul.nav > li > ul").hide();
        }
    });
}(jQuery));
