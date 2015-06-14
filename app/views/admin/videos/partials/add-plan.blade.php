<!-- Modal -->
<div class="modal fade" id="addPlanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="background:#2D606F;color: #fff;  ">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Test plan</h4>
        </div>
        {{ Form::open(['url' => 'admin/videos/plan/add', 'class'=>'form-horizontal', 'id'=>'linkPlansForm','method'=>'post' ,'enctype'=>'multipart/form-data'])}}
        <div class="modal-body">
            <div id="alertMessage"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group formElement" id="testName">
                        <label class="col-md-2  text-right">Testplan :</label>
                        <div class="col-md-10">
                            <input type="hidden" name="videoids" value="" id="videoids">
                            <div class="checkbox">
                                <label><input type="checkbox" class="checkPlan" id="selectAllPlans"autocomplete=off>Select all</label>
                            </div>
                            @foreach($testPlans as $key => $column)
                            <div class="checkbox">
                                <label><input type="checkbox" class="checkPlan" name="testplanIDs[]" value="{{$key}}" autocomplete=off>{{ucfirst($column)}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
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
$(function(){
    
    $('#linkPlansForm').ajaxForm({
        beforeSubmit:  function(){
            $('.loader').show();
        }, 
        success: function(response){
            // console.log(response);
            window.location.reload();
        },
        complete:function(){
           $('.loader').hide(); 
        }
    });

    $('#selectAllPlans').change(function(){
        $('input.checkPlan').prop('checked', $(this).is(':checked'));
    });
})
</script>