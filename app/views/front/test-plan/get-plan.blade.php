@extends('front.layout')
@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-12">
    		<h2>PayU Form</h2>
    		<hr>
    	    <form class="form-horizontal" action="{{ $action }}" method="post" name="payuForm">
		      	<input type="hidden" name="key" value="{{ $MERCHANT_KEY }}" />
		      	<input type="hidden" name="hash" value="{{ $hash }}"/>
		      	<input type="hidden" name="txnid" value="{{ $txnid }}" />
		      	<input type="hidden" name="surl" value="{{ $surl }}" />
		      	<input type="hidden" name="furl" value="{{ $furl }}" />
		      	<input type="hidden" name="curl" value="{{ $curl }}" />
		      	<input type="hidden" name="service_provider" value="{{ $service_provider}}" />
		      	<input type="hidden" name="productinfo" value="{{$productinfo }}" />
		      	<input type="hidden" name="amount" value="{{ $posted['amount'] }}" />
		      	<input type="hidden" name="firstname" value="{{ $posted['firstname'] }}" />
		      	
		      	<div class="form-group">
		      		<label class="col-md-2">Plan Name</label>
		      		<div class="col-md-3">
		      			<label>{{ $planName }}</label>
		      		</div>
		      	</div>
		      	<hr>
		      	<div class="form-group">
		      		<label class="col-md-2">Price</label>
		      		<div class="col-md-3">
		      			<label>{{ $posted['amount'] }}</label>
		      		</div>
		      	</div>
		      	<hr>
		      	<div class="form-group">
		      		<label class="col-md-2">First Name:</label>
		      		<div class="col-md-3">
		      			<label>{{ $posted['firstname'] }}</label>
		      		</div>
		      	</div>
		      	<hr>
		      	<div class="form-group">
		      		<label class="col-md-2">Email:</label>
		      		<div class="col-md-3">
		      			<label>{{ $posted['email'] }}</label>
		      		</div>
		      	</div>
		      	<hr>
		      	<div class="form-group">
		      		<label class="col-md-2">Phone:</label>
		      		<div class="col-md-3">
		      			<label>{{ $posted['phone'] }}</label>
		      		</div>
		      	</div>
		      	<hr>	
				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Make Payment" />
				</div>
		    </form>
    	</div>	
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
</script>
@stop    	