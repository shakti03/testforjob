@extends('front.layout')
@section('content')
<div class="container">
	<div class="panel panel-default testPanel">
	  	<div class="panel-body">
		    <div class="row">
		        <div class="col-md-12">
		            <div class="tableData">
		            	<table id="testData" class="table" cellspacing="0" width="100%">
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
<!-- <div class="container">
	<div class="row">
		<div>&nbsp;</div>
		<div class="col-md-8">
			@foreach($user_test_details as $key_user_test_detail => $value_user_test_detail)				
				@if ($key_user_test_detail != 'test_history')
					<span class="text-cadetBlue font18">
					@if ($key_user_test_detail != 'email')
					{{ $value_user_test_detail }}
					@else
					<div style="float:right"> {{ $value_user_test_detail }} </div>
					@endif
					</span>
				@else
			<br><br>
				<div class="list-group">
					<a href="#" class="list-group-item active">
					Test Slug
				        </a>
					@foreach($value_user_test_detail as $each_test_detail)						
						<div>
							<a class="tests text-grey bold list-group-item" style="cursor:pointer"> {{ $each_test_detail['test_slug'] }} </a>
							<div class="hide">
							<div>&nbsp;</div>
							<ul class="list-group">
								<li class="list-group-item"> <span class="total_question badge"> {{ count(json_decode($each_test_detail['question_ids'], true)) }} </span> Total Questions </li>
								<li class="list-group-item"> <span class="total_answered badge"> {{ count(json_decode($each_test_detail['answers'], true)) }} </span> Total Answers </li>
								<li class="list-group-item"> <span class="correct_answered badge"> {{ count(json_decode($each_test_detail['correct_answers'], true)) }} </span> Correct Answers</li>
								<li class="list-group-item"> <span class="wrong_answered badge"> {{ count(json_decode($each_test_detail['answers'], true)) - count(json_decode($each_test_detail['correct_answers'], true)) }} </span> Wrong Answers</li>
								<li class="list-group-item"> <span class="unanswered badge"> {{ count(json_decode($each_test_detail['question_ids'], true)) - count(json_decode($each_test_detail['answers'], true)) }} </span> Unanswered </li>
								<li class="list-group-item"> <span class="viewed badge"> {{ count(json_decode($each_test_detail['viewed'], true)) }} </span> Viewed </li>
							</ul>
							<div>&nbsp;</div>	
							</div>
						</div>
					@endforeach
				</div>
				@endif
			@endforeach
		</div>
		<div class="col-md-4">
			<br><br>
			<div class="tests_info text-grey bold">
				
			</div>
			<div>&nbsp;</div>
				<div id="chartContainer" style="height: 250px; width: 100%;"></div>
		</div>
	</div>
</div>
 -->
@stop
@section('scripts')
{{ HTML::script('assets/js/canvasjs.min.js')}}
@include('misc.datatable')

<script type="text/javascript">
$(function(){
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
});
</script>

@stop	