(function($){
    $(function() {

        /* ---- ON LOAD -----*/

        //ElasticAccess i WP-Admin
        var searchQuery = "";
        setupListeners();

        // setTimeout(function(){
        //    $(".field_key-field_elasticaccess-hash").each(function(){
        //        $this = $(this);
        //        console.log("wakawaka", $this.find("input").value());
        //        var acf_hash = $this.find("input").val();
        //        acf_hash = "http://bytbil.com" + acf_hash;
        //        $this.siblings("[data-field_name='accesspackage-search']").find("[ng-address-bar] input").val(acf_hash);
        //        $this.siblings("[data-field_name='accesspackage-search']").find("[ng-address-bar] input").trigger
        //    });
        // }, 0);

        function setupListeners(){

            $('[data-app="elasticaccesspackage"].ng-scope').each(function(){
                var $this = $(this);

                //


                //searchQuery = $this.find("#addressBar").val();
                //var hash_field = $this.closest(".field").siblings(".field_key-field_elasticaccess-hash").find("input");

                //Lägga till på hashfältet i elasticaccess


                $(this).on('click change input', 'input', function(){
                    setTimeout(function(){
                        updateField($this);
                    }, 10);
                });
                $(this).on('click change input', 'a', function(){
                    setTimeout(function(){
                        updateField($this);
                    }, 10);
                });

            });
        }

        function updateField($this){
            $self = $this;
            searchQuery = $self.find("[ng-address-bar] input").val();
            var hash_field = $self.closest(".field").siblings(".field_key-field_elasticaccess-hash").find("input");
            //http://bytbil.com#?status=1
            searchQuery = searchQuery.split("#");
            if(searchQuery[1] == undefined){
                searchQuery[1] = "";
            }
            searchQuery = "#" + searchQuery[1];
            hash_field.val(searchQuery);
        };


        $("body").append("<div class='admin-overlay hidden'></div>");

        bind_close_key($('.admin-overlay'));

        var um_palettes = ['#fff', '#151515', '#eb2227', '#86a6b2', '#ff8500', '#003057', '#fdb414', '#003690', '#1351d8'];
        var um_titles = ['Vit', 'Svart', '#UM Röd', 'UM Blå', 'UM Orange', 'UM Blå', 'Renault Gul', 'Dacia Blå', 'Ford Blå'];

        // -- Colorpicker
        $('body').arrive('.acf-color_picker', function () {
            change_colors(this, um_palettes, um_titles);
        });

        $('#acf-row tr.row').each(function () {
            init_row_settings(this);
            var row_settings_section = $(this).find('[data-field_name="row-settings-section"]');
            var row_settings_section_choice = $(this).find('[data-field_name="row-settings-section"] .relationship_right ul li');
            if(row_settings_section_choice){
                $(this).find('.no_value_message').html('Sektion: ' + $(row_settings_section_choice).text()).css('background','#eee');
            }
        });

        $('.values > .layout').each(function () {
            init_content_settings(this);
            /*bootstrapAngular(this);*/
        });

        $('#acf-row').arrive('tr.row', function () {
            setTimeout(500);
            if ($(this).hasClass('ui-sortable-placeholder')) {
            }
            else {
                init_row_settings(this);
                toggle_row_settings(this);
            }

            $(this).arrive('.layout', function () {

                if ($(this).hasClass('ui-sortable-placeholder')) {
                    var content_helper = $(this).parent().find('.ui-sortable-helper');
                    var content_width = $(content_helper).find('tr[data-field_name="content-width"] input:checked').val() / 100;
                    $(this).width(($(this).width() * content_width) - 5);
                }
                else {
                    init_content_settings(this);
                    /*bootstrapAngular(this);*/
                    //toggle_content_settings(this);
                }
            });

        });

        $('.values').arrive('.layout', function () {

            if ($(this).hasClass('ui-sortable-placeholder')) {
                var content_helper = $(this).parent().find('.ui-sortable-helper');
                var content_width = $(content_helper).find('tr[data-field_name="content-width"] input:checked').val() / 100;
                $(this).width(($(this).width() * content_width) - 5);
            }
            else {

                init_content_settings(this);
                /*bootstrapAngular(this);*/
                //toggle_content_settings(this);
            }
        });

        $('body').one('click', '[data-key="field_55198982d16b7109a"]',function(){
            var el = $("#acf_acf_sidfot");
            /*bootstrapAngular(el);*/
        });
        //$("#acf-field-footer-show-accesspackage-1").change(function(){
        //    if(this.checked){
        //        var el = $("#acf_acf_sidfot");
        //        bootstrapAngular(el);
        //    }
        //});

        /* ---- Functions ----- */

        function bootstrapAngular($parent){
            if ($parent instanceof jQuery == false)
                $parent = $($parent);
            //target data-app = elasticaccesspackage
            var appToBe = $parent.find('[data-app="elasticaccesspackage"]');

            if (appToBe.hasClass('ng-scope')) return;
            var fakeAdress = $parent.find('#addressBar');
            var acfHashField = $parent.find('[data-field_key="field_elasticaccess-hash"] input');
            var initHash = acfHashField.val();
            var ngInitString = "init('', '', 'List', 'Button', 'objekt.html', '"+initHash+"'); lock('true'); title(''); text('');";

            var setupCtrl = appToBe.find('[ng-controller="SetupCtrl"]');
            //console.log(setupCtrl);
            setupCtrl.attr('ng-init', ngInitString);
            //get clean dom
            var el = appToBe[0];
            //bootstrap angular module ElasticAccess
            /*angular.bootstrap(el, ['ElasticAccess']);*/
            setupListeners();

        }
 

        function toCamelCase(string){
            return string.replace(/^([A-Z])|[\s-_](\w)/g, function(match, p1, p2, offset) {
                if (p2) return p2.toUpperCase();
                return p1.toLowerCase();
            });
        };
        function change_colors(selector, new_palettes, new_titles) {

            $(selector).iris({
                mode: 'hsv',
                palettes: new_palettes,
                width: 320,
                change: function (event, ui) {
                    console.log('changed palettes');
                    $(this).find('.wp-color-result').css('background-color', ui.color.toString());
                    $(this).find('.wp-color-picker').val(ui.color.toString());
                    /*
                     -- OPTIMIZE -- Changes Textarea BG-color
                     var textarea = $(this).parent().parent().parent().parent().find('tr[data-field_name="slideshow-caption-content"] textarea');
                     var editorID = textarea.attr('id');
                     var editor = tinyMCE.get(editorID);

                     editor.getBody().style.backgroundColor = ui.color.toString();
                     */
                }
            });

            $(selector).find('.iris-palette').each(function (i) {
                $(this).attr("title", new_titles[i]);
            });
        }

        function toggle_overlay(selector) {
            if ($(selector).hasClass('hidden')) {
                $(selector).toggleClass('hidden');
            } else {
                $(selector).addClass('hidden');
            }
        }

        function open_overlay(selector) {
            if ($(selector).hasClass('hidden')) {
                $(selector).removeClass('hidden');
            }
        }

        function close_overlay(selector) {
            if ($(selector).hasClass('hidden') == false) {
                $(selector).addClass('hidden');
            }
        }

        function bind_close_key(selector) {
            $(document).bind('keydown', function (e) {
                if (e.which == 27 && $(selector).hasClass('hidden') == false) {
                    close_overlay(selector);
                }
            });
        }

        function init_row_settings(row) {
            var settings_button = $(row).find('tr[data-field_name="row-settings"] input.checkbox');

            if ($(row).find(".settings-wrapper").length > 0) {
            }
            else {
                wrap_row_settings(row);
            }

            $(settings_button).live('click', function (e) {
                e.preventDefault();
                toggle_row_settings(row);
            });

            $(row).find('.values > .layout').each(function () {
                change_content_width(this);
            });
        }

        function init_content_settings(content) {
            if ($(content).find(".content-wrapper").length > 0) {
            }
            else {
                $(content).find('ul.acf-fc-layout-controlls')
                    .prepend('<li><a href="#" class="layout-settings-button"><i class="dashicons-before dashicons-edit"></i></a></li>');
                wrap_content_settings(content);
            }
            var content_settings_button = $(content).find('.layout-settings-button');

            $(content_settings_button).live('click', function (e) {
                e.preventDefault();
                toggle_content_settings(content);
            });

            $(content).find("tr[data-field_name='content-width'] ul input").change(function () {
                var value = $(this).val() + '%';
                $(this).closest(".layout").css("width", value);
            });

            $(content).find("tr[data-field_name='content-admin-header'] input").on('change', function () {
                var value = $(this).val();
                if (jQuery.trim(value).length > 0) {
                    var header = $(this).closest(".layout").find(".acf-fc-layout-handle");
                    var number = $(header).find(".fc-layout-order");
                    var html = $(number).text() + '. ' + value;
                    $(header).html(html);
                }

            });


        }

        function toggle_row_settings(row) {
            toggle_overlay($('.admin-overlay'));
            toggle_overlay($(row).find('.settings-wrapper'));
        }

        function toggle_content_settings(content) {
            toggle_overlay($('.admin-overlay'));
            toggle_overlay($(content).find('.content-wrapper'));
        }

        function wrap_row_settings(row) {
            $(row).find('tr[data-field_name^="row-settings-"]')
                .wrapAll('<div class="settings-wrapper hidden"><table class="settings-table"></table></div>');
            $(row).find('.settings-table')
                .prepend('<span class="settings-header"><span class="settings-title">Inställningar</span></span>')
                .append('<span class="settings-footer"><a class="close-admin-overlay"><i class="fa fa-fw fa-check"></i> OK</a></span>');

            $($(row).find('.close-admin-overlay')).live('click', function (e) {
                e.preventDefault();
                close_overlay($('.admin-overlay'));
                close_overlay($(row).find('.settings-wrapper'));
            });           

            bind_close_key($(row).find('.settings-wrapper'));
        }

        function wrap_content_settings(content) {
            $(content).find('table.acf-input-table')
                .wrap('<div class="content-wrapper hidden"/>');
            $(content).find('.content-wrapper')
                .prepend('<span class="content-header"><span class="content-title">Inställningar</span><a class="close-admin-overlay"><i class="fa fa-times"></i></a></span>')
                .append('<span class="content-footer"><a class="close-admin-overlay"><i class="fa fa-fw fa-check"></i> OK</a></span>');

            $(content).find('.close-admin-overlay').live('click', function (e) {
                e.preventDefault();
                close_overlay($('.admin-overlay'));
                close_overlay($(content).find('.content-wrapper'));
            });

            bind_close_key($(content).find('.content-wrapper'));
        }

        function change_content_width(selector) {
            var value = $(selector).find("tr[data-field_name='content-width'] ul input:checked").val() + '%';
            $(selector).css("width", value);

            var value_title = $(selector).find("tr[data-field_name='content-admin-header'] input").val();
            if (jQuery.trim(value_title).length > 0) {
                //console.log(value_title);
                var header = $(selector).find(".acf-fc-layout-handle");
                var number = $(header).find(".fc-layout-order");
                var html = $(number).text() + '. ' + value_title;
                $(header).html(html);
            }

            //fix accesspackage maybe move?
            // 1. fix content width colspan for filter
            function resizeAccessPackage($content) {
                var row = $content.find('[data-field_name="accesspackage-search"]');
                row.find('td.label').remove();
                row.find('td').attr('colspan', '2')
            }

            // 2. open and close range selects. close on clickanywhere
            $('body').on('click', '.range-select .dropdown-toggle, #range_ a.form-control', function (e) {
                e.preventDefault();

                var $dropdown = $(this).parent().find('ul.dropdown-menu');

                if ($dropdown.is(':visible')) {
                    $dropdown.hide();
                } else {
                    $('ul.dropdown-menu:visible').hide();
                    $dropdown.show();
                }
            });
        }
    });
})(jQuery);

