<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Dog Post</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	<li class="{{Request::is('post')?'active' : ''}}">
		<a href="{{URL::route('post.index')}}">
			<span class="fa fa-pencil fa-fw"></span>
			Post
			<span class="sr-only">{{(Request::is('post')?'(current)' : '')}}</span>
		</a>
	</li>
	<li class="{{(Request::is('dog_breed')?'active' : 'false')}}">
		<a href="{{URL::route('dog_breed.index')}}">
			<span class="fa fa-paw fa-fw"></span>
			Dog Breeds
			<span class="sr-only">{{(Request::is('dog_breed')?'(current)' : '')}}</span>
		</a>
	</li>
	<li class="{{(Request::is('dog_breeder')?'active' : 'false')}}">
		<a href="{{URL::route('dog_breeder.index')}}">
			<span class="fa fa-male fa-fw"></span>
			Breeders
			<span class="sr-only">{{(Request::is('dog_breeder')?'(current)' : '')}}</span>
		</a>
	</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	@if(Auth::user())
		<li>
			<a href="{{URL::route('profile.post.create')}}"><span class="fa fa-pencil-square fa-fw"></span>Write</a>
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" >
				{{Auth::user()->first_name}}<span class="fa fa-chevron-down fa-fw"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="{{URL::route('profile.dashboard.index')}}">
				<span class="fa fa-cog fa-fw"></span>
				Profile</a></li>
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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
