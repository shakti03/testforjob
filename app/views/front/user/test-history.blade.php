@extends('front.layout')
@section('content')
<div class="container">
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
					<p class="text-grey font18 bold"> Test Slug </p>
					@foreach($value_user_test_detail as $each_test_detail)
						
						<br><br>
						<div>
							<a class="tests text-grey bold" style="cursor:pointer"> {{ $each_test_detail['test_slug'] }} </a>
							<div class="hide">
							<div>&nbsp;</div>
							<ul class="">
								<li><label><span class="width-fixed-150">Total Question </span>: <span class="total_question"> {{ count(json_decode($each_test_detail['question_ids'], true)) }} </span></label></li>
								<li><label><span class="width-fixed-150">Total answered </span>: <span class="total_answered"> {{ count(json_decode($each_test_detail['answers'], true)) }} </span></label></li>
								<li><label><span class="width-fixed-150">Correct answered </span>: <span class="correct_answered"> {{ count(json_decode($each_test_detail['correct_answers'], true)) }} </span></label></li>
								<li><label><span class="width-fixed-150">Wrong answered </span>: <span class="wrong_answered"> {{ count(json_decode($each_test_detail['answers'], true)) - count(json_decode($each_test_detail['correct_answers'], true)) }} </span></label></li>
								<li><label><span class="width-fixed-150">Unanswered </span>: <span class="unanswered"> {{ count(json_decode($each_test_detail['question_ids'], true)) - count(json_decode($each_test_detail['answers'], true)) }} </span></label></li>
								<li><label><span class="width-fixed-150">Viewed </span>: <span class="viewed"> {{ count(json_decode($each_test_detail['viewed'], true)) }} </span></label></li>
							</ul>
							<div>&nbsp;</div>	
							</div>
						</div>
					@endforeach
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

@stop
@section('scripts')
{{ HTML::script('assets/js/canvasjs.min.js')}}
@stop	