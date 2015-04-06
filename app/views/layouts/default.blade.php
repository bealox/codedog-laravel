
<!doctype html>
<html>
<head>
	@include('includes.head')
	@yield('external')
</head>
<body>

	<header>
		@include('includes.header')
	</header>
	<div class="container inner">
		@include('includes.notification')
		@yield('content')
	</div>

	@include('includes.footer')
</body>
</html>

