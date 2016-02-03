(function () {
    tinymce.create('tinymce.plugins.bytbilslider', {
        init: function (ed, url) {
            ed.addButton('bytbilslider', {
                title: 'Bildspel',
                image: '/wp-content/themes/nyberg/plugins/bytbil_misc/js/img/bildspel.png',
                onclick: function () {
                    var name = prompt("Namn (slug)", "");

                    if (name == null) {
                        ed.execCommand('mceInsertContent', false, '[slider]');
                    } else {
                        ed.execCommand('mceInsertContent', false, '[slider name="' + name + '"]');
                    }
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
        getInfo: function () {
            return {
                longname: "Bytbil Bildspel",
                author: 'Provide IT',
                authorurl: 'http://www.provideit.se',
                infourl: '',
                version: "1.0"
            };
        }
    });
    tinymce.PluginManager.add('bytbilslider', tinymce.plugins.bytbilslider);
})();