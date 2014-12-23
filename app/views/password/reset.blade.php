@extends('layouts.default')
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
            @if(Session::has('error'))
	    <div id="error_val" style="display:none">{{Session::get('error')}}</div>
	   <script>
	        var msg = $('#error_val').text();	
		var n = noty({text: msg, type: 'error', timeout: '3000'});
		n.onShow;
	    </script>
	    @endif
	    <input type="hidden" name="token" value="{{ $token }}">
	    <input type="hidden" name="email" value="{{ $email }}">
	    	<label>New Password:</label> 
		<input type="password" name="password">
		<label>Confirm New Password:</label> 
		<input type="password" name="password_confirmation">
	    <input type="submit" value="Reset Password" class="pure-button pure-button-primary">
	{{Form::close()}}
	</div>
</div>

@stop




