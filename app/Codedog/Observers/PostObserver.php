<?php 
namespace Codedog\Observers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PostObserver {
	public function saving($model)
	{
		Log::info('saving this bs');
		$date = Carbon::today();
		$date->month = 3;
		$model->expired_at = $date;
	}

	public function saved($model)
	{

	}
}
