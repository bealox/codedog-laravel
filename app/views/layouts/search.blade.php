<!doctype html>
<html>
<head>
	@include('includes.head')
	<script type="text/javascript">
		$(document).ready( function() {
			breed_select2(false);

			@if(isset($state))
				state_select2({{$state}});
			@endif

			@if(isset($types))
				type_select2({{$types}});
			@endif
		});
	</script>
	@include('includes.header')
	{{HTML::script('js/utils.js')}}
	{{HTML::style('css/utils.css')}}
	{{HTML::style('packages/select/select2.css')}}
	{{HTML::script('packages/select/select2.js')}}
	@yield('heading')
</head>
<body>
<div class="container inner">
	@include('includes.notification')
	{{Form::open(['method' => 'GET'])}}
		<div class="row">
		<div class="col-md-3 col-xs-12">
			<div class="list-group">
				<div class="list-group-item">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
					{{Form::hidden('breed',$selected_breed,array('placeholder' => 'Breed', 'id' => 'breed_select2', 'class'=>'form-control'))}}
					</div>
				</div>	
				@if(Request::is('post'))
				<div class="list-group-item">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-location-arrow fa-fw"></i></span>
					{{Form::hidden('state',$selected_state ,array('placeholder' => 'state', 'id' => 'state_select2', 'class'=>'form-control'))}}
					</div>
				</div>	
				@endif
				@if(!Request::is('post'))
				<div class="list-group-item">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
					{{Form::hidden('type',$selected_type ,array('id' => 'type_select2', 'class'=>'form-control'))}}
					</div>
				</div>	
				@endif
				<div class="list-group-item">
					<input type="submit" value="Search" class="btn btn-primary">
				</div>	
			</div>
		</div>
		<div class="col-md-9 col-xs-12">
			@yield('content')
		</div>
		</div>
	{{Form::close()}}
</div>
	@include('includes.footer')
</body>
</html>

