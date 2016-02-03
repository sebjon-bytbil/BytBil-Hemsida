(function($, localStorage) {
    var body = $('body'),
        overlay = $('#transparent-overlay');
    var list = $('.mp-vehicles-content > ul'),
        offerlist = $('.mp-offers-content > ul'),
        searchlist = $('.mp-subscriptions-content > ul'),
        $myParking = $('.my-parking'),
        original_link = $('.compare.mp-button').attr('href'),
        today = getTodaysDate();

    // Adjust height for nice scroll in mobile
    $('#my-parking-mobile .mp-container').css('max-height', $(window).height() - 67);

    // Searches array
    function arrayObjectIndexOf(myArray, searchTerm, property) {
        for (var i = 0, len = myArray.length; i < len; i++) {
            if (myArray[i][property] === searchTerm) return i;
        }
        return -1;
    }

    // Returns todays date.
    function getTodaysDate() {
        var today = new Date();
        var d = today.getDate();
        var m = today.getMonth() + 1;
        var y = today.getFullYear();

        if (d < 10) d = '0' + d;
        if (m < 10) m = '0' + m;

        return y + m + d;
    }

    // Capitalizes every word in a string.
    function capitalizeEachWord(str) {
        return str.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    }

    // Notifications upon adding and removing favorites
    function showNotification(saved, title) {
        var nsbox = $('.ns-box.ns-bar.ns-effect-slidetop');
        if (nsbox.length > 0) {
            nsbox.remove();
        }

        var savedOrRemoved;
        // Handle some extra strings
        if (saved === true) {
            savedOrRemoved = {
                strongText: 'Sparad',
                text: 'sparat',
                extraText: 'i'
            };
        } else {
            savedOrRemoved = {
                strongText: 'Borttagen',
                text: 'tagit bort',
                extraText: 'ur'
            };
        }

        setTimeout(function() {
            // Create the notification
            var notification = new NotificationFx({
                message: '<span class="parking-icon">P</span><p><strong class="green">' + savedOrRemoved.strongText + '</strong> Du har ' + savedOrRemoved.text + ' ' + title + ' ' + savedOrRemoved.extraText + ' dina favoriter. Öppna "Min P-plats" för att administrera dem eller dela med dina vänner.</p>',
                layout: 'bar',
                effect: 'slidetop',
                type: 'notice', // Notice, warning or error
            });

            // Show the notification
            notification.show();
        }, 150);
    }

    // Toggle My Parking
    body.on('click', '.my-parking, .myparking-close', function() {
        var $this = $(this).hasClass('myparking-close') ? $(this).parents('.my-parking').first() : $(this);
        var windowH = window.innerHeight;
        var height = windowH - 90;

        $('.mp-container').css({'min-height': height + 'px', 'max-height': height + 'px'});
        $('.mp-container .mp-favorites').css({'min-height': (height - 2) + 'px', 'max-height': (height - 2) + 'px'});

        if (!$this.hasClass('open')) {
            reRenderLists();
            $this.addClass('open');
            overlay.addClass('open');
            body.addClass('mp-open');
        } else {
            $this.removeClass('open');
            overlay.removeClass('open');
            body.removeClass('mp-open');
        }
    });

    // Handle tabs
    body.on('click', '.mp-tabs .mp-tab', function(e) {
        if ($(this).hasClass('active')) {
            return;
        }

        $('.mp-tabs .mp-tab').removeClass('active');
        $(this).addClass('active');

        var id = $(this).data('tabid');
        var content = $('.mp-favorites').find('.' + id + '-content');

        $('.mp-favorites .tab-content').removeClass('active');
        content.addClass('active');
    });

    // Empties all lists
    function emptyLists() {
        list.find(' > li').remove();
        offerlist.find('> li').remove();
        searchlist.find('> li').remove();
    }

    // Sets amount of different favorites
    function syncTotals() {
        var listAmount = list.first().children('li').length;
        $('.mp-vehicles-amount').html(listAmount);
        if (listAmount === 0) {
            list.html('<p class="zero">Du har inte lagt till några fordon.</p>');
        }

        var offerlistAmount = offerlist.first().children('li').length;
        $('.mp-offers-amount').html(offerlistAmount);
        if (offerlistAmount === 0) {
            offerlist.html('<p class="zero">Du har inte lagt till några erbjudanden.</p>');
        }

        var searchlistAmount = searchlist.first().children('li').length;
        $('.mp-search-amount').html(searchlistAmount);
        if (searchlistAmount === 0) {
            searchlist.html('<p class="zero">Du har inte lagt till några bevakningar.</p>');
        }

        var compareAmount = $('.mp-favorites input[type=checkbox]:checked').length;
        $('.mp-comparison-amount').html(compareAmount);
    }

    // Removes the spinner
    function removeSpinner(mobile) {
        if (mobile) {
            $('#my-parking-mobile .mp-loading').removeClass('loading');
        } else {
            $('#my-parking .mp-loading').removeClass('loading');
        }
    }

    // Setup favorites
    body.bbfavorite({
        extraData: ['type', 'title', 'price', 'year', 'miles', 'color', 'body', 'image', 'enddate', 'url', 'search'],
        onload: function(items) {
            for (var i = items.length - 1; i >= 0; i--) {
                renderElement(items[i]);
            }
            syncTotals();
            syncList();

            var email = localStorage.getItem('email');
            if (email) {
                setFBUrl(email);
            }
        }
    });

    // Listen on save to synchronize
    body.on('bbfavorites:listupdated', function(e, storage, list) {
        var mail = localStorage.getItem('email');
        if (mail) {
            var data = {
                'action': 'bbfavorites_save',
                'list': JSON.stringify(list),
                'mail': mail
            };
            jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {});
        }
    });

    // Click event for save favorite buttons
    body.on('click', '.bb-favorite', function(e) {
        var $this = $(this), title, saved;
        // Retrieve title for notification
        if ($('h1.share-title').length > 0) {
            title = $('h1.share-title').text();
        } else {
            // TODO: Retrieve the hash
            title = $('#FreeTextSearch').val();
        }

        if ($this.hasClass('saved')) {
            saved = true;
        } else {
            saved = false;
        }

        if (saved === true) {
            showNotification(saved, title);
        }
    });

    // Listen on added item
    body.on('bbfavorites:itemadded', function(e, storage, item) {
        renderElement(item);
        syncTotals();
    });

    // Listen on removed item
    body.on('bbfavorites:itemremoved', function(e, storage, item) {
        removeItem(item);
        var bbfavorite, title, saved, process = false;

        if ($('.bb-favorite').length > 0) {
            bbfavorite = $('.bb-favorite');

            if (item.type == 'car') {
                var hash, matches;
                hash = window.location.hash;
                matches = hash.match(/\#\?id=(\d+)/);

                if (matches) {
                    var currentId = matches[1];
                    if (item.id == currentId) {
                        process = true;
                    }
                }
            } else if (item.type == 'offer') {
                if (bbfavorite.data('bbfavorite') == item.id) {
                    process = true;
                }
            } else if (item.type == 'search') {
                if (bbfavorite.data('bbfavorite') == item.id) {
                    process = true;
                }
            }

            if (process === true) {
                bbfavorite.removeClass('saved');
                bbfavorite.find('p.button-text').html('Spara');
                if (item.type == 'search') {
                    title = $('#FreeTextSearch').val();
                } else {
                    title = $('h1.share-title').text();
                }
                showNotification(false, title);
            }
        }
        syncTotals();
    });

    // Listen on keyup in free text search, to automatically add/remove saved on favorite button
    body.on('keyup', '#FreeTextSearch', function() {
        var value = encodeURI($(this).val());
        var locallist = localStorage.getItem('bbfavorites');
        var list = locallist ? JSON.parse(locallist) : null;
        var match = false;

        if (list) {
            $.each(list, function(i, item) {
                if (item.id == 'search-#?s=' + value) {
                    match = true;
                }
            });
        }

        var bbfavorite = $('.bb-favorite');
        if (match) {
            if (!bbfavorite.hasClass('saved')) {
                bbfavorite.addClass('saved');
                bbfavorite.find('p.button-text').html('Sparad');
            }
        } else {
            if (bbfavorite.hasClass('saved')) {
                bbfavorite.removeClass('saved');
                bbfavorite.find('p.button-text').html('Spara');
            }
        }
    });

    body.on('click', '.mp-container, .choice-button', function(e) {
        e.stopPropagation();
    });

    // Compare cars click event
    body.on('click', '.compare.choice-button', function(e) {
        e.preventDefault();
        var carId,
            new_link,
            existing_link;
        if ($(this).hasClass('checked')) {
            $(this).removeClass('checked').find('input').prop('checked', false);

            existing_link = $('.compare.mp-button').attr('href');
            var matches = existing_link.match(/#\?id=(.*)/);

            if (matches) {
                carId = $(this).children('input').attr('id');
                carId = carId.match(/\d+$/)[0];

                var carIds = matches[1].split(',');
                var index = carIds.indexOf(carId);

                if (index > -1) {
                    carIds.splice(index, 1);
                }

                new_link = original_link + carIds.join();

                $('.compare').attr('href', new_link);
            }
        } else {
            $(this).addClass('checked').find('input').prop('checked', 'checked');
            carId = $(this).children("input").attr("id");
            carId = carId.match(/\d+$/)[0];

            existing_link = $(".compare.mp-button").attr("href");
            if (existing_link.charAt(existing_link.length - 1) != '=') {
                carId = "," + carId;
            }
            if (existing_link) {
                new_link = existing_link + carId;
                $(".compare").attr("href", new_link);
            } else {
                $(".compare").attr("href", "");
            }
        }

        var i = 0;
        $('[id^=mp-compare-]').each(function() {
            if ($(this).prop('checked') === true) {
                i++;
            }
        });

        $('.mp-comparison-amount').html(i);
    });

    // Gets list based on email in localStorage - duplicate?
    function syncList() {
        var mail = localStorage.getItem('email');
        if (mail) {
            var locallist = localStorage.getItem('bbfavorites');
            var data = {
                'action': 'bbfavorites_sync',
                'list': locallist,
                'mail': mail
            };

            jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
                emptyLists();
                var object = locallist ? JSON.parse(locallist) : [];

                var json = JSON.parse(response);
                if (json) {
                    if (json.length > 0) {

                        for (var i = json.length - 1; i >= 0; i--) {
                            var index = arrayObjectIndexOf(object, json[i].id, "id");
                            if (index == -1) {
                                object.push(json[i]);
                            }
                            renderElement(json[i]);
                        }

                        localStorage.setItem("bbfavorites", JSON.stringify(object));
                    }
                }
                syncTotals();
            });
        }
    }

    // Renders the item
    function renderElement(item) {
        var thisTitle,
            bbfavorite,
            view,
            matches;

        if (item.type == "car") {
            view = $('#favoriteTemplate').render(item);
            if (list.children('.zero').length > 0) {
                list.children('.zero').remove();
            }

            if ($('.bb-favorite').length > 0) {
                bbfavorite = $('.bb-favorite');
                var hash = window.location.hash;
                matches = hash.match(/\#\?id=(\d+)/);
                if (matches) {
                    var currentId = matches[1];
                    if (item.id == currentId) {
                        bbfavorite.addClass('saved');
                        bbfavorite.find('p.button-text').html('Sparad');
                        thisTitle = $('h1').text();
                    }
                }
            }
            list.append(view);
        } else if (item.type == "offer") {
            view = $('#offerTemplate').render(item);
            if (item.enddate < today) {
                view = $(view);
                view.find('.info p').prepend('GÅTT UT - ');
            }

            if (offerlist.children('.zero').length > 0) {
                offerlist.children('.zero').remove();
            }

            if ($('.bb-favorite').length > 0) {
                bbfavorite = $('.bb-favorite');
                if (bbfavorite.data('bbfavorite') == item.id) {
                    bbfavorite.addClass('saved');
                    bbfavorite.find('p.button-text').html('Sparad');
                    thisTitle = $('h1').text();
                }
            }
            offerlist.append(view);
        } else if (item.type == 'search') {
            var search = decodeURIComponent(item.search);
            matches = search.match(/#\?s=([A-ZÅÄÖa-zåäö\d\s]*)/);
            if (matches) {
                item.search = capitalizeEachWord(matches[1]);
            }
            view = $('#searchTemplate').render(item);

            if (searchlist.children('.zero').length > 0) {
                searchlist.children('.zero').remove();
            }

            if ($('.bb-favorite').length > 0) {
                bbfavorite = $('.bb-favorite');
                if (bbfavorite.data('bbfavorite') == item.id) {
                    bbfavorite.addClass('saved');
                    bbfavorite.find('p.button-text').html('Sparad');
                    thisTitle = $('h1').text();
                }
            }
            searchlist.append(view);
        }
        syncTotals();
    }

    // Removes item
    function removeItem(item) {
        if (item.type == 'search') {
            $('.favorites-search').each(function(i, el) {
                var $el = $(el);
                if (item.id == 'search-' + $el.data('search')) {
                    $el.remove();
                }
            });
        } else {
            $myParking.find('#favorites-' + item.id).remove();
        }
    }

    // Empties and rerenders the lists
    function reRenderLists(){
        emptyLists();

        var locallist = localStorage.getItem('bbfavorites');
        if (locallist === null || locallist === '[]') {
            syncTotals();
            return false;
        }
        var list = locallist ? JSON.parse(locallist) : null;

        for (var i = list.length - 1; i >= 0; i--) {
            renderElement(list[i]);
        }
    }

    // Click event on share button
    body.on('click', '.my-parking .mp-button.share', function() {
        toggleShareDialog();
    });

    // Toggles share dialog
    function toggleShareDialog() {
        var dialog = $('#my-parking-mobile .mp-share-dialog, #my-parking .mp-share-dialog');
        if (dialog.hasClass('open')) {
            dialog.removeClass('open');
        } else {
            dialog.addClass('open');
        }
    }

    // Toggles save form
    function toggleSaveForm(bool, extra) {
        if (extra === 'share') {
            $('#my-parking-mobile .favorites-save-text, #my-parking .favorites-save-text').removeClass('visible');
        } else {
            $('#my-parking-mobile .favorites-share-text, #my-parking .favorites-share-text').removeClass('visible');
        }

        if (bool === true) {
            $('#my-parking-mobile .mp-save-form, #my-parking .mp-save-form').addClass('visible');
            $('#my-parking-mobile .favorites-' + extra + '-text, #my-parking .favorites-' + extra + '-text').addClass('visible');
        } else {
            $('#my-parking-mobile .mp-save-form, #my-parking .mp-save-form').removeClass('visible');
            $('#my-parking-mobile .favorites-' + extra + '-text, #my-parking .favorites-' + extra + '-text').removeClass('visible');
        }
    }

    // Retrieves the email hash and base url for use with Facebook
    function setFBUrl(email) {
        var data = {
            'action': 'bbfavorites_gethashbase',
            'email': email
        };
        jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
            var json = JSON.parse(response);
            var FBUrl = getFBUrl(json.base_url, json.hash);

            $('.my-parking .fb-share-favorites').attr('href', FBUrl);
        });
    }

    // Return an URL for Facebook
    function getFBUrl(base, hash) {
        var url = encodeURIComponent(base + '/mina-favoriter/?h=' + hash);
        var FBUrl = 'https://www.facebook.com/dialog/share?app_id=1091242480887465&display=popup&redirect_uri=' + url  + '&href=' + url;
        return FBUrl;
    }

    // Toggle email share form
    function toggleEmailShareForm(bool) {
        if (bool === true) {
            $('.my-parking .mp-email-share-form').addClass('visible');
            $('.my-parking .mp-email-share-form .favorites-share-email-text').addClass('visible');
        } else {
            $('.my-parking .mp-email-share-form').removeClass('visible');
            $('.my-parking .mp-email-share-form .favorites-share-email-text').removeClass('visible');
        }
    }

    // Listen on email share form submit
    body.on('submit', '.mp-email-share-form form', function(e) {
        var $this = $(this);
        var shareEmail = $this.find('input[type=email]').val();
        var email = localStorage.getItem('email');
        $this.find('.mp-loading').addClass('loading');
        if (email) {
            var data = {
                'action': 'bbfavorites_emailshare',
                'email': email,
                'shareEmail': shareEmail
            };
            jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
                $this.find('.mp-loading').removeClass('loading');
                $this.parent().fadeOut(1000);
                setTimeout(function() {
                    $this.parent().css('display', '').removeClass('visible').removeAttr('style').attr('style', '');
                }, 1000);
            });
        }

        e.preventDefault();
        return false;
    });

    // Click event on Facebook share
    body.on('click', '.my-parking .fb-share-favorites', function(e) {
        e.stopPropagation();
        var href = $(this).attr('href');
        if (href === '') {
            e.preventDefault();
            toggleShareDialog();
            toggleSaveForm(true, 'share');
            return false;
        }
        return true;
    });

    // Click event on email share button
    body.on('click', '.my-parking .mp-email-share', function(e) {
        e.stopPropagation();
        var email = localStorage.getItem('email');
        if (email) {
            toggleShareDialog();
            toggleEmailShareForm(true);
            return false;
        } else {
            e.preventDefault();
            toggleShareDialog();
            toggleSaveForm(true, 'share');
            return false;
        }
    });

    // Click event on save button
    body.on('click', '.my-parking .mp-button.save', function() {
        var email = localStorage.getItem('email');
        var $this = $(this);
        if (email) {
            $this.find('.mp-loading').addClass('loading');
            saveAndCreatePage(email, $this, false);
        } else {
            toggleSaveForm(true, 'save');
        }
    });

    // Listen on save form submit
    body.on('submit', '.my-parking .mp-save-form form', function(e) {
        e.preventDefault();
        var $this = $(this);
        var email = $this.find('input[name=save-email]').val();
        $this.find('.mp-loading').addClass('loading');
        saveAndCreatePage(email, $this, true);
    });

    // Saves the list and creates a favorite page hash
    function saveAndCreatePage(email, self, fade) {
        var locallist = localStorage.getItem('bbfavorites');
        localStorage.setItem('email', email);
        var data = {
            'action': 'bbfavorites_saveandcreate',
            'email': email,
            'list': locallist
        };

        jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
            var json = JSON.parse(response);
            emptyLists();
            var object = locallist ? JSON.parse(locallist) : [];
            var list = json.items.list;
            var FBUrl = getFBUrl(json.base_url, json.hash);

            $('.my-parking .fb-share-favorites').attr('href', FBUrl);

            if (list) {
                if (list.length > 0) {
                    for (var i = list.length - 1; i >= 0; i--) {
                        var index = arrayObjectIndexOf(object, list[i].id, 'id');
                        renderElement(list[i]);
                    }
                    localStorage.setItem('bbfavorites', JSON.stringify(object));
                }
            }
            syncTotals();
            self.find('.mp-loading').removeClass('loading');
            if (fade === true) {
                self.parent().fadeOut(1000);
                setTimeout(function() {
                    self.parent().css('display', '').removeClass('visible').removeAttr('style').attr('style', '');
                }, 1000);
            }
        });
    }

    // Listen on collect/remove form and does different actions based on which submit button
    body.on('submit', '.my-parking .collect-remove-form', function(e) {
        var $button = $(document.activeElement);
        var email = $(this).find('input[type=email]').val();
        var data, button, self = this;
        $(this).find('.mp-loading').addClass('loading');

        if ($button.hasClass('submit-button')) {
            // Collects list and replaces
            localStorage.removeItem('email');
            data = {
                'action': 'bbfavorites_getlist',
                'email': email
            };
            jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
                localStorage.setItem('email', email);
                localStorage.removeItem('bbfavorites');
                emptyLists();
                var json = JSON.parse(response);
                var list = json.items;
                var FBUrl = getFBUrl(json.base_url, json.hash);

                $('.my-parking .fb-share-favorites').attr('href', FBUrl);

                if (list) {
                    if (list.length > 0) {
                        for (var i = list.length - 1; i >= 0; i--) {
                            renderElement(list[i]);
                        }
                        localStorage.setItem('bbfavorites', JSON.stringify(list));
                    } else {
                        localStorage.setItem('bbfavorites', '[]');
                        button = $('.bb-favorite');
                        if (button.length > 0) {
                            button.removeClass('saved');
                            button.find('p.button-text').html('Spara');
                        }
                    }
                }
                syncTotals();
                $(self).find('.mp-loading').removeClass('loading');
            });
        } else if ($button.hasClass('remove-button')) {
            // Remove list and remove items
            localStorage.removeItem('bbfavorites');
            localStorage.removeItem('email');
            data = {
                'action': 'bbfavorites_removelist',
                'email': email
            };
            jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
                emptyLists();

                $('.my-parking .fb-share-favorites').attr('href', '');

                button = $('.bb-favorite');
                if (button.length > 0) {
                    button.removeClass('saved');
                    button.find('p.button-text').html('Spara');
                }
                syncTotals();
                $(self).find('.mp-loading').removeClass('loading');
            });
        }

        e.preventDefault();
        return false;
    });

})(jQuery, window.localStorage);
