(function($){
    
    $(function(){



        //* page *//
        var topRows = "#acf-row  .repeater  .acf-input-table  tr.row:has(.repeater)",
        childRows = "#acf-row  .repeater .repeater .acf_input-wrap";

        var sectionContainers = {
            ignore: [
                'content-layout',
                'content-admin-header',
                'content-tab',
                'content-tab-text',
                'content-width'
            ],
            custom: ['content-wysiwyg'],
            open_hours: [
                'content-open-hours-layout',
                'content-open-hours-facility',
                'content-open-hours-department'
            ],
            slideshow: [
                'content-slideshow-type',
                'content-existing-slideshow',
                'content-slideshow-offers',
                'content-slideshow-brand',
                'content-slideshow-facility',
                'content-slideshow-offer-type',
                'content-slideshow-offers-specific',
                'content-slideshow-model'
            ],
            block: [
                'content-block-background',
                'content-block-contents',
                'content-block-shadow'
            ],
            equipment: [
                'content-equipment-contents',
                'content-equipment',
                'content-equipment-package',
                'content-equipment-models'
            ],
            news: [
                'content-news-layout',
                'content-news-amount'
            ],
            facility: [
                'content-facility'
            ],
            employees: [
                'content-slider',
                'content-employees-paging',
                'content-employees-hide-brand',
                'content-employee-layout',
                'content-employees-specific',
                'content-employees-list',
                'content-employees-department',
                'content-employees-cities',
                'content-employees-brand'
            ],
            form: [
                'content-existing-form',
                'content-form-layout'
            ],
            vehicle: [
                'content-vehicle-contents',
                'content-vehicle-model'
            ],
            section: [
                'content-section'
            ],
            offers: [
                'content-offers-choice',
                'content-offers-specific',
                'content-offer-brands',
                'content-offer-facility',
                'content-offer-type',
                'content-offer-row',
                'content-offer-amount'
            ],
            accesspackage: [
                'accesspackage-view-picker',
                'accesspackage-count',
                'accesspackage-search-type',
                'accesspackage-search',
                'accesspackage-filter',
                'accesspackage-list',
                'accesspackage-hash',
                'accesspackage-load-type',
                'accesspackage-page',
                'accesspackage-object-page',
                'accesspackage-search-bg',
                'accesspackage-lock'
            ]

        }
        /* ---- ON LOAD -----*/

        $("body").append("<div class='admin-overlay hidden'></div>");

        bind_close_key($('.admin-overlay'));

        var um_palettes = ['#fff', '#151515', '#eb2227', '#86a6b2', '#ff8500', '#003057', '#fdb414', '#003690', '#1351d8'];
        var um_titles = ['Vit', 'Svart', '#UM Röd', 'UM Blå', 'UM Orange', 'UM Blå', 'Renault Gul', 'Dacia Blå', 'Ford Blå'];

        // -- Colorpicker
        $('body').arrive('.acf-color_picker', function() {
            change_colors(this, um_palettes, um_titles);
        });

        $(topRows).each(function(){
            init_row_settings(this);
        });

        $(childRows).each(function(){
            if($(this).parents('.row-clone').length > 0)
                return;

            init_content_settings(this);
            bootstrapAngular($(this));
        });

        $('#acf-row').arrive('tr.row', function(){
            //setTimeout(500);
            var hasParentRow = $(this).parents('.repeater').length > 1;
            if(hasParentRow)
                return;

            if($(this).hasClass('ui-sortable-placeholder')){
            }
            else {
                init_row_settings(this);
                toggle_row_settings(this);
            }

            $(this).arrive('.acf_input-wrap', function(){

                if ($(this).hasClass('ui-sortable-placeholder')){
                    var content_helper = $(this).parent().find('.ui-sortable-helper');
                    var content_width = $(content_helper).find('tr[data-field_name="content-width"] input:checked').val() / 100;
                    $(this).width(($(this).width() * content_width)-5);
                }
                else {
                    //init_content_settings(this);
                    //toggle_content_settings(this);
                }
            });

        });

        $('#acf-row  .acf_postbox > .repeater .row_layout').arrive('.acf_input-wrap', function(){
            
            if ($(this).hasClass('ui-sortable-placeholder')){
                var content_helper = $(this).parent().find('.ui-sortable-helper');
                var content_width = $(content_helper).find('tr[data-field_name="content-width"] input:checked').val() / 100;
                $(this).width(($(this).width() * content_width)-5);
            }
            else {
                //this is moved to acf/setup_fields event on document
                //init_content_settings(this);
            //    toggle_content_settings(this);
            }
        });


        $(document).on('acf/setup_fields', function(e, new_field){
            
            var hasParentRow = $(new_field).parents('.repeater').length > 1;
            if(!hasParentRow)
                return;
                
                init_content_settings($(new_field).find('.acf_input-wrap'));
                //toggle_content_settings(new_field);
                bootstrapAngular($(new_field));
            
        });

        $('body').on('change', '[data-field_name="content-layout"] select', function(){
            var $block = $(this).parents('.content-wrapper').first();
            var section = $(this).val();
            showOrHideFieldsForSelections($block, section);

        });

        /*******************************************************
        ****************** NESTED CONDITIONALS *****************/        

        $('#poststuff').on('change', '[data-field_name="content-tab"] input', function(e){
            
            
            var $tbody = $(this).parents('tbody').first(),
                value = $(this).val();
            if (value === "true") {
                $tbody.find('[data-field_name="content-tab-text"]').show();
            }else{
                $tbody.find('[data-field_name="content-tab-text"]').hide();
            }
        });



        $('#poststuff').on('change', '[data-field_name="content-slideshow-type"] select', function(e){
            
            
            var $tbody = $(this).parents('tbody').first(),
                value = $(this).val();
            //rewrite this to a better 
            $tbody.find('[data-field_name="content-existing-slideshow"]').hide()
            $tbody.find('[data-field_name="content-slideshow-offers"]').hide()
            $tbody.find('[data-field_name="content-slideshow-model"]').hide()
            //these are nested
            $tbody.find('[data-field_name="content-slideshow-brand"]').hide();
            $tbody.find('[data-field_name="content-slideshow-facility"]').hide();
            $tbody.find('[data-field_name="content-slideshow-offer-type"]').hide();
            $tbody.find('[data-field_name="content-slideshow-offers-specific"]').hide();

            if (value === "existing") {
                $tbody.find('[data-field_name="content-existing-slideshow"]').show();
            }else if(value === "offers"){
                $tbody.find('[data-field_name="content-slideshow-offers"]').show();
                $tbody.find('[data-field_name="content-slideshow-offers"] input:checked').trigger('change');
            }else if(value === "models"){
                $tbody.find('[data-field_name="content-slideshow-model"]').show();
            }
        });

        $('#poststuff').on('change', '[data-field_name="content-slideshow-offers"] input', function(e){
            //this event init triggers from [data-field_name="content-slideshow-type"] select on change
            
            
            var $tbody = $(this).parents('tbody').first(),
                value = $(this).val();

            $tbody.find('[data-field_name="content-slideshow-brand"]').hide();
            $tbody.find('[data-field_name="content-slideshow-facility"]').hide();
            $tbody.find('[data-field_name="content-slideshow-offer-type"]').hide();
            $tbody.find('[data-field_name="content-slideshow-offers-specific"]').hide();

            if (value === "automatic") {
                $tbody.find('[data-field_name="content-slideshow-brand"]').show();
                $tbody.find('[data-field_name="content-slideshow-facility"]').show();
                $tbody.find('[data-field_name="content-slideshow-offer-type"]').show();
            }else{
                $tbody.find('[data-field_name="content-slideshow-offers-specific"]').show();
            }
        });



        $('#poststuff').on('change', '[data-field_name="content-equipment-contents"] select', function(e){
            
            
            var $tbody = $(this).parents('tbody').first(),
                value = $(this).val();
            //rewrite this to a better 
            $tbody.find('[data-field_name="content-equipment"]').hide()
            $tbody.find('[data-field_name="content-equipment-package"]').hide()
            $tbody.find('[data-field_name="content-equipment-models"]').hide()

            if (value === "custom") {
                $tbody.find('[data-field_name="content-equipment"]').show();
            }else if(value === "package"){
                $tbody.find('[data-field_name="content-equipment-package"]').show();
            }else if(value === "model"){
                $tbody.find('[data-field_name="content-equipment-models"]').show();
            }
        });

        $('#poststuff').on('change', '[data-field_name="content-employee-layout"] select', function(e){
            
            
            var $tbody = $(this).parents('tbody').first(),
                value = $(this).val();
            //rewrite this to a better 
            $tbody.find('[data-field_name="content-employees-specific"]').hide()
            $tbody.find('[data-field_name="content-employees-list"]').hide()
            $tbody.find('[data-field_name="content-employees-department"]').hide()
            $tbody.find('[data-field_name="content-employees-brand"]').hide()
            $tbody.find('[data-field_name="content-employees-cities"]').hide()

            if (value === "specific") {
                $tbody.find('[data-field_name="content-employees-specific"]').show();
            }else if(value === "list"){
                $tbody.find('[data-field_name="content-employees-list"]').show();
            }else if(value === "automatisk"){
                $tbody.find('[data-field_name="content-employees-department"]').show();
                $tbody.find('[data-field_name="content-employees-brand"]').show();
                $tbody.find('[data-field_name="content-employees-cities"]').show();
            }
        });

        $('#poststuff').on('change', '[data-field_name="content-slider"] input', function(e){
            //this event init triggers from [data-field_name="content-slideshow-type"] select on change
            
            
            var $tbody = $(this).parents('tbody').first(),
                value = $(this).val();

            $tbody.find('[data-field_name="content-employees-paging"]').hide();

            if ($(this).is(':checked')) {
                $tbody.find('[data-field_name="content-employees-paging"]').show();
            }
        });

        $('#poststuff').on('change', '[data-field_name="content-offers-choice"] input', function(e){
            
            
            var $tbody = $(this).parents('tbody').first(),
                value = $(this).val();
                $tbody.find('[data-field_name="content-offers-specific"]').hide();
                $tbody.find('[data-field_name="content-offer-brands"]').hide();
                $tbody.find('[data-field_name="content-offer-facility"]').hide();
                $tbody.find('[data-field_name="content-offer-type"]').hide();
            if (value === "specific") {
                $tbody.find('[data-field_name="content-offers-specific"]').show();
            }else{
                $tbody.find('[data-field_name="content-offer-brands"]').show();
                $tbody.find('[data-field_name="content-offer-facility"]').show();
                $tbody.find('[data-field_name="content-offer-type"]').show();
            }
        });
        
        /*******************************************************
        ****************** END NESTED CONDITIONALS *************/ 

        //add class when ready to show elements
        $('#poststuff').addClass('loaded');


        /* ---- Functions ----- */

        function bootstrapAngular($parent){
            if ($parent instanceof jQuery == false)
                $parent = $($parent);

            //target data-app = elasticaccesspackage
            var appToBe = $parent.find('[data-app="elasticaccesspackage"]');

            if (appToBe.hasClass('ng-scope')) return;

            //get clean dom
            var el = appToBe[0];
            //bootstrap angular module ElasticAccess
            angular.bootstrap(el, ['ElasticAccess']);

            // remember to add flag for window location hash blocker!
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

            $(selector).find('.iris-palette').each(function(i){
                $(this).attr("title",new_titles[i]);
            });
        }

        function showOrHideFieldsForSelections(block, section){
            resizeAccessPackage(block);
            var $block = $(block),
                $fields = $block.find('.acf_input > tbody > tr');

                $fields.each(function(){
                    var fieldName = $(this).attr('data-field_name');
                    if (fieldName === undefined) {
                        return true;
                    };
                    if ($.inArray( fieldName, sectionContainers.ignore ) > -1) {
                        return true;
                    }

                    if ($.inArray( fieldName, sectionContainers[section] )  > -1 ) {
                        $(this).show();
                    }else{
                        $(this).hide();
                    }
                });

                $('[data-field_name="content-tab"] input:checked').trigger('change');
                if (section === "slideshow") {
                    $('[data-field_name="content-slideshow-type"] select').trigger('change');
                }else if(section === "equipment"){
                    $('[data-field_name="content-equipment-contents"] select').trigger('change');
                }else if(section === "employees"){
                    $('[data-field_name="content-employee-layout"] select').trigger('change');
                    $('[data-field_name="content-slider"] input').trigger('change');
                }else if(section === "offers"){
                    $('[data-field_name="content-offers-choice"] input:checked').trigger('change');
                }; 
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

            $(row).find('.row_layout').each(function(){
                change_content_width(this);
            });
        }

        function init_content_settings(content){
            
            if ($(content).find(".content-wrapper").length > 0){
            }
            else {
                if ($(content).find("ul.acf-fc-layout-controlls").length === 0) {
                    $(content).prepend('<ul class="acf-fc-layout-controlls"/>');
                }
                if ($(content).find(".acf-fc-layout-title").length === 0) {
                    $(content).prepend('<div class="acf-fc-layout-title" />');
                }
                $(content).find('ul.acf-fc-layout-controlls')
                    .prepend('<li><a href="#" class="layout-settings-button"><i class="fa fa-pencil"></i></a></li>');

                
                wrap_content_settings(content);
            }
            var content_settings_button = $(content).find('.layout-settings-button');
            SetRowHeader(content);
            SetRowWidth(content);
            

            $(content_settings_button).live('click', function(e){
                e.preventDefault();
                var $content = $(content);
                var type = $content.find('[data-field_name="content-layout"] select').val();
                showOrHideFieldsForSelections($content, type);
                toggle_content_settings(content);
                
                
                
            });

            $(content).find("tr[data-field_name='content-width'] ul input").change(function() {
                SetRowWidth($(this).parents('.row').first());
            });

            $(content).find("tr[data-field_name='content-admin-header'] input, tr[data-field_name='content-layout'] select").on('change', function(){
                    SetRowHeader($(this).parents('.row').first())
            });

        }



        function SetRowHeader(row){
            if (!$(row).is('.row')) row = $(row).closest('.row');
            var hasParentRow = $(row).parents('.repeater').length > 1;
            if (!hasParentRow) {
                return;
            };
            var $title = $(row).find('.acf-fc-layout-title'),
                blocktype = $(row).find('[data-field_name="content-layout"] select :selected').text(),
                adminTitle = $(row).find("tr[data-field_name='content-admin-header'] input").val(),
                displayTitle = "";

                if ( adminTitle != undefined && adminTitle.length > 0)
                    displayTitle = adminTitle;
                else
                    displayTitle = blocktype;

                
                
                $title.text(displayTitle);
        }

        function SetRowWidth(row){
            if (!$(row).is('.row')) row = $(row).closest('.row');
            var hasParentRow = $(row).parents('.repeater').length > 1;
            
            if (!hasParentRow) {
                return;
            };

            var width = $(row).find("tr[data-field_name='content-width'] ul input:checked").val();

            $(row).css("width",width + "%");
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
            $(content).find('table.acf_input')
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
            // var hasParentRow = $(selector).parents('.repeater').length > 1;
            
            // if(!hasParentRow) return;

            // var value = $(selector).find("tr[data-field_name='content-width'] ul input:checked").val() + '%';
            // $(selector).css("width", value);

            // var value_title = $(selector).find("tr[data-field_name='content-admin-header'] input").val();
            // if(jQuery.trim(value_title).length > 0)
            // {
            //     var header = $(selector).find(".acf-fc-layout-handle");
            //     var number = $(header).find(".fc-layout-order");
            //     var html = $(number).text() + '. ' + value_title;
            //     $(header).html(html);
            // }

        }

        //fix accesspackage maybe move?
        // 1. fix content width colspan for filter
        function resizeAccessPackage($content){
            var row = $content.find('[data-field_name="accesspackage-search"]');
            row.find('td.label').remove();
            row.find('td').attr('colspan', '2')
        }

        // 2. open and close range selects. close on clickanywhere
        $('body').on('click', '.range-select .dropdown-toggle, #range_ a.form-control', function(e){
            e.preventDefault();
            
            var $dropdown = $(this).parent().find('ul.dropdown-menu');

            if ($dropdown.is(':visible')) {
                $dropdown.hide();
            }else{
                $('ul.dropdown-menu:visible').hide();
                $dropdown.show();
            }
        });

        // 3. order by button must work 
        $('body').on('click', '#range_ button.form-control', function(e){
            e.preventDefault();

        });

        
          
           

    });
        
        
})(jQuery);
