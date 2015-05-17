<?php 

class FrontUserController extends Controller {

	public function showDashboard(){
		return View::make('front.user.dashboard');
	}

	public function showVideos(){
		$videos = DB::table('videos')->leftJoin('video_category','video_category.id','=','videos.video_category_id')
						->get(['videos.*','video_category.name']);

		return View::make('front.videos.list',['videos'=>$videos]);
	}

	public function showTestHistory(){
		return View::make('front.user.test-history');
	}
}
