<?php

class PaymentController extends Controller{

	public function getTestPlan() 
	{
		$posted = [];
		$paymentID = 1;

		if(Request::isMethod('post'))
		{
			$MERCHANT_KEY = "JBZaLc";
			$SALT = 'GQs7yium';
			$PAYU_BASE_URL = 'https://test.payu.in';

			$posted = [];
			$hash = '';
			$txnid = '';

			$posted = Input::all();
                
            $posted['key'] = 'JBZaLc';
            $posted['surl'] = URL::to('payment-success');
            $posted['furl'] = URL::to('payment-fail');
            $posted['service_provider'] = 'payu_paisa';
            $posted['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			Session::put('txnid',$posted['txnid']);
            $SALT = 'GQs7yium';
                
            $hash = '';
            // Hash Sequence
            $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
            $hashVarsSeq = explode('|', $hashSequence);
            $hash_string = '';
            
            foreach($hashVarsSeq as $hash_var) {
                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                $hash_string .= '|';
            }
            $hash_string .= $SALT;
    
            $hash = strtolower(hash('sha512', $hash_string));
            $posted['hash'] = $hash;

            $posted['action'] = 'https://test.payu.in/_payment';

        }
        else{
            $posted = array('firstname' => 'shakti',
                                'amount'=> 100,
                                'productinfo'=>'Test Plan '.$paymentID,
                                'email' => 'shaktisingh03@gmail.com',
                                'phone' => '8983541172',
                                'action' => URL::to('user/get-plans'),
                                'hash' => ''
                                );
            Session::forget('txnid');
        }
		return View::make('front.test-plan.get-plan',$posted);
	}
}
	