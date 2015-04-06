<?php
namespace controllers\Post;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Post;
use Codedog\Utilities\General;


class PostController extends \BaseController {

	public function index() {
		$general = new General();

		$state_query = empty(Request::get('state')) ? null : Request::get('state');
		$breed_query = empty(Request::get('breed')) ? null : Request::get('breed');


		if(is_null($state_query) && is_null($breed_query)){
			$active = Post::active()->sortBy()->paginate('10');
		}else{
			$query = Post::select(array('Post.*'))
				->active()
				->leftJoin('User', 'Post.user_id', '=', 'User.id')
				->leftJoin('Metadata', 'Metadata.user_id', '=', 'User.id');

			if(!is_null($breed_query)) {
				$query->where('Post.breed_id', '=', $breed_query);	
			}

			if(!is_null($state_query)) {
				$query->where('Metadata.state', '=', $state_query);	
			}

			$active = $query->sortBy()->paginate('10');

		}


		return View::make('pages.post',[
			'active' => $active,
			'state' => json_encode($general->state()),
			'selected_state' => $state_query,
			'selected_breed' => $breed_query
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
		$metadata = $post->user->metadata;
		$suburb = str_replace(' ','+',$metadata->suburb);
		$loc = $suburb.','.$metadata->state;
		$gmap = $metadata->latitude.','.$metadata->longitude;

		$link = "http://maps.google.com/maps?q=".$loc."&ll=".$loc."&z=17";
		$map = "https://maps.googleapis.com/maps/api/staticmap?center=".$loc.
			"&zoom=12&size=340x340&markers=color:yellow%7C".$loc.'&key='.getenv('GOOGLE_API_KEY');

		return View::make('pages.post_view')->with(compact('post','map','link'));
	}

}
