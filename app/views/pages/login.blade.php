@extends('layouts.simple_default')
@section('meta_title')
	Login
@stop
@section('external_css')
  	{{-- {{HTML::style('css/login.css');}} --}}
 @stop
@section('content')
{{ Form::open(array('url' => 'login', 'class' => 'pure-form pure-form-stacked')) }}
<div class="row">
	<div class="col-md-12">
		<div class="row heading">
			<div class="col-md-3 col-xs-2"></div>
			<div class="col-md-6 col-xs-7" style="text-align:center;">
				<h2>Find your best friends</h2>
				<h3>"NAME" is the place where you meet dog lovers</h3>
			</div>
			<div class="col-md-3 col-xs-2"></div>
		</div>
		<div class="row">
		    <div class="col-md-4 col-xs-2"></div>
			<div class="col-md-4 col-xs-7 sign-in panel panel-default">
				<div class="col-md-12 form-group">
					<label> Email </label>
					{{ Form::text('email', Input::old('email'), array('placeholder' => 'email', 'class' => 'form-control')) }}
				</div>
				<div class="col-md-12 form-group">
					<label> Password </label>
					{{ Form::password('password', array('placeholder' => 'password', 'class' => 'form-control')) }}
				</div>
				{{-- <div class="col-md-12 ">
					<div class="checkbox">
					<label>{{ Form::checkbox('remember_me', 'true', null, ['class' => '']);}} remember me </label>
					</div>
				</div> --}}
				<div class="col-md-12 form-group">
					<input type="submit" name="login" value="Login" class="btn btn-primary btn-block btn-lg">
				</div>
				<div class="col-md-12" style="text-align:center;">
					<a  href="/password/remind/">Forgot your password?</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-2"></div>
		</div>
	</div>
</div>
{{ Form::close() }}
@stop

