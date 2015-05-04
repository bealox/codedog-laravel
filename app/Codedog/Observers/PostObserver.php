<?php 
namespace Codedog\Observers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PostObserver {
	public function saving($model)
	{
		$date = Carbon::today();
		$date->addMonths(3);
		Log::info($date);
		$model->expired_at = $date;
	}

	public function saved($model)
	{

	}
}
