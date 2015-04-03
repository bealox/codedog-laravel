<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
<header>
	<script type="text/javascript">
		$(document).ready( function() {
			breed_select2(false);
		});
	</script>
	@include('includes.header')
	{{HTML::script('js/utils.js')}}
	{{HTML::style('css/utils.css')}}
	{{HTML::style('packages/select/select2.css')}}
	{{HTML::script('packages/select/select2.js')}}
</header>
<div class="container inner">
	@include('includes.notification')
	{{Form::open(['method' => 'GET'])}}
		<div class="row">
		<div class="col-md-3 col-xs-12">
			<div class="list-group">
				<div class="list-group-item">
					<h4 class="list-group-item-heading">Breed</h4>
					{{Form::hidden('breed',$selected_breed,array('placeholder' => 'Breed', 'id' => 'breed_select2', 'class'=>'form-control'))}}
				</div>	
				@if(Request::is('post'))
				<div class="list-group-item">
					<h4 class="list-group-item-heading">State</h4>
					{{Form::select('state',  array('' => 'State')+$state, $selected_state, array('placeholder' => 'State', 'class' => 'form-control'))}}
				</div>	
				@endif
				@if(!Request::is('post'))
				<div class="list-group-item">
					<h4 class="list-group-item-heading">Type</h4>
					{{Form::select('type',  $breedtypes, $selected_breedtype, array('placeholder' => 'Type', 'class' => 'form-control'))}}
				</div>	
				@endif
				<div class="list-group-item">
					<input type="submit" value="Search">
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

