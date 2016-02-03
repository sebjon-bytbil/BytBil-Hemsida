(function(){
    tinymce.PluginManager.add( 'wp_button', function( ed, url ) {
        init : function(ed, url){

            // Register Commands
            ed.addCommand('wp_insert_button', function(){
                ed.windowManager.open({
                    file            : url + '/shortcode-add-button-window.php',
                    width           : 800,
                    height          : 600,
                    close_previous  : 'yes',
                    inline          : 'yes',
                    //  popup_css       : false,
                    // popup_css       : url + '/css/tinymce-window.css',
                    resizable       : 'no',
                }, {
                    plugin_url      : url
                });
            });

            // Register Buttons
            ed.addButton('wp_button', {
                title   : 'Button',
                //image   : url + '/images/tinymce-button.png',
                cmd     : 'wp_insert_button'
            });
        }
    });
})();
