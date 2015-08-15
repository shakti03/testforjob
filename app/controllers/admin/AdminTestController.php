<?php

class AdminTestController extends Controller {

    public function getTestList(){
        $data = Config::get('admin.test_options');
        $data['subjects'] = Subject::lists('name','id');
        $data['companies'] = Company::lists('name','id');
        $data['excel_include_columns'] = Config::get('admin.excel_include_columns');
        $data['testPlans'] = TestPlan::lists('name','id');
        return View::make('admin.test.list', $data);
    }

    public function getTestListData(){
        $inputs = Input::all();
        $tests = Test::getTestSets($inputs,false);
        $testPlans = TestPlan::lists('name','id');
        
        return Datatable::collection($tests)
        ->addColumn('select',function($model) {
            return '<input type="checkbox" value="'.$model->test_slug.'" class="selectTest">';
        })
        ->addColumn('name',function($model) {
            return ucfirst($model->name);
        })
        ->addColumn('company',function($model) {
            return ucfirst($model->company_name);
        })
        ->addColumn('subject',function($model) {
            return ucfirst($model->subject_name);
        })
        ->addColumn('test',function($model) {
            return ucfirst($model->test_type);
        })
        ->addColumn('type',function($model) {
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
        ->addColumn('testplans',function($model) use($testPlans){
            $testPlanStr = '';
            
            if(!empty($model->test_plan_ids)){
                $testPlanIds = explode(',',$model->test_plan_ids);
                foreach($testPlanIds as $testPlanID){
                    $testPlanStr .= $testPlans[$testPlanID].', ';
                }
            }
            else{
                $testPlanStr = '-';    
            }
            return $testPlanStr;
        })
        ->addColumn('actions',function($model) {
            $slug = $model->test_slug;
            return '<a href="'.URL::to('admin/test/view',$slug).'" class="btn btn-xs btn-success" title="view"><i class="fa fa-eye"></i></a>&nbsp;'
                   .'<a href="javascript:void(0);" data-slug="'.$slug.'" class="btn btn-xs btn-primary edit" title="update"><i class="fa fa-pencil"></i></a>&nbsp;'
                   .'<a href="'.URL::to('admin/test/delete',$slug).'" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-trash"></i></a>&nbsp;' ;
        })
        ->make();
    }

    public function editTest(){
        $inputData = Input::all();
        $testSlugs = explode(',',$inputData['test_slugs']);
        $result = Test::updateAll($testSlugs, $inputData);
 
        if($result){
            $message = GlobalHelper::getAlertMessage('success', 'Test updated successfully');
            return Response::json(['success'=>$message]);        
        }
        else{
            $message = GlobalHelper::getAlertMessage('success', 'Update operaton failed');
            return Response::json(['error'=>$message]);        
        }
            
    }

    public function deleteSelectedTest(){
        $test_slugs = Input::get('test_slugs');
        if(!empty($test_slugs)) {
            Test::whereIn('test_slug',$test_slugs)->delete();
            Test::updateSubjectAndCompanies();
            return Redirect::back()->with('success','Test deleted successfully');
        }
        else{
            return Redirect::back()->with('error','Delete test failed');
        }
    }

    public function deleteTest($slug){
        Test::deleteTest($slug);
        Test::updateSubjectAndCompanies();
        return Redirect::back()->with('success','Test deleted successfully');
    }



    public function getTestQuestions($slug){
        $testType = Test::where('test_slug',$slug)->first();
        if(empty($testType))
            return Redirect::to('admin/test/list');

        $testType = $testType->question_type;
        return View::make('admin.test.questions',['slug'=>$slug,'question_type'=>$testType]);
    }

    public function getTestViewData($slug,$testType){
        if(empty($slug)){
            return GlobalHelper::getAlertMessage('error','Test not Found');
        }
        
        $testQuestions = Test::getTestQuestions($slug);
        
        $collection = Datatable::collection($testQuestions)
                        ->addColumn('id',function($model) {
                            return '<input type="checkbox" value="'.$model->id.'" class="selectQuestion">';
                        })
                        ->addColumn('question',function($model) {
                            return $model->question;
                        });
                        

        if($testType == 'objective'){
            $collection = $collection->addColumn('options_a',function($model) {
                                        return $model->option_a;
                                    })
                                    ->addColumn('options_b',function($model) {
                                        return $model->option_b;
                                    })
                                    ->addColumn('options_c',function($model) {
                                        return $model->option_c;
                                    })
                                    ->addColumn('options_d',function($model) {
                                        return $model->option_d;
                                    });
        }

        $collection =   $collection->addColumn('answer',function($model) {
                                return $model->answer;
                            })
                            ->addColumn('options',function($model) {
                                $data = [
                                        'id' => $model->id , 
                                        'question' => $model->question, 
                                        'option_a' => $model->option_a,
                                        'option_b' => $model->option_c,
                                        'option_c' => $model->option_d,
                                        'option_d' => $model->option_d,
                                        'answer' => $model->answer
                                        ];

                                return '<a href="javascript:void(0);" data-content=\''.json_encode($data).'\' class="btn btn-xs btn-primary edit"><i class="fa fa-pencil"></i></a>&nbsp;'
                                       .'<a href="'.URL::to('admin/test/question/delete',$model->id).'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>&nbsp;' ;
                            });

        return $collection->make();
    }

    public function downloadExcelFile($testType, $fileID){
        // $fileID = 'questions';
        $fileRootPath = Config::get('admin.excel_file_path');
        $file = Config::get('admin.files.'.$fileID);
        $download_path = $fileRootPath . '/'.$testType.'/'. $file;
        return Response::download($download_path);
    }

    public function addTest(){
        $inputs = Input::all();
        if(Input::file('excel')->isValid()){
            $excelFile = Input::file('excel');
            $filePath = UploadHelper::uploadExcel($excelFile);
            $error = false;
            
            try{
                $excel = Excel::selectSheetsByIndex(0)->load($filePath);
                $excelFileData = $excel->get();//->toArray();
            }
            catch(PHPExcel_Exception $e){
                $message = GlobalHelper::getAlertMessage('error', 'Excel file error: '. $e->getMessage() );
                return Response::json(['error'=>$message]);
            }

            if($excelFileData->count()) {
                $excelFileData = $excelFileData->toArray();
                $uploadFileKeys = array_keys($excelFileData[0]);
                $excelIncludedColumns = Input::get('excelColumns', []);
                $validKeys = GlobalHelper::getValidExcelFormat($excelIncludedColumns, Input::get('test-type'), Input::get('options'));
                if(!$error && $uploadFileKeys == $validKeys){
                    Test::createByExcelData($excelFileData, $inputs);
                    $message = GlobalHelper::getAlertMessage('success', 'File saved');
                    return Response::json(['success'=>$message]);        
                }
                else{
                    $message = GlobalHelper::getAlertMessage('error', 'Excel file not valid' );
                    return Response::json(['error'=>$message]);
                }
            }
        }
        $message = GlobalHelper::getAlertMessage('error', 'Excel file not valid' );
        return Response::json(['error'=>$message]);
    }

    public function deleteQuestion($id){
        Test::find($id)->delete();
        Session::flush('success','Question deleted successfully');
        return Redirect::back();
    }

    public function deleteSelectedQuestion(){
        $ids = Input::get('question_ids');
        if(!empty($ids)) {
            Test::whereIn('id',$ids)->delete();
            Session::flush('success','Selected questions deleted successfully');
            return json_encode('success');
        }
        else{
            Session::error('Not deleted');
            return json_encode('false');
        }
    }

    public function addQuestion(){
        $inputs = Input::all();

        $testInfo = Test::where('test_slug',$inputs['test_slug'])->first();

        $data = [   'question' => $inputs['question'],
                    'answer' => $inputs['answer'],
                    'test_slug' => $inputs['test_slug'],
                    'company_id' => $testInfo['company_id'],
                    'subject_id' => $testInfo['subject_id'],
                    'test_name' => $testInfo['test_name'],
                    'question_type' => $testInfo['question_type'],
                    'difficulty_level' => $testInfo['difficulty_level']
                ];

        if(isset($inputs['question_type']) && $inputs['question_type'] == 'objective'){
            $data = $data + ['option_a' => $inputs['option_a'],
                             'option_b' => $inputs['option_b'],
                             'option_c' => $inputs['option_c'],
                             'option_d' => $inputs['option_d']
                            ];
        }

        if(isset($inputs['id']) && !empty($inputs['id'])) {
            Test::findOrNew($inputs['id'])->update($data);
            return Redirect::back()->with('success','Question updated successfullty');
        }
        else {
            Test::create($data);
            return Redirect::back()->with('success','Question added successfullty');
        }
    }

    public function linkTestPlan(){
        $inputData = Input::all();

        $testSlugs = explode(',',$inputData['testids']);
        $testPlans = implode(',', isset($inputData['testplanIDs']) ? $inputData['testplanIDs'] : []);
        $result = Test::updatePlans($testSlugs, $testPlans);
 
        if($result){
            $message = GlobalHelper::getAlertMessage('success', 'Test updated successfully');
            return Response::json(['success'=>$message]);        
        }
        else{
            $message = GlobalHelper::getAlertMessage('success', 'Update operation failed');
            return Response::json(['error'=>$message]);        
        }        
    }
}