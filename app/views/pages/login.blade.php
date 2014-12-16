@extends('layouts.default')
@section('meta_title')
	Login
@stop
@section('external')
	<!--{{HTML::style('css/login.css');}}-->
@stop

@section('content')
{{ Form::open(array('url' => 'postauth', 'class' => 'pure-form pure-form-stacked')) }}
<div class="pure-g">
	<div class="pure-u-10-24">
		<div class="l-box"> 
		    <fieldset>
				<p>
					{{ $errors->first('email') }}
					{{ $errors->first('password') }}
					{{ $errors->first('message') }}
				</p>
				 <legend>Sign in</legend>
					<label> Email </label>
					{{ Form::text('email', Input::old('email'), array('placeholder' => 'email', 'class' => 'pure-input-1')) }}
					<label> Password </label>
					{{ Form::password('password', array('placeholder' => 'password', 'class' => 'pure-input-1')) }}
					<div class="pure-u-10-24">
					<input type="submit" name="login" value="Login" class="pure-button pure-input-1">
					</div>
					<div class="pure-u-13-24">
					<input type="submit" name="forgotPassword" value="Forgot Password" class="pure-button pure-input-1">
					</div>
				
		  </fieldset>
		</div>
	</div>
	<div class="pure-u-12-24">
		<div class="l-box"> 
	
		<legend>Join Us</legend>
			orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br/><br/>

orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.<a href="{{URL::route('createuser')}}">Join now</a> 
		</div>
	</div>
	

</div>
{{ Form::close() }}
@stop

