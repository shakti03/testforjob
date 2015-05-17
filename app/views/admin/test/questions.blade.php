@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <span class="custom-heading">Test-questions</span>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="pull-right">
                <button class="btn btn-success" title="Add" data-toggle="modal" data-target="#addQuestionModal" id="add"><i class="fa fa-plus"></i> Add </button>
                <button id="deleteAll" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                <a href="{{URL::to('admin/test/list')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <hr>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-12">
            <div class="tableData">
            	<table id="testData" class="table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>Question</th>
                            @if($question_type == 'objective')
                            <th>Option A</th>
                            <th>Option B</th>
                            <th>Option C</th>
                            <th>Option D</th>
                            @endif
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.test.partials.add-question')
@stop

@section('styles')
{{HTML::style('assets/admin/css/jquery.dataTables.min.css')}}
@stop

@section('scripts')
{{ HTML::script('assets/admin/js/jquery.dataTables.min.js')}}
<script type="text/javascript">
$(document).ready(function(){
    
    var datatable = $('#testData').dataTable({
        "ajax": "{{URL::to('admin/test/test-data',[$slug,$question_type])}}",
        "order": [[ 1, "desc" ]],
        "aoColumns": [
                        { "bSortable": false,sClass : 'text-center' },
                        { "bSortable": true },
                        @if($question_type == 'objective')
                        { "bSortable": true },
                        { "bSortable": true },
                        { "bSortable": true },
                        { "bSortable": true },
                        @endif
                        { "bSortable": true },
                        { "bSortable": true },
                    ]

    });

    $('#add').click(function(){
        $('#addQuestionForm')[0].reset();
        $('input[name=id]').val('');
    });

    $('#deleteAll').click(function(){
        if( $('.selectQuestion:checked').length > 0 ){
            $('.loader').show();
            var data = [];
            $('.selectQuestion:checked').each(function(){
                data.push($(this).val());
            });

            if(data.length > 0){
                $.ajax({
                    url  : baseUrl + '/test/question/delete',
                    type : 'POST',
                    data : {'question_ids':data},
                    success: function(response){
                        $('.loader').hide();
                        window.location.reload();
                    }
                });
            } 
        }
    });

    $('#selectAll').change(function(){
        if($(this).is(':checked')){
            $('.selectQuestion').prop('checked',true);
        }
        else{
            $('.selectQuestion').prop('checked',false);
        }
    });

    $(document).on('click', '.edit', function(){
        var content = $(this).data('content');
        console.log(content);
        $('input[name=id]').val(content.id);
        $('[name=question]').val(content.question.trim());
        @if($question_type == 'objective')
        $('[name=option_a]').val(content.option_a.trim());
        $('[name=option_b]').val(content.option_b.trim());
        $('[name=option_c]').val(content.option_c.trim());
        $('[name=option_d]').val(content.option_d.trim());
        @endif
        $('[name=answer]').val(content.answer.toLowerCase().trim());
        $('#addQuestionModal').modal('show');
    });

    $('#addQuestionForm').submit(function(){
        $('.loader').show();
    })
    
});
</script>
@stop
