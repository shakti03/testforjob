@extends('admin.layouts.layout')

@section('title')
    Admin area: Test plans
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-12">
    		<h2>PayU Form</h2>
    		<hr>
    	    <form class="form-horizontal" action="<?php echo $action; ?>" method="post" name="payuForm">
		      	<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
		      	<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
		      	<input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
		      	<input type="hidden" name="surl" value="<?php echo $surl ?>" />
		      	<input type="hidden" name="furl" value="<?php echo $furl ?>" />
		      	<input type="hidden" name="curl" value="<?php echo $curl ?>" />
		      	<input type="hidden" name="service_provider" value="<?php echo $service_provider ?>" />
		      	<input type="hidden" name="productinfo" value="<?php echo $productinfo ?>" />
		      	<input type="hidden" name="amount" value="<?php echo $posted['amount'] ?>" />
		      	
		      	<div class="form-group">
		      		<label class="col-md-2">Plan Name</label>
		      		<div class="col-md-3">
		      			<label>{{ $planName }}</label>
		      		</div>
		      	</div>
		      	<div class="form-group">
		      		<label class="col-md-2">Price</label>
		      		<div class="col-md-3">
		      			<label>{{ $posted['amount'] }}</label>
		      		</div>
		      	</div>
		      	<div class="form-group">
		      		<label class="col-md-2">First Name:</label>
		      		<div class="col-md-3">
		      			<input class="form-control" name="firstname" id="firstname" value="{{ $posted['firstname']; }}" />
		      		</div>
		      	</div>
		      	<div class="form-group">
		      		<label class="col-md-2">Email:</label>
		      		<div class="col-md-3">
		      			<input class="form-control" name="email" id="email" value="{{ $posted['email']; }}" />
		      		</div>
		      	</div>
		      	<div class="form-group">
		      		<label class="col-md-2">Phone:</label>
		      		<div class="col-md-3">
		      			<input class="form-control" name="phone" id="phone" value="{{ $posted['phone']; }}" />
		      		</div>
		      	</div>	
				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Submit" />
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