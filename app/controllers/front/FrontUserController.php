<?php 

class FrontUserController extends Controller {

	public function showDashboard(){
		return View::make('front.user.dashboard');
	}

	public function showVideos(){
		$videos = DB::table('videos')->leftJoin('video_category','video_category.id','=','videos.video_category_id')
						->get(['videos.*','video_category.name']);

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
}
