
<!doctype html>
<html>
<head>
	@include('includes.head')
	@yield('external')
	{{HTML::script('packages/ajaxForm/jquery.form.min.js')}}
</head>
<body>

	<header>
		@include('includes.header')
		<div id="alert" style="margin-top:60px;">
		</div>
	</header>
	<div class="container inner">
		@yield('content')
	</div>

	@include('includes.footer')
</body>
</html>

