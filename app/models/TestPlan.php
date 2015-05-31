<?php

class TestPlan  extends BaseModel {

	Protected $table= 'test_plans';
	Protected $fillable = ['name','description','cost','time'];
	public static function getTestPlans(){
		$result = TestPlan::get();
		return $result;	
	}
}