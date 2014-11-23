
@extends('layouts.default')
@section('meta_title')
	Login
@stop
@section('external')
	{{HTML::style('css/login.css');}}
@stop

@section('content')
	{{Form::open(array('url' => 'createuser'))}}
		<h2>User Form</h2>
		
		<p>
			{{ $errors -> first('email')}}
			{{ $errors -> first('password')}}
			{{ $errors -> first('first_name')}}
			{{ $errors -> first('last_name')}}
		</p>
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
			{{ Form::select('type', array('Dog'=> 'Dog', 'Cat' => 'Cat'), 'Dog')}}
		</p>
		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}
@stop
