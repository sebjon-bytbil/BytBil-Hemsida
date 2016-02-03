jQuery(document).ready(function($) {
    mwp.specControls = function () {
        var parentEl,
            parentForm;
        var context = function (parent) {
            parentEl = (typeof (parent) === 'object') ? parent : $(parent);
            parentForm = parentEl.parents('form');
        };
        var init = function (parent) {
            context(parent);
            bindControls();
            parentEl.find('input:checked').each(function () {
                $(this).closest('li').addClass('selected');
            });
        };
        var bindControls = function () {
            parentEl.delegate('input:radio', 'change', function () {
                changeHighlight($(this));
            });
            parentEl.delegate('li', 'click', function (e) {
                if ($(e.target).is('input')) {
                    return true;
                }
                e.preventDefault();
                var rad = $(this).find('input:radio');
                rad.attr('checked', 'checked').trigger('click');
                changeHighlight(rad);
            });
        };
        var changeHighlight = function ($input) {
            var parentControl = $input.closest('div.specControl'),
                parentLi = $input.closest('li');
            parentControl.find('li').removeClass('selected');
            parentLi.addClass('selected');

            updateOptions(parentControl);
        };
        var getData = function(serialisedData) {
            // returns serialised data without limit-busting viewstate value
            var viewState = serialisedData.slice(serialisedData.indexOf('_'), serialisedData.indexOf('&') + 1);
            return serialisedData.replace(viewState, '');
        };
        var updateOptions = function (parentControl) {
            var listUrl;
            if (parentControl.hasClass('bodyType')) {
                listUrl = 'http://www.mazda.se/Handlers/JsonSpecsFilters.ashx?fullReset=true';
            } else if (parentControl.hasClass('grade')) {
                listUrl = 'http://www.mazda.se/Handlers/JsonSpecsFilters.ashx?excludeGrade=true';
            } else {
                updateSpec();
                return;
            }
            $.ajax({
                url: listUrl,
                type: 'GET',
                dataType: 'json',
                data: getData(parentForm.serialize()),
                success: function (data) {
                    if (data.categories) {
                        for (var i = 0, l = data.categories.length; i < l; i++) {
                            var listData = data.categories[i],
                                listToPopulate = parentEl.find('.' + listData.type),
                                items = '', checked;
                            for (var ii = 0, ll = listData.options.length; ii < ll; ii++) {
                                checked = (ii === 0) ? 'checked' : '';
                                items += '<li>' +
                                            '<input type="radio" name="' + listData.type + '" value="' + listData.options[ii].value + '" id="" ' + checked + '>' +
                                            '<label for="">' + listData.options[ii].txt + ' </label>' +
                                         '</li>';
                            }
                            listToPopulate.find('ul').html(items);

                        }
                    }
                    parentEl.find('input:checked').each(function () {
                        $(this).closest('li').addClass('selected');
                    });
                    mwp.specControlsStatus = 'updated';
                    updateSpec();
                },
                error: function (err) {
                }
            });
        };
        var updateSpec = function () {
            var b = $('.bodyType .selected input', parentEl).attr('value'),
                g = $('.grade .selected input', parentEl).attr('value'),
                e = $('.engine .selected input', parentEl).attr('value'),
                qs = 'bodyType=' + b + '&grade=' + g + '&engine=' + e;

            var url;
            if (parentEl.find('input[name="specType"]').val() === 'mini') {
                url = 'http://www.mazda.se/Handlers/HtmlSpecsMini.ashx';
            } else {
                url = 'http://www.mazda.se/Handlers/HtmlSpecs.ashx';
            }
            $.ajax({
                url: url, //change to point as a web service
                type: 'GET',
                dataType: 'html',
                cache: false,
                data: getData(parentForm.serialize()),
                success: function (txt) {
                    var pattern = /img\s*src\=\"(.*?)\"/;
                    if (matches = txt.match(pattern)) {
                        var url = 'http://www.mazda.se' + matches[1];
                        txt = txt.replace(pattern, 'img src="' + url + '"');
                    }
                    $('.mazdaSpecArea', parentForm).html(txt);
                    // if(mwp.specAccordion){
                    // mwp.specAccordion.hideNotCurrent();
                    // }
                },
                error: function (err) {
                }
            });
        };
        return {
            init: init,
            context: context
        }
    } ();
});
