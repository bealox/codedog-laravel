
<div>
	<div id="menu-bar">
		<a href="/"><span class="main logo" href="/"></span></a>
		<div class="admin">
			@if(Auth::user())	
				<a href="{{url('logout')}}">Sign out</a>
				Hello {{Auth::user()->first_name}}
				<a href="/dashboard">setting</a>
			@else
				<a href="{{url('login')}}">login</a>
			@endif
		</div>
		<ul class="menu">
			<li><a href="/">Home</a></li>
			<li><a href="/about">Post</a></li>
			<li><a href="/contact">Contact</a></li>
		</ul>
	</div>
</div>

