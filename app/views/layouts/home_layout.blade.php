<!doctype html>
<html>
<head>
	@include('includes.head')
	@yield('external_css')
</head>
<body>

	<header>
		@include('includes.header')
	</header>
	@include('includes.notification')
	@yield('content')

</body>
</html>

