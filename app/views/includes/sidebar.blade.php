<div class="sidebar row">
	<h2>{{$title or "Title"}}</h2>
	<ul>
	@foreach( $links as $link )
	<li><a href="{{URL::route(strtolower($link))}}">{{$link}}</a></li>
	@endforeach
	</ul>
</div>
