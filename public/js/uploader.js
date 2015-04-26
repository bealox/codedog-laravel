(function ($){

	$.fn.defaults = {
		formID: 'ajaxForm',
		onBeforeUpload: function(){},
		onError: function(){},
		onSuccess:function(responseText){}
	}

	$.fn.uploader = function(options){

		var settings = $.extend( {}, $.fn.defaults, options);

		var form_options = { 
			beforeSubmit: showRequest,  // pre-submit callback 
			success: showResponse,// post-submit callback 
			data: {type: 'submit'}
		}; 

		this.change(function(){
			$('#'+settings.formID).ajaxForm(form_options).submit();
		});

		function showRequest(formData, jqForm, options) { 
			settings.onBeforeUpload.call();
			return true; 
		} 

		function showResponse(responseText, statusText, xhr, $form ) {
			if(responseText.status == "fail"){
				settings.onError.call(responseText); 
			}
			if(responseText.status == "success"){
				settings.onSuccess.call(responseText);
			}
		}
	}

}(jQuery));
