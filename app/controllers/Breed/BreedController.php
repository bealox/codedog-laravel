<?php
namespace controllers\Breed;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Codedog\Utilities\General;
use Illuminate\Support\Facades\View;
use Post;

class BreedController extends \BaseController {
	public function index() {
		$general = new General();
		return View::make('pages.breed',[
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

	/**
	 * return list of breeds
	 * @return Json
	 */
	public function json(){
		$request = \Request::instance();
		$value = trim($request->getContent(), "q=");
		if($value != ""){
			$breeds = \DogBreed::where('name', 'LIKE', '%'.$value.'%')->get();	
		}else{
			$breeds = \DogBreed::orderBy('name', 'asc')->get();
		}
		return \Response::json(($breeds));
	}

	/**
	 * Display list of breeds based on the id 
	 * @return Json 
	 */
	public function json_id(){
		$request = \Request::instance();
		$value = trim($request->getContent(), "id=");
		$breeds =explode("%2C", $value);
		Log::info($breeds);
		$query= DB::table('Breed'); 
		$query->where(function($query) use ($breeds) {
			for($i = 0 ; $i < count($breeds); $i++){
				$query->orWhere('id', '=', (int)$breeds[$i]);
			}
		});
		$results = $query->get();
		Log::info($results);
		return \Response::json(($results));
	}
}
?>
