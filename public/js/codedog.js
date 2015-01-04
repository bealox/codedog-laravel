function check_delete(id) {
	if (confirm('Are you sure you want to delete this post?')) {
	    $.ajax({
	      url: '/profile/post/' + id,
	      type: 'post',
	      data: {_method: 'delete'},
	      success: function(result) {
	      }
	    });
	  }
}
