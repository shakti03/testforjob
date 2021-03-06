<?php

class PaymentController extends Controller{

	public function getTestPlan($planID = null) 
	{
		$posted = [];
		
        if(Request::isMethod('post'))
		{
			$loggedUser = App::make('authenticator')->getLoggedUser();
            $userProfile = DB::table('user_profile')->find($loggedUser->id);
            
            $testPlan = TestPlan::find($planID);

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
            $testPlan = TestPlan::find($planID);
            $loggedUser = App::make('authenticator')->getLoggedUser();
            
            if($testPlan->cost) {
                $userProfile = DB::table('user_profile')->find($loggedUser->id);
                
                
                $posted = array('firstname' => $userProfile->first_name,//'temp-user',
                                    'amount'=> $testPlan->cost,//$userProfile-isset($testPlan->cost) ? $testPlan->cost : 0,
                                    'productinfo'=>$testPlan->name.'#'.$testPlan->description,
                                    'email' => $loggedUser->email,//'shaktisingh03@gmail.com',
                                    'phone' => $userProfile->phone,//'8983541172',
                                    'action' => URL::to('user/get-plans'),
                                    'hash' => ''
                                    );
                Session::forget('txnid');
            }
            else{
                UserTestPlan::firstOrCreate(['user_id'=>$loggedUser->id, 'plan_id'=>$planID]);
                Session::flash('success','Test plan subscribed successsfully');
                return Redirect::back();
            }
            
        }
        $posted['plan_id'] = $planID;
		return View::make('front.test-plan.get-plan',$posted);
	}

    public function paymentSuccess(){
        return View::make('payment-success');
        // echo '<pre>'; print_r(Input::all()); echo '</pre>';exit;
    }

    public function paymentCancel(){
        return "Payment Cancelled.";
    }

    public function paymentFail(){
        return "Failed to complete your last transaction.";
    }
}
	