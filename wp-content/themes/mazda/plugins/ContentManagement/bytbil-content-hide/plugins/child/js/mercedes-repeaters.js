/**
 * Created by ranbogmord on 2015-01-30.
 */
jQuery(function ($) {
    if ($("body").hasClass("pushed_post")) {
        $(document).on("acf/setup_fields", function (e, $el) {
            // Menu repeater
            var mRep = $el.find("#acf-menu-items");
            if (!!mRep.length) {
                var sortable = mRep.find(".ui-sortable");

                sortable.sortable("disable");
                sortable.find(".order").css("cursor", "inherit");
            }
        });
    }
});
