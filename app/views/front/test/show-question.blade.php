<?php
	$timeOver = false;
	if($test_status == 'completed' || Session::get('test-complete',false)) {
		$timeOver = true;
	} 
?>
@extends('front.layout')
@section('content')
<div class="container">
	<div>&nbsp;</div>
	<div class="row">
		<div id="questionBox" class="col-md-9 borderRight questionleftPane minHeight500">
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
					@if(!$timeOver)
					<form method="post" action="{{URL::to('user/submit-question')}}" id="frmTest">
					@endif
						{{--*/ $questionType = $question->question_type;/*--}}
						<input type="hidden" name="question_type" value="{{$questionType}}">
						<input type="hidden" name="qid" value="{{$page}}"/>
						<div class="minHeight250">
							<div>&nbsp;</div>
		                	<span class="boldText" id="question"> {{'Q.'.$page.': &nbsp;'.$question->question}}</span>

		                	@if($questionType == 'objective')
			                	{{--*/ $options = ['a'=>$question->option_a,'b'=>$question->option_b,'c'=>$question->option_c,'d'=>$question->option_d];/*--}} 
			             		@foreach($options as $key=>$option)
			             		<div class="radio">
			             			@if($answer == null)
				             			<label class="radio-inline">
										  <input name="option" type="radio" value="{{$key}}" {{ $timeOver ? 'disabled' : ''}}> {{$option}} 
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
			                @else
			                	<div>&nbsp;</div>
			                	<div class="form-group">
			                		@if($answer == null)
				                	{{Form::textarea('answer',null , ['class'=>'form-control','placeholder'=>'Type your answer','rows'=>'7','required'])}}
			                		@else
				                	{{Form::textarea('answer',$answer['user_answer'] , ['class'=>'form-control','placeholder'=>'Type your answer','rows'=>'7','required','disabled'])}}
				                	@endif
			                	</div>
			                @endif	
		                </div>

	                	<div class="row">
	                    	<div class="col-md-12">
	                    		<div class="pull-left">
									@if(!$timeOver)
										@if($answer == null)
			        						<button class="btn btn-lg btn-warning borderNone " type="submit" id="save"  name="save"> Save &amp; Next</button>
											
										@else	
											<button class="btn btn-lg btn-info boldText borderNone" type="button" id="study" name="study"> Study Solution</button>   
										@endif
									@endif	
									<button class="btn btn-lg btn-success boldText borderNone" type="button" id="submitTest" name="study">Submit test</button>   
								</div>
								
								<div class="pull-right">
	        						@include('front.test.partials.pagination',['pag'=>$page,'las'=>$last])	
	        					</div>
	        					
	        				</div>
						</div>


						<input type="hidden" id="hours" name="hours" value="{{$hours}}">
						<input type="hidden" id="minutes" name="minutes" value="{{$minutes}}">
						<input type="hidden" id="seconds" name="seconds" value="{{$seconds}}">
    				@if(!$timeOver)
    				</form>
    				@endif
				</div>
			</div>
		</div>
		@if(!empty($answer))
		<div id="studySolution" class="col-md-9 displayNone borderRight questionleftPane minHeight500">
			<h1> Study solution <button type="button" class="btn btn-primary pull-right" id="goToQuesiton"><i class="fa fa-arrow-left"></i>Back to Question</button></h1>
			<div>
				@if(!empty($studySolution))
					<pre>{{ $studySolution}}</pre>
				@else
					No solution available
				@endif
			</div>
			<div>&nbsp;</div>
			<button type="button" class="btn btn-success" id="showComments" data-id="{{$page}}">
				Discussion forum</button>
		</div>
		
		<div id="discussionForum" class="col-md-9 displayNone borderRight displayNone questionleftPane minHeight500">
			<h1> Discussion forum &nbsp;<button type="button" class="btn btn-primary pull-right marginRight" id="studyButton"><i class="fa fa-arrow-left"></i>Study solution</button> &nbsp; <button type="button" class="btn btn-primary pull-right marginRight gotoQuestion" ><i class="fa fa-arrow-left"></i>Back to Question</button> &nbsp;</h1>
			<hr>
			<div class="well">
				<div><b>Question:</b> {{$question->question}}</div>
				<div> &nbsp;</div>
				@if($question->question_type == 'objective')

					@foreach($options as $key=>$option)
             		<div>
             			{{$option}} 
						@if($answer['correct'] == $key)
							<span class="green boldText"><i class="fa fa-check"></i> Correct</span>
						@else
							<span class="red"><i class="fa"></i> wrong </span>
						@endif
					</div>
            		@endforeach
            	@else
            		{{ $question->answer}}	
            	@endif	
			</div>
			<hr>
			<div id="comments">
			@if(isset($comments) && count($comments))
				@foreach($comments as $comment)
					{{ $comment->comment}}
				@endforeach
			@else
				No feedbacks are available. Be first to ask a question.
			@endif
			</div>	
			{{ Form::open(['url'=>'question/add-comment','method'=>'post','id'=>'commentForm'])}}
				<input type="hidden" name="question_no" value="{{$page}}">
				<hr>
				{{Form::textarea('comment',null , ['class'=>'form-control','placeholder'=>'Enter your feedback','rows'=>'3','required'])}}
		
				<div>&nbsp;</div>
				<button type="submit" class="btn btn-warning" id="AddFeedback">
				Add feedback</button>
			{{Form::close()}}	
			<div>&nbsp;</div>
			<div>&nbsp;</div>
		</div>	
		@endif

		<div class="col-md-3">
			<label class="text-cadetBlue"><u>STATISTICS</u></label>
			<div>&nbsp;</div>
			<div id="statistics">
				<ul class="">
					<li id="unanswered"><label><span class="width-fixed-150">Unanswered </span>: {{ $unanswered = $last - $totalAnswered}} <input type="hidden" id="unanswered" value="{{$unanswered}}"></label></li>
					<li id="totalAnswered"><label><span class="width-fixed-150">Total answered </span>: {{ $totalAnswered }} <input type="hidden" id="totalAnswered" value="{{$totalAnswered}}"></label></li>
					<li id="correctAnswered" class="displayNone"><label><span class="width-fixed-150">Correct answered </span>: {{ $correctAnswered }} <input type="hidden" id="correct" value="{{$correctAnswered}}"></label></li>
					<li id="incorrectAnswered" class="displayNone"><label><span class="width-fixed-150">Incorrect answered </span>: {{$incorrectAnswered}} <input type="hidden" id="incorrect" value="{{$incorrectAnswered}}"></label></li>
				</ul>
			</div>
			<div>&nbsp;</div>
			<div id="">
				<div id="chartContainer" style="height: 250px; width: 100%;"></div>
			</div>

			<h2 id="notifyCompleted" class="text-success text-center displayNone"><i class="fa fa-check"></i> Test completed</h2>
		</div>
	</div>
</div>
@include('front.test.partials.test-complete-modal')
@stop

@section('scripts')

{{ HTML::script('assets/admin/js/jquery.form.min.js')}}
{{ HTML::script('assets/js/canvasjs.min.js')}}
<script type="text/javascript">
	(function ($) {
    var _oldShow = $.fn.show;

    $.fn.show = function (speed, oldCallback) {
        return $(this).each(function () {
            var obj = $(this),
                newCallback = function () {
                    if ($.isFunction(oldCallback)) {
                        oldCallback.apply(obj);
                    }

                    obj.trigger('afterShow');
                };

            obj.trigger('beforeShow');

            _oldShow.apply(obj, [speed, newCallback]);
        });
    };
	var testOver = false;
	<?php 
		if($timeOver) {
			echo 'testOver = true;';
		} 
	?>
	$(function(){
		var hours = $("#hours").attr('value');
		var minutes = $("#minutes").attr('value');
		var seconds = $("#seconds").attr('value');
		var timerId = null;

		$('#timer').html(hours+':'+minutes+':'+seconds);

		if(!testOver) {
		    timerId = setInterval(function(){
		        if(hours == 0 && minutes == 0 && seconds == 0){
		            alert('Time Over');
		            clearInterval(timerId);
		        }
		        else{
		            if( minutes == 0 && hours !=0){
		                hours--;
		                minutes = 60;
		            }

		            if( seconds == 0){
		                minutes--;
		                seconds = 60;
		            }
					
					$('#timer').html( hours+':'+minutes+':'+--seconds);
		        }

		    }, 1000);
		}
		else{
			// showTestCompleteModal();
			$('#notifyCompleted').show();
			$('#submitTest').text('Show result');

			var unanswered = $('input#unanswered').val();
			var correct = $('input#correct').val();
			var incorrect = $('input#incorrect').val();

			var chartPoints = [	
				{  y: unanswered/10, name: "Unanswered", legendMarkerType: "square"	},
				{  y: incorrect/10, name: "Incorrect", legendMarkerType: "square"},
				{  y: correct/10, name: "Correct", legendMarkerType: "square"}
			];

			chartCreate("modalChartContainer",chartPoints, true);
			$('#modalStatisticsPart').html($('#statistics').html());
			var timeValue = $('#timer').text();
			timeValueArr = timeValue.split(':');
			var minutes = 20 - parseInt(timeValueArr[1]);
			var seconds = 59 - parseInt(timeValueArr[2]);
			$('#modalTimer').html('00:'+minutes+":"+seconds);
			$('#modalStatisticsPart li').show();

		}

		$('#testCompleteModal').bind('beforeShow',function(){
			var chartHeight = $('#modalChartContainer').height();
			var chartWidth = $('#modalChartContainer').width();
			$('.canvasjs-chart-canvas').css('height', chartHeight);
			$('.canvasjs-chart-canvas').css('width', chartWidth);

		});

		function showTestCompleteModal(){
			// $('#testCompleteModal').resize();
			$('#testCompleteModal').modal('show');
		}


	    $('#frmTest').submit(function(){
	    	$('#loader').show();
			var questionType = $('[name=question_type]').val();
			
			if(questionType == 'objective'){
				var option = $('input[name=option]:checked').val();

				$("input#hours").attr('value', hours);
				$("input#minutes").attr('value', minutes);
				$("input#seconds").attr('value', seconds); 

				if(!option) {
					alert('Please select an option.');
					$('#loader').hide();
					return false;
				}
			}
			clearInterval(timerId);	
		});

		$('.pagination a').click(function(e){
			clearInterval(timerId);
			$('#loader').show();
			$.ajax({
				url  : baseUrl+'/user/set-time',
				type : 'post',
				data : {'hours':hours, 'minutes':minutes, 'seconds': seconds},
				async: false,
				dataType: 'json',
				success: function(){
					return true;
				}
			});
		});

		$(window).on('beforeunload', function(){
		    clearInterval(timerId);
			$('#loader').show();
			$.ajax({
				url  : BASE_URL+'/set-time',
				type : 'post',
				data : {'hours':hours, 'minutes':minutes, 'seconds': seconds},
				async: false,
				dataType: 'json',
				success: function(){
					return true;
				}
			});
		});

		function chartCreate(id, chartPoints, label) {
			labelText = "";
			if(label){
				labelText = '{name}';
			}
			var chart = new CanvasJS.Chart(id,
			{
				legend: {
					verticalAlign: "bottom",
					horizontalAlign: "center"
				},
				theme: "theme2",
				data: [{        
							type: "pie",
							indexLabelFontFamily: "Garamond",       
							indexLabelFontSize: 20,
							indexLabelFontWeight: "bold",
							startAngle:0,
							indexLabelFontColor: "MistyRose",       
							indexLabelLineColor: "darkgrey", 
							indexLabelPlacement: "inside", 
							toolTipContent: "{name}: {y}",
							showInLegend: true,
							indexLabel: "#percent% ", 
							dataPoints: chartPoints
					}]
			});
			chart.render();
			$('.canvasjs-chart-credit').hide();
		}

		function init(){
			var chartPoints = [];

			var unanswered = $('input#unanswered').val();
			var correct = $('input#correct').val();
			var incorrect = $('input#incorrect').val();
	
			/*if(testOver){
				$('#statistics li').hide();
				if(unanswered > 0){
					var perUnanswered = {  y: unanswered/10, name: "Unanswered", legendMarkerType: "square"	};
					chartPoints.push(perUnanswered); 
					$('li#unanswered').show();
				}

				var correctAnswerd = {  y: correct/10, name: "Answered", legendMarkerType: "square"};
				var incorrectAnswered =  {  y: incorrect/10, name: "Answered", legendMarkerType: "square"};  
				chartPoints.push(correctAnswerd);
				chartPoints.push(incorrectAnswered);
				$('li#correctAnswered').show();
				$('li#incorrectAnswered').show();
			}
			else{*/
				chartPoints = [ 
							{  y: unanswered/10, name: "Unanswered", legendMarkerType: "square"},
							{  y: (incorrect+correct)/10, name: "Answered", legendMarkerType: "square"}
						];
			/*}*/
			chartCreate('chartContainer', chartPoints);	
		}

		init();
		

		$('.canvasjs-chart-credit').hide();

		$('#submitTest').click(function(){
			if(testOver){
				showTestCompleteModal();
				return;
			}
			if(confirm('Would you like to complete your test?')){
				$.get(baseUrl+'/user/test/complete', function(response){
					window.location.reload();
				});
			}
		});

		$('#study').click(function(){
			$('.questionleftPane').hide();
			$('#studySolution').show(1000);
		});

		$('#goToQuesiton').click(function(){
			$('.questionleftPane').hide();
			$('#questionBox').show(1000);
		});

		$('#showComments').click(function(){
			var id = $(this).data('id');
			loadComments(id, function(){
				$('.questionleftPane').hide();
				$('#discussionForum').show(1000);
			});
		});

		function loadComments(id, callback){
			$('.loader').show();
			$.get(baseUrl+'/question/get-discussion-comments/'+id, function(response){
				var response = JSON.parse(response);
				var commentHtml = '';
				
				$.each(response.result, function(){
					if(commentHtml != '')
						commentHtml += '<hr>';
					commentHtml += '<p><b>'+this.first_name+':</b> '+this.comment+'</p>';
				});
				
				$('#discussionForum #comments').html(commentHtml);
				$('.loader').hide();
				return callback();
			});
		}

		$('#studyButton').click(function(){
			$('.questionleftPane').hide();
			$('#studySolution').show(1000);
		});

		$('#commentForm').submit(function(e){
			e.preventDefault();
			var id = $('#showComments').data('id');
			$('#commentForm').ajaxSubmit({
	            beforeSubmit:  function(){
	                $('.loader').show();
	            }, 
	            success: function(response){
	                $('.loader').hide();
	                loadComments(id, function(){
	                	$('#commentForm')[0].reset();	
	                });
	            }
	        });	
		});

		$('.gotoQuestion').click(function(){
			$('.questionleftPane').hide();
			$('#questionBox').show(1000);
		});
	});

})(jQuery); 
</script>
@stop

