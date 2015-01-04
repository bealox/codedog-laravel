@extends('layouts.simple_default')
@section('meta_title')
	Dog Post	
@stop
@section('content')
	{{Form::open(array('url' => URL::route('change_address')))}}
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="control-label"> Address</label>
					{{ Form::text('address',Auth::user()->metadata->address, array('placeholder' => 'Address', 'required', 'class'=> 'form-control')) }}
				</div>
		</div>
		<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label>Phone no</label>
					{{ Form::text('phone_no',Auth::user()->metadata->phone_no, array('placeholder' => 'Phone Number', 'required', 'class' => 'form-control')) }}
				</div>
		</div>
		<div class="col-md-8 col-md-offset-2">
			<div class="checkbox">
				<label>
					{{Form::checkbox('show_details',1, Auth::user()->metadata->show_details) }} show detail in your posts 
				</label>
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

