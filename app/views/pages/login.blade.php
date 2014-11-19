@extends('layouts.default')
@section('meta_title')
	Login
@stop
@section('external')
	{{HTML::style('css/login.css');}}
@stop

@section('content')
    <div class="login_container">
	{{ Form::open(array('url' => 'postAuth')) }}

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
		<input type="submit" name="login" value="Login">
		<input type="submit" name="forgotPassword" value="Forgot Password">
		</div>
	{{ Form::close() }}
  </div>
@stop

