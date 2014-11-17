@extends('layouts.default')
@section('meta_title')
	Login
@stop

@section('content')
	{{ Form::open(array('url' => 'postAuth')) }}
		<h1>Login</h1>

		<!-- if there are login errors, show them here -->
		<p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
			{{ $errors->first('message') }}
		</p>

		<p>
			{{ Form::label('email', 'Email Address') }}
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<input type="submit" name="login" value="Login">
		<input type="submit" name="forgotPassword" value="Forgot Password">
	{{ Form::close() }}

@stop

