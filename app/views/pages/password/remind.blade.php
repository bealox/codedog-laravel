@extends('layouts.simple_default')
@section('meta_title')
	Pet Seeker	
@stop
@section('external')
	{{HTML::style('css/login.css');}}
@stop

@section('content')

<div class="pure-u-24-24">
<div class="l-box">
	{{Form::open(array('url' => '/password/remind', 'class' => 'pure-form pure-form-aligned'))}}
<legend>Password Reminder</legend>
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


