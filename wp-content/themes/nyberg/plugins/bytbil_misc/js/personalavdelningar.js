(function () {
    tinymce.create('tinymce.plugins.personalavdelningar', {
        init: function (ed, url) {
            ed.addButton('personalavdelningar', {
                title: 'Personalavdelningar',
                image: '/wp-content/themes/nyberg/plugins/bytbil_misc/js/img/persavdelning.png',
                onclick: function () {
                    ed.execCommand('mceInsertContent', false, '[personalavdelningar]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
        getInfo: function () {
            return {
                longname: "Bytbil personalavdelningar",
                author: 'Provide IT // SEB BYTBIL.COM',
                authorurl: 'http://www.provideit.se',
                infourl: '',
                version: "1.0"
            };
        }
    });
    tinymce.PluginManager.add('personalavdelningar', tinymce.plugins.personalavdelningar);
})();