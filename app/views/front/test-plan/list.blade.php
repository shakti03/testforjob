@extends('front.layout')
@section('content')
<div class="container">
	<div class="row">
		<div>&nbsp;</div>
		<div class="container container-int">
  			<div class="row pricing-table">
  				<?php $plans = [ 
  									'1' => [ 'name'=>'free', 'amount'=>0],
  									'2' =>[ 'name'=>'plan1', 'amount'=>200],
  									'3' =>[ 'name'=>'plan2', 'amount'=>300],
  									'4' =>[ 'name'=>'plan3', 'amount'=>500]
								];
				 ?>
  				@foreach($plans as $key=>$plan)
			    <div class="col-sm-3">
			      	<div class="panel panel-default text-center">
				        <div class="panel-heading">
				          <strong>{{ $plan['amount'] ? strtoupper($plan['name']) : 'FREE' }}</strong>
				        </div>
			  		  
			    		<ul class="list-group">
							<li class="list-group-item">1 User</li>
							<li class="list-group-item">15 Stages</li>
							<li class="list-group-item">Free Brain Games</li>
							<li class="list-group-item">IQ Assessment</li>
							<li class="list-group-item">Online Support</li>
							<li class="list-group-item"><strong><i class="fa fa-inr"></i> {{$plan['amount']}}</strong></li>
							<li class="list-group-item"><br><br><br><br><br></li>
							<li class="list-group-item">
							    <a class="btn btn-warning btn-lg btn-block" href="{{ URL::to('user/get-plan',$key)}}">Get Plan</a>	
				 			</li>
			        	</ul>
			    	</div>          
		    	</div>
		    	@endforeach

			</div>
		</div>
	</div>
</div>
@stop	