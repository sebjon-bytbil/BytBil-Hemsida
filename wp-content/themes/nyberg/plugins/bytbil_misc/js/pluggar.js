(function () {

    var pluggen = {};
    tinymce.create('tinymce.plugins.pluggar', {
        init: function (ed, url) {
            ed.addButton('pluggar', {
                title: 'Pluggar',
                image: '/wp-content/themes/nyberg/plugins/bytbil_misc/js/img/puffar.png',
                onclick: function (e) {
                    var elem = $(e.currentTarget);
                    if (typeof elem.attr('data-open') === 'undefined' || elem.attr('data-open') != 'open') {
                        elem.attr('data-open', 'open');
                        var elemrnd = 'elem' + Math.round((Math.random() * 1000));
                        var alreadyinserted = false;
                        elem.addClass(elemrnd);


                        $.post(ajaxurl, {action: 'getPuffar'}, function (data) {
                            data = JSON.parse(data);
                            var html = "<select id='select-size'>";
                            html += "<option>Välj Puff Storlek</option>";
                            html += "<option value='" + "Liten" + "'>Liten</option>";
                            html += "<option value='" + "Mellan" + "'>Mellan</option>";
                            html += "<option value='" + "Stor" + "'>Stor</option>";
                            html += "</select>";
                            $(html).appendTo(elem.parent().parent());

                            $('#select-size').change(function () {
                                if (alreadyinserted) {
                                    $(this).parent().find('#puffarDropdown').eq(0).remove();
                                    $(this).parent().find('#buttonpuff').eq(0).remove();
                                }
                                var puffar = Array();
                                var html2 = "<select multiple id='puffarDropdown'>";
                                data.forEach(function (item) {
                                    if ($('#select-size option:selected').val() === item[2]) {
                                        html2 += "<option value='" + item[0] + "''>" + item[1] + "</option>";
                                    }
                                })
                                html2 += "</select>";
                                $(html2).appendTo(elem.parent().parent());
                                var button = '<input id="buttonpuff" data-prnt=".' + elemrnd + '" type="button" value="Infoga Puff"/>';
                                $(button).appendTo(elem.parent().parent());

                                alreadyinserted = true;
                                $('#puffarDropdown option').click(function () {
                                    if (puffar.indexOf($(this).val()) === -1) {
                                        puffar.push($(this).val());
                                    }
                                    else {
                                        puffar.splice(puffar.indexOf($(this).val()), 1);
                                    }
                                });
                                $('#buttonpuff').click(function (event) {
                                    var btn = $($(event.target));

                                    if (btn.closest('tr').find('#puffarDropdown option:selected').length !== 0) {
                                        var selecteditems = '';
                                        console.log(puffar);
                                        puffar.forEach(function (puffen) {
                                            selecteditems += puffen + ', ';
                                        });
                                        selecteditems = selecteditems.substring(0, selecteditems.length - 2);
                                        btn.closest('tr').find('#puffarDropdown, #buttonpuff, #select-size').remove();
                                        $(btn.attr('data-prnt')).attr('data-open', 'closed');

                                        ed.execCommand("mceInsertContent", false, "[nyberg_pages_plug name='" + selecteditems + "']");
                                    }
                                    else {
                                    }

                                })
                            });


                        });

                    }

                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
        getInfo: function () {
            return {
                longname: "Bytbil Pluggar",
                author: 'Provide IT',
                authorurl: 'http://www.provideit.se',
                infourl: '',
                version: "1.0"
            };
        }
    });
    tinymce.PluginManager.add('pluggar', tinymce.plugins.pluggar);
})();