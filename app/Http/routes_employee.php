<?php

Route::group(['namespace' => 'Org\\'], function()
{
	Route::resource('/org/{org_id?}/employee',	'EmployeeController',	['names' => ['index' => 'employee.index', 'create' => 'employee.create', 'store' => 'employee.store', 'show' => 'employee.show', 'edit' => 'employee.edit', 'update' => 'employee.update', 'destroy' => 'employee.destroy']]);
	
	Route::get('/generate/nik/{code}/{id}/{join_year}/',				['uses' => 'EmployeeController@generateNIK', 	'as' => 'ajax.employee.nik']);
	
	Route::get('/generate/username/{code}/{name}',						['uses' => 'EmployeeController@generateUsername', 	'as' => 'ajax.employee.username']);
});
