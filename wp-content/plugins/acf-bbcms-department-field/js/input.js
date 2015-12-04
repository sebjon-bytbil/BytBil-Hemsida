(function ($) {
    var Field = function ($dep) {
        var self = this;
        self.selects = $($dep).find(".inner select");
        self.fac = [].shift.call(self.selects);
        self.dep = [].shift.call(self.selects);
        self.loadingSpinner = $($dep).find(".inner i");

        self.handleFetch = function (result) {
            $(self.loadingSpinner).hide();
            $(self.dep).find("*").not(":first-child").remove();
            var current = $(self.dep).attr("data-current");

            (result || []).forEach(function (res, i) {
                var opt = document.createElement("option");
                opt.value = i;
                opt.innerHTML = res["facility-department"];

                if (i == current) {
                    opt.selected = true;
                }

                $(self.dep).append(opt);
            });

            $(self.dep).show();
        };

        self.fetchDepartments = function (e) {
            var val = $(self.fac).val();

            $(self.loadingSpinner).show();
            $(self.dep).hide();

            $.ajax({
                url: ajaxurl,
                method: "post",
                dataType: "json",
                data: {
                    action: "acf-departments-find",
                    value: val
                },
                success: self.handleFetch
            });
        };
        $(self.fac).on("change", self.fetchDepartments);
    };

    var initialize_fields = function ($deps) {
        var self = this;
        self.deps = [];

        $deps.each(function () {
            self.deps.push(new Field($(this)));
        });
    };


    if (typeof acf.add_action !== 'undefined') {

        /*
         *  ready append (ACF5)
         *
         *  These are 2 events which are fired during the page load
         *  ready = on page load similar to $(document).ready()
         *  append = on new DOM elements appended via repeater field
         *
         *  @type	event
         *  @date	20/07/13
         *
         *  @param	$el (jQuery selection) the jQuery element which contains the ACF fields
         *  @return	n/a
         */

        acf.add_action('ready append', function ($el) {

            // search $el for fields of type 'FIELD_NAME'
            acf.get_fields({type: 'bbcms_department'}, $el).each(function () {

                initialize_field($(this));

            });

        });


    } else {


        /*
         *  acf/setup_fields (ACF4)
         *
         *  This event is triggered when ACF adds any new elements to the DOM.
         *
         *  @type	function
         *  @since	1.0.0
         *  @date	01/01/12
         *
         *  @param	event		e: an event object. This can be ignored
         *  @param	Element		postbox: An element which contains the new HTML
         *
         *  @return	n/a
         */

        $(document).on('acf/setup_fields', function (e, postbox) {

            var deps = $(postbox).find('.field[data-field_type="bbcms_department"]');
            initialize_fields(deps);
        });


    }


})(jQuery);
