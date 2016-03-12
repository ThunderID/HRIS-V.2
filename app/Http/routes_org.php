<?php

Route::group(['namespace' => 'Org\\'], function()
{
	Route::resource('/org', 					'OrgController',						['names' => ['index' => 'org.index', 'create' => 'org.create', 'store' => 'org.store', 'show' => 'org.show', 'edit' => 'org.edit', 'update' => 'org.update', 'destroy' => 'org.destroy']]);
	Route::resource('/org/{org_id?}/branch',	'BranchController',						['names' => ['index' => 'branch.index', 'create' => 'branch.create', 'store' => 'branch.store', 'show' => 'branch.show', 'edit' => 'branch.edit', 'update' => 'branch.update', 'destroy' => 'branch.destroy']]);
	Route::resource('/org/{org_id?}/branch/{branch_id?}/chart',	'ChartController',		['names' => ['index' => 'chart.index', 'create' => 'chart.create', 'store' => 'chart.store', 'show' => 'chart.show', 'edit' => 'chart.edit', 'update' => 'chart.update', 'destroy' => 'chart.destroy']]);

	//ajax
	Route::get('org/ajax/findname',														['uses' => 'OrgController@FindOrgByName', 	'as' => 'ajax.org.findByName']);
	Route::get('org/{org_id?}/branch/ajax/findname',									['uses' => 'BranchController@FindBranchByName', 	'as' => 'ajax.branch.findByName']);
	Route::get('org/{org_id?}/branch/{branch_id?}/chart/ajax/findname',					['uses' => 'ChartController@FindChartByName', 	'as' => 'ajax.chart.findByName']);
	
});
