@extends('layouts.simple_default')
@section('meta_title')
	Dog Post	
@stop
@section('external')
	{{HTML::script('js/confirmPageExit.js')}}
	{{HTML::script('packages/Trumbowyg-1.1.7/dist/trumbowyg.min.js')}}
	{{HTML::style('packages/Trumbowyg-1.1.7/dist/ui/trumbowyg.min.css')}}
@stop
@section('content')
<script type="text/javascript">
$(document).ready(function() {
	enableBeforeUnload();
});
</script>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			{{Form::open(array('method' => 'PATCH', 'route' => ['profile.post.update', $post->id]))}}
			<div class="form-group">
				<label> Title </label>
				{{Form::text('title',$post->title , array('class' => 'form-control input-lg center-block', 'style' => 'width:100%;'))}}
			</div>
			<div class="form-group">
				<label> Description </label>
				{{Form::textarea('body',$post->description, array('id' => 'body', 'class' => 'form-control' ))}}
			</div>
			<div class="form-group">
				<label>Breed</label>
				{{Form::select('breed', $breeds, $post->breed->id, array('class'=>'form-control' ))}}
			</div>
				<input type="submit" class="btn btn-success btn-lg btn-block" value="Save">
			<script>
				var btnsGrps = jQuery.trumbowyg.btnsGrps;
				$('#body').trumbowyg({
					mobile:true,
					table:true,	
					fullscreenable: false,
					closable: false,
					removeformatPasted: true,
					btns:['formatting', '|', btnsGrps.design, '|', 'link','|', btnsGrps.lists ]
				});
			</script>
			{{Form::close()}}
		</div>
		<div class="col-md-4 bg-warning">
			<h3> Read before posting </h3>
			<dl>
				<dt>pleasure that has no annoying consequences, or one who avoids a p atj</dt>
				<dd>pleasure that has no annoying consequences</dd>
			</dl>
			<dl>
				<dt>pleasure that has no annoying consequences, or one who avoids a p atj</dt>
				<dd>pleasure that has no annoying fficia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo m consequences</dd>
			</dl>
			<dl>
				<dt>The standard Lorem Ipsum passage, used since the 1500s</dt>
				<dd>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</dd>
			</dl>
		</div>
	</div>
</div>
@stop
