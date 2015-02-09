<?php

class TestHistory extends BaseModel {
	protected $fillable = ['active_test','answers','viewed','user_id','test_option','test_index','test_option_id'];
	protected $table = 'test_history';

	public static function getTestHistory(){
		$logged_user = App::make('authenticator')->getLoggedUser();
		$testHistory = DB::table('test_history')
						->leftJoin('subjects','subjects.id','=','test_history.test_option_id')
						->leftJoin('companies','companies.id','=','test_history.test_option_id')
						->select('test_history.id', DB::raw('case test_option when "subjects" then subjects.name when "companies" then companies.name end as name'),'test_index')
						->get('id','name','index');
		return $testHistory;
	}
}
