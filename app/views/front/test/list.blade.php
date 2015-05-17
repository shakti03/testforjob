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
				                            <th>Test</th>
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
        $(document).ready(function(){
            $('#selectCompany').change(function(){
				if( $('#selectCompany:checked').length)
					$('#company').show();
				else
					$('#company').hide();
			});

            $('#testData').dataTable({
                "ajax": "{{URL::to('user/test/list-data')}}",
            });

        });
    </script>
@stop

