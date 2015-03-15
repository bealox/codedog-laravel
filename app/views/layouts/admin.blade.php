
<!doctype html>
<html>
<head>
	@include('includes.head')
	@include('includes.header')
	{{HTML::style('css/profile.css')}}
	{{HTML::script('packages/ajaxForm/jquery.form.min.js')}}
	{{HTML::style('packages/cropper/dist/cropper.css')}}
	{{HTML::script('packages/cropper/dist/cropper.js')}}
	{{HTML::script('packages/jquery-ui-1.11.4.custom/jquery-ui.min.js')}}
	{{HTML::style('packages/jquery-ui-1.11.4.custom/jquery-ui.min.css')}}
	{{HTML::script('js/profile_image_upload.js')}}
</head>
<body>
<div class="container">
	<div class="row">
	<div class="col-md-2 col-xs-12">
		<div class="list-group">
			{{Form::open(['route' => 'profile.dashboard.check', 'files' => true, 'id' => 'ajaxForm'])}}
			<div class="list-group-item-heading relative">
				<a href="#" id="profile_uploader" style="display:inline-block; " >
					<input name="thumbnail" type="file" id="file"/>
					<div class="fa fa-cloud-upload fa-4x" id="profile_upload_cover" style="display:none;"></div>
					<span id="spinning" style="position:absolute; right:50%; top:50%; background:white;"></span>
					<img src="{{Auth::user()->thumbnail_url}}" class="img-thumbnail" width="165px" height="165px">
				</a>
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
	<div class="col-md-9 col-xs-12">
		@yield('content')
	</div>
	@include('includes.modal.profile_image')
	</div>
</div>
</body>
</html>

