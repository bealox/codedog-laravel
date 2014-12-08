<?php

class PostcodeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	private $url = 'https://auspost.com.au/api/postcode/search.json?';
	private $api_key = 'd52a2ddd-37ee-4fa9-9d44-31a433ae95a6';

	public function submitPostcodeJson() {
		$ch = curl_init();

		$postcode = Input::get('postcode');

		$config = array(
			'q' => $postcode,
			'excludepostboxflag' => 'true'
		);



		$url = $this->url . http_build_query($config);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  'Content-Type: application/json',
		  'auth-key:' . $this->api_key
		));


		$result = curl_exec($ch);

		/*	
		if(!curl_errno($ch))
		{
		 $info = curl_getinfo($ch);
		 echo $info['url'];
		}
		 */
		 

		curl_close($ch);
		print_r($result); 
		//return Response::json($result);
	}
}
?>
