<?php

class Test  extends Eloquent {

    protected $table = 'test_questions';
    protected $fillable = ['question','option_a','option_b','option_c','option_d','answer','subject_id','company_id','test_type','test_name','difficulty_level','test_slug'];

    public static function getTestSets($inputs = []) {
        $result =  Test::select('test_questions.test_name as name', 'test_type', 'question_type', 'difficulty_level', DB::raw('count(test_questions.test_name) as no_of_questions'),'test_timings.time','test_questions.test_slug as test_slug','subjects.name as subject_name','companies.name as company_name')
                    ->leftJoin('subjects','subjects.id','=','test_questions.subject_id')
                    ->leftJoin('companies','companies.id','=','test_questions.company_id')
                    ->leftJoin('test_timings','test_timings.test_slug','=','test_questions.test_slug');

        if(isset($inputs['company']) && !empty($inputs['company']))
            $result = $result->where('test_questions.company_id', $inputs['company']);

        if(isset($inputs['subject']) && !empty($inputs['subject']))
            $result = $result->where('test_questions.subject_id', $inputs['subject']);

        if(isset($inputs['test_type']) && !empty($inputs['test_type']))
            $result = $result->where('test_questions.test_type', $inputs['test_type']);

        if(isset($inputs['question_type']) && !empty($inputs['question_type'])){
            $result = $result->where('test_questions.question_type', $inputs['question_type']);
        }    
        
        if(isset($inputs['difficulty_level']) && !empty($inputs['difficulty_level'])) {
            if($inputs['difficulty_level'] == 'experienced')
                $result = $result->where('test_questions.difficulty_level', '>', 0);
            else
                $result = $result->where('test_questions.difficulty_level',  0);
        }
            
        
        $result =  $result->groupBy('test_questions.test_type')
                    ->groupBy('test_questions.question_type')
                    ->groupBy('test_questions.test_name')
                    ->get();
        return $result;             
    }

    public static function createByExcelData($excelData, $inputData) {
    	foreach($excelData as $row){
            // validate input data
            if(isset($inputData['company']) && $inputData['company'] == 'other') {
                $newCompanyName = $inputData['other']['company'];
                $company = Company::create(['name'=>$newCompanyName]);
                $inputData['company'] = $company->id;
            }
            if(isset($inputData['subject']) && $inputData['subject'] == 'other') {
                $newSubjectName = $inputData['other']['subject'];
                $subject = Subject::create(['name'=>$newSubjectName]);
                $inputData['subject'] = $subject->id;
            }
            if(isset($inputData['difficulty_level'])){
                if($inputData['difficulty_level'] == 'experienced'){
                    $inputData['difficulty_level'] = isset($inputData['other']['difficulty_level']) ? $inputData['other']['difficulty_level'] : 0;
                }
                else{
                    $inputData['difficulty_level'] = 0;
                }
            }
            // end validate input data

    		$test = new Test;
    		$test->test_type = $inputData['test'];
            $test->question_type = $inputData['test-type'];
    		$test->test_name = isset($row['test_set_name']) ? $row['test_set_name'] : (isset($inputData['test_name']) ? $inputData['test_name'] : 'test');
    		$test->test_slug = Str::slug($test->test_name, '-');
            $test->difficulty_level = isset($row['difficulty_level']) ? $row['difficulty_level'] : isset($inputData['difficulty_level']) ? $inputData['difficulty_level'] : 0;
    		
    		if(isset($row['subject'])) {
                $subject = Subject::findByNameOrNew($subjectName);
                $test->subject_id = $subject->id;  
            }
            elseif(isset($inputData['subject'])){
                $test->subject_id = $inputData['subject'];
            }

            if(isset($row['company'])){
                $company = Company::findByNameOrNew($subjectName);
                $test->company_id = $company->id;  
            }
            elseif(isset($inputData['company'])){
                $test->company_id = $inputData['company'];   
            }
    		
    		$test->question = $row['question'];
    		$test->answer = $row['answer'];

            $test->study_solution = isset($row['study_solution']) ? $row['study_solution'] : null;
    		if($inputData['test-type'] == 'objective') {
    			$test->option_a = $row['option_a'];
    			$test->option_b = $row['option_b'];
    			$test->option_c = $row['option_c'];
    			$test->option_d = $row['option_d'];
    		}
    		$test->save();
    	}
    }

    public static function deleteTest($slug){
        Test::where('test_slug',$slug)->delete();
    }

    public static function getQuestionIDs($slug) {
        return Test::where('test_slug',$slug)->lists('id');
    }

    public static function getTestTiming($slug) {
        $timing = DB::table('test_timings')->where('test_slug',$slug)->first();
        $timeData = [];
        if(count($timing)){
            $time = strtotime($timing);
            $timeData['hours'] = date('h',$time);
            $timeData['minutes'] = date('m',$time);
        }

        if(empty($timeData)) {
            $timeData['hours'] = 0;
            $timeData['minutes'] = 20;   
        }
        return $timeData;
    }

    public static function getQuestion($id){
        return Test::leftJoin('subjects','subjects.id','=','test_questions.subject_id')
                    ->leftJoin('companies','companies.id','=','test_questions.company_id')
                    ->where('test_questions.id',$id)
                    ->select('question','option_a','option_b','option_c','option_d','subjects.name as subject_name','companies.name as company_name','question_type')
                    ->first();
    }

    public static function getAnswer($id){
        $question = Test::find($id);
        $answer = '';
        if($question){
            $answer = $question->answer;
        }
        return $answer;
    }

    public static function getTestQuestions($slug){
        return Test::where('test_slug',$slug)->get();
    }

    public static function updateAll($testSlugs,$inputData){
        if($inputData['company'] == 'other') {
            $newCompanyName = $inputData['other']['company'];
            $company = Company::create(['name'=>$newCompanyName]);
            $inputData['company'] = $company->id;
        }
        if($inputData['subject'] == 'other') {
            $newSubjectName = $inputData['other']['subject'];
            $subject = Subject::create(['name'=>$newSubjectName]);
            $inputData['subject'] = $subject->id;
        }
        if(isset($inputData['difficulty_level']) && $inputData['difficulty_level'] == 'experienced'){
            $inputData['difficulty_level'] = isset($inputData['other']['difficulty_level']) ? $inputData['other']['difficulty_level'] : 0;
        }
        else{
            $inputData['difficulty_level'] = 0;
        }
        
        return Test::whereIn('test_slug',$testSlugs)->update(['test_type'=>$inputData['test_type'],
                                                        'company_id'=>$inputData['company'],
                                                        'subject_id'=>$inputData['subject'],
                                                        'difficulty_level'=>$inputData['difficulty_level']
                                                        ]);
        
    }

    public static function updateSubjectAndCompanies(){
        $subjects = array_unique(Test::lists('subject_id'));
        Subject::whereNotIn('id',$subjects)->delete();
        $companies = array_unique(Test::lists('company_id'));
        Company::whereNotIn('id',$companies)->delete();
    }

    public static function getStudySolution($qid){
        $question = Test::find($qid);
        
        return $question->study_solution;
    }
}
