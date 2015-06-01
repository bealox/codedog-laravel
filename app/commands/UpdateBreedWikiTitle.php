<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Codedog\Wikipedia\Api;

class UpdateBreedWikiTitle extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:UpdateBreedWikiTitle';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update the title for Breed.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

		$breeds = Breed::all();
		$wiki = new Api();

		foreach( $breeds as $breed){
			if($breed->wiki_title == null){
				$name = $breed->name;
				$name = str_replace(' ', '_', $name);
				$breed->wiki_title = $name;
				$breed->save();
			}

			if($breed->description == null){
				
				$url = "https://en.wikipedia.org/w/api.php?";
				$parameters = "action=query&prop=extracts&format=json&exintro=&explaintext=&titles=".urlencode($breed->wiki_title);
				$url = $url.$parameters;
				$json = $wiki->curl($url);
				$desc = $wiki->getDecResults($json);
				$breed->description = $desc;
				$breed->save();
			}

			if($breed->thumbnail_url == "http://lorempixel.com/50/50/" 
				|| is_null($breed->thumbnail_url)){

				$url = "http://en.wikipedia.org/w/api.php?action=query&titles=";
				$url = $url.urlencode($breed->wiki_title);
				$parameters = "&prop=pageimages&format=json&pithumbsize=242";
				$url = $url.$parameters;

				$json = $wiki->curl($url);

				$this->info($json);

				$results = $wiki->getSourceResults($json);

				$breed->thumbnail_url = $results;

				$breed->save();

			}
			
		}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
