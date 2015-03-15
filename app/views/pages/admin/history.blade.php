@extends('layouts.admin')
@section('meta_title')
	Pet Seeker	
@stop

@section('content')
	@include('includes.notification')
	@include('includes.post.post_profile');
@stop
