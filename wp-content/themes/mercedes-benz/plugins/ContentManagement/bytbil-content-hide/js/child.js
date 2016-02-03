jQuery(function ($) {
    var ChildSite = function (params) {
        if (!params) {
            throw new Error("Params required for ChildSite");
        }
        this.hide = params.selectors.hide || [];
        this.disable = params.selectors.disable || [];
        this.nots = params.selectors.nots || [];
    };

    ChildSite.prototype.hidef = function () {
        var self = this,
            nots = self.nots.join(", ");
        this.hide.forEach(function (item) {
            $(item).not(nots).hide();
        });
    };

    ChildSite.prototype.disablef = function () {
        var self = this,
            nots = self.nots.join(", ");
        this.disable.forEach(function (item) {
            $(item).not(nots).not("input[type='hidden']").each(function () {
                self.addHidden($(this));
            });
        });
    };

    ChildSite.prototype.addHidden = function ($el) {
        $el.attr("disabled", "disabled");
        var hiddenAdded = $el.attr("data-hidden");

        var isCheck = $el.attr("type") == "checkbox";
        var addHidden = true;

        if (isCheck) {
            if (!$el.is(":checked")) {
                addHidden = false;
            }
        }

        if (hiddenAdded !== "hidden" && addHidden) {
            var hidden = document.createElement("input");
            $(hidden).attr("type", "hidden");
            $(hidden).attr("value", $el.val());
            $(hidden).attr("name", $el.attr("name"));

            $(hidden).insertAfter($el);

            $el.attr("data-hidden", "hidden");
        }
    };


    ChildSite.prototype.init = function () {
        var self = this;
        var t = setInterval(function () {
            self.hidef();
            self.disablef();
        }, 100);

        setTimeout(function () {
            clearInterval(t);
        }, 10000)
    };

    if (!$("body").hasClass("bytbil-master-site")) {
        var sels = hideables;

        var CS = new ChildSite({
            selectors: sels || []
        });

        CS.init();
    }
});