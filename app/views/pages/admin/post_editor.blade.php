@extends('layouts.default')
@section('meta_title')
	Dog Post	
@stop
@section('external')
	{{HTML::script('js/confirmPageExit.js')}}
	{{HTML::script('js/uploader.js')}}
	{{HTML::script('packages/Trumbowyg-1.1.7/dist/trumbowyg.min.js')}}
	{{HTML::style('packages/Trumbowyg-1.1.7/dist/ui/trumbowyg.min.css')}}
	{{HTML::style('css/post_creation.css')}}
	{{HTML::style('css/modal.css')}}
	{{HTML::style('packages/cropper/dist/cropper.css')}}
	{{HTML::script('packages/cropper/dist/cropper.js')}}
@stop
@section('content')
<script type="text/javascript">
$(document).ready(function() {
	enableBeforeUnload();
});
</script>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			{{-- {{Form::open(array('url' => URL::route('profile.post.postAuth', array($post->id)), 'id' => 'postAuth', 'files' => 'true'))}} --}}
			{{Form::open(array('method' => 'POST', 'route' => ['profile.post.postAuth', $post->id], 'id'=>'postAuth', 'files' => true))}}

				<div class="form-group">
				<a href="#" id="post-uploader" title="upload an image">
				<input name="thumbnail" type="file" id="file"/>
				<div class="fa fa-cloud-upload fa-4x" id="post-uploader-cover" style="display:none;"></div>
				<span id="spinning" style="position:absolute; right:50%; top:50%; background:white;"></span>
					@if(isset($path) && !empty($path))
							<img src="{{URL::asset($path)}}" class="img-thumbnail" width="751px" >
					@else
						@if(Session::has('new_path'))
							<img src="{{URL::asset(Session::get('new_path'))}}" class="img-thumbnail" width="751px" >
						@else
							<img src="{{URL::asset('img/icon/default_post.jpg')}}" class="img-thumbnail" width="751px" >
						@endif
					@endif
				</a>

				<script type="text/javascript">

					$("input:file").mouseover( function(){
					     $('#post-uploader-cover').show();
					}).mouseout(function(){
					     $('#post-uploader-cover').hide();
					}).mouseup(function(){
					     $('#post-uploader-cover').hide();
					});

					$('#file').uploader({
						formID: 'postAuth',

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
								aspectRatio: 16/4,
								autoCropArea: 1,
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
								$('input[name="file_type"]').val("post");
								$('input[name="body"]').val($('#body').val());
								$('input[name="title"]').val($('#title').val());
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
			<div class="form-group">
				<label> Title </label>
				{{Form::text('title',$post->title , array('id' => 'title', 'class' => 'form-control input-lg center-block', 'style' => 'width:100%;'))}}
			</div>
			<div class="form-group">
				<label> Description </label>
				{{Form::textarea('body',$post->description, array('id' => 'body', 'class' => 'form-control' ))}}
			</div>
			<div class="form-group">
				<label>Breed</label>
				{{Form::select('breed', $breeds, $post->breed->id, array('class'=>'form-control' ))}}
			</div>
				@if(Session::has('new_path'))
					{{Form::hidden('file_path', Session::get('new_path') ,array('id'=>'file_path'))}}
				@endif
				<input type="submit" class="btn btn-success btn-lg btn-block" value="Save" name="edit">
			<script>
				var btnsGrps = jQuery.trumbowyg.btnsGrps;
				$('#body').trumbowyg({
					mobile:true,
					table:true,	
					fullscreenable: false,
					closable: false,
					removeformatPasted: true,
					btns:['formatting', '|', btnsGrps.design, '|', 'link','|', btnsGrps.lists ]
				});
			</script>
			{{Form::close()}}
		</div>
		@include('includes.modal.image')
		<div class="col-md-4 bg-warning">
			<h3> Read before posting </h3>
			<dl>
				<dt>pleasure that has no annoying consequences, or one who avoids a p atj</dt>
				<dd>pleasure that has no annoying consequences</dd>
			</dl>
			<dl>
				<dt>pleasure that has no annoying consequences, or one who avoids a p atj</dt>
				<dd>pleasure that has no annoying fficia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo m consequences</dd>
			</dl>
			<dl>
				<dt>The standard Lorem Ipsum passage, used since the 1500s</dt>
				<dd>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</dd>
			</dl>
		</div>
	</div>
</div>
@stop
