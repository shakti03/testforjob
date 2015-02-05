<?php

class HomeController extends Controller {

	public function showHome()
	{
		return View::make('home.index');
	}

}