(function () {
    tinymce.create('tinymce.plugins.bytbilbillista', {
        init: function (ed, url) {
            ed.addButton('bytbilbillista', {
                title: 'Billista',
                image: '/wp-content/themes/nyberg/plugins/bytbil_misc/js/img/billista.png',
                onclick: function () {
                    var brand = prompt("Märke", "");
                    var body = prompt("Kaross", "");
                    var gearbox = prompt("Växellåda", "");
                    var fuel = prompt("Drivmedel", "");
                    var pricefrom = prompt("Pris från", "");
                    var priceto = prompt("Pris till", "");
                    var yearfrom = prompt("År från", "");
                    var yearto = prompt("År till", "");
                    var milesfrom = prompt("Mil från", "");
                    var milesto = prompt("Mil till", "");
                    var sort = prompt("Sortering", "model");
                    var sortasc = prompt("Stigande sorteringsordning (true eller false)", "true");
                    var exclvat = prompt("Visa utan VAT (true eller false)", "false");
                    var limit = prompt("Begränsa antal", "8");

                    var atts = "";

                    if (brand != "") {
                        atts += " brand='" + brand + "'";
                    }
                    if (body != "") {
                        atts += " body='" + body + "'";
                    }
                    if (gearbox != "") {
                        atts += " gearbox='" + gearbox + "'";
                    }
                    if (fuel != "") {
                        atts += " fuel='" + fuel + "'";
                    }
                    if (pricefrom != "") {
                        atts += " pricefrom='" + pricefrom + "'";
                    }
                    if (priceto != "") {
                        atts += " priceto='" + priceto + "'";
                    }
                    if (yearfrom != "") {
                        atts += " yearfrom='" + yearfrom + "'";
                    }
                    if (yearto != "") {
                        atts += " yearto='" + yearto + "'";
                    }
                    if (milesfrom != "") {
                        atts += " milesfrom='" + milesfrom + "'";
                    }
                    if (milesto != "") {
                        atts += " milesto='" + milesto + "'";
                    }
                    if (sort != "") {
                        atts += " sort='" + sort + "'";
                    }
                    if (sortasc != "") {
                        atts += " sortasc='" + sortasc + "'";
                    }
                    if (exclvat != "") {
                        atts += " exclvat='" + exclvat + "'";
                    }
                    if (limit != "") {
                        atts += " limit='" + limit + "'";
                    }

                    ed.execCommand('mceInsertContent', false, '[bytbil_billista' + atts + ']');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
        getInfo: function () {
            return {
                longname: "Bytbil Billista",
                author: 'Provide IT',
                authorurl: 'http://www.provideit.se',
                infourl: '',
                version: "1.0"
            };
        }
    });
    tinymce.PluginManager.add('bytbilbillista', tinymce.plugins.bytbilbillista);
})();