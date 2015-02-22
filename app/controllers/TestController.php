<?php



class TestController extends Controller {



	public function showHome(){

		$testTypes = array_map('ucfirst', TestType::lists('name','id'));

		$testOptions = Config::get('var.testOptions');

		$testHistory = TestHistory::getTestHistory();

    	return View::make('test.home',['testTypes'=>$testTypes,'testOptions'=>$testOptions,'testHistory'=>$testHistory]);

	}



	public function getTestContents($testType, $questionType){

		if($questionType == 'objective'){

			$subjects = ObjectiveQuestion::listSubjects(['test_type_id'=>$testType]);

			$companies = ObjectiveQuestion::listCompanies(['test_type_id'=>$testType]);

			if(Request::ajax()) {

				return json_encode(['subjects'=>$subjects,'companies'=> $companies]);

			}

		}

		else{

			return json_encode(['subjects'=>null,'companies'=> null]);

		}

	}



	public function getTests($testOption, $id, $testTypeId){

		$qIds = [];

		switch($testOption){

			case 'subjects' : $qIds = ObjectiveQuestion::listQIdsBySubjectAndTestType($id,$testTypeId);break;

			case 'companies': $qIds = ObjectiveQuestion::listQIdsByCompanyAndTestType($id,$testTypeId);break;

		}

		Session::put('test_option',$testOption);

		Session::put('test_option_id',$id);

		if(!empty($qIds)){

			$qQty = 10;

			$testCount = (int) count($qIds)/$qQty;

			shuffle($qIds);

			$sets = array_chunk($qIds,$qQty);

			// generate randoms key for test sets

			$testSets = [];

			$testSetIds = [];

			foreach ($sets as $value) {

				$key = rand(100,999);

				$testIds[] = $key;

				$testSets['test_'.$key] = $value;

			}



			$testData['test_sets'] = json_encode($testSets);

			Session::put('test_data',$testData);

			if(Request::ajax()) {

			   return json_encode($testIds);

			}

		}

	}



	public function startTest($id){

		// get test-set from session

		$testData = Session::get('test_data');

		$testSets = (array) json_decode($testData['test_sets']);

		// put active test in session

		$activeTest = $testSets['test_'.$id];

		$testData['active_test'] = $activeTest;

		//create test history

		$logged_user = App::make('authenticator')->getLoggedUser();

		$testHistory = TestHistory::createOrUpdate(['user_id'=>$logged_user->id,

				'active_test'=>json_encode($testData['active_test']),
		
				'test_option'=>Session::get('test_option'),
		
				'test_index'=>array_search('test_'.$id, array_keys($testSets))+1,
		
				'test_option_id'=>Session::get('test_option_id')
		
				]);

		$testData['testHistory_id'] = $testHistory->id;

		Session::put('test_data',$testData);

		return Redirect::away(URL::to("get-question",1));

	}



	public function getQuestion($page){

		$testData = Session::get('test_data');

		$activeTest = $testData['active_test'];

		$last = count($activeTest);

		if(isset($activeTest[$page-1])){

			$question =  ObjectiveQuestion::getQuestion($activeTest[$page-1]);

			$testHistory = TestHistory::find($testData['testHistory_id']);

			$viewedQuestion = $testHistory->viewed ? json_decode($testHistory->viewed) : [];

			$qid = $testData['active_test'][$page-1];

			// set question status as viewed

			if(!in_array($qid,$viewedQuestion)){

				$viewedQuestion[] = $qid;

				$testHistory->viewed = json_encode($viewedQuestion);

				$testHistory->save();

			}



			$answer = isset($testData['answers'][$activeTest[$page-1]]) ? $testData['answers'][$activeTest[$page-1]] : null;

			return View::make('test.show-question',['question'=>$question,'page'=>$page,'last'=>$last,'answer'=>$answer]);

		}

	}



	public function submitQuestion(){

		$inputs = Input::all();

		$testData = Session::get('test_data');

		$activeTest = $testData['active_test'];

		$qid = $activeTest[$inputs['qid']-1];

		$qanswer = ObjectiveQuestion::getAnswer($qid);

		$answer['correct'] = lcfirst($qanswer);

		$answer['user_answer'] = lcfirst($inputs['option']);

		$testData['answers'][$qid] = $answer;



		// save user answer in database

		$testHistory = TestHistory::find($testData['testHistory_id']);

		//echo '<pre>'; print_r(json_decode($testHistory->answers)); exit;

		$answered = $testHistory->answers ? (array)json_decode($testHistory->answers) : [];

		if(!array_key_exists($qid,$answered) ){

			$answered[$qid] = lcfirst($inputs['option']);

			$testHistory->answers = json_encode($answered);

			$testHistory->save();

		}

		Session::put('test_data',$testData);

		return Redirect::away(URL::to("get-question",$inputs['qid']));

	}



	public function getSolution($id){

		$testData = Session::get('test_data');

		$activeTest = $testData['active_test'];

		$qid = $activeTest[$id-1];

		// $solutionImg = ObjectiveQuestion::getSolution($qid);

		$image = URL::to('/').'/assets/images/study_solution.png';

		// Read image path, convert to base64 encoding

		//$imageData = base64_encode(file_get_contents($image));

		// Format the image SRC:  data:{mime};base64,{data};

		//$src = 'data: '.mime_content_type($image).';base64,'.$imageData;

		return json_encode(['srcImg'=>$image, 'qid'=>$id]);
	}



	public function restartTest(){



	}
	
	public function getDiscussionComments($qid) {
		$result = DiscussionForum::fetchAllCommentsById($qid);
		$logged_user = App::make('authenticator')->getLoggedUser();
		$uid = $logged_user->id;
		$data = ['result' =>$result, 'qid' => $qid, 'uid' => $uid];
		return json_encode($data);
	}
	
	public function addComment() {
		$data = Input:: all();
		$result = DiscussionForum:: insertComments($data);
		return json_encode($result);
	}



}

?>
