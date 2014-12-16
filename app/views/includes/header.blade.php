<div class="home-menu pure-menu pure-menu-open pure-menu-horizontal">
		<a  href="#" class="pure-menu-heading">Pet seeker</a>
		<ul>
			<li class="menu_home">
				<a href="{{URL::to('/')}}">
				<span class="fa fa-home fa-fw"></span>
				<span class="header_link">Home</span>
				</a>
			</li>
			<li class="menu_posts"> 
				<a href="#" >
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
		<ul style="float:right;">
			@if(Auth::user())
				<li>
					<a href="#" data-dropdown="#dropdown-1">{{Auth::user()->first_name}}<span class="fa fa-chevron-down fa-fw"></span></a>
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
<div style="position:relative; float:right; margin-top:8px;">
<div id="dropdown-1" class="dropdown dropdown-tip dropdown-anchor-right" style="display:none; margin-top:0;">
	<ul class="dropdown-menu">
		<li><a href="/admin/dashboard">
		<span class="fa fa-cog fa-fw"></span>
		Settings</a></li>
		<li><a href="/logout">
		<span class="fa fa-sign-out fa-fw"></span>
		Log out</a></li>
	</ul>
</div>
</div>

