<?php

Route::group(['namespace' => 'Org\\'], function()
{
	Route::resource('/org/{org_id?}/employee',	'EmployeeController',	['names' => ['index' => 'employee.index', 'create' => 'employee.create', 'store' => 'employee.store', 'show' => 'employee.show', 'edit' => 'employee.edit', 'update' => 'employee.update', 'destroy' => 'employee.destroy']]);
	
	Route::get('/generate/nik/{code}/{id}',								['uses' => 'EmployeeController@generateNIK', 	'as' => 'ajax.employee.nik']);
	
	Route::get('/generate/username/{code}/{id}',						['uses' => 'EmployeeController@generateUsername', 	'as' => 'ajax.employee.username']);
	
	Route::get('/resend/activation/mail/{org_id}/{id}',					['uses' => 'EmployeeController@resendActivationMail', 	'as' => 'employee.activation.mail']);

	Route::delete('/org/{org_id?}/employee/{employee}/work/{id}/delete',		['uses' => 'EmployeeWorkController@delete', 		'as' => 'employee.work.destroy']);
	Route::delete('/org/{org_id?}/employee/{employee}/relation/{id}/delete',	['uses' => 'EmployeeRelationController@delete', 	'as' => 'employee.relation.destroy']);
	Route::delete('/org/{org_id?}/employee/{employee}/document/{id}/delete',	['uses' => 'EmployeeDocumentController@delete', 	'as' => 'employee.document.destroy']);

	Route::any('/org/{org_id?}/employee/{employee}/work/store',		['uses' => 'EmployeeWorkController@store', 		'as' => 'employee.work.store']);
	Route::any('/org/{org_id?}/employee/{employee}/relation/store',	['uses' => 'EmployeeRelationController@store', 	'as' => 'employee.relation.store']);
	Route::any('/org/{org_id?}/employee/{employee}/document/store',	['uses' => 'EmployeeDocumentController@store', 	'as' => 'employee.document.store']);
	
	Route::get('/import/employee/',									['uses' => 'EmployeeController@getimport', 	'as' => 'employee.import.get']);
	Route::post('/import/employee/',								['uses' => 'EmployeeController@postimport', 	'as' => 'employee.import.post']);
});
