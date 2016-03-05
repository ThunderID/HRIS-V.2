<?php

Route::group(['namespace' => 'General\\'], function()
{
	Route::get('/',											['uses' => 'DashboardController@index', 	'as' => 'general.dashboard.index']);
});
