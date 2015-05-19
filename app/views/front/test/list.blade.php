@extends('front.layout')
@section('content')
<div class="container">
	<h4> SEARCH TEST</h4>
	<div class="row">
		<div class="col-md-3">
			@include('front.test.partials.search-box')
		</div>
		<div class="col-md-9">
			<div class="panel panel-default testPanel">
			  	<div class="panel-body">

				    <div class="row">
				        <div class="col-md-12">
				            <div class="tableData">
				            	<table id="testData" class="table stripe" cellspacing="0" width="100%">
				                    <thead>
				                        <tr>
				                            <th>Name</th>
				                            <th>Subject</th>
				                            <th>Type</th>
				                            <th>Difficulty</th>
				                            <th>Questions</th>
				                            <th>Time</th>
				                            <th>Action</th>
				                        </tr>
				                    </thead>
				                </table>
				            </div>
				        </div>
				    </div>
			  	</div>
		  	</div>
	  	</div>
	</div>
</div>
@stop	


@include('misc.datatable')
@section('scripts')
	<script type="text/javascript">
		var table;
        $(document).ready(function(){
            $('#selectCompany').change(function(){
				showCompany();
			});
			function showCompany(){
				if( $('#selectCompany:checked').length){
					$('#company').show();
				}
				else{
					$('#company').hide();
				}
			}
			showCompany();

            table = $('#testData').dataTable({
			                "ajax": {
			                	url : "{{URL::to('user/test/list-data')}}",
			                	data : function(d){
			                		d.company = $('#searchForm [name=company]').val();
			                		d.subject = $('#searchForm [name=subject]').val();
			                		d.test_type = $('#searchForm [name=test_type]').val();	
			                		d.question_type = $('#searchForm [name=question_type]').val();
			                		d.difficulty_level = $('#searchForm [name=difficulty_level]').val();
			                	}
			                },
			                aoColumns : [
			                  	{ "sWidth": '130px'},
			                  	{ "bSortable": true, sClass : 'text-center'},
			                  	{ "bSortable": true },
			                  	{ "bSortable": true , sClass : 'text-center'},
			                  	{ "bSortable": true , sClass : 'text-center'},
			                  	{ "bSortable": true },
			                  	{ sClass : 'text-center'},
			                ]
			            });

            $('#searchForm').submit(function(e){
		        e.preventDefault();
		        table.api().ajax.reload();
		    });	
        });
    </script>
@stop

