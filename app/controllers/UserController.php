<?php

class UserController extends Controller {

	public function showHome()
	{
		return View::make('user.home');
	}

}