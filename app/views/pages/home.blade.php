@extends('layouts.home_layout')
@section('meta_title')
	Home
@stop

@section('meta_description')
@stop

<div class="banner">
	<img class="img-responsive center-block relative" src="{{URL::asset('img/icon/banner.jpg')}}">
	<div class="text">
		<h1><strong>Dog Post</strong></h1>
		<h3>is a reliable source to purchase purebreed dog </h3>
	</div>
</div>

<div class="banner-explain">
	<div class="container">
	</div>
</div>

<div class="banner-browser">
	<div class="container">
	</div>
</div>

@include('includes.footer')
