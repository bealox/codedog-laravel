@extends('layouts.home_layout')
@section('meta_title')
	Home
@stop

@section('meta_description')
@stop

<div class="banner">
	<img class="img-responsive center-block relative" src="{{URL::asset('img/icon/banner4.jpg')}}">
	<div class="text">
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
