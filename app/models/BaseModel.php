<?php

class BaseModel extends Eloquent {

	public static function createOrUpdate($data = array()){
		foreach($data as $key=>$value){
			if($value == null || $value == '')
				unset($data[$key]);
		}

		$model = self::findOrNew(isset($data['id']) ? $data['id']:null);
		$model->fill($data);
		$model->save(); 
		return $model;
	}
}