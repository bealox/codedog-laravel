@extends('layouts.default')
@section('meta_title')
	Login
@stop
@section('external')
	{{HTML::style('css/login.css');}}
@stop

@section('content')
<div id="login">
{{ Form::open(array('url' => 'postAuth')) }}

    <div class="login_container rounded_border">
	<h2 class="title">Sign in</h2>

		<!-- if there are login errors, show them here -->
		<p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
			{{ $errors->first('message') }}
		</p>

		<p>
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'email', 'class' => 'inputs')) }}
		</p>

		<p>
			{{ Form::password('password', array('placeholder' => 'password', 'class' => 'inputs')) }}
		</p>
		<div class="action_bar">
		<input type="submit" name="login" value="Login" class="button">
		<input type="submit" name="forgotPassword" value="Forgot Password" class="button">
		
		</div>
  </div>
  <div class="register_container rounded_border">
	<h2 class="title_signup">Are you a registered dog breeder?</h2>
	<a class="large button" href="{{URL::route('createbreeder');}}">Sign up</a>
  </div>
{{ Form::close() }}
</div>
@stop

