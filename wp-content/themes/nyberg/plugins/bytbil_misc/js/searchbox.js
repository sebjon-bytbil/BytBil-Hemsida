(function () {
    tinymce.create('tinymce.plugins.searchbox', {
        init: function (ed, url) {
            ed.addButton('searchbox', {
                title: 'Sökformulär',
                image: '/wp-content/themes/nyberg/plugins/bytbil_misc/js/img/sokform.png',
                onclick: function () {

                    var usedstate = prompt("Usedstate, Vilket bilskick ska formuläret söka på, Ange kod", "");
                    var searchtype = prompt("Searchtype, Vilken biltyp ska formuläret söka på, Ange kod", "");
                    var defaultonbrand = prompt("Defaultonbrand, Ska sökformuläret vara förinställt på något märke, Ange kod", "");
                    var target = prompt("Target, Vart ska sökformuläret peka", "");

                    var atts = "";
                    if (usedstate !== "") {
                        atts += " usedstate='" + usedstate + "'";
                    }
                    if (searchtype !== "") {
                        atts += " searchtype='" + searchtype + "'";
                    }
                    if (defaultonbrand !== "") {
                        atts += " defaultonbrand='" + defaultonbrand + "'";
                    }
                    if (target !== "") {
                        atts += " target='" + usedstate + "'";
                    }

                    ed.execCommand('mceInsertContent', false, '[bytbil_searchbox' + atts + ']');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
        getInfo: function () {
            return {
                longname: "Bytbil Sökformulär",
                author: 'Provide IT',
                authorurl: 'http://www.provideit.se',
                infourl: '',
                version: "1.0"
            };
        }
    });
    tinymce.PluginManager.add('searchbox', tinymce.plugins.searchbox);
})();