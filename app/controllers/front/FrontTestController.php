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
        $tests = Test::getTestSets($inputs);

        return Datatable::collection($tests)
        ->addColumn('name',function($model) {
            return ucfirst($model->name);
        })
        ->addColumn('test_type',function($model) {
            return ucfirst($model->test_type);
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

        shuffle($questionIDs);
        $testData['active_test'] = $questionIDs;

        $logged_user = App::make('authenticator')->getLoggedUser();
        $testHistory = TestHistory::createOrUpdate( [
                                                        'user_id'=>$logged_user->id,
                                                        'question_ids'=>json_encode($testData['active_test']),
                                                        'test_slug' => $testslug
                                                    ]);
        $testData['testHistory_id'] = $testHistory->id;
        $testData['user_id'] = $logged_user;
        Session::put('test_data', $testData);

        Session::put('hours', $testTime['hours']);
        Session::put('minutes', $testTime['minutes']);
        Session::put('seconds', 0);

        return Redirect::away(URL::to("user/get-question",1));
    }

    public function getQuestion($page) {
        $testData = Session::get('test_data');
        $activeTest = $testData['active_test'];
        $last = count($activeTest);
        $answer = null;
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
                $testHistory->save();
            }

            if(isset($testData['answers'])) {
                $answer = isset($testData['answers'][$activeTest[$page-1]]) ? $testData['answers'][$activeTest[$page-1]] : null;
                $totalAnswered = count($testData['answers']);
            }

            $hours = Session::get('hours');
            $minutes = Session::get('minutes');
            $seconds = Session::get('seconds');

            return View::make('front.test.show-question',['question'  => $question,
                                                    'page'      => $page,
                                                    'last'      => $last,
                                                    'answer'    => $answer,
                                                    'totalAnswered' => $totalAnswered,
                                                    'correctAnswered' => isset($testData['correct_answer']) ? $testData['correct_answer'] : 0, 
                                                    'incorrectAnswered' => isset($testData['incorrect_answer']) ? $testData['incorrect_answer'] : 0,
                                                    'hours'     => $hours,
                                                    'minutes'   => $minutes,
                                                    'seconds'   => $seconds
                                                   ]);
        }
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
        $data = Input:: all();
        $result = DiscussionForum:: insertComments($data);
        return json_encode($result);
    }

    public function submitQuestion(){
        $inputs = Input::all();
        $testData = Session::get('test_data');
        $activeTest = $testData['active_test'];
        $qid = $activeTest[$inputs['qid']-1];
        
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
}