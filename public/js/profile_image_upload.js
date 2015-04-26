$(function()
  {
      $('input:file').prop('disabled', false);
//      $('#profile_upload_cover').hide();

     var options = { 
        beforeSubmit: showRequest,  // pre-submit callback 
        success: showResponse// post-submit callback 
     }; 

     //this one can be on the component
     $("input:file").mouseover( function(){
	     $('#profile_upload_cover').show();
     }).mouseout(function(){
	     $('#profile_upload_cover').hide();
     }).mouseup(function(){
	     $('#profile_upload_cover').hide();
     });

     $("input:file").change(function (){
       var fileName = $(this).val();
       if(fileName != null){
	 $('#ajaxForm').ajaxForm(options).submit();
       } 
      });

      function showRequest(formData, jqForm, options) { 
	    $('#spinning').spin('large','white');
	    $('input#file').prop('disabled', true);
	    return true; 
     } 

     function showResponse(responseText, statusText, xhr, $form ) {

	 if(responseText.status == "fail"){
		$('#spinning').spin(false);
	 }

	 if(responseText.status == "success"){
		$('.profile-container').html("<img alt='Picture' src='" + responseText.path+"' id='"+responseText.fileName+"'/>")
		var $img = $('.profile-container > img');
		$img.cropper('destroy');
		$img.cropper({
			aspectRatio: 1/1,
			autoCropArea: 0.5,
			guides: false,
			highlight: false,
			dragCrop: false,
			movable: false,
			resizable: false,
			mouseWheelZoom: false,
			built: function(){
				 $('#spinning').spin(false);


				 $('#imageModal').modal({
					show: true,
					keyboard: false,
					backdrop: 'static',
				 }).on('hidden.bs.modal', function(){
				 }); 

				$('#zoom').slider({
					max:100,
					step:10,
					min:10,
					value:50,
					slide: function(event, ui){
						new_value = ui.value;
						ratio = new_value/100;
						console.log(ratio);
						$img.cropper('scroll_zoom', ratio);
						console.log($img.cropper('getImageData', true));
					}	
				}); 
			},
		});

		$('.modal-content .save').on('click', function(){
			var data = $img.cropper('getData', true);
			$('input[name="cropper_x"]').val(data.x);
			$('input[name="cropper_y"]').val(data.y);
			$('input[name="cropper_width"]').val(data.width);
			$('input[name="cropper_height"]').val(data.height);
			$('input[name="file_name"]').val($('.profile-container > img').attr('id'));
			$('#imageModalForm').submit();
		})

		$('.modal-content .delete').on('click', function(){
			$('input[name="file_name"]').val($('.profile-container > img').attr('id'));
			$('#imageModalForm').submit();
		})
	 }

	$('#alert').html(responseText.html); 

	$('input:file').prop('disabled', false);
     }
});
