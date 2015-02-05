<?php

Route::group(['before' => 'unlogged'], function(){

});

Route::group(['before' => 'logged'], function() {
	Route::get('/', 'TestController@showHome');
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
	
	Route::post('/upload-video','FileController@uploadVideo');
	Route::get('/videos','FileController@showVideos');
	Route::get('/restart-test/{id}','TestController@restartTest');
});
Route::get('test', function(){
	TestHistory::getTestHistory();
});