<?php

class GlobalHelper {
	public static function flashMessage(){
		$alertMessage= '';
		$alertClass = 'alert-info';

		if(Session::has('success')){
			$alertMessage = Session::get('success');
			$alertClass = 'alert-success';
		}
		elseif(Session::has('error')){
			$alertMessage = Session::get('error');
			$alertClass = 'alert-danger';
		}

		if($alertClass && $alertMessage)
			return GlobalHelper::getAlertMessage($alertClass, $alertMessage);
		else 
			return '';

	}

	public static function getAlertMessage($alertClass,$alertMessage){
		$message = '';
		if($alertClass == 'error')
			$alertClass = 'danger';
		if($alertMessage != ''){
			$message = '<div class="alert alert-'.$alertClass.' alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="close"><span aria-hidden="true">&times;</span></button>
					  '.$alertMessage.'</div><script type="text/javascript">setTimeout(function(){$(".alert .close").click()},3000);</script>';
		}		  

		return $message;
	}

	public static function getValidExcelFormat($includeColumns, $testType, $options) {
		$fileRootPath = Config::get('admin.excel_file_path');
        
        $fileID = '';
        if(!empty($includeColumns)){
        	$i=0;
        	foreach($includeColumns as $val){
        		if($i==0) {
        			$fileID = $val;
        			$i++;
        		}
        		else{
        			$fileID .= '-'.$val;
        		}
            }
		}
		else{
			if($options == 'other')
				$fileID = 'questions';
			else
				$fileID = 'testset';
		}

        $file = Config::get('admin.files.'.$fileID);
        $validFilepath = $fileRootPath . '/'.$testType.'/'. $file;
        $excel = [];
		if(file_exists($validFilepath)) {
			$excelArray = Excel::load($validFilepath)->get()->toArray();
			$excel = array_keys($excelArray[0][0]);
		}
		return $excel;
	}
}