//method that produce message when leave page;
function confirmOnPageExit(text,e){
	e = e || window.event;
	
	var message = 'Are you sure you want to leave this page? data you have entered may not be saved.';	

	if(text){
		message = text;	
	}

	if(e){
		e.returnValue = message;	
	}
	return message;
};
//assign message to beforeunload function, so prompts a modal when try to leave the page
function enableBeforeUnload(text) {
	var change_flag=1;
	$('form').submit(function(){
		change_flag=0;	
	});
	$(window).bind('beforeunload', function(){
		if(change_flag){
			console.log("calling enable");
			return confirmOnPageExit(text);
		}
	});
}
//disable if needed

