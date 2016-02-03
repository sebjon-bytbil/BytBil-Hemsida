(function () {
    tinymce.create('tinymce.plugins.personalorter', {
        init: function (ed, url) {
            ed.addButton('personalorter', {
                title: 'Personalorter',
                image: '/wp-content/themes/nyberg/plugins/bytbil_misc/js/img/persorter.png',
                onclick: function () {
                    ed.execCommand('mceInsertContent', false, '[personalorter]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
        getInfo: function () {
            return {
                longname: "Bytbil Personalorter",
                author: 'Provide IT',
                authorurl: 'http://www.provideit.se',
                infourl: '',
                version: "1.0"
            };
        }
    });
    tinymce.PluginManager.add('personalorter', tinymce.plugins.personalorter);
})();