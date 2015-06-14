@extends('front.layout')
@section('content')
<div class="container">
	<div class="row">
		<div>&nbsp;</div>
		<div>&nbsp;</div>
		<div>&nbsp;</div>
		<div class="container container-int">
  			<div class="row pricing-table">

  				@foreach($testPlans as $plan)
			    <div class="col-sm-3">
			      	<div class="panel panel-default text-center">
				        <div class="panel-heading">
				          <strong>{{ $plan->cost ? strtoupper($plan->name) : 'FREE' }}</strong>
				        </div>
			  		  	<?php
			  		  		$features = isset($testPlanFeatures[$plan->id]) ? explode(',',$testPlanFeatures[$plan->id]) : [];
			  		  	?>
			    		<ul class="list-group">
			    			<?php $count = 0; ?>
			    			@foreach($features as $feature)
							<li class="list-group-item">{{ucfirst($feature)}}</li>
							<?php $count++;?>
							@endforeach
							
							@for($i=$count;$count<$max_count;$count++)
							<li class="list-group-item">-</li>
							@endfor

							@if(!empty($plan->time))
							@if($plan->time < 1)
							<?php 
								$x = $plan->time;
								$x = ($x - floor($x)) * 10;
							 ?>
				        	<li class="list-group-item">{{$x.' month';}}</li>
				        	@else
				        	<li class="list-group-item">{{$plan->time.' year';}}</li>
				        	
				        	@endif
				        	@endif

							<li class="list-group-item"><strong><i class="fa fa-inr"></i> {{$plan->cost}}</strong></li>
							<li class="list-group-item">{{$plan->description}}</li>
							<li class="list-group-item">
								@if(!in_array($plan->id, $user_test_plans))
							    <a class="btn btn-warning btn-lg btn-block pull-down" style="bottom:0px;" href="{{ URL::to('user/get-plan',$plan->id)}}">Get Plan</a>
							    @else
								<div class="padding10">
									<span class="text-success" style="font-size:26px;"><i class="fa fa-check"></i>Purchased</span>
							    </div>
							    @endif
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