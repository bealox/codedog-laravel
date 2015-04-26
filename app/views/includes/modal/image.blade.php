<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
{{Form::open(['route' => 'profile.image_modal.postAuth', 'id' => 'imageModalForm'])}}
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
	<!--<input type="submit" class="btn btn-default delete" name="close" value="Close">-->
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<input type="submit"class="btn btn-primary save" name="save" value="Save Changes">
      </div>
    </div>
  </div>
			{{Form::hidden('cropper_y', '',array('id'=>'cropper_y'))}}
			{{Form::hidden('cropper_x', '',array('id'=>'cropper_x'))}}
			{{Form::hidden('cropper_width', '',array('id'=>'cropper_width'))}}
			{{Form::hidden('cropper_height', '',array('id'=>'cropper_height'))}}
			{{Form::hidden('file_name', '',array('id'=>'file_name'))}}
			{{Form::hidden('file_type', '',array('id'=>'file_type'))}}
			{{Form::hidden('title', '',array('id'=>'title'))}}
			{{Form::hidden('body', '',array('id'=>'body'))}}
{{Form::close()}}
</div>
