<?php

class UserCompany extends BaseModel {
	protected $table = 'user_company';
	protected $fillable = ['user_id','company_id','from_date','to_date'];
}