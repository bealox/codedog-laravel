@extends('layouts.admin')
@section('meta_title')
	Posts	
@stop
@section('content')
@include('includes.sidebar', $links)
{{Form::open(array('url' => 'profile/createpost'))}}
	<h1> Create New Post </h1>
	<p>
		{{ $errors -> first('title') }}
		{{ $errors -> first('description') }}
	</p>
	<p>
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title')}}
	</p>
	<p>
		{{ Form::label('description', 'Description') }}
		{{ Form::textarea('description')}}
	</p>
	<p>{{ Form::submit('Submit!')}}</p>
{{Form::close()}}
@stop

