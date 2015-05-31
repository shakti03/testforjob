<?php

class PaymentController extends Controller{

	public function getTestPlan($paymentID) 
	{
		$MERCHANT_KEY = "JBZaLc";
		$SALT = 'GQs7yium';
		$PAYU_BASE_URL = "https://test.payu.in";

		$posted = [];
		$hash = '';
		$txnid = '';
		
		// Hash Sequence
		$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

		$posted['key'] =$MERCHANT_KEY;
		$posted['hash'] = '';
		$posted['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$posted['amount'] = 100;
		$posted['firstname'] = 'shakti';
		$posted['email'] = 'shaktisingh03@gmail.com';
		$posted['phone'] = '11111111111';
		$posted['productinfo'] = 'test plan';
		$posted['surl'] = URL::to('payment-success').'/';
		$posted['furl'] = URL::to('paymetn-fail').'/';
		$posted['curl'] = URL::to('payment-cancel').'/';
		$posted['service_provider'] = 'payu_paisa';

		// hash string
		$hashVarsSeq = explode('|', $hashSequence);
	    $hash_string = '';	
		foreach($hashVarsSeq as $hash_var) {
	      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
	      $hash_string .= '|';
	    }

	    $hash_string .= $SALT;
	    $hash = strtolower(hash('sha512', $hash_string));
	    $action = $PAYU_BASE_URL . '/_payment';
	  	
	  	// send data to 
		$data['hash'] = $hash;
		$data['action'] = $action;
		$data['txnid'] = $posted['txnid'];
		$data['MERCHANT_KEY'] = $MERCHANT_KEY;
		$data['SALT']=$SALT;
		$data['surl'] = $posted['surl'];
		$data['furl'] = $posted['furl'];
		$data['curl'] = $posted['curl'];
		$data['service_provider'] = $posted['service_provider'];
		$data['productinfo'] = 'test-plan';
		$data['planName'] = "Test plan 1";
		$data['amount'] = '100';
		$data['posted'] = $posted;
		return View::make('front.test-plan.get-plan',$data);
	}
}
	