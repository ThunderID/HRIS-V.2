<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['logged']], function () 
{
	Route::get('/',											['uses' => 'DashboardController@index', 'as' => 'hris.dashboard.index']);

	Route::get('/{code}/dashboard',							['uses' => 'DashboardController@show', 'as' => 'hris.dashboard.show']);
	
	Route::get('/{code}/employees',							['uses' => 'EmployeeController@index', 'as' => 'hris.employees.index']);
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
