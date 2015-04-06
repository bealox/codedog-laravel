@extends('layouts.search')
@section('meta_title')
	Dog Post	
@stop

@section('heading')
	{{HTML::style('css/breeder.css')}}
@stop
@section('content')
	@foreach($breeds as $breed)
		<div class="panel ">
			<div class="panel-heading">	
				<div class="media">
					<div class="media-left media-middle"><img class="media-object img-circle" src="{{$breed->thumbnail_url}}"></div>
					<div class="media-body">
						<h4 class="media-heading"><strong>{{$breed->name}}</strong>
						</h4>
						<span class="label label-default " >{{$breed->breedtype->name}}</span>
					</div>
				</div>
			</div>
			
			<table class="table table-striped">
				@foreach($breed->users as $user)
					<tbody>
						<tr>
							<td></td>
							<td>
								<p>{{$user->fullName()}}</p>	
							</td>
							<td>
								{{$user->email}}
							</td>
							<td>
								{{$user->metadata->state}}
							</td>
						</tr>
					</tbody>
				@endforeach
			</table>
		</div>
	@endforeach
	{{$breeds->links()}}
@stop
