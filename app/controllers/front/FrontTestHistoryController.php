<?php

class FrontTestHistoryController extends Controller{

    public function testHistory(){
        return View::make('front.user.test-history');
    }

    public function testHistoryData(){
        $logged_user = $logged_user = App::make('authenticator')->getLoggedUser();
        $testHistoryData = TestHistory::getUserTestHistory($logged_user->id);
        
        return Datatable::collection($testHistoryData)
        ->addColumn('date',function($model) {
            return ''.$model->created_at;//date('Y-m-d',strtotime($model->created_at));
        })
        ->addColumn('name',function($model) {
            return ucfirst(str_replace('-',' ',$model->test_slug));
        })
        ->addColumn('testType',function($model) {
            return ucfirst($model->test_question_type);//ucfirst(str_replace('-',' ',$model->test_slug));
        })
        ->addColumn('subject',function($model) {
            return $model->subject_name ? $model->subject_name : '-';//ucfirst(str_replace('-',' ',$model->test_slug));
        })
        ->addColumn('company',function($model) {
            return $model->company_name;//ucfirst(str_replace('-',' ',$model->test_slug));
        })
        ->addColumn('total_question',function($model) {
            return count(json_decode($model->question_ids));
        })
        ->addColumn('answered',function($model) {

            return count((array)json_decode($model->answers));
        })
        ->addColumn('testtime',function($model) {
            return '00:20 hours';//empty($model->time) ? '00:20'.' hours' : date('h:i').' hours' ;
        })
        ->addColumn('user_time',function($model) {
            return $model->user_time.' hours';//'00:20';//empty($model->time) ? '00:20'.' hours' : date('h:i').' hours' ;
        })
        ->addColumn('actions',function($model) {
            return '<a href="'.URL::to('user/test-history/review',[$model->id,1]).'" class="btn btn-xs btn-warning" title="view test history"><i class="fa fa-eye"></i></a>
            <a href="'.URL::to('user/test-history/review',[$model->id,1]).'" class="btn btn-xs btn-success" title="comments"><i class="fa fa-list"></i></a>';
        })
        ->make();
    }

    public function testHistoryViewTest($testId){
    	$testHistoryData = TestHistory::find($testId);
    	$testData = [];
    	if(!empty($testHistoryData)){
    		$testData['question_ids'] = json_decode($testHistoryData->question_ids);
    		$testData['answers'] = json_decode($testHistoryData->answers);
    		$testData['viewed'] = json_decode($testHistoryData->viewed);

    		$discussionComments = DiscussionForum::whereIn('question_id',$testData['question_ids'])->get()->toArray();	
    		echo '<pre>'; print_r($discussionComments) ; echo '</pre>'; exit;
    	}
    }
}