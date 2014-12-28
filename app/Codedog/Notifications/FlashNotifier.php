<?php namespace Codedog\Notifications;

use Illuminate\Session\Store;

class FlashNotifier {

	private $session;

	function __construct(Store $session)
	{
	
		$this->session = $session;
	}

	public function overlay($message) 
	{
		$this->message($message);	
		$this->session->flash('flash_notification.overlay', true);
	}

	public function success($message) 
	{
		$this->message($message, 'success');	
	}

	public function error($message) 
	{
		$this->message($message, 'danger');	
	}

	public function errors($messages) 
	{
		$flat = array_flatten($messages);
		$message = implode($flat);
		$this->message($message, 'danger');	
	}

	public function message($message, $level = 'info') 
	{
		$this->session->flash('flash_notification.message', $message);
		$this->session->flash('flash_notification.level', $level);
	}

}

?>
