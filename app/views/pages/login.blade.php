@extends('layouts.simple_default')
@section('meta_title')
	Login
@stop
@section('external')
	<!--{{HTML::style('css/login.css');}}-->
@stop

@section('content')
{{ Form::open(array('url' => 'login', 'class' => 'pure-form pure-form-stacked')) }}
<div class="row">
	<div class="col-md-6">
		<div class="col-md-12">
			<h2>Sign in</h2>
		</div>
		<div class="col-md-12 form-group">
			<label> Email </label>
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'email', 'class' => 'form-control')) }}
		</div>
		<div class="col-md-12 form-group">
			<label> Password </label>
			{{ Form::password('password', array('placeholder' => 'password', 'class' => 'form-control')) }}
		</div>
		<div class="col-md-12 ">
			<div class="checkbox">
			<label>{{ Form::checkbox('remember_me', 'true', null, ['class' => '']);}} remember me </label>
			</div>
		</div>
		<div class="col-md-8">
			<input type="submit" name="login" value="Login" class="btn btn-success btn-block">
		</div>
		<div class="col-md-4">
			<a  href="/password/remind/" class="btn btn-default btn-block">forgot password</a>
		</div>

	</div>
	<div class="col-md-6">
	<div class="col-md-12">
		<h2>Join Us</h2>
			<p>orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br/><br/>

orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.<a href="{{URL::route('createuser')}}" class="btn-link"> Join now</a></p> 
	</div>
	</div>


</div>
{{ Form::close() }}
@stop

