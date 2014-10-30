
<div class="header">
	<div class="header-inner">
		<ul class="admin">
			@if(Auth::user())	
				<li><a href="{{url('logout')}}">Logout</a></li>
			@else
				<li><a href="{{url('login')}}">login</a></li>
			@endif
		</ul>
		<a id="logo" href="/">Seek dog</a>
		<ul class="menu">
			<li><a href="/">Home</a></l
			<li><a href="/about">Post</a></li>
			<li><a href="/contact">Contact</a></li>
		</ul>
	</div>
</div>

