
@extends('layouts.default')
@section('meta_title')
	Login
@stop
@section('external')
	{{HTML::style('css/login.css');}}
	{{HTML::style('css/create_user.css');}}
	{{HTML::style('js/package/jquery-ui-1.11.2/jquery-ui.theme.min.css')}}
	{{HTML::script('js/package/jquery-ui-1.11.2/jquery-ui.min.js')}}
	{{HTML::script('js/utils.js')}}
	{{HTML::script('https://www.google.com/recaptcha/api.js')}}
	{{HTML::style('css/utils.css')}}
@stop

@section('content')
	{{Form::open(array('url' => 'createuser'))}}
	<div class="create_user_container rounded_border">
		<h2 class="title">New User Form</h2>
		
		@if(count($errors) > 0 )	
			<p class="error rounded_border">
				{{ $errors -> first('email')}}
				{{ $errors -> first('password')}}
				{{ $errors -> first('first_name')}}
				{{ $errors -> first('last_name')}}
				{{ $errors -> first('postcode')}}
				{{ $errors -> first('suburb')}}
				{{ $errors -> first('password_confirmation')}}
				{{ $errors -> first('robot')}}
			</p>
		@endif
		<p>
			{{ Form::text ('first_name',"", array('placeholder' => 'First Name', 'class' => 'inputs'))}}
		</p>
		<p>
			{{ Form::text ('last_name',"", array('placeholder' => 'Last Name', 'class' => 'inputs'))}}
		</p>
		<p>
			{{ Form::text 
			('email', Input::old('email'), 
			array('placeholder' => 'example@domain.com', 'class' => 'inputs'))}}
		</p>
		<p>
			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'inputs')) }}
		</p>
		<p>
			{{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'class' => 'inputs')) }}
		</p>
		<p>
			{{Form::text('postcode', '',array('id'=>'postcode', 'placeholder' => 'Postcode', 'class' => 'inputs'))}}
		</p>
		<p>
			{{Form::text('suburb', '',array('id'=>'suburb', 'placeholder' => 'Suburb', 'class' => 'inputs'))}}
		</p>
		<p>
			{{Form::text('address', '',array('id'=>'address', 'placeholder' => 'Address', 'class' => 'inputs'))}}
		</p>
			<div class="g-recaptcha" data-sitekey="6Ldc5v4SAAAAALJ_2fquUl_7z13tTugj3oPo-ikb"></div>
		<p>{{Form::hidden('latitude', '',array('id'=>'latitude'))}}</p>
		<p>{{Form::hidden('longitude', '',array('id'=>'longitude'))}}</p>
		<p><input type="submit" class="button"></p>
</div>
	{{ Form::close() }}
@stop
