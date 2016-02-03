(function () {
    tinymce.create('tinymce.plugins.bytbil-slider', {
        init: function (ed, url) {
            ed.addButton('bytbil-slider', {
                title: 'Bildspel',
                image: 'http://placehold.it/30x30',
                onclick: function () {
                    var name = prompt("Namn (slug)", "");

                    if (name != null) {
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
    tinymce.PluginManager.add('bytbil-slider', tinymce.plugins.bytbil - slider);
})();