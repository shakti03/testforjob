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
      {{ Form::open(['url'=>URL::to('upload-video'),'enctype'=>'multipart/form-data','class'=>'form-horizontal','id'=>'uploadVideoForm']) }}
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-3 control-label">Enter a title:</label>
          <div class="col-sm-9">
             {{ Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter video title','required'])}}
          </div>
        </div>
        
<!--         <div class="form-group">
          <label class="col-sm-3 control-label">Select type</label>
          <div class="col-sm-9">
             {{ Form::select('file_type',['youtube'=>'Youtube link', 'uservideo'=>'Video file'],null,['class'=>'form-control'])}}
          </div>
        </div> -->

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
          <div class="col-sm-5">
            {{ Form::text('video_category_value',null,['class'=>'form-control','placeholder'=>'selected type\'s value','required'])}}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Company:</label>
          <div class="col-sm-9">
             {{ Form::text('company',null,['class'=>'form-control','placeholder'=>'Company name','required'])}}
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
$(document).ready(function(){
  $('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
  });

  $('[name="video_category_id"]').change(function(){
      var typeValue = $(this).val();
      if(typeValue == 'others'){
        $('input[name="other_type"]').addAttr('required');
        $('input[name="other_type"]').show();
      }else{
        $('input[name="other_type"]').removeAttr('required');
        $('input[name="other_type"]').hide();
      }
  });
});
</script>