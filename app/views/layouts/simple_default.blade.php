
<!doctype html>
<html>
<head>
	@include('includes.head')
	@yield('external_css')
</head>
<body>

	<header>
		@include('includes.simple_header')
	</header>
	<div class="container inner">
			@include('includes.notification')
			@yield('content')
	</div>
	@include('includes.footer')
</body>
</html>

