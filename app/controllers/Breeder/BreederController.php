<?php
namespace controllers\Breeder;

use Illuminate\Support\Facades\View;
use Post;
use Codedog\Utilities\General;


class BreederController extends \BaseController {

	public function index() {
		$general = new General();
		return View::make('pages.breeder',[
			'actives' => Post::where('expired_at', '>', new \DateTime('today'))->get(),
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
