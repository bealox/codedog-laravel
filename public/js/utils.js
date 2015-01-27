$(document).ready( function() {
	postcode_select2();
	breed_select2();
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
			if(typeof selected_location !== 'undefined'){
				console.log(selected_location);
				var data = {'id': selected_location.postoffice_id, 'text': selected_location.postcode + ' - ' + 
				selected_location.suburb + ' - ' + selected_location.state};
				callback(data);
			}
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
		console.log($(this).select2('data'));
		$('input[name="postoffice_id"]').val($(this).select2('data').data.id);
		$('input[name="postcode_id"]').val($(this).select2('data').data.postcode);
		$('input[name="suburb"]').val($(this).select2('data').data.location)
		$('input[name="state"]').val($(this).select2('data').data.state)
		$('input[name="longitude"]').val($(this).select2('data').data.longitude)
		$('input[name="latitude"]').val($(this).select2('data').data.latitude)
	});
}

function breed_select2(){

	var breed = $('#breed_select2');

	$("#breed_select2").select2({
		placeholder: 'Select A Breed',
		width: '100%',
		multiple:true,
		maximumSelectionSize:2,
		initSelection: function(element, callback){
			if(!breed.length == 0 && breed.val() ){
				var results;
				return $.ajax({
				url: '/breedjson_id',
				type: "POST",
				dataType: "json",
				data: {
				  id: breed.val()
				}
			      }).done(function(data) {
				 results = [];
                                ($.map(data, function (item) {
					results.push({'id': item.id, 'text':item.name});
                                }));
				 callback(results);
			    });
			}
		},
		ajax:{
			url:'/breedjson',
			type:'POST',
			datatype:'json',
			params: {
			    contentType: 'application/json; charset=utf-8'
			},
			data: function(term, page) {
				return {
					q : term	
				}	
			},
			results: function(data, page) {
			    var Results = [];
                            if(data instanceof Array){
                                ($.map(data, function (item) {
					Results.push({'id': item.id, 'text':item.name});
                                }));
				   return {
					results: Results
				    };
                            //if a single result is returned
			    }else{
                                 ($.map(data.localities, function (item) {
					Results.push({'id': item.id, 'text':item.name});
                                }));
				    return {
					results: Results
				    }
			    }
			},
			cache: true
		}
	}).select2('val', []);

	$(document).on('change', '#breed_select2',function() {
		$('input[name="breed_id"]').val($('#breed_select2').select2('data'));
	});
}

