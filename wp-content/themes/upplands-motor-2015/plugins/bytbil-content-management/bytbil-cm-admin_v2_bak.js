(function($){
    $(function(){

        /* ---- ON LOAD ----- */

        $("body").append("<div class='admin-overlay hidden'></div>");
        bind_close_key($('.admin-overlay'));

        init_content_settings();


        /* --- EACHES --- */
        $('#acf-row tr.row').each(function(){
            init_row_settings(this);
        });


        /* --- ARRIVES --- */

        // -- Row
        $('#acf-row').arrive('tr.row', function(){
            setTimeout(500);
            if($(this).hasClass('ui-sortable-helper') || $(this).hasClass('ui-sortable-placeholder')){
            }
            else {
                init_row_settings(this);
                toggle_row_settings(this);
            }
        });

        // -- Colorpicker
        $('body').arrive('.acf-color_picker', function() {
            var um_palettes = ['#fff', '#151515', '#eb2227', '#86a6b2', '#ff8500', '#003057', '#fdb414', '#003690', '#1351d8'];
            var um_titles = ['Vit', 'Svart', '#UM Röd', 'UM Blå', 'UM Orange', 'UM Blå', 'Renault Gul', 'Dacia Blå', 'Ford Blå']
            change_colors(this, um_palettes, um_titles);
        });


        /* ---- Functions ----- */

        function change_colors(selector, new_palettes, new_titles) {
            $(selector).iris({
                mode: 'hsv',
                palettes: new_palettes,
                width: 320,
                change: function(event, ui){
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

            $(selector).find('.iris-palette-container:last-of-type .iris-palette').each(function(i){
                $(this).attr("title",new_titles[i]);
            });
        }

        function toggle_overlay(selector){
            if($(selector).hasClass('hidden')){
                $(selector).toggleClass('hidden');
            } else {
                $(selector).addClass('hidden');
            }
        }

        function open_overlay(selector){
            if($(selector).hasClass('hidden')){
                $(selector).removeClass('hidden');
            }
        }

        function close_overlay(selector){
            if($(selector).hasClass('hidden') == false){
                $(selector).addClass('hidden');
            }
        }

        function bind_close_key(selector){
            $(document).bind('keydown', function(e) {
                if (e.which == 27 && $(selector).hasClass('hidden') == false) {
                    close_overlay(selector);
                }
            });
        }

        function init_row_settings(row){
            var settings_button = $(row).find('tr[data-field_name="row-settings"] input.checkbox');

            if ($(row).find(".settings-wrapper").length > 0){
            }
            else {
                wrap_row_settings(row);
            }

            $(settings_button).live('click', function(e){
                e.preventDefault();
                toggle_row_settings(row);
            });

            $(row).find('.values > .layout').each(function(){
                init_content_settings(this);
                change_content_width(this);
            });
        }

        function toggle_row_settings(row){
            toggle_overlay($('.admin-overlay'));
            toggle_overlay($(row).find('.settings-wrapper'));
        }

        function wrap_row_settings(row){
            $(row).find('tr[data-field_name^="row-settings-"]')
                .wrapAll('<div class="settings-wrapper hidden"><table class="settings-table"></table></div>');
            $(row).find('.settings-table')
                .prepend('<span class="settings-header"><span class="settings-title">Inställningar</span></span>')
                .append('<span class="settings-footer"><a class="close-admin-overlay"><i class="fa fa-fw fa-check"></i> OK</a></span>');

            $($(row).find('.close-admin-overlay')).live('click', function(e){
                e.preventDefault();
                close_overlay(row);
            });

            bind_close_key($(row).find('.settings-wrapper'));
        }

        function change_content_width(selector){
            var value = $(selector).find("tr[data-field_name='content-width'] ul input:checked").val() + '%';
            $(selector).css("width", value);
        }

        function init_content_settings(content){
            if($(content).find(".layout-settings-button").length > 0){

            }
            else {
                $(content).find('ul.acf-fc-layout-controlls')
                    .prepend('<li><a href="#" class="layout-settings-button"><i class="fa fa-pencil"></i></a></li>');

                wrap_content_settings(content);
            }

            $(content).find("tr[data-field_name='content-width'] ul input").change(function() {
                var value = $(this).val() + '%';
                $(this).closest(".layout").css("width",value);
            });
        }

        function wrap_content_settings(content){
            $(content).find('table.acf-input-table')
                .wrap('<div class="content-wrapper hidden"/>');
            $(content).find('.content-wrapper')
                .prepend('<span class="content-header"><span class="content-title">Inställningar</span><a class="close-admin-overlay"><i class="fa fa-times"></i></a></span>')
                .append('<span class="content-footer"><a class="close-admin-overlay"><i class="fa fa-fw fa-check"></i> OK</a></span>');

            $(content).find('.layout-settings-button').live('click', function(e){
                e.preventDefault();
                toggle_content_settings(content);
            });

            $(content).find('.close-admin-overlay').live('click', function(e){
                e.preventDefault();
                toggle_content_settings(content);
            });

            bind_close_key($(content).find('.content-wrapper'));
        }

        function toggle_content_settings(content){
            toggle_overlay('.admin-overlay');
            toggle_overlay($(content).find('.content-wrapper'));
        }


        /*$(".acf-flexible-content > .values > .layout").each(function(){
            var value = $(this).find("tr[data-field_name='content-width'] ul input:checked").val() + '%';
            $(this).css("width",value);
        });*/
        /*

        $(".layout").each(function(e){

            var icon_field = $(this).find("[data-field_name='bytbil-icon']");


            $(icon_field).find("td.label").append("<span class='icon-holder'><span class='icon-none'>Ingen</span></span><a href='#' class='button btn btn-default toggle-icons'>Välj ikon</a>");

            $(icon_field).find("ul").wrap("<div class='icon-wrapper hidden' />").prepend("<span class='content-header'><span class='content-title'>Välj ikon</span><a class='close-icon-overlay'><i class='fa fa-times'></i></a></span>").append("<span class='content-footer'><a class='close-icon-overlay'><i class='fa fa-fw fa-check'></i> OK</a></span>");

            var selected_icon = $(icon_field).find("input:checked");

            if ($(selected_icon).val() != 'none'){
                $(icon_field).find(".icon-holder").html("<i class=' " + $(selected_icon).val() + "'></i>");
            }

            $(icon_field).find(".toggle-icons").live('click', function(e){
                var current_row = $(this).parent().parent();
                e.preventDefault();
                if($(".admin-overlay").hasClass("hidden") != false){
                    $(".admin-overlay").toggleClass("hidden");
                }
                $(current_row).find(".icon-wrapper").toggleClass("hidden");
                $(current_row).find(".icon-wrapper input").click(function() {
                    var value = $(this).val();
                    if(value != 'none'){
                        $(current_row).find(".icon-holder").html("<i class=' " + value + "'></i>");
                    }
                    else {
                        $(current_row).find(".icon-holder").html("<span class='icon-none'>Ingen</span>");
                    }
                });
            });
        });

        $(".values").arrive('.layout', function(){

            var icon_field = $(this).find("[data-field_name='bytbil-icon']");

            $(icon_field).find(".toggle-icons").live('click', function(e){
                var current_row = $(this).parent().parent();
                e.preventDefault();
                if($(".admin-overlay").hasClass("hidden") != false){
                    $(".admin-overlay").toggleClass("hidden");
                }
                $(current_row).find(".icon-wrapper").toggleClass("hidden");
                $(current_row).find(".icon-wrapper input").click(function() {
                    var value = $(this).val();
                    if(value != 'none'){
                        $(current_row).find(".icon-holder").html("<i class=' " + value + "'></i>");
                    }
                    else {
                        $(current_row).find(".icon-holder").html("<span class='icon-none'>Ingen</span>");
                    }
                });
            });

        });

        $('#acf-row').arrive('.row', function() {
            $('.values').arrive('.layout', function(){
                var icon_field = $(this).find("[data-field_name='bytbil-icon']");

                $(icon_field).find(".toggle-icons").live('click', function(e){
                    var current_row = $(this).parent().parent();
                    e.preventDefault();
                    if($(".admin-overlay").hasClass("hidden") != false){
                        $(".admin-overlay").toggleClass("hidden");
                    }
                    $(current_row).find(".icon-wrapper").toggleClass("hidden");
                    $(current_row).find(".icon-wrapper input").click(function() {
                        var value = $(this).val();
                        if(value != 'none'){
                            $(current_row).find(".icon-holder").html("<i class=' " + value + "'></i>");
                        }
                        else {
                            $(current_row).find(".icon-holder").html("<span class='icon-none'>Ingen</span>");
                        }
                    });
                });

            });
        });

        $(".close-icon-overlay").live('click', function(e){
            var parent_row = $(this).parent().parent().parent().parent();
            e.preventDefault();
            if($(".admin-overlay").hasClass("hidden") != false){
                $(".admin-overlay").addClass("hidden");
            }
            $(parent_row).find(".icon-wrapper").toggleClass("hidden");
        }); */



            //var input = $(this).find("input");
            //$(this).append("<i class='"+ input.val() +"'></i>");
            //alert(icon_class.val());
            //alert($this.val());
            //var icon_class = $(this).closest("input").val();
            //$(this).closest("input").html("<i class='"+ icon_class +"'></i>");


    });
})(jQuery);
