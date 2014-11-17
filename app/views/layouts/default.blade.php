
<!doctype html>
<html>
<head>
	@include('includes.head')
	{{HTML::style('css/default_layout.css');}}
</head>
<body>
<div id="content">

	<header class="col left">
		@include('includes.header')
	</header>
	<div class="container">
		<div id="col_1" class="row">
			<div>
				<h2>Links</h2>
				<ul>
					<li><a href="#">Puppy Posts</a></li>
					<li><a href="#">Mature Posts</a></li>
					<li><a href="#">Rsecue Posts</a></li>
				</ul>
			</div>
		</div>
		<div id="col_2" class="row">
			@yield('content')
		</div>
	</div>

</div>
</body>
</html>

