@extends('layouts.simple_default')
@section('meta_title')
	Dog Post	
@stop
@section('external')
	<script type="text/javascript">
		var selected_location = <?php echo json_encode($metadata);?>;
	</script>
	{{HTML::script('js/utils.js')}}
	{{HTML::script('https://www.google.com/recaptcha/api.js')}}
	{{HTML::style('css/utils.css')}}
	{{HTML::style('packages/select/select2.css')}}
	{{HTML::script('packages/select/select2.js')}}
@stop
@section('content')
	{{Form::open(array('url' => URL::route('profile.dashboard.change_address')))}}
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
			<div class="form-group">
				<label class="control-label">Postcode</label>
				<input type="hidden" id="e1" name="postcode" required class="form-control"></input>
			</div>
		</div>
		<div class="col-md-8 col-md-offset-2">
			<div class="checkbox">
				<label>
					{{Form::checkbox('show_details',1, Auth::user()->metadata->show_details) }} show detail in your posts 
				</label>
			</div>
		</div>

		<input type="hidden" name="static_state" value="{{$state}}">
		<p>{{Form::hidden('postoffice_id', '',array('id'=>'postoffice_id'))}}</p>
		<p>{{Form::hidden('latitude', '',array('id'=>'latitude'))}}</p>
		<p>{{Form::hidden('longitude', '',array('id'=>'longitude'))}}</p>
		<p>{{Form::hidden('postcode_id', '',array('id'=>'postcode_id'))}}</p>
		<p>{{Form::hidden('suburb', '',array('id'=>'suburb'))}}</p>

		<div class="col-md-8 col-md-offset-2">	
			<div class="row">
			<div class="col-md-8">
				<input type="submit" value="Save" class="btn btn-success btn-block">
			</div>
			<div class="col-md-4">
				<a class="btn btn-default btn-block" href="{{URL::route('profile.dashboard.index')}}">
				Back	
				</a>
			</div>
			</div>
		</div>
	</div>
	{{Form::close()}}
@stop

