(function($, storage){

	$.fn.bbfavorite = function(options){
		//options
		var opts = $.extend( {}, $.fn.bbfavorite.defaults, options );

		var $el = $(this);

		//handle on click for favorites
		$(this).on("click", '[data-'+ opts.dataName +']', function(e){
			e.preventDefault();

			var item = buildItem($(this));

			if (isFavorited(item)) {
				//remove from list
				removeItem(item);
			}else{
				//add to list
				addItem(item);
			}

			//event: on list changed
			
		});

		function buildItem(el){
			var item;
            if (el[0].dataset.type == 'search') {
                item = {
                    id: el[0].dataset.bbfavorite
                };

                item.type = 'search';
                item.search = el[0].dataset.search;
                item.url = el[0].dataset.url;
            } else {
                item = {
                    id: el.data(opts.dataName)
                };

                if (opts.extraData.length > 0) {
                    for (var i = opts.extraData.length - 1; i >= 0; i--) {
                        var dataField = opts.extraData[i];
                        item[dataField] = el.data(dataField);
                    }
                }
            }

			return item;
		}

		function getList(){
			var store = storage.getItem(opts.storageName);
			var object = store ? JSON.parse(store) : [];
			
			return object;
		}

		function saveList(data){
			storage.setItem(opts.storageName, JSON.stringify(data));
			$el.trigger('bbfavorites:listupdated', [opts.storageName, data]);
		}

		function addItem(item){
			var list = getList();
			list.push(item);
			saveList(list);
			$el.trigger('bbfavorites:itemadded', [opts.storageName, item]);
		}

		function removeItem(item){
			var list = getList();
			var index = arrayObjectIndexOf(list, item.id, "id");
			if (index > -1) {
				list.splice(index, 1);
				saveList(list);
				$el.trigger('bbfavorites:itemremoved', [opts.storageName, item]);
			}
		}

		function isFavorited(item){
			var list = getList();
			var storedItem = $.grep(list, function(e){ return e.id == item.id; });
			if (storedItem.length === 0) {
  				// not found
  				return false;
			} else if (storedItem.length == 1) {
				// access the foo property using result[0].foo
				return true;
			} else {
				//multiple...
				return true;
			}
		}

		function arrayObjectIndexOf(myArray, searchTerm, property) {
		    for(var i = 0, len = myArray.length; i < len; i++) {
		        if (myArray[i][property] === searchTerm) return i;
		    }
		    return -1;
		}
		if (opts.onload !== null) {
			opts.onload.call(this, getList());
		}
		$el.trigger('bbfavorites:onload', [opts.storageName, getList()]);
		return $(this);
	};
	$.fn.bbfavorite.defaults = {
		dataName: 'bbfavorite', // data name for elements to target
		storageName: 'bbfavorites', // name for storage
		favoritedClass: 'favorite', // class for mark if favorited
		extraData: [], // extra data attributes to save
		onload: null
	};
})(jQuery, window.localStorage);
