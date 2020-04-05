var Light = {};



/* Extends jQuery core*/

jQuery.extend(true, {

	context: function(fn, context) {

		if (typeof context == 'string') {

			var _context = fn;

			fn = fn[context];

			context = _context;

		}

		return function() { return fn.apply(context, arguments); };

	}

});











