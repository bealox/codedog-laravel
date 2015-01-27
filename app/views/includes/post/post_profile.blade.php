
<div class="panel panel-primary">
	<div class="panel-heading">Active Posts


	</div>
	  <div class="panel-body">
	    <p class="text-warning">You only can create one active post per time, if you want to create a new post you need to either wait until the current active post expired or delete it. </p>
	    <p>This panel is showing those posts are still active:</p>
	</div>
	<div class="list-group">
		@foreach($actives as $active)
			<div class="list-group-item">
				<div class="view_box">
					view
					<h4 class="count">100</h4>
				</div>
				<h4 class="list-group-item-heading">{{$active->title}}</h4>
				<div class="list-group-item-text-right text-danger" style="text-align:right; display:inline-block; width:90%;">expiry date: {{Date::parse($active->expired_at)->format('d/m/Y')}}
				</div>
				<div class="dropdown" style="display:inline-block;">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				    <li role="presentation"><a role="menuitem" tabindex="-1" class="btn-link" href="{{URL::route('profile.post.edit', $active->id)}}">
					<i class="fa fa-pencil fa-fw"></i>
					Edit</a></li>
    {{ Form::open(array('route' => array('profile.post.destroy', $active->id), 'method' => 'delete')) }}
				    <li role="presentation"><button role="menuitem" tabindex="-1" class="btn-link" onclick="return confirm('Are you sure you want to delete this post?');" >
					<i class="fa fa-trash fa-fw"></i>
					Delete</button></li>
    {{Form::close()}}
				 </ul>

				</div>
			</div>
		@endforeach
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">Expired Posts</div>
	  <div class="panel-body">
	    <p>This panel is showing those posts already expired:</p>
	</div>
	<div class="list-group">
		@foreach($expireds->sortByDesc('created_at') as $expired)
			<div class="list-group-item">
				<div class="view_box">
					view
					<h4 class="count">100</h4>
				</div>
				<h4 class="list-group-item-heading">{{$expired->title}}</h4>
				<p class="list-group-item-text-right" style="text-align:right;">{{Date::parse($expired->created_at)->ago()}}</p>
			</div>
		@endforeach
	</div>
</div>
{{$expireds->links()}}
