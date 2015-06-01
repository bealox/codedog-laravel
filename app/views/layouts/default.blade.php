
<!doctype html>
<html>
<head>
	@include('includes.head')
	@yield('external_css')
	{{HTML::script('packages/ajaxForm/jquery.form.min.js')}}
</head>
<body>

	<header>
		@include('includes.header')
		
	</header>
	<div class="container inner">
		@yield('content')
	</div>

	@include('includes.footer')
</body>
</html>

