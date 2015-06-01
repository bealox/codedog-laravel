
<!doctype html>
<html>
<head>
	@include('includes.head')
	@include('includes.header')
	{{HTML::style('css/profile.css')}}
	{{HTML::style('css/modal.css')}}
	{{HTML::script('packages/ajaxForm/jquery.form.min.js')}}
	{{HTML::style('packages/cropper/dist/cropper.css')}}
	{{HTML::script('packages/cropper/dist/cropper.js')}}
	{{HTML::script('packages/jquery-ui-1.11.4.custom/jquery-ui.min.js')}}
	{{HTML::style('packages/jquery-ui-1.11.4.custom/jquery-ui.min.css')}}
	{{HTML::script('js/uploader.js')}}

	@yield('external_css')
</head>
<body>
<div class="container inner">
	<div class="row">
	<div class="col-md-2 col-xs-12">
		<div class="list-group">
			{{Form::open(['route' => 'profile.image_modal.check', 'files' => true, 'id' => 'ajaxForm'])}}
			<div class="list-group-item-heading relative">
				<a href="#" id="profile_uploader" style="display:inline-block; " >
					<input name="thumbnail" type="file" id="file"/>
					<div class="fa fa-cloud-upload fa-4x" id="profile_upload_cover" style="display:none;"></div>
					<span id="spinning" style="position:absolute; right:50%; top:50%; background:white;"></span>
					<img src="{{Auth::user()->thumbnail_url}}" class="img-thumbnail" width="165px" height="165px">
				</a>
				<script type="text/javascript">

					$("input:file").mouseover( function(){
					     $('#profile_upload_cover').show();
					}).mouseout(function(){
					     $('#profile_upload_cover').hide();
					}).mouseup(function(){
					     $('#profile_upload_cover').hide();
					});

					$('#file').uploader({
						onBeforeUpload: function(){
							$('#spinning').spin('large','white');
							$('input#file').prop('disabled', true);
						},

						onError: function(){
							var responseText = this;
							$('#alert').html(responseText.html); 
							$('#spinning').spin(false);
							$('input#file').prop('disabled', false);
						},

						onSuccess: function(){
							var responseText = this;
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
								$('input[name="file_type"]').val("user");
								$('#imageModalForm').submit();
							})

							$('.modal-content .delete').on('click', function(){
								$('input[name="file_name"]').val($('.profile-container > img').attr('id'));
								$('input[name="file_type"]').val("user");
								$('#imageModalForm').submit();
							})

							$('#alert').html(responseText.html); 
							$('input#file').prop('disabled', false);
						}
						
					});

				</script>
			</div>
			{{Form::close()}}
		  <a href="{{URL::route('profile.dashboard.index');}}" class="list-group-item {{(Request::is('*/dashboard')?'active' : '')}}">
		    Account Details
		  </a>
		  <a href="{{URL::route('profile.post.index');}}" class="list-group-item {{(Request::is('*/post')?'active' : '')}}">
		    Posts 
		  </a>
		</div>
	</div>
	<div class="col-md-10 col-xs-12">
		@yield('content')
	</div>
	@include('includes.modal.image')
	</div>
</div>
	@include('includes.footer')
</body>
</html>

