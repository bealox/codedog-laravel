<div class="sidebar row">
	<ul>
	@foreach( $links as $link )
	<li><a href="{{URL::route(strtolower($link))}}">{{$link}}</a></li>
	@endforeach
	</ul>
</div>	
