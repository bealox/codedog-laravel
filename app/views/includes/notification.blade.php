@if(Session::has('flash_notification.message'))
	@if(Session::has('flash_notification.overlay'))
		@include('includes.notification_modal', ['modalClass' => 'flash-modal', 'title' => 'Notice', 'body' => Session::get('flash_notification.message')])
	@else
		<div class="alert alert-{{Session::get('flash_notification.level')}}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
			{{Session::get('flash_notification.message')}}
		</div>
	@endif
@endif
