mwp.specAccordion = function () {

    var parentEl;

    var init = function (parent) {
        console.log(parent);
        parentEl = $(parent);
        bindHandles();
        hideNotCurrent();
        parentEl.removeClass('initiating');
    };

    var hideNotCurrent = function () {
        parentEl.find('.accordionContent:not(.current .accordionContent)').hide();
        parentEl.find('.accessoriesContent:not(.current .accessoriesContent)').hide();
    };

    var hidePanel = function (panelToOpen) {
        panelToOpen.hide();
        panelToOpen.closest('li').removeClass('current');
        var nListEl = $('.accessories').find('.main').length;
        if (nListEl == 1 || nListEl == $('.main').length) {
                $('.accessories').css('border-bottom', '1px solid #B6B6B6');
        }
    };

    var bindHandles = function () {

        parentEl.delegate('h3 a.accordionHandle', 'click', function (e) {
            e.preventDefault();
            var parentLi = $(this).closest('li'),
                panelToOpen = parentLi.find('.accordionContent');
            if (panelToOpen.css('display') == 'none') {
                openPanel(panelToOpen);
            }
            else {
                hidePanel(panelToOpen);
            }
            /*
            if (parentLi.hasClass('current')) {
            openPanel();
            return false;
            }
            openPanel(panelToOpen);*/
        });
        
        // Accessories Page 4 Part
        parentEl.delegate('.accessories h3 a', 'click', function (e) {
            if (! $(this).hasClass('external-link')) {
                e.preventDefault();
                var parentLi = $(this).closest('li'),
                    panelToOpen = parentLi.find('.accessoriesContent');
                if (panelToOpen.css('display') == 'none') {
                    openPanel(panelToOpen);
                }
                else {
                    hidePanel(panelToOpen);
                }
                /*
                if (parentLi.hasClass('current')) {
                openPanel();
                return false;
                }
                openPanel(panelToOpen);*/
            }
        });

    };

    var openPanel = function (panelToOpen) {
        /*parentEl.find('.accordionContent').slideUp(function () {

        });
        */
        //parentEl.find('li').removeClass('current');
        if (panelToOpen) {
            panelToOpen.closest('li').addClass('current');
            panelToOpen.slideDown();
            var nListEl = $('.accessories').find('.main').length;
            if (nListEl == 1 || nListEl == $('.main').length) {
                if ($('li').hasClass('current')) {
                    $('.accessories').css('border-bottom', '0');
                }
            }
        }

    };

    return {
        // declare which properties and methods are supposed to be public
        init: init
        /*,
        hideNotCurrent: hideNotCurrent*/
    }

} ();
