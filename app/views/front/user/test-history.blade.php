@extends('front.layout')
@section('content')
<div class="container">
	<div>&nbsp;</div>
	<div class="row">
        <div class="col-md-12">
            <div class="tableData">
            	<table id="testData" class="table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        	<th>Date time</th>
                            <th>Test</th>
                            <th>Test type</th>
                            <th>Subject</th>
                            <th>company</th>
                            <th>Total question</th>
                            <th>Answered</th>
                            <th>Test time</th>
                            <th>User time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
@section('scripts')
{{ HTML::script('assets/js/canvasjs.min.js')}}
@include('misc.datatable')

<script type="text/javascript">
$(function(){
	table = $('#testData').dataTable({
			                "ajax": {
			                	url : "{{URL::to('user/test-history/data')}}",
			                	data : function(d){
			                		d.company = $('#searchForm [name=company]').val();
			                		d.subject = $('#searchForm [name=subject]').val();
			                		d.test_type = $('#searchForm [name=test_type]').val();	
			                		d.question_type = $('#searchForm [name=question_type]').val();
			                		d.difficulty_level = $('#searchForm [name=difficulty_level]').val();
			                	}
			                },
			                aoColumns : [
			                  	{ "bSortable": true, "sWidth": '100px'},
			                  	{ "bSortable": true,"sWidth": '130px' },
			                  	{ "bSortable": true,sClass : 'text-center' },
			                  	{ "bSortable": true,sClass : 'text-center' },
			                  	{ "bSortable": true,sClass : 'text-center' },
			                  	{ "bSortable": true , sClass : 'text-center',"sWidth": '50px'},
			                  	{ "bSortable": true , sClass : 'text-center',"sWidth": '50px'},
			                  	{ "bSortable": true },
			                  	{ "bSortable": true },
			                  	{ sClass : 'text-center'},
			                ]
			            });
});
</script>

@stop	