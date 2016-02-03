(function () {
    tinymce.create('tinymce.plugins.bytbilpersonal', {
        init: function (ed, url) {
            ed.addButton('bytbilpersonal', {
                title: 'Personal',
                image: '/wp-content/themes/nyberg/plugins/bytbil_misc/js/img/personal.png',
                onclick: function () {
                    ed.execCommand('mceInsertContent', false, '[bytbil_personal]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
        getInfo: function () {
            return {
                longname: "Bytbil Personal",
                author: 'Provide IT',
                authorurl: 'http://www.provideit.se',
                infourl: '',
                version: "1.0"
            };
        }
    });
    tinymce.PluginManager.add('bytbilpersonal', tinymce.plugins.bytbilpersonal);
})();