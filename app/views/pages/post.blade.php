@extends('layouts.search')
@section('meta_title')
	Dog Post	
@stop

@section('content')
	<div class="page-header">
		<h1>Dog Post</h1>
	</div>
	@foreach($active as $post)
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="pull-right">{{$post->user->metadata->state}}</div>
				<h3 class="panel-title">{{$post->breed->name}}</h3>
			</div>
			<div class="panel-body text" >
					<div class="row">
					<div class="col-md-2"><img src="{{$post->user->thumbnail_url}}" class="img-thumbnail"></div>
					<div class="col-md-10"style="vertical-height:top;">{{$post->title}}</div>
					</div>
			</div>
			<div class="panel-footer">
				<div class="text-right" >
					<img src="{{$post->user->thumbnail_url}}" class="img-thumbnail">
					<div class="post-details">
						<span class="text-primary">{{$post->user->fullName()}}</span><br/>
						<span class="text-info">edited: {{Date::parse($post->updated_at)->ago()}}</span><br/>
						<span class="text-info">created: {{Date::parse($post->created_at)->ago()}}</span>
					</div>
				</div>
			</div>
		</div>
	@endforeach
	{{$active->links()}}
@stop
