<?php

class AdminController extends Controller {

    public function showVideos(){
        $videos = DB::table('videos')->leftJoin('video_category','video_category.id','=','videos.video_category_id')
                        ->get(['videos.*','video_category.name']);

        return View::make('admin.videos.list',['videos'=>$videos]);
    }

	public function uploadVideo(){
		$inputs = Input::all();
		
		$filePath = $inputs['url_path'];
		if (strpos($filePath,'https://www.youtube.com/watch?v=') !== false) {
			// get video id/link
		    $len = strlen("https://www.youtube.com/watch?v=");
			$link = substr($filePath,$len);

			$videoData['link'] = 'https://www.youtube.com/embed/'.$link;
		   	$videoData['thumbnail'] = "http://i1.ytimg.com/vi/$link/default.jpg";
		    $videoData['title']= $inputs['title'];
		    
		    if(isset($inputs['other_type']) && !empty($inputs['other_type'])) {
		    	$videoCategory = VideoCategory::createOrUpdate(['name'=>$inputs['other_type']]);
		    	$videoData['video_category_id'] = $videoCategory->id;
		    }
		    else{
		    	$videoData['video_category_id'] = $inputs['video_category_id'];
		    }
	    	$video = Video::createOrUpdate($videoData);

		    return Redirect::back()->with('flash_notice',['type'=>'success','msg'=>'Success: File uploaded successfully']);
		}
		else{
			return Redirect::back()->with('flash_notice',['type'=>'danger','msg'=>'Error: Invalid link. Please enter valid youtube url link']);
		}
	}

	public function deleteVideo($id){
		Video::find($id)->delete();
		Session::flash('Success', 'Video file deleted successfully');
		return Redirect::back();
	}

	public function deleteVideoCategory($id){
		Video::where('video_category_id',$id)->delete();
		VideoCategory::find($id)->delete();
		Session::flash('Success', 'Video category deleted successfully');
		return Redirect::back();
	}

}