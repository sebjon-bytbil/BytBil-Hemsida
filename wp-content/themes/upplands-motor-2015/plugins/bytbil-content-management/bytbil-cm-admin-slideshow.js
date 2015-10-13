(function($){
    $(function(){

        /* ---- ON LOAD -----*/

        $("body").append("<div class='admin-overlay hidden'></div>");

        bind_close_key($('.admin-overlay'));

        var um_palettes = ['#fff', '#151515', '#eb2227', '#86a6b2', '#ff8500', '#003057', '#fdb414', '#003690', '#1351d8'];
        var um_titles = ['Vit', 'Svart', '#UM Röd', 'UM Blå', 'UM Orange', 'UM Blå', 'Renault Gul', 'Dacia Blå', 'Ford Blå'];

        // -- Colorpicker
        $('body').arrive('.acf-color_picker', function() {
            change_colors(this, um_palettes, um_titles);
        });

        $('#acf-row tr.row').each(function(){
            init_row_settings(this);
        });

        $('.values > .layout').each(function(){
            init_content_settings(this);
        });

        $('#acf-row').arrive('tr.row', function(){
            setTimeout(500);
            if($(this).hasClass('ui-sortable-placeholder')){
            }
            else {
                init_row_settings(this);
                toggle_row_settings(this);
            }

            $(this).arrive('.layout', function(){

                if ($(this).hasClass('ui-sortable-placeholder')){
                    var content_helper = $(this).parent().find('.ui-sortable-helper');
                    var content_width = $(content_helper).find('tr[data-field_name="content-width"] input:checked').val() / 100;
                    $(this).width(($(this).width() * content_width)-5);
                }
                else {
                    init_content_settings(this);
                    //toggle_content_settings(this);
                }
            });

        });

        $('.values').arrive('.layout', function(){

            if ($(this).hasClass('ui-sortable-placeholder')){
                var content_helper = $(this).parent().find('.ui-sortable-helper');
                var content_width = $(content_helper).find('tr[data-field_name="content-width"] input:checked').val() / 100;
                $(this).width(($(this).width() * content_width)-5);
            }
            else {
                init_content_settings(this);
                //toggle_content_settings(this);
            }
        });







        /* ---- Functions ----- */

        function change_colors(selector, new_palettes, new_titles) {

            $(selector).iris({
                mode: 'hsv',
                palettes: new_palettes,
                width: 320,
                change: function(event, ui){
                    //console.log('changed palettes');
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

            $(selector).find('.iris-palette').each(function(i){
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
                change_content_width(this);
            });
        }

        function init_content_settings(content){
            if ($(content).find(".content-wrapper").length > 0){
            }
            else {
                $(content).find('ul.acf-fc-layout-controlls')
                    .prepend('<li><a href="#" class="layout-settings-button"><i class="fa fa-pencil"></i></a></li>');
                wrap_content_settings(content);
            }
            var content_settings_button = $(content).find('.layout-settings-button');

            $(content_settings_button).live('click', function(e){
                e.preventDefault();
                toggle_content_settings(content);
            });

            $(content).find("tr[data-field_name='content-width'] ul input").change(function() {
                var value = $(this).val() + '%';
                $(this).closest(".layout").css("width",value);
            });

            $(content).find("tr[data-field_name='content-admin-header'] input").on('change', function(){
                var value = $(this).val();
                if(jQuery.trim(value).length > 0)
                {
                    var header = $(this).closest(".layout").find(".acf-fc-layout-handle");
                    var number = $(header).find(".fc-layout-order");
                    var html = $(number).text() + '. ' + value;
                    $(header).html(html);
                }

            });



        }

        function toggle_row_settings(row){
            toggle_overlay($('.admin-overlay'));
            toggle_overlay($(row).find('.settings-wrapper'));
        }

        function toggle_content_settings(content){
            toggle_overlay($('.admin-overlay'));
            toggle_overlay($(content).find('.content-wrapper'));
        }

        function wrap_row_settings(row){
            $(row).find('tr[data-field_name^="row-settings-"]')
                .wrapAll('<div class="settings-wrapper hidden"><table class="settings-table"></table></div>');
            $(row).find('.settings-table')
                .prepend('<span class="settings-header"><span class="settings-title">Inställningar</span></span>')
                .append('<span class="settings-footer"><a class="close-admin-overlay"><i class="fa fa-fw fa-check"></i> OK</a></span>');

            $($(row).find('.close-admin-overlay')).live('click', function(e){
                e.preventDefault();
                close_overlay($('.admin-overlay'));
                close_overlay($(row).find('.settings-wrapper'));
            });

            bind_close_key($(row).find('.settings-wrapper'));
        }

        function wrap_content_settings(content){
            $(content).find('table.acf-input-table')
                .wrap('<div class="content-wrapper hidden"/>');
            $(content).find('.content-wrapper')
                .prepend('<span class="content-header"><span class="content-title">Inställningar</span><a class="close-admin-overlay"><i class="fa fa-times"></i></a></span>')
                .append('<span class="content-footer"><a class="close-admin-overlay"><i class="fa fa-fw fa-check"></i> OK</a></span>');

            $(content).find('.close-admin-overlay').live('click', function(e){
                e.preventDefault();
                close_overlay($('.admin-overlay'));
                close_overlay($(content).find('.content-wrapper'));
            });

            bind_close_key($(content).find('.content-wrapper'));
        }

        function change_content_width(selector){
            var value = $(selector).find("tr[data-field_name='content-width'] ul input:checked").val() + '%';
            $(selector).css("width", value);

            var value_title = $(selector).find("tr[data-field_name='content-admin-header'] input").val();
            if(jQuery.trim(value_title).length > 0)
            {
                //console.log(value_title);
                var header = $(selector).find(".acf-fc-layout-handle");
                var number = $(header).find(".fc-layout-order");
                var html = $(number).text() + '. ' + value_title;
                $(header).html(html);
            }

        }

    });
})(jQuery);
