<?php

Route::group(['namespace' => 'Auth\\'], function()
{
	Route::get('/auth',							['uses' => 'AuthController@getLogin', 	'as' => 'auth.login.get']);
	
	Route::post('/auth/logging',				['uses' => 'AuthController@postLogin', 	'as' => 'auth.login.post']);
	
	Route::get('/logged/out',					['uses' => 'AuthController@getLogout', 	'as' => 'auth.logout.get']);
});
