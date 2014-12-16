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

	public function postcodeJson($value = null) {
		$ch = curl_init();

		$postcode = $value != null ? $value : Input::get('postcode2');
		$request = Request::instance();
		$value = ltrim($request->getContent(), 'q=');

		$config = array(
			'q' => $value,
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

			
		if(!curl_errno($ch))
		{
		 $info = curl_getinfo($ch);
		 Log::info($info['url']);
		}
		 
		 

		curl_close($ch);
		return $result;
	}

	public function jQueryPostcode(){
		print_r($this->postcodeJson()); 
	}

	public function printPostCode($id) {
		return Response::json($this->postcodeJson($id));
	}
	public function rawPostcode() {
		return json_encode($this->postcodeJson());
	}
}
?>
