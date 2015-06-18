@extends('front.layout')
@section('content')
<div class="container">
	<div>&nbsp;</div>
	<div class="row">
		<div class="col-md-6" style="border-right:solid #b3afc3;">
			<?php $i=1;?>
			@foreach($questions as $question)
				<?php
					$answer['user_answer'] = isset($answers[$question->id]) ? $answers[$question->id] : null;
			    	$answer['correct'] = lcfirst($question->answer);
			    ?>
				
				<div class="questionItem" data-id="{{$question->id}}">		
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
		</div>	
	</div>
</div>
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

	$(function(){
		$('.questionItem').click(function(){
			var id = $(this).data('id');
			loadComments(id, function(){
				$('.loader').hide();
			});
		});
		
	});
</script>
@stop