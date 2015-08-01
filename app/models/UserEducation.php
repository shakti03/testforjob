<?php

class UserDegree extends BaseModel {
	protected $table = 'user_degree';
	protected $fillable = ['user_id','degree_id','year','grade'];
}