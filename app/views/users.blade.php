@extends('layout')

@section('content')
	@foreach($users as $user)
		<p>{{$user->first_name }}</p>	
	@endforeach
	<b>Single: {{$single}}</b>
@stop

@section('catcontent')
	@foreach($catusers as $user)
		<p>{{$user->first_name }}</p>	
	@endforeach
@stop

