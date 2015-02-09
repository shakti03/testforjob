<?php

class FileController extends Controller {

	public function showHome(){
		return View::make('user.home');
	}

	public function getExcel(){
		return View::make('upload');
	}

	public function postExcel(){
		$inputs = Input::all();

		if(Input::file('uploadFile')->isValid()){
			$excelFile = Input::file('uploadFile');
			$extension = $excelFile->getClientOriginalExtension();
			if($extension == 'xlsx') {
				$destinationPath = Config::get('var.upload_excel_path');
				$excelFile->move($destinationPath, $excelFile->getClientOriginalName());
				$results = Excel::load($destinationPath.'/'.$excelFile->getClientOriginalName(), function(){})->get();
				$results = $results->toArray();
				foreach($results[0] as $row){
					$company = Company::where('name',$row['company'])->first();
					if(empty($company)){
						$company = Company::create(['name'=>$row['company']]);
					}
					$subject = Subject::where('name',$row['subject'])->first();
					if(empty($subject)){
						$subject = Company::create(['name'=>$row['subject']]);
					}
					$row['test_type_id'] = $inputs['test_type'];
					$row['company_id'] = $company->id;
					$row['subject_id'] = $subject->id;
					ObjectiveQuestion::create($row);
				}
				return Redirect::back()->with('flash_notice',['type'=>'warning','msg'=>'Excel file uploaded and parsed successfully']);
			}
			else{
				return Redirect::back()->with('flash_notice',['type'=>'danger','msg'=>'Invalid file. Please upload "xlsx" extension file.']);
			}
		}
	}

	public function showVideos(){
		$videos = DB::table('videos')->get();
		return View::make('file.videos',['videos'=>$videos]);
	}

	public function uploadVideo(){
		$inputs = Input::all();
		// switch($inputs['file_type']){
		// 	case "youtube": 
				$filePath = $inputs['url_path'];
				if (strpos($filePath,'https://www.youtube.com/watch?v=') !== false) {
				    $len = strlen("https://www.youtube.com/watch?v=");
					$link = substr($filePath,$len);
					$videoData['link'] = 'https://www.youtube.com/embed/'.$link;
				   	$videoData['thumbnail'] = "http://i1.ytimg.com/vi/$link/default.jpg";
				    $videoData['title']= $inputs['title'];
				    $video = Video::createOrUpdate($videoData);
				    return Redirect::back()->with('flash_notice',['type'=>'success','msg'=>'Success: File uploaded successfully']);
				}
				else{
					return Redirect::back()->with('flash_notice',['type'=>'danger','msg'=>'Error: Invalid link. Please enter valid youtube url link']);
				}
		// 	case "uservideo":
		// 	 	return Redirect::back()->with('flash_notice',['type'=>'danger','msg'=>$msg]);
		// }
	}



}