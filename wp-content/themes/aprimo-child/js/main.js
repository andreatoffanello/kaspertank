var $ = require('jQuery');


$(document).ready(function() {

	$('.home_head a').hover( function() {

		$('#goto').css({
			'background':'red'
		});

	});

});