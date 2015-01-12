
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
	@include('includes.notification')
	<div class="row">
	<div class="col-md-3 col-xs-12">
		<div class="list-group">
		 <a class="list-group-item disabled">Profile</a>
		  <a href="{{URL::route('dashboard');}}" class="list-group-item {{(Request::is('*/dashboard')?'active' : '')}}">
		    Account Details
		  </a>
		  <a href="{{URL::route('profile.post.index');}}" class="list-group-item {{(Request::is('*/post')?'active' : '')}}">
		    Posts 
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

