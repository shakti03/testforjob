<?php

class AdminTestPlanController extends Controller {

	public function getTestPlanList(){
		return View::make('admin.test-plans.list');
	}

	public function testPlanData(){
		$testPlans = TestPlan::getTestPlans();
		
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

       TestPlan::createOrUpdate($data);
    }

    public function deleteTestPlan($id){
        TestPlan::destroy($id);
        return Redirect::back();
    }
}