@extends('layouts.search')
@section('meta_title')
	Dog Post	
@stop

@section('heading')
	{{HTML::style('css/post.css')}}
@stop

@section('content')
	@foreach($active as $post)
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="col-md-10 panel-title">{{$post->title}}</h3>
				</div>
				<a  href="{{URL::route('post.show', $post->id)}}" class="panel-body">
					<div class="row">
						<div class="col-md-12 post-img">
							<img src="{{$post->image_url}}" >
						</div>
					</div>
					<div class="text-right" >
						<div class="post-details">
							<span class="text-primary">{{$post->user->fullName()}}</span><br/>
							<span class="text-info">edited: {{Date::parse($post->updated_at)->ago()}}</span><br/>
							<span class="text-info">created: {{Date::parse($post->created_at)->ago()}}</span>
						</div>
					</div>
				</a>
		</div>
	@endforeach
	{{$active->links()}}
@stop
