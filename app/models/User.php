<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';

	protected $fillable = ['id','email' ];
				
	protected $hidden = array('password', 'remember_token');
	
	public static function fetchUserDetails($id) {
		return User::leftJoin('user_profile','user_profile.user_id','=','users.id')
			->where('users.id', '=' ,  $id)
			->get()->first();
	}

}
