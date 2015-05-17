<?php

class UploadHelper {

	public static function uploadExcel($file, $dirPath = 'uploads/excel'){
		$validExtenesions = ['xlsx', 'xls'];

		if($file->isValid()){
			$extension = $file->getClientOriginalExtension();
			$fileName = $file->getClientOriginalName();
			if(in_array($extension, $validExtenesions)) {
				$file->move($dirPath, $fileName);
				return $dirPath.'/'.$fileName;
			}
		}
	}
}