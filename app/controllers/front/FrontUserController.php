<?php 

class FrontUserController extends Controller {

	public function showDashboard(){
		return View::make('front.user.dashboard');
	}

	public function showVideos(){
		$videos = Video::getUserVideos();
		return View::make('front.videos.list',['videos'=>$videos]);
	}

	public function showTestHistory(){
		$logged_user = App::make('authenticator')->getLoggedUser();
		$user = User::fetchUserDetails($logged_user->id);
		$test_history = TestHistory::getTestHistoryByUser($logged_user->id);
		$arr_correct_answer = [];
		foreach($test_history as $key_test_history => $each_test_history)
		{
			$all_answers = json_decode($each_test_history->answers, true);
			//print_r($all_answers);
			$correct_answers = [];
			if ($all_answers) {
				foreach($all_answers as $question => $answer) {
					$get_each_answer = Test::getAnswer($question);
					if ($get_each_answer == strtoupper($answer))
						$correct_answers[$question] = $get_each_answer;
				}
			}
			array_push($arr_correct_answer, $correct_answers);
		}
		foreach($arr_correct_answer as $key => $correct_answers){
			$test_history[$key] = array_merge((json_decode(json_encode($test_history[$key]), true)), [ "correct_answers" => json_encode($correct_answers)]);
		}
		$user_test_details = [ 'first_name'=> $user->first_name, 'last_name'=> $user->last_name, 'last_name'=> $user->last_name, 'country' => $user->country, 'email' => $user->email, 'test_history' => $test_history ];
		return View::make('front.user.test-history', ["user_test_details" => $user_test_details]);
	}

	public function getTestPlans(){
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

        $loggedUser = App::make('authenticator')->getLoggedUser();
        $userTestPlans = UserTestPlan::where('user_id',$loggedUser->id)->lists('plan_id'); 

       	$viewdata['user_test_plans'] =  $userTestPlans;
       	$viewdata['testPlans'] =  $testPlans;
       	$viewdata['testPlanFeatures'] =  $testPlanFeatures;
       	$viewdata['max_count'] =  $count;

		return View::make('front.test-plan.list',$viewdata);
	}
}
