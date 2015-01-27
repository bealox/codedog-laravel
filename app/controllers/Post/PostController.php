<?php
namespace controllers\Post;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Post;
use Codedog\Utilities\General;


class PostController extends \BaseController {

	public function index() {
		$general = new General();

		$query = Request::get('state');

		return View::make('pages.post',[
			//'active' => Post::active()->orderBy('updated_at','created_at')->paginate('10'),
			'active' => Post::expired()->paginate('10'),
			'state' => $general->state() 
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
