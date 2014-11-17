$(document).ready(function() {
	

	var width = $(window).width();
	$('.tooltip').tooltipster();
	if(width <= 1050) {
		$("nav li").each(function(i, v) {
			$(v).tooltipster('enable');
		});
	}else{
		$("nav li").each(function(i, v) {
			$(v).tooltipster('disable');
		});
	}
});


$(window).resize(function() {
	var width = $(window).width();
	if(width <= 1050) {
		$("nav li").each(function(i, v) {
			$(v).tooltipster('enable');
		});
	}else{
		$("nav li").each(function(i, v) {
			$(v).tooltipster('disable');
		});
	}
});



