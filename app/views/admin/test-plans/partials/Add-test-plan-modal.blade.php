<!-- Modal -->
<div class="modal fade" id="addTestPlanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Test plan</h4>
        </div>
        {{ Form::open(['url' => 'admin/test-plan/add', 'class'=>'form-horizontal', 'id'=>'addTestPlanForm','method'=>'post' ,'enctype'=>'multipart/form-data'])}}
        <div class="modal-body">
            <div class="row">
                <div class="col-md-7">
                	<div class="form-group">
                        <label class="col-md-4">Plan name:</label>
                        <div class="col-md-8">
                        {{ Form::text('plan_name', null,['class'=>'form-control','placeholder'=>'Test plan name/title', 'required'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Price:</label>
                        <div class="col-md-8">
                        {{ Form::text('price', null,['class'=>'form-control','placeholder'=>'Test plan price', 'required'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Validity time</label>
                        <div class="col-md-8">
                        	{{ Form::input('number', 'validity_time', null, ['class'=>'form-control','placeholder'=>'Validitiy time (e.g. 1.6 => 1 year 6 month)', 'step'=>"0.01" ,'required'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4">Description</label>
                        <div class="col-md-8">
                        	{{ Form::textarea('description', null, ['class'=>'form-control','placeholder'=>'Description', 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <?php 
                        $features = PlanFeature::lists('name','id');
                    ?>
                    @foreach($features as $feature)
                        <div class="checkbox">
                            <label><input type="checkbox" name="feature[]"> {{$feature}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
		</div>
		<div class="modal-footer">
            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        {{Form::close()}}
    </div>
  </div>
</div>
{{HTML::script('assets/admin/js/jquery.form.min.js')}}
<script type="text/javascript">
	$(document).ready(function(){
		$('#addTestPlanForm').submit(function(e){
			e.preventDefault();
			$('#addTestPlanForm').ajaxSubmit({
	            beforeSubmit:  function(){
	                $('.loader').show();
	            },
	            success: function(response){
	                $('.loader').hide();
	                $('#addTestPlanModal').modal('hide');
	                window.location.reload();
	            }
	        });
		});
	});
</script>