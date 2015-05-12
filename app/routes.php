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
Route::get('admin',function(){
	return Redirect::to('admin/login');
});
	
Route::group(['before' => 'logged'], function() {
	Route::get('/','HomeController@showHome');
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
	Route::get('/videos', 'FileController@showVideos');
    Route::post('/upload-video', 'FileController@uploadVideo');
	Route::get('/restart-test/{id}', function(){
		return Redirect::back()->with('flash_notice',['type'=>'danger','msg'=>'Test History not available']);
	});
	Route::get('/get-discussion-comments/{qid}', 'TestController@getDiscussionComments');
	Route::post('add-comment', 'TestController@addComment');
	
	Route::resource('questions', 'QuestionController');

    Route::get('api/questions', array('as'=>'api.questions', 'uses'=>'QuestionController@getDatatable'));

    // set question time
    Route::post('set-time', 'TestController@setTime');
    Route::get('admin/videos', 'FileController@getVideos');

});

Route::get('/login', 'HomeController@showHome');
Route::get('/it-fresher',function(){
	return View::make('home.it-fresher');
});
Route::get('/it-experience', function(){
	return View::make('home.it-experience');
});
Route::get('/contact-us', function(){
	return View::make('home.contact-us');
});
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
    return json_encode(['mail'=>['Password recovery mail has been sent.']]);
});
//Route::get('chat', array('uses' => 'ChatController@getIndex'));
//Route::get('chat/new', array( 'as'=>'new_cuser', 'uses' => 'ChatController@newCuser'));
Route::any('/chat/create', array( 'as'=>'create_cuser', 'uses' => 'ChatController@createCuser'));
Route::any('/chat/sendchat', array( 'as'=>'chat_window', 'uses' => 'ChatController@sendChat'));
Route::any('/chat/receivechat', array( 'as'=>'chat_window', 'uses' => 'ChatController@receiveChat'));
Route::any('/chat/deletechat', array( 'as'=>'chat_delete', 'uses' => 'ChatController@deleteChat'));
Route::post('enquiry', array('as'=>'enquiry', 'uses'=>'EnquiryController@getContactForm'));
//Route::any('chat/viewchat', array( 'as'=>'view_chat', 'uses' => 'ChatController@viewChat'));

Route::get('test',function(){
	return View::make('layouts.base');
});