<?php

use Illuminate\Auth\Reminders\DatabaseReminderRepository as DbRepository;

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('pages.password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		$response = Password::remind(Input::only('email'), function($message){
				$message->subject(trans('Your Net-dog password reset.')); 
		});
		switch ($response)
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->with('success', 'Your password has been reset successfully');

		}	
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		self::deleteExpired();
		if (is_null($token)) App::abort(404);
		$email = DB::table(Config::get('auth.reminder.table'))->where('token', $token)->pluck('email'); 
		if (is_null($email)) App::abort(404);
		return View::make('pages.password.reset')->with('token', $token)->with('email', $email);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);
		
		$response = Password::reset($credentials, function($user, $password)
		{
				$user->password = $password;
				$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
				Flash::info(Lang::get($response));
				return Redirect::back()->withErrors(array('validate' => Lang::get($response)));
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::to('/')->with('success', Lang::get($response));
		}
	}

	public static function deleteExpired() {
		 $reminders = new DbRepository(DB::connection(), Config::get('auth.reminder.table'), Config::get('app.key'));
		 $reminders->deleteExpired();
	}

}
