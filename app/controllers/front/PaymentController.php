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
		$hashSequence = "key|txnid|amount|productinfo|firstname|email";

		$posted['key'] =$MERCHANT_KEY;
		$posted['hash'] = '';
		$posted['txnid'] = '';
		$posted['amount'] = 100;
		$posted['firstname'] = 'shakti';
		$posted['email'] = 'shaktisingh03@gmail.com';
		$posted['phone'] = '11111111111';
		$posted['productinfo'] = 'test plan';
		$posted['surl'] = 'payment-success';
		$posted['furl'] = 'paymetn-fail';
		$posted['curl'] = 'payment-cancel';
		$posted['service_provider'] = 'payu_paisa';

		if(empty($posted['txnid'])) {
		  	// Generate random transaction id
		  	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		} 
		else {
		  	$txnid = $posted['txnid'];
		}

		if(empty($posted['hash'])) {
		  	//$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
			$hashVarsSeq = explode('|', $hashSequence);
		    $hash_string = '';	
			foreach($hashVarsSeq as $hash_var) {
		      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
		      $hash_string .= '|';
		    }

		    $hash_string .= $SALT;
		    $hash = strtolower(hash('sha512', $hash_string));
		    $action = $PAYU_BASE_URL . '/_payment';
	  	}
		else {
		  $hash = $posted['hash'];
		  $action = $PAYU_BASE_URL . '/_payment';
		}

		$data['hash'] = $hash;
		$data['action'] = $action;
		$data['txnid'] = $txnid;
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
	