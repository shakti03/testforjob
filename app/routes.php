<?php

Route::group(['before'=>'admin_logged', 'prefix'=>'admin'], function(){
	Route::get('/', function(){
		return Redirect::to('admin/login');
	});

	Route::any('test/list', 'AdminTestController@getTestList');
	Route::any('test/list-data', 'AdminTestController@getTestListData');
	Route::any('test/view/{slug}', 'AdminTestController@getTestQuestions');
	Route::any('test/test-data/{slug}/{type}', 'AdminTestController@getTestViewData');
	Route::post('test/add', 'AdminTestController@addTest');
	Route::post('test/edit', 'AdminTestController@editTest');
	Route::post('test/delete', 'AdminTestController@deleteSelectedTest');
	Route::post('test/testplan/add', 'AdminTestController@linkTestPlan');

	Route::get('test/delete/{slug}','AdminTestController@deleteTest')->where('slug', '[A-Za-z0-9\-]+');;
	Route::get('download-excel/{testType}/{fileid}', 'AdminTestController@downloadExcelFile');

	Route::get('test/question/delete/{id}','AdminTestController@deleteQuestion')->where('slug', '[A-Za-z0-9\-]+');;
	Route::post('test/question/delete', 'AdminTestController@deleteSelectedQuestion');
	Route::post('test/question/add','AdminTestController@addQuestion');

	Route::get('videos', 'AdminController@showVideos');
    Route::post('upload-video', 'AdminController@uploadVideo');
    Route::get('videos/category/delete/{id}', 'AdminController@deleteVideoCategory');
    Route::get('videos/delete/{id}', 'AdminController@deleteVideo');
    Route::post('videos/plan/add', 'AdminController@linkVideoPlan');

    Route::get('test-plan/list', 'AdminTestPlanController@getTestPlanList');
    Route::any('test-plan-data', 'AdminTestPlanController@testPlanData');
    Route::post('test-plan/add', 'AdminTestPlanController@addTestPlan');
    Route::get('test-plan/delete/{id}', 'AdminTestPlanController@deleteTestPlan');

});
	
Route::group(['before' => 'logged'], function() {
	Route::get('/home', 'FrontTestController@getTestList');
	Route::any('user/test/list', 'FrontTestController@getTestList');
	Route::any('user/test/list-data', 'FrontTestController@getTestListData');
	Route::get('user/test/start/{id}/', 'FrontTestController@startTest');
	Route::get('user/get-solution/{id}/', 'FrontTestController@getSolution');
	Route::get('user/get-question/{id}', 'FrontTestController@getQuestion');
	Route::post('user/set-time', 'FrontTestController@setTime');
	Route::post('set-time', 'FrontTestController@setTime');
	Route::post('user/submit-question', 'FrontTestController@submitQuestion');
	Route::get('question/get-discussion-comments/{qid}', 'FrontTestController@getDiscussionComments');
	Route::post('question/add-comment', 'FrontTestController@addComment');
	Route::get('user/test/complete', 'FrontTestController@submitTest');

	Route::any('user/test-history', 'FrontTestHistoryController@testHistory');
	Route::get('user/test-history/data', 'FrontTestHistoryController@testHistoryData');
	Route::get('user/test-history/review/{testid}', 'FrontTestHistoryController@testReview');
	Route::get('user/test-history/get-discussion-comments/{id}', 'FrontTestHistoryController@getDiscussionComments');

	Route::get('user/dashboard', 'FrontUserController@showDashboard');
	Route::get('user/videos', 'FrontUserController@showVideos');
	Route::get('user/test-plans','FrontUserController@getTestPlans');
	Route::get('user/get-plan/{id}','PaymentController@getTestPlan');
	Route::post('user/get-plans','PaymentController@getTestPlan');
	Route::any('payment-success','PaymentController@paymentSuccess');
	Route::any('payment-cancel','PaymentController@paymentCancel');
	Route::any('payment-fail','PaymentController@paymentFail');
});

Route::get('test-plan','HomeController@testPlan');

Route::get('/', 'HomeController@showHome');
Route::get('/login', function(){
	return Redirect::to('/');
});
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

Route::get('/user/signup-success', 'UserController@signupSuccess');
Route::get('/user/reminder-success', function ()
{
    return json_encode(['mail'=>['Password recovery mail has been sent.']]);
});

Route::any('/chat/create', array( 'as'=>'create_cuser', 'uses' => 'ChatController@createCuser'));
Route::any('/chat/sendchat', array( 'as'=>'chat_window', 'uses' => 'ChatController@sendChat'));
Route::any('/chat/receivechat', array( 'as'=>'chat_window', 'uses' => 'ChatController@receiveChat'));
Route::any('/chat/deletechat', array( 'as'=>'chat_delete', 'uses' => 'ChatController@deleteChat'));

Route::post('enquiry', array('as'=>'enquiry', 'uses'=>'EnquiryController@getContactForm'));
//Route::any('chat/viewchat', array( 'as'=>'view_chat', 'uses' => 'ChatController@viewChat'));

