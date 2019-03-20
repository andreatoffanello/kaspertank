$(document).ready(function() {

	$( ".trigger.one" ).hover( function() {

		$( ".target.one" ).toggleClass('highlight');
		$( ".targetimg.one" ).toggleClass('show');

	});

	$( ".trigger.two" ).hover( function() {

		$( ".target.two" ).toggleClass('highlight');
		$( ".targetimg.two" ).toggleClass('show');

	});

	$( ".trigger.three" ).hover( function() {

		$( ".target.three" ).toggleClass('highlight');
		$( ".targetimg.three" ).toggleClass('show');

	});

});