$(document).ready( function() {
	postcode_select2();
});

function postcode_select2() {

	var query= {q:''};

	if($('input[name="static_state"]').length){
		query['state'] = $('input[name="static_state"]').val();
	}

	$("#e1").select2({
		placeholder: 'Postcode',
		minimumInputLength: 3,
		width: '100%',
		initSelection: function(element, callback){
			var data = {'id': selected_location.id, 'text': selected_location.postcode + ' - ' + 
			selected_location.suburb + ' - ' + selected_location.state};
			callback(data);
		},
		ajax:{
			url:'/postcodejson',
			type:'POST',
			datatype:'json',
			quietMillis: 250,
			params: {
			    contentType: 'application/json; charset=utf-8'
			},
			data: function(term, page) {
				query['q'] = term;
				return query;
			},
			results: function(data, page) {
			    var Results = [];
                            if(data.localities.locality instanceof Array){
                                ($.map(data.localities.locality, function (item) {
					Results.push({'id': item.id, 'text':item.postcode + ' - ' + item.location + ' - ' + item.state, 'data': item});
                                }));
				   return {
					results: Results
				    };
                            //if a single result is returned
			    }else{
                                 ($.map(data.localities, function (item) {
					Results.push({'id': item.id, 'text': item.postcode + ' - ' + item.location + ' - ' + item.state, 'data': item});
                                }));
				    return {
					results: Results
				    }
			    }
			},
			cache: true
		}
	}).select2('val', []);

	$(document).on('change', '#e1',function() {
		console.log($(this).select2('data').data);
		$('input[name="postoffice_id"]').val($(this).select2('data').data.id);
		$('input[name="postcode_id"]').val($(this).select2('data').data.postcode);
		$('input[name="suburb"]').val($(this).select2('data').data.location)
		$('input[name="state"]').val($(this).select2('data').data.state)
		$('input[name="longitude"]').val($(this).select2('data').data.longitude)
		$('input[name="latitude"]').val($(this).select2('data').data.latitude)
	});
}





function postcode_autocomplete() {
            $("#postcode").autocomplete({
                minLength:3, 
                source: function (request, response) {
                    $.ajax({
                        type: 'POST',
                        url: 'postcodejson', //your server side script
                        dataType: 'json',
                        data: {
                            postcode: request.term,
                        },
                        success: function (data) {
                            //if multiple results are returned
                            if(data.localities.locality instanceof Array)
                                response ($.map(data.localities.locality, function (item) {
                                    return {
                                        label: item.location + ' ' + item.postcode + ',' + item.state,
                                        value: item.postcode,
					obj: item
                                    }
                                }));
                            //if a single result is returned
                            else
                                response ($.map(data.localities, function (item) {
                                    return {
                                        label: item.location + ', ' + item.postcode + ',' +item.state,
                                        value: item.postcode,
					obj: item
                                    }
                                }));
                        }
                    });
                },
		select: function(event, ui) {
			$('input[name="suburb"]').val(ui.item.obj.location);	
			$('select[name="state"]').val(ui.item.obj.state);	
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
