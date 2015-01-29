<?php
namespace controllers\Post;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Post;
use Codedog\Utilities\General;


class PostController extends \BaseController {

	public function index() {
		$general = new General();

		$state_query = Request::get('state');
		$selected = empty($state_query)? null : Request::get('state');

		if(empty($state_query)){
			$active = Post::all();
			//$active = Post::paginate('10');
			dd($active->count());
		}else{
			$active = \DB::table('Post')
				->leftJoin('User', 'User.id', '=', 'Post.user_id')
				->leftJoin('Metadata', 'Metadata.user_id', '=', 'User.id') 
				->where('Metadata.state', '=', 'QLD')->get();
			//return \Response::json($active);
		}

		return View::make('pages.post',[
			//'active' => Post::active()->orderBy('updated_at','created_at')->paginate('10'),
			'active' => $active,
			'state' => $general->state(),
			'selectedstate' => $selected
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
		//
	}

}
