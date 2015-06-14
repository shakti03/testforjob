<?php



class HomeController extends Controller {

	public function showHome()
	{
		$enable_captcha = Config::get('laravel-authentication-acl::captcha_signup');

        if($enable_captcha)
        {
            $captcha = App::make('captcha_validator');
            // return View::make('laravel-authentication-acl::client.auth.signup')->with('captcha', $captcha);
            return View::make('home.index')->with('captcha', $captcha);
        }

        // return View::make('laravel-authentication-acl::client.auth.signup');
        return View::make('home.index');
	}

    public function testPlan(){


        $testPlans = TestPlan::getTestPlans();
        $testPlanFeatures = DB::table('testplan_features')
                                ->leftJoin('plan_features','plan_features.id','=','testplan_features.feature_id')
                                ->select('test_plan_id',DB::raw('GROUP_CONCAT(plan_features.name) as features'))
                                ->groupBy('testplan_features.test_plan_id')
                                ->get();
        $data = [];
        $count = 0;
        foreach($testPlanFeatures as $value){
            $data[$value->test_plan_id] = $value->features;
            $featureaCount = count(explode(',',$value->features));
            $count = $count < $featureaCount ? $featureaCount : $count;
        }
        $testPlanFeatures = $data;

        $enable_captcha = Config::get('laravel-authentication-acl::captcha_signup');
        if($enable_captcha)
        {
            $captcha = App::make('captcha_validator');
            return View::make('home.testplan',['testPlans'=>$testPlans, 'testPlanFeatures'=>$testPlanFeatures, 'max_count'=>$count,'captcha'=>$captcha]);
        }
        return View::make('home.testplan',['testPlans'=>$testPlans, 'testPlanFeatures'=>$testPlanFeatures, 'max_count'=>$count]);
    }
}