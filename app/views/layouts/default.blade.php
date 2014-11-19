
<!doctype html>
<html>
<head>
	@include('includes.head')
	{{HTML::style('css/default_layout.css');}}
	@yield('external')
</head>
<body>
<div id="content">

	<header>
		@include('includes.header')
	</header>
	<div class="container">
		@if(isset($links))
			<div id="col_1" class="row">
				@include('includes.sidebar')
			</div>
		@endif
		<div id="col_2" class="row">
			@yield('content')
		</div>
	</div>

</div>
</body>
</html>

