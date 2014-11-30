@extends('layouts.default')
@section('meta_title')
	Seek Dog	
@stop
@section('external')
{{HTML::style('js/package/jquery-ui-1.11.2/jquery-ui.theme.min.css')}}
{{HTML::script('js/package/jquery-ui-1.11.2/jquery-ui.min.js')}}
{{HTML::script('js/utils.js')}}
@stop
@section('content')
{{ Form::open(array('url' => 'json')) }}
<div>{{Form::text('postcode', '',array('id'=>'postcode'))}}</div>
<div>{{Form::text('suburb', '',array('id'=>'suburb'))}}</div>
<div>{{Form::hidden('latitude', '',array('id'=>'latitude'))}}</div>
<div>{{Form::hidden('longitude', '',array('id'=>'longitude'))}}</div>
<div>{{Form::submit('Submit')}}</div>
{{ Form::close()}}
@stop


