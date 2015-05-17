<?php



class Company extends BaseModel {

	protected $fillable = ['name'];

	public static function findByNameOrNew($name){
		$subject = Company::where('name',$name)->first();
		if(!count($subject)){
			$subject = new Company;
			$subject->name = $name;
			$subject->save();
		}
		return $subject;
	}
}