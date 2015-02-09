@extends('layouts.layout')

@section('container')
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
			<span class="text-saffron font18">Time: <span id='timer'></span>
		</div>
	</div>
    <div class="row">    
		<div class="col-md-9">
			<div class="thumbnail" style="margin:0px;padding:0 20px 10px 20px	;">
				<div class="row">
	            	<span class="font18 text-cadetBlue pull-left">Questions : {{$page.'/'.$last}}</span>
	            </div>
				<div class="row">
	            	@include('test.partials.pagination',['pag'=>$page,'las'=>$last])
	            </div>
	            <div class="row">&nbsp;</div>
		        <div class="row">
					<div class="col-md-12">
						<?php $options = ['a'=>$question->option_a,'b'=>$question->option_b,'c'=>$question->option_c,'d'=>$question->option_d]; ?>
						<form method="post" action="{{URL::to('submit-question')}}" id="frmTest">
							<input type="hidden" name="qid" value="{{$page}}"/>
		                	<span class="boldText" id="question"> {{$question->question}}</span>
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
		                	<div class="row">&nbsp;</div>
		                	<div class="row">&nbsp;</div>
		                    <div class="row">
		                    	<div class="col-md-3 col-md-push-9">
		        					@if($answer == null)
										<button class="btn btn-lg btn-warning borderNone pull-right" type="submit" id="save"  name="save"> Save &amp; Next</button>
									@else	
										<button class="btn btn-lg btn-info boldText pull-right borderNone" type="button" id="study" name="study"> Study Solution</button>   
									@endif	
								</div>
							</div>
	    				</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('test.partials.study-solution')
	<button data-toggle="modal" data-target="#studysolution" class="hide" id="btnShowSolution"></button>
	<input type="hidden" id="hours" value="1">
	<input type="hidden" id="minutes" value="00">
	<input type="hidden" id="seconds" value="00">
@stop

@section('footer_scripts')
{{ HTML::script('assets/js/test/get-question.js')}}

<script type="text/javascript">
	$(document).ready(function(){
		var hours = $("input#hours").attr('value');
    	var minutes = $("input#minutes").attr('value');
    	var seconds = $("input#seconds").attr('value');   
	    
	    $('#timer').html(hours+':'+minutes+':'+seconds);
	    timeid = setInterval(function(){
                if(hours == 0 && minutes == 0 && seconds == 0){
                    alert('Time Over');
                    clearInterval(timeid);
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
	});
</script>
@stop
