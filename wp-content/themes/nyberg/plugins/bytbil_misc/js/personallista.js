jQuery(document).ready(function ($) {

    tinymce.create('tinymce.plugins.wpse72394_plugin', {
        init: function (ed, url) {
            // Register command for when button is clicked
            ed.addCommand('wpse72394_insert_shortcode', function () {
                selected = tinyMCE.activeEditor.selection.getContent();

                var styles = 'display: block; width: 400px; height: 400px; background: rgba(255,255,255,0.9); box-shadow: 0 2px 2px 0 rgba(0,0,0,.8); padding: 20px;position: absolute; z-index: 99; left: 150px;'
                var input = '<input style="display: none; z-index: 100; width: 100%; height: 30px; border: 0; border-radius: 0px; box-shadow inset 0 2px 2px 0 #rgba(0,0,0,0.8); padding: 5px; margin: 0px 0 15px 10px; border: 1px solid #eee;" class="name s" type="text" name="" placeholder="Fyll namnet på det du vill infoga med snabbkod."></input>';
                var html = '<div style="' + styles + '" id="shortcode-selection"><h2>Välj en snabbkod att infoga</h2><div class="choice"><span class="bildspel">Bildspel</span>' + input + '</div><div class="choice"><span class="personallista">Personallista</span>' + input + '</div><a href="#" style="display: block; z-index: 100; background: #c00; border: 1px #d00 solid; color: #fff; margin-right: 10px; float: left;" class="button button-danger close">Stäng</a><a href="#" style="display: block; z-index: 100; float: left;" class="button button-default submit" disabled>Lägg in shortcode</a>';

                $('#wp-content-editor-container').prepend(html);


                $('#shortcode-selection div span').click(function (e) {
                    $(this).parent().siblings().find('input').val(null);
                    $(this).parent().siblings().find('input').css('display', 'none');
                    var input = $(this).parent().find('input');
                    var span = $(this);
                    $(input).slideToggle();

                    choice = $(this).parent().find('input');

                    $(choice).keyup(function () {
                        $('a.button').removeAttr('disabled').attr('enabled', 'enabled');
                        $(this).parent().parent().siblings().find('input').val(null);
                    });


                    $('a.submit').click(function () {
                        content = null;
                        shortcode = null;
                        val = $(choice).val();

                        if (val != '') {
                            content = '[' + $(span).attr('class') + ' namn="' + val + '"]';
                            tinymce.execCommand('mceInsertContent', false, content);
                        }

                    });


                    $('a.close').click(function () {
                        $("#shortcode-selection").css('display', 'none');
                    });


                });


            });

            // Register buttons - trigger above command when clicked
            ed.addButton('wpse72394_button', {
                title: 'Insert shortcode',
                cmd: 'wpse72394_insert_shortcode',
                image: url + '/img/shortcodes.png'
            });
        },
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('wpse72394_button', tinymce.plugins.wpse72394_plugin);
});