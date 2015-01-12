@extends('layouts.simple_default')
@section('meta_title')
	Dog Post	
@stop
@section('external')
	{{HTML::script('packages/Trumbowyg-1.1.7/dist/trumbowyg.min.js')}}
	{{HTML::style('packages/Trumbowyg-1.1.7/dist/ui/trumbowyg.min.css')}}
@stop
@section('content')
	{{Form::open(array('url' => URL::route('profile.post.store')))}}
	{{Form::text('title', 'Title', array('class' => 'form-control input-lg center-block', 'style' => 'width:96%;'))}}
	{{Form::textarea('body','Body', array('id' => 'body', 'class' => 'form-control'))}}
	<script>
		var btnsGrps = jQuery.trumbowyg.btnsGrps;
		$('#body').trumbowyg({
			mobile:true,
			table:true,	
			fullscreenable: false,
			closable: false,
			btns:['formatting', '|', btnsGrps.design, '|', 'link','|', btnsGrps.lists ]
		});
	</script>
	{{Form::close()}}
@stop
