<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['before' => 'logged'], function() {

	Route::get('/', 'HomeController@showHome');
	Route::get('/login', 'HomeController@showHome');
	Route::get('/home', 'TestController@showHome');
	Route::get('/test-home', 'TestController@showHome');
	Route::get('/get-subject-test/{id}', 'TestController@getSubjectTest');
	Route::get('/start-test/{id}', 'TestController@startTest');
	Route::get('/get-test-contents/{testType}/{questionType}', 'TestController@getTestContents');
	Route::get('/get-tests/{testOption}/{id}/{testTypeId}','TestController@getTests');
	Route::get('/get-question/{page}/','TestController@getQuestion');
	Route::get('/upload-excel','FileController@getExcel');
	Route::post('/upload-excel', 'FileController@postExcel');
	Route::post('/submit-question', 'TestController@submitQuestion');
	Route::get('/get-solution/{id}', 'TestController@getSolution');
	
});
Route::get('/','HomeController@showHome');
Route::post('/user/signup', [
        "before" => "csrf",
        'uses'   => "UserController@postSignup"
]);
Route::get('/user/signup', [
        'uses' => "UserController@signup"
]);
// Route::get('/user/email-confirmation', ['uses' => "UserController@emailConfirmation"]);
Route::get('/user/signup-success', 'UserController@signupSuccess');
Route::get('/user/reminder-success', function ()
{
    return Redirect::back()->with('reminder-success', true);
});
Route::post('/user/reminder', [
        "before" => "csrf",
        'uses'   => "UserController@postReminder"
]);
//Route::get('chat', array('uses' => 'ChatController@getIndex'));
//Route::get('chat/new', array( 'as'=>'new_cuser', 'uses' => 'ChatController@newCuser'));
Route::any('chat/create', array( 'as'=>'create_cuser', 'uses' => 'ChatController@createCuser'));
Route::any('chat/sendchat', array( 'as'=>'chat_window', 'uses' => 'ChatController@sendChat'));
Route::any('chat/receivechat', array( 'as'=>'chat_window', 'uses' => 'ChatController@receiveChat'));
//Route::any('chat/viewchat', array( 'as'=>'view_chat', 'uses' => 'ChatController@viewChat'));
