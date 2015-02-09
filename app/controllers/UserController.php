<?php  

/**
 * Class UserController
 *
 * @author jacopo beschi jacopo@jacopobeschi.com
 */
use Illuminate\Support\MessageBag;
use Jacopo\Authentication\Exceptions\PermissionException;
use Jacopo\Authentication\Exceptions\ProfileNotFoundException;
use Jacopo\Authentication\Helpers\DbHelper;
use Jacopo\Authentication\Models\UserProfile;
use Jacopo\Authentication\Presenters\UserPresenter;
use Jacopo\Authentication\Services\UserProfileService;
use Jacopo\Authentication\Validators\UserProfileAvatarValidator;
use Jacopo\Library\Exceptions\NotFoundException;
use Jacopo\Library\Form\FormModel;
use Jacopo\Authentication\Models\User;
use Jacopo\Authentication\Helpers\FormHelper;
use Jacopo\Authentication\Exceptions\UserNotFoundException;
use Jacopo\Authentication\Validators\UserValidator;
use Jacopo\Library\Exceptions\JacopoExceptionsInterface;
use Jacopo\Authentication\Validators\UserProfileValidator;
// use View, Input, Redirect, App, Config, Controller;
use Jacopo\Authentication\Interfaces\AuthenticateInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserController extends Controller {

	public function showHome()
	{
		return View::make('user.home');
	}

	public function signup()
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

    public function postSignup()
    {
        $service = App::make('register_service');

        try
        {
            $service->register(Input::all());
        } catch(JacopoExceptionsInterface $e)
        {
            // return Redirect::action('UserController@signup')->withErrors($service->getErrors())->withInput();
            return Redirect::back()->withErrors($service->getErrors())->withInput();
        }

        return Redirect::action('UserController@signupSuccess');
    }

    public function signupSuccess()
    {
        $email_confirmation_enabled = Config::get('laravel-authentication-acl::email_confirmation');
        return $email_confirmation_enabled ? Redirect::back()->with('signup_success',true) : View::make('home.signup-success');
    }

    public function emailConfirmation()
    {
        $email = Input::get('email');
        $token = Input::get('token');

        try
        {
            $this->register_service->checkUserActivationCode($email, $token);
        } catch(JacopoExceptionsInterface $e)
        {
            return View::make('home.email-confirmation')->withErrors($this->register_service->getErrors());
        }
        return View::make('home.email-confirmation');
    }

    public function postReminder()
    {
        $email = Input::get('email');

        try
        {
            $this->reminder->send($email);
            return Redirect::to("/user/reminder-success");
        }
        catch(JacopoExceptionsInterface $e)
        {
            $errors = $this->reminder->getErrors();
            return Redirect::back()->withErrors($errors);
        }
    }

}