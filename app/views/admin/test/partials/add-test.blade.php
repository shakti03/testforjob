<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="addTestModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Add test</h4>
        </div>
        {{ Form::open(['url' => 'admin/test/add', 'class'=>'form-horizontal', 'id'=>'submitForm','method'=>'post' ,'enctype'=>'multipart/form-data'])}}
        <div class="modal-body">
            <div id="alertMessage"></div>
            {{--*/ 
                $buttonGroups['options'] = ['company'=>'company', 'subject'=>'subject', 'other'=>'Single test'];
                $buttonGroups['test'] = $test_types;
                $buttonGroups['test-type'] = $question_types;
            /*--}}
                
            @foreach($buttonGroups as $key => $group)
            {{--*/ $active = 'active'; /*--}}
            <div class="btn-group" data-toggle="buttons">
                @foreach($buttonGroups[$key] as $id => $value)
                    <label class="btn btn-primary {{$active}}">
                    <input type="radio" name="{{$key}}" value="{{$id}}" data-id="{{$id}}" {{$active?'checked':''}}> {{ucfirst($value)}}
                    </label>
                    {{--*/$active= '';/*--}}
                @endforeach
            </div>
            @endforeach
            
            <div>&nbsp;</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group formElement displayNone" id="testName">
                        <label class="col-md-4">Test Name :</label>
                        <div class="col-md-8">
                        {{ Form::text('test_name', null,['class'=>'form-control','placeholder'=>'Enter test name', 'required'])}}
                        </div>
                    </div>
                    {{--*/ 
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
                    <div class="form-group formElement">
                        <label class="col-md-4">Excel file :</label>
                        <div class="col-md-8">
                        {{ Form::file('excel', ['class'=>'form-control','id'=>'excel' ,'required'=>'required','accept'=>'application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p><strong>Include/Exclude columns in Excel file</strong></p>
                    <hr>
                    {{--*/ $columns = $excel_include_columns; /*--}}
                    @foreach($columns as $key => $column)
                    <div class="checkbox checkElement" id="{{$column}}CheckBox">
                        <label><input type="checkbox" class="exclude" name="excelColumns[]" value="{{$key}}" data-element="#{{$column}}Div" autocomplete=off>{{ucfirst($column)}}</label>
                    </div>
                    @endforeach
                    <div>&nbsp;</div>
                    <a class="btn btn-success" href="{{URL::to('admin/download-excel','questions')}}" id="downloadSampleFile"><i class="fa fa-download"></i> &nbsp;Download sample file</a>
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
        function reset(){
            $('.checkElement').show();
            $.each($('.exclude'), function(){
                var element = $(this).data('element');
                if(!$(this).is(':checked'))
                    $(element).show();
                else
                    $(element).hide();
            });

            $('#testName').hide();
        }
        reset();

        $('input[name=options]:radio').change(function(){
            var id = $('input[name=options]:radio:checked').data('id');
            reset();
            if(id == 'subject'){
                $('#companyDiv').hide();
                $('#companyCheckBox').hide();
            }
            else if(id == 'other'){
                $('#testName').show();
                $('.checkElement').hide();
                $('.formElement').show();
            }
        });

        $('.exclude').click(function(){
            var element = $(this).data('element');
            if(!$(this).is(':checked'))
                $(element).show();
            else
                $(element).hide();
        });

        $('select').change(function(){
            var val = $(this).val();
            var name = $(this).attr('name');
            
            if(val == 'other' || val == 'experienced'){
                $('input#other'+name).show();
            }
            else{
                $('input#other'+name).hide();
            }
        });


        $('#downloadSampleFile').click(function(e){
            var fileID = '';
            var i=0;
            $.each($('.exclude'), function(){
                if($(this).is(':checked')){
                    var val = $(this).val();
                    if(i == 0){
                        fileID += val;
                        i++;
                    }
                    else{
                        fileID += '-'+val;    
                    }
                }
            });
            if(fileID == ''){
                var id = $('input[name=options]:radio:checked').data('id');
                if(id == 'other')
                    fileID = 'questions';
                else
                    fileID = 'testset';
            }
            var testType = $('input[name=test-type]:checked').val();
            if(!testType) testType = 'objective';
            var urlPath = baseUrl + '/download-excel/'+testType+'/'+fileID;
            $(this).attr('href', urlPath );
        });
        

        $("#submitForm").validate({
            rules:{
                test_name : { 
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
                },
                excel : { 
                    required: true
                }
            },
            submitHandler: function(){
                $("input[type=text]:hidden, select:hidden", $("#submitForm")).attr("disabled", "disabled");

                $('#submitForm').ajaxSubmit({
                    beforeSubmit:  function(){
                        $('.loader').show();
                    }, 
                    success: function(response){
                        $('.loader').hide();
                        $("input, select", $("#submitForm")).prop("disabled", false);
                        if(response.success){
                            $('#alertMessage').html( response.success);
                            window.location.reload();
                        }    
                        else if(response.error) {
                            $('#alertMessage').html( response.error );
                        }
                    }
                });
            }
        });

    });
</script>