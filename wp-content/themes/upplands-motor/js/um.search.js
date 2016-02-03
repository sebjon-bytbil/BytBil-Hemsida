(function () {
	var morphSearch = document.getElementById('morphsearch'),
		input = morphSearch.querySelector('input.morphsearch-input'),
		ctrlClose = morphSearch.querySelector('span.morphsearch-close'),
		isOpen = isAnimating = false,
		// show/hide search area
		toggleSearch = function (evt) {
			// return if open and the input gets focused
			if (evt.type.toLowerCase() === 'focus' && isOpen) return false;

			var offsets = morphsearch.getBoundingClientRect();
			if (isOpen) {
				classie.remove(morphSearch, 'open');
				$('.overlay').removeClass('show');
			} else {
				classie.add(morphSearch, 'open');
				document.getElementById('search-input').focus();
				$('.overlay').addClass('show');
			}
			isOpen = !isOpen;
		};

	// events
	input.addEventListener('focus', toggleSearch);
	ctrlClose.addEventListener('click', toggleSearch);

	document.addEventListener('keydown', function (ev) {
		var keyCode = ev.keyCode || ev.which;
		if (keyCode === 27 && isOpen) {
			toggleSearch(ev);
		}
	});

	morphSearch.querySelector('button[type="submit"]').addEventListener('click', function (ev) {
		ev.preventDefault();
	});

    var delay = (function() {
        var timer = 0;
        return function(callback, ms) {
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();

    // Lägg till en delay på keyup
    var value = null,
        get = null;

    $('#search-input').on('keyup', function() {

        delay(function() {
            value = $('#search-input').val();
            if (get != null) get.abort();
            $('#morphsearch').addClass('searching');
            get = $.get(
                '/wp-admin/admin-ajax.php',
                {
                    action: 'um_search',
                    search_string: value
                }, function (response) {
                    var json = $.parseJSON(response),
                        carMarkup = '',
                        pageMarkup = '';

                    if (json.cars.cars.length == 0) {
                        carMarkup = '<p>Hittade inga bilar...</p>';
                    } else {
                        $.each(json.cars.cars, function(i, car) {
                            if (i === 5) return false;
                            carMarkup += '<li><a class="result-item car" href="/objekt/#?id=' + car.id + '">';
                            carMarkup += '<div class="car-info">';
                            carMarkup += '<h4 class="no-wrap">' + car.brand + ' ' + car.model + ' ' + car.modeldescription + '</h4>';
                            carMarkup += '<p><span class="car-year">' + car.yearmodel + '</span> / <span class="car-miles">' + car.miles + ' mil</span> / <span class="car-color">' + car.color + '</span> / <span class="car-body">' + car.bodytype + '</span></p>';
                            carMarkup += '<span class="car-price">' + car['price-sek'] + ' kr</span>';
                            carMarkup += '</div>';
                            carMarkup += '<div class="car-image"><img src="' + car.images.image[0] + '" class="img-responsive"></div>';
                            carMarkup += '</a></li>';
                        });

                        carMarkup += '<div style="clear:both;"></div>';

                        if (json.totalcars > 5) {
                            carMarkup += '<div class="show-more"><a href="/fritext/#?s=' + value + '">Visa fler...</a></div>';
                        }
                    }

                    if (json.pages == 0) {
                        pageMarkup = '<p>Hittade inga sidor...</p>';
                    } else {
                        $.each(json.pages, function(i, page) {
                            pageMarkup += '<li><a class="result-item page" href="' + page.link + '">';
                            pageMarkup += '<h4 class="no-wrap">' + page.title + '</h4>';
                            pageMarkup += '<p>' + page.result + '</p>';
                            pageMarkup += '</a></li>';
                        });

                        pageMarkup += '<div style="clear:both;"></div>';

                        if (parseInt(json.totalpages) > 5) {
                            pageMarkup += '<div class="show-more"><a href="/?s=' + value + '">Visa fler...</a></div>';
                        }
                    }

                    $('#cars').removeClass('no-search');
                    $('#pages').removeClass('no-search');
                    $('#cars ul').empty().append(carMarkup);
                    $('#pages ul').empty().append(pageMarkup);
                    $('#morphsearch').removeClass('searching');
                });

        }, 600);

    });

})();

