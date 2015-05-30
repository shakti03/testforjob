<!-- Modal -->
<div class="modal fade" id="editTestModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Test</h4>
        </div>
        {{ Form::open(['url' => 'admin/test/edit', 'class'=>'form-horizontal', 'id'=>'editTestForm','method'=>'post' ,'enctype'=>'multipart/form-data'])}}
        <div class="modal-body">
            <input type="hidden" name="test_slugs" id="testSlugs" value="">
            {{--*/
                $selectData['test_type'] = [''=>'-Select test type-'] + $test_types;  
                $selectData['company']   = [''=>'-Select company-'] + $companies + ['other'=>'Other'];
                $selectData['subject']   = [''=>'-Select subject-'] + $subjects + ['other'=>'Other'];
               
                $selectData['difficulty_level'] = [''=>'-Select difficulty-'] + $difficulty_levels; 
            /*--}}
            
            @foreach($selectData as $key => $value)
            <div class="form-group formElement" id="{{$key}}Div">
                <label class="col-md-4">{{ucfirst($key)}} :</label>
                <div class="col-md-8">
                    {{ Form::select($key, $selectData[$key], null,['class'=>'form-control', 'required'])}}
                    {{ Form::text("other[$key]", null, ['class'=>'form-control other displayNone','data-name'=>$key, 'id'=>'other'.$key,'placeholder'=>'Enter your value', 'required'])}}
                </div>
            </div>
            @endforeach
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
        $("#editTestForm").validate({
            rules:{
                test_type : {
                    required: true
                },
                company : { 
                    required: true
                },
                subject : { 
                    required: true
                },
                difficulty_level : { 
                    required: true
                }
            },
            submitHandler: function(){
                $("input[type=text]:hidden, select:hidden", $("#editTestForm")).attr("disabled", "disabled");

                $('#editTestForm').ajaxSubmit({
                    beforeSubmit:  function(){
                        $('.loader').show();
                    }, 
                    success: function(response){
                        $('.loader').hide();
                        $("input, select", $("#editTestForm")).prop("disabled", false);
                        if(response.success){
                            $('#editTestForm #alertMessage').html( response.success);
                            window.location.reload();
                        }    
                        else if(response.error) {
                            $('#editTestForm #alertMessage').html( response.error );
                        }
                    }
                });
            }
        });
    });
</script>