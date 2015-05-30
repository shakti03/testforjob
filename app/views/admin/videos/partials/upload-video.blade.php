<?php 
  $videoCategories = VideoCategory::lists('name','id');
?>
<!-- Modal -->
<div class="modal fade" id="uploadVideo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">UPLOAD VIDEO FILE</h4>
      </div>
      {{ Form::open(['url'=>URL::to('admin/upload-video'),'enctype'=>'multipart/form-data','class'=>'form-horizontal','id'=>'uploadVideoForm']) }}
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-3 control-label">Enter a title:</label>
          <div class="col-sm-9">
             {{ Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter video title','required'])}}
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Youtube URL</label>
          <div class="col-sm-9">
             {{ Form::text('url_path',null,['class'=>'form-control','placeholder'=>'Enter youtube URL Path ','required'])}}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Video type:</label>
          <div class="col-sm-4">
            {{ Form::select('video_category_id',[''=>'Select video type']+$videoCategories+['others'=>'Others'],null,['class'=>'form-control', 'required'])}}
            {{ Form::text('other_type',null,['class'=>'form-control','placeholder'=>'Enter other type','style'=>'display:none'])}}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        {{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}
      </div>
      {{ Form::close()}}
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
        $('#uploadVideoForm').submit(function(){
          $('loader').show();
        }); 
  });
</script>