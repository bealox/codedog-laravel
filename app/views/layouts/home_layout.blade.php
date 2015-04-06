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
	@include('includes.notification')
	@yield('content')

</body>
</html>

