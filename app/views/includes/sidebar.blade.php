<div class="sidebar row">
	<ul>
	@for($i=0 ; $i <= count($links)-1 ; $i++)
	<li><a href="{{url($links[$i]['link']['url'])}}">
		{{$links[$i]['link']['name']}}
	</a></li>
	@endfor
	</ul>
</div>	
