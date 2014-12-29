
<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
<header>
	@include('includes.header')
</header>
<div class="container">
	<div class="row">
	<div class="col-md-3 col-xs-12">
		<div class="list-group">
		 <a class="list-group-item disabled">Settings</a>
		  <a href="{{URL::route('dashboard');}}" class="list-group-item {{(Request::is('*/dashboard')?'active' : '')}}">
		    Account Details
		  </a>
		  <a href="{{URL::route('history');}}" class="list-group-item {{(Request::is('*/history')?'active' : '')}}">
		    History of Ads 
		  </a>
		</div>
	</div>
	<div class="col-md-8 col-xs-12">
		@yield('content')
	</div>
	</div>
</div>
</body>
</html>

