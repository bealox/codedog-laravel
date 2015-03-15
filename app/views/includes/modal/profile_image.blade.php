<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
{{Form::open(['route' => 'profile.dashboard.store', 'id' => 'imageModalForm'])}}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Position and size your image</h4>
      </div>
      <div class="modal-body">
	<div class="profile-container">
	</div>
	<div class="slider-outer">
		<span class="fa fa-compress"></span>
		<div id="zoom"></div>
		<span class="fa fa-expand"></span>
	</div>
      </div>
      <div class="modal-footer">
        <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button  type="button" class="btn btn-primary save">Save changes</button>
      </div>
    </div>
  </div>
			{{Form::hidden('cropper_y', '',array('id'=>'cropper_y'))}}
			{{Form::hidden('cropper_x', '',array('id'=>'cropper_x'))}}
			{{Form::hidden('cropper_width', '',array('id'=>'cropper_width'))}}
			{{Form::hidden('cropper_height', '',array('id'=>'cropper_height'))}}
			{{Form::hidden('file_name', '',array('id'=>'file_name'))}}
{{Form::close()}}
</div>
