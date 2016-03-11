<?php

Route::group(['namespace' => 'Org\\'], function()
{
	Route::resource('/org', 					'OrgController',						['names' => ['index' => 'org.index', 'create' => 'org.create', 'store' => 'org.store', 'show' => 'org.show', 'edit' => 'org.edit', 'update' => 'org.update', 'destroy' => 'org.destroy']]);
	Route::resource('/org/{org_id?}/branch',	'BranchController',						['names' => ['index' => 'branch.index', 'create' => 'branch.create', 'store' => 'branch.store', 'show' => 'branch.show', 'edit' => 'branch.edit', 'update' => 'branch.update', 'destroy' => 'branch.destroy']]);
	Route::resource('/org/{org_id?}/branch/{branch_id?}/chart',	'ChartController',		['names' => ['index' => 'chart.index', 'create' => 'chart.create', 'store' => 'chart.store', 'show' => 'chart.show', 'edit' => 'chart.edit', 'update' => 'chart.update', 'destroy' => 'chart.destroy']]);
});
