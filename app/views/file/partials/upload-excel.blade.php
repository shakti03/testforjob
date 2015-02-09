<?php
  $testTypes = array_map('ucfirst', isset($testTypes) ? $testTypes : TestType::lists('name','id'));
?>
<!-- Modal -->
<div class="modal fade" id="uploadExcel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload excel file</h4>
      </div>
      {{ Form::open(['url'=>URL::to('upload-excel'),'enctype'=>'multipart/form-data','class'=>'form-horizontal']) }}
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-3 control-label">Test type</label>
          <div class="col-sm-9">
             {{ Form::select('test_type',$testTypes,null,['class'=>'form-control','required'])}}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Question type</label>
          <div class="col-sm-9">
            {{ Form::select('question_type',[''=>'Select question type', 'objective'=>'Objective','subjective'=>'Subjective'],null,['class'=>'form-control','required'])}}
          </div>
        </div>
        <div class="form-group">
          <label  class="col-sm-3 control-label"> Excel file </label>
          <div class="col-sm-9">
            {{ Form::file('uploadFile', ['class'=>'form-control padding0','required'])}}<br>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        {{ Form::submit('submit', ['class'=>'btn btn-primary'])}}
      </div>
      {{ Form::close()}}
    </div>
  </div>
</div>