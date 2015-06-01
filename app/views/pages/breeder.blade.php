@extends('layouts.search')
@section('meta_title')
	Dog Post	
@stop

@section('external_css')
	{{HTML::style('css/breeder.css')}}
@stop
@section('content')
	@foreach($breeds as $breed)
		<div class="panel" >
			<div class="panel-heading" style="
				background: rgb(204, 204, 204); 
    			background: rgba(204, 204, 204, 0.5);">
				<div class="media">
					<div class="media-left media-middle">
						{{-- <div style="background:url({{$breed->thumbnail_url}}); background-size:cover;"
						class="img-rounded"></div> --}}
					</div>
					<div class="media-body">
						<h4 class="media-heading"><strong>{{$breed->name}}</strong>
							
						</h4>
						<span class="label label-default ">{{$breed->breedtype->name}}</span>
					</div>
				</div>
			</div>
			
			<table class="table table-striped">
				@foreach($breed->users as $user)
					<tbody>
						<tr>
							<td></td>
							<td width="50px">
								<div style="background:url({{$user->thumbnail_url}}); background-size:contain;"
								class="img-rounded img"></div>
							</td>
							<td>
								<p>{{$user->fullName()}}</p>	
							</td>
							<td>
								<p>{{$user->email}}</p>
							</td>
							<td>
								<p>{{$user->metadata->state}}</p>
							</td>
							<td>
								{{-- <p ><span class="fa fa-paper-plane"></span></p> --}}
							</td>
						</tr>
					</tbody>
				@endforeach
			</table>
		</div>
	@endforeach
	{{$breeds->links()}}
@stop
