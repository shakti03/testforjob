<?php

class AdminTestPlanController extends Controller {

	public function getTestPlanList(){
        $features = DB::table('plan_features')->lists('name','id');
        return View::make('admin.test-plans.list',['features'=>$features]);
	}

	public function testPlanData(){
		$testPlans = TestPlan::getTestPlans();
		$testPlanFeatures = DB::table('testplan_features')
                                ->leftJoin('plan_features','plan_features.id','=','testplan_features.feature_id')
                                ->select('test_plan_id',DB::raw('GROUP_CONCAT(plan_features.name) as features'))
                                ->groupBy('testplan_features.test_plan_id')
                                ->get();
        $data = [];
        foreach($testPlanFeatures as $value){
            $data[$value->test_plan_id] = $value->features;
        }  
        $testPlanFeatures = $data;
		return Datatable::collection($testPlans)
        ->addColumn('select',function($model) {
            return '<input type="checkbox" value="'.$model->id.'" class="selectTest">';
        })
        ->addColumn('name',function($model) {
            return $model->name;
        })
        ->addColumn('description',function($model) {
            return $model->description;
        })
        ->addColumn('features', function($model) use($testPlanFeatures){
            return isset($testPlanFeatures[$model->id]) ? $testPlanFeatures[$model->id] : '-';
        })
        ->addColumn('cost',function($model) {
            return $model->cost;
        })
        ->addColumn('validity',function($model) {
        	if(!empty($model->time)) {
        		return $model->time.' years';
        	}
        	else{
        		return '';
        	}
        })
        ->addColumn('action',function($model) {
        	return '<a href="javascript:void(0);" data-object="'.json_encode($model).'" class="btn btn-xs btn-primary edit" title="update"><i class="fa fa-pencil"></i></a>&nbsp;'
                   .'<a href="'.URL::to('admin/test-plan/delete',$model->id).'" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-trash"></i></a>&nbsp;' ;
        })
        ->make();;
	}

    public function addTestPlan(){
       $inputs = Input::all();
       $data['name'] = $inputs['plan_name'];
       $data['description'] = $inputs['description'];
       $data['cost'] = $inputs['price'];
       $data['time'] = $inputs['validity_time']+0;
       
       $testPlan = TestPlan::createOrUpdate($data);

       $testPlanFeatures = Input::get('feature');
       foreach($testPlanFeatures as $key=>$feature){
            DB::table('testplan_features')->insert(
                array('test_plan_id' => $testPlan->id,
                      'feature_id' => $key)
            );
       }
       return 'success';
    }

    public function deleteTestPlan($id){
        TestPlan::destroy($id);
        return Redirect::back();
    }
}