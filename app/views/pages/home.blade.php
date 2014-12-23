@extends('layouts.default')
@section('meta_title')
	Home
@stop

@section('meta_description')
@stop

@section('content')
            @if(Session::has('error'))
		    <div id="error_val" style="display:none">{{Session::get('error')}}</div>
		   <script>
			var msg = $('#error_val').text();	
			var n = noty({text: msg, type: 'error', timeout: '3000'});
			n.onShow;
		    </script>
	    @endif

            @if(Session::has('success'))
		    <div id="success_val" style="display:none">{{Session::get('success')}}</div>
		   <script>
			var msg = $('#success_val').text();	
			var n = noty({text: msg, type: 'success', timeout: '3000'});
			n.onShow;
		    </script>
	    @endif
@stop
