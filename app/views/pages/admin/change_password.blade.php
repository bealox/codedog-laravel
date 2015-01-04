@extends('layouts.simple_default')
@section('meta_title')
	Dog Post	
@stop
@section('content')
	{{Form::open(array('url' => URL::route('change_password')))}}
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="control-label"> Current Password </label>
					{{ Form::password('current_password', array('placeholder' => 'Current Password', 'required', 'class'=> 'form-control')) }}
				</div>
		</div>
		<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="control-label"> New Password </label>
					{{ Form::password('new_password', array('placeholder' => 'New Password', 'required', 'class'=> 'form-control')) }}
				</div>
		</div>
		<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label> New Password Confirmation</label>
					{{ Form::password('new_password_confirmation', array('placeholder' => 'Confirm New Password', 'required', 'class' => 'form-control')) }}
				</div>
		</div>
		<div class="col-md-8 col-md-offset-2">	
			<div class="row">
			<div class="col-md-8">
				<input type="submit" value="Submit" class="btn btn-success btn-block">
			</div>
			<div class="col-md-4">
				<a class="btn btn-default btn-block" href="{{URL::route('dashboard')}}">
					Back
				</a>
			</div>
			</div>
		</div>
	</div>
	{{Form::close()}}
@stop

