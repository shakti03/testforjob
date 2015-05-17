<?php

class Video extends BaseModel {

	protected $fillable = ['title','link','thumbnail','video_category_id','video_category_value'];

	public function getAllVideosByCategory(){
		return  DB::table('videos')->leftJoin('video_category','video_category.id','=','videos.video_category_id')
						->get(['videos.*','video_category.name']);

	}
}