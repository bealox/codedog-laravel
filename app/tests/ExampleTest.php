<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function it_displays_flash_notifications()
	{
		Flash::message('Welcome aboard');
		$this->call('GET', '/');
	}

}
