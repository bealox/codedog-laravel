
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
	<div class="pure-g">
	<div class="pure-u-5-24">
		<div class="pure-menu pure-menu-open">
			<span class="pure-menu-heading">Settings</span>
			<ul>
				<li {{(Request::is('*/dashboard')?'class="pure-menu-selected"' : '')}}>
				<a href="{{URL::route('dashboard');}}" >
				<span class="fa fa-info fa-fw"></span>
				Personal Details</a></li>
				<li {{(Request::is('*/history')?'class="pure-menu-selected"' : '')}} ><a href="{{URL::route('history')}}">
				<span class="fa fa-history fa-fw"></span>
				History</a></li>
			</ul>
		</div>
	</div>
	<div class="content pure-u-15-24">
		<div class="l-box">
		@yield('content')
		</div>
	</div>
	</div>
</div>
</body>
</html>

