<div class="navbar navbar-default">
	<div class="container-fluid">
		<div class="nav-bar">
			<a  href="/" class="navbar-brand">Pet Post</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="menu_posts"> 
				<a href="#" class="active" >
				<span class="fa fa-pencil-square-o fa-fw"></span>
				<span class="header_link">Posts</span>
				</a>
			</li>
			<li class="menu_breeds ">
				<a href="#">
				<span class="fa fa-paw fa-fw"></span>
				<span class="header_link">Dog Breeds</span>
				</a>
			</li>
			<li class="menu_breeders"> 
				<a href="#">
				<span class="fa fa-child fa-fw"></span>
				<span class="header_link">Dog Breeders</span>
				</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			@if(Auth::user())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">{{Auth::user()->first_name}}<span class="fa fa-chevron-down fa-fw"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="/admin/dashboard">
						<span class="fa fa-cog fa-fw"></span>
						Settings</a></li>
						<li><a href="/logout">
						<span class="fa fa-sign-out fa-fw"></span>
						Log out</a></li>
					</ul>
				</li>
			@else
				<li>
				<a href="{{URL::route('createuser')}}">
					<span class="fa fa-group fa-fw"></span>
					<span>Join us</span>
				</a>
				</li>
				<li>
				<a href="{{URL::route('login')}}">
					<span class="fa fa-sign-in fa-fw"></span>
					<span>Sign in</span>
				</a>
				</li>
			@endif
		</ul>
	</div>
</div>
