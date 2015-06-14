<?php

class Video extends BaseModel {

	protected $fillable = ['title','link','thumbnail','video_category_id','video_category_value'];

	public function getAllVideosByCategory(){
		return  DB::table('videos')->leftJoin('video_category','video_category.id','=','videos.video_category_id')
						->get(['videos.*','video_category.name']);

	}

	public static function updatePlans($videoIDs, $plansIDs){
		return Video::whereIn('id',$videoIDs)->update(['test_plan_ids'=>$plansIDs]);
	}

	public static function getUserVideos(){
		$logged_user = App::make('authenticator')->getLoggedUser();

		$result = DB::table('videos')->leftJoin('video_category','video_category.id','=','videos.video_category_id');
		
		$userTestPlanIDs = UserTestPlan::where('user_id',$logged_user->id)->lists('id');
        
        $result =   $result->where(function($query) use($userTestPlanIDs){
                        $count = 0;
                        foreach($userTestPlanIDs as $planID){
                            if($count == 0){
                                $query = $query->where('test_plan_ids','LIKE', '%'.$planID.'%');
                                $count++;
                            }
                            else{
                                $query = $query->orWhere('test_plan_ids','LIKE', '%,'.$planID.',%');   
        					}
    					}
					});						
		
		return $result->get(['videos.*','video_category.name']);
	}
}