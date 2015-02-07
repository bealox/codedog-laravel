@extends('layouts.default')
@section('meta_title')
	Dog Post	
@stop
@section('content')
		<h2>{{$post->title}}</h2>	
	<div class="row">	
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Post</h4>
				</div>
				<div class="panel-body pad post_view"> 
					{{$post->description}}
				</div>
			</div>
		</div>
		
		<div class="col-md-4 col-xs-12">
			<div class=" col-md-12 col-xs-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Author</h4>
					</div>
					<div class="panel-body">
						<div class="media">
							<div class="media-left">
								<img class="media-object img-thumbnail" src="{{$post->user->thumbnail_url}}" width="64px">
							</div>
							<div class="media-body media-middle">
								<h4 class="media-heading">{{$post->user->fullName()}}</h4>
							</div>
						</div>
					</div>
					 <ul class="list-group">
						<li class="list-group-item">
							<b>created:</b> {{Date::parse($post->created_at)->ago()}}</li>
						<li class="list-group-item">
							<b>updated:</b> {{Date::parse($post->updated_at)->ago()}}</li>
						<li class="list-group-item"><b>Breed:</b> {{$post->breed->name}}</li>
					</ul>
				</div>
			</div>
			<div class=" col-md-12 col-xs-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Location</h4>
					</div>
					<div class="panel-body">
						<a href="{{$link}}" target="_blank">
						<img class="img-responsive" src="{{$map}}">
						</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
@stop

