@extends('layouts.simple_default')
@section('meta_title')
	Login
@stop
@section('external')
	{{HTML::style('css/login.css');}}
@stop

@section('content')

<div class="pure-u-24-24">
	<div class="l-box">
	{{Form::open(array('action' => 'RemindersController@postReset', 'class' => 'pure-form pure-form-stacked'))}}
	<legend>Password Reset</legend>
			@if(count($errors) > 0 )	
			<p class="error">
				{{ $errors -> first('validate')}}
			</p>
			@endif
	    <input type="hidden" name="token" value="{{ $token }}">
	    <input type="hidden" name="email" value="{{ $email }}">
	    	<label>New Password:</label> 
				{{ Form::password('password', array('placeholder' => 'Password', 'required')) }}
		<label>Confirm New Password:</label> 
				{{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'required')) }}
	    <input type="submit" value="Reset Password" class="pure-button pure-button-primary">
	{{Form::close()}}
	</div>
</div>

@stop

