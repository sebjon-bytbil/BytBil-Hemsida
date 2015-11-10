function deactivate_block_fields(element) {
    if (get_template() == 'single_blocks.php' || get_template() == 'single_blocks_af.php') {

        $(element).find('tr[data-field_name="af-editable"]').hide();
        $(element).find('tr[data-field_name="block-background"]').hide();
        $(element).find('tr[data-field_name="padding"]').hide();
        $(element).find('tr[data-field_name="margin"]').hide();
        $(element).find('tr[data-field_name="block-width"]').hide();
        $(element).find('tr[data-field_name="block-height"]').hide();
        $(element).find('.acf-button-add, .acf-button-remove').hide();
        $(element).find('.inner').prepend('<div class="click-blocker"></div>');
        $('#postdivrich').hide();

    }
}

function get_template() {
    var current_template = $('#page_template option[selected="selected"]').attr('value');
    return current_template;
}


jQuery(function ($) {

    $(window).load(function () {
        //--Startsida--//
        //Titel//
        $('#titlewrap input').prop('disabled', true);

        //Checkboxes//

        $('#acf-dolj-rubrik').hide();
        $('#acf-hideable').hide();
        $('#acf-hidden').hide();

        var isChecked = $('#acf-hideable input').is(':checked');  // Boolean true
        if (isChecked == true) {
            $('#acf-hidden').show();
        } else {
            $('#acf_acf_startsidorhide').hide();
        }


        // Hide on blocks
        if (get_template() == 'single_blocks.php' || get_template() == 'single_blocks_af.php') {

            $('#acf-html-blocks > .repeater > table > tbody > tr').each(function () {
                var container = $(this);
                var af_editable = $(container).find('tr[data-field_name="af-editable"] input.checkbox').attr('checked');

                if (af_editable != 'checked') {
                    deactivate_block_fields(container);
                }

                else {
                    $(container).find('tr[data-field_name="af-editable"]').hide();
                }

            });
        } else {
            $('#acf_acf_block, #acf_acf_doldh1').remove();
        }

        // Permalink //
        $('#edit-slug-box span#sample-permalink span#editable-post-name').click(function () {
            var self = this;
            setTimeout(function () {
                $(self).find('input').prop('disabled', true);
            }, 50);
        });

        // Publicera //
        $('#minor-publishing').find('a').hide();

        // Föräldrar //
        $('#pageparentdiv').find('select').prop('disabled', true);
        $('#pageparentdiv').find('input').prop('disabled', true);

        // Ninjaforms //
        $('#ninja_forms_selector').find('select').prop('disabled', true);
        // Beskrivning
        $('#acf-description').addClass('disabled-class');


        //--Bilsida GA-Styrd--//
        // Rubrik //
        $('#acf-rubriktexten input').prop('disabled', true);

        //--Utrustning Motorvarianter--//
        $('#acf-field-field_532aea391aaf3_0_field_532aeb0706502').prop('disabled', true);

        /* Bakgrundsbilder */
        $('#authordiv').parents('.postbox-container').find("#normal-sortables").children().not("#acf_acf_seo-vdw, #acf_acf_doldh1, #acf_acf_block").addClass("acf-hidden");
        $("#acf_acf_doldh1, #acf_acf_seo-vdw, #acf_acf_block").removeClass("acf-hidden");

        //--Generell Editor--//
        /*
         setInterval(function(){
         tinymce.activeEditor.getBody().setAttribute('contenteditable', false); //

         // This disables the buttons in the editor toolbar
         $('#wp-content-editor-container button').click(function (e) {
         e.preventDefault();
         return false;
         });

         $('.wp-editor-container .mce-toolbar-grp').hide();
         },300); */
    })
});
