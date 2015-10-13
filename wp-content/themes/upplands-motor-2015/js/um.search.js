(function () {
    "use strict";
	var morphSearch = document.getElementById('morphsearch'),
		input = morphSearch.querySelector('input.morphsearch-input'),
		ctrlClose = morphSearch.querySelector('span.morphsearch-close'),
		isOpen = false;
        // var isAnimating = false;
		// show/hide search area
		var toggleSearch = function (evt) {
			// return if open and the input gets focused
			if (evt.type.toLowerCase() === 'focus' && isOpen){ return false; }

			//var offsets = morphsearch.getBoundingClientRect();
			if (isOpen) {
				//classie.remove(morphSearch, 'open');
				$(morphSearch).removeClass('open');
                $('.overlay').removeClass('show');
                               $('body').removeClass('search-open');
			} else {
				// classie.add(morphSearch, 'open');
                $(morphSearch).addClass('open');
				document.getElementById('search-input').focus();
				$('.overlay').addClass('show');
                               $('body').addClass('search-open');
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

    var value = null,
        get = null;

    $('#search-input').on('keyup', function() {

        delay(function() {
            value = $('#search-input').val();
            if (get !== null){ get.abort(); }
            $('#morphsearch').addClass('searching');
            get = $.get(
                '/wp-admin/admin-ajax.php',
                {
                    action: 'um_search',
                    amount: 5,
                    search_string: value,
                    search_cars: 1
                }, function (response) {
                    if (!$('#morphsearch').hasClass('search-results')) {
                        $('#morphsearch').addClass('search-results');
                    }
                    var json = $.parseJSON(response);

                    $('#cars').removeClass('no-search');
                    $('#pages').removeClass('no-search');
                    $('#cars ul').empty().append(json.cars);
                    $('#pages ul').empty().append(json.pages);
                    $('#morphsearch').removeClass('searching');
                });

        }, 600);

    });

    //Login
    $("#my-parking .collapsed-text").on("click", function(){
        $("#my-parking .expanded-text").toggle();
    });

})();