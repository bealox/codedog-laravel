<?php
namespace controllers\Breeder;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request;
use Breed;
use Codedog\Utilities\General;


class BreederController extends \BaseController {

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

		//return Response::json($breeds);
		
		return View::make('pages.breeder',[
			'selected_breed' => $breed_query,
			'selected_type' => $type_query,
			'breeds' => $breeds,
			'types' => json_encode($breedtypes)
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
