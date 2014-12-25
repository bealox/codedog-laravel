@extends('layouts.simple_default')
@section('meta_title')
	Login
@stop
@section('external')
	{{HTML::style('css/login.css');}}
@stop

@section('content')

<div class="pure-u-24-24">
<div class="l-box">
	{{Form::open(array('url' => '/password/remind', 'class' => 'pure-form pure-form-aligned'))}}
<legend>Password Reminder</legend>

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
	    <div class="pure-control-group">
		    <label>Email</label>
				{{ Form::text 
				('email', Input::old('email'), 
				array('placeholder' => 'example@domain.com', 'class' => 'pure-input-1-2', 'required'))}}
	<input type="submit" class="pure-button pure-button-primary " value="Send">
	    </div>
	</form>
	{{ Form::close()}}
</div>
</div>



@stop


