@extends('front.layout')
@section('content')
<div class="container">
	<div class="row">
        <h2>User Payment Information</h2>
        <hr>
        {{ Form::open(['url'=>$action, 'method'=>'post' , 'class'=>'form-horizontal', 'name'=>"payuForm", 'id'=>"payuForm"]) }}
            @if($hash != '')
                <input type="hidden" name="key" value="{{ $key }}">
                <input type="hidden" name="hash" value="{{ $hash }}">
                <input type="hidden" name="txnid" value="{{ $txnid }}">
                <input type="hidden" name="service_provider" value="{{ $service_provider }}">
                <input type="hidden" name="surl" value="{{ $surl }}">
                <input type="hidden" name="furl" value="{{ $furl }}">
            @endif
                <input type="hidden" name="plan_id" value="{{ $plan_id}}" >
                
                <div class="form-group">
                    <label class="col-md-2">Plan name</label>
                    <div class="col-md-3">
                        <input type="hidden" name="productinfo" value='{{ $productinfo }}'>
                        <label>{{ $planName }} </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2">Price</label>
                    <div class="col-md-3">
                        <input type="hidden" name="amount" value="{{ $amount }}">
                        <label>{{ $amount }} </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2">Payer's Name </label>
                    <div class="col-md-3">
                    	<input type="hidden" name="firstname" value="{{ $firstname }}">
                        <label>{{ $firstname }} </label>
                    </div>    
                </div>
                <div class="form-group">
                    <label class="col-md-2">Email</label>
                    <div class="col-md-3">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <label>{{ $email }} </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2">Phone</label>
                    <div class="col-md-3">
                        <input type="hidden" name="phone" value="{{ $phone }}">
                        <label>{{ $phone }} </label>
                    </div>
                </div>
                @if(empty($hash))
                <div class="form-group">
                	<div class="col-md-12">
                    	<input class="btn btn-warning" type="submit" name="submit" value="Make payment">
                    </div>
                </div>
                @endif
            </div>
        {{Form::close()}}
        <input type="hidden" id="tempHashID" value="{{$hash}}">
    </div>
</div>
@stop

@section('scripts')
<script type="text/JavaScript">
var hash = $('#tempHashID').val();
function submitPayuForm() {
    if(hash == '') {
    	return;
    }
    $('#tempHashID').val('');
    $('#payuForm').submit();
}

$(document).ready(function(){
    submitPayuForm();
});
</script>
@stop    	