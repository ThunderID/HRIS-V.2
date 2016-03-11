<?php

Route::group(['middleware' => ['web']], function () {

	// Routes General
	include('routes_general.php');

	// Routes Employee
	include('routes_org.php');

	// Routes Employee
	include('routes_employee.php');
	
});