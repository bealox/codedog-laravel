@extends('layouts.search')
@section('meta_title')
	Dog Post	
@stop

@section('content')
	<div class="page-header">
		<h1>Dog Breeds</h1>
	</div>
	<div class="row breed_list">
		@foreach($breeds as $breed)
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="http://lorempixel.com/242/200/" class="img-thumbnail">
				<div class="caption">
					<h4>{{$breed->transcated_name()}}</h4>
					<p>Cras justo odio, dapibus ac facilisis in, 
					egestas eget quam. Donec id elit non mi porta gravida at eget metus.
					 Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					<p><a href="#" class="btn btn-primary" role="button">Button</a>
					 <a href="#" class="btn btn-default" role="button">Button</a></p>
					<span class="label label-default pull-right">{{$breed->breedtype->name}}</span>
				</div>
			</div>
		</div>
		@endforeach
	{{$breeds->links()}}
	</div>
@stop
