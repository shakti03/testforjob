<?php

class TestHistory extends BaseModel {

	protected $fillable = [ 'test_slug',
							'question_ids',
							'answers',
							'viewed',
							'user_id',
							'test_company_id', 
							'test_subject_id',
							'test_difficulty_level',
							'test_type',
							'test_question_type',
							'test_status',
							'end_time'];

	protected $table = 'test_history';



	public static function getTestHistory(){

		$logged_user = App::make('authenticator')->getLoggedUser();

		$testHistory = DB::table('test_history')

						->leftJoin('subjects','subjects.id','=','test_history.test_option_id')

						->leftJoin('companies','companies.id','=','test_history.test_option_id')

						->select('test_history.id', DB::raw('case test_option when "subjects" then subjects.name when "companies" then companies.name end as name'),'test_index')
						->paginate(8);
						// ->get('id','name','index');

		return $testHistory;

	}

	public static function getUserTestHistory($id){
		$testHistory = TestHistory::join('subjects','subjects.id','=','test_history.test_subject_id')
						->join('companies','companies.id','=','test_history.test_company_id')
						->select('test_history.*', 'subjects.name as subject_name', 'companies.name as company_name', DB::raw('TIMEDIFF(end_time, test_history.created_at) as user_time'))
						->where('user_id',$id)
						->get();
		return $testHistory;						
	}
	
	public static function getTestHistoryByUser($id) {
		return DB::table('test_history')
			->leftJoin('users', 'users.id', '=', 'test_history.user_id')
			->where('test_history.user_id', '=', $id)
			->get();
	}
	
	

}