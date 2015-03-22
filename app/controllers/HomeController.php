<?php



class HomeController extends Controller {

	public function showHome()
	{
		$enable_captcha = Config::get('laravel-authentication-acl::captcha_signup');

        if($enable_captcha)
        {
            $captcha = App::make('captcha_validator');
            // return View::make('laravel-authentication-acl::client.auth.signup')->with('captcha', $captcha);
            return View::make('home.index')->with('captcha', $captcha);
        }

        // return View::make('laravel-authentication-acl::client.auth.signup');
        return View::make('home.index');
	}
}