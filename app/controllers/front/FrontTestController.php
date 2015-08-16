<?php 

class FrontTestController extends Controller {

    public function getTestList(){
        $data = Config::get('admin.test_options');
        $data['subjects'] = Subject::lists('name','id');
        $data['companies'] = Company::lists('name','id');
        return View::make('front.test.list', $data);
    }

    public function getTestListData(){
        $inputs = Input::all();
        $tests = Test::getTestSets($inputs,true);

        return Datatable::collection($tests)
        ->addColumn('name',function($model) {
            return ucfirst($model->name);
        })
        ->addColumn('subject_name',function($model) {
            return ucfirst($model->subject_name);
        })
        ->addColumn('question_type',function($model) {
            return ucfirst($model->question_type);
        })
        ->addColumn('difficulty_level',function($model) {
            $difficulty_level = ($model->difficulty_level == 0) ? 'Fresher' : $model->difficulty_level. ' year exp.';
            return $difficulty_level;
        })
        ->addColumn('no_of_questions',function($model) {
            return $model->no_of_questions;
        })
        ->addColumn('time',function($model) {
            return empty($model->time) ? '00:20'.' hours' : date('h:i').' hours' ;
        })
        ->addColumn('actions',function($model) {
            return '<a href="'.URL::to('user/test/start',$model->test_slug).'" class="btn btn-danger" title="start">Start</a>';
        })
        ->make();
    }

    public function startTest($testslug){
        $questionIDs = Test::getQuestionIDs($testslug);
        $testTime = Test::getTestTiming($testslug);
        $test = Test::where('test_slug',$testslug)->first();

        shuffle($questionIDs);
        $testData['active_test'] = $questionIDs;


        $logged_user = App::make('authenticator')->getLoggedUser();
        $testHistory = TestHistory::createOrUpdate([
                                                        'user_id'=>$logged_user->id,
                                                        'question_ids'=>json_encode($testData['active_test']),
                                                        'test_slug' => $testslug,
                                                        'test_type' => $test->test_type,
                                                        'test_question_type' => $test->question_type,
                                                        'test_difficulty_level' => $test->difficulty_level,
                                                        'test_subject_id' => $test->subject_id,
                                                        'test_company_id' => $test->company_id,
                                                    ]);
        $testData['testHistory_id'] = $testHistory->id;
        $testData['user_id'] = $logged_user;
        Session::put('test_data', $testData);

        Session::put('hours', $testTime['hours']);
        Session::put('minutes', $testTime['minutes']);
        Session::put('seconds', 0);
        Session::put('test-complete',false);

        return Redirect::away(URL::to("user/get-question",1));
    }

    public function getQuestion($page) {
        $testData = Session::get('test_data');
        $activeTest = $testData['active_test'];
        $last = count($activeTest);
        $answer = null;
        $studySolution = null;
        $totalAnswered = 0;

        if(isset($activeTest[$page-1])){

            $question =  Test::getQuestion($activeTest[$page-1]);
            
            $testHistory = TestHistory::find($testData['testHistory_id']);
            $viewedQuestion = $testHistory->viewed ? json_decode($testHistory->viewed) : [];
            $qid = $testData['active_test'][$page-1];

            // set question status as viewed
            if(!in_array($qid,$viewedQuestion)){
                $viewedQuestion[] = $qid;
                $testHistory->viewed = json_encode($viewedQuestion);
            }

            if(isset($testData['answers'])) {
                if(isset($testData['answers'][$activeTest[$page-1]])) {
                    $answer =  $testData['answers'][$activeTest[$page-1]];
                    $studySolution = Test::getStudySolution($activeTest[$page-1]);
                }
                $totalAnswered = count($testData['answers']);
            }
            
            $hours = Session::get('hours');
            $minutes = Session::get('minutes');
            $seconds = Session::get('seconds');

            $data = ['question' => $question,
                    'page'      => $page,
                    'last'      => $last,
                    'answer'    => $answer,
                    'totalAnswered' => $totalAnswered,
                    'correctAnswered' => isset($testData['correct_answer']) ? $testData['correct_answer'] : 0, 
                    'incorrectAnswered' => isset($testData['incorrect_answer']) ? $testData['incorrect_answer'] : 0,
                    'hours'     => $hours,
                    'minutes'   => $minutes,
                    'seconds'   => $seconds,
                    'studySolution' => $studySolution,
                    'test_status' => ''
                   ];

            if($totalAnswered == $last || !( $hours || $minutes || $seconds)){
                $testHistory->test_status = 'completed';
                $data['test_status'] = 'completed';
                Session::put('test-complete',true);
            }
            $testHistory->save();
                   
            return View::make('front.test.show-question',$data);
        }
        return Redirect::to('user/test/list');
    }

    public function setTime() {
        Session::put('hours', Input::get('hours'));
        Session::put('minutes', Input::get('minutes'));
        Session::put('seconds', Input::get('seconds'));
    }

    public function getDiscussionComments($qid) {
        $testData = Session::get('test_data');
        $qid = $testData['active_test'][$qid-1];
        $result = DiscussionForum::fetchAllCommentsById($qid);
        $logged_user = App::make('authenticator')->getLoggedUser();
        $uid = $logged_user->id;
        $data = ['result' =>$result, 'qid' => $qid, 'uid' => $uid];
        return json_encode($data);
    }
    
    public function addComment() {
        $inputs = Input:: all();
        if(isset($inputs['question_no']) && isset($inputs['comment'])) {
            $loggedUser = App::make('authenticator')->getLoggedUser();

            $testData = Session::get('test_data');
            $question_no = $inputs['question_no'];
            $qid = $testData['active_test'][$question_no-1];

            $data = [];
            $data['question_id'] = $qid;
            $data['user_id'] = $loggedUser->id;
            $data['comment'] = $inputs['comment'];

            DiscussionForum::insertComment($data);
            return json_encode('success');
        }
        return json_encode('false');
    }

    public function submitQuestion(){
        $inputs = Input::all();

        $testData = Session::get('test_data');
        $activeTest = $testData['active_test'];
        $qid = $activeTest[$inputs['qid']-1];
        $questionType = $inputs['question_type'];
        
        if($questionType == 'objective') {
            $qanswer = Test::getAnswer($qid);
            $answer['correct'] = lcfirst($qanswer);
            $answer['user_answer'] = lcfirst($inputs['option']);
            
            $testData['answers'][$qid] = $answer;
            if($answer['correct'] == $answer['user_answer']) {
                if(isset($testData['correct_answer']))
                    $testData['correct_answer']++;
                else 
                    $testData['correct_answer'] = 1;    
            }
            else{
                if(isset($testData['incorrect_answer']))
                    $testData['incorrect_answer']++;
                else 
                    $testData['incorrect_answer'] = 1;    
            }

            // save user answer in database
            $testHistory = TestHistory::find($testData['testHistory_id']);
            $answered = $testHistory->answers ? (array)json_decode($testHistory->answers) : [];
            if(!array_key_exists($qid,$answered) ){

                $answered[$qid] = lcfirst($inputs['option']);
                $testHistory->answers = json_encode($answered);
                $testHistory->end_time = Date('Y-m-d h:i:s');
                $testHistory->save();
            }
        }
        else{

            $qanswer = Test::getAnswer($qid);
            $answer['correct'] = lcfirst($qanswer);
            $answer['user_answer'] = $inputs['answer'];
            $testData['answers'][$qid] = $answer;
            
            $testHistory = TestHistory::find($testData['testHistory_id']);
            $testHistory->answers = $answer['user_answer'];
            $testHistory->end_time = Date('Y-m-d h:i:s');
            $testHistory->save();
        }

        Session::put('test_data',$testData);
        Session::put('hours', Input::get('hours',1));
        Session::put('minutes', Input::get('minutes',0));
        Session::put('seconds', Input::get('seconds', 0));
        return Redirect::away(URL::to("user/get-question",$inputs['qid']));
    }

    public function getSolution($id){
        $testData = Session::get('test_data');
        $activeTest = $testData['active_test'];
        $qid = $activeTest[$id-1];
        // $solutionImg = ObjectiveQuestion::getSolution($qid);
        $image = URL::asset('assets/images/study_solution.png');
        // Read image path, convert to base64 encoding
        //$imageData = base64_encode(file_get_contents($image));
        // Format the image SRC:  data:{mime};base64,{data};
        //$src = 'data: '.mime_content_type($image).';base64,'.$imageData;
        return json_encode($image);
    }

    public function submitTest(){
        // Session::forget('test_data');
        $testData = Session::get('test_data');
        $activeTest = $testData['active_test'];
        $testHistory = TestHistory::find($testData['testHistory_id']);
        $testHistory->end_time = Date('Y-m-d h:i:s');
        $testHistory->test_status = 'skipped';
        Session::put('test-complete',true);
        return json_encode('success');
    }

}