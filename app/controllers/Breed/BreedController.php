<?php
namespace controllers\Breed;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Codedog\Utilities\General;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Post;
use Breed;
use BreedType;

class BreedController extends \BaseController {
	public function index() {
		$general = new General();

		$breed_query = empty(Request::get('breed')) ? null : Request::get('breed');
		$type_query = empty(Request::get('type')) ? null : Request::get('type');


		if(is_null($breed_query) && is_null($type_query)){
			$breeds = Breed::orderBy('name')->paginate('12');
		}else{
			$query = Breed::select(array('Breed.*'))
				->leftJoin('BreedType', 'Breed.breedtype_id', '=', 'BreedType.id');

			if(!is_null($breed_query)) {
				$query->where('Breed.id', '=', $breed_query);	
			}

			if(!is_null($type_query)) {
				$query->where('Breed.breedtype_id', '=', $type_query);	
			}


			$breeds= $query->orderBy('name')->paginate('12');

		}


		$breedtypes = $general->breed_type_array();


		return View::make('pages.breed_list',[
			'selected_breed' => $breed_query,
			'selected_breedtype' => $type_query,
			'breeds' => $breeds,
			'breedtypes' => $breedtypes
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
