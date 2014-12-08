$(document).ready( function() {
	postcode_autocomplete();
});

function postcode_autocomplete() {
            $("#postcode").autocomplete({
                minLength:3, 
                source: function (request, response) {
                    $.ajax({
                        type: 'POST',
                        url: 'postcodejson', //your server side script
                        dataType: 'json',
                        data: {
                            postcode: request.term
                        },
                        success: function (data) {
                            //if multiple results are returned
                            if(data.localities.locality instanceof Array)
                                response ($.map(data.localities.locality, function (item) {
                                    return {
                                        label: item.location + ', ' + item.postcode,
                                        value: item.postcode,
					obj: item
                                    }
                                }));
                            //if a single result is returned
                            else
                                response ($.map(data.localities, function (item) {
                                    return {
                                        label: item.location + ', ' + item.postcode,
                                        value: item.postcode,
					obj: item
                                    }
                                }));
                        }
                    });
                },
		select: function(event, ui) {
			$('input[name="suburb"]').val(ui.item.obj.location);	
			$('input[name="longitude"]').val(ui.item.obj.longitude);	
			$('input[name="latitude"]').val(ui.item.obj.latitude);	
		},
		open: function(event) {
			$('.ui-autocomplete').css('height', '100px');
			var $input = $(event.target),
			    inputTop = $input.offset().top,
			    inputHeight = $input.height(),
			    autocompleteHeight = $('.ui-autocomplete').height(),
			    windowHeight = $(window).height();

			if ((inputHeight + inputTop+ autocompleteHeight) > windowHeight) {
			    $('.ui-autocomplete').css('height', (windowHeight - inputHeight - inputTop - 20) + 'px');
			}
		}
            });
}
