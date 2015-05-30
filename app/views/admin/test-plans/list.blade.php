@extends('admin.layouts.layout')

@section('title')
    Admin area: Test plans
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <span class="custom-heading">Tests</span>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="pull-right">
                <button id="add" class="btn btn-success" title="Add" data-toggle="modal" data-target="#addTestPlanModal"><i class="fa fa-plus"></i> Add </button>
                <button id="edit" class="btn btn-primary" title="Update" data-toggle="modal" data-target="#editTestModal"><i class="fa fa-pencil"></i> Edit</button>
                <button id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="tableData">
            	<table id="dataList" class="table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="nosort"><input type="checkbox" id="selectAll"></th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Validity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.test-plans.partials.add-test-plan-modal')
@stop

@section('scripts')
@include('misc.datatable')
    <script type="text/javascript">
        $(document).ready(function(){
            
            $('#dataList').dataTable({
                "ajax": "{{URL::to('admin/test-plan-data')}}",
                order:[[1,'desc']],
                aoColumns : [
                  { "bSortable": false,sClass : 'text-center' },
                  { "bSortable": true },
                  { "bSortable": true },
                  { "bSortable": true },
                  { "bSortable": true },
                  { "bSortable": true },
                ]
            });



          });
        </script>

@stop
