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
		<div id="questionBox" class="col-md-8 borderRight questionleftPane minHeight500">
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
					<form method="post" action="{{URL::to('user/submit-question')}}" id="frmTest">
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
	                    	<div class="col-md-3">
								@if($answer == null)
	        						@if(!$timeOver)
									<button class="btn btn-lg btn-warning borderNone " type="submit" id="save"  name="save"> Save &amp; Next</button>
									@endif
								@else	
									<button class="btn btn-lg btn-info boldText borderNone" type="button" id="study" name="study"> Study Solution</button>   
								@endif
							</div>
							<div class="col-md-9">
								<div>&nbsp;</div>
								<div>&nbsp;</div>
								@if(!$timeOver)
	        					@include('front.test.partials.pagination',['pag'=>$page,'las'=>$last])	
	        					@endif
							</div>
						</div>

						<input type="hidden" id="hours" name="hours" value="{{$hours}}">
						<input type="hidden" id="minutes" name="minutes" value="{{$minutes}}">
						<input type="hidden" id="seconds" name="seconds" value="{{$seconds}}">
    				</form>
				</div>
			</div>
		</div>
		@if(!empty($answer))
		<div id="studySolution" class="col-md-8 displayNone borderRight questionleftPane minHeight500">
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
		
		<div id="discussionForum" class="col-md-8 displayNone borderRight displayNone questionleftPane minHeight500">
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

{{ HTML::script('assets/admin/js/jquery.form.min.js')}}
{{ HTML::script('assets/js/canvasjs.min.js')}}
{{ HTML::script('assets/js/test/get-question.js')}}
<script type="text/javascript">
	var testOver = false;
	<?php 
		if($timeOver) {
			echo 'testOver = true;';
		} 
	?>
	$(function(){
		$('#study').click(function(){
			$('.questionleftPane').hide();
			$('#studySolution').fadeIn(1000);
		});

		$('#goToQuesiton').click(function(){
			$('.questionleftPane').hide();
			$('#questionBox').fadeIn(1000);
		});

		$('#showComments').click(function(){
			var id = $(this).data('id');
			loadComments(id, function(){
				$('.questionleftPane').hide();
				$('#discussionForum').fadeIn(1000);
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
			$('#studySolution').fadeIn(1000);
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

		/*$('#frmTest').on("keyup keypress", function(e) {
		  var code = e.keyCode || e.which; 
		  if (code  == 13) {               
		    e.preventDefault();
		    return false;
		  }
		});*/
	}); 
</script>
@stop

