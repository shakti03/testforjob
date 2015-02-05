<?php

class ObjectiveQuestion extends BaseModel {

	protected $fillable = ['test_type_id','question_no','difficulty_level','subject_id',	'company_id','question','option_a','option_b',	'option_c','option_d','answer']; 

	public static function listSubjects($data = array()){
		if(isset($data['test_type_id'])){
			$subjectIds = ObjectiveQuestion::where('test_type_id',$data['test_type_id'])->distinct()->lists('subject_id');
			if(!empty($subjectIds))
				return Subject::whereIn('id',$subjectIds)->lists('name','id');
		}
		else{
			$subjectIds = ObjectiveQuestion::distinct()->lists('subject_id');
			if(!empty($subjectIds))
				return Subject::whereIn('id',$subjectIds)->lists('name','id');
		}
	}

	public static function listCompanies($data = array()){
		if(isset($data['test_type_id'])){
			$companyIds = ObjectiveQuestion::where('test_type_id',$data['test_type_id'])->distinct()->lists('company_id');
			if(!empty($companyIds))
				return Company::whereIn('id',$companyIds)->lists('name','id');
		}
		else{
			$companyIds = ObjectiveQuestion::distinct()->lists('company_id');
			if(!empty($companyIds))
				return Company::whereIn('id',$companyIds)->lists('name','id');
		}
	}

	public static function listQIdsBySubjectAndTestType($id,$testTypeId){
		return ObjectiveQuestion::where('subject_id',$id)
								->where('test_type_id',$testTypeId)
								->lists('id');
	}

	public static function listQIdsByCompanyAndTestType($id,$testTypeId){
		return ObjectiveQuestion::where('company_id',$id)
								->where('test_type_id',$testTypeId)
								->lists('id');
	}

	public static function getQuestion($id){
		return ObjectiveQuestion::leftJoin('subjects','subjects.id','=','objective_questions.subject_id')
								->leftJoin('companies','companies.id','=','objective_questions.company_id')
								->leftJoin('test_types','test_types.id','=','objective_questions.test_type_id')
								->where('objective_questions.id',$id)
								->select('question','option_a','option_b','option_c','option_d','subjects.name as subject_name','companies.name as company_name','test_types.name as test_type_name')
								->orderBy('question_no')
								->first();
	}

	public static function getAnswer($id){
		$question = ObjectiveQuestion::find($id);
		return $question->answer;
	}
	
}