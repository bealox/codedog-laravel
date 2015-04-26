<?php
namespace controllers\Post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Post;
use Codedog\Notifications\Flash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PostImageController extends \BaseController {

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function destroy($id)
	{
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		Log::info("uploading image to ");
	}

	/**
	 * Validation for image files
	 *
	 * @return json 
	 */
	public function check()
	{
		Log::info("checking image to ");
	}

	/**to
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	}
}
?>


