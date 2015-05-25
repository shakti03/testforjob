<?php 
	$timeOver = false;
	if($totalAnswered == $last || !( $hours || $minutes || $seconds)) {
		$timeOver = true;
	} 
?>
@extends('front.layout')
@section('content')
<div class="container">
	<div>&nbsp;</div>
	<div class="row">
		<div class="col-md-8" style="min-height:500px;border-right:1px solid;">
			<div class="row">
				<div class="col-md-9">
					<span class="text-saffron font18">
				    	{{ucfirst($question->test_type_name)}} Test: 	
				    	@if(Session::get('testOption')=='subjects')
				    		{{ ucfirst($question->subject_name)}}    
				    	@else	
				    		{{ ucfirst($question->company_name)}}    
				    	@endif
					</span>
				</div>
				<div class="col-md-3">
					<span class="text-saffron font18 pull-right">Time: <span id='timer'></span>
				</div>
			</div>
			
			<div class="row">&nbsp;</div>
			<div class="row">
				<div class="col-md-12">
					<?php $options = ['a'=>$question->option_a,'b'=>$question->option_b,'c'=>$question->option_c,'d'=>$question->option_d]; ?>
					<form method="post" action="{{URL::to('user/submit-question')}}" id="frmTest">
						<input type="hidden" name="qid" value="{{$page}}"/>
						<div class="minHeight250">
							<div>&nbsp;</div>
		                	<span class="boldText" id="question"> {{'Q.'.$page.': &nbsp;'.$question->question}}</span>

		             		@foreach($options as $key=>$option)
		             		<div class="radio">
		             			@if($answer == null)
			             			<label class="radio-inline">
									  <input name="option" type="radio" value="{{$key}}"> {{$option}} 
									  <span id="errMsg"></span>
									</label>
								@else 
									<label class="radio-inline">
									  <input name="option" type="radio" value="{{$key}}" {{ ($answer['user_answer'] == $key) ? 'checked' : '' }} disabled> {{$option}} 
									</label>

									@if($answer['correct'] == $key)
										<span class="green boldText"><i class="fa fa-check"></i> Correct</span>
									@else
										<span class="red"><i class="fa"></i> wrong </span>
									@endif
								@endif
		             		</div>
		                	@endforeach
		                </div>

	                	<div class="row">
	                    	<div class="col-md-3">
								@if($answer == null)
	        						@if(!$timeOver)
									<button class="btn btn-lg btn-warning borderNone pull-right" type="submit" id="save"  name="save"> Save &amp; Next</button>
									@endif
								@else	
									<button class="btn btn-lg btn-info boldText pull-right borderNone" type="button" id="study" name="study"> Study Solution</button>   
								@endif
							</div>
							<div class="col-md-9">
								<div>&nbsp;</div>
								<div>&nbsp;</div>
	        					@include('front.test.partials.pagination',['pag'=>$page,'las'=>$last])	
							</div>
						</div>

						<input type="hidden" id="hours" name="hours" value="{{$hours}}">
						<input type="hidden" id="minutes" name="minutes" value="{{$minutes}}">
						<input type="hidden" id="seconds" name="seconds" value="{{$seconds}}">
    				</form>
				</div>
			</div>
		</div>
		
		<div class="col-md-4">
			<label class="text-cadetBlue"><u>STATISTICS</u></label>
				<div>&nbsp;</div>
				<ul class="">
					<li><label><span class="width-fixed-150">Unanswered </span>: {{ $unanswered = $last - $totalAnswered}} <input type="hidden" id="unanswered" value="{{$unanswered}}"></label></li>
					<li><label><span class="width-fixed-150">Total answered </span>: {{ $totalAnswered }} <input type="hidden" id="totalAnswered" value="{{$totalAnswered}}"></label></li>
					<li><label><span class="width-fixed-150">Correct answered </span>: {{ $correctAnswered }} <input type="hidden" id="correct" value="{{$correctAnswered}}"></label></li>
					<li><label><span class="width-fixed-150">Incorrect answered </span>: {{$incorrectAnswered}} <input type="hidden" id="incorrect" value="{{$incorrectAnswered}}"></label></li>
				</ul>
				<div>&nbsp;</div>	
				<div id="chartContainer" style="height: 250px; width: 100%;"></div>
		</div>
	</div>
</div>
@stop

@section('scripts')
@include('front.test.partials.studysolution-modal')

{{ HTML::script('assets/js/canvasjs.min.js')}}
{{ HTML::script('assets/js/test/get-question.js')}}
<script type="text/javascript">
	var testOver = false;
	<?php 
		if($timeOver) {
			echo 'testOver = true;';
		} 
	?> 
</script>
@stop

