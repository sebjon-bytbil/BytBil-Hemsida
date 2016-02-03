//jQuery(document).ready(function($) {
  var specControls = function () {
    var parentEl;
    var init = function (parent) {
      parentEl = $(parent);
      bindControls();
    };
    var resetSelect = function(target) {
      target.selectedIndex = 0;
      $(target).trigger('change');
    };
    var bindControls = function () {
      parentEl.delegate('select', 'change', function () {
        updateSpec();
      });
      parentEl.delegate('.specControl select', 'change', specControl_change);
      parentEl.delegate('.addComparison', 'click', function () {
        addComparison($(this));
        return false;
      });
      parentEl.delegate('.closeComparison', 'click', function () {
        removeComparison($(this));
        return false;
      });

    };
    var specControl_change = function () {
      var sel = $(this),
          control = sel.closest('.specControl'),
          selIndex = control.find('select').index(this);
      // MODEL
      if (selIndex === 0) {
        dropUrl = 'http://www.mazda.se/Handlers/JsonComparisionFilters.ashx?model=' + encodeURIComponent(control.find('.model').val())
          control.find('select:gt(0)').attr('disabled', '').each(function () {
            resetSelect(this);
          });
        control.find('.price').animate({
          opacity: 0
        });
      }
      // BODY TYPE
      if (selIndex === 1) {
        control.find('select:gt(1)').attr('disabled', '').each(function () {
          resetSelect(this);
        });
        control.find('.price').animate({
          opacity: 0
        });

        dropUrl = 'http://www.mazda.se/Handlers/JsonComparisionFilters.ashx?model=' + encodeURIComponent(control.find('.model').val()) + '&' + 'bodyType=' + encodeURIComponent(control.find('.bodyType').val())
      }
      // GRADE
      if (selIndex === 2) {
        control.find('select:gt(2)').attr('disabled', '').each(function () {
          resetSelect(this);
        });
        control.find('.price').animate({
          opacity: 0
        });

        dropUrl = 'http://www.mazda.se/Handlers/JsonComparisionFilters.ashx?model=' + encodeURIComponent(control.find('.model').val()) + '&' + 'bodyType=' + encodeURIComponent(control.find('.bodyType').val()) + '&' + 'grade=' + encodeURIComponent(control.find('.grade').val())
      }
      if (selIndex === 3) {
        control.find('select:gt(3)').attr('disabled', '').each(function () {
          resetSelect(this);
        });
        control.find('.price').animate({
          opacity: 0
        });

        dropUrl = 'http://www.mazda.se/Handlers/JsonComparisionFilters.ashx?model=' + encodeURIComponent(control.find('.model').val()) + '&' + 'bodyType=' + encodeURIComponent(control.find('.bodyType').val()) + '&' + 'grade=' + encodeURIComponent(control.find('.grade').val()) + '&' + 'engine=' + encodeURIComponent(control.find('.engine').val())
      }

      if (sel.val() === '') {
        return;
      }

      $.ajax({
        url: dropUrl,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          if (data.carImage) {
            control.find('.carImage img').attr('src', 'http://www.mazda.se' + data.carImage);
          }
          if (data.categories) {
            for (var i = 0, l = data.categories.length; i < l; i++) {
              var dropdownData = data.categories[i],
                  selToPopulate = control.find('.' + dropdownData.type),
                  opts = '';

              for (var ii = 0, ll = dropdownData.options.length; ii < ll; ii++) {
                opts += '<option value="' + dropdownData.options[ii].value + '">' + dropdownData.options[ii].txt + '</option>';
              }

              selToPopulate.find('option:not(:first)').remove();
              selToPopulate.append(opts).attr('disabled');
              selToPopulate[0].disabled = false;

              // if it's a single item in the list
              // select it and trigger follow-up events
              if (dropdownData.options.length == 1) {
                var $nextControl = selToPopulate.parent().next(),
                  $nextSelect;

                if ($nextControl.length) {
                  $nextSelect = $nextControl.children('select');
                  //$nextSelect.prop('disabled', '');
                }

                selToPopulate[0].selectedIndex = 1;
                specControl_change.apply(selToPopulate[0]);
                updateSpec();
              }
            }
          }
          if (data.price) {
            control.find('.price span').text(data.price);
            control.find('.price').animate({
              opacity: 1
            });
          }
        },
        error: function (err) {
        }
      });
    };
    var addComparison = function (link) {
      var control = link.closest('.specControl');
      control.find('.price').css({ opacity: 0 });
      control.find('select:eq(0)').removeAttr('disabled');
      control.find('select:gt(0)').attr('disabled', '');
      control.find('select').each(function () { resetSelect(this); });
      control.find('.carImage img').attr('src', 'http://www.mazda.se/images/comparison-car-grey.png');

      link.fadeOut(function () {
        control.find('.comparisonItem').removeClass('hidden').fadeIn();
      });
    };
    var removeComparison = function (link) {
      var control = link.closest('.specControl');

      control.find('select').each(function () {
        resetSelect(this);
      });
      updateSpec();

      var comparison = link.closest('.comparisonItem');
      addLink = control.find('a.addComparison');
      comparison.fadeOut(function () {
        addLink.fadeIn();
        control.find('select').each(function (i) {
          this.disabled = 'disabled';
          resetSelect(this);
        });
      });
    };
    var getData = function(serialisedData) {
      // returns serialised data without limit-busting viewstate value
      var viewState = serialisedData.slice(serialisedData.indexOf('_'), serialisedData.indexOf('&') + 1);
      return serialisedData.replace(viewState, '');
    };
    var updateSpec = function () {
      $.ajax({
        url: 'http://www.mazda.se/Handlers/HtmlSpecsCompare.ashx',
        type: 'GET',
        dataType: 'html',
        data: getData($('#aspnetForm').serialize()),
        success: function (txt) {
          $('.mazdaSpecArea').html(txt);
          // mwp.specAccordion.hideNotCurrent();
        },
        error: function (err) {
        }
      });
    };
    return {
      init: init,
        getData: getData
    };
  } ();

  $(function () {
    mwp.specAccordion.init('.mazdaSpecArea');
    specControls.init('.editSpec');
  });
//});
