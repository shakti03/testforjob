<?php



class Subject extends BaseModel {

	protected $fillable = ['name'];

	public static function findByNameOrNew($name){
		$subject = Subject::where('name',$name)->first();
		if(!count($subject)){
			$subject = new Subject;
			$subject->name = $name;
			$subject->save();
		}
		return $subject;
	}
}