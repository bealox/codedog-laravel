@extends('layouts.simple_default')
@section('meta_title')
	Login
@stop
@section('external')
	<!--{{HTML::style('css/login.css');}}-->
@stop

@section('content')
{{ Form::open(array('url' => 'login', 'class' => 'pure-form pure-form-stacked')) }}
<div class="pure-g">
	<div class="pure-u-10-24">
		<div class="l-box"> 
		    @if(Session::has('success'))
			    <div id="success_val" style="display:none">{{Session::get('success')}}</div>
			   <script>
				var msg = $('#success_val').text();	
				var n = noty({text: msg, type: 'success', timeout: '3000'});
				n.onShow;
			    </script>
		    @endif
		    <fieldset>
				<p>
					{{ $errors->first('email') }}
					{{ $errors->first('password') }}
					{{ $errors->first('message') }}
					{{ $errors->first('credentials') }}
				</p>
				 <legend>Sign in</legend>
					<label> Email </label>
					{{ Form::text('email', Input::old('email'), array('placeholder' => 'email', 'class' => 'pure-input-1')) }}
					<label> Password </label>
					{{ Form::password('password', array('placeholder' => 'password', 'class' => 'pure-input-1')) }}
					<div class="pure-u-10-10">
					<label>{{ Form::checkbox('remember_me', 'true', null, ['class' => '']);}} remember me </label>
					</div>
					<div class="pure-u-5-24">
					<input type="submit" name="login" value="Login" class="pure-button pure-button-primary">
					</div>
					<div class="pure-u-10-24">
					<a class="pure-button pure-input-1" href="/password/remind/">forgot password</a>
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

