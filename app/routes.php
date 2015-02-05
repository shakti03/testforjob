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

Route::get('/', function()
{
	//return  View::make('hello');
	return  View::make('index');
	
});

//Route::get('chat', array('uses' => 'ChatController@getIndex'));
//Route::get('chat/new', array( 'as'=>'new_cuser', 'uses' => 'ChatController@newCuser'));
Route::any('chat/create', array( 'as'=>'create_cuser', 'uses' => 'ChatController@createCuser'));
Route::any('chat/sendchat', array( 'as'=>'chat_window', 'uses' => 'ChatController@sendChat'));
Route::any('chat/receivechat', array( 'as'=>'chat_window', 'uses' => 'ChatController@receiveChat'));
//Route::any('chat/viewchat', array( 'as'=>'view_chat', 'uses' => 'ChatController@viewChat'));