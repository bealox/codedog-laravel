<?php namespace Codedog\Wikipedia;


class Api{

	function curl($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	//parse the json output
	function getDecResults($json){

		// $results = array();

		$json_array = json_decode($json, true);

		$results = '';


		foreach($json_array['query']['pages'] as $page){
				$results = $page["extract"];
		}

		return $results;

	}

	/*
		Get Thumbnail for a wiki page from wiki
		@return an url
	*/

	function getSourceResults($json){

		// $url = array();

		$json_array = json_decode($json, true);

		$url = '';

		foreach($json_array['query']['pages'] as $page){
				// foreach($page['thumbnail'] as $thumbnail){
				// 	$url = $thumbnail['source'];
				// }
				$url = $page['thumbnail']['source'];
		}

		return $url;

	}

}


?>
