<?php

class UserSkill extends BaseModel {
	protected $table = 'user_skills';
	protected $fillable = ['user_id','skill_id'];
}