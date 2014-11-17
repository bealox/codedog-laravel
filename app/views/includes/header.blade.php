	<div id="logo_bar"> </div>
	<div id="header_inner">
		<nav>
			<ul>
				<li class="menu_home tooltip" title="Home">
					<a href="{{URL::to('/')}}">
					<span class="icon medium"></span>
					<span class="header_link">Home</span>
					</a>
				</li>
				<li class="menu_breeds tooltip" title="Dog Breeds">
					<a href="#">
					<span class="icon medium"></span>
					<span class="header_link">Dog Breeds</span>
					</a>
				</li>
				<li class="menu_breeders tooltip" title="Dog Breeders">
					<a href="#">
					<span class="icon medium"></span>
					<span class="header_link">Dog Breeders</span>
					</a>
				</li>
				<li class="menu_posts tooltip" title="Posts">
					<a href="#" >
					<span class="icon medium"></span>
					<span class="header_link">Posts</span>
					</a>
				</li>
			</ul>
			<div class="side_menu">
				@if(Auth::user())
					<a  class="tooltip_setting" href="#" title="<a href='#'>title</a>">
						<span class="icon medium"></span>
					</a>
				@else
					<a href="{{URL::route('login')}}">
						<span>Login</span>
					</a>
				@endif
			</div>
		</nav>
	</div>
