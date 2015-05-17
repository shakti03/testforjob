@extends('admin.layouts.layout')

@section('title')
    Admin area: Question list
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <span class="custom-heading">Tests</span>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="pull-right">
                <button id="add" class="btn btn-success" title="Add" data-toggle="modal" data-target="#addTestModal"><i class="fa fa-plus"></i> Add </button>
                <button id="edit" class="btn btn-primary" title="Update" data-toggle="modal" data-target="#editTestModal"><i class="fa fa-pencil"></i> Edit</button>
                <button id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary search-panel">
                {{ Form::open(['url'=>'admin/test/search','method'=>'post','class'=>'form-inline','id'=>"searchForm"])}}
                    {{--*/ 
                            $data['company']   = [''=>'-Select company-'] + $companies;
                            $data['subject']   = [''=>'-Select subject-'] + $subjects;
                            $data['test_types'] = [''=>'-Select test type-'] + $test_types;
                            $data['question_types'] = [''=>'-Select question type-'] + $question_types;
                            $data['difficulty_levels'] = [''=>'-Select difficulty-'] + $difficulty_levels; 
                     /*--}}
                  <div class="form-group">
                    <label><strong>Search : </strong></label>
                  </div>   
                  @foreach($data as $key => $value)
                      <div class="form-group">
                        {{ Form::select($key, $data[$key], null,['class'=>'form-control'])}}
                      </div>
                  @endforeach
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tableData">
            	<table id="testData" class="table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="nosort"><input type="checkbox" id="selectAll"></th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Subject</th>
                            <th>Test</th>
                            <th>Type</th>
                            <th>Difficulty</th>
                            <th>Total questions</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.test.partials.add-test')
@include('admin.test.partials.edit-test')
@stop

@section('scripts')
    @include('misc.datatable')
    <script type="text/javascript">
        $(document).ready(function(){
            
            $('#testData').dataTable({
                "ajax": "{{URL::to('admin/test/list-data')}}",
                order:[[1,'desc']],
                aoColumns : [
                  { "bSortable": false,sClass : 'text-center' },
                  { "bSortable": true },
                  { "bSortable": true },
                  { "bSortable": true },
                  { "bSortable": true },
                  { "bSortable": true },
                  { sClass : 'text-center'},
                  { sWidth : '110px', sClass : 'text-center'},
                  { "bSortable": true },
                  { "bSortable": true },
                ]
            });

            $('#selectAll').change(function(){
                if($(this).is(':checked'))
                    $('.selectTest').prop('checked',true);
                else
                    $('.selectTest').prop('checked',false);
            });

            $('.no-sort').attr('class','no-sort');

            $('#edit').click(function(){
              $('#editTestForm')[0].reset();
              $('#testSlugs').val('');
              if($('.selectTest:checked').length == 0) {
                alert('Please select test to edit');
                return false;
              }

              var data = [];
              $('.selectTest:checked').each(function(){
                  data.push($(this).val());
              });

              $('#testSlugs').val(data.join(','));
            });

            $(document).on('click','.edit', function(){
               var slug = $(this).data('slug');
               $('#testSlugs').val(slug);
               $('#editTestModal').modal('show');
            });

            $('#delete').click(function(){
              if($('.selectTest:checked').length == 0) {
                alert('Please select test to delete');
                return false;
              }
              $('.loader').show();
              var data = [];
              $('.selectTest:checked').each(function(){
                  data.push($(this).val());
              });

              if(data.length > 0){
                  $.ajax({
                      url  : baseUrl + '/test/delete',
                      type : 'POST',
                      data : {'test_slugs':data},
                      success: function(response){
                        $('.loader').hide();
                          window.location.reload();
                      }
                  });
              } 
            });

            $('#add').click(function(){
              $("#submitForm")[0].reset();
            });
        });
    </script>
@stop
