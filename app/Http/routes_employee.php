<?php

Route::group(['namespace' => 'Org\\'], function()
{
	Route::resource('/org/{org_id?}/employee',	'EmployeeController',	['names' => ['index' => 'employee.index', 'create' => 'employee.create', 'store' => 'employee.store', 'show' => 'employee.show', 'edit' => 'employee.edit', 'update' => 'employee.update', 'destroy' => 'employee.destroy']]);
	
	Route::get('/generate/nik/{code}/{id}/{join_year}/',				['uses' => 'EmployeeController@generateNIK', 	'as' => 'ajax.employee.nik']);
	
	Route::get('/generate/username/{code}/{name}',						['uses' => 'EmployeeController@generateUsername', 	'as' => 'ajax.employee.username']);

	Route::delete('/org/{org_id?}/employee/{employee}/work/{id}/delete',		['uses' => 'EmployeeWorkController@delete', 		'as' => 'employee.work.destroy']);
	Route::delete('/org/{org_id?}/employee/{employee}/relation/{id}/delete',	['uses' => 'EmployeeRelationController@delete', 	'as' => 'employee.relation.destroy']);
	Route::delete('/org/{org_id?}/employee/{employee}/document/{id}/delete',	['uses' => 'EmployeeDocumentController@delete', 	'as' => 'employee.document.destroy']);
});
