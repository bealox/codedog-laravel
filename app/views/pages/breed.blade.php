@extends('layouts.search')
@section('meta_title')
	Dog Post	
@stop

@section('external_css')
	{{HTML::style('css/breed.css')}}
@stop

@section('content')
	<div class="row breed_list">
		@foreach($breeds as $breed)
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<div class="thumbnail-container">
					<div style="background:url({{$breed->thumbnail_url}}); background-size:cover;"
					class="img-thumbnail"></div>
				</div>
				<div class="caption">
					<h4>{{$breed->transcated_name()}}</h4>
					<p class="desc">{{$breed->transcated_desc()}} 
						<a class="" href="{{$breed->wiki_link()}}">
							..more
						</a>
					</span></p>
					<p>
					  @if($breed->active_posts()->count() > 1)
					 <a href="{{URL('/post?breed='.$breed->id.'->id&state=')}}" 
						class="btn btn-primary" role="button">
						{{$breed->active_posts()->count() }} posts
					 </a>
					  @elseif($breed->active_posts()->count() == 1)
					 <a href="{{URL('/post?breed='.$breed->id.'->id&state=')}}" 
						class="btn btn-primary" role="button">
						{{$breed->active_posts()->count() }} post
					 </a>
					  @else
					 <a href="{{URL('/post?breed='.$breed->id.'->id&state=')}}" 
						class="btn btn-default" role="button" disabled="disabled">
						{{$breed->active_posts()->count()}} post
					 </a>
					  @endif
					 <a href="{{URL('/dog_breeder?breed='.$breed->id.'->id&state=')}}" 
						class="btn btn-warning" role="button">
						Find Breeders
					 </a>
					</p>
					<span class="label label-default pull-right">{{$breed->breedtype->name}}</span>
				</div>
			</div>
		</div>
		@endforeach
	{{$breeds->links()}}
	</div>
@stop
