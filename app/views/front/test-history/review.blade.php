@extends('front.layout')
@section('content')
<style type="text/css">
.questionItem.active {
  background: #ebe29d none repeat scroll 0 0;
}
</style>
<div class="container">
	<div>&nbsp;</div>
	<div class="row">
		<div class="col-md-6" style="border-right:solid #b3afc3;">
			<?php $i=1; $firstQuestionId = 0;?>
			@foreach($questions as $question)
				<?php
					$answer['user_answer'] = isset($answers[$question->id]) ? $answers[$question->id] : null;
			    	$answer['correct'] = lcfirst($question->answer);

			    	if($i==1){
			    		$firstQuestionId = $question->id;
			    	}
			    ?>
				
				<div class="questionItem @if($i==1) active @endif" data-id="{{$question->id}}">		
					<div>&nbsp;</div>
					<span class="boldText" id="question"> {{"Q:".$i++." &nbsp;".$question->question}}</span>
					@if($question->question_type == 'objective')
				    	{{--*/ $options = ['a'=>$question->option_a,'b'=>$question->option_b,'c'=>$question->option_c,'d'=>$question->option_d];/*--}} 
				 		@foreach($options as $key=>$option)
				 		<div class="radio">
							<label class="radio-inline">
							    {{$option}} 
							</label>

							@if($answer['user_answer'])
								@if($answer['correct'] == $key)
									<span class="green boldText"><i class="fa fa-check"></i> Correct</span>
								@else
									<span class="red"><i class="fa"></i> wrong </span>
								@endif
							@endif	
						</div>
						@endforeach
						@if(isset($discussionComments[$question->id]))
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-xs btn-success">Comments</button>
							</div>
						</div>
						@endif
				    @else
				    	<div>&nbsp;</div>
				    	<div class="form-group">
				        	{{Form::textarea('answer',$answer['user_answer'] , ['class'=>'form-control','placeholder'=>'Type your answer','rows'=>'7','required','disabled'])}}
				    	</div>
				    @endif
				</div>
				<hr>
			@endforeach
		</div>    
		<div class="col-md-6">
			<h3>Comments</h3>
			<hr>
			<div id="comments">
			</div>
			<br>
			{{ Form::open(['url'=>'user/test-history/add-comment','method'=>'post','id'=>'commentForm'])}}
				<input type="hidden" name="question_id" value="{{$firstQuestionId}}">
				
				{{Form::textarea('comment',null , ['class'=>'form-control','placeholder'=>'Enter your feedback','rows'=>'3','required'])}}
		
				<div>&nbsp;</div>
				<button type="submit" class="btn btn-warning" id="AddFeedback">
				Add feedback</button>
			{{Form::close()}}
		</div>	
	</div>
</div>
{{ HTML::script('assets/admin/js/jquery.form.min.js')}}
<script type="text/javascript">
	function loadComments(id, callback){
		$('.loader').show();
		$.get(baseUrl+'/user/test-history/get-discussion-comments/'+id, function(response){
			var response = JSON.parse(response);
			var commentHtml = '';
			console.log(response);
			$.each(response.result, function(){
				commentHtml += '<p><b>'+this.first_name+':</b> '+this.comment+'</p>';
			});
			
			if(!commentHtml){
				commentHtml = "No comments";
			}

			$('#comments').html(commentHtml);
			$('.loader').hide();
			return callback();
		});
	}

	loadComments($('.questionItem:first').data('id'), function(){
		$('.loader').hide();
	});

	$(function(){
		$('.questionItem').click(function(){
			$('.questionItem').removeClass('active');
			$(this).addClass('active');
			var id = $(this).data('id');
			$('input[name=question_id]').val(id);
			loadComments(id, function(){
				$('.loader').hide();
			});
		});
		$('#commentForm').submit(function(e){
			e.preventDefault();
			var id = $('input[name=question_id]').val();
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
	});
</script>
@stop