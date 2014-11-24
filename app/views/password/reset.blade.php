@extends('layouts.default')
@section('meta_title')
	Login
@stop
@section('external')
	{{HTML::style('css/login.css');}}
@stop

@section('content')

<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    Email Address: <input type="email" name="email">
    New Password: <input type="password" name="password">
    Confirm New Password: <input type="password" name="password_confirmation">
    <input type="submit" value="Reset Password">
</form>

@stop




