$(document).ready(function() {
	

	var width = $(window).width();
	$('.tooltip').tooltipster();
	$('.tooltip_setting').tooltipster({
		trigger: 'click',
		interacetive: true,
		theme: 'tooltip_setting_theme',
		delay: 100,
		contentAsHTML: true,
		content: $('<a style="pointer-events:auto;" href="/logout"><b>Logout</b></a>)')
	});
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



